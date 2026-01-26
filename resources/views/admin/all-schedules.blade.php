@extends('layouts.admin')

@section('title', 'Seluruh Jadwal Tentor')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Master Jadwal Mengajar</h1>
        <p class="text-slate-400">Tampilan seluruh tentor yang memiliki siswa terjadwal.</p>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl mb-12 overflow-hidden">
        <div class="overflow-auto rounded-xl max-h-[calc(100vh-200px)]">
            <table class="w-full text-left border-collapse">
                <thead class="sticky top-0 z-30 shadow-lg">
                    <tr class="bg-slate-900 border-b border-slate-700">
                        <th class="p-2 w-16 text-[9px] font-bold text-slate-400 uppercase tracking-wider border-r border-slate-700/50 bg-slate-900 text-center whitespace-nowrap">
                            Waktu</th>
                        @foreach($hariLabels as $index => $label)
                            <th class="p-2 text-[9px] font-bold text-slate-400 uppercase tracking-wider bg-slate-900 text-center whitespace-nowrap">{{ $label }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($waktus as $waktu)
                        <tr class="hover:bg-slate-700/10 transition-colors border-b border-slate-700/30">
                            <td class="p-2 w-20 text-[10px] font-bold text-slate-500 bg-slate-900/30 border-r border-slate-700/50 font-mono text-center">
                                {{ $waktu->waktu }}
                            </td>
                            @for($hari = 1; $hari <= 7; $hari++)
                                <td class="p-1 align-top border-r border-slate-700/30 max-w-[120px]">
                                    @php $items = $mappedSchedule[$hari][$waktu->id] ?? []; @endphp
                                    @if(count($items) > 0)
                                        <div class="flex flex-col gap-1">
                                            @foreach($items as $item)
                                                <div class="bg-blue-500/10 border border-blue-500/20 px-1.5 py-0.5 rounded text-[8px] group">
                                                    <div class="flex items-center justify-between gap-1 overflow-hidden">
                                                        <span class="text-blue-400 font-bold leading-tight truncate">
                                                            {{ $item->tentor->nickname ?? '?' }}-{{ $item->siswa->firstname ?? '?' }}
                                                        </span>
                                                        @if($item->linkJadwal)
                                                        <a href="{{ $item->linkJadwal->link }}" target="_blank" class="text-slate-500 hover:text-white flex-shrink-0">
                                                            <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                        </a>
                                                        @endif
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