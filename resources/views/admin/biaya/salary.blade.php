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
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Nama Siswa</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Materi</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Paket</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Gaji</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Rencana KBM</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-center">Realisasi KBM
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Perhitungan</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Total</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Total Meet</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($siswas as $siswa)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4">
                                <div class="font-medium text-white">{{ $siswa->firstname }} {{ $siswa->lastname }}</div>
                                <div class="text-xs text-slate-500">{{ $siswa->username }}</div>
                            </td>
                            <td class="p-4 text-sm text-slate-300">{{ $siswa->materi }}</td>
                            <td class="p-4 text-sm font-mono text-blue-400 font-bold">{{ $siswa->paket }}</td>
                            <td class="p-4 text-sm text-white">Rp {{ number_format($siswa->gaji, 0, ',', '.') }}</td>
                            <td class="p-4 text-sm text-slate-400 italic">{{ $siswa->rencana_kbm }}</td>
                            <td class="p-4 text-center">
                                <span
                                    class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-3 py-1 rounded-full text-xs font-bold">
                                    {{ $siswa->realisasi_kbm }}
                                </span>
                            </td>
                            <td class="p-4 text-sm text-slate-500">{{ $siswa->perhitungan }}</td>
                            <td class="p-4 text-sm text-white font-bold">Rp {{ number_format($siswa->total, 0, ',', '.') }}</td>
                            <td class="p-4">
                                <span class="text-xs text-slate-400 whitespace-nowrap bg-slate-700/50 px-2 py-1 rounded">
                                    {{ $siswa->total_meet }} Pertemuan
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="p-12 text-center text-slate-500">
                                Tidak ada data siswa untuk tentor ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @if(count($siswas) > 0)
                    <tfoot class="bg-slate-900/30">
                        <tr>
                            <td colspan="7" class="p-4 text-right font-bold text-slate-400 uppercase tracking-wider">Total Gaji
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