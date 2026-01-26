@extends('layouts.admin')

@section('title', 'Edit Data Tentor')

@section('content')
    <div class="mb-8">
        <a href="{{ route('tentors.index') }}"
            class="inline-flex items-center text-slate-400 hover:text-white mb-4 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-bold text-white tracking-tight">Edit Data Tentor: <span
                class="text-blue-400">{{ $tentor->nama }}</span></h1>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl overflow-hidden">
        <form action="{{ route('tentors.update', $tentor) }}" method="POST" class="p-6 md:p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div class="space-y-2">
                    <label for="nama" class="block text-sm font-medium text-slate-400">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $tentor->nama) }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>

                <!-- Nickname -->
                <div class="space-y-2">
                    <label for="nickname" class="block text-sm font-medium text-slate-400">Nickname / Nama Panggilan</label>
                    <input type="text" name="nickname" id="nickname" value="{{ old('nickname', $tentor->nickname) }}"
                        required
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-slate-400">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $tentor->email) }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-slate-400">Password <span
                            class="text-xs text-slate-500 font-normal">(Kosongkan jika tidak ingin diubah)</span></label>
                    <input type="password" name="password" id="password"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>

                <!-- Mata Pelajaran -->
                <div class="space-y-2">
                    <label for="mapel" class="block text-sm font-medium text-slate-400">Mata Pelajaran</label>
                    <select name="mapel" id="mapel" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all cursor-pointer">
                        <option value="Bahasa Inggris" {{ old('mapel', $tentor->mapel) == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa Inggris</option>
                        <option value="Matematika" {{ old('mapel', $tentor->mapel) == 'Matematika' ? 'selected' : '' }}>
                            Matematika</option>
                    </select>
                </div>

                <!-- WhatsApp -->
                <div class="space-y-2">
                    <label for="wa" class="block text-sm font-medium text-slate-400">Nomor WhatsApp</label>
                    <input type="text" name="wa" id="wa" value="{{ old('wa', $tentor->wa) }}" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>

                <!-- Tempat Lahir -->
                <div class="space-y-2">
                    <label for="tempat_lahir" class="block text-sm font-medium text-slate-400">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        value="{{ old('tempat_lahir', $tentor->tempat_lahir) }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>

                <div class="space-y-2">
                    <label for="tgl_lahir" class="block text-sm font-medium text-slate-400">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        value="{{ old('tgl_lahir', $tentor->tgl_lahir ? date('Y-m-d', (int) $tentor->tgl_lahir) : '') }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
                </div>

                <!-- Tahun Lulus -->
                <div class="space-y-2">
                    <label for="tahun_lulus" class="block text-sm font-medium text-slate-400">Tahun Lulus</label>
                    <input type="text" name="tahun_lulus" id="tahun_lulus"
                        value="{{ old('tahun_lulus', $tentor->tahun_lulus) }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>

                <!-- Pendidikan Terakhir -->
                <div class="space-y-2">
                    <label for="pendidikan_terakhir" class="block text-sm font-medium text-slate-400">Pendidikan
                        Terakhir</label>
                    <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir"
                        value="{{ old('pendidikan_terakhir', $tentor->pendidikan_terakhir) }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>

                <!-- Status -->
                <div class="space-y-2">
                    <label for="aktif" class="block text-sm font-medium text-slate-400">Status Aktif</label>
                    <select name="aktif" id="aktif" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all cursor-pointer">
                        <option value="1" {{ old('aktif', $tentor->aktif) == '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('aktif', $tentor->aktif) == '0' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>
            </div>

            <!-- Alamat -->
            <div class="space-y-2">
                <label for="alamat" class="block text-sm font-medium text-slate-400">Alamat Lengkap</label>
                <textarea name="alamat" id="alamat" rows="3"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">{{ old('alamat', $tentor->alamat) }}</textarea>
            </div>

            <!-- Keterangan Pendidikan -->
            <div class="space-y-2">
                <label for="ket_pendidikan" class="block text-sm font-medium text-slate-400">Keterangan Pendidikan</label>
                <textarea name="ket_pendidikan" id="ket_pendidikan" rows="3"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">{{ old('ket_pendidikan', $tentor->ket_pendidikan) }}</textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-end gap-4 pt-4">
                <button type="reset"
                    class="px-6 py-2.5 bg-slate-700 hover:bg-slate-600 text-white font-semibold rounded-lg transition-all">
                    Reset Perubahan
                </button>
                <button type="submit"
                    class="px-8 py-2.5 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-bold rounded-lg shadow-lg hover:shadow-blue-500/25 transition-all">
                    Update Data Tentor
                </button>
            </div>
        </form>
    </div>
@endsection