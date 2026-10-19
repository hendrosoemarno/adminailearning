<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Murid — Ruang Belajar Digital · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal Murid SIAKAD PLUS — ruang belajar & aktivitas digital siswa dengan 5 grup fitur: Pembelajaran & LMS, CBT & Ujian Digital, Keuangan & E-Money, Informasi & Komunikasi, serta Pengembangan & Karakter Siswa.">
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
        .emoney-gradient { background: linear-gradient(135deg, #0F172A 0%, #1E40AF 60%, #0284C7 100%); }
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
        .qnav { width: 40px; height: 40px; }
        .qnav.answered { background: #10B981; color: #fff; border-color: #10B981; }
        .qnav.ragu { background: #F59E0B; color: #fff; border-color: #F59E0B; }
        .qnav.current { outline: 2px solid #1E40AF; outline-offset: 2px; }
        .opt:has(input:checked) { border-color: #1E40AF; background: #EFF6FF; box-shadow: 0 0 0 1px #1E40AF; }
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
                <p class="text-[10px] text-slate-500">Portal Murid · Ruang Belajar</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Scrollable nav -->
        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <!-- Dashboard -->
            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard Murid</span>
            </button>

            <!-- 1. Pembelajaran & LMS -->
            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📚</span><span class="flex-1 text-left">Pembelajaran &amp; LMS</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="mata-pelajaran" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Mata Pelajaran Digital</button>
                    <button data-view="kelas-digital" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kelas Digital</button>
                    <button data-view="video-conference" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Video Conference Kelas</button>
                    <button data-view="sentra-pembelajaran" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Sentra Pembelajaran</button>
                    <button data-view="perpustakaan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Perpustakaan Digital</button>
                    <button data-view="pusat-unduh" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pusat Unduh</button>
                </div>
            </div>

            <!-- 2. CBT & Ujian Digital -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📝</span><span class="flex-1 text-left">CBT &amp; Ujian Digital</span>
                    <span class="text-[10px] font-bold bg-amber2 text-white px-2 py-0.5 rounded-full">1</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="cbt" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Computer Based Test</button>
                    <button data-view="cbt" data-title="Anti-Kecurangan & Timer" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Anti-Kecurangan &amp; Timer</button>
                    <button data-view="hasil" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Hasil Instan</button>
                </div>
            </div>

            <!-- 3. Keuangan & E-Money -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💳</span><span class="flex-1 text-left">Keuangan &amp; E-Money Siswa</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="emoney" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Saldo E-Money</button>
                    <button data-view="emoney" data-title="Riwayat Transaksi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Riwayat Transaksi</button>
                    <button data-view="tabungan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tabungan Siswa</button>
                </div>
            </div>

            <!-- 4. Informasi & Komunikasi -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📢</span><span class="flex-1 text-left">Informasi &amp; Komunikasi</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="pengumuman" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengumuman Sekolah</button>
                    <button data-view="laporan-kehadiran" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Laporan Kehadiran</button>
                    <button data-view="chat-internal" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Chat Internal</button>
                    <button data-view="edutainment" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Edutainment</button>
                </div>
            </div>

            <!-- 5. Pengembangan & Karakter -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🏆</span><span class="flex-1 text-left">Pengembangan &amp; Karakter</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="poin-kedisiplinan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Poin Kedisiplinan</button>
                    <button data-view="tahfidz" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tahfidz &amp; Tahsin</button>
                    <button data-view="ekstrakurikuler" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Ekstrakurikuler</button>
                    <button data-view="kartu-ujian" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kartu Ujian Digital</button>
                    <button data-view="portofolio" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Portofolio Prestasi</button>
                </div>
            </div>

        </nav>

        <!-- Sidebar footer -->
        <div class="p-3 border-t border-white/10 flex-shrink-0 space-y-1">
            <button onclick="showView('emoney','Saldo E-Money')" class="w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-emerald2 hover:bg-white/5 transition-colors">
                <span>💳</span> Saldo E-Money: Rp 45.000
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Portal Murid</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base">Dashboard Murid</h1>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <!-- Search -->
                    <div class="hidden md:flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2 w-64">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                        <input type="text" placeholder="Cari materi, tugas, buku..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                    </div>
                    <!-- E-Money chip -->
                    <button onclick="showView('emoney','Saldo E-Money')" class="hidden sm:inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold px-3.5 py-2.5 rounded-xl hover:bg-emerald-100 transition-colors">
                        💳 Rp 45.000
                    </button>
                    <!-- Notif -->
                    <button onclick="showToast('info', '2 pengumuman baru')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Profile -->
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">KF</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Keira Faza Aishanaya</p>
                            <p class="text-[10px] text-slate-400">NISN 0071234501 · Kelas 10-A</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-4 sm:p-6">

            <!-- ================= VIEW: DASHBOARD MURID ================= -->
            <section id="view-dashboard" class="view active">

                <!-- Welcome banner -->
                <div class="rounded-3xl hero-gradient text-white p-5 sm:p-6 relative overflow-hidden">
                    <div class="absolute inset-0 grid-pattern"></div>
                    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl bg-white/20 grid place-items-center font-heading font-extrabold text-xl flex-shrink-0">KF</div>
                            <div>
                                <p class="text-sm text-white/85">Halo,</p>
                                <h2 class="font-heading font-extrabold text-xl sm:text-2xl text-white">Keira Faza Aishanaya! 👋</h2>
                                <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                    <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">NISN 0071234501</span>
                                    <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">Kelas 10-A</span>
                                    <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">Wali: Budi Santoso, S.Pd.</span>
                                </div>
                            </div>
                        </div>
                        <div class="lg:ml-auto">
                            <div class="inline-flex items-center gap-3 bg-white/15 backdrop-blur rounded-2xl px-4 py-3">
                                <span class="w-10 h-10 rounded-xl bg-emerald2 grid place-items-center text-white text-lg">✓</span>
                                <div class="leading-tight">
                                    <p class="text-[11px] text-white/80 font-semibold">Presensi Hari Ini</p>
                                    <p class="font-heading font-extrabold text-lg">Hadir</p>
                                    <p class="text-[10px] text-white/70">Masuk 07:02 · Senin, 17 Okt 2026</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stat Cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">💳</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Aktif</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Saldo E-Money</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">Rp 45.000</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">📝</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Segera</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Tugas Menunggu</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">2 <span class="text-sm font-bold text-slate-500">Tugas</span></p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">📝</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Hari ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Ujian Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">1 <span class="text-sm font-bold text-slate-500">CBT</span></p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-sky-100 grid place-items-center text-sky-700">🏆</span>
                            <span class="text-[11px] font-bold text-sky-700 bg-sky-50 px-2 py-0.5 rounded-full">Semester ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Poin Prestasi</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">85 <span class="text-sm font-bold text-slate-500">Poin</span></p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <!-- LEFT -->
                    <div class="lg:col-span-2 space-y-4">
                        <!-- Jadwal Pelajaran Hari Ini -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="font-heading font-bold text-slate-800">Jadwal Pelajaran Hari Ini</h2>
                                    <p class="text-xs text-slate-400">Senin, 17 Oktober 2026 · Kelas 10-A</p>
                                </div>
                                <button onclick="showView('generic','Kelas Digital')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>

                            <div class="mt-4 space-y-3">
                                <div class="border border-slate-100 rounded-2xl p-4 hover:border-blue-300 transition-colors">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 grid place-items-center font-heading font-extrabold text-sm flex-shrink-0">07:15</div>
                                        <div class="flex-1 min-w-[140px]">
                                            <p class="font-heading font-bold text-slate-800 text-sm">Matematika · Kelas 10-A</p>
                                            <p class="text-xs text-slate-400">Budi Santoso, S.Pd. · Ruang A-201</p>
                                        </div>
                                        <span class="text-[11px] font-bold bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full">Sedang berlangsung</span>
                                    </div>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <button onclick="showToast('success','Bergabung ke kelas Matematika 10-A...')" class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition-colors">🚪 Masuk Kelas</button>
                                        <button onclick="showToast('info','Membuka modul ajar: Fungsi Kuadrat...')" class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-xs font-bold px-3 py-2 rounded-lg transition-colors">📖 Buka Materi</button>
                                    </div>
                                </div>

                                <div class="border border-slate-100 rounded-2xl p-4 hover:border-blue-300 transition-colors">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 grid place-items-center font-heading font-extrabold text-sm flex-shrink-0">09:00</div>
                                        <div class="flex-1 min-w-[140px]">
                                            <p class="font-heading font-bold text-slate-800 text-sm">Bahasa Indonesia · Kelas 10-A</p>
                                            <p class="text-xs text-slate-400">Siti Aminah, M.Pd. · Ruang A-201</p>
                                        </div>
                                        <span class="text-[11px] font-bold bg-slate-200 text-slate-600 px-2.5 py-1 rounded-full">Berikutnya</span>
                                    </div>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <button onclick="showToast('success','Bergabung ke kelas Bahasa Indonesia 10-A...')" class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition-colors">🚪 Masuk Kelas</button>
                                        <button onclick="showToast('info','Membuka modul ajar: Teks Eksposisi...')" class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-xs font-bold px-3 py-2 rounded-lg transition-colors">📖 Buka Materi</button>
                                    </div>
                                </div>

                                <div class="border border-slate-100 rounded-2xl p-4 hover:border-blue-300 transition-colors">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-700 grid place-items-center font-heading font-extrabold text-sm flex-shrink-0">13:00</div>
                                        <div class="flex-1 min-w-[140px]">
                                            <p class="font-heading font-bold text-slate-800 text-sm">Fisika · Kelas 10-A</p>
                                            <p class="text-xs text-slate-400">Andi Wijaya, S.Si. · Lab Fisika</p>
                                        </div>
                                        <span class="text-[11px] font-bold bg-slate-200 text-slate-600 px-2.5 py-1 rounded-full">Siang</span>
                                    </div>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <button onclick="showToast('success','Bergabung ke kelas Fisika 10-A...')" class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition-colors">🚪 Masuk Kelas</button>
                                        <button onclick="showToast('info','Membuka modul ajar: Gerak Lurus...')" class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-xs font-bold px-3 py-2 rounded-lg transition-colors">📖 Buka Materi</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tugas & Deadline Terdekat -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Tugas &amp; Deadline Terdekat</h2>
                                <button onclick="showView('generic','Sentra Pembelajaran')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <div class="mt-4 space-y-3">
                                <div class="flex flex-wrap items-center gap-3 border border-slate-100 rounded-2xl p-4">
                                    <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-lg flex-shrink-0">⏰</span>
                                    <div class="flex-1 min-w-[160px]">
                                        <p class="text-sm font-semibold text-slate-800">Tugas Matematika — Fungsi Kuadrat</p>
                                        <p class="text-xs text-slate-400">Batas: Hari ini, 23:59 · 10 soal uraian</p>
                                    </div>
                                    <span class="text-[11px] font-bold bg-red-100 text-red-800 px-2.5 py-1 rounded-full">Sisa 4 jam</span>
                                    <button onclick="showToast('success','Tugas Matematika berhasil dikirim')" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition-colors">Kerjakan</button>
                                </div>
                                <div class="flex flex-wrap items-center gap-3 border border-slate-100 rounded-2xl p-4">
                                    <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-lg flex-shrink-0">📄</span>
                                    <div class="flex-1 min-w-[160px]">
                                        <p class="text-sm font-semibold text-slate-800">Esai Bahasa Indonesia — Teks Eksposisi</p>
                                        <p class="text-xs text-slate-400">Batas: Besok, 23:59 · 1 esai 500 kata</p>
                                    </div>
                                    <span class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full">Sisa 1 hari</span>
                                    <button onclick="showToast('success','Tugas Bahasa Indonesia berhasil dikirim')" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition-colors">Kerjakan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="space-y-4">
                        <!-- Akses Cepat -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Akses Cepat</h2>
                            <div class="mt-4 grid grid-cols-2 gap-3">
                                <button onclick="showView('cbt','Computer Based Test')" class="flex flex-col items-center gap-2 bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 rounded-2xl p-4 text-xs font-bold transition-colors">
                                    <span class="text-2xl">📝</span> Ujian CBT
                                </button>
                                <button onclick="showToast('info','Membuka Kartu Ujian Digital...')" class="flex flex-col items-center gap-2 bg-white text-slate-700 hover:bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs font-bold transition-colors">
                                    <span class="text-2xl">🎫</span> Kartu Ujian
                                </button>
                                <button onclick="showToast('info','Membuka Perpustakaan Digital...')" class="flex flex-col items-center gap-2 bg-white text-slate-700 hover:bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs font-bold transition-colors">
                                    <span class="text-2xl">📚</span> Perpustakaan
                                </button>
                                <button onclick="showToast('info','Membuka laporan Hafalan Tahfidz...')" class="flex flex-col items-center gap-2 bg-white text-slate-700 hover:bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs font-bold transition-colors">
                                    <span class="text-2xl">🕌</span> Hafalan Tahfidz
                                </button>
                            </div>
                        </div>

                        <!-- Kartu E-Money Digital -->
                        <div class="rounded-2xl emoney-gradient text-white p-5 relative overflow-hidden shadow-sm">
                            <div class="absolute inset-0 grid-pattern"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between">
                                    <p class="text-[11px] font-semibold text-white/80 uppercase tracking-wider">E-Money Siswa</p>
                                    <span class="text-[10px] font-bold bg-white/20 px-2 py-0.5 rounded-full">SIAKAD PLUS</span>
                                </div>
                                <p class="mt-3 text-xs text-white/80">Saldo Tersedia</p>
                                <p class="font-heading font-extrabold text-2xl">Rp 45.000</p>
                                <div class="mt-4 flex items-end justify-between">
                                    <div>
                                        <p class="text-[11px] text-white/80">Keira Faza Aishanaya</p>
                                        <p class="text-[10px] text-white/60">NISN 0071234501 · 10-A</p>
                                    </div>
                                    <div class="w-14 h-14 bg-white rounded-lg grid place-items-center text-slate-900 text-2xl">▦</div>
                                </div>
                            </div>
                        </div>

                        <!-- Pengumuman Terbaru -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Pengumuman Terbaru</h2>
                                <button onclick="showToast('info','Membuka seluruh pengumuman sekolah')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <ul class="mt-4 space-y-3">
                                <li class="flex gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-blue-100 text-blue-700 grid place-items-center flex-shrink-0">📢</span>
                                    <div><p class="text-sm font-medium text-slate-800">Pekan Literasi Sekolah 20–25 Okt</p><p class="text-xs text-slate-400">Humas · 1 jam lalu</p></div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-amber-100 text-amber-700 grid place-items-center flex-shrink-0">📌</span>
                                    <div><p class="text-sm font-medium text-slate-800">Jadwal PTS dimulai 22 Oktober</p><p class="text-xs text-slate-400">Kurikulum · 3 jam lalu</p></div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-700 grid place-items-center flex-shrink-0">🏆</span>
                                    <div><p class="text-sm font-medium text-slate-800">Selamat! Juara 2 Olimpiade Fisika</p><p class="text-xs text-slate-400">Kesiswaan · Kemarin</p></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: CBT ================= -->
            <section id="view-cbt" class="view">

                <!-- Daftar ujian -->
                <div id="cbtList">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Computer Based Test (CBT)</h2>
                        <p class="text-xs text-slate-400">Daftar ujian aktif, jadwal, dan tombol mulai tes.</p>
                    </div>

                    <div class="mt-4 grid md:grid-cols-2 gap-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <span class="text-[11px] font-bold bg-red-100 text-red-800 px-2.5 py-1 rounded-full">● Ujian Aktif</span>
                                    <h3 class="mt-3 font-heading font-bold text-slate-800">PTS Matematika Kelas 10</h3>
                                    <p class="text-xs text-slate-400">40 soal pilihan ganda · 90 menit · Fungsi Kuadrat</p>
                                </div>
                                <span class="text-3xl">📝</span>
                            </div>
                            <div class="mt-4 flex flex-wrap items-center gap-2 text-xs text-slate-500">
                                <span class="bg-slate-100 px-2.5 py-1 rounded-lg">📅 Hari ini, 08:00–09:30</span>
                                <span class="bg-slate-100 px-2.5 py-1 rounded-lg">👨‍🏫 Budi Santoso, S.Pd.</span>
                            </div>
                            <button onclick="startCBT()" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">▶ Mulai Tes</button>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <span class="text-[11px] font-bold bg-slate-200 text-slate-600 px-2.5 py-1 rounded-full">Terjadwal</span>
                                    <h3 class="mt-3 font-heading font-bold text-slate-800">PTS Bahasa Indonesia Kelas 10</h3>
                                    <p class="text-xs text-slate-400">30 soal PG + 5 esai · 90 menit · Teks Eksposisi</p>
                                </div>
                                <span class="text-3xl">📄</span>
                            </div>
                            <div class="mt-4 flex flex-wrap items-center gap-2 text-xs text-slate-500">
                                <span class="bg-slate-100 px-2.5 py-1 rounded-lg">📅 22 Okt 2026, 08:00</span>
                                <span class="bg-slate-100 px-2.5 py-1 rounded-lg">👩‍🏫 Siti Aminah, M.Pd.</span>
                            </div>
                            <button disabled class="mt-4 w-full bg-slate-100 text-slate-400 text-sm font-bold px-4 py-3 rounded-xl cursor-not-allowed">Belum Dibuka</button>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Ketentuan Ujian (Anti-Kecurangan)</h3>
                        <ul class="mt-3 grid sm:grid-cols-2 gap-2 text-sm text-slate-600">
                            <li class="flex items-center gap-2"><span class="text-blue-600">•</span> Timer countdown otomatis berjalan</li>
                            <li class="flex items-center gap-2"><span class="text-blue-600">•</span> Soal &amp; pilihan diacak per siswa</li>
                            <li class="flex items-center gap-2"><span class="text-blue-600">•</span> Mode fullscreen saat tes dimulai</li>
                            <li class="flex items-center gap-2"><span class="text-blue-600">•</span> Terdeteksi keluar layar → peringatan</li>
                        </ul>
                    </div>
                </div>

                <!-- Interface pengerjaan -->
                <div id="cbtTest" class="hidden">
                    <!-- Header test -->
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4 flex flex-wrap items-center gap-3">
                        <div class="flex-1 min-w-[180px]">
                            <p class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Sedang Dikerjakan</p>
                            <h2 class="font-heading font-bold text-slate-800">PTS Matematika Kelas 10</h2>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-2 rounded-lg">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Koneksi Stabil
                            </span>
                            <span id="cbtTimer" class="inline-flex items-center gap-2 text-base font-heading font-extrabold text-white bg-red-500 px-4 py-2 rounded-lg tabular-nums">90:00</span>
                            <button onclick="openFinishModal()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-lg transition-colors">Selesai &amp; Kumpulkan</button>
                        </div>
                    </div>

                    <div class="mt-4 grid lg:grid-cols-3 gap-4 items-start">
                        <!-- Area soal -->
                        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-blue-700 bg-blue-50 px-3 py-1.5 rounded-full">Soal <span id="soalNo">1</span> dari 10</span>
                                <span id="soalFlag" class="hidden text-xs font-bold text-amber-800 bg-amber-100 px-3 py-1.5 rounded-full">🚩 Ditandai ragu-ragu</span>
                            </div>

                            <p class="mt-4 text-sm text-slate-500" id="soalText">Diketahui fungsi kuadrat <i>f(x) = x² − 4x + 3</i>. Titik puncak grafik fungsi tersebut adalah…</p>

                            <div class="mt-4 space-y-2.5" id="soalOptions">
                                <!-- options injected -->
                            </div>

                            <div class="mt-5 flex flex-wrap items-center gap-2">
                                <button onclick="prevSoal()" class="bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">← Sebelumnya</button>
                                <button onclick="toggleRagu()" id="btnRagu" class="bg-amber-50 text-amber-800 hover:bg-amber-100 border border-amber-200 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🚩 Ragu-Ragu</button>
                                <button onclick="nextSoal()" class="ml-auto bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Soal Selanjutnya →</button>
                            </div>
                        </div>

                        <!-- Navigasi soal -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h3 class="font-heading font-bold text-slate-800">Navigasi Soal</h3>
                            <div id="qnavGrid" class="mt-4 grid grid-cols-5 gap-2"></div>
                            <div class="mt-5 space-y-2 text-xs text-slate-600">
                                <div class="flex items-center gap-2"><span class="w-4 h-4 rounded bg-emerald-500"></span> Sudah dijawab</div>
                                <div class="flex items-center gap-2"><span class="w-4 h-4 rounded bg-amber-500"></span> Ragu-ragu</div>
                                <div class="flex items-center gap-2"><span class="w-4 h-4 rounded border border-slate-300 bg-white"></span> Belum dijawab</div>
                            </div>
                            <div class="mt-5 pt-4 border-t border-slate-100 text-sm">
                                <div class="flex justify-between"><span class="text-slate-500">Terjawab</span><span id="statAnswered" class="font-bold text-slate-800">0</span></div>
                                <div class="flex justify-between mt-1"><span class="text-slate-500">Ragu-ragu</span><span id="statRagu" class="font-bold text-slate-800">0</span></div>
                                <div class="flex justify-between mt-1"><span class="text-slate-500">Belum</span><span id="statEmpty" class="font-bold text-slate-800">10</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: HASIL INSTAN ================= -->
            <section id="view-hasil" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Hasil Instan</h2>
                    <p class="text-xs text-slate-400">Skor ujian, analisis jawaban, dan pembahasan soal.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4 items-start">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 text-center">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Skor Akhir</p>
                        <div class="mt-3 relative w-32 h-32 mx-auto">
                            <div class="w-32 h-32 rounded-full" style="background: conic-gradient(#10B981 0 85%, #e2e8f0 85% 100%);"></div>
                            <div class="absolute inset-3 bg-white rounded-full grid place-items-center">
                                <div>
                                    <p class="font-heading font-extrabold text-3xl text-slate-900">85</p>
                                    <p class="text-[11px] text-slate-400">dari 100</p>
                                </div>
                            </div>
                        </div>
                        <span class="mt-4 inline-block text-xs font-bold bg-emerald-100 text-emerald-800 px-3 py-1.5 rounded-full">✓ Lulus (KKM 75)</span>
                        <div class="mt-5 grid grid-cols-2 gap-3 text-sm">
                            <div class="bg-emerald-50 rounded-xl p-3"><p class="font-heading font-extrabold text-emerald-700 text-lg">8</p><p class="text-[11px] text-slate-500">Benar</p></div>
                            <div class="bg-red-50 rounded-xl p-3"><p class="font-heading font-extrabold text-red-700 text-lg">2</p><p class="text-[11px] text-slate-500">Salah</p></div>
                        </div>
                        <button onclick="showView('cbt','Computer Based Test')" class="mt-5 w-full bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-sm font-bold px-4 py-3 rounded-xl transition-colors">Kembali ke Daftar Ujian</button>
                    </div>

                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Analisis Jawaban &amp; Pembahasan</h3>
                        <div class="mt-4 space-y-3">
                            <div class="border border-emerald-200 bg-emerald-50/50 rounded-2xl p-4">
                                <div class="flex items-start gap-2">
                                    <span class="text-[11px] font-bold bg-emerald-500 text-white px-2 py-0.5 rounded-full flex-shrink-0">BENAR · 1</span>
                                    <p class="text-sm font-semibold text-slate-800">Titik puncak <i>f(x) = x² − 4x + 3</i> adalah…</p>
                                </div>
                                <p class="mt-2 text-xs text-emerald-800">Jawabanmu: <b>A. (2, −1)</b> — Benar. x<sub>p</sub>=−b/2a=2; y<sub>p</sub>=−1.</p>
                            </div>
                            <div class="border border-red-200 bg-red-50/50 rounded-2xl p-4">
                                <div class="flex items-start gap-2">
                                    <span class="text-[11px] font-bold bg-red-500 text-white px-2 py-0.5 rounded-full flex-shrink-0">SALAH · 2</span>
                                    <p class="text-sm font-semibold text-slate-800">Grafik memotong sumbu-X di titik…</p>
                                </div>
                                <p class="mt-2 text-xs text-slate-600">Jawabanmu: <b>C. (1,0) dan (−3,0)</b> · Kunci: <b>A. (1,0) dan (3,0)</b></p>
                                <p class="mt-1 text-xs text-red-700">Pembahasan: faktorkan (x−1)(x−3)=0 → x=1 atau 3.</p>
                            </div>
                            <div class="border border-emerald-200 bg-emerald-50/50 rounded-2xl p-4">
                                <div class="flex items-start gap-2">
                                    <span class="text-[11px] font-bold bg-emerald-500 text-white px-2 py-0.5 rounded-full flex-shrink-0">BENAR · 3</span>
                                    <p class="text-sm font-semibold text-slate-800">Nilai diskriminan <i>f(x) = x² − 4x + 3</i> adalah…</p>
                                </div>
                                <p class="mt-2 text-xs text-emerald-800">Jawabanmu: <b>B. 4</b> — Benar. D=b²−4ac=16−12=4.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: E-MONEY ================= -->
            <section id="view-emoney" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Saldo E-Money &amp; E-Canteen</h2>
                    <p class="text-xs text-slate-400">Kartu E-Money digital, saldo, limit jajan, dan riwayat transaksi kantin.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4 items-start">
                    <!-- Kartu -->
                    <div class="rounded-3xl emoney-gradient text-white p-6 relative overflow-hidden shadow-sm">
                        <div class="absolute inset-0 grid-pattern"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between">
                                <p class="text-[11px] font-semibold text-white/80 uppercase tracking-wider">E-Money Card</p>
                                <span class="text-[10px] font-bold bg-white/20 px-2 py-0.5 rounded-full">SIAKAD PLUS</span>
                            </div>
                            <p class="mt-5 text-xs text-white/80">Saldo Utama</p>
                            <p class="font-heading font-extrabold text-3xl">Rp 45.000</p>
                            <div class="mt-6 flex items-end justify-between">
                                <div>
                                    <p class="text-sm font-bold">Keira Faza Aishanaya</p>
                                    <p class="text-[11px] text-white/70">NISN 0071234501 · Kelas 10-A</p>
                                </div>
                                <div class="w-16 h-16 bg-white rounded-xl grid place-items-center text-slate-900 text-3xl">▦</div>
                            </div>
                        </div>
                    </div>

                    <!-- Info saldo & aksi -->
                    <div class="lg:col-span-2 space-y-4">
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                                <p class="text-xs text-slate-500 font-semibold">Limit Jajan Harian</p>
                                <p class="font-heading font-extrabold text-lg text-slate-900">Rp 20.000</p>
                                <p class="text-[11px] text-slate-400">Terpakai Rp 8.000</p>
                            </div>
                            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                                <p class="text-xs text-slate-500 font-semibold">Top-Up Bulan Ini</p>
                                <p class="font-heading font-extrabold text-lg text-slate-900">Rp 150.000</p>
                                <p class="text-[11px] text-slate-400">3 transaksi</p>
                            </div>
                            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4 col-span-2 sm:col-span-1">
                                <p class="text-xs text-slate-500 font-semibold">Tabungan Siswa</p>
                                <p class="font-heading font-extrabold text-lg text-slate-900">Rp 320.000</p>
                                <p class="text-[11px] text-emerald-700 font-semibold">+ Rp 50.000/bln</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4 flex flex-wrap gap-2">
                            <button onclick="openTopup()" class="flex-1 min-w-[140px] bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">＋ Top-Up Saldo</button>
                            <button onclick="showToast('info','Mengatur limit jajan harian...')" class="flex-1 min-w-[140px] bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-sm font-bold px-4 py-3 rounded-xl transition-colors">⚙ Atur Limit Jajan</button>
                            <button onclick="showToast('info','Membuka histori tabungan...')" class="flex-1 min-w-[140px] bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 text-sm font-bold px-4 py-3 rounded-xl transition-colors">🏦 Tabungan</button>
                        </div>
                    </div>
                </div>

                <!-- Riwayat transaksi -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Riwayat Transaksi</h3>
                        <span class="text-xs text-slate-400">10 transaksi terakhir</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[720px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Tanggal / Jam</th>
                                    <th class="px-4 py-3">Tenant / Item</th>
                                    <th class="px-4 py-3">Jenis</th>
                                    <th class="px-4 py-3 text-right">Nominal</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="trxBody" class="divide-y divide-slate-50">
                                <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="trxEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🧾</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada transaksi</p>
                        <p class="text-sm text-slate-400">Transaksi kantin &amp; pembelian buku akan tampil di sini.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: MATA PELAJARAN ================= -->
            <section id="view-mata-pelajaran" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Mata Pelajaran Digital</h2><p class="text-xs text-slate-400">Daftar mata pelajaran dan materi yang tersedia.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Mata Pelajaran</th><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Jumlah Materi</th><th class="px-4 py-3">Tugas Aktif</th><th class="px-4 py-3">Nilai Terakhir</th></tr></thead><tbody id="mata-pelajaranBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KELAS DIGITAL ================= -->
            <section id="view-kelas-digital" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Kelas Digital</h2><p class="text-xs text-slate-400">Ruang kelas daring dan info wali kelas.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Wali Kelas</th><th class="px-4 py-3">Jumlah Siswa</th><th class="px-4 py-3">Jadwal</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="kelas-digitalBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: VIDEO CONFERENCE ================= -->
            <section id="view-video-conference" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Video Conference Kelas</h2><p class="text-xs text-slate-400">Jadwal kelas daring bersama guru.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Bergabung ke ruang kelas daring...')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">🎥 Gabung Sesi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Topik</th><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Jadwal</th><th class="px-4 py-3">Platform</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="video-conferenceBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: SENTRA PEMBELAJARAN ================= -->
            <section id="view-sentra-pembelajaran" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Sentra Pembelajaran</h2><p class="text-xs text-slate-400">Modul belajar terstruktur per sentra.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Sentra</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Materi</th><th class="px-4 py-3">Progres</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="sentra-pembelajaranBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PERPUSTAKAAN ================= -->
            <section id="view-perpustakaan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Perpustakaan Digital</h2><p class="text-xs text-slate-400">Koleksi buku dan referensi digital.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Fitur pencarian buku dibuka')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">🔍 Cari Buku</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Judul</th><th class="px-4 py-3">Penulis</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Ketersediaan</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="perpustakaanBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PUSAT UNDUH ================= -->
            <section id="view-pusat-unduh" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pusat Unduh</h2><p class="text-xs text-slate-400">Unduh berkas dan dokumen pendukung belajar.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Dokumen</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Ukuran</th><th class="px-4 py-3">Format</th><th class="px-4 py-3">Tanggal</th></tr></thead><tbody id="pusat-unduhBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: TABUNGAN ================= -->
            <section id="view-tabungan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Tabungan Siswa</h2><p class="text-xs text-slate-400">Riwayat setoran dan penarikan tabungan.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Pengajuan setoran dicatat (simulasi)')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Setor Tabungan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Keterangan</th><th class="px-4 py-3">Debit</th><th class="px-4 py-3">Kredit</th><th class="px-4 py-3">Saldo</th></tr></thead><tbody id="tabunganBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PENGUMUMAN ================= -->
            <section id="view-pengumuman" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pengumuman Sekolah</h2><p class="text-xs text-slate-400">Informasi resmi dari sekolah.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Judul</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Sumber</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="pengumumanBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: LAPORAN KEHADIRAN ================= -->
            <section id="view-laporan-kehadiran" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan Kehadiran</h2><p class="text-xs text-slate-400">Rekap kehadiran per bulan.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Bulan</th><th class="px-4 py-3">Hadir</th><th class="px-4 py-3">Izin</th><th class="px-4 py-3">Sakit</th><th class="px-4 py-3">Alpa</th><th class="px-4 py-3">Persentase</th></tr></thead><tbody id="laporan-kehadiranBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: CHAT INTERNAL ================= -->
            <section id="view-chat-internal" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Chat Internal</h2><p class="text-xs text-slate-400">Percakapan dengan guru dan teman.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Pesan terkirim')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Pesan Baru</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Pengirim</th><th class="px-4 py-3">Peran</th><th class="px-4 py-3">Pesan Terakhir</th><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="chat-internalBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: EDUTAINMENT ================= -->
            <section id="view-edutainment" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Edutainment</h2><p class="text-xs text-slate-400">Belajar sambil bermain: kuis, video, dan game edukasi.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Konten</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Durasi</th><th class="px-4 py-3">Progres</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="edutainmentBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: POIN KEDISIPLINAN ================= -->
            <section id="view-poin-kedisiplinan" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Poin Kedisiplinan</h2><p class="text-xs text-slate-400">Riwayat poin apresiasi dan pelanggaran.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Kejadian</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Poin</th><th class="px-4 py-3">Total</th></tr></thead><tbody id="poin-kedisiplinanBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: TAHFIDZ ================= -->
            <section id="view-tahfidz" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Tahfidz &amp; Tahsin</h2><p class="text-xs text-slate-400">Riwayat setoran hafalan dan penilaian.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Juz</th><th class="px-4 py-3">Surah</th><th class="px-4 py-3">Setoran</th><th class="px-4 py-3">Penilaian</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="tahfidzBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: EKSTRAKURIKULER ================= -->
            <section id="view-ekstrakurikuler" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Ekstrakurikuler</h2><p class="text-xs text-slate-400">Kegiatan ekstrakurikuler yang diikuti.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Ekstrakurikuler</th><th class="px-4 py-3">Pembina</th><th class="px-4 py-3">Jadwal</th><th class="px-4 py-3">Kehadiran</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="ekstrakurikulerBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KARTU UJIAN ================= -->
            <section id="view-kartu-ujian" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Kartu Ujian Digital</h2><p class="text-xs text-slate-400">Kartu peserta ujian yang dapat diunduh.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Mengunduh kartu ujian...')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Unduh Kartu</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Ujian</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Ruang</th><th class="px-4 py-3">No. Peserta</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="kartu-ujianBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PORTOFOLIO ================= -->
            <section id="view-portofolio" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Portofolio Prestasi</h2><p class="text-xs text-slate-400">Kumpulan prestasi akademik dan non-akademik.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Prestasi baru ditambahkan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Tambah Prestasi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Prestasi</th><th class="px-4 py-3">Bidang</th><th class="px-4 py-3">Tingkat</th><th class="px-4 py-3">Tahun</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="portofolioBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GENERIC / EMPTY STATE ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧩</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal Murid. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Dashboard Murid</span>, <span class="font-semibold text-slate-600">Computer Based Test</span>, <span class="font-semibold text-slate-600">Hasil Instan</span>, dan <span class="font-semibold text-slate-600">Saldo E-Money</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard Murid')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('cbt','Computer Based Test')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke CBT</button>
                        <button onclick="showView('emoney','Saldo E-Money')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke E-Money</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="px-4 sm:px-6 py-4 text-center text-xs text-slate-400 border-t border-slate-200">
            © 2026 PT Artificial Intelligence Learning Madani Digital · Portal Murid (Simulasi)
        </footer>
    </div>

    <!-- ============ MODAL: KONFIRMASI SELESAI UJIAN ============ -->
    <div id="finishModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeFinishModal()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 grid place-items-center text-xl">⚠️</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Selesai &amp; Kumpulkan?</h3><p class="text-xs text-slate-400">Pastikan semua soal sudah dijawab.</p></div>
            </div>
            <div class="mt-4 bg-slate-50 rounded-2xl p-4 text-sm text-slate-600 space-y-1">
                <p>Terjawab: <span id="finishAnswered" class="font-bold text-slate-800">0</span> dari 10</p>
                <p>Ragu-ragu: <span id="finishRagu" class="font-bold text-slate-800">0</span></p>
                <p class="text-xs text-amber-700">Jawaban tidak dapat diubah setelah dikumpulkan.</p>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closeFinishModal()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Periksa Lagi</button>
                <button onclick="submitCBT()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ya, Kumpulkan</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: TOP-UP ============ -->
    <div id="topupModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeTopup()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-emerald-100 text-emerald-700 grid place-items-center text-xl">💳</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Top-Up Saldo E-Money</h3><p class="text-xs text-slate-400">Pilih nominal top-up saldo.</p></div>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-2">
                <button onclick="doTopup('20.000')" class="bg-slate-100 hover:bg-emerald-100 border border-slate-200 text-sm font-bold text-slate-700 py-3 rounded-xl transition-colors">Rp 20.000</button>
                <button onclick="doTopup('50.000')" class="bg-slate-100 hover:bg-emerald-100 border border-slate-200 text-sm font-bold text-slate-700 py-3 rounded-xl transition-colors">Rp 50.000</button>
                <button onclick="doTopup('100.000')" class="bg-slate-100 hover:bg-emerald-100 border border-slate-200 text-sm font-bold text-slate-700 py-3 rounded-xl transition-colors">Rp 100.000</button>
            </div>
            <div class="mt-4">
                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nominal Lain</label>
                <input id="topupInput" type="text" placeholder="Contoh: 75000" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closeTopup()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="doTopup()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Top-Up</button>
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

            if (name === 'emoney') loadTrx();
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

        // ---------- CBT ----------
        const soalData = [
            { q: 'Diketahui fungsi kuadrat <i>f(x) = x² − 4x + 3</i>. Titik puncak grafik fungsi tersebut adalah…', o: ['(2, −1)', '(−2, 1)', '(2, 1)', '(1, −2)', '(0, 3)'] },
            { q: 'Grafik <i>f(x) = x² − 4x + 3</i> memotong sumbu-X di titik…', o: ['(1,0) dan (3,0)', '(−1,0) dan (−3,0)', '(1,0) dan (−3,0)', '(0,1) dan (0,3)', '(2,0) dan (2,0)'] },
            { q: 'Nilai diskriminan dari <i>f(x) = x² − 4x + 3</i> adalah…', o: ['2', '4', '8', '−4', '16'] },
            { q: 'Jika <i>f(x) = x² − 4x + 3</i>, maka nilai <i>f(0)</i> adalah…', o: ['0', '1', '3', '−3', '4'] },
            { q: 'Sumbu simetri grafik <i>f(x) = x² − 4x + 3</i> adalah…', o: ['x = 2', 'x = −2', 'x = 4', 'x = 1', 'x = 3'] },
            { q: 'Grafik <i>f(x) = x² − 4x + 3</i> terbuka ke…', o: ['Atas', 'Bawah', 'Kanan', 'Kiri', 'Tidak beraturan'] },
            { q: 'Nilai minimum fungsi <i>f(x) = x² − 4x + 3</i> adalah…', o: ['−1', '1', '3', '−3', '0'] },
            { q: 'Bentuk faktor dari <i>x² − 4x + 3</i> adalah…', o: ['(x−1)(x−3)', '(x+1)(x+3)', '(x−1)(x+3)', '(x+1)(x−3)', '(x−2)(x−2)'] },
            { q: 'Titik potong grafik <i>f(x) = x² − 4x + 3</i> dengan sumbu-Y adalah…', o: ['(0,3)', '(3,0)', '(0,−3)', '(0,0)', '(0,4)'] },
            { q: 'Akar-akar dari <i>x² − 4x + 3 = 0</i> adalah…', o: ['x = 1 dan x = 3', 'x = −1 dan x = −3', 'x = 2 dan x = 3', 'x = 1 dan x = −3', 'x = −1 dan x = 3'] }
        ];
        const letters = ['A', 'B', 'C', 'D', 'E'];
        let curSoal = 0;
        let cbtTimerId = null;
        let cbtSeconds = 90 * 60;
        const answers = {};
        const ragu = {};

        function startCBT() {
            document.getElementById('cbtList').classList.add('hidden');
            document.getElementById('cbtTest').classList.remove('hidden');
            document.getElementById('pageTitle').textContent = 'Ujian CBT Berlangsung';
            cbtSeconds = 90 * 60;
            renderQnav();
            renderSoal();
            updateCBTStats();
            startTimer();
            showToast('success', 'Ujian dimulai. Semoga sukses!');
            try { document.documentElement.requestFullscreen && document.documentElement.requestFullscreen(); } catch (e) {}
        }

        function startTimer() {
            if (cbtTimerId) clearInterval(cbtTimerId);
            const tick = () => {
                if (cbtSeconds <= 0) { clearInterval(cbtTimerId); submitCBT(); return; }
                cbtSeconds--;
                const m = String(Math.floor(cbtSeconds / 60)).padStart(2, '0');
                const s = String(cbtSeconds % 60).padStart(2, '0');
                const el = document.getElementById('cbtTimer');
                el.textContent = m + ':' + s;
                el.className = 'inline-flex items-center gap-2 text-base font-heading font-extrabold text-white px-4 py-2 rounded-lg tabular-nums ' + (cbtSeconds <= 300 ? 'bg-red-600 animate-pulse' : cbtSeconds <= 900 ? 'bg-amber-500' : 'bg-red-500');
            };
            tick();
            cbtTimerId = setInterval(tick, 1000);
        }

        function renderSoal() {
            const s = soalData[curSoal];
            document.getElementById('soalNo').textContent = curSoal + 1;
            document.getElementById('soalText').innerHTML = s.q;
            const box = document.getElementById('soalOptions');
            box.innerHTML = s.o.map((opt, i) => {
                const checked = answers[curSoal] === letters[i] ? 'checked' : '';
                return '<label class="opt flex items-center gap-3 border-2 border-slate-200 rounded-xl px-4 py-3 cursor-pointer hover:border-blue-300 transition-colors">'
                    + '<input type="radio" name="opt" class="accent-blue-600" ' + checked + ' onchange="selectAnswer(\'' + letters[i] + '\')">'
                    + '<span class="w-7 h-7 rounded-lg bg-slate-100 grid place-items-center text-xs font-bold text-slate-600">' + letters[i] + '</span>'
                    + '<span class="text-sm text-slate-700">' + opt + '</span></label>';
            }).join('');
            document.getElementById('soalFlag').classList.toggle('hidden', !ragu[curSoal]);
            const btn = document.getElementById('btnRagu');
            btn.textContent = ragu[curSoal] ? '🚩 Batal Ragu' : '🚩 Ragu-Ragu';
            renderQnav();
        }

        function renderQnav() {
            const grid = document.getElementById('qnavGrid');
            grid.innerHTML = soalData.map((s, i) => {
                let cls = 'bg-white border border-slate-300 text-slate-500';
                if (answers[i]) cls = 'qnav answered';
                else if (ragu[i]) cls = 'qnav ragu';
                if (i === curSoal) cls += ' current';
                return '<button onclick="gotoSoal(' + i + ')" class="qnav ' + cls + ' rounded-lg grid place-items-center text-sm font-bold transition-colors">' + (i + 1) + '</button>';
            }).join('');
        }

        function selectAnswer(letter) { answers[curSoal] = letter; renderQnav(); updateCBTStats(); }
        function toggleRagu() { ragu[curSoal] = !ragu[curSoal]; renderSoal(); updateCBTStats(); }
        function gotoSoal(i) { curSoal = i; renderSoal(); }
        function nextSoal() { if (curSoal < soalData.length - 1) { curSoal++; renderSoal(); } else { showToast('info', 'Ini soal terakhir. Periksa lalu kumpulkan.'); } }
        function prevSoal() { if (curSoal > 0) { curSoal--; renderSoal(); } }

        function updateCBTStats() {
            const a = Object.keys(answers).length;
            const r = Object.keys(ragu).filter(k => ragu[k]).length;
            document.getElementById('statAnswered').textContent = a;
            document.getElementById('statRagu').textContent = r;
            document.getElementById('statEmpty').textContent = soalData.length - a;
        }

        function openFinishModal() {
            document.getElementById('finishAnswered').textContent = Object.keys(answers).length;
            document.getElementById('finishRagu').textContent = Object.keys(ragu).filter(k => ragu[k]).length;
            const m = document.getElementById('finishModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeFinishModal() { const m = document.getElementById('finishModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function submitCBT() {
            if (cbtTimerId) clearInterval(cbtTimerId);
            closeFinishModal();
            document.getElementById('cbtTest').classList.add('hidden');
            document.getElementById('cbtList').classList.remove('hidden');
            resetCBT();
            showView('hasil', 'Hasil Instan');
            showToast('success', 'Jawaban terkirim! Nilai muncul otomatis.');
        }

        function resetCBT() {
            curSoal = 0;
            Object.keys(answers).forEach(k => delete answers[k]);
            Object.keys(ragu).forEach(k => delete ragu[k]);
            document.getElementById('soalOptions').innerHTML = '';
        }

        // ---------- E-Money ----------
        const trxData = [
            { tgl: '17 Okt 2026', jam: '09:12', tenant: 'Kantin Bu Sari — Nasi Ayam', jenis: 'Debit', nom: '- Rp 8.000', status: 'Berhasil' },
            { tgl: '17 Okt 2026', jam: '07:45', tenant: 'Koperasi — Buku Tulis', jenis: 'Debit', nom: '- Rp 12.000', status: 'Berhasil' },
            { tgl: '16 Okt 2026', jam: '14:20', tenant: 'Top-Up (Orang Tua)', jenis: 'Kredit', nom: '+ Rp 50.000', status: 'Berhasil' },
            { tgl: '16 Okt 2026', jam: '09:30', tenant: 'Kantin Bu Sari — Susu', jenis: 'Debit', nom: '- Rp 5.000', status: 'Berhasil' },
            { tgl: '15 Okt 2026', jam: '12:05', tenant: 'Koperasi — Alat Tulis', jenis: 'Debit', nom: '- Rp 7.500', status: 'Pending' },
            { tgl: '14 Okt 2026', jam: '10:00', tenant: 'Top-Up (Orang Tua)', jenis: 'Kredit', nom: '+ Rp 50.000', status: 'Berhasil' }
        ];
        let trxLoaded = false;
        function loadTrx() {
            if (trxLoaded) return;
            const body = document.getElementById('trxBody');
            setTimeout(() => {
                body.innerHTML = trxData.map(r => {
                    const debit = r.jenis === 'Debit';
                    const badge = r.status === 'Berhasil' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800';
                    return '<tr class="hover:bg-slate-50/70">'
                        + '<td class="px-4 py-3 text-slate-500"><span class="font-semibold text-slate-700">' + r.tgl + '</span><br><span class="text-xs">' + r.jam + '</span></td>'
                        + '<td class="px-4 py-3 font-semibold text-slate-700">' + r.tenant + '</td>'
                        + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (debit ? 'bg-slate-100 text-slate-600' : 'bg-blue-50 text-blue-700') + ' px-2.5 py-1 rounded-full">' + r.jenis + '</span></td>'
                        + '<td class="px-4 py-3 text-right font-heading font-extrabold ' + (debit ? 'text-slate-800' : 'text-emerald-700') + '">' + r.nom + '</td>'
                        + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + badge + ' px-2.5 py-1 rounded-full">' + r.status + '</span></td>'
                        + '</tr>';
                }).join('');
                trxLoaded = true;
                showToast('success', 'Riwayat transaksi dimuat');
            }, 700);
        }

        function openTopup() { const m = document.getElementById('topupModal'); m.classList.remove('hidden'); m.classList.add('flex'); }
        function closeTopup() { const m = document.getElementById('topupModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function doTopup(val) {
            const inp = document.getElementById('topupInput').value.trim();
            const nominal = val || inp;
            closeTopup();
            if (!nominal) { showToast('warning', 'Masukkan nominal top-up terlebih dahulu'); return; }
            showToast('success', 'Permintaan top-up Rp ' + nominal + ' dikirim ke orang tua');
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
            'mata-pelajaran': [
                ['Matematika', 'Ibu Ratna, S.Pd.', '12', '2', '88'],
                ['Bahasa Indonesia', 'Bpk. Andi, M.Pd.', '10', '1', '85'],
                ['IPA', 'Ibu Dewi, S.Si.', '14', '3', '82'],
                ['Bahasa Inggris', 'Ibu Sari, S.Pd.', '9', '0', '90']
            ],
            'kelas-digital': [
                ['X-A', 'Rina, M.Pd.', '32', 'Senin - Jumat', '~Aktif'],
                ['Ruang Virtual A', '—', '32', 'Google Classroom', '~Aktif'],
                ['Kelas Daring', '—', '32', 'Zoom / Meet', '~Aktif']
            ],
            'video-conference': [
                ['Review Limit Fungsi', 'Ibu Ratna', '20 Okt 09:00', 'Zoom', '~Menunggu'],
                ['Kelas Online Turunan', 'Ibu Ratna', '21 Okt 10:00', 'Google Meet', '~Selesai'],
                ['Tanya Jawab PTS', 'Bpk. Andi', '22 Okt 13:00', 'Zoom', '~Selesai']
            ],
            'sentra-pembelajaran': [
                ['Sentra Literasi', 'Bahasa Indonesia', '8 modul', '75%', '~Aktif'],
                ['Sentra Numerasi', 'Matematika', '10 modul', '60%', '~Aktif'],
                ['Sentra Sains', 'IPA', '6 modul', '40%', '~Menunggu']
            ],
            'perpustakaan': [
                ['Laskar Pelangi', 'Andrea Hirata', 'Novel', 'Tersedia', '~Aktif'],
                ['Matematika Dasar', 'Tim Edukasi', 'Pelajaran', 'Dipinjam', '~Menunggu'],
                ['Ensiklopedia Sains', 'Tim Sains', 'Referensi', 'Tersedia', '~Aktif']
            ],
            'pusat-unduh': [
                ['Jadwal Pelajaran Ganjil', 'Akademik', '0.5 MB', 'PDF', '01 Agu 2026'],
                ['Modul Matematika Bab 3', 'Pelajaran', '1.1 MB', 'PDF', '10 Agu 2026'],
                ['Kalender Akademik', 'Akademik', '0.8 MB', 'PDF', '01 Agu 2026'],
                ['Kartu Ujian PTS', 'Ujian', '0.3 MB', 'PDF', '15 Sep 2026']
            ],
            'tabungan': [
                ['01 Okt 2026', 'Setoran tabungan', 'Rp 100.000', '—', 'Rp 450.000'],
                ['08 Okt 2026', 'Penarikan', '—', 'Rp 50.000', 'Rp 400.000'],
                ['15 Okt 2026', 'Setoran tabungan', 'Rp 100.000', '—', 'Rp 500.000']
            ],
            'pengumuman': [
                ['Persiapan PTS Ganjil', 'Akademik', '18 Okt 2026', 'Sekolah', '~Terverifikasi'],
                ['Libur Maulid Nabi', 'Umum', '16 Okt 2026', 'Sekolah', '~Terverifikasi'],
                ['Upacara Bendera Senin', 'Umum', '15 Okt 2026', 'Sekolah', '~Draft']
            ],
            'laporan-kehadiran': [
                ['September 2026', '22', '1', '0', '0', '96%'],
                ['Oktober 2026', '15', '0', '1', '0', '94%'],
                ['Agustus 2026', '24', '0', '0', '1', '96%']
            ],
            'chat-internal': [
                ['Ibu Ratna', 'Guru', 'Jangan lupa tugas dikumpulkan', '09:20', '~Aktif'],
                ['Wali Kelas', 'Guru', 'Nilai PTS sudah keluar', '08:45', '~Aktif'],
                ['Budi', 'Teman', 'Besok bawa buku IPA ya', 'Kemarin', '~Selesai']
            ],
            'edutainment': [
                ['Kuis Matematika Seru', 'Kuis', '10 menit', '100%', '~Selesai'],
                ['Video Sains Interaktif', 'Video', '15 menit', '60%', '~Menunggu'],
                ['Teka-teki Logika', 'Game', '8 menit', '30%', '~Menunggu']
            ],
            'poin-kedisiplinan': [
                ['15 Okt 2026', 'Membantu teman', 'Apresiasi', '+5', '25'],
                ['16 Okt 2026', 'Terlambat masuk', 'Pelanggaran', '-10', '15'],
                ['18 Okt 2026', 'Aktif di kelas', 'Apresiasi', '+5', '20']
            ],
            'tahfidz': [
                ['15 Okt', '30', 'An-Naba', '2 halaman', 'A', '~Selesai'],
                ['17 Okt', '30', 'Al-Mulk', '1 halaman', 'B', '~Selesai'],
                ['18 Okt', '29', 'Yasin', '3 halaman', 'A', '~Menunggu']
            ],
            'ekstrakurikuler': [
                ['Pramuka', 'Bpk. Andi', 'Jumat 15:00', '90%', '~Aktif'],
                ['Rohis', 'Ibu Siti', 'Kamis 15:00', '85%', '~Aktif'],
                ['Futsal', 'Bpk. Yusuf', 'Sabtu 08:00', '80%', '~Aktif']
            ],
            'kartu-ujian': [
                ['PTS Ganjil', 'Matematika', '21 Okt 2026', 'R-101', '2026-001', '~Terverifikasi'],
                ['PTS Ganjil', 'B. Indonesia', '22 Okt 2026', 'R-102', '2026-001', '~Terverifikasi'],
                ['PAS Ganjil', 'Matematika', '05 Des 2026', 'R-101', '2026-001', '~Draft']
            ],
            'portofolio': [
                ['Juara 1 OSN Matematika', 'Akademik', 'Kabupaten', '2026', '~Terverifikasi'],
                ['Juara 2 Lomba Pidato', 'Non-Akademik', 'Kecamatan', '2025', '~Terverifikasi'],
                ['Finalis Cerdas Cermat', 'Akademik', 'Provinsi', '2026', '~Menunggu']
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
            const colors = { success: 'bg-emerald-600', error: 'bg-red-500', info: 'bg-blue-600', warning: 'bg-amber-500' };
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
