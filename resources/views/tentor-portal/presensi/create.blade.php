@extends('layouts.admin')

@section('title', 'Isi Presensi Baru')

@section('content')
    <div class="mb-8">
        <a href="{{ route('tentor.presensi.index') }}"
            class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Riwayat
        </a>
        <h1 class="text-3xl font-bold text-white tracking-tight">Isi Presensi Baru</h1>
        <p class="text-slate-400">Silakan lengkapi data pertemuan di bawah ini.</p>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('tentor.presensi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl p-6 shadow-xl space-y-6">
                <!-- Siswa -->
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Pilih Siswa</label>
                    <select name="id_siswa" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500/50 outline-none transition-all cursor-pointer">
                        <option value="" disabled selected>-- Pilih Siswa --</option>
                        @foreach($siswas as $s)
                            <option value="{{ $s->id }}">{{ $s->firstname }} {{ $s->lastname }} ({{ $s->username }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal KBM -->
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Tanggal Pertemuan</label>
                    <input type="date" name="tgl_kbm" required value="{{ date('Y-m-d') }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500/50 outline-none transition-all">
                </div>

                <!-- Bukti Foto -->
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-2">Bukti Foto Pertemuan</label>
                    <div class="relative group">
                        <input type="file" name="foto" id="foto-input" accept="image/*" required
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div id="foto-placeholder"
                            class="border-2 border-dashed border-slate-700 rounded-xl p-8 text-center group-hover:border-blue-500/50 transition-all bg-slate-900/30">
                            <svg class="w-10 h-10 text-slate-500 mx-auto mb-3 group-hover:text-blue-400 transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <p class="text-sm text-slate-400" id="file-name">Klik atau drag foto ke sini</p>
                            <p class="text-xs text-slate-600 mt-1">Format: JPG, PNG (Maks 2MB)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="flex-1 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-1 active:scale-[0.98]">
                    Simpan Presensi
                </button>
                <a href="{{ route('tentor.presensi.index') }}"
                    class="px-8 py-4 bg-slate-800 text-slate-400 font-bold rounded-xl hover:bg-slate-700 transition-colors text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('foto-input').addEventListener('change', function (e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Klik atau drag foto ke sini';
            document.getElementById('file-name').textContent = fileName;
            document.getElementById('foto-placeholder').classList.add('border-blue-500/50', 'bg-blue-500/5');
        });
    </script>
@endsection