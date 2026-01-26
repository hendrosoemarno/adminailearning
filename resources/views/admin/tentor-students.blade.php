@extends('layouts.admin')

@section('title', 'Kelola Siswa')

@section('content')
    <div class="mb-8">
        <a href="{{ route('tentor-siswa.active') }}"
            class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Daftar Tentor
        </a>
        <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Kelola Siswa: <span
                class="text-blue-400">{{ $tentor->nama }}</span></h1>
        <p class="text-slate-400">Hubungkan atau lepaskan siswa dari tentor ini.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Bagian 1: Seluruh Siswa Aktif -->
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <span
                        class="w-8 h-8 bg-blue-500/10 text-blue-500 rounded-lg flex items-center justify-center mr-3 text-sm">1</span>
                    Daftar Siswa Aktif
                </h2>
                <span
                    class="px-3 py-1 bg-slate-800 text-slate-400 text-xs rounded-full border border-slate-700">{{ $availableStudents->count() }}
                    Tersedia</span>
            </div>

            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl overflow-hidden">
                <!-- Inner Search for Students -->
                <div class="p-4 border-b border-slate-700 bg-slate-900/30">
                    <form method="GET" action="{{ route('tentor-siswa.manage', $tentor) }}" class="relative">
                        <input type="text" name="student_search" placeholder="Cari siswa..."
                            value="{{ $studentSearch ?? '' }}"
                            class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-sm text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        @if($studentSearch)
                            <a href="{{ route('tentor-siswa.manage', $tentor) }}"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-500 hover:text-slate-300">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        @endif
                    </form>
                </div>

                <div class="max-h-[600px] overflow-y-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead class="sticky top-0 bg-slate-900 shadow-md z-10">
                            <tr>
                                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Nama Lengkap</th>
                                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-widest text-right">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700/50">
                            @forelse($availableStudents as $siswa)
                                <tr class="hover:bg-slate-700/20 transition-colors">
                                    <td class="p-4">
                                        <div class="font-medium text-slate-200">{{ $siswa->firstname }} {{ $siswa->lastname }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ $siswa->username }}</div>
                                    </td>
                                    <td class="p-4 text-right">
                                        <form action="{{ route('tentor-siswa.add', $tentor) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                            <button type="submit"
                                                class="p-2 text-emerald-400 hover:bg-emerald-400/10 rounded-lg transition-all"
                                                title="Tambahkan Siswa">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="p-8 text-center text-slate-500 italic">Tidak ada siswa lainnya.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Bagian 2: Siswa Terhubung -->
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <span
                        class="w-8 h-8 bg-purple-500/10 text-purple-500 rounded-lg flex items-center justify-center mr-3 text-sm">2</span>
                    Siswa Terhubung
                </h2>
                <span
                    class="px-3 py-1 bg-purple-500/10 text-purple-400 text-xs rounded-full border border-purple-500/20">{{ $assignedStudents->count() }}
                    Terhubung</span>
            </div>

            <div
                class="bg-slate-800/50 backdrop-blur-sm border border-purple-500/10 rounded-xl shadow-xl overflow-hidden ring-1 ring-purple-500/20">
                <div class="max-h-[600px] overflow-y-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead class="sticky top-0 bg-slate-900 shadow-md z-10">
                            <tr>
                                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Nama Lengkap</th>
                                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-widest text-right">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700/50">
                            @forelse($assignedStudents as $siswa)
                                <tr class="hover:bg-purple-500/5 transition-colors">
                                    <td class="p-4">
                                        <div class="font-bold text-purple-300">{{ $siswa->firstname }} {{ $siswa->lastname }}
                                        </div>
                                        <div class="text-xs text-slate-500">{{ $siswa->username }}</div>
                                    </td>
                                    <td class="p-4 text-right">
                                        <form action="{{ route('tentor-siswa.remove', $tentor) }}" method="POST"
                                            onsubmit="return confirm('Lepaskan siswa ini dari tentor?')">
                                            @csrf
                                            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                            <button type="submit"
                                                class="p-2 text-red-400 hover:bg-red-400/10 rounded-lg transition-all"
                                                title="Keluarkan Siswa">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="p-12 text-center text-slate-500 italic">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 mb-3 opacity-20" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                                </path>
                                            </svg>
                                            Belum ada siswa yang terhubung.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('styles')
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }
    </style>
@endsection