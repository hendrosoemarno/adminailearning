@extends('layouts.admin')

@section('title', 'Slip Gaji Tentor')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Gaji Tentor: {{ $tentor->nama }}</h1>
            <p class="text-slate-400">Rincian realisasi KBM dan gaji berdasarkan presensi bulanan.</p>
        </div>
        <div class="flex items-center gap-4">
            <form method="GET" action="{{ route('biaya.salary', $tentor) }}" class="flex items-center gap-2">
                <input type="month" name="month" value="{{ $month }}" onchange="this.form.submit()"
                    class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
            </form>
            <a href="{{ route('biaya.salary.export', array_merge(['tentor' => $tentor->id], request()->query())) }}"
                class="px-4 py-2 bg-emerald-600/10 text-emerald-500 hover:bg-emerald-600 hover:text-white rounded-lg border border-emerald-600/20 transition-all font-semibold flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export CSV
            </a>
            <a href="{{ route('biaya.index') }}"
                class="px-4 py-2 bg-slate-800 text-slate-300 hover:text-white rounded-lg border border-slate-700 transition-all">
                Kembali
            </a>
        </div>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700">
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'id', 'direction' => ($sort == 'id' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                User ID
                                @if($sort == 'id')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'firstname', 'direction' => ($sort == 'firstname' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Nama Siswa
                                @if($sort == 'firstname')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'materi', 'direction' => ($sort == 'materi' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Materi
                                @if($sort == 'materi')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'paket', 'direction' => ($sort == 'paket' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Paket
                                @if($sort == 'paket')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'gaji', 'direction' => ($sort == 'gaji' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Gaji
                                @if($sort == 'gaji')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'rencana_kbm', 'direction' => ($sort == 'rencana_kbm' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Rencana KBM
                                @if($sort == 'rencana_kbm')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Perhitungan</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-center">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'realisasi_kbm', 'direction' => ($sort == 'realisasi_kbm' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Realisasi KBM
                                @if($sort == 'realisasi_kbm')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'total', 'direction' => ($sort == 'total' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Total
                                @if($sort == 'total')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'total_meet', 'direction' => ($sort == 'total_meet' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Total Meet
                                @if($sort == 'total_meet')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($siswas as $siswa)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4 text-sm font-mono text-slate-400">#{{ $siswa->id }}</td>
                            <td class="p-4">
                                <div class="font-medium text-white">{{ $siswa->firstname }} {{ $siswa->lastname }}</div>
                                <div class="text-xs text-slate-500">{{ $siswa->username }}</div>
                            </td>
                            <td class="p-4 text-sm text-slate-300">{{ $siswa->materi }}</td>
                            <td class="p-4 text-sm font-mono text-blue-400 font-bold">{{ $siswa->paket }}</td>
                            <td class="p-4 text-sm text-white">Rp {{ number_format($siswa->gaji, 0, ',', '.') }}</td>
                            <td class="p-4 text-sm text-slate-400 italic">{{ $siswa->rencana_kbm }}</td>
                            <td class="p-4 text-sm text-slate-500">{{ $siswa->perhitungan }}</td>
                            <td class="p-4 text-center">
                                @php
                                    $bgColor = 'bg-slate-700/50 text-slate-400';
                                    if ($siswa->realisasi_kbm < ($siswa->total_meet * 0.5)) {
                                        $bgColor = 'bg-red-500/10 text-red-500 border border-red-500/20';
                                    } elseif ($siswa->realisasi_kbm < $siswa->total_meet) {
                                        $bgColor = 'bg-amber-500/10 text-amber-500 border border-amber-500/20';
                                    } elseif ($siswa->realisasi_kbm >= $siswa->total_meet && $siswa->total_meet > 0) {
                                        $bgColor = 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20';
                                    }
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $bgColor }}">
                                    {{ $siswa->realisasi_kbm }}
                                </span>
                            </td>
                            <td class="p-4 text-sm text-white font-bold">Rp {{ number_format($siswa->total, 0, ',', '.') }}</td>
                            <td class="p-4">
                                <span class="text-xs text-slate-400 whitespace-nowrap bg-slate-700/50 px-2 py-1 rounded">
                                    {{ $siswa->total_meet }} Pertemuan
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="p-12 text-center text-slate-500">
                                Tidak ada data siswa untuk tentor ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @if(count($siswas) > 0)
                    <tfoot class="bg-slate-900/30">
                        <tr>
                            <td colspan="8" class="p-4 text-right font-bold text-slate-400 uppercase tracking-wider">Total Gaji
                                Bulan Ini</td>
                            <td class="p-4 text-lg font-bold text-emerald-400">
                                Rp {{ number_format($siswas->sum('total'), 0, ',', '.') }}
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>
@endsection