<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = AdminUser::query();

        if ($search) {
            $query->where('username', 'like', "%{$search}%")
                ->orWhere('nama', 'like', "%{$search}%");
        }

        $admins = $query->orderBy('nama', 'asc')->get();
        return view('admin.useradmin.index', compact('admins', 'search'));
    }

    public function create()
    {
        return view('admin.useradmin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:ai_useradmin,username|max:255',
            'password' => 'required|string|min:6',
            'nama' => 'required|string|max:255',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        AdminUser::create($validated);

        return redirect()->route('useradmins.index')->with('success', 'Admin baru berhasil ditambahkan.');
    }

    public function edit(AdminUser $useradmin)
    {
        return view('admin.useradmin.edit', ['admin' => $useradmin]);
    }

    public function update(Request $request, AdminUser $useradmin)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:ai_useradmin,username,' . $useradmin->id,
            'password' => 'nullable|string|min:6',
            'nama' => 'required|string|max:255',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $useradmin->update($validated);

        return redirect()->route('useradmins.index')->with('success', 'Data admin berhasil diperbarui.');
    }

    public function destroy(AdminUser $useradmin)
    {
        // Prevent deleting the last admin if necessary, or just allow it.
        // For safety, let's just delete.
        $useradmin->delete();

        return redirect()->route('useradmins.index')->with('success', 'Admin berhasil dihapus.');
    }
}
