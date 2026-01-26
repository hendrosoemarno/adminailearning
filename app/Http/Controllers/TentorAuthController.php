<?php

namespace App\Http\Controllers;

use App\Models\Tentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TentorAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.tentor-register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'email' => 'required|email|unique:ai_tentor,email',
            'password' => 'required|min:6|confirmed',
            'mapel' => 'required|string|in:mat,bing,coding',
            'wa' => 'required|string|max:20',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tahun_lulus' => 'required|string|max:10',
            'pendidikan_terakhir' => 'required|string|max:255',
            'ket_pendidikan' => 'required|string',
        ]);

        $validated['password'] = Hash::make($request->password);
        $validated['aktif'] = 1;

        if (!empty($validated['tgl_lahir'])) {
            $validated['tgl_lahir'] = strtotime($validated['tgl_lahir']);
        }

        $tentor = Tentor::create($validated);

        Auth::guard('tentor')->login($tentor);

        return redirect()->route('tentor.dashboard')->with('success', 'Registrasi berhasil. Selamat datang!');
    }

    public function showLoginForm()
    {
        return view('auth.tentor-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('tentor')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('tentor.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $tentor = Auth::guard('tentor')->user();
        return view('tentor-portal.dashboard', compact('tentor'));
    }

    public function editProfile()
    {
        $tentor = Auth::guard('tentor')->user();
        return view('tentor-portal.edit-profile', compact('tentor'));
    }

    public function updateProfile(Request $request)
    {
        $tentor = Auth::guard('tentor')->user();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'email' => 'required|email|unique:ai_tentor,email,' . $tentor->id,
            'password' => 'nullable|min:6|confirmed',
            'mapel' => 'required|string|in:mat,bing,coding',
            'wa' => 'required|string|max:20',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tahun_lulus' => 'required|string|max:10',
            'pendidikan_terakhir' => 'required|string|max:255',
            'ket_pendidikan' => 'required|string',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        if (!empty($validated['tgl_lahir'])) {
            $validated['tgl_lahir'] = strtotime($validated['tgl_lahir']);
        }

        $tentor->update($validated);

        return redirect()->route('tentor.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }

    public function logout(Request $request)
    {
        Auth::guard('tentor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('tentor.login');
    }
}
