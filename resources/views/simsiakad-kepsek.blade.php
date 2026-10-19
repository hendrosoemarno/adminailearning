<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Kepala Sekolah &amp; Yayasan · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal Kepala Sekolah & Yayasan SIAKAD PLUS — pengawasan, evaluasi, dan pengambilan keputusan berbasis data: Dashboard Executive, Monitoring Akademik & KBM, Laporan Transparansi Keuangan, Supervisi & Evaluasi Guru, serta Audit Trail & Keamanan.">
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
        .accent { accent-color: #1E40AF; }
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
                <p class="text-[10px] text-slate-500">Kepala Sekolah · Yayasan</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Scrollable nav -->
        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <!-- Dashboard Executive -->
            <button data-view="dashboard" class="menu-item active w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>📊</span> <span class="flex-1 text-left">Dashboard Executive</span>
            </button>

            <!-- 1. Monitoring Akademik & KBM -->
            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🎓</span><span class="flex-1 text-left">Monitoring Akademik &amp; KBM</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="ketercapaian-kurikulum" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Ketercapaian Kurikulum</button>
                    <button data-view="jurnal-kepsek" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Jurnal Mengajar Guru</button>
                    <button data-view="jadwal-kepsek" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Jadwal Pelajaran Harian</button>
                    <button data-view="kehadiran-guru" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kehadiran Guru di Kelas</button>
                </div>
            </div>

            <!-- 2. Laporan Transparansi Keuangan -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📈</span><span class="flex-1 text-left">Transparansi Keuangan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="rekap-spp-kepsek" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekapitulasi SPP</button>
                    <button data-view="pemasukan-pengeluaran" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pemasukan &amp; Pengeluaran</button>
                    <button data-view="tunggakan-siswa" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tunggakan Siswa</button>
                    <button data-view="neraca-kas" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Neraca Kas Real-time</button>
                </div>
            </div>

            <!-- 3. Supervisi & Evaluasi Guru -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🧑‍🏫</span><span class="flex-1 text-left">Supervisi &amp; Evaluasi</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="rekap-kinerja-guru" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekapitulasi Kinerja Guru</button>
                    <button data-view="presensi-staf" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Presensi Staf / HRD</button>
                    <button data-view="catatan-supervisi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Catatan Supervisi</button>
                </div>
            </div>

            <!-- 4. Audit Trail & Keamanan -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🔐</span><span class="flex-1 text-left">Audit Trail &amp; Keamanan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="log-aktivitas" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Log Aktivitas Pengguna</button>
                    <button data-view="keamanan-data" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Keamanan Data &amp; Hak Akses</button>
                </div>
            </div>

        </nav>

        <!-- Sidebar footer -->
        <div class="p-3 border-t border-white/10 flex-shrink-0">
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
                <div class="leading-tight min-w-0">
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Kepala Sekolah · Yayasan</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard Executive</h1>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <!-- Periode -->
                    <div class="hidden md:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Tahun Pelajaran</p>
                            <p class="text-sm font-heading font-extrabold text-navy">2026/2027</p>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 rounded-full">● Semua Sistem Normal</span>
                    </div>
                    <!-- Notif -->
                    <button onclick="showView('audit','Log Aktivitas Pengguna Sistem')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Profile -->
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">KS</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Dr. Hendro Suprapto, M.Pd.</p>
                            <p class="text-[10px] text-slate-400">Kepala Sekolah</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-4 sm:p-6">

            <!-- ================= VIEW: DASHBOARD EXECUTIVE ================= -->
            <section id="view-dashboard" class="view active">

                <!-- Header banner -->
                <div class="rounded-3xl hero-gradient text-white p-5 sm:p-6 relative overflow-hidden">
                    <div class="absolute inset-0 grid-pattern"></div>
                    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center gap-4">
                        <div>
                            <p class="text-sm text-white/85">Selamat pagi, Kepala Sekolah 👋</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">Ringkasan Operasional Sekolah</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">SMAN 1 Nusantara</span>
                                <span class="bg-emerald2 px-2.5 py-1 rounded-full text-white">● Data real-time per 09:45</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('keuangan','Rekapitulasi Pembayaran SPP')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">📈 Laporan Keuangan</button>
                            <button onclick="showView('supervisi','Rekapitulasi Kinerja Guru')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🧑‍🏫 Supervisi Guru</button>
                        </div>
                    </div>
                </div>

                <!-- Stat Cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">🎓</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Aktif</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Siswa Aktif</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">1.248</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">✅</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Hari ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Kehadiran Siswa</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">96,2%</p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500 rounded-full" style="width:96%"></div></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-sky-100 grid place-items-center text-sky-700">💰</span>
                            <span class="text-[11px] font-bold text-sky-700 bg-sky-50 px-2 py-0.5 rounded-full">Bulan ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Arus Kas Masuk</p>
                        <p class="font-heading font-extrabold text-xl text-slate-900">Rp 486.750.000</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">📝</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">SPMB</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Pendaftar Baru</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">312</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <!-- LEFT -->
                    <div class="lg:col-span-2 space-y-4">
                        <!-- Chart kehadiran & arus kas -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Tren Kehadiran Siswa 6 Bulan</h2><p class="text-xs text-slate-400">Persentase kehadiran harian rata-rata</p></div>
                                <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full">Rata-rata 94,6%</span>
                            </div>
                            <div class="mt-6 flex items-end gap-3 sm:gap-6 h-48">
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full flex items-end justify-center h-40"><div class="w-6 bg-blue-600 rounded-t" style="height:88%"></div></div><div class="w-full flex items-end justify-center"><div class="w-6 bg-sky-400 rounded-t" style="height:70%"></div></div><span class="text-[10px] font-semibold text-slate-400">Mei</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full flex items-end justify-center h-40"><div class="w-6 bg-blue-600 rounded-t" style="height:91%"></div></div><div class="w-full flex items-end justify-center"><div class="w-6 bg-sky-400 rounded-t" style="height:74%"></div></div><span class="text-[10px] font-semibold text-slate-400">Jun</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full flex items-end justify-center h-40"><div class="w-6 bg-blue-600 rounded-t" style="height:86%"></div></div><div class="w-full flex items-end justify-center"><div class="w-6 bg-sky-400 rounded-t" style="height:68%"></div></div><span class="text-[10px] font-semibold text-slate-400">Jul</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full flex items-end justify-center h-40"><div class="w-6 bg-blue-600 rounded-t" style="height:95%"></div></div><div class="w-full flex items-end justify-center"><div class="w-6 bg-sky-400 rounded-t" style="height:80%"></div></div><span class="text-[10px] font-semibold text-slate-400">Agu</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full flex items-end justify-center h-40"><div class="w-6 bg-blue-600 rounded-t" style="height:93%"></div></div><div class="w-full flex items-end justify-center"><div class="w-6 bg-sky-400 rounded-t" style="height:77%"></div></div><span class="text-[10px] font-semibold text-slate-400">Sep</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full flex items-end justify-center h-40"><div class="w-6 bg-blue-600 rounded-t" style="height:96%"></div></div><div class="w-full flex items-end justify-center"><div class="w-6 bg-sky-400 rounded-t" style="height:82%"></div></div><span class="text-[10px] font-semibold text-slate-400">Okt</span></div>
                            </div>
                            <div class="mt-3 flex items-center justify-center gap-4 text-[11px] font-semibold text-slate-500">
                                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-blue-600"></span> Kehadiran Siswa</span>
                                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-sky-400"></span> Kehadiran Guru</span>
                            </div>
                        </div>

                        <!-- Live feed -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Aktivitas Sistem Terbaru</h2><p class="text-xs text-slate-400">Feed operasional lintas modul</p></div>
                                <button onclick="loadFeed()" class="text-[11px] font-bold text-navy">Muat ulang</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[720px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Modul</th><th class="px-4 py-3">Aktivitas</th><th class="px-4 py-3">Oleh</th></tr>
                                    </thead>
                                    <tbody id="feedBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="4" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="4" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="4" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="4" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="space-y-4">
                        <!-- SPMB -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Statistik Pendaftar SPMB</h2>
                            <p class="text-xs text-slate-400">Gelombang 2026/2027</p>
                            <div class="mt-4 flex items-center gap-5">
                                <div class="w-28 h-28 rounded-full grid place-items-center flex-shrink-0" style="background: conic-gradient(#1E40AF 0 62%, #F59E0B 62% 80%, #10B981 80% 92%, #e2e8f0 92% 100%);">
                                    <div class="w-20 h-20 rounded-full bg-white grid place-items-center"><span class="font-heading font-extrabold text-slate-800">312</span></div>
                                </div>
                                <div class="space-y-2 text-xs">
                                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-blue-700"></span><span class="text-slate-600">Diterima <span class="font-bold text-slate-800">193</span></span></div>
                                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-amber-500"></span><span class="text-slate-600">Verifikasi <span class="font-bold text-slate-800">56</span></span></div>
                                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-emerald-500"></span><span class="text-slate-600">Cadangan <span class="font-bold text-slate-800">37</span></span></div>
                                    <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-slate-200"></span><span class="text-slate-600">Lainnya <span class="font-bold text-slate-800">26</span></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Neraca kas ringkas -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-lg">🏦</span>
                                <div><h2 class="font-heading font-bold text-slate-800">Neraca Kas Sekolah</h2><p class="text-[11px] text-slate-400">Saldo terkini</p></div>
                            </div>
                            <p class="mt-3 font-heading font-extrabold text-2xl text-slate-900">Rp 1.284.500.000</p>
                            <div class="mt-3 grid grid-cols-2 gap-2 text-xs">
                                <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-3"><p class="text-emerald-700 font-bold">Masuk</p><p class="font-heading font-extrabold text-emerald-800 text-sm">Rp 486,7 jt</p></div>
                                <div class="bg-red-50 border border-red-100 rounded-xl p-3"><p class="text-red-600 font-bold">Keluar</p><p class="font-heading font-extrabold text-red-700 text-sm">Rp 312,4 jt</p></div>
                            </div>
                            <button onclick="showView('keuangan','Neraca Kas Real-time')" class="mt-4 w-full bg-navy hover:bg-blue-800 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📈 Lihat Laporan Lengkap</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KETERCAPAIAN KURIKULUM ================= -->
            <section id="view-ketercapaian-kurikulum" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Ketercapaian Kurikulum</h2><p class="text-xs text-slate-400">Persentase ketercapaian materi pembelajaran per mata pelajaran.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Menyusun laporan ketercapaian kurikulum...')" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">📄 Ekspor Laporan</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Rata-rata Ketercapaian</p><p class="font-heading font-extrabold text-2xl text-slate-900">84%</p><div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-blue-600 rounded-full" style="width:84%"></div></div></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Mapel Tuntas Target</p><p class="font-heading font-extrabold text-2xl text-slate-900">9 <span class="text-sm font-bold text-slate-500">/ 11</span></p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Perlu Perhatian</p><p class="font-heading font-extrabold text-2xl text-slate-900">2</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Periode</p><p class="font-heading font-extrabold text-lg text-slate-900">Semester Ganjil</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Mata Pelajaran</th><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Target Jam</th><th class="px-4 py-3">Tercapai</th><th class="px-4 py-3">Ketercapaian</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="ketercapaian-kurikulumBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: JURNAL MENGAJAR GURU ================= -->
            <section id="view-jurnal-kepsek" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Jurnal Mengajar Guru</h2><p class="text-xs text-slate-400">Rekap pengisian jurnal mengajar seluruh guru.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="loadTable('jurnal-kepsek', true)" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">🔄 Muat ulang</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Jurnal Hari Ini</p><p class="font-heading font-extrabold text-2xl text-slate-900">96%</p><div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500 rounded-full" style="width:96%"></div></div></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Jurnal Bulan Ini</p><p class="font-heading font-extrabold text-2xl text-slate-900">412</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Belum Diisi</p><p class="font-heading font-extrabold text-2xl text-slate-900">6</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Guru Mengajar</p><p class="font-heading font-extrabold text-2xl text-slate-900">58 <span class="text-sm font-bold text-slate-500">/ 64</span></p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[900px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Mata Pelajaran</th><th class="px-4 py-3">Materi</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="jurnal-kepsekBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: JADWAL PELAJARAN HARIAN ================= -->
            <section id="view-jadwal-kepsek" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Jadwal Pelajaran Harian</h2><p class="text-xs text-slate-400">Jadwal KBM yang berjalan hari ini.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Mengekspor jadwal pelajaran...')" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">📄 Ekspor Jadwal</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Jam Mengajar</p><p class="font-heading font-extrabold text-2xl text-slate-900">42</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kelas Berjalan</p><p class="font-heading font-extrabold text-2xl text-slate-900">38</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Ruang Terpakai</p><p class="font-heading font-extrabold text-2xl text-slate-900">12</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Konflik Jadwal</p><p class="font-heading font-extrabold text-2xl text-slate-900">0</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Jam</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Mata Pelajaran</th><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Ruang</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="jadwal-kepsekBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KEHADIRAN GURU DI KELAS ================= -->
            <section id="view-kehadiran-guru" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Kehadiran Guru di Kelas</h2><p class="text-xs text-slate-400">Pemantauan kehadiran dan ketepatan waktu guru masuk kelas.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="loadTable('kehadiran-guru', true)" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">🔄 Muat ulang</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kehadiran Guru</p><p class="font-heading font-extrabold text-2xl text-slate-900">93%</p><div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-sky-500 rounded-full" style="width:93%"></div></div></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Tepat Waktu</p><p class="font-heading font-extrabold text-2xl text-slate-900">55</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Terlambat</p><p class="font-heading font-extrabold text-2xl text-slate-900">3</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Tanpa Keterangan</p><p class="font-heading font-extrabold text-2xl text-slate-900">2</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Mata Pelajaran</th><th class="px-4 py-3">Jam Masuk</th><th class="px-4 py-3">Jam Kelas</th><th class="px-4 py-3">Ketepatan</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="kehadiran-guruBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: REKAPITULASI SPP ================= -->
            <section id="view-rekap-spp-kepsek" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Rekapitulasi Pembayaran SPP</h2><p class="text-xs text-slate-400">Tingkat keterbayaran SPP per kelas.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Menyusun rekapitulasi SPP...')" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">📄 Ekspor Laporan</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Pemasukan Bulan Ini</p><p class="font-heading font-extrabold text-xl text-slate-900">Rp 486.750.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">SPP Terbayar</p><p class="font-heading font-extrabold text-2xl text-slate-900">87%</p><div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-blue-600 rounded-full" style="width:87%"></div></div></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Tunggakan</p><p class="font-heading font-extrabold text-xl text-slate-900">Rp 42.350.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Siswa Menunggak</p><p class="font-heading font-extrabold text-2xl text-slate-900">86</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Target</th><th class="px-4 py-3">Terealisasi</th><th class="px-4 py-3">Persentase</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="rekap-spp-kepsekBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PEMASUKAN & PENGELUARAN ================= -->
            <section id="view-pemasukan-pengeluaran" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan Pemasukan &amp; Pengeluaran</h2><p class="text-xs text-slate-400">Rekapitulasi arus keuangan bulanan sekolah.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Menyusun laporan keuangan...')" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">📄 Ekspor Laporan</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Pemasukan</p><p class="font-heading font-extrabold text-xl text-emerald-700">Rp 486.750.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Pengeluaran</p><p class="font-heading font-extrabold text-xl text-red-600">Rp 312.400.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Selisih</p><p class="font-heading font-extrabold text-xl text-slate-900">Rp 174.350.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Periode</p><p class="font-heading font-extrabold text-lg text-slate-900">Oktober 2026</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Bulan</th><th class="px-4 py-3">Pemasukan</th><th class="px-4 py-3">Pengeluaran</th><th class="px-4 py-3">Selisih</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="pemasukan-pengeluaranBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: TUNGGAKAN SISWA ================= -->
            <section id="view-tunggakan-siswa" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Tunggakan Siswa</h2><p class="text-xs text-slate-400">Sebaran tunggakan SPP per kelas.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="loadTable('tunggakan-siswa', true)" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">🔄 Muat ulang</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Tunggakan</p><p class="font-heading font-extrabold text-xl text-slate-900">Rp 42.350.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Siswa Menunggak</p><p class="font-heading font-extrabold text-2xl text-slate-900">86</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kelas Tertinggi</p><p class="font-heading font-extrabold text-2xl text-slate-900">XII-D</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Status</p><p class="font-heading font-extrabold text-lg text-amber-600">Perlu Tindak Lanjut</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Jumlah Siswa</th><th class="px-4 py-3">Total Tunggakan</th><th class="px-4 py-3">Rata-rata</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="tunggakan-siswaBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: NERACA KAS ================= -->
            <section id="view-neraca-kas" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Neraca Kas Real-time</h2><p class="text-xs text-slate-400">Komposisi saldo kas dan rekening sekolah.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="loadTable('neraca-kas', true)" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">🔄 Muat ulang</button></div>
                </div>
                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                            <div><p class="text-xs font-semibold text-slate-600">Total Saldo</p><p class="font-heading font-extrabold text-xl text-slate-900">Rp 1,28 M</p></div>
                            <div><p class="text-xs font-semibold text-slate-600">Bank Operasional</p><p class="font-heading font-extrabold text-xl text-slate-900">58%</p></div>
                            <div><p class="text-xs font-semibold text-slate-600">Kas Tunai</p><p class="font-heading font-extrabold text-xl text-slate-900">24%</p></div>
                            <div><p class="text-xs font-semibold text-slate-600">Dana Cadangan</p><p class="font-heading font-extrabold text-xl text-slate-900">18%</p></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h2 class="font-heading font-bold text-slate-800">Neraca Kas</h2>
                        <p class="text-xs text-slate-400">Komposisi saldo</p>
                        <div class="mt-4 flex items-center justify-center">
                            <div class="w-36 h-36 rounded-full grid place-items-center" style="background: conic-gradient(#1E40AF 0 58%, #0284C7 58% 82%, #10B981 82% 100%);">
                                <div class="w-24 h-24 rounded-full bg-white grid place-items-center text-center"><span class="font-heading font-extrabold text-slate-800 text-base">Rp 1,28 M</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Akun</th><th class="px-4 py-3">Saldo</th><th class="px-4 py-3">Porsi</th><th class="px-4 py-3">Terakhir Diperbarui</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="neraca-kasBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: REKAPITULASI KINERJA GURU ================= -->
            <section id="view-rekap-kinerja-guru" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Rekapitulasi Kinerja Guru</h2><p class="text-xs text-slate-400">Skor supervisi dan presensi kinerja guru.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Mengunduh rekapitulasi kinerja guru...')" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">⬇️ Unduh Rekap</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Guru &amp; Staf</p><p class="font-heading font-extrabold text-2xl text-slate-900">64</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Rata-rata Skor</p><p class="font-heading font-extrabold text-2xl text-slate-900">88,4</p><div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500 rounded-full" style="width:88%"></div></div></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Supervisi Bulan Ini</p><p class="font-heading font-extrabold text-2xl text-slate-900">41</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Perlu Pembinaan</p><p class="font-heading font-extrabold text-2xl text-slate-900">7</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[860px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Nama Guru</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Presensi</th><th class="px-4 py-3">Skor Supervisi</th><th class="px-4 py-3">Catatan</th><th class="px-4 py-3 text-right">Aksi</th></tr></thead><tbody id="rekap-kinerja-guruBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PRESENSI STAF / HRD ================= -->
            <section id="view-presensi-staf" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Presensi Staf / HRD</h2><p class="text-xs text-slate-400">Kehadiran guru dan tenaga kependidikan.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="loadTable('presensi-staf', true)" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">🔄 Muat ulang</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kehadiran Staf</p><p class="font-heading font-extrabold text-2xl text-slate-900">94%</p><div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-sky-500 rounded-full" style="width:94%"></div></div></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Tepat Waktu</p><p class="font-heading font-extrabold text-2xl text-slate-900">57</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Terlambat</p><p class="font-heading font-extrabold text-2xl text-slate-900">4</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Izin / Cuti</p><p class="font-heading font-extrabold text-2xl text-slate-900">3</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Nama</th><th class="px-4 py-3">Jabatan</th><th class="px-4 py-3">Jam Masuk</th><th class="px-4 py-3">Jam Pulang</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="presensi-stafBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: CATATAN HASIL SUPERVISI ================= -->
            <section id="view-catatan-supervisi" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Catatan Hasil Supervisi Akademik</h2><p class="text-xs text-slate-400">Temuan supervisi kelas dan rencana tindak lanjut.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="loadTable('catatan-supervisi', true)" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">🔄 Muat ulang</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Catatan Bulan Ini</p><p class="font-heading font-extrabold text-2xl text-slate-900">41</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Tindak Lanjut</p><p class="font-heading font-extrabold text-2xl text-slate-900">12</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Selesai</p><p class="font-heading font-extrabold text-2xl text-slate-900">29</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Terbuka</p><p class="font-heading font-extrabold text-2xl text-slate-900">0</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[900px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Supervisor</th><th class="px-4 py-3">Temuan</th><th class="px-4 py-3">Tindak Lanjut</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="catatan-supervisiBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: LOG AKTIVITAS PENGGUNA ================= -->
            <section id="view-log-aktivitas" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Log Aktivitas Pengguna Sistem</h2><p class="text-xs text-slate-400">Jejak audit seluruh peran pengguna.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="loadTable('log-aktivitas', true)" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">🔄 Muat ulang</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Aktivitas Hari Ini</p><p class="font-heading font-extrabold text-2xl text-slate-900">1.842</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Login Terverifikasi</p><p class="font-heading font-extrabold text-2xl text-slate-900">128</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Percobaan Gagal</p><p class="font-heading font-extrabold text-2xl text-slate-900">3</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Status Keamanan</p><p class="font-heading font-extrabold text-lg text-emerald-700">Terlindungi</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[900px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Pengguna</th><th class="px-4 py-3">Peran</th><th class="px-4 py-3">Aktivitas</th><th class="px-4 py-3">IP</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="log-aktivitasBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KEAMANAN DATA & HAK AKSES ================= -->
            <section id="view-keamanan-data" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Keamanan Data &amp; Hak Akses</h2><p class="text-xs text-slate-400">Jaminan keamanan data dan pengelolaan hak akses pengguna.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Audit keamanan dijalankan')" class="text-xs font-bold text-white bg-navy hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">🛡️ Audit Keamanan</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Enkripsi</p><p class="font-heading font-extrabold text-lg text-slate-900">AES-256</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Role Aktif</p><p class="font-heading font-extrabold text-2xl text-slate-900">14</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Login Gagal Hari Ini</p><p class="font-heading font-extrabold text-2xl text-slate-900">3</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kepatuhan PSE</p><p class="font-heading font-extrabold text-lg text-emerald-700">Terdaftar</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Aspek</th><th class="px-4 py-3">Keterangan</th><th class="px-4 py-3">Status</th><th class="px-4 py-3">Terakhir Diperiksa</th></tr></thead><tbody id="keamanan-dataBody" class="divide-y divide-slate-50"><tr><td colspan="4" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="4" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="4" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧩</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal Kepala Sekolah. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Dashboard Executive</span>, <span class="font-semibold text-slate-600">Monitoring Akademik</span>, <span class="font-semibold text-slate-600">Transparansi Keuangan</span>, <span class="font-semibold text-slate-600">Supervisi &amp; Evaluasi</span>, dan <span class="font-semibold text-slate-600">Audit Trail</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard Executive')" class="bg-navy hover:bg-blue-800 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('akademik','Ketercapaian Kurikulum')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Akademik</button>
                        <button onclick="showView('keuangan','Rekapitulasi Pembayaran SPP')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Keuangan</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="px-4 sm:px-6 py-4 text-center text-xs text-slate-400 border-t border-slate-200">
            © 2026 PT Artificial Intelligence Learning Madani Digital · Portal Kepala Sekolah (Simulasi)
        </footer>
    </div>

    <!-- ============ MODAL: DETAIL CATATAN SUPERVISI ============ -->
    <div id="supervisiModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeSupervisi()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-700 grid place-items-center text-xl">📋</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Catatan Supervisi Akademik</h3><p id="svModalGuru" class="text-xs text-slate-400">Guru</p></div>
            </div>
            <div id="svModalBody" class="mt-4 bg-slate-50 rounded-2xl p-4 text-sm text-slate-600 space-y-2"></div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closeSupervisi()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
                <button onclick="closeSupervisi();showToast('success','Catatan supervisi disimpan')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan Catatan</button>
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

        // ---------- Accordion ----------
        document.querySelectorAll('.sidebar-group-btn').forEach(btn => {
            btn.addEventListener('click', () => btn.closest('.sidebar-group').classList.toggle('open'));
        });

        // ---------- Utils ----------
        function rupiah(n) { return 'Rp ' + Number(n).toLocaleString('id-ID'); }

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

            if (name === 'dashboard') loadFeed();
            if (name === 'rekap-kinerja-guru') loadRekapKinerja();
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

        // ---------- Dashboard: feed ----------
        const feedData = [
            { waktu: '09:44', modul: 'Keuangan', aksi: 'Pembayaran SPP Keira Faza Aishanaya terverifikasi', oleh: 'Bendahara' },
            { waktu: '09:38', modul: 'SPMB', aksi: 'Pendaftar baru gelombang 2 diverifikasi', oleh: 'Panitia SPMB' },
            { waktu: '09:30', modul: 'Akademik', aksi: 'Jurnal mengajar XI-C Matematika diisi', oleh: 'Ibu Ratna' },
            { waktu: '09:12', modul: 'HRD', aksi: 'Presensi guru pagi tercatat 58/64', oleh: 'Sistem' },
            { waktu: '08:55', modul: 'Tatib', aksi: 'Poin pelanggaran ringan diperbarui', oleh: 'BK' },
            { waktu: '08:40', modul: 'Audit', aksi: 'Login berhasil dari perangkat baru', oleh: 'Kepala Sekolah' }
        ];
        const modulBadge = { 'Keuangan': 'bg-emerald-50 text-emerald-700', 'SPMB': 'bg-amber-50 text-amber-700', 'Akademik': 'bg-blue-50 text-blue-700', 'HRD': 'bg-sky-50 text-sky-700', 'Tatib': 'bg-red-50 text-red-700', 'Audit': 'bg-slate-100 text-slate-600' };
        let feedLoaded = false;
        function loadFeed() {
            if (feedLoaded) return;
            const body = document.getElementById('feedBody');
            setTimeout(() => {
                body.innerHTML = feedData.map(r =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 text-slate-500">' + r.waktu + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (modulBadge[r.modul] || 'bg-slate-100 text-slate-600') + ' px-2.5 py-1 rounded-full">' + r.modul + '</span></td>'
                    + '<td class="px-4 py-3 text-slate-700">' + r.aksi + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r.oleh + '</td>'
                    + '</tr>'
                ).join('');
                feedLoaded = true;
            }, 700);
        }

        // ---------- Kinerja Guru (dengan detail) ----------
        const supervisiData = [
            { nama: 'Ibu Ratna Wulandari', mapel: 'Matematika', presensi: '98%', skor: 92, catatan: 'Pengelolaan kelas sangat baik, variasi metode beragam.' },
            { nama: 'Bpk. Andi Saputra', mapel: 'Fisika', presensi: '95%', skor: 88, catatan: 'Perlu penambahan media pembelajaran interaktif.' },
            { nama: 'Ibu Siti Aminah', mapel: 'B. Indonesia', presensi: '90%', skor: 85, catatan: 'Tingkatkan ketepatan waktu masuk kelas.' },
            { nama: 'Bpk. Yusuf Hakim', mapel: 'Biologi', presensi: '99%', skor: 90, catatan: 'Praktikum terstruktur, dokumentasi rapi.' }
        ];
        let rekapKinerjaLoaded = false;
        function loadRekapKinerja() {
            if (rekapKinerjaLoaded) return;
            const body = document.getElementById('rekap-kinerja-guruBody');
            if (!body) return;
            setTimeout(() => {
                body.innerHTML = supervisiData.map((r, i) => {
                    const color = r.skor >= 90 ? 'bg-emerald-100 text-emerald-800' : (r.skor >= 85 ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800');
                    return '<tr class="hover:bg-slate-50/70">'
                        + '<td class="px-4 py-3 font-semibold text-slate-700">' + r.nama + '</td>'
                        + '<td class="px-4 py-3 text-slate-500">' + r.mapel + '</td>'
                        + '<td class="px-4 py-3 text-slate-600">' + r.presensi + '</td>'
                        + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + color + ' px-2.5 py-1 rounded-full">' + r.skor + ' / 100</span></td>'
                        + '<td class="px-4 py-3 text-slate-500 max-w-[220px] truncate">' + r.catatan + '</td>'
                        + '<td class="px-4 py-3 text-right"><button onclick="openSupervisi(' + i + ')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-2 rounded-lg transition-colors">📋 Detail</button></td>'
                        + '</tr>';
                }).join('');
                rekapKinerjaLoaded = true;
            }, 600);
        }
        function openSupervisi(i) {
            const r = supervisiData[i];
            document.getElementById('svModalGuru').textContent = r.nama + ' · ' + r.mapel;
            document.getElementById('svModalBody').innerHTML =
                '<p>Presensi: <span class="font-bold text-slate-800">' + r.presensi + '</span></p>'
                + '<p>Skor supervisi: <span class="font-bold text-slate-800">' + r.skor + ' / 100</span></p>'
                + '<p>Catatan: <span class="text-slate-700">' + r.catatan + '</span></p>';
            const m = document.getElementById('supervisiModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeSupervisi() { const m = document.getElementById('supervisiModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        // ---------- Generic in-page data tables ----------
        const statusPillMap = {
            'Terverifikasi': 'bg-emerald-100 text-emerald-800', 'Selesai': 'bg-emerald-100 text-emerald-800',
            'Aktif': 'bg-emerald-100 text-emerald-800', 'OK': 'bg-emerald-100 text-emerald-800',
            'Menunggu': 'bg-amber-100 text-amber-800', 'Ditolak': 'bg-red-100 text-red-800'
        };
        function statusPill(v) {
            const cls = statusPillMap[v] || 'bg-slate-100 text-slate-600';
            return '<span class="text-[11px] font-bold ' + cls + ' px-2.5 py-1 rounded-full">' + v + '</span>';
        }
        function cellHtml(c, i) {
            if (c.charAt(0) === '~') return '<td class="px-4 py-3">' + statusPill(c.slice(1)) + '</td>';
            return '<td class="px-4 py-3 ' + (i === 0 ? 'font-semibold text-slate-700' : 'text-slate-500') + '">' + c + '</td>';
        }
        const tableData = {
            'ketercapaian-kurikulum': [
                ['Matematika', 'Ibu Ratna W.', '24', '20', '83%', '~Aktif'],
                ['Fisika', 'Bpk. Andi S.', '20', '17', '85%', '~Aktif'],
                ['B. Indonesia', 'Ibu Siti A.', '24', '19', '79%', '~Aktif'],
                ['Biologi', 'Bpk. Yusuf H.', '20', '18', '90%', '~Aktif']
            ],
            'jurnal-kepsek': [
                ['19 Okt', 'Ibu Ratna W.', 'X-A', 'Matematika', 'Sistem Persamaan Linear', '~Selesai'],
                ['19 Okt', 'Bpk. Andi S.', 'XI-C', 'Fisika', 'Hukum Newton', '~Selesai'],
                ['18 Okt', 'Ibu Siti A.', 'XII-D', 'B. Indonesia', 'Teks Argumentasi', '~Menunggu'],
                ['18 Okt', 'Bpk. Yusuf H.', 'X-B', 'Biologi', 'Sel & Jaringan', '~Selesai']
            ],
            'jadwal-kepsek': [
                ['07:15 - 08:45', 'X-A', 'Matematika', 'Ibu Ratna W.', 'R-101', '~Aktif'],
                ['07:15 - 08:45', 'XI-C', 'Fisika', 'Bpk. Andi S.', 'Lab Fisika', '~Aktif'],
                ['08:45 - 10:15', 'XII-D', 'B. Indonesia', 'Ibu Siti A.', 'R-102', '~Aktif'],
                ['10:15 - 11:45', 'X-B', 'Biologi', 'Bpk. Yusuf H.', 'Lab Bio', '~Aktif']
            ],
            'kehadiran-guru': [
                ['Ibu Ratna W.', 'Matematika', '06:52', '07:15', 'Tepat waktu', '~OK'],
                ['Bpk. Andi S.', 'Fisika', '06:58', '07:15', 'Tepat waktu', '~OK'],
                ['Ibu Siti A.', 'B. Indonesia', '07:05', '08:50', 'Terlambat', '~Menunggu'],
                ['Bpk. Yusuf H.', 'Biologi', '06:49', '10:15', 'Tepat waktu', '~OK']
            ],
            'rekap-spp-kepsek': [
                ['X-A', '32', 'Rp 11.200.000', 'Rp 10.640.000', '95%', '~Selesai'],
                ['X-B', '30', 'Rp 10.500.000', 'Rp 9.240.000', '88%', '~Selesai'],
                ['XI-C', '28', 'Rp 9.800.000', 'Rp 7.056.000', '72%', '~Menunggu'],
                ['XII-D', '26', 'Rp 9.100.000', 'Rp 5.824.000', '64%', '~Menunggu']
            ],
            'pemasukan-pengeluaran': [
                ['Mei 2026', 'Rp 402.500.000', 'Rp 288.900.000', 'Rp 113.600.000', '~Selesai'],
                ['Jun 2026', 'Rp 418.200.000', 'Rp 301.100.000', 'Rp 117.100.000', '~Selesai'],
                ['Jul 2026', 'Rp 455.000.000', 'Rp 320.400.000', 'Rp 134.600.000', '~Selesai'],
                ['Okt 2026', 'Rp 486.750.000', 'Rp 312.400.000', 'Rp 174.350.000', '~Aktif']
            ],
            'tunggakan-siswa': [
                ['X-A', '3', 'Rp 1.050.000', 'Rp 350.000', '~Menunggu'],
                ['X-B', '6', 'Rp 2.100.000', 'Rp 350.000', '~Menunggu'],
                ['XI-C', '12', 'Rp 4.200.000', 'Rp 350.000', '~Menunggu'],
                ['XII-D', '18', 'Rp 8.400.000', 'Rp 466.667', '~Menunggu']
            ],
            'neraca-kas': [
                ['Bank Operasional', 'Rp 742.400.000', '58%', '19 Okt 2026', '~Aktif'],
                ['Kas Tunai', 'Rp 307.200.000', '24%', '19 Okt 2026', '~Aktif'],
                ['Dana Cadangan', 'Rp 230.400.000', '18%', '18 Okt 2026', '~Aktif']
            ],
            'presensi-staf': [
                ['Ibu Ratna W.', 'Guru', '06:52', '14:10', '~OK'],
                ['Bpk. Andi S.', 'Guru', '06:58', '14:05', '~OK'],
                ['Bendahara Sekolah', 'Staf', '07:10', '15:00', '~OK'],
                ['Petugas TU', 'Staf', '07:30', '15:05', '~Menunggu']
            ],
            'catatan-supervisi': [
                ['15 Okt', 'Ibu Ratna W.', 'Kepala Sekolah', 'Pengelolaan kelas baik', 'Dipertahankan', '~Terverifikasi'],
                ['16 Okt', 'Bpk. Andi S.', 'Waka Kurikulum', 'Media pembelajaran kurang', 'Pelatihan media', '~Menunggu'],
                ['17 Okt', 'Ibu Siti A.', 'Kepala Sekolah', 'Ketepatan waktu masuk kelas', 'Pembinaan', '~Menunggu']
            ],
            'log-aktivitas': [
                ['09:45', 'Dr. Hendro Suprapto', 'Kepala Sekolah', 'Melihat laporan keuangan bulanan', '10.0.0.2', '~OK'],
                ['09:38', 'Bendahara Sekolah', 'Keuangan', 'Menerbitkan tagihan SPP massal', '10.0.0.14', '~OK'],
                ['09:31', 'Panitia SPMB', 'Administrasi', 'Verifikasi 12 pendaftar baru', '10.0.0.21', '~OK'],
                ['09:15', 'operator.tidak.dikenal', '-', 'Percobaan login gagal (3x)', '103.28.x.x', '~Ditolak'],
                ['08:50', 'Ibu Ratna Wulandari', 'Guru', 'Mengisi jurnal mengajar', '10.0.0.33', '~OK']
            ],
            'keamanan-data': [
                ['Enkripsi Data', 'AES-256 aktif', '~Aktif', '19 Okt 2026'],
                ['Audit Login', 'Tercatat otomatis', '~Aktif', '19 Okt 2026'],
                ['Hak Akses Berbasis Peran', '14 role terdefinisi', '~Aktif', '18 Okt 2026'],
                ['Kepatuhan PSE Kominfo', 'Terdaftar', '~Terverifikasi', '01 Sep 2026']
            ]
        };
        const loadedTables = {};
        function loadTable(name, force) {
            if (loadedTables[name] && !force) return;
            const body = document.getElementById(name + 'Body');
            if (!body) return;
            body.innerHTML = '<tr><td colspan="12" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>';
            setTimeout(() => {
                body.innerHTML = (tableData[name] || []).map(row => '<tr class="hover:bg-slate-50/70">' + row.map(cellHtml).join('') + '</tr>').join('');
                loadedTables[name] = true;
            }, 500);
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

        // initial load for dashboard
        loadFeed();
    </script>
</body>

</html>
