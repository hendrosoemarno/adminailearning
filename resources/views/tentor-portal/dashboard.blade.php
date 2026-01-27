@extends('layouts.admin')

@section('title', 'Tentor Dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Portal Pengajar</h1>
            <p class="text-slate-400">Selamat datang, <span class="text-blue-400">{{ $tentor->nama }}</span>. Berikut adalah
                ringkasan akun Anda.</p>
        </div>
        <a href="{{ route('tentor.profile.edit') }}"
            class="inline-flex items-center px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl border border-slate-700 transition-all shadow-lg">
            <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                </path>
            </svg>
            Ubah Profil Saya
        </a>
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
            <h3 class="text-2xl font-bold text-white mt-1">
                @if($tentor->mapel == 'bing') Bahasa Inggris
                @elseif($tentor->mapel == 'mat') Matematika
                @elseif($tentor->mapel == 'coding') Coding
                @else {{ $tentor->mapel }} @endif
            </h3>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-2xl shadow-lg relative group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                </div>
                <a href="{{ route('tentor.presensi.create') }}"
                    class="text-xs font-bold text-blue-400 hover:text-blue-300 transition-colors uppercase tracking-widest">
                    Isi Baru +
                </a>
            </div>
            <p class="text-slate-400 text-sm font-medium uppercase tracking-wider">Total Presensi</p>
            <h3 class="text-2xl font-bold text-white mt-1">{{ $presensiCount }} Sesi</h3>
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
                        {{ $tentor->tgl_lahir ? date('d F Y', (int) $tentor->tgl_lahir) : '-' }}
                    </p>
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