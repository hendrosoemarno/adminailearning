@extends('layouts.admin')

@section('title', 'Ubah Profil Tentor')

@section('content')
    <div class="mb-8">
        <a href="{{ route('tentor.dashboard') }}"
            class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Dashboard
        </a>
        <h1 class="text-3xl font-bold text-white tracking-tight">Ubah Profil Pengajar</h1>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl shadow-xl overflow-hidden">
        <form action="{{ route('tentor.profile.update') }}" method="POST" class="p-6 md:p-8 space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                <!-- Column 1: Basic Info -->
                <div class="space-y-5">
                    <h2 class="text-lg font-bold text-blue-400 border-b border-slate-700 pb-2 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Informasi Dasar
                    </h2>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Nama
                            Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $tentor->nama) }}" required
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label
                            class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Nickname</label>
                        <input type="text" name="nickname" value="{{ old('nickname', $tentor->nickname) }}" required
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Email
                            Address</label>
                        <input type="email" name="email" value="{{ old('email', $tentor->email) }}" required
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label
                            class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">WhatsApp</label>
                        <input type="text" name="wa" value="{{ old('wa', $tentor->wa) }}" required
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Alamat
                            Lengkap</label>
                        <textarea name="alamat" required rows="3"
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">{{ old('alamat', $tentor->alamat) }}</textarea>
                    </div>
                </div>

                <!-- Column 2: Academic & Security -->
                <div class="space-y-5">
                    <h2 class="text-lg font-bold text-cyan-400 border-b border-slate-700 pb-2 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        Akademik & Keamanan
                    </h2>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Mata
                            Pelajaran</label>
                        <select name="mapel" required
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all cursor-pointer">
                            <option value="bing" {{ old('mapel', $tentor->mapel) == 'bing' ? 'selected' : '' }}>Bahasa Inggris
                            </option>
                            <option value="mat" {{ old('mapel', $tentor->mapel) == 'mat' ? 'selected' : '' }}>Matematika
                            </option>
                            <option value="coding" {{ old('mapel', $tentor->mapel) == 'coding' ? 'selected' : '' }}>Coding
                            </option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Tempat
                                Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $tentor->tempat_lahir) }}"
                                required
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Tgl
                                Lahir</label>
                            <input type="date" name="tgl_lahir"
                                value="{{ old('tgl_lahir', $tentor->tgl_lahir ? date('Y-m-d', (int) $tentor->tgl_lahir) : '') }}"
                                required
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Pendidikan
                                Terakhir</label>
                            <input type="text" name="pendidikan_terakhir"
                                value="{{ old('pendidikan_terakhir', $tentor->pendidikan_terakhir) }}" required
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Tahun
                                Lulus</label>
                            <input type="text" name="tahun_lulus" value="{{ old('tahun_lulus', $tentor->tahun_lulus) }}"
                                required
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Ubah
                            Password <span class="text-[10px] text-slate-600 font-normal ml-1">(Kosongkan jika tidak
                                diubah)</span></label>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="password" name="password" placeholder="Password Baru"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            <input type="password" name="password_confirmation" placeholder="Konfirmasi"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Keterangan
                            Pendidikan</label>
                        <textarea name="ket_pendidikan" required rows="3"
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">{{ old('ket_pendidikan', $tentor->ket_pendidikan) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-700/50 flex justify-end gap-4">
                <button type="reset"
                    class="px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white font-semibold rounded-xl transition-all">
                    Reset Perubahan
                </button>
                <button type="submit"
                    class="px-10 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest">
                    Update Profil Saya
                </button>
            </div>
        </form>
    </div>
@endsection