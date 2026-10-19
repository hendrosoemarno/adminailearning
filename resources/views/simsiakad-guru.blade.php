<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Guru — Ruang Kerja Digital · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal Guru SIAKAD PLUS — ruang kerja digital guru mata pelajaran & wali kelas dengan 5 grup fitur (25 fitur): KBM & Jurnal, Penilaian & Evaluasi, Pembinaan Karakter, Komunikasi, dan Kepegawaian.">
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
        html { scroll-behavior: smooth; }
        ::selection { background: #1E40AF; color: #fff; }
        .hero-gradient { background: linear-gradient(135deg, #1E293B 0%, #1E40AF 55%, #0284C7 100%); }
        .grid-pattern {
            background-image: linear-gradient(rgba(255,255,255,0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 42px 42px;
        }
        .sidebar-group-body { max-height: 0; overflow: hidden; transition: max-height .3s ease; }
        .sidebar-group.open .sidebar-group-body { max-height: 640px; }
        .sidebar-group.open .sidebar-group-chevron { transform: rotate(90deg); }
        .sidebar-group-chevron { transition: transform .25s ease; }
        .menu-item.active { background: #1E40AF; color: #fff; }
        .menu-item.active .menu-dot { background: #fff; }
        .view { display: none; }
        .view.active { display: block; animation: fadeUp .3s ease; }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .skeleton { background: linear-gradient(90deg, #e2e8f0 25%, #f1f5f9 37%, #e2e8f0 63%); background-size: 400% 100%; animation: shimmer 1.2s ease infinite; }
        @keyframes shimmer { 0% { background-position: 100% 0; } 100% { background-position: -100% 0; } }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .seg input { position: absolute; opacity: 0; pointer-events: none; }
        .seg label { cursor: pointer; }
        .seg input:checked + label { background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,.12); font-weight: 700; }
    </style>
</head>

<body class="font-body bg-slate-100 text-slate-800 antialiased">

    <!-- ============ SIDEBAR ============ -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 text-slate-300 flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <!-- Brand -->
        <div class="flex items-center gap-3 px-5 h-16 border-b border-white/10 flex-shrink-0">
            <div class="w-9 h-9 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-sm">S+</div>
            <div class="leading-tight">
                <p class="font-heading font-bold text-white text-sm">SIAKAD PLUS</p>
                <p class="text-[10px] text-slate-500">Portal Guru · Ruang Kerja</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Scrollable nav -->
        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <!-- Dashboard -->
            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard Guru</span>
            </button>

            <!-- 1. KBM & Jurnal Mengajar -->
            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📖</span><span class="flex-1 text-left">KBM &amp; Jurnal Mengajar</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="jadwal" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Jadwal Mengajar</button>
                    <button data-view="jurnal-guru" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Jurnal Mengajar Digital</button>
                    <button data-view="presensi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Presensi Kelas</button>
                    <button data-view="piket" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Penggantian Jam &amp; Piket</button>
                    <button data-view="materi-tugas" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Materi &amp; Tugas Digital</button>
                    <button data-view="video-conference" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Video Conference Kelas</button>
                </div>
            </div>

            <!-- 2. Penilaian & Evaluasi -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📊</span><span class="flex-1 text-left">Penilaian &amp; Evaluasi</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="input-nilai" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Input Nilai</button>
                    <button data-view="legger" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Legger Nilai Otomatis</button>
                    <button data-view="aigen" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kelola Bank Soal</button>
                    <button data-view="aigen" data-title="AI Generate Soal" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> ✨ AI Generate Soal</button>
                    <button data-view="cbt-guru" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> CBT &amp; Analisis Butir Soal</button>
                    <button data-view="validasi-erapor" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Validasi e-Rapor &amp; Wali Kelas</button>
                </div>
            </div>

            <!-- 3. Pembinaan & Karakter -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🛡️</span><span class="flex-1 text-left">Pembinaan &amp; Karakter Siswa</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="anekdot" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Catatan Anekdot Siswa</button>
                    <button data-view="poin" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Poin Pelanggaran &amp; Apresiasi</button>
                    <button data-view="ekstrakurikuler" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pembina Ekstrakurikuler</button>
                    <button data-view="tahfidz-guru" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Input Tahfidz &amp; Tahsin</button>
                    <button data-view="rujukan-bk" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rujukan Konseling BK</button>
                </div>
            </div>

            <!-- 4. Komunikasi & Komunitas -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💬</span><span class="flex-1 text-left">Komunikasi &amp; Komunitas</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="pengumuman-kelas" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengumuman Kelas</button>
                    <button data-view="chat-wali" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Chat Wali Murid</button>
                    <button data-view="forum-mgmp" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Forum MGMP / Komunitas</button>
                    <button data-view="unduh-dokumen" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pusat Unduh Dokumen</button>
                </div>
            </div>

            <!-- 5. Kepegawaian Guru -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>👔</span><span class="flex-1 text-left">Kepegawaian Guru (HRD)</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="presensi-pegawai" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Presensi Pegawai (GPS)</button>
                    <button data-view="cuti-izin" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengajuan Cuti &amp; Izin</button>
                    <button data-view="slip-gaji-guru" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Slip Gaji Digital</button>
                    <button data-view="diklat" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Diklat &amp; Sertifikat</button>
                </div>
            </div>

        </nav>

        <!-- Sidebar footer -->
        <div class="p-3 border-t border-white/10 flex-shrink-0 space-y-1">
            <button onclick="openPresensiPegawai()" class="w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-emerald2 hover:bg-white/5 transition-colors">
                <span>🕒</span> Presensi Masuk / Pulang
            </button>
            <a href="{{ url('/simsiakad') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-300 hover:bg-white/5 transition-colors">
                <span>↩</span> Kembali ke Simulasi
            </a>
        </div>
    </aside>

    <!-- overlay for mobile -->
    <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

    <!-- ============ MAIN ============ -->
    <div class="lg:pl-72 min-h-screen flex flex-col">

        <!-- TOPBAR -->
        <header class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-200">
            <div class="flex items-center gap-3 px-4 sm:px-6 h-16">
                <button onclick="toggleSidebar()" class="lg:hidden text-slate-500 hover:text-navy">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="leading-tight">
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Portal Guru</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base">Dashboard Guru</h1>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <!-- Search -->
                    <div class="hidden md:flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2 w-64">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                        <input type="text" placeholder="Cari siswa, materi, soal..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                    </div>
                    <!-- Presensi pegawai -->
                    <button onclick="openPresensiPegawai()" class="hidden sm:inline-flex items-center gap-2 bg-emerald2 hover:bg-emerald2/90 text-white text-xs font-bold px-3.5 py-2.5 rounded-xl transition-colors">
                        🕒 Presensi Masuk
                    </button>
                    <!-- Notif -->
                    <button onclick="showToast('info', '3 notifikasi baru')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Profile -->
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">BS</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Budi Santoso, S.Pd.</p>
                            <p class="text-[10px] text-slate-400">NUPTK 2045-8890 · Matematika</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-4 sm:p-6">

            <!-- ================= VIEW: DASHBOARD GURU ================= -->
            <section id="view-dashboard" class="view active">

                <!-- Welcome banner -->
                <div class="rounded-3xl hero-gradient text-white p-5 sm:p-6 relative overflow-hidden">
                    <div class="absolute inset-0 grid-pattern"></div>
                    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl bg-white/15 grid place-items-center font-heading font-extrabold text-xl flex-shrink-0">BS</div>
                            <div>
                                <p class="text-sm text-white/85">Selamat pagi,</p>
                                <h2 class="font-heading font-extrabold text-xl sm:text-2xl text-white">Budi Santoso, S.Pd. 👋</h2>
                                <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                    <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">NUPTK 2045-8890</span>
                                    <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">Guru Matematika</span>
                                    <span class="bg-amber2 text-amber-950 px-2.5 py-1 rounded-full">👑 Wali Kelas 10-A</span>
                                </div>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="openPresensiPegawai()" class="inline-flex items-center gap-2 bg-emerald2 hover:brightness-110 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-all">🕒 Presensi Masuk</button>
                            <button onclick="openPresensiPegawai('pulang')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-all">🕓 Presensi Pulang</button>
                        </div>
                    </div>
                </div>

                <!-- Stat Cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">📅</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Hari ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Jadwal Mengajar Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">3 <span class="text-sm font-bold text-slate-500">Kelas</span></p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">📝</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Perlu koreksi</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Tugas Butuh Koreksi</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">12 <span class="text-sm font-bold text-slate-500">Tugas</span></p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-sky-100 grid place-items-center text-sky-700">📊</span>
                            <span class="text-[11px] font-bold text-sky-700 bg-sky-50 px-2 py-0.5 rounded-full">PTS</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Status Input Nilai PTS</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">78%</p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-sky-500 rounded-full" style="width:78%"></div></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">🏅</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Bulan ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Poin Pembinaan Siswa</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">48 <span class="text-sm font-bold text-slate-500">Poin</span></p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <!-- LEFT: Schedule -->
                    <div class="lg:col-span-2 space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="font-heading font-bold text-slate-800">Jadwal Mengajar Hari Ini</h2>
                                    <p class="text-xs text-slate-400">Senin, 17 Oktober 2026 · Semester Ganjil</p>
                                </div>
                                <button onclick="showView('jadwal','Jadwal Mengajar')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>

                            <div class="mt-4 space-y-3">
                                <!-- Jadwal 1 -->
                                <div class="border border-slate-100 rounded-2xl p-4 hover:border-navy/30 transition-colors">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-navy/10 text-navy grid place-items-center font-heading font-extrabold text-sm flex-shrink-0">07:15</div>
                                        <div class="flex-1 min-w-[140px]">
                                            <p class="font-heading font-bold text-slate-800 text-sm">Matematika · Kelas 10-A</p>
                                            <p class="text-xs text-slate-400">Jam ke-1–2 · Ruang A-201 · Bab: Fungsi Kuadrat</p>
                                        </div>
                                        <span class="text-[11px] font-bold bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full">✓ Jurnal terisi</span>
                                    </div>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <button onclick="openPresensiKelas('Matematika','10-A','Jam ke-1–2')" class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition-colors">📋 Input Jurnal &amp; Presensi</button>
                                        <button onclick="showToast('success','Membuka room video conference 10-A...')" class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-xs font-bold px-3 py-2 rounded-lg transition-colors">🎥 Mulai Vicon</button>
                                    </div>
                                </div>

                                <!-- Jadwal 2 -->
                                <div class="border border-slate-100 rounded-2xl p-4 hover:border-navy/30 transition-colors">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-amber2/15 text-amber2 grid place-items-center font-heading font-extrabold text-sm flex-shrink-0">09:00</div>
                                        <div class="flex-1 min-w-[140px]">
                                            <p class="font-heading font-bold text-slate-800 text-sm">Matematika · Kelas 10-B</p>
                                            <p class="text-xs text-slate-400">Jam ke-3–4 · Ruang A-202 · Bab: Fungsi Kuadrat</p>
                                        </div>
                                        <span class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full">Dalam proses</span>
                                    </div>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <button onclick="openPresensiKelas('Matematika','10-B','Jam ke-3–4')" class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition-colors">📋 Input Jurnal &amp; Presensi</button>
                                        <button onclick="showToast('success','Membuka room video conference 10-B...')" class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-xs font-bold px-3 py-2 rounded-lg transition-colors">🎥 Mulai Vicon</button>
                                    </div>
                                </div>

                                <!-- Jadwal 3 -->
                                <div class="border border-slate-100 rounded-2xl p-4 hover:border-navy/30 transition-colors">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-500 grid place-items-center font-heading font-extrabold text-sm flex-shrink-0">13:00</div>
                                        <div class="flex-1 min-w-[140px]">
                                            <p class="font-heading font-bold text-slate-800 text-sm">Matematika · Kelas 11-C</p>
                                            <p class="text-xs text-slate-400">Jam ke-7–8 · Ruang B-105 · Bab: Limit Fungsi</p>
                                        </div>
                                        <span class="text-[11px] font-bold bg-rose-100 text-rose-800 px-2.5 py-1 rounded-full">Belum diisi</span>
                                    </div>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <button onclick="openPresensiKelas('Matematika','11-C','Jam ke-7–8')" class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition-colors">📋 Input Jurnal &amp; Presensi</button>
                                        <button onclick="showToast('success','Membuka room video conference 11-C...')" class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-xs font-bold px-3 py-2 rounded-lg transition-colors">🎥 Mulai Vicon</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT: Quick Actions + Feed -->
                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Aksi Cepat</h2>
                            <div class="mt-4 grid grid-cols-1 gap-3">
                                <button onclick="showView('aigen','AI Generate Soal')" class="flex items-center gap-3 bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 rounded-2xl p-4 text-sm font-bold transition-colors">
                                    <span class="text-2xl">✨</span> AI Generate Soal
                                </button>
                                <button onclick="showToast('info','Membuka form input poin pembinaan siswa...')" class="flex items-center gap-3 bg-white text-slate-700 hover:bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold transition-colors">
                                    <span class="text-2xl">🏅</span> Input Poin Siswa
                                </button>
                                <button onclick="showToast('success','Broadcast pengumuman terkirim ke portal siswa & ortu')" class="flex items-center gap-3 bg-white text-slate-700 hover:bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-bold transition-colors">
                                    <span class="text-2xl">📢</span> Broadcast Pengumuman
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Catatan &amp; Notifikasi</h2>
                                <button onclick="showToast('info','Membuka seluruh notifikasi')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <ul class="mt-4 space-y-3">
                                <li class="flex gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-amber2/15 text-amber2 grid place-items-center flex-shrink-0">📝</span>
                                    <div><p class="text-sm font-medium text-slate-800">12 tugas menunggu koreksi</p><p class="text-xs text-slate-400">Kelas 10-A · Matematika · 15 menit lalu</p></div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-emerald2/10 text-emerald2 grid place-items-center flex-shrink-0">💬</span>
                                    <div><p class="text-sm font-medium text-slate-800">Pesan baru dari wali murid</p><p class="text-xs text-slate-400">Ibu Keira · tentang kehadiran · 1 jam lalu</p></div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-sky2/10 text-sky2 grid place-items-center flex-shrink-0">📅</span>
                                    <div><p class="text-sm font-medium text-slate-800">Rapat MGMP Matematika</p><p class="text-xs text-slate-400">Ruang Guru · Jumat 14:00 · 2 jam lalu</p></div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-navy/10 text-navy grid place-items-center flex-shrink-0">✅</span>
                                    <div><p class="text-sm font-medium text-slate-800">Validasi e-Rapor kelas 10-A dibuka</p><p class="text-xs text-slate-400">Batas pengisian 25 Okt · 3 jam lalu</p></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: JADWAL MENGAJAR ================= -->
            <section id="view-jadwal" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Jadwal Mengajar</h2>
                        <p class="text-xs text-slate-400">Matriks timetable mingguan &amp; ruang kelas mata pelajaran Matematika.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="showToast('info','Menampilkan jadwal minggu berikutnya')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">← Minggu Lalu</button>
                        <button onclick="showToast('info','Menampilkan jadwal minggu berikutnya')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">Minggu Depan →</button>
                        <button onclick="showToast('success','Jadwal mengajar dicetak')" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak PDF</button>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[820px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Jam</th>
                                    <th class="px-4 py-3">Senin</th>
                                    <th class="px-4 py-3">Selasa</th>
                                    <th class="px-4 py-3">Rabu</th>
                                    <th class="px-4 py-3">Kamis</th>
                                    <th class="px-4 py-3">Jumat</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 text-slate-600">
                                <tr>
                                    <td class="px-4 py-3 font-bold text-slate-500">07:15–09:00</td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-navy/10 border border-navy/15 p-2.5"><p class="font-bold text-navy text-xs">Matematika</p><p class="text-[11px] text-slate-500">Kelas 10-A · A-201</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-sky2/10 border border-sky2/15 p-2.5"><p class="font-bold text-sky2 text-xs">Matematika</p><p class="text-[11px] text-slate-500">Kelas 11-C · B-105</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-slate-100 border border-slate-200 p-2.5"><p class="font-bold text-slate-400 text-xs">— Tidak ada —</p><p class="text-[11px] text-slate-400">Waktu BK/Admin</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-navy/10 border border-navy/15 p-2.5"><p class="font-bold text-navy text-xs">Matematika</p><p class="text-[11px] text-slate-500">Kelas 10-B · A-202</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-amber2/15 border border-amber2/25 p-2.5"><p class="font-bold text-amber2 text-xs">Piket Guru</p><p class="text-[11px] text-slate-500">Ruang Piket</p></div></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-bold text-slate-500">09:00–10:45</td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-amber2/15 border border-amber2/25 p-2.5"><p class="font-bold text-amber2 text-xs">Upacara / Pembina</p><p class="text-[11px] text-slate-500">Lapangan</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-navy/10 border border-navy/15 p-2.5"><p class="font-bold text-navy text-xs">Matematika</p><p class="text-[11px] text-slate-500">Kelas 10-A · A-201</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-sky2/10 border border-sky2/15 p-2.5"><p class="font-bold text-sky2 text-xs">Matematika</p><p class="text-[11px] text-slate-500">Kelas 12-D · C-301</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-emerald2/10 border border-emerald2/15 p-2.5"><p class="font-bold text-emerald2 text-xs">Wali Kelas 10-A</p><p class="text-[11px] text-slate-500">Bimbingan · A-201</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-navy/10 border border-navy/15 p-2.5"><p class="font-bold text-navy text-xs">Matematika</p><p class="text-[11px] text-slate-500">Kelas 11-C · B-105</p></div></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-bold text-slate-500">13:00–14:45</td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-slate-100 border border-slate-200 p-2.5"><p class="font-bold text-slate-400 text-xs">— Tidak ada —</p><p class="text-[11px] text-slate-400">Waktu BK/Admin</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-emerald2/10 border border-emerald2/15 p-2.5"><p class="font-bold text-emerald2 text-xs">Ekskul: Olimpiade</p><p class="text-[11px] text-slate-500">Pembina · Lab</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-navy/10 border border-navy/15 p-2.5"><p class="font-bold text-navy text-xs">Matematika</p><p class="text-[11px] text-slate-500">Kelas 10-B · A-202</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-slate-100 border border-slate-200 p-2.5"><p class="font-bold text-slate-400 text-xs">— Tidak ada —</p><p class="text-[11px] text-slate-400">Waktu BK/Admin</p></div></td>
                                    <td class="px-4 py-3"><div class="rounded-xl bg-sky2/10 border border-sky2/15 p-2.5"><p class="font-bold text-sky2 text-xs">Matematika</p><p class="text-[11px] text-slate-500">Kelas 11-C · B-105</p></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: AI GENERATE SOAL & BANK SOAL ================= -->
            <section id="view-aigen" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">✨ AI Generate Soal &amp; Bank Soal</h2>
                    <p class="text-xs text-slate-400">Buat bank soal otomatis dengan AI berdasarkan topik, level kognitif, dan kurikulum.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-2 gap-4 items-start">
                    <!-- FORM INPUT (LEFT) -->
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Parameter Generate</h3>
                        <p class="text-xs text-slate-400">Sesuaikan kriteria soal yang ingin dibuat.</p>

                        <div class="mt-4 space-y-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Mata Pelajaran</label>
                                <select class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option>Matematika</option>
                                    <option>Bahasa Indonesia</option>
                                    <option>Fisika</option>
                                    <option>Biologi</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tingkat Kelas</label>
                                    <select class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                        <option>Kelas 10</option>
                                        <option>Kelas 11</option>
                                        <option>Kelas 12</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Kurikulum</label>
                                    <select class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                        <option>Kurikulum Merdeka</option>
                                        <option>K13 Revisi</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Topik / Materi Ajar</label>
                                <input id="aigenTopik" type="text" value="Fungsi Kuadrat dan Grafiknya" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Jumlah Soal PG</label>
                                    <input type="number" value="5" min="1" max="40" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Jumlah Soal Esai</label>
                                    <input type="number" value="2" min="0" max="20" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tingkat Kesukaran</label>
                                <div class="mt-1 grid grid-cols-3 gap-2 seg text-center text-xs">
                                    <div class="relative">
                                        <input type="radio" name="level" id="lvl-lots" class="peer">
                                        <label for="lvl-lots" class="block bg-slate-100 rounded-xl px-3 py-2.5 text-slate-600 peer-checked:font-bold">LOTS</label>
                                    </div>
                                    <div class="relative">
                                        <input type="radio" name="level" id="lvl-mots" class="peer">
                                        <label for="lvl-mots" class="block bg-slate-100 rounded-xl px-3 py-2.5 text-slate-600 peer-checked:font-bold">MOTS</label>
                                    </div>
                                    <div class="relative">
                                        <input type="radio" name="level" id="lvl-hots" class="peer" checked>
                                        <label for="lvl-hots" class="block bg-slate-100 rounded-xl px-3 py-2.5 text-slate-600 peer-checked:font-bold">HOTS</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button id="btnGenerate" onclick="generateSoal()" class="mt-5 w-full inline-flex justify-center items-center gap-2 bg-gradient-to-r from-navy to-sky2 hover:brightness-110 text-white text-sm font-bold px-5 py-3 rounded-xl transition-all">
                            ✨ Generate Soal AI
                        </button>
                        <button onclick="showToast('info','Membuka arsip Bank Soal (128 soal tersimpan)')" class="mt-2 w-full inline-flex justify-center items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-3 rounded-xl transition-colors">
                            📚 Buka Bank Soal Tersimpan
                        </button>
                    </div>

                    <!-- PREVIEW OUTPUT (RIGHT) -->
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">Preview Hasil</h3>
                            <span id="aigenBadge" class="text-[11px] font-bold bg-slate-100 text-slate-500 px-2.5 py-1 rounded-full">Menunggu generate</span>
                        </div>

                        <!-- Empty state -->
                        <div id="aigenEmpty" class="py-16 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-navy/10 grid place-items-center text-3xl">✨</div>
                            <p class="mt-4 font-heading font-bold text-slate-700">Belum ada soal yang dibuat</p>
                            <p class="text-sm text-slate-400">Isi parameter di kiri lalu tekan <span class="font-semibold text-slate-600">Generate Soal AI</span>.</p>
                        </div>

                        <!-- Skeleton -->
                        <div id="aigenSkeleton" class="hidden space-y-3 py-4">
                            <div class="skeleton h-5 w-40 rounded-lg"></div>
                            <div class="skeleton h-16 w-full rounded-xl"></div>
                            <div class="skeleton h-10 w-full rounded-xl"></div>
                            <div class="skeleton h-10 w-full rounded-xl"></div>
                            <div class="skeleton h-10 w-full rounded-xl"></div>
                        </div>

                        <!-- Result -->
                        <div id="aigenResult" class="hidden">
                            <div class="mt-3 space-y-3">
                                <div class="border border-slate-100 rounded-2xl p-4">
                                    <div class="flex items-start gap-2">
                                        <span class="text-[11px] font-bold bg-navy text-white px-2 py-0.5 rounded-full flex-shrink-0">PG 1</span>
                                        <p class="text-sm font-semibold text-slate-700">Diketahui fungsi kuadrat <i>f(x) = x² − 4x + 3</i>. Titik puncak grafik fungsi tersebut adalah…</p>
                                    </div>
                                    <div class="mt-3 grid grid-cols-2 gap-2 text-sm text-slate-600">
                                        <span class="bg-slate-50 rounded-lg px-3 py-1.5">A. (2, −1)</span>
                                        <span class="bg-slate-50 rounded-lg px-3 py-1.5">B. (−2, 1)</span>
                                        <span class="bg-slate-50 rounded-lg px-3 py-1.5">C. (2, 1)</span>
                                        <span class="bg-slate-50 rounded-lg px-3 py-1.5">D. (1, −2)</span>
                                    </div>
                                    <div class="mt-3 text-xs bg-emerald2/10 text-emerald2 rounded-xl px-3 py-2">
                                        <span class="font-bold">Kunci: A.</span> Pembahasan: x<sub>p</sub> = −b/2a = 4/2 = 2; y<sub>p</sub> = f(2) = 4 − 8 + 3 = −1 → titik puncak (2, −1).
                                    </div>
                                </div>

                                <div class="border border-slate-100 rounded-2xl p-4">
                                    <div class="flex items-start gap-2">
                                        <span class="text-[11px] font-bold bg-navy text-white px-2 py-0.5 rounded-full flex-shrink-0">PG 2</span>
                                        <p class="text-sm font-semibold text-slate-700">Grafik <i>f(x) = x² − 4x + 3</i> memotong sumbu-X di titik…</p>
                                    </div>
                                    <div class="mt-3 grid grid-cols-2 gap-2 text-sm text-slate-600">
                                        <span class="bg-slate-50 rounded-lg px-3 py-1.5">A. (1,0) dan (3,0)</span>
                                        <span class="bg-slate-50 rounded-lg px-3 py-1.5">B. (−1,0) dan (−3,0)</span>
                                        <span class="bg-slate-50 rounded-lg px-3 py-1.5">C. (1,0) dan (−3,0)</span>
                                        <span class="bg-slate-50 rounded-lg px-3 py-1.5">D. (0,1) dan (0,3)</span>
                                    </div>
                                    <div class="mt-3 text-xs bg-emerald2/10 text-emerald2 rounded-xl px-3 py-2">
                                        <span class="font-bold">Kunci: A.</span> Pembahasan: faktorkan (x−1)(x−3) = 0 → x = 1 atau x = 3.
                                    </div>
                                </div>

                                <div class="border border-slate-100 rounded-2xl p-4">
                                    <div class="flex items-start gap-2">
                                        <span class="text-[11px] font-bold bg-amber2 text-white px-2 py-0.5 rounded-full flex-shrink-0">ESAI 1</span>
                                        <p class="text-sm font-semibold text-slate-700">Jelaskan pengaruh nilai <i>a</i> terhadap bentuk grafik fungsi kuadrat <i>f(x)=ax²+bx+c</i>. Berikan contoh.</p>
                                    </div>
                                    <div class="mt-3 text-xs bg-amber2/15 text-amber2 rounded-xl px-3 py-2">
                                        <span class="font-bold">Rubrik:</span> a&gt;0 terbuka ke atas (titik minimum), a&lt;0 terbuka ke bawah (titik maksimum); |a| menentukan kecekungan. Skor 0–4.
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 flex flex-wrap gap-2">
                                <button onclick="showToast('info','Mode edit soal diaktifkan')" class="inline-flex items-center gap-1.5 bg-white border border-slate-200 hover:border-navy text-slate-700 text-xs font-bold px-3.5 py-2.5 rounded-xl transition-colors">✏️ Edit Soal</button>
                                <button onclick="showToast('success','7 soal disimpan ke Bank Soal')" class="inline-flex items-center gap-1.5 bg-emerald2 hover:bg-emerald2/90 text-white text-xs font-bold px-3.5 py-2.5 rounded-xl transition-colors">💾 Simpan ke Bank Soal</button>
                                <button onclick="showToast('success','Soal diekspor ke modul CBT')" class="inline-flex items-center gap-1.5 bg-navy hover:bg-sky2 text-white text-xs font-bold px-3.5 py-2.5 rounded-xl transition-colors">📤 Export ke CBT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PRESENSI KELAS & JURNAL ================= -->
            <section id="view-presensi" class="view">
                <!-- Header status kelas -->
                <div class="rounded-2xl hero-gradient text-white p-5 relative overflow-hidden">
                    <div class="absolute inset-0 grid-pattern"></div>
                    <div class="relative z-10 flex flex-col sm:flex-row sm:items-center gap-3">
                        <div>
                            <p class="text-[11px] uppercase tracking-wider text-white/80">Presensi &amp; Jurnal KBM</p>
                            <h2 id="presensiHeader" class="font-heading font-extrabold text-lg sm:text-xl">Matematika · Kelas 10-A | Jam ke-3–4</h2>
                            <p class="text-xs text-white/80">Senin, 17 Oktober 2026 · Ruang A-201 · Wali Kelas: Budi Santoso, S.Pd.</p>
                        </div>
                        <div class="sm:ml-auto flex gap-2">
                            <span class="text-[11px] font-bold bg-white/15 px-3 py-1.5 rounded-full">👥 32 Siswa</span>
                            <span class="text-[11px] font-bold bg-amber2 text-white px-3 py-1.5 rounded-full">● Belum disimpan</span>
                        </div>
                    </div>
                </div>

                <!-- Summary chips -->
                <div id="presensiSummary" class="mt-4 grid grid-cols-4 gap-3">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-3 text-center">
                        <p class="text-[11px] font-semibold text-slate-400">Hadir</p>
                        <p id="sumHadir" class="font-heading font-extrabold text-xl text-emerald2">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-3 text-center">
                        <p class="text-[11px] font-semibold text-slate-400">Sakit</p>
                        <p id="sumSakit" class="font-heading font-extrabold text-xl text-sky2">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-3 text-center">
                        <p class="text-[11px] font-semibold text-slate-400">Izin</p>
                        <p id="sumIzin" class="font-heading font-extrabold text-xl text-amber2">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-3 text-center">
                        <p class="text-[11px] font-semibold text-slate-400">Alpa</p>
                        <p id="sumAlpa" class="font-heading font-extrabold text-xl text-red-500">0</p>
                    </div>
                </div>

                <!-- Table presensi -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Daftar Kehadiran Siswa</h3>
                        <button onclick="setAllHadir()" class="text-xs font-bold text-navy bg-navy/10 hover:bg-navy hover:text-white px-3 py-2 rounded-lg transition-colors">✓ Tandai Semua Hadir</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[820px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Siswa</th>
                                    <th class="px-4 py-3">NISN</th>
                                    <th class="px-4 py-3 text-center">Hadir</th>
                                    <th class="px-4 py-3 text-center">Sakit</th>
                                    <th class="px-4 py-3 text-center">Izin</th>
                                    <th class="px-4 py-3 text-center">Alpa</th>
                                    <th class="px-4 py-3">Catatan Khusus</th>
                                </tr>
                            </thead>
                            <tbody id="presensiBody" class="divide-y divide-slate-50">
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="presensiEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada siswa pada kelas ini</p>
                        <p class="text-sm text-slate-400">Pilih kelas lain dari Jadwal Mengajar.</p>
                    </div>
                </div>

                <!-- Jurnal KBM -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                    <h3 class="font-heading font-bold text-slate-800">Jurnal KBM</h3>
                    <p class="text-xs text-slate-400">Isi ringkasan kegiatan belajar mengajar pada jam pelajaran ini.</p>
                    <div class="mt-4 grid lg:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Materi yang Disampaikan</label>
                            <textarea rows="4" placeholder="Contoh: Menjelaskan bentuk umum fungsi kuadrat, menentukan titik puncak, dan menggambar grafik..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 resize-none"></textarea>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Kendala / Catatan KBM</label>
                            <textarea rows="4" placeholder="Contoh: 4 siswa belum memahami cara memfaktorkan; perlu latihan tambahan..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 resize-none"></textarea>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Foto Dokumentasi Kelas</label>
                        <button onclick="showToast('info','Membuka kamera / galeri perangkat...')" class="mt-1 w-full border-2 border-dashed border-slate-200 hover:border-navy rounded-2xl py-6 text-center transition-colors">
                            <span class="text-3xl">📷</span>
                            <p class="mt-2 text-sm font-semibold text-slate-600">Ambil / Unggah Foto Dokumentasi</p>
                            <p class="text-xs text-slate-400">Format JPG/PNG, maksimal 5 MB.</p>
                        </button>
                    </div>

                    <div class="mt-5 flex flex-col sm:flex-row gap-2 sm:justify-end">
                        <button onclick="showToast('info','Presensi & jurnal disimpan sebagai draf')" class="text-sm font-bold text-slate-500 px-5 py-3 rounded-xl hover:bg-slate-50 transition-colors">Simpan Draf</button>
                        <button onclick="openSaveConfirm()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-6 py-3 rounded-xl transition-colors">💾 Simpan Jurnal &amp; Presensi</button>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: JURNAL MENGAJAR ================= -->
            <section id="view-jurnal-guru" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Jurnal Mengajar Digital</h2><p class="text-xs text-slate-400">Riwayat jurnal KBM yang telah diisi.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showView('presensi','Presensi Kelas')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Isi Jurnal Baru</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Jam</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Materi</th><th class="px-4 py-3">Kehadiran</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="jurnal-guruBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PIKET ================= -->
            <section id="view-piket" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Penggantian Jam &amp; Piket</h2><p class="text-xs text-slate-400">Jadwal piket dan penggantian jam mengajar.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Pengajuan pengganti dikirim ke waka')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Ajukan Pengganti</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Jam</th><th class="px-4 py-3">Tugas</th><th class="px-4 py-3">Lokasi</th><th class="px-4 py-3">Pengganti</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="piketBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: MATERI & TUGAS ================= -->
            <section id="view-materi-tugas" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Materi &amp; Tugas Digital</h2><p class="text-xs text-slate-400">Distribusi materi, tugas, dan kuis ke kelas.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Materi baru diunggah')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Unggah Materi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Judul</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Deadline</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="materi-tugasBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: VIDEO CONFERENCE ================= -->
            <section id="view-video-conference" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Video Conference Kelas</h2><p class="text-xs text-slate-400">Jadwal kelas daring dengan siswa.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Ruang kelas daring dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buat Sesi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Topik</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Jadwal</th><th class="px-4 py-3">Platform</th><th class="px-4 py-3">Peserta</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="video-conferenceBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: INPUT NILAI ================= -->
            <section id="view-input-nilai" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Input Nilai (Harian, PTS, PAS, P5)</h2><p class="text-xs text-slate-400">Input nilai per siswa untuk berbagai jenis penilaian.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Nilai tersimpan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">💾 Simpan Nilai</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Harian</th><th class="px-4 py-3">PTS</th><th class="px-4 py-3">PAS</th><th class="px-4 py-3">P5</th></tr></thead><tbody id="input-nilaiBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: LEGGER ================= -->
            <section id="view-legger" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Legger Nilai Otomatis</h2><p class="text-xs text-slate-400">Rekapitulasi nilai per kelas yang dihitung otomatis.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Jumlah Siswa</th><th class="px-4 py-3">Rata-rata</th><th class="px-4 py-3">Tuntas</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="leggerBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: CBT GURU ================= -->
            <section id="view-cbt-guru" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">CBT &amp; Analisis Butir Soal</h2><p class="text-xs text-slate-400">Pelaksanaan ujian daring dan analisis butir soal.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Analisis butir soal dibuka')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">🔍 Analisis Butir</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Ujian</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Butir Soal</th><th class="px-4 py-3">Rata-rata</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="cbt-guruBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: VALIDASI E-RAPOR ================= -->
            <section id="view-validasi-erapor" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Validasi e-Rapor &amp; Wali Kelas</h2><p class="text-xs text-slate-400">Validasi nilai sebelum e-Rapor dicetak.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Validasi dikirim ke wali kelas')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">✅ Validasi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Progress</th><th class="px-4 py-3">Wali Kelas</th><th class="px-4 py-3">Terakhir Diubah</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="validasi-eraporBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: CATATAN ANEKDOT ================= -->
            <section id="view-anekdot" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Catatan Anekdot Siswa</h2><p class="text-xs text-slate-400">Catatan observasi perilaku siswa.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Catatan anekdot ditambahkan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Tambah Catatan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Catatan</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="anekdotBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: POIN PELANGGARAN ================= -->
            <section id="view-poin" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Poin Pelanggaran &amp; Apresiasi</h2><p class="text-xs text-slate-400">Akumulasi poin kedisiplinan dan apresiasi siswa.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Poin diperbarui')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Beri Poin</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Poin Pelanggaran</th><th class="px-4 py-3">Poin Apresiasi</th><th class="px-4 py-3">Total</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="poinBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: EKSTRAKURIKULER ================= -->
            <section id="view-ekstrakurikuler" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pembina Ekstrakurikuler</h2><p class="text-xs text-slate-400">Kelola kegiatan ekstrakurikuler yang dibina.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Absensi ekskul dicatat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">✅ Absensi Ekskul</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Ekstrakurikuler</th><th class="px-4 py-3">Jadwal</th><th class="px-4 py-3">Anggota</th><th class="px-4 py-3">Lokasi</th><th class="px-4 py-3">Pembina</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="ekstrakurikulerBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: TAHFIDZ GURU ================= -->
            <section id="view-tahfidz-guru" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Input Tahfidz &amp; Tahsin</h2><p class="text-xs text-slate-400">Input setoran hafalan dan kualitas bacaan siswa.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Setoran tahfidz tersimpan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Input Setoran</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Juz</th><th class="px-4 py-3">Surah</th><th class="px-4 py-3">Setoran</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="tahfidz-guruBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: RUJUKAN BK ================= -->
            <section id="view-rujukan-bk" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Rujukan Konseling BK</h2><p class="text-xs text-slate-400">Rujukan siswa ke Guru BK untuk pendampingan.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Rujukan dikirim ke Guru BK')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buat Rujukan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Alasan</th><th class="px-4 py-3">Rujuk Ke</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="rujukan-bkBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PENGUMUMAN KELAS ================= -->
            <section id="view-pengumuman-kelas" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pengumuman Kelas</h2><p class="text-xs text-slate-400">Informasi yang dibagikan ke siswa di kelas.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Pengumuman diterbitkan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buat Pengumuman</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Judul</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Dibuat Oleh</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="pengumuman-kelasBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: CHAT WALI ================= -->
            <section id="view-chat-wali" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Chat Wali Murid</h2><p class="text-xs text-slate-400">Percakapan dengan orang tua / wali murid.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Pesan terkirim')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Pesan Baru</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Wali Murid</th><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Pesan Terakhir</th><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="chat-waliBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: FORUM MGMP ================= -->
            <section id="view-forum-mgmp" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Forum MGMP / Komunitas Guru</h2><p class="text-xs text-slate-400">Diskusi antar guru dan berbagi praktik baik.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Topik baru dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buat Topik</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Topik</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Balasan</th><th class="px-4 py-3">Dibuat Oleh</th><th class="px-4 py-3">Terakhir</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="forum-mgmpBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PUSAT UNDUH DOKUMEN ================= -->
            <section id="view-unduh-dokumen" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pusat Unduh Dokumen</h2><p class="text-xs text-slate-400">Unduh dokumen pendukung pembelajaran.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Dokumen</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Ukuran</th><th class="px-4 py-3">Format</th><th class="px-4 py-3">Tanggal</th></tr></thead><tbody id="unduh-dokumenBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PRESENSI PEGAWAI ================= -->
            <section id="view-presensi-pegawai" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Presensi Pegawai (GPS / Geo-Tagging)</h2><p class="text-xs text-slate-400">Riwayat presensi masuk/pulang dengan lokasi.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Presensi berhasil dicatat (simulasi GPS)')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">🕒 Presensi Sekarang</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Lokasi</th><th class="px-4 py-3">Jarak</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="presensi-pegawaiBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: CUTI & IZIN ================= -->
            <section id="view-cuti-izin" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pengajuan Cuti &amp; Izin</h2><p class="text-xs text-slate-400">Ajukan dan pantau status cuti / izin.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Pengajuan cuti dikirim')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Ajukan Cuti</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Tanggal Mulai</th><th class="px-4 py-3">Tanggal Selesai</th><th class="px-4 py-3">Alasan</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="cuti-izinBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: SLIP GAJI GURU ================= -->
            <section id="view-slip-gaji-guru" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Slip Gaji Digital</h2><p class="text-xs text-slate-400">Riwayat slip gaji yang dapat diunduh.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Mengunduh slip gaji...')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Unduh Terbaru</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Periode</th><th class="px-4 py-3">Gaji Pokok</th><th class="px-4 py-3">Tunjangan</th><th class="px-4 py-3">Potongan</th><th class="px-4 py-3">Gaji Bersih</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="slip-gaji-guruBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: DIKLAT & SERTIFIKAT ================= -->
            <section id="view-diklat" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Diklat &amp; Sertifikat</h2><p class="text-xs text-slate-400">Riwayat pelatihan dan sertifikat yang dimiliki.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Sertifikat diunggah')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Unggah Sertifikat</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Nama Diklat</th><th class="px-4 py-3">Penyelenggara</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Durasi</th><th class="px-4 py-3">Sertifikat</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="diklatBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GENERIC / EMPTY STATE ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧩</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal Guru. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Dashboard Guru</span>, <span class="font-semibold text-slate-600">Jadwal Mengajar</span>, <span class="font-semibold text-slate-600">AI Generate Soal</span>, dan <span class="font-semibold text-slate-600">Presensi Kelas</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard Guru')" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('aigen','AI Generate Soal')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke AI Generate Soal</button>
                        <button onclick="showView('presensi','Presensi Kelas')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Presensi Kelas</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="px-4 sm:px-6 py-4 text-center text-xs text-slate-400 border-t border-slate-200">
            © 2026 PT Artificial Intelligence Learning Madani Digital · Portal Guru (Simulasi)
        </footer>
    </div>

    <!-- ============ MODAL: KONFIRMASI SIMPAN ============ -->
    <div id="saveModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeSaveConfirm()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-xl">💾</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Simpan Jurnal &amp; Presensi?</h3><p class="text-xs text-slate-400">Pastikan data kehadiran sudah benar sebelum disimpan.</p></div>
            </div>
            <div class="mt-4 bg-slate-50 rounded-2xl p-4 text-sm text-slate-600 space-y-1">
                <p>Kelas: <span class="font-bold text-slate-800">10-A · Matematika · Jam ke-3–4</span></p>
                <p class="text-xs">Ringkasan kehadiran akan direkap ke Legger &amp; Portal Wali Murid.</p>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closeSaveConfirm()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="confirmSave()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ya, Simpan</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: PRESENSI PEGAWAI (GPS) ============ -->
    <div id="pegawaiModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closePresensiPegawai()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-emerald2/10 text-emerald2 grid place-items-center text-xl">🕒</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Presensi Pegawai (GPS)</h3><p class="text-xs text-slate-400">Kehadiran dicatat dengan geo-tagging lokasi sekolah.</p></div>
            </div>
            <div class="mt-4 bg-slate-50 rounded-2xl p-4 text-sm">
                <div class="flex items-center gap-2 text-emerald2 font-semibold"><span>📍</span> Terdeteksi: SMAN 1 Nusantara</div>
                <p class="mt-2 text-xs text-slate-500">Radius: 42 m dari titik sekolah · Akurasi ± 8 m</p>
                <p id="clockNow" class="mt-3 font-heading font-extrabold text-2xl text-slate-800">--:--:--</p>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closePresensiPegawai()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
                <button onclick="recordPresensiPegawai()" class="bg-emerald2 hover:brightness-110 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-all">Rekam Kehadiran</button>
            </div>
        </div>
    </div>

    <!-- ============ TOAST ============ -->
    <div id="toastWrap" class="fixed bottom-5 right-5 z-[70] space-y-2"></div>

    <script>
        // ---------- Sidebar toggle (mobile) ----------
        function toggleSidebar() {
            const sb = document.getElementById('sidebar');
            const ov = document.getElementById('sidebarOverlay');
            sb.classList.toggle('-translate-x-full');
            ov.classList.toggle('hidden');
        }

        // ---------- Accordion groups ----------
        document.querySelectorAll('.sidebar-group-btn').forEach(btn => {
            btn.addEventListener('click', () => btn.closest('.sidebar-group').classList.toggle('open'));
        });

        // ---------- View switching ----------
        const views = document.querySelectorAll('.view');
        function showView(name, title) {
            views.forEach(v => v.classList.remove('active'));
            const el = document.getElementById('view-' + name);
            if (el) el.classList.add('active');
            if (title) document.getElementById('pageTitle').textContent = title;

            document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
            const active = document.querySelector('.menu-item[data-view="' + name + '"]');
            if (active) active.classList.add('active');

            if (name === 'presensi') loadPresensi();
            if (name === 'aigen') generateSoal();
            if (tableData[name]) loadTable(name);

            if (window.innerWidth < 1024 && !document.getElementById('sidebar').classList.contains('-translate-x-full')) {
                toggleSidebar();
            }
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', () => {
                const view = item.dataset.view || 'generic';
                const title = item.dataset.title || item.textContent.trim();
                if (view === 'generic') {
                    document.getElementById('genericTitle').textContent = title;
                    showView('generic', title);
                } else {
                    showView(view, title);
                }
            });
        });

        // ---------- PRESENSI KELAS ----------
        const presensiData = [
            { nama: 'Keira Faza Aishanaya', nisn: '0071234501' },
            { nama: 'Bagas Pratama', nisn: '0071234502' },
            { nama: 'Citra Ayu Lestari', nisn: '0071234503' },
            { nama: 'Dimas Anggara', nisn: '0061234504' },
            { nama: 'Eka Nurhaliza', nisn: '0071234505' },
            { nama: 'Fajar Ramadhan', nisn: '0061234506' },
            { nama: 'Gita Puspita Sari', nisn: '0071234507' },
            { nama: 'Hendra Wijaya', nisn: '0071234508' }
        ];

        let presensiLoaded = false;
        function loadPresensi() {
            if (presensiLoaded) return;
            const body = document.getElementById('presensiBody');
            setTimeout(() => {
                body.innerHTML = presensiData.map((s, i) => presensiRowHtml(s, i)).join('');
                presensiLoaded = true;
                presensiData.forEach((s, i) => setStatus(i, 'Hadir'));
                bindPresensiEvents();
                showToast('success', 'Daftar siswa kelas 10-A dimuat');
            }, 700);
        }

        function presensiRowHtml(s, i) {
            const initial = s.nama.split(' ').map(w => w[0]).slice(0, 2).join('');
            const cell = (val) => `<td class="px-4 py-3 text-center">
                <label class="inline-flex items-center justify-center cursor-pointer">
                    <input type="radio" name="p${i}" value="${val}" class="sr-only peer p-radio" data-idx="${i}">
                    <span class="w-9 h-9 grid place-items-center rounded-lg border border-slate-200 peer-checked:bg-navy peer-checked:text-white peer-checked:border-navy hover:border-navy text-xs font-bold transition-colors">${val[0]}</span>
                </label></td>`;
            return `<tr class="hover:bg-slate-50/70">
                <td class="px-4 py-3 text-slate-400 font-semibold">${i + 1}</td>
                <td class="px-4 py-3"><div class="flex items-center gap-3"><span class="w-9 h-9 rounded-full bg-navy/10 text-navy grid place-items-center font-heading font-bold text-xs">${initial}</span><span class="font-semibold text-slate-700">${s.nama}</span></div></td>
                <td class="px-4 py-3 text-slate-500">${s.nisn}</td>
                ${cell('Hadir')}${cell('Sakit')}${cell('Izin')}${cell('Alpa')}
                <td class="px-4 py-3"><input type="text" placeholder="Catatan..." class="w-40 bg-slate-50 rounded-lg px-2.5 py-2 text-xs outline-none text-slate-600 placeholder:text-slate-400"></td>
            </tr>`;
        }

        function bindPresensiEvents() {
            document.querySelectorAll('.p-radio').forEach(r => r.addEventListener('change', updateSummary));
        }

        const statusByIndex = {};
        function setStatus(i, val) {
            statusByIndex[i] = val;
            const el = document.querySelector('.p-radio[data-idx="' + i + '"][value="' + val + '"]');
            if (el) el.checked = true;
            updateSummary();
        }

        function updateSummary() {
            const count = { Hadir: 0, Sakit: 0, Izin: 0, Alpa: 0 };
            document.querySelectorAll('.p-radio:checked').forEach(r => { count[r.value]++; });
            document.getElementById('sumHadir').textContent = count.Hadir;
            document.getElementById('sumSakit').textContent = count.Sakit;
            document.getElementById('sumIzin').textContent = count.Izin;
            document.getElementById('sumAlpa').textContent = count.Alpa;
        }

        function setAllHadir() {
            presensiData.forEach((s, i) => setStatus(i, 'Hadir'));
            showToast('success', 'Semua siswa ditandai Hadir');
        }

        function openPresensiKelas(mapel, kelas, jam) {
            document.getElementById('presensiHeader').textContent = mapel + ' · Kelas ' + kelas + ' | ' + jam;
            presensiLoaded = false;
            document.getElementById('presensiBody').innerHTML = '<tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>';
            showView('presensi', 'Presensi Kelas');
        }

        // ---------- AI GENERATE SOAL ----------
        let aigenStarted = false;
        function generateSoal() {
            if (aigenStarted) return;
            aigenStarted = true;
            document.getElementById('aigenEmpty').classList.add('hidden');
            document.getElementById('aigenResult').classList.add('hidden');
            document.getElementById('aigenSkeleton').classList.remove('hidden');
            document.getElementById('aigenBadge').textContent = 'AI sedang menyusun...';
            document.getElementById('aigenBadge').className = 'text-[11px] font-bold bg-amber2/15 text-amber2 px-2.5 py-1 rounded-full';
            setTimeout(() => {
                document.getElementById('aigenSkeleton').classList.add('hidden');
                document.getElementById('aigenResult').classList.remove('hidden');
                document.getElementById('aigenBadge').textContent = '✓ 7 soal · HOTS';
                document.getElementById('aigenBadge').className = 'text-[11px] font-bold bg-emerald2/10 text-emerald2 px-2.5 py-1 rounded-full';
                showToast('success', 'AI berhasil membuat 7 soal');
            }, 1600);
        }

        // ---------- Modal simpan ----------
        function openSaveConfirm() { const m = document.getElementById('saveModal'); m.classList.remove('hidden'); m.classList.add('flex'); }
        function closeSaveConfirm() { const m = document.getElementById('saveModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function confirmSave() {
            closeSaveConfirm();
            showToast('success', 'Jurnal & presensi kelas 10-A berhasil disimpan');
        }

        // ---------- Presensi pegawai (GPS) ----------
        let clockTimer = null;
        function openPresensiPegawai() {
            const m = document.getElementById('pegawaiModal');
            m.classList.remove('hidden'); m.classList.add('flex');
            const tick = () => { document.getElementById('clockNow').textContent = new Date().toLocaleTimeString('id-ID'); };
            tick(); clockTimer = setInterval(tick, 1000);
        }
        function closePresensiPegawai() {
            const m = document.getElementById('pegawaiModal');
            m.classList.add('hidden'); m.classList.remove('flex');
            if (clockTimer) clearInterval(clockTimer);
        }
        function recordPresensiPegawai() {
            closePresensiPegawai();
            showToast('success', 'Presensi pegawai terekam · lokasi SMAN 1 Nusantara');
        }

        // ---------- Generic in-page data tables ----------
        const statusPillMap = {
            'Terverifikasi': 'bg-emerald2/10 text-emerald2', 'Lunas': 'bg-emerald2/10 text-emerald2',
            'Selesai': 'bg-emerald2/10 text-emerald2', 'Aktif': 'bg-emerald2/10 text-emerald2',
            'OK': 'bg-emerald2/10 text-emerald2', 'Menunggu': 'bg-amber2/15 text-amber2',
            'Perlu Review': 'bg-amber2/15 text-amber2', 'Draft': 'bg-slate-200 text-slate-600',
            'Ditolak': 'bg-red-100 text-red-600', 'Tunggakan': 'bg-red-100 text-red-600'
        };
        function statusPill(v) {
            const cls = statusPillMap[v] || 'bg-slate-100 text-slate-600';
            return '<span class="text-[11px] font-bold ' + cls + ' px-2 py-0.5 rounded-full">' + v + '</span>';
        }
        function cellHtml(c, i) {
            if (c.charAt(0) === '~') return '<td class="px-4 py-3">' + statusPill(c.slice(1)) + '</td>';
            return '<td class="px-4 py-3 ' + (i === 0 ? 'font-semibold text-slate-700' : 'text-slate-500') + '">' + c + '</td>';
        }
        const tableData = {
            'jurnal-guru': [
                ['07:15 - 08:45', 'X-A', 'Matematika', 'Sistem Persamaan Linear', '30/32', '~Selesai'],
                ['08:45 - 10:15', 'X-B', 'Matematika', 'Fungsi Kuadrat', '28/30', '~Selesai'],
                ['10:15 - 11:45', 'XI-C', 'Matematika', 'Limit Fungsi', '26/28', '~Menunggu'],
                ['13:00 - 14:30', 'XII-D', 'Matematika', 'Turunan', '24/26', '~Draft']
            ],
            'piket': [
                ['19 Okt', 'Jam 3-4', 'Guru Piket Harian', 'Gerbang & Koridor', 'Ibu Siti', '~Selesai'],
                ['20 Okt', 'Jam 1-2', 'Pengganti Matematika', 'R-101', 'Bpk. Andi', '~Menunggu'],
                ['21 Okt', 'Jam 5-6', 'Guru Piket Harian', 'Kantin', 'Ibu Dewi', '~Draft']
            ],
            'materi-tugas': [
                ['LKS Fungsi Kuadrat', 'Matematika', 'X-B', 'Materi', '20 Okt 2026', '~Terverifikasi'],
                ['Tugas Turunan', 'Matematika', 'XII-D', 'Tugas', '22 Okt 2026', '~Menunggu'],
                ['Kuis Limit Fungsi', 'Matematika', 'XI-C', 'Kuis', '21 Okt 2026', '~Draft']
            ],
            'video-conference': [
                ['Review Materi Limit', 'XI-C', '20 Okt 09:00', 'Zoom', '26', '~Menunggu'],
                ['Kelas Online Turunan', 'XII-D', '21 Okt 10:00', 'Google Meet', '24', '~Selesai'],
                ['Tanya Jawab PTS', 'X-A', '22 Okt 13:00', 'Zoom', '30', '~Draft']
            ],
            'input-nilai': [
                ['Keira Faza', 'X-A', '88', '85', '—', 'A'],
                ['Bagas Pratama', 'X-A', '82', '80', '—', 'B'],
                ['Citra Ayu', 'X-B', '90', '89', '—', 'A'],
                ['Dimas Anggara', 'XII-D', '78', '75', '—', 'B']
            ],
            'legger': [
                ['X-A', 'Matematika', '32', '84,2', '30', '~Selesai'],
                ['X-B', 'Matematika', '30', '81,5', '27', '~Selesai'],
                ['XI-C', 'Matematika', '28', '79,8', '24', '~Menunggu'],
                ['XII-D', 'Matematika', '26', '82,1', '25', '~Draft']
            ],
            'cbt-guru': [
                ['PTS Ganjil', 'Matematika', 'X-A', '40', '84,0', '~Selesai'],
                ['PTS Ganjil', 'Matematika', 'X-B', '40', '79,5', '~Selesai'],
                ['Kuis Limit', 'Matematika', 'XI-C', '20', '—', '~Draft']
            ],
            'validasi-erapor': [
                ['X-A', 'Matematika', '100%', 'Rina, M.Pd.', '18 Okt 2026', '~Selesai'],
                ['X-B', 'Matematika', '92%', 'Dwi, S.Pd.', '18 Okt 2026', '~Menunggu'],
                ['XI-C', 'Matematika', '74%', 'Sari, S.Kom.', '17 Okt 2026', '~Menunggu']
            ],
            'anekdot': [
                ['15 Okt', 'Keira Faza', 'X-A', 'Membantu teman belajar', 'Positif', '~Terverifikasi'],
                ['16 Okt', 'Bagas Pratama', 'X-A', 'Terlambat masuk kelas', 'Perlu perhatian', '~Menunggu'],
                ['17 Okt', 'Citra Ayu', 'X-B', 'Aktif bertanya di kelas', 'Positif', '~Terverifikasi']
            ],
            'poin': [
                ['Keira Faza', 'X-A', '0', '25', '25', '~Aktif'],
                ['Bagas Pratama', 'X-A', '10', '5', '-5', '~Perlu Review'],
                ['Dimas Anggara', 'XII-D', '20', '0', '-20', '~Perlu Review']
            ],
            'ekstrakurikuler': [
                ['Pramuka', 'Jumat 15:00', '42', 'Lapangan', 'Bpk. Andi', '~Aktif'],
                ['Rohis', 'Kamis 15:00', '36', 'Masjid', 'Ibu Siti', '~Aktif'],
                ['Futsal', 'Sabtu 08:00', '24', 'Lap. Futsal', 'Bpk. Yusuf', '~Aktif']
            ],
            'tahfidz-guru': [
                ['Keira Faza', 'X-A', '30', 'An-Naba', '2 halaman', '~Selesai'],
                ['Bagas Pratama', 'X-A', '30', 'Al-Mulk', '1 halaman', '~Selesai'],
                ['Citra Ayu', 'X-B', '29', 'Yasin', '3 halaman', '~Menunggu']
            ],
            'rujukan-bk': [
                ['17 Okt', 'Dimas Anggara', 'XII-D', 'Menurunnya motivasi belajar', 'Guru BK', '~Menunggu'],
                ['18 Okt', 'Bagas Pratama', 'X-A', 'Konflik dengan teman', 'Guru BK', '~Selesai'],
                ['15 Okt', 'Fajar Ramadhan', 'IX-A', 'Stres menjelang ujian', 'Guru BK', '~Selesai']
            ],
            'pengumuman-kelas': [
                ['Persiapan PTS Ganjil', 'X-A', '18 Okt 2026', 'Ibu Ratna', '~Terverifikasi'],
                ['Pengumpulan Tugas Turunan', 'XII-D', '17 Okt 2026', 'Ibu Ratna', '~Terverifikasi'],
                ['Jadwal Remedial Matematika', 'XI-C', '16 Okt 2026', 'Ibu Ratna', '~Draft']
            ],
            'chat-wali': [
                ['Ibu Lestari', 'Keira Faza', 'Terima kasih infonya Bu', '09:20', '~Aktif'],
                ['Bpk. Sugeng', 'Dimas Anggara', 'Apakah bisa izin hari ini?', '08:45', '~Aktif'],
                ['Ibu Ratna W.', 'Citra Ayu', 'Nilai PTS sudah keluar?', 'Kemarin', '~Selesai']
            ],
            'forum-mgmp': [
                ['Bank soal PTS semester ganjil', 'Matematika', '12', 'Ibu Ratna', '18 Okt', '~Aktif'],
                ['Metode pembelajaran berdiferensiasi', 'Umum', '8', 'Bpk. Andi', '17 Okt', '~Aktif'],
                ['Jadwal MGMP bulanan', 'Umum', '3', 'Waka Kurikulum', '16 Okt', '~Selesai']
            ],
            'unduh-dokumen': [
                ['Kalender Akademik 2026/2027', 'Akademik', '0.8 MB', 'PDF', '01 Agu 2026'],
                ['Panduan e-Rapor', 'Akademik', '1.2 MB', 'PDF', '10 Agu 2026'],
                ['Format Jurnal Mengajar', 'Administrasi', '0.3 MB', 'DOCX', '12 Agu 2026'],
                ['Materi Diklat Kurikulum', 'Pelatihan', '3.4 MB', 'ZIP', '20 Sep 2026']
            ],
            'presensi-pegawai': [
                ['19 Okt', '06:58', 'Masuk', 'Gerbang Utama', '12 m', '~OK'],
                ['19 Okt', '14:05', 'Pulang', 'Gerbang Utama', '15 m', '~OK'],
                ['18 Okt', '07:02', 'Masuk', 'Gerbang Utama', '9 m', '~OK'],
                ['18 Okt', '13:58', 'Pulang', 'Gerbang Utama', '11 m', '~OK']
            ],
            'cuti-izin': [
                ['Izin', '20 Okt 2026', '20 Okt 2026', 'Keperluan keluarga', '~Menunggu'],
                ['Cuti', '25 Okt 2026', '27 Okt 2026', 'Keperluan pribadi', '~Selesai'],
                ['Sakit', '10 Okt 2026', '10 Okt 2026', 'Demam', '~Selesai']
            ],
            'slip-gaji-guru': [
                ['September 2026', 'Rp 4.200.000', 'Rp 1.500.000', 'Rp 250.000', 'Rp 5.450.000', '~Selesai'],
                ['Oktober 2026', 'Rp 4.200.000', 'Rp 1.500.000', 'Rp 250.000', 'Rp 5.450.000', '~Menunggu'],
                ['Agustus 2026', 'Rp 4.200.000', 'Rp 1.400.000', 'Rp 250.000', 'Rp 5.350.000', '~Selesai']
            ],
            'diklat': [
                ['Implementasi Kurikulum Merdeka', 'Dinas Pendidikan', 'Agu 2026', '32 JP', 'Tersedia', '~Selesai'],
                ['Pembelajaran Berdiferensiasi', 'P4TK', 'Sep 2026', '24 JP', 'Tersedia', '~Selesai'],
                ['Asesmen Nasional', 'Kemendikbud', 'Okt 2026', '16 JP', 'Menunggu', '~Menunggu']
            ]
        };
        const loadedTables = {};
        function loadTable(name) {
            if (loadedTables[name]) return;
            const body = document.getElementById(name + 'Body');
            if (!body) return;
            setTimeout(() => {
                body.innerHTML = (tableData[name] || []).map(row => '<tr class="hover:bg-slate-50/70">' + row.map(cellHtml).join('') + '</tr>').join('');
                loadedTables[name] = true;
            }, 600);
        }

        // ---------- Toast ----------
        function showToast(type, msg) {
            const colors = { success: 'bg-emerald2', error: 'bg-red-500', info: 'bg-navy', warning: 'bg-amber2' };
            const icons = { success: '✓', error: '✕', info: 'ℹ', warning: '!' };
            const wrap = document.getElementById('toastWrap');
            const t = document.createElement('div');
            t.className = colors[type] + ' text-white text-sm font-semibold px-4 py-3 rounded-xl shadow-lg flex items-center gap-2 max-w-xs transform translate-x-full transition-transform duration-300';
            t.innerHTML = '<span class="w-6 h-6 rounded-full bg-white/20 grid place-items-center text-xs">' + icons[type] + '</span>' + msg;
            wrap.appendChild(t);
            requestAnimationFrame(() => t.classList.remove('translate-x-full'));
            setTimeout(() => { t.classList.add('translate-x-full'); setTimeout(() => t.remove(), 300); }, 3200);
        }
    </script>
</body>

</html>
