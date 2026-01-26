@extends('layouts.admin')

@section('title', $title)

@section('content')
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">{{ $title }}</h1>
            <p class="text-slate-400">Menampilkan seluruh tentor yang berstatus <b>Bisa</b> pada jam tersebut.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('tentor-siswa.available', ['mapel' => 'mat']) }}"
                class="px-4 py-2 rounded-lg text-sm font-bold transition-all {{ $mapel == 'mat' ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-800 text-slate-400 hover:bg-slate-700' }}">
                Matematika
            </a>
            <a href="{{ route('tentor-siswa.available', ['mapel' => 'bing']) }}"
                class="px-4 py-2 rounded-lg text-sm font-bold transition-all {{ $mapel == 'bing' ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-800 text-slate-400 hover:bg-slate-700' }}">
                Bahasa Inggris
            </a>
            <a href="{{ route('tentor-siswa.available', ['mapel' => 'coding']) }}"
                class="px-4 py-2 rounded-lg text-sm font-bold transition-all {{ $mapel == 'coding' ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-800 text-slate-400 hover:bg-slate-700' }}">
                Coding
            </a>
        </div>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl mb-12 overflow-hidden">
        <div class="overflow-auto rounded-xl max-h-[calc(100vh-250px)]">
            <table class="w-full text-left border-collapse">
                <thead class="sticky top-0 z-30 shadow-lg">
                    <tr class="bg-slate-900 border-b border-slate-700">
                        <th
                            class="p-2 w-16 text-[9px] font-bold text-slate-400 uppercase tracking-wider border-r border-slate-700/50 bg-slate-900 text-center whitespace-nowrap">
                            Waktu</th>
                        @foreach($hariLabels as $index => $label)
                            <th
                                class="p-2 text-[9px] font-bold text-slate-400 uppercase tracking-wider bg-slate-900 text-center whitespace-nowrap">
                                {{ $label }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($waktus as $waktu)
                        <tr class="hover:bg-slate-700/10 transition-colors border-b border-slate-700/30">
                            <td
                                class="p-2 w-20 text-[10px] font-bold text-slate-500 bg-slate-900/30 border-r border-slate-700/50 font-mono text-center">
                                {{ $waktu->waktu }}
                            </td>
                            @for($hari = 1; $hari <= 7; $hari++)
                                <td class="p-1 align-top border-r border-slate-700/30">
                                    @php $items = $mappedSchedule[$hari][$waktu->id] ?? []; @endphp
                                    @if(count($items) > 0)
                                        <div class="flex flex-col gap-1">
                                            @foreach($items as $item)
                                                <div class="bg-emerald-500 text-slate-950 px-1.5 py-0.5 rounded shadow-sm">
                                                    <div class="text-[8px] font-bold leading-tight uppercase truncate">
                                                        {{ $item->tentor->nickname ?? '?' }}-Bisa
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