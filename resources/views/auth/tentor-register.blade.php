<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Tentor - AdminPanel</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: {
                        slate: { 850: '#151f32', 900: '#0f172a', 950: '#020617' }
                    }
                }
            }
        }
    </script>
    <style>
        .glass {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(51, 65, 85, 0.5);
        }

        input[type="date"] {
            color-scheme: dark;
        }
    </style>
</head>

<body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col items-center justify-center p-4">
    <div class="w-full max-w-4xl">
        <!-- Logo -->
        <div class="text-center mb-8">
            <h1
                class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-cyan-400 tracking-wider">
                JOIN AS TENTOR
            </h1>
            <p class="text-slate-400 mt-2">Lengkapi semua data untuk bergabung dengan tim pengajar kami.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 text-sm">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="glass rounded-2xl shadow-2xl overflow-hidden">
            <form action="{{ route('tentor.register') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Column 1 -->
                    <div class="space-y-5">
                        <h2 class="text-lg font-bold text-blue-400 border-b border-slate-700 pb-2 mb-4">Informasi Dasar
                        </h2>

                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Nama
                                Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" required
                                placeholder="Nama Lengkap Anda"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>

                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Nickname</label>
                            <input type="text" name="nickname" value="{{ old('nickname') }}" required
                                placeholder="Nama Panggilan"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>

                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Email
                                Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                placeholder="email@contoh.com"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Password</label>
                                <input type="password" name="password" required
                                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Confirm</label>
                                <input type="password" name="password_confirmation" required
                                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">WhatsApp</label>
                            <input type="text" name="wa" value="{{ old('wa') }}" required placeholder="08xxxxxxxx"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>

                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Alamat
                                Lengkap</label>
                            <textarea name="alamat" required rows="3" placeholder="Alamat sesuai KTP/Domisili"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">{{ old('alamat') }}</textarea>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="space-y-5">
                        <h2 class="text-lg font-bold text-cyan-400 border-b border-slate-700 pb-2 mb-4">Data Akademik &
                            Kelahiran</h2>

                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Mata
                                Pelajaran</label>
                            <select name="mapel" required
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all cursor-pointer">
                                <option value="" disabled {{ old('mapel') == '' ? 'selected' : '' }}>Pilih Mata Pelajaran
                                </option>
                                <option value="bing" {{ old('mapel') == 'bing' ? 'selected' : '' }}>
                                    Bahasa Inggris</option>
                                <option value="mat" {{ old('mapel') == 'mat' ? 'selected' : '' }}>Matematika
                                </option>
                                <option value="coding" {{ old('mapel') == 'coding' ? 'selected' : '' }}>Coding
                                </option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Tempat
                                    Lahir</label>
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                    placeholder="Kota Lahir"
                                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Tgl
                                    Lahir</label>
                                <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required
                                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Pendidikan
                                Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}"
                                required placeholder="Contoh: S1 Matematika UI"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>

                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Tahun
                                Lulus</label>
                            <input type="text" name="tahun_lulus" value="{{ old('tahun_lulus') }}" required
                                placeholder="Tahun Lulus"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>

                        <div>
                            <label
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Keterangan
                                Pendidikan</label>
                            <textarea name="ket_pendidikan" required rows="4"
                                placeholder="Detail pendidikan atau pengalaman mengajar singkat"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">{{ old('ket_pendidikan') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-700/50">
                    <button type="submit"
                        class="w-full py-4 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest">
                        Submit Registration
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center mt-8 space-y-2">
            <p class="text-slate-500 text-sm">Sudah punya akun?</p>
            <a href="{{ route('tentor.login') }}"
                class="text-blue-400 font-semibold hover:text-blue-300 transition-colors uppercase tracking-widest">LOGIN
                TENTOR</a>
        </div>
    </div>
</body>

</html>