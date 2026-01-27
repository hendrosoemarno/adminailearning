@extends('layouts.admin')

@section('title', 'Monitoring Jadwal')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Monitoring Jadwal</h1>
            <p class="text-slate-400">Menampilkan daftar tentor dan siswa yang sedang dalam pantauan monitoring.</p>
        </div>
        <a href="{{ route('monitoring.edit') }}"
            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                </path>
            </svg>
            Ubah Jadwal Monitoring
        </a>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl mb-12 overflow-hidden">
        <div class="overflow-auto rounded-xl max-h-[calc(100vh-250px)]">
            <table class="w-full text-left border-collapse table-fixed">
                <thead class="sticky top-0 z-30 shadow-lg">
                    <tr class="bg-slate-900 border-b border-slate-700">
                        <th
                            class="p-2 w-16 text-[9px] font-bold text-slate-400 uppercase tracking-wider border-r border-slate-700/50 bg-slate-900 text-center whitespace-nowrap">
                            Waktu</th>
                        @foreach($hariLabels as $index => $label)
                            <th
                                class="p-2 text-[9px] font-bold text-slate-400 uppercase tracking-wider bg-slate-900 text-center whitespace-nowrap">
                                {{ $label }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($waktus as $waktu)
                        <tr class="hover:bg-slate-700/10 transition-colors border-b border-slate-700/30">
                            <td
                                class="p-2 text-[10px] font-bold text-slate-500 bg-slate-900/30 border-r border-slate-700/50 font-mono text-center">
                                {{ $waktu->waktu }}
                            </td>
                            @for($hari = 1; $hari <= 7; $hari++)
                                <td class="p-1 align-top border-r border-slate-700/30">
                                    @php $items = $mappedSchedule[$hari][$waktu->id] ?? []; @endphp
                                    @if(count($items) > 0)
                                        <div class="flex flex-col gap-1">
                                            @foreach($items as $item)
                                                <div
                                                    class="bg-amber-500/10 border border-amber-500/20 px-1.5 py-0.5 rounded text-[8px] group">
                                                    <div class="flex items-center justify-between gap-1 overflow-hidden">
                                                        <span class="text-amber-400 font-bold leading-tight truncate">
                                                            {{ $item->tentor->nickname ?? '?' }}-{{ $item->siswa->firstname ?? '?' }}
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