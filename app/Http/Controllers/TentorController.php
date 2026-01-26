<?php

namespace App\Http\Controllers;

use App\Models\Tentor;
use Illuminate\Http\Request;

class TentorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'nickname');
        $direction = $request->input('direction', 'asc');

        $allowedSorts = ['id', 'nama', 'nickname', 'mapel', 'email', 'wa', 'aktif'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'nickname';
        }

        $query = Tentor::query();

        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('nickname', 'like', "%{$search}%")
                ->orWhere('mapel', 'like', "%{$search}%");
        }

        $tentors = $query->orderBy($sort, $direction)->get();
        return view('tentor.index', compact('tentors', 'search', 'sort', 'direction'));
    }
}
