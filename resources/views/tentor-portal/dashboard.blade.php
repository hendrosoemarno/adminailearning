@extends('layouts.admin')

@section('title', 'Tentor Dashboard')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Portal Pengajar</h1>
        <p class="text-slate-400">Selamat datang, <span class="text-blue-400">{{ $tentor->nama }}</span>. Berikut adalah
            ringkasan akun Anda.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Stat Card 1 -->
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center text-blue-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
            </div>
            <p class="text-slate-400 text-sm font-medium uppercase tracking-wider">Mata Pelajaran</p>
            <h3 class="text-2xl font-bold text-white mt-1">{{ $tentor->mapel }}</h3>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
            </div>
            <p class="text-slate-400 text-sm font-medium uppercase tracking-wider">Status Akun</p>
            <h3 class="text-2xl font-bold text-emerald-400 mt-1 uppercase">{{ $tentor->aktif ? 'Aktif' : 'Non-Aktif' }}</h3>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center text-purple-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                        </path>
                    </svg>
                </div>
            </div>
            <p class="text-slate-400 text-sm font-medium uppercase tracking-wider">WhatsApp</p>
            <h3 class="text-2xl font-bold text-white mt-1">{{ $tentor->wa }}</h3>
        </div>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl shadow-xl overflow-hidden">
        <div class="p-8">
            <h2 class="text-xl font-bold text-white mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Informasi Lengkap Profil
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest">Email</label>
                    <p class="text-slate-300 mt-1">{{ $tentor->email }}</p>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest">Nama Panggilan</label>
                    <p class="text-slate-300 mt-1">{{ $tentor->nickname }}</p>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest">Tempat/Tgl Lahir</label>
                    <p class="text-slate-300 mt-1">{{ $tentor->tempat_lahir }},
                        {{ $tentor->tgl_lahir ? date('d F Y', (int) $tentor->tgl_lahir) : '-' }}</p>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest">Pendidikan</label>
                    <p class="text-slate-300 mt-1">{{ $tentor->pendidikan_terakhir }} (Lulus {{ $tentor->tahun_lulus }})</p>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-slate-700/50">
                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest">Alamat</label>
                <p class="text-slate-300 mt-2 leading-relaxed">{{ $tentor->alamat ?: 'Data alamat belum diisi.' }}</p>
            </div>
        </div>
    </div>
@endsection