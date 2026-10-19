<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal E-HRD (Kepegawaian) · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal E-HRD SIAKAD PLUS — pusat pengelolaan kepegawaian sekolah: database guru & tendik, presensi geo-tagging, cuti & lembur, payroll, slip gaji digital, penilaian kinerja (PKG), diklat & sertifikasi, serta kontrak PKWT.">
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
        <div class="flex items-center gap-3 px-5 h-16 border-b border-white/10 flex-shrink-0">
            <div class="w-9 h-9 rounded-xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-sm">S+</div>
            <div class="leading-tight">
                <p class="font-heading font-bold text-white text-sm">SIAKAD PLUS</p>
                <p class="text-[10px] text-slate-500">Kepegawaian · HRD</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard E-HRD</span>
            </button>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>👥</span><span class="flex-1 text-left">Data &amp; Presensi Pegawai</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="pegawai" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Database Pegawai</button>
                    <button data-view="presensi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Presensi &amp; Keterlambatan</button>
                    <button data-view="cuti" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Cuti, Izin &amp; Lembur</button>
                    <button data-view="mutasi-jabatan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Mutasi &amp; Jabatan</button>
                </div>
            </div>

            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💰</span><span class="flex-1 text-left">Penggajian &amp; Payroll</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="komponen" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Komponen Gaji &amp; Tunjangan</button>
                    <button data-view="slip" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Slip Gaji Digital</button>
                    <button data-view="rekap" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekap Payroll Bulanan</button>
                </div>
            </div>

            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📈</span><span class="flex-1 text-left">Pengembangan &amp; Kinerja</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="pkg" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Penilaian Kinerja (PKG)</button>
                    <button data-view="diklat" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Diklat &amp; Sertifikasi</button>
                    <button data-view="kontrak" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kontrak &amp; PKWT</button>
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
                <div class="leading-tight min-w-0">
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Kepegawaian · HRD</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard E-HRD</h1>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <div class="hidden xl:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Pegawai Aktif</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">68 orang</p>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 rounded-full">Hadir 94%</span>
                    </div>
                    <div class="hidden md:flex items-center gap-3 bg-amber-50 rounded-xl px-3 py-2 border border-amber-100">
                        <div class="leading-tight">
                            <p class="text-[10px] text-amber-600 font-semibold uppercase tracking-wider">Cuti Pending</p>
                            <p class="text-sm font-heading font-extrabold text-amber-700">4 permohonan</p>
                        </div>
                    </div>
                    <button onclick="showToast('info', '4 permohonan cuti & 2 kontrak segera habis')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">HR</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">HRD Sekolah</p>
                            <p class="text-[10px] text-slate-400">Yayasan AI Learning</p>
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
                            <p class="text-sm text-white/85">Total Pegawai Aktif (Guru &amp; Tendik)</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">68 Orang</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">● Operasional Kepegawaian Normal</span>
                                <span class="bg-emerald2 px-2.5 py-1 rounded-full text-white">👥 52 Guru · 16 Tendik</span>
                                <span class="bg-amber2 px-2.5 py-1 rounded-full text-white">📋 4 Cuti Pending</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('pegawai','Database Pegawai')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">➕ Tambah Pegawai</button>
                            <button onclick="showView('rekap','Rekap Payroll Bulanan')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">💰 Proses Payroll</button>
                            <button onclick="showView('cuti','Cuti, Izin &amp; Lembur')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📋 Persetujuan Cuti</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">👥</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Aktif</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Pegawai Aktif</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">68</p>
                        <p class="text-[11px] text-slate-500 mt-1">Guru 52 · Tendik 16</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">✅</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Hari ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Kehadiran Hari Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">94%</p>
                        <div class="mt-2 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald-500 rounded-full" style="width:94%"></div></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">📋</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Pending</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Permohonan Cuti Pending</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">4 <span class="text-sm font-bold text-slate-500">permohonan</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Menunggu persetujuan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-600">⏳</span>
                            <span class="text-[11px] font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">&lt;30 Hari</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Kontrak Segera Habis</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">2 <span class="text-sm font-bold text-slate-500">pegawai</span></p>
                        <p class="text-[11px] text-red-600 mt-1 font-semibold">Perlu perpanjangan PKWT</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Pengajuan Cuti &amp; Izin Terbaru</h2><p class="text-xs text-slate-400">Pending approval — perlu tindakan</p></div>
                                <button onclick="showView('cuti','Cuti, Izin &amp; Lembur')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[740px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr>
                                            <th class="px-4 py-3">Pegawai</th>
                                            <th class="px-4 py-3">Jenis</th>
                                            <th class="px-4 py-3">Tanggal</th>
                                            <th class="px-4 py-3 text-center">Durasi</th>
                                            <th class="px-4 py-3 text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cutiBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="cutiEmpty" class="hidden py-16 text-center">
                                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">✅</div>
                                <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada pengajuan tertunda</p>
                                <p class="text-sm text-slate-400">Semua permohonan cuti/izin telah diproses.</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Rekapitulasi Kehadiran Pegawai Bulan Ini</h2><p class="text-xs text-slate-400">Oktober 2026 · 68 pegawai</p></div>
                                <button onclick="showView('presensi','Presensi &amp; Keterlambatan')" class="text-[11px] font-bold text-navy">Detail presensi</button>
                            </div>
                            <div class="mt-6 flex items-end gap-3 sm:gap-6 h-48">
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <span class="text-[11px] font-bold text-slate-600">86%</span>
                                    <div class="w-full flex items-end justify-center h-36"><div class="w-8 bg-emerald-500 rounded-t" style="height:86%"></div></div>
                                    <span class="text-[10px] font-semibold text-slate-500 text-center">Tepat<br>Waktu</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <span class="text-[11px] font-bold text-slate-600">7%</span>
                                    <div class="w-full flex items-end justify-center h-36"><div class="w-8 bg-amber-500 rounded-t" style="height:7%"></div></div>
                                    <span class="text-[10px] font-semibold text-slate-500 text-center">Terlambat</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <span class="text-[11px] font-bold text-slate-600">4%</span>
                                    <div class="w-full flex items-end justify-center h-36"><div class="w-8 bg-blue-500 rounded-t" style="height:4%"></div></div>
                                    <span class="text-[10px] font-semibold text-slate-500 text-center">Cuti</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <span class="text-[11px] font-bold text-slate-600">2%</span>
                                    <div class="w-full flex items-end justify-center h-36"><div class="w-8 bg-sky-400 rounded-t" style="height:2%"></div></div>
                                    <span class="text-[10px] font-semibold text-slate-500 text-center">Izin</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center gap-2">
                                    <span class="text-[11px] font-bold text-slate-600">1%</span>
                                    <div class="w-full flex items-end justify-center h-36"><div class="w-8 bg-red-500 rounded-t" style="height:1%"></div></div>
                                    <span class="text-[10px] font-semibold text-slate-500 text-center">Alpa</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-lg">⏳</span>
                                <div>
                                    <h2 class="font-heading font-bold text-slate-800">Peringatan Kontrak PKWT</h2>
                                    <p class="text-[11px] text-slate-400">Segera berakhir (&lt;30 hari)</p>
                                </div>
                            </div>
                            <div class="mt-4 space-y-2.5">
                                <div class="flex items-center justify-between bg-red-50 border border-red-100 rounded-xl px-3 py-2.5">
                                    <div><p class="text-sm font-bold text-slate-800">Dewi Lestari, S.Psi</p><p class="text-[11px] text-slate-500">GTT · Guru BK</p></div>
                                    <span class="text-[11px] font-bold text-red-700 bg-red-100 px-2 py-1 rounded-full">8 hari</span>
                                </div>
                                <div class="flex items-center justify-between bg-amber-50 border border-amber-100 rounded-xl px-3 py-2.5">
                                    <div><p class="text-sm font-bold text-slate-800">Joko Susilo</p><p class="text-[11px] text-slate-500">PTT · Teknisi Sarpras</p></div>
                                    <span class="text-[11px] font-bold text-amber-700 bg-amber-100 px-2 py-1 rounded-full">14 hari</span>
                                </div>
                            </div>
                            <button onclick="showView('kontrak','Kontrak &amp; PKWT')" class="mt-4 w-full bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">Kelola Kontrak</button>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Pengeluaran Payroll Bulan Ini</h2>
                            <p class="text-xs text-slate-400 mt-1">Oktober 2026 · 68 pegawai</p>
                            <p class="mt-4 font-heading font-extrabold text-2xl text-slate-900">Rp 312.450.000</p>
                            <div class="mt-4 space-y-2 text-xs">
                                <div class="flex justify-between"><span class="text-slate-500">Gaji Pokok</span><span class="font-bold text-slate-800">Rp 214.800.000</span></div>
                                <div class="flex justify-between"><span class="text-slate-500">Total Tunjangan</span><span class="font-bold text-emerald-700">+ Rp 121.500.000</span></div>
                                <div class="flex justify-between"><span class="text-slate-500">Potongan BPJS/Absensi</span><span class="font-bold text-red-600">- Rp 23.850.000</span></div>
                            </div>
                            <button onclick="showView('rekap','Rekap Payroll Bulanan')" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">💰 Proses Payroll Bulanan</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: DATABASE PEGAWAI ================= -->
            <section id="view-pegawai" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Database Pegawai (Guru &amp; Tendik)</h2>
                        <p class="text-xs text-slate-400">Data induk kepegawaian: NUPTK/NIP, status kepegawaian, jabatan, berkas SK, dan riwayat sertifikasi.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="showToast('success','Data pegawai diekspor ke Excel')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Export Excel</button>
                        <button onclick="showToast('info','Membuka form tambah pegawai baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Tambah Pegawai</button>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Status Kepegawaian</label>
                        <select id="filterStatus" onchange="applyFilterPegawai()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Status</option>
                            <option>GTY</option>
                            <option>GTT</option>
                            <option>PNS</option>
                            <option>PTT</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Jabatan</label>
                        <select id="filterJabatan" onchange="applyFilterPegawai()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua Jabatan</option>
                            <option>Kepala Sekolah</option>
                            <option>Guru</option>
                            <option>Wali Kelas</option>
                            <option>Staf TU</option>
                            <option>Tenaga Teknis</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Cari Nama / NUPTK</label>
                        <input id="searchPegawai" type="text" oninput="applyFilterPegawai()" placeholder="Cari nama pegawai atau NUPTK/NIP..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 placeholder:text-slate-400">
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1080px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Pegawai</th>
                                    <th class="px-4 py-3">NUPTK / NIP</th>
                                    <th class="px-4 py-3">Jabatan / Mapel</th>
                                    <th class="px-4 py-3">Status Kepegawaian</th>
                                    <th class="px-4 py-3">Presensi Hari Ini</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pegawaiBody" class="divide-y divide-slate-50">
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="pegawaiEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🔍</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Pegawai tidak ditemukan</p>
                        <p class="text-sm text-slate-400">Coba ubah filter status, jabatan, atau kata kunci pencarian.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PRESENSI ================= -->
            <section id="view-presensi" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Presensi &amp; Keterlambatan Pegawai</h2>
                        <p class="text-xs text-slate-400">Monitoring absensi Geo-Tagging / Face ID / Fingerprint, rekap jam masuk, dan poin keterlambatan.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <select class="text-sm font-bold text-slate-700 bg-white border border-slate-200 px-4 py-2.5 rounded-xl outline-none">
                            <option>Hari ini · 17 Okt 2026</option>
                            <option>16 Okt 2026</option>
                            <option>15 Okt 2026</option>
                        </select>
                        <button onclick="showToast('success','Rekap presensi diunduh')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇️ Export Rekap</button>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Tepat Waktu</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-600">58</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Terlambat</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-600">5</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Cuti / Izin</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-600">3</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Alpa</p>
                        <p class="font-heading font-extrabold text-2xl text-red-600">2</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1020px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama Pegawai</th>
                                    <th class="px-4 py-3">Jam Masuk</th>
                                    <th class="px-4 py-3">Jam Pulang</th>
                                    <th class="px-4 py-3">Metode</th>
                                    <th class="px-4 py-3">Lokasi (Geo-Tagging)</th>
                                    <th class="px-4 py-3 text-center">Poin Telat</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="presensiBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="presensiEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🕘</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada data presensi</p>
                        <p class="text-sm text-slate-400">Data absensi pegawai akan tampil di sini.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: CUTI & IZIN ================= -->
            <section id="view-cuti" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Cuti, Izin &amp; Lembur</h2>
                    <p class="text-xs text-slate-400">Pengelolaan permohonan cuti/izin/lembur dan dashboard approval HRD/Kepala Sekolah.</p>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Menunggu Persetujuan</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-600" id="cutiPendingCount">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Disetujui</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-600" id="cutiOkCount">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Ditolak</p>
                        <p class="font-heading font-extrabold text-2xl text-red-600" id="cutiNoCount">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Permohonan</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900" id="cutiTotalCount">0</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Daftar Permohonan Cuti / Izin / Lembur</h3></div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[980px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Pegawai</th>
                                    <th class="px-4 py-3">Jenis</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3 text-center">Durasi</th>
                                    <th class="px-4 py-3">Keterangan</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="cutiAllBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="cutiAllEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">✅</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada permohonan</p>
                        <p class="text-sm text-slate-400">Semua permohonan telah diproses.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KOMPONEN GAJI ================= -->
            <section id="view-komponen" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Komponen Gaji &amp; Tunjangan</h2>
                        <p class="text-xs text-slate-400">Setting gaji pokok, tunjangan jabatan/wali kelas, insentif, serta potongan BPJS &amp; absensi.</p>
                    </div>
                    <button onclick="showToast('success','Pengaturan komponen gaji disimpan')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">💾 Simpan Pengaturan</button>
                </div>

                <div class="mt-4 grid lg:grid-cols-2 gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800 flex items-center gap-2"><span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 grid place-items-center">➕</span> Komponen Penerimaan (Tunjangan)</h3>
                        <div class="mt-4 space-y-2.5">
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">Tunjangan Jabatan</span><span class="text-sm font-heading font-extrabold text-slate-900">Rp 750.000</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">Tunjangan Wali Kelas</span><span class="text-sm font-heading font-extrabold text-slate-900">Rp 400.000</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">Tunjangan Fungsional Guru</span><span class="text-sm font-heading font-extrabold text-slate-900">Rp 500.000</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">Insentif Kehadiran Penuh</span><span class="text-sm font-heading font-extrabold text-slate-900">Rp 250.000</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">Tunjangan Transport</span><span class="text-sm font-heading font-extrabold text-slate-900">Rp 300.000</span></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800 flex items-center gap-2"><span class="w-8 h-8 rounded-lg bg-red-100 text-red-600 grid place-items-center">➖</span> Komponen Potongan</h3>
                        <div class="mt-4 space-y-2.5">
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">BPJS Kesehatan (1%)</span><span class="text-sm font-heading font-extrabold text-red-600">- Rp 45.000</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">BPJS Ketenagakerjaan</span><span class="text-sm font-heading font-extrabold text-red-600">- Rp 60.000</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">Potongan Keterlambatan</span><span class="text-sm font-heading font-extrabold text-red-600">- Rp 25.000 / poin</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">Potongan Alpa</span><span class="text-sm font-heading font-extrabold text-red-600">- Rp 150.000 / hari</span></div>
                            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-700">Zakat / Infaq (opsional)</span><span class="text-sm font-heading font-extrabold text-red-600">- 2,5%</span></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: SLIP GAJI ================= -->
            <section id="view-slip" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Slip Gaji Digital</h2>
                        <p class="text-xs text-slate-400">Generator slip gaji bulanan, preview PDF, dan kirim ke email/portal guru.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="showToast('success','Slip gaji dikirim ke email & portal pegawai')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📨 Kirim Semua Slip</button>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Pratinjau Slip Gaji</h3>
                        <div class="mt-4 border border-slate-200 rounded-2xl overflow-hidden">
                            <div class="hero-gradient text-white p-4 flex items-center justify-between relative overflow-hidden">
                                <div class="absolute inset-0 grid-pattern"></div>
                                <div class="relative z-10 flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-white/20 grid place-items-center font-heading font-extrabold text-sm">S+</div>
                                    <div class="leading-tight">
                                        <p class="font-heading font-bold text-sm">SLIP GAJI PEGAWAI</p>
                                        <p class="text-[10px] text-white/80">SMAN 1 Nusantara · Periode Oktober 2026</p>
                                    </div>
                                </div>
                                <span class="relative z-10 text-[10px] font-bold bg-white/20 px-2.5 py-1 rounded-full">DRAF</span>
                            </div>
                            <div class="p-5 grid sm:grid-cols-2 gap-5">
                                <div>
                                    <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Penerimaan</p>
                                    <div class="mt-2 space-y-1.5 text-sm">
                                        <div class="flex justify-between"><span class="text-slate-500">Gaji Pokok</span><span class="font-semibold text-slate-800">Rp 4.800.000</span></div>
                                        <div class="flex justify-between"><span class="text-slate-500">Tunjangan Jabatan</span><span class="font-semibold text-slate-800">Rp 750.000</span></div>
                                        <div class="flex justify-between"><span class="text-slate-500">Tunj. Wali Kelas</span><span class="font-semibold text-slate-800">Rp 400.000</span></div>
                                        <div class="flex justify-between"><span class="text-slate-500">Insentif Kehadiran</span><span class="font-semibold text-slate-800">Rp 250.000</span></div>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Potongan</p>
                                    <div class="mt-2 space-y-1.5 text-sm">
                                        <div class="flex justify-between"><span class="text-slate-500">BPJS Kesehatan</span><span class="font-semibold text-red-600">- Rp 45.000</span></div>
                                        <div class="flex justify-between"><span class="text-slate-500">BPJS Ketenagakerjaan</span><span class="font-semibold text-red-600">- Rp 60.000</span></div>
                                        <div class="flex justify-between"><span class="text-slate-500">Keterlambatan</span><span class="font-semibold text-red-600">- Rp 75.000</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-5 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                                <span class="font-heading font-bold text-slate-700">Take Home Pay</span>
                                <span class="font-heading font-extrabold text-lg text-emerald-700">Rp 6.020.000</span>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <button onclick="showToast('success','Slip gaji diunduh sebagai PDF')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Download PDF</button>
                            <button onclick="window.print()" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak</button>
                            <button onclick="showToast('success','Slip gaji terkirim ke portal guru')" class="text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5 rounded-xl transition-colors">📨 Kirim Slip</button>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Generator Slip</h3>
                        <div class="mt-4 space-y-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pegawai</label>
                                <select id="slipPegawai" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></select>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Bulan / Tahun</label>
                                <select class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option>Oktober 2026</option>
                                    <option>September 2026</option>
                                </select>
                            </div>
                            <button onclick="showToast('success','Slip gaji berhasil digenerate')" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">🧾 Generate Slip Gaji</button>
                        </div>
                        <p class="mt-4 text-[11px] text-slate-400">Slip dapat dikirim otomatis ke email pegawai dan tersedia di Portal Guru.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: REKAP PAYROLL ================= -->
            <section id="view-rekap" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Pemrosesan Payroll &amp; Rekap Bulanan</h2>
                        <p class="text-xs text-slate-400">Kalkulasi gaji otomatis, rekap arus pengeluaran gaji, dan export transfer bank.</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Bulan / Tahun</label>
                        <select id="payBulan" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option>Oktober 2026</option>
                            <option>November 2026</option>
                            <option>September 2026</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Unit</label>
                        <select id="payUnit" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option>Semua Unit</option>
                            <option>TK</option>
                            <option>SD</option>
                            <option>SMP</option>
                            <option>SMA</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button onclick="showToast('success','Kalkulasi payroll otomatis selesai')" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🧮 Kalkulasi Payroll Otomatis</button>
                    </div>
                    <div class="flex items-end">
                        <button onclick="showToast('success','File transfer bank (BSI) diekspor')" class="w-full bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🏦 Export Transfer Bank</button>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Gaji Pokok</p>
                        <p class="font-heading font-extrabold text-xl text-slate-900">Rp 28.900.000</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Tunjangan</p>
                        <p class="font-heading font-extrabold text-xl text-emerald-700">Rp 14.650.000</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Potongan</p>
                        <p class="font-heading font-extrabold text-xl text-red-600">Rp 3.600.000</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Take Home Pay</p>
                        <p class="font-heading font-extrabold text-xl text-blue-700">Rp 39.950.000</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1080px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3"><input id="selectAllPay" type="checkbox" class="accent" onchange="toggleAllPay(this)"></th>
                                    <th class="px-4 py-3">NUPTK / NIP</th>
                                    <th class="px-4 py-3">Nama Pegawai</th>
                                    <th class="px-4 py-3">Jabatan</th>
                                    <th class="px-4 py-3 text-right">Gaji Pokok</th>
                                    <th class="px-4 py-3 text-right">Tunjangan</th>
                                    <th class="px-4 py-3 text-right">Potongan</th>
                                    <th class="px-4 py-3 text-right">Take Home Pay</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="payrollBody" class="divide-y divide-slate-50">
                                <tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="10" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                            <tfoot class="bg-slate-50 border-t border-slate-100">
                                <tr>
                                    <td colspan="7" class="px-4 py-3 text-right font-semibold text-slate-600">Total Take Home Pay Terpilih</td>
                                    <td class="px-4 py-3 text-right font-heading font-extrabold text-slate-900" id="payGrandTotal">Rp 0</td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="mt-4 flex flex-col sm:flex-row gap-2 sm:justify-end">
                    <button onclick="showToast('info','Menampilkan pratinjau slip massal...')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-5 py-3 rounded-xl transition-colors">👁️ Preview Semua Slip</button>
                    <button onclick="openFinalisasi()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-6 py-3 rounded-xl transition-colors">✅ Finalisasi Payroll &amp; Terbitkan Slip Gaji</button>
                </div>
            </section>

            <!-- ================= VIEW: PKG ================= -->
            <section id="view-pkg" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Penilaian Kinerja (PKG)</h2>
                        <p class="text-xs text-slate-400">Instrumen penilaian kinerja guru/staf, kuesioner evaluasi, dan skor KPI.</p>
                    </div>
                    <button onclick="showToast('info','Membuka periode penilaian PKG baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Mulai Penilaian Baru</button>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Rata-rata Skor KPI</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-700">87,4</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Sangat Baik</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-600">21</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Baik</p>
                        <p class="font-heading font-extrabold text-2xl text-sky-600">32</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Perlu Pembinaan</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-600">3</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[900px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama Pegawai</th>
                                    <th class="px-4 py-3">Jabatan</th>
                                    <th class="px-4 py-3 text-center">Skor PKG</th>
                                    <th class="px-4 py-3 text-center">Skor KPI</th>
                                    <th class="px-4 py-3">Predikat</th>
                                    <th class="px-4 py-3">Periode</th>
                                </tr>
                            </thead>
                            <tbody id="pkgBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="pkgEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📈</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada data penilaian</p>
                        <p class="text-sm text-slate-400">Hasil PKG akan tampil di sini.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: DIKLAT ================= -->
            <section id="view-diklat" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Diklat &amp; Sertifikasi</h2>
                        <p class="text-xs text-slate-400">Riwayat pelatihan, workshop, sertifikasi pendidik, dan masa berlakunya.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form catat diklat/sertifikasi...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Catat Diklat</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[980px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama Pegawai</th>
                                    <th class="px-4 py-3">Nama Diklat / Sertifikasi</th>
                                    <th class="px-4 py-3">Penyelenggara</th>
                                    <th class="px-4 py-3 text-center">Tahun</th>
                                    <th class="px-4 py-3">Masa Berlaku</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody id="diklatBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="diklatEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">🎓</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada riwayat diklat</p>
                        <p class="text-sm text-slate-400">Data pelatihan &amp; sertifikasi akan tampil di sini.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KONTRAK ================= -->
            <section id="view-kontrak" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Kontrak &amp; PKWT</h2>
                        <p class="text-xs text-slate-400">Monitoring kontrak kerja pegawai, peringatan masa kontrak habis, dan perpanjangan.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form kontrak kerja baru...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Buat Kontrak</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1000px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama Pegawai</th>
                                    <th class="px-4 py-3">Jenis Kontrak</th>
                                    <th class="px-4 py-3">Mulai</th>
                                    <th class="px-4 py-3">Berakhir</th>
                                    <th class="px-4 py-3 text-center">Sisa Hari</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="kontrakBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="kontrakEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📄</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada data kontrak</p>
                        <p class="text-sm text-slate-400">Data kontrak pegawai akan tampil di sini.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: MUTASI & JABATAN ================= -->
            <section id="view-mutasi-jabatan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Mutasi &amp; Jabatan</h2><p class="text-xs text-slate-400">Riwayat mutasi, promosi, dan jabatan pegawai.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Data mutasi &amp; jabatan dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Tambah Mutasi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Pegawai</th><th class="px-4 py-3">Jabatan Lama</th><th class="px-4 py-3">Jabatan Baru</th><th class="px-4 py-3">Unit</th><th class="px-4 py-3">Tanggal SK</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="mutasi-jabatanBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧩</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal E-HRD. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Database Pegawai</span>, <span class="font-semibold text-slate-600">Presensi</span>, <span class="font-semibold text-slate-600">Cuti &amp; Izin</span>, <span class="font-semibold text-slate-600">Komponen Gaji</span>, <span class="font-semibold text-slate-600">Slip Gaji</span>, <span class="font-semibold text-slate-600">Payroll</span>, <span class="font-semibold text-slate-600">PKG</span>, <span class="font-semibold text-slate-600">Diklat</span>, dan <span class="font-semibold text-slate-600">Kontrak</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard E-HRD')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('pegawai','Database Pegawai')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Database Pegawai</button>
                        <button onclick="showView('rekap','Rekap Payroll Bulanan')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Payroll</button>
                    </div>
                </div>
            </section>



        </main>

        <footer class="px-4 sm:px-6 py-4 text-center text-xs text-slate-400 border-t border-slate-200">
            © 2026 PT Artificial Intelligence Learning Madani Digital · Portal E-HRD (Simulasi)
        </footer>
    </div>

    <!-- ============ MODAL: FINALISASI PAYROLL ============ -->
    <div id="finalModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeFinal()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-700 grid place-items-center text-xl">💰</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Finalisasi Payroll?</h3><p class="text-xs text-slate-400">Slip gaji akan diterbitkan &amp; dikirim otomatis.</p></div>
            </div>
            <div class="mt-4 bg-slate-50 rounded-2xl p-4 text-sm text-slate-600 space-y-1">
                <p>Periode: <span class="font-bold text-slate-800">Oktober 2026</span></p>
                <p>Pegawai terpilih: <span id="finalCount" class="font-bold text-slate-800">0</span></p>
                <p class="text-base">Total Take Home Pay: <span id="finalTotal" class="font-heading font-extrabold text-blue-700">Rp 0</span></p>
            </div>
            <p class="mt-3 text-[11px] text-amber-700 bg-amber-50 border border-amber-100 rounded-xl px-3 py-2">⚠️ Setelah difinalisasi, data payroll periode ini tidak dapat diubah.</p>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closeFinal()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="confirmFinal()" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ya, Finalisasi</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: DETAIL RINCIAN GAJI ============ -->
    <div id="detailModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeDetail()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                    <span class="w-11 h-11 rounded-2xl bg-emerald-100 text-emerald-700 grid place-items-center text-xl">🧾</span>
                    <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Rincian Gaji</h3><p id="detailNama" class="text-xs text-slate-400">Nama Pegawai</p></div>
                </div>
                <button onclick="closeDetail()" class="text-slate-400 hover:text-slate-700 text-xl leading-none">✕</button>
            </div>
            <div id="detailRows" class="mt-5 space-y-2 text-sm"></div>
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
        const avatarColors = ['bg-blue-600', 'bg-emerald-600', 'bg-amber-500', 'bg-rose-500', 'bg-sky-600', 'bg-violet-600', 'bg-teal-600', 'bg-orange-500'];
        function initials(nama) {
            const clean = nama.replace(/^(Drs\.|Dra\.|H\.|Hj\.)\s*/i, '').replace(/,.*$/, '').trim();
            const parts = clean.split(' ').filter(Boolean);
            return ((parts[0] || '?')[0] + (parts[1] ? parts[1][0] : '')).toUpperCase();
        }
        const statusBadge = { 'GTY': 'bg-emerald-100 text-emerald-800', 'GTT': 'bg-amber-100 text-amber-800', 'PNS': 'bg-blue-100 text-blue-800', 'PTT': 'bg-slate-100 text-slate-700' };
        const presensiBadge = { 'Hadir': 'bg-emerald-100 text-emerald-800', 'Tepat Waktu': 'bg-emerald-100 text-emerald-800', 'Terlambat': 'bg-amber-100 text-amber-800', 'Cuti': 'bg-blue-100 text-blue-800', 'Izin': 'bg-sky-100 text-sky-800', 'Alpa': 'bg-red-100 text-red-800' };
        const cutiBadge = { 'Pending': 'bg-amber-100 text-amber-800', 'Disetujui': 'bg-emerald-100 text-emerald-800', 'Ditolak': 'bg-red-100 text-red-800' };
        const payBadge = { 'Draf': 'bg-amber-100 text-amber-800', 'Disetujui': 'bg-blue-100 text-blue-800', 'Telah Dibayar': 'bg-emerald-100 text-emerald-800' };

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

            if (name === 'dashboard') loadCutiPending();
            if (name === 'pegawai') loadPegawai();
            if (name === 'presensi') loadPresensi();
            if (name === 'cuti') loadCuti();
            if (name === 'rekap') loadPayroll();
            if (name === 'slip') loadSlipSelect();
            if (name === 'pkg') loadPkg();
            if (name === 'diklat') loadDiklat();
            if (name === 'kontrak') loadKontrak();
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

        // ---------- DATA PEGAWAI ----------
        const pegawai = [
            { nama: 'Drs. Hadi Purnomo, M.Pd', nuptk: '1935 7506 4', jabatan: 'Kepala Sekolah', mapel: 'Manajemen Sekolah', status: 'PNS', presensi: 'Hadir' },
            { nama: 'Siti Nurhaliza, S.Pd', nuptk: '1992 0310 5', jabatan: 'Guru', mapel: 'Matematika', status: 'PNS', presensi: 'Hadir' },
            { nama: 'Bagas Pratama, S.Kom', nuptk: '1995 0822 6', jabatan: 'Guru', mapel: 'Informatika', status: 'GTY', presensi: 'Terlambat' },
            { nama: 'Rina Wulandari, S.Pd', nuptk: '1994 0115 7', jabatan: 'Guru', mapel: 'Kimia', status: 'GTT', presensi: 'Hadir' },
            { nama: 'Dedi Kurniawan, S.Pd', nuptk: '1990 0705 8', jabatan: 'Wali Kelas', mapel: 'PJOK', status: 'GTY', presensi: 'Cuti' },
            { nama: 'Sri Handayani', nuptk: '1998 1002 9', jabatan: 'Staf TU', mapel: 'Administrasi', status: 'PTT', presensi: 'Hadir' },
            { nama: 'Joko Susilo', nuptk: '1993 0511 1', jabatan: 'Tenaga Teknis', mapel: 'Sarpras', status: 'PTT', presensi: 'Hadir' },
            { nama: 'Dewi Lestari, S.Psi', nuptk: '1996 1219 2', jabatan: 'Guru', mapel: 'Bimbingan Konseling', status: 'GTT', presensi: 'Alpa' }
        ];

        let pegawaiLoaded = false;
        function loadPegawai() {
            if (pegawaiLoaded) { applyFilterPegawai(); return; }
            const body = document.getElementById('pegawaiBody');
            setTimeout(() => {
                body.innerHTML = pegawai.map((p, i) =>
                    '<tr class="hover:bg-slate-50/70 pegawai-row">'
                    + '<td class="px-4 py-3"><div class="flex items-center gap-3"><div class="w-9 h-9 rounded-full ' + avatarColors[i % avatarColors.length] + ' grid place-items-center text-white font-heading font-bold text-xs flex-shrink-0">' + initials(p.nama) + '</div><span class="font-semibold text-slate-700">' + p.nama + '</span></div></td>'
                    + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + p.nuptk + '</td>'
                    + '<td class="px-4 py-3"><p class="font-semibold text-slate-700">' + p.jabatan + '</p><p class="text-[11px] text-slate-400">' + p.mapel + '</p></td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + (statusBadge[p.status] || 'bg-slate-100 text-slate-600') + ' px-2.5 py-1 rounded-full">' + p.status + '</span></td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + presensiBadge[p.presensi] + ' px-2.5 py-1 rounded-full">' + p.presensi + '</span></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                    + '<button onclick="showToast(\'info\',\'Profil: ' + p.nama + '\')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-2.5 py-1.5 rounded-lg mr-1">Profil</button>'
                    + '<button onclick="showView(\'pkg\',\'Penilaian Kinerja (PKG)\')" class="text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 px-2.5 py-1.5 rounded-lg mr-1">PKG</button>'
                    + '<button onclick="showToast(\'info\',\'Edit data ' + p.nama + '\')" class="text-slate-400 hover:text-navy px-1" title="Edit">✏️</button>'
                    + '<button onclick="confirmNonaktif(this.dataset.n)" data-n="' + p.nama + '" class="text-slate-400 hover:text-red-600 px-1" title="Non-aktifkan">🚫</button>'
                    + '</td>'
                    + '</tr>'
                ).join('');
                pegawaiLoaded = true;
                applyFilterPegawai();
                showToast('success', pegawai.length + ' data pegawai dimuat');
            }, 650);
        }
        function applyFilterPegawai() {
            const st = document.getElementById('filterStatus').value;
            const jb = document.getElementById('filterJabatan').value;
            const q = document.getElementById('searchPegawai').value.toLowerCase().trim();
            let visible = 0;
            document.querySelectorAll('.pegawai-row').forEach(r => {
                const c = r.querySelectorAll('td');
                const rowStatus = c[3].textContent.trim();
                const rowJabatan = c[2].querySelector('p').textContent.trim();
                const rowTxt = c[0].textContent.toLowerCase() + ' ' + c[1].textContent.toLowerCase();
                const ok = (!st || rowStatus === st) && (!jb || rowJabatan === jb) && (!q || rowTxt.indexOf(q) !== -1);
                r.classList.toggle('hidden', !ok);
                if (ok) visible++;
            });
            document.getElementById('pegawaiEmpty').classList.toggle('hidden', visible > 0);
        }
        function confirmNonaktif(nama) {
            openConfirm('Non-aktifkan Pegawai?', 'Pegawai "' + nama + '" akan dinonaktifkan dari daftar aktif.', () => {
                showToast('success', 'Pegawai ' + nama + ' dinonaktifkan');
            }, true);
        }

        // ---------- PRESENSI ----------
        const presensiData = [
            { nama: 'Drs. Hadi Purnomo, M.Pd', masuk: '07:02', pulang: '15:30', metode: 'Face ID', lokasi: 'Kantor (Geo ✓)', poin: 0, status: 'Tepat Waktu' },
            { nama: 'Bagas Pratama, S.Kom', masuk: '07:18', pulang: '15:32', metode: 'Fingerprint', lokasi: 'Kantor (Geo ✓)', poin: 1, status: 'Terlambat' },
            { nama: 'Siti Nurhaliza, S.Pd', masuk: '06:58', pulang: '15:31', metode: 'Geo-Tagging', lokasi: 'Kantor (Geo ✓)', poin: 0, status: 'Tepat Waktu' },
            { nama: 'Rina Wulandari, S.Pd', masuk: '07:05', pulang: '15:30', metode: 'Face ID', lokasi: 'Kantor (Geo ✓)', poin: 0, status: 'Tepat Waktu' },
            { nama: 'Dedi Kurniawan, S.Pd', masuk: '-', pulang: '-', metode: 'Face ID', lokasi: '-', poin: 0, status: 'Cuti' },
            { nama: 'Sri Handayani', masuk: '07:10', pulang: '15:30', metode: 'Fingerprint', lokasi: 'Kantor (Geo ✓)', poin: 0, status: 'Tepat Waktu' },
            { nama: 'Joko Susilo', masuk: '06:55', pulang: '15:30', metode: 'Geo-Tagging', lokasi: 'Kantor (Geo ✓)', poin: 0, status: 'Tepat Waktu' },
            { nama: 'Dewi Lestari, S.Psi', masuk: '-', pulang: '-', metode: '-', lokasi: '-', poin: 0, status: 'Alpa' }
        ];
        let presensiLoaded = false;
        function loadPresensi() {
            if (presensiLoaded) return;
            const body = document.getElementById('presensiBody');
            setTimeout(() => {
                body.innerHTML = presensiData.map(p =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + p.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-600">' + p.masuk + '</td>'
                    + '<td class="px-4 py-3 text-slate-600">' + p.pulang + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + p.metode + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + p.lokasi + '</td>'
                    + '<td class="px-4 py-3 text-center"><span class="' + (p.poin > 0 ? 'font-bold text-amber-700' : 'text-slate-500') + '">' + p.poin + '</span></td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + presensiBadge[p.status] + ' px-2.5 py-1 rounded-full">' + p.status + '</span></td>'
                    + '</tr>'
                ).join('');
                presensiLoaded = true;
            }, 650);
        }

        // ---------- CUTI ----------
        const cutiData = [
            { nama: 'Bagas Pratama, S.Kom', jenis: 'Cuti Tahunan', tanggal: '20–22 Okt 2026', durasi: '3 hari', ket: 'Liburan keluarga', status: 'Pending' },
            { nama: 'Sri Handayani', jenis: 'Izin Sakit', tanggal: '17 Okt 2026', durasi: '1 hari', ket: 'Surat dokter terlampir', status: 'Pending' },
            { nama: 'Rina Wulandari, S.Pd', jenis: 'Cuti Melahirkan', tanggal: '1–30 Nov 2026', durasi: '30 hari', ket: 'Cuti melahirkan', status: 'Pending' },
            { nama: 'Dedi Kurniawan, S.Pd', jenis: 'Lembur', tanggal: '15 Okt 2026', durasi: '2 jam', ket: 'Rapat kurikulum', status: 'Pending' },
            { nama: 'Siti Nurhaliza, S.Pd', jenis: 'Cuti Tahunan', tanggal: '1–3 Sep 2026', durasi: '3 hari', ket: '-', status: 'Disetujui' }
        ];
        let cutiPendingLoaded = false, cutiAllLoaded = false;
        function loadCutiPending() {
            if (cutiPendingLoaded) { renderCutiPending(); return; }
            setTimeout(() => { renderCutiPending(); cutiPendingLoaded = true; }, 650);
        }
        function renderCutiPending() {
            const body = document.getElementById('cutiBody');
            const pending = cutiData.map((c, i) => ({ c, i })).filter(x => x.c.status === 'Pending');
            if (!pending.length) {
                body.innerHTML = '';
                document.getElementById('cutiEmpty').classList.remove('hidden');
                return;
            }
            document.getElementById('cutiEmpty').classList.add('hidden');
            body.innerHTML = pending.map(x =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + x.c.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + x.c.jenis + '</td>'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + x.c.tanggal + '</td>'
                + '<td class="px-4 py-3 text-center text-slate-600">' + x.c.durasi + '</td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + '<button onclick="setCuti(' + x.i + ',\'Disetujui\')" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1.5 rounded-lg mr-1">✓ Setujui</button>'
                + '<button onclick="setCuti(' + x.i + ',\'Ditolak\')" class="text-xs font-bold text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded-lg">✕ Tolak</button>'
                + '</td>'
                + '</tr>'
            ).join('');
        }
        function setCuti(i, status) {
            cutiData[i].status = status;
            if (cutiPendingLoaded) renderCutiPending();
            if (cutiAllLoaded) renderCutiAll();
            updateCutiCounts();
            showToast(status === 'Disetujui' ? 'success' : 'warning', 'Permohonan ' + cutiData[i].nama + ' ' + status.toLowerCase());
        }
        function loadCuti() {
            if (cutiAllLoaded) { renderCutiAll(); return; }
            setTimeout(() => { renderCutiAll(); cutiAllLoaded = true; }, 650);
        }
        function renderCutiAll() {
            const body = document.getElementById('cutiAllBody');
            body.innerHTML = cutiData.map((c, i) =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + c.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + c.jenis + '</td>'
                + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + c.tanggal + '</td>'
                + '<td class="px-4 py-3 text-center text-slate-600">' + c.durasi + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + c.ket + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + cutiBadge[c.status] + ' px-2.5 py-1 rounded-full">' + c.status + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + (c.status === 'Pending'
                    ? '<button onclick="setCuti(' + i + ',\'Disetujui\')" class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1.5 rounded-lg mr-1">✓ Setujui</button><button onclick="setCuti(' + i + ',\'Ditolak\')" class="text-xs font-bold text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded-lg">✕ Tolak</button>'
                    : '<button onclick="setCuti(' + i + ',\'Pending\')" class="text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg">↺ Kembalikan</button>')
                + '</td>'
                + '</tr>'
            ).join('');
            updateCutiCounts();
        }
        function updateCutiCounts() {
            const el = document.getElementById('cutiPendingCount');
            if (!el) return;
            el.textContent = cutiData.filter(c => c.status === 'Pending').length;
            document.getElementById('cutiOkCount').textContent = cutiData.filter(c => c.status === 'Disetujui').length;
            document.getElementById('cutiNoCount').textContent = cutiData.filter(c => c.status === 'Ditolak').length;
            document.getElementById('cutiTotalCount').textContent = cutiData.length;
        }

        // ---------- PAYROLL ----------
        const payroll = [
            { nuptk: '1935 7506 4', nama: 'Drs. Hadi Purnomo, M.Pd', jabatan: 'Kepala Sekolah', pokok: 6500000, tunj: 4200000, pot: 650000, status: 'Telah Dibayar' },
            { nuptk: '1992 0310 5', nama: 'Siti Nurhaliza, S.Pd', jabatan: 'Guru Matematika', pokok: 4800000, tunj: 2150000, pot: 480000, status: 'Telah Dibayar' },
            { nuptk: '1995 0822 6', nama: 'Bagas Pratama, S.Kom', jabatan: 'Guru Informatika', pokok: 4200000, tunj: 1800000, pot: 520000, status: 'Disetujui' },
            { nuptk: '1994 0115 7', nama: 'Rina Wulandari, S.Pd', jabatan: 'Guru Kimia', pokok: 3900000, tunj: 1550000, pot: 390000, status: 'Disetujui' },
            { nuptk: '1990 0705 8', nama: 'Dedi Kurniawan, S.Pd', jabatan: 'Wali Kelas PJOK', pokok: 4100000, tunj: 1700000, pot: 460000, status: 'Draf' },
            { nuptk: '1998 1002 9', nama: 'Sri Handayani', jabatan: 'Staf Tata Usaha', pokok: 3200000, tunj: 900000, pot: 320000, status: 'Draf' },
            { nuptk: '1993 0511 1', nama: 'Joko Susilo', jabatan: 'Teknisi Sarpras', pokok: 3000000, tunj: 750000, pot: 300000, status: 'Draf' },
            { nuptk: '1996 1219 2', nama: 'Dewi Lestari, S.Psi', jabatan: 'Guru BK', pokok: 4000000, tunj: 1600000, pot: 480000, status: 'Draf' }
        ];
        const thp = (p) => p.pokok + p.tunj - p.pot;
        let payrollLoaded = false;
        function loadPayroll() {
            if (payrollLoaded) { recalcPayroll(); return; }
            const body = document.getElementById('payrollBody');
            setTimeout(() => {
                body.innerHTML = payroll.map((p, i) =>
                    '<tr class="hover:bg-slate-50/70 pay-row">'
                    + '<td class="px-4 py-3"><input type="checkbox" class="accent pay-check" checked onchange="recalcPayroll()"></td>'
                    + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + p.nuptk + '</td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + p.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + p.jabatan + '</td>'
                    + '<td class="px-4 py-3 text-right text-slate-700">' + rupiah(p.pokok) + '</td>'
                    + '<td class="px-4 py-3 text-right text-emerald-700">+ ' + rupiah(p.tunj) + '</td>'
                    + '<td class="px-4 py-3 text-right text-red-600">- ' + rupiah(p.pot) + '</td>'
                    + '<td class="px-4 py-3 text-right font-heading font-extrabold text-slate-900 pay-thp">' + rupiah(thp(p)) + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + payBadge[p.status] + ' px-2.5 py-1 rounded-full">' + p.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                    + '<button onclick="openDetail(' + i + ')" class="text-slate-400 hover:text-navy px-1" title="Detail Rincian">🔍</button>'
                    + '<button onclick="showToast(\'success\',\'Slip PDF ' + p.nama + ' dicetak\')" class="text-slate-400 hover:text-navy px-1" title="Cetak Slip PDF">🖨️</button>'
                    + '<button onclick="showToast(\'success\',\'Slip terkirim ke ' + p.nama + '\')" class="text-slate-400 hover:text-emerald-600 px-1" title="Kirim Slip">📨</button>'
                    + '</td>'
                    + '</tr>'
                ).join('');
                payrollLoaded = true;
                recalcPayroll();
                showToast('success', payroll.length + ' data payroll Oktober 2026 dimuat');
            }, 650);
        }
        function toggleAllPay(cb) { document.querySelectorAll('.pay-check').forEach(c => c.checked = cb.checked); recalcPayroll(); }
        function recalcPayroll() {
            let grand = 0, count = 0;
            document.querySelectorAll('.pay-row').forEach((r, i) => {
                if (r.querySelector('.pay-check').checked) { grand += thp(payroll[i]); count++; }
            });
            document.getElementById('payGrandTotal').textContent = rupiah(grand);
            window.__payCount = count; window.__payTotal = grand;
        }
        function openFinalisasi() {
            if (!payrollLoaded) { showToast('warning', 'Data payroll belum dimuat'); return; }
            document.getElementById('finalCount').textContent = window.__payCount || 0;
            document.getElementById('finalTotal').textContent = rupiah(window.__payTotal || 0);
            const m = document.getElementById('finalModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeFinal() { const m = document.getElementById('finalModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function confirmFinal() {
            closeFinal();
            showToast('success', (window.__payCount || 0) + ' slip gaji diterbitkan & dikirim ke pegawai');
        }
        function openDetail(i) {
            const p = payroll[i];
            document.getElementById('detailNama').textContent = p.nama + ' · ' + p.jabatan;
            document.getElementById('detailRows').innerHTML =
                '<div class="flex justify-between"><span class="text-slate-500">Gaji Pokok</span><span class="font-semibold text-slate-800">' + rupiah(p.pokok) + '</span></div>'
                + '<div class="flex justify-between"><span class="text-slate-500">Total Tunjangan</span><span class="font-semibold text-emerald-700">+ ' + rupiah(p.tunj) + '</span></div>'
                + '<div class="flex justify-between"><span class="text-slate-500">Total Potongan</span><span class="font-semibold text-red-600">- ' + rupiah(p.pot) + '</span></div>'
                + '<div class="flex justify-between border-t border-slate-100 pt-2 mt-1"><span class="font-heading font-bold text-slate-700">Take Home Pay</span><span class="font-heading font-extrabold text-emerald-700">' + rupiah(thp(p)) + '</span></div>';
            const m = document.getElementById('detailModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeDetail() { const m = document.getElementById('detailModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function loadSlipSelect() {
            const sel = document.getElementById('slipPegawai');
            if (sel.options.length) return;
            sel.innerHTML = payroll.map(p => '<option>' + p.nama + '</option>').join('');
        }

        // ---------- PKG ----------
        const pkgData = [
            { nama: 'Siti Nurhaliza, S.Pd', jabatan: 'Guru Matematika', pkg: 94, kpi: 92, predikat: 'Sangat Baik' },
            { nama: 'Drs. Hadi Purnomo, M.Pd', jabatan: 'Kepala Sekolah', pkg: 96, kpi: 95, predikat: 'Sangat Baik' },
            { nama: 'Rina Wulandari, S.Pd', jabatan: 'Guru Kimia', pkg: 88, kpi: 86, predikat: 'Baik' },
            { nama: 'Bagas Pratama, S.Kom', jabatan: 'Guru Informatika', pkg: 82, kpi: 80, predikat: 'Baik' },
            { nama: 'Dewi Lestari, S.Psi', jabatan: 'Guru BK', pkg: 74, kpi: 71, predikat: 'Perlu Pembinaan' }
        ];
        const predBadge = { 'Sangat Baik': 'bg-emerald-100 text-emerald-800', 'Baik': 'bg-sky-100 text-sky-800', 'Perlu Pembinaan': 'bg-amber-100 text-amber-800' };
        let pkgLoaded = false;
        function loadPkg() {
            if (pkgLoaded) return;
            const body = document.getElementById('pkgBody');
            setTimeout(() => {
                body.innerHTML = pkgData.map(p =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + p.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + p.jabatan + '</td>'
                    + '<td class="px-4 py-3 text-center font-heading font-extrabold text-slate-900">' + p.pkg + '</td>'
                    + '<td class="px-4 py-3 text-center font-heading font-extrabold text-slate-900">' + p.kpi + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + predBadge[p.predikat] + ' px-2.5 py-1 rounded-full">' + p.predikat + '</span></td>'
                    + '<td class="px-4 py-3 text-slate-500">Semester 1 · 2026/2027</td>'
                    + '</tr>'
                ).join('');
                pkgLoaded = true;
            }, 650);
        }

        // ---------- DIKLAT ----------
        const diklatData = [
            { nama: 'Siti Nurhaliza, S.Pd', diklat: 'Sertifikasi Pendidik (PPG)', penyelenggara: 'Kemdikbudristek', tahun: 2021, berlaku: 'Seumur hidup', status: 'Aktif' },
            { nama: 'Bagas Pratama, S.Kom', diklat: 'Pelatihan Kurikulum Merdeka', penyelenggara: 'Dinas Pendidikan', tahun: 2024, berlaku: '28 Nov 2026', status: 'Segera Berakhir' },
            { nama: 'Rina Wulandari, S.Pd', diklat: 'Workshop Asesmen Pembelajaran', penyelenggara: 'MGMP Kimia', tahun: 2025, berlaku: '12 Agu 2027', status: 'Aktif' },
            { nama: 'Dewi Lestari, S.Psi', diklat: 'Sertifikasi Bimbingan Konseling', penyelenggara: 'ABKIN', tahun: 2020, berlaku: '3 Okt 2026', status: 'Kadaluarsa' }
        ];
        const diklatBadge = { 'Aktif': 'bg-emerald-100 text-emerald-800', 'Segera Berakhir': 'bg-amber-100 text-amber-800', 'Kadaluarsa': 'bg-red-100 text-red-800' };
        let diklatLoaded = false;
        function loadDiklat() {
            if (diklatLoaded) return;
            const body = document.getElementById('diklatBody');
            setTimeout(() => {
                body.innerHTML = diklatData.map(d =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + d.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-600">' + d.diklat + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + d.penyelenggara + '</td>'
                    + '<td class="px-4 py-3 text-center text-slate-600">' + d.tahun + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + d.berlaku + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + diklatBadge[d.status] + ' px-2.5 py-1 rounded-full">' + d.status + '</span></td>'
                    + '</tr>'
                ).join('');
                diklatLoaded = true;
            }, 650);
        }

        // ---------- KONTRAK ----------
        const kontrakData = [
            { nama: 'Dewi Lestari, S.Psi', jenis: 'PKWT GTT', mulai: '25 Agu 2025', berakhir: '25 Okt 2026', sisa: 8, status: 'Segera Habis' },
            { nama: 'Joko Susilo', jenis: 'PKWT PTT', mulai: '1 Feb 2026', berakhir: '31 Okt 2026', sisa: 14, status: 'Segera Habis' },
            { nama: 'Bagas Pratama, S.Kom', jenis: 'PKWT GTY', mulai: '1 Jul 2025', berakhir: '30 Jun 2027', sisa: 256, status: 'Aktif' },
            { nama: 'Rina Wulandari, S.Pd', jenis: 'PKWT GTT', mulai: '1 Jul 2026', berakhir: '30 Jun 2027', sisa: 256, status: 'Aktif' }
        ];
        const kontrakBadge = { 'Aktif': 'bg-emerald-100 text-emerald-800', 'Segera Habis': 'bg-amber-100 text-amber-800', 'Habis': 'bg-red-100 text-red-800' };
        let kontrakLoaded = false;
        function loadKontrak() {
            if (kontrakLoaded) return;
            const body = document.getElementById('kontrakBody');
            setTimeout(() => {
                body.innerHTML = kontrakData.map(k =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + k.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + k.jenis + '</td>'
                    + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + k.mulai + '</td>'
                    + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + k.berakhir + '</td>'
                    + '<td class="px-4 py-3 text-center font-bold ' + (k.sisa < 30 ? 'text-red-600' : 'text-slate-600') + '">' + k.sisa + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + kontrakBadge[k.status] + ' px-2.5 py-1 rounded-full">' + k.status + '</span></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                    + '<button onclick="openConfirm(\'Perpanjang Kontrak?\',\'Kontrak ' + k.nama + ' akan diperpanjang 1 tahun.\',()=>showToast(\'success\',\'Kontrak ' + k.nama + ' diperpanjang\'))" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg">↻ Perpanjang</button>'
                    + '</td>'
                    + '</tr>'
                ).join('');
                kontrakLoaded = true;
            }, 650);
        }

        // ---------- CONFIRM ----------
        let confirmCb = null;
        function openConfirm(title, msg, cb, danger) {
            document.getElementById('confirmTitle').textContent = title;
            document.getElementById('confirmMsg').textContent = msg;
            const ic = document.getElementById('confirmIcon');
            ic.textContent = danger ? '🚫' : '⚠️';
            ic.className = 'w-11 h-11 rounded-2xl grid place-items-center text-xl ' + (danger ? 'bg-red-100 text-red-600' : 'bg-amber-100 text-amber-700');
            document.getElementById('confirmOk').className = 'text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors ' + (danger ? 'bg-red-500 hover:bg-red-600' : 'bg-blue-600 hover:bg-blue-700');
            confirmCb = cb;
            const m = document.getElementById('confirmModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeConfirm() { const m = document.getElementById('confirmModal'); m.classList.add('hidden'); m.classList.remove('flex'); confirmCb = null; }
        document.getElementById('confirmOk').addEventListener('click', () => { if (confirmCb) confirmCb(); closeConfirm(); });

        // ---------- Generic in-page data tables ----------
        const statusPillMap = {
            'Terverifikasi': 'bg-emerald2/10 text-emerald2', 'Selesai': 'bg-emerald2/10 text-emerald2',
            'Aktif': 'bg-emerald2/10 text-emerald2', 'OK': 'bg-emerald2/10 text-emerald2',
            'Disetujui': 'bg-emerald2/10 text-emerald2',
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
            'mutasi-jabatan': [
                ['Ahmad Fauzi, S.Pd.', 'Guru Mata Pelajaran', 'Waka Kurikulum', 'SMP', '01 Jul 2026', '~Disetujui'],
                ['Siti Aminah, M.Pd.', 'Guru Kelas', 'Koordinator Kelas IX', 'SMP', '01 Jul 2026', '~Disetujui'],
                ['Budi Santoso, S.Kom.', 'Staf IT', 'Kepala Unit IT', 'Pusat', '15 Agu 2026', '~Menunggu']
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

        loadCutiPending();
    </script>
</body>

</html>

