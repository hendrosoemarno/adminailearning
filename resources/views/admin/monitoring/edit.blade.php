@extends('layouts.admin')

@section('title', 'Ubah Monitoring')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Ubah Jadwal Monitoring</h1>
            <p class="text-slate-400">Pilih tentor dan siswa yang ingin Anda pantau dalam monitoring.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('monitoring.index') }}" class="px-6 py-3 bg-slate-800 text-slate-400 font-bold rounded-xl hover:bg-slate-700 transition-colors">
                Batal
            </a>
            <button form="monitoring-form" type="submit" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/20 transition-all transform hover:-translate-y-1">
                Simpan Konfigurasi
            </button>
        </div>
    </div>

    <form id="monitoring-form" action="{{ route('monitoring.update') }}" method="POST">
        @csrf
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl mb-12 overflow-hidden">
            <div class="overflow-auto rounded-xl max-h-[calc(100vh-250px)]">
                <table class="w-full text-left border-collapse table-fixed">
                    <thead class="sticky top-0 z-30 shadow-lg">
                        <tr class="bg-slate-900 border-b border-slate-700">
                            <th class="p-2 w-16 text-[9px] font-bold text-slate-400 uppercase tracking-wider border-r border-slate-700/50 bg-slate-900 text-center whitespace-nowrap">Waktu</th>
                            @foreach($hariLabels as $index => $label)
                                <th class="p-2 text-[9px] font-bold text-slate-400 uppercase tracking-wider bg-slate-900 text-center whitespace-nowrap">{{ $label }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @foreach($waktus as $waktu)
                            <tr class="hover:bg-slate-700/10 transition-colors border-b border-slate-700/30">
                                <td class="p-2 text-[10px] font-bold text-slate-500 bg-slate-900/30 border-r border-slate-700/50 font-mono text-center">
                                    {{ $waktu->waktu }}
                                </td>
                                @for($hari = 1; $hari <= 7; $hari++)
                                    <td class="p-1 align-top border-r border-slate-700/30">
                                        @php $items = $mappedAll[$hari][$waktu->id] ?? []; @endphp
                                        @if(count($items) > 0)
                                            <div class="flex flex-col gap-1">
                                                @foreach($items as $item)
                                                    @php $key = "{$hari}-{$waktu->id}-{$item->id_tentor}-{$item->id_siswa}"; @endphp
                                                    <label class="flex items-start gap-1 p-1 bg-slate-900/50 border border-slate-700 rounded-md cursor-pointer hover:border-blue-500/50 transition-all group">
                                                        <input type="checkbox" name="monitor[]" value="{{ $key }}" 
                                                            {{ isset($monitoredKeys[$key]) ? 'checked' : '' }}
                                                            class="mt-0.5 rounded border-slate-600 bg-slate-800 text-blue-500 focus:ring-blue-500/20">
                                                        <span class="text-[7px] font-medium text-slate-400 group-hover:text-blue-400 leading-tight">
                                                            {{ $item->tentor->nickname ?? '?' }}-{{ $item->siswa->firstname ?? '?' }}
                                                        </span>
                                                    </label>
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
    </form>
@endsection
