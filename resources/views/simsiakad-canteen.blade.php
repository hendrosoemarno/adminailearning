<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal E-Canteen (Kasir POS &amp; Manajemen Kantin Digital) · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal E-Canteen SIAKAD PLUS — kasir POS & manajemen kantin digital sekolah: data tenant, menu digital, stok harian, promo, kasir POS cepat, bayar QR E-Money siswa, top-up saldo, limit jajan harian, penjualan per tenant, settlement berkala, menu terlaris, dan rekap transaksi siswa.">
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
        ::selection { background: #9A3412; color: #fff; }
        .hero-gradient { background: linear-gradient(135deg, #9A3412 0%, #1E40AF 60%, #0284C7 100%); }
        .grid-pattern {
            background-image: linear-gradient(rgba(255,255,255,0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 42px 42px;
        }
        .sidebar-group-body { max-height: 0; overflow: hidden; transition: max-height .3s ease; }
        .sidebar-group.open .sidebar-group-body { max-height: 760px; }
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
        .accent { accent-color: #9A3412; }
        .qr-grid { background-image: repeating-linear-gradient(0deg, #0f172a 0 6px, transparent 6px 12px), repeating-linear-gradient(90deg, #0f172a 0 6px, transparent 6px 12px); background-size: 12px 12px; }
        .pos-tile { transition: transform .12s ease, box-shadow .12s ease; }
        .pos-tile:active { transform: scale(.96); }
        .scan-line { position: absolute; left: 8%; right: 8%; height: 2px; background: #ef4444; box-shadow: 0 0 12px #ef4444; animation: scanmove 1.8s ease-in-out infinite; }
        @keyframes scanmove { 0%,100% { top: 12%; } 50% { top: 84%; } }
    </style>
</head>

<body class="font-body bg-slate-100 text-slate-800 antialiased">

    <!-- ============ SIDEBAR ============ -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 text-slate-300 flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div class="flex items-center gap-3 px-5 h-16 border-b border-white/10 flex-shrink-0">
            <div class="w-9 h-9 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-sm">S+</div>
            <div class="leading-tight">
                <p class="font-heading font-bold text-white text-sm">SIAKAD PLUS</p>
                <p class="text-[10px] text-slate-500">Manajemen Kantin Digital</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard E-Canteen</span>
            </button>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🏪</span><span class="flex-1 text-left">Tenant &amp; Menu Digital</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="tenant" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Data Tenant Kantin</button>
                    <button data-view="menu" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Menu &amp; Harga Digital</button>
                    <button data-view="stok" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Stok Menu Harian</button>
                    <button data-view="promo" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Promo &amp; Paket Hemat</button>
                </div>
            </div>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🛒</span><span class="flex-1 text-left">Transaksi &amp; Kasir POS</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="pos" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kasir POS Cepat</button>
                    <button data-view="qrpay" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Bayar QR E-Money Siswa</button>
                    <button data-view="topup" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Top-up Saldo E-Money</button>
                    <button data-view="limit" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Limit Jajan Harian</button>
                </div>
            </div>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📊</span><span class="flex-1 text-left">Laporan &amp; Settlement</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="penjualan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Penjualan Per Tenant</button>
                    <button data-view="settlement" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Settlement Berkala</button>
                    <button data-view="terlaris" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Menu Terlaris</button>
                    <button data-view="rekap" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekap Transaksi Siswa</button>
                </div>
            </div>

        </nav>

        <div class="p-3 border-t border-white/10 flex-shrink-0 space-y-1">
            <label class="flex items-center gap-2 px-3 py-2 rounded-xl text-xs font-semibold text-slate-400 cursor-pointer hover:bg-white/5">
                <input id="soundToggle" type="checkbox" checked class="accent w-4 h-4">
                🔊 Suara beep scan kasir
            </label>
            <a href="{{ url('/simsiakad') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-300 hover:bg-white/5 transition-colors">
                <span>↩</span> Kembali ke Simulasi
            </a>
        </div>
    </aside>

    <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

    <!-- ============ MAIN ============ -->
    <div class="lg:pl-72 min-h-screen flex flex-col">

        <header class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-200">
            <div class="flex items-center gap-3 px-4 sm:px-6 h-16">
                <button onclick="toggleSidebar()" class="lg:hidden text-slate-500 hover:text-navy">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="leading-tight min-w-0 hidden sm:block">
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Manajemen Kantin Digital</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard E-Canteen</h1>
                </div>

                <div class="hidden lg:flex items-center flex-1 max-w-md mx-auto">
                    <div class="relative w-full">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                        <input onkeydown="if(event.key==='Enter')cariMenuQuick(this.value)" placeholder="Cari menu / tenant kantin..."
                            class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                    </div>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <div class="hidden xl:flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight pr-2 border-r border-slate-200">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Transaksi Hari Ini</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">Rp 6,48 jt</p>
                        </div>
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Tenant Aktif</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">8 stand</p>
                        </div>
                    </div>
                    <button onclick="toggleOperational()" id="opStatusBtn" class="hidden md:flex items-center gap-2 text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-2 rounded-xl">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> <span id="opStatusText">Kantin Buka</span>
                    </button>
                    <button onclick="showToast('info', '3 pesanan baru & 2 menu stok menipis')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">PK</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Pengelola Kantin</p>
                            <p class="text-[10px] text-slate-400">Unit Koperasi Sekolah</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 p-4 sm:p-6">

            <!-- ================= VIEW: DASHBOARD ================= -->
            <section id="view-dashboard" class="view active">

                <div class="rounded-3xl hero-gradient text-white p-5 sm:p-6 relative overflow-hidden">
                    <div class="absolute inset-0 grid-pattern"></div>
                    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center gap-4">
                        <div>
                            <p class="text-sm text-white/85">Total Transaksi Kantin Hari Ini</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">Rp 6.480.000</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">🏪 8 Tenant Aktif</span>
                                <span class="bg-emerald2 px-2.5 py-1 rounded-full text-white">🟢 Jam Operasional: Buka</span>
                                <span class="bg-amber2 px-2.5 py-1 rounded-full text-white">⏳ 3 Settlement Pending</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('pos','Kasir POS Cepat')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">🛒 Buka Kasir POS</button>
                            <button onclick="showView('topup','Top-up Saldo E-Money')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">💳 Top-Up Saldo Siswa</button>
                            <button onclick="showView('settlement','Settlement Berkala')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🏦 Proses Settlement</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">💰</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Omzet</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Omzet Kantin</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">Rp 6,48 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">92% dari target harian</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">🍱</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Porsi</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Porsi Terjual</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">1.286</p>
                        <p class="text-[11px] text-slate-500 mt-1">Dari 8 tenant</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-violet-100 grid place-items-center text-violet-700">💳</span>
                            <span class="text-[11px] font-bold text-violet-700 bg-violet-50 px-2 py-0.5 rounded-full">E-Money</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Transaksi E-Money</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">72<span class="text-sm font-bold text-slate-500">%</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Sisanya tunai &amp; QRIS</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">🏆</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Top Stand</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Stand Penjualan Tertinggi</p>
                        <p class="font-heading font-extrabold text-xl text-slate-900 leading-tight">Dapur Geprek Bu Yati</p>
                        <p class="text-[11px] text-slate-500 mt-1">Rp 1,84 jt hari ini</p>
                    </div>
                </div>

                <div class="mt-4 grid xl:grid-cols-3 gap-4">
                    <div class="xl:col-span-2 space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="font-heading font-bold text-slate-800">Tren Penjualan Jam Istirahat (Peak Hours Traffic)</h2>
                                    <p class="text-xs text-slate-400">Nilai penjualan per jam dalam ribuan rupiah</p>
                                </div>
                                <span class="text-[11px] font-bold bg-amber-50 text-amber-700 px-2.5 py-1 rounded-full">Puncak 09:00–10:00</span>
                            </div>
                            <div id="chartPeak" class="mt-6 flex items-end justify-around gap-2 h-48"></div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Rekap Ringkasan Penjualan Per Tenant Hari Ini</h2><p class="text-xs text-slate-400">Omzet &amp; status settlement tiap stand</p></div>
                                <button onclick="showView('penjualan','Penjualan Per Tenant')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[820px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr>
                                            <th class="px-4 py-3">Nama Stand</th>
                                            <th class="px-4 py-3">Pemilik</th>
                                            <th class="px-4 py-3 text-center">Porsi Terjual</th>
                                            <th class="px-4 py-3 text-right">Total Omzet</th>
                                            <th class="px-4 py-3">Settlement</th>
                                        </tr>
                                    </thead>
                                    <tbody id="recapTenantBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="recapTenantEmpty" class="hidden py-16 text-center">
                                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🏪</div>
                                <p class="mt-4 font-heading font-bold text-slate-700">Belum ada penjualan hari ini</p>
                                <p class="text-sm text-slate-400">Data tenant akan muncul saat ada transaksi.</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Top 5 Menu Terlaris Hari Ini</h2>
                                <button onclick="showView('terlaris','Menu Terlaris')" class="text-[11px] font-bold text-navy">Semua</button>
                            </div>
                            <div id="topMenuList" class="p-3 space-y-2">
                                <div class="skeleton h-14 w-full rounded-xl"></div>
                                <div class="skeleton h-14 w-full rounded-xl"></div>
                                <div class="skeleton h-14 w-full rounded-xl"></div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">💳</span>
                                <div><h2 class="font-heading font-bold text-slate-800">Loket Top-Up Cepat</h2><p class="text-xs text-slate-500">Isi saldo E-Money siswa tunai</p></div>
                            </div>
                            <div class="mt-3 grid grid-cols-3 gap-2">
                                <button onclick="quickTopup(20000)" class="text-sm font-bold rounded-xl border border-slate-200 hover:border-navy py-2.5 transition-colors">20rb</button>
                                <button onclick="quickTopup(50000)" class="text-sm font-bold rounded-xl border border-slate-200 hover:border-navy py-2.5 transition-colors">50rb</button>
                                <button onclick="quickTopup(100000)" class="text-sm font-bold rounded-xl border border-slate-200 hover:border-navy py-2.5 transition-colors">100rb</button>
                            </div>
                            <button onclick="showView('topup','Top-up Saldo E-Money')" class="mt-3 w-full text-[11px] font-bold text-navy bg-blue-50 hover:bg-blue-100 py-2 rounded-lg transition-colors">Buka Loket Top-Up</button>
                        </div>

                        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-red-500 text-white grid place-items-center text-lg">⏳</span>
                                <div><h2 class="font-heading font-bold text-slate-800">Settlement Menunggu</h2><p class="text-xs text-slate-500">Belum ditransfer</p></div>
                            </div>
                            <p class="mt-2 text-xs text-red-700 font-semibold">3 tenant · total Rp 4,12 jt menunggu settlement hari ini.</p>
                            <button onclick="showView('settlement','Settlement Berkala')" class="mt-3 w-full text-[11px] font-bold text-red-800 bg-white border border-red-300 hover:bg-red-100 py-2 rounded-lg transition-colors">Proses Settlement</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: DATA TENANT KANTIN ================= -->
            <section id="view-tenant" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Data Tenant Kantin</h2>
                        <p class="text-xs text-slate-400">Database stand/kantin sekolah, pemilik stand, nomor lapak, &amp; status buka.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form pendaftaran tenant baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Tenant Baru</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Tenant</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">8</p><p class="text-[11px] text-slate-500 mt-1">Stand aktif</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Sedang Buka</p><p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">7</p><p class="text-[11px] text-slate-500 mt-1">Melayani pembeli</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Tutup Sementara</p><p class="font-heading font-extrabold text-2xl text-red-700 mt-1">1</p><p class="text-[11px] text-slate-500 mt-1">Kehabisan bahan</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Komisi Standar</p><p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">10<span class="text-sm font-bold text-slate-500">%</span></p><p class="text-[11px] text-slate-500 mt-1">Per transaksi</p></div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 grid sm:grid-cols-3 gap-3">
                        <div class="relative sm:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchTenant" oninput="renderTenant()" placeholder="Cari nama stand / pemilik / no. lapak..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none placeholder:text-slate-400">
                        </div>
                        <select id="filterTenantStatus" onchange="renderTenant()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Status</option>
                            <option>Buka</option>
                            <option>Tutup</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1040px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama Stand</th>
                                    <th class="px-4 py-3">Pemilik Stand</th>
                                    <th class="px-4 py-3">No. Lapak</th>
                                    <th class="px-4 py-3">Kategori</th>
                                    <th class="px-4 py-3">Kontak</th>
                                    <th class="px-4 py-3 text-right">Omzet Hari Ini</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tenantBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="tenantEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🏪</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tenant tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: MENU & HARGA DIGITAL ================= -->
            <section id="view-menu" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Menu &amp; Harga Digital</h2>
                        <p class="text-xs text-slate-400">Katalog menu per tenant, foto menu, variasi/toping, &amp; harga jual.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form tambah menu...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Menu Baru</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-3 gap-3">
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchMenu" oninput="renderMenu()" placeholder="Cari nama menu..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none placeholder:text-slate-400">
                        </div>
                        <select id="filterTenantMenu" onchange="renderMenu()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></select>
                        <select id="filterKategori" onchange="renderMenu()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Kategori</option>
                            <option>Makanan Berat</option>
                            <option>Camilan</option>
                            <option>Minuman</option>
                            <option>Paket Hemat</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <div id="menuGrid" class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4"></div>
                    <div id="menuEmpty" class="hidden bg-white rounded-2xl border border-slate-100 shadow-sm py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🍽️</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Menu tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter kategori.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: STOK MENU HARIAN ================= -->
            <section id="view-stok" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Stok Menu Harian</h2>
                        <p class="text-xs text-slate-400">Manajemen porsi/stok harian &amp; sakelar real-time Tersedia/Habis.</p>
                    </div>
                    <button onclick="showToast('success','Stok harian disinkronkan ke semua kasir')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔄 Sinkronkan Stok</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Menu Tersedia</p><p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1" id="stokTersediaCnt">0</p><p class="text-[11px] text-slate-500 mt-1">Siap dijual</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Stok Menipis</p><p class="font-heading font-extrabold text-2xl text-amber-700 mt-1" id="stokMenipisCnt">0</p><p class="text-[11px] text-slate-500 mt-1">Di bawah 5 porsi</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Menu Habis</p><p class="font-heading font-extrabold text-2xl text-red-700 mt-1" id="stokHabisCnt">0</p><p class="text-[11px] text-slate-500 mt-1">Perlu restock</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Porsi Tersedia</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1" id="stokPorsiTotal">0</p><p class="text-[11px] text-slate-500 mt-1">Hari ini</p></div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <h3 class="font-heading font-bold text-slate-800 flex-1">Kontrol Stok Harian</h3>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchStok" oninput="renderStok()" placeholder="Cari menu..."
                                class="bg-slate-100 rounded-xl pl-9 pr-3 py-2 text-sm outline-none placeholder:text-slate-400 w-full sm:w-56">
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[900px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Menu</th>
                                    <th class="px-4 py-3">Stand</th>
                                    <th class="px-4 py-3 text-center">Stok Awal</th>
                                    <th class="px-4 py-3 text-center">Terjual</th>
                                    <th class="px-4 py-3 text-center">Sisa Porsi</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Sakelar</th>
                                </tr>
                            </thead>
                            <tbody id="stokBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PROMO & PAKET HEMAT ================= -->
            <section id="view-promo" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Promo &amp; Paket Hemat</h2>
                        <p class="text-xs text-slate-400">Pengaturan diskon, bundle paket hemat, &amp; promo jam tertentu.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form promo baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Promo Baru</button>
                </div>

                <div class="mt-4 grid sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4" id="promoCards"></div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Daftar Paket Hemat</h3></div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[880px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Nama Paket</th>
                                    <th class="px-4 py-3">Isi Paket</th>
                                    <th class="px-4 py-3 text-right">Harga Normal</th>
                                    <th class="px-4 py-3 text-right">Harga Paket</th>
                                    <th class="px-4 py-3">Berlaku</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="paketBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KASIR POS CEPAT ================= -->
            <section id="view-pos" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Kasir POS Cepat</h2>
                        <p class="text-xs text-slate-400">Antarmuka layar sentuh — ketuk menu untuk menambah ke keranjang.</p>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="showToast('info','Membuka daftar order tersimpan...')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📋 Order Tersimpan</button>
                        <button onclick="clearCart()" class="bg-red-50 border border-red-200 hover:bg-red-100 text-red-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🗑️ Kosongkan</button>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-5 gap-4">
                    <div class="lg:col-span-3">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                            <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
                                <div class="relative flex-1">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                                    <input id="posSearch" oninput="renderPOS()" placeholder="Cari menu cepat..."
                                        class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none placeholder:text-slate-400">
                                </div>
                                <select id="posTenant" onchange="renderPOS()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></select>
                            </div>
                            <div class="flex flex-wrap gap-2 mt-3" id="posKategori"></div>
                            <div id="posGrid" class="mt-3 grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-3"></div>
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm lg:sticky lg:top-20">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <h3 class="font-heading font-bold text-slate-800">Keranjang Order</h3>
                                <span id="cartCount" class="text-[11px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">0 item</span>
                            </div>
                            <div id="posCart" class="p-3 space-y-2 max-h-[300px] overflow-y-auto no-scrollbar"></div>
                            <div class="px-4 py-3 border-t border-slate-100 space-y-2">
                                <div class="flex items-center justify-between text-sm"><span class="text-slate-500">Subtotal</span><span id="posSubtotal" class="font-semibold text-slate-800">Rp 0</span></div>
                                <div class="flex items-center justify-between text-sm"><span class="text-slate-500">Diskon Promo</span><span id="posDiskon" class="font-semibold text-emerald-700">− Rp 0</span></div>
                                <div class="flex items-center justify-between border-t border-dashed border-slate-200 pt-2"><span class="font-bold text-slate-700">Total Pembayaran</span><span id="posTotal" class="font-heading font-extrabold text-2xl text-navy">Rp 0</span></div>
                            </div>
                            <div class="p-4 pt-0 space-y-2">
                                <button onclick="openScanPay()" class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 rounded-xl transition-colors">💳 Bayar QR E-Money Siswa (Scan)</button>
                                <button onclick="bayarTunai()" class="w-full flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-900 text-white font-bold py-3 rounded-xl transition-colors">💵 Bayar Tunai</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: BAYAR QR E-MONEY SISWA ================= -->
            <section id="view-qrpay" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Bayar QR E-Money Siswa</h2>
                        <p class="text-xs text-slate-400">Pemindaian QR Card siswa, autentikasi PIN/tap, limit jajan, &amp; struk instan.</p>
                    </div>
                    <button onclick="openScanPay()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📷 Mulai Scan QR</button>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                        <div class="mx-auto max-w-sm">
                            <div class="relative aspect-square rounded-3xl bg-slate-900 overflow-hidden grid place-items-center">
                                <div class="scan-line"></div>
                                <div class="text-center text-slate-500 px-8">
                                    <div class="text-5xl">📷</div>
                                    <p class="mt-3 text-sm text-slate-300">Arahkan QR Card E-Money siswa ke kamera scanner</p>
                                </div>
                            </div>
                            <button onclick="openScanPay()" class="mt-4 w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl transition-colors">Simulasikan Scan QR</button>
                            <p class="mt-3 text-center text-xs text-slate-400">Autentikasi: Tap Kartu / PIN 6 digit / Verifikasi Wali</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">Pembayaran QR Terakhir</h3>
                            <span class="flex items-center gap-1.5 text-[11px] font-bold text-emerald-700"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Live</span>
                        </div>
                        <div id="qrRecent" class="p-3 space-y-2">
                            <div class="skeleton h-14 w-full rounded-xl"></div>
                            <div class="skeleton h-14 w-full rounded-xl"></div>
                            <div class="skeleton h-14 w-full rounded-xl"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: TOP-UP SALDO E-MONEY ================= -->
            <section id="view-topup" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Top-up Saldo E-Money</h2>
                        <p class="text-xs text-slate-400">Loket pengisian saldo E-Money siswa tunai di kantin.</p>
                    </div>
                    <button onclick="openTopup()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Top-Up Baru</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Top-Up Hari Ini</p><p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">Rp 1,84 jt</p><p class="text-[11px] text-slate-500 mt-1">38 transaksi</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Loket Tunai</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 1,3 jt</p><p class="text-[11px] text-slate-500 mt-1">24 transaksi</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Transfer Wali</p><p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">Rp 540 rb</p><p class="text-[11px] text-slate-500 mt-1">14 transaksi</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kas Loket</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 1,3 jt</p><p class="text-[11px] text-slate-500 mt-1">Uang fisik</p></div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <h3 class="font-heading font-bold text-slate-800 flex-1">Riwayat Top-Up Hari Ini</h3>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchTopup" oninput="renderTopup()" placeholder="Cari nama siswa..."
                                class="bg-slate-100 rounded-xl pl-9 pr-3 py-2 text-sm outline-none placeholder:text-slate-400 w-full sm:w-56">
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[860px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Ref</th>
                                    <th class="px-4 py-3">Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">No. Kartu</th>
                                    <th class="px-4 py-3">Metode</th>
                                    <th class="px-4 py-3 text-right">Nominal</th>
                                    <th class="px-4 py-3">Waktu</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="topupBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="topupEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">💳</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada top-up</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci pencarian.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: LIMIT JAJAN HARIAN ================= -->
            <section id="view-limit" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Limit Jajan Harian</h2>
                        <p class="text-xs text-slate-400">Validasi batas maksimal belanja harian siswa &amp; alert saldo menipis.</p>
                    </div>
                    <button onclick="showToast('success','Limit default per jenjang diperbarui')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⚙️ Atur Default Per Jenjang</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Limit Default SMP</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 25.000</p><p class="text-[11px] text-slate-500 mt-1">Per hari</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Limit Default SMA</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 40.000</p><p class="text-[11px] text-slate-500 mt-1">Per hari</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Melebihi Limit Hari Ini</p><p class="font-heading font-extrabold text-2xl text-red-700 mt-1">6</p><p class="text-[11px] text-slate-500 mt-1">Transaksi ditolak</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Saldo Menipis</p><p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">9</p><p class="text-[11px] text-slate-500 mt-1">&lt; Rp 20.000</p></div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <h3 class="font-heading font-bold text-slate-800 flex-1">Monitoring Limit Per Siswa</h3>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchLimit" oninput="renderLimit()" placeholder="Cari nama siswa..."
                                class="bg-slate-100 rounded-xl pl-9 pr-3 py-2 text-sm outline-none placeholder:text-slate-400 w-full sm:w-56">
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[920px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3 text-right">Saldo</th>
                                    <th class="px-4 py-3 text-right">Limit Harian</th>
                                    <th class="px-4 py-3 text-right">Terpakai Hari Ini</th>
                                    <th class="px-4 py-3">Status Limit</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="limitBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PENJUALAN PER TENANT ================= -->
            <section id="view-penjualan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Penjualan Per Tenant</h2>
                        <p class="text-xs text-slate-400">Rekap omzet, total porsi terjual, &amp; margin tiap stand.</p>
                    </div>
                    <div class="flex gap-2">
                        <select class="bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Hari Ini</option><option>Minggu Ini</option><option>Bulan Ini</option></select>
                        <button onclick="showToast('success','Laporan penjualan tenant diunduh (Excel)')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇ Export</button>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Omzet Kotor</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 6,48 jt</p><p class="text-[11px] text-emerald-700 mt-1 font-semibold">+12% dari kemarin</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Porsi</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">1.286</p><p class="text-[11px] text-slate-500 mt-1">8 tenant</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Komisi Sekolah (10%)</p><p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">Rp 648 rb</p><p class="text-[11px] text-slate-500 mt-1">Pendapatan sekolah</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Rata-rata Margin Tenant</p><p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">42<span class="text-sm font-bold text-slate-500">%</span></p><p class="text-[11px] text-slate-500 mt-1">Setelah komisi</p></div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 grid sm:grid-cols-3 gap-3">
                        <div class="relative sm:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchPenjualan" oninput="renderPenjualan()" placeholder="Cari tenant / pemilik..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none placeholder:text-slate-400">
                        </div>
                        <input type="date" value="2026-10-17" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[980px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Tenant / Stand</th>
                                    <th class="px-4 py-3">Pemilik</th>
                                    <th class="px-4 py-3 text-center">Porsi</th>
                                    <th class="px-4 py-3 text-right">Omzet Kotor</th>
                                    <th class="px-4 py-3 text-right">Komisi (10%)</th>
                                    <th class="px-4 py-3 text-right">Net Hak Tenant</th>
                                    <th class="px-4 py-3">Settlement</th>
                                </tr>
                            </thead>
                            <tbody id="penjualanBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="penjualanEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📊</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Data tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci pencarian.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: SETTLEMENT BERKALA ================= -->
            <section id="view-settlement" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Settlement Berkala</h2>
                        <p class="text-xs text-slate-400">Pencairan dana/transfer hasil penjualan dari sekolah ke tenant.</p>
                    </div>
                    <button onclick="prosesSettlementMassal()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🏦 Proses Settlement Massal</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Belum Ditransfer</p><p class="font-heading font-extrabold text-2xl text-amber-700 mt-1" id="settlePendingCnt">0</p><p class="text-[11px] text-slate-500 mt-1">Tenant</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Hak Tenant</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1" id="settlePendingVal">Rp 0</p><p class="text-[11px] text-slate-500 mt-1">Periode ini</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Sudah Ditransfer</p><p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1" id="settleSelesaiCnt">0</p><p class="text-[11px] text-slate-500 mt-1">Tenant</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Periode Settlement</p><p class="font-heading font-extrabold text-xl text-slate-900 mt-1">Mingguan</p><p class="text-[11px] text-slate-500 mt-1">Setiap Senin</p></div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 grid sm:grid-cols-3 gap-3">
                        <div class="relative sm:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchSettlement" oninput="renderSettlement()" placeholder="Cari tenant / pemilik..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none placeholder:text-slate-400">
                        </div>
                        <select id="filterSettlement" onchange="renderSettlement()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Status</option>
                            <option>Belum Ditransfer</option>
                            <option>Lunas Ditransfer</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1100px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Tenant / Stand</th>
                                    <th class="px-4 py-3">Pemilik</th>
                                    <th class="px-4 py-3 text-right">Omzet Kotor</th>
                                    <th class="px-4 py-3 text-right">Komisi Sekolah</th>
                                    <th class="px-4 py-3 text-right">Net Hak Tenant</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="settlementBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="settlementEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🏦</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Settlement tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: MENU TERLARIS ================= -->
            <section id="view-terlaris" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Menu Terlaris</h2>
                        <p class="text-xs text-slate-400">Analytics Top 10 makanan/minuman terfavorit &amp; jam sibuk istirahat.</p>
                    </div>
                    <select class="bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Hari Ini</option><option>Minggu Ini</option><option>Bulan Ini</option></select>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Jam Sibuk Istirahat (Busy Hours)</h3>
                        <p class="text-xs text-slate-400">Jumlah transaksi per jam</p>
                        <div id="chartBusy" class="mt-6 flex items-end justify-around gap-2 h-48"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Ringkasan</h3>
                        <div class="mt-4 space-y-3">
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-xs text-slate-500">Menu Terjual</span><span class="text-sm font-bold text-slate-800">1.286 porsi</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-xs text-slate-500">Jam Puncak</span><span class="text-sm font-bold text-slate-800">09:00 – 10:00</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-xs text-slate-500">Stand Teraktif</span><span class="text-sm font-bold text-slate-800">Dapur Geprek Bu Yati</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-xs text-slate-500">Avg. Waktu Layan</span><span class="text-sm font-bold text-slate-800">42 detik</span></div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Top 10 Menu Terfavorit</h3></div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[820px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Peringkat</th>
                                    <th class="px-4 py-3">Menu</th>
                                    <th class="px-4 py-3">Stand / Tenant</th>
                                    <th class="px-4 py-3">Kategori</th>
                                    <th class="px-4 py-3 text-center">Terjual</th>
                                    <th class="px-4 py-3 text-right">Omzet</th>
                                </tr>
                            </thead>
                            <tbody id="terlarisBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: REKAP TRANSAKSI SISWA ================= -->
            <section id="view-rekap" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Rekap Transaksi Siswa</h2>
                        <p class="text-xs text-slate-400">Audit trail log belanja siswa per kelas &amp; histori transaksi.</p>
                    </div>
                    <button onclick="showToast('success','Rekap transaksi siswa diunduh (PDF)')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇ Unduh PDF</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-4 gap-3">
                        <div class="relative sm:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchRekap" oninput="renderRekap()" placeholder="Cari nama siswa / kelas..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none placeholder:text-slate-400">
                        </div>
                        <select id="filterKelas" onchange="renderRekap()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Kelas</option>
                            <option>VII-A</option>
                            <option>VII-B</option>
                            <option>VIII-A</option>
                            <option>IX-A</option>
                        </select>
                        <select id="filterMetode" onchange="renderRekap()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Metode</option>
                            <option>E-Money</option>
                            <option>Tunai</option>
                            <option>QRIS</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1060px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Waktu</th>
                                    <th class="px-4 py-3">Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Stand</th>
                                    <th class="px-4 py-3">Item</th>
                                    <th class="px-4 py-3">Metode</th>
                                    <th class="px-4 py-3 text-right">Jumlah</th>
                                    <th class="px-4 py-3 text-right">Saldo Akhir</th>
                                </tr>
                            </thead>
                            <tbody id="rekapBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="rekapEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🧾</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Transaksi tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🍽️</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal E-Canteen SIAKAD PLUS. Gunakan menu di samping untuk mengakses modul Tenant &amp; Menu Digital, Transaksi &amp; Kasir POS, serta Laporan &amp; Settlement.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard E-Canteen')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('pos','Kasir POS Cepat')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Kasir POS</button>
                        <button onclick="showView('settlement','Settlement Berkala')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Settlement</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="border-t border-slate-200 bg-white px-4 sm:px-6 py-5 text-center">
            <p class="text-xs text-slate-400">© 2026 PT Artificial Intelligence Learning Madani Digital · E-Canteen (Simulasi)</p>
        </footer>
    </div>

    <!-- ============ MODAL: SCAN QR E-MONEY SISWA ============ -->
    <div id="scanModal" class="fixed inset-0 z-[65] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" onclick="closeScan()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden">
            <div class="hero-gradient text-white px-6 py-5 relative overflow-hidden">
                <div class="absolute inset-0 grid-pattern"></div>
                <div class="relative z-10 flex items-center gap-3">
                    <div id="scanPhoto" class="w-14 h-14 rounded-2xl bg-white/20 ring-2 ring-white/40 grid place-items-center font-heading font-extrabold text-lg">KF</div>
                    <div class="leading-tight">
                        <p class="text-[11px] font-semibold text-white/80 uppercase tracking-wider">QR E-Money Terverifikasi</p>
                        <h3 id="scanSiswa" class="font-heading font-extrabold text-lg">Keira Faza</h3>
                        <p id="scanKelas" class="text-xs text-white/85">Kelas VIII-A · •••• 0101</p>
                    </div>
                </div>
            </div>
            <div class="p-6 space-y-3">
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-slate-50 rounded-xl px-3 py-2.5"><p class="text-[10px] font-semibold text-slate-400 uppercase">Sisa Saldo</p><p id="scanSaldo" class="text-sm font-Bbad font-bold text-slate-800">Rp 0</p></div>
                    <div class="bg-slate-50 rounded-xl px-3 py-2.5"><p class="text-[10px] font-semibold text-slate-400 uppercase">Total Belanja</p><p id="scanTotal" class="text-sm font-heading font-extrabold text-navy">Rp 0</p></div>
                </div>
                <div id="scanLimitBox" class="rounded-xl px-3 py-3 border">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-600">Status Limit Jajan Harian</span>
                        <span id="scanLimitStatus" class="text-[11px] font-bold px-2.5 py-1 rounded-full">Aman</span>
                    </div>
                    <div class="mt-2 h-2 rounded-full bg-slate-100 overflow-hidden"><div id="scanLimitBar" class="h-full bg-emerald-500" style="width:0%"></div></div>
                    <p id="scanLimitInfo" class="mt-2 text-[11px] text-slate-500">Terpakai hari ini: Rp 0 dari limit Rp 25.000.</p>
                </div>
                <div id="scanWarn" class="hidden bg-red-50 border border-red-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-red-700">⚠️ Melebihi limit jajan harian. Transaksi tidak dapat diproses.</div>
                <p class="text-[11px] text-slate-400 text-center">Autentikasi: Tap Kartu / PIN 6 digit / Verifikasi Wali</p>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2">
                <button onclick="closeScan()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button id="scanOkBtn" onclick="confirmScanPay()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">✅ Konfirmasi Bayar</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: STRUK PEMBAYARAN ============ -->
    <div id="strukModal" class="fixed inset-0 z-[65] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" onclick="closeStruk()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-sm overflow-hidden">
            <div class="hero-gradient text-white px-6 py-5 text-center relative overflow-hidden">
                <div class="absolute inset-0 grid-pattern"></div>
                <div class="relative z-10">
                    <p class="text-[11px] font-semibold text-white/80 uppercase tracking-wider">Kantin Sehat Al-Hikmah</p>
                    <h3 class="font-heading font-extrabold text-lg mt-1">Struk Pembayaran</h3>
                    <p id="strukNo" class="text-xs text-white/85 font-mono">INV-000000</p>
                </div>
            </div>
            <div class="p-6">
                <div id="strukItems" class="space-y-2 text-sm border-b border-dashed border-slate-200 pb-3"></div>
                <div class="flex items-center justify-between mt-3"><span class="text-slate-500 text-sm">Total</span><span id="strukTotal" class="font-heading font-extrabold text-xl text-navy">Rp 0</span></div>
                <div class="flex items-center justify-between mt-1"><span class="text-slate-500 text-sm">Metode</span><span id="strukMetode" class="text-sm font-bold text-slate-700">E-Money</span></div>
                <div id="strukSisa" class="flex items-center justify-between mt-1 hidden"><span class="text-slate-500 text-sm">Sisa Saldo</span><span id="strukSisaVal" class="text-sm font-bold text-emerald-700">Rp 0</span></div>
                <p class="mt-4 text-center text-[11px] text-slate-400">Terima kasih · Simpan struk sebagai bukti pembayaran</p>
                <div class="mt-5 flex gap-2">
                    <button onclick="closeStruk()" class="flex-1 text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
                    <button onclick="showToast('success','Struk dikirim ke WhatsApp wali')" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak &amp; Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: TOP-UP SALDO ============ -->
    <div id="topupModal" class="fixed inset-0 z-[65] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" onclick="closeTopup()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto no-scrollbar">
            <div class="sticky top-0 bg-white px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Top-up Saldo E-Money</h3><p class="text-xs text-slate-400">Loket pengisian saldo tunai di kantin.</p></div>
                <button onclick="closeTopup()" class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500">✕</button>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="text-xs font-bold text-slate-600">Pilih Siswa / Kartu</label>
                    <select id="topupSiswa" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                        <option>Keira Faza · VIII-A · •••• 0101</option>
                        <option>Ahmad Fauzan · IX-A · •••• 4821</option>
                        <option>Siti Nurhaliza · VII-B · •••• 2388</option>
                        <option>Bunga Ayu · VII-B · •••• 4120</option>
                    </select>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-600">Nominal Top-Up</label>
                    <div class="mt-2 grid grid-cols-3 gap-2">
                        <button onclick="setNominal(20000)" class="nom-btn text-sm font-bold rounded-xl border border-slate-200 hover:border-navy py-2.5 transition-colors">Rp 20.000</button>
                        <button onclick="setNominal(50000)" class="nom-btn text-sm font-bold rounded-xl border border-slate-200 hover:border-navy py-2.5 transition-colors">Rp 50.000</button>
                        <button onclick="setNominal(100000)" class="nom-btn text-sm font-bold rounded-xl border border-slate-200 hover:border-navy py-2.5 transition-colors">Rp 100.000</button>
                    </div>
                    <input id="topupNominal" type="number" value="50000" class="mt-2 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-600">Sumber Dana</label>
                    <div class="mt-2 grid grid-cols-2 gap-2">
                        <label class="cursor-pointer"><input type="radio" name="dana" class="peer sr-only" checked><span class="block text-center text-sm font-bold rounded-xl border border-slate-200 peer-checked:bg-emerald-600 peer-checked:text-white peer-checked:border-emerald-600 py-2.5 transition-colors">Tunai (Loket)</span></label>
                        <label class="cursor-pointer"><input type="radio" name="dana" class="peer sr-only"><span class="block text-center text-sm font-bold rounded-xl border border-slate-200 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 py-2.5 transition-colors">Transfer Wali</span></label>
                    </div>
                </div>
                <label class="flex items-center gap-2.5 cursor-pointer bg-emerald-50 border border-emerald-200 rounded-xl px-3 py-3">
                    <input type="checkbox" checked class="accent w-4 h-4">
                    <span class="text-sm text-slate-700">Kirim bukti top-up ke WhatsApp wali santri</span>
                </label>
            </div>
            <div class="sticky bottom-0 bg-white px-6 py-4 border-t border-slate-100 flex justify-end gap-2">
                <button onclick="closeTopup()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="submitTopup()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Proses Top-Up</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: KONFIRMASI ============ -->
    <div id="confirmModal" class="fixed inset-0 z-[66] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeConfirm()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span id="confirmIcon" class="w-11 h-11 rounded-2xl bg-amber-100 text-amber-700 grid place-items-center text-xl">⚠️</span>
                <div><h3 id="confirmTitle" class="font-heading font-extrabold text-lg text-slate-800">Konfirmasi</h3><p id="confirmMsg" class="text-xs text-slate-400">Tindakan ini akan diproses.</p></div>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closeConfirm()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button id="confirmOk" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ya, Lanjutkan</button>
            </div>
        </div>
    </div>

    <div id="toastWrap" class="fixed bottom-5 right-5 z-[70] space-y-2"></div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }
        document.querySelectorAll('.sidebar-group-btn').forEach(btn => {
            btn.addEventListener('click', () => btn.closest('.sidebar-group').classList.toggle('open'));
        });
        function toggleOperational() {
            const btn = document.getElementById('opStatusBtn');
            const txt = document.getElementById('opStatusText');
            const open = txt.textContent.includes('Buka');
            txt.textContent = open ? 'Kantin Tutup' : 'Kantin Buka';
            btn.classList.toggle('bg-red-50', open);
            btn.classList.toggle('text-red-700', open);
            btn.classList.toggle('border-red-200', open);
            btn.classList.toggle('bg-emerald-50', !open);
            btn.classList.toggle('text-emerald-700', !open);
            btn.classList.toggle('border-emerald-200', !open);
            showToast(open ? 'warn' : 'success', open ? 'Kantin ditutup sementara' : 'Kantin dibuka · siap melayani');
        }

        function fmtRp(n) { return 'Rp ' + (n || 0).toLocaleString('id-ID'); }
        function initials(n) { return n.split(' ').slice(0, 2).map(w => w[0]).join('').toUpperCase(); }
        function avatar(name) { return '<span class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white text-[11px] font-bold flex-shrink-0">' + initials(name) + '</span>'; }
        function playBeep() {
            const t = document.getElementById('soundToggle');
            if (!t || !t.checked) return;
            try {
                const ctx = new (window.AudioContext || window.webkitAudioContext)();
                const o = ctx.createOscillator(); const g = ctx.createGain();
                o.connect(g); g.connect(ctx.destination);
                o.type = 'square'; o.frequency.value = 1180; g.gain.value = 0.06;
                o.start(); o.stop(ctx.currentTime + 0.09);
            } catch (e) {}
        }

        const statusBadge = { 'Buka': 'bg-emerald-100 text-emerald-800', 'Tutup': 'bg-red-100 text-red-800', 'Tersedia': 'bg-emerald-100 text-emerald-800', 'Menipis': 'bg-amber-100 text-amber-800', 'Habis': 'bg-red-100 text-red-800', 'Aman': 'bg-emerald-100 text-emerald-800', 'Melebihi Limit': 'bg-red-100 text-red-800', 'Belum Ditransfer': 'bg-amber-100 text-amber-800', 'Lunas Ditransfer': 'bg-emerald-100 text-emerald-800', 'Berhasil': 'bg-emerald-100 text-emerald-800', 'Pending': 'bg-amber-100 text-amber-800' };
        const metodeBadge = { 'E-Money': 'bg-violet-100 text-violet-800', 'Tunai': 'bg-slate-100 text-slate-700', 'QRIS': 'bg-blue-100 text-blue-800' };

        const views = document.querySelectorAll('.view');
        function showView(name, title) {
            views.forEach(v => v.classList.remove('active'));
            const el = document.getElementById('view-' + name);
            if (el) el.classList.add('active');
            if (title) document.getElementById('pageTitle').textContent = title.replace(/&amp;/g, '&');
            document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
            const active = document.querySelector('.menu-item[data-view="' + name + '"]');
            if (active) active.classList.add('active');

            if (name === 'tenant') renderTenant();
            if (name === 'menu') renderMenu();
            if (name === 'stok') renderStok();
            if (name === 'promo') renderPromo();
            if (name === 'pos') { renderPOS(); renderCart(); }
            if (name === 'qrpay') loadQrRecent();
            if (name === 'topup') renderTopup();
            if (name === 'limit') renderLimit();
            if (name === 'penjualan') renderPenjualan();
            if (name === 'settlement') renderSettlement();
            if (name === 'terlaris') { renderTerlaris(); renderChartBusy(); }
            if (name === 'rekap') renderRekap();

            if (window.innerWidth < 1024 && !document.getElementById('sidebar').classList.contains('-translate-x-full')) toggleSidebar();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', () => {
                const view = item.dataset.view || 'generic';
                const title = item.dataset.title || item.textContent.trim();
                if (view === 'generic') { document.getElementById('genericTitle').textContent = title; showView('generic', title); }
                else showView(view, title);
            });
        });
        function cariMenuQuick(val) {
            const m = document.getElementById('searchMenu');
            if (m) m.value = val || '';
            showView('menu', 'Menu & Harga Digital');
            renderMenu();
        }

        // ---------- MASTER DATA ----------
        const tenants = [
            { nama: 'Dapur Geprek Bu Yati', pemilik: 'Yati Sumarni', lapak: 'A-01', kat: 'Makanan Berat', kontak: '0812-1111-2233', omzet: 1840000, status: 'Buka' },
            { nama: 'Kantin Barokah', pemilik: 'H. Sulaiman', lapak: 'A-02', kat: 'Makanan Berat', kontak: '0812-2222-3344', omzet: 1120000, status: 'Buka' },
            { nama: 'Bakso Urat Pak No', pemilik: 'Nur Hadi', lapak: 'A-03', kat: 'Makanan Berat', kontak: '0812-5555-6677', omzet: 940000, status: 'Buka' },
            { nama: 'Kedai Jus & Buah', pemilik: 'Lestari Ningsih', lapak: 'B-01', kat: 'Minuman', kontak: '0812-3333-4455', omzet: 860000, status: 'Buka' },
            { nama: 'Snack Corner', pemilik: 'Hadi Purnomo', lapak: 'B-02', kat: 'Camilan', kontak: '0812-4444-5566', omzet: 720000, status: 'Buka' },
            { nama: 'Martabak Mini', pemilik: 'Nur Aisyah', lapak: 'C-01', kat: 'Camilan', kontak: '0812-6666-7788', omzet: 480000, status: 'Buka' },
            { nama: 'Kopi Susu Kekinian', pemilik: 'Rudi Hartono', lapak: 'C-02', kat: 'Minuman', kontak: '0812-7777-8899', omzet: 420000, status: 'Buka' },
            { nama: 'Aneka Gorengan', pemilik: 'Sri Wahyuni', lapak: 'A-04', kat: 'Camilan', kontak: '0812-8888-9900', omzet: 100000, status: 'Tutup' }
        ];
        const menuList = [
            { nama: 'Nasi Ayam Geprek', tenant: 'Dapur Geprek Bu Yati', kat: 'Makanan Berat', harga: 12000, icon: '🍗', stok: 24, terjual: 142, variasi: 'Level 1-5 / +Keju' },
            { nama: 'Nasi Telur Balado', tenant: 'Dapur Geprek Bu Yati', kat: 'Makanan Berat', harga: 10000, icon: '🍳', stok: 18, terjual: 96, variasi: 'Telur 1-2' },
            { nama: 'Nasi Ayam Katsu', tenant: 'Kantin Barokah', kat: 'Makanan Berat', harga: 14000, icon: '🍖', stok: 12, terjual: 74, variasi: 'Saus Mayo / Sambal' },
            { nama: 'Bakso Urat Jumbo', tenant: 'Bakso Urat Pak No', kat: 'Makanan Berat', harga: 13000, icon: '🍲', stok: 4, terjual: 88, variasi: 'Kuah / Goreng' },
            { nama: 'Nasi Pecel', tenant: 'Kantin Barokah', kat: 'Makanan Berat', harga: 9000, icon: '🥗', stok: 20, terjual: 61, variasi: 'Pedas / Tidak' },
            { nama: 'Pisang Goreng', tenant: 'Snack Corner', kat: 'Camilan', harga: 5000, icon: '🍌', stok: 30, terjual: 92, variasi: 'Keju / Coklat' },
            { nama: 'Roti Bakar', tenant: 'Snack Corner', kat: 'Camilan', harga: 7000, icon: '🍞', stok: 22, terjual: 64, variasi: 'Coklat / Srikaya' },
            { nama: 'Martabak Mini', tenant: 'Martabak Mini', kat: 'Camilan', harga: 6000, icon: '🥞', stok: 26, terjual: 58, variasi: 'Manis / Telur' },
            { nama: 'Aneka Gorengan', tenant: 'Aneka Gorengan', kat: 'Camilan', harga: 2000, icon: '🥟', stok: 0, terjual: 118, variasi: 'Tahu / Bakwan / Tempe' },
            { nama: 'Es Teh Manis', tenant: 'Kedai Jus & Buah', kat: 'Minuman', harga: 4000, icon: '🧋', stok: 48, terjual: 210, variasi: 'Manis / Tawar' },
            { nama: 'Jus Alpukat', tenant: 'Kedai Jus & Buah', kat: 'Minuman', harga: 8000, icon: '🥤', stok: 16, terjual: 76, variasi: 'Susu / Tanpa Susu' },
            { nama: 'Kopi Susu Gula Aren', tenant: 'Kopi Susu Kekinian', kat: 'Minuman', harga: 9000, icon: '☕', stok: 20, terjual: 84, variasi: 'Ice / Hot' },
            { nama: 'Susu UHT', tenant: 'Kedai Jus & Buah', kat: 'Minuman', harga: 5000, icon: '🥛', stok: 36, terjual: 132, variasi: 'Coklat / Vanilla' },
            { nama: 'Air Mineral', tenant: 'Kedai Jus & Buah', kat: 'Minuman', harga: 3000, icon: '💧', stok: 60, terjual: 184, variasi: 'Dingin / Normal' },
            { nama: 'Paket Geprek + Es Teh', tenant: 'Dapur Geprek Bu Yati', kat: 'Paket Hemat', harga: 14000, icon: '🍱', stok: 15, terjual: 66, variasi: '—' },
            { nama: 'Paket Katsu + Jus', tenant: 'Kantin Barokah', kat: 'Paket Hemat', harga: 19000, icon: '🥡', stok: 10, terjual: 38, variasi: '—' }
        ];
        const promoList = [
            { nama: 'Paket Geprek + Es Teh', ket: 'Harga Rp 14.000 (hemat Rp 2.000)', icon: '🍱', aktif: true },
            { nama: 'Diskon Camilan 15%', ket: 'Setiap Jumat, min. Rp 10.000', icon: '🍌', aktif: true },
            { nama: 'Promo Jam Tenang', ket: 'Diskon 10% pukul 10:00–10:30', icon: '⏰', aktif: true },
            { nama: 'Bundle Kopi + Roti', ket: 'Hemat Rp 3.000 s/d 31 Okt', icon: '☕', aktif: true },
            { nama: 'Gratis Es Teh', ket: 'Min. belanja Rp 25.000', icon: '🧋', aktif: false },
            { nama: 'Voucher Siswa Baru', ket: 'Potongan Rp 5.000 transaksi pertama', icon: '🎟️', aktif: true }
        ];
        const paketList = [
            { kode: 'PKT01', nama: 'Paket Geprek + Es Teh', isi: 'Nasi Ayam Geprek + Es Teh', normal: 16000, paket: 14000, berlaku: 's/d 31 Okt 2026', status: 'Aktif' },
            { kode: 'PKT02', nama: 'Paket Katsu + Jus', isi: 'Nasi Katsu + Jus Alpukat', normal: 22000, paket: 19000, berlaku: 's/d 31 Okt 2026', status: 'Aktif' },
            { kode: 'PKT03', nama: 'Paket Snack Sehat', isi: 'Pisang Goreng + Susu UHT', normal: 10000, paket: 8500, berlaku: 's/d 20 Okt 2026', status: 'Aktif' },
            { kode: 'PKT04', nama: 'Paket Sarapan', isi: 'Roti Bakar + Kopi Susu', normal: 16000, paket: 14000, berlaku: 's/d 30 Sep 2026', status: 'Berakhir' }
        ];
        const topupData = [
            { ref: 'TU-2026-2048', siswa: 'Keira Faza', kelas: 'VIII-A', kartu: '•••• 0101', metode: 'Tunai (Loket)', nominal: 50000, waktu: '10:44', status: 'Berhasil' },
            { ref: 'TU-2026-2047', siswa: 'Ahmad Fauzan', kelas: 'IX-A', kartu: '•••• 4821', metode: 'Transfer Wali', nominal: 100000, waktu: '10:20', status: 'Berhasil' },
            { ref: 'TU-2026-2046', siswa: 'Siti Nurhaliza', kelas: 'VII-B', kartu: '•••• 2388', metode: 'Tunai (Loket)', nominal: 20000, waktu: '09:58', status: 'Berhasil' },
            { ref: 'TU-2026-2045', siswa: 'Bunga Ayu', kelas: 'VII-B', kartu: '•••• 4120', metode: 'Tunai (Loket)', nominal: 50000, waktu: '09:35', status: 'Pending' },
            { ref: 'TU-2026-2044', siswa: 'Hafiz Rizki', kelas: 'VII-A', kartu: '•••• 9012', metode: 'Transfer Wali', nominal: 30000, waktu: '09:10', status: 'Berhasil' },
            { ref: 'TU-2026-2043', siswa: 'Fajar Nugroho', kelas: 'IX-A', kartu: '•••• 3355', metode: 'Tunai (Loket)', nominal: 20000, waktu: '08:42', status: 'Berhasil' }
        ];
        const limitData = [
            { nama: 'Keira Faza', kelas: 'VIII-A', saldo: 45000, limit: 25000, pakai: 21000 },
            { nama: 'Ahmad Fauzan', kelas: 'IX-A', saldo: 452000, limit: 40000, pakai: 15000 },
            { nama: 'Siti Nurhaliza', kelas: 'VII-B', saldo: 318000, limit: 25000, pakai: 10500 },
            { nama: 'Bunga Ayu', kelas: 'VII-B', saldo: 18000, limit: 25000, pakai: 25500 },
            { nama: 'Hafiz Rizki', kelas: 'VII-A', saldo: 38000, limit: 25000, pakai: 8000 },
            { nama: 'Fajar Nugroho', kelas: 'IX-A', saldo: 96200, limit: 40000, pakai: 13500 }
        ];
        const terlarisData = [
            { nama: 'Es Teh Manis', tenant: 'Kedai Jus & Buah', kat: 'Minuman', terjual: 210, omzet: 840000 },
            { nama: 'Air Mineral', tenant: 'Kedai Jus & Buah', kat: 'Minuman', terjual: 184, omzet: 552000 },
            { nama: 'Nasi Ayam Geprek', tenant: 'Dapur Geprek Bu Yati', kat: 'Makanan Berat', terjual: 142, omzet: 1704000 },
            { nama: 'Susu UHT', tenant: 'Kedai Jus & Buah', kat: 'Minuman', terjual: 132, omzet: 660000 },
            { nama: 'Aneka Gorengan', tenant: 'Aneka Gorengan', kat: 'Camilan', terjual: 118, omzet: 236000 },
            { nama: 'Nasi Telur Balado', tenant: 'Dapur Geprek Bu Yati', kat: 'Makanan Berat', terjual: 96, omzet: 960000 },
            { nama: 'Pisang Goreng', tenant: 'Snack Corner', kat: 'Camilan', terjual: 92, omzet: 460000 },
            { nama: 'Bakso Urat Jumbo', tenant: 'Bakso Urat Pak No', kat: 'Makanan Berat', terjual: 88, omzet: 1144000 },
            { nama: 'Kopi Susu Gula Aren', tenant: 'Kopi Susu Kekinian', kat: 'Minuman', terjual: 84, omzet: 756000 },
            { nama: 'Jus Alpukat', tenant: 'Kedai Jus & Buah', kat: 'Minuman', terjual: 76, omzet: 608000 }
        ];
        const rekapData = [
            { waktu: '10:42', siswa: 'Ahmad Fauzan', kelas: 'IX-A', tenant: 'Dapur Geprek Bu Yati', item: '2x Nasi Ayam Geprek, 1x Es Teh', metode: 'E-Money', jumlah: 28000, saldo: 424000 },
            { waktu: '10:15', siswa: 'Bunga Ayu', kelas: 'VII-B', tenant: 'Kantin Barokah', item: '1x Nasi Katsu', metode: 'E-Money', jumlah: 14000, saldo: 18000 },
            { waktu: '09:58', siswa: 'Siti Nurhaliza', kelas: 'VII-B', tenant: 'Snack Corner', item: '1x Roti Bakar, 1x Susu UHT', metode: 'E-Money', jumlah: 12000, saldo: 306000 },
            { waktu: '09:40', siswa: 'Hafiz Rizki', kelas: 'VII-A', tenant: 'Snack Corner', item: '2x Pisang Goreng', metode: 'Tunai', jumlah: 10000, saldo: 38000 },
            { waktu: '09:20', siswa: 'Keira Faza', kelas: 'VIII-A', tenant: 'Kedai Jus & Buah', item: '1x Jus Alpukat', metode: 'QRIS', jumlah: 8000, saldo: 37000 },
            { waktu: '09:05', siswa: 'Fajar Nugroho', kelas: 'IX-A', tenant: 'Bakso Urat Pak No', item: '1x Bakso Urat Jumbo', metode: 'E-Money', jumlah: 13000, saldo: 83200 },
            { waktu: '08:50', siswa: 'Ahmad Fauzan', kelas: 'IX-A', tenant: 'Kopi Susu Kekinian', item: '1x Kopi Susu Gula Aren', metode: 'E-Money', jumlah: 9000, saldo: 452000 }
        ];
        const qrRecentData = [
            { siswa: 'Ahmad Fauzan', kelas: 'IX-A', jumlah: 28000, metode: 'E-Money', waktu: '10:42', status: 'Berhasil' },
            { siswa: 'Bunga Ayu', kelas: 'VII-B', jumlah: 14000, metode: 'E-Money', waktu: '10:15', status: 'Melebihi Limit' },
            { siswa: 'Siti Nurhaliza', kelas: 'VII-B', jumlah: 12000, metode: 'E-Money', waktu: '09:58', status: 'Berhasil' },
            { siswa: 'Fajar Nugroho', kelas: 'IX-A', jumlah: 13000, metode: 'E-Money', waktu: '09:05', status: 'Berhasil' }
        ];

        const menuKats = ['Semua', 'Makanan Berat', 'Camilan', 'Minuman', 'Paket Hemat'];

        // ---------- TENANT ----------
        function renderTenant() {
            const q = (document.getElementById('searchTenant').value || '').toLowerCase();
            const st = document.getElementById('filterTenantStatus').value;
            const rows = tenants.filter(t => (!q || t.nama.toLowerCase().includes(q) || t.pemilik.toLowerCase().includes(q) || t.lapak.toLowerCase().includes(q)) && (!st || t.status === st));
            document.getElementById('tenantEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('tenantBody').innerHTML = rows.map(t =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3"><span class="w-9 h-9 rounded-xl bg-amber-50 grid place-items-center text-lg">🏪</span><span class="font-semibold text-slate-800">' + t.nama + '</span></div></td>'
                + '<td class="px-4 py-3 text-slate-600">' + t.pemilik + '</td>'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-600">' + t.lapak + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + t.kat + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + t.kontak + '</td>'
                + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(t.omzet) + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[t.status] + ' px-2.5 py-1 rounded-full">' + t.status + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap"><button onclick="showToast(\'info\',\'Mengelola tenant ' + t.nama + '\')" class="text-xs font-bold text-navy hover:underline">Kelola</button></td>'
                + '</tr>').join('');
        }

        // ---------- MENU DIGITAL ----------
        function renderMenu() {
            const q = (document.getElementById('searchMenu').value || '').toLowerCase();
            const tn = document.getElementById('filterTenantMenu').value;
            const kt = document.getElementById('filterKategori').value;
            const rows = menuList.filter(m => (!q || m.nama.toLowerCase().includes(q) || m.tenant.toLowerCase().includes(q)) && (!tn || m.tenant === tn) && (!kt || m.kat === kt));
            document.getElementById('menuEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('menuGrid').innerHTML = rows.map(m => {
                const st = m.stok === 0 ? 'Habis' : m.stok <= 5 ? 'Menipis' : 'Tersedia';
                return '<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">'
                    + '<div class="h-28 hero-gradient grid place-items-center text-5xl">' + m.icon + '</div>'
                    + '<div class="p-3">'
                    + '<div class="flex items-center justify-between gap-2"><span class="text-[10px] font-bold text-slate-400 uppercase">' + m.kat + '</span><span class="text-[10px] font-bold ' + statusBadge[st] + ' px-2 py-0.5 rounded-full">' + st + '</span></div>'
                    + '<p class="mt-1 font-bold text-slate-800 leading-tight">' + m.nama + '</p>'
                    + '<p class="text-[11px] text-slate-400 truncate">' + m.tenant + '</p>'
                    + '<p class="text-[11px] text-slate-500 mt-0.5">Variasi: ' + m.variasi + '</p>'
                    + '<p class="mt-1 font-heading font-extrabold text-navy">' + fmtRp(m.harga) + '</p>'
                    + '</div></div>';
            }).join('');
        }
        function fillTenantSelect() {
            const opts = '<option value="">Semua Stand</option>' + tenants.map(t => '<option value="' + t.nama + '">' + t.nama + '</option>').join('');
            const fm = document.getElementById('filterTenantMenu');
            if (fm) fm.innerHTML = opts;
            const pt = document.getElementById('posTenant');
            if (pt) pt.innerHTML = opts;
        }

        // ---------- STOK HARIAN ----------
        function renderStok() {
            const q = (document.getElementById('searchStok').value || '').toLowerCase();
            const rows = menuList.filter(m => !q || m.nama.toLowerCase().includes(q));
            let tersedia = 0, menipis = 0, habis = 0, porsi = 0;
            rows.forEach(m => { porsi += m.stok; if (m.stok === 0) habis++; else if (m.stok <= 5) menipis++; else tersedia++; });
            document.getElementById('stokTersediaCnt').textContent = tersedia;
            document.getElementById('stokMenipisCnt').textContent = menipis;
            document.getElementById('stokHabisCnt').textContent = habis;
            document.getElementById('stokPorsiTotal').textContent = porsi;
            document.getElementById('stokBody').innerHTML = rows.map((m, i) =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3"><div class="flex items-center gap-2"><span class="text-lg">' + m.icon + '</span><span class="font-semibold text-slate-800">' + m.nama + '</span></div></td>'
                + '<td class="px-4 py-3 text-slate-500">' + m.tenant + '</td>'
                + '<td class="px-4 py-3 text-center text-slate-600">' + (m.stok + m.terjual) + '</td>'
                + '<td class="px-4 py-3 text-center text-slate-600">' + m.terjual + '</td>'
                + '<td class="px-4 py-3 text-center font-bold ' + (m.stok <= 5 ? 'text-red-700' : 'text-slate-800') + '">' + m.stok + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[m.stok === 0 ? 'Habis' : m.stok <= 5 ? 'Menipis' : 'Tersedia'] + ' px-2.5 py-1 rounded-full">' + (m.stok === 0 ? 'Habis' : m.stok <= 5 ? 'Menipis' : 'Tersedia') + '</span></td>'
                + '<td class="px-4 py-3 text-right"><label class="inline-flex items-center cursor-pointer"><input type="checkbox" onchange="toggleStok(' + i + ',this.checked)" ' + (m.stok > 0 ? 'checked' : '') + ' class="accent w-4 h-4"><span class="ml-1.5 text-[11px] font-bold text-slate-500">Tersedia</span></label></td>'
                + '</tr>').join('');
        }
        function toggleStok(i, on) {
            const m = menuList[i];
            if (!m) return;
            if (on && m.stok === 0) { m.stok = 10; }
            showToast(on ? 'success' : 'warn', m.nama + ' → ' + (on ? 'Tersedia untuk dijual' : 'Ditandai Habis'));
        }

        // ---------- PROMO ----------
        function renderPromo() {
            document.getElementById('promoCards').innerHTML = promoList.map(p =>
                '<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">'
                + '<div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-amber-50 grid place-items-center text-xl">' + p.icon + '</span><span class="text-[11px] font-bold ' + (p.aktif ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-600') + ' px-2.5 py-1 rounded-full">' + (p.aktif ? 'Aktif' : 'Nonaktif') + '</span></div>'
                + '<p class="mt-3 font-heading font-bold text-slate-800">' + p.nama + '</p>'
                + '<p class="text-xs text-slate-400 mt-1">' + p.ket + '</p>'
                + '</div>').join('');
            document.getElementById('paketBody').innerHTML = paketList.map(p =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3 font-mono text-xs font-bold text-navy">' + p.kode + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-800">' + p.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + p.isi + '</td>'
                + '<td class="px-4 py-3 text-right text-slate-500 line-through">' + fmtRp(p.normal) + '</td>'
                + '<td class="px-4 py-3 text-right font-bold text-emerald-700">' + fmtRp(p.paket) + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + p.berlaku + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (p.status === 'Aktif' ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-600') + ' px-2.5 py-1 rounded-full">' + p.status + '</span></td>'
                + '</tr>').join('');
        }

        // ---------- POS ----------
        let cart = [], posKat = 'Semua';
        function renderPOS() {
            document.getElementById('posKategori').innerHTML = menuKats.map(c =>
                '<button onclick="setPosKat(\'' + c + '\')" class="text-xs font-bold px-3 py-1.5 rounded-full border transition-colors ' + (c === posKat ? 'bg-navy text-white border-navy' : 'bg-white text-slate-600 border-slate-200 hover:border-navy') + '">' + c + '</button>').join('');
            const q = (document.getElementById('posSearch').value || '').toLowerCase();
            const tn = document.getElementById('posTenant').value;
            const rows = menuList.filter(m => (posKat === 'Semua' || m.kat === posKat) && (!tn || m.tenant === tn) && (!q || m.nama.toLowerCase().includes(q)));
            const grid = document.getElementById('posGrid');
            if (!rows.length) { grid.innerHTML = '<p class="col-span-full text-center text-sm text-slate-400 py-8">Menu tidak ditemukan.</p>'; return; }
            grid.innerHTML = rows.map(m => {
                const avail = m.stok > 0;
                const st = m.stok === 0 ? 'Habis' : m.stok <= 5 ? 'Menipis' : 'Tersedia';
                return '<button onclick="' + (avail ? 'addToCart(\'' + m.nama + '\')' : "showToast('warn','Menu " + m.nama + " sedang habis')") + '" class="pos-tile text-left bg-white border border-slate-200 hover:border-navy hover:shadow-md rounded-2xl p-3 ' + (avail ? '' : 'opacity-50 cursor-not-allowed') + '">'
                    + '<div class="flex items-start justify-between"><span class="text-3xl">' + m.icon + '</span><span class="text-[10px] font-bold ' + statusBadge[st] + ' px-2 py-0.5 rounded-full">' + (st === 'Tersedia' ? 'Sisa ' + m.stok : st) + '</span></div>'
                    + '<p class="mt-2 text-sm font-bold text-slate-800 leading-tight">' + m.nama + '</p>'
                    + '<p class="text-[10px] text-slate-400 truncate">' + m.tenant + '</p>'
                    + '<p class="mt-1 text-sm font-heading font-extrabold text-navy">' + fmtRp(m.harga) + '</p>'
                    + '</button>';
            }).join('');
        }
        function setPosKat(c) { posKat = c; renderPOS(); }
        function addToCart(nama) {
            const m = menuList.find(x => x.nama === nama);
            if (!m) return;
            const it = cart.find(x => x.nama === nama);
            if (it) it.qty++;
            else cart.push({ nama: m.nama, harga: m.harga, qty: 1, icon: m.icon });
            renderCart(); playBeep();
            showToast('success', m.nama + ' ditambahkan');
        }
        function renderCart() {
            const wrap = document.getElementById('posCart');
            const count = cart.reduce((s, i) => s + i.qty, 0);
            document.getElementById('cartCount').textContent = count + ' item';
            if (!cart.length) {
                wrap.innerHTML = '<div class="py-10 text-center text-slate-400"><div class="text-3xl">🛒</div><p class="mt-2 text-sm">Keranjang kosong</p></div>';
            } else {
                wrap.innerHTML = cart.map((i, idx) =>
                    '<div class="flex items-center gap-3 bg-slate-50 rounded-xl px-3 py-2">'
                    + '<span class="text-lg">' + i.icon + '</span>'
                    + '<div class="min-w-0 flex-1"><p class="text-sm font-semibold text-slate-800 truncate">' + i.nama + '</p><p class="text-[11px] text-slate-400">' + fmtRp(i.harga) + '</p></div>'
                    + '<div class="flex items-center gap-1.5">'
                    + '<button onclick="decCart(' + idx + ')" class="w-6 h-6 rounded-lg bg-white border border-slate-200 text-slate-600 font-bold">−</button>'
                    + '<span class="text-sm font-bold text-slate-800 w-5 text-center">' + i.qty + '</span>'
                    + '<button onclick="incCart(' + idx + ')" class="w-6 h-6 rounded-lg bg-white border border-slate-200 text-slate-600 font-bold">+</button>'
                    + '</div></div>').join('');
            }
            const sub = cart.reduce((s, i) => s + i.harga * i.qty, 0);
            const diskon = sub >= 25000 ? Math.round(sub * 0.05) : 0;
            document.getElementById('posSubtotal').textContent = fmtRp(sub);
            document.getElementById('posDiskon').textContent = '− ' + fmtRp(diskon);
            document.getElementById('posTotal').textContent = fmtRp(sub - diskon);
        }
        function incCart(i) { cart[i].qty++; renderCart(); }
        function decCart(i) { cart[i].qty--; if (cart[i].qty <= 0) cart.splice(i, 1); renderCart(); }
        function clearCart() { cart = []; renderCart(); showToast('info', 'Keranjang dikosongkan'); }
        function cartTotals() {
            const sub = cart.reduce((s, i) => s + i.harga * i.qty, 0);
            const diskon = sub >= 25000 ? Math.round(sub * 0.05) : 0;
            return { sub: sub, diskon: diskon, total: sub - diskon };
        }
        function bayarTunai() {
            if (!cart.length) { showToast('warn', 'Keranjang masih kosong'); return; }
            const t = cartTotals();
            openStruk(cart, t.total, 'Tunai');
            cart = []; renderCart(); renderPOS();
            showToast('success', 'Pembayaran tunai berhasil');
        }

        // ---------- SCAN QR ----------
        let scanAmount = 0;
        function openScanPay() {
            if (!cart.length) { showToast('warn', 'Tambahkan menu ke keranjang terlebih dahulu'); return; }
            const t = cartTotals();
            scanAmount = t.total;
            const stu = { nama: 'Keira Faza', kelas: 'VIII-A', kartu: '•••• 0101', saldo: 45000, limit: 25000, pakai: 21000 };
            document.getElementById('scanPhoto').textContent = initials(stu.nama);
            document.getElementById('scanSiswa').textContent = stu.nama;
            document.getElementById('scanKelas').textContent = 'Kelas ' + stu.kelas + ' · ' + stu.kartu;
            document.getElementById('scanSaldo').textContent = fmtRp(stu.saldo);
            document.getElementById('scanTotal').textContent = fmtRp(scanAmount);
            const after = stu.pakai + scanAmount;
            const pct = Math.min(100, Math.round((after / stu.limit) * 100));
            const over = after > stu.limit || scanAmount > stu.saldo;
            const box = document.getElementById('scanLimitBox');
            const bar = document.getElementById('scanLimitBar');
            const badge = document.getElementById('scanLimitStatus');
            badge.textContent = over ? 'Melebihi Limit' : after >= stu.limit * 0.8 ? 'Mendekati Limit' : 'Aman';
            bar.style.width = pct + '%';
            bar.className = 'h-full ' + (over ? 'bg-red-500' : after >= stu.limit * 0.8 ? 'bg-amber-500' : 'bg-emerald-500');
            box.className = 'rounded-xl px-3 py-3 border ' + (over ? 'bg-red-50 border-red-200' : 'bg-slate-50 border-slate-100');
            badge.className = 'text-[11px] font-bold px-2.5 py-1 rounded-full ' + (over ? 'bg-red-100 text-red-800' : after >= stu.limit * 0.8 ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800');
            document.getElementById('scanLimitInfo').textContent = 'Terpakai hari ini: ' + fmtRp(stu.pakai) + ' + belanja ' + fmtRp(scanAmount) + ' dari limit ' + fmtRp(stu.limit) + '.';
            document.getElementById('scanWarn').classList.toggle('hidden', !over);
            document.getElementById('scanOkBtn').disabled = over;
            document.getElementById('scanOkBtn').className = over ? 'bg-slate-200 text-slate-400 text-sm font-bold px-5 py-2.5 rounded-xl cursor-not-allowed' : 'bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors';
            document.getElementById('scanModal').classList.remove('hidden');
            document.getElementById('scanModal').classList.add('flex');
            playBeep();
        }
        function closeScan() { const m = document.getElementById('scanModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function confirmScanPay() {
            const t = cartTotals();
            const sisa = 45000 - t.total;
            closeScan();
            openStruk(cart, t.total, 'E-Money', sisa);
            addQrRecent('Keira Faza', 'VIII-A', t.total, 'Berhasil');
            cart = []; renderCart(); renderPOS();
            playBeep();
            showToast('success', 'Pembayaran E-Money berhasil · saldo terpotong ' + fmtRp(t.total));
        }

        // ---------- TOP-UP ----------
        function renderTopup() {
            const q = (document.getElementById('searchTopup').value || '').toLowerCase();
            const rows = topupData.filter(t => !q || t.siswa.toLowerCase().includes(q));
            document.getElementById('topupEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('topupBody').innerHTML = rows.map(t =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + t.ref + '</td>'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(t.siswa) + '<span class="font-semibold text-slate-800">' + t.siswa + '</span></div></td>'
                + '<td class="px-4 py-3 text-slate-600">' + t.kelas + '</td>'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + t.kartu + '</td>'
                + '<td class="px-4 py-3 text-slate-600">' + t.metode + '</td>'
                + '<td class="px-4 py-3 text-right font-bold text-emerald-700">+' + fmtRp(t.nominal) + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + t.waktu + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[t.status] + ' px-2.5 py-1 rounded-full">' + t.status + '</span></td>'
                + '</tr>').join('');
        }
        function quickTopup(v) {
            showView('topup', 'Top-up Saldo E-Money');
            setNominal(v);
            openTopup();
        }
        function setNominal(v) {
            const el = document.getElementById('topupNominal');
            if (el) el.value = v;
        }
        function openTopup() { const m = document.getElementById('topupModal'); m.classList.remove('hidden'); m.classList.add('flex'); }
        function closeTopup() { const m = document.getElementById('topupModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function submitTopup() {
            const v = parseInt(document.getElementById('topupNominal').value || 0);
            closeTopup(); playBeep();
            showToast('success', 'Top-up ' + fmtRp(v) + ' berhasil · bukti dikirim ke wali');
        }

        // ---------- LIMIT ----------
        function renderLimit() {
            const q = (document.getElementById('searchLimit').value || '').toLowerCase();
            const rows = limitData.filter(l => !q || l.nama.toLowerCase().includes(q));
            document.getElementById('limitBody').innerHTML = rows.map(l => {
                const pct = Math.min(100, Math.round((l.pakai / l.limit) * 100));
                const over = l.pakai > l.limit;
                const low = l.saldo < 20000;
                const bar = over ? 'bg-red-500' : pct >= 80 ? 'bg-amber-500' : 'bg-emerald-500';
                const st = over ? 'Melebihi Limit' : 'Aman';
                return '<tr class="hover:bg-slate-50">'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(l.nama) + '<span class="font-semibold text-slate-800">' + l.nama + '</span></div></td>'
                    + '<td class="px-4 py-3 text-slate-600">' + l.kelas + '</td>'
                    + '<td class="px-4 py-3 text-right font-semibold ' + (low ? 'text-amber-700' : 'text-slate-900') + '">' + fmtRp(l.saldo) + '</td>'
                    + '<td class="px-4 py-3 text-right text-slate-700">' + fmtRp(l.limit) + '</td>'
                    + '<td class="px-4 py-3 text-right font-semibold ' + (over ? 'text-red-700' : 'text-slate-700') + '">' + fmtRp(l.pakai) + '</td>'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-2"><div class="flex-1 h-2 rounded-full bg-slate-100 overflow-hidden"><div class="h-full ' + bar + '" style="width:' + pct + '%"></div></div><span class="text-[11px] font-bold text-slate-500 w-9 text-right">' + pct + '%</span></div><span class="text-[10px] font-bold ' + statusBadge[st] + ' px-2 py-0.5 rounded-full mt-1 inline-block">' + st + '</span></td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="showToast(\'info\',\'Mengubah limit harian ' + l.nama + '\')" class="text-xs font-bold text-navy hover:underline">Ubah Limit</button></td>'
                    + '</tr>';
            }).join('');
        }

        // ---------- PENJUALAN PER TENANT ----------
        function renderPenjualan() {
            const q = (document.getElementById('searchPenjualan').value || '').toLowerCase();
            const rows = tenants.filter(t => !q || t.nama.toLowerCase().includes(q) || t.pemilik.toLowerCase().includes(q));
            document.getElementById('penjualanEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('penjualanBody').innerHTML = rows.map(t => {
                const komisi = Math.round(t.omzet * 0.1);
                const net = t.omzet - komisi;
                const porsi = Math.round(t.omzet / 11000);
                return '<tr class="hover:bg-slate-50">'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-3"><span class="w-9 h-9 rounded-xl bg-amber-50 grid place-items-center text-lg">🏪</span><span class="font-semibold text-slate-800">' + t.nama + '</span></div></td>'
                    + '<td class="px-4 py-3 text-slate-600">' + t.pemilik + '</td>'
                    + '<td class="px-4 py-3 text-center font-semibold text-slate-700">' + porsi + '</td>'
                    + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(t.omzet) + '</td>'
                    + '<td class="px-4 py-3 text-right text-blue-700">' + fmtRp(komisi) + '</td>'
                    + '<td class="px-4 py-3 text-right font-bold text-emerald-700">' + fmtRp(net) + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (t.status === 'Buka' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800') + ' px-2.5 py-1 rounded-full">' + (t.status === 'Buka' ? 'Berjalan' : 'Tutup') + '</span></td>'
                    + '</tr>';
            }).join('');
        }

        // ---------- SETTLEMENT ----------
        let settleState = tenants.map((t, i) => ({
            nama: t.nama, pemilik: t.pemilik, omzet: t.omzet,
            omzetKotor: t.omzet * 7, // akumulasi mingguan contoh
            status: i < 3 ? 'Belum Ditransfer' : 'Lunas Ditransfer'
        }));
        function renderSettlement() {
            const q = (document.getElementById('searchSettlement').value || '').toLowerCase();
            const st = document.getElementById('filterSettlement').value;
            const rows = settleState.filter(s => (!q || s.nama.toLowerCase().includes(q) || s.pemilik.toLowerCase().includes(q)) && (!st || s.status === st));
            let pendingCnt = 0, pendingVal = 0, selesaiCnt = 0;
            settleState.forEach(s => {
                const komisi = Math.round(s.omzetKotor * 0.1);
                const net = s.omzetKotor - komisi;
                if (s.status === 'Belum Ditransfer') { pendingCnt++; pendingVal += net; } else selesaiCnt++;
            });
            document.getElementById('settlePendingCnt').textContent = pendingCnt;
            document.getElementById('settlePendingVal').textContent = fmtRp(pendingVal);
            document.getElementById('settleSelesaiCnt').textContent = selesaiCnt;
            document.getElementById('settlementEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('settlementBody').innerHTML = rows.map(s => {
                const komisi = Math.round(s.omzetKotor * 0.1);
                const net = s.omzetKotor - komisi;
                const done = s.status === 'Lunas Ditransfer';
                const act = done
                    ? '<button onclick="cetakBukti(\'' + s.nama + '\')" class="text-xs font-bold text-slate-600 hover:underline">Cetak Bukti</button>'
                    : '<div class="flex justify-end gap-2"><button onclick="detailTenant(\'' + s.nama + '\')" class="text-xs font-bold text-navy hover:underline">Detail</button><button onclick="transferTenant(\'' + s.nama + '\')" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1.5 rounded-lg">Transfer</button></div>';
                return '<tr class="hover:bg-slate-50">'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-3"><span class="w-9 h-9 rounded-xl bg-amber-50 grid place-items-center text-lg">🏪</span><span class="font-semibold text-slate-800">' + s.nama + '</span></div></td>'
                    + '<td class="px-4 py-3 text-slate-600">' + s.pemilik + '</td>'
                    + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(s.omzetKotor) + '</td>'
                    + '<td class="px-4 py-3 text-right text-blue-700">' + fmtRp(komisi) + ' <span class="text-[10px] text-slate-400">(10%)</span></td>'
                    + '<td class="px-4 py-3 text-right font-bold text-emerald-700">' + fmtRp(net) + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[s.status] + ' px-2.5 py-1 rounded-full">' + s.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap">' + act + '</td>'
                    + '</tr>';
            }).join('');
        }
        function transferTenant(nama) {
            const s = settleState.find(x => x.nama === nama);
            if (!s) return;
            const net = s.omzetKotor - Math.round(s.omzetKotor * 0.1);
            openConfirm('Transfer Settlement', 'Transfer ' + fmtRp(net) + ' ke ' + s.pemilik + ' (' + nama + ')?', () => {
                s.status = 'Lunas Ditransfer';
                renderSettlement();
                showToast('success', 'Settlement ' + nama + ' berhasil ditransfer');
            });
        }
        function prosesSettlementMassal() {
            const pending = settleState.filter(s => s.status === 'Belum Ditransfer');
            if (!pending.length) { showToast('info', 'Semua settlement sudah lunas ditransfer'); return; }
            openConfirm('Settlement Massal', 'Proses transfer untuk ' + pending.length + ' tenant yang belum ditransfer?', () => {
                pending.forEach(s => s.status = 'Lunas Ditransfer');
                renderSettlement();
                showToast('success', pending.length + ' settlement berhasil diproses');
            });
        }
        function detailTenant(nama) { showToast('info', 'Membuka detail transaksi ' + nama); }
        function cetakBukti(nama) { showToast('success', 'Bukti transfer ' + nama + ' dicetak'); }

        // ---------- MENU TERLARIS ----------
        function renderTerlaris() {
            document.getElementById('terlarisBody').innerHTML = terlarisData.map((m, i) =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3"><span class="w-7 h-7 rounded-lg ' + (i < 3 ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-600') + ' grid place-items-center text-xs font-bold">#' + (i + 1) + '</span></td>'
                + '<td class="px-4 py-3 font-semibold text-slate-800">' + m.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + m.tenant + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + m.kat + '</td>'
                + '<td class="px-4 py-3 text-center font-semibold text-slate-700">' + m.terjual + '</td>'
                + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(m.omzet) + '</td>'
                + '</tr>').join('');
        }
        function renderChartBusy() {
            const wrap = document.getElementById('chartBusy');
            if (!wrap) return;
            const jam = ['06', '07', '08', '09', '10', '11', '12', '13'];
            const vals = [40, 120, 180, 320, 260, 150, 210, 90];
            const max = Math.max(...vals);
            wrap.innerHTML = jam.map((j, i) =>
                '<div class="flex flex-col items-center gap-2 flex-1">'
                + '<div class="w-full max-w-[38px] rounded-t-lg ' + (j === '09' ? 'bg-amber-500' : 'hero-gradient') + '" style="height:' + Math.round((vals[i] / max) * 160) + 'px" title="' + vals[i] + ' transaksi"></div>'
                + '<span class="text-[10px] font-semibold text-slate-400">' + j + ':00</span>'
                + '</div>').join('');
        }

        // ---------- REKAP TRANSAKSI SISWA ----------
        function renderRekap() {
            const q = (document.getElementById('searchRekap').value || '').toLowerCase();
            const kl = document.getElementById('filterKelas').value;
            const mt = document.getElementById('filterMetode').value;
            const rows = rekapData.filter(r => (!q || r.siswa.toLowerCase().includes(q) || r.kelas.toLowerCase().includes(q)) && (!kl || r.kelas === kl) && (!mt || r.metode === mt));
            document.getElementById('rekapEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('rekapBody').innerHTML = rows.map(r =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3 text-slate-500">' + r.waktu + '</td>'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(r.siswa) + '<span class="font-semibold text-slate-800">' + r.siswa + '</span></div></td>'
                + '<td class="px-4 py-3 text-slate-600">' + r.kelas + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + r.tenant + '</td>'
                + '<td class="px-4 py-3 text-slate-600">' + r.item + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + metodeBadge[r.metode] + ' px-2.5 py-1 rounded-full">' + r.metode + '</span></td>'
                + '<td class="px-4 py-3 text-right font-bold text-slate-900">' + fmtRp(r.jumlah) + '</td>'
                + '<td class="px-4 py-3 text-right font-semibold text-slate-700">' + fmtRp(r.saldo) + '</td>'
                + '</tr>').join('');
        }

        // ---------- DASHBOARD ----------
        function renderRecapTenant() {
            const rows = tenants.slice(0, 5);
            document.getElementById('recapTenantEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('recapTenantBody').innerHTML = rows.map((t, i) => {
                const porsi = Math.round(t.omzet / 11000);
                const st = i < 3 ? 'Belum Ditransfer' : 'Lunas Ditransfer';
                return '<tr class="hover:bg-slate-50">'
                    + '<td class="px-4 py-3 font-semibold text-slate-800">' + t.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + t.pemilik + '</td>'
                    + '<td class="px-4 py-3 text-center font-semibold text-slate-700">' + porsi + '</td>'
                    + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(t.omzet) + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[st] + ' px-2.5 py-1 rounded-full">' + st + '</span></td>'
                    + '</tr>';
            }).join('');
        }
        function renderChartPeak() {
            const wrap = document.getElementById('chartPeak');
            if (!wrap) return;
            const jam = ['06', '07', '08', '09', '10', '11', '12', '13'];
            const vals = [90, 640, 1180, 1520, 980, 720, 850, 500];
            const max = Math.max(...vals);
            wrap.innerHTML = jam.map((j, i) =>
                '<div class="flex flex-col items-center gap-2 flex-1">'
                + '<div class="w-full max-w-[38px] rounded-t-lg ' + (j === '09' ? 'bg-amber-500' : 'hero-gradient') + '" style="height:' + Math.round((vals[i] / max) * 160) + 'px" title="' + vals[i] + ' rb"></div>'
                + '<span class="text-[10px] font-semibold text-slate-400">' + j + ':00</span>'
                + '</div>').join('');
        }
        function renderTopMenu() {
            const wrap = document.getElementById('topMenuList');
            if (!wrap) return;
            wrap.innerHTML = terlarisData.slice(0, 5).map((m, i) =>
                '<div class="flex items-center gap-3 bg-slate-50 rounded-xl px-3 py-2.5">'
                + '<span class="w-7 h-7 rounded-lg ' + (i === 0 ? 'bg-amber-100 text-amber-800' : 'bg-white text-slate-500') + ' grid place-items-center text-xs font-bold">#' + (i + 1) + '</span>'
                + '<div class="min-w-0"><p class="text-sm font-semibold text-slate-800 truncate">' + m.nama + '</p><p class="text-[11px] text-slate-400 truncate">' + m.tenant + '</p></div>'
                + '<span class="ml-auto text-sm font-bold text-navy">' + m.terjual + 'x</span>'
                + '</div>').join('');
        }
        function loadQrRecent() {
            const wrap = document.getElementById('qrRecent');
            if (!wrap) return;
            wrap.innerHTML = qrRecentData.map(q =>
                '<div class="flex items-center gap-3 bg-slate-50 rounded-xl px-3 py-2.5">'
                + '<span class="w-8 h-8 rounded-lg ' + (q.status === 'Berhasil' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700') + ' grid place-items-center text-sm">' + (q.status === 'Berhasil' ? '✓' : '!') + '</span>'
                + '<div class="min-w-0"><p class="text-sm font-semibold text-slate-800 truncate">' + q.siswa + ' · ' + q.kelas + '</p><p class="text-[11px] text-slate-400">' + q.waktu + ' · ' + q.metode + '</p></div>'
                + '<span class="ml-auto text-sm font-bold ' + (q.status === 'Berhasil' ? 'text-slate-900' : 'text-red-600') + '">' + (q.status === 'Berhasil' ? '-' + fmtRp(q.jumlah) : 'Ditolak') + '</span>'
                + '</div>').join('');
        }
        function addQrRecent(siswa, kelas, jumlah, status) {
            qrRecentData.unshift({ siswa: siswa, kelas: kelas, jumlah: jumlah, metode: 'E-Money', waktu: new Date().toTimeString().slice(0, 5), status: status });
            if (document.getElementById('view-qrpay').classList.contains('active')) loadQrRecent();
        }

        // ---------- MODALS ----------
        function openStruk(items, total, metode, sisa) {
            document.getElementById('strukNo').textContent = 'INV-' + new Date().toISOString().slice(0, 10).replace(/-/g, '') + '-' + Math.floor(1000 + Math.random() * 9000);
            document.getElementById('strukItems').innerHTML = items.map(i =>
                '<div class="flex items-center justify-between"><span class="text-slate-700">' + i.qty + 'x ' + i.nama + '</span><span class="font-semibold text-slate-800">' + fmtRp(i.harga * i.qty) + '</span></div>').join('');
            document.getElementById('strukTotal').textContent = fmtRp(total);
            document.getElementById('strukMetode').textContent = metode;
            const wrap = document.getElementById('strukSisa');
            if (typeof sisa === 'number') { wrap.classList.remove('hidden'); document.getElementById('strukSisaVal').textContent = fmtRp(sisa); }
            else wrap.classList.add('hidden');
            const m = document.getElementById('strukModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeStruk() { const m = document.getElementById('strukModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        let confirmCb = null;
        function openConfirm(title, msg, cb) {
            document.getElementById('confirmTitle').textContent = title;
            document.getElementById('confirmMsg').textContent = msg;
            confirmCb = cb;
            const m = document.getElementById('confirmModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeConfirm() { const m = document.getElementById('confirmModal'); m.classList.add('hidden'); m.classList.remove('flex'); confirmCb = null; }
        document.getElementById('confirmOk').addEventListener('click', () => {
            const cb = confirmCb; closeConfirm(); if (cb) cb();
        });

        // ---------- TOAST ----------
        function showToast(type, msg) {
            const wrap = document.getElementById('toastWrap');
            const map = {
                success: { bg: 'bg-emerald-600', icon: '✓' },
                info: { bg: 'bg-navy', icon: 'ℹ' },
                warn: { bg: 'bg-amber-500', icon: '⚠' },
                error: { bg: 'bg-red-600', icon: '✕' }
            };
            const t = map[type] || map.info;
            const el = document.createElement('div');
            el.className = 'flex items-center gap-3 ' + t.bg + ' text-white text-sm font-semibold px-4 py-3 rounded-xl shadow-lg translate-y-2 opacity-0 transition-all duration-300 max-w-xs';
            el.innerHTML = '<span class="w-6 h-6 rounded-full bg-white/25 grid place-items-center text-xs flex-shrink-0">' + t.icon + '</span><span>' + msg + '</span>';
            wrap.appendChild(el);
            requestAnimationFrame(() => { el.classList.remove('translate-y-2', 'opacity-0'); });
            setTimeout(() => { el.classList.add('opacity-0', 'translate-y-2'); setTimeout(() => el.remove(), 300); }, 3200);
        }

        // ---------- INIT ----------
        document.addEventListener('DOMContentLoaded', () => {
            fillTenantSelect();
            renderRecapTenant();
            renderChartPeak();
            renderTopMenu();
            renderCart();
        });
    </script>
</body>

</html>
