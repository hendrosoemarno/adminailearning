@extends('layouts.admin')

@section('title', 'Daftar Kontak Siswa & Kursus')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Daftar Kontak Siswa & Kursus</h1>
            <p class="text-slate-400">Data lengkap siswa, orang tua, dan pengajar AI Learning.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('biaya.billing') }}"
                class="px-4 py-2 bg-slate-800 text-slate-300 hover:text-white rounded-lg border border-slate-700 transition-all font-semibold flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
                Draft Tagihan WA
            </a>
            <a href="{{ route('biaya.index') }}"
                class="px-4 py-2 bg-slate-800 text-slate-300 hover:text-white rounded-lg border border-slate-700 transition-all font-semibold">
                Kembali
            </a>
        </div>
    </div>

    <!-- Search Section -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('biaya.student-list') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="w-full flex-1 flex flex-col gap-1">
                <label for="search" class="text-sm font-medium text-slate-400">Cari Siswa</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search" placeholder="Nama siswa..." value="{{ $search }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
                </div>
            </div>
            <button type="submit"
                class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg transition-all shadow-lg shadow-blue-500/20">
                Filter
            </button>
        </form>
    </div>

    <!-- Table Section -->
    <div class="bg-slate-800/40 border border-slate-700 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/60 border-b border-slate-700">
                        <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Siswa</th>
                        <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Orang Tua</th>
                        <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-widest">WhatsApp</th>
                        <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Kursus</th>
                        <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Tentor</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($studentData as $data)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-5">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 text-sm font-bold">
                                        {{ substr($data->nama_siswa, 0, 1) }}
                                    </div>
                                    <span class="text-white font-medium">{{ $data->nama_siswa }}</span>
                                </div>
                            </td>
                            <td class="p-5 text-slate-300 text-sm">
                                {{ $data->nama_ortu }}
                            </td>
                            <td class="p-5">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $data->wa_ortu) }}" target="_blank"
                                    class="text-emerald-400 font-mono text-sm hover:underline flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                    </svg>
                                    {{ $data->wa_ortu }}
                                </a>
                            </td>
                            <td class="p-5">
                                <div class="flex flex-wrap gap-1">
                                    @foreach(explode(', ', $data->kursus) as $k)
                                        <span
                                            class="px-2 py-1 bg-slate-700 text-slate-300 rounded text-[10px] font-bold uppercase tracking-wider">
                                            {{ $k }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="p-5 text-slate-400 text-sm italic">
                                {{ $data->tentor }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-20 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-slate-600 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-slate-500">Tidak ada data ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection