@extends('layouts.admin')

@section('title', 'Data Log Monitoring')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Data Log Monitoring</h1>
            <p class="text-slate-400">Riwayat monitoring yang telah dicatat oleh administrator.</p>
        </div>
        <a href="{{ route('presensi-monitoring.create') }}"
            class="inline-flex items-center px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Catat Monitoring Baru
        </a>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700">
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Waktu Input</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Administrator</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Tentor</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Siswa</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Tgl Monitoring</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($logs as $log)
                        <tr class="hover:bg-slate-700/20 transition-colors group">
                            <td class="p-4">
                                <div class="text-sm font-medium text-slate-300">{{ date('d M Y', $log->tgl_input) }}</div>
                                <div class="text-[10px] text-slate-500 font-mono">{{ date('H:i:s', $log->tgl_input) }}</div>
                            </td>
                            <td class="p-4 text-sm text-slate-300 font-bold uppercase tracking-wide">
                                {{ $log->admin->nama ?? '-' }}
                            </td>
                            <td class="p-4 text-sm text-blue-400 font-bold uppercase tracking-wide">
                                {{ $log->tentor->nama ?? '-' }}
                            </td>
                            <td class="p-4 text-sm text-emerald-400 font-bold uppercase tracking-wide">
                                {{ $log->siswa->firstname ?? '-' }}
                            </td>
                            <td class="p-4">
                                <div
                                    class="inline-flex items-center px-3 py-1 bg-amber-500/10 border border-amber-500/20 rounded-full text-xs font-bold text-amber-500 uppercase tracking-tighter">
                                    {{ date('d-m-Y', $log->tgl_monitoring) }}
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('presensi-monitoring.edit', $log->id) }}"
                                        class="p-2 text-slate-400 hover:text-blue-400 transition-colors rounded-lg hover:bg-blue-500/10"
                                        title="Ubah">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('presensi-monitoring.destroy', $log->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus log ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-slate-400 hover:text-red-400 transition-colors rounded-lg hover:bg-red-500/10"
                                            title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-slate-500">
                                <svg class="w-16 h-16 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Belum ada riwayat monitoring.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection