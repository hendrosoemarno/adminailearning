<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Lengkap SIAKAD PLUS — 500+ Fitur, 25 Role Login, 13 Modul</title>
    <meta name="description"
        content="Katalog modul SIAKAD PLUS: 500+ fitur, 25 role login, 13 modul terintegrasi. Setiap peran memiliki akses khusus — dari Kepala Sekolah hingga Petugas Kantin.">
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
        .ai-gradient {
            background: linear-gradient(120deg, #065F46 0%, #10B981 55%, #14B8A6 100%);
        }
        .grid-pattern {
            background-image: linear-gradient(rgba(255, 255, 255, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
            background-size: 42px 42px;
        }
        .shadow-glow {
            box-shadow: 0 20px 50px -12px rgba(30, 64, 175, 0.35);
        }
        .role-btn.active {
            background: #1E40AF;
            color: #fff;
            border-color: #1E40AF;
            box-shadow: 0 10px 25px -8px rgba(30, 64, 175, 0.5);
        }
        .role-btn.active .role-count {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        .role-panel.hidden-panel {
            display: none;
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
            <a href="{{ url('/siakadplus') }}" class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-xs">S+</div>
                <div class="leading-tight">
                    <span class="font-heading font-bold text-navy text-lg">SIAKAD PLUS</span>
                    <span class="hidden sm:block text-[10px] font-semibold text-slate-400 tracking-wide">Sekolah Digital Terpadu</span>
                </div>
            </a>
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-600">
                <a href="{{ url('/siakadplus') }}" class="hover:text-navy transition-colors">Beranda</a>
                <a href="#fitur" class="text-navy transition-colors">Daftar Fitur</a>
                <a href="{{ url('/siakadplus') }}#harga" class="hover:text-navy transition-colors">Harga/Paket</a>
                <a href="{{ url('/siakadplus') }}#faq" class="hover:text-navy transition-colors">FAQ</a>
            </nav>
            <div class="flex items-center gap-2.5">
                <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20Jadwalkan%20Demo%20Gratis%20SIAKAD%20PLUS%20(30%20menit)." target="_blank"
                    class="inline-flex items-center gap-2 bg-amber2 hover:scale-105 transition-transform text-white font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-amber2/30 text-sm">
                    Jadwalkan Demo Gratis
                </a>
            </div>
        </div>
    </header>

    <!-- ======= HERO ======= -->
    <section id="top" class="hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-white/10 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20 text-center">
            <span class="inline-flex items-center gap-2 bg-white/15 border border-white/25 backdrop-blur text-white text-xs font-bold px-3 py-1.5 rounded-full">
                📦 Produk · Fitur Lengkap
            </span>
            <h1 class="mt-6 font-heading font-extrabold text-white text-3xl sm:text-4xl lg:text-5xl leading-[1.15] max-w-4xl mx-auto">
                Sistem Informasi Sekolah Terintegrasi — 500+ Fitur, 25 Role Login, 13 Modul
            </h1>
            <p class="mt-5 text-white/90 text-base sm:text-lg leading-relaxed max-w-3xl mx-auto">
                Setiap pengguna di sekolah Anda memiliki antarmuka dan akses yang dirancang khusus sesuai peran mereka — dari Kepala Sekolah hingga Petugas Kantin.
            </p>
            <!-- Stat Counter Cards -->
            <div class="mt-10 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 max-w-4xl mx-auto">
                <div class="bg-white/10 backdrop-blur border border-white/20 rounded-2xl p-5">
                    <p class="font-heading font-extrabold text-3xl sm:text-4xl text-white">500+</p>
                    <p class="mt-1 text-xs font-semibold text-white/70">Total Fitur</p>
                </div>
                <div class="bg-white/10 backdrop-blur border border-white/20 rounded-2xl p-5">
                    <p class="font-heading font-extrabold text-3xl sm:text-4xl text-white">25</p>
                    <p class="mt-1 text-xs font-semibold text-white/70">Role Login</p>
                </div>
                <div class="bg-white/10 backdrop-blur border border-white/20 rounded-2xl p-5">
                    <p class="font-heading font-extrabold text-3xl sm:text-4xl text-white">13</p>
                    <p class="mt-1 text-xs font-semibold text-white/70">Modul Sistem</p>
                </div>
                <div class="bg-white/10 backdrop-blur border border-white/20 rounded-2xl p-5">
                    <p class="font-heading font-extrabold text-3xl sm:text-4xl text-white">1</p>
                    <p class="mt-1 text-xs font-semibold text-white/70">Platform Terintegrasi</p>
                </div>
            </div>
        </div>
        <svg class="w-full text-slate2" viewBox="0 0 1440 60" fill="currentColor" preserveAspectRatio="none">
            <path d="M0,30 C360,70 720,0 1080,30 C1260,45 1380,40 1440,35 L1440,60 L0,60 Z"></path>
        </svg>
    </section>

    <!-- ======= FEATURED AI HIGHLIGHT ======= -->
    <section class="py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="ai-gradient relative overflow-hidden rounded-3xl shadow-glow">
                <div class="absolute inset-0 grid-pattern"></div>
                <div class="relative p-8 sm:p-10 grid lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <span class="inline-flex items-center gap-2 bg-white/15 border border-white/25 text-white text-xs font-bold px-3 py-1.5 rounded-full">✨ Fitur Unggulan</span>
                        <h2 class="mt-4 font-heading font-extrabold text-2xl sm:text-3xl text-white leading-tight">AI Generate Soal &amp; Modul Ajar ✨</h2>
                        <p class="mt-3 text-white/90 text-sm sm:text-base leading-relaxed">Guru membuat bank soal dan modul ajar Kurikulum Merdeka secara otomatis dalam hitungan detik — lengkap dengan kunci jawaban, pembahasan, dan tingkat kesulitan yang bisa diatur.</p>
                        <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20melihat%20demo%20AI%20Generate%20Soal%20SIAKAD%20PLUS." target="_blank"
                            class="mt-6 inline-flex items-center gap-2 bg-white text-emerald2 hover:scale-105 transition-transform font-bold px-6 py-3 rounded-2xl shadow-lg text-sm">
                            Lihat Cara Kerjanya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </a>
                    </div>
                    <div class="bg-white rounded-2xl p-5 shadow-xl">
                        <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Contoh Prompt Guru</p>
                        <div class="mt-2 bg-slate-900 rounded-xl p-4 font-mono text-xs text-emerald-300 leading-relaxed">"Buatkan 10 soal pilihan ganda Matematika kelas 8 materi Teorema Pythagoras, level sedang + pembahasan"</div>
                        <div class="mt-3 space-y-2">
                            <div class="flex items-center gap-2 text-xs font-semibold text-slate-600"><span class="w-5 h-5 rounded-full bg-emerald2 text-white grid place-items-center text-[10px]">✓</span> 10 soal + kunci + pembahasan dibuat</div>
                            <div class="flex items-center gap-2 text-xs font-semibold text-slate-600"><span class="w-5 h-5 rounded-full bg-emerald2 text-white grid place-items-center text-[10px]">✓</span> Tersimpan otomatis ke Bank Soal</div>
                            <div class="flex items-center gap-2 text-xs font-semibold text-slate-600"><span class="w-5 h-5 rounded-full bg-emerald2 text-white grid place-items-center text-[10px]">✓</span> Siap dipakai untuk CBT / kuis</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= INTERACTIVE ROLE NAVIGATION ======= -->
    <section id="fitur" class="py-14 lg:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Navigasi Peran</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Klik Peran, Lihat Fitur Khususnya</h2>
                <p class="mt-4 text-slate-500">14 role login — setiap peran hanya melihat menu dan data yang relevan dengan tugasnya.</p>
            </div>

            <!-- Role Tabs -->
            <div class="mt-10 -mx-4 px-4 overflow-x-auto no-scrollbar">
                <div class="flex gap-2 min-w-max mx-auto w-max pb-1">
                    <button data-role="role-kepsek" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">🎖️ Kepala Sekolah <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">17</span></button>
                    <button data-role="role-murid" class="role-btn active inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm transition-all whitespace-nowrap">🎒 Murid <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">19</span></button>
                    <button data-role="role-wali" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">👨‍👩‍👧 Wali Murid <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">18</span></button>
                    <button data-role="role-guru" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">👩‍🏫 Guru <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">25</span></button>
                    <button data-role="role-admin" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">🗂️ Administrasi <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">51</span></button>
                    <button data-role="role-keuangan" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">💰 Keuangan <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">16</span></button>
                    <button data-role="role-sarpra" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">🏫 E-Sarpra <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">12</span></button>
                    <button data-role="role-hrd" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">👔 E-HRD <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">10</span></button>
                    <button data-role="role-bk" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">💬 E-BK <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">5</span></button>
                    <button data-role="role-library" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">📖 E-Library <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">10</span></button>
                    <button data-role="role-klinik" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">➕ E-Klinik <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">6</span></button>
                    <button data-role="role-laundry" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">👕 E-Laundry <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></button>
                    <button data-role="role-pesantren" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">🕌 E-Pesantren <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">8</span></button>
                    <button data-role="role-canteen" class="role-btn inline-flex items-center gap-2 border border-slate-200 bg-slate2 px-4 py-2.5 rounded-xl font-heading font-bold text-sm text-slate-600 transition-all whitespace-nowrap">🍽️ E-Canteen <span class="role-count text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">12</span></button>
                </div>
            </div>

            <!-- Panels -->
            <div class="mt-8 max-w-6xl mx-auto">

                <!-- MURID -->
                <div id="role-murid" class="role-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal Murid</h3>
                        <p class="mt-1 text-white/75 text-sm">Akses personal untuk siswa (Pembelajaran, Nilai, Komunikasi, Keuangan)</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Pembelajaran &amp; LMS</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">6</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Mata Pelajaran Digital</li><li>✓ Kelas Digital</li><li>✓ Video Conference</li><li>✓ Sentra Pembelajaran</li><li>✓ Perpustakaan Digital</li><li>✓ Pusat Unduh</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">CBT &amp; Ujian Digital</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">3</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Computer Based Test</li><li>✓ Soal acak &amp; anti-kecurangan</li><li>✓ Hasil instan &amp; pembahasan</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Keuangan &amp; E-Money</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">3</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Saldo E-Money</li><li>✓ Riwayat Transaksi</li><li>✓ Tabungan Siswa</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Informasi &amp; Komunikasi</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Pengumuman</li><li>✓ Laporan Kehadiran</li><li>✓ Chat Internal</li><li>✓ Edutainment</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Pengembangan &amp; Karakter</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">5</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Poin Kedisiplinan</li><li>✓ Tahfidz / Tahsin</li><li>✓ Ekstrakurikuler</li><li>✓ Kartu Ujian</li><li>✓ Prestasi Siswa</li></ul></div>
                    </div>
                </div>

                <!-- WALI MURID -->
                <div id="role-wali" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal Wali Murid</h3>
                        <p class="mt-1 text-white/75 text-sm">Pantau akademik, keuangan, dan kehadiran anak dalam satu genggaman</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Akademik Anak</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">5</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Nilai &amp; e-Rapor anak</li><li>✓ Hasil CBT &amp; analisis</li><li>✓ Jadwal pelajaran</li><li>✓ Tugas &amp; materi</li><li>✓ Prestasi &amp; tahfidz</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Keuangan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Tagihan SPP real-time</li><li>✓ Bayar via VA / QRIS / e-wallet</li><li>✓ Riwayat &amp; kwitansi digital</li><li>✓ Pengingat tunggakan WA</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Kehadiran &amp; Izin</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">3</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Notifikasi hadir real-time</li><li>✓ Izin / sakit online</li><li>✓ Rekap kehadiran bulanan</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Komunikasi</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Chat wali kelas / guru</li><li>✓ Pengumuman sekolah</li><li>✓ Konsultasi BK</li><li>✓ Kalender akademik</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">E-Money Anak</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">2</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Top-up &amp; limit jajan harian</li><li>✓ Pantau transaksi kantin anak</li></ul></div>
                    </div>
                </div>

                <!-- GURU -->
                <div id="role-guru" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal Guru</h3>
                        <p class="mt-1 text-white/75 text-sm">Mengajar, menilai, dan membimbing — tanpa beban administrasi manual</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">KBM &amp; Jurnal</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">6</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Jadwal mengajar</li><li>✓ Jurnal mengajar digital</li><li>✓ Presensi kelas</li><li>✓ Penggantian jam</li><li>✓ Materi &amp; tugas digital</li><li>✓ Video conference kelas</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Penilaian</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">6</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Input nilai harian &amp; PTS/PAS</li><li>✓ Leger nilai otomatis</li><li>✓ Kelola bank soal</li><li>✓ AI Generate Soal</li><li>✓ CBT &amp; analisis butir soal</li><li>✓ Validasi e-Rapor wali kelas</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Pembinaan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">5</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Catatan anekdot siswa</li><li>✓ Poin pelanggaran / apresiasi</li><li>✓ Pembina ekstrakurikuler</li><li>✓ Input tahfidz / tahsin</li><li>✓ Rujukan konseling BK</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Komunikasi</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Pengumuman kelas</li><li>✓ Chat wali murid</li><li>✓ Forum guru / MGMP</li><li>✓ Pusat unduh dokumen</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Kepegawaian</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Presensi pegawai</li><li>✓ Pengajuan cuti &amp; izin</li><li>✓ Slip gaji digital</li><li>✓ Diklat &amp; sertifikasi</li></ul></div>
                    </div>
                </div>

                <!-- ADMINISTRASI -->
                <div id="role-admin" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal Administrasi / Operator</h3>
                        <p class="mt-1 text-white/75 text-sm">Pusat kendali data sekolah — dari SPMB hingga arsip digital</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">PPDB / SPMB Online</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">2</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ <span class="font-semibold">Metode 1 — Tanpa Pembelian Formulir:</span> pendaftaran langsung online, calon siswa isi data dari HP tanpa bayar formulir</li><li>✓ <span class="font-semibold">Metode 2 — Dengan Pembelian Formulir:</span> payment formulir dan pembayaran daftar ulang terintegrasi</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Kesiswaan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">5</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ <span class="font-semibold">Data Siswa Aktif</span> — satu database terintegrasi</li><li>✓ <span class="font-semibold">Mutasi &amp; Kenaikan Kelas</span> — kenaikan / pindah kelas</li><li>✓ <span class="font-semibold">Proses Kelulusan</span> — data alumni, data non-aktif / mutasi</li><li>✓ <span class="font-semibold">Laporan Kehadiran Siswa</span> — rekap per kelas, per periode</li><li>✓ <span class="font-semibold">Tata Tertib Digital</span> — sistem poin kedisiplinan digital</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Kepegawaian</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ <span class="font-semibold">Data Pegawai Aktif</span> — database guru &amp; tendik</li><li>✓ <span class="font-semibold">Data Administratif Pegawai</span> — sertifikat, artikel, sinopsis, PKG, penilaian kinerja</li><li>✓ <span class="font-semibold">Data Pensiun &amp; Pengunduran Diri</span> — riwayat terstruktur</li><li>✓ <span class="font-semibold">Laporan Kehadiran Pegawai</span> — rekap otomatis per periode</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Kurikulum</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">6</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ <span class="font-semibold">Bank Soal, Modul, Media &amp; Tugas</span> — repositori terpusat</li><li>✓ <span class="font-semibold">Performa Guru / KPI</span> — grafik capaian &amp; target</li><li>✓ <span class="font-semibold">Jadwal Pelajaran</span> — atur &amp; publikasikan per kelas</li><li>✓ <span class="font-semibold">CBT</span> — daftar CBT terjadwal</li><li>✓ <span class="font-semibold">Penilaian</span> — rangkuman nilai</li><li>✓ <span class="font-semibold">Perangkat Pembelajaran</span> — RPP, modul ajar, TP, ATP, program semesteran &amp; tahunan</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Humas &amp; Komunikasi</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ <span class="font-semibold">Pengumuman &amp; Memo</span> — ke seluruh warga sekolah, termasuk broadcast WA</li><li>✓ <span class="font-semibold">Majalah Digital</span> — buletin sekolah format digital</li><li>✓ <span class="font-semibold">Edutainment</span> — berita &amp; artikel edukatif</li><li>✓ <span class="font-semibold">Buku Tamu Digital</span> — registrasi tamu tertib &amp; terdata</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Keuangan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">15</span></div><ul class="mt-3 space-y-2.5 text-sm text-slate-600">
                            <li><span class="font-semibold text-slate-800">Dashboard &amp; Ringkasan</span><ul class="mt-1 ml-1 space-y-1 text-slate-500"><li>✓ <span class="font-semibold">Ringkasan Keuangan</span> — overview kondisi keuangan sekolah secara real-time dalam satu halaman</li><li>✓ <span class="font-semibold">Ringkasan Siswa</span> — laporan riwayat tagihan per siswa, mudah dicari &amp; difilter</li></ul></li>
                            <li><span class="font-semibold text-slate-800">Sistem Keuangan — 2 Metode</span><ul class="mt-1 ml-1 space-y-1 text-slate-500"><li>✓ <span class="font-semibold">Metode 1 — Transaction-Based System</span> — Daftar POS, Laporan KAS, Laporan Keuangan</li><li>✓ <span class="font-semibold">Metode 2 — Accounting-Based System</span> — Daftar POS, Master Akun, Periode Pembukuan, Neraca, Jurnal Transaksi, Buku Besar, Laba Rugi</li></ul></li>
                            <li><span class="font-semibold text-slate-800">Tagihan &amp; SPP</span><ul class="mt-1 ml-1 space-y-1 text-slate-500"><li>✓ <span class="font-semibold">Daftar Tagihan</span> — kelola semua jenis tagihan sekolah dalam satu tampilan</li><li>✓ <span class="font-semibold">Grup Tagihan</span> — segmentasi tagihan berdasarkan kelas, jenjang, atau kategori tertentu</li><li>✓ <span class="font-semibold">Monitoring Tagihan</span> — Tagihan Belum Dibayar, Tagihan Belum Dikonfirmasi, Riwayat Tagihan</li><li>✓ <span class="font-semibold">Rekap Tagihan SPP</span> — rekap lengkap pembayaran SPP per periode secara otomatis</li></ul></li>
                            <li><span class="font-semibold text-slate-800">E-Money &amp; Tabungan</span><ul class="mt-1 ml-1 space-y-1 text-slate-500"><li>✓ <span class="font-semibold">E-Money Siswa</span> — Cek Saldo, Top-Up, Cash-Out, Riwayat Transaksi</li><li>✓ <span class="font-semibold">E-Money Pegawai</span> — Cek Saldo, Top-Up, Cash-Out, Riwayat Penggunaan</li><li>✓ <span class="font-semibold">Tabungan Siswa</span> — Cek Saldo, Top-Up, Cash-Out, Riwayat Tabungan</li><li>✓ <span class="font-semibold">Infaq</span> — kelola infaq dan donasi sekolah secara terstruktur dan transparan</li></ul></li>
                            <li><span class="font-semibold text-slate-800">Kantin &amp; Gaji</span><ul class="mt-1 ml-1 space-y-1 text-slate-500"><li>✓ <span class="font-semibold">Laporan Kantin</span> — Laporan Cash Out, Laporan Transaksi Kantin</li><li>✓ <span class="font-semibold">Slip Gaji Pegawai</span> — Pembuatan Slip Gaji, Riwayat Slip Gaji Terkirim</li></ul></li>
                            <li><span class="font-semibold text-slate-800">Metode Pembayaran</span><ul class="mt-1 ml-1 space-y-1 text-slate-500"><li>✓ <span class="font-semibold">Pengaturan Metode Pembayaran</span> — Tunai, E-Money, Transfer Manual, Virtual Account (Host to Host), Payment Gateway</li></ul></li>
                        </ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Akreditasi &amp; Laporan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">6</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ <span class="font-semibold">Akreditasi Digital</span> — kurikulum, kesiswaan, keuangan, kepegawaian</li><li>✓ <span class="font-semibold">Ekstrakurikuler</span> — kelas ekskul, pengajar, jadwal, jurnal, nilai &amp; kehadiran</li><li>✓ <span class="font-semibold">Kartu Karakter Siswa</span> — list aktivitas &amp; data siswa</li><li>✓ <span class="font-semibold">Rapor Siswa</span> — monitor status sebelum pembagian</li><li>✓ <span class="font-semibold">Pengaturan Hari Libur</span> — kalender akademik resmi</li><li>✓ <span class="font-semibold">Presensi Digital</span> — aktivasi kamera smartcard &amp; geo-tagging</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Modul Khusus</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">5</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ <span class="font-semibold">Tahfidz &amp; Tahsin</span> — kehadiran, jurnal pengajar, rombel, nilai</li><li>✓ <span class="font-semibold">Sentra</span> — data, modul/materi, jurnal, kehadiran</li><li>✓ <span class="font-semibold">Materi Seminar</span> — distribusi materi pelatihan</li><li>✓ <span class="font-semibold">Video Konferensi Internal</span> — rapat online antar pegawai</li><li>✓ <span class="font-semibold">Pusat Unggah Dokumen</span> — repository dokumen resmi</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Akses &amp; Keamanan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Manajemen user &amp; role</li><li>✓ Reset password massal</li><li>✓ Log aktivitas sistem</li><li>✓ Backup &amp; restore data</li></ul></div>
                    </div>
                </div>

                <!-- KEUANGAN -->
                <div id="role-keuangan" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal Keuangan / Bendahara</h3>
                        <p class="mt-1 text-white/75 text-sm">Tagihan, pembayaran digital, dan laporan arus kas tanpa selisih</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Penagihan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">6</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Tagihan SPP massal</li><li>✓ Tagihan insidental / kegiatan</li><li>✓ Potongan beasiswa &amp; diskon</li><li>✓ Denda keterlambatan</li><li>✓ Kwitansi digital</li><li>✓ Pengingat tunggakan WA</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Pembayaran</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">5</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Virtual Account multi-bank</li><li>✓ QRIS &amp; e-wallet</li><li>✓ Gerai minimarket</li><li>✓ Rekonsiliasi otomatis</li><li>✓ Refund &amp; koreksi</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Laporan &amp; Buku</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">5</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Arus kas harian</li><li>✓ Rekap tunggakan per kelas</li><li>✓ Jurnal umum</li><li>✓ Tutup &amp; buka tahun buku</li><li>✓ Ekspor laporan (Excel/PDF)</li></ul></div>
                    </div>
                </div>

                <!-- KEPALA SEKOLAH -->
                <div id="role-kepsek" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal Kepala Sekolah &amp; Yayasan / Manajemen</h3>
                        <p class="mt-1 text-white/75 text-sm">Pengawasan, evaluasi, dan pengambilan keputusan berbasis data (Data-Driven Decision Making)</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Dashboard Executive</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Jumlah siswa aktif</li><li>✓ Kehadiran harian</li><li>✓ Arus kas keuangan</li><li>✓ Statistik pendaftar SPMB</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Monitoring Akademik &amp; KBM</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Ketercapaian kurikulum</li><li>✓ Jurnal mengajar guru</li><li>✓ Jadwal pelajaran harian</li><li>✓ Kehadiran guru di kelas</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Laporan Transparansi Keuangan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Rekapitulasi pembayaran SPP</li><li>✓ Laporan pemasukan &amp; pengeluaran</li><li>✓ Tunggakan siswa</li><li>✓ Neraca kas real-time</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Supervisi &amp; Evaluasi Guru</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">3</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Rekapitulasi kinerja guru</li><li>✓ Presensi staf / HRD</li><li>✓ Catatan hasil supervisi akademik</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Audit Trail &amp; Keamanan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">2</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Log aktivitas pengguna sistem</li><li>✓ Jaminan keamanan data &amp; transparansi operasional</li></ul></div>
                    </div>
                </div>

                <!-- E-SARPRA -->
                <div id="role-sarpra" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal E-Sarpra</h3>
                        <p class="mt-1 text-white/75 text-sm">Inventaris, ruangan, dan pemeliharaan aset sekolah</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Inventaris</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">5</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Database barang &amp; aset</li><li>✓ Label QR per aset</li><li>✓ Mutasi antar ruangan</li><li>✓ Penghapusan aset</li><li>✓ Stok ATK &amp; habis pakai</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Ruangan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">3</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Booking ruangan online</li><li>✓ Kalender pemakaian</li><li>✓ Persetujuan peminjaman</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Pemeliharaan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Laporan kerusakan</li><li>✓ Penjadwalan perbaikan</li><li>✓ Pengadaan &amp; approval</li><li>✓ Laporan kondisi aset</li></ul></div>
                    </div>
                </div>

                <!-- E-HRD -->
                <div id="role-hrd" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal E-HRD</h3>
                        <p class="mt-1 text-white/75 text-sm">Kelola SDM sekolah dari rekrutmen hingga payroll</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Data &amp; Presensi</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Database pegawai</li><li>✓ Presensi &amp; keterlambatan</li><li>✓ Cuti, izin &amp; lembur</li><li>✓ Mutasi &amp; jabatan</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Payroll</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">3</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Komponen gaji &amp; tunjangan</li><li>✓ Slip gaji digital</li><li>✓ Rekap payroll bulanan</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Pengembangan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">3</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Penilaian kinerja (PKG)</li><li>✓ Diklat &amp; sertifikasi</li><li>✓ Kontrak / PKWT</li></ul></div>
                    </div>
                </div>

                <!-- E-BK -->
                <div id="role-bk" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal E-BK</h3>
                        <p class="mt-1 text-white/75 text-sm">Layanan konseling dan pembinaan karakter siswa</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Konseling</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">3</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Rekam sesi konseling</li><li>✓ Rujukan dari guru</li><li>✓ Panggilan orang tua</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Kedisiplinan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">2</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Poin pelanggaran &amp; sanksi</li><li>✓ Laporan BK per siswa</li></ul></div>
                    </div>
                </div>

                <!-- E-LIBRARY -->
                <div id="role-library" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal E-Library</h3>
                        <p class="mt-1 text-white/75 text-sm">Perpustakaan digital dan sirkulasi buku modern</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Koleksi</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Katalog &amp; pencarian OPAC</li><li>✓ E-book &amp; koleksi digital</li><li>✓ Barcode / RFID buku</li><li>✓ Data anggota</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Sirkulasi</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Pinjam &amp; kembali</li><li>✓ Reservasi buku</li><li>✓ Denda otomatis</li><li>✓ Pengingat WA jatuh tempo</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Laporan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">2</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Statistik kunjungan</li><li>✓ Buku terpopuler</li></ul></div>
                    </div>
                </div>

                <!-- E-KLINIK -->
                <div id="role-klinik" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal E-Klinik / UKS</h3>
                        <p class="mt-1 text-white/75 text-sm">Layanan kesehatan siswa yang tercatat rapi</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Layanan UKS</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Rekam kunjungan sakit</li><li>✓ Stok obat UKS</li><li>✓ Surat rujukan</li><li>✓ Izin sakit sinkron presensi</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Pemantauan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">2</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Riwayat kesehatan siswa</li><li>✓ Laporan kesehatan berkala</li></ul></div>
                    </div>
                </div>

                <!-- E-LAUNDRY -->
                <div id="role-laundry" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal E-Laundry</h3>
                        <p class="mt-1 text-white/75 text-sm">Layanan laundry asrama / pesantren yang tertib</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Operasional</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Penerimaan cucian</li><li>✓ Tracking status (cuci–siap ambil)</li><li>✓ Notifikasi WA ke santri / wali</li><li>✓ Pembayaran &amp; laporan laundry</li></ul></div>
                    </div>
                </div>

                <!-- E-PESANTREN -->
                <div id="role-pesantren" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal E-Pesantren</h3>
                        <p class="mt-1 text-white/75 text-sm">Kelola santri, tahfidz, dan kegiatan kepesantrenan</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Kesantrian</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Data santri &amp; kamar</li><li>✓ Tahfidz / tahsin tracking</li><li>✓ Kitab kuning progress</li><li>✓ Kegiatan &amp; absensi ngaji</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Perizinan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">2</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Izin keluar digital + approval</li><li>✓ Kunjungan wali tercatat</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Keuangan Santri</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">2</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Syahriyah &amp; tagihan</li><li>✓ Tabungan santri</li></ul></div>
                    </div>
                </div>

                <!-- E-CANTEEN -->
                <div id="role-canteen" class="role-panel hidden-panel">
                    <div class="bg-navy rounded-2xl p-6 sm:p-8 text-white">
                        <h3 class="font-heading font-extrabold text-2xl">Portal E-Canteen</h3>
                        <p class="mt-1 text-white/75 text-sm">Kantin digital: tenant, kasir, dan uang saku siswa</p>
                    </div>
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Tenant &amp; Menu</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Data tenant kantin</li><li>✓ Menu &amp; harga digital</li><li>✓ Stok menu harian</li><li>✓ Promo &amp; paket hemat</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Transaksi</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Kasir POS cepat</li><li>✓ Bayar QR e-money siswa</li><li>✓ Top-up saldo</li><li>✓ Limit jajan harian</li></ul></div>
                        <div class="bg-slate2 border border-slate-200 rounded-2xl p-5"><div class="flex items-center justify-between"><h4 class="font-heading font-bold text-slate-800">Laporan</h4><span class="text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">4</span></div><ul class="mt-3 space-y-1.5 text-sm text-slate-600"><li>✓ Penjualan per tenant</li><li>✓ Settlement berkala</li><li>✓ Menu terlaris</li><li>✓ Rekap transaksi siswa</li></ul></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ======= TRUST, SECURITY & COMPLIANCE ======= -->
    <section class="py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-xs font-bold text-sky2 uppercase tracking-[0.2em]">Keamanan &amp; Kepatuhan</span>
                <h2 class="mt-3 font-heading font-extrabold text-3xl sm:text-4xl text-navy leading-tight">Data Sekolah Anda Terlindungi Standar Enterprise</h2>
            </div>
            <div class="mt-12 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 max-w-6xl mx-auto">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-3xl">🛡️</div>
                    <p class="mt-3 font-heading font-bold text-sm text-slate-800">PSE Kominfo</p>
                    <p class="mt-1 text-xs text-slate-500">Terdaftar resmi</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-3xl">📝</div>
                    <p class="mt-3 font-heading font-bold text-sm text-slate-800">NDA Resmi</p>
                    <p class="mt-1 text-xs text-slate-500">Perjanjian kerahasiaan data</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-3xl">🔐</div>
                    <p class="mt-3 font-heading font-bold text-sm text-slate-800">Enkripsi AES-256</p>
                    <p class="mt-1 text-xs text-slate-500">Data at-rest &amp; in-transit</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-3xl">🇮🇩</div>
                    <p class="mt-3 font-heading font-bold text-sm text-slate-800">Server Lokal Indonesia</p>
                    <p class="mt-1 text-xs text-slate-500">Latensi rendah &amp; patuh regulasi</p>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow col-span-2 md:col-span-1">
                    <div class="text-3xl">💾</div>
                    <p class="mt-3 font-heading font-bold text-sm text-slate-800">Backup Otomatis Harian</p>
                    <p class="mt-1 text-xs text-slate-500">Restore kapan pun dibutuhkan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= FINAL CTA ======= -->
    <section class="hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20 text-center">
            <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-white leading-tight">Coba &amp; Lihat Demo Fitur Langsung — Gratis 30 Menit Tanpa Komitmen</h2>
            <p class="mt-4 text-white/85 leading-relaxed">Pilih satu role, dan kami tunjukkan langsung alur kerjanya dengan data simulasi sekolah Anda.</p>
            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                <a href="https://wa.me/6281227700781?text=Halo%2C%20saya%20ingin%20demo%20fitur%20SIAKAD%20PLUS%20gratis%2030%20menit." target="_blank"
                    class="inline-flex items-center justify-center gap-2 bg-amber2 hover:scale-105 transition-transform text-white font-bold px-8 py-3.5 rounded-2xl shadow-glow">
                    Jadwalkan Demo Sekarang
                </a>
                <a href="{{ url('/siakadplus') }}"
                    class="inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur border border-white/30 text-white font-semibold px-8 py-3.5 rounded-2xl hover:bg-white/20 transition-colors">
                    ← Kembali ke Beranda SIAKAD
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
                <p class="mt-4 text-sm leading-relaxed">500+ fitur, 25 role login, 13 modul dalam satu platform terintegrasi.</p>
                <p class="mt-4 text-sm">📍 Malang, Jawa Timur, Indonesia</p>
            </div>
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-widest">Modul Populer</h4>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li><a href="#fitur" class="hover:text-white transition-colors">Akademik &amp; e-Rapor</a></li>
                    <li><a href="#fitur" class="hover:text-white transition-colors">Keuangan Digital</a></li>
                    <li><a href="#fitur" class="hover:text-white transition-colors">CBT &amp; AI Soal</a></li>
                    <li><a href="#fitur" class="hover:text-white transition-colors">E-Canteen &amp; E-Pesantren</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-widest">Kontak</h4>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li><a href="https://wa.me/6281227700781" target="_blank" class="hover:text-white transition-colors">💬 WhatsApp: +62 812-2770-0781</a></li>
                    <li><a href="mailto:hendrosoemarno@gmail.com" class="hover:text-white transition-colors">✉️ hendrosoemarno@gmail.com</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-widest">Legalitas</h4>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li>PT Artificial Intelligence Learning Madani Digital</li>
                    <li>Terdaftar PSE Kominfo · NDA Resmi</li>
                    <li><a href="{{ url('/apps') }}" class="hover:text-white transition-colors">Ekosistem Aplikasi</a></li>
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
        // Role Tab Navigation
        document.querySelectorAll('.role-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.role-btn').forEach(b => {
                    b.classList.remove('active');
                    b.classList.add('text-slate-600');
                });
                btn.classList.add('active');
                btn.classList.remove('text-slate-600');
                document.querySelectorAll('.role-panel').forEach(p => p.classList.add('hidden-panel'));
                const panel = document.getElementById(btn.dataset.role);
                if (panel) panel.classList.remove('hidden-panel');
            });
        });
    </script>
</body>

</html>
