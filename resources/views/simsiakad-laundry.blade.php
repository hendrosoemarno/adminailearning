<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal E-Laundry (Operasional Laundry Sekolah) · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal E-Laundry SIAKAD PLUS — operasional laundry sekolah & asrama/pesantren: penerimaan cucian, tracking status pengerjaan, notifikasi WA otomatis, pembayaran & laporan operasional laundry.">
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
        .barcode-bars { background-image: repeating-linear-gradient(90deg, #0f172a 0 2px, transparent 2px 4px, #0f172a 4px 5px, transparent 5px 8px, #0f172a 8px 11px, transparent 11px 13px); }
        .kanban-col { min-height: 160px; }
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
                <p class="text-[10px] text-slate-500">Operasional Laundry</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard E-Laundry</span>
            </button>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🧺</span><span class="flex-1 text-left">Operasional Laundry</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="penerimaan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Penerimaan Cucian</button>
                    <button data-view="tracking" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tracking Status Cucian</button>
                    <button data-view="notifikasi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Notifikasi WA Otomatis</button>
                    <button data-view="pembayaran" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pembayaran &amp; Laporan</button>
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Operasional Laundry</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard E-Laundry</h1>
                </div>

                <div class="hidden lg:flex items-center flex-1 max-w-md mx-auto">
                    <div class="relative w-full">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                        <input onkeydown="if(event.key==='Enter')cariNotaQuick(this.value)" placeholder="Cari No. Nota / Nama Santri / Kamar..."
                            class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                    </div>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <div class="hidden xl:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Masuk Hari Ini</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">86 kg</p>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 rounded-full">Siap Ambil 9</span>
                    </div>
                    <button onclick="showToast('info', '9 cucian siap ambil & 4 pembayaran belum lunas')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">PL</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Petugas Laundry</p>
                            <p class="text-[10px] text-slate-400">Asrama Putra</p>
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
                            <p class="text-sm text-white/85">Cucian Masuk Hari Ini</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">86 kg · 42 pcs</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">🧺 18 Sedang Diproses</span>
                                <span class="bg-emerald2 px-2.5 py-1 rounded-full text-white">✅ 9 Siap Ambil</span>
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">📲 WA Otomatis Aktif</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('penerimaan','Penerimaan Cucian')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">➕ Terima Cucian Baru</button>
                            <button onclick="showView('tracking','Tracking Status Cucian')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔄 Update Status Massal</button>
                            <button onclick="showView('pembayaran','Pembayaran &amp; Laporan')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">💳 Kasir Pembayaran</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">🧺</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Hari Ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Berat Cucian Masuk</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">86 <span class="text-sm font-bold text-slate-500">kg</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">+ 42 pcs item khusus</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">✅</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Ready</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Cucian Siap Ambil</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">9 <span class="text-sm font-bold text-slate-500">nota</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Menunggu diambil santri</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">💰</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Lunas</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Transaksi Lunas Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">Rp 742.000</p>
                        <p class="text-[11px] text-slate-500 mt-1">Rp 185.000 belum dibayar</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-violet-100 grid place-items-center text-violet-700">📲</span>
                            <span class="text-[11px] font-bold text-violet-700 bg-violet-50 px-2 py-0.5 rounded-full">WA</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Notifikasi WA Terkirim</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">27 <span class="text-sm font-bold text-slate-500">pesan</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Hari ini · otomatis</p>
                    </div>
                </div>

                <div class="mt-4 grid xl:grid-cols-3 gap-4">
                    <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                        <div class="flex items-center justify-between mb-3">
                            <div><h2 class="font-heading font-bold text-slate-800">Kanban Board Status Cucian</h2><p class="text-xs text-slate-400">Alur pengerjaan: Diterima → Cuci → Pengeringan → Setrika → Siap Ambil</p></div>
                            <button onclick="showView('tracking','Tracking Status Cucian')" class="text-[11px] font-bold text-navy">Kelola</button>
                        </div>
                        <div id="kanban" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3"></div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Penerimaan Cucian Cepat</h2>
                            <div class="mt-3 space-y-3">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Scan Barcode Santri</label>
                                    <div class="relative mt-1">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🪪</span>
                                        <input id="cepatBarcode" value="SNT-2021-0451" class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30">
                                    </div>
                                    <p class="mt-1 text-[11px] text-emerald-700 font-semibold">✓ Ahmad Fauzan · Kamar A-12 · Asrama Putra</p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Timbang Berat (Kg)</label>
                                    <div class="relative mt-1">
                                        <input id="cepatBerat" type="number" value="3.5" step="0.1" oninput="updateCepat()" class="w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none">
                                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400">kg</span>
                                    </div>
                                </div>
                                <div class="rounded-xl bg-slate-50 p-3 flex items-center justify-between">
                                    <span class="text-xs text-slate-500">Estimasi biaya (Cuci Komplit)</span>
                                    <span id="cepatTotal" class="font-heading font-extrabold text-slate-900">Rp 21.000</span>
                                </div>
                                <button onclick="showView('penerimaan','Penerimaan Cucian')" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📝 Lanjut ke Form Penerimaan</button>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Ringkasan Omzet Hari Ini</h2>
                            <div class="mt-4 space-y-3">
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-blue-50 text-blue-700 grid place-items-center">🧺</span>
                                    <div class="flex-1"><p class="text-xs font-semibold text-slate-700">Cuci Komplit</p><p class="text-[11px] text-slate-400">62 kg · 34 transaksi</p></div>
                                    <span class="font-bold text-slate-800">Rp 546.000</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-amber-50 text-amber-700 grid place-items-center">👔</span>
                                    <div class="flex-1"><p class="text-xs font-semibold text-slate-700">Setrika Saja</p><p class="text-[11px] text-slate-400">18 kg · 11 transaksi</p></div>
                                    <span class="font-bold text-slate-800">Rp 126.000</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-red-50 text-red-600 grid place-items-center">⚡</span>
                                    <div class="flex-1"><p class="text-xs font-semibold text-slate-700">Cuci Kilat Express</p><p class="text-[11px] text-slate-400">6 kg · 4 transaksi</p></div>
                                    <span class="font-bold text-slate-800">Rp 70.000</span>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-sm font-bold text-slate-700">Total Omzet</span>
                                <span class="font-heading font-extrabold text-lg text-navy">Rp 742.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PENERIMAAN CUCIAN ================= -->
            <section id="view-penerimaan" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Penerimaan Cucian</h2>
                    <p class="text-xs text-slate-400">Form timbang/hitung pakaian, data pemilik, kategori cuci, &amp; cetak struk/nota digital.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Form Input Order Laundry</h3>

                        <div class="mt-4 relative">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Cari Santri / Siswa (NISN / Nama / Kamar) — Autocomplete</label>
                            <div class="relative mt-1">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                                <input id="cariSantri" value="Ahmad Fauzan" oninput="autocompleteSantri(this.value)" placeholder="Ketik nama / NISN / kamar asrama..."
                                    class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                                <div id="acSantri" class="hidden absolute z-20 left-0 right-0 mt-1 bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden"></div>
                            </div>
                        </div>

                        <div class="mt-4 rounded-2xl border border-slate-100 bg-slate-50 p-4 flex flex-col sm:flex-row sm:items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-lg flex-shrink-0">AF</div>
                            <div class="min-w-0 flex-1">
                                <p id="custNama" class="font-heading font-bold text-slate-800">Ahmad Fauzan</p>
                                <p id="custInfo" class="text-xs text-slate-500">NISN 0071234601 · Kamar A-12 · Asrama Putra · Saldo E-Money Rp 125.000</p>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    <span class="text-[11px] font-bold bg-blue-100 text-blue-800 px-2.5 py-1 rounded-full">🧺 Pelanggan Setia</span>
                                    <span class="text-[11px] font-bold bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full">✓ Tidak Ada Tunggakan</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 grid sm:grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nomor Nota / Transaksi</label>
                                <div class="mt-1 flex gap-2">
                                    <input value="LDR-2026-1017-0042" readonly class="flex-1 bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none font-mono">
                                    <button onclick="showToast('info','Nomor nota dibuat ulang otomatis')" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-600 text-xs font-bold px-3 rounded-xl">↺</button>
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Jenis Layanan</label>
                                <select id="layanan" onchange="hitungTotal()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option value="6000">Cuci Komplit (Rp 6.000/kg)</option>
                                    <option value="4000">Setrika Saja (Rp 4.000/kg)</option>
                                    <option value="9000">Cuci Kilat Express (Rp 9.000/kg)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4 grid sm:grid-cols-3 gap-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Metode Hitung</label>
                                <select id="metode" onchange="hitungTotal()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option value="kg">Per Kg</option>
                                    <option value="pcs">Per Pcs (Seragam/Guling)</option>
                                </select>
                            </div>
                            <div>
                                <label id="lblJumlah" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Berat (Kg)</label>
                                <div class="relative mt-1">
                                    <input id="jumlah" type="number" value="3.5" step="0.1" oninput="hitungTotal()" class="w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none">
                                    <span id="satuan" class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400">kg</span>
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Harga</label>
                                <div class="mt-1 bg-blue-50 border border-blue-100 rounded-xl px-3 py-2.5">
                                    <span id="totalHarga" class="font-heading font-extrabold text-navy">Rp 21.000</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Catatan Khusus / Detail Pakaian</label>
                            <textarea rows="2" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700" placeholder="Warna, item khusus, label nama...">Atas nama: Ahmad Fauzan (A-12). Pakaian putih dipisah, 2 seragam olahraga, guling 1 pcs.</textarea>
                        </div>

                        <div class="mt-4">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Metode Pembayaran</label>
                            <div class="mt-2 grid grid-cols-1 sm:grid-cols-3 gap-2">
                                <label class="flex items-center gap-2 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-700 cursor-pointer hover:border-navy"><input type="radio" name="bayar" class="accent" checked> 💵 Cash / Tunai</label>
                                <label class="flex items-center gap-2 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-700 cursor-pointer hover:border-navy"><input type="radio" name="bayar" class="accent"> 💳 Potong E-Money Santri</label>
                                <label class="flex items-center gap-2 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-700 cursor-pointer hover:border-navy"><input type="radio" name="bayar" class="accent"> 📅 Tagihan Bulanan</label>
                            </div>
                        </div>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <button onclick="simpanStruk()" class="flex-1 min-w-[200px] bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-3 rounded-xl transition-colors">💾 Simpan &amp; Cetak Struk Nota</button>
                            <button onclick="showToast('success','Struk digital dikirim ke WhatsApp Ahmad Fauzan')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-5 py-3 rounded-xl transition-colors">📲 Kirim Struk WA</button>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Pratinjau Struk Digital</h3>
                        <div class="mt-3 border-2 border-dashed border-slate-200 rounded-2xl p-4 font-mono text-xs">
                            <div class="text-center">
                                <div class="w-10 h-10 mx-auto rounded-lg hero-gradient grid place-items-center text-white font-heading font-extrabold font-sans">L</div>
                                <p class="font-bold text-slate-800 mt-1 font-sans">LAUNDRY SIAKAD PLUS</p>
                                <p class="text-slate-400">Asrama Putra · SMAN 1 Nusantara</p>
                            </div>
                            <div class="my-3 border-t border-dashed border-slate-300"></div>
                            <div class="space-y-1 text-slate-600">
                                <div class="flex justify-between"><span>No. Nota</span><span class="text-slate-800">LDR-...0042</span></div>
                                <div class="flex justify-between"><span>Pelanggan</span><span class="text-slate-800">Ahmad Fauzan</span></div>
                                <div class="flex justify-between"><span>Kamar</span><span class="text-slate-800">A-12</span></div>
                                <div class="flex justify-between"><span>Layanan</span><span class="text-slate-800">Cuci Komplit</span></div>
                                <div class="flex justify-between"><span>Berat</span><span class="text-slate-800">3.5 kg</span></div>
                            </div>
                            <div class="my-3 border-t border-dashed border-slate-300"></div>
                            <div class="flex justify-between font-bold text-slate-900 font-sans text-sm"><span>TOTAL</span><span>Rp 21.000</span></div>
                            <div class="mt-3 flex justify-center">
                                <div class="text-center">
                                    <div class="barcode-bars h-10 w-40 rounded"></div>
                                    <p class="text-[9px] mt-1">LDR-2026-1017-0042</p>
                                </div>
                            </div>
                            <p class="mt-3 text-center text-[10px] text-slate-400 font-sans">Terima kasih · Cucian dapat diambil setelah status "Siap Ambil"</p>
                        </div>
                        <div class="mt-3 grid grid-cols-2 gap-2">
                            <button onclick="showToast('success','Struk dicetak (thermal 58mm)')" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-xs font-bold py-2.5 rounded-xl transition-colors">🖨️ Cetak</button>
                            <button onclick="showToast('success','Struk PDF diunduh')" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-xs font-bold py-2.5 rounded-xl transition-colors">⬇️ PDF</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: TRACKING STATUS CUCIAN ================= -->
            <section id="view-tracking" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Tracking Status Cucian</h2>
                        <p class="text-xs text-slate-400">Monitoring posisi pengerjaan: Diterima → Cuci → Pengeringan → Setrika → Siap Ambil → Selesai.</p>
                    </div>
                    <button onclick="updateStatusMassal()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔄 Update Status Massal</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div id="kanbanFull" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3"></div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <div class="relative flex-1">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchTracking" oninput="renderTracking()" placeholder="Cari no. nota / nama santri / kamar..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterTracking" onchange="renderTracking()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Status</option>
                            <option>Diterima</option>
                            <option>Cuci</option>
                            <option>Pengeringan</option>
                            <option>Setrika</option>
                            <option>Siap Ambil</option>
                            <option>Selesai</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1000px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">No. Nota</th>
                                    <th class="px-4 py-3">Santri</th>
                                    <th class="px-4 py-3">Kamar</th>
                                    <th class="px-4 py-3 text-center">Berat/Item</th>
                                    <th class="px-4 py-3">Layanan</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Masuk</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="trackingBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="trackingEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🧺</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada cucian ditemukan</p>
                        <p class="text-sm text-slate-400">Antrean cucian kosong atau filter tidak cocok.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: NOTIFIKASI WA OTOMATIS ================= -->
            <section id="view-notifikasi" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Notifikasi WA Otomatis</h2>
                        <p class="text-xs text-slate-400">Broadcast pengingat cucian selesai / siap ambil langsung ke WhatsApp santri &amp; wali murid.</p>
                    </div>
                    <button onclick="openConfirm('Kirim Broadcast WA','Kirim notifikasi cucian siap ambil ke semua santri terkait sekarang?',()=>showToast('success','Broadcast WA terkirim ke 9 santri'),false)" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📤 Broadcast Siap Ambil</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Pesan Terkirim Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">27</p>
                        <p class="text-[11px] text-slate-500 mt-1">Otomatis &amp; manual</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Menunggu Dikirim</p>
                        <p id="waPending" class="font-heading font-extrabold text-2xl text-amber-700 mt-1">0</p>
                        <p class="text-[11px] text-slate-500 mt-1">Cucian siap ambil</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Tingkat Pengambilan</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">94%</p>
                        <p class="text-[11px] text-slate-500 mt-1">Setelah notifikasi</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Template Aktif</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">3</p>
                        <p class="text-[11px] text-slate-500 mt-1">Siap ambil · Selesai · Reminder</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">Daftar Notifikasi Siap Kirim</h3>
                            <label class="flex items-center gap-2 text-[11px] font-bold text-slate-500"><input type="checkbox" class="accent" checked> Kirim otomatis saat status "Siap Ambil"</label>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[680px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3"><input type="checkbox" class="accent" checked></th>
                                        <th class="px-4 py-3">Nama &amp; No. WA</th>
                                        <th class="px-4 py-3">No. Nota</th>
                                        <th class="px-4 py-3 text-center">Berat</th>
                                        <th class="px-4 py-3">Status</th>
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
                            <p class="font-bold text-emerald-800">🧺 Laundry Asrama SIAKAD PLUS</p>
                            <p class="mt-2">Halo <span class="font-semibold">[Nama]</span>, cucian Anda (Nota <span class="font-semibold">[No. Nota]</span>, <span class="font-semibold">[Berat]</span>) sudah <span class="font-semibold">SIAP DIAMBIL</span> di loket laundry asrama. Mohon diambil agar tidak menumpuk 🙏</p>
                            <p class="mt-2">Terima kasih 🧺</p>
                        </div>
                        <button onclick="showToast('info','Mengubah template pesan notifikasi')" class="mt-3 w-full bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold py-2.5 rounded-xl transition-colors">✏️ Edit Template</button>
                        <div class="mt-4 pt-4 border-t border-slate-100 space-y-2 text-xs">
                            <div class="flex justify-between"><span class="text-slate-500">Gateway WA</span><span class="font-bold text-emerald-700">Terhubung</span></div>
                            <div class="flex justify-between"><span class="text-slate-500">Kuota pesan</span><span class="font-bold text-slate-800">1.240 / 2.000</span></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PEMBAYARAN & LAPORAN ================= -->
            <section id="view-pembayaran" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Pembayaran &amp; Laporan Laundry</h2>
                        <p class="text-xs text-slate-400">Kasir transaksi (Cash / E-Money), laporan omzet harian/bulanan, &amp; rekap berat cucian.</p>
                    </div>
                    <button onclick="showToast('success','Laporan laundry bulan Oktober dicetak')" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak Laporan</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Omzet Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 742.000</p>
                        <p class="text-[11px] text-emerald-700 mt-1 font-semibold">↑ 12% vs kemarin</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Omzet Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 18,4 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">1.284 transaksi</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Piutang Belum Bayar</p>
                        <p id="piutang" class="font-heading font-extrabold text-2xl text-red-700 mt-1">Rp 0</p>
                        <p class="text-[11px] text-slate-500 mt-1">Perlu ditagih</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Rekap Berat Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">2.140 <span class="text-sm font-bold text-slate-500">kg</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Rata-rata 71 kg/hari</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div>
                            <label class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Filter Tanggal</label>
                            <input type="date" value="2026-10-17" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Status Bayar</label>
                            <select id="filterBayar" onchange="renderLaporan()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                <option value="">Semua Status</option>
                                <option>Lunas</option>
                                <option>Belum Bayar</option>
                                <option>E-Money</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Cari</label>
                            <div class="relative mt-1">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                                <input id="searchLaporan" oninput="renderLaporan()" placeholder="Cari no. nota / nama santri..."
                                    class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1080px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">No. Nota</th>
                                    <th class="px-4 py-3">Santri</th>
                                    <th class="px-4 py-3">Kamar/Kelas</th>
                                    <th class="px-4 py-3 text-center">Berat/Item</th>
                                    <th class="px-4 py-3">Layanan</th>
                                    <th class="px-4 py-3 text-right">Total</th>
                                    <th class="px-4 py-3">Pengerjaan</th>
                                    <th class="px-4 py-3">Bayar</th>
                                    <th class="px-4 py-3">Tgl Ambil</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="laporanBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="laporanEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Transaksi tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status bayar.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧺</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal E-Laundry. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Penerimaan Cucian</span>, <span class="font-semibold text-slate-600">Tracking Status Cucian</span>, <span class="font-semibold text-slate-600">Notifikasi WA Otomatis</span>, dan <span class="font-semibold text-slate-600">Pembayaran &amp; Laporan</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard E-Laundry')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('penerimaan','Penerimaan Cucian')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Penerimaan Cucian</button>
                        <button onclick="showView('tracking','Tracking Status Cucian')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Tracking Status</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="border-t border-slate-200 bg-white px-4 sm:px-6 py-5 text-center">
            <p class="text-xs text-slate-400">© 2026 PT Artificial Intelligence Learning Madani Digital · E-Laundry (Simulasi)</p>
        </footer>
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

        // ---------- Badges ----------
        const statusBadge = { 'Diterima': 'bg-blue-100 text-blue-800', 'Cuci': 'bg-amber-100 text-amber-800', 'Pengeringan': 'bg-amber-100 text-amber-800', 'Setrika': 'bg-violet-100 text-violet-800', 'Siap Ambil': 'bg-emerald-100 text-emerald-800', 'Selesai': 'bg-emerald-100 text-emerald-800' };
        const bayarBadge = { 'Lunas': 'bg-emerald-100 text-emerald-800', 'Belum Bayar': 'bg-red-100 text-red-800', 'E-Money': 'bg-blue-100 text-blue-800', '-': 'bg-slate-100 text-slate-500' };
        const nextStatus = { 'Diterima': 'Cuci', 'Cuci': 'Pengeringan', 'Pengeringan': 'Setrika', 'Setrika': 'Siap Ambil', 'Siap Ambil': 'Selesai' };

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

            if (name === 'dashboard') { renderKanban('kanban'); loadKanban(); }
            if (name === 'tracking') { renderKanban('kanbanFull'); loadTracking(); }
            if (name === 'notifikasi') loadWA();
            if (name === 'pembayaran') loadLaporan();

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
        function cariNotaQuick(val) {
            document.getElementById('searchTracking').value = val || '';
            showView('tracking', 'Tracking Status Cucian');
            renderTracking();
        }

        // ---------- MASTER DATA ----------
        const orders = [
            { nota: 'LDR-2026-1017-0042', nama: 'Ahmad Fauzan', kamar: 'A-12', ukuran: '3,5 kg', kg: 3.5, layanan: 'Cuci Komplit', total: 21000, status: 'Siap Ambil', masuk: '09:15', bayar: 'Belum Bayar', ambil: '-', wa: 'Terkirim' },
            { nota: 'LDR-2026-1017-0041', nama: 'Siti Nurhaliza', kamar: 'B-08', ukuran: '2,0 kg', kg: 2.0, layanan: 'Setrika Saja', total: 8000, status: 'Siap Ambil', masuk: '08:40', bayar: 'Lunas', ambil: '-', wa: 'Terkirim' },
            { nota: 'LDR-2026-1017-0040', nama: 'Rizki Maulana', kamar: 'A-05', ukuran: '4,2 kg', kg: 4.2, layanan: 'Cuci Komplit', total: 25200, status: 'Setrika', masuk: '08:10', bayar: 'Lunas', ambil: '-', wa: 'Belum' },
            { nota: 'LDR-2026-1017-0039', nama: 'Dewi Lestari', kamar: 'C-03', ukuran: '1,5 kg', kg: 1.5, layanan: 'Cuci Kilat Express', total: 13500, status: 'Pengeringan', masuk: '07:55', bayar: 'E-Money', ambil: '-', wa: 'Belum' },
            { nota: 'LDR-2026-1017-0038', nama: 'Bagus Setiawan', kamar: 'A-21', ukuran: '3,0 kg', kg: 3.0, layanan: 'Cuci Komplit', total: 18000, status: 'Cuci', masuk: '07:30', bayar: 'Lunas', ambil: '-', wa: 'Belum' },
            { nota: 'LDR-2026-1017-0037', nama: 'Nur Aini', kamar: 'B-14', ukuran: '2,5 kg', kg: 2.5, layanan: 'Setrika Saja', total: 10000, status: 'Diterima', masuk: '07:10', bayar: 'Belum Bayar', ambil: '-', wa: 'Belum' },
            { nota: 'LDR-2026-1017-0036', nama: 'Fajar Nugroho', kamar: 'A-09', ukuran: '5,0 kg', kg: 5.0, layanan: 'Cuci Komplit', total: 30000, status: 'Cuci', masuk: '06:50', bayar: 'Lunas', ambil: '-', wa: 'Belum' },
            { nota: 'LDR-2026-1017-0035', nama: 'Putri Amelia', kamar: 'C-11', ukuran: '1,8 kg', kg: 1.8, layanan: 'Cuci Komplit', total: 10800, status: 'Siap Ambil', masuk: '06:30', bayar: 'Lunas', ambil: '-', wa: 'Terkirim' },
            { nota: 'LDR-2026-1017-0034', nama: 'Hafiz Rizki', kamar: 'A-02', ukuran: '3,2 kg', kg: 3.2, layanan: 'Cuci Kilat Express', total: 28800, status: 'Siap Ambil', masuk: '06:10', bayar: 'Belum Bayar', ambil: '-', wa: 'Terkirim' },
            { nota: 'LDR-2026-1017-0033', nama: 'Salma Kamila', kamar: 'B-06', ukuran: '2,2 kg', kg: 2.2, layanan: 'Setrika Saja', total: 8800, status: 'Selesai', masuk: '05:40', bayar: 'Lunas', ambil: '17 Okt 06:20', wa: 'Terkirim' },
            { nota: 'LDR-2026-1017-0032', nama: 'Andi Saputra', kamar: 'A-17', ukuran: '4,0 kg', kg: 4.0, layanan: 'Cuci Komplit', total: 24000, status: 'Selesai', masuk: '05:20', bayar: 'Lunas', ambil: '17 Okt 06:10', wa: 'Terkirim' },
            { nota: 'LDR-2026-1017-0031', nama: 'Inayah Putri', kamar: 'C-08', ukuran: '2 pcs', kg: 0, layanan: 'Cuci Kilat Express', total: 10800, status: 'Siap Ambil', masuk: '05:00', bayar: 'Belum Bayar', ambil: '-', wa: 'Belum' }
        ];
        const santriData = [
            { nisn: '0071234601', nama: 'Ahmad Fauzan', kamar: 'A-12', asrama: 'Asrama Putra', saldo: 125000 },
            { nisn: '0071234602', nama: 'Rizki Maulana', kamar: 'A-05', asrama: 'Asrama Putra', saldo: 48000 },
            { nisn: '0071234603', nama: 'Siti Nurhaliza', kamar: 'B-08', asrama: 'Asrama Putri', saldo: 90000 },
            { nisn: '0071234604', nama: 'Dewi Lestari', kamar: 'C-03', asrama: 'Asrama Putri', saldo: 33000 },
            { nisn: '0071234605', nama: 'Fajar Nugroho', kamar: 'A-09', asrama: 'Asrama Putra', saldo: 15000 }
        ];
        function waOrders() { return orders.filter(o => o.status === 'Siap Ambil' || o.status === 'Selesai'); }

        // ---------- KANBAN ----------
        const kanbanCols = [
            { title: 'Diterima / Antrean', dot: 'bg-blue-500', head: 'bg-blue-50 text-blue-700', match: o => o.status === 'Diterima' },
            { title: 'Proses Cuci & Pengeringan', dot: 'bg-amber-500', head: 'bg-amber-50 text-amber-700', match: o => o.status === 'Cuci' || o.status === 'Pengeringan' },
            { title: 'Setrika & Lipat', dot: 'bg-violet-500', head: 'bg-violet-50 text-violet-700', match: o => o.status === 'Setrika' },
            { title: 'Siap Ambil (Ready)', dot: 'bg-emerald-500', head: 'bg-emerald-50 text-emerald-700', match: o => o.status === 'Siap Ambil', ready: true }
        ];
        function renderKanban(targetId) {
            const wrap = document.getElementById(targetId);
            if (!wrap) return;
            wrap.innerHTML = kanbanCols.map(col => {
                const items = orders.filter(col.match);
                return '<div class="rounded-2xl bg-slate-50 border border-slate-100 p-2.5">'
                    + '<div class="flex items-center gap-2 px-1.5 pb-2">'
                    + '<span class="w-2 h-2 rounded-full ' + col.dot + '"></span>'
                    + '<span class="text-[11px] font-bold text-slate-600">' + col.title + '</span>'
                    + '<span class="ml-auto text-[10px] font-bold ' + col.head + ' px-2 py-0.5 rounded-full">' + items.length + '</span>'
                    + '</div>'
                    + '<div class="kanban-col space-y-2">'
                    + (items.length ? items.map(o =>
                        '<div class="bg-white rounded-xl border border-slate-100 shadow-sm p-3">'
                        + '<div class="flex items-center justify-between"><span class="text-[10px] font-mono text-slate-400">' + o.nota.slice(-8) + '</span><span class="text-[10px] font-bold ' + bayarBadge[o.bayar] + ' px-2 py-0.5 rounded-full">' + o.bayar + '</span></div>'
                        + '<p class="mt-1 text-sm font-bold text-slate-800 truncate">' + o.nama + '</p>'
                        + '<p class="text-[11px] text-slate-400">' + o.kamar + ' · ' + o.ukuran + ' · ' + o.layanan + '</p>'
                        + (col.ready
                            ? '<div class="mt-2 flex gap-1.5"><button onclick="kirimWAOrder(\'' + o.nota + '\')" class="flex-1 text-[10px] font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 py-1.5 rounded-lg">📲 WA</button><button onclick="serahCucian(\'' + o.nota + '\')" class="flex-1 text-[10px] font-bold text-white bg-emerald-600 hover:bg-emerald-700 py-1.5 rounded-lg">✓ Serahkan</button></div>'
                            : '<button onclick="lanjutStatus(\'' + o.nota + '\')" class="mt-2 w-full text-[10px] font-bold text-navy bg-blue-50 hover:bg-blue-100 py-1.5 rounded-lg">Lanjut → ' + (nextStatus[o.status] || '') + '</button>')
                        + '</div>'
                    ).join('') : '<div class="rounded-xl border border-dashed border-slate-200 py-6 text-center text-[11px] text-slate-400">Tidak ada cucian</div>')
                    + '</div></div>';
            }).join('');
        }
        function loadKanban() {
            document.getElementById('kanban').innerHTML = '<div class="col-span-full skeleton h-40 rounded-2xl"></div>';
            setTimeout(() => renderKanban('kanban'), 600);
        }

        // ---------- TRACKING ----------
        let trackingLoaded = false;
        function loadTracking() {
            if (trackingLoaded) { renderTracking(); return; }
            document.getElementById('trackingBody').innerHTML = '<tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(5);
            setTimeout(() => { trackingLoaded = true; renderTracking(); }, 650);
        }
        function renderTracking() {
            const q = (document.getElementById('searchTracking').value || '').toLowerCase().trim();
            const st = document.getElementById('filterTracking').value;
            const list = orders.filter(o => {
                if (q && (o.nota + ' ' + o.nama + ' ' + o.kamar).toLowerCase().indexOf(q) === -1) return false;
                if (st && o.status !== st) return false;
                return true;
            });
            document.getElementById('trackingEmpty').classList.toggle('hidden', list.length > 0);
            document.getElementById('trackingBody').innerHTML = list.map(o =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500 whitespace-nowrap">' + o.nota + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + o.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + o.kamar + '</td>'
                + '<td class="px-4 py-3 text-center text-slate-600">' + o.ukuran + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + o.layanan + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[o.status] + ' px-2.5 py-1 rounded-full">' + o.status + '</span></td>'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + o.masuk + '</td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + (o.status !== 'Selesai'
                    ? '<button onclick="lanjutStatus(\'' + o.nota + '\')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg mr-1">→ ' + (nextStatus[o.status] || '') + '</button>'
                    : '<span class="text-[11px] font-bold text-emerald-700 mr-1">✓ Selesai</span>')
                + (o.status === 'Siap Ambil' ? '<button onclick="kirimWAOrder(\'' + o.nota + '\')" class="text-slate-400 hover:text-emerald-700 px-1" title="Kirim WA">📲</button>' : '')
                + '</td></tr>'
            ).join('');
        }
        function lanjutStatus(nota) {
            const o = orders.find(x => x.nota === nota);
            if (!o) return;
            const nx = nextStatus[o.status];
            if (o.status === 'Siap Ambil') { serahCucian(nota); return; }
            o.status = nx;
            if (o.status === 'Siap Ambil' && o.wa !== 'Terkirim') { o.wa = 'Terkirim'; showToast('success', 'Status → Siap Ambil & WA otomatis dikirim ke ' + o.nama); }
            else showToast('success', 'Status ' + o.nama + ' → ' + o.status);
            refreshAll();
        }
        function serahCucian(nota) {
            const o = orders.find(x => x.nota === nota);
            if (!o) return;
            openConfirm('Konfirmasi Penyerahan Cucian', 'Serahkan cucian ' + o.nama + ' (' + o.nota + ', ' + o.ukuran + ') kepada pemilik?', () => {
                o.status = 'Selesai'; o.ambil = '17 Okt 06:30';
                showToast('success', 'Cucian ' + o.nama + ' telah diserahkan');
                refreshAll();
            }, false);
        }
        function kirimWAOrder(nota) {
            const o = orders.find(x => x.nota === nota);
            if (!o) return;
            openConfirm('Kirim Notifikasi WA', 'Kirim notifikasi "Cucian Siap Ambil" ke WhatsApp ' + o.nama + '?', () => {
                o.wa = 'Terkirim';
                showToast('success', 'Notifikasi WA terkirim ke ' + o.nama);
                refreshAll();
            }, false);
        }
        function updateStatusMassal() {
            openConfirm('Update Status Massal', 'Naikkan status semua cucian ke tahap berikutnya sekaligus?', () => {
                let n = 0;
                orders.forEach(o => { if (nextStatus[o.status] && o.status !== 'Siap Ambil') { o.status = nextStatus[o.status]; n++; } });
                showToast('success', n + ' cucian dipindahkan ke tahap berikutnya');
                refreshAll();
            }, false);
        }
        function refreshAll() {
            if (document.getElementById('kanban')) renderKanban('kanban');
            if (document.getElementById('kanbanFull')) renderKanban('kanbanFull');
            if (trackingLoaded) renderTracking();
            if (waLoaded) loadWA();
            if (laporanLoaded) renderLaporan();
        }

        // ---------- NOTIFIKASI WA ----------
        let waLoaded = false;
        function loadWA() {
            const pending = orders.filter(o => o.status === 'Siap Ambil' && o.wa !== 'Terkirim').length;
            const el = document.getElementById('waPending');
            if (el) el.textContent = pending;
            if (waLoaded && document.getElementById('waBody').children.length) { renderWA(); return; }
            setTimeout(() => { waLoaded = true; renderWA(); }, 650);
        }
        function renderWA() {
            const list = waOrders();
            document.getElementById('waBody').innerHTML = list.length ? list.map(o =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3"><input type="checkbox" class="accent" ' + (o.wa === 'Terkirim' ? '' : 'checked') + '></td>'
                + '<td class="px-4 py-3"><span class="font-semibold text-slate-700">' + o.nama + '</span><span class="block text-[11px] text-emerald-700 font-semibold">62812' + o.nota.slice(-4) + '560</span></td>'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + o.nota.slice(-8) + '</td>'
                + '<td class="px-4 py-3 text-center text-slate-600">' + o.ukuran + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (o.wa === 'Terkirim' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800') + ' px-2.5 py-1 rounded-full">' + (o.wa === 'Terkirim' ? 'Terkirim' : 'Menunggu') + '</span></td>'
                + '<td class="px-4 py-3 text-right"><button onclick="kirimWAOrder(\'' + o.nota + '\')" class="text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-lg">📲 Kirim</button></td>'
                + '</tr>'
            ).join('') : '<tr><td colspan="6" class="px-4 py-16 text-center text-slate-400">Tidak ada notifikasi siap kirim</td></tr>';
        }

        // ---------- PENERIMAAN / AUTOFILL ----------
        function hitungTotal() {
            const layanan = parseInt(document.getElementById('layanan').value, 10);
            const metode = document.getElementById('metode').value;
            const jumlah = parseFloat(document.getElementById('jumlah').value) || 0;
            document.getElementById('lblJumlah').textContent = metode === 'kg' ? 'Berat (Kg)' : 'Jumlah (Pcs)';
            document.getElementById('satuan').textContent = metode === 'kg' ? 'kg' : 'pcs';
            const total = Math.round(layanan * jumlah);
            document.getElementById('totalHarga').textContent = fmtRp(total);
        }
        function updateCepat() {
            const berat = parseFloat(document.getElementById('cepatBerat').value) || 0;
            document.getElementById('cepatTotal').textContent = fmtRp(Math.round(6000 * berat));
        }
        function autocompleteSantri(val) {
            const dd = document.getElementById('acSantri');
            const q = (val || '').toLowerCase().trim();
            if (!q) { dd.classList.add('hidden'); return; }
            const res = santriData.filter(s => (s.nama + ' ' + s.nisn + ' ' + s.kamar).toLowerCase().indexOf(q) !== -1);
            if (!res.length) { dd.innerHTML = '<p class="px-3 py-3 text-xs text-slate-400">Santri tidak ditemukan</p>'; dd.classList.remove('hidden'); return; }
            dd.innerHTML = res.map(s =>
                '<button onclick="pilihSantri(\'' + s.nisn + '\')" class="w-full text-left px-3 py-2.5 hover:bg-slate-50 border-b border-slate-50 last:border-0">'
                + '<span class="block text-sm font-semibold text-slate-700">' + s.nama + '</span>'
                + '<span class="block text-[11px] text-slate-400">' + s.nisn + ' · ' + s.kamar + ' · ' + s.asrama + '</span>'
                + '</button>'
            ).join('');
            dd.classList.remove('hidden');
        }
        function pilihSantri(nisn) {
            const s = santriData.find(x => x.nisn === nisn);
            if (!s) return;
            document.getElementById('cariSantri').value = s.nama;
            document.getElementById('custNama').textContent = s.nama;
            document.getElementById('custInfo').textContent = 'NISN ' + s.nisn + ' · Kamar ' + s.kamar + ' · ' + s.asrama + ' · Saldo E-Money ' + fmtRp(s.saldo);
            document.getElementById('acSantri').classList.add('hidden');
        }
        function simpanStruk() {
            const nama = document.getElementById('cariSantri').value || 'Santri';
            const total = document.getElementById('totalHarga').textContent;
            openConfirm('Simpan & Cetak Struk', 'Simpan order laundry ' + nama + ' (' + total + ') & cetak struk nota?', () => showToast('success', 'Order tersimpan & struk nota dicetak untuk ' + nama), false);
        }

        // ---------- LAPORAN / PEMBAYARAN ----------
        let laporanLoaded = false;
        function loadLaporan() {
            if (laporanLoaded) { renderLaporan(); return; }
            document.getElementById('laporanBody').innerHTML = '<tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(5);
            setTimeout(() => { laporanLoaded = true; renderLaporan(); }, 700);
        }
        function renderLaporan() {
            const piutang = orders.filter(o => o.bayar === 'Belum Bayar').reduce((a, o) => a + o.total, 0);
            const pel = document.getElementById('piutang');
            if (pel) pel.textContent = fmtRp(piutang);
            const q = (document.getElementById('searchLaporan').value || '').toLowerCase().trim();
            const fb = document.getElementById('filterBayar').value;
            const list = orders.filter(o => {
                if (q && (o.nota + ' ' + o.nama).toLowerCase().indexOf(q) === -1) return false;
                if (fb && o.bayar !== fb) return false;
                return true;
            });
            document.getElementById('laporanEmpty').classList.toggle('hidden', list.length > 0);
            document.getElementById('laporanBody').innerHTML = list.map(o =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500 whitespace-nowrap">' + o.nota + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + o.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + o.kamar + '</td>'
                + '<td class="px-4 py-3 text-center text-slate-600">' + o.ukuran + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + o.layanan + '</td>'
                + '<td class="px-4 py-3 text-right font-bold text-slate-800 whitespace-nowrap">' + fmtRp(o.total) + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statusBadge[o.status] + ' px-2.5 py-1 rounded-full">' + o.status + '</span></td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + bayarBadge[o.bayar] + ' px-2.5 py-1 rounded-full">' + o.bayar + '</span></td>'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + o.ambil + '</td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + (o.bayar === 'Belum Bayar'
                    ? '<button onclick="prosesBayar(\'' + o.nota + '\')" class="text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-2.5 py-1.5 rounded-lg mr-1">💳 Bayar</button>'
                    : '<span class="text-[11px] font-bold text-emerald-700 mr-1">✓ Lunas</span>')
                + '<button onclick="kirimWAOrder(\'' + o.nota + '\')" class="text-slate-400 hover:text-emerald-700 px-1" title="WA Remind">📲</button>'
                + '<button onclick="showToast(\'info\',\'Struk ' + o.nota + ' dicetak ulang\')" class="text-slate-400 hover:text-navy px-1" title="Cetak Ulang Struk">🖨️</button>'
                + '</td></tr>'
            ).join('');
        }
        function prosesBayar(nota) {
            const o = orders.find(x => x.nota === nota);
            if (!o) return;
            openConfirm('Proses Pembayaran', 'Terima pembayaran ' + fmtRp(o.total) + ' dari ' + o.nama + '?', () => {
                o.bayar = 'Lunas';
                showToast('success', 'Pembayaran ' + fmtRp(o.total) + ' diterima');
                refreshAll();
            }, false);
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

        updateCepat();
        hitungTotal();
        loadKanban();
    </script>
</body>


</html>
