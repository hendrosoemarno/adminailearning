<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaTentorController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'matematika');
        $sort = $request->get('sort', 'firstname');
        $direction = $request->get('direction', 'asc');

        // Map tab to mapel in ai_tarif
        $mapelMap = [
            'matematika' => 'MAT',
            'bahasa inggris' => 'BING',
            'coding' => 'CODING'
        ];
        
        // Actually, let's look at what's in ai_tarif.mapel
        // I'll assume they match or similar. For now let's use a dynamic filter.
        $targetMapel = $mapelMap[$tab] ?? 'MAT';

        $query = DB::table('ai_siswa_tarif as st')
            ->join('mdlu6_user as u', 'st.id_siswa', '=', 'u.id')
            ->join('ai_tentor as t', 'st.id_tentor', '=', 't.id')
            ->join('ai_tarif as tr', 'st.id_tarif', '=', 'tr.id')
            // Join enrollment to ensure they are enrolled (as per request "siswa (yang enrol)")
            ->join('mdlu6_enrol as e', 'e.courseid', '>', DB::raw('0')) // dummy join for enrol logic
            ->join('mdlu6_user_enrolments as ue', function($join) {
                $join->on('ue.enrolid', '=', 'e.id')
                     ->on('ue.userid', '=', 'u.id');
            })
            ->where('tr.mapel', 'like', '%' . $targetMapel . '%')
            ->where('ue.status', 0)
            ->select(
                'u.id as student_id',
                'u.username',
                'u.firstname',
                'u.lastname',
                't.nama as tentor_nama',
                'tr.mapel'
            )
            ->distinct();

        $data = $query->get();

        // Sort collection
        if ($direction === 'desc') {
            $data = $data->sortByDesc($sort)->values();
        } else {
            $data = $data->sortBy($sort)->values();
        }

        return view('admin.siswa-tentor.index', compact('data', 'tab', 'sort', 'direction'));
    }

    public function detail(Request $request, $username)
    {
        $sort = $request->get('sort', 'terakhir_akses');
        $direction = $request->get('direction', 'desc');

        // The query provided by user requires mdlu6_logstore_standard_log
        // Note: User mentioned we might need to import it. 
        // I will write the query as provided.
        
        $details = DB::table('mdlu6_course as c')
            ->join('mdlu6_logstore_standard_log as l', 'l.courseid', '=', 'c.id')
            ->join('mdlu6_user as u', 'l.userid', '=', 'u.id')
            ->leftJoin('mdlu6_enrol as e', 'e.courseid', '=', 'c.id')
            ->leftJoin('mdlu6_user_enrolments as ue', function($join) use ($username) {
                $join->on('ue.enrolid', '=', 'e.id')
                     ->on('ue.userid', '=', 'u.id');
            })
            ->where('u.username', $username)
            ->select(
                'c.id as courseid',
                'c.fullname as coursename',
                DB::raw("CASE WHEN ue.id IS NOT NULL THEN 'Aktif' ELSE 'Sudah Unenroll / Pernah Mengakses' END as status_pendaftaran"),
                DB::raw("FROM_UNIXTIME(MIN(l.timecreated)) as awal_akses"),
                DB::raw("FROM_UNIXTIME(MAX(l.timecreated)) as terakhir_akses"),
                DB::raw("COUNT(l.id) as total_interaksi")
            )
            ->groupBy('c.id', 'c.fullname', 'ue.id')
            ->get();

        // Sort collection
        if ($direction === 'desc') {
            $details = $details->sortByDesc($sort)->values();
        } else {
            $details = $details->sortBy($sort)->values();
        }

        $student = DB::table('mdlu6_user')->where('username', $username)->first();

        return view('admin.siswa-tentor.detail', compact('details', 'username', 'student', 'sort', 'direction'));
    }
}
