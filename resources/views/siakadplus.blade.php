<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD PLUS — Kelola Operasional Sekolah Lebih Mudah & Terpadu</title>
    <meta name="description"
        content="SIAKAD PLUS: Sistem Informasi Digital Sekolah terpadu. SPMB online, pembayaran cashless, CBT, presensi WA, hingga e-Rapor dalam satu platform.">
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
        .animate-float {
            animation: float 5s ease-in-out infinite;
        }
        .animate-float-delay {
            animation: float 5s ease-in-out 1.5s infinite;
        }
        @keyframes float {
            0%,
            100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-14px);
            }
        }
        .tab-btn.active {
            background: #1E40AF;
            color: #fff;
            box-shadow: 0 10px 25px -8px rgba(30, 64, 175, 0.5);
        }
        .feature-panel.hidden-panel {
            display: none;
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        .faq-item.open .faq-answer {
            max-height: 300px;
        }
        .faq-item.open .faq-chevron {
            transform: rotate(180deg);
        }
        .faq-chevron {
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body class="font-body bg-slate2 text-slate-800 antialiased overflow-x-hidden">

    <!-- ======= HEADER & NAVIGATION ======= -->
    <header class="sticky top-0 z-40 bg-white/85 backdrop-blur-md border-b border-slate-200/70 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <a href="#top" class="flex items-center gap-2.5">
                <div
                    class="w-9 h-9 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-xs">
                    S+</div>
                <div class="leading-tight">
                    <span class="font-heading font-bold text-navy text-lg">SIAKAD PLUS</span>
                    <span class="hidden sm:block text-[10px] font-semibold text-slate-400 tracking-wide">Sekolah Digital
                        Terpadu</span>
                </div>
                <span
                    class="hidden md:inline-flex items-center gap-1 ml-2 bg-emerald2/10 border border-emerald2/30 text-emerald2 text-[10px] font-bold px-2.5 py-1 rounded-full">
                    ✓ Terdaftar PSE Kominfo
                </span>
            </a>
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-600">
                <a href="#top" class="hover:text-navy transition-colors">Beranda</a>
                <a href="#fitur" class="hover:text-navy transition-colors">Produk/Fitur</a>
                <a href="#dampak" class="hover:text-navy transition-colors">Dampak/Testimoni</a>
                <a href="#harga" class="hover:text-navy transition-colors">Harga/Paket</a>
                <a href="#" class="hover:text-navy transition-colors">Blog</a>
            </nav>
            <div class="flex items-center gap-2.5">
                <a href="#"
                    class="hidden sm:inline-flex items-center gap-2 border border-navy text-navy hover:bg-navy hover:text-white transition-colors font-bold px-5 py-2.5 rounded-xl text-sm">
                    Login
                </a>
                <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20Jadwalkan%20Demo%20Gratis%20SIAKAD%20PLUS%20(30%20menit)."
                    target="_blank"
                    class="inline-flex items-center gap-2 bg-amber2 hover:scale-105 transition-transform text-white font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-amber2/30 text-sm">
                    Jadwalkan Demo Gratis
                </a>
            </div>
        </div>
    </header>

    <!-- ======= HERO SECTION ======= -->
    <section id="top" class="hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-white/10 blur-3xl"></div>
        <div class="absolute -bottom-32 -left-16 w-96 h-96 rounded-full bg-emerald2/20 blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Kiri -->
            <div>
                <span
                    class="inline-flex items-center gap-2 bg-amber2 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg shadow-amber2/40">
                    🎓 Sistem Informasi Digital Sekolah
                </span>
                <h1
                    class="mt-6 font-heading font-extrabold text-white text-3xl sm:text-4xl lg:text-[2.75rem] leading-[1.15]">
                    Kelola Operasional Sekolah Lebih Mudah &amp; Terpadu dalam Satu Platform Digital
                </h1>
                <p class="mt-5 text-white/90 text-base sm:text-lg leading-relaxed">
                    Pendaftaran siswa online, pembayaran cashless, CBT, presensi WA, hingga e-Rapor.
                    <span class="font-semibold">Tanpa antrean, tanpa rekap manual.</span>
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20Jadwalkan%20Demo%20Gratis%20SIAKAD%20PLUS%20(30%20menit)."
                        target="_blank"
                        class="inline-flex items-center justify-center gap-2 bg-amber2 hover:scale-105 transition-transform text-white font-bold px-7 py-3.5 rounded-2xl shadow-glow">
                        Jadwalkan Demo Gratis (30 Menit)
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="{{ url('/siakadplus/fitur') }}"
                        class="inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur border border-white/30 text-white font-semibold px-7 py-3.5 rounded-2xl hover:bg-white/20 transition-colors">
                        Lihat Fitur Lengkap
                    </a>
                </div>
                <!-- Social Proof Counter -->
                <div class="mt-8 grid grid-cols-3 gap-3 max-w-md">
                    <div class="bg-white/10 backdrop-blur border border-white/20 rounded-2xl p-3.5 text-center">
                        <p class="font-heading font-extrabold text-2xl text-white">200+</p>
                        <p class="text-[11px] font-semibold text-white/70">Sekolah Mitra</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur border border-white/20 rounded-2xl p-3.5 text-center">
                        <p class="font-heading font-extrabold text-2xl text-white">98%</p>
                        <p class="text-[11px] font-semibold text-white/70">Berkas Lengkap</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur border border-white/20 rounded-2xl p-3.5 text-center">
                        <p class="font-heading font-extrabold text-2xl text-white">40<span
                                class="text-sm font-bold">jam</span></p>
                        <p class="text-[11px] font-semibold text-white/70">Hemat Kerja Guru/Bulan</p>
                    </div>
                </div>
            </div>

            <!-- Kanan: Preview Dashboard Mockup -->
            <div class="relative hidden sm:block">
                <div class="relative mx-auto max-w-md bg-white rounded-3xl shadow-glow border border-white/40 rotate-1 overflow-hidden">
                    <div class="flex items-center gap-1.5 px-4 py-3 bg-slate-100 border-b border-slate-200">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                        <span class="ml-2 text-[11px] text-slate-400 font-semibold">dashboard.siakadplus.id</span>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-xs">S+</div>
                            <div>
                                <p class="font-heading font-bold text-navy text-sm">Dashboard Sekolah</p>
                                <p class="text-[11px] text-slate-400">Tahun Ajaran 2026/2027 · Semester Ganjil</p>
                            </div>
                        </div>
                        <div class="mt-4 grid grid-cols-3 gap-2.5">
                            <div class="bg-emerald2/10 border border-emerald2/20 rounded-xl p-3 text-center">
                                <p class="font-heading font-extrabold text-lg text-emerald2">1.240</p>
                                <p class="text-[10px] font-semibold text-slate-500">Siswa Aktif</p>
                            </div>
                            <div class="bg-sky2/10 border border-sky2/20 rounded-xl p-3 text-center">
                                <p class="font-heading font-extrabold text-lg text-sky2">96%</p>
                                <p class="text-[10px] font-semibold text-slate-500">Kehadiran</p>
                            </div>
                            <div class="bg-amber2/10 border border-amber2/20 rounded-xl p-3 text-center">
                                <p class="font-heading font-extrabold text-lg text-amber2">Rp 84jt</p>
                                <p class="text-[10px] font-semibold text-slate-500">SPP Terkumpul</p>
                            </div>
                        </div>
                        <div class="mt-3 bg-slate-50 border border-slate-100 rounded-2xl p-4">
                            <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Penerimaan SPP — 7 Hari Terakhir</p>
                            <div class="mt-2 flex items-end gap-1.5 h-16">
                                <div class="flex-1 bg-navy/30 rounded-t" style="height:35%"></div>
                                <div class="flex-1 bg-navy/40 rounded-t" style="height:50%"></div>
                                <div class="flex-1 bg-navy/60 rounded-t" style="height:62%"></div>
                                <div class="flex-1 bg-sky2/70 rounded-t" style="height:70%"></div>
                                <div class="flex-1 bg-emerald2 rounded-t" style="height:88%"></div>
                                <div class="flex-1 bg-emerald2 rounded-t" style="height:100%"></div>
                                <div class="flex-1 bg-emerald2 rounded-t" style="height:78%"></div>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 rounded-xl px-3 py-2.5">
                            <span class="w-6 h-6 rounded-full bg-emerald2 text-white grid place-items-center text-xs">✓</span>
                            <p class="text-[11px] font-semibold text-slate-600">e-Rapor semester ganjil terbit otomatis</p>
                        </div>
                    </div>
                </div>

                <!-- Floating Badges -->
                <div class="absolute -top-6 -left-4 sm:-left-10 animate-float bg-white rounded-2xl shadow-xl px-4 py-2.5 flex items-center gap-2 border border-slate-100">
                    <span class="w-8 h-8 rounded-full bg-emerald2/15 grid place-items-center text-emerald2 text-sm">✓</span>
                    <span class="text-xs font-bold text-slate-700">Nilai CBT Instan</span>
                </div>
                <div class="absolute -bottom-6 -right-2 sm:-right-8 animate-float-delay bg-white rounded-2xl shadow-xl px-4 py-2.5 flex items-center gap-2 border border-slate-100">
                    <span class="w-8 h-8 rounded-full bg-emerald2/15 grid place-items-center text-emerald2 text-sm">✉</span>
                    <span class="text-xs font-bold text-slate-700">Notifikasi WA Real-Time</span>
                </div>
            </div>
        </div>

        <svg class="w-full text-slate2" viewBox="0 0 1440 60" fill="currentColor" preserveAspectRatio="none">
            <path d="M0,30 C360,70 720,0 1080,30 C1260,45 1380,40 1440,35 L1440,60 L0,60 Z"></path>
        </svg>
    </section>

    <!-- ======= PROBLEM vs SOLUTION ======= -->
    <section id="masalah" class="py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Masalah &amp; Solusi</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Tantangan Nyata
                    Sekolah, Sebelum &amp; Sesudah Digitalisasi</h2>
                <p class="mt-4 text-slate-500 leading-relaxed">Enam pekerjaan paling menyita waktu di sekolah — dan
                    bagaimana SIAKAD PLUS menyelesaikannya.</p>
            </div>

            <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="flex items-center gap-2 text-xs font-bold">
                        <span class="bg-red-100 text-red-600 px-2.5 py-1 rounded-full">SPMB Manual</span>
                        <span class="text-slate-300">→</span>
                        <span class="bg-emerald2/10 text-emerald2 px-2.5 py-1 rounded-full">SPMB Digital</span>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">Penerimaan Siswa 100% dari HP</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Formulir online, upload berkas, seleksi, hingga pengumuman — tanpa antrean di meja tata usaha.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="flex items-center gap-2 text-xs font-bold">
                        <span class="bg-red-100 text-red-600 px-2.5 py-1 rounded-full">Ujian Kertas</span>
                        <span class="text-slate-300">→</span>
                        <span class="bg-emerald2/10 text-emerald2 px-2.5 py-1 rounded-full">CBT Digital</span>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">Nilai Instan &amp; Anti-Curang</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Ujian berbasis komputer dengan acak soal, timer otomatis, dan nilai keluar detik itu juga.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="flex items-center gap-2 text-xs font-bold">
                        <span class="bg-red-100 text-red-600 px-2.5 py-1 rounded-full">Soal dari Nol</span>
                        <span class="text-slate-300">→</span>
                        <span class="bg-emerald2/10 text-emerald2 px-2.5 py-1 rounded-full">AI Generate</span>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">AI Generate Soal &amp; Modul Ajar</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Buat bank soal dan modul ajar sesuai kurikulum dalam hitungan menit, bukan akhir pekan.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="flex items-center gap-2 text-xs font-bold">
                        <span class="bg-red-100 text-red-600 px-2.5 py-1 rounded-full">SPP Tunai</span>
                        <span class="text-slate-300">→</span>
                        <span class="bg-emerald2/10 text-emerald2 px-2.5 py-1 rounded-full">Keuangan Digital</span>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">VA, QRIS &amp; E-Wallet</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Tagihan otomatis, pengingat tunggakan via WA, dan rekonsiliasi tanpa selisih kas.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="flex items-center gap-2 text-xs font-bold">
                        <span class="bg-red-100 text-red-600 px-2.5 py-1 rounded-full">Absensi Kertas</span>
                        <span class="text-slate-300">→</span>
                        <span class="bg-emerald2/10 text-emerald2 px-2.5 py-1 rounded-full">Presensi Digital</span>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">Presensi + Notifikasi WA Real-Time</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Orang tua langsung menerima kabar kehadiran anak setiap hari. Tanpa rekap manual.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="flex items-center gap-2 text-xs font-bold">
                        <span class="bg-red-100 text-red-600 px-2.5 py-1 rounded-full">Kantin Tunai</span>
                        <span class="text-slate-300">→</span>
                        <span class="bg-emerald2/10 text-emerald2 px-2.5 py-1 rounded-full">Kantin Digital</span>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">E-Canteen / E-Money Siswa</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Uang saku digital yang aman: saldo terpantau orang tua, jajan tercatat, tanpa uang hilang.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= FEATURE OVERVIEW / ECOSYSTEM (TABS) ======= -->
    <section id="fitur" class="py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Produk / Fitur</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Satu Platform,
                    Semua Modul Terhubung</h2>
                <p class="mt-4 text-slate-500">Klik setiap modul untuk melihat kemampuannya.</p>
            </div>

            <div class="mt-10 flex justify-center">
                <div class="inline-flex flex-wrap justify-center bg-slate2 border border-slate-200 rounded-2xl p-1.5 gap-1 shadow-md max-w-full">
                    <button data-tab="feat-akademik" class="tab-btn active px-5 py-2.5 rounded-xl font-heading font-bold text-sm transition-all">📚 Akademik</button>
                    <button data-tab="feat-keuangan" class="tab-btn px-5 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-500 transition-all">💰 Keuangan</button>
                    <button data-tab="feat-presensi" class="tab-btn px-5 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-500 transition-all">✅ Presensi</button>
                    <button data-tab="feat-cbt" class="tab-btn px-5 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-500 transition-all">💻 CBT</button>
                    <button data-tab="feat-canteen" class="tab-btn px-5 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-500 transition-all">🍽️ E-Canteen</button>
                    <button data-tab="feat-pesantren" class="tab-btn px-5 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-500 transition-all">🕌 E-Pesantren</button>
                </div>
            </div>

            <div class="mt-10 max-w-4xl mx-auto">
                <div id="feat-akademik" class="feature-panel bg-slate2 rounded-3xl border border-slate-200 p-6 sm:p-8">
                    <h3 class="font-heading font-extrabold text-2xl text-navy">Modul Akademik</h3>
                    <ul class="mt-4 grid sm:grid-cols-2 gap-3 text-sm text-slate-600">
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Data induk siswa, guru &amp; kelas terpusat</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> e-Rapor otomatis sesuai kurikulum</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Jadwal pelajaran &amp; kalender akademik</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> SPMB online 100% dari HP</li>
                    </ul>
                </div>
                <div id="feat-keuangan" class="feature-panel hidden-panel bg-slate2 rounded-3xl border border-slate-200 p-6 sm:p-8">
                    <h3 class="font-heading font-extrabold text-2xl text-navy">Modul Keuangan</h3>
                    <ul class="mt-4 grid sm:grid-cols-2 gap-3 text-sm text-slate-600">
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Tagihan SPP otomatis per siswa</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Virtual Account multi-bank, QRIS &amp; e-wallet</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Pengingat tunggakan via WhatsApp</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Laporan arus kas &amp; rekonsiliasi real-time</li>
                    </ul>
                </div>
                <div id="feat-presensi" class="feature-panel hidden-panel bg-slate2 rounded-3xl border border-slate-200 p-6 sm:p-8">
                    <h3 class="font-heading font-extrabold text-2xl text-navy">Modul Presensi</h3>
                    <ul class="mt-4 grid sm:grid-cols-2 gap-3 text-sm text-slate-600">
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Presensi QR / PIN / wali kelas</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Notifikasi WA real-time ke orang tua</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Rekap kehadiran otomatis per kelas</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Izin &amp; sakit tercatat digital</li>
                    </ul>
                </div>
                <div id="feat-cbt" class="feature-panel hidden-panel bg-slate2 rounded-3xl border border-slate-200 p-6 sm:p-8">
                    <h3 class="font-heading font-extrabold text-2xl text-navy">Modul CBT</h3>
                    <ul class="mt-4 grid sm:grid-cols-2 gap-3 text-sm text-slate-600">
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Bank soal &amp; acak paket ujian</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Nilai instan &amp; analisis butir soal</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Mode anti-curang (timer, lock, acak)</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> AI Generate Soal &amp; Modul Ajar</li>
                    </ul>
                </div>
                <div id="feat-canteen" class="feature-panel hidden-panel bg-slate2 rounded-3xl border border-slate-200 p-6 sm:p-8">
                    <h3 class="font-heading font-extrabold text-2xl text-navy">Modul E-Canteen</h3>
                    <ul class="mt-4 grid sm:grid-cols-2 gap-3 text-sm text-slate-600">
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> E-money siswa untuk jajan di kantin</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Top-up via VA, QRIS &amp; minimarket</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Limit harian &amp; pantauan orang tua</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Laporan penjualan tenant kantin</li>
                    </ul>
                </div>
                <div id="feat-pesantren" class="feature-panel hidden-panel bg-slate2 rounded-3xl border border-slate-200 p-6 sm:p-8">
                    <h3 class="font-heading font-extrabold text-2xl text-navy">Modul E-Pesantren</h3>
                    <ul class="mt-4 grid sm:grid-cols-2 gap-3 text-sm text-slate-600">
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Data santri, kamar &amp; ustadz terpusat</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Tahfidz &amp; kitab kuning tracking</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Perizinan keluar &amp; kunjungan digital</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Syahriyah &amp; tabungan santri</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= DIFERENSIASI & PENDAMPINGAN ======= -->
    <section id="pendampingan" class="py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Value Proposition</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Pendampingan
                    Tanpa Batas, Bukan Sekadar Jual Aplikasi</h2>
            </div>
            <div class="mt-12 grid md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-8 shadow-md border border-slate-100 text-center hover:-translate-y-1.5 transition-transform">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-navy text-white grid place-items-center font-heading font-extrabold text-lg">7</div>
                    <h3 class="mt-5 font-heading font-bold text-xl text-slate-800">Onboarding 7 Hari</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Migrasi data, konfigurasi VA &amp; QRIS, dan go-live didampingi langkah demi langkah hingga sistem berjalan.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-md border border-slate-100 text-center hover:-translate-y-1.5 transition-transform">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-sky2 text-white grid place-items-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="mt-5 font-heading font-bold text-xl text-slate-800">Pelatihan Pengguna</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Training untuk operator, guru, bendahara, hingga orang tua — via Zoom maupun tatap muka, sampai mahir.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-md border border-slate-100 text-center hover:-translate-y-1.5 transition-transform">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-emerald2 text-white grid place-items-center">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91C21.96 6.45 17.5 2 12.04 2z" /></svg>
                    </div>
                    <h3 class="mt-5 font-heading font-bold text-xl text-slate-800">Dedicated Support WA</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Tim support khusus via WhatsApp yang responsif setiap hari kerja — kendala teknis tertangani cepat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= DAMPAK / TESTIMONI ======= -->
    <section id="dampak" class="py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Dampak / Testimoni</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Dipercaya
                    Sekolah-Sekolah di Indonesia</h2>
            </div>
            <div class="mt-12 grid md:grid-cols-3 gap-6">
                <div class="bg-slate2 rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <div class="flex gap-1 text-amber2">★★★★★</div>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">"Rekap SPP yang biasanya makan waktu seminggu, sekarang selesai dalam sehari. Tunggakan turun drastis karena orang tua diingatkan otomatis via WA."</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-navy text-white grid place-items-center font-heading font-bold text-sm">HS</div>
                        <div><p class="text-sm font-bold text-slate-800">Kepala Sekolah</p><p class="text-xs text-slate-400">SD Swasta · Malang</p></div>
                    </div>
                </div>
                <div class="bg-slate2 rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <div class="flex gap-1 text-amber2">★★★★★</div>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">"Ujian dengan CBT menghemat 40 jam kerja guru per bulan. Nilai langsung keluar, analisis butir soal membantu kami memperbaiki pembelajaran."</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-sky2 text-white grid place-items-center font-heading font-bold text-sm">WK</div>
                        <div><p class="text-sm font-bold text-slate-800">Waka Kurikulum</p><p class="text-xs text-slate-400">SMP Swasta · Surabaya</p></div>
                    </div>
                </div>
                <div class="bg-slate2 rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <div class="flex gap-1 text-amber2">★★★★★</div>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">"Pendampingannya luar biasa. Dari migrasi data sampai training guru, semuanya didampingi. Sekolah kami go-live hanya dalam seminggu."</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald2 text-white grid place-items-center font-heading font-bold text-sm">OP</div>
                        <div><p class="text-sm font-bold text-slate-800">Operator Sekolah</p><p class="text-xs text-slate-400">Pondok Pesantren · Pasuruan</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= HARGA / PAKET ======= -->
    <section id="harga" class="py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Harga / Paket</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Pilih Paket
                    Sesuai Kebutuhan Sekolah Anda</h2>
                <p class="mt-4 text-slate-500">Semua paket termasuk onboarding 7 hari, training, dan dedicated support WA.</p>
            </div>
            <div class="mt-12 grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-md p-8 flex flex-col">
                    <h3 class="font-heading font-extrabold text-xl text-slate-800">Starter</h3>
                    <p class="mt-1 text-sm text-slate-400">Untuk sekolah kecil &amp; baru digitalisasi</p>
                    <ul class="mt-6 space-y-2.5 text-sm text-slate-600 flex-1">
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Akademik + e-Rapor</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> SPMB Online</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Presensi + Notifikasi WA</li>
                    </ul>
                    <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20minta%20penawaran%20paket%20Starter%20SIAKAD%20PLUS." target="_blank" class="mt-6 inline-flex justify-center border border-navy text-navy hover:bg-navy hover:text-white transition-colors font-bold text-sm px-4 py-2.5 rounded-xl">Minta Penawaran</a>
                </div>
                <div class="bg-navy rounded-3xl shadow-glow p-8 flex flex-col relative overflow-hidden">
                    <span class="absolute top-4 right-4 bg-amber2 text-white text-[10px] font-bold px-2.5 py-1 rounded-full">Paling Diminati</span>
                    <h3 class="font-heading font-extrabold text-xl text-white">Professional</h3>
                    <p class="mt-1 text-sm text-white/70">Digitalisasi penuh operasional sekolah</p>
                    <ul class="mt-6 space-y-2.5 text-sm text-white/90 flex-1">
                        <li class="flex items-start gap-2"><span class="text-amber2 font-bold">✓</span> Semua fitur Starter</li>
                        <li class="flex items-start gap-2"><span class="text-amber2 font-bold">✓</span> Keuangan Digital (VA, QRIS, E-Wallet)</li>
                        <li class="flex items-start gap-2"><span class="text-amber2 font-bold">✓</span> CBT + AI Generate Soal</li>
                        <li class="flex items-start gap-2"><span class="text-amber2 font-bold">✓</span> E-Canteen / E-Money</li>
                    </ul>
                    <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20minta%20penawaran%20paket%20Professional%20SIAKAD%20PLUS." target="_blank" class="mt-6 inline-flex justify-center bg-amber2 hover:scale-105 transition-transform text-white font-bold text-sm px-4 py-2.5 rounded-xl">Minta Penawaran</a>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-md p-8 flex flex-col">
                    <h3 class="font-heading font-extrabold text-xl text-slate-800">Enterprise / Pesantren</h3>
                    <p class="mt-1 text-sm text-slate-400">Yayasan, pesantren &amp; multi-unit sekolah</p>
                    <ul class="mt-6 space-y-2.5 text-sm text-slate-600 flex-1">
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Semua fitur Professional</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> E-Pesantren + multi-unit</li>
                        <li class="flex items-start gap-2"><span class="text-emerald2 font-bold">✓</span> Kustomisasi &amp; API integrasi</li>
                    </ul>
                    <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20minta%20penawaran%20paket%20Enterprise%20SIAKAD%20PLUS." target="_blank" class="mt-6 inline-flex justify-center border border-navy text-navy hover:bg-navy hover:text-white transition-colors font-bold text-sm px-4 py-2.5 rounded-xl">Minta Penawaran</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= SUPPORTED PAYMENTS ======= -->
    <section id="pembayaran" class="py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Fasilitas Pembayaran</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Didukung Semua
                    Metode Pembayaran Favorit</h2>
            </div>
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-5xl mx-auto">
                <div class="bg-slate2 border border-slate-200 rounded-2xl p-6 text-center hover:shadow-md transition-shadow">
                    <p class="font-heading font-extrabold text-navy">Virtual Account</p>
                    <p class="mt-1 text-xs text-slate-500">BCA · BRI · Mandiri · BNI &amp; bank lainnya</p>
                </div>
                <div class="bg-slate2 border border-slate-200 rounded-2xl p-6 text-center hover:shadow-md transition-shadow">
                    <p class="font-heading font-extrabold text-navy">QRIS</p>
                    <p class="mt-1 text-xs text-slate-500">Scan sekali, semua e-wallet &amp; m-banking</p>
                </div>
                <div class="bg-slate2 border border-slate-200 rounded-2xl p-6 text-center hover:shadow-md transition-shadow">
                    <p class="font-heading font-extrabold text-navy">Minimarket</p>
                    <p class="mt-1 text-xs text-slate-500">Indomaret · Alfamart di seluruh Indonesia</p>
                </div>
                <div class="bg-slate2 border border-slate-200 rounded-2xl p-6 text-center hover:shadow-md transition-shadow">
                    <p class="font-heading font-extrabold text-navy">E-Wallet</p>
                    <p class="mt-1 text-xs text-slate-500">OVO · DANA · GoPay · ShopeePay</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= FAQ (ACCORDION) ======= -->
    <section id="faq" class="py-20 lg:py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">FAQ</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Pertanyaan yang
                    Sering Diajukan</h2>
            </div>
            <div class="mt-10 space-y-3">
                <div class="faq-item bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-heading font-bold text-slate-800">
                        Berapa lama proses implementasi di sekolah kami?
                        <svg class="faq-chevron w-5 h-5 text-navy flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="faq-answer px-6"><p class="pb-5 text-sm text-slate-500 leading-relaxed">Rata-rata sekolah go-live dalam 7 hari: migrasi data siswa &amp; guru, konfigurasi VA/QRIS, training operator, lalu sistem siap dipakai. Tim kami mendampingi setiap tahapnya.</p></div>
                </div>
                <div class="faq-item bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-heading font-bold text-slate-800">
                        Apakah data sekolah kami aman?
                        <svg class="faq-chevron w-5 h-5 text-navy flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="faq-answer px-6"><p class="pb-5 text-sm text-slate-500 leading-relaxed">Ya. Data tersimpan di infrastruktur cloud dengan enkripsi, backup berkala, kontrol akses berbasis peran, dan kami terdaftar di PSE Kominfo.</p></div>
                </div>
                <div class="faq-item bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-heading font-bold text-slate-800">
                        Bagaimana jika guru/operator gagap teknologi?
                        <svg class="faq-chevron w-5 h-5 text-navy flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="faq-answer px-6"><p class="pb-5 text-sm text-slate-500 leading-relaxed">Tidak masalah. Kami menyediakan pelatihan bertahap sampai mahir, panduan video, dan dedicated support WA yang siap membantu setiap hari kerja.</p></div>
                </div>
                <div class="faq-item bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-heading font-bold text-slate-800">
                        Apakah orang tua perlu install aplikasi?
                        <svg class="faq-chevron w-5 h-5 text-navy flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="faq-answer px-6"><p class="pb-5 text-sm text-slate-500 leading-relaxed">Tidak wajib. Notifikasi presensi, tagihan, dan pengumuman dikirim via WhatsApp yang sudah dipakai sehari-hari. Portal orang tua juga bisa dibuka lewat browser HP.</p></div>
                </div>
                <div class="faq-item bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between gap-4 px-6 py-4 text-left font-heading font-bold text-slate-800">
                        Bagaimana skema biayanya?
                        <svg class="faq-chevron w-5 h-5 text-navy flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="faq-answer px-6"><p class="pb-5 text-sm text-slate-500 leading-relaxed">Berlangganan tahunan per paket (Starter, Professional, Enterprise) yang disesuaikan jumlah siswa dan modul yang aktif. Hubungi kami via WhatsApp untuk penawaran resmi sesuai kebutuhan sekolah Anda.</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= FINAL CTA ======= -->
    <section class="hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20 text-center">
            <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-white leading-tight">Siap Mendigitalkan
                Sekolah Anda dalam 7 Hari?</h2>
            <p class="mt-4 text-white/85 leading-relaxed">Jadwalkan demo gratis 30 menit via WhatsApp atau Zoom. Lihat
                langsung bagaimana SIAKAD PLUS bekerja dengan data simulasi sekolah Anda.</p>
            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20Jadwalkan%20Demo%20Gratis%20SIAKAD%20PLUS%20(30%20menit)."
                    target="_blank"
                    class="inline-flex items-center justify-center gap-2 bg-emerald2 hover:scale-105 transition-transform text-white font-bold px-8 py-3.5 rounded-2xl shadow-glow">
                    Demo Gratis via WhatsApp
                </a>
                <a href="{{ url('/apps') }}"
                    class="inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur border border-white/30 text-white font-semibold px-8 py-3.5 rounded-2xl hover:bg-white/20 transition-colors">
                    ← Kembali ke Katalog
                </a>
            </div>
        </div>
    </section>

    <!-- ======= FOOTER ======= -->
    <footer class="bg-slate-950 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 grid md:grid-cols-4 gap-10">
            <div class="md:col-span-1">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-xs">S+</div>
                    <span class="font-heading font-bold text-white text-lg">SIAKAD PLUS</span>
                </div>
                <p class="mt-4 text-sm leading-relaxed">Sistem Informasi Digital Sekolah terpadu dari PT Artificial Intelligence Learning Madani Digital.</p>
                <span class="mt-3 inline-flex items-center gap-1 bg-emerald2/10 border border-emerald2/30 text-emerald2 text-[10px] font-bold px-2.5 py-1 rounded-full">✓ Terdaftar PSE Kominfo</span>
            </div>
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-widest">Legalitas</h4>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li>PT Artificial Intelligence Learning Madani Digital</li>
                    <li>Terdaftar PSE Kominfo</li>
                    <li><a href="{{ url('/apps') }}" class="hover:text-white transition-colors">Ekosistem Aplikasi</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-widest">Alamat &amp; Kontak</h4>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li>📍 Malang, Jawa Timur, Indonesia</li>
                    <li><a href="https://wa.me/6281227700781" target="_blank" class="hover:text-white transition-colors">💬 +62 812-2770-0781</a></li>
                    <li><a href="mailto:hendrosoemarno@gmail.com" class="hover:text-white transition-colors">✉️ hendrosoemarno@gmail.com</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-widest">Navigasi</h4>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li><a href="#fitur" class="hover:text-white transition-colors">Produk/Fitur</a></li>
                    <li><a href="#dampak" class="hover:text-white transition-colors">Dampak/Testimoni</a></li>
                    <li><a href="#harga" class="hover:text-white transition-colors">Harga/Paket</a></li>
                    <li><a href="#faq" class="hover:text-white transition-colors">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs">
                <p>© 2026 PT Artificial Intelligence Learning Madani Digital. Hak cipta dilindungi.</p>
                <p>SIAKAD PLUS · Malang, Jawa Timur</p>
            </div>
        </div>
    </footer>

    <script>
        // Feature Tabs
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active');
                    b.classList.add('text-slate-500');
                });
                btn.classList.add('active');
                btn.classList.remove('text-slate-500');
                document.querySelectorAll('.feature-panel').forEach(p => p.classList.add('hidden-panel'));
                const panel = document.getElementById(btn.dataset.tab);
                if (panel) panel.classList.remove('hidden-panel');
            });
        });

        // FAQ Accordion
        document.querySelectorAll('.faq-toggle').forEach(toggle => {
            toggle.addEventListener('click', () => {
                const item = toggle.closest('.faq-item');
                const wasOpen = item.classList.contains('open');
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
                if (!wasOpen) item.classList.add('open');
            });
        });
    </script>
</body>

</html>
