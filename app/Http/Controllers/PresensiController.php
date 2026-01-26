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

        $query = Presensi::with(['tentor', 'siswa']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('tentor', function ($t) use ($search) {
                    $t->where('nama', 'like', "%{$search}%")
                        ->orWhere('nickname', 'like', "%{$search}%");
                })
                    ->orWhereHas('siswa', function ($s) use ($search) {
                        $s->where('firstname', 'like', "%{$search}%")
                            ->orWhere('lastname', 'like', "%{$search}%")
                            ->orWhere('username', 'like', "%{$search}%");
                    });
            });
        }

        if ($startDate) {
            $query->where('tgl_kbm', '>=', strtotime($startDate));
        }

        if ($endDate) {
            // End of day
            $query->where('tgl_kbm', '<=', strtotime($endDate . ' 23:59:59'));
        }

        $presensis = $query->orderBy('tgl_input', 'desc')->paginate(20);

        return view('admin.presensi.index', compact('presensis', 'search', 'startDate', 'endDate'));
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
