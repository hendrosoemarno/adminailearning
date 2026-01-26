@extends('layouts.admin')

@section('title', 'Tentor Aktif')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Manajemen Tentor Siswa</h1>
        <p class="text-slate-400">Pilih Tentor Aktif untuk mengelola daftar siswa mereka.</p>
    </div>

    <!-- Search -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('tentor-siswa.active') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="w-full flex-1 flex flex-col gap-1">
                <label for="search" class="text-sm font-medium text-slate-400">Cari Tentor</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search" placeholder="Cari berdasarkan nama atau nickname..."
                        value="{{ request('search') }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>
            </div>
            <div class="w-full md:w-auto flex items-center gap-3 mt-4 md:mt-0">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg transition-all duration-200 shadow-lg shadow-blue-500/20">
                    Filter
                </button>
                @if(request('search'))
                    <a href="{{ route('tentor-siswa.active') }}"
                        class="text-slate-400 hover:text-white text-sm whitespace-nowrap transition-colors py-2">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700">
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Nama Tentor</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Mata Pelajaran</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Jumlah Siswa</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($tentors as $tentor)
                        <tr class="hover:bg-slate-700/20 transition-colors group">
                            <td class="p-4">
                                <div class="font-medium text-white">{{ $tentor->nama }}</div>
                                <div class="text-xs text-slate-500">{{ $tentor->nickname }}</div>
                            </td>
                            <td class="p-4">
                                <span
                                    class="bg-blue-500/10 text-blue-400 border border-blue-500/20 px-2 py-0.5 rounded text-xs uppercase font-semibold">
                                    @if($tentor->mapel == 'bing') Bahasa Inggris
                                    @elseif($tentor->mapel == 'mat') Matematika
                                    @elseif($tentor->mapel == 'coding') Coding
                                    @else {{ $tentor->mapel }} @endif
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center text-slate-300">
                                    <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                    {{ $tentor->siswas_count ?? $tentor->siswas()->count() }} Siswa
                                </div>
                            </td>
                            <td class="p-4 text-right">
                                <a href="{{ route('tentor-siswa.manage', $tentor) }}"
                                    class="inline-flex items-center px-4 py-2 bg-slate-700 hover:bg-blue-600 text-white text-sm font-semibold rounded-lg transition-all group-hover:scale-105">
                                    Kelola Siswa
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center text-slate-500 uppercase tracking-widest text-sm">
                                Tidak ada tentor aktif ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection