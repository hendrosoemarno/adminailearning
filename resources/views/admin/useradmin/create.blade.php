@extends('layouts.admin')

@section('title', 'Tambah Admin')

@section('content')
    <div class="mb-8">
        <a href="{{ route('useradmins.index') }}"
            class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-bold text-white tracking-tight">Tambah Admin Baru</h1>
        <p class="text-slate-400">Silakan lengkapi data untuk membuat akun administrator baru.</p>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('useradmins.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl p-8 shadow-xl space-y-6">
                <!-- Nama -->
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" required value="{{ old('nama') }}" placeholder="Masukkan nama lengkap..."
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500/50 outline-none transition-all placeholder:text-slate-600">
                </div>

                <!-- Username -->
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Username</label>
                    <input type="text" name="username" required value="{{ old('username') }}"
                        placeholder="Masukkan username unik..."
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500/50 outline-none transition-all placeholder:text-slate-600">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Password</label>
                    <input type="password" name="password" required
                        placeholder="Pilih password yang kuat (min 6 karakter)..."
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500/50 outline-none transition-all placeholder:text-slate-600">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-2">
                <button type="submit"
                    class="flex-1 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-1 active:scale-[0.98]">
                    Simpan Admin
                </button>
                <a href="{{ route('useradmins.index') }}"
                    class="px-8 py-4 bg-slate-800 text-slate-400 font-bold rounded-xl hover:bg-slate-700 transition-colors text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection