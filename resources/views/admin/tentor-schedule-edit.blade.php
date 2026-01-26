@extends('layouts.admin')

@section('title', 'Edit Jadwal Tentor')

@section('content')
    <div class="mb-8 flex justify-between items-end">
        <div>
            <a href="{{ route('tentor-siswa.schedule', $tentor) }}"
                class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Jadwal
            </a>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Edit Jadwal: <span
                    class="text-blue-400">{{ $tentor->nama }}</span></h1>
            <p class="text-slate-400">Silakan isi atau ubah status di setiap kotak waktu.</p>
        </div>
        <button type="submit" form="schedule-form"
            class="px-8 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-xl shadow-blue-500/20 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest">
            Simpan Perubahan
        </button>
    </div>

    <form id="schedule-form" action="{{ route('tentor-siswa.schedule.update', $tentor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl mb-12">
            <div class="overflow-x-auto rounded-xl">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900 border-b border-slate-700">
                            <th
                                class="sticky top-0 z-30 p-4 w-24 text-xs font-bold text-slate-400 uppercase tracking-widest border-r border-slate-700/50 bg-slate-900">
                                Waktu</th>
                            @foreach($hariLabels as $index => $label)
                                <th
                                    class="sticky top-0 z-30 p-4 text-xs font-bold text-slate-400 uppercase tracking-widest bg-slate-900">
                                    {{ $label }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @foreach($waktus as $waktu)
                            <tr class="hover:bg-slate-700/5 transition-colors border-b border-slate-700/30">
                                <td class="p-4 text-sm text-slate-500 bg-slate-900/30 border-r border-slate-700/50 font-mono">
                                    {{ $waktu->waktu }}
                                </td>
                                @for($hari = 1; $hari <= 7; $hari++)
                                    <td class="p-3 align-top border-r border-slate-700/20">
                                        @php $item = $mappedSchedule[$hari][$waktu->id] ?? null; @endphp
                                        <div class="space-y-2">
                                            <!-- Status / Siswa Dropdown -->
                                            <select name="schedule[{{ $hari }}][{{ $waktu->id }}]"
                                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2 py-1.5 text-[10px] font-bold text-slate-300 outline-none focus:ring-2 focus:ring-blue-500 transition-all cursor-pointer">
                                                <option value="empty" class="text-slate-500 bg-slate-900">-- Kosong --</option>
                                                <option value="1" {{ ($item && $item->id_siswa == 1) ? 'selected' : '' }}
                                                    class="bg-emerald-900 text-emerald-400">BISA (Ready)</option>
                                                <optgroup label="Siswa Tentor Ini" class="bg-slate-850">
                                                    @foreach($students as $s)
                                                        <option value="{{ $s->id }}" {{ ($item && $item->id_siswa == $s->id) ? 'selected' : '' }} class="bg-slate-900 text-blue-400">
                                                            {{ $s->firstname }} {{ $s->lastname }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>

                                            <!-- Meet Link Input -->
                                            <div class="relative group">
                                                <input type="text" name="links[{{ $hari }}][{{ $waktu->id }}]"
                                                    value="{{ $item && $item->linkJadwal ? $item->linkJadwal->link : '' }}"
                                                    placeholder="Link Pertemuan..."
                                                    class="w-full bg-slate-900/50 border border-slate-800 rounded-lg px-2 py-1 text-[9px] text-slate-400 outline-none focus:ring-1 focus:ring-cyan-500 transition-all placeholder-slate-700">
                                                <div
                                                    class="absolute right-2 top-1.5 opacity-30 group-hover:opacity-100 transition-opacity">
                                                    <svg class="w-3 h-3 text-cyan-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="fixed bottom-8 right-8 z-50">
            <button type="submit"
                class="px-10 py-4 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-bold rounded-2xl shadow-2xl shadow-blue-500/40 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest flex items-center">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Simpan Jadwal
            </button>
        </div>
    </form>
@endsection