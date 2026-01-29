@extends('layouts.admin')

@section('title', 'Daftar Tarif')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Kelola Tarif</h1>
            <p class="text-slate-400">Atur pembagian tarif untuk aplikasi, manajemen, dan tentor.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('tarifs.history') }}"
                class="inline-flex items-center px-6 py-3 bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold rounded-xl border border-slate-700 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Riwayat Diubah
            </a>
            <a href="{{ route('tarifs.create') }}"
                class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Tarif Baru
            </a>
        </div>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700">
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Mapel</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Kode</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Aplikasi</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Manajemen
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Tentor</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Total</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($tarifs as $tarif)
                        <tr class="hover:bg-slate-700/20 transition-colors group">
                            <td class="p-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 bg-blue-500/10 border border-blue-500/20 rounded-full text-xs font-bold text-blue-400 uppercase tracking-widest">
                                    {{ $tarif->mapel ?: 'Umum' }}
                                </span>
                            </td>
                            <td class="p-4 text-center font-mono text-slate-300">{{ $tarif->kode }}</td>
                            <td class="p-4 text-center text-emerald-400 font-bold">Rp
                                {{ number_format($tarif->aplikasi, 0, ',', '.') }}</td>
                            <td class="p-4 text-center text-amber-400 font-bold">Rp
                                {{ number_format($tarif->manajemen, 0, ',', '.') }}</td>
                            <td class="p-4 text-center text-blue-400 font-bold">Rp
                                {{ number_format($tarif->tentor, 0, ',', '.') }}</td>
                            <td class="p-4 text-center">
                                <span class="text-white font-bold">Rp
                                    {{ number_format($tarif->aplikasi + $tarif->manajemen + $tarif->tentor, 0, ',', '.') }}</span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('tarifs.edit', $tarif) }}"
                                        class="p-2 text-slate-400 hover:text-blue-400 transition-colors rounded-lg hover:bg-blue-500/10"
                                        title="Ubah">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('tarifs.destroy', $tarif) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus tarif ini? Tindakan ini akan dicatat di log.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-slate-400 hover:text-red-400 transition-colors rounded-lg hover:bg-red-500/10"
                                            title="Hapus">
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
                            <td colspan="7" class="p-12 text-center text-slate-500">
                                <svg class="w-16 h-16 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-lg">Belum ada data tarif.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection