<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal E-Pesantren (Kesantrian & Keuangan Asrama) · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal E-Pesantren SIAKAD PLUS — manajemen kesantrian, perizinan, & keuangan asrama: data santri & kamar, tahfidz/tahsin, kitab kuning, absensi ngaji, izin keluar digital, kunjungan wali, syahriyah, dan tabungan santri.">
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
        .hero-gradient { background: linear-gradient(135deg, #064E3B 0%, #1E40AF 55%, #0284C7 100%); }
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
                <p class="text-[10px] text-slate-500">Manajemen Pesantren</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard E-Pesantren</span>
            </button>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🕌</span><span class="flex-1 text-left">Kesantrian &amp; Akademik</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="santri" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Data Santri &amp; Kamar</button>
                    <button data-view="tahfidz" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tahfidz / Tahsin Tracking</button>
                    <button data-view="kitab" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kitab Kuning Progress</button>
                    <button data-view="kegiatan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kegiatan &amp; Absensi Ngaji</button>
                </div>
            </div>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📜</span><span class="flex-1 text-left">Perizinan &amp; Kunjungan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="izin" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Izin Keluar Digital</button>
                    <button data-view="kunjungan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kunjungan Wali Tercatat</button>
                </div>
            </div>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💰</span><span class="flex-1 text-left">Keuangan Santri</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="syahriyah" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Syahriyah &amp; Tagihan</button>
                    <button data-view="tabungan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tabungan Santri</button>
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Manajemen Pesantren</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard E-Pesantren</h1>
                </div>

                <div class="hidden lg:flex items-center flex-1 max-w-md mx-auto">
                    <div class="relative w-full">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                        <input onkeydown="if(event.key==='Enter')cariSantriQuick(this.value)" placeholder="Cari Nama / NIS Santri / Kamar..."
                            class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                    </div>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <div class="hidden xl:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Santri Aktif</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">486 santri</p>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 rounded-full">Hunian 92%</span>
                    </div>
                    <button onclick="showToast('info', '3 pengajuan izin menunggu & 1 santri terlambat kembali')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">PA</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Pengasuh / Ustadz</p>
                            <p class="text-[10px] text-slate-400">Pondok Al-Hikmah</p>
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
                            <p class="text-sm text-white/85">Total Santri Aktif</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">486 Santri</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">🛏️ Hunian Kamar 92%</span>
                                <span class="bg-emerald2 px-2.5 py-1 rounded-full text-white">📖 Target Tahfidz 78%</span>
                                <span class="bg-amber2 px-2.5 py-1 rounded-full text-white">📜 3 Izin Menunggu</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('tahfidz','Tahfidz / Tahsin Tracking')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">📖 Input Setoran Tahfidz</button>
                            <button onclick="showView('izin','Izin Keluar Digital')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">✅ Persetujuan Izin Pulang</button>
                            <button onclick="showView('kunjungan','Kunjungan Wali Tercatat')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🪪 Catat Kunjungan Wali</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">🛏️</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Asrama</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Santri di Asrama</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">486 <span class="text-sm font-bold text-slate-500">santri</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">12 kamar · 24 blok</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">📜</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Pending</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Permohonan Izin Keluar</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">3 <span class="text-sm font-bold text-slate-500">pengajuan</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Menunggu persetujuan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">📖</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Tahfidz</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Target Tahfidz Tercapai</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">78<span class="text-sm font-bold text-slate-500">%</span></p>
                        <p class="text-[11px] text-blue-700 mt-1 font-semibold">Rata-rata 12 juz/santri</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">💰</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Tabungan</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Saldo Tabungan Santri</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">Rp 318,6 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">486 rekening aktif</p>
                    </div>
                </div>

                <div class="mt-4 grid xl:grid-cols-3 gap-4">
                    <div class="xl:col-span-2 space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Pengajuan Izin Keluar &amp; Pulang Santri</h2><p class="text-xs text-slate-400">Pending approval — perlu ditinjau</p></div>
                                <button onclick="showView('izin','Izin Keluar Digital')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[820px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr>
                                            <th class="px-4 py-3">Nama Santri</th>
                                            <th class="px-4 py-3">Kamar</th>
                                            <th class="px-4 py-3">Alasan Izin</th>
                                            <th class="px-4 py-3">Tgl Kembali</th>
                                            <th class="px-4 py-3 text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="izinPendingBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="izinPendingEmpty" class="hidden py-16 text-center">
                                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">✅</div>
                                <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada pengajuan izin</p>
                                <p class="text-sm text-slate-400">Semua permohonan izin santri telah diproses.</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Statistik Capaian Setoran Tahfidz / Kitab Kuning</h2>
                            <p class="text-xs text-slate-400">Rata-rata setoran per kamar bulan ini</p>
                            <div id="chartTahfidz" class="mt-6 flex items-end justify-around gap-3 h-48"></div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-red-500 text-white grid place-items-center text-lg">🚨</span>
                                <div><h2 class="font-heading font-bold text-slate-800">Terlambat Kembali</h2><p class="text-xs text-slate-500">Overdue pass</p></div>
                            </div>
                            <div class="mt-3 bg-white rounded-xl p-3 border border-red-100">
                                <p class="text-xs font-bold text-slate-800">Muhammad Iqbal · Kamar B-07</p>
                                <p class="text-[11px] text-red-600 font-semibold mt-0.5">Izin pulang · batas kembali 16 Okt 18:00 (terlambat 1 hari)</p>
                                <button onclick="showToast('info','Menghubungi wali santri Muhammad Iqbal...')" class="mt-2 w-full text-[11px] font-bold text-red-800 bg-red-100 hover:bg-red-200 py-1.5 rounded-lg transition-colors">📲 Hubungi Wali Santri</button>
                            </div>
                            <button onclick="showView('izin','Izin Keluar Digital')" class="mt-3 w-full text-[11px] font-bold text-red-800 bg-white border border-red-300 hover:bg-red-100 py-2 rounded-lg transition-colors">Lihat Semua Pass Aktif</button>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Kunjungan Wali Hari Ini</h2>
                                <span class="flex items-center gap-1.5 text-[11px] font-bold text-emerald-700"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Live Gate</span>
                            </div>
                            <div id="gateLog" class="p-3 space-y-2">
                                <div class="skeleton h-12 w-full rounded-xl"></div>
                                <div class="skeleton h-12 w-full rounded-xl"></div>
                                <div class="skeleton h-12 w-full rounded-xl"></div>
                            </div>
                            <div class="px-4 pb-4">
                                <button onclick="showView('kunjungan','Kunjungan Wali Tercatat')" class="w-full text-[11px] font-bold text-navy bg-blue-50 hover:bg-blue-100 py-2 rounded-lg transition-colors">Lihat log lengkap</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: DATA SANTRI & KAMAR ================= -->
            <section id="view-santri" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Data Santri &amp; Kamar</h2>
                        <p class="text-xs text-slate-400">Database santri aktif, alokasi asrama/kamar, pengurus kamar, &amp; bio santri.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form tambah santri baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Santri Baru</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Santri Aktif</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">486</p>
                        <p class="text-[11px] text-slate-500 mt-1">Putra 260 · Putri 226</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Kamar Terisi</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">44 <span class="text-sm font-bold text-slate-500">/ 48</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">4 kamar tersedia</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Pengurus Kamar</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">48</p>
                        <p class="text-[11px] text-slate-500 mt-1">Ketua &amp; wakil tiap kamar</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Santri Baru (2026)</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">64</p>
                        <p class="text-[11px] text-slate-500 mt-1">Angkatan Miftahul Huda</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <div class="relative flex-1">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchSantri" oninput="renderSantri()" placeholder="Cari nama / NIS santri..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterKamarSantri" onchange="renderSantri()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Kamar</option>
                            <option>A-01</option>
                            <option>A-12</option>
                            <option>B-07</option>
                            <option>B-08</option>
                            <option>C-03</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[900px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Santri</th>
                                    <th class="px-4 py-3">NIS</th>
                                    <th class="px-4 py-3">Kamar</th>
                                    <th class="px-4 py-3">Asrama</th>
                                    <th class="px-4 py-3">Wali Santri</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="santriBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="santriEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🧑‍🎓</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Santri tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter kamar.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: TAHFIDZ / TAHSIN ================= -->
            <section id="view-tahfidz" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Tahfidz / Tahsin Tracking</h2>
                        <p class="text-xs text-slate-400">Pencatatan setoran hafalan Al-Qur'an, target juz/surah, &amp; kualitas bacaan.</p>
                    </div>
                    <button onclick="openSetoran()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📖 Input Setoran Baru</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Rata-rata Capaian</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">12,4 <span class="text-sm font-bold text-slate-500">juz</span></p>
                        <p class="text-[11px] text-emerald-700 mt-1 font-semibold">↑ 0,8 juz dari bulan lalu</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Santri On Track</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">394</p>
                        <p class="text-[11px] text-slate-500 mt-1">81% sesuai target</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Perlu Bimbingan</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">92</p>
                        <p class="text-[11px] text-slate-500 mt-1">Di bawah target</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Setoran Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">128</p>
                        <p class="text-[11px] text-slate-500 mt-1">Sesi sorogan &amp; bandongan</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <div class="relative flex-1">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchTahfidz" oninput="renderTahfidz()" placeholder="Cari nama santri..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterKamarTahfidz" onchange="renderTahfidz()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Kamar</option>
                            <option>A-01</option>
                            <option>A-12</option>
                            <option>B-07</option>
                            <option>B-08</option>
                        </select>
                        <select id="filterProgress" onchange="renderTahfidz()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Progress</option>
                            <option>On Track</option>
                            <option>Perlu Bimbingan</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1040px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Santri</th>
                                    <th class="px-4 py-3">NIS</th>
                                    <th class="px-4 py-3">Kamar</th>
                                    <th class="px-4 py-3">Capaian Tahfidz</th>
                                    <th class="px-4 py-3">Capaian Kitab Kuning</th>
                                    <th class="px-4 py-3">Catatan Ustadz</th>
                                    <th class="px-4 py-3">Progress</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tahfidzBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="tahfidzEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📖</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Data setoran tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter progres.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KITAB KUNING ================= -->
            <section id="view-kitab" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Kitab Kuning Progress</h2>
                        <p class="text-xs text-slate-400">Monitoring capaian bab/jilid kitab, setoran sorogan/bandongan, &amp; assessment.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form assessment kitab...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Input Capaian Kitab</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <div class="relative flex-1">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchKitab" oninput="renderKitab()" placeholder="Cari nama santri / kitab..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterKitab" onchange="renderKitab()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Kitab</option>
                            <option>Safinatun Najah</option>
                            <option>Jurumiyah</option>
                            <option>Fathul Qorib</option>
                            <option>Alfiyah</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[940px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Santri</th>
                                    <th class="px-4 py-3">Kamar</th>
                                    <th class="px-4 py-3">Kitab</th>
                                    <th class="px-4 py-3">Capaian Bab/Jilid</th>
                                    <th class="px-4 py-3">Jenis Setoran</th>
                                    <th class="px-4 py-3">Nilai</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="kitabBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="kitabEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📚</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Data kitab tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter kitab.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KEGIATAN & ABSENSI NGAJI ================= -->
            <section id="view-kegiatan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Kegiatan &amp; Absensi Ngaji</h2>
                        <p class="text-xs text-slate-400">Presensi shalat fardhu berjamaah, majlis ta'lim, &amp; kegiatan asrama.</p>
                    </div>
                    <div class="flex gap-2">
                        <input type="date" value="2026-10-17" class="bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                        <button onclick="showToast('info','Membuka rekap absensi kegiatan...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📋 Rekap</button>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-5 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Subuh</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">96%</p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500" style="width:96%"></div></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Dzuhur</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">98%</p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500" style="width:98%"></div></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Ashar</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">94%</p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500" style="width:94%"></div></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Maghrib</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">99%</p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500" style="width:99%"></div></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Isya</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">97%</p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500" style="width:97%"></div></div>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Jadwal &amp; Presensi Kegiatan Asrama</h3>
                        <span class="text-[11px] font-bold bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full">17 Okt 2026</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[760px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Waktu</th>
                                    <th class="px-4 py-3">Kegiatan</th>
                                    <th class="px-4 py-3">Pembimbing</th>
                                    <th class="px-4 py-3 text-center">Hadir</th>
                                    <th class="px-4 py-3 text-center">Izin</th>
                                    <th class="px-4 py-3 text-center">Alpha</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="kegiatanBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: IZIN KELUAR DIGITAL ================= -->
            <section id="view-izin" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Izin Keluar Digital</h2>
                        <p class="text-xs text-slate-400">Form permohonan izin pulang/keluar, multi-level approval, &amp; QR Pass.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form permohonan izin baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Permohonan Izin</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-3 gap-3">
                        <div class="relative sm:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchIzin" oninput="renderIzin()" placeholder="Cari nama santri / kamar / no. surat..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterIzin" onchange="renderIzin()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Status</option>
                            <option>Permohonan</option>
                            <option>Disetujui</option>
                            <option>Di Luar Asrama</option>
                            <option>Kembali</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1120px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">No. Surat</th>
                                    <th class="px-4 py-3">Nama Santri</th>
                                    <th class="px-4 py-3">Kamar</th>
                                    <th class="px-4 py-3">Jenis Izin</th>
                                    <th class="px-4 py-3">Alasan &amp; Tanggal</th>
                                    <th class="px-4 py-3">Approval</th>
                                    <th class="px-4 py-3 text-center">QR Pass</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="izinBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="izinEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📜</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Pengajuan izin tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KUNJUNGAN WALI ================= -->
            <section id="view-kunjungan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Kunjungan Wali Tercatat</h2>
                        <p class="text-xs text-slate-400">Log registrasi kedatangan wali santri, barcode scan masuk, &amp; durasi kunjungan.</p>
                    </div>
                    <button onclick="showToast('info','Buka mode scan barcode wali di pos gerbang...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🪪 Catat Kedatangan Wali</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Kunjungan Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">23</p>
                        <p class="text-[11px] text-slate-500 mt-1">Wali santri</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Masih di Dalam</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">4</p>
                        <p class="text-[11px] text-slate-500 mt-1">Belum check-out</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Rata-rata Durasi</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">42 <span class="text-sm font-bold text-slate-500">menit</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Per kunjungan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Minggu Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">148</p>
                        <p class="text-[11px] text-slate-500 mt-1">Total kunjungan</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Log Kedatangan Wali Santri</h3></div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[900px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Jam Masuk</th>
                                    <th class="px-4 py-3">Nama Wali</th>
                                    <th class="px-4 py-3">Santri Dikunjungi</th>
                                    <th class="px-4 py-3">Kamar</th>
                                    <th class="px-4 py-3">Keperluan</th>
                                    <th class="px-4 py-3">Durasi</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="kunjunganBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: SYAHRIYAH & TAGIHAN ================= -->
            <section id="view-syahriyah" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Syahriyah &amp; Tagihan Asrama</h2>
                        <p class="text-xs text-slate-400">Manajemen tagihan uang makan/sewa asrama, status bayar, &amp; invoice digital.</p>
                    </div>
                    <button onclick="showToast('success','Invoice syahriyah bulan Oktober diterbitkan')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🧾 Terbitkan Invoice</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Tagihan Oktober</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">486</p>
                        <p class="text-[11px] text-slate-500 mt-1">Santri aktif</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Sudah Lunas</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">412</p>
                        <p class="text-[11px] text-slate-500 mt-1">84,7%</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Tunggakan</p>
                        <p class="font-heading font-extrabold text-2xl text-red-700 mt-1">74</p>
                        <p class="text-[11px] text-slate-500 mt-1">Belum bayar</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Omzet Terkumpul</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 206,0 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">Dari Rp 243 jt</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-3 gap-3">
                        <div class="relative sm:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchSyahriyah" oninput="renderSyahriyah()" placeholder="Cari nama santri / no. invoice..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterSyahriyah" onchange="renderSyahriyah()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Status</option>
                            <option>Lunas</option>
                            <option>Belum Bayar</option>
                            <option>Cicilan</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[960px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">No. Invoice</th>
                                    <th class="px-4 py-3">Nama Santri</th>
                                    <th class="px-4 py-3">Kamar</th>
                                    <th class="px-4 py-3">Periode</th>
                                    <th class="px-4 py-3 text-right">Nominal</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="syahriyahBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="syahriyahEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🧾</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tagihan tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: TABUNGAN SANTRI ================= -->
            <section id="view-tabungan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Tabungan Santri</h2>
                        <p class="text-xs text-slate-400">Rekapitulasi saldo tabungan digital, limit jajan asrama, &amp; histori setoran/penarikan.</p>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="showToast('info','Membuka form setoran tabungan...')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Setoran</button>
                        <button onclick="showToast('info','Membuka form penarikan tabungan...')" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➖ Penarikan</button>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Saldo</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">Rp 318,6 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">486 rekening</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Setoran Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">Rp 64,2 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">742 transaksi</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Penarikan Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">Rp 41,8 jt</p>
                        <p class="text-[11px] text-slate-500 mt-1">618 transaksi</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Saldo di Bawah Limit</p>
                        <p class="font-heading font-extrabold text-2xl text-red-700 mt-1">17</p>
                        <p class="text-[11px] text-slate-500 mt-1">Perlu diinfokan wali</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                            <h3 class="font-heading font-bold text-slate-800 flex-1">Rekap Saldo Tabungan</h3>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                                <input id="searchTabungan" oninput="renderTabungan()" placeholder="Cari nama santri..."
                                    class="bg-slate-100 rounded-xl pl-9 pr-3 py-2 text-sm outline-none placeholder:text-slate-400 w-full sm:w-56">
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[720px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Nama Santri</th>
                                        <th class="px-4 py-3">Kamar</th>
                                        <th class="px-4 py-3 text-right">Saldo</th>
                                        <th class="px-4 py-3">Limit Jajan</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabunganBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Histori Transaksi Terbaru</h3></div>
                        <div id="historiTabungan" class="p-3 space-y-2">
                            <div class="skeleton h-12 w-full rounded-xl"></div>
                            <div class="skeleton h-12 w-full rounded-xl"></div>
                            <div class="skeleton h-12 w-full rounded-xl"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🕌</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal E-Pesantren. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Data Santri &amp; Kamar</span>, <span class="font-semibold text-slate-600">Tahfidz/Tahsin</span>, <span class="font-semibold text-slate-600">Kitab Kuning</span>, <span class="font-semibold text-slate-600">Kegiatan &amp; Absensi</span>, <span class="font-semibold text-slate-600">Izin Keluar Digital</span>, <span class="font-semibold text-slate-600">Kunjungan Wali</span>, <span class="font-semibold text-slate-600">Syahriyah</span>, dan <span class="font-semibold text-slate-600">Tabungan Santri</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard E-Pesantren')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('tahfidz','Tahfidz / Tahsin Tracking')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Tahfidz</button>
                        <button onclick="showView('izin','Izin Keluar Digital')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Perizinan</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="border-t border-slate-200 bg-white px-4 sm:px-6 py-5 text-center">
            <p class="text-xs text-slate-400">© 2026 PT Artificial Intelligence Learning Madani Digital · E-Pesantren (Simulasi)</p>
        </footer>
    </div>

    <!-- ============ MODAL: QR GATE PASS ============ -->
    <div id="qrModal" class="fixed inset-0 z-[65] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" onclick="closeQR()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-sm overflow-hidden">
            <div class="hero-gradient text-white px-6 py-5 text-center relative overflow-hidden">
                <div class="absolute inset-0 grid-pattern"></div>
                <div class="relative z-10">
                    <p class="text-[11px] font-semibold text-white/80 uppercase tracking-wider">QR Gate Pass · Pondok Al-Hikmah</p>
                    <h3 id="qrSantri" class="font-heading font-extrabold text-lg mt-1">Nama Santri</h3>
                    <p id="qrKamar" class="text-xs text-white/85">Kamar -</p>
                </div>
            </div>
            <div class="p-6 text-center">
                <div class="mx-auto w-48 h-48 rounded-2xl border-4 border-slate-900 p-3 bg-white">
                    <div class="w-full h-full qr-grid rounded-lg opacity-90"></div>
                </div>
                <p id="qrNo" class="mt-4 font-mono text-xs text-slate-500">IZN-2026-000</p>
                <div class="mt-4 grid grid-cols-2 gap-2 text-left">
                    <div class="bg-slate-50 rounded-xl px-3 py-2"><p class="text-[10px] font-semibold text-slate-400 uppercase">Berlaku Sampai</p><p id="qrBatas" class="text-xs font-bold text-slate-800">-</p></div>
                    <div class="bg-slate-50 rounded-xl px-3 py-2"><p class="text-[10px] font-semibold text-slate-400 uppercase">Status</p><p id="qrStatus" class="text-xs font-bold text-emerald-700">Disetujui</p></div>
                </div>
                <p class="mt-3 text-[11px] text-slate-400">Tunjukkan QR ini ke petugas pos gerbang untuk scan keluar/masuk.</p>
                <div class="mt-5 flex gap-2">
                    <button onclick="closeQR()" class="flex-1 text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
                    <button onclick="showToast('success','QR Pass dikirim ke wali santri via WhatsApp')" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📲 Kirim ke Wali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: INPUT SETORAN TAHFIDZ ============ -->
    <div id="setoranModal" class="fixed inset-0 z-[65] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" onclick="closeSetoran()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto no-scrollbar">
            <div class="sticky top-0 bg-white px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Input Setoran Tahfidz</h3><p class="text-xs text-slate-400">Catat setoran hafalan &amp; kualitas bacaan santri.</p></div>
                <button onclick="closeSetoran()" class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500">✕</button>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="text-xs font-bold text-slate-600">Nama Santri</label>
                    <select id="setSantri" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                        <option>Ahmad Fauzan · A-12</option>
                        <option>Rizki Maulana · A-05</option>
                        <option>Siti Nurhaliza · B-08</option>
                        <option>Dewi Lestari · C-03</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-xs font-bold text-slate-600">Surah / Juz</label>
                        <input value="Juz 30 · An-Naba'" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-600">Ayat / Halaman</label>
                        <input value="Ayat 1-20" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                    </div>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-600">Kualitas Bacaan (Tajwid)</label>
                    <div class="mt-2 flex gap-2">
                        <label class="flex-1 cursor-pointer"><input type="radio" name="nilai" class="peer sr-only" checked><span class="block text-center text-sm font-bold rounded-xl border border-slate-200 peer-checked:bg-emerald-600 peer-checked:text-white peer-checked:border-emerald-600 py-2.5 transition-colors">A — Mumtaz</span></label>
                        <label class="flex-1 cursor-pointer"><input type="radio" name="nilai" class="peer sr-only"><span class="block text-center text-sm font-bold rounded-xl border border-slate-200 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 py-2.5 transition-colors">B — Jayyid</span></label>
                        <label class="flex-1 cursor-pointer"><input type="radio" name="nilai" class="peer sr-only"><span class="block text-center text-sm font-bold rounded-xl border border-slate-200 peer-checked:bg-amber-500 peer-checked:text-white peer-checked:border-amber-500 py-2.5 transition-colors">C — Perlu Ulang</span></label>
                    </div>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-600">Catatan Ustadz</label>
                    <textarea rows="2" placeholder="Catatan tajwid, makhorijul huruf, kelancaran..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none placeholder:text-slate-400"></textarea>
                </div>
                <label class="flex items-center gap-2.5 cursor-pointer bg-emerald-50 border border-emerald-200 rounded-xl px-3 py-3">
                    <input type="checkbox" checked class="accent w-4 h-4">
                    <span class="text-sm text-slate-700">Kirim notifikasi WhatsApp ke wali santri</span>
                </label>
            </div>
            <div class="sticky bottom-0 bg-white px-6 py-4 border-t border-slate-100 flex justify-end gap-2">
                <button onclick="closeSetoran()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="submitSetoran()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan Setoran</button>
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

        const izinBadge = { 'Permohonan': 'bg-amber-100 text-amber-800', 'Disetujui': 'bg-blue-100 text-blue-800', 'Di Luar Asrama': 'bg-violet-100 text-violet-800', 'Kembali': 'bg-emerald-100 text-emerald-800' };
        const progBadge = { 'On Track': 'bg-emerald-100 text-emerald-800', 'Perlu Bimbingan': 'bg-amber-100 text-amber-800' };
        const bayarBadge = { 'Lunas': 'bg-emerald-100 text-emerald-800', 'Belum Bayar': 'bg-red-100 text-red-800', 'Cicilan': 'bg-amber-100 text-amber-800' };
        const nilaiBadge = { 'A': 'bg-emerald-100 text-emerald-800', 'B': 'bg-blue-100 text-blue-800', 'C': 'bg-amber-100 text-amber-800' };

        const views = document.querySelectorAll('.view');
        function showView(name, title) {
            views.forEach(v => v.classList.remove('active'));
            const el = document.getElementById('view-' + name);
            if (el) el.classList.add('active');
            if (title) document.getElementById('pageTitle').textContent = title.replace(/&amp;/g, '&');
            document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
            const active = document.querySelector('.menu-item[data-view="' + name + '"]');
            if (active) active.classList.add('active');

            if (name === 'santri') renderSantri();
            if (name === 'tahfidz') renderTahfidz();
            if (name === 'kitab') renderKitab();
            if (name === 'kegiatan') renderKegiatan();
            if (name === 'izin') renderIzin();
            if (name === 'kunjungan') renderKunjungan();
            if (name === 'syahriyah') renderSyahriyah();
            if (name === 'tabungan') renderTabungan();

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
        function cariSantriQuick(val) {
            const s = document.getElementById('searchSantri');
            if (s) s.value = val || '';
            showView('santri', 'Data Santri & Kamar');
            renderSantri();
        }

        // ---------- MASTER DATA ----------
        const santri = [
            { nis: '0071234601', nama: 'Ahmad Fauzan', kamar: 'A-12', asrama: 'Asrama Putra', wali: 'Bpk. Suryanto', status: 'Aktif' },
            { nis: '0071234602', nama: 'Rizki Maulana', kamar: 'A-05', asrama: 'Asrama Putra', wali: 'Bpk. Hadi', status: 'Aktif' },
            { nis: '0071234603', nama: 'Siti Nurhaliza', kamar: 'B-08', asrama: 'Asrama Putri', wali: 'Bpk. Nur Salim', status: 'Aktif' },
            { nis: '0071234604', nama: 'Dewi Lestari', kamar: 'C-03', asrama: 'Asrama Putri', wali: 'Ibu Sriyati', status: 'Aktif' },
            { nis: '0071234605', nama: 'Fajar Nugroho', kamar: 'A-01', asrama: 'Asrama Putra', wali: 'Bpk. Gunawan', status: 'Aktif' },
            { nis: '0071234606', nama: 'Muhammad Iqbal', kamar: 'B-07', asrama: 'Asrama Putra', wali: 'Bpk. Sulaiman', status: 'Izin' },
            { nis: '0071234607', nama: 'Nur Aini', kamar: 'B-14', asrama: 'Asrama Putri', wali: 'Bpk. Ahmad', status: 'Aktif' },
            { nis: '0071234608', nama: 'Hafiz Rizki', kamar: 'A-02', asrama: 'Asrama Putra', wali: 'Bpk. Zainal', status: 'Aktif' }
        ];
        const tahfidz = [
            { nama: 'Ahmad Fauzan', nis: '0071234601', kamar: 'A-12', juz: 'Juz 15', kitab: 'Juz 12', catatan: 'Tajwid baik, kelancaran mantap', prog: 'On Track' },
            { nama: 'Rizki Maulana', nis: '0071234602', kamar: 'A-05', juz: 'Juz 8', kitab: 'Juz 6', catatan: 'Perlu murojaah rutin', prog: 'Perlu Bimbingan' },
            { nama: 'Siti Nurhaliza', nis: '0071234603', kamar: 'B-08', juz: 'Juz 20', kitab: 'Juz 18', catatan: 'Sangat lancar, siap juz 21', prog: 'On Track' },
            { nama: 'Dewi Lestari', nis: '0071234604', kamar: 'C-03', juz: 'Juz 10', kitab: 'Juz 9', catatan: 'Makhorijul huruf diperbaiki', prog: 'Perlu Bimbingan' },
            { nama: 'Fajar Nugroho', nis: '0071234605', kamar: 'A-01', juz: 'Juz 30', kitab: 'Juz 28', catatan: 'Hafalan juz 30 solid', prog: 'On Track' },
            { nama: 'Muhammad Iqbal', nis: '0071234606', kamar: 'B-07', juz: 'Juz 5', kitab: 'Juz 4', catatan: 'Perlu pendampingan ustadz', prog: 'Perlu Bimbingan' }
        ];
        const kitab = [
            { nama: 'Ahmad Fauzan', kamar: 'A-12', kitab: 'Safinatun Najah', capaian: 'Bab 12 / 20', jenis: 'Sorogan', nilai: 'A', status: 'Lancar' },
            { nama: 'Rizki Maulana', kamar: 'A-05', kitab: 'Jurumiyah', capaian: 'Bab 5 / 20', jenis: 'Bandongan', nilai: 'B', status: 'Proses' },
            { nama: 'Siti Nurhaliza', kamar: 'B-08', kitab: 'Fathul Qorib', capaian: 'Bab 18 / 30', jenis: 'Sorogan', nilai: 'A', status: 'Lancar' },
            { nama: 'Dewi Lestari', kamar: 'C-03', kitab: 'Alfiyah', capaian: 'Bab 3 / 40', jenis: 'Bandongan', nilai: 'C', status: 'Perlu Ulang' },
            { nama: 'Fajar Nugroho', kamar: 'A-01', kitab: 'Safinatun Najah', capaian: 'Bab 20 / 20', jenis: 'Sorogan', nilai: 'A', status: 'Khatam' }
        ];
        const kegiatan = [
            { waktu: '04:30', nama: 'Shalat Subuh Berjamaah', pembina: 'Ust. Abdurrahman', hadir: 466, izin: 12, alpha: 8, status: 'Selesai' },
            { waktu: '05:30', nama: 'Sorogan Al-Qur\'an', pembina: 'Ust. Hafidz', hadir: 452, izin: 20, alpha: 14, status: 'Selesai' },
            { waktu: '12:15', nama: 'Shalat Dzuhur Berjamaah', pembina: 'Ust. Abdurrahman', hadir: 478, izin: 6, alpha: 2, status: 'Selesai' },
            { waktu: '15:30', nama: 'Majlis Ta\'lim (Bandongan)', pembina: 'KH. Ahmad Syafi\'i', hadir: 440, izin: 24, alpha: 22, status: 'Berlangsung' },
            { waktu: '18:00', nama: 'Shalat Maghrib & Tadarus', pembina: 'Ust. Zainuddin', hadir: 0, izin: 0, alpha: 0, status: 'Terjadwal' },
            { waktu: '19:30', nama: 'Belajar Malam (Muhtadi)', pembina: 'Pengurus Kamar', hadir: 0, izin: 0, alpha: 0, status: 'Terjadwal' },
            { waktu: '20:00', nama: 'Shalat Isya Berjamaah', pembina: 'Ust. Abdurrahman', hadir: 0, izin: 0, alpha: 0, status: 'Terjadwal' }
        ];
        let izinData = [
            { no: 'IZN-2026-0184', nama: 'Muhammad Iqbal', kamar: 'B-07', jenis: 'Pulang', alasan: 'Acara keluarga', tgl: '16 Okt 2026', apv: 'Disetujui', status: 'Di Luar Asrama' },
            { no: 'IZN-2026-0185', nama: 'Ahmad Fauzan', kamar: 'A-12', jenis: 'Keluar Kota', alasan: 'Lomba MTQ', tgl: '18 Okt 2026', apv: 'Disetujui', status: 'Disetujui' },
            { no: 'IZN-2026-0186', nama: 'Rizki Maulana', kamar: 'A-05', jenis: 'Pulang', alasan: 'Sakit (kontrol dokter)', tgl: '18 Okt 2026', apv: 'Menunggu', status: 'Permohonan' },
            { no: 'IZN-2026-0187', nama: 'Dewi Lestari', kamar: 'C-03', jenis: 'Keluar Belanja', alasan: 'Beli kebutuhan sekolah', tgl: '17 Okt 2026', apv: 'Menunggu', status: 'Permohonan' },
            { no: 'IZN-2026-0183', nama: 'Siti Nurhaliza', kamar: 'B-08', jenis: 'Pulang', alasan: 'Walimah saudara', tgl: '14 Okt 2026', apv: 'Disetujui', status: 'Kembali' }
        ];
        const kunjungan = [
            { jam: '09:15', wali: 'Bpk. Suryanto', santri: 'Ahmad Fauzan', kamar: 'A-12', keperluan: 'Membawa perlengkapan', durasi: '45 menit', status: 'Selesai' },
            { jam: '09:50', wali: 'Ibu Sriyati', santri: 'Dewi Lestari', kamar: 'C-03', keperluan: 'Menjenguk sakit', durasi: '30 menit', status: 'Selesai' },
            { jam: '10:20', wali: 'Bpk. Sulaiman', santri: 'Muhammad Iqbal', kamar: 'B-07', keperluan: 'Koordinasi izin pulang', durasi: '-', status: 'Di Dalam' },
            { jam: '10:45', wali: 'Bpk. Nur Salim', santri: 'Siti Nurhaliza', kamar: 'B-08', keperluan: 'Kirim uang saku', durasi: '-', status: 'Di Dalam' },
            { jam: '11:10', wali: 'Bpk. Gunawan', santri: 'Fajar Nugroho', kamar: 'A-01', keperluan: 'Bawa obat', durasi: '25 menit', status: 'Selesai' }
        ];
        const syahriyah = [
            { inv: 'SYH-2026-10-0461', nama: 'Ahmad Fauzan', kamar: 'A-12', periode: 'Oktober 2026', nominal: 500000, status: 'Lunas' },
            { inv: 'SYH-2026-10-0462', nama: 'Rizki Maulana', kamar: 'A-05', periode: 'Oktober 2026', nominal: 500000, status: 'Belum Bayar' },
            { inv: 'SYH-2026-10-0463', nama: 'Siti Nurhaliza', kamar: 'B-08', periode: 'Oktober 2026', nominal: 550000, status: 'Lunas' },
            { inv: 'SYH-2026-10-0464', nama: 'Dewi Lestari', kamar: 'C-03', periode: 'Oktober 2026', nominal: 500000, status: 'Cicilan' },
            { inv: 'SYH-2026-10-0465', nama: 'Fajar Nugroho', kamar: 'A-01', periode: 'Oktober 2026', nominal: 500000, status: 'Belum Bayar' },
            { inv: 'SYH-2026-10-0466', nama: 'Muhammad Iqbal', kamar: 'B-07', periode: 'Oktober 2026', nominal: 500000, status: 'Lunas' }
        ];
        const tabungan = [
            { nama: 'Ahmad Fauzan', kamar: 'A-12', saldo: 1250000, limit: 'Rp 50.000 / hari' },
            { nama: 'Rizki Maulana', kamar: 'A-05', saldo: 285000, limit: 'Rp 30.000 / hari' },
            { nama: 'Siti Nurhaliza', kamar: 'B-08', saldo: 940000, limit: 'Rp 50.000 / hari' },
            { nama: 'Dewi Lestari', kamar: 'C-03', saldo: 175000, limit: 'Rp 25.000 / hari' },
            { nama: 'Fajar Nugroho', kamar: 'A-01', saldo: 620000, limit: 'Rp 40.000 / hari' },
            { nama: 'Muhammad Iqbal', kamar: 'B-07', saldo: 45000, limit: 'Rp 20.000 / hari' }
        ];
        const histori = [
            { tipe: 'Setoran', nama: 'Ahmad Fauzan', nominal: 200000, waktu: '10:15' },
            { tipe: 'Penarikan', nama: 'Fajar Nugroho', nominal: 25000, waktu: '09:40' },
            { tipe: 'Setoran', nama: 'Siti Nurhaliza', nominal: 150000, waktu: '09:05' },
            { tipe: 'Penarikan', nama: 'Rizki Maulana', nominal: 30000, waktu: '08:20' }
        ];

        // ---------- RENDER: SANTRI ----------
        function renderSantri() {
            const q = (document.getElementById('searchSantri').value || '').toLowerCase();
            const kam = document.getElementById('filterKamarSantri').value;
            const rows = santri.filter(s => (!q || s.nama.toLowerCase().includes(q) || s.nis.includes(q)) && (!kam || s.kamar === kam));
            const body = document.getElementById('santriBody');
            document.getElementById('santriEmpty').classList.toggle('hidden', rows.length > 0);
            const stBadge = { 'Aktif': 'bg-emerald-100 text-emerald-800', 'Izin': 'bg-amber-100 text-amber-800' };
            body.innerHTML = rows.map(s =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(s.nama) + '<span class="font-semibold text-slate-800">' + s.nama + '</span></div></td>'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + s.nis + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + s.kamar + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + s.asrama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + s.wali + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + stBadge[s.status] + ' px-2.5 py-1 rounded-full">' + s.status + '</span></td>'
                + '<td class="px-4 py-3 text-right"><button onclick="showToast(\'info\',\'Membuka bio ' + s.nama + '\')" class="text-xs font-bold text-navy hover:underline">Detail Bio</button></td>'
                + '</tr>').join('');
        }

        // ---------- RENDER: TAHFIDZ ----------
        function renderTahfidz() {
            const q = (document.getElementById('searchTahfidz').value || '').toLowerCase();
            const kam = document.getElementById('filterKamarTahfidz').value;
            const pr = document.getElementById('filterProgress').value;
            const rows = tahfidz.filter(t => (!q || t.nama.toLowerCase().includes(q)) && (!kam || t.kamar === kam) && (!pr || t.prog === pr));
            document.getElementById('tahfidzEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('tahfidzBody').innerHTML = rows.map(t =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(t.nama) + '<span class="font-semibold text-slate-800">' + t.nama + '</span></div></td>'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + t.nis + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + t.kamar + '</td>'
                + '<td class="px-4 py-3"><span class="font-heading font-extrabold text-slate-900">' + t.juz + '</span></td>'
                + '<td class="px-4 py-3 text-slate-600">' + t.kitab + '</td>'
                + '<td class="px-4 py-3 text-xs text-slate-500 max-w-[220px]">' + t.catatan + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + progBadge[t.prog] + ' px-2.5 py-1 rounded-full">' + t.prog + '</span></td>'
                + '<td class="px-4 py-3 text-right space-x-2 whitespace-nowrap"><button onclick="openSetoran()" class="text-xs font-bold text-navy hover:underline">Input Setoran</button><button onclick="showToast(\'info\',\'Histori setoran ' + t.nama + '\')" class="text-xs font-bold text-slate-400 hover:underline">Histori</button></td>'
                + '</tr>').join('');
        }

        // ---------- RENDER: KITAB ----------
        function renderKitab() {
            const q = (document.getElementById('searchKitab').value || '').toLowerCase();
            const kt = document.getElementById('filterKitab').value;
            const rows = kitab.filter(k => (!q || k.nama.toLowerCase().includes(q) || k.kitab.toLowerCase().includes(q)) && (!kt || k.kitab === kt));
            const statBadge = { 'Lancar': 'bg-emerald-100 text-emerald-800', 'Khatam': 'bg-blue-100 text-blue-800', 'Proses': 'bg-slate-100 text-slate-600', 'Perlu Ulang': 'bg-amber-100 text-amber-800' };
            document.getElementById('kitabEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('kitabBody').innerHTML = rows.map(k =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(k.nama) + '<span class="font-semibold text-slate-800">' + k.nama + '</span></div></td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + k.kamar + '</td>'
                + '<td class="px-4 py-3 text-slate-700">' + k.kitab + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-900">' + k.capaian + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold bg-slate-100 text-slate-600 px-2.5 py-1 rounded-full">' + k.jenis + '</span></td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + nilaiBadge[k.nilai] + ' px-2.5 py-1 rounded-full">' + k.nilai + '</span></td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statBadge[k.status] + ' px-2.5 py-1 rounded-full">' + k.status + '</span></td>'
                + '</tr>').join('');
        }

        // ---------- RENDER: KEGIATAN ----------
        function renderKegiatan() {
            const statBadge = { 'Selesai': 'bg-emerald-100 text-emerald-800', 'Berlangsung': 'bg-amber-100 text-amber-800', 'Terjadwal': 'bg-slate-100 text-slate-600' };
            document.getElementById('kegiatanBody').innerHTML = kegiatan.map(k =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + k.waktu + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-800">' + k.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + k.pembina + '</td>'
                + '<td class="px-4 py-3 text-center font-bold text-emerald-700">' + k.hadir + '</td>'
                + '<td class="px-4 py-3 text-center font-bold text-amber-700">' + k.izin + '</td>'
                + '<td class="px-4 py-3 text-center font-bold text-red-700">' + k.alpha + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statBadge[k.status] + ' px-2.5 py-1 rounded-full">' + k.status + '</span></td>'
                + '</tr>').join('');
        }

        // ---------- RENDER: IZIN ----------
        function renderIzin() {
            const q = (document.getElementById('searchIzin').value || '').toLowerCase();
            const st = document.getElementById('filterIzin').value;
            const rows = izinData.filter(i => (!q || i.nama.toLowerCase().includes(q) || i.kamar.toLowerCase().includes(q) || i.no.toLowerCase().includes(q)) && (!st || i.status === st));
            document.getElementById('izinEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('izinBody').innerHTML = rows.map(i => {
                const apv = i.apv === 'Disetujui' ? 'bg-emerald-100 text-emerald-800' : i.apv === 'Menunggu' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-600';
                const act = i.status === 'Permohonan'
                    ? '<button onclick="approveIzin(\'' + i.no + '\')" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1.5 rounded-lg">Setujui</button>'
                    : '<button onclick="openQR(\'' + i.nama + '\',\'' + i.kamar + '\',\'' + i.no + '\')" class="text-xs font-bold text-navy hover:underline">Lihat QR</button>';
                return '<tr class="hover:bg-slate-50">'
                    + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + i.no + '</td>'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(i.nama) + '<span class="font-semibold text-slate-800">' + i.nama + '</span></div></td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + i.kamar + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + i.jenis + '</td>'
                    + '<td class="px-4 py-3"><p class="text-slate-700">' + i.alasan + '</p><p class="text-[11px] text-slate-400">' + i.tgl + '</p></td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + apv + ' px-2.5 py-1 rounded-full">' + i.apv + '</span></td>'
                    + '<td class="px-4 py-3 text-center"><button onclick="openQR(\'' + i.nama + '\',\'' + i.kamar + '\',\'' + i.no + '\')" class="text-lg" title="QR Gate Pass">🔳</button></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap"><span class="text-[11px] font-bold ' + izinBadge[i.status] + ' px-2.5 py-1 rounded-full mr-2">' + i.status + '</span>' + act + '</td>'
                    + '</tr>';
            }).join('');
        }
        function approveIzin(no) {
            openConfirm('Setujui Permohonan Izin', 'Pengajuan ' + no + ' akan disetujui & QR Pass diterbitkan.', () => {
                const it = izinData.find(i => i.no === no);
                if (it) { it.apv = 'Disetujui'; it.status = 'Disetujui'; }
                renderIzin(); renderIzinPending();
                showToast('success', 'Izin ' + no + ' disetujui · QR Pass diterbitkan');
            });
        }

        // ---------- RENDER: KUNJUNGAN ----------
        function renderKunjungan() {
            const statBadge = { 'Selesai': 'bg-emerald-100 text-emerald-800', 'Di Dalam': 'bg-amber-100 text-amber-800' };
            document.getElementById('kunjunganBody').innerHTML = kunjungan.map(k =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + k.jam + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-800">' + k.wali + '</td>'
                + '<td class="px-4 py-3 text-slate-700">' + k.santri + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + k.kamar + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + k.keperluan + '</td>'
                + '<td class="px-4 py-3 text-slate-600">' + k.durasi + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + statBadge[k.status] + ' px-2.5 py-1 rounded-full">' + k.status + '</span></td>'
                + '</tr>').join('');
        }

        // ---------- RENDER: SYAHRIYAH ----------
        function renderSyahriyah() {
            const q = (document.getElementById('searchSyahriyah').value || '').toLowerCase();
            const st = document.getElementById('filterSyahriyah').value;
            const rows = syahriyah.filter(s => (!q || s.nama.toLowerCase().includes(q) || s.inv.toLowerCase().includes(q)) && (!st || s.status === st));
            document.getElementById('syahriyahEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('syahriyahBody').innerHTML = rows.map(s =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + s.inv + '</td>'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(s.nama) + '<span class="font-semibold text-slate-800">' + s.nama + '</span></div></td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + s.kamar + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + s.periode + '</td>'
                + '<td class="px-4 py-3 text-right font-semibold text-slate-900">' + fmtRp(s.nominal) + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + bayarBadge[s.status] + ' px-2.5 py-1 rounded-full">' + s.status + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap"><button onclick="showToast(\'info\',\'Invoice ' + s.inv + ' dibuka\')" class="text-xs font-bold text-navy hover:underline">Invoice</button></td>'
                + '</tr>').join('');
        }

        // ---------- RENDER: TABUNGAN ----------
        function renderTabungan() {
            const q = (document.getElementById('searchTabungan').value || '').toLowerCase();
            const rows = tabungan.filter(t => (!q || t.nama.toLowerCase().includes(q)));
            document.getElementById('tabunganBody').innerHTML = rows.map(t => {
                const low = t.saldo < 50000;
                return '<tr class="hover:bg-slate-50">'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(t.nama) + '<span class="font-semibold text-slate-800">' + t.nama + '</span></div></td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + t.kamar + '</td>'
                    + '<td class="px-4 py-3 text-right font-heading font-extrabold ' + (low ? 'text-red-700' : 'text-slate-900') + '">' + fmtRp(t.saldo) + '</td>'
                    + '<td class="px-4 py-3 text-xs text-slate-500">' + t.limit + '</td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="showToast(\'info\',\'Melihat mutasi tabungan ' + t.nama + '\')" class="text-xs font-bold text-navy hover:underline">Mutasi</button></td>'
                    + '</tr>';
            }).join('');
            renderHistori();
        }
        function renderHistori() {
            const wrap = document.getElementById('historiTabungan');
            if (!wrap) return;
            wrap.innerHTML = histori.map(h => {
                const setor = h.tipe === 'Setoran';
                return '<div class="flex items-center gap-3 bg-slate-50 rounded-xl px-3 py-2.5">'
                    + '<span class="w-8 h-8 rounded-lg ' + (setor ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700') + ' grid place-items-center text-sm">' + (setor ? '↓' : '↑') + '</span>'
                    + '<div class="min-w-0"><p class="text-sm font-semibold text-slate-800 truncate">' + h.nama + '</p><p class="text-[11px] text-slate-400">' + h.tipe + ' · ' + h.waktu + '</p></div>'
                    + '<span class="ml-auto text-sm font-bold ' + (setor ? 'text-emerald-700' : 'text-amber-700') + '">' + (setor ? '+' : '−') + fmtRp(h.nominal) + '</span>'
                    + '</div>';
            }).join('');
        }

        // ---------- DASHBOARD ----------
        function renderIzinPending() {
            const rows = izinData.filter(i => i.status === 'Permohonan');
            document.getElementById('izinPendingEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('izinPendingBody').innerHTML = rows.map(i =>
                '<tr class="hover:bg-slate-50">'
                + '<td class="px-4 py-3"><div class="flex items-center gap-3">' + avatar(i.nama) + '<span class="font-semibold text-slate-800">' + i.nama + '</span></div></td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + i.kamar + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + i.alasan + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + i.tgl + '</td>'
                + '<td class="px-4 py-3 text-right"><button onclick="approveIzin(\'' + i.no + '\')" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1.5 rounded-lg">Setujui</button></td>'
                + '</tr>').join('');
        }
        function renderChartTahfidz() {
            const wrap = document.getElementById('chartTahfidz');
            if (!wrap) return;
            const data = [ { k: 'A-01', v: 78 }, { k: 'A-12', v: 92 }, { k: 'B-07', v: 64 }, { k: 'B-08', v: 88 }, { k: 'C-03', v: 71 } ];
            wrap.innerHTML = data.map(d =>
                '<div class="flex flex-col items-center gap-2 flex-1">'
                + '<span class="text-[11px] font-bold text-slate-600">' + d.v + '</span>'
                + '<div class="w-full max-w-[42px] rounded-t-lg hero-gradient transition-all" style="height:' + (d.v * 1.4) + 'px"></div>'
                + '<span class="text-[10px] font-semibold text-slate-400">' + d.k + '</span>'
                + '</div>').join('');
        }
        function loadGateLog() {
            const wrap = document.getElementById('gateLog');
            if (!wrap) return;
            wrap.innerHTML = kunjungan.slice(0, 3).map(k =>
                '<div class="flex items-center gap-3 bg-slate-50 rounded-xl px-3 py-2.5">'
                + '<span class="w-8 h-8 rounded-lg bg-blue-100 text-blue-700 grid place-items-center text-sm">🪪</span>'
                + '<div class="min-w-0"><p class="text-sm font-semibold text-slate-800 truncate">' + k.wali + '</p><p class="text-[11px] text-slate-400">' + k.santri + ' · ' + k.kamar + '</p></div>'
                + '<div class="ml-auto text-right"><p class="text-xs font-bold text-slate-700">' + k.jam + '</p><span class="text-[10px] font-bold ' + (k.status === 'Selesai' ? 'text-emerald-700' : 'text-amber-700') + '">' + k.status + '</span></div>'
                + '</div>').join('');
        }

        // ---------- MODALS ----------
        function openSetoran() { document.getElementById('setoranModal').classList.remove('hidden'); document.getElementById('setoranModal').classList.add('flex'); }
        function closeSetoran() { document.getElementById('setoranModal').classList.add('hidden'); document.getElementById('setoranModal').classList.remove('flex'); }
        function submitSetoran() {
            closeSetoran();
            showToast('success', 'Setoran tahfidz tersimpan · notifikasi WA terkirim ke wali');
        }
        function openQR(nama, kamar, no) {
            document.getElementById('qrSantri').textContent = nama;
            document.getElementById('qrKamar').textContent = 'Kamar ' + kamar;
            document.getElementById('qrNo').textContent = no;
            document.getElementById('qrBatas').textContent = '18 Okt 2026 · 18:00';
            document.getElementById('qrModal').classList.remove('hidden');
            document.getElementById('qrModal').classList.add('flex');
        }
        function closeQR() { document.getElementById('qrModal').classList.add('hidden'); document.getElementById('qrModal').classList.remove('flex'); }
        let confirmCb = null;
        function openConfirm(title, msg, cb) {
            document.getElementById('confirmTitle').textContent = title;
            document.getElementById('confirmMsg').textContent = msg;
            confirmCb = cb;
            document.getElementById('confirmModal').classList.remove('hidden');
            document.getElementById('confirmModal').classList.add('flex');
        }
        function closeConfirm() { document.getElementById('confirmModal').classList.add('hidden'); document.getElementById('confirmModal').classList.remove('flex'); confirmCb = null; }
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
            renderIzinPending();
            renderChartTahfidz();
            loadGateLog();
            renderHistori();
        });
    </script>
</body>

</html>
