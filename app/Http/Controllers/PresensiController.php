<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $sort = $request->input('sort', 'tgl_input');
        $direction = $request->input('direction', 'desc');

        // Default to last 7 days if no filters are applied
        if (!$search && !$startDate && !$endDate && !$request->has('filter')) {
            $startDate = date('Y-m-d', strtotime('-7 days'));
            $endDate = date('Y-m-d');
        }

        $query = Presensi::select('ai_presensi.*')
            ->leftJoin('ai_tentor', 'ai_presensi.id_tentor', '=', 'ai_tentor.id')
            ->leftJoin('mdlu6_user', 'ai_presensi.id_siswa', '=', 'mdlu6_user.id')
            ->with(['tentor', 'siswa']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('ai_tentor.nama', 'like', "%{$search}%")
                    ->orWhere('ai_tentor.nickname', 'like', "%{$search}%")
                    ->orWhere('mdlu6_user.firstname', 'like', "%{$search}%")
                    ->orWhere('mdlu6_user.lastname', 'like', "%{$search}%")
                    ->orWhere('mdlu6_user.username', 'like', "%{$search}%");
            });
        }

        if ($startDate) {
            $query->where('ai_presensi.tgl_kbm', '>=', strtotime($startDate));
        }

        if ($endDate) {
            $query->where('ai_presensi.tgl_kbm', '<=', strtotime($endDate . ' 23:59:59'));
        }

        // Sorting mapping
        $sortMap = [
            'id' => 'ai_presensi.id',
            'waktu_input' => 'ai_presensi.tgl_input',
            'tentor' => 'ai_tentor.nama',
            'siswa' => 'mdlu6_user.firstname',
            'tgl_kbm' => 'ai_presensi.tgl_kbm'
        ];

        $orderColumn = $sortMap[$sort] ?? 'ai_presensi.tgl_input';
        $presensis = $query->orderBy($orderColumn, $direction)->get();

        return view('admin.presensi.index', compact('presensis', 'search', 'startDate', 'endDate', 'sort', 'direction'));
    }

    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);
        $presensi->delete();

        return back()->with('success', 'Data presensi berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids)) {
            return back()->with('error', 'Pilih minimal satu data untuk dihapus.');
        }

        Presensi::whereIn('id', $ids)->delete();

        return back()->with('success', count($ids) . ' data presensi berhasil dihapus.');
    }
}
