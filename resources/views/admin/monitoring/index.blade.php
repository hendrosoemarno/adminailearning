@extends('layouts.admin')

@section('title', 'Monitoring Jadwal')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Monitoring Jadwal</h1>
            <p class="text-slate-400">Menampilkan daftar tentor dan siswa yang sedang dalam pantauan monitoring.</p>
        </div>
        
        <div class="flex flex-col md:flex-row items-center gap-4">
            <form id="admin-filter-form" action="{{ route('monitoring.index') }}" method="GET" class="w-full md:w-auto">
                <div class="relative group">
                    <select name="admin_id" onchange="this.form.submit()" 
                        class="w-full md:w-64 bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-sm font-bold text-slate-200 outline-none focus:ring-2 focus:ring-blue-500 transition-all appearance-none cursor-pointer">
                        @foreach($admins as $admin)
                            <option value="{{ $admin->id }}" {{ $selectedAdminId == $admin->id ? 'selected' : '' }}>
                                MONITORING: {{ strtoupper($admin->nama) }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-500 group-hover:text-blue-500 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </form>

            <a href="{{ route('monitoring.edit') }}"
                class="w-full md:w-auto inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                Ubah Jadwal Saya
            </a>
        </div>
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
                                {{ $label }}
                            </th>
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
                                                    class="bg-amber-500/10 border border-amber-500/20 px-1.5 py-0.5 rounded text-[9px] group">
                                                    <div class="flex items-center justify-between gap-1 overflow-hidden">
                                                        <span
                                                            class="text-amber-400 font-bold leading-tight truncate uppercase tracking-wider">
                                                            {{ $item->tentor->nickname ?? '?' }}-{{ $item->siswa->firstname ?? '?' }}
                                                        </span>
                                                        @if($item->meeting_link)
                                                        <a href="{{ $item->meeting_link }}" target="_blank" class="text-slate-500 hover:text-white flex-shrink-0">
                                                            <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
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