@extends('layouts.admin')

@section('title', 'Riwayat Perubahan Tarif')

@section('content')
    <div class="mb-8">
        <a href="{{ route('tarifs.index') }}"
            class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Riwayat Perubahan Tarif</h1>
        <p class="text-slate-400">Daftar seluruh aktivitas penambahan, perubahan, dan penghapusan data tarif.</p>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700">
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Waktu</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Aksi</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Admin</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Detail Tarif</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Nilai (Rp)
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($logs as $log)
                        <tr class="hover:bg-slate-700/20 transition-colors group">
                            <td class="p-4">
                                <div class="text-sm font-medium text-slate-300">{{ date('d M Y', $log->tgl_ubah) }}</div>
                                <div class="text-[10px] text-slate-500 font-mono">{{ date('H:i:s', $log->tgl_ubah) }}</div>
                            </td>
                            <td class="p-4">
                                @php
                                    $bgColor = $log->tipe_ubah == 'insert' ? 'bg-emerald-500/10 border-emerald-500/20 text-emerald-400' :
                                        ($log->tipe_ubah == 'update' ? 'bg-blue-500/10 border-blue-500/20 text-blue-400' :
                                            'bg-red-500/10 border-red-500/20 text-red-400');
                                @endphp
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded border text-[10px] font-bold uppercase tracking-wider {{ $bgColor }}">
                                    {{ $log->tipe_ubah }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="text-xs font-bold text-slate-300 uppercase">{{ $log->admin->nama ?? '-' }}</div>
                            </td>
                            <td class="p-4">
                                <div class="flex flex-col gap-1">
                                    <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">
                                        MAPEL: <span class="text-slate-300">{{ $log->mapel ?: 'UMUM' }}</span> | KODE: <span
                                            class="text-slate-300">{{ $log->kode }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 text-right">
                                <div class="space-y-1">
                                    <div class="text-[10px]"><span class="text-slate-500 uppercase">Apl:</span> <span
                                            class="text-emerald-400 font-mono">Rp
                                            {{ number_format($log->aplikasi, 0, ',', '.') }}</span></div>
                                    <div class="text-[10px]"><span class="text-slate-500 uppercase">Man:</span> <span
                                            class="text-amber-400 font-mono">Rp
                                            {{ number_format($log->manajemen, 0, ',', '.') }}</span></div>
                                    <div class="text-[10px]"><span class="text-slate-500 uppercase">Tnt:</span> <span
                                            class="text-blue-400 font-mono">Rp
                                            {{ number_format($log->tentor, 0, ',', '.') }}</span></div>
                                    <div class="pt-1 border-t border-slate-700/50 font-bold text-white text-xs">Rp
                                        {{ number_format($log->aplikasi + $log->manajemen + $log->tentor, 0, ',', '.') }}</div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center text-slate-500">
                                <span class="text-lg">Belum ada riwayat aktivitas.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection