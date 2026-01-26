@extends('layouts.admin')

@section('title', 'Detail Data Tentor')

@section('content')
    <div class="mb-8">
        <a href="{{ route('tentors.index') }}"
            class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Daftar
        </a>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h1 class="text-3xl font-bold text-white tracking-tight">Detail Tentor: <span
                    class="text-blue-400">{{ $tentor->nama }}</span></h1>
            <div class="flex gap-2">
                <a href="{{ route('tentors.edit', $tentor) }}"
                    class="px-5 py-2 bg-amber-500/10 text-amber-400 border border-amber-500/20 hover:bg-amber-500/20 rounded-lg transition-all font-semibold flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit Data
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Info -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl overflow-hidden shadow-xl">
                <div
                    class="px-6 py-4 bg-slate-900/50 border-b border-slate-700 font-bold text-slate-200 uppercase tracking-wider text-sm flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Informasi Profil
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Nama Lengkap</p>
                        <p class="text-white font-medium text-lg">{{ $tentor->nama }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Nickname</p>
                        <p class="text-slate-300 font-medium text-lg">{{ $tentor->nickname }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Email</p>
                        <p class="text-slate-300">{{ $tentor->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">WhatsApp</p>
                        <p class="text-emerald-400 font-mono">{{ $tentor->wa }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Mata Pelajaran</p>
                        <span
                            class="bg-blue-500/10 text-blue-400 border border-blue-500/20 px-3 py-1 rounded text-sm uppercase font-bold">
                            {{ $tentor->mapel }}
                        </span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Status</p>
                        <span
                            class="px-3 py-1 rounded-full text-xs font-bold border {{ $tentor->aktif ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-red-500/10 text-red-400 border-red-500/20' }}">
                            {{ $tentor->aktif ? 'ACTIVE' : 'INACTIVE' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl overflow-hidden shadow-xl">
                <div
                    class="px-6 py-4 bg-slate-900/50 border-b border-slate-700 font-bold text-slate-200 uppercase tracking-wider text-sm flex items-center">
                    <svg class="w-5 h-5 mr-2 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    Alamat
                </div>
                <div class="p-6">
                    <p class="text-slate-300 leading-relaxed">{{ $tentor->alamat ?: 'Data alamat belum diisi.' }}</p>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="space-y-8">
            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl overflow-hidden shadow-xl">
                <div
                    class="px-6 py-4 bg-slate-900/50 border-b border-slate-700 font-bold text-slate-200 uppercase tracking-wider text-sm flex items-center">
                    <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                    Pendidikan
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Pendidikan Terakhir</p>
                        <p class="text-white">{{ $tentor->pendidikan_terakhir ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Tahun Lulus</p>
                        <p class="text-white">{{ $tentor->tahun_lulus ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Keterangan Tambahan</p>
                        <p class="text-slate-400 text-sm italic">{{ $tentor->ket_pendidikan ?: '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl overflow-hidden shadow-xl">
                <div
                    class="px-6 py-4 bg-slate-900/50 border-b border-slate-700 font-bold text-slate-200 uppercase tracking-wider text-sm flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-1.5-.454M12 11l8-8m-8 8l-8-8m8 8v10M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z">
                        </path>
                    </svg>
                    Kelahiran
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Tempat Lahir</p>
                        <p class="text-white">{{ $tentor->tempat_lahir ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-bold mb-1">Tanggal Lahir</p>
                        <p class="text-white">{{ $tentor->tgl_lahir ? date('d F Y', (int) $tentor->tgl_lahir) : '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection