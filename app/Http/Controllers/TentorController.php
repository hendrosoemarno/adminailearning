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

    public function create()
    {
        return view('tentor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'email' => 'required|email|unique:ai_tentor,email',
            'password' => 'required|min:6',
            'mapel' => 'required|string|in:Bahasa Inggris,Matematika',
            'wa' => 'required|string|max:20',
            'aktif' => 'required|boolean',
            'alamat' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|max:255',
            'tgl_lahir' => 'nullable|date',
            'tahun_lulus' => 'nullable|string|max:10',
            'pendidikan_terakhir' => 'nullable|string|max:255',
            'ket_pendidikan' => 'nullable|string',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        if (!empty($validated['tgl_lahir'])) {
            $validated['tgl_lahir'] = strtotime($validated['tgl_lahir']);
        }

        Tentor::create($validated);

        return redirect()->route('tentors.index')->with('success', 'Tentor berhasil ditambahkan.');
    }

    public function show(Tentor $tentor)
    {
        return view('tentor.show', compact('tentor'));
    }

    public function edit(Tentor $tentor)
    {
        return view('tentor.edit', compact('tentor'));
    }

    public function update(Request $request, Tentor $tentor)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'email' => 'required|email|unique:ai_tentor,email,' . $tentor->id,
            'password' => 'nullable|min:6',
            'mapel' => 'required|string|in:Bahasa Inggris,Matematika',
            'wa' => 'required|string|max:20',
            'aktif' => 'required|boolean',
            'alamat' => 'nullable|string',
            'tempat_lahir' => 'nullable|string|max:255',
            'tgl_lahir' => 'nullable|date',
            'tahun_lulus' => 'nullable|string|max:10',
            'pendidikan_terakhir' => 'nullable|string|max:255',
            'ket_pendidikan' => 'nullable|string',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        if (!empty($validated['tgl_lahir'])) {
            $validated['tgl_lahir'] = strtotime($validated['tgl_lahir']);
        }

        $tentor->update($validated);

        return redirect()->route('tentors.index')->with('success', 'Tentor berhasil diperbarui.');
    }

    public function destroy(Tentor $tentor)
    {
        $tentor->delete();
        return redirect()->route('tentors.index')->with('success', 'Tentor berhasil dihapus.');
    }
}
