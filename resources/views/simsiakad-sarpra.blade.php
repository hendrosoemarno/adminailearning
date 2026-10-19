<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal E-Sarpra (Sarpras &amp; Aset) · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal E-Sarpra SIAKAD PLUS — pusat pengelolaan sarana & prasarana sekolah: inventaris aset, label QR, mutasi ruangan, stok ATK, booking ruangan, kalender pemakaian, tiket perbaikan, pengadaan, dan laporan kondisi aset.">
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
        .kanban-col { max-height: 620px; overflow-y: auto; }
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
                <p class="text-[10px] text-slate-500">Sarpras &amp; Aset</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Scrollable nav -->
        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <!-- Dashboard -->
            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard E-Sarpra</span>
            </button>

            <!-- 1. Inventaris & Manajemen Aset -->
            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📦</span><span class="flex-1 text-left">Inventaris &amp; Aset</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="aset" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Database Barang &amp; Aset</button>
                    <button data-view="qr" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Label QR Per Aset</button>
                    <button data-view="mutasi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Mutasi Antar Ruangan</button>
                    <button data-view="penghapusan-aset" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Penghapusan Aset</button>
                    <button data-view="atk" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Stok ATK &amp; Habis Pakai</button>
                </div>
            </div>

            <!-- 2. Ruangan & Fasilitas -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🏛️</span><span class="flex-1 text-left">Ruangan &amp; Fasilitas</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="booking" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Booking Ruangan Online</button>
                    <button data-view="kalender" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kalender Pemakaian</button>
                    <button data-view="approval" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Persetujuan Peminjaman</button>
                </div>
            </div>

            <!-- 3. Pemeliharaan & Pengadaan -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🛠️</span><span class="flex-1 text-left">Pemeliharaan &amp; Pengadaan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="tiket" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Laporan Kerusakan (Tiket)</button>
                    <button data-view="penjadwalan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Penjadwalan Perbaikan</button>
                    <button data-view="pengadaan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengadaan &amp; Approval</button>
                    <button data-view="laporan-aset" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Laporan Kondisi Aset</button>
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Sarpras &amp; Aset</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard E-Sarpra</h1>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <!-- Ringkasan aset -->
                    <div class="hidden xl:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Total Nilai Aset</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">Rp 4.285.600.000</p>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 rounded-full">Baik 78%</span>
                    </div>
                    <div class="hidden md:flex items-center gap-3 bg-red-50 rounded-xl px-3 py-2 border border-red-100">
                        <div class="leading-tight">
                            <p class="text-[10px] text-red-500 font-semibold uppercase tracking-wider">Tiket Aktif</p>
                            <p class="text-sm font-heading font-extrabold text-red-700">12 tiket</p>
                        </div>
                    </div>
                    <!-- Notif -->
                    <button onclick="showToast('info', '12 tiket perbaikan & 9 item ATK menipis')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Profile -->
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">SP</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Staf Sarpras</p>
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
                            <p class="text-sm text-white/85">Total Nilai Aset Sekolah</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">Rp 4.285.600.000</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">● Status Aset Baik 78%</span>
                                <span class="bg-amber2 px-2.5 py-1 rounded-full text-white">🛠️ 12 Tiket Kerusakan Aktif</span>
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">📦 1.284 Item Terdata</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('aset','Database Barang &amp; Aset')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">➕ Tambah Aset Baru</button>
                            <button onclick="showView('qr','Label QR Per Aset')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🏷️ Cetak Label QR</button>
                            <button onclick="showView('atk','Stok ATK &amp; Habis Pakai')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📥 Catat ATK Masuk</button>
                        </div>
                    </div>
                </div>

                <!-- Stat Cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">📦</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Inventaris</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Item Aset</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">1.284</p>
                        <p class="text-[11px] text-slate-500 mt-1">Tersebar di 32 ruangan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">🛠️</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Perlu Tindak</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Aset Perlu Perbaikan</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">37 <span class="text-sm font-bold text-slate-500">unit</span></p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-amber-500 rounded-full" style="width:37%"></div></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-sky-100 grid place-items-center text-sky-700">🏛️</span>
                            <span class="text-[11px] font-bold text-sky-700 bg-sky-50 px-2 py-0.5 rounded-full">Pending</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Permohonan Pinjam Ruangan</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">6 <span class="text-sm font-bold text-slate-500">permohonan</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Menunggu persetujuan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-600">⚠️</span>
                            <span class="text-[11px] font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">Stok Minim</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Warning Stok ATK Menipis</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">9 <span class="text-sm font-bold text-slate-500">item</span></p>
                        <p class="text-[11px] text-red-600 mt-1 font-semibold">Segera ajukan pengadaan</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <!-- LEFT -->
                    <div class="lg:col-span-2 space-y-4">
                        <!-- Permohonan peminjaman pending -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Permohonan Peminjaman Ruangan &amp; Alat</h2><p class="text-xs text-slate-400">Pending approval — perlu tindakan</p></div>
                                <button onclick="showView('approval','Persetujuan Peminjaman')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[760px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr>
                                            <th class="px-4 py-3">Pemohon</th>
                                            <th class="px-4 py-3">Keperluan</th>
                                            <th class="px-4 py-3">Ruangan</th>
                                            <th class="px-4 py-3">Waktu</th>
                                            <th class="px-4 py-3 text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bookingBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="bookingEmpty" class="hidden py-16 text-center">
                                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">✅</div>
                                <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada permohonan tertunda</p>
                                <p class="text-sm text-slate-400">Semua permohonan peminjaman telah diproses.</p>
                            </div>
                        </div>

                        <!-- Donut kondisi aset -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Status Kondisi Aset Sekolah</h2><p class="text-xs text-slate-400">Rekap audit 1.284 item</p></div>
                                <button onclick="showView('generic','Laporan Kondisi Aset')" class="text-[11px] font-bold text-navy">Laporan lengkap</button>
                            </div>
                            <div class="mt-5 flex flex-col sm:flex-row items-center gap-6">
                                <div class="relative w-44 h-44 flex-shrink-0">
                                    <div class="w-full h-full rounded-full" style="background: conic-gradient(#10B981 0 78%, #F59E0B 78% 93%, #EF4444 93% 100%);"></div>
                                    <div class="absolute inset-[18px] bg-white rounded-full grid place-items-center text-center">
                                        <div>
                                            <p class="font-heading font-extrabold text-2xl text-slate-900">1.284</p>
                                            <p class="text-[11px] font-semibold text-slate-500">Total Item</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 w-full space-y-3">
                                    <div class="flex items-center gap-3">
                                        <span class="w-3 h-3 rounded-full bg-emerald-500 flex-shrink-0"></span>
                                        <span class="text-sm font-semibold text-slate-700 flex-1">Kondisi Baik</span>
                                        <span class="text-sm font-heading font-extrabold text-slate-900">1.001</span>
                                        <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">78%</span>
                                    </div>
                                    <div class="h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500 rounded-full" style="width:78%"></div></div>
                                    <div class="flex items-center gap-3">
                                        <span class="w-3 h-3 rounded-full bg-amber-500 flex-shrink-0"></span>
                                        <span class="text-sm font-semibold text-slate-700 flex-1">Rusak Ringan</span>
                                        <span class="text-sm font-heading font-extrabold text-slate-900">192</span>
                                        <span class="text-xs font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">15%</span>
                                    </div>
                                    <div class="h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-amber-500 rounded-full" style="width:15%"></div></div>
                                    <div class="flex items-center gap-3">
                                        <span class="w-3 h-3 rounded-full bg-red-500 flex-shrink-0"></span>
                                        <span class="text-sm font-semibold text-slate-700 flex-1">Rusak Berat</span>
                                        <span class="text-sm font-heading font-extrabold text-slate-900">91</span>
                                        <span class="text-xs font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">7%</span>
                                    </div>
                                    <div class="h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-red-500 rounded-full" style="width:7%"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="space-y-4">
                        <!-- Kalender hari ini -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Jadwal Pemakaian Ruangan</h2>
                                <button onclick="showView('kalender','Kalender Pemakaian')" class="text-[11px] font-bold text-navy">Kalender</button>
                            </div>
                            <p class="text-xs text-slate-400 mt-1">Hari ini · Sabtu, 17 Oktober 2026</p>
                            <div class="mt-4 space-y-3">
                                <div class="flex gap-3">
                                    <div class="w-16 flex-shrink-0 text-[11px] font-bold text-slate-500 pt-0.5">07:00<br>09:00</div>
                                    <div class="flex-1 border-l-2 border-blue-500 pl-3">
                                        <p class="text-sm font-bold text-slate-800">Lab Komputer</p>
                                        <p class="text-xs text-slate-500">Kelas 11-C · TIK</p>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="w-16 flex-shrink-0 text-[11px] font-bold text-slate-500 pt-0.5">09:00<br>11:00</div>
                                    <div class="flex-1 border-l-2 border-emerald-500 pl-3">
                                        <p class="text-sm font-bold text-slate-800">Aula</p>
                                        <p class="text-xs text-slate-500">Latihan Pidato</p>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="w-16 flex-shrink-0 text-[11px] font-bold text-slate-500 pt-0.5">13:00<br>15:00</div>
                                    <div class="flex-1 border-l-2 border-amber-500 pl-3">
                                        <p class="text-sm font-bold text-slate-800">Lab IPA <span class="text-[10px] font-bold bg-sky-100 text-sky-700 px-1.5 py-0.5 rounded">booking</span></p>
                                        <p class="text-xs text-slate-500">Praktikum Kimia Tambahan · Ibu Rina</p>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="w-16 flex-shrink-0 text-[11px] font-bold text-slate-500 pt-0.5">15:30<br>17:00</div>
                                    <div class="flex-1 border-l-2 border-amber-500 pl-3">
                                        <p class="text-sm font-bold text-slate-800">Lapangan <span class="text-[10px] font-bold bg-sky-100 text-sky-700 px-1.5 py-0.5 rounded">booking</span></p>
                                        <p class="text-xs text-slate-500">Latihan Paskibra · Bpk. Dedi</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Alert stok ATK -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-lg">📉</span>
                                <div>
                                    <h2 class="font-heading font-bold text-slate-800">Peringatan Stok ATK Minimum</h2>
                                    <p class="text-[11px] text-slate-400">Item yang harus segera dibeli</p>
                                </div>
                            </div>
                            <div class="mt-4 space-y-2.5">
                                <div class="flex items-center justify-between bg-red-50 border border-red-100 rounded-xl px-3 py-2.5">
                                    <div><p class="text-sm font-bold text-slate-800">Kertas HVS A4 70gsm</p><p class="text-[11px] text-slate-500">Min. 20 rim</p></div>
                                    <span class="text-sm font-heading font-extrabold text-red-700">8 rim</span>
                                </div>
                                <div class="flex items-center justify-between bg-red-50 border border-red-100 rounded-xl px-3 py-2.5">
                                    <div><p class="text-sm font-bold text-slate-800">Spidol Whiteboard</p><p class="text-[11px] text-slate-500">Min. 30 pcs</p></div>
                                    <span class="text-sm font-heading font-extrabold text-red-700">12 pcs</span>
                                </div>
                                <div class="flex items-center justify-between bg-amber-50 border border-amber-100 rounded-xl px-3 py-2.5">
                                    <div><p class="text-sm font-bold text-slate-800">Tinta Printer 664 Black</p><p class="text-[11px] text-slate-500">Min. 6 botol</p></div>
                                    <span class="text-sm font-heading font-extrabold text-amber-700">2 botol</span>
                                </div>
                            </div>
                            <button onclick="showView('atk','Stok ATK &amp; Habis Pakai')" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📋 Kelola Stok &amp; Pengadaan</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: DATABASE ASET ================= -->
            <section id="view-aset" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Database Barang &amp; Aset</h2>
                        <p class="text-xs text-slate-400">Katalog lengkap aset sekolah: kode aset, kategori, lokasi, kondisi, dan nilai aset.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="showView('qr','Label QR Per Aset')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">🏷️ Cetak Label QR Massal</button>
                        <button onclick="showToast('info','Membuka form tambah aset baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Tambah Aset</button>
                    </div>
                </div>

                <!-- Filter -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Kategori Aset</label>
                        <select id="filterKategori" onchange="applyFilter()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Kategori</option>
                            <option>Furnitur</option>
                            <option>Elektronik</option>
                            <option>Laboratorium</option>
                            <option>Olahraga</option>
                            <option>Kesenian</option>
                            <option>ATK</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Lokasi Ruangan</label>
                        <select id="filterLokasi" onchange="applyFilter()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Ruangan</option>
                            <option>Kelas 10-A</option>
                            <option>Kelas 10-B</option>
                            <option>Lab IPA</option>
                            <option>Lab Komputer</option>
                            <option>Ruang Rapat</option>
                            <option>Aula</option>
                            <option>Gudang Sarpra</option>
                            <option>Ruang Musik</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pencarian Kode / Nama Barang</label>
                        <input id="searchAset" type="text" oninput="applyFilter()" placeholder="Cari kode aset atau nama barang..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 placeholder:text-slate-400">
                    </div>
                </div>

                <!-- Table -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1040px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3"><input id="selectAllAset" type="checkbox" class="accent" onchange="toggleAllAset(this)"></th>
                                    <th class="px-4 py-3">QR</th>
                                    <th class="px-4 py-3">Kode Aset</th>
                                    <th class="px-4 py-3">Nama Barang</th>
                                    <th class="px-4 py-3">Kategori</th>
                                    <th class="px-4 py-3">Ruangan / Lokasi</th>
                                    <th class="px-4 py-3">Kondisi</th>
                                    <th class="px-4 py-3 text-center">Jumlah</th>
                                    <th class="px-4 py-3 text-right">Nilai Aset</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="asetBody" class="divide-y divide-slate-50">
                                <tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="asetEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🔍</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Aset tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Coba ubah filter kategori, lokasi, atau kata kunci pencarian.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: LABEL QR ================= -->
            <section id="view-qr" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Label QR Per Aset</h2>
                        <p class="text-xs text-slate-400">Generator QR Code aset, cetak stiker massal, dan pemindaian cepat via kamera atau scanner.</p>
                    </div>
                    <button onclick="printQrMassal()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">🖨️ Cetak Stiker QR Massal</button>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <div><h3 class="font-heading font-bold text-slate-800">Pilih Aset untuk Cetak Label QR</h3><p class="text-xs text-slate-400">Centang aset yang ingin dicetak stikernya</p></div>
                            <span id="qrSelectedCount" class="text-[11px] font-bold bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full">0 dipilih</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[720px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3"><input id="selectAllQr" type="checkbox" class="accent" onchange="toggleAllQr(this)"></th>
                                        <th class="px-4 py-3">Preview QR</th>
                                        <th class="px-4 py-3">Kode Aset</th>
                                        <th class="px-4 py-3">Nama Barang</th>
                                        <th class="px-4 py-3">Lokasi</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="qrBody" class="divide-y divide-slate-50">
                                    <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 text-center">
                            <h3 class="font-heading font-bold text-slate-800 mb-1">Scan QR Aset</h3>
                            <p class="text-xs text-slate-400">Arahkan kamera ke kode QR pada barang</p>
                            <div class="mt-4 aspect-square rounded-2xl hero-gradient grid place-items-center relative overflow-hidden">
                                <div class="absolute inset-0 grid-pattern"></div>
                                <div class="relative z-10 text-center text-white">
                                    <div class="w-16 h-16 mx-auto rounded-2xl bg-white/20 grid place-items-center text-3xl">📷</div>
                                    <p class="mt-3 text-sm font-bold">Scanner Siap</p>
                                    <p class="text-[11px] text-white/80">demo — gunakan pencarian manual</p>
                                </div>
                            </div>
                            <button onclick="simulateScan()" class="mt-4 w-full bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📷 Simulasikan Scan QR</button>
                        </div>
                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">
                            <p class="text-xs font-bold text-slate-600 uppercase tracking-wider">Hasil Scan Terakhir</p>
                            <div id="lastScan" class="mt-2 text-sm text-slate-500">Belum ada pemindaian.</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: MUTASI ================= -->
            <section id="view-mutasi" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Mutasi Antar Ruangan</h2>
                    <p class="text-xs text-slate-400">Catat pemindahan aset antar kelas/ruangan beserta riwayat perpindahannya.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Form Mutasi Aset</h3>
                        <div class="mt-4 space-y-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pilih Aset</label>
                                <select id="mutAset" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></select>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Dari Ruangan</label>
                                    <input id="mutDari" type="text" readonly value="Kelas 10-A" class="mt-1 w-full bg-slate-50 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-500">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Ke Ruangan</label>
                                    <select id="mutKe" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                        <option>Aula</option>
                                        <option>Lab IPA</option>
                                        <option>Lab Komputer</option>
                                        <option>Ruang Rapat</option>
                                        <option>Gudang Sarpra</option>
                                        <option>Ruang Musik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Jumlah</label>
                                    <input id="mutJumlah" type="number" value="1" min="1" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal</label>
                                    <input id="mutTanggal" type="date" value="2026-10-17" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Keterangan</label>
                                <input id="mutKet" type="text" placeholder="Alasan pemindahan..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 placeholder:text-slate-400">
                            </div>
                            <button onclick="submitMutasi()" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">🔁 Simpan Mutasi</button>
                        </div>
                    </div>

                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100">
                            <h3 class="font-heading font-bold text-slate-800">Histori Pemindahan Aset</h3>
                            <p class="text-xs text-slate-400">Riwayat mutasi terbaru antar ruangan</p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[720px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Tanggal</th>
                                        <th class="px-4 py-3">Aset</th>
                                        <th class="px-4 py-3">Dari</th>
                                        <th class="px-4 py-3">Ke</th>
                                        <th class="px-4 py-3 text-center">Jumlah</th>
                                        <th class="px-4 py-3">Petugas</th>
                                    </tr>
                                </thead>
                                <tbody id="mutasiBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                        <div id="mutasiEmpty" class="hidden py-16 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🔁</div>
                            <p class="mt-4 font-heading font-bold text-slate-700">Belum ada mutasi aset</p>
                            <p class="text-sm text-slate-400">Riwayat pemindahan aset akan tampil di sini.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: STOK ATK ================= -->
            <section id="view-atk" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Stok ATK &amp; Barang Habis Pakai</h2>
                        <p class="text-xs text-slate-400">Monitoring stok, barang masuk/keluar, dan peringatan stok minimum.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="openAtkFlow('keluar')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">📤 Catat ATK Keluar</button>
                        <button onclick="openAtkFlow('masuk')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📥 Catat ATK Masuk</button>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Item ATK</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">64</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Stok Aman</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-600">51</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Stok Menipis</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-600">9</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Stok Habis</p>
                        <p class="font-heading font-extrabold text-2xl text-red-600">4</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[860px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama ATK</th>
                                    <th class="px-4 py-3">Kategori</th>
                                    <th class="px-4 py-3">Satuan</th>
                                    <th class="px-4 py-3 text-center">Stok</th>
                                    <th class="px-4 py-3 text-center">Stok Min</th>
                                    <th class="px-4 py-3">Gudang</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="atkBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="atkEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📦</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada data ATK</p>
                        <p class="text-sm text-slate-400">Catat barang masuk untuk memulai monitoring stok.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: BOOKING RUANGAN ================= -->
            <section id="view-booking" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Booking Ruangan Online</h2>
                    <p class="text-xs text-slate-400">Ajukan peminjaman Lab, Aula, Lapangan, dan Ruang Rapat secara online.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Form Peminjaman</h3>
                        <div class="mt-4 space-y-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Ruangan</label>
                                <select id="bkRuang" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option>Lab IPA</option>
                                    <option>Aula</option>
                                    <option>Lapangan</option>
                                    <option>Ruang Rapat</option>
                                    <option>Lab Komputer</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nama Pemohon</label>
                                <input id="bkNama" type="text" placeholder="Nama guru/staf..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 placeholder:text-slate-400">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Keperluan</label>
                                <input id="bkPerlu" type="text" placeholder="cth. Rapat Wali Murid" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 placeholder:text-slate-400">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal</label>
                                <input id="bkTanggal" type="date" value="2026-10-18" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Mulai</label>
                                    <input id="bkMulai" type="time" value="08:00" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Selesai</label>
                                    <input id="bkSelesai" type="time" value="10:00" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Jumlah Peserta</label>
                                <input id="bkPeserta" type="number" value="30" min="1" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            </div>
                            <button onclick="submitBooking()" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📅 Ajukan Peminjaman</button>
                            <p id="bkConflict" class="hidden text-xs font-semibold text-red-600 bg-red-50 border border-red-100 rounded-xl px-3 py-2">⚠️ Jadwal bentrok dengan pemakaian lain pada ruangan &amp; waktu tersebut.</p>
                        </div>
                    </div>

                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <div><h3 class="font-heading font-bold text-slate-800">Permohonan Terbaru</h3><p class="text-xs text-slate-400">Status pengajuan peminjaman ruangan</p></div>
                            <button onclick="showView('approval','Persetujuan Peminjaman')" class="text-[11px] font-bold text-navy">Ke Persetujuan</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[760px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Pemohon</th>
                                        <th class="px-4 py-3">Keperluan</th>
                                        <th class="px-4 py-3">Ruangan</th>
                                        <th class="px-4 py-3">Waktu</th>
                                        <th class="px-4 py-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="bookingAllBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KALENDER ================= -->
            <section id="view-kalender" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Kalender Pemakaian Ruangan</h2>
                        <p class="text-xs text-slate-400">Visualisasi jadwal pemakaian ruangan dan deteksi bentrok jadwal.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="showToast('info','Menampilkan bulan sebelumnya...')" class="w-9 h-9 rounded-xl bg-white border border-slate-200 grid place-items-center text-slate-500 hover:bg-slate-50">‹</button>
                        <span class="px-3 py-2 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-700">Oktober 2026</span>
                        <button onclick="showToast('info','Menampilkan bulan berikutnya...')" class="w-9 h-9 rounded-xl bg-white border border-slate-200 grid place-items-center text-slate-500 hover:bg-slate-50">›</button>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 sm:p-5">
                    <div class="grid grid-cols-7 gap-1 sm:gap-2 text-center text-[11px] font-bold text-slate-400 uppercase mb-2">
                        <div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div><div>Min</div>
                    </div>
                    <div id="kalenderGrid" class="grid grid-cols-7 gap-1 sm:gap-2"></div>
                    <div class="mt-4 flex flex-wrap items-center gap-3 text-[11px] font-semibold">
                        <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-blue-500"></span> Kegiatan Belajar</span>
                        <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-emerald-500"></span> Kegiatan Sekolah</span>
                        <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-amber-500"></span> Peminjaman Ruangan</span>
                        <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-red-500"></span> Bentrok Jadwal</span>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: APPROVAL ================= -->
            <section id="view-approval" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Persetujuan Peminjaman Ruangan &amp; Peralatan</h2>
                    <p class="text-xs text-slate-400">Dashboard approval untuk menyetujui atau menolak permohonan izin pinjam.</p>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Menunggu Persetujuan</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-600" id="approvalPendingCount">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Disetujui</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-600" id="approvalOkCount">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Ditolak</p>
                        <p class="font-heading font-extrabold text-2xl text-red-600" id="approvalNoCount">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900" id="approvalTotalCount">0</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Daftar Permohonan</h3></div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[900px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Pemohon</th>
                                    <th class="px-4 py-3">Keperluan</th>
                                    <th class="px-4 py-3">Ruangan</th>
                                    <th class="px-4 py-3">Waktu</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="approvalBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="approvalEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">✅</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada permohonan</p>
                        <p class="text-sm text-slate-400">Semua permohonan telah diproses.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: TIKET KERUSAKAN ================= -->
            <section id="view-tiket" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan Kerusakan &amp; Tiket Perbaikan</h2>
                        <p class="text-xs text-slate-400">Sistem tiket pengaduan kerusakan fasilitas dari guru/staf — papan kanban per status.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form pengaduan kerusakan...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Buat Tiket Pengaduan</button>
                </div>

                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm flex flex-col">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <span class="text-sm font-bold text-slate-700">🆕 Pengaduan Baru</span>
                            <span id="kbCount-0" class="text-[11px] font-bold bg-rose-100 text-rose-800 px-2 py-0.5 rounded-full">0</span>
                        </div>
                        <div class="kanban-col p-3 space-y-3" id="kb-0"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm flex flex-col">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <span class="text-sm font-bold text-slate-700">📅 Disetujui / Dijadwalkan</span>
                            <span id="kbCount-1" class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full">0</span>
                        </div>
                        <div class="kanban-col p-3 space-y-3" id="kb-1"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm flex flex-col">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <span class="text-sm font-bold text-slate-700">🔧 Sedang Diperbaiki</span>
                            <span id="kbCount-2" class="text-[11px] font-bold bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full">0</span>
                        </div>
                        <div class="kanban-col p-3 space-y-3" id="kb-2"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm flex flex-col">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <span class="text-sm font-bold text-slate-700">✅ Selesai / Verified</span>
                            <span id="kbCount-3" class="text-[11px] font-bold bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full">0</span>
                        </div>
                        <div class="kanban-col p-3 space-y-3" id="kb-3"></div>
                    </div>
                </div>
                <div id="tiketEmpty" class="hidden mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm py-16 text-center">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🎉</div>
                    <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada tiket kerusakan aktif</p>
                    <p class="text-sm text-slate-400">Semua fasilitas dalam kondisi terpelihara.</p>
                </div>
            </section>

            <!-- ================= VIEW: PENGHAPUSAN ASET ================= -->
            <section id="view-penghapusan-aset" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Penghapusan Aset</h2><p class="text-xs text-slate-400">Usulan penghapusan aset tidak layak pakai.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Usulan penghapusan dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Ajukan Penghapusan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kode Aset</th><th class="px-4 py-3">Nama Aset</th><th class="px-4 py-3">Kondisi</th><th class="px-4 py-3">Nilai Buku</th><th class="px-4 py-3">Alasan</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="penghapusan-asetBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PENJADWALAN PERBAIKAN ================= -->
            <section id="view-penjadwalan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Penjadwalan Perbaikan</h2><p class="text-xs text-slate-400">Jadwal pemeliharaan dan perbaikan sarana.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Jadwal perbaikan dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Tambah Jadwal</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kegiatan</th><th class="px-4 py-3">Aset / Lokasi</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Petugas</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="penjadwalanBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PENGADAAN & APPROVAL ================= -->
            <section id="view-pengadaan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pengadaan &amp; Approval</h2><p class="text-xs text-slate-400">Permohonan pengadaan barang dan persetujuannya.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Permohonan pengadaan dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Ajukan Pengadaan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Item</th><th class="px-4 py-3">Jumlah</th><th class="px-4 py-3">Estimasi Biaya</th><th class="px-4 py-3">Pemohon</th><th class="px-4 py-3">Approval</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="pengadaanBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: LAPORAN KONDISI ASET ================= -->
            <section id="view-laporan-aset" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan Kondisi Aset</h2><p class="text-xs text-slate-400">Rekapitulasi kondisi aset per kategori.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Menyiapkan laporan kondisi aset...')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Ekspor Laporan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Total Unit</th><th class="px-4 py-3">Baik</th><th class="px-4 py-3">Rusak Ringan</th><th class="px-4 py-3">Rusak Berat</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="laporan-asetBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧩</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal E-Sarpra. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Dashboard</span>, <span class="font-semibold text-slate-600">Database Aset</span>, <span class="font-semibold text-slate-600">Label QR</span>, <span class="font-semibold text-slate-600">Mutasi</span>, <span class="font-semibold text-slate-600">Stok ATK</span>, <span class="font-semibold text-slate-600">Booking Ruangan</span>, dan <span class="font-semibold text-slate-600">Tiket Kerusakan</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard E-Sarpra')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('aset','Database Barang &amp; Aset')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Database Aset</button>
                        <button onclick="showView('tiket','Laporan Kerusakan (Tiket)')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Tiket Kerusakan</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="px-4 sm:px-6 py-4 text-center text-xs text-slate-400 border-t border-slate-200">
            © 2026 PT Artificial Intelligence Learning Madani Digital · Portal E-Sarpra (Simulasi)
        </footer>
    </div>

    <!-- ============ MODAL: PREVIEW QR ============ -->
    <div id="qrModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeQr()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-sm p-6">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                    <span class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-700 grid place-items-center text-xl">🏷️</span>
                    <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Label QR Aset</h3><p class="text-xs text-slate-400">Pratinjau stiker siap cetak</p></div>
                </div>
                <button onclick="closeQr()" class="text-slate-400 hover:text-slate-700 text-xl leading-none">✕</button>
            </div>

            <!-- Sticker preview -->
            <div class="mt-5 border-2 border-slate-200 rounded-2xl p-4 bg-white">
                <div class="flex items-center gap-2 pb-3 border-b border-dashed border-slate-200">
                    <div class="w-8 h-8 rounded-lg hero-gradient grid place-items-center text-white font-heading font-extrabold text-[11px]">S+</div>
                    <div class="leading-tight">
                        <p class="font-heading font-bold text-slate-800 text-xs">SMAN 1 NUSANTARA</p>
                        <p class="text-[10px] text-slate-400">SIAKAD PLUS · Inventaris Aset</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-4">
                    <div class="w-24 h-24 flex-shrink-0 p-1.5 border border-slate-200 rounded-xl" id="qrBox"></div>
                    <div class="min-w-0">
                        <p id="qrKode" class="font-heading font-extrabold text-slate-900 text-sm">AST-000-000</p>
                        <p id="qrNama" class="text-xs text-slate-600 font-semibold truncate">Nama Barang</p>
                        <p id="qrLokasi" class="text-[11px] text-slate-400 mt-1">Lokasi</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 flex gap-2">
                <button onclick="showToast('success','Label QR diunduh sebagai PNG')" class="flex-1 bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇️ Download PNG</button>
                <button onclick="showToast('success','Label QR dicetak sebagai PDF')" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak PDF</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: KONFIRMASI ============ -->
    <div id="confirmModal" class="fixed inset-0 z-[65] hidden items-center justify-center p-4">
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

    <!-- ============ TOAST ============ -->
    <div id="toastWrap" class="fixed bottom-5 right-5 z-[70] space-y-2"></div>

    <script>
        // ---------- Sidebar ----------
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }
        document.querySelectorAll('.sidebar-group-btn').forEach(btn => {
            btn.addEventListener('click', () => btn.closest('.sidebar-group').classList.toggle('open'));
        });

        // ---------- Utils ----------
        function rupiah(n) { return 'Rp ' + Number(n).toLocaleString('id-ID'); }
        const kondisiBadge = {
            'Baik': 'bg-emerald-100 text-emerald-800',
            'Rusak Ringan': 'bg-amber-100 text-amber-800',
            'Rusak Berat': 'bg-red-100 text-red-800',
            'Dipinjam': 'bg-blue-100 text-blue-800'
        };
        const katBadge = {
            'Furnitur': 'bg-amber-50 text-amber-700',
            'Elektronik': 'bg-blue-50 text-blue-700',
            'Laboratorium': 'bg-sky-50 text-sky-700',
            'Olahraga': 'bg-emerald-50 text-emerald-700',
            'Kesenian': 'bg-purple-50 text-purple-700',
            'ATK': 'bg-slate-100 text-slate-600'
        };

        // ---------- Pseudo QR generator (SVG) ----------
        function qrSvg(seed, px) {
            px = px || 100;
            const n = 21, m = px / n;
            let h = 0;
            for (let i = 0; i < seed.length; i++) h = (h * 31 + seed.charCodeAt(i)) >>> 0;
            function rnd() { h ^= h << 13; h >>>= 0; h ^= h >> 17; h ^= h << 5; h >>>= 0; return h / 4294967296; }
            let cells = '';
            for (let y = 0; y < n; y++) {
                for (let x = 0; x < n; x++) {
                    const finder = (x < 7 && y < 7) || (x >= n - 7 && y < 7) || (x < 7 && y >= n - 7);
                    let on;
                    if (finder) {
                        const lx = x >= n - 7 ? x - (n - 7) : x;
                        const ly = y >= n - 7 ? y - (n - 7) : y;
                        const bx = lx % 7, by = ly % 7;
                        on = bx === 0 || bx === 6 || by === 0 || by === 6 || (bx >= 2 && bx <= 4 && by >= 2 && by <= 4);
                    } else {
                        on = rnd() > 0.52;
                    }
                    if (on) cells += '<rect x="' + (x * m).toFixed(2) + '" y="' + (y * m).toFixed(2) + '" width="' + m.toFixed(2) + '" height="' + m.toFixed(2) + '"/>';
                }
            }
            return '<svg viewBox="0 0 ' + px + ' ' + px + '" class="w-full h-full" fill="#0f172a" xmlns="http://www.w3.org/2000/svg">' + cells + '</svg>';
        }

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

            if (name === 'dashboard') loadBookingPending();
            if (name === 'aset') loadAset();
            if (name === 'qr') loadQrList();
            if (name === 'mutasi') loadMutasi();
            if (name === 'atk') loadAtk();
            if (name === 'booking' || name === 'approval') loadBookings();
            if (name === 'kalender') renderKalender();
            if (name === 'tiket') loadTiket();
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

        // ---------- DATA ASET ----------
        const assets = [
            { kode: 'AST-10A-001', nama: 'Kursi Siswa Kayu', kategori: 'Furnitur', lokasi: 'Kelas 10-A', kondisi: 'Baik', jumlah: 40, nilai: 12000000 },
            { kode: 'AST-LAB-014', nama: 'Mikroskop Binokuler', kategori: 'Laboratorium', lokasi: 'Lab IPA', kondisi: 'Baik', jumlah: 24, nilai: 96000000 },
            { kode: 'ELK-RAP-003', nama: 'Proyektor Epson EB-X06', kategori: 'Elektronik', lokasi: 'Ruang Rapat', kondisi: 'Rusak Ringan', jumlah: 3, nilai: 18000000 },
            { kode: 'AST-10B-002', nama: 'Meja Siswa', kategori: 'Furnitur', lokasi: 'Kelas 10-B', kondisi: 'Baik', jumlah: 40, nilai: 20000000 },
            { kode: 'OLA-BOL-005', nama: 'Bola Sepak Size 5', kategori: 'Olahraga', lokasi: 'Gudang Sarpra', kondisi: 'Rusak Ringan', jumlah: 12, nilai: 2400000 },
            { kode: 'ELK-KOM-021', nama: 'Komputer All-in-One', kategori: 'Elektronik', lokasi: 'Lab Komputer', kondisi: 'Dipinjam', jumlah: 30, nilai: 210000000 },
            { kode: 'MUS-GIT-002', nama: 'Gitar Akustik Yamaha', kategori: 'Kesenian', lokasi: 'Ruang Musik', kondisi: 'Rusak Berat', jumlah: 4, nilai: 6800000 },
            { kode: 'AST-AUL-100', nama: 'Kursi Lipat Aula', kategori: 'Furnitur', lokasi: 'Aula', kondisi: 'Baik', jumlah: 200, nilai: 30000000 }
        ];

        let asetLoaded = false;
        function loadAset() {
            if (asetLoaded) { applyFilter(); return; }
            const body = document.getElementById('asetBody');
            setTimeout(() => {
                body.innerHTML = assets.map(a =>
                    '<tr class="hover:bg-slate-50/70 aset-row">'
                    + '<td class="px-4 py-3"><input type="checkbox" class="accent aset-check"></td>'
                    + '<td class="px-4 py-3"><button onclick="openQr(this.dataset.k)" data-k="' + a.kode + '" class="w-9 h-9 p-0.5 border border-slate-200 rounded-lg block hover:border-navy transition-colors" title="Lihat QR">' + qrSvg(a.kode, 60) + '</button></td>'
                    + '<td class="px-4 py-3 font-bold text-slate-700 whitespace-nowrap">' + a.kode + '</td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + a.nama + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (katBadge[a.kategori] || 'bg-slate-100 text-slate-600') + ' px-2.5 py-1 rounded-full">' + a.kategori + '</span></td>'
                    + '<td class="px-4 py-3 text-slate-500">' + a.lokasi + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + kondisiBadge[a.kondisi] + ' px-2.5 py-1 rounded-full">' + a.kondisi + '</span></td>'
                    + '<td class="px-4 py-3 text-center text-slate-600">' + a.jumlah + '</td>'
                    + '<td class="px-4 py-3 text-right font-heading font-extrabold text-slate-900">' + rupiah(a.nilai) + '</td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                    + '<button onclick="showToast(\'info\',\'Detail aset ' + a.kode + '\')" class="text-slate-400 hover:text-navy px-1" title="Detail">🔍</button>'
                    + '<button onclick="openQr(this.dataset.k)" data-k="' + a.kode + '" class="text-slate-400 hover:text-navy px-1" title="Scan QR">📷</button>'
                    + '<button onclick="showView(\'mutasi\',\'Mutasi Antar Ruangan\')" class="text-slate-400 hover:text-navy px-1" title="Mutasi">🔁</button>'
                    + '<button onclick="showToast(\'info\',\'Edit aset ' + a.kode + '\')" class="text-slate-400 hover:text-navy px-1" title="Edit">✏️</button>'
                    + '<button onclick="confirmDelete(this.dataset.n)" data-n="' + a.nama + '" class="text-slate-400 hover:text-red-600 px-1" title="Hapus">🗑️</button>'
                    + '</td>'
                    + '</tr>'
                ).join('');
                asetLoaded = true;
                applyFilter();
                showToast('success', assets.length + ' aset dimuat dari database');
            }, 650);
        }

        function applyFilter() {
            const kat = document.getElementById('filterKategori').value;
            const lok = document.getElementById('filterLokasi').value;
            const q = document.getElementById('searchAset').value.toLowerCase().trim();
            let visible = 0;
            document.querySelectorAll('.aset-row').forEach(r => {
                const c = r.querySelectorAll('td');
                const rowKat = c[4].textContent.trim();
                const rowLok = c[5].textContent.trim();
                const rowTxt = (c[2].textContent + ' ' + c[3].textContent).toLowerCase();
                const ok = (!kat || rowKat === kat) && (!lok || rowLok === lok) && (!q || rowTxt.indexOf(q) !== -1);
                r.classList.toggle('hidden', !ok);
                if (ok) visible++;
            });
            document.getElementById('asetEmpty').classList.toggle('hidden', visible > 0);
        }

        function toggleAllAset(cb) {
            document.querySelectorAll('.aset-row:not(.hidden) .aset-check').forEach(c => c.checked = cb.checked);
        }

        // ---------- QR list ----------
        let qrLoaded = false;
        function loadQrList() {
            if (qrLoaded) return;
            const body = document.getElementById('qrBody');
            setTimeout(() => {
                body.innerHTML = assets.map(a =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3"><input type="checkbox" class="accent qr-check" onchange="updateQrCount()"></td>'
                    + '<td class="px-4 py-3"><div class="w-10 h-10 p-0.5 border border-slate-200 rounded-lg">' + qrSvg(a.kode, 60) + '</div></td>'
                    + '<td class="px-4 py-3 font-bold text-slate-700 whitespace-nowrap">' + a.kode + '</td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + a.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + a.lokasi + '</td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="openQr(this.dataset.k)" data-k="' + a.kode + '" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition-colors">Pratinjau QR</button></td>'
                    + '</tr>'
                ).join('');
                qrLoaded = true;
                updateQrCount();
            }, 650);
        }
        function toggleAllQr(cb) { document.querySelectorAll('.qr-check').forEach(c => c.checked = cb.checked); updateQrCount(); }
        function updateQrCount() {
            document.getElementById('qrSelectedCount').textContent = document.querySelectorAll('.qr-check:checked').length + ' dipilih';
        }
        function printQrMassal() {
            const n = document.querySelectorAll('.qr-check:checked').length;
            if (!n) { showToast('warning', 'Pilih minimal satu aset untuk dicetak'); return; }
            showToast('success', n + ' stiker QR masuk antrean cetak');
        }
        function simulateScan() {
            const a = assets[1];
            document.getElementById('lastScan').innerHTML = '<span class="font-semibold text-slate-700">' + a.kode + '</span> · ' + a.nama;
            showToast('success', 'QR terdeteksi: ' + a.kode + ' · ' + a.nama);
            openQr(a.kode);
        }

        // ---------- QR modal ----------
        function openQr(kode) {
            const a = assets.find(x => x.kode === kode) || { kode: kode, nama: '-', lokasi: '-' };
            document.getElementById('qrBox').innerHTML = qrSvg(kode, 100);
            document.getElementById('qrKode').textContent = a.kode;
            document.getElementById('qrNama').textContent = a.nama;
            document.getElementById('qrLokasi').textContent = a.lokasi;
            document.getElementById('lastScan').innerHTML = '<span class="font-semibold text-slate-700">' + a.kode + '</span> · ' + a.nama;
            const m = document.getElementById('qrModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeQr() { const m = document.getElementById('qrModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        // ---------- MUTASI ----------
        const mutasiData = [
            { tgl: '10 Okt 2026', aset: 'AST-10A-001 · Kursi Siswa Kayu', dari: 'Kelas 10-A', ke: 'Aula', jumlah: 10, petugas: 'Bpk. Andri' },
            { tgl: '08 Okt 2026', aset: 'ELK-KOM-021 · Komputer All-in-One', dari: 'Lab Komputer', ke: 'Ruang Rapat', jumlah: 1, petugas: 'Ibu Sari' },
            { tgl: '05 Okt 2026', aset: 'OLA-BOL-005 · Bola Sepak Size 5', dari: 'Gudang Sarpra', ke: 'Lapangan', jumlah: 6, petugas: 'Bpk. Dedi' }
        ];
        function loadMutasi() {
            const sel = document.getElementById('mutAset');
            if (!sel.options.length) {
                sel.innerHTML = assets.map(a => '<option value="' + a.kode + '">' + a.kode + ' · ' + a.nama + '</option>').join('');
            }
            renderMutasi();
        }
        function renderMutasi() {
            const body = document.getElementById('mutasiBody');
            body.innerHTML = mutasiData.map(m =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + m.tgl + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + m.aset + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + m.dari + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + m.ke + '</td>'
                + '<td class="px-4 py-3 text-center text-slate-600">' + m.jumlah + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + m.petugas + '</td>'
                + '</tr>'
            ).join('');
            document.getElementById('mutasiEmpty').classList.toggle('hidden', mutasiData.length > 0);
        }
        function submitMutasi() {
            const kode = document.getElementById('mutAset').value;
            const a = assets.find(x => x.kode === kode) || { nama: '' };
            const ke = document.getElementById('mutKe').value;
            const jumlah = document.getElementById('mutJumlah').value || 1;
            const tgl = document.getElementById('mutTanggal').value;
            const tglFmt = tgl ? new Date(tgl).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' }) : '-';
            mutasiData.unshift({ tgl: tglFmt, aset: kode + ' · ' + a.nama, dari: document.getElementById('mutDari').value, ke: ke, jumlah: jumlah, petugas: 'Staf Sarpras' });
            renderMutasi();
            showToast('success', 'Mutasi aset ke ' + ke + ' berhasil dicatat');
        }

        // ---------- STOK ATK ----------
        const atkData = [
            { nama: 'Kertas HVS A4 70gsm', kat: 'Kertas', satuan: 'Rim', stok: 8, min: 20, gudang: 'Gudang Sarpra' },
            { nama: 'Spidol Whiteboard', kat: 'Alat Tulis', satuan: 'Pcs', stok: 12, min: 30, gudang: 'Gudang Sarpra' },
            { nama: 'Tinta Printer 664 Black', kat: 'Tinta', satuan: 'Botol', stok: 2, min: 6, gudang: 'Ruang TU' },
            { nama: 'Kapur Tulis', kat: 'Alat Tulis', satuan: 'Dus', stok: 5, min: 10, gudang: 'Gudang Sarpra' },
            { nama: 'Pulpen Standard AE7', kat: 'Alat Tulis', satuan: 'Box', stok: 0, min: 4, gudang: 'Ruang TU' },
            { nama: 'Amplop Coklat Folio', kat: 'Kertas', satuan: 'Pcs', stok: 120, min: 50, gudang: 'Ruang TU' },
            { nama: 'Staples Kenko No.10', kat: 'Perlengkapan', satuan: 'Pcs', stok: 24, min: 10, gudang: 'Ruang TU' },
            { nama: 'Lem Kertas Stick', kat: 'Perlengkapan', satuan: 'Pcs', stok: 18, min: 12, gudang: 'Gudang Sarpra' }
        ];
        function atkStatus(s) {
            return s.stok === 0 ? { t: 'Stok Habis', b: 'bg-red-100 text-red-800' }
                : (s.stok < s.min ? { t: 'Stok Menipis', b: 'bg-amber-100 text-amber-800' }
                    : { t: 'Stok Aman', b: 'bg-emerald-100 text-emerald-800' });
        }
        let atkLoaded = false;
        function loadAtk() {
            if (atkLoaded) return;
            const body = document.getElementById('atkBody');
            setTimeout(() => {
                body.innerHTML = atkData.map((s, i) => {
                    const st = atkStatus(s);
                    return '<tr class="hover:bg-slate-50/70 atk-row">'
                        + '<td class="px-4 py-3 font-semibold text-slate-700">' + s.nama + '</td>'
                        + '<td class="px-4 py-3 text-slate-500">' + s.kat + '</td>'
                        + '<td class="px-4 py-3 text-slate-500">' + s.satuan + '</td>'
                        + '<td class="px-4 py-3 text-center font-heading font-extrabold text-slate-900 atk-stok">' + s.stok + '</td>'
                        + '<td class="px-4 py-3 text-center text-slate-500">' + s.min + '</td>'
                        + '<td class="px-4 py-3 text-slate-500">' + s.gudang + '</td>'
                        + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + st.b + ' px-2.5 py-1 rounded-full atk-badge">' + st.t + '</span></td>'
                        + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                        + '<button onclick="openAtkFlow(\'masuk\',' + i + ')" class="text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-2.5 py-1.5 rounded-lg mr-1">📥 Masuk</button>'
                        + '<button onclick="openAtkFlow(\'keluar\',' + i + ')" class="text-xs font-bold text-amber-700 bg-amber-50 hover:bg-amber-100 px-2.5 py-1.5 rounded-lg">📤 Keluar</button>'
                        + '</td>'
                        + '</tr>';
                }).join('');
                atkLoaded = true;
            }, 650);
        }
        function openAtkFlow(arah, idx) {
            const item = (typeof idx === 'number') ? atkData[idx] : null;
            if (arah === 'masuk') {
                if (item) { item.stok += 10; showToast('success', '10 ' + item.satuan + ' ' + item.nama + ' dicatat masuk'); }
                else { showToast('info', 'Membuka form pencatatan ATK masuk...'); }
            } else {
                if (item) {
                    if (item.stok <= 0) { showToast('error', 'Stok ' + item.nama + ' habis'); return; }
                    item.stok -= 1; showToast('success', '1 ' + item.satuan + ' ' + item.nama + ' dicatat keluar');
                } else { showToast('info', 'Membuka form pencatatan ATK keluar...'); }
            }
            if (atkLoaded) refreshAtk();
        }
        function refreshAtk() {
            document.querySelectorAll('.atk-row').forEach((r, i) => {
                const s = atkData[i]; const st = atkStatus(s);
                r.querySelector('.atk-stok').textContent = s.stok;
                const b = r.querySelector('.atk-badge');
                b.textContent = st.t;
                b.className = 'text-[11px] font-bold ' + st.b + ' px-2.5 py-1 rounded-full atk-badge';
            });
        }

        // ---------- BOOKING ----------
        const bookings = [
            { pemohon: 'Bpk. Hendra', keperluan: 'Rapat Wali Murid Kelas 12', ruang: 'Aula', waktu: '18 Okt · 08:00–11:00', status: 'Pending' },
            { pemohon: 'Ibu Rina', keperluan: 'Praktikum Kimia Tambahan', ruang: 'Lab IPA', waktu: '17 Okt · 13:00–15:00', status: 'Pending' },
            { pemohon: 'Bpk. Dedi', keperluan: 'Latihan Paskibra', ruang: 'Lapangan', waktu: '17 Okt · 15:30–17:00', status: 'Pending' },
            { pemohon: 'Ibu Sri', keperluan: 'Rapat Dinas Kurikulum', ruang: 'Ruang Rapat', waktu: '18 Okt · 09:00–10:30', status: 'Pending' },
            { pemohon: 'Bpk. Andri', keperluan: 'Ujian Praktik TIK', ruang: 'Lab Komputer', waktu: '19 Okt · 07:00–09:00', status: 'Disetujui' }
        ];
        const statusBadge = { 'Pending': 'bg-amber-100 text-amber-800', 'Disetujui': 'bg-emerald-100 text-emerald-800', 'Ditolak': 'bg-red-100 text-red-800' };

        let bookingTableLoaded = false, bookingPendingLoaded = false;
        function loadBookingPending() {
            if (bookingPendingLoaded) { renderBookingPending(); return; }
            setTimeout(() => { renderBookingPending(); bookingPendingLoaded = true; }, 650);
        }
        function renderBookingPending() {
            const body = document.getElementById('bookingBody');
            const pending = bookings.map((b, i) => ({ b, i })).filter(x => x.b.status === 'Pending');
            if (!pending.length) {
                body.innerHTML = '';
                document.getElementById('bookingEmpty').classList.remove('hidden');
                return;
            }
            document.getElementById('bookingEmpty').classList.add('hidden');
            body.innerHTML = pending.map(x =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + x.b.pemohon + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + x.b.keperluan + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + x.b.ruang + '</td>'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + x.b.waktu + '</td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + '<button onclick="setBooking(' + x.i + ',\'Disetujui\')" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1.5 rounded-lg mr-1">✓ Setujui</button>'
                + '<button onclick="setBooking(' + x.i + ',\'Ditolak\')" class="text-xs font-bold text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded-lg">✕ Tolak</button>'
                + '</td>'
                + '</tr>'
            ).join('');
        }
        function setBooking(i, status) {
            bookings[i].status = status;
            if (bookingPendingLoaded) renderBookingPending();
            if (bookingTableLoaded) renderBookingsTable();
            showToast(status === 'Disetujui' ? 'success' : 'warning', 'Permohonan ' + bookings[i].pemohon + ' ' + status.toLowerCase());
        }
        function loadBookings() {
            if (bookingTableLoaded) { renderBookingsTable(); return; }
            setTimeout(() => { renderBookingsTable(); bookingTableLoaded = true; }, 650);
        }
        function renderBookingsTable() {
            const body = document.getElementById('bookingAllBody');
            if (body) {
                body.innerHTML = bookings.map(b =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + b.pemohon + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + b.keperluan + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + b.ruang + '</td>'
                    + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + b.waktu + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[b.status] + ' px-2.5 py-1 rounded-full">' + b.status + '</span></td>'
                    + '</tr>'
                ).join('');
            }
            const abody = document.getElementById('approvalBody');
            if (abody) {
                abody.innerHTML = bookings.map((b, i) =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + b.pemohon + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + b.keperluan + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + b.ruang + '</td>'
                    + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + b.waktu + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[b.status] + ' px-2.5 py-1 rounded-full">' + b.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                    + (b.status === 'Pending'
                        ? '<button onclick="setBooking(' + i + ',\'Disetujui\')" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1.5 rounded-lg mr-1">✓ Setujui</button><button onclick="setBooking(' + i + ',\'Ditolak\')" class="text-xs font-bold text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded-lg">✕ Tolak</button>'
                        : '<button onclick="setBooking(' + i + ',\'Pending\')" class="text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg">↺ Kembalikan</button>')
                    + '</td>'
                    + '</tr>'
                ).join('');
            }
            updateApprovalCounts();
        }
        function updateApprovalCounts() {
            const el = document.getElementById('approvalPendingCount');
            if (!el) return;
            el.textContent = bookings.filter(b => b.status === 'Pending').length;
            document.getElementById('approvalOkCount').textContent = bookings.filter(b => b.status === 'Disetujui').length;
            document.getElementById('approvalNoCount').textContent = bookings.filter(b => b.status === 'Ditolak').length;
            document.getElementById('approvalTotalCount').textContent = bookings.length;
        }
        function submitBooking() {
            const nama = document.getElementById('bkNama').value.trim() || 'Staf Sekolah';
            const perlu = document.getElementById('bkPerlu').value.trim() || 'Kegiatan Sekolah';
            const ruang = document.getElementById('bkRuang').value;
            const tgl = document.getElementById('bkTanggal').value;
            const mulai = document.getElementById('bkMulai').value;
            const selesai = document.getElementById('bkSelesai').value;
            const tglFmt = tgl ? new Date(tgl).toLocaleDateString('id-ID', { day: '2-digit', month: 'short' }) : '-';
            const conflict = bookings.some(b => b.status !== 'Ditolak' && b.ruang === ruang && b.waktu.indexOf(tglFmt) === 0);
            const cb = document.getElementById('bkConflict');
            if (conflict && new Date(tgl).getDate() === 18) { cb.classList.remove('hidden'); showToast('error', 'Jadwal bentrok di ' + ruang + ' pada tanggal tersebut'); return; }
            cb.classList.add('hidden');
            bookings.unshift({ pemohon: nama, keperluan: perlu, ruang: ruang, waktu: tglFmt + ' · ' + mulai + '–' + selesai, status: 'Pending' });
            if (bookingTableLoaded) renderBookingsTable();
            if (bookingPendingLoaded) renderBookingPending();
            updateApprovalCounts();
            showToast('success', 'Peminjaman ' + ruang + ' diajukan, menunggu persetujuan');
        }

        // ---------- KALENDER ----------
        const kalenderEvents = {
            3: [{ t: 'Rapat Koordinasi', w: 'e' }],
            7: [{ t: 'Praktikum Biologi', w: 'b' }],
            10: [{ t: 'Peminjaman Aula', w: 'a' }],
            14: [{ t: 'Ujian Semester', w: 'b' }],
            17: [{ t: 'Praktikum Kimia', w: 'a' }, { t: 'Latihan Paskibra', w: 'a' }],
            18: [{ t: 'Rapat Wali Murid', w: 'a' }],
            20: [{ t: 'Pentas Seni', w: 'e' }],
            22: [{ t: 'Bentrok: Aula ganda', w: 'r' }],
            24: [{ t: 'Study Tour', w: 'e' }],
            28: [{ t: 'Rapat Dinas', w: 'e' }]
        };
        const evColor = { b: 'bg-blue-100 text-blue-800 border-blue-200', e: 'bg-emerald-100 text-emerald-800 border-emerald-200', a: 'bg-amber-100 text-amber-800 border-amber-200', r: 'bg-red-100 text-red-800 border-red-200' };
        let kalenderRendered = false;
        function renderKalender() {
            if (kalenderRendered) return;
            const grid = document.getElementById('kalenderGrid');
            let html = '';
            for (let i = 0; i < 3; i++) html += '<div class="min-h-[92px]"></div>';
            for (let d = 1; d <= 31; d++) {
                const ev = kalenderEvents[d] || [];
                const isToday = d === 17;
                html += '<div class="min-h-[92px] rounded-xl border p-2 ' + (isToday ? 'border-navy bg-blue-50/60' : 'border-slate-100 bg-white') + '">'
                    + '<div class="flex items-center justify-between"><span class="text-xs font-bold ' + (isToday ? 'text-navy' : 'text-slate-500') + '">' + d + '</span>' + (isToday ? '<span class="text-[9px] font-bold text-white bg-navy px-1.5 py-0.5 rounded">Hari ini</span>' : '') + '</div>'
                    + '<div class="mt-1 space-y-1">' + ev.map(e => '<div class="text-[9px] font-semibold border rounded px-1 py-0.5 truncate ' + evColor[e.w] + '">' + e.t + '</div>').join('') + '</div>'
                    + '</div>';
            }
            grid.innerHTML = html;
            kalenderRendered = true;
        }

        // ---------- TIKET KERUSAKAN ----------
        const tikets = [
            { no: 'TKT-2026-0341', pelapor: 'Bpk. Andri (Guru)', barang: 'AC Ruang Rapat', desc: 'AC tidak dingin, ruangan panas', urgensi: 'High', kolom: 0, tugas: 'Belum ditugaskan' },
            { no: 'TKT-2026-0339', pelapor: 'Ibu Sari (Staf TU)', barang: 'Lampu Kelas 11-C', desc: '2 titik lampu mati', urgensi: 'Medium', kolom: 0, tugas: 'Belum ditugaskan' },
            { no: 'TKT-2026-0338', pelapor: 'Ibu Rina (Guru)', barang: 'Proyektor Lab Komputer', desc: 'Warna tampilan pudar', urgensi: 'Low', kolom: 1, tugas: 'Teknisi: Bpk. Joko' },
            { no: 'TKT-2026-0335', pelapor: 'Bpk. Dedi (Guru)', barang: 'Pintu Kelas 10-B', desc: 'Engsel longgar, sulit ditutup', urgensi: 'Medium', kolom: 2, tugas: 'Vendor: CV Karya Logam' },
            { no: 'TKT-2026-0330', pelapor: 'Ibu Sri (Staf)', barang: 'Keran Wastafel Toilet Guru', desc: 'Bocor terus menerus', urgensi: 'Low', kolom: 3, tugas: 'Selesai 15 Okt' }
        ];
        const urgBadge = { 'High': 'bg-red-100 text-red-800', 'Medium': 'bg-amber-100 text-amber-800', 'Low': 'bg-emerald-100 text-emerald-800' };
        let tiketLoaded = false;
        function loadTiket() {
            if (tiketLoaded) return;
            setTimeout(() => {
                for (let c = 0; c < 4; c++) {
                    const col = document.getElementById('kb-' + c);
                    const list = tikets.filter(t => t.kolom === c);
                    document.getElementById('kbCount-' + c).textContent = list.length;
                    col.innerHTML = list.map(t => {
                        const idx = tikets.indexOf(t);
                        return '<div class="border border-slate-100 rounded-2xl p-3 hover:shadow-md transition-shadow bg-white">'
                            + '<div class="flex items-center justify-between"><span class="text-[10px] font-bold text-slate-400">' + t.no + '</span><span class="text-[10px] font-bold ' + urgBadge[t.urgensi] + ' px-2 py-0.5 rounded-full">' + t.urgensi + '</span></div>'
                            + '<p class="mt-2 text-sm font-bold text-slate-800">' + t.barang + '</p>'
                            + '<p class="text-xs text-slate-500 mt-0.5">' + t.desc + '</p>'
                            + '<div class="mt-2 flex items-center gap-2 text-[11px] text-slate-500"><span class="w-6 h-6 rounded-full bg-slate-100 grid place-items-center text-xs">👤</span>' + t.pelapor + '</div>'
                            + '<div class="mt-3 rounded-xl bg-slate-50 border border-slate-100 h-16 grid place-items-center text-slate-400 text-[11px]">📷 Foto bukti kerusakan</div>'
                            + '<p class="mt-2 text-[10px] font-semibold text-slate-400">' + t.tugas + '</p>'
                            + (t.kolom < 3
                                ? '<button onclick="tugaskan(' + idx + ')" class="mt-2 w-full text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded-lg transition-colors">🛠️ Tugaskan Perbaikan</button>'
                                : '<button onclick="showToast(\'success\',\'Tiket ' + t.no + ' terverifikasi selesai\')" class="mt-2 w-full text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-2 rounded-lg transition-colors">✓ Verified</button>')
                            + '</div>';
                    }).join('');
                }
                tiketLoaded = true;
                document.getElementById('tiketEmpty').classList.toggle('hidden', tikets.length > 0);
            }, 650);
        }
        function tugaskan(i) {
            const t = tikets[i];
            if (t.kolom >= 3) return;
            t.kolom++;
            if (t.kolom === 1) t.tugas = 'Dijadwalkan · Teknisi Sekolah';
            if (t.kolom === 2) t.tugas = 'Sedang dikerjakan';
            if (t.kolom === 3) t.tugas = 'Selesai & terverifikasi';
            tiketLoaded = false;
            loadTiket();
            showToast('success', 'Tiket ' + t.no + ' dipindah ke tahap berikutnya');
        }

        // ---------- CONFIRM ----------
        let confirmCb = null;
        function openConfirm(title, msg, cb, danger) {
            document.getElementById('confirmTitle').textContent = title;
            document.getElementById('confirmMsg').textContent = msg;
            const ic = document.getElementById('confirmIcon');
            ic.textContent = danger ? '🗑️' : '⚠️';
            ic.className = 'w-11 h-11 rounded-2xl grid place-items-center text-xl ' + (danger ? 'bg-red-100 text-red-600' : 'bg-amber-100 text-amber-700');
            document.getElementById('confirmOk').className = 'text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors ' + (danger ? 'bg-red-500 hover:bg-red-600' : 'bg-blue-600 hover:bg-blue-700');
            confirmCb = cb;
            const m = document.getElementById('confirmModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeConfirm() { const m = document.getElementById('confirmModal'); m.classList.add('hidden'); m.classList.remove('flex'); confirmCb = null; }
        document.getElementById('confirmOk').addEventListener('click', () => {
            if (confirmCb) confirmCb();
            closeConfirm();
        });
        function confirmDelete(nama) {
            openConfirm('Hapus Aset?', 'Aset "' + nama + '" akan dihapus dari database inventaris.', () => {
                showToast('success', 'Aset ' + nama + ' berhasil dihapus');
            }, true);
        }

        // ---------- Generic in-page data tables ----------
        const statusPillMap = {
            'Terverifikasi': 'bg-emerald2/10 text-emerald2', 'Selesai': 'bg-emerald2/10 text-emerald2',
            'Aktif': 'bg-emerald2/10 text-emerald2', 'OK': 'bg-emerald2/10 text-emerald2',
            'Menunggu': 'bg-amber2/15 text-amber2', 'Perlu Review': 'bg-amber2/15 text-amber2',
            'Draft': 'bg-slate-200 text-slate-600', 'Ditolak': 'bg-red-100 text-red-600'
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
            'penghapusan-aset': [
                ['AST-0201', 'Proyektor Epson', 'Rusak Berat', 'Rp 1.200.000', 'Tidak ekonomis', '~Menunggu'],
                ['AST-0188', 'Kursi Siswa (10 unit)', 'Rusak Sedang', 'Rp 500.000', 'Peremajaan', '~Terverifikasi'],
                ['AST-0142', 'Komputer Lab (3 unit)', 'Rusak Berat', 'Rp 1.500.000', 'Usang', '~Draft']
            ],
            'penjadwalan': [
                ['Servis pendingin ruang guru', 'AC Ruang Guru', '22 Okt 2026', 'Teknisi A', '~Menunggu'],
                ['Perbaikan atap lab IPA', 'Lab IPA', '25 Okt 2026', 'Teknisi B', '~Terverifikasi'],
                ['Pengecatan koridor', 'Koridor Gedung A', '28 Okt 2026', 'Teknisi C', '~Draft']
            ],
            'pengadaan': [
                ['Laptop Pengajar', '5', 'Rp 40.000.000', 'Waka Sarpras', 'Kepala Sekolah', '~Menunggu'],
                ['Meja Lab IPA', '20', 'Rp 15.000.000', 'Waka Sarpras', 'Kepala Sekolah', '~Terverifikasi'],
                ['Proyektor', '3', 'Rp 12.000.000', 'Waka Sarpras', 'Yayasan', '~Draft']
            ],
            'laporan-aset': [
                ['Elektronik', '48', '40', '5', '3', '~Terverifikasi'],
                ['Mebel', '320', '300', '15', '5', '~Terverifikasi'],
                ['Laboratorium', '36', '30', '4', '2', '~Menunggu']
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

        // ---------- TOAST ----------
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

        // initial load
        loadBookingPending();
    </script>
</body>

</html>

