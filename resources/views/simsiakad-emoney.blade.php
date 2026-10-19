<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal E-Money Siswa (Kasir Digital &amp; Cashless) · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal E-Money Siswa SIAKAD PLUS — kasir digital & pembayaran cashless sekolah: top up saldo, riwayat transaksi, tarik/refund, data kartu siswa, limit harian, merchant/outlet, dan laporan cashless.">
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
        .hero-gradient { background: linear-gradient(135deg, #1E3A8A 0%, #1E40AF 55%, #0284C7 100%); }
        .card-gradient { background: linear-gradient(135deg, #1E3A8A 0%, #312E81 60%, #0F172A 100%); }
        .grid-pattern {
            background-image: linear-gradient(rgba(255,255,255,0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 42px 42px;
        }
        .sidebar-group-body { max-height: 0; overflow: hidden; transition: max-height .3s ease; }
        .sidebar-group.open .sidebar-group-body { max-height: 700px; }
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
        .qr-grid { background-image: repeating-linear-gradient(0deg, #0f172a 0 6px, transparent 6px 12px), repeating-linear-gradient(90deg, #0f172a 0 6px, transparent 6px 12px); background-size: 12px 12px; }
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
                <p class="text-[10px] text-slate-500">Kasir &amp; Kartu Digital</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard E-Money</span>
            </button>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💳</span><span class="flex-1 text-left">Transaksi &amp; Saldo</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="topup" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Top Up Saldo</button>
                    <button data-view="riwayat" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Riwayat Transaksi</button>
                    <button data-view="refund" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tarik &amp; Refund</button>
                </div>
            </div>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🧾</span><span class="flex-1 text-left">Kartu &amp; Pengaturan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="kartu" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Data Kartu Siswa</button>
                    <button data-view="limit" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Limit Harian Siswa</button>
                    <button data-view="merchant" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Merchant &amp; Outlet</button>
                    <button data-view="laporan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Laporan Cashless</button>
                </div>
            </div>

        </nav>

        <div class="p-3 border-t border-white/10 flex-shrink-0">
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Kasir &amp; Kartu Digital</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard E-Money</h1>
                </div>

                <div class="hidden lg:flex items-center flex-1 max-w-md mx-auto">
                    <div class="relative w-full">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                        <input onkeydown="if(event.key==='Enter')cariKartuQuick(this.value)" placeholder="Cari Nama / No. Kartu Siswa..."
                            class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                    </div>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <div class="hidden xl:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Total Saldo</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">Rp 128,4 jt</p>
                        </div>
                        <span class="text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-200 px-2.5 py-1 rounded-full">1.248 kartu</span>
                    </div>
                    <button onclick="showToast('info', '2 kartu menunggu verifikasi & 5 saldo di bawah limit')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">KS</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Kasir Sekolah</p>
                            <p class="text-[10px] text-slate-400">Unit Cashless</p>
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
                            <p class="text-sm text-white/85">Total Saldo E-Money Siswa</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">Rp 128.450.000</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">💳 1.248 Kartu Aktif</span>
                                <span class="bg-emerald2 px-2.5 py-1 rounded-full text-white">📈 Top Up +Rp 8,2 jt hari ini</span>
                                <span class="bg-amber2 px-2.5 py-1 rounded-full text-white">⚠ 5 Saldo Menipis</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="openTopup()" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">💳 Top Up Saldo</button>
                            <button onclick="showView('riwayat','Riwayat Transaksi')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🧾 Riwayat Transaksi</button>
                            <button onclick="showView('kartu','Data Kartu Siswa')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔒 Blokir Kartu</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">💳</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Kartu</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Kartu Aktif</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">1.248</p>
                        <p class="text-[11px] text-slate-500 mt-1">12 kartu diblokir</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">📈</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Masuk</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Top Up Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">Rp 8,2 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">142 transaksi</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">🛒</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Keluar</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Belanja Kantin Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">Rp 6,1 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">986 transaksi</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-700">⚠️</span>
                            <span class="text-[11px] font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">Alert</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Saldo Menipis</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">5 <span class="text-sm font-bold text-slate-500">kartu</span></p>
                        <p class="text-[11px] text-red-700 mt-1 font-semibold">&lt; Rp 50.000</p>
                    </div>
                </div>

                <div class="mt-4 grid xl:grid-cols-3 gap-4">
                    <div class="xl:col-span-2 space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Transaksi Terbaru</h2><p class="text-xs text-slate-400">Top up &amp; belanja kantin real-time</p></div>
                                <button onclick="showView('riwayat','Riwayat Transaksi')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[760px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr>
                                            <th class="px-4 py-3">Siswa</th>
                                            <th class="px-4 py-3">Keterangan</th>
                                            <th class="px-4 py-3">Outlet</th>
                                            <th class="px-4 py-3 text-right">Jumlah</th>
                                            <th class="px-4 py-3">Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody id="trxBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="trxEmpty" class="hidden py-16 text-center">
                                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🧾</div>
                                <p class="mt-4 font-heading font-bold text-slate-700">Belum ada transaksi</p>
                                <p class="text-sm text-slate-400">Transaksi akan tampil di sini secara real-time.</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Grafik Top Up vs Belanja Kantin (7 Hari)</h2>
                            <p class="text-xs text-slate-400">Nilai transaksi harian dalam juta rupiah</p>
                            <div id="chartCashless" class="mt-6 flex items-end justify-around gap-3 h-48"></div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-red-500 text-white grid place-items-center text-lg">⚠️</span>
                                <div><h2 class="font-heading font-bold text-slate-800">Saldo Menipis</h2><p class="text-xs text-slate-500">Perlu info ke wali</p></div>
                            </div>
                            <div class="mt-3 bg-white rounded-xl p-3 border border-red-100">
                                <p class="text-xs font-bold text-slate-800">Bunga Ayu · VII-B · •••• 4120</p>
                                <p class="text-[11px] text-red-600 font-semibold mt-0.5">Saldo Rp 18.000 — sisa 2 hari belanja</p>
                                <button onclick="showToast('info','Pengingat top up dikirim ke wali Bunga Ayu...')" class="mt-2 w-full text-[11px] font-bold text-red-800 bg-red-100 hover:bg-red-200 py-1.5 rounded-lg transition-colors">📲 Ingatkan Wali</button>
                            </div>
                            <button onclick="showView('limit','Limit Harian Siswa')" class="mt-3 w-full text-[11px] font-bold text-red-800 bg-white border border-red-300 hover:bg-red-100 py-2 rounded-lg transition-colors">Atur Limit Saldo</button>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Live Transaksi Kasir</h2>
                                <span class="flex items-center gap-1.5 text-[11px] font-bold text-emerald-700"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Live</span>
                            </div>
                            <div id="liveLog" class="p-3 space-y-2">
                                <div class="skeleton h-12 w-full rounded-xl"></div>
                                <div class="skeleton h-12 w-full rounded-xl"></div>
                                <div class="skeleton h-12 w-full rounded-xl"></div>
                            </div>
                            <div class="px-4 pb-4">
                                <button onclick="showView('merchant','Merchant & Outlet')" class="w-full text-[11px] font-bold text-navy bg-blue-50 hover:bg-blue-100 py-2 rounded-lg transition-colors">Kelola Merchant &amp; Outlet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: TOP UP SALDO ================= -->
            <section id="view-topup" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Top Up Saldo</h2>
                        <p class="text-xs text-slate-400">Isi saldo kartu siswa via QRIS, Virtual Account bank, atau gerai minimarket.</p>
                    </div>
                    <button onclick="openTopup()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Top Up Baru</button>
                </div>

                <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">🏦</span><span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Instan</span></div>
                        <p class="mt-3 font-heading font-bold text-slate-800">Virtual Account</p>
                        <p class="text-xs text-slate-400 mt-1">BCA · BRI · Mandiri · BSI</p>
                        <p class="text-[11px] text-slate-500 mt-2">Biaya admin Rp 0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">📱</span><span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Populer</span></div>
                        <p class="mt-3 font-heading font-bold text-slate-800">QRIS</p>
                        <p class="text-xs text-slate-400 mt-1">Scan dari aplikasi wali</p>
                        <p class="text-[11px] text-slate-500 mt-2">Settle langsung</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">🏪</span><span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Tunai</span></div>
                        <p class="mt-3 font-heading font-bold text-slate-800">Minimarket</p>
                        <p class="text-xs text-slate-400 mt-1">Alfamart · Indomaret</p>
                        <p class="text-[11px] text-slate-500 mt-2">Konfirmasi ± 5 menit</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <h3 class="font-heading font-bold text-slate-800 flex-1">Top Up Hari Ini</h3>
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
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada top up</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci pencarian.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: RIWAYAT TRANSAKSI ================= -->
            <section id="view-riwayat" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Riwayat Transaksi</h2>
                        <p class="text-xs text-slate-400">Semua mutasi kartu siswa: top up, belanja kantin, refund, &amp; penarikan.</p>
                    </div>
                    <button onclick="showToast('success','Laporan Excel diunduh')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇ Export Excel</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-4 gap-3">
                        <div class="relative sm:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchRiwayat" oninput="renderRiwayat()" placeholder="Cari nama siswa / no. kartu..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterJenis" onchange="renderRiwayat()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Jenis</option>
                            <option>Top Up</option>
                            <option>Belanja</option>
                            <option>Refund</option>
                            <option>Tarik Tunai</option>
                        </select>
                        <input type="date" value="2026-10-17" onchange="renderRiwayat()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[940px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Waktu</th>
                                    <th class="px-4 py-3">Siswa</th>
                                    <th class="px-4 py-3">No. Kartu</th>
                                    <th class="px-4 py-3">Keterangan</th>
                                    <th class="px-4 py-3">Outlet</th>
                                    <th class="px-4 py-3">Jenis</th>
                                    <th class="px-4 py-3 text-right">Jumlah</th>
                                    <th class="px-4 py-3 text-right">Saldo Akhir</th>
                                </tr>
                            </thead>
                            <tbody id="riwayatBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="riwayatEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🧾</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Transaksi tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter jenis.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: TARIK & REFUND ================= -->
            <section id="view-refund" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Tarik &amp; Refund</h2>
                        <p class="text-xs text-slate-400">Pengajuan penarikan saldo oleh wali &amp; refund transaksi gagal/batal.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form pengajuan penarikan saldo...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Pengajuan Baru</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Menunggu Approval</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">4</p>
                        <p class="text-[11px] text-slate-500 mt-1">Pengajuan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Refund Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 285.000</p>
                        <p class="text-[11px] text-slate-500 mt-1">7 transaksi</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Tarik Tunai Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 4,3 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">Siswa keluar/transfer</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Disetujui Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">9</p>
                        <p class="text-[11px] text-slate-500 mt-1">Total Rp 620.000</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Daftar Pengajuan Tarik &amp; Refund</h3></div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[980px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">No. Pengajuan</th>
                                    <th class="px-4 py-3">Siswa</th>
                                    <th class="px-4 py-3">No. Kartu</th>
                                    <th class="px-4 py-3">Tipe</th>
                                    <th class="px-4 py-3">Alasan</th>
                                    <th class="px-4 py-3 text-right">Nominal</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="refundBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="refundEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">💸</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada pengajuan</p>
                        <p class="text-sm text-slate-400">Semua pengajuan tarik &amp; refund telah diproses.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: DATA KARTU SISWA ================= -->
            <section id="view-kartu" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Data Kartu Siswa</h2>
                        <p class="text-xs text-slate-400">Registrasi kartu RFID, status aktif/blokir, &amp; riwayat kartu hilang.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form registrasi kartu RFID baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Registrasi Kartu</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Kartu Aktif</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">1.248</p>
                        <p class="text-[11px] text-slate-500 mt-1">Siap transaksi</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Diblokir</p>
                        <p class="font-heading font-extrabold text-2xl text-red-700 mt-1">12</p>
                        <p class="text-[11px] text-slate-500 mt-1">Kartu hilang/rusak</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Belum Registrasi</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">8</p>
                        <p class="text-[11px] text-slate-500 mt-1">Siswa baru</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Cetak Ulang (Blan)</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">5</p>
                        <p class="text-[11px] text-slate-500 mt-1">Bulan ini</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 grid sm:grid-cols-3 gap-3">
                        <div class="relative sm:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchKartu" oninput="renderKartu()" placeholder="Cari nama siswa / no. kartu..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterKartu" onchange="renderKartu()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Status</option>
                            <option>Aktif</option>
                            <option>Diblokir</option>
                            <option>Belum Registrasi</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[960px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">No. Kartu</th>
                                    <th class="px-4 py-3">Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Wali</th>
                                    <th class="px-4 py-3 text-right">Saldo</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="kartuBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="kartuEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">💳</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Kartu tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: LIMIT HARIAN ================= -->
            <section id="view-limit" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Limit Harian Siswa</h2>
                        <p class="text-xs text-slate-400">Pengaturan batas belanja harian &amp; kontrol pengeluaran siswa per kelas.</p>
                    </div>
                    <button onclick="showToast('success','Limit default seluruh jenjang diperbarui')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⚙️ Atur Default Per Jenjang</button>
                </div>

                <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Limit Default SMP</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 30.000</p><p class="text-[11px] text-slate-500 mt-1">Per hari</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Limit Default SMA</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 50.000</p><p class="text-[11px] text-slate-500 mt-1">Per hari</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Siswa Mencapai Limit</p><p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">37</p><p class="text-[11px] text-slate-500 mt-1">Hari ini</p></div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <h3 class="font-heading font-bold text-slate-800 flex-1">Pengaturan Limit Per Siswa</h3>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchLimit" oninput="renderLimit()" placeholder="Cari nama siswa..."
                                class="bg-slate-100 rounded-xl pl-9 pr-3 py-2 text-sm outline-none placeholder:text-slate-400 w-full sm:w-56">
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[860px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3 text-right">Limit Harian</th>
                                    <th class="px-4 py-3 text-right">Terpakai Hari Ini</th>
                                    <th class="px-4 py-3">Pemakaian</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="limitBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: MERCHANT & OUTLET ================= -->
            <section id="view-merchant" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Merchant &amp; Outlet</h2>
                        <p class="text-xs text-slate-400">Daftar outlet penerima pembayaran E-Money, komisi, &amp; status settlement.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form pendaftaran merchant baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Tambah Merchant</button>
                </div>

                <div class="mt-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4" id="merchantCards"></div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Ringkasan Transaksi Per Outlet (Hari Ini)</h3></div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[820px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Outlet</th>
                                    <th class="px-4 py-3">Kategori</th>
                                    <th class="px-4 py-3 text-center">Transaksi</th>
                                    <th class="px-4 py-3 text-right">Omzet</th>
                                    <th class="px-4 py-3 text-right">Komisi Sekolah</th>
                                    <th class="px-4 py-3">Settlement</th>
                                </tr>
                            </thead>
                            <tbody id="merchantBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: LAPORAN CASHLESS ================= -->
            <section id="view-laporan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan Cashless</h2>
                        <p class="text-xs text-slate-400">Rekapitulasi arus saldo E-Money, top up, belanja, &amp; settlement merchant.</p>
                    </div>
                    <div class="flex gap-2">
                        <select class="bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Bulan Ini</option><option>Bulan Lalu</option><option>Semester</option></select>
                        <button onclick="showToast('success','Laporan cashless diunduh (PDF)')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇ Unduh PDF</button>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Top Up</p><p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">Rp 214,6 jt</p><p class="text-[11px] text-slate-500 mt-1">3.842 transaksi</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Belanja</p><p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">Rp 176,3 jt</p><p class="text-[11px] text-slate-500 mt-1">28.517 transaksi</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Saldo Mengendap</p><p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 128,4 jt</p><p class="text-[11px] text-slate-500 mt-1">1.248 kartu</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Komisi Merchant</p><p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">Rp 1,76 jt</p><p class="text-[11px] text-slate-500 mt-1">1% dari omzet</p></div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Tren Top Up &amp; Belanja (12 Minggu)</h3>
                        <p class="text-xs text-slate-400">Dalam juta rupiah</p>
                        <div id="chartLaporan" class="mt-6 flex items-end justify-around gap-2 h-48"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Rekap Per Kategori Outlet</h3></div>
                        <div id="kategoriLaporan" class="p-4 space-y-3"></div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">💳</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal E-Money Siswa. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Top Up Saldo</span>, <span class="font-semibold text-slate-600">Riwayat Transaksi</span>, <span class="font-semibold text-slate-600">Tarik &amp; Refund</span>, <span class="font-semibold text-slate-600">Data Kartu Siswa</span>, <span class="font-semibold text-slate-600">Limit Harian</span>, <span class="font-semibold text-slate-600">Merchant &amp; Outlet</span>, dan <span class="font-semibold text-slate-600">Laporan Cashless</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard E-Money')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('topup','Top Up Saldo')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Top Up</button>
                        <button onclick="showView('riwayat','Riwayat Transaksi')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Riwayat</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="border-t border-slate-200 bg-white px-4 sm:px-6 py-5 text-center">
            <p class="text-xs text-slate-400">© 2026 PT Artificial Intelligence Learning Madani Digital · E-Money Siswa (Simulasi)</p>
        </footer>
    </div>

    <!-- ============ MODAL: TOP UP SALDO ============ -->
    <div id="topupModal" class="fixed inset-0 z-[65] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" onclick="closeTopup()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto no-scrollbar">
            <div class="sticky top-0 bg-white px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Top Up Saldo E-Money</h3><p class="text-xs text-slate-400">Isi saldo kartu siswa secara instan.</p></div>
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
                    <label class="text-xs font-bold text-slate-600">Nominal</label>
                    <div class="mt-2 grid grid-cols-3 gap-2">
                        <button onclick="setNominal(50000)" class="nom-btn text-sm font-bold rounded-xl border border-slate-200 hover:border-navy py-2.5 transition-colors">Rp 50.000</button>
                        <button onclick="setNominal(100000)" class="nom-btn text-sm font-bold rounded-xl border border-slate-200 hover:border-navy py-2.5 transition-colors">Rp 100.000</button>
                        <button onclick="setNominal(200000)" class="nom-btn text-sm font-bold rounded-xl border border-slate-200 hover:border-navy py-2.5 transition-colors">Rp 200.000</button>
                    </div>
                    <input id="topupNominal" type="number" value="50000" class="mt-2 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-600">Metode Pembayaran</label>
                    <div class="mt-2 grid grid-cols-3 gap-2">
                        <label class="cursor-pointer"><input type="radio" name="metode" class="peer sr-only" checked><span class="block text-center text-sm font-bold rounded-xl border border-slate-200 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 py-2.5 transition-colors">QRIS</span></label>
                        <label class="cursor-pointer"><input type="radio" name="metode" class="peer sr-only"><span class="block text-center text-sm font-bold rounded-xl border border-slate-200 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 py-2.5 transition-colors">VA Bank</span></label>
                        <label class="cursor-pointer"><input type="radio" name="metode" class="peer sr-only"><span class="block text-center text-sm font-bold rounded-xl border border-slate-200 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 py-2.5 transition-colors">Minimarket</span></label>
                    </div>
                </div>
                <label class="flex items-center gap-2.5 cursor-pointer bg-emerald-50 border border-emerald-200 rounded-xl px-3 py-3">
                    <input type="checkbox" checked class="accent w-4 h-4">
                    <span class="text-sm text-slate-700">Kirim bukti top up ke WhatsApp wali santri</span>
                </label>
            </div>
            <div class="sticky bottom-0 bg-white px-6 py-4 border-t border-slate-100 flex justify-end gap-2">
                <button onclick="closeTopup()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="submitTopup()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Proses Top Up</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: QR KARTU ============ -->
    <div id="qrModal" class="fixed inset-0 z-[65] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" onclick="closeQR()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-sm overflow-hidden">
            <div class="card-gradient text-white px-6 py-5 text-center relative overflow-hidden">
                <div class="absolute inset-0 grid-pattern"></div>
                <div class="relative z-10">
                    <p class="text-[11px] font-semibold text-white/80 uppercase tracking-wider">QR Pembayaran Kartu</p>
                    <h3 id="qrSiswa" class="font-heading font-extrabold text-lg mt-1">Nama Siswa</h3>
                    <p id="qrKelas" class="text-xs text-white/85">Kelas -</p>
                </div>
            </div>
            <div class="p-6 text-center">
                <div class="mx-auto w-48 h-48 rounded-2xl border-4 border-slate-900 p-3 bg-white">
                    <div class="w-full h-full qr-grid rounded-lg opacity-90"></div>
                </div>
                <p id="qrKartu" class="mt-4 font-mono text-xs text-slate-500">•••• 0000</p>
                <div class="mt-4 grid grid-cols-2 gap-2 text-left">
                    <div class="bg-slate-50 rounded-xl px-3 py-2"><p class="text-[10px] font-semibold text-slate-400 uppercase">Saldo</p><p id="qrSaldo" class="text-xs font-bold text-slate-800">Rp 0</p></div>
                    <div class="bg-slate-50 rounded-xl px-3 py-2"><p class="text-[10px] font-semibold text-slate-400 uppercase">Status</p><p id="qrStatus" class="text-xs font-bold text-emerald-700">Aktif</p></div>
                </div>
                <p class="mt-3 text-[11px] text-slate-400">Scan QR ini di kasir merchant untuk pembayaran langsung.</p>
                <div class="mt-5 flex gap-2">
                    <button onclick="closeQR()" class="flex-1 text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
                    <button onclick="showToast('success','QR kartu dikirim ke wali siswa')" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📲 Kirim ke Wali</button>
                </div>
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

        function fmtRp(n) { return 'Rp ' + (n || 0).toLocaleString('id-ID'); }
        function initials(n) { return n.split(' ').slice(0, 2).map(w => w[0]).join('').toUpperCase(); }
        function avatar(name) {
            return '<span class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white text-[11px] font-bold flex-shrink-0">' + initials(name) + '</span>';
        }

        const jenisBadge = { 'Top Up': 'bg-emerald-100 text-emerald-800', 'Belanja': 'bg-amber-100 text-amber-800', 'Refund': 'bg-blue-100 text-blue-800', 'Tarik Tunai': 'bg-violet-100 text-violet-800' };
        const statusBadge = { 'Aktif': 'bg-emerald-100 text-emerald-800', 'Diblokir': 'bg-red-100 text-red-800', 'Belum Registrasi': 'bg-slate-100 text-slate-600', 'Menunggu': 'bg-amber-100 text-amber-800', 'Disetujui': 'bg-emerald-100 text-emerald-800', 'Ditolak': 'bg-red-100 text-red-800', 'Berhasil': 'bg-emerald-100 text-emerald-800', 'Pending': 'bg-amber-100 text-amber-800' };

        const views = document.querySelectorAll('.view');
        function showView(name, title) {
            views.forEach(v => v.classList.remove('active'));
            const el = document.getElementById('view-' + name);
            if (el) el.classList.add('active');
            if (title) document.getElementById('pageTitle').textContent = title.replace(/&amp;/g, '&');
            document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
            const active = document.querySelector('.menu-item[data-view="' + name + '"]');
            if (active) active.classList.add('active');

            if (name === 'topup') renderTopup();
            if (name === 'riwayat') renderRiwayat();
            if (name === 'refund') renderRefund();
            if (name === 'kartu') renderKartu();
            if (name === 'limit') renderLimit();
            if (name === 'merchant') renderMerchant();
            if (name === 'laporan') { renderChartLaporan(); renderKategori(); }

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
        function cariKartuQuick(val) {
            const s = document.getElementById('searchKartu');
            if (s) s.value = val || '';
            showView('kartu', 'Data Kartu Siswa');
            renderKartu();
        }

        // ---------- MASTER DATA ----------
        const kartu = [
            { no: '•••• 4821', nama: 'Ahmad Fauzan', kelas: 'IX-A', wali: 'Bpk. Suryanto', saldo: 452000, status: 'Aktif' },
            { no: '•••• 2388', nama: 'Siti Nurhaliza', kelas: 'VII-B', wali: 'Bpk. Nur Salim', saldo: 318000, status: 'Aktif' },
            { no: '•••• 0101', nama: 'Keira Faza', kelas: 'VIII-A', wali: 'Bpk. Fauzi', saldo: 45000, status: 'Aktif' },
            { no: '•••• 4120', nama: 'Bunga Ayu', kelas: 'VII-B', wali: 'Ibu Lestari', saldo: 18000, status: 'Aktif' },
            { no: '•••• 7788', nama: 'Rizki Maulana', kelas: 'IX-C', wali: 'Bpk. Hadi', saldo: 0, status: 'Diblokir' },
            { no: '-', nama: 'Dewi Lestari', kelas: 'VIII-B', wali: 'Ibu Sriyati', saldo: 0, status: 'Belum Registrasi' },
            { no: '•••• 3355', nama: 'Fajar Nugroho', kelas: 'IX-A', wali: 'Bpk. Gunawan', saldo: 96200, status: 'Aktif' },
            { no: '•••• 9012', nama: 'Hafiz Rizki', kelas: 'VII-A', wali: 'Bpk. Zainal', saldo: 38000, status: 'Aktif' }
        ];
        const riwayat = [
            { waktu: '10:42', siswa: 'Ahmad Fauzan', kartu: '•••• 4821', ket: 'Top up — QRIS', outlet: 'Sistem', jenis: 'Top Up', jumlah: 100000, saldo: 452000 },
            { waktu: '10:15', siswa: 'Bunga Ayu', kartu: '•••• 4120', ket: 'Belanja — Nasi Ayam', outlet: 'Kantin Utama', jenis: 'Belanja', jumlah: -14000, saldo: 18000 },
            { waktu: '09:58', siswa: 'Siti Nurhaliza', kartu: '•••• 2388', ket: 'Belanja — Alat Tulis', outlet: 'Fotokopi & ATK', jenis: 'Belanja', jumlah: -10500, saldo: 318000 },
            { waktu: '09:40', siswa: 'Fajar Nugroho', kartu: '•••• 3355', ket: 'Belanja — Susu & Roti', outlet: 'Koperasi Siswa', jenis: 'Belanja', jumlah: -13500, saldo: 96200 },
            { waktu: '09:20', siswa: 'Keira Faza', kartu: '•••• 0101', ket: 'Refund — transaksi ganda', outlet: 'Kantin Utama', jenis: 'Refund', jumlah: 12000, saldo: 45000 },
            { waktu: '08:55', siswa: 'Hafiz Rizki', kartu: '•••• 9012', ket: 'Tarik Tunai — keluar asrama', outlet: 'Kasir Sekolah', jenis: 'Tarik Tunai', jumlah: -50000, saldo: 38000 },
            { waktu: '08:30', siswa: 'Ahmad Fauzan', kartu: '•••• 4821', ket: 'Belanja — Makan Siang', outlet: 'Kantin Utama', jenis: 'Belanja', jumlah: -15000, saldo: 352000 },
            { waktu: '08:05', siswa: 'Siti Nurhaliza', kartu: '•••• 2388', ket: 'Top up — VA BSI', outlet: 'Sistem', jenis: 'Top Up', jumlah: 200000, saldo: 328500 }
        ];
        const topup = [
            { ref: 'TU-2026-1042', siswa: 'Ahmad Fauzan', kartu: '•••• 4821', metode: 'QRIS', nominal: 100000, waktu: '10:42', status: 'Berhasil' },
            { ref: 'TU-2026-1041', siswa: 'Siti Nurhaliza', kartu: '•••• 2388', metode: 'VA BSI', nominal: 200000, waktu: '08:05', status: 'Berhasil' },
            { ref: 'TU-2026-1040', siswa: 'Keira Faza', kartu: '•••• 0101', metode: 'Minimarket', nominal: 50000, waktu: '07:50', status: 'Pending' },
            { ref: 'TU-2026-1039', siswa: 'Fajar Nugroho', kartu: '•••• 3355', metode: 'QRIS', nominal: 50000, waktu: '07:32', status: 'Berhasil' },
            { ref: 'TU-2026-1038', siswa: 'Hafiz Rizki', kartu: '•••• 9012', metode: 'VA Mandiri', nominal: 100000, waktu: '07:10', status: 'Berhasil' },
            { ref: 'TU-2026-1037', siswa: 'Bunga Ayu', kartu: '•••• 4120', metode: 'Minimarket', nominal: 50000, waktu: '06:45', status: 'Berhasil' }
        ];
        let refund = [
            { no: 'RF-2026-0064', siswa: 'Keira Faza', kartu: '•••• 0101', tipe: 'Refund', alasan: 'Transaksi ganda di kantin', nominal: 12000, status: 'Disetujui' },
            { no: 'RF-2026-0065', siswa: 'Hafiz Rizki', kartu: '•••• 9012', tipe: 'Tarik Tunai', alasan: 'Siswa pindah sekolah', nominal: 38000, status: 'Menunggu' },
            { no: 'RF-2026-0066', siswa: 'Rizki Maulana', kartu: '•••• 7788', tipe: 'Tarik Tunai', alasan: 'Lulus — sisa saldo', nominal: 0, status: 'Menunggu' },
            { no: 'RF-2026-0063', siswa: 'Fajar Nugroho', kartu: '•••• 3355', tipe: 'Refund', alasan: 'Barang tidak sesuai', nominal: 15000, status: 'Disetujui' },
            { no: 'RF-2026-0062', siswa: 'Siti Nurhaliza', kartu: '•••• 2388', tipe: 'Refund', alasan: 'Outlet tutup setelah bayar', nominal: 8000, status: 'Ditolak' }
        ];
        const limit = [
            { nama: 'Ahmad Fauzan', kelas: 'IX-A', limit: 50000, pakai: 15000 },
            { nama: 'Siti Nurhaliza', kelas: 'VII-B', limit: 30000, pakai: 10500 },
            { nama: 'Keira Faza', kelas: 'VIII-A', limit: 30000, pakai: 28000 },
            { nama: 'Bunga Ayu', kelas: 'VII-B', limit: 25000, pakai: 14000 },
            { nama: 'Fajar Nugroho', kelas: 'IX-A', limit: 50000, pakai: 13500 },
            { nama: 'Hafiz Rizki', kelas: 'VII-A', limit: 30000, pakai: 0 }
        ];
        const merchant = [
            { nama: 'Kantin Utama', kat: 'Makanan & Minuman', icon: '🍽️', trx: 412, omzet: 2450000, komisi: 24500, set: 'Harian' },
            { nama: 'Koperasi Siswa', kat: 'Sembako & Snack', icon: '🏪', trx: 286, omzet: 1380000, komisi: 13800, set: 'Harian' },
            { nama: 'Fotokopi & ATK', kat: 'Alat Tulis', icon: '✏️', trx: 154, omzet: 620000, komisi: 6200, set: 'Mingguan' },
            { nama: 'Kedai Sehat', kat: 'Jus & Buah', icon: '🥤', trx: 98, omzet: 410000, komisi: 4100, set: 'Harian' },
            { nama: 'Laundry Kilat', kat: 'Jasa', icon: '🧺', trx: 36, omzet: 288000, komisi: 2880, set: 'Mingguan' }
        ];
        const kategori = [ { k: 'Kantin & Minuman', v: 68 }, { k: 'Sembako & Snack', v: 22 }, { k: 'Alat Tulis', v: 7 }, { k: 'Jasa Lainnya', v: 3 } ];

        // ---------- RENDER: TOPUP ----------
        function renderTopup() {
            const q = (document.getElementById('searchTopup').value || '').toLowerCase();
            const rows = topup.filter(t => !q || t.siswa.toLowerCase().includes(q));
            document.getElementById('topupEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('topupBody').innerHTML = rows.map(t =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + t.ref + '</td>'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(t.siswa) + '<span class="font-semibold text-slate-800">' + t.siswa + '</span></div></td>'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + t.kartu + '</td>'
                + '<td class="px-4 py-3 text-slate-600">' + t.metode + '</td>'
                + '<td class="px-4 py-3 text-right font-bold text-emerald-700">+' + fmtRp(t.nominal) + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + t.waktu + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[t.status] + ' px-2.5 py-1 rounded-full">' + t.status + '</span></td>'
                + '</tr>').join('');
        }

        // ---------- RENDER: RIWAYAT ----------
        function renderRiwayat() {
            const q = (document.getElementById('searchRiwayat').value || '').toLowerCase();
            const j = document.getElementById('filterJenis').value;
            const rows = riwayat.filter(r => (!q || r.siswa.toLowerCase().includes(q) || r.kartu.includes(q)) && (!j || r.jenis === j));
            document.getElementById('riwayatEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('riwayatBody').innerHTML = rows.map(r =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3 text-slate-500">' + r.waktu + '</td>'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(r.siswa) + '<span class="font-semibold text-slate-800">' + r.siswa + '</span></div></td>'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + r.kartu + '</td>'
                + '<td class="px-4 py-3 text-slate-600">' + r.ket + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + r.outlet + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + jenisBadge[r.jenis] + ' px-2.5 py-1 rounded-full">' + r.jenis + '</span></td>'
                + '<td class="px-4 py-3 text-right font-bold ' + (r.jumlah >= 0 ? 'text-emerald-700' : 'text-slate-700') + '">' + (r.jumlah >= 0 ? '+' : '−') + fmtRp(Math.abs(r.jumlah)) + '</td>'
                + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(r.saldo) + '</td>'
                + '</tr>').join('');
        }

        // ---------- RENDER: REFUND ----------
        function renderRefund() {
            document.getElementById('refundEmpty').classList.toggle('hidden', refund.length > 0);
            document.getElementById('refundBody').innerHTML = refund.map(r => {
                const act = r.status === 'Menunggu'
                    ? '<button onclick="prosesRefund(\'' + r.no + '\')" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1.5 rounded-lg">Proses</button>'
                    : '<span class="text-xs font-bold text-slate-400">—</span>';
                return '<tr class="hover:bg-slate-50">'
                    + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + r.no + '</td>'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(r.siswa) + '<span class="font-semibold text-slate-800">' + r.siswa + '</span></div></td>'
                    + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + r.kartu + '</td>'
                    + '<td class="px-4 py-3 text-slate-600">' + r.tipe + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r.alasan + '</td>'
                    + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(r.nominal) + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[r.status] + ' px-2.5 py-1 rounded-full">' + r.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap">' + act + '</td>'
                    + '</tr>';
            }).join('');
        }
        function prosesRefund(no) {
            openConfirm('Proses Tarik / Refund', 'Pengajuan ' + no + ' akan diproses & saldo disesuaikan.', () => {
                const it = refund.find(r => r.no === no);
                if (it) it.status = 'Disetujui';
                renderRefund();
                showToast('success', 'Pengajuan ' + no + ' berhasil diproses');
            });
        }

        // ---------- RENDER: KARTU ----------
        function renderKartu() {
            const q = (document.getElementById('searchKartu').value || '').toLowerCase();
            const st = document.getElementById('filterKartu').value;
            const rows = kartu.filter(k => (!q || k.nama.toLowerCase().includes(q) || k.no.includes(q)) && (!st || k.status === st));
            document.getElementById('kartuEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('kartuBody').innerHTML = rows.map(k => {
                const low = k.saldo < 50000;
                const act = k.status === 'Aktif'
                    ? '<button onclick="blokirKartu(\'' + k.nama + '\')" class="text-xs font-bold text-red-600 hover:underline">Blokir</button>'
                    : '<button onclick="showToast(\'success\',\'Kartu ' + k.nama + ' diaktifkan kembali\')" class="text-xs font-bold text-navy hover:underline">Aktifkan</button>';
                return '<tr class="hover:bg-slate-50">'
                    + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + k.no + '</td>'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(k.nama) + '<span class="font-semibold text-slate-800">' + k.nama + '</span></div></td>'
                    + '<td class="px-4 py-3 text-slate-600">' + k.kelas + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + k.wali + '</td>'
                    + '<td class="px-4 py-3 text-right font-semibold ' + (low ? 'text-red-700' : 'text-slate-900') + '">' + fmtRp(k.saldo) + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[k.status] + ' px-2.5 py-1 rounded-full">' + k.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap space-x-2"><button onclick="openQR(\'' + k.nama + '\',\'' + k.kelas + '\',\'' + k.no + '\',' + k.saldo + ')" class="text-xs font-bold text-navy hover:underline">QR</button>' + act + '</td>'
                    + '</tr>';
            }).join('');
        }
        function blokirKartu(nama) {
            openConfirm('Blokir Kartu', 'Kartu atas nama ' + nama + ' akan diblokir sementara.', () => {
                showToast('warn', 'Kartu ' + nama + ' diblokir');
            });
        }

        // ---------- RENDER: LIMIT ----------
        function renderLimit() {
            const q = (document.getElementById('searchLimit').value || '').toLowerCase();
            const rows = limit.filter(l => !q || l.nama.toLowerCase().includes(q));
            document.getElementById('limitBody').innerHTML = rows.map(l => {
                const pct = Math.min(100, Math.round((l.pakai / l.limit) * 100));
                const bar = pct >= 90 ? 'bg-red-500' : pct >= 60 ? 'bg-amber-500' : 'bg-emerald-500';
                return '<tr class="hover:bg-slate-50">'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(l.nama) + '<span class="font-semibold text-slate-800">' + l.nama + '</span></div></td>'
                    + '<td class="px-4 py-3 text-slate-600">' + l.kelas + '</td>'
                    + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(l.limit) + '</td>'
                    + '<td class="px-4 py-3 text-right font-semibold text-slate-700">' + fmtRp(l.pakai) + '</td>'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-2"><div class="flex-1 h-2 rounded-full bg-slate-100 overflow-hidden"><div class="h-full ' + bar + '" style="width:' + pct + '%"></div></div><span class="text-[11px] font-bold text-slate-500 w-9 text-right">' + pct + '%</span></div></td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="showToast(\'info\',\'Mengubah limit harian ' + l.nama + '\')" class="text-xs font-bold text-navy hover:underline">Ubah Limit</button></td>'
                    + '</tr>';
            }).join('');
        }

        // ---------- RENDER: MERCHANT ----------
        function renderMerchant() {
            document.getElementById('merchantCards').innerHTML = merchant.map(m =>
                '<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">'
                + '<div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-blue-50 grid place-items-center text-xl">' + m.icon + '</span><span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Settlement ' + m.set + '</span></div>'
                + '<p class="mt-3 font-heading font-bold text-slate-800">' + m.nama + '</p>'
                + '<p class="text-xs text-slate-400">' + m.kat + '</p>'
                + '<div class="mt-3 flex items-center justify-between text-xs"><span class="text-slate-500">' + m.trx + ' transaksi</span><span class="font-bold text-slate-900">' + fmtRp(m.omzet) + '</span></div>'
                + '</div>').join('');
            document.getElementById('merchantBody').innerHTML = merchant.map(m =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3"><div class="flex items-center gap-2"><span>' + m.icon + '</span><span class="font-semibold text-slate-800">' + m.nama + '</span></div></td>'
                + '<td class="px-4 py-3 text-slate-500">' + m.kat + '</td>'
                + '<td class="px-4 py-3 text-center font-semibold text-slate-700">' + m.trx + '</td>'
                + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(m.omzet) + '</td>'
                + '<td class="px-4 py-3 text-right font-semibold text-blue-700">' + fmtRp(m.komisi) + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold bg-slate-100 text-slate-600 px-2.5 py-1 rounded-full">' + m.set + '</span></td>'
                + '</tr>').join('');
        }

        // ---------- RENDER: LAPORAN ----------
        function renderKategori() {
            document.getElementById('kategoriLaporan').innerHTML = kategori.map(k =>
                '<div><div class="flex items-center justify-between text-sm"><span class="font-semibold text-slate-700">' + k.k + '</span><span class="font-bold text-slate-900">' + k.v + '%</span></div>'
                + '<div class="mt-1.5 h-2 rounded-full bg-slate-100 overflow-hidden"><div class="h-full hero-gradient" style="width:' + k.v + '%"></div></div></div>').join('');
        }
        function renderChartLaporan() {
            const wrap = document.getElementById('chartLaporan');
            if (!wrap) return;
            const data = [12, 15, 11, 18, 14, 20, 17, 22, 19, 24, 21, 26];
            wrap.innerHTML = data.map((v, i) =>
                '<div class="flex flex-col items-center gap-2 flex-1">'
                + '<div class="w-full max-w-[34px] rounded-t-lg hero-gradient" style="height:' + (v * 6) + 'px"></div>'
                + '<span class="text-[9px] font-semibold text-slate-400">W' + (i + 1) + '</span>'
                + '</div>').join('');
        }

        // ---------- DASHBOARD ----------
        function renderTrxDashboard() {
            const rows = riwayat.slice(0, 5);
            document.getElementById('trxEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('trxBody').innerHTML = rows.map(r =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(r.siswa) + '<span class="font-semibold text-slate-800">' + r.siswa + '</span></div></td>'
                + '<td class="px-4 py-3 text-slate-600">' + r.ket + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + r.outlet + '</td>'
                + '<td class="px-4 py-3 text-right font-bold ' + (r.jumlah >= 0 ? 'text-emerald-700' : 'text-slate-700') + '">' + (r.jumlah >= 0 ? '+' : '−') + fmtRp(Math.abs(r.jumlah)) + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + r.waktu + '</td>'
                + '</tr>').join('');
        }
        function renderChartCashless() {
            const wrap = document.getElementById('chartCashless');
            if (!wrap) return;
            const days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Ahd'];
            const top = [6, 8, 7, 9, 8, 5, 4];
            const bel = [5, 6, 6, 7, 6, 4, 3];
            wrap.innerHTML = days.map((d, i) =>
                '<div class="flex flex-col items-center gap-2 flex-1">'
                + '<div class="flex items-end gap-1 h-40">'
                + '<div class="w-4 rounded-t-md bg-emerald-500" style="height:' + (top[i] * 15) + 'px" title="Top Up"></div>'
                + '<div class="w-4 rounded-t-md bg-amber-500" style="height:' + (bel[i] * 15) + 'px" title="Belanja"></div>'
                + '</div>'
                + '<span class="text-[10px] font-semibold text-slate-400">' + d + '</span>'
                + '</div>').join('');
        }
        function loadLiveLog() {
            const wrap = document.getElementById('liveLog');
            if (!wrap) return;
            wrap.innerHTML = riwayat.slice(0, 3).map(r =>
                '<div class="flex items-center gap-3 bg-slate-50 rounded-xl px-3 py-2.5">'
                + '<span class="w-8 h-8 rounded-lg ' + (r.jumlah >= 0 ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700') + ' grid place-items-center text-sm">' + (r.jumlah >= 0 ? '↓' : '↑') + '</span>'
                + '<div class="min-w-0"><p class="text-sm font-semibold text-slate-800 truncate">' + r.siswa + '</p><p class="text-[11px] text-slate-400">' + r.outlet + ' · ' + r.waktu + '</p></div>'
                + '<span class="ml-auto text-sm font-bold ' + (r.jumlah >= 0 ? 'text-emerald-700' : 'text-amber-700') + '">' + (r.jumlah >= 0 ? '+' : '−') + fmtRp(Math.abs(r.jumlah)) + '</span>'
                + '</div>').join('');
        }

        // ---------- MODALS ----------
        function setNominal(v) {
            document.getElementById('topupNominal').value = v;
            document.querySelectorAll('.nom-btn').forEach(b => b.classList.remove('border-navy', 'bg-blue-50'));
        }
        function openTopup() { const m = document.getElementById('topupModal'); m.classList.remove('hidden'); m.classList.add('flex'); }
        function closeTopup() { const m = document.getElementById('topupModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function submitTopup() {
            closeTopup();
            showToast('success', 'Top up ' + fmtRp(parseInt(document.getElementById('topupNominal').value || 0)) + ' berhasil · notifikasi WA terkirim');
        }
        function openQR(nama, kelas, no, saldo) {
            document.getElementById('qrSiswa').textContent = nama;
            document.getElementById('qrKelas').textContent = 'Kelas ' + kelas;
            document.getElementById('qrKartu').textContent = no;
            document.getElementById('qrSaldo').textContent = fmtRp(saldo);
            const m = document.getElementById('qrModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeQR() { const m = document.getElementById('qrModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
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
            renderTrxDashboard();
            renderChartCashless();
            loadLiveLog();
        });
    </script>
</body>

</html>
