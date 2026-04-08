@extends('layouts.admin')

@section('title', 'Detail Course Siswa')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Detail Course: {{ $student ? $student->firstname . ' ' . $student->lastname : $username }}</h1>
            <p class="text-slate-400">Daftar aktivitas kursus untuk siswa dengan username {{ $username }}.</p>
        </div>
        <a href="{{ route('siswa-tentor.index') }}" class="px-4 py-2 border border-slate-700 hover:bg-slate-800 text-slate-300 rounded-lg transition-all font-medium"> Kembali </a>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead class="bg-slate-900/50 border-b border-slate-700/50 text-slate-400">
                    <tr>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'coursename', 'direction' => ($sort === 'coursename' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                COURSE NAME
                                @if($sort === 'coursename') <span>{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'status_pendaftaran', 'direction' => ($sort === 'status_pendaftaran' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                STATUS
                                @if($sort === 'status_pendaftaran') <span>{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'awal_akses', 'direction' => ($sort === 'awal_akses' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                AWAL AKSES
                                @if($sort === 'awal_akses') <span>{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'terakhir_akses', 'direction' => ($sort === 'terakhir_akses' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                TERAKHIR AKSES
                                @if($sort === 'terakhir_akses') <span>{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold text-center">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'total_interaksi', 'direction' => ($sort === 'total_interaksi' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1">
                                TOTAL INTERAKSI
                                @if($sort === 'total_interaksi') <span>{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50 text-slate-300">
                    @forelse($details as $detail)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4 font-medium text-white">{{ $detail->coursename }}</td>
                            <td class="p-4">
                                <span class="px-2 py-0.5 rounded text-xs font-medium {{ $detail->status_pendaftaran === 'Aktif' ? 'bg-green-400/10 text-green-400' : 'bg-slate-400/10 text-slate-400' }}">
                                    {{ $detail->status_pendaftaran }}
                                </span>
                            </td>
                            <td class="p-4 text-xs font-mono text-slate-400">{{ $detail->awal_akses ?: '-' }}</td>
                            <td class="p-4 text-xs font-mono text-slate-400">{{ $detail->terakhir_akses ?: '-' }}</td>
                            <td class="p-4 text-center font-bold text-amber-400">{{ $detail->total_interaksi }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center text-slate-500">Tidak ada interaksi log ditemukan untuk siswa ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
