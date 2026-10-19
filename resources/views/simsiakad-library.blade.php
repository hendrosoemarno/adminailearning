<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal E-Library (Perpustakaan Digital) · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal E-Library SIAKAD PLUS — perpustakaan digital & sirkulasi buku: katalog OPAC, e-book digital, barcode/RFID, data anggota, pinjam-kembali, reservasi, denda otomatis, pengingat WA jatuh tempo, statistik kunjungan & buku terpopuler.">
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
        .sidebar-group.open .sidebar-group-body { max-height: 680px; }
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
        .book-cover { background: linear-gradient(135deg, #334155, #0f172a); }
        .barcode-bars { background-image: repeating-linear-gradient(90deg, #0f172a 0 2px, transparent 2px 4px, #0f172a 4px 5px, transparent 5px 8px, #0f172a 8px 11px, transparent 11px 13px); }
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
                <p class="text-[10px] text-slate-500">Perpustakaan Digital</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard E-Library</span>
            </button>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📚</span><span class="flex-1 text-left">Koleksi &amp; Katalog</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="katalog" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Katalog &amp; Pencarian OPAC</button>
                    <button data-view="ebook" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> E-Book &amp; Koleksi Digital</button>
                    <button data-view="barcode" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Barcode / RFID Buku</button>
                    <button data-view="anggota" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Data Anggota</button>
                </div>
            </div>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🔄</span><span class="flex-1 text-left">Sirkulasi &amp; Transaksi</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="sirkulasi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pinjam &amp; Kembali</button>
                    <button data-view="reservasi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Reservasi Buku</button>
                    <button data-view="denda" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Denda Otomatis</button>
                    <button data-view="pengingat" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengingat WA Jatuh Tempo</button>
                </div>
            </div>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📊</span><span class="flex-1 text-left">Laporan &amp; Analytics</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="kunjungan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Statistik Kunjungan</button>
                    <button data-view="populer" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Buku Terpopuler</button>
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Perpustakaan Digital</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard E-Library</h1>
                </div>

                <div class="hidden lg:flex items-center flex-1 max-w-xl mx-auto">
                    <div class="relative w-full">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                        <input onkeydown="if(event.key==='Enter')opacSearch(this.value)" placeholder="Cari Judul Buku, Pengarang, ISBN..."
                            class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                    </div>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <div class="hidden xl:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Koleksi</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">12.480 judul</p>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 rounded-full">Eksemplar 28.9K</span>
                    </div>
                    <button onclick="showToast('info', '3 buku jatuh tempo hari ini & 2 reservasi menunggu')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">PU</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Petugas Perpustakaan</p>
                            <p class="text-[10px] text-slate-400">SMAN 1 Nusantara</p>
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
                            <p class="text-sm text-white/85">Koleksi Perpustakaan</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">12.480 Judul · 28.9K Eksemplar</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">📗 1.240 E-Book PDF</span>
                                <span class="bg-amber2 px-2.5 py-1 rounded-full text-white">⏰ 3 Jatuh Tempo Hari Ini</span>
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">🔊 Scan Feedback Aktif</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('sirkulasi','Pinjam &amp; Kembali')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">⚡ Sirkulasi Cepat (Scan)</button>
                            <button onclick="showView('katalog','Katalog &amp; Pencarian OPAC')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Tambah Buku Baru</button>
                            <button onclick="showView('denda','Denda Otomatis')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">💳 Proses Denda</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">📚</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Koleksi</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Judul &amp; Eksemplar Buku</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">12.480 <span class="text-sm font-bold text-slate-500">judul</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">28.940 eksemplar fisik &amp; digital</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">📖</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Sirkulasi</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Buku Sedang Dipinjam</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">386 <span class="text-sm font-bold text-slate-500">eksemplar</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Oleh 264 anggota aktif</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-600">⏰</span>
                            <span class="text-[11px] font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">Overdue</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Transaksi Jatuh Tempo Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">3 <span class="text-sm font-bold text-slate-500">transaksi</span></p>
                        <p class="text-[11px] text-red-600 mt-1 font-semibold">Perlu dikembalikan / reminder</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">💰</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Oktober</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Denda Terkumpul</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">Rp 1.245.000</p>
                        <p class="text-[11px] text-slate-500 mt-1">Rp 850.000 belum dibayar</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Sirkulasi Cepat / Transaksi Kasir Perpustakaan</h2><p class="text-xs text-slate-400">Scan Barcode ID Anggota &amp; Barcode Buku — input otomatis tanpa mouse</p></div>
                                <label class="hidden sm:flex items-center gap-2 text-[11px] font-bold text-slate-500"><input id="soundToggle" type="checkbox" class="accent" checked> 🔊 Feedback Suara</label>
                            </div>
                            <div class="mt-4 grid sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Scan Barcode / ID Anggota</label>
                                    <div class="relative mt-1">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🪪</span>
                                        <input id="scanAnggota" value="AGT-10A-0027" class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30">
                                    </div>
                                    <p class="mt-1 text-[11px] text-emerald-700 font-semibold">✓ Naufal Hakim · 10-A · Anggota Aktif</p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Scan Barcode Buku</label>
                                    <div class="relative mt-1">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🏷️</span>
                                        <input id="scanBuku" value="978-602-03-4521-8" class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30">
                                    </div>
                                    <p class="mt-1 text-[11px] text-slate-500 font-semibold">Laskar Pelangi · 005.1 AND l · Tersedia 2/3</p>
                                </div>
                            </div>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <button onclick="prosesSirkulasi('pinjam')" class="flex-1 min-w-[140px] bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📥 Proses Pinjam</button>
                                <button onclick="prosesSirkulasi('kembali')" class="flex-1 min-w-[140px] bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📤 Proses Kembali</button>
                                <button onclick="document.getElementById('scanBuku').value='';document.getElementById('scanBuku').focus()" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-3 rounded-xl transition-colors">↺ Reset Scan</button>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Transaksi Peminjaman Aktif &amp; Jatuh Tempo</h2><p class="text-xs text-slate-400">Overdue warning — urut tenggat terdekat</p></div>
                                <button onclick="showView('sirkulasi','Pinjam &amp; Kembali')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[820px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr>
                                            <th class="px-4 py-3">ID</th>
                                            <th class="px-4 py-3">Peminjam</th>
                                            <th class="px-4 py-3">Judul Buku</th>
                                            <th class="px-4 py-3">Jatuh Tempo</th>
                                            <th class="px-4 py-3">Status</th>
                                            <th class="px-4 py-3 text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="aktifBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="aktifEmpty" class="hidden py-16 text-center">
                                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">✅</div>
                                <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada peminjaman aktif</p>
                                <p class="text-sm text-slate-400">Semua buku telah dikembalikan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100">
                                <h2 class="font-heading font-bold text-slate-800">Top 5 Buku Terpopuler</h2>
                                <p class="text-xs text-slate-400">Bulan ini</p>
                            </div>
                            <div id="topBooks" class="p-3 space-y-2">
                                <div class="skeleton h-14 w-full rounded-xl"></div>
                                <div class="skeleton h-14 w-full rounded-xl"></div>
                                <div class="skeleton h-14 w-full rounded-xl"></div>
                            </div>
                            <div class="px-4 pb-4">
                                <button onclick="showView('populer','Buku Terpopuler')" class="w-full text-[11px] font-bold text-navy bg-blue-50 hover:bg-blue-100 py-2 rounded-lg transition-colors">Lihat analytics lengkap</button>
                            </div>
                        </div>

                        <div class="bg-amber-50 border border-amber-200 rounded-2xl p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-amber2 text-white grid place-items-center text-lg">📲</span>
                                <div><h2 class="font-heading font-bold text-slate-800">Pengingat WA Jatuh Tempo</h2><p class="text-xs text-slate-500">Siap kirim otomatis</p></div>
                            </div>
                            <div class="mt-3 bg-white rounded-xl p-3 border border-amber-100">
                                <p class="text-xs text-slate-600"><span class="font-bold text-slate-800">12 anggota</span> bukunya jatuh tempo dalam 1 hari.</p>
                                <p class="text-[11px] text-slate-400 mt-1">Template: H-1 &amp; saat jatuh tempo</p>
                            </div>
                            <button onclick="showView('pengingat','Pengingat WA Jatuh Tempo')" class="mt-3 w-full bg-white border border-amber-300 hover:bg-amber-100 text-amber-800 text-sm font-bold py-2.5 rounded-xl transition-colors">📤 Kelola &amp; Kirim Reminder</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KATALOG OPAC ================= -->
            <section id="view-katalog" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Katalog &amp; Pencarian OPAC</h2>
                        <p class="text-xs text-slate-400">Online Public Access Catalog — cari judul, pengarang, ISBN, &amp; cek status ketersediaan.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="showToast('info','Membuka form tambah judul baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Tambah Judul Baru</button>
                        <button onclick="openBarcodeMassal()" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🏷️ Cetak Label Barcode Massal</button>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div class="relative lg:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchKatalog" oninput="renderKatalog()" placeholder="Cari Judul / Pengarang / ISBN / Call Number..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterRak" onchange="renderKatalog()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Rak</option>
                            <option>100 - Filsafat</option>
                            <option>300 - Ilmu Sosial</option>
                            <option>500 - Sains</option>
                            <option>800 - Sastra</option>
                            <option>Fiksi Remaja</option>
                        </select>
                        <select id="filterJenis" onchange="renderKatalog()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Jenis</option>
                            <option>Fisik</option>
                            <option>E-Book</option>
                        </select>
                    </div>
                </div>

                <div id="bookGrid" class="mt-4 grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4"></div>
                <div id="katalogEmpty" class="hidden py-16 text-center bg-white rounded-2xl border border-slate-100">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🔍</div>
                    <p class="mt-4 font-heading font-bold text-slate-700">Koleksi tidak ditemukan</p>
                    <p class="text-sm text-slate-400">Coba ubah kata kunci atau filter rak/jenis.</p>
                </div>
            </section>

            <!-- ================= VIEW: E-BOOK & KOLEKSI DIGITAL ================= -->
            <section id="view-ebook" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">E-Book &amp; Koleksi Digital</h2>
                        <p class="text-xs text-slate-400">Pusat baca e-book online, reader/viewer, dan unggah file PDF/EPUB.</p>
                    </div>
                    <button onclick="showToast('info','Membuka dialog unggah file PDF/EPUB...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬆️ Upload PDF / EPUB</button>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <div><h3 class="font-heading font-bold text-slate-800">Pusat Baca E-Book</h3><p class="text-xs text-slate-400">1.240 file digital · format PDF &amp; EPUB</p></div>
                            <span class="text-[11px] font-bold bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full">📱 Web Reader</span>
                        </div>
                        <div class="p-5">
                            <div class="rounded-2xl bg-slate-800 text-slate-200 p-5 grid sm:grid-cols-[140px_1fr] gap-5">
                                <div class="book-cover rounded-xl h-48 sm:h-full grid place-items-center border border-white/10">
                                    <span class="text-white font-heading font-extrabold text-center px-3 leading-tight">BUMI<br>MANUSIA</span>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[11px] font-bold text-sky2 uppercase tracking-wider">Sedang Dibaca</p>
                                    <h4 class="font-heading font-extrabold text-white text-lg mt-1">Bumi Manusia</h4>
                                    <p class="text-xs text-slate-400">Pramoedya Ananta Toer · 1980 · 535 hal</p>
                                    <div class="mt-3">
                                        <div class="flex items-center justify-between text-[11px] text-slate-400"><span>Progres baca</span><span>42%</span></div>
                                        <div class="mt-1 h-2 rounded-full bg-white/10 overflow-hidden"><div class="h-full w-[42%] bg-sky2"></div></div>
                                    </div>
                                    <div class="mt-4 flex flex-wrap gap-2">
                                        <button onclick="showToast('success','Melanjutkan membaca halaman 224...')" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded-lg transition-colors">▶️ Lanjut Baca</button>
                                        <button onclick="showToast('info','Menyimpan ke daftar baca saya')" class="bg-white/10 hover:bg-white/20 text-white text-xs font-bold px-4 py-2 rounded-lg transition-colors">🔖 Simpan</button>
                                        <button onclick="showToast('success','Progres baca tersimpan otomatis')" class="bg-white/10 hover:bg-white/20 text-white text-xs font-bold px-4 py-2 rounded-lg transition-colors">⬇️ Unduh Offline</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 flex items-center gap-2 text-[11px] text-slate-400">
                                <span>🔎 Zoom 100%</span><span>·</span><span>Tema Terang</span><span>·</span><span>DRM Terlindungi</span><span class="ml-auto">Halaman 224 / 535</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">E-Book Terbaru</h3><p class="text-xs text-slate-400">Koleksi digital terkini</p></div>
                        <div id="ebookList" class="p-3 space-y-2">
                            <div class="skeleton h-16 w-full rounded-xl"></div>
                            <div class="skeleton h-16 w-full rounded-xl"></div>
                            <div class="skeleton h-16 w-full rounded-xl"></div>
                            <div class="skeleton h-16 w-full rounded-xl"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: BARCODE / RFID ================= -->
            <section id="view-barcode" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Barcode / RFID Buku</h2>
                    <p class="text-xs text-slate-400">Generator barcode ISBN/Call Number, cetak label punggung buku massal, &amp; pemindai QR/Barcode.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Generator Barcode</h3>
                        <div class="mt-4 space-y-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">ISBN / Barcode Buku</label>
                                <input id="genIsbn" value="978-602-03-4521-8" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nomor Panggil (Call Number)</label>
                                <input id="genCall" value="005.1 AND l" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Jenis Kode</label>
                                <select class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option>Barcode (Code 128)</option>
                                    <option>QR Code</option>
                                    <option>RFID Tag</option>
                                </select>
                            </div>
                            <button onclick="openBarcodePreview(document.getElementById('genIsbn').value, document.getElementById('genCall').value)" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">🏷️ Generate &amp; Pratinjau Label</button>
                        </div>
                        <div class="mt-4 pt-4 border-t border-slate-100">
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pemindai QR / Barcode</p>
                            <div class="mt-2 flex items-center gap-2 rounded-xl border-2 border-dashed border-slate-200 px-3 py-3">
                                <span class="text-lg">📷</span>
                                <p class="text-xs text-slate-400">Arahkan scanner ke barcode buku untuk menambah koleksi otomatis.</p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <div><h3 class="font-heading font-bold text-slate-800">Label Punggung Buku Massal</h3><p class="text-xs text-slate-400">Pilih koleksi lalu cetak sekaligus dalam satu lembar</p></div>
                            <button onclick="openBarcodeMassal()" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-xs font-bold px-3 py-2 rounded-lg transition-colors">🖨️ Cetak Massal</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[620px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3"><input type="checkbox" class="accent" checked></th>
                                        <th class="px-4 py-3">Judul</th>
                                        <th class="px-4 py-3">Call Number</th>
                                        <th class="px-4 py-3">ISBN</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="labelBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: DATA ANGGOTA ================= -->
            <section id="view-anggota" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Data Anggota Perpustakaan</h2>
                        <p class="text-xs text-slate-400">Database anggota: Siswa, Guru, &amp; Staf — serta cetak kartu anggota digital.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form pendaftaran anggota baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Anggota Baru</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Anggota</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">1.284</p>
                        <p class="text-[11px] text-slate-500 mt-1">Siswa · Guru · Staf</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Anggota Aktif</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">1.120</p>
                        <p class="text-[11px] text-slate-500 mt-1">Kartu valid</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Punya Pinjaman</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">264</p>
                        <p class="text-[11px] text-slate-500 mt-1">Sedang meminjam</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Kartu Dicetak</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">980</p>
                        <p class="text-[11px] text-slate-500 mt-1">Kartu digital aktif</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <div class="relative flex-1">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchAnggota" oninput="renderAnggota()" placeholder="Cari nama / NIS / NIP anggota..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterTipeAnggota" onchange="renderAnggota()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Tipe</option>
                            <option>Siswa</option>
                            <option>Guru</option>
                            <option>Staf</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[820px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">ID Anggota</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Tipe</th>
                                    <th class="px-4 py-3">Kelas / Unit</th>
                                    <th class="px-4 py-3 text-center">Pinjaman Aktif</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="anggotaBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="anggotaEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">👤</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Anggota tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter tipe anggota.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: SIRKULASI ================= -->
            <section id="view-sirkulasi" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Sirkulasi &amp; Denda</h2>
                        <p class="text-xs text-slate-400">Manajemen peminjaman, pengembalian, perpanjangan, dan denda otomatis.</p>
                    </div>
                    <button onclick="showToast('info','Buka mode Sirkulasi Cepat (Scan) di Dashboard')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⚡ Mode Scan Cepat</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-3 gap-3">
                        <div class="relative sm:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchSirkulasi" oninput="renderSirkulasi()" placeholder="Cari nama siswa / judul buku / ID transaksi..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterStatusSirkulasi" onchange="renderSirkulasi()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Status</option>
                            <option>Dipinjam</option>
                            <option>Kembali</option>
                            <option>Terlambat</option>
                            <option>Hilang</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1080px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">ID Transaksi</th>
                                    <th class="px-4 py-3">Peminjam</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Judul Buku &amp; Barcode</th>
                                    <th class="px-4 py-3">Tgl Pinjam</th>
                                    <th class="px-4 py-3">Jatuh Tempo</th>
                                    <th class="px-4 py-3">Terlambat</th>
                                    <th class="px-4 py-3 text-right">Denda</th>
                                    <th class="px-4 py-3">Bayar</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="sirkulasiBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="sirkulasiEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Transaksi tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: RESERVASI ================= -->
            <section id="view-reservasi" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Reservasi Buku</h2>
                        <p class="text-xs text-slate-400">Manajemen booking / antrean peminjaman buku online dari siswa &amp; guru.</p>
                    </div>
                    <button onclick="showToast('info','Menampilkan form reservasi manual...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Reservasi Baru</button>
                </div>

                <div class="mt-4 grid sm:grid-cols-3 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Antrean Menunggu</p>
                        <p id="reservasiAntre" class="font-heading font-extrabold text-2xl text-blue-700 mt-1">0</p>
                        <p class="text-[11px] text-slate-500 mt-1">Belum tersedia</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Siap Diambil</p>
                        <p id="reservasiSiap" class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">0</p>
                        <p class="text-[11px] text-slate-500 mt-1">Buku telah tersedia</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Kadaluarsa</p>
                        <p id="reservasiExpired" class="font-heading font-extrabold text-2xl text-red-600 mt-1">0</p>
                        <p class="text-[11px] text-slate-500 mt-1">Lewat batas 2×24 jam</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Daftar Reservasi &amp; Antrean</h3></div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[820px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Kode</th>
                                    <th class="px-4 py-3">Pemesan</th>
                                    <th class="px-4 py-3">Judul Buku</th>
                                    <th class="px-4 py-3">Antrean</th>
                                    <th class="px-4 py-3">Tgl Reservasi</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="reservasiBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: DENDA OTOMATIS ================= -->
            <section id="view-denda" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Denda Otomatis</h2>
                        <p class="text-xs text-slate-400">Kalkulasi otomatis keterlambatan, tarif denda per hari, &amp; status pembayaran.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <div class="flex items-center gap-2 bg-white border border-slate-200 rounded-xl px-3 py-2">
                            <span class="text-[11px] font-bold text-slate-500 uppercase">Tarif / hari</span>
                            <span class="font-heading font-extrabold text-slate-900">Rp 1.000</span>
                        </div>
                        <button onclick="showToast('success','Rekap denda bulan ini tersimpan')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">💳 Proses Pembayaran</button>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Denda Berjalan</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 850.000</p>
                        <p class="text-[11px] text-red-600 mt-1 font-semibold">Belum dibayar</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Sudah Dibayar</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">Rp 1.245.000</p>
                        <p class="text-[11px] text-slate-500 mt-1">Bulan ini</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Transaksi Terlambat</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">18</p>
                        <p class="text-[11px] text-slate-500 mt-1">Aktif berjalan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Rata-rata Hari Telat</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">4,2 <span class="text-sm font-bold text-slate-500">hari</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Per transaksi tertunda</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Rincian Denda per Transaksi</h3>
                        <span class="text-[11px] font-bold bg-red-50 text-red-700 px-2.5 py-1 rounded-full">Auto-calculate</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[900px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">ID</th>
                                    <th class="px-4 py-3">Peminjam</th>
                                    <th class="px-4 py-3">Buku</th>
                                    <th class="px-4 py-3 text-center">Terlambat</th>
                                    <th class="px-4 py-3 text-right">Denda</th>
                                    <th class="px-4 py-3">Status Bayar</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="dendaBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PENGINGAT WA ================= -->
            <section id="view-pengingat" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Pengingat WA Jatuh Tempo</h2>
                        <p class="text-xs text-slate-400">Broadcast otomatis pengingat pengembalian buku via WhatsApp H-1 &amp; saat jatuh tempo.</p>
                    </div>
                    <button onclick="openConfirm('Kirim Pengingat WA','Kirim reminder ke 12 anggota yang akan/sedang jatuh tempo?',()=>showToast('success','12 pengingat WA berhasil dikirim'),false)" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📤 Kirim Semua Pengingat</button>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">Daftar Pengingat Siap Kirim</h3>
                            <select class="bg-slate-100 rounded-lg px-2.5 py-1.5 text-xs outline-none text-slate-700"><option>Jadwal: H-1</option><option>Saat Jatuh Tempo</option><option>Terlambat (H+1)</option></select>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[640px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3"><input type="checkbox" class="accent" checked></th>
                                        <th class="px-4 py-3">Nama &amp; No. WA</th>
                                        <th class="px-4 py-3">Buku</th>
                                        <th class="px-4 py-3">Jatuh Tempo</th>
                                        <th class="px-4 py-3 text-right">Kirim</th>
                                    </tr>
                                </thead>
                                <tbody id="waBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Template Pesan WA</h3>
                        <div class="mt-3 rounded-xl bg-emerald-50 border border-emerald-100 p-4 text-xs text-slate-700 leading-relaxed">
                            <p class="font-bold text-emerald-800">📚 E-Library SMAN 1 Nusantara</p>
                            <p class="mt-2">Halo <span class="font-semibold">[Nama]</span>, buku <span class="font-semibold">"[Judul]"</span> yang Anda pinjam akan jatuh tempo pada <span class="font-semibold">[Tanggal]</span>. Mohon dikembalikan tepat waktu untuk menghindari denda Rp 1.000/hari.</p>
                            <p class="mt-2">Terima kasih 🙏</p>
                        </div>
                        <button onclick="showToast('info','Mengubah template pesan pengingat')" class="mt-3 w-full bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold py-2.5 rounded-xl transition-colors">✏️ Edit Template</button>
                        <div class="mt-4 pt-4 border-t border-slate-100 space-y-2 text-xs">
                            <div class="flex justify-between"><span class="text-slate-500">Terkirim bulan ini</span><span class="font-bold text-slate-800">128 pesan</span></div>
                            <div class="flex justify-between"><span class="text-slate-500">Tingkat pengembalian</span><span class="font-bold text-emerald-700">92%</span></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: STATISTIK KUNJUNGAN ================= -->
            <section id="view-kunjungan" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Statistik Kunjungan</h2>
                    <p class="text-xs text-slate-400">Laporan kunjungan harian/bulanan per kelas, pengunjung teraktif, &amp; jam sibuk.</p>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Kunjungan Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">186</p>
                        <p class="text-[11px] text-emerald-700 mt-1 font-semibold">↑ 12% vs kemarin</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">3.842</p>
                        <p class="text-[11px] text-slate-500 mt-1">Rata-rata 158/hari</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Kelas Teraktif</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">10-A</p>
                        <p class="text-[11px] text-slate-500 mt-1">420 kunjungan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Jam Sibuk</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">09–10</p>
                        <p class="text-[11px] text-slate-500 mt-1">Istirahat pertama</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Kunjungan 7 Hari Terakhir</h3>
                        <div id="chartKunjungan" class="mt-6 flex items-end justify-between gap-2 h-48"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Kunjungan Per Kelas</h3></div>
                        <div id="kelasList" class="p-3 space-y-2 max-h-[300px] overflow-y-auto no-scrollbar">
                            <div class="skeleton h-9 w-full rounded-lg"></div>
                            <div class="skeleton h-9 w-full rounded-lg"></div>
                            <div class="skeleton h-9 w-full rounded-lg"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: BUKU TERPOPULER ================= -->
            <section id="view-populer" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Buku Terpopuler</h2>
                    <p class="text-xs text-slate-400">Analytics koleksi paling sering dipinjam, top kategori, &amp; rekomendasi pengadaan buku baru.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">Top 10 Buku Paling Dipinjam</h3>
                            <select class="bg-slate-100 rounded-lg px-2.5 py-1.5 text-xs outline-none text-slate-700"><option>Bulan Ini</option><option>3 Bulan</option><option>Tahun Ini</option></select>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[620px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3 w-12">#</th>
                                        <th class="px-4 py-3">Judul &amp; Pengarang</th>
                                        <th class="px-4 py-3">Kategori</th>
                                        <th class="px-4 py-3 text-right">Dipinjam</th>
                                    </tr>
                                </thead>
                                <tbody id="populerBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h3 class="font-heading font-bold text-slate-800">Top Kategori</h3>
                            <div id="kategoriBars" class="mt-4 space-y-3"></div>
                        </div>
                        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-5">
                            <div class="flex items-center gap-2">
                                <span class="w-9 h-9 rounded-xl bg-navy text-white grid place-items-center">💡</span>
                                <h3 class="font-heading font-bold text-slate-800">Rekomendasi Pengadaan</h3>
                            </div>
                            <ul id="rekomendasiList" class="mt-3 space-y-2 text-xs text-slate-700"></ul>
                            <button onclick="showToast('success','Daftar rekomendasi pengadaan tersimpan')" class="mt-3 w-full bg-white border border-blue-300 hover:bg-blue-100 text-blue-800 text-sm font-bold py-2.5 rounded-xl transition-colors">📋 Simpan Rekomendasi</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">📖</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal E-Library. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Katalog OPAC</span>, <span class="font-semibold text-slate-600">E-Book</span>, <span class="font-semibold text-slate-600">Barcode &amp; RFID</span>, <span class="font-semibold text-slate-600">Data Anggota</span>, <span class="font-semibold text-slate-600">Sirkulasi &amp; Denda</span>, <span class="font-semibold text-slate-600">Reservasi</span>, serta <span class="font-semibold text-slate-600">Statistik &amp; Buku Terpopuler</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard E-Library')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('katalog','Katalog &amp; Pencarian OPAC')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Katalog OPAC</button>
                        <button onclick="showView('sirkulasi','Pinjam &amp; Kembali')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Sirkulasi</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="border-t border-slate-200 bg-white px-4 sm:px-6 py-5 text-center">
            <p class="text-xs text-slate-400">© 2026 PT Artificial Intelligence Learning Madani Digital · E-Library (Simulasi)</p>
        </footer>
    </div>

    <!-- ============ MODAL: LABEL BARCODE ============ -->
    <div id="barcodeModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeBarcodePreview()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md max-h-[90vh] overflow-y-auto">
            <div class="flex items-start justify-between p-5 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <span class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-700 grid place-items-center text-xl">🏷️</span>
                    <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Label Punggung Buku</h3><p class="text-xs text-slate-400">Pratinjau stiker barcode &amp; Call Number</p></div>
                </div>
                <button onclick="closeBarcodePreview()" class="text-slate-400 hover:text-slate-700 text-xl leading-none">✕</button>
            </div>
            <div class="p-5">
                <div class="border-2 border-slate-300 rounded-xl p-4">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-300">
                        <div class="w-8 h-8 rounded-full hero-gradient grid place-items-center text-white font-heading font-extrabold text-[10px]">S+</div>
                        <div class="leading-tight">
                            <p class="font-heading font-bold text-slate-800 text-[10px]">PERPUSTAKAAN</p>
                            <p class="text-[9px] text-slate-500">SMAN 1 Nusantara</p>
                        </div>
                        <span class="ml-auto font-heading font-extrabold text-slate-900 text-lg" id="lblCall">005.1 AND l</span>
                    </div>
                    <div id="lblBars" class="barcode-bars h-16 mt-3 rounded"></div>
                    <p id="lblIsbn" class="text-center font-mono text-sm font-bold text-slate-800 mt-2 tracking-widest">978-602-03-4521-8</p>
                    <p class="text-center text-[9px] text-slate-400 mt-0.5">E-Library SIAKAD PLUS · Code 128</p>
                </div>
                <p class="mt-3 text-[11px] text-slate-400">Cetak pada kertas stiker label 3,5 × 5 cm dan tempel pada punggung buku.</p>
            </div>
            <div class="px-5 pb-5 flex gap-2">
                <button onclick="showToast('info','Mengirim ke printer label...')" class="flex-1 bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Printer Label</button>
                <button onclick="showToast('success','Label barcode dicetak sebagai PDF')" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇️ Cetak PDF</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: CETAK LABEL MASSAL ============ -->
    <div id="massalModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeBarcodeMassal()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="flex items-start justify-between p-5 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <span class="w-11 h-11 rounded-2xl bg-emerald-100 text-emerald-700 grid place-items-center text-xl">🖨️</span>
                    <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Cetak Label Barcode Massal</h3><p class="text-xs text-slate-400">Satu lembar berisi label punggung buku terpilih</p></div>
                </div>
                <button onclick="closeBarcodeMassal()" class="text-slate-400 hover:text-slate-700 text-xl leading-none">✕</button>
            </div>
            <div class="p-5">
                <div id="massalGrid" class="grid grid-cols-2 sm:grid-cols-2 gap-3"></div>
            </div>
            <div class="px-5 pb-5 flex gap-2">
                <button onclick="closeBarcodeMassal()" class="flex-1 bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">Batal</button>
                <button onclick="showToast('success','6 label dicetak sebagai satu lembar PDF')" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇️ Cetak Semua (PDF)</button>
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

        // ---------- Sound feedback ----------
        function playBeep() {
            const on = document.getElementById('soundToggle');
            if (on && !on.checked) return;
            try {
                const ctx = new (window.AudioContext || window.webkitAudioContext)();
                const o = ctx.createOscillator(), g = ctx.createGain();
                o.connect(g); g.connect(ctx.destination);
                o.type = 'sine'; o.frequency.value = 1180;
                g.gain.setValueAtTime(0.12, ctx.currentTime);
                g.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.18);
                o.start(); o.stop(ctx.currentTime + 0.18);
            } catch (e) {}
        }

        const colors = ['from-sky-500 to-blue-700', 'from-emerald-500 to-teal-700', 'from-amber-500 to-orange-600', 'from-violet-500 to-purple-700', 'from-rose-500 to-pink-700', 'from-cyan-500 to-sky-700', 'from-indigo-500 to-blue-800', 'from-teal-500 to-emerald-700'];

        // ---------- Badges ----------
        const jenisBadge = { 'Fisik': 'bg-emerald-100 text-emerald-800', 'E-Book': 'bg-blue-100 text-blue-800' };
        const sirkulasiBadge = { 'Dipinjam': 'bg-amber-100 text-amber-800', 'Kembali': 'bg-emerald-100 text-emerald-800', 'Terlambat': 'bg-red-100 text-red-800', 'Hilang': 'bg-slate-200 text-slate-700' };
        const bayarBadge = { 'Lunas': 'bg-emerald-100 text-emerald-800', 'Belum': 'bg-red-100 text-red-800', '-': 'bg-slate-100 text-slate-500' };
        const reservasiBadge = { 'Menunggu': 'bg-blue-100 text-blue-800', 'Siap Diambil': 'bg-emerald-100 text-emerald-800', 'Kadaluarsa': 'bg-red-100 text-red-800' };
        const anggotaBadge = { 'Aktif': 'bg-emerald-100 text-emerald-800', 'Dibekukan': 'bg-red-100 text-red-800', 'Nonaktif': 'bg-slate-200 text-slate-600' };

        // ---------- View switching ----------
        const views = document.querySelectorAll('.view');
        function showView(name, title) {
            views.forEach(v => v.classList.remove('active'));
            const el = document.getElementById('view-' + name);
            if (el) el.classList.add('active');
            if (title) document.getElementById('pageTitle').textContent = title.replace(/&amp;/g, '&');
            document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
            const active = document.querySelector('.menu-item[data-view="' + name + '"]');
            if (active) active.classList.add('active');

            if (name === 'dashboard') { loadAktif(); loadTopBooks(); }
            if (name === 'katalog') loadKatalog();
            if (name === 'ebook') loadEbook();
            if (name === 'barcode') loadLabel();
            if (name === 'anggota') loadAnggota();
            if (name === 'sirkulasi') loadSirkulasi();
            if (name === 'reservasi') loadReservasi();
            if (name === 'denda') loadDenda();
            if (name === 'pengingat') loadWA();
            if (name === 'kunjungan') loadKunjungan();
            if (name === 'populer') loadPopuler();

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
        function opacSearch(val) {
            document.getElementById('searchKatalog').value = val || '';
            showView('katalog', 'Katalog & Pencarian OPAC');
            renderKatalog();
        }

        // ---------- MASTER DATA ----------
        const bukuData = [
            { judul: 'Laskar Pelangi', pengarang: 'Andrea Hirata', isbn: '978-602-03-4521-8', call: '005.1 AND l', kata: 'Fiksi Remaja', rak: 'Fiksi Remaja', jenis: 'Fisik', tersedia: 2, total: 3 },
            { judul: 'Bumi Manusia', pengarang: 'Pramoedya Ananta Toer', isbn: '978-979-97312-3-6', call: '800 TOE b', kata: 'Sastra', rak: '800 - Sastra', jenis: 'E-Book', tersedia: 1, total: 2 },
            { judul: 'Sapiens', pengarang: 'Yuval Noah Harari', isbn: '978-602-04-1234-5', call: '900 HAR s', kata: 'Ilmu Sosial', rak: '300 - Ilmu Sosial', jenis: 'E-Book', tersedia: 3, total: 3 },
            { judul: 'Negeri 5 Menara', pengarang: 'Ahmad Fuadi', isbn: '978-979-22-4867-8', call: '800 FUA n', kata: 'Fiksi Remaja', rak: 'Fiksi Remaja', jenis: 'Fisik', tersedia: 0, total: 2 },
            { judul: 'Fisika Dasar', pengarang: 'David Halliday', isbn: '978-979-033-123-4', call: '530 HAL f', kata: 'Sains', rak: '500 - Sains', jenis: 'Fisik', tersedia: 4, total: 5 },
            { judul: 'Filosofi Teras', pengarang: 'Henry Manampiring', isbn: '978-602-06-2356-7', call: '100 MAN f', kata: 'Filsafat', rak: '100 - Filsafat', jenis: 'E-Book', tersedia: 2, total: 2 },
            { judul: 'Matematika Kelas X', pengarang: 'Kemendikbud', isbn: '978-602-427-111-1', call: '510 KEM m', kata: 'Sains', rak: '500 - Sains', jenis: 'Fisik', tersedia: 6, total: 8 },
            { judul: 'Atomic Habits', pengarang: 'James Clear', isbn: '978-602-063-456-3', call: '150 CLE a', kata: 'Pengembangan Diri', rak: '300 - Ilmu Sosial', jenis: 'E-Book', tersedia: 1, total: 1 }
        ];
        const aktifData = [
            { id: 'TRX-2026-0451', nama: 'Naufal Hakim', kelas: '10-A', buku: 'Laskar Pelangi', jatuh: '10 Okt 2026', telat: 7 },
            { id: 'TRX-2026-0453', nama: 'Fajar Ramadhan', kelas: '8-B', buku: 'Negeri 5 Menara', jatuh: '08 Okt 2026', telat: 9 },
            { id: 'TRX-2026-0457', nama: 'Gita Puspita', kelas: '11-C', buku: 'Matematika Kelas X', jatuh: '17 Okt 2026', telat: 0 },
            { id: 'TRX-2026-0454', nama: 'Dimas Anggara', kelas: '12-D', buku: 'Fisika Dasar', jatuh: '19 Okt 2026', telat: 0 },
            { id: 'TRX-2026-0455', nama: 'Keira Faza', kelas: '10-A', buku: 'Atomic Habits', jatuh: '21 Okt 2026', telat: 0 }
        ];
        const topBooksData = [
            { judul: 'Laskar Pelangi', pengarang: 'Andrea Hirata', n: 42 },
            { judul: 'Bumi Manusia', pengarang: 'Pramoedya A. Toer', n: 38 },
            { judul: 'Atomic Habits', pengarang: 'James Clear', n: 35 },
            { judul: 'Negeri 5 Menara', pengarang: 'Ahmad Fuadi', n: 30 },
            { judul: 'Sapiens', pengarang: 'Yuval N. Harari', n: 27 }
        ];
        const sirkulasiData = [
            { id: 'TRX-2026-0451', nama: 'Naufal Hakim', tipe: 'Siswa', kelas: '10-A', judul: 'Laskar Pelangi', barcode: '978-602-03-4521-8', pinjam: '03 Okt 2026', jatuh: '10 Okt 2026', telat: 7, denda: 7000, bayar: 'Belum', status: 'Terlambat' },
            { id: 'TRX-2026-0452', nama: 'Aisyah Putri', tipe: 'Siswa', kelas: '8-B', judul: 'Bumi Manusia', barcode: '978-979-97312-3-6', pinjam: '05 Okt 2026', jatuh: '12 Okt 2026', telat: 5, denda: 5000, bayar: 'Lunas', status: 'Kembali' },
            { id: 'TRX-2026-0453', nama: 'Fajar Ramadhan', tipe: 'Siswa', kelas: '8-B', judul: 'Negeri 5 Menara', barcode: '978-979-22-4867-8', pinjam: '01 Okt 2026', jatuh: '08 Okt 2026', telat: 9, denda: 9000, bayar: 'Belum', status: 'Terlambat' },
            { id: 'TRX-2026-0454', nama: 'Dimas Anggara', tipe: 'Siswa', kelas: '12-D', judul: 'Fisika Dasar', barcode: '978-979-033-123-4', pinjam: '12 Okt 2026', jatuh: '19 Okt 2026', telat: 0, denda: 0, bayar: '-', status: 'Dipinjam' },
            { id: 'TRX-2026-0455', nama: 'Keira Faza', tipe: 'Siswa', kelas: '10-A', judul: 'Atomic Habits', barcode: '978-602-063-456-3', pinjam: '14 Okt 2026', jatuh: '21 Okt 2026', telat: 0, denda: 0, bayar: '-', status: 'Dipinjam' },
            { id: 'TRX-2026-0456', nama: 'Bagas Pratama', tipe: 'Siswa', kelas: '10-B', judul: 'Sapiens', barcode: '978-602-04-1234-5', pinjam: '25 Sep 2026', jatuh: '02 Okt 2026', telat: 15, denda: 15000, bayar: 'Belum', status: 'Terlambat' },
            { id: 'TRX-2026-0457', nama: 'Gita Puspita', tipe: 'Siswa', kelas: '11-C', judul: 'Matematika Kelas X', barcode: '978-602-427-111-1', pinjam: '10 Okt 2026', jatuh: '17 Okt 2026', telat: 0, denda: 0, bayar: 'Belum', status: 'Dipinjam' },
            { id: 'TRX-2026-0458', nama: 'Rizky Ananda', tipe: 'Siswa', kelas: '9-C', judul: 'Filosofi Teras', barcode: '978-602-06-2356-7', pinjam: '28 Sep 2026', jatuh: '05 Okt 2026', telat: 12, denda: 12000, bayar: 'Lunas', status: 'Kembali' },
            { id: 'TRX-2026-0459', nama: 'Salsa Nabila', tipe: 'Siswa', kelas: '7-A', judul: 'Bumi Manusia', barcode: '978-979-97312-3-6', pinjam: '15 Okt 2026', jatuh: '22 Okt 2026', telat: 0, denda: 0, bayar: '-', status: 'Dipinjam' },
            { id: 'TRX-2026-0460', nama: 'Rizky Ananda', tipe: 'Siswa', kelas: '9-C', judul: 'Fisika Dasar', barcode: '978-979-033-123-4', pinjam: '20 Sep 2026', jatuh: '27 Sep 2026', telat: 0, denda: 35000, bayar: 'Belum', status: 'Hilang' }
        ];
        const anggotaData = [
            { id: 'AGT-10A-0027', nama: 'Naufal Hakim', tipe: 'Siswa', unit: '10-A', aktif: 2, status: 'Aktif' },
            { id: 'AGT-8B-0114', nama: 'Aisyah Putri', tipe: 'Siswa', unit: '8-B', aktif: 1, status: 'Aktif' },
            { id: 'AGT-8B-0115', nama: 'Fajar Ramadhan', tipe: 'Siswa', unit: '8-B', aktif: 3, status: 'Aktif' },
            { id: 'AGT-10A-0028', nama: 'Keira Faza Aishanaya', tipe: 'Siswa', unit: '10-A', aktif: 1, status: 'Aktif' },
            { id: 'AGT-12D-0003', nama: 'Dimas Anggara', tipe: 'Siswa', unit: '12-D', aktif: 0, status: 'Aktif' },
            { id: 'AGT-9C-0501', nama: 'Rizky Ananda', tipe: 'Siswa', unit: '9-C', aktif: 1, status: 'Dibekukan' },
            { id: 'GUR-0021', nama: 'Bpk. Andri Susanto', tipe: 'Guru', unit: 'Matematika', aktif: 1, status: 'Aktif' },
            { id: 'GUR-0034', nama: 'Ibu Rina Kartika', tipe: 'Guru', unit: 'Kimia', aktif: 0, status: 'Aktif' },
            { id: 'STF-0008', nama: 'Bpk. Wahyu Hidayat', tipe: 'Staf', unit: 'Tata Usaha', aktif: 0, status: 'Aktif' }
        ];
        const reservasiData = [
            { kode: 'RSV-0091', nama: 'Naufal Hakim', buku: 'Bumi Manusia', antre: 1, tgl: '15 Okt 2026', status: 'Menunggu' },
            { kode: 'RSV-0092', nama: 'Aisyah Putri', buku: 'Negeri 5 Menara', antre: 2, tgl: '15 Okt 2026', status: 'Menunggu' },
            { kode: 'RSV-0093', nama: 'Fajar Ramadhan', buku: 'Atomic Habits', antre: 1, tgl: '14 Okt 2026', status: 'Siap Diambil' },
            { kode: 'RSV-0094', nama: 'Gita Puspita', buku: 'Laskar Pelangi', antre: 3, tgl: '13 Okt 2026', status: 'Siap Diambil' },
            { kode: 'RSV-0095', nama: 'Dimas Anggara', buku: 'Sapiens', antre: 1, tgl: '10 Okt 2026', status: 'Kadaluarsa' }
        ];
        const waData = [
            { nama: 'Naufal Hakim', wa: '6281227700781', buku: 'Laskar Pelangi', jatuh: '10 Okt 2026' },
            { nama: 'Fajar Ramadhan', wa: '6281234507804', buku: 'Negeri 5 Menara', jatuh: '08 Okt 2026' },
            { nama: 'Gita Puspita', wa: '6281234507806', buku: 'Matematika Kelas X', jatuh: '17 Okt 2026' },
            { nama: 'Aisyah Putri', wa: '6281234507802', buku: 'Bumi Manusia', jatuh: '12 Okt 2026' },
            { nama: 'Keira Faza', wa: '6281234507807', buku: 'Atomic Habits', jatuh: '21 Okt 2026' },
            { nama: 'Bagas Pratama', wa: '6281234507809', buku: 'Sapiens', jatuh: '02 Okt 2026' }
        ];
        const kunjunganHari = [{ h: 'Sen', n: 150 }, { h: 'Sel', n: 168 }, { h: 'Rab', n: 142 }, { h: 'Kam', n: 176 }, { h: 'Jum', n: 130 }, { h: 'Sab', n: 90 }, { h: 'Sen', n: 186 }];
        const kelasKunjungan = [['10-A', 420], ['8-B', 388], ['12-D', 352], ['10-B', 340], ['11-C', 315], ['9-C', 298], ['7-A', 276], ['8-A', 240]];
        const populerData = [
            ['Laskar Pelangi', 'Andrea Hirata', 'Fiksi Remaja', 42],
            ['Bumi Manusia', 'Pramoedya Ananta Toer', 'Sastra', 38],
            ['Atomic Habits', 'James Clear', 'Pengembangan Diri', 35],
            ['Negeri 5 Menara', 'Ahmad Fuadi', 'Fiksi Remaja', 30],
            ['Sapiens', 'Yuval Noah Harari', 'Ilmu Sosial', 27],
            ['Filosofi Teras', 'Henry Manampiring', 'Filsafat', 24],
            ['Fisika Dasar', 'David Halliday', 'Sains', 21],
            ['Matematika Kelas X', 'Kemendikbud', 'Sains', 18],
            ['Habis Gelap Terbitlah Terang', 'R.A. Kartini', 'Sastra', 15],
            ['Perahu Kertas', 'Dee Lestari', 'Fiksi Remaja', 13]
        ];
        const kategoriData = [['Fiksi Remaja', 32], ['Sastra', 24], ['Sains', 18], ['Ilmu Sosial', 14], ['Pengembangan Diri', 12]];
        const rekomendasiData = [
            'Tambah 5 eksemplar "Negeri 5 Menara" — rasio tunggu reservasi tinggi (2 antrean).',
            'Perbanyak e-book kategori Sains — permintaan naik 24% bulan ini.',
            'Tambah judul Fiksi Remaja baru — koleksi sering habis dipinjam.'
        ];

        // ---------- DASHBOARD ----------
        function loadAktif() {
            const body = document.getElementById('aktifBody');
            const list = aktifData.slice().sort((a, b) => b.telat - a.telat);
            setTimeout(() => {
                body.innerHTML = list.map(a => {
                    const badge = a.telat > 0 ? 'bg-red-100 text-red-800' : (a.telat === 0 ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800');
                    const label = a.telat > 0 ? 'Terlambat ' + a.telat + ' hari' : 'Aktif';
                    return '<tr class="hover:bg-slate-50/70">'
                        + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + a.id + '</td>'
                        + '<td class="px-4 py-3"><span class="font-semibold text-slate-700">' + a.nama + '</span><span class="block text-[11px] text-slate-400">' + a.kelas + '</span></td>'
                        + '<td class="px-4 py-3 text-slate-500">' + a.buku + '</td>'
                        + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + a.jatuh + '</td>'
                        + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + badge + ' px-2.5 py-1 rounded-full">' + label + '</span></td>'
                        + '<td class="px-4 py-3 text-right whitespace-nowrap"><button onclick="kirimRemind(\'' + a.nama + '\')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg">📲 Remind</button></td>'
                        + '</tr>';
                }).join('');
            }, 650);
        }
        function loadTopBooks() {
            const wrap = document.getElementById('topBooks');
            setTimeout(() => {
                wrap.innerHTML = topBooksData.map((b, i) =>
                    '<button onclick="showView(\'populer\',\'Buku Terpopuler\')" class="w-full flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 text-left transition-colors">'
                    + '<span class="w-8 h-10 rounded-md bg-gradient-to-br ' + colors[i % colors.length] + ' grid place-items-center text-white font-heading font-bold text-xs flex-shrink-0">' + (i + 1) + '</span>'
                    + '<span class="min-w-0 flex-1"><span class="block text-sm font-semibold text-slate-700 truncate">' + b.judul + '</span><span class="block text-[11px] text-slate-400 truncate">' + b.pengarang + '</span></span>'
                    + '<span class="text-xs font-bold text-slate-600 whitespace-nowrap">' + b.n + '×</span>'
                    + '</button>'
                ).join('');
            }, 650);
        }
        function kirimRemind(nama) { playBeep(); showToast('success', 'Reminder WA terkirim ke ' + nama); }

        // ---------- KATALOG ----------
        let katalogLoaded = false;
        function loadKatalog() {
            if (katalogLoaded) { renderKatalog(); return; }
            const grid = document.getElementById('bookGrid');
            grid.innerHTML = '<div class="skeleton h-64 rounded-2xl"></div>'.repeat(4);
            setTimeout(() => { katalogLoaded = true; renderKatalog(); }, 700);
        }
        function renderKatalog() {
            const grid = document.getElementById('bookGrid');
            const q = (document.getElementById('searchKatalog').value || '').toLowerCase().trim();
            const rak = document.getElementById('filterRak').value;
            const jenis = document.getElementById('filterJenis').value;
            const list = bukuData.filter(b => {
                const t = (b.judul + ' ' + b.pengarang + ' ' + b.isbn + ' ' + b.call).toLowerCase();
                if (q && t.indexOf(q) === -1) return false;
                if (rak && b.rak !== rak) return false;
                if (jenis && b.jenis !== jenis) return false;
                return true;
            });
            document.getElementById('katalogEmpty').classList.toggle('hidden', list.length > 0);
            grid.innerHTML = list.map(b => {
                const i = bukuData.indexOf(b);
                const stokBadge = b.tersedia > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800';
                const stokLabel = b.tersedia > 0 ? 'Tersedia ' + b.tersedia + '/' + b.total : 'Stok Habis';
                return '<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col">'
                    + '<div class="h-40 bg-gradient-to-br ' + colors[i % colors.length] + ' relative p-3 flex flex-col justify-between">'
                    + '<span class="self-start text-[10px] font-bold ' + jenisBadge[b.jenis] + ' px-2 py-0.5 rounded-full">' + (b.jenis === 'E-Book' ? '📱 E-Book' : '📗 Fisik') + '</span>'
                    + '<span class="text-white font-heading font-extrabold leading-tight text-sm drop-shadow">' + b.judul + '</span>'
                    + '</div>'
                    + '<div class="p-3 flex-1 flex flex-col">'
                    + '<p class="text-xs text-slate-500">' + b.pengarang + '</p>'
                    + '<p class="text-[11px] text-slate-400 mt-1">ISBN ' + b.isbn + '</p>'
                    + '<p class="text-[11px] font-mono font-bold text-navy mt-0.5">' + b.call + '</p>'
                    + '<span class="mt-2 self-start text-[10px] font-bold ' + stokBadge + ' px-2 py-0.5 rounded-full">' + stokLabel + '</span>'
                    + '<div class="mt-3 pt-3 border-t border-slate-100 flex items-center gap-1">'
                    + '<button onclick="showToast(\'info\',\'Detail: ' + b.judul + '\')" class="flex-1 text-[11px] font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 py-1.5 rounded-lg">Detail</button>'
                    + '<button onclick="openBarcodePreview(\'' + b.isbn + '\',\'' + b.call + '\')" class="flex-1 text-[11px] font-bold text-navy bg-blue-50 hover:bg-blue-100 py-1.5 rounded-lg">Barcode</button>'
                    + '<button onclick="showToast(\'info\',\'Edit: ' + b.judul + '\')" class="px-2 text-[11px] font-bold text-slate-400 hover:text-navy py-1.5">✏️</button>'
                    + '</div></div></div>';
            }).join('');
        }

        // ---------- E-BOOK ----------
        let ebookLoaded = false;
        function loadEbook() {
            if (ebookLoaded) return;
            const list = document.getElementById('ebookList');
            const ebooks = bukuData.filter(b => b.jenis === 'E-Book');
            setTimeout(() => {
                list.innerHTML = ebooks.map((b, i) =>
                    '<button onclick="showToast(\'success\',\'Membuka e-book: ' + b.judul + '\')" class="w-full flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 text-left transition-colors">'
                    + '<span class="w-10 h-14 rounded-md bg-gradient-to-br ' + colors[i % colors.length] + ' flex-shrink-0"></span>'
                    + '<span class="min-w-0 flex-1"><span class="block text-sm font-semibold text-slate-700 truncate">' + b.judul + '</span><span class="block text-[11px] text-slate-400">' + b.pengarang + '</span><span class="inline-block mt-1 text-[10px] font-bold bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full">📄 PDF</span></span>'
                    + '</button>'
                ).join('');
                ebookLoaded = true;
            }, 600);
        }

        // ---------- BARCODE LABEL LIST ----------
        let labelLoaded = false;
        function loadLabel() {
            if (labelLoaded) return;
            const body = document.getElementById('labelBody');
            setTimeout(() => {
                body.innerHTML = bukuData.map(b =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3"><input type="checkbox" class="accent lblChk" checked></td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + b.judul + '</td>'
                    + '<td class="px-4 py-3 font-mono text-xs text-navy font-bold">' + b.call + '</td>'
                    + '<td class="px-4 py-3 text-slate-500 text-xs">' + b.isbn + '</td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="openBarcodePreview(\'' + b.isbn + '\',\'' + b.call + '\')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg">🏷️ Pratinjau</button></td>'
                    + '</tr>'
                ).join('');
                labelLoaded = true;
            }, 600);
        }
        function openBarcodePreview(isbn, call) {
            document.getElementById('lblIsbn').textContent = isbn || '978-000-000-000-0';
            document.getElementById('lblCall').textContent = call || '-';
            playBeep();
            const m = document.getElementById('barcodeModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeBarcodePreview() { const m = document.getElementById('barcodeModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function openBarcodeMassal() {
            const grid = document.getElementById('massalGrid');
            grid.innerHTML = bukuData.slice(0, 6).map(b =>
                '<div class="border-2 border-slate-300 rounded-lg p-3">'
                + '<div class="flex items-center gap-2 pb-1.5 border-b border-slate-300"><div class="w-6 h-6 rounded-full hero-gradient grid place-items-center text-white text-[8px] font-bold">S+</div><span class="ml-auto font-heading font-extrabold text-slate-900 text-xs">' + b.call + '</span></div>'
                + '<div class="barcode-bars h-10 mt-2 rounded"></div>'
                + '<p class="text-center font-mono text-[10px] font-bold text-slate-700 mt-1">' + b.isbn + '</p>'
                + '</div>'
            ).join('');
            const m = document.getElementById('massalModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeBarcodeMassal() { const m = document.getElementById('massalModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        // ---------- ANGGOTA ----------
        let anggotaLoaded = false;
        function loadAnggota() {
            if (anggotaLoaded) { renderAnggota(); return; }
            document.getElementById('anggotaBody').innerHTML = '<tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(4);
            setTimeout(() => { anggotaLoaded = true; renderAnggota(); }, 650);
        }
        function renderAnggota() {
            const q = (document.getElementById('searchAnggota').value || '').toLowerCase().trim();
            const tipe = document.getElementById('filterTipeAnggota').value;
            const list = anggotaData.filter(a => {
                if (q && (a.nama + ' ' + a.id).toLowerCase().indexOf(q) === -1) return false;
                if (tipe && a.tipe !== tipe) return false;
                return true;
            });
            document.getElementById('anggotaEmpty').classList.toggle('hidden', list.length > 0);
            document.getElementById('anggotaBody').innerHTML = list.map(a =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + a.id + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + a.nama + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (a.tipe === 'Siswa' ? 'bg-sky-100 text-sky-800' : (a.tipe === 'Guru' ? 'bg-violet-100 text-violet-800' : 'bg-slate-100 text-slate-700')) + ' px-2.5 py-1 rounded-full">' + a.tipe + '</span></td>'
                + '<td class="px-4 py-3 text-slate-500">' + a.unit + '</td>'
                + '<td class="px-4 py-3 text-center font-bold text-slate-700">' + a.aktif + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + anggotaBadge[a.status] + ' px-2.5 py-1 rounded-full">' + a.status + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap"><button onclick="showToast(\'success\',\'Kartu anggota ' + a.nama + ' dicetak\')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg">🪪 Cetak Kartu</button></td>'
                + '</tr>'
            ).join('');
        }

        // ---------- SIRKULASI ----------
        let sirkulasiLoaded = false;
        function loadSirkulasi() {
            if (sirkulasiLoaded) { renderSirkulasi(); return; }
            document.getElementById('sirkulasiBody').innerHTML = '<tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(5);
            setTimeout(() => { sirkulasiLoaded = true; renderSirkulasi(); }, 700);
        }
        function renderSirkulasi() {
            const q = (document.getElementById('searchSirkulasi').value || '').toLowerCase().trim();
            const st = document.getElementById('filterStatusSirkulasi').value;
            const list = sirkulasiData.filter(s => {
                if (q && (s.nama + ' ' + s.judul + ' ' + s.id).toLowerCase().indexOf(q) === -1) return false;
                if (st && s.status !== st) return false;
                return true;
            });
            document.getElementById('sirkulasiEmpty').classList.toggle('hidden', list.length > 0);
            document.getElementById('sirkulasiBody').innerHTML = list.map(s =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500 whitespace-nowrap">' + s.id + '</td>'
                + '<td class="px-4 py-3"><span class="font-semibold text-slate-700">' + s.nama + '</span><span class="block text-[11px] text-slate-400">' + s.tipe + '</span></td>'
                + '<td class="px-4 py-3 text-slate-500">' + s.kelas + '</td>'
                + '<td class="px-4 py-3"><span class="text-slate-700">' + s.judul + '</span><span class="block text-[11px] font-mono text-slate-400">' + s.barcode + '</span></td>'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + s.pinjam + '</td>'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + s.jatuh + '</td>'
                + '<td class="px-4 py-3 text-center font-bold ' + (s.telat > 0 ? 'text-red-700' : 'text-slate-400') + '">' + (s.status === 'Terlambat' ? s.telat + ' hari' : (s.status === 'Hilang' ? '—' : '-')) + '</td>'
                + '<td class="px-4 py-3 text-right font-bold ' + (s.denda > 0 ? 'text-red-700' : 'text-slate-400') + ' whitespace-nowrap">' + fmtRp(s.denda) + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + bayarBadge[s.bayar] + ' px-2.5 py-1 rounded-full">' + s.bayar + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + (s.status === 'Dipinjam' || s.status === 'Terlambat'
                    ? '<button onclick="aksiSirkulasi(\'kembali\',\'' + s.id + '\')" class="text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-2.5 py-1.5 rounded-lg mr-1">📤 Kembali</button><button onclick="aksiSirkulasi(\'perpanjang\',\'' + s.id + '\')" class="text-xs font-bold text-blue-700 bg-blue-50 hover:bg-blue-100 px-2.5 py-1.5 rounded-lg mr-1">⏱️ Perpanjang</button>'
                    : '<span class="text-[11px] font-bold text-slate-400 mr-1">✓ Selesai</span>')
                + '<button onclick="kirimRemind(\'' + s.nama + '\')" class="text-slate-400 hover:text-navy px-1" title="Kirim WA Remind">📲</button>'
                + '</td></tr>'
            ).join('');
        }
        function prosesSirkulasi(mode) {
            const buku = document.getElementById('scanBuku').value || '(barcode kosong)';
            playBeep();
            openConfirm(mode === 'pinjam' ? 'Proses Peminjaman' : 'Proses Pengembalian',
                (mode === 'pinjam' ? 'Pinjamkan buku ' : 'Terima kembali buku ') + buku + ' untuk Naufal Hakim (10-A)?',
                () => { playBeep(); showToast('success', 'Transaksi berhasil: ' + (mode === 'pinjam' ? 'Peminjaman dicatat' : 'Pengembalian dicatat') + ' (' + buku + ')'); }, false);
        }
        function aksiSirkulasi(aksi, id) {
            const s = sirkulasiData.find(x => x.id === id);
            if (aksi === 'kembali') openConfirm('Konfirmasi Pengembalian', 'Terima kembali "' + s.judul + '" dari ' + s.nama + '?', () => { s.status = 'Kembali'; if (sirkulasiLoaded) renderSirkulasi(); if (dendaLoaded) renderDenda(); showToast('success', 'Buku "' + s.judul + '" telah dikembalikan'); }, false);
            else openConfirm('Perpanjang Pinjaman', 'Perpanjang pinjaman "' + s.judul + '" selama 7 hari?', () => showToast('success', 'Pinjaman diperpanjang 7 hari'), false);
        }

        // ---------- RESERVASI ----------
        let reservasiLoaded = false;
        function loadReservasi() {
            if (reservasiLoaded) { renderReservasi(); return; }
            document.getElementById('reservasiBody').innerHTML = '<tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(4);
            setTimeout(() => { reservasiLoaded = true; renderReservasi(); }, 650);
        }
        function renderReservasi() {
            document.getElementById('reservasiAntre').textContent = reservasiData.filter(r => r.status === 'Menunggu').length;
            document.getElementById('reservasiSiap').textContent = reservasiData.filter(r => r.status === 'Siap Diambil').length;
            document.getElementById('reservasiExpired').textContent = reservasiData.filter(r => r.status === 'Kadaluarsa').length;
            document.getElementById('reservasiBody').innerHTML = reservasiData.map((r, i) =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + r.kode + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + r.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + r.buku + '</td>'
                + '<td class="px-4 py-3 text-center"><span class="w-6 h-6 inline-grid place-items-center rounded-full bg-blue-100 text-blue-800 text-xs font-bold">' + r.antre + '</span></td>'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + r.tgl + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + reservasiBadge[r.status] + ' px-2.5 py-1 rounded-full">' + r.status + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + (r.status === 'Menunggu'
                    ? '<button onclick="aksiReservasi(' + i + ',\'Siap Diambil\')" class="text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-lg">✓ Setujui</button>'
                    : '<button onclick="showToast(\'info\',\'Detail reservasi ' + r.kode + '\')" class="text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg">Detail</button>')
                + '</td></tr>'
            ).join('');
        }
        function aksiReservasi(i, status) { reservasiData[i].status = status; renderReservasi(); showToast('success', 'Reservasi ' + reservasiData[i].kode + ' diproses: ' + status); }

        // ---------- DENDA ----------
        let dendaLoaded = false;
        function loadDenda() {
            if (dendaLoaded) { renderDenda(); return; }
            document.getElementById('dendaBody').innerHTML = '<tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(4);
            setTimeout(() => { dendaLoaded = true; renderDenda(); }, 650);
        }
        function renderDenda() {
            const list = sirkulasiData.filter(s => s.denda > 0);
            document.getElementById('dendaBody').innerHTML = list.map((s, i) =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500 whitespace-nowrap">' + s.id + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + s.nama + '<span class="block text-[11px] text-slate-400">' + s.kelas + '</span></td>'
                + '<td class="px-4 py-3 text-slate-500">' + s.judul + '</td>'
                + '<td class="px-4 py-3 text-center font-bold text-red-700">' + (s.status === 'Hilang' ? 'Ganti buku' : s.telat + ' hari') + '</td>'
                + '<td class="px-4 py-3 text-right font-heading font-extrabold text-slate-900 whitespace-nowrap">' + fmtRp(s.denda) + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + bayarBadge[s.bayar] + ' px-2.5 py-1 rounded-full">' + s.bayar + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + (s.bayar === 'Belum'
                    ? '<button onclick="bayarDenda(' + i + ')" class="text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-lg">💳 Bayar</button>'
                    : '<span class="text-[11px] font-bold text-emerald-700">✓ Lunas</span>')
                + '</td></tr>'
            ).join('') || '<tr><td colspan="7" class="px-4 py-16 text-center text-slate-400">Tidak ada denda berjalan</td></tr>';
        }
        function bayarDenda(i) {
            const s = sirkulasiData.filter(x => x.denda > 0)[i];
            openConfirm('Konfirmasi Pembayaran', 'Terima pembayaran denda ' + fmtRp(s.denda) + ' dari ' + s.nama + '?', () => { s.bayar = 'Lunas'; renderDenda(); showToast('success', 'Denda ' + fmtRp(s.denda) + ' lunas dibayar'); }, false);
        }

        // ---------- PENGINGAT WA ----------
        let waLoaded = false;
        function loadWA() {
            if (waLoaded) return;
            document.getElementById('waBody').innerHTML = '<tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(4);
            setTimeout(() => {
                document.getElementById('waBody').innerHTML = waData.map((w, i) =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3"><input type="checkbox" class="accent waChk" checked></td>'
                    + '<td class="px-4 py-3"><span class="font-semibold text-slate-700">' + w.nama + '</span><span class="block text-[11px] text-emerald-700 font-semibold">' + w.wa + '</span></td>'
                    + '<td class="px-4 py-3 text-slate-500">' + w.buku + '</td>'
                    + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + w.jatuh + '</td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="kirimWA(' + i + ')" class="text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-lg">📲 Kirim</button></td>'
                    + '</tr>'
                ).join('');
                waLoaded = true;
            }, 650);
        }
        function kirimWA(i) { playBeep(); showToast('success', 'Pengingat WA terkirim ke ' + waData[i].nama + ' (' + waData[i].wa + ')'); }

        // ---------- KUNJUNGAN ----------
        let kunjunganLoaded = false;
        function loadKunjungan() {
            if (kunjunganLoaded) return;
            const chart = document.getElementById('chartKunjungan');
            setTimeout(() => {
                const max = Math.max.apply(null, kunjunganHari.map(k => k.n));
                chart.innerHTML = kunjunganHari.map(k =>
                    '<div class="flex-1 flex flex-col items-center justify-end gap-1 h-full">'
                    + '<span class="text-[10px] font-bold text-slate-500">' + k.n + '</span>'
                    + '<div class="w-full rounded-t-lg bg-gradient-to-t from-sky2 to-navy" style="height:' + Math.round((k.n / max) * 160) + 'px"></div>'
                    + '<span class="text-[10px] font-semibold text-slate-400">' + k.h + '</span>'
                    + '</div>'
                ).join('');
                const maxK = Math.max.apply(null, kelasKunjungan.map(k => k[1]));
                document.getElementById('kelasList').innerHTML = kelasKunjungan.map(k =>
                    '<div class="flex items-center gap-2 p-2 rounded-lg hover:bg-slate-50">'
                    + '<span class="text-xs font-bold text-slate-700 w-10">' + k[0] + '</span>'
                    + '<div class="flex-1 h-2 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-navy" style="width:' + Math.round((k[1] / maxK) * 100) + '%"></div></div>'
                    + '<span class="text-xs font-bold text-slate-600 w-8 text-right">' + k[1] + '</span>'
                    + '</div>'
                ).join('');
                kunjunganLoaded = true;
            }, 600);
        }

        // ---------- POPULER ----------
        let populerLoaded = false;
        function loadPopuler() {
            if (populerLoaded) return;
            const body = document.getElementById('populerBody');
            setTimeout(() => {
                body.innerHTML = populerData.map((r, i) =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3"><span class="w-7 h-7 inline-grid place-items-center rounded-lg font-heading font-extrabold text-xs ' + (i < 3 ? 'bg-gradient-to-br ' + colors[i] + ' text-white' : 'bg-slate-100 text-slate-600') + '">' + (i + 1) + '</span></td>'
                    + '<td class="px-4 py-3"><span class="font-semibold text-slate-700">' + r[0] + '</span><span class="block text-[11px] text-slate-400">' + r[1] + '</span></td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r[2] + '</td>'
                    + '<td class="px-4 py-3 text-right font-heading font-extrabold text-slate-900">' + r[3] + '×</td>'
                    + '</tr>'
                ).join('');
                document.getElementById('kategoriBars').innerHTML = kategoriData.map(k =>
                    '<div>'
                    + '<div class="flex justify-between text-xs mb-1"><span class="font-semibold text-slate-600">' + k[0] + '</span><span class="font-bold text-slate-800">' + k[1] + '%</span></div>'
                    + '<div class="h-2 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-gradient-to-r from-navy to-sky2" style="width:' + k[1] + '%"></div></div>'
                    + '</div>'
                ).join('');
                document.getElementById('rekomendasiList').innerHTML = rekomendasiData.map(r => '<li class="flex gap-2"><span class="text-blue-600">•</span><span>' + r + '</span></li>').join('');
                populerLoaded = true;
            }, 700);
        }

        // ---------- CONFIRM ----------
        let confirmCb = null;
        function openConfirm(title, msg, cb, danger) {
            document.getElementById('confirmTitle').textContent = title;
            document.getElementById('confirmMsg').textContent = msg;
            const ic = document.getElementById('confirmIcon');
            ic.textContent = '⚠️';
            ic.className = 'w-11 h-11 rounded-2xl grid place-items-center text-xl ' + (danger ? 'bg-red-100 text-red-600' : 'bg-amber-100 text-amber-700');
            document.getElementById('confirmOk').className = 'text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors ' + (danger ? 'bg-red-500 hover:bg-red-600' : 'bg-blue-600 hover:bg-blue-700');
            confirmCb = cb;
            const m = document.getElementById('confirmModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeConfirm() { const m = document.getElementById('confirmModal'); m.classList.add('hidden'); m.classList.remove('flex'); confirmCb = null; }
        document.getElementById('confirmOk').addEventListener('click', () => { if (confirmCb) confirmCb(); closeConfirm(); });

        // ---------- TOAST ----------
        function showToast(type, msg) {
            const col = { success: 'bg-emerald-600', error: 'bg-red-500', info: 'bg-blue-600', warning: 'bg-amber-500' };
            const ic = { success: '✓', error: '✕', info: 'ℹ', warning: '!' };
            const wrap = document.getElementById('toastWrap');
            const t = document.createElement('div');
            t.className = col[type] + ' text-white text-sm font-semibold px-4 py-3 rounded-xl shadow-lg flex items-center gap-2 max-w-xs transform translate-x-full transition-transform duration-300';
            t.innerHTML = '<span class="w-6 h-6 rounded-full bg-white/20 grid place-items-center text-xs">' + ic[type] + '</span>' + msg;
            wrap.appendChild(t);
            requestAnimationFrame(() => t.classList.remove('translate-x-full'));
            setTimeout(() => { t.classList.add('translate-x-full'); setTimeout(() => t.remove(), 300); }, 3200);
        }

        loadAktif();
        loadTopBooks();
    </script>
</body>


</html>
