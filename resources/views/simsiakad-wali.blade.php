<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Wali Murid — Pantau Anak Real-time · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal Wali Murid SIAKAD PLUS — pantau akademik, kehadiran, keuangan SPP, dan aktivitas anak secara real-time. 5 grup fitur: Akademik Anak, Keuangan & SPP Digital, Kehadiran & Perizinan, Komunikasi, serta E-Money & Kantin.">
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
        .payopt.selected { border-color: #1E40AF; background: #EFF6FF; box-shadow: 0 0 0 1px #1E40AF; }
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
                <p class="text-[10px] text-slate-500">Portal Wali Murid</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Child selector (sidebar) -->
        <div class="px-4 py-3 border-b border-white/10 flex-shrink-0">
            <p class="text-[10px] uppercase tracking-wider text-slate-500 font-semibold mb-1.5">Anak Terpilih</p>
            <button onclick="toggleChildMenu()" class="w-full flex items-center gap-2.5 bg-white/5 hover:bg-white/10 rounded-xl px-3 py-2.5 transition-colors">
                <span class="w-8 h-8 rounded-full bg-emerald2 grid place-items-center text-white font-heading font-bold text-xs">NA</span>
                <span class="flex-1 text-left leading-tight">
                    <span id="sideChildName" class="block text-xs font-bold text-white">Naufal Abdullaah</span>
                    <span id="sideChildClass" class="block text-[10px] text-slate-400">Kelas 10-A</span>
                </span>
                <span class="text-slate-500 text-xs">▾</span>
            </button>
            <div id="sideChildMenu" class="hidden mt-2 space-y-1">
                <button onclick="selectChild('Naufal Abdullaah','10-A','NA')" class="w-full text-left px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-white/5">Naufal Abdullaah · 10-A</button>
                <button onclick="selectChild('Aisyah Zahra','8-B','AZ')" class="w-full text-left px-3 py-2 rounded-lg text-xs text-slate-300 hover:bg-white/5">Aisyah Zahra · 8-B</button>
            </div>
        </div>

        <!-- Scrollable nav -->
        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <!-- Dashboard -->
            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard Wali Murid</span>
            </button>

            <!-- 1. Akademik Anak -->
            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🎓</span><span class="flex-1 text-left">Akademik Anak</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="nilai-erapor" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Nilai &amp; e-Rapor Anak</button>
                    <button data-view="hasil-cbt" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Hasil CBT &amp; Analisis</button>
                    <button data-view="jadwal" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Jadwal Pelajaran</button>
                    <button data-view="tugas-materi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tugas &amp; Materi</button>
                    <button data-view="prestasi-tahfidz" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Prestasi &amp; Tahfidz</button>
                </div>
            </div>

            <!-- 2. Keuangan & SPP -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💳</span><span class="flex-1 text-left">Keuangan &amp; SPP Digital</span>
                    <span class="text-[10px] font-bold bg-amber2 text-white px-2 py-0.5 rounded-full">2</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="spp" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tagihan SPP Real-time</button>
                    <button data-view="spp" data-title="Pembayaran Cashless" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pembayaran Cashless</button>
                    <button data-view="kwitansi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Riwayat &amp; Kwitansi Digital</button>
                    <button data-view="pengingat-tunggakan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengingat Tunggakan WA</button>
                </div>
            </div>

            <!-- 3. Kehadiran & Perizinan -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📲</span><span class="flex-1 text-left">Kehadiran &amp; Perizinan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="notifikasi-hadir" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Notifikasi Hadir Real-time</button>
                    <button data-view="izin" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Izin / Sakit Online</button>
                    <button data-view="rekap-kehadiran" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekap Kehadiran Bulanan</button>
                </div>
            </div>

            <!-- 4. Komunikasi & Informasi -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💬</span><span class="flex-1 text-left">Komunikasi &amp; Informasi</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="chat-guru" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Chat Wali Kelas / Guru</button>
                    <button data-view="pengumuman" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengumuman Sekolah</button>
                    <button data-view="konsultasi-bk" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Konsultasi BK</button>
                    <button data-view="kalender" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kalender Akademik</button>
                </div>
            </div>

            <!-- 5. E-Money & Kantin Anak -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🪙</span><span class="flex-1 text-left">E-Money &amp; Kantin Anak</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="topup-emoney" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Top-up E-Money</button>
                    <button data-view="limit-jajan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Limit Jajan Harian</button>
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Portal Wali Murid</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard Wali Murid</h1>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <!-- Child selector (topbar) -->
                    <div class="relative">
                        <button onclick="toggleChildMenu()" class="flex items-center gap-2 bg-slate-100 hover:bg-slate-200 rounded-xl pl-1.5 pr-3 py-1.5 transition-colors">
                            <span id="topChildAvatar" class="w-7 h-7 rounded-full bg-emerald2 grid place-items-center text-white font-heading font-bold text-[11px]">NA</span>
                            <span class="hidden sm:block text-left leading-tight">
                                <span id="topChildName" class="block text-xs font-bold text-slate-800">Naufal Abdullaah</span>
                                <span id="topChildClass" class="block text-[10px] text-slate-400">Kelas 10-A</span>
                            </span>
                            <span class="text-slate-400 text-xs">▾</span>
                        </button>
                        <div id="topChildMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 p-2 z-50">
                            <p class="px-3 py-1.5 text-[10px] uppercase tracking-wider text-slate-400 font-semibold">Pilih Anak</p>
                            <button onclick="selectChild('Naufal Abdullaah','10-A','NA')" class="w-full flex items-center gap-2 px-2 py-2 rounded-xl hover:bg-slate-50 text-left">
                                <span class="w-8 h-8 rounded-full bg-emerald2 grid place-items-center text-white text-xs font-bold">NA</span>
                                <span class="leading-tight"><span class="block text-sm font-semibold text-slate-700">Naufal Abdullaah</span><span class="block text-[11px] text-slate-400">Kelas 10-A · NISN 0071234501</span></span>
                            </button>
                            <button onclick="selectChild('Aisyah Zahra','8-B','AZ')" class="w-full flex items-center gap-2 px-2 py-2 rounded-xl hover:bg-slate-50 text-left">
                                <span class="w-8 h-8 rounded-full bg-sky2 grid place-items-center text-white text-xs font-bold">AZ</span>
                                <span class="leading-tight"><span class="block text-sm font-semibold text-slate-700">Aisyah Zahra</span><span class="block text-[11px] text-slate-400">Kelas 8-B · NISN 0071239902</span></span>
                            </button>
                        </div>
                    </div>
                    <!-- Notif -->
                    <button onclick="showToast('info', '2 notifikasi baru')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Profile -->
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">HS</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Hendro S.</p>
                            <p class="text-[10px] text-slate-400">Wali Murid</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-4 sm:p-6">

            <!-- ================= VIEW: DASHBOARD ================= -->
            <section id="view-dashboard" class="view active">

                <!-- Welcome banner -->
                <div class="rounded-3xl hero-gradient text-white p-5 sm:p-6 relative overflow-hidden">
                    <div class="absolute inset-0 grid-pattern"></div>
                    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl bg-white/20 grid place-items-center font-heading font-extrabold text-xl flex-shrink-0">NA</div>
                            <div>
                                <p class="text-sm text-white/85">Assalamualaikum, Bapak/Ibu 🙏</p>
                                <h2 class="font-heading font-extrabold text-xl sm:text-2xl text-white">Pantau Naufal Abdullaah</h2>
                                <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                    <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">NISN 0071234501</span>
                                    <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">Kelas 10-A</span>
                                    <span class="bg-emerald2 px-2.5 py-1 rounded-full text-white">✓ Hadir 07:12 WIB</span>
                                </div>
                            </div>
                        </div>
                        <div class="lg:ml-auto">
                            <button onclick="openChildMenuMobile()" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">👧 Ganti Anak</button>
                        </div>
                    </div>
                </div>

                <!-- Stat Cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">💰</span>
                            <span class="text-[11px] font-bold text-amber-800 bg-amber-100 px-2 py-0.5 rounded-full">Tagihan</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Status SPP Bulan Ini</p>
                        <p class="font-heading font-extrabold text-xl text-slate-900">Rp 350.000</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">📊</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Baik</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Rata-rata Nilai Akademik</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">86,5</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">✅</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Sangat baik</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Kehadiran Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">98%</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-sky-100 grid place-items-center text-sky-700">🪙</span>
                            <span class="text-[11px] font-bold text-sky-700 bg-sky-50 px-2 py-0.5 rounded-full">Aktif</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Saldo E-Money Anak</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">Rp 62.500</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <!-- LEFT -->
                    <div class="lg:col-span-2 space-y-4">
                        <!-- Presensi minggu ini -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="font-heading font-bold text-slate-800">Presensi &amp; Kehadiran Minggu Ini</h2>
                                    <p class="text-xs text-slate-400">Timeline kehadiran Naufal · pekan 13–17 Okt 2026</p>
                                </div>
                                <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-full">Hadir 5/5 hari</span>
                            </div>
                            <ol class="mt-5 relative border-l-2 border-slate-100 ml-3 space-y-4">
                                <li class="ml-5">
                                    <span class="absolute -left-[9px] w-4 h-4 rounded-full bg-emerald-500 ring-4 ring-white"></span>
                                    <p class="text-sm font-semibold text-slate-800">Jumat, 17 Okt · Hadir</p>
                                    <p class="text-xs text-slate-400">Masuk 07:12 WIB · Pulang 15:05 WIB</p>
                                </li>
                                <li class="ml-5">
                                    <span class="absolute -left-[9px] w-4 h-4 rounded-full bg-emerald-500 ring-4 ring-white"></span>
                                    <p class="text-sm font-semibold text-slate-800">Kamis, 16 Okt · Hadir</p>
                                    <p class="text-xs text-slate-400">Masuk 07:05 WIB · Pulang 15:02 WIB</p>
                                </li>
                                <li class="ml-5">
                                    <span class="absolute -left-[9px] w-4 h-4 rounded-full bg-emerald-500 ring-4 ring-white"></span>
                                    <p class="text-sm font-semibold text-slate-800">Rabu, 15 Okt · Hadir</p>
                                    <p class="text-xs text-slate-400">Masuk 07:08 WIB · Pulang 14:58 WIB</p>
                                </li>
                                <li class="ml-5">
                                    <span class="absolute -left-[9px] w-4 h-4 rounded-full bg-amber-500 ring-4 ring-white"></span>
                                    <p class="text-sm font-semibold text-slate-800">Selasa, 14 Okt · Izin</p>
                                    <p class="text-xs text-slate-400">Izin acara keluarga · disetujui wali kelas</p>
                                </li>
                                <li class="ml-5">
                                    <span class="absolute -left-[9px] w-4 h-4 rounded-full bg-emerald-500 ring-4 ring-white"></span>
                                    <p class="text-sm font-semibold text-slate-800">Senin, 13 Okt · Hadir</p>
                                    <p class="text-xs text-slate-400">Masuk 07:00 WIB · Pulang 15:10 WIB</p>
                                </li>
                            </ol>
                        </div>

                        <!-- Tagihan terdekat -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Tagihan &amp; Pembayaran Terdekat</h2>
                                <span class="text-[11px] font-bold bg-red-100 text-red-800 px-2.5 py-1 rounded-full">Jatuh tempo 25 Okt</span>
                            </div>
                            <div class="mt-4 space-y-3">
                                <div class="flex flex-wrap items-center gap-3 border border-slate-100 rounded-2xl p-4">
                                    <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-lg flex-shrink-0">📄</span>
                                    <div class="flex-1 min-w-[160px]">
                                        <p class="text-sm font-semibold text-slate-800">SPP Oktober 2026</p>
                                        <p class="text-xs text-slate-400">Jatuh tempo 25 Oktober 2026</p>
                                    </div>
                                    <span class="font-heading font-extrabold text-slate-900">Rp 350.000</span>
                                    <span class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full">Belum bayar</span>
                                </div>
                                <div class="flex flex-wrap items-center gap-3 border border-slate-100 rounded-2xl p-4">
                                    <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-lg flex-shrink-0">✅</span>
                                    <div class="flex-1 min-w-[160px]">
                                        <p class="text-sm font-semibold text-slate-800">SPP September 2026</p>
                                        <p class="text-xs text-slate-400">Dibayar 20 Sep 2026 · VA BCA</p>
                                    </div>
                                    <span class="font-heading font-extrabold text-slate-500 line-through">Rp 350.000</span>
                                    <span class="text-[11px] font-bold bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full">Lunas</span>
                                </div>
                            </div>
                            <button onclick="showView('spp','Tagihan SPP Real-time')" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">💳 Bayar SPP Sekarang</button>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="space-y-4">
                        <!-- E-Money & kantin -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">E-Money &amp; Kantin Anak</h2>
                                <span class="text-[11px] font-bold bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full">Saldo Rp 62.500</span>
                            </div>
                            <div class="mt-4">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Limit Jajan Harian</label>
                                <div class="mt-1 flex gap-2">
                                    <input id="limitJajan" type="text" value="20000" class="flex-1 bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <button onclick="saveLimit()" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">Simpan</button>
                                </div>
                            </div>
                            <div class="mt-3 text-xs text-slate-500">Terpakai hari ini: <span class="font-semibold text-slate-700">Rp 8.000</span> dari Rp 20.000</div>
                            <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-sky-500 rounded-full" style="width:40%"></div></div>
                            <button onclick="openTopup()" class="mt-4 w-full bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">＋ Top-Up Saldo</button>
                        </div>

                        <!-- Tahfidz -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Perkembangan Hafalan Tahfidz</h2>
                            <div class="mt-4 space-y-3">
                                <div>
                                    <div class="flex justify-between text-xs"><span class="font-semibold text-slate-700">Juz 30</span><span class="text-slate-500">85%</span></div>
                                    <div class="mt-1 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500 rounded-full" style="width:85%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs"><span class="font-semibold text-slate-700">Juz 29</span><span class="text-slate-500">60%</span></div>
                                    <div class="mt-1 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500 rounded-full" style="width:60%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs"><span class="font-semibold text-slate-700">Tahsin (makhraj)</span><span class="text-slate-500">Baik</span></div>
                                    <div class="mt-1 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-sky-500 rounded-full" style="width:78%"></div></div>
                                </div>
                            </div>
                            <p class="mt-3 text-xs text-slate-400">Terakhir setor: QS. An-Naba (pekan ini) · nilai Bacaan 88.</p>
                        </div>

                        <!-- Catatan wali kelas -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-navy/10 grid place-items-center text-lg">💬</span>
                                <div>
                                    <h2 class="font-heading font-bold text-slate-800">Catatan Wali Kelas</h2>
                                    <p class="text-[11px] text-slate-400">Budi Santoso, S.Pd. · 2 hari lalu</p>
                                </div>
                            </div>
                            <p class="mt-3 text-sm text-slate-600">Naufal menunjukkan kemajuan baik di Matematika. Mohon didampingi untuk memperbanyak latihan soal HOTS menjelang PTS. Terima kasih. 🙏</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: SPP / CHECKOUT ================= -->
            <section id="view-spp" class="view">
                <!-- Header ringkasan -->
                <div class="rounded-2xl hero-gradient text-white p-5 relative overflow-hidden">
                    <div class="absolute inset-0 grid-pattern"></div>
                    <div class="relative z-10 flex flex-col sm:flex-row sm:items-center gap-3">
                        <div>
                            <p class="text-[11px] uppercase tracking-wider text-white/80">Total Tagihan Aktif Naufal Abdullaah</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl">Rp <span id="totalHeader">350.000</span></h2>
                            <p class="text-xs text-white/80">Jatuh tempo terdekat: 25 Oktober 2026</p>
                        </div>
                        <div class="sm:ml-auto flex gap-2">
                            <span class="text-[11px] font-bold bg-white/20 px-3 py-1.5 rounded-full">2 tagihan aktif</span>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4 items-start">
                    <!-- Rincian + metode -->
                    <div class="lg:col-span-2 space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h3 class="font-heading font-bold text-slate-800">Rincian Tagihan</h3>
                            <p class="text-xs text-slate-400">Centang tagihan yang ingin dibayar.</p>
                            <div class="mt-4 space-y-3">
                                <label class="flex items-center gap-3 border border-slate-200 rounded-2xl p-4 cursor-pointer hover:border-blue-300 transition-colors">
                                    <input type="checkbox" class="accent tagihan-check w-4 h-4" data-nom="350000" checked onchange="recalc()">
                                    <span class="flex-1">
                                        <span class="block text-sm font-semibold text-slate-800">SPP Oktober 2026</span>
                                        <span class="block text-xs text-slate-400">Tagihan bulanan · jatuh tempo 25 Okt</span>
                                    </span>
                                    <span class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full">Belum bayar</span>
                                    <span class="font-heading font-extrabold text-slate-900">Rp 350.000</span>
                                </label>
                                <label class="flex items-center gap-3 border border-slate-200 rounded-2xl p-4 cursor-pointer hover:border-blue-300 transition-colors">
                                    <input type="checkbox" class="accent tagihan-check w-4 h-4" data-nom="250000" checked onchange="recalc()">
                                    <span class="flex-1">
                                        <span class="block text-sm font-semibold text-slate-800">Uang Kegiatan (Study Tour)</span>
                                        <span class="block text-xs text-slate-400">Kegiatan semester ganjil</span>
                                    </span>
                                    <span class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full">Belum bayar</span>
                                    <span class="font-heading font-extrabold text-slate-900">Rp 250.000</span>
                                </label>
                                <label class="flex items-center gap-3 border border-slate-200 rounded-2xl p-4 cursor-pointer hover:border-blue-300 transition-colors">
                                    <input type="checkbox" class="accent tagihan-check w-4 h-4" data-nom="180000" onchange="recalc()">
                                    <span class="flex-1">
                                        <span class="block text-sm font-semibold text-slate-800">Seragam Olahraga</span>
                                        <span class="block text-xs text-slate-400">Opsional</span>
                                    </span>
                                    <span class="text-[11px] font-bold bg-slate-200 text-slate-600 px-2.5 py-1 rounded-full">Opsional</span>
                                    <span class="font-heading font-extrabold text-slate-900">Rp 180.000</span>
                                </label>
                            </div>
                        </div>

                        <!-- Metode pembayaran -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h3 class="font-heading font-bold text-slate-800">Metode Pembayaran</h3>

                            <p class="mt-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Virtual Account</p>
                            <div class="mt-2 grid grid-cols-2 sm:grid-cols-3 gap-2">
                                <button onclick="pickMethod(this,'BCA Virtual Account')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 text-left hover:border-blue-300 transition-colors"><span class="w-8 h-8 rounded-lg bg-blue-50 grid place-items-center text-[10px] font-bold text-blue-700">BCA</span><span class="text-xs font-semibold text-slate-700">BCA VA</span></button>
                                <button onclick="pickMethod(this,'Mandiri Virtual Account')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 text-left hover:border-blue-300 transition-colors"><span class="w-8 h-8 rounded-lg bg-amber-50 grid place-items-center text-[10px] font-bold text-amber-700">MDR</span><span class="text-xs font-semibold text-slate-700">Mandiri VA</span></button>
                                <button onclick="pickMethod(this,'BRI Virtual Account')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 text-left hover:border-blue-300 transition-colors"><span class="w-8 h-8 rounded-lg bg-blue-50 grid place-items-center text-[10px] font-bold text-blue-700">BRI</span><span class="text-xs font-semibold text-slate-700">BRI VA</span></button>
                                <button onclick="pickMethod(this,'BNI Virtual Account')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 text-left hover:border-blue-300 transition-colors"><span class="w-8 h-8 rounded-lg bg-sky-50 grid place-items-center text-[10px] font-bold text-sky-700">BNI</span><span class="text-xs font-semibold text-slate-700">BNI VA</span></button>
                                <button onclick="pickMethod(this,'BSI Virtual Account')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 text-left hover:border-blue-300 transition-colors"><span class="w-8 h-8 rounded-lg bg-emerald-50 grid place-items-center text-[10px] font-bold text-emerald-700">BSI</span><span class="text-xs font-semibold text-slate-700">BSI VA</span></button>
                            </div>

                            <p class="mt-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Instant Payment</p>
                            <div class="mt-2 grid grid-cols-2 sm:grid-cols-4 gap-2">
                                <button onclick="pickMethod(this,'QRIS')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 hover:border-blue-300 transition-colors"><span class="text-lg">🔳</span><span class="text-xs font-semibold text-slate-700">QRIS</span></button>
                                <button onclick="pickMethod(this,'DANA')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 hover:border-blue-300 transition-colors"><span class="text-lg">💙</span><span class="text-xs font-semibold text-slate-700">DANA</span></button>
                                <button onclick="pickMethod(this,'OVO')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 hover:border-blue-300 transition-colors"><span class="text-lg">💜</span><span class="text-xs font-semibold text-slate-700">OVO</span></button>
                                <button onclick="pickMethod(this,'ShopeePay')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 hover:border-blue-300 transition-colors"><span class="text-lg">🧡</span><span class="text-xs font-semibold text-slate-700">ShopeePay</span></button>
                            </div>

                            <p class="mt-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Gerai Retail</p>
                            <div class="mt-2 grid grid-cols-2 gap-2">
                                <button onclick="pickMethod(this,'Indomaret')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 hover:border-blue-300 transition-colors"><span class="text-lg">🏪</span><span class="text-xs font-semibold text-slate-700">Indomaret</span></button>
                                <button onclick="pickMethod(this,'Alfamart')" class="payopt flex items-center gap-2 border-2 border-slate-200 rounded-xl px-3 py-3 hover:border-blue-300 transition-colors"><span class="text-lg">🏬</span><span class="text-xs font-semibold text-slate-700">Alfamart</span></button>
                            </div>
                        </div>
                    </div>

                    <!-- Ringkasan / sticky -->
                    <div class="lg:sticky lg:top-24">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h3 class="font-heading font-bold text-slate-800">Ringkasan Pembayaran</h3>
                            <div class="mt-4 space-y-2 text-sm">
                                <div class="flex justify-between"><span class="text-slate-500">Tagihan dipilih</span><span id="sumCount" class="font-semibold text-slate-800">2</span></div>
                                <div class="flex justify-between"><span class="text-slate-500">Metode</span><span id="sumMethod" class="font-semibold text-slate-800 text-right">Belum dipilih</span></div>
                                <div class="flex justify-between"><span class="text-slate-500">Biaya admin</span><span class="font-semibold text-slate-800">Rp 2.500</span></div>
                                <div class="border-t border-slate-100 my-2"></div>
                                <div class="flex justify-between items-center"><span class="font-semibold text-slate-700">Total Bayar</span><span id="sumTotal" class="font-heading font-extrabold text-xl text-slate-900">Rp 0</span></div>
                            </div>
                            <button id="btnBayar" onclick="openPayConfirm()" class="mt-5 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3.5 rounded-xl transition-colors">💳 Bayar Sekarang - <span id="btnTotal">Rp 0</span></button>
                            <p class="mt-2 text-[11px] text-slate-400 text-center">Transaksi aman &amp; terenkripsi.</p>
                        </div>
                    </div>
                </div>

                <!-- Riwayat kwitansi -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Riwayat &amp; Kwitansi Digital</h3>
                        <button onclick="showToast('info','Mengunduh seluruh kwitansi...')" class="text-xs font-bold text-navy">Unduh Semua</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[720px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3">Keterangan</th>
                                    <th class="px-4 py-3">Metode</th>
                                    <th class="px-4 py-3 text-right">Nominal</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="kwitansiBody" class="divide-y divide-slate-50">
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="kwitansiEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🧾</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada riwayat pembayaran</p>
                        <p class="text-sm text-slate-400">Kwitansi pembayaran SPP akan tampil di sini.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: IZIN / SAKIT ================= -->
            <section id="view-izin" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Pengajuan Izin / Sakit Online</h2>
                    <p class="text-xs text-slate-400">Ajukan izin atau sakit untuk Naufal Abdullaah · Kelas 10-A.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4 items-start">
                    <!-- Form -->
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="space-y-4">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal Izin / Sakit</label>
                                    <input id="izinTanggal" type="date" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Kategori</label>
                                    <select id="izinKategori" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                        <option>Sakit</option>
                                        <option>Izin Acara Keluarga</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Alasan / Keterangan</label>
                                <textarea id="izinAlasan" rows="4" placeholder="Contoh: Naufal demam sejak tadi malam, kami lampirkan surat dokter..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 resize-none"></textarea>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Upload Surat Dokter / Dokumen</label>
                                <button type="button" onclick="showToast('info','Membuka kamera / galeri perangkat...')" class="mt-1 w-full border-2 border-dashed border-slate-200 hover:border-blue-300 rounded-2xl py-6 text-center transition-colors">
                                    <span class="text-3xl">📎</span>
                                    <p class="mt-2 text-sm font-semibold text-slate-600">Unggah Surat Dokter / Dokumen Pendukung</p>
                                    <p class="text-xs text-slate-400">PDF/JPG/PNG, maksimal 5 MB.</p>
                                </button>
                            </div>
                        </div>
                        <button onclick="submitIzin()" class="mt-5 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3.5 rounded-xl transition-colors">📨 Kirim Permohonan Izin</button>
                    </div>

                    <!-- Riwayat -->
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Riwayat Pengajuan</h3>
                        <div id="izinList" class="mt-4 space-y-3">
                            <div class="border border-slate-100 rounded-2xl p-4">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">Sakit — Demam</p>
                                        <p class="text-xs text-slate-400">14 Okt 2026 · 1 hari</p>
                                    </div>
                                    <span class="text-[11px] font-bold bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full">Disetujui</span>
                                </div>
                            </div>
                            <div class="border border-slate-100 rounded-2xl p-4">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">Izin Acara Keluarga</p>
                                        <p class="text-xs text-slate-400">02 Okt 2026 · 1 hari</p>
                                    </div>
                                    <span class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full">Pending</span>
                                </div>
                            </div>
                            <div class="border border-slate-100 rounded-2xl p-4">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">Lainnya — Urusan Keluarga</p>
                                        <p class="text-xs text-slate-400">20 Sep 2026 · 0,5 hari</p>
                                    </div>
                                    <span class="text-[11px] font-bold bg-red-100 text-red-800 px-2.5 py-1 rounded-full">Ditolak</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: NILAI & E-RAPOR ================= -->
            <section id="view-nilai-erapor" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Nilai &amp; e-Rapor Anak</h2><p class="text-xs text-slate-400">Ringkasan nilai per mata pelajaran.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Mata Pelajaran</th><th class="px-4 py-3">Harian</th><th class="px-4 py-3">PTS</th><th class="px-4 py-3">PAS</th><th class="px-4 py-3">P5</th><th class="px-4 py-3">Predikat</th></tr></thead><tbody id="nilai-eraporBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: HASIL CBT ================= -->
            <section id="view-hasil-cbt" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Hasil CBT &amp; Analisis</h2><p class="text-xs text-slate-400">Hasil ujian daring dan analisis per mapel.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Ujian</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Nilai</th><th class="px-4 py-3">Peringkat</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="hasil-cbtBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: JADWAL ================= -->
            <section id="view-jadwal" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Jadwal Pelajaran</h2><p class="text-xs text-slate-400">Jadwal pelajaran anak per hari.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Hari</th><th class="px-4 py-3">Jam</th><th class="px-4 py-3">Mata Pelajaran</th><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Ruang</th></tr></thead><tbody id="jadwalBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: TUGAS & MATERI ================= -->
            <section id="view-tugas-materi" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Tugas &amp; Materi</h2><p class="text-xs text-slate-400">Materi dan tugas yang dikirim ke anak.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Judul</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Deadline</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="tugas-materiBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PRESTASI & TAHFIDZ ================= -->
            <section id="view-prestasi-tahfidz" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Prestasi &amp; Tahfidz</h2><p class="text-xs text-slate-400">Prestasi dan capaian hafalan anak.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Keterangan</th><th class="px-4 py-3">Tingkat / Juz</th><th class="px-4 py-3">Tahun</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="prestasi-tahfidzBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KWITANSI ================= -->
            <section id="view-kwitansi" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Riwayat &amp; Kwitansi Digital</h2><p class="text-xs text-slate-400">Kwitansi pembayaran yang dapat diunduh.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Mengunduh kwitansi...')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Unduh Kwitansi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">No. Kwitansi</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="kwitansiBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PENGINGAT TUNGGAKAN ================= -->
            <section id="view-pengingat-tunggakan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pengingat Tunggakan WA</h2><p class="text-xs text-slate-400">Pengingat tagihan otomatis melalui WhatsApp.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Pengingat dikirim via WhatsApp')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">📲 Kirim Pengingat</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Bulan</th><th class="px-4 py-3">Jumlah Tagihan</th><th class="px-4 py-3">Jatuh Tempo</th><th class="px-4 py-3">Terkirim Via</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="pengingat-tunggakanBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: NOTIFIKASI HADIR ================= -->
            <section id="view-notifikasi-hadir" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Notifikasi Hadir Real-time</h2><p class="text-xs text-slate-400">Notifikasi kehadiran anak secara real-time.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Kegiatan</th><th class="px-4 py-3">Lokasi</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="notifikasi-hadirBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: REKAP KEHADIRAN ================= -->
            <section id="view-rekap-kehadiran" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Rekap Kehadiran Bulanan</h2><p class="text-xs text-slate-400">Rekapitulasi kehadiran anak per bulan.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Bulan</th><th class="px-4 py-3">Hadir</th><th class="px-4 py-3">Izin</th><th class="px-4 py-3">Sakit</th><th class="px-4 py-3">Alpa</th><th class="px-4 py-3">Persentase</th></tr></thead><tbody id="rekap-kehadiranBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: CHAT GURU ================= -->
            <section id="view-chat-guru" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Chat Wali Kelas / Guru</h2><p class="text-xs text-slate-400">Komunikasi langsung dengan guru.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Pesan terkirim')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Pesan Baru</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Nama</th><th class="px-4 py-3">Peran</th><th class="px-4 py-3">Pesan Terakhir</th><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="chat-guruBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PENGUMUMAN ================= -->
            <section id="view-pengumuman" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pengumuman Sekolah</h2><p class="text-xs text-slate-400">Informasi resmi dari sekolah.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Judul</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Sumber</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="pengumumanBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KONSULTASI BK ================= -->
            <section id="view-konsultasi-bk" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Konsultasi BK</h2><p class="text-xs text-slate-400">Konsultasi dengan Guru Bimbingan Konseling.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Jadwal konsultasi diajukan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Ajukan Konsultasi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Topik</th><th class="px-4 py-3">Guru BK</th><th class="px-4 py-3">Metode</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="konsultasi-bkBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KALENDER ================= -->
            <section id="view-kalender" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Kalender Akademik</h2><p class="text-xs text-slate-400">Agenda dan kegiatan sekolah.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Agenda</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Keterangan</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="kalenderBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: TOP-UP E-MONEY ================= -->
            <section id="view-topup-emoney" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Top-up E-Money</h2><p class="text-xs text-slate-400">Riwayat pengisian saldo kantin anak.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Top-up diajukan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Top-up Saldo</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Referensi</th><th class="px-4 py-3">Metode</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="topup-emoneyBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: LIMIT JAJAN ================= -->
            <section id="view-limit-jajan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Limit Jajan Harian</h2><p class="text-xs text-slate-400">Pantau pengeluaran jajan harian anak.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Limit harian disimpan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">⚙️ Atur Limit</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Limit Harian</th><th class="px-4 py-3">Terpakai</th><th class="px-4 py-3">Sisa</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="limit-jajanBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧩</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal Wali Murid. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Dashboard Wali Murid</span>, <span class="font-semibold text-slate-600">Tagihan SPP Real-time</span>, dan <span class="font-semibold text-slate-600">Izin / Sakit Online</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard Wali Murid')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('spp','Tagihan SPP Real-time')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Tagihan SPP</button>
                        <button onclick="showView('izin','Izin / Sakit Online')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Izin Online</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="px-4 sm:px-6 py-4 text-center text-xs text-slate-400 border-t border-slate-200">
            © 2026 PT Artificial Intelligence Learning Madani Digital · Portal Wali Murid (Simulasi)
        </footer>
    </div>

    <!-- ============ MODAL: KONFIRMASI BAYAR ============ -->
    <div id="payModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closePayConfirm()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-700 grid place-items-center text-xl">💳</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Konfirmasi Pembayaran</h3><p class="text-xs text-slate-400">Periksa rincian sebelum melanjutkan.</p></div>
            </div>
            <div class="mt-4 bg-slate-50 rounded-2xl p-4 text-sm text-slate-600 space-y-1">
                <p>Metode: <span id="payMethod" class="font-bold text-slate-800">-</span></p>
                <p>Jumlah tagihan: <span id="payCount" class="font-bold text-slate-800">0</span></p>
                <p class="text-base">Total: <span id="payTotal" class="font-heading font-extrabold text-blue-700">Rp 0</span></p>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closePayConfirm()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="confirmPay()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ya, Bayar</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: TOP-UP ============ -->
    <div id="topupModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeTopup()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-emerald-100 text-emerald-700 grid place-items-center text-xl">🪙</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Top-Up E-Money Anak</h3><p class="text-xs text-slate-400">Saldo masuk ke kartu Naufal.</p></div>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-2">
                <button onclick="doTopup('25.000')" class="bg-slate-100 hover:bg-emerald-100 border border-slate-200 text-sm font-bold text-slate-700 py-3 rounded-xl transition-colors">Rp 25.000</button>
                <button onclick="doTopup('50.000')" class="bg-slate-100 hover:bg-emerald-100 border border-slate-200 text-sm font-bold text-slate-700 py-3 rounded-xl transition-colors">Rp 50.000</button>
                <button onclick="doTopup('100.000')" class="bg-slate-100 hover:bg-emerald-100 border border-slate-200 text-sm font-bold text-slate-700 py-3 rounded-xl transition-colors">Rp 100.000</button>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closeTopup()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
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

            if (name === 'spp') { loadKwitansi(); recalc(); }
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

        // ---------- Child selector ----------
        function toggleChildMenu() {
            document.getElementById('topChildMenu').classList.toggle('hidden');
            document.getElementById('sideChildMenu').classList.toggle('hidden');
        }
        function openChildMenuMobile() {
            if (window.innerWidth < 1024) { toggleSidebar(); }
            document.getElementById('sideChildMenu').classList.remove('hidden');
        }
        function selectChild(name, kelas, initials) {
            document.getElementById('topChildName').textContent = name;
            document.getElementById('topChildClass').textContent = 'Kelas ' + kelas;
            document.getElementById('topChildAvatar').textContent = initials;
            document.getElementById('sideChildName').textContent = name;
            document.getElementById('sideChildClass').textContent = 'Kelas ' + kelas;
            document.getElementById('topChildMenu').classList.add('hidden');
            document.getElementById('sideChildMenu').classList.add('hidden');
            showToast('success', 'Menampilkan data ' + name + ' · Kelas ' + kelas);
        }

        // ---------- SPP checkout ----------
        const ADMIN_FEE = 2500;
        function rupiah(n) { return 'Rp ' + n.toLocaleString('id-ID'); }
        function recalc() {
            const checks = document.querySelectorAll('.tagihan-check:checked');
            let total = 0;
            checks.forEach(c => total += parseInt(c.dataset.nom, 10));
            document.getElementById('sumCount').textContent = checks.length;
            document.getElementById('totalHeader').textContent = total.toLocaleString('id-ID');
            const grand = total > 0 ? total + ADMIN_FEE : 0;
            document.getElementById('sumTotal').textContent = rupiah(grand);
            document.getElementById('btnTotal').textContent = rupiah(grand);
            document.getElementById('btnBayar').disabled = total === 0;
            document.getElementById('btnBayar').classList.toggle('opacity-50', total === 0);
            document.getElementById('btnBayar').classList.toggle('cursor-not-allowed', total === 0);
        }
        function pickMethod(el, name) {
            document.querySelectorAll('.payopt').forEach(o => o.classList.remove('selected'));
            el.classList.add('selected');
            document.getElementById('sumMethod').textContent = name;
            el.dataset.method = name;
            window.__payMethod = name;
        }
        function openPayConfirm() {
            const checks = document.querySelectorAll('.tagihan-check:checked');
            if (checks.length === 0) { showToast('warning', 'Pilih minimal satu tagihan'); return; }
            if (!window.__payMethod) { showToast('warning', 'Pilih metode pembayaran terlebih dahulu'); return; }
            let subtotal = 0; checks.forEach(c => subtotal += parseInt(c.dataset.nom, 10));
            document.getElementById('payMethod').textContent = window.__payMethod;
            document.getElementById('payCount').textContent = checks.length;
            document.getElementById('payTotal').textContent = rupiah(subtotal + ADMIN_FEE);
            const m = document.getElementById('payModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closePayConfirm() { const m = document.getElementById('payModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function confirmPay() {
            closePayConfirm();
            showToast('success', 'Pembayaran berhasil via ' + window.__payMethod + '! 🎉');
        }

        // ---------- Kwitansi (skeleton) ----------
        const kwitansiData = [
            { tgl: '20 Sep 2026', ket: 'SPP September 2026', metode: 'VA BCA', nom: 350000, status: 'Lunas' },
            { tgl: '18 Agu 2026', ket: 'SPP Agustus 2026', metode: 'QRIS', nom: 350000, status: 'Lunas' },
            { tgl: '15 Jul 2026', ket: 'Uang Kegiatan Awal Tahun', metode: 'VA Mandiri', nom: 275000, status: 'Lunas' }
        ];
        let kwitansiLoaded = false;
        function loadKwitansi() {
            if (kwitansiLoaded) return;
            const body = document.getElementById('kwitansiBody');
            setTimeout(() => {
                body.innerHTML = kwitansiData.map(r =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 text-slate-500">' + r.tgl + '</td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + r.ket + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r.metode + '</td>'
                    + '<td class="px-4 py-3 text-right font-heading font-extrabold text-slate-800">' + rupiah(r.nom) + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full">' + r.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="showToast(\'success\',\'Kwitansi diunduh\')" class="text-xs font-bold text-navy hover:underline">📄 Kwitansi</button></td>'
                    + '</tr>'
                ).join('');
                kwitansiLoaded = true;
            }, 700);
        }

        // ---------- Izin ----------
        function submitIzin() {
            const tgl = document.getElementById('izinTanggal').value;
            const kat = document.getElementById('izinKategori').value;
            const alasan = document.getElementById('izinAlasan').value.trim();
            if (!tgl || !alasan) { showToast('warning', 'Lengkapi tanggal dan alasan izin'); return; }
            const list = document.getElementById('izinList');
            const el = document.createElement('div');
            el.className = 'border border-slate-100 rounded-2xl p-4';
            el.innerHTML = '<div class="flex items-start justify-between gap-2">'
                + '<div><p class="text-sm font-semibold text-slate-800">' + kat + '</p>'
                + '<p class="text-xs text-slate-400">' + tgl + ' · menunggu persetujuan</p></div>'
                + '<span class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full">Pending</span></div>';
            list.prepend(el);
            document.getElementById('izinTanggal').value = '';
            document.getElementById('izinAlasan').value = '';
            showToast('success', 'Permohonan izin terkirim ke wali kelas');
        }

        // ---------- E-Money ----------
        function saveLimit() {
            const v = document.getElementById('limitJajan').value;
            showToast('success', 'Limit jajan harian disimpan: Rp ' + (v || '0'));
        }
        function openTopup() { const m = document.getElementById('topupModal'); m.classList.remove('hidden'); m.classList.add('flex'); }
        function closeTopup() { const m = document.getElementById('topupModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function doTopup(val) {
            closeTopup();
            showToast('success', 'Top-up Rp ' + val + ' berhasil! Saldo anak bertambah.');
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
            'nilai-erapor': [
                ['Matematika', '88', '85', '—', 'A', 'A'],
                ['Bahasa Indonesia', '85', '84', '—', 'B', 'B'],
                ['IPA', '82', '80', '—', 'B', 'B'],
                ['Bahasa Inggris', '90', '89', '—', 'A', 'A']
            ],
            'hasil-cbt': [
                ['PTS Ganjil', 'Matematika', '21 Okt 2026', '84', '3', '~Selesai'],
                ['PTS Ganjil', 'IPA', '22 Okt 2026', '80', '7', '~Selesai'],
                ['Kuis Limit', 'Matematika', '18 Okt 2026', '—', '—', '~Draft']
            ],
            'jadwal': [
                ['Senin', '07:15 - 08:45', 'Matematika', 'Ibu Ratna', 'R-101'],
                ['Senin', '08:45 - 10:15', 'Bahasa Indonesia', 'Bpk. Andi', 'R-101'],
                ['Selasa', '07:15 - 08:45', 'IPA', 'Ibu Dewi', 'Lab IPA'],
                ['Rabu', '10:15 - 11:45', 'Bahasa Inggris', 'Ibu Sari', 'R-102']
            ],
            'tugas-materi': [
                ['LKS Fungsi Kuadrat', 'Matematika', 'Materi', '20 Okt 2026', '~Selesai'],
                ['Tugas Turunan', 'Matematika', 'Tugas', '22 Okt 2026', '~Menunggu'],
                ['Ringkasan Bab IPA', 'IPA', 'Tugas', '23 Okt 2026', '~Menunggu']
            ],
            'prestasi-tahfidz': [
                ['Prestasi', 'Juara 1 OSN Matematika', 'Kabupaten', '2026', '~Terverifikasi'],
                ['Tahfidz', 'Surah An-Naba (Juz 30)', '2 halaman', '2026', '~Selesai'],
                ['Prestasi', 'Juara 2 Lomba Pidato', 'Kecamatan', '2025', '~Terverifikasi']
            ],
            'kwitansi': [
                ['KW-2026-1021', '05 Okt 2026', 'SPP Oktober', 'Rp 350.000', '~Selesai'],
                ['KW-2026-1002', '05 Sep 2026', 'SPP September', 'Rp 350.000', '~Selesai'],
                ['KW-2026-1102', '05 Nov 2026', 'SPP November', 'Rp 350.000', '~Menunggu']
            ],
            'pengingat-tunggakan': [
                ['September 2026', 'Rp 350.000', '05 Sep 2026', 'WhatsApp', '~Selesai'],
                ['Oktober 2026', 'Rp 350.000', '05 Okt 2026', 'WhatsApp', '~Selesai'],
                ['November 2026', 'Rp 350.000', '05 Nov 2026', 'WhatsApp', '~Menunggu']
            ],
            'notifikasi-hadir': [
                ['19 Okt 2026', '06:58', 'Presensi Masuk', 'Gerbang Utama', '~OK'],
                ['19 Okt 2026', '07:15', 'Masuk Kelas', 'R-101', '~OK'],
                ['19 Okt 2026', '14:05', 'Presensi Pulang', 'Gerbang Utama', '~OK']
            ],
            'rekap-kehadiran': [
                ['September 2026', '22', '1', '0', '0', '96%'],
                ['Oktober 2026', '15', '0', '1', '0', '94%'],
                ['Agustus 2026', '24', '0', '0', '1', '96%']
            ],
            'chat-guru': [
                ['Ibu Ratna', 'Wali Kelas', 'Terima kasih infonya Bu', '09:20', '~Aktif'],
                ['Bpk. Andi', 'Guru', 'Ananda aktif di kelas', '08:45', '~Aktif'],
                ['Ibu Dewi', 'Guru', 'Nilai PTS sudah keluar', 'Kemarin', '~Selesai']
            ],
            'pengumuman': [
                ['Persiapan PTS Ganjil', 'Akademik', '18 Okt 2026', 'Sekolah', '~Terverifikasi'],
                ['Libur Maulid Nabi', 'Umum', '16 Okt 2026', 'Sekolah', '~Terverifikasi'],
                ['Rapat Wali Murid', 'Umum', '20 Okt 2026', 'Sekolah', '~Menunggu']
            ],
            'konsultasi-bk': [
                ['17 Okt 2026', 'Motivasi belajar', 'Bpk. Hendra, S.Psi.', 'Tatap Muka', '~Selesai'],
                ['18 Okt 2026', 'Manajemen waktu', 'Bpk. Hendra, S.Psi.', 'Online', '~Menunggu'],
                ['20 Okt 2026', 'Konsultasi karier', 'Bpk. Hendra, S.Psi.', 'Online', '~Menunggu']
            ],
            'kalender': [
                ['20 Okt 2026', 'Rapat Wali Murid', 'Sekolah', 'Aula', '~Terverifikasi'],
                ['21-22 Okt 2026', 'Penilaian Tengah Semester', 'Akademik', 'Seluruh kelas', '~Terverifikasi'],
                ['25 Okt 2026', 'Peringatan Maulid Nabi', 'Libur', '—', '~Terverifikasi']
            ],
            'topup-emoney': [
                ['15 Okt 2026', 'TRX-8841', 'Transfer Bank', 'Rp 100.000', '~Selesai'],
                ['08 Okt 2026', 'TRX-8712', 'Virtual Account', 'Rp 50.000', '~Selesai'],
                ['18 Okt 2026', 'TRX-8900', 'Transfer Bank', 'Rp 75.000', '~Menunggu']
            ],
            'limit-jajan': [
                ['19 Okt 2026', 'Rp 20.000', 'Rp 12.000', 'Rp 8.000', '~Aktif'],
                ['18 Okt 2026', 'Rp 20.000', 'Rp 18.500', 'Rp 1.500', '~Aktif'],
                ['17 Okt 2026', 'Rp 20.000', 'Rp 20.000', 'Rp 0', '~Selesai']
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
