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
            'mapel' => 'required|string|max:255',
            'wa' => 'required|string|max:20',
        ]);

        $validated['password'] = Hash::make($request->password);
        $validated['aktif'] = 1; // Default to active for new registrations, or change as needed

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

    public function logout(Request $request)
    {
        Auth::guard('tentor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('tentor.login');
    }
}
