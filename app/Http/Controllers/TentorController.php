<?php

namespace App\Http\Controllers;

use App\Models\Tentor;
use Illuminate\Http\Request;

class TentorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Tentor::query();

        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('nickname', 'like', "%{$search}%")
                ->orWhere('mapel', 'like', "%{$search}%");
        }

        $tentors = $query->get();
        return view('tentor.index', compact('tentors'));
    }
}
