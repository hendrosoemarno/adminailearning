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
                                                        <span class="text-blue-400 text-[10px] font-bold leading-tight">
                                                            {{ $item->tentor->nickname ?? 'Unknown' }}-{{ $item->siswa->firstname ?? 'Unknown' }}
                                                            {{ $item->siswa->lastname ?? '' }}
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