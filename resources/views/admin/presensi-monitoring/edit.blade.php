@extends('layouts.admin')

@section('title', 'Ubah Monitoring')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <a href="{{ route('presensi-monitoring.index') }}"
                class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Ubah Data Log Monitoring</h1>
            <p class="text-slate-400">Memperbarui tanggal monitoring yang telah dicatat.</p>
        </div>
    </div>

    <div
        class="max-w-2xl bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl shadow-xl overflow-hidden p-8">
        <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-6 p-4 bg-slate-900/50 rounded-xl border border-slate-700/50">
            <div>
                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1">Tentor</label>
                <div class="text-blue-400 font-bold uppercase tracking-wide">{{ $log->tentor->nama }}</div>
            </div>
            <div>
                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1">Siswa</label>
                <div class="text-emerald-400 font-bold uppercase tracking-wide">{{ $log->siswa->firstname }}</div>
            </div>
        </div>

        <form action="{{ route('presensi-monitoring.update', $log->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-8">
                <label class="block text-sm font-medium text-slate-300 mb-2">Tanggal Monitoring</label>
                <input type="date" name="tgl_monitoring" required value="{{ date('Y-m-d', $log->tgl_monitoring) }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                <p class="mt-2 text-xs text-slate-500 italic">* Ubah hanya jika data pada saat input salah.</p>
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="flex-1 px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-1">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection