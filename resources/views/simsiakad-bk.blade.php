<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal E-BK (Bimbingan Konseling) · SIAKAD PLUS</title>
    <meta name="description"
        content="Portal E-BK SIAKAD PLUS — pusat layanan bimbingan konseling & pengembangan karakter: rekam sesi konseling, rujukan dari guru, panggilan orang tua, poin pelanggaran & prestasi, serta laporan BK per siswa. Menjaga kerahasiaan data.">
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
        .timeline-dot::before { content: ''; position: absolute; left: 0; top: 4px; width: 12px; height: 12px; border-radius: 9999px; background: #1E40AF; }
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
                <p class="text-[10px] text-slate-500">Bimbingan Konseling</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>🏠</span> <span class="flex-1 text-left">Dashboard E-BK</span>
            </button>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💬</span><span class="flex-1 text-left">Bimbingan &amp; Konseling</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="sesi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekam Sesi Konseling</button>
                    <button data-view="rujukan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rujukan dari Guru</button>
                    <button data-view="panggilan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Panggilan Orang Tua</button>
                </div>
            </div>

            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🛡️</span><span class="flex-1 text-left">Kedisiplinan &amp; Tata Tertib</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="poin" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Poin Pelanggaran &amp; Sanksi</button>
                    <button data-view="laporan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Laporan BK Per Siswa</button>
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
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Bimbingan Konseling</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base truncate">Dashboard E-BK</h1>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <div class="hidden xl:flex items-center gap-3 bg-slate-100 rounded-xl px-3 py-2">
                        <div class="leading-tight">
                            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Siswa Bimbingan</p>
                            <p class="text-sm font-heading font-extrabold text-slate-900">42 siswa</p>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 rounded-full">Kasus Aktif 12</span>
                    </div>
                    <div class="hidden md:flex items-center gap-3 bg-amber-50 rounded-xl px-3 py-2 border border-amber-100">
                        <div class="leading-tight">
                            <p class="text-[10px] text-amber-600 font-semibold uppercase tracking-wider">Rujukan Baru</p>
                            <p class="text-sm font-heading font-extrabold text-amber-700">4 rujukan</p>
                        </div>
                    </div>
                    <button onclick="showToast('info', '4 rujukan baru & 3 siswa di ambang poin')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">BK</div>
                        <div class="hidden xl:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Guru BK</p>
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
                            <p class="text-sm text-white/85">Total Siswa Dalam Bimbingan</p>
                            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">42 Siswa</h2>
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">● Layanan BK Aktif</span>
                                <span class="bg-amber2 px-2.5 py-1 rounded-full text-white">📨 4 Rujukan Baru</span>
                                <span class="bg-white/20 px-2.5 py-1 rounded-full text-white">🔒 Data Terjaga &amp; Rahasia</span>
                            </div>
                        </div>
                        <div class="lg:ml-auto flex flex-wrap gap-2">
                            <button onclick="showView('sesi','Rekam Sesi Konseling')" class="inline-flex items-center gap-2 bg-white text-navy font-bold text-sm px-4 py-2.5 rounded-xl hover:bg-blue-50 transition-colors">➕ Tambah Sesi Konseling</button>
                            <button onclick="showView('poin','Poin Pelanggaran &amp; Sanksi')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⚖️ Input Poin Pelanggaran</button>
                            <button onclick="showView('panggilan','Panggilan Orang Tua')" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak Surat Panggilan</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 grid place-items-center text-blue-700">💬</span>
                            <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">Oktober</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Sesi Konseling Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">58</p>
                        <p class="text-[11px] text-slate-500 mt-1">Individu &amp; kelompok</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 grid place-items-center text-amber-700">📨</span>
                            <span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Pending</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Rujukan Guru</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">4 <span class="text-sm font-bold text-slate-500">rujukan</span></p>
                        <p class="text-[11px] text-slate-500 mt-1">Menunggu diproses</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-600">🚨</span>
                            <span class="text-[11px] font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">Ambang Poin</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Siswa Capai Ambang Poin</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">3 <span class="text-sm font-bold text-slate-500">siswa</span></p>
                        <p class="text-[11px] text-red-600 mt-1 font-semibold">Perlu surat panggilan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 grid place-items-center text-emerald-700">🏅</span>
                            <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Prestasi</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-600">Total Poin Prestasi Siswa</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900">1.240</p>
                        <p class="text-[11px] text-slate-500 mt-1">Apresiasi &amp; penghargaan</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Rujukan Siswa dari Guru</h2><p class="text-xs text-slate-400">Pending action — perlu ditindaklanjuti</p></div>
                                <button onclick="showView('rujukan','Rujukan dari Guru')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[780px]">
                                    <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                        <tr>
                                            <th class="px-4 py-3">Nama Siswa</th>
                                            <th class="px-4 py-3">Kelas</th>
                                            <th class="px-4 py-3">Guru Pelapor</th>
                                            <th class="px-4 py-3">Alasan Rujukan</th>
                                            <th class="px-4 py-3 text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rujukanBody" class="divide-y divide-slate-50">
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                        <tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="rujukanEmpty" class="hidden py-16 text-center">
                                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">✅</div>
                                <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada rujukan tertunda</p>
                                <p class="text-sm text-slate-400">Semua rujukan guru telah ditindaklanjuti.</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Statistik Kategori Bimbingan</h2><p class="text-xs text-slate-400">Distribusi kasus bulan ini</p></div>
                                <button onclick="showView('laporan','Laporan BK Per Siswa')" class="text-[11px] font-bold text-navy">Laporan</button>
                            </div>
                            <div class="mt-5 flex flex-col sm:flex-row items-center gap-6">
                                <div class="relative w-44 h-44 flex-shrink-0">
                                    <div class="w-full h-full rounded-full" style="background: conic-gradient(#EF4444 0 42%, #3B82F6 42% 70%, #10B981 70% 88%, #F59E0B 88% 100%);"></div>
                                    <div class="absolute inset-[18px] bg-white rounded-full grid place-items-center text-center">
                                        <div>
                                            <p class="font-heading font-extrabold text-2xl text-slate-900">58</p>
                                            <p class="text-[11px] font-semibold text-slate-500">Sesi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 w-full space-y-3">
                                    <div class="flex items-center gap-3">
                                        <span class="w-3 h-3 rounded-full bg-red-500 flex-shrink-0"></span>
                                        <span class="text-sm font-semibold text-slate-700 flex-1">Kedisiplinan</span>
                                        <span class="text-sm font-heading font-extrabold text-slate-900">24</span>
                                        <span class="text-xs font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded-full">42%</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="w-3 h-3 rounded-full bg-blue-500 flex-shrink-0"></span>
                                        <span class="text-sm font-semibold text-slate-700 flex-1">Belajar</span>
                                        <span class="text-sm font-heading font-extrabold text-slate-900">16</span>
                                        <span class="text-xs font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full">28%</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="w-3 h-3 rounded-full bg-emerald-500 flex-shrink-0"></span>
                                        <span class="text-sm font-semibold text-slate-700 flex-1">Sosial</span>
                                        <span class="text-sm font-heading font-extrabold text-slate-900">10</span>
                                        <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">18%</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="w-3 h-3 rounded-full bg-amber-500 flex-shrink-0"></span>
                                        <span class="text-sm font-semibold text-slate-700 flex-1">Pribadi</span>
                                        <span class="text-sm font-heading font-extrabold text-slate-900">8</span>
                                        <span class="text-xs font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">12%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-lg">🚨</span>
                                <div>
                                    <h2 class="font-heading font-bold text-slate-800">Ambang Batas Poin Sanksi</h2>
                                    <p class="text-[11px] text-slate-400">Batas 50 / 75 / 100 poin</p>
                                </div>
                            </div>
                            <div class="mt-4 space-y-2.5">
                                <div class="flex items-center justify-between bg-red-50 border border-red-100 rounded-xl px-3 py-2.5">
                                    <div><p class="text-sm font-bold text-slate-800">Dimas Anggara</p><p class="text-[11px] text-slate-500">12-D · SP 3</p></div>
                                    <span class="text-sm font-heading font-extrabold text-red-700">105</span>
                                </div>
                                <div class="flex items-center justify-between bg-red-50 border border-red-100 rounded-xl px-3 py-2.5">
                                    <div><p class="text-sm font-bold text-slate-800">Fajar Ramadhan</p><p class="text-[11px] text-slate-500">8-B · SP 2</p></div>
                                    <span class="text-sm font-heading font-extrabold text-red-700">82</span>
                                </div>
                                <div class="flex items-center justify-between bg-amber-50 border border-amber-100 rounded-xl px-3 py-2.5">
                                    <div><p class="text-sm font-bold text-slate-800">Naufal Hakim</p><p class="text-[11px] text-slate-500">10-A · SP 1</p></div>
                                    <span class="text-sm font-heading font-extrabold text-amber-700">65</span>
                                </div>
                            </div>
                            <button onclick="showView('panggilan','Panggilan Orang Tua')" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">✉️ Kelola Surat Panggilan</button>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <h2 class="font-heading font-bold text-slate-800">Jadwal Sesi Hari Ini</h2>
                                <span class="text-[10px] font-bold bg-sky-50 text-sky-700 px-2.5 py-1 rounded-full">3 sesi</span>
                            </div>
                            <p class="text-xs text-slate-400 mt-1">Sabtu, 17 Oktober 2026</p>
                            <div class="mt-4 space-y-3">
                                <div class="flex gap-3">
                                    <div class="w-12 flex-shrink-0 text-[11px] font-bold text-slate-500 pt-0.5">08:00</div>
                                    <div class="flex-1 border-l-2 border-blue-500 pl-3">
                                        <p class="text-sm font-bold text-slate-800">Naufal Hakim</p>
                                        <p class="text-xs text-slate-500">10-A · Konseling Individu</p>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="w-12 flex-shrink-0 text-[11px] font-bold text-slate-500 pt-0.5">09:30</div>
                                    <div class="flex-1 border-l-2 border-emerald-500 pl-3">
                                        <p class="text-sm font-bold text-slate-800">Aisyah Putri</p>
                                        <p class="text-xs text-slate-500">8-B · Konseling Karir</p>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="w-12 flex-shrink-0 text-[11px] font-bold text-slate-500 pt-0.5">11:00</div>
                                    <div class="flex-1 border-l-2 border-amber-500 pl-3">
                                        <p class="text-sm font-bold text-slate-800">Fajar Ramadhan</p>
                                        <p class="text-xs text-slate-500">8-B · Konseling Pribadi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: REKAM SESI KONSELING ================= -->
            <section id="view-sesi" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Rekam Sesi Konseling</h2>
                    <p class="text-xs text-slate-400">Jurnal sesi konseling individu/kelompok, catatan perkembangan, dan level kerahasiaan.</p>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 space-y-4">
                        <!-- Profile card siswa -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <div class="w-16 h-16 rounded-2xl hero-gradient grid place-items-center text-white font-heading font-extrabold text-xl flex-shrink-0">NH</div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2">
                                        <h3 class="font-heading font-extrabold text-lg text-slate-800">Naufal Hakim</h3>
                                        <span class="text-[10px] font-bold bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full">Kelas 10-A</span>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-0.5">NISN 0071234501 · Wali Kelas: Ibu Sri Wahyuni, S.Pd</p>
                                    <p class="text-xs text-slate-500">Orang Tua: Bpk. Sugeng Riyadi · 0812-3456-7801</p>
                                </div>
                                <div class="flex gap-2">
                                    <div class="text-center bg-red-50 border border-red-100 rounded-xl px-4 py-2">
                                        <p class="text-[10px] font-bold text-red-600 uppercase">Poin Pelanggaran</p>
                                        <p class="font-heading font-extrabold text-xl text-red-700">65</p>
                                    </div>
                                    <div class="text-center bg-emerald-50 border border-emerald-100 rounded-xl px-4 py-2">
                                        <p class="text-[10px] font-bold text-emerald-600 uppercase">Poin Prestasi</p>
                                        <p class="font-heading font-extrabold text-xl text-emerald-700">30</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form input sesi -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h3 class="font-heading font-bold text-slate-800">Form Input Sesi Konseling</h3>
                            <div class="mt-4 grid sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal &amp; Waktu Sesi</label>
                                    <input type="datetime-local" value="2026-10-17T08:00" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Jenis Konseling</label>
                                    <select id="sesiJenis" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                        <option>Individu</option>
                                        <option>Kelompok</option>
                                        <option>Karir</option>
                                        <option>Belajar</option>
                                        <option>Pribadi</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pendekatan / Deskripsi Masalah</label>
                                    <textarea id="sesiMasalah" rows="3" placeholder="Uraikan permasalahan siswa yang dibahas..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 placeholder:text-slate-400"></textarea>
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Rencana Tindak Lanjut / Solusi</label>
                                    <textarea id="sesiTindak" rows="3" placeholder="Rencana solusi & tindak lanjut..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 placeholder:text-slate-400"></textarea>
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Level Kerahasiaan</label>
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        <label class="inline-flex items-center gap-2 bg-red-50 border border-red-200 rounded-xl px-3 py-2 text-sm font-semibold text-red-800 cursor-pointer"><input type="radio" name="rahasia" value="Rahasia" class="accent" checked> 🔒 Rahasia</label>
                                        <label class="inline-flex items-center gap-2 bg-amber-50 border border-amber-200 rounded-xl px-3 py-2 text-sm font-semibold text-amber-800 cursor-pointer"><input type="radio" name="rahasia" value="Terbatas" class="accent"> 👥 Terbatas untuk Wali Kelas</label>
                                        <label class="inline-flex items-center gap-2 bg-emerald-50 border border-emerald-200 rounded-xl px-3 py-2 text-sm font-semibold text-emerald-800 cursor-pointer"><input type="radio" name="rahasia" value="Terbuka" class="accent"> 🌐 Terbuka</label>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Upload Lampiran / Dokumentasi</label>
                                    <div class="mt-1 border-2 border-dashed border-slate-200 rounded-xl px-4 py-6 text-center bg-slate-50">
                                        <p class="text-2xl">📎</p>
                                        <p class="text-sm font-semibold text-slate-600 mt-1">Tarik file ke sini atau klik untuk memilih</p>
                                        <p class="text-[11px] text-slate-400">PDF, JPG, PNG maks. 5 MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex flex-col sm:flex-row gap-2 sm:justify-end">
                                <button onclick="showToast('info','Catatan sesi disimpan sebagai draf')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-5 py-2.5 rounded-xl transition-colors">Simpan Draf</button>
                                <button onclick="showToast('success','Sesi konseling berhasil dicatat & terjaga kerahasiaannya')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-6 py-2.5 rounded-xl transition-colors">💾 Simpan Sesi Konseling</button>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline histori -->
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Histori Sesi Konseling</h3>
                        <p class="text-xs text-slate-400">Riwayat konseling Naufal Hakim</p>
                        <div id="timeline" class="mt-5 space-y-5"></div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: RUJUKAN ================= -->
            <section id="view-rujukan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Rujukan dari Guru</h2>
                        <p class="text-xs text-slate-400">Rekomendasi/rujukan siswa dari guru mata pelajaran &amp; wali kelas untuk ditindaklanjuti BK.</p>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Menunggu Ditangani</p>
                        <p class="font-heading font-extrabold text-2xl text-amber-600" id="rujukanPendingCount">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Diproses</p>
                        <p class="font-heading font-extrabold text-2xl text-blue-600" id="rujukanProsesCount">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Selesai</p>
                        <p class="font-heading font-extrabold text-2xl text-emerald-600" id="rujukanSelesaiCount">0</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="text-xs font-semibold text-slate-600">Total Rujukan</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-900" id="rujukanTotalCount">0</p>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100"><h3 class="font-heading font-bold text-slate-800">Daftar Rujukan</h3></div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[980px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Guru Pelapor</th>
                                    <th class="px-4 py-3">Alasan Rujukan</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="rujukanAllBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="rujukanAllEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📨</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada rujukan</p>
                        <p class="text-sm text-slate-400">Rujukan dari guru akan tampil di sini.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PANGGILAN ORANG TUA ================= -->
            <section id="view-panggilan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Panggilan Orang Tua</h2>
                        <p class="text-xs text-slate-400">Generator &amp; manajemen surat pemanggilan orang tua otomatis berdasarkan ambang poin.</p>
                    </div>
                    <button onclick="showToast('success','4 surat panggilan masuk antrean terbit')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">✉️ Terbitkan Surat Massal</button>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 grid sm:grid-cols-3 gap-3">
                    <div class="sm:col-span-2">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Cari Siswa / Kelas</label>
                        <input id="searchDisiplin" type="text" oninput="applyFilterDisiplin()" placeholder="Cari nama siswa, NISN, atau kelas..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 placeholder:text-slate-400">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Filter Ambang Poin</label>
                        <select id="filterAmbang" onchange="applyFilterDisiplin()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            <option value="">Semua</option>
                            <option value="red">Merah (≥ 75 poin)</option>
                            <option value="yellow">Kuning (50–74 poin)</option>
                            <option value="green">Hijau (&lt; 50 poin)</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1080px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">NISN</th>
                                    <th class="px-4 py-3">Nama Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3 text-center">Total Poin</th>
                                    <th class="px-4 py-3">Status Sanksi</th>
                                    <th class="px-4 py-3">Status Surat Panggilan</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="disiplinBody" class="divide-y divide-slate-50">
                                <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="disiplinEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">😇</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada data ditemukan</p>
                        <p class="text-sm text-slate-400">Tidak ada siswa yang sesuai filter/pencarian.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: POIN PELANGGARAN & SANKSI ================= -->
            <section id="view-poin" class="view">
                <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Poin Pelanggaran &amp; Sanksi</h2>
                        <p class="text-xs text-slate-400">Katalog tata tertib, input poin pelanggaran/apresiasi, dan sanksi berjenjang.</p>
                    </div>
                    <button onclick="showToast('info','Membuka form input poin untuk siswa...')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">➕ Input Poin</button>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Input Poin Cepat</h3>
                        <div class="mt-4 space-y-3">
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pilih Siswa</label>
                                <select class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option>Naufal Hakim · 10-A</option>
                                    <option>Keira Faza Aishanaya · 10-A</option>
                                    <option>Fajar Ramadhan · 8-B</option>
                                    <option>Aisyah Putri · 8-B</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Jenis</label>
                                <select class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                                    <option>Pelanggaran</option>
                                    <option>Apresiasi / Prestasi</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Poin</label>
                                <input type="number" value="10" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Catatan</label>
                                <input type="text" placeholder="Keterangan singkat..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 placeholder:text-slate-400">
                            </div>
                            <button onclick="showToast('success','Poin berhasil dicatat & tata tertib diperbarui')" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-4 py-3 rounded-xl transition-colors">📌 Simpan Poin</button>
                        </div>
                    </div>

                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Katalog Tata Tertib &amp; Sanksi Berjenjang</h3>
                        <div class="mt-4 overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[560px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-3 py-2.5">Jenis Pelanggaran</th>
                                        <th class="px-3 py-2.5 text-center">Poin</th>
                                        <th class="px-3 py-2.5">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody id="katalogBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                        <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div class="rounded-xl border border-amber-200 bg-amber-50 p-3">
                                <p class="text-[11px] font-bold text-amber-700 uppercase">25–49 Poin</p>
                                <p class="text-sm font-bold text-slate-800">Teguran I</p>
                                <p class="text-[11px] text-slate-500">Pembinaan lisan + catatan BK</p>
                            </div>
                            <div class="rounded-xl border border-orange-200 bg-orange-50 p-3">
                                <p class="text-[11px] font-bold text-orange-700 uppercase">50–74 Poin</p>
                                <p class="text-sm font-bold text-slate-800">Teguran II &amp; Panggilan</p>
                                <p class="text-[11px] text-slate-500">Surat panggilan orang tua</p>
                            </div>
                            <div class="rounded-xl border border-red-200 bg-red-50 p-3">
                                <p class="text-[11px] font-bold text-red-700 uppercase">≥ 75 Poin</p>
                                <p class="text-sm font-bold text-slate-800">SP 1 / SP 2 / SP 3</p>
                                <p class="text-[11px] text-slate-500">Surat peringatan resmi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: LAPORAN BK ================= -->
            <section id="view-laporan" class="view">
                <div>
                    <h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan BK Per Siswa</h2>
                    <p class="text-xs text-slate-400">Rekapitulasi portofolio karakter, histori konseling, dan poin kedisiplinan per siswa.</p>
                </div>

                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[980px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Nama Siswa</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3 text-center">Sesi Konseling</th>
                                    <th class="px-4 py-3 text-center">Poin Pelanggaran</th>
                                    <th class="px-4 py-3 text-center">Poin Prestasi</th>
                                    <th class="px-4 py-3">Predikat Karakter</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="laporanBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                    <div id="laporanEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📊</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Belum ada data laporan</p>
                        <p class="text-sm text-slate-400">Data portofolio siswa akan tampil di sini.</p>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: GENERIC ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧩</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari Portal E-BK. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Rekam Sesi Konseling</span>, <span class="font-semibold text-slate-600">Rujukan dari Guru</span>, <span class="font-semibold text-slate-600">Panggilan Orang Tua</span>, <span class="font-semibold text-slate-600">Poin Pelanggaran</span>, dan <span class="font-semibold text-slate-600">Laporan BK</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard E-BK')" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('sesi','Rekam Sesi Konseling')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Rekam Sesi</button>
                        <button onclick="showView('panggilan','Panggilan Orang Tua')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Panggilan Orang Tua</button>
                    </div>
                </div>
            </section>



        </main>

        <footer class="px-4 sm:px-6 py-4 text-center text-xs text-slate-400 border-t border-slate-200">
            © 2026 PT Artificial Intelligence Learning Madani Digital · Portal E-BK (Simulasi)
        </footer>
    </div>

    <!-- ============ MODAL: PREVIEW SURAT PANGGILAN ============ -->
    <div id="suratModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeSurat()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
            <div class="flex items-start justify-between p-5 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <span class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-700 grid place-items-center text-xl">✉️</span>
                    <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Surat Panggilan Orang Tua</h3><p class="text-xs text-slate-400">Pratinjau surat resmi sekolah</p></div>
                </div>
                <button onclick="closeSurat()" class="text-slate-400 hover:text-slate-700 text-xl leading-none">✕</button>
            </div>

            <!-- Kop surat -->
            <div class="p-5">
                <div class="border-2 border-slate-200 rounded-2xl p-5">
                    <div class="flex items-center gap-3 pb-3 border-b-2 border-slate-800">
                        <div class="w-12 h-12 rounded-full hero-gradient grid place-items-center text-white font-heading font-extrabold">S+</div>
                        <div class="leading-tight text-center flex-1">
                            <p class="font-heading font-bold text-slate-800 text-sm">YAYASAN AI LEARNING MADANI</p>
                            <p class="font-heading font-extrabold text-slate-900">SMAN 1 NUSANTARA</p>
                            <p class="text-[10px] text-slate-500">Jl. Pendidikan No. 1, Malang, Jawa Timur · Telp (0341) 123-456</p>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="font-heading font-extrabold text-slate-900 underline">SURAT PANGGILAN ORANG TUA / WALI</p>
                        <p class="text-xs text-slate-500">Nomor: 421/BK-SMAN1/X/2026</p>
                    </div>
                    <div class="mt-4 text-sm text-slate-700 space-y-1.5">
                        <p>Kepada Yth. Bapak/Ibu <span id="suratOrtu" class="font-bold text-slate-900">Orang Tua</span></p>
                        <p>Orang tua/wali dari siswa <span id="suratSiswa" class="font-bold text-slate-900">Siswa</span> (<span id="suratKelas">Kelas</span>),</p>
                        <p class="pt-2">Dengan hormat, sehubungan dengan hasil pembinaan Bimbingan Konseling, kami mengharap kehadiran Bapak/Ibu pada:</p>
                    </div>
                    <div class="mt-3 bg-slate-50 rounded-xl p-4 text-sm text-slate-700 space-y-1">
                        <p><span class="inline-block w-28 text-slate-500">Hari/Tanggal</span>: <span id="suratHari" class="font-bold text-slate-900">-</span></p>
                        <p><span class="inline-block w-28 text-slate-500">Waktu</span>: 09.00 WIB s.d. selesai</p>
                        <p><span class="inline-block w-28 text-slate-500">Tempat</span>: <span id="suratRuang" class="font-bold text-slate-900">Ruang BK</span></p>
                        <p><span class="inline-block w-28 text-slate-500">Keperluan</span>: <span id="suratAlasan" class="text-slate-900">-</span></p>
                    </div>
                    <p class="mt-4 text-sm text-slate-700">Demikian surat ini kami sampaikan. Atas perhatian dan kehadiran Bapak/Ibu, kami ucapkan terima kasih.</p>
                    <div class="mt-6 flex justify-end">
                        <div class="text-center text-sm text-slate-700">
                            <p>Malang, 17 Oktober 2026</p>
                            <p>Guru Bimbingan Konseling</p>
                            <div class="h-12"></div>
                            <p class="font-bold underline">Dewi Lestari, S.Psi</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-5 pb-5 flex gap-2">
                <button onclick="showToast('success','Surat panggilan dicetak sebagai PDF')" class="flex-1 bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⬇️ Cetak PDF</button>
                <button onclick="showToast('success','Notifikasi WA terkirim ke orang tua')" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📲 Kirim Notifikasi WA</button>
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
        const rujukanBadge = { 'Pending': 'bg-amber-100 text-amber-800', 'Diproses': 'bg-blue-100 text-blue-800', 'Selesai': 'bg-emerald-100 text-emerald-800' };
        const sanksiBadge = { 'Apresiasi': 'bg-emerald-100 text-emerald-800', 'Teguran I': 'bg-amber-100 text-amber-800', 'Teguran II': 'bg-orange-100 text-orange-800', 'SP 1': 'bg-red-100 text-red-800', 'SP 2': 'bg-red-100 text-red-800', 'SP 3': 'bg-red-200 text-red-900' };
        const suratBadge = { 'Draf': 'bg-amber-100 text-amber-800', 'Terkirim WA': 'bg-blue-100 text-blue-800', 'Terbit Surat': 'bg-emerald-100 text-emerald-800' };
        const predikatBadge = { 'Sangat Baik': 'bg-emerald-100 text-emerald-800', 'Baik': 'bg-sky-100 text-sky-800', 'Perlu Bimbingan': 'bg-amber-100 text-amber-800', 'Perlu Pembinaan': 'bg-red-100 text-red-800' };
        const selesaiBadge = { 'Selesai': 'bg-emerald-100 text-emerald-800', 'Proses': 'bg-blue-100 text-blue-800' };
        function poinColor(p) { return p >= 75 ? 'text-red-700' : (p >= 50 ? 'text-amber-700' : 'text-emerald-700'); }

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

            if (name === 'dashboard') loadRujukanPending();
            if (name === 'rujukan') loadRujukanAll();
            if (name === 'sesi') loadTimeline();
            if (name === 'panggilan') loadDisiplin();
            if (name === 'poin') loadKatalog();
            if (name === 'laporan') loadLaporan();

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

        // ---------- RUJUKAN ----------
        const rujukanData = [
            { nama: 'Naufal Hakim', kelas: '10-A', guru: 'Bpk. Andri (Matematika)', alasan: 'Sering tidak mengerjakan tugas, nilai turun', status: 'Pending' },
            { nama: 'Keira Faza Aishanaya', kelas: '10-A', guru: 'Ibu Rina (Kimia)', alasan: 'Sering mengantuk & tidak fokus di kelas', status: 'Pending' },
            { nama: 'Fajar Ramadhan', kelas: '8-B', guru: 'Bpk. Dedi (PJOK)', alasan: 'Terlibat keributan kecil saat istirahat', status: 'Pending' },
            { nama: 'Gita Puspita Sari', kelas: '11-C', guru: 'Ibu Sri (Wali Kelas)', alasan: 'Menarik diri, tampak murung akhir-akhir ini', status: 'Pending' },
            { nama: 'Bagas Pratama', kelas: '10-B', guru: 'Bpk. Andri (Matematika)', alasan: 'Perlu penguatan motivasi belajar', status: 'Selesai' }
        ];
        let rujukanPendingLoaded = false, rujukanAllLoaded = false;
        function loadRujukanPending() {
            if (rujukanPendingLoaded) { renderRujukanPending(); return; }
            setTimeout(() => { renderRujukanPending(); rujukanPendingLoaded = true; }, 650);
        }
        function renderRujukanPending() {
            const body = document.getElementById('rujukanBody');
            const pending = rujukanData.map((r, i) => ({ r, i })).filter(x => x.r.status === 'Pending');
            if (!pending.length) {
                body.innerHTML = '';
                document.getElementById('rujukanEmpty').classList.remove('hidden');
                return;
            }
            document.getElementById('rujukanEmpty').classList.add('hidden');
            body.innerHTML = pending.map(x =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + x.r.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + x.r.kelas + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + x.r.guru + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + x.r.alasan + '</td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap"><button onclick="setRujukan(' + x.i + ')" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-lg">💬 Proses Konseling</button></td>'
                + '</tr>'
            ).join('');
        }
        function setRujukan(i) {
            rujukanData[i].status = 'Diproses';
            if (rujukanPendingLoaded) renderRujukanPending();
            if (rujukanAllLoaded) { renderRujukanAll(); updateRujukanCounts(); }
            showToast('success', 'Rujukan ' + rujukanData[i].nama + ' diproses ke sesi konseling');
        }
        function loadRujukanAll() {
            if (rujukanAllLoaded) { renderRujukanAll(); return; }
            setTimeout(() => { renderRujukanAll(); rujukanAllLoaded = true; }, 650);
        }
        function renderRujukanAll() {
            const body = document.getElementById('rujukanAllBody');
            body.innerHTML = rujukanData.map((r, i) =>
                '<tr class="hover:bg-slate-50/70">'
                + '<td class="px-4 py-3 font-semibold text-slate-700">' + r.nama + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + r.kelas + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + r.guru + '</td>'
                + '<td class="px-4 py-3 text-slate-500">' + r.alasan + '</td>'
                + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + rujukanBadge[r.status] + ' px-2.5 py-1 rounded-full">' + r.status + '</span></td>'
                + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                + (r.status !== 'Selesai'
                    ? '<button onclick="setRujukan(' + i + ')" class="text-xs font-bold text-blue-700 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg mr-1">💬 Proses</button><button onclick="selesaiRujukan(' + i + ')" class="text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-lg">✓ Selesai</button>'
                    : '<span class="text-[11px] font-bold text-emerald-700">✓ Ditindaklanjuti</span>')
                + '</td>'
                + '</tr>'
            ).join('');
            updateRujukanCounts();
        }
        function selesaiRujukan(i) {
            rujukanData[i].status = 'Selesai';
            renderRujukanAll();
            if (rujukanPendingLoaded) renderRujukanPending();
            showToast('success', 'Rujukan ' + rujukanData[i].nama + ' ditandai selesai');
        }
        function updateRujukanCounts() {
            const el = document.getElementById('rujukanPendingCount');
            if (!el) return;
            el.textContent = rujukanData.filter(r => r.status === 'Pending').length;
            document.getElementById('rujukanProsesCount').textContent = rujukanData.filter(r => r.status === 'Diproses').length;
            document.getElementById('rujukanSelesaiCount').textContent = rujukanData.filter(r => r.status === 'Selesai').length;
            document.getElementById('rujukanTotalCount').textContent = rujukanData.length;
        }

        // ---------- TIMELINE SESI ----------
        const timelineData = [
            { tgl: '10 Okt 2026', jenis: 'Konseling Individu', masalah: 'Masalah kedisiplinan & keterlambatan', tindak: 'Kontrak belajar & monitoring mingguan', status: 'Selesai' },
            { tgl: '25 Sep 2026', jenis: 'Konseling Belajar', masalah: 'Kesulitan mata pelajaran matematika', tindak: 'Rekomendasi les tambahan & pendampingan', status: 'Proses' },
            { tgl: '12 Sep 2026', jenis: 'Konseling Sosial', masalah: 'Konflik dengan teman sekelas', tindak: 'Mediasi & pembinaan karakter', status: 'Selesai' }
        ];
        let timelineLoaded = false;
        function loadTimeline() {
            if (timelineLoaded) return;
            const wrap = document.getElementById('timeline');
            setTimeout(() => {
                wrap.innerHTML = timelineData.map(t =>
                    '<div class="relative pl-6">'
                    + '<span class="absolute left-0 top-1 w-3 h-3 rounded-full bg-navy ring-4 ring-blue-50"></span>'
                    + '<span class="absolute left-[5px] top-4 bottom-[-16px] w-px bg-slate-200"></span>'
                    + '<p class="text-[11px] font-bold text-slate-400">' + t.tgl + '</p>'
                    + '<p class="text-sm font-bold text-slate-800">' + t.jenis + '</p>'
                    + '<p class="text-xs text-slate-500 mt-0.5">' + t.masalah + '</p>'
                    + '<p class="text-xs text-slate-500 mt-1">→ ' + t.tindak + '</p>'
                    + '<span class="inline-block mt-1.5 text-[10px] font-bold ' + selesaiBadge[t.status] + ' px-2 py-0.5 rounded-full">' + t.status + '</span>'
                    + '</div>'
                ).join('');
                timelineLoaded = true;
            }, 500);
        }

        // ---------- DISIPLIN ----------
        const disiplinData = [
            { nisn: '0071234501', nama: 'Naufal Hakim', kelas: '10-A', poin: 65, sanksi: 'SP 1', surat: 'Terbit Surat', ortu: 'Bpk. Sugeng Riyadi', wa: '0812-3456-7801', hari: 'Senin, 20 Oktober 2026', ruang: 'Ruang BK', alasan: 'Akumulasi poin pelanggaran mencapai 65 poin (melebihi ambang 50 poin).' },
            { nisn: '0071234502', nama: 'Keira Faza Aishanaya', kelas: '10-A', poin: 30, sanksi: 'Teguran I', surat: 'Draf', ortu: 'Ibu Ratna Dewi', wa: '0812-3456-7802', hari: 'Selasa, 21 Oktober 2026', ruang: 'Ruang BK', alasan: 'Pembinaan keterlambatan berulang dan ketidakdisiplinan tugas.' },
            { nisn: '0061234504', nama: 'Fajar Ramadhan', kelas: '8-B', poin: 82, sanksi: 'SP 2', surat: 'Terkirim WA', ortu: 'Bpk. Hendra Wijaya', wa: '0812-3456-7804', hari: 'Senin, 20 Oktober 2026', ruang: 'Ruang Kepala Sekolah', alasan: 'Pelanggaran berat berulang, akumulasi 82 poin.' },
            { nisn: '0071234510', nama: 'Dimas Anggara', kelas: '12-D', poin: 105, sanksi: 'SP 3', surat: 'Terbit Surat', ortu: 'Ibu Yuni Astuti', wa: '0812-3456-7810', hari: 'Rabu, 22 Oktober 2026', ruang: 'Ruang Kepala Sekolah', alasan: 'Akumulasi 105 poin — kategori pelanggaran sangat berat.' },
            { nisn: '0071234505', nama: 'Aisyah Putri', kelas: '8-B', poin: 0, sanksi: 'Apresiasi', surat: 'Draf', ortu: 'Bpk. Ahmad Fauzi', wa: '0812-3456-7805', hari: '-', ruang: '-', alasan: 'Undangan apresiasi atas prestasi akademik & karakter.' }
        ];
        let disiplinLoaded = false;
        function loadDisiplin() {
            if (disiplinLoaded) { applyFilterDisiplin(); return; }
            const body = document.getElementById('disiplinBody');
            setTimeout(() => {
                body.innerHTML = disiplinData.map((d, i) =>
                    '<tr class="hover:bg-slate-50/70 disiplin-row">'
                    + '<td class="px-4 py-3 text-slate-500 whitespace-nowrap">' + d.nisn + '</td>'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + d.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + d.kelas + '</td>'
                    + '<td class="px-4 py-3 text-center font-heading font-extrabold ' + poinColor(d.poin) + ' disiplin-poin">' + d.poin + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + sanksiBadge[d.sanksi] + ' px-2.5 py-1 rounded-full">' + d.sanksi + '</span></td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + suratBadge[d.surat] + ' px-2.5 py-1 rounded-full">' + d.surat + '</span></td>'
                    + '<td class="px-4 py-3 text-right whitespace-nowrap">'
                    + '<button onclick="showToast(\'info\',\'Histori kedisiplinan ' + d.nama + '\')" class="text-slate-400 hover:text-navy px-1" title="Detail Histori">🔍</button>'
                    + '<button onclick="showView(\'poin\',\'Poin Pelanggaran &amp; Sanksi\')" class="text-slate-400 hover:text-navy px-1" title="Input Poin Baru">➕</button>'
                    + '<button onclick="openSurat(' + i + ')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg" title="Cetak Surat Panggilan PDF">✉️ Surat</button>'
                    + '</td>'
                    + '</tr>'
                ).join('');
                disiplinLoaded = true;
                applyFilterDisiplin();
                showToast('success', disiplinData.length + ' data kedisiplinan dimuat');
            }, 650);
        }
        function applyFilterDisiplin() {
            const q = document.getElementById('searchDisiplin').value.toLowerCase().trim();
            const amb = document.getElementById('filterAmbang').value;
            let visible = 0;
            document.querySelectorAll('.disiplin-row').forEach((r, i) => {
                const d = disiplinData[i];
                const txt = (d.nama + ' ' + d.nisn + ' ' + d.kelas).toLowerCase();
                let ok = !q || txt.indexOf(q) !== -1;
                if (amb === 'red') ok = ok && d.poin >= 75;
                if (amb === 'yellow') ok = ok && d.poin >= 50 && d.poin < 75;
                if (amb === 'green') ok = ok && d.poin < 50;
                r.classList.toggle('hidden', !ok);
                if (ok) visible++;
            });
            document.getElementById('disiplinEmpty').classList.toggle('hidden', visible > 0);
        }
        function openSurat(i) {
            const d = disiplinData[i];
            document.getElementById('suratOrtu').textContent = d.ortu;
            document.getElementById('suratSiswa').textContent = d.nama;
            document.getElementById('suratKelas').textContent = 'Kelas ' + d.kelas + ' · NISN ' + d.nisn;
            document.getElementById('suratHari').textContent = d.hari;
            document.getElementById('suratRuang').textContent = d.ruang;
            document.getElementById('suratAlasan').textContent = d.alasan;
            const m = document.getElementById('suratModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeSurat() { const m = document.getElementById('suratModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        // ---------- KATALOG ----------
        const katalogData = [
            { jenis: 'Terlambat masuk sekolah', poin: 5, tindakan: 'Teguran lisan' },
            { jenis: 'Tidak mengerjakan tugas', poin: 10, tindakan: 'Pembinaan & penggantian tugas' },
            { jenis: 'Tidak mengikuti upacara', poin: 15, tindakan: 'Teguran & pembinaan' },
            { jenis: 'Membolos / keluar tanpa izin', poin: 25, tindakan: 'Panggilan orang tua' },
            { jenis: 'Merokok di lingkungan sekolah', poin: 50, tindakan: 'SP 1 & panggilan orang tua' },
            { jenis: 'Bullying / perundungan', poin: 75, tindakan: 'SP 2 & konseling wajib' },
            { jenis: 'Membawa senjata/narkoba', poin: 100, tindakan: 'SP 3 & pengembalian ke orang tua' }
        ];
        let katalogLoaded = false;
        function loadKatalog() {
            if (katalogLoaded) return;
            const body = document.getElementById('katalogBody');
            setTimeout(() => {
                body.innerHTML = katalogData.map(k =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-3 py-2.5 font-semibold text-slate-700">' + k.jenis + '</td>'
                    + '<td class="px-3 py-2.5 text-center"><span class="font-heading font-extrabold ' + poinColor(k.poin) + '">' + k.poin + '</span></td>'
                    + '<td class="px-3 py-2.5 text-slate-500">' + k.tindakan + '</td>'
                    + '</tr>'
                ).join('');
                katalogLoaded = true;
            }, 500);
        }

        // ---------- LAPORAN ----------
        const laporanData = [
            { nama: 'Aisyah Putri', kelas: '8-B', sesi: 3, pelanggaran: 0, prestasi: 80, predikat: 'Sangat Baik' },
            { nama: 'Naufal Hakim', kelas: '10-A', sesi: 5, pelanggaran: 65, prestasi: 30, predikat: 'Perlu Bimbingan' },
            { nama: 'Bagas Pratama', kelas: '10-B', sesi: 2, pelanggaran: 10, prestasi: 60, predikat: 'Baik' },
            { nama: 'Keira Faza Aishanaya', kelas: '10-A', sesi: 4, pelanggaran: 30, prestasi: 45, predikat: 'Baik' },
            { nama: 'Fajar Ramadhan', kelas: '8-B', sesi: 7, pelanggaran: 82, prestasi: 10, predikat: 'Perlu Pembinaan' }
        ];
        let laporanLoaded = false;
        function loadLaporan() {
            if (laporanLoaded) return;
            const body = document.getElementById('laporanBody');
            setTimeout(() => {
                body.innerHTML = laporanData.map(l =>
                    '<tr class="hover:bg-slate-50/70">'
                    + '<td class="px-4 py-3 font-semibold text-slate-700">' + l.nama + '</td>'
                    + '<td class="px-4 py-3 text-slate-500">' + l.kelas + '</td>'
                    + '<td class="px-4 py-3 text-center text-slate-600">' + l.sesi + '</td>'
                    + '<td class="px-4 py-3 text-center font-bold ' + poinColor(l.pelanggaran) + '">' + l.pelanggaran + '</td>'
                    + '<td class="px-4 py-3 text-center font-bold text-emerald-700">' + l.prestasi + '</td>'
                    + '<td class="px-4 py-3"><span class="text-[11px] font-bold ' + predikatBadge[l.predikat] + ' px-2.5 py-1 rounded-full">' + l.predikat + '</span></td>'
                    + '<td class="px-4 py-3 text-right"><button onclick="showToast(\'info\',\'Membuka portofolio ' + l.nama + '\')" class="text-xs font-bold text-navy bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg">Portofolio</button></td>'
                    + '</tr>'
                ).join('');
                laporanLoaded = true;
            }, 650);
        }

        // ---------- CONFIRM ----------
        let confirmCb = null;
        function openConfirm(title, msg, cb, danger) {
            document.getElementById('confirmTitle').textContent = title;
            document.getElementById('confirmMsg').textContent = msg;
            const ic = document.getElementById('confirmIcon');
            ic.textContent = danger ? '⚠️' : '⚠️';
            ic.className = 'w-11 h-11 rounded-2xl grid place-items-center text-xl ' + (danger ? 'bg-red-100 text-red-600' : 'bg-amber-100 text-amber-700');
            document.getElementById('confirmOk').className = 'text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors ' + (danger ? 'bg-red-500 hover:bg-red-600' : 'bg-blue-600 hover:bg-blue-700');
            confirmCb = cb;
            const m = document.getElementById('confirmModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeConfirm() { const m = document.getElementById('confirmModal'); m.classList.add('hidden'); m.classList.remove('flex'); confirmCb = null; }
        document.getElementById('confirmOk').addEventListener('click', () => { if (confirmCb) confirmCb(); closeConfirm(); });

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

        loadRujukanPending();
    </script>
</body>

</html>

