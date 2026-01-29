@extends('layouts.admin')

@section('title', 'Tambah Tarif Baru')

@section('content')
    <div class="mb-8">
        <a href="{{ route('tarifs.index') }}"
            class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Tambah Tarif Baru</h1>
        <p class="text-slate-400">Silakan isi detail pembagian tarif di bawah ini.</p>
    </div>

    <div class="max-w-2xl bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl shadow-xl p-8">
        <form action="{{ route('tarifs.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Mata Pelajaran</label>
                        <select name="mapel" required
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all cursor-pointer">
                            <option value="">Umum / Semua</option>
                            <option value="mat">Matematika</option>
                            <option value="bing">Bahasa Inggris</option>
                            <option value="coding">Coding</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Kode</label>
                        <input type="text" name="kode" required placeholder="Contoh: T100"
                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                    </div>
                </div>

                <div class="p-6 bg-slate-900/50 rounded-xl border border-slate-700/50 space-y-6">
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-700 pb-2">
                        Rincian Pembagian (Rp)</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label
                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Aplikasi</label>
                            <input type="number" name="aplikasi" required value="0"
                                class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-sm text-emerald-400 font-bold focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Manajemen</label>
                            <input type="number" name="manajemen" required value="0"
                                class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-sm text-amber-400 font-bold focus:outline-none focus:ring-2 focus:ring-amber-500 transition-all">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Tentor</label>
                            <input type="number" name="tentor" required value="0"
                                class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-sm text-blue-400 font-bold focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>
                    </div>
                </div>

                <div class="flex pt-4">
                    <button type="submit"
                        class="w-full px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-1">
                        Simpan Tarif Baru
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection