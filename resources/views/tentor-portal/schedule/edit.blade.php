@extends('layouts.admin')

@section('title', 'Ubah Jadwal Saya')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Ubah Jadwal Saya</h1>
            <p class="text-slate-400">Atur ketersediaan dan link KBM untuk setiap sesi.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('tentor.schedule.index') }}"
                class="px-6 py-3 bg-slate-800 text-slate-400 font-bold rounded-xl hover:bg-slate-700 transition-colors">
                Batal
            </a>
            <button form="schedule-form" type="submit"
                class="px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/20 transition-all transform hover:-translate-y-1">
                Simpan Perubahan
            </button>
        </div>
    </div>

    <form id="schedule-form" action="{{ route('tentor.schedule.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl mb-12 overflow-hidden">
            <div class="overflow-auto rounded-xl max-h-[calc(100vh-250px)]">
                <table class="w-full text-left border-collapse table-fixed">
                    <thead class="sticky top-0 z-30 shadow-lg">
                        <tr class="bg-slate-900 border-b border-slate-700">
                            <th
                                class="p-2 w-16 text-[9px] font-bold text-slate-400 uppercase tracking-wider border-r border-slate-700/50 bg-slate-900 text-center">
                                Waktu</th>
                            @foreach($hariLabels as $index => $label)
                                <th
                                    class="p-2 text-[9px] font-bold text-slate-400 uppercase tracking-wider bg-slate-900 text-center">
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
                                    @php $item = $mappedSchedule[$hari][$waktu->id] ?? null; @endphp
                                    <td class="p-1 align-top border-r border-slate-700/30">
                                        <div class="space-y-1">
                                            <!-- Student Selection -->
                                            <select name="schedule[{{ $hari }}][{{ $waktu->id }}]"
                                                class="w-full bg-slate-900/50 border border-slate-700 rounded-md p-1 text-[8px] text-slate-200 focus:ring-1 focus:ring-blue-500 outline-none cursor-pointer">
                                                <option value="empty" class="bg-slate-900 text-slate-500">KOSONG</option>
                                                <option value="1" {{ ($item && $item->id_siswa == 1) ? 'selected' : '' }}
                                                    class="bg-slate-900 text-emerald-400 font-bold">BISA (Ready)</option>
                                                <optgroup label="Siswa Terhubung" class="bg-slate-900 text-slate-400 font-normal">
                                                    @foreach($students as $student)
                                                        <option value="{{ $student->id }}" {{ ($item && $item->id_siswa == $student->id) ? 'selected' : '' }}>
                                                            {{ $student->firstname }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>

                                            <!-- Link Input -->
                                            <input type="url" name="links[{{ $hari }}][{{ $waktu->id }}]" placeholder="Link..."
                                                value="{{ $item->linkJadwal->link ?? '' }}"
                                                class="w-full bg-slate-800/80 border border-slate-700 rounded-md p-1 text-[8px] text-slate-300 placeholder:text-slate-600 focus:ring-1 focus:ring-cyan-500 outline-none">
                                        </div>
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