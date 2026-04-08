@extends('layouts.admin')

@section('title', 'Hubungan Siswa-Tentor')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Hubungan Siswa-Tentor</h1>
            <p class="text-slate-400">Daftar siswa yang terdaftar dalam kuis/kursus dan tentor pengajarnya.</p>
        </div>
    </div>

    <!-- Tabs -->
    <div class="flex space-x-1 p-1 bg-slate-900/50 backdrop-blur-xl border border-slate-700/50 rounded-xl w-fit">
        <a href="{{ request()->fullUrlWithQuery(['tab' => 'matematika']) }}" 
            class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $tab === 'matematika' ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'text-slate-400 hover:text-white' }}">
            Matematika
        </a>
        <a href="{{ request()->fullUrlWithQuery(['tab' => 'bahasa inggris']) }}" 
            class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $tab === 'bahasa inggris' ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'text-slate-400 hover:text-white' }}">
            Bahasa Inggris
        </a>
        <a href="{{ request()->fullUrlWithQuery(['tab' => 'coding']) }}" 
            class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $tab === 'coding' ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'text-slate-400 hover:text-white' }}">
            Coding
        </a>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead class="bg-slate-900/50 border-b border-slate-700/50 text-slate-400">
                    <tr>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'firstname', 'direction' => ($sort === 'firstname' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                NAMA SISWA
                                @if($sort === 'firstname') <span>{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'tentor_nama', 'direction' => ($sort === 'tentor_nama' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1">
                                TENTOR
                                @if($sort === 'tentor_nama') <span>{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50 text-slate-300">
                    @forelse($data as $item)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4 font-medium text-white">{{ $item->firstname }} {{ $item->lastname }}</td>
                            <td class="p-4">{{ $item->tentor_nama }}</td>
                            <td class="p-4 text-center">
                                <a href="{{ route('siswa-tentor.detail', $item->username) }}" 
                                   class="px-3 py-1 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-lg hover:bg-blue-500/20 transition-all font-medium">
                                    Detail Course
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-12 text-center text-slate-500">Tidak ada data ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
