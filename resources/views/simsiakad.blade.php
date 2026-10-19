<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi SIAKAD PLUS — Coba 15 Portal & Modul</title>
    <meta name="description"
        content="Simulasi interaktif SIAKAD PLUS: coba langsung tampilan Portal Kepala Sekolah, Administrasi, Guru, Murid, Wali Murid, Keuangan, E-Money, E-Canteen, E-Sarpra, E-HRD, E-Library, E-BK, E-Klinik, E-Pesantren, dan E-Laundry.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['"Plus Jakarta Sans"', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        navy: '#1E40AF',
                        sky2: '#0284C7',
                        amber2: '#F59E0B',
                        emerald2: '#10B981',
                        slate2: '#F8FAFC',
                    },
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        ::selection {
            background: #1E40AF;
            color: #fff;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #1E293B 0%, #1E40AF 55%, #0284C7 100%);
        }
        .grid-pattern {
            background-image: linear-gradient(rgba(255, 255, 255, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
            background-size: 42px 42px;
        }
        .shadow-glow {
            box-shadow: 0 20px 50px -12px rgba(30, 64, 175, 0.35);
        }
        .sim-btn.active {
            background: #1E40AF;
            color: #fff;
            border-color: #1E40AF;
            box-shadow: 0 10px 25px -8px rgba(30, 64, 175, 0.5);
        }
        .sim-btn.active .sim-badge {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        .sim-btn.active span.leading-tight > span:first-child {
            color: #fff;
        }
        .sim-panel.hidden-panel {
            display: none;
        }
        .sim-panel {
            animation: fadeUp 0.35s ease;
        }
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="font-body bg-slate2 text-slate-800 antialiased overflow-x-hidden">

    <!-- ======= HEADER ======= -->
    <header class="sticky top-0 z-40 bg-white/85 backdrop-blur-md border-b border-slate-200/70 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <a href="{{ url('/') }}" class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-xs">S+</div>
                <div class="leading-tight">
                    <span class="font-heading font-bold text-navy text-lg">SIAKAD PLUS</span>
                    <span class="hidden sm:block text-[10px] font-semibold text-slate-400 tracking-wide">Simulasi Interaktif</span>
                </div>
            </a>
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-600">
                <a href="{{ url('/apps') }}" class="hover:text-navy transition-colors">Katalog Aplikasi</a>
                <a href="{{ url('/siakadplus') }}" class="hover:text-navy transition-colors">SIAKAD PLUS</a>
                <a href="{{ url('/siakadplus/fitur') }}" class="hover:text-navy transition-colors">Fitur Lengkap</a>
            </nav>
            <div class="flex items-center gap-2.5">
                <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20Jadwalkan%20Demo%20Gratis%20SIAKAD%20PLUS." target="_blank"
                    class="inline-flex items-center gap-2 bg-white text-navy border border-navy/25 hover:bg-blue-50 hover:border-navy/50 transition-colors font-bold px-5 py-2.5 rounded-xl text-sm">
                    Jadwalkan Demo Gratis
                </a>
            </div>
        </div>
    </header>

    <!-- ======= HERO ======= -->
    <section class="hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-white/10 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 lg:py-18 text-center">
            <span class="inline-flex items-center gap-2 bg-white/15 border border-white/25 backdrop-blur text-white text-xs font-bold px-3 py-1.5 rounded-full">
                🖥️ Simulasi · Coba Tanpa Login
            </span>
            <h1 class="mt-6 font-heading font-extrabold text-white text-3xl sm:text-4xl lg:text-5xl leading-[1.15] max-w-4xl mx-auto">
                Jelajahi 15 Portal &amp; Modul SIAKAD PLUS
            </h1>
            <p class="mt-5 text-white/90 text-base sm:text-lg leading-relaxed max-w-3xl mx-auto">
                Klik salah satu tombol di bawah untuk melihat simulasi antarmuka setiap peran — dari Kepala Sekolah hingga E-Laundry. Tanpa perlu login.
            </p>
            <p class="mt-4 inline-flex items-center gap-2 text-white/70 text-xs font-semibold">
                <span class="w-2 h-2 rounded-full bg-emerald2 animate-pulse"></span> Semua data pada simulasi ini hanya contoh.
            </p>
        </div>
        <svg class="w-full text-slate2" viewBox="0 0 1440 60" fill="currentColor" preserveAspectRatio="none">
            <path d="M0,30 C360,70 720,0 1080,30 C1260,45 1380,40 1440,35 L1440,60 L0,60 Z"></path>
        </svg>
    </section>

    <!-- ======= SIMULATOR ======= -->
    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Button Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3">
                <a href="{{ url('/simsiakad/kepsek') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">🎖️</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">Kepala Sekolah</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">5 modul</span></span>
                </a>
                <a href="{{ url('/simsiakad/admin') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">🗂️</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">Administrasi/Operator</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">42 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/guru') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">👩‍🏫</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">Portal Guru</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">25 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/murid') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">🎒</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">Portal Murid</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">19 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/wali') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">👨‍👩‍👧</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">Portal Wali Murid</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">18 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/keuangan') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">💰</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">Portal Keuangan</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">16 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/emoney') }}" class="sim-btn active flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">💳</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">E-Money Siswa</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Kasir digital</span></span>
                </a>
                <a href="{{ url('/simsiakad/canteen') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">🍽️</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">E-Canteen</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">12 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/sarpra') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">🏫</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">E-Sarpra</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">12 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/hrd') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">👔</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">E-HRD</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">10 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/library') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">📖</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">E-Library</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">10 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/bk') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">💬</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">E-BK</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">5 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/klinik') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">➕</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">E-Klinik</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">6 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/pesantren') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">🕌</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">E-Pesantren</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">8 fitur</span></span>
                </a>
                <a href="{{ url('/simsiakad/laundry') }}" class="sim-btn flex items-center gap-3 border border-slate-200 bg-white hover:border-navy/40 hover:shadow-md px-4 py-3.5 rounded-2xl text-left transition-all">
                    <span class="text-2xl">🧺</span>
                    <span class="leading-tight"><span class="block font-heading font-bold text-sm text-slate-800">E-Laundry</span><span class="sim-badge text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">4 fitur</span></span>
                </a>
            </div>

            <p class="mt-4 text-xs text-slate-500 text-center">Klik tombol untuk berpindah portal · tampilan di bawah adalah simulasi antarmuka.</p>

            <!-- ======= PANELS ======= -->
            <div class="mt-8">

                <!-- ====== ADMINISTRASI ====== -->
                <div id="sim-admin" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/operator/dashboard</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-lg hero-gradient grid place-items-center text-white font-heading font-extrabold text-[10px]">S+</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Operator Sekolah</p><p class="text-[10px] text-slate-500">SMAN 1 Nusantara</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🧑‍🎓 Data Siswa</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📝 SPMB Online</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">👥 Kesiswaan</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">👔 Kepegawaian</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📚 Kurikulum</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🏛️ Tata Usaha</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🏅 Akreditasi</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Ringkasan Sekolah</h3><p class="text-xs text-slate-400">Tahun Ajaran 2026/2027 · Semester Ganjil</p></div>
                                    <span class="text-xs font-bold bg-emerald2/10 text-emerald2 px-3 py-1.5 rounded-full">● Sistem Normal</span>
                                </div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Total Siswa</p><p class="font-heading font-extrabold text-2xl text-slate-800">1.240</p><p class="text-[11px] text-emerald2 font-semibold">▲ 34 bulan ini</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Pendaftar SPMB</p><p class="font-heading font-extrabold text-2xl text-slate-800">320</p><p class="text-[11px] text-sky2 font-semibold">Kuota 300</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Pegawai</p><p class="font-heading font-extrabold text-2xl text-slate-800">86</p><p class="text-[11px] text-slate-400 font-semibold">Guru 62 · Tendik 24</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Kelas / Rombel</p><p class="font-heading font-extrabold text-2xl text-slate-800">36</p><p class="text-[11px] text-slate-400 font-semibold">12 tingkat</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between"><h4 class="font-heading font-bold text-sm text-slate-800">Pendaftar SPMB Terbaru</h4><span class="text-[11px] font-bold text-navy">Lihat semua</span></div>
                                    <table class="w-full text-left text-sm">
                                        <thead><tr class="text-[11px] uppercase text-slate-400"><th class="px-4 py-2">Nama</th><th class="px-4 py-2">Asal</th><th class="px-4 py-2">Status</th></tr></thead>
                                        <tbody class="divide-y divide-slate-50 text-slate-600">
                                            <tr><td class="px-4 py-2.5 font-semibold">Aisyah Rahma</td><td class="px-4 py-2.5">SMPN 3 Malang</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">Terverifikasi</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Bagas Pratama</td><td class="px-4 py-2.5">SMPN 1 Batu</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-amber2/15 text-amber2 px-2 py-0.5 rounded-full">Menunggu</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Citra Ayu</td><td class="px-4 py-2.5">MTs Nurul Huda</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">Terverifikasi</span></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== GURU ====== -->
                <div id="sim-guru" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/guru/dashboard</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-emerald2 grid place-items-center text-white font-heading font-bold text-xs">HT</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Hendra, S.Pd.</p><p class="text-[10px] text-slate-500">Guru Matematika</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📅 Jadwal Mengajar</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📔 Jurnal Mengajar</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📝 Input Nilai</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">✨ AI Generate Soal</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">✅ Presensi Kelas</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Selamat Pagi, Pak Hendra 👋</h3><p class="text-xs text-slate-400">Berikut ringkasan mengajar Anda hari ini</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Kelas Hari Ini</p><p class="font-heading font-extrabold text-2xl text-slate-800">4</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Siswa Diajar</p><p class="font-heading font-extrabold text-2xl text-slate-800">128</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Tugas Belum Dinilai</p><p class="font-heading font-extrabold text-2xl text-amber2">12</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Nilai Terinput</p><p class="font-heading font-extrabold text-2xl text-emerald2">92%</p></div>
                                </div>
                                <div class="mt-4 grid lg:grid-cols-2 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4">
                                        <h4 class="font-heading font-bold text-sm text-slate-800">Jadwal Hari Ini</h4>
                                        <ul class="mt-3 space-y-2 text-sm">
                                            <li class="flex items-center justify-between bg-slate2 rounded-lg px-3 py-2"><span class="font-semibold text-slate-700">07:15 · Matematika</span><span class="text-xs text-slate-400">VIII-A</span></li>
                                            <li class="flex items-center justify-between bg-slate2 rounded-lg px-3 py-2"><span class="font-semibold text-slate-700">09:00 · Matematika</span><span class="text-xs text-slate-400">VIII-B</span></li>
                                            <li class="flex items-center justify-between bg-slate2 rounded-lg px-3 py-2"><span class="font-semibold text-slate-700">10:30 · Matematika</span><span class="text-xs text-slate-400">IX-A</span></li>
                                        </ul>
                                    </div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4">
                                        <div class="flex items-center gap-2"><span class="text-lg">✨</span><h4 class="font-heading font-bold text-sm text-slate-800">AI Generate Soal</h4></div>
                                        <p class="mt-2 text-xs text-slate-500">Buat bank soal &amp; modul ajar otomatis.</p>
                                        <div class="mt-3 bg-slate-900 rounded-xl p-3 font-mono text-[11px] text-emerald-300 leading-relaxed">"10 soal Pythagoras kelas 8, level sedang"</div>
                                        <button class="mt-3 w-full bg-navy text-white text-sm font-bold py-2.5 rounded-xl">Generate Sekarang</button>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== MURID ====== -->
                <div id="sim-murid" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/siswa/beranda</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-sky2 grid place-items-center text-white font-heading font-bold text-xs">KF</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Keira Faza</p><p class="text-[10px] text-slate-500">Kelas VIII-A</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">🏠 Beranda</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📚 Mata Pelajaran</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📝 Tugas</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">💻 CBT</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📊 Nilai</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">💳 E-Money</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Hai, Keira! 🌟</h3><p class="text-xs text-slate-400">Semangat belajar hari ini!</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Nilai Rata-rata</p><p class="font-heading font-extrabold text-2xl text-navy">87</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Tugas Aktif</p><p class="font-heading font-extrabold text-2xl text-amber2">5</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Kehadiran</p><p class="font-heading font-extrabold text-2xl text-emerald2">98%</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Saldo E-Money</p><p class="font-heading font-extrabold text-2xl text-sky2">45rb</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="px-4 py-3 border-b border-slate-100"><h4 class="font-heading font-bold text-sm text-slate-800">Tugas Terdekat</h4></div>
                                    <table class="w-full text-left text-sm">
                                        <thead><tr class="text-[11px] uppercase text-slate-400"><th class="px-4 py-2">Mata Pelajaran</th><th class="px-4 py-2">Tenggat</th><th class="px-4 py-2">Status</th></tr></thead>
                                        <tbody class="divide-y divide-slate-50 text-slate-600">
                                            <tr><td class="px-4 py-2.5 font-semibold">Matematika — Pythagoras</td><td class="px-4 py-2.5">Besok</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-amber2/15 text-amber2 px-2 py-0.5 rounded-full">Belum</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">B. Inggris — Report Text</td><td class="px-4 py-2.5">3 hari</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-sky2/10 text-sky2 px-2 py-0.5 rounded-full">Dikerjakan</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">IPA — Fotosintesis</td><td class="px-4 py-2.5">Selesai</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">Dinilai 90</span></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== WALI MURID ====== -->
                <div id="sim-wali" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/wali/beranda</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-amber2 grid place-items-center text-white font-heading font-bold text-xs">B</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Bunda Keira</p><p class="text-[10px] text-slate-500">Wali Murid</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">🏠 Beranda</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📊 Nilai Anak</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">💰 Keuangan</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">✅ Kehadiran</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">💬 Komunikasi</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Perkembangan Keira</h3><p class="text-xs text-slate-400">Kelas VIII-A · Wali Kelas: Bu Rina</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Kehadiran</p><p class="font-heading font-extrabold text-2xl text-emerald2">98%</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Rata-rata Nilai</p><p class="font-heading font-extrabold text-2xl text-navy">87</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Tagihan</p><p class="font-heading font-extrabold text-lg text-emerald2">LUNAS</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Poin Disiplin</p><p class="font-heading font-extrabold text-2xl text-slate-800">100</p></div>
                                </div>
                                <div class="mt-4 grid lg:grid-cols-2 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4">
                                        <h4 class="font-heading font-bold text-sm text-slate-800">Tagihan SPP</h4>
                                        <div class="mt-3 flex items-center justify-between bg-emerald2/10 border border-emerald2/20 rounded-xl px-4 py-3">
                                            <div><p class="text-sm font-bold text-slate-700">SPP Maret 2026</p><p class="text-xs text-slate-400">Rp 350.000</p></div>
                                            <span class="text-xs font-bold text-emerald2">✓ Lunas</span>
                                        </div>
                                        <button class="mt-3 w-full bg-navy text-white text-sm font-bold py-2.5 rounded-xl">Bayar Tagihan Berikutnya</button>
                                    </div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4">
                                        <h4 class="font-heading font-bold text-sm text-slate-800">Notifikasi Terbaru</h4>
                                        <ul class="mt-3 space-y-2 text-sm text-slate-600">
                                            <li class="flex gap-2"><span class="text-emerald2">✓</span> Keira hadir tepat waktu — 07:02</li>
                                            <li class="flex gap-2"><span class="text-sky2">📢</span> Pengumuman: Jadwal PTS minggu depan</li>
                                            <li class="flex gap-2"><span class="text-amber2">💬</span> Pesan baru dari Bu Rina</li>
                                        </ul>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== KEUANGAN ====== -->
                <div id="sim-keuangan" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/keuangan/dashboard</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-emerald2 grid place-items-center text-white font-heading font-bold text-xs">BD</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Bendahara</p><p class="text-[10px] text-slate-500">Keuangan Sekolah</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🧾 Tagihan</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">💳 Pembayaran</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📒 Buku Kas</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📈 Laporan</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Keuangan Sekolah</h3><p class="text-xs text-slate-400">Periode Maret 2026</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">SPP Terkumpul</p><p class="font-heading font-extrabold text-xl text-emerald2">Rp 412jt</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Tunggakan</p><p class="font-heading font-extrabold text-xl text-amber2">Rp 18jt</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Transaksi Hari Ini</p><p class="font-heading font-extrabold text-xl text-slate-800">184</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Rasio Lunas</p><p class="font-heading font-extrabold text-xl text-navy">96%</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 p-4">
                                    <h4 class="font-heading font-bold text-sm text-slate-800">Penerimaan 7 Hari Terakhir</h4>
                                    <div class="mt-4 flex items-end gap-2 h-28">
                                        <div class="flex-1 bg-navy/30 rounded-t" style="height:40%"></div>
                                        <div class="flex-1 bg-navy/40 rounded-t" style="height:55%"></div>
                                        <div class="flex-1 bg-navy/50 rounded-t" style="height:48%"></div>
                                        <div class="flex-1 bg-sky2/60 rounded-t" style="height:70%"></div>
                                        <div class="flex-1 bg-emerald2 rounded-t" style="height:88%"></div>
                                        <div class="flex-1 bg-emerald2 rounded-t" style="height:100%"></div>
                                        <div class="flex-1 bg-emerald2 rounded-t" style="height:76%"></div>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== E-MONEY ====== -->
                <div id="sim-emoney" class="sim-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/e-money</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="p-5 sm:p-8 bg-slate2">
                            <div class="grid lg:grid-cols-3 gap-5 items-start">
                                <div class="lg:col-span-1">
                                    <div class="hero-gradient rounded-3xl p-6 text-white shadow-glow relative overflow-hidden">
                                        <div class="absolute inset-0 grid-pattern"></div>
                                        <div class="relative">
                                            <div class="flex items-center justify-between"><span class="text-xs font-bold text-white/80">KARTU E-MONEY SISWA</span><span class="text-2xl">💳</span></div>
                                            <p class="mt-6 text-xs text-white/70">Saldo</p>
                                            <p class="font-heading font-extrabold text-3xl">Rp 45.000</p>
                                            <div class="mt-6 flex items-center justify-between text-xs">
                                                <span class="tracking-widest">•••• 4821</span>
                                                <span>Keira Faza · VIII-A</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="mt-4 w-full bg-emerald2 text-white font-bold py-3 rounded-2xl shadow-lg">+ Top Up Saldo</button>
                                    <div class="mt-3 grid grid-cols-3 gap-2">
                                        <div class="bg-white border border-slate-200 rounded-xl py-3 text-center text-xs font-bold text-slate-600">QRIS</div>
                                        <div class="bg-white border border-slate-200 rounded-xl py-3 text-center text-xs font-bold text-slate-600">VA Bank</div>
                                        <div class="bg-white border border-slate-200 rounded-xl py-3 text-center text-xs font-bold text-slate-600">Minimarket</div>
                                    </div>
                                </div>
                                <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="px-4 py-3 border-b border-slate-100"><h4 class="font-heading font-bold text-sm text-slate-800">Riwayat Transaksi</h4></div>
                                    <table class="w-full text-left text-sm">
                                        <thead><tr class="text-[11px] uppercase text-slate-400"><th class="px-4 py-2">Keterangan</th><th class="px-4 py-2">Tanggal</th><th class="px-4 py-2 text-right">Jumlah</th></tr></thead>
                                        <tbody class="divide-y divide-slate-50 text-slate-600">
                                            <tr><td class="px-4 py-2.5 font-semibold">Top up — QRIS</td><td class="px-4 py-2.5">Hari ini</td><td class="px-4 py-2.5 text-right text-emerald2 font-bold">+ Rp 50.000</td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Kantin — Nasi Ayam</td><td class="px-4 py-2.5">Hari ini</td><td class="px-4 py-2.5 text-right text-slate-700 font-bold">- Rp 12.000</td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Kantin — Susu</td><td class="px-4 py-2.5">Kemarin</td><td class="px-4 py-2.5 text-right text-slate-700 font-bold">- Rp 5.000</td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Kantin — Roti</td><td class="px-4 py-2.5">Kemarin</td><td class="px-4 py-2.5 text-right text-slate-700 font-bold">- Rp 8.000</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ====== E-CANTEEN ====== -->
                <div id="sim-canteen" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/e-canteen/kasir</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-amber2 grid place-items-center text-white font-heading font-bold text-xs">K</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Kasir Kantin</p><p class="text-[10px] text-slate-500">Tenant Bu Sari</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">🧾 Kasir POS</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🍜 Menu &amp; Stok</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🏪 Tenant</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📈 Laporan</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div class="flex flex-wrap items-center justify-between gap-2"><h3 class="font-heading font-extrabold text-xl text-slate-800">Kasir POS</h3><span class="text-xs font-bold bg-emerald2/10 text-emerald2 px-3 py-1.5 rounded-full">Rp 1.284.000 hari ini</span></div>
                                <div class="mt-4 grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><div class="flex items-center justify-between"><span class="text-2xl">🍗</span><span class="text-[10px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">Stok 24</span></div><p class="mt-2 font-heading font-bold text-sm text-slate-800">Nasi Ayam Geprek</p><p class="text-xs text-slate-400">Rp 12.000</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><div class="flex items-center justify-between"><span class="text-2xl">🍜</span><span class="text-[10px] font-bold bg-amber2/15 text-amber2 px-2 py-0.5 rounded-full">Stok 5</span></div><p class="mt-2 font-heading font-bold text-sm text-slate-800">Mie Instan Telur</p><p class="text-xs text-slate-400">Rp 10.000</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><div class="flex items-center justify-between"><span class="text-2xl">🥤</span><span class="text-[10px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">Stok 40</span></div><p class="mt-2 font-heading font-bold text-sm text-slate-800">Es Teh Manis</p><p class="text-xs text-slate-400">Rp 3.000</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 p-4">
                                    <h4 class="font-heading font-bold text-sm text-slate-800">Keranjang</h4>
                                    <div class="mt-3 border-b border-dashed border-slate-200 pb-3 space-y-2 text-sm text-slate-600">
                                        <div class="flex justify-between"><span>2× Nasi Ayam Geprek</span><span>Rp 24.000</span></div>
                                        <div class="flex justify-between"><span>2× Es Teh Manis</span><span>Rp 6.000</span></div>
                                    </div>
                                    <div class="mt-3 flex items-center justify-between"><span class="font-heading font-bold text-slate-800">Total</span><span class="font-heading font-extrabold text-lg text-navy">Rp 30.000</span></div>
                                    <button class="mt-3 w-full bg-emerald2 text-white font-bold py-3 rounded-xl">Bayar via QR E-Money</button>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== E-SARPRA ====== -->
                <div id="sim-sarpra" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/e-sarpra/dashboard</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-sky2 grid place-items-center text-white font-heading font-bold text-xs">SP</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Staf Sarpra</p><p class="text-[10px] text-slate-500">Sarpras &amp; Aset</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📦 Inventaris</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🚪 Ruangan</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🔧 Pemeliharaan</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Sarpras &amp; Inventaris</h3><p class="text-xs text-slate-400">SMPN 1 Nusantara</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Total Aset</p><p class="font-heading font-extrabold text-2xl text-slate-800">2.480</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Ruangan</p><p class="font-heading font-extrabold text-2xl text-navy">48</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Perlu Perbaikan</p><p class="font-heading font-extrabold text-2xl text-amber2">14</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Booking Hari Ini</p><p class="font-heading font-extrabold text-2xl text-emerald2">6</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="px-4 py-3 border-b border-slate-100"><h4 class="font-heading font-bold text-sm text-slate-800">Kondisi Aset Terbaru</h4></div>
                                    <table class="w-full text-left text-sm">
                                        <thead><tr class="text-[11px] uppercase text-slate-400"><th class="px-4 py-2">Aset</th><th class="px-4 py-2">Ruang</th><th class="px-4 py-2">Kondisi</th></tr></thead>
                                        <tbody class="divide-y divide-slate-50 text-slate-600">
                                            <tr><td class="px-4 py-2.5 font-semibold">Proyektor Epson</td><td class="px-4 py-2.5">VIII-A</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">Baik</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">AC Split 2PK</td><td class="px-4 py-2.5">Lab IPA</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-amber2/15 text-amber2 px-2 py-0.5 rounded-full">Perbaikan</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Komputer PC</td><td class="px-4 py-2.5">Lab Komputer</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">Baik</span></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== E-HRD ====== -->
                <div id="sim-hrd" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/e-hrd/dashboard</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-navy grid place-items-center text-white font-heading font-bold text-xs">HR</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Admin HRD</p><p class="text-[10px] text-slate-500">Kepegawaian</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">👥 Data Pegawai</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🕒 Presensi</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">💵 Payroll</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📈 Kinerja</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Kepegawaian</h3><p class="text-xs text-slate-400">Periode Maret 2026</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Total Pegawai</p><p class="font-heading font-extrabold text-2xl text-slate-800">86</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Hadir Hari Ini</p><p class="font-heading font-extrabold text-2xl text-emerald2">81</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Cuti / Izin</p><p class="font-heading font-extrabold text-2xl text-amber2">5</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Payroll Bulan Ini</p><p class="font-heading font-extrabold text-lg text-navy">Rp 386jt</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="px-4 py-3 border-b border-slate-100"><h4 class="font-heading font-bold text-sm text-slate-800">Presensi Pegawai Hari Ini</h4></div>
                                    <table class="w-full text-left text-sm">
                                        <thead><tr class="text-[11px] uppercase text-slate-400"><th class="px-4 py-2">Nama</th><th class="px-4 py-2">Masuk</th><th class="px-4 py-2">Status</th></tr></thead>
                                        <tbody class="divide-y divide-slate-50 text-slate-600">
                                            <tr><td class="px-4 py-2.5 font-semibold">Hendra, S.Pd.</td><td class="px-4 py-2.5">06:54</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">Tepat Waktu</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Rina, M.Pd.</td><td class="px-4 py-2.5">07:12</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-amber2/15 text-amber2 px-2 py-0.5 rounded-full">Terlambat</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Sari, S.Kom.</td><td class="px-4 py-2.5">—</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-sky2/10 text-sky2 px-2 py-0.5 rounded-full">Izin</span></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== E-LIBRARY ====== -->
                <div id="sim-library" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/e-library</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-emerald2 grid place-items-center text-white font-heading font-bold text-xs">PL</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Pustakawan</p><p class="text-[10px] text-slate-500">Perpustakaan</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📚 Katalog</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🔄 Sirkulasi</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">👥 Anggota</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Perpustakaan Digital</h3><p class="text-xs text-slate-400">Katalog &amp; sirkulasi buku</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Total Koleksi</p><p class="font-heading font-extrabold text-2xl text-slate-800">8.420</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">E-Book</p><p class="font-heading font-extrabold text-2xl text-navy">1.250</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Dipinjam</p><p class="font-heading font-extrabold text-2xl text-amber2">64</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Terlambat</p><p class="font-heading font-extrabold text-2xl text-red-500">7</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="px-4 py-3 border-b border-slate-100"><h4 class="font-heading font-bold text-sm text-slate-800">Peminjaman Terbaru</h4></div>
                                    <table class="w-full text-left text-sm">
                                        <thead><tr class="text-[11px] uppercase text-slate-400"><th class="px-4 py-2">Buku</th><th class="px-4 py-2">Peminjam</th><th class="px-4 py-2">Jatuh Tempo</th></tr></thead>
                                        <tbody class="divide-y divide-slate-50 text-slate-600">
                                            <tr><td class="px-4 py-2.5 font-semibold">Laskar Pelangi</td><td class="px-4 py-2.5">Keira F.</td><td class="px-4 py-2.5">3 hari lagi</td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Matematika Kelas 8</td><td class="px-4 py-2.5">Bagas P.</td><td class="px-4 py-2.5"><span class="text-red-500 font-semibold">Terlambat 2 hari</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Bumi Manusia</td><td class="px-4 py-2.5">Citra A.</td><td class="px-4 py-2.5">5 hari lagi</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== E-BK ====== -->
                <div id="sim-bk" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/e-bk/dashboard</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-sky2 grid place-items-center text-white font-heading font-bold text-xs">BK</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Guru BK</p><p class="text-[10px] text-slate-500">Bimbingan Konseling</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">💬 Konseling</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">⚠️ Kedisiplinan</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📄 Laporan</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Bimbingan Konseling</h3><p class="text-xs text-slate-400">Pemantauan siswa binaan</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Sesi Bulan Ini</p><p class="font-heading font-extrabold text-2xl text-navy">28</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Rujukan Guru</p><p class="font-heading font-extrabold text-2xl text-amber2">9</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Panggilan Ortu</p><p class="font-heading font-extrabold text-2xl text-slate-800">4</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Kasus Selesai</p><p class="font-heading font-extrabold text-2xl text-emerald2">18</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 p-4">
                                    <h4 class="font-heading font-bold text-sm text-slate-800">Catatan Konseling Terbaru</h4>
                                    <ul class="mt-3 space-y-2 text-sm text-slate-600">
                                        <li class="flex items-start gap-3 bg-slate2 rounded-xl px-3 py-2.5"><span class="text-amber2">⚠️</span><span><span class="font-semibold text-slate-700">Bagas Pratama</span> — konseling kedisiplinan (poin -15)</span></li>
                                        <li class="flex items-start gap-3 bg-slate2 rounded-xl px-3 py-2.5"><span class="text-sky2">💬</span><span><span class="font-semibold text-slate-700">Keira Faza</span> — konseling motivasi belajar</span></li>
                                        <li class="flex items-start gap-3 bg-slate2 rounded-xl px-3 py-2.5"><span class="text-emerald2">✓</span><span><span class="font-semibold text-slate-700">Citra Ayu</span> — kasus selesai, tindak lanjut ditutup</span></li>
                                    </ul>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== E-KLINIK ====== -->
                <div id="sim-klinik" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/e-klinik/dashboard</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-emerald2 grid place-items-center text-white font-heading font-bold text-xs">UKS</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Petugas UKS</p><p class="text-[10px] text-slate-500">Kesehatan</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">➕ Kunjungan</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">💊 Stok Obat</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🩺 Rujukan</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Klinik / UKS</h3><p class="text-xs text-slate-400">Layanan kesehatan siswa</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Kunjungan Hari Ini</p><p class="font-heading font-extrabold text-2xl text-navy">12</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Rujukan</p><p class="font-heading font-extrabold text-2xl text-amber2">2</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Jenis Obat</p><p class="font-heading font-extrabold text-2xl text-slate-800">24</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Stok Menipis</p><p class="font-heading font-extrabold text-2xl text-red-500">3</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="px-4 py-3 border-b border-slate-100"><h4 class="font-heading font-bold text-sm text-slate-800">Kunjungan Terbaru</h4></div>
                                    <table class="w-full text-left text-sm">
                                        <thead><tr class="text-[11px] uppercase text-slate-400"><th class="px-4 py-2">Siswa</th><th class="px-4 py-2">Keluhan</th><th class="px-4 py-2">Tindakan</th></tr></thead>
                                        <tbody class="divide-y divide-slate-50 text-slate-600">
                                            <tr><td class="px-4 py-2.5 font-semibold">Keira F.</td><td class="px-4 py-2.5">Pusing</td><td class="px-4 py-2.5">Istirahat &amp; obat</td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Bagas P.</td><td class="px-4 py-2.5">Demam</td><td class="px-4 py-2.5"><span class="text-amber2 font-semibold">Dirujuk ke klinik</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Citra A.</td><td class="px-4 py-2.5">Luka ringan</td><td class="px-4 py-2.5">P3K</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== E-PESANTREN ====== -->
                <div id="sim-pesantren" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/e-pesantren/dashboard</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-navy grid place-items-center text-white font-heading font-bold text-xs">🕌</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Pengasuh</p><p class="text-[10px] text-slate-500">Pondok Pesantren</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🧑‍🎓 Data Santri</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">📖 Tahfidz</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🚪 Perizinan</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">💰 Keuangan Santri</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Pesantren Digital</h3><p class="text-xs text-slate-400">Data santri &amp; kegiatan</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Total Santri</p><p class="font-heading font-extrabold text-2xl text-slate-800">420</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Setoran Hafalan</p><p class="font-heading font-extrabold text-2xl text-navy">86</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Izin Keluar</p><p class="font-heading font-extrabold text-2xl text-amber2">10</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Syahriyah Lunas</p><p class="font-heading font-extrabold text-2xl text-emerald2">94%</p></div>
                                </div>
                                <div class="mt-4 grid lg:grid-cols-2 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4">
                                        <h4 class="font-heading font-bold text-sm text-slate-800">Progress Tahfidz</h4>
                                        <div class="mt-3 space-y-3">
                                            <div><div class="flex justify-between text-xs font-semibold text-slate-600"><span>Ahmad Zaki — Juz 30</span><span>92%</span></div><div class="mt-1 h-2 bg-slate-100 rounded-full"><div class="h-full w-[92%] bg-emerald2 rounded-full"></div></div></div>
                                            <div><div class="flex justify-between text-xs font-semibold text-slate-600"><span>Fatimah A. — Juz 29</span><span>68%</span></div><div class="mt-1 h-2 bg-slate-100 rounded-full"><div class="h-full w-[68%] bg-sky2 rounded-full"></div></div></div>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4">
                                        <h4 class="font-heading font-bold text-sm text-slate-800">Perizinan Terbaru</h4>
                                        <ul class="mt-3 space-y-2 text-sm text-slate-600">
                                            <li class="flex items-center justify-between bg-slate2 rounded-lg px-3 py-2"><span class="font-semibold text-slate-700">Ahmad Zaki</span><span class="text-[11px] font-bold text-emerald2">Disetujui</span></li>
                                            <li class="flex items-center justify-between bg-slate2 rounded-lg px-3 py-2"><span class="font-semibold text-slate-700">Fatimah A.</span><span class="text-[11px] font-bold text-amber2">Menunggu</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

                <!-- ====== E-LAUNDRY ====== -->
                <div id="sim-laundry" class="sim-panel hidden-panel">
                    <div class="rounded-3xl border border-slate-200 bg-white shadow-glow overflow-hidden">
                        <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span><span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span class="ml-2 text-[11px] text-slate-400 font-semibold">siakadplus.id/e-laundry/dashboard</span>
                            <span class="ml-auto text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">SIMULASI</span>
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <aside class="md:w-60 bg-slate-900 text-slate-300 p-4 flex-shrink-0">
                                <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10">
                                    <div class="w-8 h-8 rounded-full bg-emerald2 grid place-items-center text-white font-heading font-bold text-xs">L</div>
                                    <div class="leading-tight"><p class="text-white font-heading font-bold text-xs">Petugas Laundry</p><p class="text-[10px] text-slate-500">Asrama</p></div>
                                </div>
                                <nav class="mt-4 space-y-1 text-sm">
                                    <div class="px-3 py-2 rounded-lg bg-navy text-white font-semibold">📊 Dashboard</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🧺 Cucian Masuk</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">🔄 Proses</div>
                                    <div class="px-3 py-2 rounded-lg hover:bg-white/5">✅ Siap Ambil</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5 sm:p-6 bg-slate2">
                                <div><h3 class="font-heading font-extrabold text-xl text-slate-800">Laundry Asrama</h3><p class="text-xs text-slate-400">Tracking cucian santri</p></div>
                                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3">
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Cucian Masuk</p><p class="font-heading font-extrabold text-2xl text-slate-800">38</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Sedang Dicuci</p><p class="font-heading font-extrabold text-2xl text-sky2">12</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Siap Ambil</p><p class="font-heading font-extrabold text-2xl text-emerald2">9</p></div>
                                    <div class="bg-white rounded-2xl border border-slate-100 p-4"><p class="text-xs text-slate-400 font-semibold">Sudah Diambil</p><p class="font-heading font-extrabold text-2xl text-slate-800">17</p></div>
                                </div>
                                <div class="mt-4 bg-white rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="px-4 py-3 border-b border-slate-100"><h4 class="font-heading font-bold text-sm text-slate-800">Status Cucian</h4></div>
                                    <table class="w-full text-left text-sm">
                                        <thead><tr class="text-[11px] uppercase text-slate-400"><th class="px-4 py-2">Santri</th><th class="px-4 py-2">Jumlah</th><th class="px-4 py-2">Status</th></tr></thead>
                                        <tbody class="divide-y divide-slate-50 text-slate-600">
                                            <tr><td class="px-4 py-2.5 font-semibold">Ahmad Zaki</td><td class="px-4 py-2.5">5 pcs</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-sky2/10 text-sky2 px-2 py-0.5 rounded-full">Dicuci</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Fatimah A.</td><td class="px-4 py-2.5">3 pcs</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">Siap Ambil</span></td></tr>
                                            <tr><td class="px-4 py-2.5 font-semibold">Yusuf H.</td><td class="px-4 py-2.5">4 pcs</td><td class="px-4 py-2.5"><span class="text-[11px] font-bold bg-slate-200 text-slate-600 px-2 py-0.5 rounded-full">Diambil</span></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>

            </div>

            <!-- CTA -->
            <div class="mt-10 hero-gradient relative overflow-hidden rounded-3xl">
                <div class="absolute inset-0 grid-pattern"></div>
                <div class="relative p-8 sm:p-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h3 class="font-heading font-extrabold text-2xl text-white">Ingin mencoba dengan data sekolah Anda?</h3>
                        <p class="mt-2 text-white/85 text-sm">Jadwalkan demo gratis 30 menit — kami tunjukkan alur lengkap sesuai kebutuhan sekolah.</p>
                    </div>
                    <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20demo%20SIAKAD%20PLUS%20dengan%20data%20sekolah%20saya." target="_blank"
                        class="flex-shrink-0 inline-flex items-center gap-2 bg-amber2 hover:scale-105 transition-transform text-white font-bold px-7 py-3.5 rounded-2xl shadow-glow">
                        Jadwalkan Demo Gratis
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= FOOTER ======= -->
    <footer class="bg-slate-900 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-xs">S+</div>
                <span class="font-heading font-bold text-white text-lg">SIAKAD PLUS</span>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-400">
                <a href="{{ url('/apps') }}" class="text-slate-400 hover:text-white transition-colors">Katalog Aplikasi</a>
                <a href="{{ url('/siakadplus') }}" class="text-slate-400 hover:text-white transition-colors">SIAKAD PLUS</a>
                <a href="{{ url('/siakadplus/fitur') }}" class="text-slate-400 hover:text-white transition-colors">Fitur Lengkap</a>
                <a href="mailto:hendrosoemarno@gmail.com" class="text-slate-400 hover:text-white transition-colors">Email</a>
            </div>
        </div>
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 text-center text-xs">
                <p>© 2026 PT Artificial Intelligence Learning Madani Digital. Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        const buttons = document.querySelectorAll('.sim-btn');
        const panels = document.querySelectorAll('.sim-panel');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                buttons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                panels.forEach(p => p.classList.add('hidden-panel'));
                const target = document.getElementById(btn.dataset.sim);
                if (target) target.classList.remove('hidden-panel');
            });
        });
    </script>
</body>

</html>
