<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal E-Klinik / UKS (Kesehatan Sekolah) · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal E-Klinik / UKS SIAKAD PLUS — layanan kesehatan sekolah: rekam kunjungan sakit, stok obat UKS, surat rujukan ke puskesmas/RS, izin sakit sinkron presensi, riwayat kesehatan siswa, dan laporan kesehatan berkala.">
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
        .pulse-dot { animation: pulseDot 1.4s ease infinite; }
        @keyframes pulseDot { 0%,100% { opacity: 1; } 50% { opacity: .3; } }
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
                <p class="text-[10px] text-slate-500">Kesehatan Sekolah / UKS</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard E-Klinik</span>
            </button>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🏥</span><span class="flex-1 text-left">Layanan UKS &amp; Pengobatan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="kunjungan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekam Kunjungan Sakit</button>
                    <button data-view="obat" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Stok Obat UKS</button>
                    <button data-view="rujukan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Surat Rujukan</button>
                    <button data-view="izin" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Izin Sakit Sinkron Presensi</button>
                </div>
            </div>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📊</span><span class="flex-1 text-left">Pemantauan Kesehatan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="riwayat" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Riwayat Kesehatan Siswa</button>
                    <button data-view="laporan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Laporan Kesehatan Berkala</button>
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Kesehatan Sekolah / UKS</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard E-Klinik</h1>
                </div>

                <div class="hidden lg:flex items-center flex-1 max-w-md mx-auto">
                    <div class="relative w-full">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                        <input onkeydown="if(event.key==='Enter')cariSiswaQuick(this.value)" placeholder="Cari NISN / Nama Siswa Pasien..."
                            class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                    </div>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <div class="hidden xl:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Pasien Hari Ini</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">14 siswa</p>
                        </div>
                        <span class="text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-200 px-2.5 py-1 rounded-full">UKS 2/4 Bed</span>
                    </div>
                    <button onclick="showToast('info', '2 pasien masih istirahat & 1 obat mendekati kedaluwarsa')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">UK</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Petugas UKS</p>
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
                            <p class="text-sm text-white/85">Total Siswa Sakit Hari Ini</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">14 Siswa</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">🛏️ Ruang Rawat UKS 2/4 Bed Terisi</span>
                                <span class="bg-amber2 px-2.5 py-1 rounded-full text-white">💊 3 Obat Perlu Restok</span>
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">🔗 Sinkron Presensi Aktif</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('kunjungan','Rekam Kunjungan Sakit')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">➕ Catat Pasien Sakit</button>
                            <button onclick="showView('obat','Stok Obat UKS')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">💊 Input Stok Obat</button>
                            <button onclick="showView('izin','Izin Sakit Sinkron Presensi')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔗 Sinkron Izin Sakit</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">🛏️</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Istirahat</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Siswa Sedang Istirahat di UKS</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">2 <span class="text-sm font-bold text-slate-500">siswa</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Dari 4 bed ruang rawat</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">📈</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Minggu Ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Kunjungan Minggu Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">68 <span class="text-sm font-bold text-slate-500">kunjungan</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Rata-rata 13,6/hari</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-600">💊</span>
                            <span class="text-[11px] font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">Warning</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Obat Perlu Restok</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">3 <span class="text-sm font-bold text-slate-500">item</span></p>
                        <p class="text-[11px] text-red-600 mt-1 font-semibold">Termasuk 1 mendekati expired</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">📄</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Oktober</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Surat Rujukan Terbit</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">7 <span class="text-sm font-bold text-slate-500">surat</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Ke Puskesmas &amp; RS</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Siswa Dirawat / Istirahat di UKS Hari Ini</h2><p class="text-xs text-slate-400">Pantauan real-time ruang rawat UKS</p></div>
                                <button onclick="showView('kunjungan','Rekam Kunjungan Sakit')" class="text-[11px] font-bold text-navy">Catat baru</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[900px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr>
                                            <th class="px-4 py-3">NISN</th>
                                            <th class="px-4 py-3">Nama</th>
                                            <th class="px-4 py-3">Kelas</th>
                                            <th class="px-4 py-3">Keluhan</th>
                                            <th class="px-4 py-3">Jam Masuk</th>
                                            <th class="px-4 py-3">Status</th>
                                            <th class="px-4 py-3 text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rawatBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="rawatEmpty" class="hidden py-16 text-center">
                                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🌿</div>
                                <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada siswa di UKS</p>
                                <p class="text-sm text-slate-400">Tidak ada siswa yang sedang istirahat saat ini.</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Tren Keluhan / Diagnosa Dominan Bulan Ini</h2>
                            <div id="chartKeluhan" class="mt-6 flex items-end justify-around gap-3 h-48"></div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-red-500 text-white grid place-items-center text-lg">⚠️</span>
                                <div><h2 class="font-heading font-bold text-slate-800">Peringatan Stok Obat</h2><p class="text-xs text-slate-500">Hampir habis &amp; kedaluwarsa</p></div>
                            </div>
                            <div class="mt-3 space-y-2">
                                <div class="bg-white rounded-xl p-3 border border-red-100 flex items-center justify-between">
                                    <div><p class="text-xs font-bold text-slate-800">Paracetamol 500mg</p><p class="text-[11px] text-red-600 font-semibold">Tersisa 8 tablet · min. 20</p></div>
                                    <span class="text-[10px] font-bold bg-red-100 text-red-800 px-2 py-0.5 rounded-full">Restok</span>
                                </div>
                                <div class="bg-white rounded-xl p-3 border border-red-100 flex items-center justify-between">
                                    <div><p class="text-xs font-bold text-slate-800">Oralit Sachet</p><p class="text-[11px] text-red-600 font-semibold">Tersisa 5 sachet · min. 15</p></div>
                                    <span class="text-[10px] font-bold bg-red-100 text-red-800 px-2 py-0.5 rounded-full">Restok</span>
                                </div>
                                <div class="bg-white rounded-xl p-3 border border-amber-100 flex items-center justify-between">
                                    <div><p class="text-xs font-bold text-slate-800">Betadine 60ml</p><p class="text-[11px] text-amber-700 font-semibold">Expired 12 Nov 2026</p></div>
                                    <span class="text-[10px] font-bold bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full">Segera</span>
                                </div>
                            </div>
                            <button onclick="showView('obat','Stok Obat UKS')" class="mt-3 w-full bg-white border border-red-300 hover:bg-red-100 text-red-800 text-sm font-bold py-2.5 rounded-xl transition-colors">Kelola Stok Obat</button>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Status Sync Presensi</h2>
                                <span class="flex items-center gap-1.5 text-[11px] font-bold text-emerald-700"><span class="w-2 h-2 rounded-full bg-emerald-500 pulse-dot"></span> Aktif</span>
                            </div>
                            <div class="mt-4 space-y-3">
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-blue-50 text-blue-700 grid place-items-center">🔗</span>
                                    <div class="flex-1"><p class="text-xs font-semibold text-slate-700">Sinkron ke Presensi Kelas</p><p class="text-[11px] text-slate-400">Terakhir: 10:24 · 12 izin hari ini</p></div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-700 grid place-items-center">📲</span>
                                    <div class="flex-1"><p class="text-xs font-semibold text-slate-700">Notifikasi WA Orang Tua</p><p class="text-[11px] text-slate-400">Terkirim: 11 dari 12</p></div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-violet-50 text-violet-700 grid place-items-center">👨‍🏫</span>
                                    <div class="flex-1"><p class="text-xs font-semibold text-slate-700">Wali Kelas Diberi Tahu</p><p class="text-[11px] text-slate-400">12 dari 12 kelas terupdate</p></div>
                                </div>
                            </div>
                            <button onclick="showView('izin','Izin Sakit Sinkron Presensi')" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 rounded-xl transition-colors">🔗 Kelola Sinkronisasi</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: REKAM KUNJUNGAN SAKIT ================= -->
            <section id="view-kunjungan" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Rekam Kunjungan Sakit</h2>
                    <p class="text-xs text-slate-400">Input keluhan/diagnosa, tindakan UKS, penyerahan obat, &amp; sinkronisasi presensi otomatis.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Form Input Kunjungan</h3>

                        <div class="mt-4 grid sm:grid-cols-2 gap-3">
                            <div class="relative sm:col-span-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Cari Siswa (NISN / Nama) — Autocomplete</label>
                                <div class="relative mt-1">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                                    <input id="cariSiswa" value="Naufal Hakim" oninput="autocompleteSiswa(this.value)" placeholder="Ketik NISN atau nama siswa..."
                                        class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                                    <div id="acDropdown" class="hidden absolute z-20 left-0 right-0 mt-1 bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Kartu data siswa (& catatan alergi mencolok) -->
                        <div class="mt-4 rounded-2xl border border-slate-100 bg-slate-50 p-4">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-lg flex-shrink-0">NH</div>
                                <div class="min-w-0 flex-1">
                                    <p id="siswaNama" class="font-heading font-bold text-slate-800">Naufal Hakim</p>
                                    <p id="siswaKelas" class="text-xs text-slate-500">NISN 0071234501 · Kelas 10-A · Gol. Darah O</p>
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        <span id="siswaAlergi" class="text-[11px] font-bold bg-red-100 text-red-800 px-2.5 py-1 rounded-full">⚠️ Alergi: Seafood</span>
                                        <span id="siswaPenyakit" class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full">Riwayat: Asma ringan</span>
                                        <span id="siswaKunjungan" class="text-[11px] font-bold bg-blue-100 text-blue-800 px-2.5 py-1 rounded-full">Kunjungan UKS: 4×</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 grid sm:grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal &amp; Waktu Masuk UKS</label>
                                <input type="datetime-local" value="2026-10-17T09:15" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Keluhan Utama</label>
                                <input id="keluhanUtama" value="Demam &amp; pusing sejak pagi" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tanda Vital</label>
                            <div class="mt-1 grid grid-cols-3 gap-3">
                                <div>
                                    <div class="relative"><span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400">°C</span><input value="38.5" class="w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none"></div>
                                    <p class="text-[10px] text-slate-400 mt-1">Suhu Tubuh</p>
                                </div>
                                <div>
                                    <div class="relative"><span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400">mmHg</span><input value="110/70" class="w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none"></div>
                                    <p class="text-[10px] text-slate-400 mt-1">Tekanan Darah</p>
                                </div>
                                <div>
                                    <div class="relative"><span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400">bpm</span><input value="92" class="w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none"></div>
                                    <p class="text-[10px] text-slate-400 mt-1">Detak Jantung</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 grid sm:grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Diagnosa / Kategori Sakit</label>
                                <select class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option>Ringan — dapat ditangani di UKS</option>
                                    <option>Sedang — perlu observasi</option>
                                    <option>Perlu Rujukan ke Faskes</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Obat dari Stok UKS + Dosis</label>
                                <div class="mt-1 flex gap-2">
                                    <select class="flex-1 bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                        <option>Paracetamol 500mg</option>
                                        <option>Antasida</option>
                                        <option>Oralit Sachet</option>
                                        <option>Betadine / Povidone</option>
                                        <option>Vitamin C</option>
                                    </select>
                                    <input value="1 tablet 3×" class="w-28 bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tindakan UKS</label>
                            <div class="mt-2 grid grid-cols-2 sm:grid-cols-4 gap-2">
                                <label class="flex items-center gap-2 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-700 cursor-pointer hover:border-navy"><input type="radio" name="tindakan" class="accent" checked> 🛏️ Istirahat di UKS</label>
                                <label class="flex items-center gap-2 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-700 cursor-pointer hover:border-navy"><input type="radio" name="tindakan" class="accent"> 🏫 Kembali ke Kelas</label>
                                <label class="flex items-center gap-2 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-700 cursor-pointer hover:border-navy"><input type="radio" name="tindakan" class="accent"> 🏠 Diizinkan Pulang</label>
                                <label class="flex items-center gap-2 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-700 cursor-pointer hover:border-navy"><input type="radio" name="tindakan" class="accent"> 🚑 Dirujuk ke RS</label>
                            </div>
                        </div>

                        <label class="mt-4 flex items-start gap-3 rounded-2xl border-2 border-blue-200 bg-blue-50 p-4 cursor-pointer">
                            <input id="syncPresensi" type="checkbox" class="accent mt-0.5" checked>
                            <span>
                                <span class="block text-sm font-bold text-slate-800">✓ Sinkronkan Otomatis ke Presensi Kelas &amp; Kirim Notifikasi WA ke Orang Tua</span>
                                <span class="block text-xs text-slate-500 mt-0.5">Status siswa pada presensi hari ini akan diubah menjadi <span class="font-semibold text-blue-700">"Izin Sakit"</span> dan pesan WA dikirim ke wali murid.</span>
                            </span>
                        </label>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <button onclick="simpanRekam()" class="flex-1 min-w-[200px] bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-3 rounded-xl transition-colors">💾 Simpan Rekam Medis &amp; Sinkron Presensi</button>
                            <button onclick="showView('rujukan','Surat Rujukan')" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-5 py-3 rounded-xl transition-colors">📄 Terbitkan Surat Rujukan</button>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h3 class="font-heading font-bold text-slate-800">Kunjungan Hari Ini</h3>
                            <div id="kunjunganList" class="mt-3 space-y-2">
                                <div class="skeleton h-12 w-full rounded-xl"></div>
                                <div class="skeleton h-12 w-full rounded-xl"></div>
                                <div class="skeleton h-12 w-full rounded-xl"></div>
                            </div>
                        </div>
                        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-5">
                            <div class="flex items-center gap-2"><span class="text-lg">💡</span><h3 class="font-heading font-bold text-slate-800">Catatan Penting UKS</h3></div>
                            <p class="mt-2 text-xs text-slate-600 leading-relaxed">Selalu periksa kolom <span class="font-bold text-red-700">Alergi</span> dan <span class="font-bold text-amber-700">Riwayat Penyakit</span> siswa sebelum memberikan obat. Untuk kasus <span class="font-bold">Perlu Rujukan</span>, terbitkan surat rujukan resmi dengan kop sekolah.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: STOK OBAT UKS ================= -->
            <section id="view-obat" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Stok Obat UKS</h2>
                        <p class="text-xs text-slate-400">Inventaris obat-obatan, peringatan kedaluwarsa, &amp; warning stok minimum.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form tambah obat baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Tambah Obat</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Item Obat</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">24</p>
                        <p class="text-[11px] text-slate-500 mt-1">Jenis obat &amp; alkes</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Stok Aman</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">19</p>
                        <p class="text-[11px] text-slate-500 mt-1">Di atas stok minimum</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Perlu Restok</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-700 mt-1">3</p>
                        <p class="text-[11px] text-slate-500 mt-1">Di bawah stok minimum</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Mendekati Kedaluwarsa</p>
                        <p class="font-heading font-extrabold text-2xl text-red-700 mt-1">1</p>
                        <p class="text-[11px] text-slate-500 mt-1">Dalam 30 hari</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3">
                        <div class="relative flex-1">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchObat" oninput="renderObat()" placeholder="Cari nama obat / kategori..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterObat" onchange="renderObat()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Status</option>
                            <option>Aman</option>
                            <option>Restok</option>
                            <option>Segera Expired</option>
                            <option>Expired</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[880px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama Obat</th>
                                    <th class="px-4 py-3">Kategori</th>
                                    <th class="px-4 py-3 text-center">Stok</th>
                                    <th class="px-4 py-3 text-center">Min. Stok</th>
                                    <th class="px-4 py-3">Kedaluwarsa</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="obatBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="obatEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">💊</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Obat tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: SURAT RUJUKAN ================= -->
            <section id="view-rujukan" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Surat Rujukan</h2>
                    <p class="text-xs text-slate-400">Generator surat rujukan ke Puskesmas / Rumah Sakit lengkap dengan kop sekolah.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Buat Surat Rujukan</h3>
                        <div class="mt-4 space-y-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pilih Pasien</label>
                                <select id="rujukanPasien" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option>Naufal Hakim · 10-A</option>
                                    <option>Fajar Ramadhan · 8-B</option>
                                    <option>Keira Faza · 10-A</option>
                                    <option>Dimas Anggara · 12-D</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tujuan Rujukan</label>
                                <select id="rujukanTujuan" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option>Puskesmas Sukun</option>
                                    <option>RS Umum Saiful Anwar</option>
                                    <option>RS Klinik Sehat Bunda</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Diagnosa / Dugaan Awal</label>
                                <input id="rujukanDiagnosa" value="Demam tinggi, suspek tifoid" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Dokter/Faskes Tujuan</label>
                                <input id="rujukanDokter" value="dr. Ahmad Sp.PD" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none">
                            </div>
                            <button onclick="openSuratRujukan()" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📄 Generate &amp; Pratinjau Surat</button>
                        </div>
                    </div>

                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">Surat Rujukan Terbit</h3>
                            <span class="text-[11px] font-bold bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full">7 bulan ini</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[700px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">No. Surat</th>
                                        <th class="px-4 py-3">Nama Siswa</th>
                                        <th class="px-4 py-3">Tujuan</th>
                                        <th class="px-4 py-3">Tanggal</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="rujukanBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: IZIN SAKIT SINKRON PRESENSI ================= -->
            <section id="view-izin" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Izin Sakit Sinkron Presensi</h2>
                        <p class="text-xs text-slate-400">Auto-sync status "Izin Sakit" ke presensi kelas &amp; portal wali murid/guru.</p>
                    </div>
                    <button onclick="openConfirm('Sinkron Semua Izin','Sinkronkan seluruh status izin sakit hari ini ke presensi kelas & kirim WA orang tua?',()=>showToast('success','Semua izin sakit tersinkron ke presensi'),false)" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔗 Sinkron Semua</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Izin Sakit Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">12</p>
                        <p class="text-[11px] text-slate-500 mt-1">Dari rekam UKS</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Tersinkron</p>
                        <p id="izinSynced" class="font-heading font-extrabold text-2xl text-emerald-700 mt-1">0</p>
                        <p class="text-[11px] text-slate-500 mt-1">Presensi kelas terupdate</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">WA Terkirim</p>
                        <p id="izinWA" class="font-heading font-extrabold text-2xl text-blue-700 mt-1">0</p>
                        <p class="text-[11px] text-slate-500 mt-1">Notifikasi orang tua</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Menunggu Sync</p>
                        <p id="izinPending" class="font-heading font-extrabold text-2xl text-amber-700 mt-1">0</p>
                        <p class="text-[11px] text-slate-500 mt-1">Perlu disinkronkan</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Daftar Izin Sakit &amp; Status Sinkronisasi</h3>
                        <label class="hidden sm:flex items-center gap-2 text-[11px] font-bold text-slate-500"><input type="checkbox" class="accent" checked> Kirim WA otomatis saat sync</label>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[900px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">NISN</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3">Status Presensi</th>
                                    <th class="px-4 py-3">WA Ortu</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="izinBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: RIWAYAT KESEHATAN SISWA ================= -->
            <section id="view-riwayat" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Riwayat Kesehatan Siswa</h2>
                        <p class="text-xs text-slate-400">Database rekam medis siswa: alergi, penyakit bawaan, golongan darah, &amp; riwayat kunjungan.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form cek kesehatan berkala (TB/BB)...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Tambah Data Cek Kesehatan</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div class="relative lg:col-span-2">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
                            <input id="searchRiwayat" oninput="renderRiwayat()" placeholder="Cari NISN / nama siswa..."
                                class="w-full bg-slate-100 rounded-xl pl-9 pr-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-navy/30 placeholder:text-slate-400">
                        </div>
                        <select id="filterKelasRiwayat" onchange="renderRiwayat()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Kelas</option>
                            <option>10-A</option>
                            <option>8-B</option>
                            <option>12-D</option>
                            <option>11-C</option>
                        </select>
                        <select id="filterGolDarah" onchange="renderRiwayat()" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Gol. Darah</option>
                            <option>A</option>
                            <option>B</option>
                            <option>AB</option>
                            <option>O</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1000px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">NISN</th>
                                    <th class="px-4 py-3">Nama Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Gol. Darah</th>
                                    <th class="px-4 py-3">Catatan Alergi</th>
                                    <th class="px-4 py-3">Riwayat Penyakit Khusus</th>
                                    <th class="px-4 py-3 text-center">Total Kunjungan</th>
                                    <th class="px-4 py-3">Status Terakhir</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="riwayatBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="riwayatEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🗂️</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Data kesehatan tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter kelas/golongan darah.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: LAPORAN KESEHATAN BERKALA ================= -->
            <section id="view-laporan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan Kesehatan Berkala</h2>
                        <p class="text-xs text-slate-400">Analytics kunjungan UKS, laporan cek fisik TB/BB, &amp; tren penyakit dominan.</p>
                    </div>
                    <button onclick="showToast('success','Laporan kesehatan bulan Oktober dicetak')" class="bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak Laporan</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Kunjungan Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">284</p>
                        <p class="text-[11px] text-emerald-700 mt-1 font-semibold">↑ 8% vs bulan lalu</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Rata-rata / Hari</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900 mt-1">13,5</p>
                        <p class="text-[11px] text-slate-500 mt-1">Hari efektif sekolah</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Kunjungan Dirujuk</p>
                        <p class="font-heading font-extrabold text-2xl text-red-700 mt-1">7</p>
                        <p class="text-[11px] text-slate-500 mt-1">2,5% dari total kunjungan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Siswa Ikut Cek Fisik</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-700 mt-1">742</p>
                        <p class="text-[11px] text-slate-500 mt-1">58% dari 1.284 siswa</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Kunjungan UKS 6 Bulan Terakhir</h3>
                        <div id="chartBulanan" class="mt-6 flex items-end justify-between gap-3 h-48"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Tren Penyakit Dominan</h3>
                        <div id="trenPenyakit" class="mt-4 space-y-3"></div>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-2 gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Laporan Cek Fisik (TB/BB) Terbaru</h3></div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[520px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Kelas</th>
                                        <th class="px-4 py-3 text-center">Rata TB</th>
                                        <th class="px-4 py-3 text-center">Rata BB</th>
                                        <th class="px-4 py-3">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody id="cekFisikBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Kunjungan UKS Per Kelas</h3></div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[520px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Kelas</th>
                                        <th class="px-4 py-3 text-center">Kunjungan</th>
                                        <th class="px-4 py-3">Keluhan Terbanyak</th>
                                    </tr>
                                </thead>
                                <tbody id="kelasUKSBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🏥</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal E-Klinik / UKS. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Rekam Kunjungan Sakit</span>, <span class="font-semibold text-slate-600">Stok Obat UKS</span>, <span class="font-semibold text-slate-600">Surat Rujukan</span>, <span class="font-semibold text-slate-600">Izin Sakit Sinkron Presensi</span>, <span class="font-semibold text-slate-600">Riwayat Kesehatan</span>, dan <span class="font-semibold text-slate-600">Laporan Kesehatan</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard E-Klinik')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('kunjungan','Rekam Kunjungan Sakit')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Rekam Kunjungan</button>
                        <button onclick="showView('obat','Stok Obat UKS')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Stok Obat</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="border-t border-slate-200 bg-white px-4 sm:px-6 py-5 text-center">
            <p class="text-xs text-slate-400">© 2026 PT Artificial Intelligence Learning Madani Digital · E-Klinik / UKS (Simulasi)</p>
        </footer>
    </div>

    <!-- ============ MODAL: PREVIEW SURAT RUJUKAN ============ -->
    <div id="suratRujukanModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeSuratRujukan()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
            <div class="flex items-start justify-between p-5 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <span class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-700 grid place-items-center text-xl">📄</span>
                    <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Surat Rujukan UKS</h3><p class="text-xs text-slate-400">Pratinjau surat rujukan resmi sekolah</p></div>
                </div>
                <button onclick="closeSuratRujukan()" class="text-slate-400 hover:text-slate-700 text-xl leading-none">✕</button>
            </div>
            <div class="p-5">
                <div class="border-2 border-slate-200 rounded-2xl p-5">
                    <div class="flex items-center gap-3 pb-3 border-b-2 border-slate-800">
                        <div class="w-12 h-12 rounded-full hero-gradient grid place-items-center text-white font-heading font-extrabold">S+</div>
                        <div class="leading-tight text-center flex-1">
                            <p class="font-heading font-bold text-slate-800 text-sm">USAHA KESEHATAN SEKOLAH (UKS)</p>
                            <p class="font-heading font-extrabold text-slate-900">SMAN 1 NUSANTARA</p>
                            <p class="text-[10px] text-slate-500">Jl. Pendidikan No. 1, Malang, Jawa Timur · Telp (0341) 123-456</p>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="font-heading font-extrabold text-slate-900 underline">SURAT RUJUKAN</p>
                        <p class="text-xs text-slate-500">Nomor: SR-UKS/2026/0096</p>
                    </div>
                    <div class="mt-4 text-sm text-slate-700 space-y-1.5">
                        <p>Kepada Yth. Dokter/Petugas Kesehatan</p>
                        <p class="font-bold text-slate-900" id="srTujuan">Puskesmas Sukun</p>
                        <p>di tempat</p>
                        <p class="pt-2">Dengan hormat, sehubungan dengan hasil pemeriksaan UKS, kami merujuk siswa berikut untuk mendapatkan penanganan lebih lanjut:</p>
                    </div>
                    <div class="mt-3 bg-slate-50 rounded-xl p-4 text-sm text-slate-700 space-y-1">
                        <p><span class="inline-block w-28 text-slate-500">Nama Siswa</span>: <span id="srNama" class="font-bold text-slate-900">-</span></p>
                        <p><span class="inline-block w-28 text-slate-500">Kelas / NISN</span>: <span id="srKelas">-</span></p>
                        <p><span class="inline-block w-28 text-slate-500">Diagnosa Awal</span>: <span id="srDiagnosa">-</span></p>
                        <p><span class="inline-block w-28 text-slate-500">Dokter Tujuan</span>: <span id="srDokter">-</span></p>
                    </div>
                    <p class="mt-4 text-sm text-slate-700">Demikian surat rujukan ini dibuat untuk dipergunakan sebagaimana mestinya. Atas perhatian Bapak/Ibu, kami ucapkan terima kasih.</p>
                    <div class="mt-6 flex justify-end">
                        <div class="text-center text-sm text-slate-700">
                            <p>Malang, 17 Oktober 2026</p>
                            <p>Petugas UKS</p>
                            <div class="h-12"></div>
                            <p class="font-bold underline">Siti Aminah, A.Md.Kep</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-5 pb-5 flex gap-2">
                <button onclick="showToast('info','Mengirim surat rujukan ke printer...')" class="flex-1 bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak</button>
                <button onclick="showToast('success','Surat rujukan dicetak sebagai PDF')" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇️ Cetak PDF</button>
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

        // ---------- Badges ----------
        const rawatBadge = { 'Masih Istirahat': 'bg-amber-100 text-amber-800', 'Kembali ke Kelas': 'bg-emerald-100 text-emerald-800', 'Pulang': 'bg-orange-100 text-orange-800', 'Dirujuk': 'bg-red-100 text-red-800' };
        const obatBadge = { 'Aman': 'bg-emerald-100 text-emerald-800', 'Restok': 'bg-amber-100 text-amber-800', 'Segera Expired': 'bg-orange-100 text-orange-800', 'Expired': 'bg-red-100 text-red-800' };
        const rujukanBadge = { 'Terbit': 'bg-emerald-100 text-emerald-800', 'Draft': 'bg-slate-200 text-slate-700', 'Diambil': 'bg-blue-100 text-blue-800' };
        const presensiBadge = { 'Izin Sakit': 'bg-emerald-100 text-emerald-800', 'Belum Sync': 'bg-amber-100 text-amber-800' };
        const waBadge = { 'Terkirim': 'bg-blue-100 text-blue-800', 'Menunggu': 'bg-amber-100 text-amber-800' };
        const riwayatBadge = { 'Izin Sakit': 'bg-amber-100 text-amber-800', 'Kembali ke Kelas': 'bg-emerald-100 text-emerald-800', 'Dirujuk': 'bg-red-100 text-red-800', 'Sehat': 'bg-emerald-100 text-emerald-800' };

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

            if (name === 'dashboard') { loadRawat(); loadChartKeluhan(); }
            if (name === 'kunjungan') loadKunjunganList();
            if (name === 'obat') loadObat();
            if (name === 'rujukan') loadRujukan();
            if (name === 'izin') loadIzin();
            if (name === 'riwayat') loadRiwayat();
            if (name === 'laporan') loadLaporan();

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
        function cariSiswaQuick(val) {
            document.getElementById('cariSiswa').value = val || '';
            showView('kunjungan', 'Rekam Kunjungan Sakit');
        }

        // ---------- MASTER DATA ----------
        const siswaData = [
            { nisn: '0071234501', nama: 'Naufal Hakim', kelas: '10-A', gol: 'O', alergi: 'Seafood', penyakit: 'Asma ringan', kunjungan: 4 },
            { nisn: '0071234502', nama: 'Keira Faza Aishanaya', kelas: '10-A', gol: 'A', alergi: '-', penyakit: '-', kunjungan: 2 },
            { nisn: '0061234504', nama: 'Fajar Ramadhan', kelas: '8-B', gol: 'B', alergi: 'Debu', penyakit: '-', kunjungan: 6 },
            { nisn: '0071234505', nama: 'Aisyah Putri', kelas: '8-B', gol: 'AB', alergi: 'Kacang', penyakit: '-', kunjungan: 1 },
            { nisn: '0071234510', nama: 'Dimas Anggara', kelas: '12-D', gol: 'O', alergi: '-', penyakit: 'Maag kronis', kunjungan: 3 },
            { nisn: '0071234508', nama: 'Gita Puspita Sari', kelas: '11-C', gol: 'A', alergi: 'Udang', penyakit: 'Migrain', kunjungan: 2 }
        ];
        const rawatData = [
            { nisn: '0071234501', nama: 'Naufal Hakim', kelas: '10-A', keluhan: 'Demam 38.5°C', masuk: '09:15', status: 'Masih Istirahat' },
            { nisn: '0061234504', nama: 'Fajar Ramadhan', kelas: '8-B', keluhan: 'Pusing & mual', masuk: '10:40', status: 'Masih Istirahat' },
            { nisn: '0071234502', nama: 'Keira Faza', kelas: '10-A', keluhan: 'Maag', masuk: '08:20', status: 'Kembali ke Kelas' },
            { nisn: '0071234510', nama: 'Dimas Anggara', kelas: '12-D', keluhan: 'Luka lecet kaki', masuk: '07:55', status: 'Kembali ke Kelas' },
            { nisn: '0071234520', nama: 'Bagas Pratama', kelas: '10-B', keluhan: 'Sesak (asma)', masuk: '11:10', status: 'Dirujuk' }
        ];
        const keluhanChart = [['Demam', 42], ['Pusing/Maag', 33], ['Luka Fisik', 27], ['Flu', 21], ['Lainnya', 12]];
        const obatData = [
            { nama: 'Paracetamol 500mg', kategori: 'Analgesik', stok: 8, min: 20, exp: '12/2027', status: 'Restok' },
            { nama: 'Antasida Suspensi', kategori: 'Saluran Cerna', stok: 12, min: 6, exp: '05/2027', status: 'Aman' },
            { nama: 'Oralit Sachet', kategori: 'Rehidrasi', stok: 5, min: 15, exp: '03/2027', status: 'Restok' },
            { nama: 'Betadine 60ml', kategori: 'Antiseptik', stok: 4, min: 3, exp: '12 Nov 2026', status: 'Segera Expired' },
            { nama: 'Vitamin C', kategori: 'Suplemen', stok: 30, min: 10, exp: '08/2027', status: 'Aman' },
            { nama: 'Minyak Kayu Putih', kategori: 'Tradisional', stok: 9, min: 5, exp: '09/2027', status: 'Aman' },
            { nama: 'Ibuprofen 400mg', kategori: 'Analgesik', stok: 18, min: 10, exp: '06/2027', status: 'Aman' },
            { nama: 'Hand Sanitizer 500ml', kategori: 'Alkes', stok: 3, min: 8, exp: '15 Okt 2026', status: 'Expired' }
        ];
        const rujukanData = [
            { no: 'SR-UKS/2026/0091', nama: 'Naufal Hakim', tujuan: 'Puskesmas Sukun', tgl: '15 Okt 2026', status: 'Terbit' },
            { no: 'SR-UKS/2026/0092', nama: 'Fajar Ramadhan', tujuan: 'RS Umum Saiful Anwar', tgl: '12 Okt 2026', status: 'Terbit' },
            { no: 'SR-UKS/2026/0093', nama: 'Dimas Anggara', tujuan: 'Puskesmas Sukun', tgl: '08 Okt 2026', status: 'Diambil' },
            { no: 'SR-UKS/2026/0094', nama: 'Keira Faza', tujuan: 'RS Klinik Sehat Bunda', tgl: '02 Okt 2026', status: 'Terbit' },
            { no: 'SR-UKS/2026/0095', nama: 'Bagas Pratama', tujuan: 'RS Umum Saiful Anwar', tgl: '25 Sep 2026', status: 'Draft' }
        ];
        const izinData = [
            { nisn: '0071234501', nama: 'Naufal Hakim', kelas: '10-A', tgl: '17 Okt 2026', presensi: 'Izin Sakit', wa: 'Terkirim' },
            { nisn: '0071234502', nama: 'Keira Faza Aishanaya', kelas: '10-A', tgl: '17 Okt 2026', presensi: 'Izin Sakit', wa: 'Terkirim' },
            { nisn: '0061234504', nama: 'Fajar Ramadhan', kelas: '8-B', tgl: '17 Okt 2026', presensi: 'Izin Sakit', wa: 'Terkirim' },
            { nisn: '0071234505', nama: 'Aisyah Putri', kelas: '8-B', tgl: '17 Okt 2026', presensi: 'Belum Sync', wa: 'Menunggu' },
            { nisn: '0071234510', nama: 'Dimas Anggara', kelas: '12-D', tgl: '17 Okt 2026', presensi: 'Belum Sync', wa: 'Menunggu' },
            { nisn: '0071234508', nama: 'Gita Puspita Sari', kelas: '11-C', tgl: '17 Okt 2026', presensi: 'Belum Sync', wa: 'Menunggu' }
        ];
        const riwayatData = [
            { nisn: '0071234501', nama: 'Naufal Hakim', kelas: '10-A', gol: 'O', alergi: 'Seafood', penyakit: 'Asma ringan', kunjungan: 4, status: 'Masih Istirahat' },
            { nisn: '0061234504', nama: 'Fajar Ramadhan', kelas: '8-B', gol: 'B', alergi: 'Debu', penyakit: '-', kunjungan: 6, status: 'Masih Istirahat' },
            { nisn: '0071234502', nama: 'Keira Faza Aishanaya', kelas: '10-A', gol: 'A', alergi: '-', penyakit: '-', kunjungan: 2, status: 'Kembali ke Kelas' },
            { nisn: '0071234510', nama: 'Dimas Anggara', kelas: '12-D', gol: 'O', alergi: '-', penyakit: 'Maag kronis', kunjungan: 3, status: 'Kembali ke Kelas' },
            { nisn: '0071234520', nama: 'Bagas Pratama', kelas: '10-B', gol: 'AB', alergi: 'Debu', penyakit: 'Asma', kunjungan: 5, status: 'Dirujuk' },
            { nisn: '0071234508', nama: 'Gita Puspita Sari', kelas: '11-C', gol: 'A', alergi: 'Udang', penyakit: 'Migrain', kunjungan: 2, status: 'Sehat' },
            { nisn: '0071234505', nama: 'Aisyah Putri', kelas: '8-B', gol: 'AB', alergi: 'Kacang', penyakit: '-', kunjungan: 1, status: 'Sehat' }
        ];
        const bulananChart = [['Mei', 188], ['Jun', 205], ['Jul', 210], ['Agu', 245], ['Sep', 263], ['Okt', 284]];
        const trenPenyakitData = [['Demam', 32], ['Maag/Pusing', 24], ['Luka Fisik', 18], ['Flu/ISPA', 15], ['Alergi', 11]];
        const cekFisikData = [['10-A', '163 cm', '52 kg', 'Sehat'], ['8-B', '158 cm', '48 kg', 'Sehat'], ['12-D', '168 cm', '58 kg', '2 siswa kurang gizi'], ['11-C', '161 cm', '51 kg', 'Sehat']];
        const kelasUKSData = [['10-A', 42, 'Demam'], ['8-B', 38, 'Luka ringan'], ['12-D', 31, 'Maag'], ['11-C', 28, 'Pusing']];

        // ---------- DASHBOARD ----------
        function loadRawat() {
            const body = document.getElementById('rawatBody');
            setTimeout(() => {
                if (!rawatData.length) { body.innerHTML = ''; document.getElementById('rawatEmpty').classList.remove('hidden'); return; }
                document.getElementById('rawatEmpty').classList.add('hidden');
                body.innerHTML = rawatData.map((r, i) =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + r.nisn + '</td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + r.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r.kelas + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r.keluhan + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r.masuk + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + rawatBadge[r.status] + ' px-2.5 py-1 rounded-full">' + r.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                    + (r.status === 'Masih Istirahat'
                        ? '<button onclick="selesaiIstirahat(' + i + ')" class="text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-2.5 py-1.5 rounded-lg mr-1">✓ Selesai</button>'
                        : '')
                    + '<button onclick="terbitkanRujukan(\'' + r.nama + '\')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-2.5 py-1.5 rounded-lg whitespace-nowrap">📄 Rujukan</button>'
                    + '</td></tr>'
                ).join('');
            }, 650);
        }
        function selesaiIstirahat(i) {
            rawatData[i].status = 'Kembali ke Kelas';
            loadRawat();
            showToast('success', rawatData[i].nama + ' kembali ke kelas & presensi tersinkron');
        }
        function terbitkanRujukan(nama) {
            const s = siswaData.find(x => x.nama === nama) || siswaData[0];
            showView('rujukan', 'Surat Rujukan');
            document.getElementById('rujukanPasien').value = s.nama + ' · ' + s.kelas;
        }
        function loadChartKeluhan() {
            const chart = document.getElementById('chartKeluhan');
            const max = Math.max.apply(null, keluhanChart.map(k => k[1]));
            setTimeout(() => {
                chart.innerHTML = keluhanChart.map(k =>
                    '<div class="flex-1 flex flex-col items-center justify-end gap-1 h-full">'
                    + '<span class="text-[10px] font-bold text-slate-500">' + k[1] + '</span>'
                    + '<div class="w-full max-w-[60px] rounded-t-lg bg-gradient-to-t from-sky2 to-navy" style="height:' + Math.round((k[1] / max) * 160) + 'px"></div>'
                    + '<span class="text-[11px] font-semibold text-slate-500 text-center">' + k[0] + '</span>'
                    + '</div>'
                ).join('');
            }, 600);
        }

        // ---------- AUTOCOMPLETE SISWA ----------
        function autocompleteSiswa(val) {
            const dd = document.getElementById('acDropdown');
            const q = (val || '').toLowerCase().trim();
            if (!q) { dd.classList.add('hidden'); return; }
            const res = siswaData.filter(s => (s.nama + ' ' + s.nisn).toLowerCase().indexOf(q) !== -1);
            if (!res.length) { dd.innerHTML = '<p class="px-3 py-3 text-xs text-slate-400">Siswa tidak ditemukan</p>'; dd.classList.remove('hidden'); return; }
            dd.innerHTML = res.map(s =>
                '<button onclick="pilihSiswa(\'' + s.nisn + '\')" class="w-full text-left px-3 py-2.5 hover:bg-slate-50 border-b border-slate-50 last:border-0">'
                + '<span class="block text-sm font-semibold text-slate-700">' + s.nama + '</span>'
                + '<span class="block text-[11px] text-slate-400">' + s.nisn + ' · ' + s.kelas + ' · Gol. ' + s.gol + '</span>'
                + '</button>'
            ).join('');
            dd.classList.remove('hidden');
        }
        function pilihSiswa(nisn) {
            const s = siswaData.find(x => x.nisn === nisn);
            if (!s) return;
            document.getElementById('cariSiswa').value = s.nama;
            document.getElementById('siswaNama').textContent = s.nama;
            document.getElementById('siswaKelas').textContent = 'NISN ' + s.nisn + ' · Kelas ' + s.kelas + ' · Gol. Darah ' + s.gol;
            const a = document.getElementById('siswaAlergi');
            a.textContent = s.alergi === '-' ? '✓ Tanpa Alergi' : '⚠️ Alergi: ' + s.alergi;
            a.className = 'text-[11px] font-bold px-2.5 py-1 rounded-full ' + (s.alergi === '-' ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800');
            document.getElementById('siswaPenyakit').textContent = 'Riwayat: ' + (s.penyakit === '-' ? 'Tidak ada' : s.penyakit);
            document.getElementById('siswaKunjungan').textContent = 'Kunjungan UKS: ' + s.kunjungan + '×';
            document.getElementById('acDropdown').classList.add('hidden');
        }
        function simpanRekam() {
            const sync = document.getElementById('syncPresensi').checked;
            const nama = document.getElementById('cariSiswa').value || 'Siswa';
            openConfirm('Simpan Rekam Medis', 'Simpan rekam medis ' + nama + (sync ? ' & sinkronkan ke presensi + kirim WA orang tua?' : ' tanpa sinkron presensi?'),
                () => showToast('success', 'Rekam medis tersimpan' + (sync ? ' — presensi disinkron & WA terkirim ke orang tua' : '')), false);
        }
        let kunjunganListLoaded = false;
        function loadKunjunganList() {
            if (kunjunganListLoaded) return;
            const wrap = document.getElementById('kunjunganList');
            setTimeout(() => {
                wrap.innerHTML = rawatData.map(r =>
                    '<div class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50">'
                    + '<span class="w-9 h-9 rounded-lg bg-slate-100 grid place-items-center text-sm">🤒</span>'
                    + '<div class="min-w-0 flex-1"><p class="text-sm font-semibold text-slate-700 truncate">' + r.nama + ' · ' + r.kelas + '</p><p class="text-[11px] text-slate-400">' + r.keluhan + ' · masuk ' + r.masuk + '</p></div>'
                    + '<span class="text-[10px] font-bold ' + rawatBadge[r.status] + ' px-2 py-0.5 rounded-full whitespace-nowrap">' + (r.status === 'Masih Istirahat' ? 'UKS' : r.status) + '</span>'
                    + '</div>'
                ).join('');
                kunjunganListLoaded = true;
            }, 600);
        }

        // ---------- OBAT ----------
        let obatLoaded = false;
        function loadObat() {
            if (obatLoaded) { renderObat(); return; }
            document.getElementById('obatBody').innerHTML = '<tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(5);
            setTimeout(() => { obatLoaded = true; renderObat(); }, 650);
        }
        function renderObat() {
            const q = (document.getElementById('searchObat').value || '').toLowerCase().trim();
            const st = document.getElementById('filterObat').value;
            const list = obatData.filter(o => {
                if (q && (o.nama + ' ' + o.kategori).toLowerCase().indexOf(q) === -1) return false;
                if (st && o.status !== st) return false;
                return true;
            });
            document.getElementById('obatEmpty').classList.toggle('hidden', list.length > 0);
            document.getElementById('obatBody').innerHTML = list.map(o =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + o.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + o.kategori + '</td>'
                + '<td class="px-4 py-3 text-center font-bold ' + (o.stok < o.min ? 'text-red-700' : 'text-slate-700') + '">' + o.stok + '</td>'
                + '<td class="px-4 py-3 text-center text-slate-400">' + o.min + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + o.exp + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + obatBadge[o.status] + ' px-2.5 py-1 rounded-full">' + o.status + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap"><button onclick="showToast(\'info\',\'Menambah stok ' + o.nama + '\')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg">➕ Restok</button></td>'
                + '</tr>'
            ).join('');
        }

        // ---------- RUJUKAN ----------
        let rujukanLoaded = false;
        function loadRujukan() {
            if (rujukanLoaded) return;
            document.getElementById('rujukanBody').innerHTML = '<tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(4);
            setTimeout(() => {
                document.getElementById('rujukanBody').innerHTML = rujukanData.map(r =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-mono text-xs text-slate-500 whitespace-nowrap">' + r.no + '</td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + r.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r.tujuan + '</td>'
                    + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + r.tgl + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + rujukanBadge[r.status] + ' px-2.5 py-1 rounded-full">' + r.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="openSuratRujukan()" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg">📄 Lihat</button></td>'
                    + '</tr>'
                ).join('');
                rujukanLoaded = true;
            }, 650);
        }
        function openSuratRujukan() {
            const p = document.getElementById('rujukanPasien').value.split(' · ');
            document.getElementById('srNama').textContent = p[0];
            document.getElementById('srKelas').textContent = (p[1] || '') + ' · NISN 0071234501';
            document.getElementById('srDiagnosa').textContent = document.getElementById('rujukanDiagnosa').value;
            document.getElementById('srTujuan').textContent = document.getElementById('rujukanTujuan').value;
            document.getElementById('srDokter').textContent = document.getElementById('rujukanDokter').value;
            const m = document.getElementById('suratRujukanModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeSuratRujukan() { const m = document.getElementById('suratRujukanModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        // ---------- IZIN ----------
        let izinLoaded = false;
        function loadIzin() {
            if (izinLoaded) { renderIzin(); return; }
            document.getElementById('izinBody').innerHTML = '<tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(4);
            setTimeout(() => { izinLoaded = true; renderIzin(); }, 650);
        }
        function renderIzin() {
            document.getElementById('izinSynced').textContent = izinData.filter(i => i.presensi === 'Izin Sakit').length;
            document.getElementById('izinWA').textContent = izinData.filter(i => i.wa === 'Terkirim').length;
            document.getElementById('izinPending').textContent = izinData.filter(i => i.presensi === 'Belum Sync').length;
            document.getElementById('izinBody').innerHTML = izinData.map((i, idx) =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + i.nisn + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + i.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + i.kelas + '</td>'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + i.tgl + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + presensiBadge[i.presensi] + ' px-2.5 py-1 rounded-full">' + i.presensi + '</span></td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + waBadge[i.wa] + ' px-2.5 py-1 rounded-full">' + i.wa + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + (i.presensi === 'Belum Sync'
                    ? '<button onclick="syncIzin(' + idx + ')" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-lg">🔗 Sinkron</button>'
                    : '<span class="text-[11px] font-bold text-emerald-700">✓ Tersinkron</span>')
                + '</td></tr>'
            ).join('');
        }
        function syncIzin(i) {
            izinData[i].presensi = 'Izin Sakit';
            izinData[i].wa = 'Terkirim';
            renderIzin();
            showToast('success', 'Presensi ' + izinData[i].nama + ' disinkron & WA terkirim ke orang tua');
        }

        // ---------- RIWAYAT ----------
        let riwayatLoaded = false;
        function loadRiwayat() {
            if (riwayatLoaded) { renderRiwayat(); return; }
            document.getElementById('riwayatBody').innerHTML = '<tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>'.repeat(5);
            setTimeout(() => { riwayatLoaded = true; renderRiwayat(); }, 650);
        }
        function renderRiwayat() {
            const q = (document.getElementById('searchRiwayat').value || '').toLowerCase().trim();
            const kelas = document.getElementById('filterKelasRiwayat').value;
            const gol = document.getElementById('filterGolDarah').value;
            const list = riwayatData.filter(r => {
                if (q && (r.nama + ' ' + r.nisn).toLowerCase().indexOf(q) === -1) return false;
                if (kelas && r.kelas !== kelas) return false;
                if (gol && r.gol !== gol) return false;
                return true;
            });
            document.getElementById('riwayatEmpty').classList.toggle('hidden', list.length > 0);
            document.getElementById('riwayatBody').innerHTML = list.map(r =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-mono text-xs text-slate-500">' + r.nisn + '</td>'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + r.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + r.kelas + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold bg-slate-100 text-slate-700 px-2.5 py-1 rounded-full">' + r.gol + '</span></td>'
                + '<td class="px-4 py-3">' + (r.alergi === '-' ? '<span class="text-[11px] text-emerald-700 font-semibold">Tanpa alergi</span>' : '<span class="text-[11px] font-bold bg-red-100 text-red-800 px-2.5 py-1 rounded-full">⚠️ ' + r.alergi + '</span>') + '</td>'
                + '<td class="px-4 py-3">' + (r.penyakit === '-' ? '<span class="text-[11px] text-slate-400">-</span>' : '<span class="text-[11px] font-bold bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full">' + r.penyakit + '</span>') + '</td>'
                + '<td class="px-4 py-3 text-center font-bold text-slate-700">' + r.kunjungan + '×</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + riwayatBadge[r.status] + ' px-2.5 py-1 rounded-full whitespace-nowrap">' + r.status + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap"><button onclick="showToast(\'info\',\'Membuka rekam medis ' + r.nama + '\')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-2.5 py-1.5 rounded-lg mr-1">🗂️ Detail</button><button onclick="showToast(\'success\',\'Riwayat kesehatan ' + r.nama + ' dicetak\')" class="text-slate-400 hover:text-navy px-1" title="Cetak Riwayat">🖨️</button></td>'
                + '</tr>'
            ).join('');
        }

        // ---------- LAPORAN ----------
        let laporanLoaded = false;
        function loadLaporan() {
            if (laporanLoaded) return;
            setTimeout(() => {
                const chart = document.getElementById('chartBulanan');
                const max = Math.max.apply(null, bulananChart.map(k => k[1]));
                chart.innerHTML = bulananChart.map(k =>
                    '<div class="flex-1 flex flex-col items-center justify-end gap-1 h-full">'
                    + '<span class="text-[10px] font-bold text-slate-500">' + k[1] + '</span>'
                    + '<div class="w-full max-w-[50px] rounded-t-lg bg-gradient-to-t from-sky2 to-navy" style="height:' + Math.round((k[1] / max) * 160) + 'px"></div>'
                    + '<span class="text-[11px] font-semibold text-slate-500">' + k[0] + '</span>'
                    + '</div>'
                ).join('');
                document.getElementById('trenPenyakit').innerHTML = trenPenyakitData.map(k =>
                    '<div>'
                    + '<div class="flex justify-between text-xs mb-1"><span class="font-semibold text-slate-600">' + k[0] + '</span><span class="font-bold text-slate-800">' + k[1] + '%</span></div>'
                    + '<div class="h-2 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-gradient-to-r from-navy to-sky2" style="width:' + k[1] + '%"></div></div>'
                    + '</div>'
                ).join('');
                document.getElementById('cekFisikBody').innerHTML = cekFisikData.map(r =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + r[0] + '</td>'
                    + '<td class="px-4 py-3 text-center text-slate-600">' + r[1] + '</td>'
                    + '<td class="px-4 py-3 text-center text-slate-600">' + r[2] + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (r[3].indexOf('kurang') !== -1 ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800') + ' px-2.5 py-1 rounded-full">' + r[3] + '</span></td>'
                    + '</tr>'
                ).join('');
                document.getElementById('kelasUKSBody').innerHTML = kelasUKSData.map(r =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + r[0] + '</td>'
                    + '<td class="px-4 py-3 text-center font-bold text-slate-700">' + r[1] + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + r[2] + '</td>'
                    + '</tr>'
                ).join('');
                laporanLoaded = true;
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

        loadRawat();
        loadChartKeluhan();
    </script>
</body>


</html>
