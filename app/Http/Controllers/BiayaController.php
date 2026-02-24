<?php

namespace App\Http\Controllers;

use App\Models\Tentor;
use App\Models\MoodleUser;
use App\Models\Tarif;
use App\Models\SiswaTarif;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\WaSentStatus;

class BiayaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');
        $mapel = $request->input('mapel');

        $allowedSorts = ['id', 'nama', 'mapel', 'nickname'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'id';
        }

        $query = Tentor::where('aktif', 1);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nickname', 'like', "%{$search}%");
            });
        }

        if ($mapel) {
            $query->where('mapel', $mapel);
        }

        $tentors = $query->orderBy($sort, $direction)->get();

        return view('admin.biaya.index', compact('tentors', 'search', 'sort', 'direction', 'mapel'));
    }


    public function show(Request $request, Tentor $tentor)
    {
        $sort = $request->input('sort', 'firstname');
        $direction = $request->input('direction', 'asc');
        $month = $request->input('month', date('Y-m'));

        // Ambil semua paket yang sesuai dengan PENGATURAN mapel tentor
        $mapel = strtolower($tentor->mapel);
        $availablePackages = Tarif::where('mapel', $mapel)->orderBy('kode', 'asc')->get();

        $siswas = $tentor->siswas()->get();
        foreach ($siswas as $siswa) {
            $this->applyStudentCosts($siswa, $tentor, $month);
        }

        // Apply Sorting
        if (!$request->has('sort')) {
            $siswas = $siswas->sortBy(function ($siswa) {
                return [$siswa->sort_order, $siswa->firstname];
            });
        } else {
            $siswas = ($direction == 'asc') ? $siswas->sortBy($sort) : $siswas->sortByDesc($sort);
        }

        return view('admin.biaya.show', compact('tentor', 'siswas', 'sort', 'direction', 'availablePackages', 'month'));
    }

    public function summary(Request $request)
    {
        $month = $request->input('month', date('Y-m'));

        $subjects = [
            'mat' => 'Matematika',
            'bing' => 'Bahasa Inggris',
            'coding' => 'Coding'
        ];

        $data = [];

        foreach ($subjects as $key => $label) {
            $tentors = Tentor::where('mapel', $key)->where('aktif', 1)->orderBy('id', 'asc')->get();

            foreach ($tentors as $tentor) {
                $siswas = $tentor->siswas()->get();
                foreach ($siswas as $siswa) {
                    $this->applyStudentCosts($siswa, $tentor, $month);
                }

                // Only add if there are students
                if ($siswas->count() > 0) {
                    $siswas = $siswas->sortBy(function ($siswa) {
                        return [$siswa->sort_order, $siswa->firstname];
                    });

                    $data[$label][] = [
                        'tentor' => $tentor,
                        'siswas' => $siswas
                    ];
                }
            }
        }

        return view('admin.biaya.summary', compact('data', 'month', 'subjects'));
    }

    public function summaryExport(Request $request)
    {
        $month = $request->input('month', date('Y-m'));
        $fileName = 'Ringkasan_Biaya_Siswa_' . $month . '.csv';

        $subjects = [
            'mat' => 'Matematika',
            'bing' => 'Bahasa Inggris',
            'coding' => 'Coding'
        ];

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($subjects, $month) {
            $file = fopen('php://output', 'w');

            // BOM for Excel
            fputs($file, "\xEF\xBB\xBF");

            // Header Utama
            fputcsv($file, ['RINGKASAN BIAYA SISWA KESELURUHAN - PERIODE ' . $month]);
            fputcsv($file, []);

            // Column Headers
            fputcsv($file, ['Subject', 'Tentor', 'Nama Siswa', 'Paket', 'Biaya (Omzet)', 'AI Learning', 'Gaji Tentor', 'Meet', 'Realisasi']);

            foreach ($subjects as $key => $label) {
                $tentors = Tentor::where('mapel', $key)->where('aktif', 1)->orderBy('id', 'asc')->get();

                foreach ($tentors as $tentor) {
                    $siswas = $tentor->siswas()->get();
                    foreach ($siswas as $siswa) {
                        $this->applyStudentCosts($siswa, $tentor, $month);
                    }

                    if ($siswas->count() > 0) {
                        $siswas = $siswas->sortBy(function ($siswa) {
                            return [$siswa->sort_order, $siswa->firstname];
                        });

                        foreach ($siswas as $siswa) {
                            fputcsv($file, [
                                $label,
                                $tentor->nama,
                                $siswa->firstname . ' ' . $siswa->lastname,
                                $siswa->paket_kode,
                                $siswa->biaya,
                                $siswa->ai_learning,
                                $siswa->gaji_tentor,
                                $siswa->total_meet,
                                $siswa->realisasi_kbm
                            ]);
                        }
                    }
                }
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function billing(Request $request)
    {
        $month = $request->input('month', date('Y-m'));
        $search = $request->input('search');

        // Join to get students who have a relationship in ai_tentor_siswa and sort by wa_ortu
        $query = MoodleUser::join('ai_user_detil', 'mdlu6_user.id', '=', 'ai_user_detil.id')
            ->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                    ->from('ai_tentor_siswa')
                    ->whereRaw('mdlu6_user.id = ai_tentor_siswa.id_siswa');
            })
            ->select('mdlu6_user.*', 'ai_user_detil.wa_ortu', 'ai_user_detil.nama_ortu');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('firstname', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%");
            });
        }

        $siswas = $query->orderBy('ai_user_detil.wa_ortu', 'asc')->get();
        $billingData = [];

        foreach ($siswas as $siswa) {
            $item = [
                'id' => $siswa->id,
                'nama_siswa' => $siswa->firstname . ' ' . $siswa->lastname,
                'nama_ortu' => $siswa->nama_ortu ?? '-',
                'wa_ortu' => $siswa->wa_ortu ?? '-',
                'subjects' => [
                    'mat' => 0,
                    'bing' => 0,
                    'coding' => 0
                ],
                'total' => 0,
                'is_sent' => WaSentStatus::where('student_id', $siswa->id)->where('month', $month)->value('is_sent') ?? false
            ];

            $tentors = $siswa->tentors()->get();
            foreach ($tentors as $tentor) {
                $costData = $this->getStudentCost($siswa, $tentor, $month);
                $mapel = strtolower($tentor->mapel);
                if (isset($item['subjects'][$mapel])) {
                    $item['subjects'][$mapel] += $costData['biaya'];
                }
                $item['total'] += $costData['biaya'];
            }

            if ($item['total'] > 0) {
                $billingData[] = (object) $item;
            }
        }

        $template = \App\Models\Option::get('wa_billing_template');
        $msgBulan = \App\Models\Option::get('wa_billing_msg_bulan');
        $msgTahun = \App\Models\Option::get('wa_billing_msg_tahun');

        return view('admin.biaya.billing', compact('billingData', 'month', 'search', 'template', 'msgBulan', 'msgTahun'));
    }

    public function studentList(Request $request)
    {
        return $this->handleStudentList($request, 'biaya.student-list', false);
    }

    public function activeStudentList(Request $request)
    {
        return $this->handleStudentList($request, 'biaya.active-student-list', true);
    }

    private function handleStudentList(Request $request, $viewRoute, $onlyActiveTentor)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'nama_siswa');
        $direction = $request->input('direction', 'asc');

        $query = MoodleUser::join('ai_user_detil', 'mdlu6_user.id', '=', 'ai_user_detil.id')
            ->whereExists(function ($query) use ($onlyActiveTentor) {
                $query->select(\DB::raw(1))
                    ->from('ai_tentor_siswa')
                    ->join('ai_tentor', 'ai_tentor_siswa.id_tentor', '=', 'ai_tentor.id')
                    ->whereRaw('mdlu6_user.id = ai_tentor_siswa.id_siswa');

                if ($onlyActiveTentor) {
                    $query->where('ai_tentor.aktif', 1);
                }
            })
            ->select('mdlu6_user.*', 'ai_user_detil.wa_ortu', 'ai_user_detil.nama_ortu', 'ai_user_detil.cek');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('firstname', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%")
                    ->orWhere('ai_user_detil.nama_ortu', 'like', "%{$search}%");
            });
        }

        // Handle sorting
        if ($sort == 'nama_ortu') {
            $query->orderBy('ai_user_detil.nama_ortu', $direction);
        } elseif ($sort == 'wa_ortu') {
            $query->orderBy('ai_user_detil.wa_ortu', $direction);
        } else {
            $query->orderBy('firstname', $direction);
        }

        $siswas = $query->get();
        $studentData = [];

        foreach ($siswas as $siswa) {
            $tentorQuery = $siswa->tentors();
            if ($onlyActiveTentor) {
                $tentorQuery->where('ai_tentor.aktif', 1);
            }
            $tentors = $tentorQuery->get();

            $courses = [];
            $tentorNames = [];

            foreach ($tentors as $t) {
                $courses[] = $t->mapel;
                $tentorNames[] = $t->nama;
            }

            $studentData[] = (object) [
                'id' => $siswa->id,
                'nama_siswa' => $siswa->firstname . ' ' . $siswa->lastname,
                'nama_ortu' => $siswa->nama_ortu ?? '-',
                'wa_ortu' => $siswa->wa_ortu ?? '-',
                'kursus' => implode(', ', array_unique($courses)),
                'tentor' => implode(', ', array_unique($tentorNames)),
                'cek' => $siswa->cek
            ];
        }

        // Collection level sorting
        if ($sort == 'kursus') {
            $studentData = collect($studentData)->sortBy('kursus', SORT_NATURAL | SORT_FLAG_CASE, $direction == 'desc')->values()->all();
        } elseif ($sort == 'tentor') {
            $studentData = collect($studentData)->sortBy('tentor', SORT_NATURAL | SORT_FLAG_CASE, $direction == 'desc')->values()->all();
        }

        $viewPath = 'admin.biaya.student_list';
        return view($viewPath, compact('studentData', 'search', 'sort', 'direction', 'viewRoute', 'onlyActiveTentor'));
    }

    public function studentListExport(Request $request)
    {
        return $this->handleStudentListExport($request, false);
    }

    public function activeStudentListExport(Request $request)
    {
        return $this->handleStudentListExport($request, true);
    }

    private function handleStudentListExport(Request $request, $onlyActiveTentor)
    {
        $search = $request->input('search');
        $fileName = ($onlyActiveTentor ? 'Daftar_Kontak_Siswa_Aktif_' : 'Daftar_Kontak_Siswa_') . date('Ymd_His') . '.csv';

        $query = MoodleUser::join('ai_user_detil', 'mdlu6_user.id', '=', 'ai_user_detil.id')
            ->whereExists(function ($query) use ($onlyActiveTentor) {
                $query->select(\DB::raw(1))
                    ->from('ai_tentor_siswa')
                    ->join('ai_tentor', 'ai_tentor_siswa.id_tentor', '=', 'ai_tentor.id')
                    ->whereRaw('mdlu6_user.id = ai_tentor_siswa.id_siswa');

                if ($onlyActiveTentor) {
                    $query->where('ai_tentor.aktif', 1);
                }
            })
            ->select('mdlu6_user.*', 'ai_user_detil.wa_ortu', 'ai_user_detil.nama_ortu');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('firstname', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%")
                    ->orWhere('ai_user_detil.nama_ortu', 'like', "%{$search}%");
            });
        }

        $siswas = $query->orderBy('firstname', 'asc')->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($siswas, $onlyActiveTentor) {
            $file = fopen('php://output', 'w');

            // BOM for Excel
            fputs($file, "\xEF\xBB\xBF");

            // Column Headers
            fputcsv($file, ['ID', 'Nama Siswa', 'Nama Orang Tua', 'WhatsApp', 'Kursus', 'Tentor']);

            foreach ($siswas as $siswa) {
                $tentorQuery = $siswa->tentors();
                if ($onlyActiveTentor) {
                    $tentorQuery->where('ai_tentor.aktif', 1);
                }
                $tentors = $tentorQuery->get();

                $courses = [];
                $tentorNames = [];

                foreach ($tentors as $t) {
                    $courses[] = $t->mapel;
                    $tentorNames[] = $t->nama;
                }

                fputcsv($file, [
                    $siswa->id,
                    $siswa->firstname . ' ' . $siswa->lastname,
                    $siswa->nama_ortu ?? '-',
                    $siswa->wa_ortu ?? '-',
                    implode(', ', array_unique($courses)),
                    implode(', ', array_unique($tentorNames))
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function toggleStudentMark(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:ai_user_detil,id',
            'cek' => 'required|boolean'
        ]);

        \DB::table('ai_user_detil')->where('id', $request->id)->update(['cek' => $request->cek]);

        return response()->json(['success' => true]);
    }

    public function exportShow(Request $request, Tentor $tentor)
    {
        $month = $request->input('month', date('Y-m'));
        $sort = $request->input('sort', 'firstname');
        $direction = $request->input('direction', 'asc');

        $siswas = $tentor->siswas()->get();
        foreach ($siswas as $siswa) {
            $this->applyStudentCosts($siswa, $tentor, $month);
        }

        // Apply Sorting
        if ($sort == 'id') {
            $siswas = ($direction == 'asc') ? $siswas->sortBy('id') : $siswas->sortByDesc('id');
        } elseif ($sort == 'paket_kode') {
            $siswas = ($direction == 'asc') ? $siswas->sortBy('paket_kode') : $siswas->sortByDesc('paket_kode');
        } elseif ($sort == 'biaya') {
            $siswas = ($direction == 'asc') ? $siswas->sortBy('biaya') : $siswas->sortByDesc('biaya');
        } elseif ($sort == 'ai_learning') {
            $siswas = ($direction == 'asc') ? $siswas->sortBy('ai_learning') : $siswas->sortByDesc('ai_learning');
        } elseif ($sort == 'gaji_tentor') {
            $siswas = ($direction == 'asc') ? $siswas->sortBy('gaji_tentor') : $siswas->sortByDesc('gaji_tentor');
        } elseif ($sort == 'total_meet') {
            $siswas = ($direction == 'asc') ? $siswas->sortBy('total_meet') : $siswas->sortByDesc('total_meet');
        } else {
            $siswas = ($direction == 'asc') ? $siswas->sortBy('firstname') : $siswas->sortByDesc('firstname');
        }

        $fileName = 'Biaya_Siswa_' . $tentor->nama . '_' . $month . '.csv';

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($siswas, $tentor, $month) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF");

            fputcsv($file, ['RINCIAN BIAYA SISWA - TENTOR: ' . strtoupper($tentor->nama)]);
            fputcsv($file, ['PERIODE: ' . $month]);
            fputcsv($file, []);

            fputcsv($file, ['User ID', 'Nama Siswa', 'Username', 'Paket', 'Tgl Masuk', 'Biaya (Omzet)', 'AI Learning', 'Gaji Tentor', 'Total Meet', 'Realisasi KBM', 'Status Slip Gaji']);

            foreach ($siswas as $siswa) {
                fputcsv($file, [
                    $siswa->id,
                    $siswa->firstname . ' ' . $siswa->lastname,
                    $siswa->username,
                    $siswa->paket_kode,
                    $siswa->tanggal_masuk ?? '-',
                    $siswa->biaya,
                    $siswa->ai_learning,
                    $siswa->gaji_tentor,
                    $siswa->total_meet,
                    $siswa->realisasi_kbm,
                    $siswa->is_salary_hidden ? 'EXCLUDED' : 'INCLUDED'
                ]);
            }

            // Summary (only included)
            $visibleSiswas = $siswas->where('is_salary_hidden', false);
            fputcsv($file, []);
            fputcsv($file, ['', '', '', '', 'TOTAL (INCLUDED ONLY)', $visibleSiswas->sum('biaya'), $visibleSiswas->sum('ai_learning'), $visibleSiswas->sum('gaji_tentor'), '', '', '']);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function applyStudentCosts($siswa, $tentor, $month)
    {
        $data = $this->getStudentCost($siswa, $tentor, $month);
        foreach ($data as $key => $value) {
            $siswa->$key = $value;
        }
    }

    private function getStudentCost($siswa, $tentor, $month)
    {
        $siswaTarif = SiswaTarif::where('id_siswa', $siswa->id)
            ->where('id_tentor', $tentor->id)
            ->first();

        $tarif = ($siswaTarif && $siswaTarif->tarif) ? $siswaTarif->tarif : null;

        $result = [
            'biaya' => 0,
            'ai_learning' => 0,
            'gaji_tentor' => 0,
            'paket_kode' => '-',
            'id_tarif' => null,
            'total_meet' => 0,
            'default_total_meet' => 0,
            'tanggal_masuk' => null,
            'custom_total_meet' => null,
            'is_custom' => false,
            'is_salary_hidden' => false,
            'sort_order' => 0,
            'realisasi_kbm' => 0
        ];

        if ($tarif && $siswaTarif) {
            $customTotalMeet = $siswaTarif->custom_total_meet;
            $tanggalMasuk = $siswaTarif->tanggal_masuk;

            preg_match('/\d+/', $tarif->kode, $matches);
            $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
            $defaultTotalMeet = $multiplier * 4;

            $totalMeet = $customTotalMeet ?? $defaultTotalMeet;
            $meetRatio = $defaultTotalMeet > 0 ? $totalMeet / $defaultTotalMeet : 1;

            $gaji = $tarif->tentor * $meetRatio;
            $manajemen = $tarif->manajemen * $meetRatio;
            $aplikasi = $tarif->aplikasi;

            if ($tanggalMasuk) {
                $day = (int) date('d', strtotime($tanggalMasuk));
                if ($day > 20)
                    $aplikasi *= 0.5;
                elseif ($day >= 11)
                    $aplikasi *= (2 / 3);
            }

            $result['biaya'] = $gaji + $manajemen + $aplikasi;
            $result['ai_learning'] = $manajemen + $aplikasi;
            $result['gaji_tentor'] = $gaji;
            $result['paket_kode'] = $tarif->kode;
            $result['id_tarif'] = $tarif->id;
            $result['total_meet'] = $totalMeet;
            $result['default_total_meet'] = $defaultTotalMeet;
            $result['tanggal_masuk'] = $tanggalMasuk;
            $result['custom_total_meet'] = $customTotalMeet;
            $result['is_custom'] = ($customTotalMeet !== null || $tanggalMasuk !== null);
            $result['is_salary_hidden'] = (bool) ($siswaTarif->is_salary_hidden ?? false);
            $result['sort_order'] = $siswaTarif->sort_order;
        }

        $result['realisasi_kbm'] = \App\Models\Presensi::where('id_tentor', $tentor->id)
            ->where('id_siswa', $siswa->id)
            ->whereRaw("DATE_FORMAT(FROM_UNIXTIME(tgl_kbm), '%Y-%m') = ?", [$month])
            ->count();

        return $result;
    }

    public function salary(Request $request, Tentor $tentor)
    {
        $month = $request->input('month', date('Y-m'));
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');

        $siswas = $this->getSalaryData($tentor, $month, $sort, $direction);

        return view('admin.biaya.salary', compact('tentor', 'siswas', 'month', 'sort', 'direction'));
    }

    public function salaryExport(Request $request, Tentor $tentor)
    {
        $month = $request->input('month', date('Y-m'));
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');

        $siswas = $this->getSalaryData($tentor, $month, $sort, $direction);

        $fileName = 'Gaji_' . $tentor->nama . '_' . $month . '.csv';

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('User ID', 'Nama Siswa', 'Materi', 'Paket', 'Gaji', 'Rencana KBM', 'Perhitungan', 'Total', 'Realisasi KBM', 'Total Meet');

        $callback = function () use ($siswas, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($siswas as $siswa) {
                fputcsv($file, array(
                    $siswa->id,
                    $siswa->firstname . ' ' . $siswa->lastname,
                    $siswa->materi,
                    $siswa->paket,
                    $siswa->gaji,
                    $siswa->rencana_kbm,
                    $siswa->perhitungan,
                    $siswa->total,
                    $siswa->realisasi_kbm . 'x Pertemuan',
                    $siswa->total_meet
                ));
            }

            // Total row
            fputcsv($file, array('', '', '', '', '', '', 'TOTAL', $siswas->sum('total'), '', ''));

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function getSalaryData(Tentor $tentor, $month, $sort, $direction)
    {
        $siswas = $tentor->siswas()->get();
        $filteredSiswas = collect();

        foreach ($siswas as $siswa) {
            // Kita cari manual agar spesifik ke Tentor ini saja
            $siswaTarif = \App\Models\SiswaTarif::where('id_siswa', $siswa->id)
                ->where('id_tentor', $tentor->id)
                ->first();

            // Skip jika diset hidden untuk tentor ini
            if ($siswaTarif && $siswaTarif->is_salary_hidden) {
                continue;
            }

            $tarif = $siswaTarif->tarif ?? null;

            if ($tarif) {
                // Split Kode: "SD 2x" -> Materi: "SD", Paket: "2x"
                $parts = explode(' ', $tarif->kode);
                $siswa->materi = $parts[0] ?? '-';
                $siswa->paket = $parts[1] ?? '-';

                // Get custom values or defaults
                $customTotalMeet = $siswaTarif->custom_total_meet;
                $tanggalMasuk = $siswaTarif->tanggal_masuk;

                // Calculate default total meet from package
                preg_match('/\d+/', $tarif->kode, $matches);
                $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
                $defaultTotalMeet = $multiplier * 4;

                // Use custom or default
                $totalMeet = $customTotalMeet ?? $defaultTotalMeet;

                // Calculate proportions
                $meetRatio = $defaultTotalMeet > 0 ? $totalMeet / $defaultTotalMeet : 1;

                // Calculate Gaji (proportional) - USING CUSTOM FORMULA
                $gaji = $tarif->tentor * $meetRatio;

                $siswa->gaji = $gaji;
                $siswa->total = $gaji;
                $siswa->total_meet = $totalMeet;

                // Handle custom meet display logic
                if ($customTotalMeet !== null && $customTotalMeet != $defaultTotalMeet) {
                    $siswa->rencana_kbm = $customTotalMeet . "x Pertemuan";
                    $perMeet = $defaultTotalMeet > 0 ? $tarif->tentor / $defaultTotalMeet : 0;
                    $siswa->perhitungan = $customTotalMeet . " x Rp." . number_format($perMeet, 0, ',', '.');
                } else {
                    $siswa->rencana_kbm = "Penuh";
                    $siswa->perhitungan = "-";
                }
            } else {
                $siswa->materi = '-';
                $siswa->paket = '-';
                $siswa->gaji = 0;
                $siswa->total = 0;
                $siswa->total_meet = 0;
                $siswa->rencana_kbm = "Penuh";
                $siswa->perhitungan = "-";
            }

            // Calculate Realisasi KBM
            $siswa->realisasi_kbm = Presensi::where('id_tentor', $tentor->id)
                ->where('id_siswa', $siswa->id)
                ->whereRaw("DATE_FORMAT(FROM_UNIXTIME(tgl_kbm), '%Y-%m') = ?", [$month])
                ->count();

            $siswa->sort_order = $siswaTarif ? $siswaTarif->sort_order : 0;

            $filteredSiswas->push($siswa);
        }

        // Apply Sorting to collection
        if ($sort == 'id' && !request()->has('sort')) { // Default sort
            return $filteredSiswas->sortBy(function ($siswa) {
                return [$siswa->sort_order, $siswa->firstname];
            });
        }

        if ($direction == 'asc') {
            return $filteredSiswas->sortBy($sort);
        } else {
            return $filteredSiswas->sortByDesc($sort);
        }
    }

    public function updatePaket(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:mdlu6_user,id',
            'id_tentor' => 'required|exists:ai_tentor,id',
            'id_tarif' => 'required|exists:ai_tarif,id',
        ]);

        $idSiswa = $request->id_siswa;
        $idTentor = $request->id_tentor;
        $idTarif = $request->id_tarif;

        // Use firstOrCreate to get existing record or create new one
        // This preserves all existing fields
        $siswaTarif = SiswaTarif::firstOrCreate(
            ['id_siswa' => $idSiswa, 'id_tentor' => $idTentor]
        );

        // Log the update for debugging
        \Log::info('Package Update Attempt', [
            'request_siswa_id' => $idSiswa,
            'request_tentor_id' => $idTentor,
            'request_tarif_id' => $idTarif,
            'identified_siswa_tarif_id' => $siswaTarif->id,
            'identified_tentor_id' => $siswaTarif->id_tentor
        ]);

        $siswaTarif->id_tarif = $idTarif;
        $siswaTarif->save();

        \Log::info('Package Updated Successfully', [
            'st_id' => $siswaTarif->id,
            'new_tarif' => $siswaTarif->id_tarif
        ]);

        $tarif = $siswaTarif->tarif;

        // Recalculate billing based on new tarif but KEEP custom data if any
        preg_match('/\d+/', $tarif->kode, $matches);
        $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
        $defaultTotalMeet = $multiplier * 4;

        // Use custom or default
        $totalMeet = $siswaTarif->custom_total_meet ?? $defaultTotalMeet;
        $meetRatio = $defaultTotalMeet > 0 ? $totalMeet / $defaultTotalMeet : 1;

        // Calculate proportions
        $gaji = $tarif->tentor * $meetRatio;
        $manajemen = $tarif->manajemen * $meetRatio;

        // Calculate Aplikasi
        $aplikasi = $tarif->aplikasi;
        if ($siswaTarif->tanggal_masuk) {
            $day = (int) date('d', strtotime($siswaTarif->tanggal_masuk));
            if ($day > 20) {
                $aplikasi = $aplikasi * 0.5;
            } elseif ($day >= 11 && $day <= 20) {
                $aplikasi = $aplikasi * (2 / 3);
            }
        }

        return response()->json([
            'success' => true,
            'data' => [
                'biaya' => $gaji + $manajemen + $aplikasi,
                'ai_learning' => $manajemen + $aplikasi,
                'gaji_tentor' => $gaji,
                'total_meet' => $totalMeet,
                'default_total_meet' => $defaultTotalMeet
            ]
        ]);
    }

    public function updateCustomData(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:mdlu6_user,id',
            'id_tentor' => 'required|exists:ai_tentor,id',
            'field' => 'required|in:tanggal_masuk,custom_total_meet',
            'value' => 'nullable'
        ]);

        $siswaTarif = SiswaTarif::where('id_siswa', $request->id_siswa)
            ->where('id_tentor', $request->id_tentor)
            ->firstOrFail();

        \Log::info('Custom Data Update Attempt', [
            'id_siswa' => $request->id_siswa,
            'id_tentor' => $request->id_tentor,
            'field' => $request->field,
            'value' => $request->value,
            'identified_st_id' => $siswaTarif->id
        ]);

        // Update field
        if ($request->field == 'tanggal_masuk') {
            $siswaTarif->tanggal_masuk = $request->value ?: null;
        } else {
            $siswaTarif->custom_total_meet = $request->value > 0 ? (int) $request->value : null;
        }
        $siswaTarif->save();

        \Log::info('Custom Data Updated Successfully', [
            'st_id' => $siswaTarif->id
        ]);

        // Recalculate billing
        $tarif = $siswaTarif->tarif;

        // Calculate default total meet
        preg_match('/\d+/', $tarif->kode, $matches);
        $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
        $defaultTotalMeet = $multiplier * 4;

        // Use custom or default
        $totalMeet = $siswaTarif->custom_total_meet ?? $defaultTotalMeet;
        $meetRatio = $defaultTotalMeet > 0 ? $totalMeet / $defaultTotalMeet : 1;

        // Calculate Gaji (proportional)
        $gaji = $tarif->tentor * $meetRatio;

        // Calculate Manajemen (proportional)
        $manajemen = $tarif->manajemen * $meetRatio;

        // Calculate Aplikasi (based on tanggal_masuk)
        $aplikasi = $tarif->aplikasi;
        if ($siswaTarif->tanggal_masuk) {
            $day = (int) date('d', strtotime($siswaTarif->tanggal_masuk));
            if ($day > 20) {
                $aplikasi = $aplikasi * 0.5; // 1/2
            } elseif ($day >= 11 && $day <= 20) {
                $aplikasi = $aplikasi * (2 / 3); // 2/3
            }
        }

        $totalBiaya = $gaji + $manajemen + $aplikasi;
        $aiLearning = $manajemen + $aplikasi;

        return response()->json([
            'success' => true,
            'data' => [
                'biaya' => $totalBiaya,
                'ai_learning' => $aiLearning,
                'gaji_tentor' => $gaji,
                'total_meet' => $totalMeet,
                'default_total_meet' => $defaultTotalMeet,
                'is_custom' => ($siswaTarif->custom_total_meet !== null || $siswaTarif->tanggal_masuk !== null)
            ]
        ]);
    }

    public function bulkUpdateMeet(Request $request)
    {
        $request->validate([
            'id_tentor' => 'nullable|exists:ai_tentor,id',
            'percentage' => 'required|numeric|min:1|max:200'
        ]);

        $id_tentor = $request->id_tentor;
        $percentage = $request->percentage;

        $query = SiswaTarif::query();

        if ($id_tentor) {
            $query->where('id_tentor', $id_tentor);
        } else {
            // Only update students of active tentors
            $activeTentorIds = \App\Models\Tentor::where('aktif', 1)->pluck('id');
            $query->whereIn('id_tentor', $activeTentorIds);
        }

        $siswaTarifs = $query->get();

        foreach ($siswaTarifs as $st) {
            $tarif = $st->tarif;
            if (!$tarif)
                continue;

            // Calculate default total meet
            preg_match('/\d+/', $tarif->kode, $matches);
            $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
            $defaultTotalMeet = $multiplier * 4;

            if ($defaultTotalMeet > 0) {
                $newMeet = round($defaultTotalMeet * ($percentage / 100));
                $st->custom_total_meet = $newMeet;
                $st->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil memperbarui Total Meet untuk ' . ($id_tentor ? 'tutor terpilih.' : 'seluruh tutor.')
        ]);
    }

    public function toggleSalaryStatus(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:mdlu6_user,id',
            'id_tentor' => 'required|exists:ai_tentor,id',
            'status' => 'required|boolean'
        ]);

        $siswaTarif = SiswaTarif::firstOrCreate(
            ['id_siswa' => $request->id_siswa, 'id_tentor' => $request->id_tentor]
        );

        $siswaTarif->is_salary_hidden = (bool) $request->status;
        $siswaTarif->save();

        return response()->json([
            'success' => true,
            'is_salary_hidden' => $siswaTarif->is_salary_hidden
        ]);
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'id_tentor' => 'required|exists:ai_tentor,id',
            'order' => 'required|array',
            'order.*' => 'required|integer',
        ]);

        foreach ($request->order as $index => $idSiswa) {
            SiswaTarif::updateOrCreate(
                ['id_siswa' => $idSiswa, 'id_tentor' => $request->id_tentor],
                ['sort_order' => $index]
            );
        }

        return response()->json(['success' => true]);
    }

    public function saveOption(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'value' => 'nullable|string'
        ]);

        \App\Models\Option::set($request->key, $request->value);

        return response()->json(['success' => true]);
    }

    public function toggleWaStatus(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:mdlu6_user,id',
            'month' => 'required|string',
            'is_sent' => 'required|boolean'
        ]);

        \App\Models\WaSentStatus::updateOrCreate(
            ['student_id' => $request->student_id, 'month' => $request->month],
            ['is_sent' => $request->is_sent]
        );

        return response()->json(['success' => true]);
    }

    public function resetStudentMarks()
    {
        \DB::table('ai_user_detil')->update(['cek' => 0]);
        return response()->json(['success' => true]);
    }
}
