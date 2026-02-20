@extends('layouts.admin')

@section('title', 'Edit Data User')

@section('content')
    <div class="mb-8">
        <a href="{{ route('dashboard') }}"
            class="text-blue-400 hover:text-blue-300 flex items-center gap-2 mb-4 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Daftar User
        </a>
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Edit Detail User</h1>
        <p class="text-slate-400">Pembaruan data untuk: <span class="text-blue-400 font-semibold">{{ $user->firstname }}
                {{ $user->lastname }}</span> ({{ $user->username }})</p>
    </div>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl p-6 shadow-lg">
                    <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Informasi Pribadi
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Nama Lengkap Siswa</label>
                            <input type="text" name="nama"
                                value="{{ old('nama', $detil->nama ?? ($user->firstname . ' ' . $user->lastname)) }}"
                                required
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Nama Panggilan (Nickname)</label>
                            <input type="text" name="nickname" value="{{ old('nickname', $detil->nickname) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $detil->tempat_lahir) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $detil->tgl_lahir) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Jenis Kelamin</label>
                            <select name="gender"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                                <option value="">Pilih</option>
                                <option value="L" {{ old('gender', $detil->gender) == 'L' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="P" {{ old('gender', $detil->gender) == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Agama</label>
                            <input type="text" name="agama" value="{{ old('agama', $detil->agama) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                    </div>

                    <div class="mt-6 space-y-1">
                        <label class="text-sm font-medium text-slate-400">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3"
                            class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">{{ old('alamat', $detil->alamat) }}</textarea>
                    </div>
                </div>

                <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl p-6 shadow-lg">
                    <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        Pendidikan & Kontak
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah', $detil->nama_sekolah) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Kelas</label>
                            <input type="text" name="kelas" value="{{ old('kelas', $detil->kelas) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Nama Orang Tua</label>
                            <input type="text" name="nama_ortu" value="{{ old('nama_ortu', $detil->nama_ortu) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">WhatsApp Orang Tua</label>
                            <input type="text" name="wa_ortu" value="{{ old('wa_ortu', $detil->wa_ortu) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="space-y-6">
                <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl p-6 shadow-lg">
                    <h2 class="text-lg font-bold text-white mb-6">Sistem</h2>

                    <div class="space-y-4">
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Kelompok</label>
                            <input type="text" name="kelompok" value="{{ old('kelompok', $detil->kelompok) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Nama Perekomendasi</label>
                            <input type="text" name="nama_perekom" value="{{ old('nama_perekom', $detil->nama_perekom) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-400">Tanggal Daftar</label>
                            <input type="date" name="tgl_daftar" value="{{ old('tgl_daftar', $detil->tgl_daftar) }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                    </div>
                </div>

                <div class="p-2">
                    <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-bold rounded-xl shadow-xl shadow-blue-500/20 transition-all transform hover:-translate-y-1 active:scale-95">
                        Simpan Perubahan
                    </button>
                    <p class="text-[10px] text-slate-500 text-center mt-4 uppercase tracking-widest font-bold">Terakhir
                        diperbarui: -</p>
                </div>
            </div>
        </div>
    </form>
@endsection