@extends('layouts.admin')

@section('title', 'Jadwal Tentor')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <a href="{{ route('tentor-siswa.active') }}"
                class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar Tentor
            </a>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Jadwal Tentor: <span
                    class="text-blue-400">{{ $tentor->nama }}</span></h1>
            <p class="text-slate-400">Tampilan jadwal mengajar dan ketersediaan waktu.</p>
        </div>
        <a href="{{ route('tentor-siswa.schedule.edit', $tentor) }}" class="inline-flex items-center px-6 py-3 bg-slate-800 hover:bg-slate-700 text-cyan-400 font-bold rounded-xl border border-cyan-500/30 shadow-lg transition-all transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            Edit Jadwal Ini
        </a>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl overflow-hidden mb-12">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse table-fixed">
                <thead class="sticky top-0 z-10">
                    <tr class="bg-slate-900 border-b border-slate-700 shadow-md">
                        <th class="p-4 w-24 text-xs font-bold text-slate-400 uppercase tracking-widest border-r border-slate-700/50 bg-slate-900">Waktu</th>
                        @foreach($hariLabels as $index => $label)
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest bg-slate-900">{{ $label }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($waktus as $waktu)
                        <tr class="hover:bg-slate-700/10 transition-colors border-b border-slate-700/30 font-medium">
                            <td class="p-4 text-sm text-slate-500 bg-slate-900/30 border-r border-slate-700/50">
                                {{ $waktu->waktu }}
                            </td>
                            @for($hari = 1; $hari <= 7; $hari++)
                                <td class="p-2 h-20 align-top border-r border-slate-700/30">
                                    @php $item = $mappedSchedule[$hari][$waktu->id] ?? null; @endphp
                                    @if($item)
                                        @if($item->id_siswa == 1)
                                            <div class="bg-emerald-500 text-slate-950 text-[10px] font-bold px-2 py-1 rounded shadow-sm inline-block w-full">
                                                Bisa
                                            </div>
                                        @else
                                            <div class="flex flex-col gap-1">
                                                <span class="text-blue-400 text-[10px] font-bold leading-tight truncate">
                                                    {{ $item->siswa->firstname ?? 'Unknown' }} {{ $item->siswa->lastname ?? '' }}
                                                </span>
                                                <div class="flex items-center gap-2 mt-1">
                                                    @if($item->linkJadwal)
                                                        <a href="{{ $item->linkJadwal->link }}" target="_blank" class="text-slate-500 hover:text-white transition-colors" title="Buka Link">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
