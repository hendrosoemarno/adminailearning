<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Learning — Solusi Belajar Cerdas & Bermakna</title>
    <meta name="description"
        content="Dampingi Ananda (SD-SMA) menguasai Matematika, Bahasa Inggris, dan Coding melalui metode belajar adaptif, Next Level Exam, serta ikatan belajar berbasis nilai kekeluargaan.">
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
            background: linear-gradient(135deg, #1E40AF 0%, #0284C7 60%, #38bdf8 100%);
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
        .pricing-panel.hidden-panel {
            display: none;
        }
    </style>
</head>

<body class="font-body bg-slate2 text-slate-800 antialiased overflow-x-hidden">

    <!-- ======= NAVBAR ======= -->
    <header
        class="sticky top-0 z-40 bg-white/85 backdrop-blur-md border-b border-slate-200/70 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <a href="#top" class="flex items-center gap-2.5">
                <div
                    class="w-9 h-9 rounded-xl hero-gradient grid-pattern grid place-items-center text-white font-heading font-extrabold text-sm">
                    AI</div>
                <div class="leading-tight">
                    <span class="font-heading font-bold text-navy text-lg">AI Learning</span>
                </div>
            </a>
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-600">
                <a href="#nilai" class="hover:text-navy transition-colors">Nilai Kami</a>
                <a href="#kenapa" class="hover:text-navy transition-colors">Kenapa AI Learning</a>
                <a href="#program" class="hover:text-navy transition-colors">Program & Biaya</a>
                <a href="#proyek" class="hover:text-navy transition-colors">Karya Siswa</a>
                <a href="#sekolah" class="hover:text-navy transition-colors">Untuk Sekolah</a>
            </nav>
            <div class="flex items-center gap-3">
                <a href="https://wa.me/6281227700781" target="_blank"
                    class="inline-flex items-center gap-2 bg-emerald2 hover:scale-105 transition-transform text-white font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-emerald2/30">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91C21.96 6.45 17.5 2 12.04 2zm5.83 14.12c-.25.7-1.45 1.33-2 1.38-.51.04-1.15.07-1.85-.12-.43-.12-.98-.32-1.68-.62-2.94-1.28-4.86-4.26-5.01-4.46-.15-.2-1.2-1.6-1.2-3.05s.76-2.16 1.03-2.46c.27-.3.59-.37.79-.37.2 0 .39.002.56.01.18.01.42-.07.66.5.25.58.84 2 .91 2.14.07.15.12.32.02.52-.1.2-.15.32-.3.5-.15.17-.31.39-.44.52-.15.15-.31.31-.13.61.18.3.79 1.3 1.7 2.11 1.17 1.04 2.15 1.37 2.46 1.52.3.15.48.13.66-.08.18-.2.76-.88.96-1.19.2-.3.4-.25.67-.15.28.1 1.75.83 2.05.98.3.15.5.22.58.35.07.13.07.75-.17 1.47z" />
                    </svg>
                    Daftar
                </a>
            </div>
        </div>
    </header>

    <!-- ======= 1. HERO ======= -->
    <section id="top" class="hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 grid-pattern"></div>
        <div
            class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-white/10 blur-3xl">
        </div>
        <div
            class="absolute -bottom-32 -left-16 w-96 h-96 rounded-full bg-amber2/20 blur-3xl">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Kiri -->
            <div>
                <span
                    class="inline-flex items-center gap-2 bg-amber2 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg shadow-amber2/40">
                    ⭐ Free Placement Test
                </span>
                <h1
                    class="mt-6 font-heading font-extrabold text-white text-3xl sm:text-4xl lg:text-[2.75rem] leading-[1.15]">
                    Solusi Belajar Cerdas &amp; Bermakna: Bebas Lupa Materi, Kuasai Logika Digital Berlandaskan Adab!
                </h1>
                <p class="mt-5 text-white/90 text-base sm:text-lg leading-relaxed">
                    Dampingi Ananda (SD–SMA) menguasai Matematika, Bahasa Inggris, dan Coding melalui metode belajar
                    adaptif, <span class="font-semibold">Next Level Exam</span>, serta ikatan belajar berbasis nilai
                    kekeluargaan.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/6281227700781" target="_blank"
                        class="inline-flex items-center justify-center gap-2 bg-emerald2 hover:scale-105 transition-transform text-white font-bold px-7 py-3.5 rounded-2xl shadow-glow shadow-emerald2/40">
                        Daftar Placement Test Gratis
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="https://bio.topexam.id" target="_blank"
                        class="inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur border border-white/30 text-white font-semibold px-7 py-3.5 rounded-2xl hover:bg-white/20 transition-colors">
                        Kemitraan Sekolah &amp; Pemetaan Diagnostik
                    </a>
                </div>
                <div class="mt-8 flex flex-wrap items-center gap-4 text-white/80 text-sm">
                    <div class="flex -space-x-2">
                        <div
                            class="w-8 h-8 rounded-full bg-amber2 grid place-items-center text-xs font-bold">SA</div>
                        <div
                            class="w-8 h-8 rounded-full bg-emerald2 grid place-items-center text-xs font-bold">QR</div>
                        <div
                            class="w-8 h-8 rounded-full bg-sky2 grid place-items-center text-xs font-bold">JP</div>
                        <div
                            class="w-8 h-8 rounded-full bg-white/80 text-navy grid place-items-center text-xs font-bold">ID</div>
                    </div>
                    <span>Dipercaya siswa dari Indonesia hingga mancanegara</span>
                </div>
            </div>

            <!-- Kanan: Ilustrasi / Mockup -->
            <div class="relative hidden sm:block">
                <div
                    class="relative mx-auto max-w-sm bg-white rounded-3xl shadow-glow p-6 border border-white/40 rotate-1">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold">AI</div>
                        <div>
                            <p class="font-heading font-bold text-navy text-sm">Aplikasi Pendamping Belajar</p>
                            <p class="text-[11px] text-slate-400">Sinkron otomatis dengan sesi bimbingan</p>
                        </div>
                    </div>
                    <div class="mt-5 bg-slate-50 border border-slate-100 rounded-2xl p-4">
                        <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Progres Belajar — Matematika</p>
                        <div class="mt-3 space-y-3">
                            <div>
                                <div class="flex justify-between text-[11px] font-semibold text-slate-600"><span>Next Level Exam</span><span class="text-navy">92%</span></div>
                                <div class="mt-1 h-2 bg-slate-200 rounded-full overflow-hidden"><div class="h-full w-[92%] bg-navy rounded-full"></div></div>
                            </div>
                            <div>
                                <div class="flex justify-between text-[11px] font-semibold text-slate-600"><span>Daily Task</span><span class="text-sky2">78%</span></div>
                                <div class="mt-1 h-2 bg-slate-200 rounded-full overflow-hidden"><div class="h-full w-[78%] bg-sky2 rounded-full"></div></div>
                            </div>
                            <div>
                                <div class="flex justify-between text-[11px] font-semibold text-slate-600"><span>Pengulangan Materi (Spiral)</span><span class="text-emerald2">100%</span></div>
                                <div class="mt-1 h-2 bg-slate-200 rounded-full overflow-hidden"><div class="h-full w-full bg-emerald2 rounded-full"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="bg-amber2/10 border border-amber2/20 rounded-xl p-3 text-center">
                            <p class="text-2xl font-heading font-extrabold text-amber2">8</p>
                            <p class="text-[10px] font-semibold text-slate-500">Level Materi</p>
                        </div>
                    </div>
                </div>

                <!-- Floating Badges -->
                <div class="absolute -top-6 -left-4 sm:-left-10 animate-float bg-white rounded-2xl shadow-xl px-4 py-2.5 flex items-center gap-2 border border-slate-100">
                    <span class="w-8 h-8 rounded-full bg-emerald2/15 grid place-items-center text-emerald2 text-sm">✓</span>
                    <span class="text-xs font-bold text-slate-700">Free Placement Test</span>
                </div>
                <div class="absolute -bottom-6 -right-2 sm:-right-8 animate-float-delay bg-white rounded-2xl shadow-xl px-4 py-2.5 flex items-center gap-2 border border-slate-100">
                    <span class="w-8 h-8 rounded-full bg-sky2/15 grid place-items-center text-sky2 text-sm">↻</span>
                    <span class="text-xs font-bold text-slate-700">Sistem Spiral</span>
                </div>
            </div>
        </div>

        <svg class="w-full text-slate2" viewBox="0 0 1440 60" fill="currentColor" preserveAspectRatio="none">
            <path d="M0,30 C360,70 720,0 1080,30 C1260,45 1380,40 1440,35 L1440,60 L0,60 Z"></path>
        </svg>
    </section>

    <!-- ======= 2. CORE VALUES ======= -->
    <section id="nilai" class="py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Core Values</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Mendidik Generasi Pembelajar yang Beradab &amp; Berilmu</h2>
                <p class="mt-4 text-slate-500 leading-relaxed">Di AI Learning dan Muslim Junior Coder, kami meyakini bahwa pendidikan bukan sekadar hubungan transaksional, melainkan ikhtiar bersama untuk membimbing masa depan Ananda:</p>
            </div>

            <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="w-12 h-12 rounded-xl bg-navy/10 grid place-items-center">
                        <svg class="w-6 h-6 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">Meningkatkan Mutu Generasi Islam</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Membekali Ananda dengan logika, bahasa, dan teknologi untuk siap bersaing secara global.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="w-12 h-12 rounded-xl bg-amber2/15 grid place-items-center">
                        <svg class="w-6 h-6 text-amber2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 8a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17h3.064a5 5 0 00.237-9.998M14.901 5.273A3.997 3.997 0 0116 8.001c0 1.248-.117 2.44-.34 3.574"></path></svg>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">Mendahulukan Adab Sebelum Ilmu</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Menanamkan kesantunan, kedisiplinan, dan rasa hormat dalam setiap sesi bimbingan.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="w-12 h-12 rounded-xl bg-emerald2/15 grid place-items-center">
                        <svg class="w-6 h-6 text-emerald2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">Menjadi Bagian dari Keluarga Besar</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Setiap siswa adalah bagian dari keluarga kami yang didampingi dengan kasih sayang dan empati.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:-translate-y-1.5 transition-transform">
                    <div class="w-12 h-12 rounded-xl bg-sky2/15 grid place-items-center">
                        <svg class="w-6 h-6 text-sky2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                    </div>
                    <h3 class="mt-4 font-heading font-bold text-lg text-slate-800">Hubungan Berbasis Nilai</h3>
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed">Pendampingan penuh kehangatan, fokus pada pertumbuhan karakter dan kompetensi nyata Ananda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= 3. KENAPA AI LEARNING ======= -->
    <section id="kenapa" class="py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Kiri: Mockup monitoring -->
            <div class="relative order-2 lg:order-1">
                <div class="absolute inset-0 bg-gradient-to-tr from-navy/5 to-sky2/5 rounded-3xl"></div>
                <div class="relative bg-slate-900 rounded-3xl shadow-glow p-6 max-w-md">
                    <div class="flex items-center justify-between text-white/80 text-xs font-semibold">
                        <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald2"></span> Monitoring Real-Time</span>
                        <span>Ayah &amp; Bunda</span>
                    </div>
                    <div class="mt-6 space-y-4">
                        <div class="bg-white/5 rounded-xl p-4 border border-white/10 flex items-center justify-between">
                            <div><p class="text-[11px] text-slate-400">Log Aktivitas</p><p class="text-white font-heading font-bold text-sm">42 latihan terselesaikan</p></div>
                            <span class="text-emerald2 text-sm">▲ 18%</span>
                        </div>
                        <div class="bg-white/5 rounded-xl p-4 border border-white/10 flex items-center justify-between">
                            <div><p class="text-[11px] text-slate-400">Nilai Next Level</p><p class="text-white font-heading font-bold text-sm">92 / 100</p></div>
                            <span class="text-sky2 text-sm">Lv. 8</span>
                        </div>
                        <div class="bg-white/5 rounded-xl p-4 border border-white/10 flex items-center justify-between">
                            <div><p class="text-[11px] text-slate-400">Posisi Materi</p><p class="text-white font-heading font-bold text-sm">Aljabar — Pecahan</p></div>
                            <span class="text-amber2 text-sm">On Track</span>
                        </div>
                    </div>
                    <div class="mt-5 bg-white/5 rounded-xl p-4 border border-white/10">
                        <p class="text-[11px] text-slate-400 mb-2">Perkembangan Mingguan</p>
                        <div class="flex items-end gap-1.5 h-16">
                            <div class="flex-1 bg-sky2/40 rounded-t" style="height:35%"></div>
                            <div class="flex-1 bg-sky2/50 rounded-t" style="height:50%"></div>
                            <div class="flex-1 bg-sky2/70 rounded-t" style="height:62%"></div>
                            <div class="flex-1 bg-sky2/80 rounded-t" style="height:70%"></div>
                            <div class="flex-1 bg-emerald2 rounded-t" style="height:88%"></div>
                            <div class="flex-1 bg-emerald2 rounded-t" style="height:100%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kanan: Problem + features -->
            <div class="order-1 lg:order-2">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Kenapa AI Learning?</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Sering Khawatir Anak Cepat Lupa Materi Pelajaran?</h2>
                <p class="mt-4 text-slate-500 leading-relaxed">Bunda &amp; Ayah, kami paham bahwa setiap anak memiliki kecepatan belajar yang berbeda. Seringkali anak merasa jenuh karena materi terlalu sulit, atau cepat lupa karena materi lama tidak pernah diulang.</p>
                <p class="mt-2 text-slate-500 leading-relaxed">Melalui <span class="font-semibold text-navy">Aplikasi Pendamping Belajar</span>, seluruh sesi bimbingan di AI Learning tersinkronisasi otomatis dengan latihan mandiri di rumah:</p>

                <div class="mt-8 space-y-4">
                    <div class="bg-slate2 rounded-2xl border border-slate-200 p-5 hover:border-navy/40 hover:shadow-lg hover:shadow-navy/5 transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-navy text-white grid place-items-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-lg text-slate-800">Proses Belajar Terarah</h3>
                                <p class="mt-1 text-sm text-slate-500 leading-relaxed">Memastikan anak belajar di level yang tepat. Materi bimbingan dan latihan di aplikasi selalu sinkron sesuai progres pribadi siswa.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate2 rounded-2xl border border-slate-200 p-5 hover:border-sky2/40 hover:shadow-lg hover:shadow-sky2/5 transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-sky2 text-white grid place-items-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-lg text-slate-800">Pemahaman Konsisten (Sistem Spiral)</h3>
                                <p class="mt-1 text-sm text-slate-500 leading-relaxed">Melalui <span class="font-semibold text-sky2">Next Level Exam</span>, aplikasi secara otomatis mengulang materi sebelumnya di setiap ujian kenaikan level. Belajar materi baru tanpa melupakan materi lama!</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate2 rounded-2xl border border-slate-200 p-5 hover:border-emerald2/40 hover:shadow-lg hover:shadow-emerald2/5 transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-emerald2 text-white grid place-items-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-lg text-slate-800">Monitoring Real-Time</h3>
                                <p class="mt-1 text-sm text-slate-500 leading-relaxed">Ayah &amp; Bunda bisa memantau perkembangan belajar anak secara objektif langsung dari genggaman (cek log aktivitas, nilai, hingga posisi level materi).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= 4. PROGRAM & PAKET ======= -->
    <section id="program" class="py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Program B2C</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Pilihan Program Pembelajaran Bertahap &amp; Terukur</h2>
                <p class="mt-4 text-slate-500">Semua program diawali dengan <span class="font-semibold text-emerald2">Free Uji Kompetensi (Placement Test)</span> agar Ananda belajar di level yang tepat.</p>
            </div>

            <!-- Tab Navigation -->
            <div class="mt-10 flex justify-center">
                <div class="inline-flex bg-white border border-slate-200 rounded-2xl p-1.5 gap-1 shadow-md">
                    <button data-tab="tab-math" class="tab-btn active px-5 py-2.5 rounded-xl font-heading font-bold text-sm transition-all">📐 Matematika</button>
                    <button data-tab="tab-english" class="tab-btn px-5 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-500 transition-all">🌍 Bahasa Inggris</button>
                    <button data-tab="tab-coding" class="tab-btn px-5 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-500 transition-all">💻 Muslim Junior Coder</button>
                </div>
            </div>

            <!-- Tab: Matematika -->
            <div id="tab-math" class="pricing-panel mt-12">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-md p-6 sm:p-8">
                    <div class="flex flex-col md:flex-row md:items-center gap-4 justify-between">
                        <div>
                            <h3 class="font-heading font-extrabold text-2xl text-navy">A. Math Course <span class="text-slate-400 font-semibold text-base">(Private Online)</span></h3>
                            <ul class="mt-3 space-y-1.5 text-sm text-slate-600">
                                <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> Free Uji Kompetensi Siswa (<em>Placement Test</em>)</li>
                                <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> Aplikasi pendamping belajar Matematika — akses kapan pun &amp; di mana pun, jawaban terkoreksi otomatis</li>
                                <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> Durasi 60 menit/pertemuan · Private Online · Jadwal Fleksibel</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-8 overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[560px]">
                            <thead>
                                <tr class="bg-navy text-white">
                                    <th class="p-3.5 rounded-tl-xl font-heading font-bold text-sm">Jenjang</th>
                                    <th class="p-3.5 font-heading font-bold text-sm text-center">Paket 1 <span class="block text-[10px] font-normal text-white/70">1x / pekan</span></th>
                                    <th class="p-3.5 font-heading font-bold text-sm text-center bg-amber2">Paket 2 <span class="block text-[10px] font-normal text-white/80">2x / pekan · Paling Diminati</span></th>
                                    <th class="p-3.5 rounded-tr-xl font-heading font-bold text-sm text-center">Paket 3 <span class="block text-[10px] font-normal text-white/70">3x / pekan</span></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr>
                                    <td class="p-3.5 font-heading font-bold text-slate-800">SD</td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp195.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center bg-amber2/5 font-heading font-extrabold text-navy">Rp332.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp469.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-heading font-bold text-slate-800">SMP</td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp215.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center bg-amber2/5 font-heading font-extrabold text-navy">Rp372.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp529.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-heading font-bold text-slate-800">SMA</td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp235.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center bg-amber2/5 font-heading font-extrabold text-navy">Rp412.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp589.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tab: Bahasa Inggris -->
            <div id="tab-english" class="pricing-panel hidden-panel mt-12">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-md p-6 sm:p-8">
                    <div>
                        <h3 class="font-heading font-extrabold text-2xl text-navy">B. English Course <span class="text-slate-400 font-semibold text-base">(Private Online)</span></h3>
                        <ul class="mt-3 space-y-1.5 text-sm text-slate-600">
                            <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> Free Uji Kompetensi Siswa (<em>Placement Test</em>)</li>
                            <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> Aplikasi pendamping belajar Bahasa Inggris — akses kapan pun &amp; di mana pun, jawaban terkoreksi otomatis</li>
                            <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> Durasi 30 menit/pertemuan · Private Online · Jadwal Fleksibel</li>
                        </ul>
                    </div>
                    <div class="mt-8 overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[620px]">
                            <thead>
                                <tr class="bg-navy text-white">
                                    <th class="p-3.5 rounded-tl-xl font-heading font-bold text-sm">Level</th>
                                    <th class="p-3.5 font-heading font-bold text-sm text-center">Paket 1 <span class="block text-[10px] font-normal text-white/70">1x / pekan</span></th>
                                    <th class="p-3.5 font-heading font-bold text-sm text-center bg-amber2">Paket 2 <span class="block text-[10px] font-normal text-white/80">2x / pekan · Paling Diminati</span></th>
                                    <th class="p-3.5 font-heading font-bold text-sm text-center">Paket 3 <span class="block text-[10px] font-normal text-white/70">3x / pekan</span></th>
                                    <th class="p-3.5 rounded-tr-xl font-heading font-bold text-sm text-center">Paket 4 <span class="block text-[10px] font-normal text-white/70">4x / pekan</span></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr>
                                    <td class="p-3.5 font-heading font-bold text-slate-800">Level A – C</td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp165.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center bg-amber2/5 font-heading font-extrabold text-navy">Rp269.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp373.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp477.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-heading font-bold text-slate-800">Level D – F</td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp175.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center bg-amber2/5 font-heading font-extrabold text-navy">Rp289.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp403.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                    <td class="p-3.5 text-center font-semibold text-slate-600">Rp517.000 <span class="block text-[11px] font-normal text-slate-400">/bulan</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tab: Muslim Junior Coder -->
            <div id="tab-coding" class="pricing-panel hidden-panel mt-12">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-md p-6 sm:p-8">
                    <div>
                        <h3 class="font-heading font-extrabold text-2xl text-navy">C. Muslim Junior Coder <span class="text-slate-400 font-semibold text-base">(Coding Class)</span></h3>
                        <p class="mt-3 text-slate-600 text-sm leading-relaxed">Membantu siswa memahami <span class="font-semibold text-navy">Algoritma</span> agar mereka bisa membuat Game dan Aplikasi secara Mandiri melalui kurikulum berurutan (mudah ke sulit), <em>Individual Mentoring</em>, serta tantangan proyek nyata.</p>
                        <div class="mt-5 grid sm:grid-cols-2 gap-3">
                            <div class="bg-emerald2/5 border border-emerald2/20 rounded-xl p-4">
                                <p class="font-heading font-bold text-sm text-emerald2">1. App Specialist</p>
                                <p class="mt-1 text-xs text-slate-600">Membimbing Ananda membuat aplikasi nyata untuk dunia kerja &amp; usaha (Resto App, POS, dll).</p>
                            </div>
                            <div class="bg-sky2/5 border border-sky2/20 rounded-xl p-4">
                                <p class="font-heading font-bold text-sm text-sky2">2. Game Specialist</p>
                                <p class="mt-1 text-xs text-slate-600">Membimbing Ananda membuat game interaktif menggunakan GDevelop hingga Roblox.</p>
                            </div>
                        </div>
                        <ul class="mt-5 space-y-1.5 text-sm text-slate-600">
                            <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> <span class="font-semibold text-emerald2">Free</span> Biaya Pendaftaran</li>
                            <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> Aplikasi Pendamping Belajar</li>
                            <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> Kelas Kelompok kecil (Maksimal 7 Siswa per kelas)</li>
                            <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> 4x Pertemuan/bulan (Durasi 90 menit/pertemuan)</li>
                            <li class="flex items-start gap-2"><span class="text-emerald2">✓</span> E-Sertifikat Kelulusan</li>
                        </ul>
                    </div>
                    <div class="mt-8 overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[720px]">
                            <thead>
                                <tr class="bg-navy text-white">
                                    <th class="p-3.5 rounded-tl-xl font-heading font-bold text-sm">Level / Tahap</th>
                                    <th class="p-3.5 font-heading font-bold text-sm">Aplikasi</th>
                                    <th class="p-3.5 font-heading font-bold text-sm">Aktivitas Pembelajaran</th>
                                    <th class="p-3.5 rounded-tr-xl font-heading font-bold text-sm text-center">Biaya / Bulan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr>
                                    <td class="p-3.5 font-heading font-bold text-slate-800">Basic Coding</td>
                                    <td class="p-3.5 text-slate-600">Code.org</td>
                                    <td class="p-3.5 text-slate-600">Menyusun blok/puzzle code sesuai studi kasus dasar</td>
                                    <td class="p-3.5 text-center font-heading font-extrabold text-navy">Rp200.000</td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-heading font-bold text-slate-800">Block Coding</td>
                                    <td class="p-3.5 text-slate-600">Scratch</td>
                                    <td class="p-3.5 text-slate-600">Menyusun blok/puzzle code sesuai proyek game</td>
                                    <td class="p-3.5 text-center font-heading font-extrabold text-navy">Rp225.000</td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-heading font-bold text-slate-800">Gadget Coding <span class="block text-[10px] font-normal text-slate-400">(Game/App)</span></td>
                                    <td class="p-3.5 text-slate-600">GDevelop / Kodular</td>
                                    <td class="p-3.5 text-slate-600"><em>Lesscode framework</em> / blok aplikasi Android non-game</td>
                                    <td class="p-3.5 text-center font-heading font-extrabold text-navy">Rp250.000</td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-heading font-bold text-slate-800">Real Coding <span class="block text-[10px] font-normal text-slate-400">(Game/App)</span></td>
                                    <td class="p-3.5 text-slate-600">Roblox / PHP</td>
                                    <td class="p-3.5 text-slate-600"><em>Fullcode</em> objek grafis game atau aplikasi web interaktif</td>
                                    <td class="p-3.5 text-center font-heading font-extrabold text-navy">Rp300.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <p class="mt-6 text-center text-sm text-slate-400">* Harga belum termasuk biaya pendaftaran khusus program Coding &mdash; <span class="font-semibold text-emerald2">GRATIS</span>.</p>
        </div>
    </section>

    <!-- ======= 5. SHOWCASE PROYEK ======= -->
    <section id="proyek" class="py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Karya Siswa</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Karya Nyata Hasil Kreativitas Ananda</h2>
                <p class="mt-4 text-slate-500">Setiap proyek adalah bukti nyata bahwa logika, algoritma, dan kreativitas bisa dipelajari sejak dini.</p>
            </div>

            <div class="mt-12 grid md:grid-cols-3 gap-6">
                <!-- Farm Friend -->
                <div class="bg-slate2 rounded-3xl overflow-hidden border border-slate-200 shadow-md hover:-translate-y-1.5 transition-transform group">
                    <div class="h-40 bg-gradient-to-br from-emerald2 to-sky2 relative grid place-items-center">
                        <div class="absolute inset-0 grid-pattern"></div>
                        <div class="relative w-20 h-20 bg-white/20 backdrop-blur rounded-2xl grid place-items-center text-white text-4xl">🌾</div>
                        <span class="absolute top-3 left-3 bg-white/90 text-navy text-[10px] font-bold px-2.5 py-1 rounded-full">Roblox</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-heading font-extrabold text-xl text-slate-800">Roblox: Farm Friend</h3>
                        <p class="mt-2 text-sm text-slate-500 leading-relaxed">Proyek game pertanian bertema menanam dan memanen apel/wortel untuk dijual. Melatih konsep logika transaksi dan kondisi pemenang berbasis poin/uang terbanyak.</p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <span class="text-[10px] font-bold bg-emerald2/10 text-emerald2 px-2.5 py-1 rounded-full">Logika Transaksi</span>
                            <span class="text-[10px] font-bold bg-navy/10 text-navy px-2.5 py-1 rounded-full">Kondisi Pemenang</span>
                        </div>
                    </div>
                </div>

                <!-- Space War -->
                <div class="bg-slate2 rounded-3xl overflow-hidden border border-slate-200 shadow-md hover:-translate-y-1.5 transition-transform group">
                    <div class="h-40 bg-gradient-to-br from-navy to-sky2 relative grid place-items-center">
                        <div class="absolute inset-0 grid-pattern"></div>
                        <div class="relative w-20 h-20 bg-white/20 backdrop-blur rounded-2xl grid place-items-center text-white text-4xl">🚀</div>
                        <span class="absolute top-3 left-3 bg-white/90 text-navy text-[10px] font-bold px-2.5 py-1 rounded-full">GDevelop</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-heading font-extrabold text-xl text-slate-800">GDev: Space War</h3>
                        <p class="mt-2 text-sm text-slate-500 leading-relaxed">Proyek game pertempuran pesawat ruang angkasa melawan berbagai musuh dan <em>Boss Level</em>. Melatih alur <em>event-driven programming</em> dan kesehatan karakter.</p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <span class="text-[10px] font-bold bg-sky2/10 text-sky2 px-2.5 py-1 rounded-full">Event-Driven</span>
                            <span class="text-[10px] font-bold bg-navy/10 text-navy px-2.5 py-1 rounded-full">Health System</span>
                        </div>
                    </div>
                </div>

                <!-- Resto App -->
                <div class="bg-slate2 rounded-3xl overflow-hidden border border-slate-200 shadow-md hover:-translate-y-1.5 transition-transform group">
                    <div class="h-40 bg-gradient-to-br from-amber2 to-emerald2 relative grid place-items-center">
                        <div class="absolute inset-0 grid-pattern"></div>
                        <div class="relative w-20 h-20 bg-white/20 backdrop-blur rounded-2xl grid place-items-center text-white text-4xl">🍽️</div>
                        <span class="absolute top-3 left-3 bg-white/90 text-navy text-[10px] font-bold px-2.5 py-1 rounded-full">Kodular</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-heading font-extrabold text-xl text-slate-800">Kodular: Resto App</h3>
                        <p class="mt-2 text-sm text-slate-500 leading-relaxed">Aplikasi manajemen restoran/kafe dengan fitur <em>login</em>, pemesanan, informasi menu, hingga laporan keuangan. Mengenalkan logika bisnis dan fungsi aplikasi industri sejak dini.</p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <span class="text-[10px] font-bold bg-amber2/15 text-amber2 px-2.5 py-1 rounded-full">Logika Bisnis</span>
                            <span class="text-[10px] font-bold bg-navy/10 text-navy px-2.5 py-1 rounded-full">UI &amp; Flow</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= 6. TKA / TOP EXAM INDIVIDU ======= -->
    <section id="tka" class="py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Layanan Spesial</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Persiapan Tes Kemampuan Akademik (TKA) &amp; Pemetaan Diagnostik</h2>
                <p class="mt-4 text-slate-500 leading-relaxed">Kembalikan rasa percaya diri Ananda dalam menghadapi ujian nasional maupun seleksi sekolah unggulan melalui pemetaan diagnostik berbasis AI:</p>
            </div>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-md p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-navy text-white grid place-items-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <h3 class="font-heading font-bold text-lg text-slate-800">Deteksi Sub-Materi Spesifik</h3>
                    </div>
                    <p class="mt-3 text-sm text-slate-500 leading-relaxed">Mengetahui secara rinci di bagian mana Ananda butuh bantuan — bukan sekadar melihat nilai akhir.</p>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 shadow-md p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-emerald2 text-white grid place-items-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="font-heading font-bold text-lg text-slate-800">Intervensi Tepat Sasaran</h3>
                    </div>
                    <p class="mt-3 text-sm text-slate-500 leading-relaxed">Membantu siswa masuk ke <span class="font-semibold text-emerald2">Kelompok Juara</span> dan memperbaiki kelemahan materi pada <span class="font-semibold text-amber2">Kelompok Remedial</span>.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= 7. B2B / SEKOLAH (DARK) ======= -->
    <section id="sekolah" class="bg-slate-900 relative overflow-hidden py-20 lg:py-24">
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="absolute -top-20 right-0 w-96 h-96 rounded-full bg-navy/30 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-xs font-bold text-amber2 uppercase tracking-[0.2em]">Preview B2B · Top Exam</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-white leading-tight">Bapak/Ibu Guru &amp; Pimpinan Sekolah? Transformasi Data Nilai Menjadi Strategi Kesuksesan Siswa</h2>
                <p class="mt-4 text-slate-400 leading-relaxed">Top Exam menghadirkan <span class="font-semibold text-white">Platform Pemetaan Diagnostik berbasis AI</span> untuk sekolah dan lembaga pendidikan:</p>

                <ul class="mt-8 space-y-5">
                    <li class="flex items-start gap-4">
                        <div class="w-9 h-9 rounded-xl bg-emerald2/20 border border-emerald2/30 text-emerald2 grid place-items-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-white">Pengelompokan Otomatis</h3>
                            <p class="mt-1 text-sm text-slate-400">Mengelompokkan siswa secara akurat (<em>Kelompok Juara</em> vs <em>Kelompok Remedial</em>) tanpa rekap manual.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="w-9 h-9 rounded-xl bg-sky2/20 border border-sky2/30 text-sky2 grid place-items-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-white">Peta Kompetensi Siswa</h3>
                            <p class="mt-1 text-sm text-slate-400">Visualisasi <em>Radar Chart</em> untuk Matematika, IPA, B. Indonesia, B. Inggris, dan Agama.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="w-9 h-9 rounded-xl bg-amber2/20 border border-amber2/30 text-amber2 grid place-items-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-white">Ekosistem Digital Masa Depan</h3>
                            <p class="mt-1 text-sm text-slate-400">Siap terintegrasi dengan <em>Smart LMS</em>, <em>Sistem Administrasi Sekolah</em>, hingga <em>AI Language Lab</em> (Robot Teman Ngobrol Bahasa Inggris &amp; Arab).</p>
                        </div>
                    </li>
                </ul>

                <p class="mt-8 text-lg font-heading font-bold text-white">👉 Ingin Menerapkan Top Exam di Sekolah Anda?</p>
                <a href="https://bio.topexam.id" target="_blank"
                    class="mt-4 inline-flex items-center gap-2 bg-white hover:bg-slate-100 text-navy font-bold px-7 py-3.5 rounded-2xl shadow-lg hover:scale-105 transition-transform">
                    Pelajari Kemitraan Sekolah di bio.topexam.id
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
            </div>

            <!-- Radar Chart Widget -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-6 backdrop-blur max-w-md mx-auto w-full">
                <div class="flex items-center justify-between">
                    <p class="font-heading font-bold text-white text-sm">Peta Kompetensi Siswa</p>
                    <span class="text-[10px] text-slate-400 font-semibold bg-white/5 px-2 py-1 rounded-full">Radar Chart</span>
                </div>
                <div class="relative mt-6 aspect-square max-w-xs mx-auto">
                    <svg viewBox="0 0 200 200" class="w-full h-full">
                        <polygon points="100,20 162,60 162,140 100,180 38,140 38,60" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="1" />
                        <polygon points="100,60 141,83 141,127 100,150 59,127 59,83" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1" />
                        <polygon points="100,35 176,78 156,157 44,157 24,78" fill="url(#radarFill)" stroke="#38bdf8" stroke-width="2" />
                        <defs>
                            <radialGradient id="radarFill">
                                <stop offset="0%" stop-color="#38bdf8" stop-opacity="0.5" />
                                <stop offset="100%" stop-color="#1E40AF" stop-opacity="0.15" />
                            </radialGradient>
                        </defs>
                        <line x1="100" y1="100" x2="100" y2="20" stroke="rgba(255,255,255,0.1)" />
                        <line x1="100" y1="100" x2="162" y2="60" stroke="rgba(255,255,255,0.1)" />
                        <line x1="100" y1="100" x2="162" y2="140" stroke="rgba(255,255,255,0.1)" />
                        <line x1="100" y1="100" x2="100" y2="180" stroke="rgba(255,255,255,0.1)" />
                        <line x1="100" y1="100" x2="38" y2="140" stroke="rgba(255,255,255,0.1)" />
                        <line x1="100" y1="100" x2="38" y2="60" stroke="rgba(255,255,255,0.1)" />
                    </svg>
                    <span class="absolute top-1 left-1/2 -translate-x-1/2 text-[10px] font-semibold text-slate-300">Matematika</span>
                    <span class="absolute top-[22%] right-0 text-[10px] font-semibold text-slate-300">IPA</span>
                    <span class="absolute bottom-[18%] right-1 text-[10px] font-semibold text-slate-300">B. Inggris</span>
                    <span class="absolute bottom-[6%] left-1/2 -translate-x-1/2 text-[10px] font-semibold text-slate-300">Agama</span>
                    <span class="absolute bottom-[22%] left-1 text-[10px] font-semibold text-slate-300">B. Indonesia</span>
                </div>
                <div class="mt-6 grid grid-cols-2 gap-3">
                    <div class="bg-emerald2/10 border border-emerald2/30 rounded-xl p-3">
                        <p class="text-[10px] font-bold text-emerald2 uppercase">Kelompok Juara</p>
                        <p class="text-2xl font-heading font-extrabold text-white mt-1">68%</p>
                    </div>
                    <div class="bg-amber2/10 border border-amber2/30 rounded-xl p-3">
                        <p class="text-[10px] font-bold text-amber2 uppercase">Kelompok Remedial</p>
                        <p class="text-2xl font-heading font-extrabold text-white mt-1">32%</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= 8. SOCIAL PROOF / MAP ======= -->
    <section id="bukti" class="py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Jangkauan Global</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Standar Global untuk Masa Depan Pendidikan Indonesia</h2>
                <p class="mt-4 text-slate-500">Dipercayai oleh ratusan siswa di Indonesia hingga mancanegara (seperti Arab Saudi, Qatar, Mesir, dan Jepang).</p>
            </div>

            <!-- Stats -->
            <div class="mt-12 grid sm:grid-cols-3 gap-6">
                <div class="bg-slate2 rounded-2xl border border-slate-200 p-8 text-center hover:-translate-y-1 transition-transform">
                    <p class="font-heading font-extrabold text-5xl text-navy">600<span class="text-sky2">+</span></p>
                    <p class="mt-2 font-heading font-bold text-slate-700">Total Siswa Terfasilitasi</p>
                </div>
                <div class="bg-slate2 rounded-2xl border border-slate-200 p-8 text-center hover:-translate-y-1 transition-transform">
                    <p class="font-heading font-extrabold text-5xl text-emerald2">200<span class="text-sky2">+</span></p>
                    <p class="mt-2 font-heading font-bold text-slate-700">Siswa Aktif Terpetakan</p>
                </div>
                <div class="bg-slate2 rounded-2xl border border-slate-200 p-8 text-center hover:-translate-y-1 transition-transform">
                    <p class="font-heading font-extrabold text-5xl text-amber2">220<span class="text-sky2">+</span></p>
                    <p class="mt-2 font-heading font-bold text-slate-700">Asal Institusi Pendidikan</p>
                    <p class="text-xs text-slate-400 mt-1">Nasional &amp; Internasional</p>
                </div>
            </div>

            <!-- Dots map -->
            <div class="mt-12 bg-slate2 border border-slate-200 rounded-3xl p-8 relative overflow-hidden">
                <div class="absolute inset-0 grid-pattern opacity-40"></div>
                <div class="relative flex flex-wrap justify-center gap-x-10 gap-y-4 text-center">
                    <div class="flex flex-col items-center">
                        <span class="w-3 h-3 rounded-full bg-navy shadow-glow animate-pulse"></span>
                        <p class="mt-1.5 text-[10px] font-bold text-slate-600">Jabodetabek</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="w-3 h-3 rounded-full bg-sky2 shadow-glow animate-pulse"></span>
                        <p class="mt-1.5 text-[10px] font-bold text-slate-600">Jawa Tengah</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="w-3 h-3 rounded-full bg-emerald2 shadow-glow animate-pulse"></span>
                        <p class="mt-1.5 text-[10px] font-bold text-slate-600">Jawa Timur</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="w-3 h-3 rounded-full bg-amber2 shadow-glow animate-pulse"></span>
                        <p class="mt-1.5 text-[10px] font-bold text-slate-600">Sumatera</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="w-3 h-3 rounded-full bg-navy shadow-glow animate-pulse"></span>
                        <p class="mt-1.5 text-[10px] font-bold text-slate-600">Arab Saudi</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="w-3 h-3 rounded-full bg-sky2 shadow-glow animate-pulse"></span>
                        <p class="mt-1.5 text-[10px] font-bold text-slate-600">Qatar</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="w-3 h-3 rounded-full bg-emerald2 shadow-glow animate-pulse"></span>
                        <p class="mt-1.5 text-[10px] font-bold text-slate-600">Mesir</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="w-3 h-3 rounded-full bg-amber2 shadow-glow animate-pulse"></span>
                        <p class="mt-1.5 text-[10px] font-bold text-slate-600">Jepang</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= 9. CLOSING CTA ======= -->
    <section class="hero-gradient relative overflow-hidden py-20 lg:py-24">
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="relative max-w-3xl mx-auto px-4 text-center">
            <h2 class="font-heading font-extrabold text-white text-3xl sm:text-4xl leading-tight">Bismillaah, Mari Ikhtiarkan Pengalaman Belajar Terbaik &amp; Bermakna untuk Ananda 💡</h2>
            <p class="mt-4 text-white/90 text-lg">Yuk, saatnya bantu putra-putri kita belajar lebih cerdas, bukan lebih keras!</p>
            <a href="https://wa.me/6281227700781" target="_blank"
                class="mt-8 inline-flex items-center gap-2 bg-emerald2 hover:scale-105 transition-transform text-white font-bold px-8 py-4 rounded-2xl shadow-glow text-lg">
                Konsultasi Gratis &amp; Ambil Placement Test Sekarang
            </a>
            <div class="mt-6 flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm text-white/90">
                <span class="flex items-center gap-1.5">📱 WhatsApp: <a href="https://wa.me/6281227700781" target="_blank" class="font-semibold underline decoration-white/40 hover:text-white">0812-2770-0781</a></span>
                <span class="flex items-center gap-1.5">📸 Instagram: <a href="https://instagram.com/ailearning.id" target="_blank" class="font-semibold underline decoration-white/40 hover:text-white">@ailearning.id</a></span>
                <span class="flex items-center gap-1.5">🌐 Website: <a href="https://ailearning.id" target="_blank" class="font-semibold underline decoration-white/40 hover:text-white">ailearning.id</a></span>
            </div>
        </div>
    </section>

    <!-- ======= FOOTER ======= -->
    <footer class="bg-slate-950 text-slate-400 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-sm">AI</div>
                <div class="leading-tight">
                    <span class="font-heading font-bold text-white">AI Learning</span>
                </div>
            </div>
            <p class="text-sm text-center">© {{ date('Y') }} AI Learning · Bersama mendidik generasi beradab &amp; berilmu.</p>
            <div class="flex gap-4 text-sm">
                <a href="https://instagram.com/ailearning.id" target="_blank" class="hover:text-white">Instagram</a>
                <a href="https://bio.topexam.id" target="_blank" class="hover:text-white">Top Exam</a>
                <a href="https://ailearning.id" target="_blank" class="hover:text-white">ailearning.id</a>
            </div>
        </div>
    </footer>

    <!-- Sticky Mobile CTA Bar -->
    <div id="sticky-cta"
        class="lg:hidden fixed bottom-0 inset-x-0 z-50 bg-white/95 backdrop-blur border-t border-slate-200 p-3 flex items-center gap-3 shadow-2xl">
        <div class="flex-1 min-w-0">
            <p class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider">Placement Test Gratis</p>
            <p class="font-heading font-bold text-navy text-sm truncate">Konsultasi &amp; daftar sekarang</p>
        </div>
        <a href="https://wa.me/6281227700781" target="_blank"
            class="flex-shrink-0 inline-flex items-center gap-2 bg-emerald2 text-white font-bold px-5 py-3 rounded-xl shadow-lg shadow-emerald2/30">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91C21.96 6.45 17.5 2 12.04 2z"></path></svg>
            Chat WhatsApp
        </a>
    </div>

    <script>
        // Pricing Tab
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                document.querySelectorAll('.pricing-panel').forEach(p => p.classList.add('hidden-panel'));
                const panel = document.getElementById(btn.dataset.tab);
                if (panel) panel.classList.remove('hidden-panel');
            });
        });

        // Hide sticky CTA at page bottom
        window.addEventListener('scroll', () => {
            const bar = document.getElementById('sticky-cta');
            const footer = document.querySelector('footer');
            if (!bar || !footer) return;
            const footerTop = footer.getBoundingClientRect().top;
            const viewport = window.innerHeight;
            if (footerTop < viewport + 40) {
                bar.classList.add('translate-y-full');
            } else {
                bar.classList.remove('translate-y-full');
            }
        });
    </script>
</body>

</html>
