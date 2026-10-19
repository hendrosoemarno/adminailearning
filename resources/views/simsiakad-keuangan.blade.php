<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Keuangan &amp; Bendahara · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal Keuangan & Bendahara SIAKAD PLUS — pusat pengelolaan arus kas, penagihan SPP, pemrosesan pembayaran otomatis, dan pencatatan akuntansi sekolah: Manajemen Penagihan, Payment Engine, dan Laporan & Akuntansi.">
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
                <p class="text-[10px] text-slate-500">Keuangan · Bendahara</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Scrollable nav -->
        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <!-- Dashboard -->
            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard Keuangan</span>
            </button>

            <!-- 1. Manajemen Penagihan -->
            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💳</span><span class="flex-1 text-left">Manajemen Penagihan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="tagihan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tagihan SPP Massal</button>
                    <button data-view="tagihan-insidental" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tagihan Insidental &amp; Khusus</button>
                    <button data-view="tagihan" data-title="Potongan Beasiswa & Diskon" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Potongan Beasiswa &amp; Diskon</button>
                    <button data-view="denda" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Denda Keterlambatan</button>
                    <button data-view="kwitansi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kwitansi Digital</button>
                    <button data-view="tunggakan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengingat Tunggakan WA</button>
                </div>
            </div>

            <!-- 2. Pemrosesan Pembayaran -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🏧</span><span class="flex-1 text-left">Pemrosesan Pembayaran</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="virtual-account" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Virtual Account Multi-Bank</button>
                    <button data-view="qris" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> QRIS &amp; E-Wallet</button>
                    <button data-view="gerai" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Gerai Minimarket</button>
                    <button data-view="rekonsiliasi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekonciliasi Otomatis</button>
                    <button data-view="refund" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Refund &amp; Koreksi Transaksi</button>
                </div>
            </div>

            <!-- 3. Laporan & Akuntansi -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📖</span><span class="flex-1 text-left">Laporan &amp; Akuntansi</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="arus-kas" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Arus Kas Harian / Cash Flow</button>
                    <button data-view="tunggakan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekap Tunggakan Per Kelas</button>
                    <button data-view="jurnal-umum" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Jurnal Umum &amp; Buku Besar</button>
                    <button data-view="tutup-buku" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tutup &amp; Buka Tahun Buku</button>
                    <button data-view="ekspor-laporan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Ekspor Laporan</button>
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Keuangan · Bendahara</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard Keuangan</h1>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <!-- Saldo kas + periode -->
                    <div class="hidden md:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Saldo Kas/Bank</p>
                            <p class="text-sm font-heading font-extrabold text-emerald-700">Rp 1.284.500.000</p>
                        </div>
                        <span class="text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-200 px-2.5 py-1 rounded-full">Periode 2026/2027</span>
                    </div>
                    <!-- Notif -->
                    <button onclick="showToast('info', '3 pengingat tunggakan terbaru')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Profile -->
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">BD</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Bendahara Sekolah</p>
                            <p class="text-[10px] text-slate-400">SMAN 1 Nusantara</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-4 sm:p-6">

            <!-- ================= VIEW: DASHBOARD ================= -->
            <section id="view-dashboard" class="view active">

                <!-- Header banner -->
                <div class="rounded-3xl hero-gradient text-white p-5 sm:p-6 relative overflow-hidden">
                    <div class="absolute inset-0 grid-pattern"></div>
                    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center gap-4">
                        <div>
                            <p class="text-sm text-white/85">Total Saldo Kas &amp; Bank Sekolah</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">Rp 1.284.500.000</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">Periode Tahun Buku 2026/2027</span>
                                <span class="bg-emerald2 px-2.5 py-1 rounded-full text-white">● Periode Aktif</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('tagihan','Tagihan SPP Massal')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">🧾 Buat Tagihan Massal</button>
                            <button onclick="showToast('info','Membuka form input kas keluar...')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">💸 Input Kas Keluar</button>
                        </div>
                    </div>
                </div>

                <!-- Stat Cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">📈</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Oktober</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Pemasukan Bulan Ini</p>
                        <p class="font-heading font-extrabold text-xl text-slate-900">Rp 486.750.000</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">📊</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">SPP</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Tagihan SPP Terbayar</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">87%</p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-blue-600 rounded-full" style="width:87%"></div></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-600">⚠️</span>
                            <span class="text-[11px] font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">Menunggak</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Tunggakan SPP</p>
                        <p class="font-heading font-extrabold text-xl text-slate-900">Rp 42.350.000</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-sky-100 grid place-items-center text-sky-700">✅</span>
                            <span class="text-[11px] font-bold text-sky-700 bg-sky-50 px-2 py-0.5 rounded-full">Hari ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Transaksi Terverifikasi</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">128</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <!-- LEFT -->
                    <div class="lg:col-span-2 space-y-4">
                        <!-- Chart arus kas -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Arus Kas 6 Bulan Terakhir</h2><p class="text-xs text-slate-400">Pemasukan vs pengeluaran</p></div>
                                <div class="flex items-center gap-3 text-[11px] font-semibold">
                                    <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-blue-600"></span> Masuk</span>
                                    <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-red-400"></span> Keluar</span>
                                </div>
                            </div>
                            <div class="mt-6 flex items-end gap-3 sm:gap-6 h-48">
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <div class="w-full flex items-end justify-center gap-1 h-40">
                                        <div class="w-4 bg-blue-600 rounded-t" style="height:62%"></div>
                                        <div class="w-4 bg-red-400 rounded-t" style="height:38%"></div>
                                    </div><span class="text-[10px] font-semibold text-slate-400">Mei</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <div class="w-full flex items-end justify-center gap-1 h-40">
                                        <div class="w-4 bg-blue-600 rounded-t" style="height:70%"></div>
                                        <div class="w-4 bg-red-400 rounded-t" style="height:30%"></div>
                                    </div><span class="text-[10px] font-semibold text-slate-400">Jun</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <div class="w-full flex items-end justify-center gap-1 h-40">
                                        <div class="w-4 bg-blue-600 rounded-t" style="height:55%"></div>
                                        <div class="w-4 bg-red-400 rounded-t" style="height:42%"></div>
                                    </div><span class="text-[10px] font-semibold text-slate-400">Jul</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <div class="w-full flex items-end justify-center gap-1 h-40">
                                        <div class="w-4 bg-blue-600 rounded-t" style="height:80%"></div>
                                        <div class="w-4 bg-red-400 rounded-t" style="height:35%"></div>
                                    </div><span class="text-[10px] font-semibold text-slate-400">Agu</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <div class="w-full flex items-end justify-center gap-1 h-40">
                                        <div class="w-4 bg-blue-600 rounded-t" style="height:74%"></div>
                                        <div class="w-4 bg-red-400 rounded-t" style="height:40%"></div>
                                    </div><span class="text-[10px] font-semibold text-slate-400">Sep</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <div class="w-full flex items-end justify-center gap-1 h-40">
                                        <div class="w-4 bg-blue-600 rounded-t" style="height:92%"></div>
                                        <div class="w-4 bg-red-400 rounded-t" style="height:44%"></div>
                                    </div><span class="text-[10px] font-semibold text-slate-400">Okt</span>
                                </div>
                            </div>
                        </div>

                        <!-- Transaksi masuk terbaru -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Transaksi Masuk Terbaru</h2><p class="text-xs text-slate-400">Real-time payment log</p></div>
                                <button onclick="loadTrx()" class="text-[11px] font-bold text-navy">Muat ulang</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[760px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr>
                                            <th class="px-4 py-3">Waktu</th>
                                            <th class="px-4 py-3">Siswa</th>
                                            <th class="px-4 py-3">Kelas</th>
                                            <th class="px-4 py-3">Channel</th>
                                            <th class="px-4 py-3 text-right">Nominal</th>
                                            <th class="px-4 py-3">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="trxBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="trxEmpty" class="hidden py-16 text-center">
                                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🧾</div>
                                <p class="mt-4 font-heading font-bold text-slate-700">Belum ada transaksi masuk</p>
                                <p class="text-sm text-slate-400">Log pembayaran real-time akan tampil di sini.</p>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="space-y-4">
                        <!-- Pelunasan per kelas -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Pelunasan SPP Per Kelas</h2>
                            <div class="mt-4 space-y-3">
                                <div>
                                    <div class="flex justify-between text-xs"><span class="font-semibold text-slate-700">Kelas 10-A</span><span class="text-slate-500">95%</span></div>
                                    <div class="mt-1 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500 rounded-full" style="width:95%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs"><span class="font-semibold text-slate-700">Kelas 10-B</span><span class="text-slate-500">88%</span></div>
                                    <div class="mt-1 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500 rounded-full" style="width:88%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs"><span class="font-semibold text-slate-700">Kelas 11-C</span><span class="text-slate-500">72%</span></div>
                                    <div class="mt-1 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-amber-500 rounded-full" style="width:72%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs"><span class="font-semibold text-slate-700">Kelas 12-D</span><span class="text-slate-500">64%</span></div>
                                    <div class="mt-1 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-amber-500 rounded-full" style="width:64%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs"><span class="font-semibold text-slate-700">Kelas 8-B</span><span class="text-slate-500">58%</span></div>
                                    <div class="mt-1 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-red-500 rounded-full" style="width:58%"></div></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pengingat WA massal -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-lg">📲</span>
                                <div>
                                    <h2 class="font-heading font-bold text-slate-800">Kirim Pengingat WA Massal</h2>
                                    <p class="text-[11px] text-slate-400">Penagihan ke orang tua</p>
                                </div>
                            </div>
                            <div class="mt-4 bg-amber-50 border border-amber-200 rounded-2xl p-4">
                                <p class="text-sm text-amber-900"><span class="font-heading font-extrabold">86 siswa</span> memiliki tagihan jatuh tempo</p>
                                <p class="text-xs text-amber-800 mt-1">Total tunggakan Rp 42.350.000 · periode Sep–Okt</p>
                            </div>
                            <button onclick="showView('tunggakan','Rekap Tunggakan Per Kelas')" class="mt-4 w-full bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📲 Kirim WA Tagihan Massal</button>
                            <p class="mt-2 text-[11px] text-slate-400 text-center">Terkirim via WhatsApp Business API.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: TAGIHAN MASSAL ================= -->
            <section id="view-tagihan" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Tagihan SPP Massal &amp; Konfigurasi Beasiswa</h2>
                    <p class="text-xs text-slate-400">Generate tagihan bulanan per kelas/siswa, atur beasiswa/diskon dan denda.</p>
                </div>

                <!-- Header action / filter -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Filter Kelas / Rombel</label>
                        <select id="inKelas" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option>Semua Kelas</option>
                            <option>Kelas 10-A</option>
                            <option>Kelas 10-B</option>
                            <option>Kelas 11-C</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Bulan / Tahun Tagihan</label>
                        <select id="inBulan" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option>Oktober 2026</option>
                            <option>November 2026</option>
                            <option>Desember 2026</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nominal Base SPP</label>
                        <input id="inBase" type="text" value="350000" oninput="applyBase()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                    </div>
                    <div class="flex items-end gap-2">
                        <button onclick="recalcTagihan()" class="flex-1 bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔄 Terapkan</button>
                    </div>
                </div>

                <!-- Table invoicing -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[980px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3"><input id="selectAll" type="checkbox" class="accent" checked onchange="toggleAll(this)"></th>
                                    <th class="px-4 py-3">NISN</th>
                                    <th class="px-4 py-3">Nama Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3 text-right">Base Tagihan</th>
                                    <th class="px-4 py-3">Potongan Beasiswa/Diskon</th>
                                    <th class="px-4 py-3 text-right">Denda (+Rp)</th>
                                    <th class="px-4 py-3 text-right">Total Net</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="invoicingBody" class="divide-y divide-slate-50">
                                <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                            <tfoot class="bg-slate-50 border-t border-slate-100">
                                <tr>
                                    <td colspan="7" class="px-4 py-3 text-right font-semibold text-slate-600">Total Net Tagihan Terpilih</td>
                                    <td class="px-4 py-3 text-right font-heading font-extrabold text-slate-900" id="grandTotal">Rp 0</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-4 flex flex-col sm:flex-row gap-2 sm:justify-end">
                    <button onclick="showToast('info','Menampilkan pratinjau tagihan...')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-5 py-3 rounded-xl transition-colors">👁️ Preview Tagihan</button>
                    <button onclick="openPublish()" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-5 py-3 rounded-xl transition-colors">📨 Kirim WA Notifikasi</button>
                    <button onclick="openPublish()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-6 py-3 rounded-xl transition-colors">🧾 Terbitkan Tagihan &amp; VA Massal</button>
                </div>
            </section>

            <!-- ================= VIEW: TUNGGAKAN ================= -->
            <section id="view-tunggakan" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Rekap Tunggakan &amp; Pengingat WhatsApp</h2>
                    <p class="text-xs text-slate-400">Pantau tunggakan per siswa dan kirim pengingat ke orang tua via WA.</p>
                </div>

                <!-- Summary -->
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">🧾</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Draf</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Draf Tagihan Belum Lunas</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">124 <span class="text-sm font-bold text-slate-500">tagihan</span></p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-600">⚠️</span>
                            <span class="text-[11px] font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">Total</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Nominal Tunggakan</p>
                        <p class="font-heading font-extrabold text-xl text-slate-900">Rp 42.350.000</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-sky-100 grid place-items-center text-sky-700">👥</span>
                            <span class="text-[11px] font-bold text-sky-700 bg-sky-50 px-2 py-0.5 rounded-full">Siswa</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Jumlah Siswa Menunggak</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">86 <span class="text-sm font-bold text-slate-500">siswa</span></p>
                    </div>
                </div>

                <!-- Table tunggakan -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Data Tunggakan Siswa</h3>
                        <button onclick="sendAllWA()" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-2 rounded-lg transition-colors">📲 Kirim Semua</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[920px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Nama Orang Tua</th>
                                    <th class="px-4 py-3">No. WA Ortu</th>
                                    <th class="px-4 py-3">Bulan Tunggakan</th>
                                    <th class="px-4 py-3 text-right">Total Tunggakan</th>
                                    <th class="px-4 py-3">Status WA</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tunggakanBody" class="divide-y divide-slate-50">
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="tunggakanEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🎉</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada tunggakan</p>
                        <p class="text-sm text-slate-400">Semua tagihan telah lunas. Kerja bagus!</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: TAGIHAN INSIDENTAL ================= -->
            <section id="view-tagihan-insidental" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Tagihan Insidental &amp; Khusus</h2><p class="text-xs text-slate-400">Tagihan di luar SPP rutin.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Tagihan insidental dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buat Tagihan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Jenis Tagihan</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Jatuh Tempo</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="tagihan-insidentalBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: DENDA ================= -->
            <section id="view-denda" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Denda Keterlambatan</h2><p class="text-xs text-slate-400">Denda otomatis untuk tagihan yang lewat jatuh tempo.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Tagihan</th><th class="px-4 py-3">Hari Terlambat</th><th class="px-4 py-3">Denda</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="dendaBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KWITANSI ================= -->
            <section id="view-kwitansi" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Kwitansi Digital</h2><p class="text-xs text-slate-400">Kwitansi pembayaran digital yang terekam otomatis.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Mengunduh rekap kwitansi...')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Unduh Rekap</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">No. Kwitansi</th><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="kwitansiBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: VIRTUAL ACCOUNT ================= -->
            <section id="view-virtual-account" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Virtual Account Multi-Bank</h2><p class="text-xs text-slate-400">Nomor VA per siswa di berbagai bank.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Bank</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Biaya Admin</th><th class="px-4 py-3">Status</th><th class="px-4 py-3">Keterangan</th></tr></thead><tbody id="virtual-accountBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: QRIS & E-WALLET ================= -->
            <section id="view-qris" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">QRIS &amp; E-Wallet</h2><p class="text-xs text-slate-400">Pembayaran melalui QRIS dan dompet digital.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Metode</th><th class="px-4 py-3">Merchant</th><th class="px-4 py-3">Volume Hari Ini</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="qrisBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GERAI ================= -->
            <section id="view-gerai" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Gerai Minimarket</h2><p class="text-xs text-slate-400">Setoran dan transaksi gerai di lingkungan sekolah.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Gerai</th><th class="px-4 py-3">Lokasi</th><th class="px-4 py-3">Setoran Hari Ini</th><th class="px-4 py-3">Operator</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="geraiBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: REKONSILIASI ================= -->
            <section id="view-rekonsiliasi" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Rekonciliasi Otomatis</h2><p class="text-xs text-slate-400">Pencocokan transaksi bank dengan tagihan.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Rekonsiliasi dijalankan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">🔄 Jalankan Rekonsiliasi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Sumber</th><th class="px-4 py-3">Total Transaksi</th><th class="px-4 py-3">Cocok</th><th class="px-4 py-3">Selisih</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="rekonsiliasiBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: REFUND ================= -->
            <section id="view-refund" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Refund &amp; Koreksi Transaksi</h2><p class="text-xs text-slate-400">Pengembalian dana dan koreksi transaksi.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Pengajuan refund dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Ajukan Refund</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Alasan</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="refundBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: ARUS KAS ================= -->
            <section id="view-arus-kas" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Arus Kas Harian / Cash Flow</h2><p class="text-xs text-slate-400">Pergerakan kas masuk dan keluar.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Keterangan</th><th class="px-4 py-3">Kas Masuk</th><th class="px-4 py-3">Kas Keluar</th><th class="px-4 py-3">Saldo</th></tr></thead><tbody id="arus-kasBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: JURNAL UMUM ================= -->
            <section id="view-jurnal-umum" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Jurnal Umum &amp; Buku Besar</h2><p class="text-xs text-slate-400">Pencatatan jurnal dan buku besar akuntansi.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">No. Jurnal</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Keterangan</th><th class="px-4 py-3">Debit</th><th class="px-4 py-3">Kredit</th></tr></thead><tbody id="jurnal-umumBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: TUTUP BUKU ================= -->
            <section id="view-tutup-buku" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Tutup &amp; Buka Tahun Buku</h2><p class="text-xs text-slate-400">Kelola periode tahun buku.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Tahun buku baru dibuka')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buka Tahun Buku</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Periode</th><th class="px-4 py-3">Tanggal Mulai</th><th class="px-4 py-3">Tanggal Selesai</th><th class="px-4 py-3">Status</th><th class="px-4 py-3">Dikelola Oleh</th></tr></thead><tbody id="tutup-bukuBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: EKSPOR LAPORAN ================= -->
            <section id="view-ekspor-laporan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Ekspor Laporan</h2><p class="text-xs text-slate-400">Ekspor laporan keuangan ke Excel / PDF.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Menyiapkan berkas ekspor...')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Ekspor Sekarang</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Nama Laporan</th><th class="px-4 py-3">Periode</th><th class="px-4 py-3">Format</th><th class="px-4 py-3">Dibuat</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="ekspor-laporanBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧩</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal Keuangan. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Dashboard Keuangan</span>, <span class="font-semibold text-slate-600">Tagihan SPP Massal</span>, dan <span class="font-semibold text-slate-600">Rekap Tunggakan</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard Keuangan')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('tagihan','Tagihan SPP Massal')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Tagihan Massal</button>
                        <button onclick="showView('tunggakan','Rekap Tunggakan Per Kelas')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Tunggakan</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="px-4 sm:px-6 py-4 text-center text-xs text-slate-400 border-t border-slate-200">
            © 2026 PT Artificial Intelligence Learning Madani Digital · Portal Keuangan (Simulasi)
        </footer>
    </div>

    <!-- ============ MODAL: TERBITKAN TAGIHAN ============ -->
    <div id="publishModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closePublish()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-700 grid place-items-center text-xl">🧾</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Terbitkan Tagihan Massal?</h3><p class="text-xs text-slate-400">Tagihan &amp; Virtual Account akan dibuat otomatis.</p></div>
            </div>
            <div class="mt-4 bg-slate-50 rounded-2xl p-4 text-sm text-slate-600 space-y-1">
                <p>Periode: <span class="font-bold text-slate-800">Oktober 2026</span></p>
                <p>Jumlah siswa terpilih: <span id="pubCount" class="font-bold text-slate-800">0</span></p>
                <p class="text-base">Total net: <span id="pubTotal" class="font-heading font-extrabold text-blue-700">Rp 0</span></p>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closePublish()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="confirmPublish()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ya, Terbitkan</button>
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

            if (name === 'dashboard') loadTrx();
            if (name === 'tagihan') loadInvoicing();
            if (name === 'tunggakan') loadTunggakan();
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

        // ---------- Dashboard: transaksi ----------
        const trxData = [
            { waktu: '09:42', siswa: 'Keira Faza Aishanaya', kelas: '10-A', channel: 'VA BCA', nom: 350000 },
            { waktu: '09:38', siswa: 'Bagas Pratama', kelas: '10-B', channel: 'QRIS', nom: 350000 },
            { waktu: '09:31', siswa: 'Citra Ayu Lestari', kelas: '11-C', channel: 'DANA', nom: 350000 },
            { waktu: '09:20', siswa: 'Dimas Anggara', kelas: '12-D', channel: 'VA Mandiri', nom: 350000 },
            { waktu: '09:15', siswa: 'Eka Nurhaliza', kelas: '10-A', channel: 'Cash', nom: 350000 },
            { waktu: '09:02', siswa: 'Fajar Ramadhan', kelas: '8-B', channel: 'Indomaret', nom: 350000 }
        ];
        const channelBadge = { 'VA BCA': 'bg-blue-50 text-blue-700', 'VA Mandiri': 'bg-amber-50 text-amber-700', 'QRIS': 'bg-sky-50 text-sky-700', 'DANA': 'bg-sky-50 text-sky-700', 'Cash': 'bg-slate-100 text-slate-600', 'Indomaret': 'bg-red-50 text-red-700' };
        let trxLoaded = false;
        function loadTrx() {
            if (trxLoaded) return;
            const body = document.getElementById('trxBody');
            setTimeout(() => {
                body.innerHTML = trxData.map(r =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 text-slate-500">' + r.waktu + '</td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + r.siswa + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r.kelas + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (channelBadge[r.channel] || 'bg-slate-100 text-slate-600') + ' px-2.5 py-1 rounded-full">' + r.channel + '</span></td>'
                    + '<td class="px-4 py-3 text-right font-heading font-extrabold text-slate-800">' + rupiah(r.nom) + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full">✓ Success</span></td>'
                    + '</tr>'
                ).join('');
                trxLoaded = true;
            }, 700);
        }

        // ---------- Tagihan massal ----------
        const siswaInvoicing = [
            { nisn: '0071234501', nama: 'Keira Faza Aishanaya', kelas: '10-A', diskon: '0', denda: 0, status: 'Belum diterbitkan' },
            { nisn: '0071234502', nama: 'Bagas Pratama', kelas: '10-A', diskon: '0', denda: 0, status: 'Belum diterbitkan' },
            { nisn: '0071234503', nama: 'Citra Ayu Lestari', kelas: '10-B', diskon: 'saudara', denda: 0, status: 'Belum diterbitkan' },
            { nisn: '0061234504', nama: 'Dimas Anggara', kelas: '11-C', diskon: 'beasiswa', denda: 25000, status: 'Belum diterbitkan' },
            { nisn: '0071234505', nama: 'Eka Nurhaliza', kelas: '10-A', diskon: '0', denda: 0, status: 'Sudah diterbitkan' }
        ];
        const diskonNominal = { '0': 0, 'saudara': 50000, 'beasiswa': 175000 };
        let invoicingLoaded = false;
        function loadInvoicing() {
            if (invoicingLoaded) { recalcTagihan(); return; }
            const body = document.getElementById('invoicingBody');
            setTimeout(() => {
                body.innerHTML = siswaInvoicing.map((s, i) =>
                    '<tr class="hover:bg-slate-50/70 invoice-row" data-i="' + i + '">'
                    + '<td class="px-4 py-3"><input type="checkbox" class="accent inv-check" checked onchange="recalcTagihan()"></td>'
                    + '<td class="px-4 py-3 text-slate-500">' + s.nisn + '</td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + s.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + s.kelas + '</td>'
                    + '<td class="px-4 py-3 text-right text-slate-600 inv-base">' + rupiah(getBase()) + '</td>'
                    + '<td class="px-4 py-3"><select class="bg-slate-100 rounded-lg px-2 py-1.5 text-xs outline-none text-slate-700 inv-diskon" onchange="recalcTagihan()">'
                    + '<option value="0"' + (s.diskon === '0' ? ' selected' : '') + '>Tidak ada</option>'
                    + '<option value="saudara"' + (s.diskon === 'saudara' ? ' selected' : '') + '>Saudara Kandung (-Rp 50.000)</option>'
                    + '<option value="beasiswa"' + (s.diskon === 'beasiswa' ? ' selected' : '') + '>Beasiswa (-Rp 175.000)</option>'
                    + '</select></td>'
                    + '<td class="px-4 py-3 text-right"><input type="number" value="' + s.denda + '" min="0" class="w-24 bg-slate-100 rounded-lg px-2 py-1.5 text-xs text-right outline-none text-slate-700 inv-denda" oninput="recalcTagihan()"></td>'
                    + '<td class="px-4 py-3 text-right font-heading font-extrabold text-slate-900 inv-net">Rp 0</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (s.status === 'Sudah diterbitkan' ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-600') + ' px-2.5 py-1 rounded-full">' + s.status + '</span></td>'
                    + '</tr>'
                ).join('');
                invoicingLoaded = true;
                recalcTagihan();
                showToast('success', 'Data siswa kelas 10-A dimuat');
            }, 700);
        }

        function getBase() { return parseInt(document.getElementById('inBase').value, 10) || 0; }
        function applyBase() { document.querySelectorAll('.inv-base').forEach(el => el.textContent = rupiah(getBase())); recalcTagihan(); }

        function toggleAll(cb) { document.querySelectorAll('.inv-check').forEach(c => c.checked = cb.checked); recalcTagihan(); }

        function recalcTagihan() {
            const rows = document.querySelectorAll('.invoice-row');
            let grand = 0, count = 0;
            rows.forEach(r => {
                const checked = r.querySelector('.inv-check').checked;
                const diskon = diskonNominal[r.querySelector('.inv-diskon').value] || 0;
                const denda = parseInt(r.querySelector('.inv-denda').value, 10) || 0;
                const net = getBase() - diskon + denda;
                r.querySelector('.inv-net').textContent = rupiah(net);
                if (checked) { grand += net; count++; }
            });
            document.getElementById('grandTotal').textContent = rupiah(grand);
            window.__pubCount = count;
            window.__pubTotal = grand;
        }

        function openPublish() {
            if (!invoicingLoaded) { showToast('warning', 'Data tagihan belum dimuat'); return; }
            document.getElementById('pubCount').textContent = window.__pubCount || 0;
            document.getElementById('pubTotal').textContent = rupiah(window.__pubTotal || 0);
            const m = document.getElementById('publishModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closePublish() { const m = document.getElementById('publishModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function confirmPublish() {
            closePublish();
            showToast('success', (window.__pubCount || 0) + ' tagihan berhasil diterbitkan & VA massal dibuat');
        }

        // ---------- Tunggakan ----------
        const tunggakanData = [
            { nama: 'Dimas Anggara', kelas: '11-C', ortu: 'Bpk. Sugeng', wa: '0812-3456-7801', bulan: 'Sep, Okt', total: 700000, status: 'Pending' },
            { nama: 'Fajar Ramadhan', kelas: '8-B', ortu: 'Ibu Ratna', wa: '0812-3456-7802', bulan: 'Agu, Sep, Okt', total: 1050000, status: 'Failed' },
            { nama: 'Gita Puspita Sari', kelas: '10-A', ortu: 'Bpk. Hadi', wa: '0812-3456-7803', bulan: 'Okt', total: 350000, status: 'Sent' },
            { nama: 'Hendra Wijaya', kelas: '12-D', ortu: 'Ibu Yuni', wa: '0812-3456-7804', bulan: 'Sep, Okt', total: 700000, status: 'Pending' }
        ];
        const waBadge = { 'Sent': 'bg-emerald-100 text-emerald-800', 'Pending': 'bg-amber-100 text-amber-800', 'Failed': 'bg-red-100 text-red-800' };
        let tunggakanLoaded = false;
        function loadTunggakan() {
            if (tunggakanLoaded) return;
            const body = document.getElementById('tunggakanBody');
            setTimeout(() => {
                body.innerHTML = tunggakanData.map((t, i) =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + t.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + t.kelas + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + t.ortu + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + t.wa + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + t.bulan + '</td>'
                    + '<td class="px-4 py-3 text-right font-heading font-extrabold text-slate-900">' + rupiah(t.total) + '</td>'
                    + '<td class="px-4 py-3"><span class="wa-badge text-[11px] font-bold ' + waBadge[t.status] + ' px-2.5 py-1 rounded-full">' + t.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="kirimWA(this,' + i + ')" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-2 rounded-lg transition-colors">📲 Kirim WA</button></td>'
                    + '</tr>'
                ).join('');
                tunggakanLoaded = true;
            }, 700);
        }
        function setWaStatus(row, status) {
            const span = row.querySelector('.wa-badge');
            span.textContent = status;
            span.className = 'wa-badge text-[11px] font-bold ' + waBadge[status] + ' px-2.5 py-1 rounded-full';
        }
        function kirimWA(btn, i) {
            const row = btn.closest('tr');
            btn.textContent = '...'; btn.classList.add('opacity-60'); btn.disabled = true;
            setTimeout(() => {
                setWaStatus(row, 'Sent');
                btn.textContent = '📲 Kirim Ulang'; btn.classList.remove('opacity-60'); btn.disabled = false;
                showToast('success', 'Pengingat WA terkirim ke ' + tunggakanData[i].ortu);
            }, 800);
        }
        function sendAllWA() {
            if (!document.getElementById('tunggakanBody').querySelector('.wa-badge')) { showToast('warning', 'Data tunggakan belum dimuat'); return; }
            document.querySelectorAll('#tunggakanBody tr').forEach(r => { if (r.querySelector('.wa-badge')) setWaStatus(r, 'Sent'); });
            showToast('success', 'Pengingat WA massal terkirim ke semua orang tua');
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
            'tagihan-insidental': [
                ['Study Tour 2026', 'X-A', 'Rp 250.000', '10 Nov 2026', '~Menunggu'],
                ['Seragam Olahraga', 'X-A', 'Rp 150.000', '15 Nov 2026', '~Terverifikasi'],
                ['Buku Paket Semester 2', 'X-A', 'Rp 200.000', '01 Des 2026', '~Draft']
            ],
            'denda': [
                ['Naufal Abdullaah', 'X-A', 'SPP Oktober', '5', 'Rp 12.500', '~Menunggu'],
                ['Aisyah Zahra', 'VIII-B', 'SPP Oktober', '0', 'Rp 0', '~Selesai'],
                ['Raka Pratama', 'X-B', 'SPP September', '10', 'Rp 25.000', '~Menunggu']
            ],
            'kwitansi': [
                ['KW-2026-1021', 'Naufal Abdullaah', 'SPP Oktober', 'Rp 350.000', '05 Okt 2026', '~Selesai'],
                ['KW-2026-1022', 'Aisyah Zahra', 'SPP Oktober', 'Rp 300.000', '06 Okt 2026', '~Selesai'],
                ['KW-2026-1023', 'Raka Pratama', 'SPP September', 'Rp 350.000', '07 Sep 2026', '~Selesai']
            ],
            'virtual-account': [
                ['Bank Mandiri', 'Rp 350.000', 'Rp 2.500', '~Aktif', 'VA per siswa'],
                ['Bank BRI', 'Rp 350.000', 'Rp 2.000', '~Aktif', 'VA per siswa'],
                ['Bank BNI', 'Rp 350.000', 'Rp 2.500', '~Menunggu', 'Aktivasi']
            ],
            'qris': [
                ['QRIS', 'SPP Sekolah', '42', 'Rp 14.700.000', '~Aktif'],
                ['GoPay', 'Kantin', '18', 'Rp 1.250.000', '~Aktif'],
                ['OVO', 'Koperasi', '9', 'Rp 640.000', '~Aktif']
            ],
            'gerai': [
                ['Minimarket Sekolah', 'Gedung A', 'Rp 1.250.000', 'Bu Rina', '~Aktif'],
                ['Koperasi Siswa', 'Gedung B', 'Rp 640.000', 'Pak Dedi', '~Aktif'],
                ['Kantin Utama', 'Kantin', 'Rp 2.100.000', 'Bu Sari', '~Aktif']
            ],
            'rekonsiliasi': [
                ['19 Okt 2026', 'Virtual Account', '42', '42', 'Rp 0', '~Selesai'],
                ['19 Okt 2026', 'QRIS', '18', '18', 'Rp 0', '~Selesai'],
                ['18 Okt 2026', 'Transfer Manual', '7', '6', 'Rp 350.000', '~Menunggu']
            ],
            'refund': [
                ['18 Okt 2026', 'Raka Pratama', 'Rp 350.000', 'Kelebihan bayar SPP', '~Menunggu'],
                ['12 Okt 2026', 'Aisyah Zahra', 'Rp 100.000', 'Pembatalan study tour', '~Selesai'],
                ['05 Okt 2026', 'Naufal Abdullaah', 'Rp 50.000', 'Duplikasi transaksi', '~Selesai']
            ],
            'arus-kas': [
                ['19 Okt 2026', 'Pembayaran SPP harian', 'Rp 14.700.000', '—', 'Rp 245.300.000'],
                ['19 Okt 2026', 'Belanja operasional', '—', 'Rp 2.150.000', 'Rp 243.150.000'],
                ['18 Okt 2026', 'Top-up E-Money', 'Rp 3.400.000', '—', 'Rp 230.600.000']
            ],
            'jurnal-umum': [
                ['JU-2026-0181', '19 Okt 2026', 'Penerimaan SPP', 'Rp 14.700.000', 'Rp 14.700.000'],
                ['JU-2026-0182', '19 Okt 2026', 'Biaya operasional', 'Rp 2.150.000', 'Rp 2.150.000'],
                ['JU-2026-0180', '18 Okt 2026', 'Setoran bank', 'Rp 10.000.000', 'Rp 10.000.000']
            ],
            'tutup-buku': [
                ['Tahun Buku 2026/2027', '01 Jul 2026', '30 Jun 2027', '~Aktif', 'Admin Keuangan'],
                ['Tahun Buku 2025/2026', '01 Jul 2025', '30 Jun 2026', '~Selesai', 'Admin Keuangan'],
                ['Tahun Buku 2024/2025', '01 Jul 2024', '30 Jun 2025', '~Selesai', 'Admin Keuangan']
            ],
            'ekspor-laporan': [
                ['Laporan Arus Kas', 'Okt 2026', 'Excel', '19 Okt 2026', '~Selesai'],
                ['Rekap SPP per Kelas', 'Okt 2026', 'PDF', '19 Okt 2026', '~Selesai'],
                ['Buku Besar', 'Semester Ganjil', 'PDF', '18 Okt 2026', '~Menunggu']
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

        // initial load for dashboard
        loadTrx();
    </script>
</body>

</html>
