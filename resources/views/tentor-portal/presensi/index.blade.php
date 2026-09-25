@extends('layouts.admin')

@section('title', 'Data Presensi Saya')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Presensi Mengajar</h1>
            <p class="text-slate-400">Daftar riwayat presensi KBM yang telah Anda isi.</p>
        </div>
        <a href="{{ route('tentor.presensi.create') }}"
            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Isi Presensi Baru
        </a>
    </div>

    @php
        $sortUrl = function ($col) use ($sort, $direction, $dateFromVal, $dateToVal) {
            $newDirection = ($sort === $col && $direction === 'asc') ? 'desc' : 'asc';
            return route('tentor.presensi.index', [
                'sort' => $col,
                'direction' => $newDirection,
                'date_from' => $dateFromVal,
                'date_to' => $dateToVal,
            ]);
        };
        $sortArrow = function ($col) use ($sort, $direction) {
            if ($sort === $col) {
                return $direction === 'asc' ? '▲' : '▼';
            }
            return '⇅';
        };
    @endphp

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl p-5 mb-6">
        <form method="GET" action="{{ route('tentor.presensi.index') }}" class="flex flex-col md:flex-row md:items-end gap-4">
            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Tanggal Awal</label>
                <input type="date" name="date_from" value="{{ $dateFromVal }}"
                    class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Tanggal Akhir</label>
                <input type="date" name="date_to" value="{{ $dateToVal }}"
                    class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <input type="hidden" name="sort" value="{{ $sort }}">
            <input type="hidden" name="direction" value="{{ $direction }}">
            <div class="flex items-center gap-2">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded-xl transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Terapkan
                </button>
                <a href="{{ route('tentor.presensi.index') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-white text-sm font-bold rounded-xl transition-colors">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 border-b border-slate-700">
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">
                            <a href="{{ $sortUrl('siswa') }}" class="inline-flex items-center gap-1 hover:text-blue-400 transition-colors">Siswa <span class="text-slate-500 text-[10px]">{{ $sortArrow('siswa') }}</span></a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">
                            <a href="{{ $sortUrl('tgl_kbm') }}" class="inline-flex items-center gap-1 hover:text-blue-400 transition-colors">Tanggal KBM <span class="text-slate-500 text-[10px]">{{ $sortArrow('tgl_kbm') }}</span></a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">
                            <a href="{{ $sortUrl('foto') }}" class="inline-flex items-center gap-1 hover:text-blue-400 transition-colors">Bukti Foto <span class="text-slate-500 text-[10px]">{{ $sortArrow('foto') }}</span></a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">
                            <a href="{{ $sortUrl('tgl_input') }}" class="inline-flex items-center gap-1 hover:text-blue-400 transition-colors">Waktu Input <span class="text-slate-500 text-[10px]">{{ $sortArrow('tgl_input') }}</span></a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($presensis as $item)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4 text-sm font-medium text-slate-200">
                                {{ $item->siswa->firstname }} {{ $item->siswa->lastname }}
                                <div class="text-xs text-slate-500">{{ $item->siswa->username }}</div>
                            </td>
                            <td class="p-4 text-sm text-slate-300 text-center">
                                {{ date('d M Y', $item->tgl_kbm) }}
                            </td>
                            <td class="p-4 text-center">
                                @if($item->foto)
                                    <button onclick="showPhoto('{{ $item->foto_url }}')"
                                        class="p-1.5 bg-slate-700 hover:bg-slate-600 rounded-lg transition-colors group">
                                        <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </button>
                                @else
                                    <span class="text-xs text-slate-600 italic">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="p-4 text-xs text-slate-500 text-center">
                                {{ date('d/m/Y H:i', $item->tgl_input) }}
                            </td>
                            <td class="p-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('tentor.presensi.edit', $item->id) }}"
                                        class="p-2 text-slate-400 hover:text-blue-400 transition-colors rounded-lg hover:bg-blue-500/10">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('tentor.presensi.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus presensi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-slate-400 hover:text-red-400 transition-colors rounded-lg hover:bg-red-500/10">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center text-slate-500">
                                <svg class="w-12 h-12 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                                Belum ada data presensi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Photo View -->
    <div id="photo-modal" class="fixed inset-0 bg-black/80 z-[100] hidden items-center justify-center p-8 backdrop-blur-sm"
        onclick="this.classList.add('hidden')">
        <div class="relative max-w-4xl w-full">
            <img id="modal-img" src="" alt="Bukti Foto" class="rounded-xl shadow-2xl mx-auto border-2 border-slate-700">
            <button class="absolute -top-12 right-0 text-white hover:text-slate-300">
                Tutup (Klik dimana saja)
            </button>
        </div>
    </div>

    <script>
        function showPhoto(url) {
            document.getElementById('modal-img').src = url;
            document.getElementById('photo-modal').classList.remove('hidden');
            document.getElementById('photo-modal').classList.add('flex');
        }
    </script>
@endsection