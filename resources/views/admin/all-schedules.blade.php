@extends('layouts.admin')

@section('title', 'Seluruh Jadwal Tentor')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Master Jadwal Mengajar</h1>
        <p class="text-slate-400">Tampilan seluruh tentor yang memiliki siswa terjadwal.</p>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl overflow-hidden mb-12">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse table-fixed min-w-[1000px]">
                <thead>
                    <tr class="bg-slate-900 border-b border-slate-700">
                        <th
                            class="p-4 w-28 text-xs font-bold text-slate-400 uppercase tracking-widest border-r border-slate-700/50">
                            Waktu</th>
                        @foreach($hariLabels as $index => $label)
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $label }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($waktus as $waktu)
                        <tr class="hover:bg-slate-700/10 transition-colors border-b border-slate-700/30">
                            <td
                                class="p-4 text-xs font-bold text-slate-500 bg-slate-900/30 border-r border-slate-700/50 font-mono">
                                {{ $waktu->waktu }}
                            </td>
                            @for($hari = 1; $hari <= 7; $hari++)
                                <td class="p-2 min-h-24 align-top border-r border-slate-700/30">
                                    @php $items = $mappedSchedule[$hari][$waktu->id] ?? []; @endphp
                                    @if(count($items) > 0)
                                        <div class="flex flex-col gap-2">
                                            @foreach($items as $item)
                                                <div class="bg-blue-500/5 border border-blue-500/10 p-2 rounded-lg group">
                                                    <div class="flex flex-col">
                                                        <span class="text-blue-400 text-[10px] font-bold leading-tight flex items-center gap-1">
                                                            {{ $item->tentor->nickname ?? 'Unknown' }}-{{ $item->siswa->firstname ?? 'Unknown' }}
                                                            {{ $item->siswa->lastname ?? '' }}
                                                            @if($item->linkJadwal)
                                                                <a href="{{ $item->linkJadwal->link }}" target="_blank" class="text-slate-500 hover:text-white transition-colors" title="Buka Link">
                                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                                </a>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
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