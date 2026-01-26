<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Tentor - AdminPanel</title>
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
    </style>
</head>

<body class="bg-slate-950 text-slate-200 font-sans min-h-screen flex flex-col items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-12">
            <h1
                class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-cyan-400 tracking-widest">
                TENTOR ACCESS
            </h1>
            <p class="text-slate-400 mt-2 italic">Silakan masuk ke portal pengajar Anda.</p>
        </div>

        @if(session('success'))
            <div
                class="mb-6 p-4 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="glass rounded-2xl shadow-2xl overflow-hidden border border-slate-700/50">
            <form action="{{ route('tentor.login') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2 px-1">Email
                        Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@contoh.com"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all placeholder-slate-600">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2 px-1">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-widest">Password</label>
                    </div>
                    <input type="password" name="password" required placeholder="••••••••"
                        class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all placeholder-slate-600">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                        class="w-4 h-4 rounded border-slate-700 bg-slate-900 text-blue-500 focus:ring-offset-slate-900 focus:ring-blue-500">
                    <label for="remember" class="ml-2 text-sm text-slate-400 cursor-pointer">Ingat Saya</label>
                </div>

                <button type="submit"
                    class="w-full py-4 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest">
                    Continue to Dashboard
                </button>
            </form>
        </div>

        <div class="text-center mt-8 space-y-2">
            <p class="text-slate-500 text-sm">Belum punya akun?</p>
            <a href="{{ route('tentor.register') }}"
                class="text-blue-400 font-semibold hover:text-blue-300 transition-colors uppercase">Registrasi
                Sekarang</a>
        </div>
    </div>
</body>

</html>