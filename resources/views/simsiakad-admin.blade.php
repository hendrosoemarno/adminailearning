<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — Administrasi/Operator · SIAKAD PLUS</title>
    <meta name="description"
        content="Modul Administrasi & Operator SIAKAD PLUS — pusat kendali 8 grup fitur (51 fitur): PPDB/SPMB, Kesiswaan, Kepegawaian, Kurikulum, Humas, Keuangan, Akreditasi, Modul Khusus, dan Akses Keamanan.">
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
        input[type="checkbox"].matrix { accent-color: #1E40AF; width: 16px; height: 16px; }
        .pptab-btn { color: #475569; }
        .pptab-btn.active { background: #1E40AF; color: #fff; }
        .pf-tab-btn { color: #475569; }
        .pf-tab-btn.active { background: #1E40AF; color: #fff; }
        .mk-tab-btn { color: #475569; }
        .mk-tab-btn.active { background: #1E40AF; color: #fff; }
        .kl-tab-btn { color: #475569; }
        .kl-tab-btn.active { background: #1E40AF; color: #fff; }
        .kh-mode-btn { color: #475569; }
        .kh-mode-btn.active { background: #fff; color: #1E40AF; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        .tt-tab-btn { color: #475569; }
        .tt-tab-btn.active { background: #1E40AF; color: #fff; }
        .pg-tab-btn { color: #475569; }
        .pg-tab-btn.active { background: #1E40AF; color: #fff; }
        .pd-tab-btn { color: #475569; }
        .pd-tab-btn.active { background: #1E40AF; color: #fff; }
        .hm-tab-btn { color: #475569; }
        .hm-tab-btn.active { background: #1E40AF; color: #fff; }
        .ak-tab-btn { color: #475569; }
        .ak-tab-btn.active { background: #1E40AF; color: #fff; }
        .th-tab-btn { color: #475569; }
        .th-tab-btn.active { background: #1E40AF; color: #fff; }
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
                <p class="text-[10px] text-slate-500">Admin Panel · Operator</p>
            </div>
            <button onclick="toggleSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Scrollable nav -->
        <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-1">

            <!-- Dashboard -->
            <button data-view="dashboard" class="menu-item w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                <span>📊</span> <span class="flex-1 text-left">Dashboard Operator</span>
            </button>

            <!-- 1. PPDB / SPMB -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📥</span><span class="flex-1 text-left">PPDB / SPMB Online</span>
                    <span class="text-[10px] font-bold bg-amber2 text-white px-2 py-0.5 rounded-full">12</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="ppdb" data-title="SPMB — Metode Tanpa Pembelian Formulir" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Metode Tanpa Formulir</button>
                    <button data-view="ppdb-formulir" data-title="SPMB — Metode Dengan Pembelian Formulir" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Metode Dengan Formulir</button>
                </div>
            </div>

            <!-- 2. Kesiswaan -->
            <div class="sidebar-group open">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🎓</span><span class="flex-1 text-left">Kesiswaan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="siswa" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Data Siswa Aktif</button>
                    <button data-view="mutasi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Mutasi & Kenaikan Kelas</button>
                    <button data-view="kelulusan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Proses Kelulusan & Alumni</button>
                    <button data-view="kehadiran" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Laporan Kehadiran Siswa</button>
                    <button data-view="tatib" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tata Tertib Digital</button>
                </div>
            </div>

            <!-- 3. Kepegawaian -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>👔</span><span class="flex-1 text-left">Kepegawaian &amp; HRD</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="pegawai" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Data Pegawai Aktif</button>
                    <button data-view="administratif-pegawai" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Administratif Pegawai</button>
                    <button data-view="pensiun" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pensiun & Pengunduran Diri</button>
                    <button data-view="kehadiran-pegawai" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Laporan Kehadiran Pegawai</button>
                </div>
            </div>

            <!-- 4. Kurikulum -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📚</span><span class="flex-1 text-left">Kurikulum &amp; KBM</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="perangkat" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Perangkat Pembelajaran</button>
                    <button data-view="bank-soal" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Bank Soal, Modul &amp; Tugas</button>
                    <button data-view="cbt" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> CBT &amp; Penilaian Ujian</button>
                    <button data-view="jadwal" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Jadwal Pelajaran</button>
                    <button data-view="kpi-guru" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Performa Guru &amp; KPI</button>
                    <button data-view="erapor" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Cetak e-Rapor &amp; Legger</button>
                </div>
            </div>

            <!-- 5. Humas -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📢</span><span class="flex-1 text-left">Humas &amp; Komunikasi</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="pengumuman" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengumuman &amp; Memo Internal</button>
                    <button data-view="majalah" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Majalah Digital &amp; Edutainment</button>
                    <button data-view="buku-tamu" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Buku Tamu Digital</button>
                </div>
            </div>

            <!-- 6. Keuangan -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>💰</span><span class="flex-1 text-left">Keuangan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <p class="px-3 pt-2 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-500">Dashboard &amp; Ringkasan</p>
                    <button data-view="ringkasan-keuangan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Ringkasan Keuangan</button>
                    <button data-view="ringkasan-siswa" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Ringkasan Siswa</button>
                    <p class="px-3 pt-2 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-500">Sistem Keuangan — 2 Metode</p>
                    <button data-view="keuangan-metode1" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Metode 1 — Transaction-Based</button>
                    <button data-view="keuangan-metode2" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Metode 2 — Accounting-Based</button>
                    <p class="px-3 pt-2 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-500">Tagihan &amp; SPP</p>
                    <button data-view="daftar-tagihan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Daftar Tagihan</button>
                    <button data-view="grup-tagihan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Grup Tagihan</button>
                    <button data-view="monitoring-tagihan" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Monitoring Tagihan</button>
                    <button data-view="rekap-spp" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Rekap Tagihan SPP</button>
                    <p class="px-3 pt-2 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-500">E-Money &amp; Tabungan</p>
                    <button data-view="emoney-siswa" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> E-Money Siswa</button>
                    <button data-view="emoney-pegawai" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> E-Money Pegawai</button>
                    <button data-view="tabungan-siswa" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Tabungan Siswa</button>
                    <button data-view="infaq" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Infaq</button>
                    <p class="px-3 pt-2 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-500">Kantin &amp; Gaji</p>
                    <button data-view="laporan-kantin" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Laporan Kantin</button>
                    <button data-view="slip-gaji" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Slip Gaji Pegawai</button>
                    <p class="px-3 pt-2 pb-1 text-[10px] font-bold uppercase tracking-wider text-slate-500">Metode Pembayaran</p>
                    <button data-view="metode-pembayaran" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pengaturan Metode Pembayaran</button>
                </div>
            </div>

            <!-- 7. Akreditasi -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>📊</span><span class="flex-1 text-left">Akreditasi &amp; Laporan</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="akreditasi" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Akreditasi Digital</button>
                    <button data-view="smartcard" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Smartcard &amp; Geo-Tagging</button>
                    <button data-view="kartu-karakter" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Kartu Karakter &amp; Rapor</button>
                </div>
            </div>

            <!-- 8. Modul Khusus -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🕌</span><span class="flex-1 text-left">Modul Khusus</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="tahfidz" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Sentra Tahfidz &amp; Tahsin</button>
                    <button data-view="sentra-kehadiran" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Sentra Data &amp; Jurnal</button>
                    <button data-view="seminar" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Seminar &amp; Video Konferensi</button>
                    <button data-view="pusat-dokumen" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Pusat Unggah Dokumen</button>
                </div>
            </div>

            <!-- 9. Akses Keamanan -->
            <div class="sidebar-group">
                <button class="sidebar-group-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/5 transition-colors">
                    <span class="sidebar-group-chevron text-slate-500 text-xs">▶</span>
                    <span>🔒</span><span class="flex-1 text-left">Akses &amp; Keamanan Sistem</span>
                </button>
                <div class="sidebar-group-body pl-3">
                    <button data-view="users" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Manajemen User &amp; Role</button>
                    <button data-reset class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Reset Password Massal</button>
                    <button data-view="audit-admin" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Log Aktivitas Sistem</button>
                    <button data-view="backup" class="menu-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400 hover:bg-white/5 transition-colors"><span class="menu-dot w-1.5 h-1.5 rounded-full bg-slate-600"></span> Backup &amp; Restore Data</button>
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
                <div class="leading-tight">
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Administrasi / Operator</p>
                    <h1 id="pageTitle" class="font-heading font-bold text-slate-800 text-sm sm:text-base">Dashboard Operator</h1>
                </div>

                <div class="ml-auto flex items-center gap-2 sm:gap-3">
                    <!-- Search -->
                    <div class="hidden md:flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2 w-64">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                        <input type="text" placeholder="Cari siswa, NISN, surat..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                    </div>
                    <!-- Notif -->
                    <button onclick="showToast('info', '3 notifikasi baru')" class="relative w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 grid place-items-center text-slate-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Profile -->
                    <div class="flex items-center gap-2 pl-1 sm:pl-2 ml-1 sm:ml-2 border-l border-slate-200">
                        <div class="w-9 h-9 rounded-full hero-gradient grid place-items-center text-white font-heading font-bold text-xs">OP</div>
                        <div class="hidden sm:block leading-tight">
                            <p class="text-xs font-bold text-slate-800">Operator Sekolah</p>
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
                <!-- Stat Cards -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-navy/10 grid place-items-center text-navy">🎓</span>
                            <span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">▲ 34</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Siswa Aktif</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">1.240</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-sky2/10 grid place-items-center text-sky2">👔</span>
                            <span class="text-[11px] font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded-full">62·24</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Guru / Staf</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">86</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">📥</span>
                            <span class="text-[11px] font-bold text-amber2 bg-amber2/15 px-2 py-0.5 rounded-full">Hari ini</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Pendaftar SPMB</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">18</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">✅</span>
                            <span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">Normal</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Kehadiran Siswa</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">96%</p>
                    </div>
                </div>

                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <!-- LEFT -->
                    <div class="lg:col-span-2 space-y-4">
                        <!-- Quick Actions -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <h2 class="font-heading font-bold text-slate-800">Aksi Cepat</h2>
                            <div class="mt-4 grid grid-cols-2 sm:grid-cols-4 gap-3">
                                <button onclick="showToast('success', 'Menyiapkan cetak kartu ujian massal...')" class="flex flex-col items-center gap-2 bg-slate2 hover:bg-navy hover:text-white border border-slate-200 rounded-2xl p-4 text-xs font-bold text-slate-600 transition-colors">
                                    <span class="text-2xl">🖨️</span> Cetak Kartu Ujian
                                </button>
                                <button onclick="showToast('info', 'Membuka form input mutasi...')" class="flex flex-col items-center gap-2 bg-slate2 hover:bg-navy hover:text-white border border-slate-200 rounded-2xl p-4 text-xs font-bold text-slate-600 transition-colors">
                                    <span class="text-2xl">🔄</span> Input Mutasi
                                </button>
                                <button onclick="showToast('success', 'Broadcast pengumuman terkirim ke 1.326 penerima')" class="flex flex-col items-center gap-2 bg-slate2 hover:bg-navy hover:text-white border border-slate-200 rounded-2xl p-4 text-xs font-bold text-slate-600 transition-colors">
                                    <span class="text-2xl">📢</span> Broadcast Pengumuman
                                </button>
                                <button onclick="showToast('success', 'Backup database berhasil (128 MB)')" class="flex flex-col items-center gap-2 bg-slate2 hover:bg-navy hover:text-white border border-slate-200 rounded-2xl p-4 text-xs font-bold text-slate-600 transition-colors">
                                    <span class="text-2xl">💾</span> Backup Data
                                </button>
                            </div>
                        </div>

                        <!-- Weekly Attendance Chart -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div><h2 class="font-heading font-bold text-slate-800">Grafik Kehadiran Mingguan</h2><p class="text-xs text-slate-400">Tingkat kehadiran siswa 7 hari terakhir</p></div>
                                <span class="text-xs font-bold text-emerald2 bg-emerald2/10 px-3 py-1.5 rounded-full">Rata-rata 95,4%</span>
                            </div>
                            <div class="mt-6 flex items-end gap-2 sm:gap-4 h-40">
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full bg-navy/25 rounded-t-lg" style="height:78%"></div><span class="text-[10px] font-semibold text-slate-400">Sen</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full bg-navy/40 rounded-t-lg" style="height:86%"></div><span class="text-[10px] font-semibold text-slate-400">Sel</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full bg-navy/55 rounded-t-lg" style="height:92%"></div><span class="text-[10px] font-semibold text-slate-400">Rab</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full bg-sky2/70 rounded-t-lg" style="height:88%"></div><span class="text-[10px] font-semibold text-slate-400">Kam</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full bg-emerald2 rounded-t-lg" style="height:97%"></div><span class="text-[10px] font-semibold text-slate-400">Jum</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full bg-navy/30 rounded-t-lg" style="height:64%"></div><span class="text-[10px] font-semibold text-slate-400">Sab</span></div>
                                <div class="flex-1 flex flex-col items-center gap-2"><div class="w-full bg-navy/20 rounded-t-lg" style="height:12%"></div><span class="text-[10px] font-semibold text-slate-400">Min</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT: Activity Log -->
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <h2 class="font-heading font-bold text-slate-800">Aktivitas Terbaru</h2>
                            <button onclick="showToast('info','Membuka seluruh log aktivitas')" class="text-[11px] font-bold text-navy">Lihat semua</button>
                        </div>
                        <ul class="mt-4 space-y-3">
                            <li class="flex gap-3">
                                <span class="w-9 h-9 rounded-xl bg-emerald2/10 text-emerald2 grid place-items-center flex-shrink-0">✓</span>
                                <div><p class="text-sm font-semibold text-slate-700">Siswa baru terverifikasi</p><p class="text-xs text-slate-400">Aisyah Rahma · SPMB 2026 · 2 menit lalu</p></div>
                            </li>
                            <li class="flex gap-3">
                                <span class="w-9 h-9 rounded-xl bg-amber2/15 text-amber2 grid place-items-center flex-shrink-0">🔑</span>
                                <div><p class="text-sm font-semibold text-slate-700">Reset password massal</p><p class="text-xs text-slate-400">Kelas VIII-A · 24 akun · 20 menit lalu</p></div>
                            </li>
                            <li class="flex gap-3">
                                <span class="w-9 h-9 rounded-xl bg-sky2/10 text-sky2 grid place-items-center flex-shrink-0">📄</span>
                                <div><p class="text-sm font-semibold text-slate-700">Disposisi surat masuk</p><p class="text-xs text-slate-400">No. 042/UND/2026 · 1 jam lalu</p></div>
                            </li>
                            <li class="flex gap-3">
                                <span class="w-9 h-9 rounded-xl bg-navy/10 text-navy grid place-items-center flex-shrink-0">💾</span>
                                <div><p class="text-sm font-semibold text-slate-700">Backup database harian</p><p class="text-xs text-slate-400">Otomatis 02:00 · berhasil · 3 jam lalu</p></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: DATA SISWA ================= -->
            <section id="view-siswa" class="view">
                <!-- Header actions -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Data Siswa Aktif</h2>
                        <p class="text-xs text-slate-400">Kelola data seluruh siswa dalam satu database terintegrasi.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="showToast('info','Membuka form tambah siswa...')" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">+ Tambah Siswa</button>
                        <button onclick="showToast('info','Silakan unggah file CSV siswa')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📥 Import Excel</button>
                        <button onclick="showToast('success','Data siswa diekspor (1.240 baris)')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📤 Export</button>
                        <button onclick="showToast('info','Pilih siswa lalu jalankan aksi massal')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⚙️ Aksi Massal</button>
                    </div>
                </div>

                <!-- Filter Bar -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div class="lg:col-span-2 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                        <input id="filterSearch" type="text" placeholder="Cari nama atau NISN..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                    </div>
                    <select id="filterKelas" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                        <option value="">Semua Kelas / Rombel</option>
                        <option value="VIII-A">VIII-A</option>
                        <option value="VIII-B">VIII-B</option>
                        <option value="IX-A">IX-A</option>
                    </select>
                    <select id="filterStatus" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                        <option value="">Semua Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Mutasi">Mutasi</option>
                        <option value="Alumni">Alumni</option>
                    </select>
                </div>

                <!-- Bulk action bar -->
                <div id="bulkBar" class="hidden mt-4 bg-navy text-white rounded-2xl px-4 py-3 flex items-center gap-3">
                    <span class="text-sm font-semibold"><span id="bulkCount">0</span> siswa dipilih</span>
                    <div class="ml-auto flex flex-wrap gap-2">
                        <button onclick="showToast('success','Kartu ujian dicetak untuk siswa terpilih')" class="bg-white/15 hover:bg-white/25 text-xs font-bold px-3 py-2 rounded-lg">Cetak Kartu</button>
                        <button onclick="showToast('success','Siswa terpilih dinaikkan kelas')" class="bg-white/15 hover:bg-white/25 text-xs font-bold px-3 py-2 rounded-lg">Kenaikan Kelas</button>
                        <button onclick="showToast('info','Silakan konfirmasi ekspor data terpilih')" class="bg-white/15 hover:bg-white/25 text-xs font-bold px-3 py-2 rounded-lg">Export</button>
                    </div>
                </div>

                <!-- Table -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[900px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3"><input id="selectAll" type="checkbox" class="matrix"></th>
                                    <th class="px-4 py-3">Siswa</th>
                                    <th class="px-4 py-3">NISN / NIS</th>
                                    <th class="px-4 py-3">L/P</th>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Wali Kelas</th>
                                    <th class="px-4 py-3">Presensi</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="siswaBody" class="divide-y divide-slate-50">
                                <!-- Skeleton rows (JS replaces) -->
                                <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Empty state -->
                    <div id="siswaEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada data ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter kelas/status.</p>
                    </div>
                    <div class="px-4 py-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                        <span id="siswaCount">Menampilkan data siswa</span>
                        <div class="flex gap-1">
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">Sebelumnya</button>
                            <button class="px-3 py-1.5 rounded-lg bg-navy text-white font-semibold">1</button>
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">2</button>
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">Berikutnya</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: USER & ROLE ================= -->
            <section id="view-users" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Manajemen User &amp; Role</h2>
                        <p class="text-xs text-slate-400">Role-Based Access Control (RBAC) dengan custom permission per modul.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="openResetModal()" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔑 Reset Password Massal</button>
                        <button onclick="showToast('info','Membuka form tambah role baru')" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">+ Tambah Role</button>
                    </div>
                </div>

                <!-- Roles summary -->
                <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4"><p class="text-xs text-slate-400 font-semibold">Admin</p><p class="font-heading font-extrabold text-xl text-slate-800">2</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4"><p class="text-xs text-slate-400 font-semibold">Guru</p><p class="font-heading font-extrabold text-xl text-slate-800">62</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4"><p class="text-xs text-slate-400 font-semibold">Wali Kelas</p><p class="font-heading font-extrabold text-xl text-slate-800">36</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4"><p class="text-xs text-slate-400 font-semibold">Keuangan</p><p class="font-heading font-extrabold text-xl text-slate-800">4</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4"><p class="text-xs text-slate-400 font-semibold">Siswa</p><p class="font-heading font-extrabold text-xl text-slate-800">1.240</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4"><p class="text-xs text-slate-400 font-semibold">Orang Tua</p><p class="font-heading font-extrabold text-xl text-slate-800">1.180</p></div>
                </div>

                <!-- Permission matrix -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Matriks Permission (CRUD per Modul)</h3>
                        <span class="text-xs text-slate-400">Centang sesuai hak akses</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[820px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Modul</th>
                                    <th class="px-4 py-3 text-center">Admin</th>
                                    <th class="px-4 py-3 text-center">Guru</th>
                                    <th class="px-4 py-3 text-center">Wali Kelas</th>
                                    <th class="px-4 py-3 text-center">Keuangan</th>
                                    <th class="px-4 py-3 text-center">Siswa</th>
                                    <th class="px-4 py-3 text-center">Orang Tua</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 text-slate-600">
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-slate-700">Kesiswaan</td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-slate-700">Keuangan</td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-slate-700">Kurikulum</td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-slate-700">Kepegawaian</td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-slate-700">Humas &amp; Komunikasi</td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-slate-700">Tata Usaha &amp; Master Data</td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix" checked></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                    <td class="px-4 py-3 text-center"><input type="checkbox" class="matrix"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-4 py-3 border-t border-slate-100 flex justify-end gap-2">
                        <button onclick="showToast('info','Perubahan dibatalkan')" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                        <button onclick="showToast('success','Permission berhasil disimpan')" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan Permission</button>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PPDB / SPMB — METODE TANPA PEMBELIAN FORMULIR ================= -->
            <section id="view-ppdb" class="view">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">PPDB — Metode Tanpa Pembelian Formulir</h2>
                        <p class="text-xs text-slate-400">Jalur pendaftaran langsung/online tanpa membeli formulir. Operator melakukan verifikasi berkas calon siswa.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-amber2 bg-amber2/15 px-3 py-1.5 rounded-full whitespace-nowrap">● Jalur Aktif · SPMB 2026/2027</span>
                </div>

                <!-- Stat cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-navy/10 grid place-items-center text-navy">📥</span>
                            <span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">▲ 12</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Pendaftar</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">148</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Jalur Langsung / Online</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">🔍</span>
                            <span class="text-[11px] font-bold text-amber2 bg-amber2/15 px-2 py-0.5 rounded-full">Perlu Dicek</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Berkas Perlu Verifikasi</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">27</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Sudah unggah · menunggu pengecekan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">✅</span>
                            <span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">65%</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Diterima / Lolos</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">96</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Lulus seleksi administrasi</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-500">⚠️</span>
                            <span class="text-[11px] font-bold text-red-500 bg-red-50 px-2 py-0.5 rounded-full">Perbaikan</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Ditolak / Perlu Perbaikan</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">25</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Berkas dikembalikan ke pendaftar</p>
                    </div>
                </div>

                <!-- Workflow strip -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Verifikasi Berkas</p>
                    <div class="mt-3 flex items-center gap-2 overflow-x-auto no-scrollbar text-xs font-semibold">
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">📝 Calon Siswa Daftar Online</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">📥 Masuk Tabel Admin (Pending)</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-sky2/10 border border-sky2/20 px-3 py-2 rounded-xl text-sky2 whitespace-nowrap">🔍 Operator Cek Berkas</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">✅ Valid → Diterima + Auto WA</span>
                        <span class="text-slate-300">|</span>
                        <span class="flex items-center gap-2 bg-red-50 border border-red-200 px-3 py-2 rounded-xl text-red-600 whitespace-nowrap">⚠️ Buram → Minta Perbaikan + Link Upload</span>
                    </div>
                </div>

                <!-- Control bar -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div class="lg:col-span-2 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                            <input id="ppdbSearch" type="text" placeholder="Cari nama, no. pendaftaran, NIK, atau asal sekolah..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                        </div>
                        <select id="ppdbJalur" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option value="">Semua Jalur / Gelombang</option>
                            <option value="Gelombang 1">Gelombang 1</option>
                            <option value="Jalur Prestasi">Jalur Prestasi</option>
                            <option value="Jalur Zonasi">Jalur Zonasi</option>
                            <option value="Jalur Afirmasi">Jalur Afirmasi</option>
                        </select>
                        <select id="ppdbStatusFilter" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option value="">Semua Status</option>
                            <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                            <option value="Berkas Lengkap">Berkas Lengkap</option>
                            <option value="Berkas Tidak Sesuai">Berkas Tidak Sesuai</option>
                            <option value="Diterima">Diterima</option>
                        </select>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <button onclick="showToast('info','Membuka form tambah pendaftar manual (offline)...')" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">+ Tambah Pendaftar Manual</button>
                        <button onclick="exportPpdb()" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📤 Export Excel / CSV</button>
                        <button onclick="showToast('info','Membuka pengaturan gelombang &amp; jalur PPDB')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">⚙️ Pengaturan Jalur</button>
                    </div>
                </div>

                <!-- Data table -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1150px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">No. Pendaftaran</th>
                                    <th class="px-4 py-3">Calon Siswa</th>
                                    <th class="px-4 py-3">Asal Sekolah</th>
                                    <th class="px-4 py-3">Jurusan / Program</th>
                                    <th class="px-4 py-3">Kontak Orang Tua / WA</th>
                                    <th class="px-4 py-3">Berkas</th>
                                    <th class="px-4 py-3">Status Verifikasi</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="ppdbBody" class="divide-y divide-slate-50">
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="8" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="ppdbEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada pendaftar ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter jalur/status berkas.</p>
                    </div>
                    <div class="px-4 py-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                        <span id="ppdbCount">Menampilkan data pendaftar</span>
                        <div class="flex gap-1">
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">Sebelumnya</button>
                            <button class="px-3 py-1.5 rounded-lg bg-navy text-white font-semibold">1</button>
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">2</button>
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">Berikutnya</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: PPDB / SPMB — METODE DENGAN PEMBELIAN FORMULIR ================= -->
            <section id="view-ppdb-formulir" class="view">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">PPDB — Metode Dengan Pembelian Formulir</h2>
                        <p class="text-xs text-slate-400">Jalur berbayar. Calon siswa/orang tua membeli PIN/Kode Formulir terlebih dahulu sebelum dapat mengisi formulir pendaftaran.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-sky2 bg-sky2/10 px-3 py-1.5 rounded-full whitespace-nowrap">● Jalur Berbayar · SPMB 2026/2027</span>
                </div>

                <!-- Stat cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-navy/10 grid place-items-center text-navy">💳</span>
                            <span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">▲ 8</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Pembelian Formulir</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">Rp 18,5 jt</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">74 transaksi · Omzet pendaftaran</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">🔓</span>
                            <span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">Lunas</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Formulir Terverifikasi / Lunas</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">61</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Kode PIN aktif &amp; sudah dibayar</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">🕓</span>
                            <span class="text-[11px] font-bold text-amber2 bg-amber2/15 px-2 py-0.5 rounded-full">Menunggu</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Formulir Belum Diisi</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">18</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Sudah bayar, belum lengkapi biodata</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">✅</span>
                            <span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">Siap</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Pendaftaran Selesai</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">43</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Bayar + isi form · siap diseleksi</p>
                    </div>
                </div>

                <!-- Workflow strip -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Sistem (Workflow)</p>
                    <div class="mt-3 flex items-center gap-2 overflow-x-auto no-scrollbar text-xs font-semibold flex-nowrap">
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">💳 Ortu Beli Formulir / Bayar</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">🌐 Payment Gateway → Auto-Verifikasi Lunas</span>
                        <span class="text-slate-300">/</span>
                        <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">🏫 Kasir Sekolah → Operator Set Lunas</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-sky2/10 border border-sky2/20 px-3 py-2 rounded-xl text-sky2 whitespace-nowrap">🔑 Auto-Generate Kode PIN + WA Notif</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">📝 Ortu Login Pakai PIN</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">📎 Isi Formulir &amp; Upload Berkas</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">✅ Data Masuk Tabel (Siap Diseleksi)</span>
                    </div>
                </div>

                <!-- Control bar -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div class="lg:col-span-2 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                            <input id="pfSearch" type="text" placeholder="Cari no. transaksi, kode PIN, nama pembeli, NIK, atau WA ortu..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                        </div>
                        <select id="pfPayFilter" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option value="">Semua Status Pembayaran</option>
                            <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                            <option value="Lunas">Lunas / Terverifikasi</option>
                            <option value="Kadaluarsa">Kadaluarsa / Batal</option>
                        </select>
                        <select id="pfIsiFilter" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option value="">Semua Status Pengisian Form</option>
                            <option value="Belum Mengisi Form">Belum Mengisi Form</option>
                            <option value="Pengisian Sebagian">Pengisian Sebagian</option>
                            <option value="Formulir Selesai">Formulir Selesai</option>
                        </select>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <button onclick="showToast('info','Membuka form generasi kode formulir manual (kasir)...')" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">+ Generasi Kode Formulir Manual</button>
                        <button onclick="exportFormulir()" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📤 Export Data Transaksi &amp; Pendaftar</button>
                    </div>
                </div>

                <!-- Data table -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1150px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">No. Transaksi &amp; PIN</th>
                                    <th class="px-4 py-3">Pembeli / Orang Tua</th>
                                    <th class="px-4 py-3">Calon Siswa &amp; Asal Sekolah</th>
                                    <th class="px-4 py-3">Kanal &amp; Nominal</th>
                                    <th class="px-4 py-3">Status Bayar</th>
                                    <th class="px-4 py-3">Pengisian Form</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pfBody" class="divide-y divide-slate-50">
                                <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="pfEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada transaksi ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status bayar/pengisian form.</p>
                    </div>
                    <div class="px-4 py-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                        <span id="pfCount">Menampilkan data transaksi</span>
                        <div class="flex gap-1">
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">Sebelumnya</button>
                            <button class="px-3 py-1.5 rounded-lg bg-navy text-white font-semibold">1</button>
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">2</button>
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">Berikutnya</button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KESISWAAN — MUTASI & KENAIKAN KELAS ================= -->
            <section id="view-mutasi" class="view">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Mutasi &amp; Kenaikan Kelas</h2>
                        <p class="text-xs text-slate-400">Wizard kenaikan kelas massal &amp; pencatatan mutasi siswa masuk/keluar pada pergantian tahun ajaran.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-full whitespace-nowrap">● Tahun Ajaran Aktif 2026/2027</span>
                </div>

                <!-- Sub-tab navigation -->
                <div class="mt-4 inline-flex bg-white rounded-2xl border border-slate-100 shadow-sm p-1.5 gap-1">
                    <button class="mk-tab-btn active text-sm font-bold px-4 py-2.5 rounded-xl whitespace-nowrap transition-colors" data-tab="kenaikan" onclick="mkTab('kenaikan')">🎓 Kenaikan Kelas &amp; Rombel</button>
                    <button class="mk-tab-btn text-sm font-bold px-4 py-2.5 rounded-xl whitespace-nowrap transition-colors" data-tab="mutasi" onclick="mkTab('mutasi')">🔄 Mutasi Siswa (Masuk &amp; Keluar)</button>
                </div>

                <!-- ===== SUB-TAB 1: KENAIKAN KELAS ===== -->
                <div id="mk-tab-kenaikan" class="mk-tab-panel">
                    <div class="mt-4 bg-sky2/10 border border-sky2/20 rounded-2xl px-4 py-3 text-xs font-semibold text-sky2">🧙 Wizard Batch: pindahkan siswa secara massal dari kelas asal ke kelas tujuan saat pergantian tahun ajaran.</div>

                    <!-- Control bar asal & tujuan -->
                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase">Tahun Ajaran Asal</label>
                            <select id="mkTaAsal" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option>2025/2026</option>
                                <option>2024/2025</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase">Kelas Asal</label>
                            <select id="mkKelasAsal" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option>10-A</option>
                                <option>10-B</option>
                                <option>10-C</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase">Tahun Ajaran Tujuan</label>
                            <select id="mkTaTujuan" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option>2026/2027</option>
                                <option>2025/2026</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase">Kelas Tujuan</label>
                            <select id="mkKelasTujuan" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option>11-A</option>
                                <option>11-B</option>
                                <option>12-A</option>
                            </select>
                        </div>
                    </div>

                    <!-- Batch table -->
                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">Pemrosesan Massal Kenaikan Kelas</h3>
                            <span id="mkJumlah" class="text-xs font-bold text-navy bg-navy/10 px-3 py-1 rounded-full">0 siswa dipilih</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[950px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3"><input id="mkSelectAll" type="checkbox" class="matrix"></th>
                                        <th class="px-4 py-3">Foto</th>
                                        <th class="px-4 py-3">NISN</th>
                                        <th class="px-4 py-3">Nama Siswa</th>
                                        <th class="px-4 py-3">Nilai Rata-rata Rapor</th>
                                        <th class="px-4 py-3">Status Kehadiran</th>
                                        <th class="px-4 py-3">Status Kenaikan Kelas</th>
                                    </tr>
                                </thead>
                                <tbody id="mkKenaikanBody" class="divide-y divide-slate-50">
                                    <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="mkKenaikanEmpty" class="hidden py-14 text-center text-sm text-slate-400">Tidak ada siswa pada kelas asal ini.</div>
                        <!-- Action footer -->
                        <div class="px-4 py-4 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3 justify-between bg-slate-50/60">
                            <label class="flex items-center gap-2 text-sm text-slate-600"><input id="mkKunci" type="checkbox" class="matrix" checked> Kunci Data Rombel Baru &amp; Sync ke Portal Guru/Siswa</label>
                            <button onclick="prosesKenaikan()" class="inline-flex items-center justify-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-6 py-3 rounded-xl transition-colors shadow-lg shadow-navy/20">🚀 Proses Kenaikan Kelas Massal</button>
                        </div>
                    </div>
                </div>

                <!-- ===== SUB-TAB 2: MUTASI ===== -->
                <div id="mk-tab-mutasi" class="mk-tab-panel hidden space-y-4">
                    <!-- A. Mutasi Masuk -->
                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 justify-between">
                            <div class="flex items-start gap-3">
                                <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2 flex-shrink-0">📥</span>
                                <div><h3 class="font-heading font-bold text-slate-800">Mutasi Masuk</h3><p class="text-xs text-slate-400">Siswa pindahan dari sekolah lain (termasuk surat rekomendasi Dinas Pendidikan).</p></div>
                            </div>
                            <button onclick="openMkMasuk()" class="inline-flex items-center gap-2 bg-emerald2 hover:bg-emerald-600 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors whitespace-nowrap">+ Input Siswa Pindahan Masuk</button>
                        </div>
                        <div class="mt-4 overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[820px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr><th class="px-4 py-3">Nama Siswa</th><th class="px-4 py-3">NISN</th><th class="px-4 py-3">Sekolah Asal</th><th class="px-4 py-3">Ditempatkan</th><th class="px-4 py-3">No. Surat</th><th class="px-4 py-3">Tanggal</th></tr>
                                </thead>
                                <tbody id="mkMasukBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>

                    <!-- B. Mutasi Keluar -->
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 justify-between">
                            <div class="flex items-start gap-3">
                                <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2 flex-shrink-0">📤</span>
                                <div><h3 class="font-heading font-bold text-slate-800">Mutasi Keluar</h3><p class="text-xs text-slate-400">Siswa pindah ke sekolah lain &amp; penerbitan Surat Keterangan Pindah.</p></div>
                            </div>
                            <button onclick="openMkKeluar()" class="inline-flex items-center gap-2 bg-amber2 hover:bg-amber-600 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors whitespace-nowrap">+ Catat Siswa Pindah Keluar</button>
                        </div>
                        <div class="mt-4 overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[820px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr><th class="px-4 py-3">Nama Siswa</th><th class="px-4 py-3">NISN</th><th class="px-4 py-3">Sekolah Tujuan</th><th class="px-4 py-3">Alasan</th><th class="px-4 py-3">No. Surat</th><th class="px-4 py-3">Tanggal</th></tr>
                                </thead>
                                <tbody id="mkKeluarBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ===== RIWAYAT / AUDIT TRAIL ===== -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Riwayat Mutasi &amp; Kenaikan (Audit Trail)</h3>
                        <span class="text-xs text-slate-400">Log seluruh transaksi mutasi &amp; kenaikan kelas</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1000px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Tanggal Proses</th>
                                    <th class="px-4 py-3">Nama Siswa</th>
                                    <th class="px-4 py-3">NISN</th>
                                    <th class="px-4 py-3">Jenis Mutasi</th>
                                    <th class="px-4 py-3">Kelas Asal / Tujuan</th>
                                    <th class="px-4 py-3">Nomor Surat</th>
                                    <th class="px-4 py-3">Operator Pelapor</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="mkAuditBody" class="divide-y divide-slate-50"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KESISWAAN — PROSES KELULUSAN & ALUMNI ================= -->
            <section id="view-kelulusan" class="view">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Proses Kelulusan &amp; Alumni</h2>
                        <p class="text-xs text-slate-400">Pemrosesan kelulusan massal tingkat akhir &amp; database alumni (tracer study) sebagai arsip permanen sekolah.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-emerald2 bg-emerald2/10 px-3 py-1.5 rounded-full whitespace-nowrap">● Akhir Tahun Ajaran 2025/2026</span>
                </div>

                <!-- Sub-tab navigation -->
                <div class="mt-4 inline-flex bg-white rounded-2xl border border-slate-100 shadow-sm p-1.5 gap-1">
                    <button class="kl-tab-btn active text-sm font-bold px-4 py-2.5 rounded-xl whitespace-nowrap transition-colors" data-tab="kelulusan" onclick="klTab('kelulusan')">🎓 Pemrosesan Kelulusan Massal</button>
                    <button class="kl-tab-btn text-sm font-bold px-4 py-2.5 rounded-xl whitespace-nowrap transition-colors" data-tab="alumni" onclick="klTab('alumni')">🗂️ Database Alumni &amp; Siswa Non-Aktif</button>
                </div>

                <!-- ===== SUB-TAB 1: KELULUSAN ===== -->
                <div id="kl-tab-kelulusan" class="kl-tab-panel">
                    <div class="mt-4 bg-emerald2/10 border border-emerald2/20 rounded-2xl px-4 py-3 text-xs font-semibold text-emerald2">🎓 Digunakan operator/panitia kelulusan pada akhir tahun ajaran untuk memproses siswa tingkat akhir (Kelas 12 / All Rombel).</div>

                    <!-- Control bar -->
                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div>
                                <label class="text-[11px] font-bold text-slate-400 uppercase">Tahun Ajaran</label>
                                <select id="klTa" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600"><option>2025/2026</option><option>2024/2025</option></select>
                            </div>
                            <div>
                                <label class="text-[11px] font-bold text-slate-400 uppercase">Tingkat / Kelas Akhir</label>
                                <select id="klTingkat" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600"><option>Kelas 12 (All Rombel)</option><option>12-IPA-1</option><option>12-IPS-1</option></select>
                            </div>
                            <div>
                                <label class="text-[11px] font-bold text-slate-400 uppercase">Batas Min. Nilai Rata-rata</label>
                                <input id="klMinNilai" type="number" value="70" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            </div>
                            <div class="flex flex-col justify-center gap-1.5 pt-4">
                                <label class="flex items-center gap-2 text-xs font-semibold text-slate-600"><input id="klSyaratBerkas" type="checkbox" class="matrix" checked> Kelengkapan berkas wajib</label>
                                <label class="flex items-center gap-2 text-xs font-semibold text-slate-600"><input id="klSyaratBebas" type="checkbox" class="matrix" checked> Bebas pustaka &amp; keuangan</label>
                            </div>
                        </div>
                    </div>

                    <!-- Batch graduation table -->
                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-2 justify-between">
                            <h3 class="font-heading font-bold text-slate-800">Pemrosesan Kelulusan Massal</h3>
                            <div class="flex items-center gap-2">
                                <span id="klJumlah" class="text-xs font-bold text-navy bg-navy/10 px-3 py-1 rounded-full">0 siswa dipilih</span>
                                <button onclick="openKlCetak()" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-xs font-bold px-3 py-2 rounded-xl transition-colors">🖨️ Penerbitan Surat &amp; Dokumen</button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1100px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3"><input id="klSelectAll" type="checkbox" class="matrix"></th>
                                        <th class="px-4 py-3">Foto</th>
                                        <th class="px-4 py-3">NISN</th>
                                        <th class="px-4 py-3">Nama Siswa</th>
                                        <th class="px-4 py-3">Kelas</th>
                                        <th class="px-4 py-3">Rata-rata Nilai Akhir / US</th>
                                        <th class="px-4 py-3">Tunggakan Keuangan</th>
                                        <th class="px-4 py-3">Bebas Perpustakaan</th>
                                        <th class="px-4 py-3">Status Kelulusan</th>
                                    </tr>
                                </thead>
                                <tbody id="klKelulusanBody" class="divide-y divide-slate-50">
                                    <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Action footer -->
                        <div class="px-4 py-4 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center gap-3 justify-between bg-slate-50/60">
                            <label class="flex items-center gap-2 text-sm text-slate-600"><input id="klAlumniSync" type="checkbox" class="matrix" checked> Ubah status siswa Lulus menjadi 'Alumni' &amp; kirim notifikasi kelulusan via WA ke orang tua</label>
                            <button onclick="prosesKelulusan()" class="inline-flex items-center justify-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-6 py-3 rounded-xl transition-colors shadow-lg shadow-navy/20">🔒 Kunci &amp; Terbitkan Keputusan Kelulusan</button>
                        </div>
                    </div>
                </div>

                <!-- ===== SUB-TAB 2: ALUMNI ===== -->
                <div id="kl-tab-alumni" class="kl-tab-panel hidden">
                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div class="lg:col-span-2 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                            <input id="klSearch" type="text" placeholder="Cari nama alumni, NISN, NIK, atau HP/WA..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                        </div>
                        <select id="klAngkatan" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option value="">Semua Angkatan</option>
                            <option value="2026">Lulusan 2026</option>
                            <option value="2025">Lulusan 2025</option>
                            <option value="2024">Lulusan 2024</option>
                        </select>
                        <select id="klTracerFilter" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option value="">Semua Status Pasca-Lulus</option>
                            <option value="Melanjutkan Studi / Kuliah">Melanjutkan Studi / Kuliah</option>
                            <option value="Bekerja">Bekerja</option>
                            <option value="Wirausaha">Wirausaha</option>
                            <option value="Belum Terdata">Belum Terdata</option>
                        </select>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">Database Alumni &amp; Siswa Non-Aktif</h3>
                            <span id="klAlumniCount" class="text-xs text-slate-400">Menampilkan data alumni</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1250px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">NISN</th>
                                        <th class="px-4 py-3">Nama Alumni</th>
                                        <th class="px-4 py-3">L/P</th>
                                        <th class="px-4 py-3">Angkatan</th>
                                        <th class="px-4 py-3">Kontak &amp; Domisili</th>
                                        <th class="px-4 py-3">Tracer Study</th>
                                        <th class="px-4 py-3">Digital Vault</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="klAlumniBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                        <div id="klAlumniEmpty" class="hidden py-16 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                            <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada alumni ditemukan</p>
                            <p class="text-sm text-slate-400">Ubah kata kunci atau filter angkatan/tracer study.</p>
                        </div>
                    </div>
                </div>

                <!-- ===== WORKFLOW ===== -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Sistem (Workflow)</p>
                    <div class="mt-3 flex items-center gap-2 overflow-x-auto no-scrollbar text-xs font-semibold flex-nowrap">
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">📚 Data Nilai &amp; Syarat Lengkap</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">✅ Operator Set Status 'Lulus'</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-sky2/10 border border-sky2/20 px-3 py-2 rounded-xl text-sky2 whitespace-nowrap">🖨️ Auto-Generate SKL PDF &amp; WA Broadcast</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">🎓 Status Pindah ke Database Alumni</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">📝 Form Tracer Study Aktif</span>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KESISWAAN — LAPORAN KEHADIRAN SISWA ================= -->
            <section id="view-kehadiran" class="view">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan Kehadiran Siswa</h2>
                        <p class="text-xs text-slate-400">Analisis tren kehadiran, rekapitulasi per siswa, matriks bulanan, &amp; integrasi auto-alert ke E-BK / e-Rapor.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-sky2 bg-sky2/10 px-3 py-1.5 rounded-full whitespace-nowrap">● Periode: Oktober 2026</span>
                </div>

                <!-- Control bar -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-3">
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase">Filter Periode</label>
                            <select id="khPeriode" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option>Harian</option><option>Mingguan</option><option selected>Bulanan</option><option>Semester</option><option>Rentang Tanggal Custom</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase">Dari Tanggal</label>
                            <input id="khDari" type="date" value="2026-10-01" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase">Sampai Tanggal</label>
                            <input id="khSampai" type="date" value="2026-10-31" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase">Rombel / Tingkat</label>
                            <select id="khRombel" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Kelas</option><option value="10">Kelas 10</option><option value="11">Kelas 11</option><option value="12">Kelas 12</option><option value="10-A">10-A</option><option value="10-B">10-B</option><option value="10-C">10-C</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase">Status Kehadiran</label>
                            <select id="khStatus" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Status</option><option>Hadir</option><option>Sakit</option><option>Izin</option><option>Alpa / Tanpa Keterangan</option><option>Terlambat</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <button onclick="generateLaporan()" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📊 Generate Laporan</button>
                        <button onclick="exportLaporan('Excel/CSV')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📥 Export Excel / CSV</button>
                        <button onclick="exportLaporan('PDF')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Export PDF</button>
                    </div>
                </div>

                <!-- Stat cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">✅</span>
                            <span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">Rata-rata</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Persentase Kehadiran Total</p>
                        <p id="khStatPersen" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Periode terpilih</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-sky2/10 grid place-items-center text-sky2">🩺</span>
                            <span class="text-[11px] font-bold text-sky2 bg-sky2/10 px-2 py-0.5 rounded-full">S + I</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Sakit &amp; Izin</p>
                        <p id="khStatSI" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Lengkap dokumen pendukung</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-500">🚫</span>
                            <span class="text-[11px] font-bold text-red-500 bg-red-50 px-2 py-0.5 rounded-full">Alpa</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Alpa / Tanpa Keterangan</p>
                        <p id="khStatAlpa" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Akumulasi ketidakhadiran</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">⚠️</span>
                            <span class="text-[11px] font-bold text-amber2 bg-amber2/15 px-2 py-0.5 rounded-full">&gt; 3 hari</span>
                        </div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Siswa Rawan Membolos / Kritis</p>
                        <p id="khStatKritis" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Alpa melebihi batas toleransi</p>
                    </div>
                </div>

                <!-- Charts -->
                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between">
                            <div><h3 class="font-heading font-bold text-slate-800">Grafik Tren Kehadiran</h3><p class="text-xs text-slate-400">Tingkat kehadiran harian sepanjang periode</p></div>
                            <span class="text-xs font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-full">Skala 80–100%</span>
                        </div>
                        <div id="khLineChart" class="mt-4"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <h3 class="font-heading font-bold text-slate-800">Diagram Kategori Absensi</h3>
                        <p class="text-xs text-slate-400">Rasio Hadir, Sakit, Izin, Alpa, Terlambat</p>
                        <div class="mt-5 flex items-center gap-5">
                            <div class="relative w-36 h-36 flex-shrink-0">
                                <div id="khDonut" class="w-36 h-36 rounded-full bg-slate-100"></div>
                                <div class="absolute inset-[24px] rounded-full bg-white grid place-items-center">
                                    <div class="text-center"><p id="khDonutCenter" class="font-heading font-extrabold text-xl text-slate-800">-%</p><p class="text-[10px] text-slate-400">Hadir</p></div>
                                </div>
                            </div>
                            <div id="khDonutLegend" class="flex-1 space-y-2.5 text-xs"></div>
                        </div>
                    </div>
                </div>

                <!-- Recap table -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center gap-2 justify-between">
                        <h3 class="font-heading font-bold text-slate-800">Rekapitulasi Kehadiran Siswa</h3>
                        <div class="inline-flex bg-slate-100 rounded-xl p-1 gap-1">
                            <button class="kh-mode-btn active text-xs font-bold px-3 py-2 rounded-lg transition-colors" data-mode="siswa" onclick="khSetMode('siswa')">📋 Rekap Per Siswa</button>
                            <button class="kh-mode-btn text-xs font-bold px-3 py-2 rounded-lg transition-colors" data-mode="matriks" onclick="khSetMode('matriks')">🗓️ Matriks Bulanan</button>
                        </div>
                    </div>

                    <!-- Mode 1: per siswa -->
                    <div id="khRekapView">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1150px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Identitas Siswa</th>
                                        <th class="px-3 py-3 text-center">H</th>
                                        <th class="px-3 py-3 text-center">S</th>
                                        <th class="px-3 py-3 text-center">I</th>
                                        <th class="px-3 py-3 text-center">A</th>
                                        <th class="px-3 py-3 text-center">T</th>
                                        <th class="px-4 py-3">% Kehadiran</th>
                                        <th class="px-4 py-3">Status Peringatan</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="khRekapBody" class="divide-y divide-slate-50">
                                    <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="9" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="khRekapEmpty" class="hidden py-16 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                            <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada data kehadiran</p>
                            <p class="text-sm text-slate-400">Ubah filter periode atau rombel.</p>
                        </div>
                    </div>

                    <!-- Mode 2: matriks bulanan -->
                    <div id="khMatrixView" class="hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-[11px] min-w-[1250px]">
                                <thead class="bg-slate-50 text-slate-400" id="khMatrixHead"></thead>
                                <tbody id="khMatrixBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                        <div class="px-4 py-3 border-t border-slate-100 flex flex-wrap items-center gap-3 text-[11px] font-semibold text-slate-500">
                            <span class="text-slate-400 uppercase tracking-wide">Keterangan:</span>
                            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded bg-emerald2/20"></span> H · Hadir</span>
                            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded bg-sky2/20"></span> S · Sakit</span>
                            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded bg-amber2/25"></span> I · Izin</span>
                            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded bg-red-100"></span> A · Alpa</span>
                            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded bg-orange-100"></span> T · Terlambat</span>
                        </div>
                    </div>
                </div>

                <!-- Workflow -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Integrasi Sistem</p>
                    <div class="mt-3 flex items-center gap-2 overflow-x-auto no-scrollbar text-xs font-semibold flex-nowrap">
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">🪪 Presensi Masuk (Smartcard / App Guru)</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">🔄 Data Auto-Sync ke Laporan</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-red-50 border border-red-200 px-3 py-2 rounded-xl text-red-600 whitespace-nowrap">⚠️ Siswa Alpa &gt; 3 hari → Auto-Alert ke Portal E-BK</span>
                        <span class="text-slate-300">|</span>
                        <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">📗 Rekap Bulanan → Auto-Populate Draft e-Rapor</span>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KESISWAAN — TATA TERTIB DIGITAL ================= -->
            <section id="view-tatib" class="view">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Tata Tertib Digital</h2>
                        <p class="text-xs text-slate-400">Sistem poin kedisiplinan &amp; apresiasi: master aturan, log pelanggaran/prestasi harian, &amp; analitik peringkat.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-full whitespace-nowrap">● Berlaku TA 2026/2027</span>
                </div>

                <!-- Sub-tabs -->
                <div class="mt-4 flex flex-wrap bg-white rounded-2xl border border-slate-100 shadow-sm p-1.5 gap-1">
                    <button class="tt-tab-btn active text-sm font-bold px-4 py-2.5 rounded-xl whitespace-nowrap transition-colors" data-tab="master" onclick="ttTab('master')">📖 Master Kategori &amp; Poin</button>
                    <button class="tt-tab-btn text-sm font-bold px-4 py-2.5 rounded-xl whitespace-nowrap transition-colors" data-tab="log" onclick="ttTab('log')">📝 Log Pelanggaran &amp; Prestasi</button>
                    <button class="tt-tab-btn text-sm font-bold px-4 py-2.5 rounded-xl whitespace-nowrap transition-colors" data-tab="analitik" onclick="ttTab('analitik')">📊 Laporan &amp; Peringkat</button>
                </div>

                <!-- ===== TAB 1: MASTER ===== -->
                <div id="tt-tab-master" class="tt-tab-panel space-y-4">
                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">A. Master Poin Pelanggaran <span class="text-red-500">(Poin Minus)</span></h3>
                            <button onclick="showToast('info','Membuka form tambah pelanggaran')" class="text-xs font-bold text-white bg-navy hover:bg-sky2 px-3 py-2 rounded-xl transition-colors">+ Pelanggaran</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[820px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr><th class="px-4 py-3">Kode</th><th class="px-4 py-3">Deskripsi Pelanggaran</th><th class="px-4 py-3">Bobot Poin</th><th class="px-4 py-3">Tindakan / Sanksi Default</th></tr>
                                </thead>
                                <tbody id="ttPelanggaranBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">B. Master Poin Prestasi &amp; Apresiasi <span class="text-emerald2">(Poin Plus / Reward)</span></h3>
                            <button onclick="showToast('info','Membuka form tambah prestasi')" class="text-xs font-bold text-white bg-emerald2 hover:bg-emerald-600 px-3 py-2 rounded-xl transition-colors">+ Prestasi</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[820px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr><th class="px-4 py-3">Kode</th><th class="px-4 py-3">Deskripsi Capaian</th><th class="px-4 py-3">Bobot Poin</th><th class="px-4 py-3">Bentuk Apresiasi</th></tr>
                                </thead>
                                <tbody id="ttPrestasiBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-heading font-bold text-slate-800">C. Pengaturan Ambang Batas &amp; Sanksi Berjenjang <span class="text-xs font-normal text-slate-400">(Threshold Rules)</span></h3>
                            <button onclick="showToast('success','Pengaturan ambang batas disimpan')" class="text-xs font-bold text-white bg-navy hover:bg-sky2 px-3 py-2 rounded-xl transition-colors">Simpan Pengaturan</button>
                        </div>
                        <div id="ttThresholdGrid" class="mt-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-3"></div>
                    </div>
                </div>

                <!-- ===== TAB 2: LOG ===== -->
                <div id="tt-tab-log" class="tt-tab-panel hidden">
                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div class="lg:col-span-2 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                                <input id="ttSearch" type="text" placeholder="Cari nama siswa, NISN, atau kelas..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                            </div>
                            <select id="ttFilterTipe" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Tipe</option><option value="Pelanggaran">Pelanggaran</option><option value="Prestasi">Prestasi / Apresiasi</option>
                            </select>
                            <select id="ttFilterStatus" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Status Sanksi</option><option>Selesai</option><option>Dalam Pembinaan BK</option><option>Perlu Pemanggilan Ortu</option><option>Diproses BK</option><option>Surat Terbit</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <button onclick="openTtInput()" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">+ Input Catatan Pelanggaran / Prestasi Baru</button>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1150px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr><th class="px-4 py-3">Tanggal &amp; Waktu</th><th class="px-4 py-3">Identitas Siswa</th><th class="px-4 py-3">Jenis &amp; Deskripsi</th><th class="px-4 py-3">Bobot Poin</th><th class="px-4 py-3">Guru Pelapor</th><th class="px-4 py-3">Tindak Lanjut</th><th class="px-4 py-3 text-right">Aksi</th></tr>
                                </thead>
                                <tbody id="ttLogBody" class="divide-y divide-slate-50">
                                    <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="ttLogEmpty" class="hidden py-16 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                            <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada catatan ditemukan</p>
                            <p class="text-sm text-slate-400">Ubah kata kunci atau filter tipe/status.</p>
                        </div>
                    </div>
                </div>

                <!-- ===== TAB 3: ANALITIK ===== -->
                <div id="tt-tab-analitik" class="tt-tab-panel hidden">
                    <div class="mt-4 grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-500">🚫</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Total Pelanggaran Bulan Ini</p>
                            <p id="ttStatPelanggaran" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                            <p class="text-[11px] text-slate-400 mt-0.5">Akumulasi jumlah kasus</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">📛</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Siswa Capai Ambang SP</p>
                            <p id="ttStatSP" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                            <p class="text-[11px] text-slate-400 mt-0.5">Kategori rawan SP 1 / SP 2 / SP 3</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">🏅</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Total Apresiasi / Prestasi</p>
                            <p id="ttStatPrestasi" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                            <p class="text-[11px] text-slate-400 mt-0.5">Poin positif diberikan</p>
                        </div>
                    </div>

                    <div class="mt-4 grid lg:grid-cols-2 gap-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-2"><span class="text-emerald2">🏆</span><h3 class="font-heading font-bold text-slate-800">Siswa Paling Disiplin</h3></div>
                            <p class="text-xs text-slate-400">Peringkat poin prestasi tertinggi</p>
                            <ol id="ttLeaderPrestasi" class="mt-4 space-y-3"></ol>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-2"><span class="text-red-500">⚠️</span><h3 class="font-heading font-bold text-slate-800">Butuh Penanganan Khusus (BK)</h3></div>
                            <p class="text-xs text-slate-400">Akumulasi poin pelanggaran tertinggi</p>
                            <ol id="ttLeaderPelanggaran" class="mt-4 space-y-3"></ol>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4 flex flex-wrap gap-2">
                        <button onclick="cetakLaporanKelas()" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak Laporan Kedisiplinan Per Kelas</button>
                        <button onclick="cetakKartuKarakter()" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📇 Cetak Kartu Karakter Siswa (PDF)</button>
                    </div>
                </div>

                <!-- Workflow -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Sistem (Workflow)</p>
                    <div class="mt-3 flex items-center gap-2 overflow-x-auto no-scrollbar text-xs font-semibold flex-nowrap">
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">📝 Guru/Piket Input Pelanggaran</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">🧮 Poin Akumulasi Otomatis</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">📲 Notifikasi WA Real-time ke Ortu</span>
                        <span class="text-slate-300">|</span>
                        <span class="flex items-center gap-2 bg-red-50 border border-red-200 px-3 py-2 rounded-xl text-red-600 whitespace-nowrap">⚠️ Poin ≥ 50 → Auto-Trigger E-BK &amp; Draf Surat Panggilan</span>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KEPEGAWAIAN — DATA PEGAWAI AKTIF ================= -->
            <section id="view-pegawai" class="view">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Data Pegawai Aktif</h2>
                        <p class="text-xs text-slate-400">Kelola data seluruh SDM (guru &amp; tenaga kependidikan) dalam satu database terintegrasi.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-full whitespace-nowrap">● Tahun Ajaran 2026/2027</span>
                </div>

                <!-- Control bar -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div class="lg:col-span-2 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                            <input id="pgSearch" type="text" placeholder="Cari nama, NUPTK, NIP, atau NIK..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                        </div>
                        <select id="pgFilterStatus" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option value="">Semua Status Kepegawaian</option>
                            <option value="GTY">GTY - Guru Tetap Yayasan</option>
                            <option value="GTT">GTT - Guru Tidak Tetap</option>
                            <option value="PNS">PNS / PPPK</option>
                            <option value="PPPK">PPPK</option>
                            <option value="PTT">PTT - Pegawai Tidak Tetap</option>
                        </select>
                        <select id="pgFilterJabatan" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option value="">Semua Jabatan / Unit</option>
                            <option value="Guru Pengajar">Guru Pengajar</option>
                            <option value="Wali Kelas">Wali Kelas</option>
                            <option value="Tenaga Administrasi/TU">Tenaga Administrasi/TU</option>
                            <option value="Pustakawan">Pustakawan</option>
                            <option value="Laboran">Laboran</option>
                        </select>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <button onclick="openPgTambah()" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">+ Tambah Pegawai Baru</button>
                        <button onclick="showToast('info','Silakan unggah file CSV data pegawai')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📥 Import Excel (CSV)</button>
                        <button onclick="exportPegawai()" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📤 Export Data Pegawai</button>
                    </div>
                </div>

                <!-- Stat cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-navy/10 grid place-items-center text-navy">👥</span><span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">Aktif</span></div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Pegawai Aktif</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">86</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Seluruh SDM terdaftar &amp; bertugas</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-sky2/10 grid place-items-center text-sky2">🎓</span><span class="text-[11px] font-bold text-sky2 bg-sky2/10 px-2 py-0.5 rounded-full">72%</span></div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Guru Pengajar (Guru)</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">62</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Tenaga pendidik</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">🧰</span><span class="text-[11px] font-bold text-amber2 bg-amber2/15 px-2 py-0.5 rounded-full">28%</span></div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Tenaga Kependidikan (Tendik)</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">24</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">TU, kebersihan, keamanan, dll</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">📜</span><span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">Sertifikasi</span></div>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Sudah Sertifikasi / NUPTK</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">54</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Memiliki sertifikat pendidik / NUPTK</p>
                    </div>
                </div>

                <!-- Data table -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm min-w-[1150px]">
                            <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Foto &amp; Identitas Utama</th>
                                    <th class="px-4 py-3">Jabatan &amp; Tugas Tambahan</th>
                                    <th class="px-4 py-3">Status Kepegawaian &amp; Golongan</th>
                                    <th class="px-4 py-3">Kontak &amp; TMT</th>
                                    <th class="px-4 py-3">Status Akun Sistem</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pgBody" class="divide-y divide-slate-50">
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="pgEmpty" class="hidden py-16 text-center">
                        <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                        <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada pegawai ditemukan</p>
                        <p class="text-sm text-slate-400">Ubah kata kunci atau filter status/jabatan.</p>
                    </div>
                    <div class="px-4 py-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                        <span id="pgCount">Menampilkan data pegawai</span>
                        <div class="flex gap-1">
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">Sebelumnya</button>
                            <button class="px-3 py-1.5 rounded-lg bg-navy text-white font-semibold">1</button>
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">2</button>
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 font-semibold">Berikutnya</button>
                        </div>
                    </div>
                </div>

                <!-- Workflow -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Sistem (Workflow)</p>
                    <div class="mt-3 flex items-center gap-2 overflow-x-auto no-scrollbar text-xs font-semibold flex-nowrap">
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">🆕 Operator Input Pegawai Baru</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">🔐 Sistem Auto-Generate Akun Login</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-sky2/10 border border-sky2/20 px-3 py-2 rounded-xl text-sky2 whitespace-nowrap">📅 Terhubung ke Jadwal KBM</span>
                        <span class="text-slate-300">|</span>
                        <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">📍 Terhubung ke Presensi Geo-Tagging</span>
                        <span class="text-slate-300">|</span>
                        <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">💰 Terhubung ke Komponen Payroll</span>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KURIKULUM — PERANGKAT PEMBELAJARAN ================= -->
            <section id="view-perangkat" class="view">
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Perangkat Pembelajaran</h2>
                        <p class="text-xs text-slate-400">Bank dokumen perangkat &amp; monitoring validasi penyusunan perangkat guru.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-full whitespace-nowrap">● 2026/2027 · Semester Ganjil</span>
                </div>

                <!-- Tabs -->
                <div class="mt-4 flex gap-1 bg-slate-100 p-1 rounded-xl w-full sm:w-max overflow-x-auto no-scrollbar">
                    <button data-tab="bank" onclick="pdTab('bank')" class="pd-tab-btn active flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Bank &amp; Master Dokumen</button>
                    <button data-tab="validasi" onclick="pdTab('validasi')" class="pd-tab-btn flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Monitoring &amp; Validasi Kurikulum</button>
                </div>

                <!-- ===== TAB: BANK & MASTER DOKUMEN ===== -->
                <div id="pd-tab-bank" class="pd-tab-panel mt-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div class="lg:col-span-1 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                                <input id="pdSearch" type="text" placeholder="Cari guru, mapel, atau dokumen..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                            </div>
                            <select id="pdFilterTa" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">2026/2027 · Ganjil</option>
                                <option value="">2026/2027 · Genap</option>
                                <option value="">2025/2026 · Ganjil</option>
                            </select>
                            <select id="pdFilterTingkat" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Tingkat</option>
                                <option value="Kelas 10">Kelas 10</option>
                                <option value="Kelas 11">Kelas 11</option>
                                <option value="Kelas 12">Kelas 12</option>
                            </select>
                            <select id="pdFilterJenis" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Jenis Dokumen</option>
                                <option value="CP">Capaian Pembelajaran (CP)</option>
                                <option value="TP">Tujuan Pembelajaran (TP)</option>
                                <option value="ATP">Alur Tujuan Pembelajaran (ATP)</option>
                                <option value="Modul Ajar">Modul Ajar / RPP</option>
                                <option value="Prota">Program Tahunan (Prota)</option>
                                <option value="Promes">Program Semester (Promes)</option>
                                <option value="BTA">BTA / Matrikulasi</option>
                            </select>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <button onclick="openPdUpload()" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">+ Unggah Perangkat Baru</button>
                            <button onclick="showToast('info','Mengunduh format template resmi sekolah (.docx)')" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📥 Download Format Template Resmi</button>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <p class="font-heading font-bold text-slate-700 text-sm">Katalog Master Perangkat Pembelajaran</p>
                            <span id="pdCount" class="text-xs text-slate-400">-</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1050px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Mata Pelajaran &amp; Kelas</th>
                                        <th class="px-4 py-3">Guru Pengampu</th>
                                        <th class="px-4 py-3">Jenis &amp; Nama Dokumen</th>
                                        <th class="px-4 py-3">Versi &amp; Tanggal Unggah</th>
                                        <th class="px-4 py-3">Status Kelengkapan</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="pdBody" class="divide-y divide-slate-50">
                                    <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="pdEmpty" class="hidden py-14 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                            <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada perangkat ditemukan</p>
                            <p class="text-sm text-slate-400">Ubah kata kunci atau filter.</p>
                        </div>
                    </div>
                </div>

                <!-- ===== TAB: MONITORING & VALIDASI ===== -->
                <div id="pd-tab-validasi" class="pd-tab-panel mt-4 hidden">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-navy/10 grid place-items-center text-navy">🧑‍🏫</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Total Guru Wajib Unggah</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">86</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">✅</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Perangkat Terverifikasi</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">54</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">⏳</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Menunggu Verifikasi</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">22</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-500">↩️</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Perlu Revisi</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">10</p>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex flex-wrap items-center justify-between gap-2">
                            <p class="font-heading font-bold text-slate-700 text-sm">Monitoring &amp; Approval Verifikasi Perangkat</p>
                            <div class="flex items-center gap-3 text-[10px] font-semibold text-slate-400">
                                <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded bg-emerald2"></span>Approved</span>
                                <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded bg-amber2"></span>Pending</span>
                                <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded bg-red-500"></span>Revisi</span>
                                <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded bg-slate-300"></span>Belum Unggah</span>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1050px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Nama Guru &amp; NUPTK</th>
                                        <th class="px-4 py-3">Mata Pelajaran &amp; Kelas</th>
                                        <th class="px-2 py-3 text-center">CP</th>
                                        <th class="px-2 py-3 text-center">TP</th>
                                        <th class="px-2 py-3 text-center">ATP</th>
                                        <th class="px-2 py-3 text-center">Prota</th>
                                        <th class="px-2 py-3 text-center">Promes</th>
                                        <th class="px-2 py-3 text-center">Modul</th>
                                        <th class="px-4 py-3">Status Approval</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="pdMonBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Workflow -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Sistem (Workflow)</p>
                    <div class="mt-3 flex items-center gap-2 overflow-x-auto no-scrollbar text-xs font-semibold flex-nowrap">
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">📤 Guru Upload Perangkat via Portal Guru</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">📥 Data Masuk Tab Validasi Admin</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">✅ Kurikulum Approve → Auto Stempel Digital &amp; Arsip Master</span>
                        <span class="text-slate-300">|</span>
                        <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">↩️ Minta Revisi → Notifikasi WA ke Guru + Status Revisi</span>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: HUMAS — PENGUMUMAN & MEMO ================= -->
            <section id="view-pengumuman" class="view">
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Pengumuman &amp; Memo Internal</h2>
                        <p class="text-xs text-slate-400">Penerbitan pengumuman resmi &amp; broadcast WhatsApp massal ke wali murid, guru, dan siswa.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-emerald2 bg-emerald2/10 px-3 py-1.5 rounded-full whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-emerald2"></span> WA Gateway: Connected</span>
                </div>

                <div class="mt-4 flex gap-1 bg-slate-100 p-1 rounded-xl w-full sm:w-max overflow-x-auto no-scrollbar">
                    <button data-tab="kelola" onclick="hmTab('kelola')" class="hm-tab-btn active flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Penerbitan &amp; Kelola Pengumuman</button>
                    <button data-tab="wa" onclick="hmTab('wa')" class="hm-tab-btn flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Broadcast WhatsApp &amp; Notifikasi</button>
                </div>

                <!-- ===== TAB: KELOLA PENGUMUMAN ===== -->
                <div id="hm-tab-kelola" class="hm-tab-panel mt-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div class="lg:col-span-2 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                                <input id="hmSearch" type="text" placeholder="Cari judul, kata kunci, atau nomor surat/memo..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                            </div>
                            <select id="hmFilterTarget" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Audiens</option>
                                <option value="guru">Khusus Guru &amp; Staf</option>
                                <option value="ortu">Khusus Orang Tua / Wali</option>
                                <option value="siswa">Khusus Siswa</option>
                                <option value="kelas">Per Kelas / Rombel</option>
                            </select>
                            <select id="hmFilterStatus" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Status Publikasi</option>
                                <option value="Draf">Draf</option>
                                <option value="Terjadwal">Terjadwal</option>
                                <option value="Aktif">Aktif / Dipublikasi</option>
                                <option value="Diarsipkan">Diarsipkan</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <button onclick="openHmEditor()" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">+ Buat Pengumuman Baru</button>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1150px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Nomor &amp; Tanggal</th>
                                        <th class="px-4 py-3">Judul &amp; Kategori</th>
                                        <th class="px-4 py-3">Target Audiens</th>
                                        <th class="px-4 py-3">Kanal Distribusi</th>
                                        <th class="px-4 py-3">Keterbacaan (Read Analytics)</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="hmBody" class="divide-y divide-slate-50">
                                    <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="hmEmpty" class="hidden py-14 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                            <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada pengumuman ditemukan</p>
                            <p class="text-sm text-slate-400">Ubah kata kunci atau filter.</p>
                        </div>
                    </div>
                </div>

                <!-- ===== TAB: BROADCAST WA ===== -->
                <div id="hm-tab-wa" class="hm-tab-panel mt-4 hidden">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">💬</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Total WA Terkirim Bulan Ini</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">12.480</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">⏳</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Pesan Pending / Antrean</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">320</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-500">⚠️</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Gagal Terkirim (Failed)</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">87</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-navy/10 grid place-items-center text-navy">📡</span><span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full"><span class="w-1.5 h-1.5 rounded-full bg-emerald2"></span>Online</span></div>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Sisa Kuota / Status Gateway</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">48.000</p>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <p class="font-heading font-bold text-slate-700 text-sm">Log Pengiriman WhatsApp</p>
                            <span id="hmWaCount" class="text-xs text-slate-400">-</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[900px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Waktu Kirim</th>
                                        <th class="px-4 py-3">Nama Penerima &amp; No. WA</th>
                                        <th class="px-4 py-3">Tautan Pengumuman</th>
                                        <th class="px-4 py-3">Status Delivery</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="hmWaBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Workflow -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Sistem (Workflow)</p>
                    <div class="mt-3 space-y-2 text-xs font-semibold">
                        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar flex-nowrap">
                            <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">📝 Humas Buat Pengumuman</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">🎯 Pilih Target Audiens &amp; Klik Terbitkan</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-sky2/10 border border-sky2/20 px-3 py-2 rounded-xl text-sky2 whitespace-nowrap">📱 Auto-Publish di Feed Portal Apps</span>
                            <span class="text-slate-300">|</span>
                            <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">💬 Auto-Blast WA + Link PDF</span>
                        </div>
                        <div class="flex items-center gap-2 text-slate-400 pl-1">↓</div>
                        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar flex-nowrap">
                            <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">📊 Sistem Melacak 'Read Status'</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">📈 Statistik Dibaca vs Belum Dibaca Ter-update Real-time</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: AKREDITASI & LAPORAN — AKREDITASI DIGITAL ================= -->
            <section id="view-akreditasi" class="view">
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Akreditasi Digital</h2>
                        <p class="text-xs text-slate-400">Pemetaan eviden, simulasi skor mandiri, dan ekspor paket akreditasi siap SisWaN / DIA BAN-S/M.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-full whitespace-nowrap">● Instrumen Akreditasi 2024</span>
                </div>

                <div class="mt-4 flex gap-1 bg-slate-100 p-1 rounded-xl w-full sm:w-max overflow-x-auto no-scrollbar">
                    <button data-tab="eviden" onclick="akTab('eviden')" class="ak-tab-btn active flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Pemetaan &amp; Eviden</button>
                    <button data-tab="skor" onclick="akTab('skor')" class="ak-tab-btn flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Simulasi &amp; Self-Assessment</button>
                    <button data-tab="ekspor" onclick="akTab('ekspor')" class="ak-tab-btn flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Ekspor Paket &amp; Audit Trail</button>
                </div>

                <!-- ===== TAB: PEMETAAN & EVIDEN ===== -->
                <div id="ak-tab-eviden" class="ak-tab-panel mt-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div class="lg:col-span-1 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                                <input id="akSearch" type="text" placeholder="Cari butir, indikator, atau dokumen..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                            </div>
                            <select id="akFilterKomponen" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Komponen / Standar</option>
                                <option value="Mutu Lulusan">Mutu Lulusan</option>
                                <option value="Proses Pembelajaran">Proses Pembelajaran</option>
                                <option value="Mutu Guru">Mutu Guru</option>
                                <option value="Manajemen Sekolah">Manajemen Sekolah</option>
                            </select>
                            <select id="akFilterStatus" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Status Eviden</option>
                                <option value="Belum Ada Eviden">Belum Ada Eviden</option>
                                <option value="Menunggu Review">Menunggu Review</option>
                                <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                                <option value="Valid">Eviden Lengkap / Valid</option>
                            </select>
                            <div class="flex gap-2">
                                <button onclick="showToast('info','Silakan pilih butir untuk mengunggah dokumen eviden')" class="flex-1 inline-flex items-center justify-center gap-1 bg-navy hover:bg-sky2 text-white text-sm font-bold px-3 py-2.5 rounded-xl transition-colors">+ Unggah Eviden</button>
                                <button onclick="showToast('success','Progress akreditasi diekspor (.xlsx)')" class="inline-flex items-center gap-1 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-3 py-2.5 rounded-xl transition-colors">📥</button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1250px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">No. &amp; Kode Butir</th>
                                        <th class="px-4 py-3">Indikator / Deskripsi</th>
                                        <th class="px-4 py-3">Dokumen Eviden Dibutuhkan</th>
                                        <th class="px-4 py-3">Dokumen Ter-upload</th>
                                        <th class="px-4 py-3">Skor Mandiri</th>
                                        <th class="px-4 py-3">Status Verifikasi</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="akBody" class="divide-y divide-slate-50">
                                    <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="7" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="akEmpty" class="hidden py-14 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                            <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada butir ditemukan</p>
                            <p class="text-sm text-slate-400">Ubah kata kunci atau filter.</p>
                        </div>
                    </div>
                </div>

                <!-- ===== TAB: SIMULASI & SELF-ASSESSMENT ===== -->
                <div id="ak-tab-skor" class="ak-tab-panel mt-4 hidden">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-navy/10 grid place-items-center text-navy">🏆</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Estimasi Nilai Akhir</p>
                            <p id="akNilai" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                            <p class="text-[11px] text-slate-400">dari skala 100</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">🎖️</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Predikat Akreditasi</p>
                            <p id="akPredikat" class="font-heading font-extrabold text-2xl text-emerald2">-</p>
                            <p id="akPredikatSub" class="text-[11px] text-slate-400">Proyeksi hasil</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-sky2/10 grid place-items-center text-sky2">📁</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Eviden Terkumpul (%)</p>
                            <p id="akEviden" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                            <p class="text-[11px] text-slate-400">kesiapan dokumen</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-500">📌</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Butir Belum Terisi</p>
                            <p id="akBelum" class="font-heading font-extrabold text-2xl text-slate-800">-</p>
                            <p class="text-[11px] text-slate-400">belum ada bukti fisik</p>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100"><p class="font-heading font-bold text-slate-700 text-sm">Simulasi Nilai Per Komponen</p></div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[900px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Komponen Akreditasi</th>
                                        <th class="px-4 py-3">Jumlah Butir</th>
                                        <th class="px-4 py-3">Rata-rata Skor Mandiri</th>
                                        <th class="px-4 py-3">Bobot Komponen (%)</th>
                                        <th class="px-4 py-3">Subtotal Nilai</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="akKomponenBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ===== TAB: EKSPOR PAKET & AUDIT TRAIL ===== -->
                <div id="ak-tab-ekspor" class="ak-tab-panel mt-4 hidden">
                    <div class="grid lg:grid-cols-2 gap-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <p class="font-heading font-bold text-slate-700 text-sm">Generate Zip / Cloud Folder Per Komponen</p>
                            <p class="text-xs text-slate-400 mt-0.5">Mengelompokkan seluruh berkas PDF ke folder terstruktur otomatis.</p>
                            <div class="mt-3 space-y-2" id="akZipList"></div>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex flex-col">
                            <p class="font-heading font-bold text-slate-700 text-sm">Generator Buku Profil Sekolah &amp; Ringkasan Eviden</p>
                            <p class="text-xs text-slate-400 mt-0.5">Mencetak rekapitulasi seluruh tautan dokumen eviden.</p>
                            <div class="mt-3 rounded-2xl border border-dashed border-slate-300 p-4 text-xs text-slate-500 bg-slate-50">
                                <p class="font-semibold text-slate-600">Isi paket:</p>
                                <ul class="mt-1 space-y-1"><li>• Profil &amp; Identitas Sekolah</li><li>• Rekapitulasi Eviden per Komponen</li><li>• Tautan Dokumen &amp; Skor Mandiri</li></ul>
                            </div>
                            <button onclick="showToast('success','Buku Profil Sekolah & Ringkasan Eviden (PDF) dibuat')" class="mt-auto pt-4"><span class="block bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors text-center">📄 Generate Buku Profil &amp; Eviden PDF</span></button>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100"><p class="font-heading font-bold text-slate-700 text-sm">Riwayat Pengunggahan &amp; Reviu</p></div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[800px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Waktu</th>
                                        <th class="px-4 py-3">Anggota Tim</th>
                                        <th class="px-4 py-3">Aktivitas</th>
                                        <th class="px-4 py-3">Butir Terkait</th>
                                    </tr>
                                </thead>
                                <tbody id="akHistoryBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Workflow -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Sistem (Workflow)</p>
                    <div class="mt-3 space-y-2 text-xs font-semibold">
                        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar flex-nowrap">
                            <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">📤 Tim Akreditasi Upload Eviden PDF</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">🔎 Reviewer Internal/Kepsek Verifikasi Validitas</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">✅ Eviden Valid → Skor Mandiri Terhitung Otomatis</span>
                            <span class="text-slate-300">|</span>
                            <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">↩️ Belum Sesuai → Notifikasi Catatan Revisi</span>
                        </div>
                        <div class="flex items-center gap-2 text-slate-400 pl-1">↓</div>
                        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar flex-nowrap">
                            <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">🎯 Seluruh Butir Lengkap (100%)</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">🗜️ Generate Paket Zip Eviden Ready untuk SisWaN / DIA BAN-S/M</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: KEUANGAN — RINGKASAN KEUANGAN ================= -->
            <section id="view-ringkasan-keuangan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Ringkasan Keuangan</h2>
                        <p class="text-xs text-slate-400">Overview kondisi keuangan sekolah secara real-time dalam satu halaman.</p>
                    </div>
                    <span id="rkLastSync" class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-emerald2 bg-emerald2/10 px-3 py-1.5 rounded-full whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-emerald2"></span> Sinkron terakhir: 18 Okt 2026 10:42</span>
                </div>

                <!-- Control bar -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        <select id="rkPeriode" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option>Tahun Ajaran 2026/2027</option>
                            <option>Tahun Ajaran 2025/2026</option>
                        </select>
                        <select id="rkRentang" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option>Hari Ini</option>
                            <option selected>Bulan Ini</option>
                            <option>Triwulan</option>
                            <option>Semester</option>
                            <option>Rentang Tanggal Custom</option>
                        </select>
                        <select id="rkUnit" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                            <option>Semua Unit</option>
                            <option>TK</option>
                            <option>SD</option>
                            <option>SMP</option>
                            <option>SMA</option>
                        </select>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <button onclick="rkExport()" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📥 Export Summary (PDF / Excel)</button>
                        <button onclick="rkRefresh()" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔄 Refresh Data</button>
                    </div>
                </div>

                <!-- Stat cards -->
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-5 gap-3 sm:gap-4">
                    <div class="bg-navy rounded-2xl p-5 text-white col-span-2 lg:col-span-1">
                        <div class="flex items-center justify-between"><span class="w-10 h-10 rounded-xl bg-white/15 grid place-items-center">🏦</span><span class="text-[10px] font-bold bg-white/15 px-2 py-0.5 rounded-full">Kas &amp; Bank</span></div>
                        <p class="mt-3 text-xs font-semibold text-white/70">Total Saldo Kas &amp; Bank</p>
                        <p class="font-heading font-extrabold text-2xl">Rp 4,82 M</p>
                        <p class="text-[11px] text-white/60 mt-0.5">Kas Tunai + Mandiri/BCA/BSI</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">📈</span>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Pemasukan (Cash-In)</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">Rp 6,95 M</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">SPP, uang gedung, sumbangan</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">📉</span>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Pengeluaran (Cash-Out)</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">Rp 5,02 M</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Payroll, sarpra, ATK</p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <span class="w-10 h-10 rounded-xl bg-sky2/10 grid place-items-center text-sky2">🎯</span>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Pelunasan SPP Bulan Ini</p>
                        <p class="font-heading font-extrabold text-2xl text-slate-800">88%</p>
                        <div class="mt-1 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-emerald2" style="width:88%"></div></div>
                        <p class="text-[11px] text-slate-400 mt-1"><span class="text-emerald2 font-semibold">88% Lunas</span> | <span class="text-red-500 font-semibold">12% Menunggak</span></p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <span class="w-10 h-10 rounded-xl bg-red-100 grid place-items-center text-red-500">🧾</span>
                        <p class="mt-3 text-xs font-semibold text-slate-400">Total Tunggakan Aktif (AR)</p>
                        <p class="font-heading font-extrabold text-2xl text-red-500">Rp 128,4 jt</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Tagihan belum dibayar</p>
                    </div>
                </div>

                <!-- Chart A: Cash Flow -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <div><p class="font-heading font-bold text-slate-700 text-sm">Arus Kas / Cash Flow</p><p class="text-xs text-slate-400">Komparasi Pemasukan vs Pengeluaran per bulan + tren Net Income</p></div>
                        <div class="flex items-center gap-3 text-[10px] font-semibold text-slate-400">
                            <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded bg-navy"></span>Pemasukan</span>
                            <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded bg-amber2"></span>Pengeluaran</span>
                            <span class="flex items-center gap-1"><span class="w-4 h-0.5 bg-emerald2"></span>Net Income</span>
                        </div>
                    </div>
                    <div id="rkCashChart" class="mt-3"></div>
                </div>

                <!-- Charts B & C -->
                <div class="mt-4 grid lg:grid-cols-2 gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="font-heading font-bold text-slate-700 text-sm">Rasio Komposisi Pemasukan</p>
                        <p class="text-xs text-slate-400">Sumber pendapatan periode terpilih</p>
                        <div class="mt-4 flex items-center gap-6">
                            <div id="rkDonut" class="w-32 h-32 rounded-full flex-shrink-0 relative"><div class="absolute inset-[18%] bg-white rounded-full grid place-items-center"><div class="text-center"><p class="font-heading font-extrabold text-lg text-slate-800">100%</p><p class="text-[9px] text-slate-400">Pemasukan</p></div></div></div>
                            <ul id="rkDonutLegend" class="flex-1 space-y-2.5 text-sm"></ul>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="font-heading font-bold text-slate-700 text-sm">Persentase Pelunasan Per Kelas</p>
                        <p class="text-xs text-slate-400">Tingkat kepatuhan bayar antar rombel</p>
                        <div id="rkKelasChart" class="mt-4 space-y-2.5"></div>
                    </div>
                </div>

                <!-- Lower section -->
                <div class="mt-4 grid lg:grid-cols-3 gap-4">
                    <!-- A. Live Payment Feed -->
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald2 animate-pulse"></span><p class="font-heading font-bold text-slate-700 text-sm">Live Payment Feed</p></div>
                            <span id="rkFeedCount" class="text-xs text-slate-400">-</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[720px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Jam / Tanggal</th>
                                        <th class="px-4 py-3">Nama Siswa &amp; Kelas</th>
                                        <th class="px-4 py-3">Jenis Pembayaran</th>
                                        <th class="px-4 py-3">Channel Bayar</th>
                                        <th class="px-4 py-3 text-right">Nominal</th>
                                        <th class="px-4 py-3 text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="rkFeedBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>

                    <!-- B. Quick Actions & Warnings -->
                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-2"><span class="w-9 h-9 rounded-xl bg-red-100 grid place-items-center text-red-500">⏰</span><div><p class="font-heading font-bold text-slate-700 text-sm">Tunggakan Jatuh Tempo</p><p class="text-[11px] text-slate-400">Melampaui tanggal jatuh tempo</p></div></div>
                            <div id="rkTunggakan" class="mt-3 space-y-2"></div>
                            <button onclick="rkWaBlast()" class="mt-3 w-full inline-flex items-center justify-center gap-2 bg-emerald2 hover:bg-emerald2/90 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📲 Blast WA Tagihan Massal</button>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center gap-2"><span class="w-9 h-9 rounded-xl bg-sky2/10 grid place-items-center text-sky2">🏛️</span><p class="font-heading font-bold text-slate-700 text-sm">Status Rekonciliasi Bank</p></div>
                            <div class="mt-3 flex items-center gap-3">
                                <div class="relative w-16 h-16 rounded-full grid place-items-center" style="background:conic-gradient(#10B981 0% 100%)"><div class="absolute inset-[15%] bg-white rounded-full grid place-items-center"><span class="font-heading font-extrabold text-sm text-emerald2">100%</span></div></div>
                                <div><p class="text-sm font-bold text-emerald2">Match / Terverifikasi Otomatis</p><p class="text-[11px] text-slate-400">Seluruh transaksi bank tersinkron otomatis</p></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Workflow -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Integrasi Sistem (Workflow)</p>
                    <div class="mt-3 flex items-center gap-2 overflow-x-auto no-scrollbar text-xs font-semibold flex-nowrap">
                        <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">💳 Siswa Bayar via VA / QRIS / Kasir</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">⚡ Update Real-Time ke Ringkasan Keuangan</span>
                        <span class="text-slate-300">→</span>
                        <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">💰 Kalkulasi Balance Kas/Bank</span>
                        <span class="text-slate-300">|</span>
                        <span class="flex items-center gap-2 bg-sky2/10 border border-sky2/20 px-3 py-2 rounded-xl text-sky2 whitespace-nowrap">📊 Cash Flow &amp; % Pelunasan Ter-update</span>
                        <span class="text-slate-300">|</span>
                        <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">🖨️ Export Laporan Eksekutif PDF</span>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: MODUL KHUSUS — SENTRA TAHFIDZ & TAHSIN ================= -->
            <section id="view-tahfidz" class="view">
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 justify-between">
                    <div>
                        <h2 class="font-heading font-extrabold text-xl text-slate-800">Sentra Tahfidz &amp; Tahsin</h2>
                        <p class="text-xs text-slate-400">Monitoring setoran harian, ujian munaqasyah, sertifikasi syahadah, dan pemetaan halaqah.</p>
                    </div>
                    <span class="inline-flex items-center gap-2 self-start text-[11px] font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-full whitespace-nowrap">● Semester Ganjil 2026/2027</span>
                </div>

                <div class="mt-4 flex gap-1 bg-slate-100 p-1 rounded-xl w-full sm:w-max overflow-x-auto no-scrollbar">
                    <button data-tab="setoran" onclick="thTab('setoran')" class="th-tab-btn active flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Setoran Harian &amp; Target</button>
                    <button data-tab="munaqasyah" onclick="thTab('munaqasyah')" class="th-tab-btn flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Ujian Munaqasyah &amp; Sertifikasi</button>
                    <button data-tab="master" onclick="thTab('master')" class="th-tab-btn flex-1 sm:flex-none text-sm font-bold px-4 py-2 rounded-lg whitespace-nowrap">Master Target &amp; Halaqah</button>
                </div>

                <!-- ===== TAB: SETORAN HARIAN ===== -->
                <div id="th-tab-setoran" class="th-tab-panel mt-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div class="lg:col-span-1 flex items-center gap-2 bg-slate-100 rounded-xl px-3 py-2.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path></svg>
                                <input id="thSearch" type="text" placeholder="Cari siswa, NISN, atau musyrif..." class="bg-transparent text-sm outline-none w-full placeholder:text-slate-400">
                            </div>
                            <select id="thFilterKelompok" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Kelompok</option>
                                <option value="Halaqah 1 - Ust. Ahmad">Halaqah 1 - Ust. Ahmad</option>
                                <option value="Halaqah 2 - Ustzh. B">Halaqah 2 - Ustzh. B</option>
                                <option value="Halaqah 3 - Ust. Fauzan">Halaqah 3 - Ust. Fauzan</option>
                            </select>
                            <select id="thFilterProgram" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Program</option>
                                <option value="Tahsin">Tahsin / Perbaikan Bacaan</option>
                                <option value="Tahfidz Reguler">Tahfidz Reguler</option>
                                <option value="Tahfidz Takhassus">Tahfidz Takhassus / Target Cepat</option>
                            </select>
                            <select id="thFilterCapaian" class="bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-600">
                                <option value="">Semua Capaian Target</option>
                                <option value="On Track">Sesuai Target / On Track</option>
                                <option value="Perlu Bimbingan">Di Bawah Target / Perlu Bimbingan</option>
                                <option value="Melampaui">Melampaui Target</option>
                            </select>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <button onclick="openThInput()" class="inline-flex items-center gap-2 bg-navy hover:bg-sky2 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">+ Input Setoran Massal</button>
                            <button onclick="thExport()" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📥 Export Progress Tahfidz</button>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1050px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Identitas Siswa &amp; Halaqah</th>
                                        <th class="px-4 py-3">Program &amp; Jilid/Juz</th>
                                        <th class="px-4 py-3">Setoran Terakhir</th>
                                        <th class="px-4 py-3">Kualitas Bacaan</th>
                                        <th class="px-4 py-3">Capaian Target</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="thBody" class="divide-y divide-slate-50">
                                    <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                    <tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="thEmpty" class="hidden py-14 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 grid place-items-center text-3xl">📭</div>
                            <p class="mt-4 font-heading font-bold text-slate-700">Tidak ada data ditemukan</p>
                            <p class="text-sm text-slate-400">Ubah kata kunci atau filter.</p>
                        </div>
                    </div>
                </div>

                <!-- ===== TAB: MUNAQASYAH ===== -->
                <div id="th-tab-munaqasyah" class="th-tab-panel mt-4 hidden">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-navy/10 grid place-items-center text-navy">📋</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Pendaftar Ujian Bulan Ini</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">18</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-emerald2/10 grid place-items-center text-emerald2">✅</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Lulus Munaqasyah</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">14</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-sky2/10 grid place-items-center text-sky2">🎓</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Sertifikat / Syahadah Terbit</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">12</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <span class="w-10 h-10 rounded-xl bg-amber2/15 grid place-items-center text-amber2">🕌</span>
                            <p class="mt-3 text-xs font-semibold text-slate-400">Peserta Khotmil Qur'an</p>
                            <p class="font-heading font-extrabold text-2xl text-slate-800">6</p>
                        </div>
                    </div>

                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100"><p class="font-heading font-bold text-slate-700 text-sm">Data Ujian &amp; Munaqasyah</p></div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm min-w-[1100px]">
                                <thead class="bg-slate-50 text-[11px] uppercase text-slate-400">
                                    <tr>
                                        <th class="px-4 py-3">Siswa &amp; Juz Diumujikan</th>
                                        <th class="px-4 py-3">Tanggal &amp; Penguji</th>
                                        <th class="px-3 py-3 text-center">Tajwid &amp; Makhraj</th>
                                        <th class="px-3 py-3 text-center">Kelancaran</th>
                                        <th class="px-3 py-3 text-center">Adab Tilaawah</th>
                                        <th class="px-4 py-3">Status Kelulusan</th>
                                        <th class="px-4 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="thUjianBody" class="divide-y divide-slate-50"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ===== TAB: MASTER TARGET & HALAQAH ===== -->
                <div id="th-tab-master" class="th-tab-panel mt-4 hidden">
                    <div class="grid lg:grid-cols-2 gap-4">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div><p class="font-heading font-bold text-slate-700 text-sm">Master Target Per Angkatan</p><p class="text-xs text-slate-400 mt-0.5">Standar minimal kelulusan juz/jilid per tingkat</p></div>
                                <button onclick="showToast('info','Form edit master target')" class="text-[11px] font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-lg whitespace-nowrap">+ Edit Target</button>
                            </div>
                            <div class="mt-3 overflow-x-auto">
                                <table class="w-full text-left text-sm min-w-[360px]">
                                    <thead class="bg-slate-50 text-[10px] uppercase text-slate-400"><tr><th class="px-3 py-2">Tingkat</th><th class="px-3 py-2">Target Minimal Kelulusan</th></tr></thead>
                                    <tbody id="thMasterBody" class="divide-y divide-slate-50"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                            <div class="flex items-center justify-between">
                                <div><p class="font-heading font-bold text-slate-700 text-sm">Plotting Kelompok Halaqah</p><p class="text-xs text-slate-400 mt-0.5">Pembagian siswa &amp; penunjukan musyrif</p></div>
                                <button onclick="showToast('info','Form plotting halaqah baru')" class="text-[11px] font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-lg whitespace-nowrap">+ Halaqah</button>
                            </div>
                            <div id="thHalaqahList" class="mt-3 space-y-2"></div>
                        </div>
                    </div>
                    <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                        <p class="font-heading font-bold text-slate-700 text-sm">Katalog Penilaian Tajwid &amp; Ghorib</p>
                        <p class="text-xs text-slate-400 mt-0.5">Rubrik standar penilaian kualitas bacaan</p>
                        <div id="thRubrikList" class="mt-3 grid sm:grid-cols-2 lg:grid-cols-3 gap-3"></div>
                    </div>
                </div>

                <!-- Workflow -->
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alur Kerja Sistem (Workflow)</p>
                    <div class="mt-3 space-y-2 text-xs font-semibold">
                        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar flex-nowrap">
                            <span class="flex items-center gap-2 bg-slate2 border border-slate-200 px-3 py-2 rounded-xl text-slate-600 whitespace-nowrap">🧑‍🏫 Musyrif Input Setoran via Portal Guru</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">🔄 Progress &amp; Nilai Auto-Sync ke Admin</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-sky2/10 border border-sky2/20 px-3 py-2 rounded-xl text-sky2 whitespace-nowrap">📊 Auto-Update Progress Bar % Target</span>
                            <span class="text-slate-300">|</span>
                            <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">📲 Notifikasi WA Resume Setoran ke Ortu</span>
                        </div>
                        <div class="flex items-center gap-2 text-slate-400 pl-1">↓</div>
                        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar flex-nowrap">
                            <span class="flex items-center gap-2 bg-navy/10 border border-navy/20 px-3 py-2 rounded-xl text-navy whitespace-nowrap">🎯 Siswa Capai Target 1 Juz</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">📝 Daftar Munaqasyah</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-amber2/10 border border-amber2/20 px-3 py-2 rounded-xl text-amber2 whitespace-nowrap">🧑‍⚖️ Ujian Munaqisy</span>
                            <span class="text-slate-300">→</span>
                            <span class="flex items-center gap-2 bg-emerald2/10 border border-emerald2/20 px-3 py-2 rounded-xl text-emerald2 whitespace-nowrap">🎓 Auto-Generate Syahadah / Sertifikat PDF</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW: ADMINISTRATIF PEGAWAI ================= -->
            <section id="view-administratif-pegawai" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Administratif Pegawai</h2><p class="text-xs text-slate-400">Arsip dokumen kepegawaian: SK, kontrak, sertifikat, dan berkas pendukung.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Ekspor</button><button onclick="showToast('success','Form unggah dokumen dibuka')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Unggah Dokumen</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Pegawai</th><th class="px-4 py-3">NIP</th><th class="px-4 py-3">Jenis Dokumen</th><th class="px-4 py-3">Berkas</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="administratif-pegawaiBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PENSIUN ================= -->
            <section id="view-pensiun" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pensiun &amp; Pengunduran Diri</h2><p class="text-xs text-slate-400">Pengajuan pensiun (BUP) dan pengunduran diri pegawai beserta status prosesnya.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Menyusun berkas pensiun...')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">📄 Berkas Pensiun</button><button onclick="showToast('success','Pengajuan baru dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Ajukan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Pegawai</th><th class="px-4 py-3">NIP</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">TMT</th><th class="px-4 py-3">Status Proses</th></tr></thead><tbody id="pensiunBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: LAPORAN KEHADIRAN PEGAWAI ================= -->
            <section id="view-kehadiran-pegawai" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan Kehadiran Pegawai</h2><p class="text-xs text-slate-400">Rekapitulasi kehadiran guru &amp; staf periode Oktober 2026.</p></div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Rata-rata Kehadiran</p><p class="font-heading font-extrabold text-2xl text-slate-900">96,4%</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Pegawai</p><p class="font-heading font-extrabold text-2xl text-slate-900">64</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Terlambat</p><p class="font-heading font-extrabold text-2xl text-amber2">7</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Tanpa Keterangan</p><p class="font-heading font-extrabold text-2xl text-red-500">2</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Pegawai</th><th class="px-4 py-3">Jabatan</th><th class="px-4 py-3">Hadir</th><th class="px-4 py-3">Terlambat</th><th class="px-4 py-3">Izin/Sakit</th><th class="px-4 py-3">Alpa</th></tr></thead><tbody id="kehadiran-pegawaiBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: BANK SOAL & TUGAS ================= -->
            <section id="view-bank-soal" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Bank Soal, Modul, Media &amp; Tugas</h2><p class="text-xs text-slate-400">Repositori materi pembelajaran digital lintas mata pelajaran.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">🔍 Cari</button><button onclick="showToast('success','Unggah materi dibuka')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Unggah</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Judul</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Penyusun</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="bank-soalBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: CBT ================= -->
            <section id="view-cbt" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">CBT &amp; Penilaian Ujian</h2><p class="text-xs text-slate-400">Computer Based Test: jadwal ujian, peserta, dan status pelaksanaan.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Membuat paket ujian baru...')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buat Ujian</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Ujian</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Peserta</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="cbtBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: JADWAL PELAJARAN ================= -->
            <section id="view-jadwal" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Jadwal Pelajaran</h2><p class="text-xs text-slate-400">Jadwal KBM harian seluruh kelas — Tahun Pelajaran 2026/2027.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak Jadwal</button><button onclick="showToast('success','Slot jadwal ditambahkan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Tambah Slot</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Hari</th><th class="px-4 py-3">Jam</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Ruang</th></tr></thead><tbody id="jadwalBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PERFORMA GURU & KPI ================= -->
            <section id="view-kpi-guru" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Performa Guru &amp; KPI</h2><p class="text-xs text-slate-400">Indikator kinerja guru: kehadiran, capaian nilai siswa, dan skor evaluasi.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Guru</th><th class="px-4 py-3">Mapel</th><th class="px-4 py-3">Kehadiran</th><th class="px-4 py-3">Nilai Siswa</th><th class="px-4 py-3">Skor KPI</th><th class="px-4 py-3">Predikat</th></tr></thead><tbody id="kpi-guruBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: E-RAPOR & LEGGER ================= -->
            <section id="view-erapor" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Cetak e-Rapor &amp; Legger</h2><p class="text-xs text-slate-400">Status pengisian dan pencetakan e-Rapor per kelas.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Cetak e-Rapor massal dijalankan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak Massal</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Wali Kelas</th><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Progress e-Rapor</th><th class="px-4 py-3">Legger</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="eraporBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: MAJALAH DIGITAL ================= -->
            <section id="view-majalah" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Majalah Digital &amp; Edutainment</h2><p class="text-xs text-slate-400">Publikasi majalah sekolah dan konten edutainment.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Edisi majalah baru dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Edisi Baru</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Edisi</th><th class="px-4 py-3">Judul</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="majalahBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: BUKU TAMU DIGITAL ================= -->
            <section id="view-buku-tamu" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Buku Tamu Digital</h2><p class="text-xs text-slate-400">Log kunjungan tamu sekolah dengan check-in QR.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Menampilkan QR check-in tamu')" class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">🔳 QR Check-in</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Nama</th><th class="px-4 py-3">Instansi</th><th class="px-4 py-3">Keperluan</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="buku-tamuBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: RINGKASAN SISWA ================= -->
            <section id="view-ringkasan-siswa" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Ringkasan Siswa</h2><p class="text-xs text-slate-400">Rekap jumlah siswa per kelas berdasarkan jenis kelamin dan status.</p></div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Siswa</p><p class="font-heading font-extrabold text-2xl text-slate-900">1.248</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Laki-laki</p><p class="font-heading font-extrabold text-2xl text-sky2">642</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Perempuan</p><p class="font-heading font-extrabold text-2xl text-emerald2">606</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Rombel</p><p class="font-heading font-extrabold text-2xl text-slate-900">42</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Laki-laki</th><th class="px-4 py-3">Perempuan</th><th class="px-4 py-3">Total</th><th class="px-4 py-3">Aktif</th><th class="px-4 py-3">Wali Kelas</th></tr></thead><tbody id="ringkasan-siswaBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KEUANGAN METODE 1 ================= -->
            <section id="view-keuangan-metode1" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Metode 1 — Transaction-Based System</h2><p class="text-xs text-slate-400">Pencatatan berbasis transaksi kas masuk/keluar secara langsung.</p></div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kas Masuk</p><p class="font-heading font-extrabold text-xl text-emerald2">Rp 486.750.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kas Keluar</p><p class="font-heading font-extrabold text-xl text-red-500">Rp 312.400.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Saldo</p><p class="font-heading font-extrabold text-xl text-slate-900">Rp 174.350.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Transaksi</p><p class="font-heading font-extrabold text-2xl text-slate-900">128</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Nama</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Metode</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="keuangan-metode1Body" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KEUANGAN METODE 2 ================= -->
            <section id="view-keuangan-metode2" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Metode 2 — Accounting-Based System</h2><p class="text-xs text-slate-400">Pencatatan berbasis akuntansi: jurnal umum, debit/kredit, dan buku besar.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Kode Akun</th><th class="px-4 py-3">Keterangan</th><th class="px-4 py-3">Debit</th><th class="px-4 py-3">Kredit</th><th class="px-4 py-3">Saldo</th></tr></thead><tbody id="keuangan-metode2Body" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: DAFTAR TAGIHAN ================= -->
            <section id="view-daftar-tagihan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Daftar Tagihan</h2><p class="text-xs text-slate-400">Daftar seluruh tagihan siswa beserta status pembayaran.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('info','Membuat tagihan baru...')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buat Tagihan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Jenis Tagihan</th><th class="px-4 py-3">Periode</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Jatuh Tempo</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="daftar-tagihanBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GRUP TAGIHAN ================= -->
            <section id="view-grup-tagihan" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Grup Tagihan</h2><p class="text-xs text-slate-400">Pengelompokan tagihan untuk penerbitan massal.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Grup tagihan dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buat Grup</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Nama Grup</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Anggota</th><th class="px-4 py-3">Nominal/Grup</th><th class="px-4 py-3">Periode</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="grup-tagihanBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: MONITORING TAGIHAN ================= -->
            <section id="view-monitoring-tagihan" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Monitoring Tagihan</h2><p class="text-xs text-slate-400">Pemantauan realisasi tagihan per kelas.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Total Tagihan</th><th class="px-4 py-3">Terbayar</th><th class="px-4 py-3">Tunggakan</th><th class="px-4 py-3">Persentase</th></tr></thead><tbody id="monitoring-tagihanBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: REKAP TAGIHAN SPP ================= -->
            <section id="view-rekap-spp" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Rekap Tagihan SPP</h2><p class="text-xs text-slate-400">Rekapitulasi tagihan SPP per bulan.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Ekspor</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Bulan</th><th class="px-4 py-3">Target</th><th class="px-4 py-3">Terealisasi</th><th class="px-4 py-3">Tunggakan</th><th class="px-4 py-3">Persentase</th></tr></thead><tbody id="rekap-sppBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: E-MONEY SISWA ================= -->
            <section id="view-emoney-siswa" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">E-Money Siswa</h2><p class="text-xs text-slate-400">Saldo dan kartu e-money siswa untuk jajan di kantin.</p></div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Total Saldo</p><p class="font-heading font-extrabold text-xl text-slate-900">Rp 128.450.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kartu Aktif</p><p class="font-heading font-extrabold text-2xl text-slate-900">1.186</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Top-up Hari Ini</p><p class="font-heading font-extrabold text-2xl text-emerald2">86</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Kartu Blokir</p><p class="font-heading font-extrabold text-2xl text-red-500">3</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Saldo</th><th class="px-4 py-3">Limit Harian</th><th class="px-4 py-3">Status Kartu</th></tr></thead><tbody id="emoney-siswaBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: E-MONEY PEGAWAI ================= -->
            <section id="view-emoney-pegawai" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">E-Money Pegawai</h2><p class="text-xs text-slate-400">Saldo e-money untuk guru dan staf (kantin &amp; koperasi).</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Pegawai</th><th class="px-4 py-3">NIP</th><th class="px-4 py-3">Saldo</th><th class="px-4 py-3">Top-up Terakhir</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="emoney-pegawaiBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: TABUNGAN SISWA ================= -->
            <section id="view-tabungan-siswa" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Tabungan Siswa</h2><p class="text-xs text-slate-400">Program tabungan siswa dengan setoran berkala.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Siswa</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Saldo Tabungan</th><th class="px-4 py-3">Setoran Bulan Ini</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="tabungan-siswaBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: INFAQ ================= -->
            <section id="view-infaq" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Infaq</h2><p class="text-xs text-slate-400">Penerimaan infaq dan donasi sekolah.</p></div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Infaq Bulan Ini</p><p class="font-heading font-extrabold text-xl text-emerald2">Rp 24.850.000</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Donatur</p><p class="font-heading font-extrabold text-2xl text-slate-900">312</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Program Aktif</p><p class="font-heading font-extrabold text-2xl text-slate-900">4</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Rata-rata</p><p class="font-heading font-extrabold text-xl text-slate-900">Rp 79.600</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Donatur</th><th class="px-4 py-3">Program</th><th class="px-4 py-3">Nominal</th><th class="px-4 py-3">Metode</th></tr></thead><tbody id="infaqBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: LAPORAN KANTIN ================= -->
            <section id="view-laporan-kantin" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Laporan Kantin</h2><p class="text-xs text-slate-400">Rekap penjualan tenant kantin dan komisi sekolah.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tenant</th><th class="px-4 py-3">Penjualan</th><th class="px-4 py-3">Transaksi</th><th class="px-4 py-3">Komisi Sekolah</th><th class="px-4 py-3">Status Settle</th></tr></thead><tbody id="laporan-kantinBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: SLIP GAJI PEGAWAI ================= -->
            <section id="view-slip-gaji" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Slip Gaji Pegawai</h2><p class="text-xs text-slate-400">Generate dan distribusi slip gaji bulanan.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Slip gaji massal digenerate & dikirim')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">🖨️ Generate Massal</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Pegawai</th><th class="px-4 py-3">NIP</th><th class="px-4 py-3">Periode</th><th class="px-4 py-3">Gaji Bersih</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="slip-gajiBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PENGATURAN METODE PEMBAYARAN ================= -->
            <section id="view-metode-pembayaran" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pengaturan Metode Pembayaran</h2><p class="text-xs text-slate-400">Kanal pembayaran yang aktif beserta biaya admin.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Konfigurasi kanal disimpan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">💾 Simpan</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kanal Pembayaran</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Biaya Admin</th><th class="px-4 py-3">Settle</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="metode-pembayaranBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: SMARTCARD & GEO-TAGGING ================= -->
            <section id="view-smartcard" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Presensi Kamera Smartcard &amp; Geo-Tagging</h2><p class="text-xs text-slate-400">Presensi via tap kartu dengan verifikasi lokasi GPS.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Nama</th><th class="px-4 py-3">Waktu Tap</th><th class="px-4 py-3">Kartu</th><th class="px-4 py-3">Lokasi</th><th class="px-4 py-3">Jarak</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="smartcardBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: KARTU KARAKTER & RAPOR MASSAL ================= -->
            <section id="view-kartu-karakter" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Kartu Karakter &amp; Rapor Siswa Massal</h2><p class="text-xs text-slate-400">Cetak massal kartu karakter dan rapor per kelas.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Cetak massal dijadwalkan')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">🖨️ Cetak Massal</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Jumlah Siswa</th><th class="px-4 py-3">Kartu Karakter</th><th class="px-4 py-3">Rapor</th><th class="px-4 py-3">Status Cetak</th></tr></thead><tbody id="kartu-karakterBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: SENTRA DATA & JURNAL KEHADIRAN ================= -->
            <section id="view-sentra-kehadiran" class="view">
                <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Sentra Data &amp; Jurnal Kehadiran</h2><p class="text-xs text-slate-400">Jurnal kehadiran harian terpusat seluruh kelas.</p></div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Kelas</th><th class="px-4 py-3">Hadir</th><th class="px-4 py-3">Terlambat</th><th class="px-4 py-3">Izin/Sakit</th><th class="px-4 py-3">Alpa</th></tr></thead><tbody id="sentra-kehadiranBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: SEMINAR & VIDEO KONFERENSI ================= -->
            <section id="view-seminar" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Seminar &amp; Video Konferensi Internal</h2><p class="text-xs text-slate-400">Agenda rapat, seminar, dan konferensi daring internal.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Ruang konferensi dibuat')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Buat Sesi</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Judul</th><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Host</th><th class="px-4 py-3">Peserta</th><th class="px-4 py-3">Platform</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="seminarBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: PUSAT UNGGAH DOKUMEN ================= -->
            <section id="view-pusat-dokumen" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Pusat Unggah Dokumen Resmi</h2><p class="text-xs text-slate-400">Repositori dokumen resmi sekolah.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Unggah dokumen dibuka')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">＋ Unggah</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Dokumen</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Ukuran</th><th class="px-4 py-3">Diunggah Oleh</th><th class="px-4 py-3">Tanggal</th></tr></thead><tbody id="pusat-dokumenBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: LOG AKTIVITAS SISTEM ================= -->
            <section id="view-audit-admin" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Log Aktivitas Sistem (Audit Trail)</h2><p class="text-xs text-slate-400">Jejak audit seluruh aktivitas pengguna sistem.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button class="text-sm font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl transition-colors">⬇️ Ekspor Log</button></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Waktu</th><th class="px-4 py-3">Pengguna</th><th class="px-4 py-3">Peran</th><th class="px-4 py-3">Aktivitas</th><th class="px-4 py-3">IP</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="audit-adminBody" class="divide-y divide-slate-50"><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="6" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: BACKUP & RESTORE ================= -->
            <section id="view-backup" class="view">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <div><h2 class="font-heading font-extrabold text-xl text-slate-800">Backup &amp; Restore Data</h2><p class="text-xs text-slate-400">Jadwal dan riwayat pencadangan basis data sistem.</p></div>
                    <div class="sm:ml-auto flex gap-2"><button onclick="showToast('success','Backup manual dimulai...')" class="text-sm font-bold text-white bg-navy hover:bg-sky2 px-4 py-2.5 rounded-xl transition-colors">💾 Backup Sekarang</button></div>
                </div>
                <div class="mt-4 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Backup Terakhir</p><p class="font-heading font-extrabold text-lg text-slate-900">19 Okt 02:00</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Jadwal</p><p class="font-heading font-extrabold text-lg text-slate-900">Harian 02:00</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Retensi</p><p class="font-heading font-extrabold text-lg text-slate-900">30 hari</p></div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5"><p class="text-xs font-semibold text-slate-600">Ukuran Terakhir</p><p class="font-heading font-extrabold text-lg text-slate-900">412 MB</p></div>
                </div>
                <div class="mt-4 bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm min-w-[820px]"><thead class="bg-slate-50 text-[11px] uppercase text-slate-400"><tr><th class="px-4 py-3">Tanggal</th><th class="px-4 py-3">Jenis</th><th class="px-4 py-3">Ukuran</th><th class="px-4 py-3">Lokasi</th><th class="px-4 py-3">Status</th></tr></thead><tbody id="backupBody" class="divide-y divide-slate-50"><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr><tr><td colspan="5" class="px-4 py-3"><div class="skeleton h-6 w-full rounded-lg"></div></td></tr></tbody></table></div></div>
            </section>

            <!-- ================= VIEW: GENERIC / EMPTY STATE ================= -->
            <section id="view-generic" class="view">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm py-20 px-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-navy/10 grid place-items-center text-4xl">🧩</div>
                    <h2 id="genericTitle" class="mt-5 font-heading font-extrabold text-xl text-slate-800">Modul</h2>
                    <p class="mt-2 text-sm text-slate-400 max-w-md mx-auto">Halaman ini merupakan bagian dari modul Administrasi/Operator. Pada demo ini, tampilan detail modul tersedia pada menu <span class="font-semibold text-slate-600">Dashboard</span>, <span class="font-semibold text-slate-600">Data Siswa Aktif</span>, dan <span class="font-semibold text-slate-600">Manajemen User &amp; Role</span>.</p>
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <button onclick="showView('dashboard','Dashboard Operator')" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Dashboard</button>
                        <button onclick="showView('siswa','Data Siswa Aktif')" class="bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Ke Data Siswa</button>
                    </div>
                </div>
            </section>

        </main>

        <footer class="px-4 sm:px-6 py-4 text-center text-xs text-slate-400 border-t border-slate-200">
            © 2026 PT Artificial Intelligence Learning Madani Digital · Modul Administrasi/Operator (Simulasi)
        </footer>
    </div>

    <!-- ============ MODAL: RESET PASSWORD MASSAL ============ -->
    <div id="resetModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeResetModal()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg p-6">
            <div class="flex items-center gap-3">
                <span class="w-11 h-11 rounded-2xl bg-amber2/15 text-amber2 grid place-items-center text-xl">🔑</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Reset Password Massal</h3><p class="text-xs text-slate-400">Reset password siswa / guru / orang tua sekaligus.</p></div>
            </div>
            <div class="mt-5 space-y-3">
                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Filter Per Kelas</label>
                    <select id="resetKelas" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                        <option value="Semua">Semua Kelas</option>
                        <option>VIII-A</option>
                        <option>VIII-B</option>
                        <option>IX-A</option>
                    </select>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Peran</label>
                    <select class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                        <option>Siswa</option>
                        <option>Guru</option>
                        <option>Orang Tua</option>
                    </select>
                </div>
                <label class="flex items-center gap-2 text-sm text-slate-600"><input type="checkbox" class="matrix" checked> Kirim hasil reset via WhatsApp ke pengguna</label>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button onclick="closeResetModal()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="confirmReset()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Reset Sekarang</button>
            </div>
        </div>
    </div>

    <!-- ============ DRAWER: VERIFIKASI BERKAS PPDB ============ -->
    <div id="ppdbDrawer" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-black/50" onclick="closePpdbDrawer()"></div>
        <div id="ppdbDrawerPanel" class="absolute top-0 right-0 h-full w-full max-w-2xl bg-slate-50 shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">
            <!-- Drawer header -->
            <div class="bg-white border-b border-slate-200 px-5 py-4 flex items-start gap-3 flex-shrink-0">
                <span id="ppdbDrawerAvatar" class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center font-heading font-extrabold text-sm">--</span>
                <div class="flex-1 min-w-0">
                    <h3 id="ppdbDrawerName" class="font-heading font-extrabold text-slate-800 truncate">Nama Calon Siswa</h3>
                    <p id="ppdbDrawerReg" class="text-xs text-slate-400">REG-0000 · 00 Okt 2026 · Jalur Langsung</p>
                </div>
                <button onclick="closePpdbDrawer()" class="w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Tabs -->
            <div class="bg-white border-b border-slate-200 px-4 flex gap-1 flex-shrink-0 overflow-x-auto no-scrollbar">
                <button class="pptab-btn active text-sm font-bold px-4 py-3 rounded-none whitespace-nowrap" data-tab="biodata" onclick="ppdbTab('biodata')">1. Biodata Siswa &amp; Orang Tua</button>
                <button class="pptab-btn text-sm font-bold px-4 py-3 rounded-none whitespace-nowrap" data-tab="dokumen" onclick="ppdbTab('dokumen')">2. Pengecekan Dokumen</button>
                <button class="pptab-btn text-sm font-bold px-4 py-3 rounded-none whitespace-nowrap" data-tab="keputusan" onclick="ppdbTab('keputusan')">3. Keputusan &amp; Aksi</button>
            </div>

            <!-- Drawer body -->
            <div class="flex-1 overflow-y-auto p-5">
                <!-- TAB 1: BIODATA -->
                <div id="pptab-biodata" class="pptab-panel space-y-4">
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <h4 class="font-heading font-bold text-slate-800 text-sm">Data Diri Calon Siswa</h4>
                        <dl class="mt-4 grid sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Nama Lengkap</dt><dd id="ppdbBioNama" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">NISN</dt><dd id="ppdbBioNisn" class="font-semibold text-slate-700 font-mono">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">NIK</dt><dd id="ppdbBioNik" class="font-semibold text-slate-700 font-mono">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Tempat, Tanggal Lahir</dt><dd id="ppdbBioTtl" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Jenis Kelamin</dt><dd id="ppdbBioJk" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Agama</dt><dd id="ppdbBioAgama" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Asal Sekolah</dt><dd id="ppdbBioSekolah" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Pilihan Program</dt><dd id="ppdbBioJurusan" class="font-semibold text-slate-700">-</dd></div>
                            <div class="sm:col-span-2"><dt class="text-[11px] font-bold text-slate-400 uppercase">Alamat Domisili</dt><dd id="ppdbBioAlamat" class="font-semibold text-slate-700">-</dd></div>
                            <div class="sm:col-span-2 flex items-center gap-2 text-[11px] font-semibold text-sky2"><span>📍 Geo-tagging:</span><span id="ppdbBioGeo" class="font-mono text-slate-500">-</span></div>
                        </dl>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <h4 class="font-heading font-bold text-slate-800 text-sm">Data Orang Tua / Wali</h4>
                        <dl class="mt-4 grid sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Nama Ayah</dt><dd id="ppdbBioAyah" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Pekerjaan Ayah</dt><dd id="ppdbBioKerjaAyah" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Nama Ibu / Wali</dt><dd id="ppdbBioIbu" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Pekerjaan Ibu</dt><dd id="ppdbBioKerjaIbu" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Penghasilan Orang Tua</dt><dd id="ppdbBioGaji" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">No. HP / WhatsApp</dt><dd id="ppdbBioWa" class="font-semibold text-slate-700 font-mono">-</dd></div>
                        </dl>
                    </div>
                </div>

                <!-- TAB 2: DOKUMEN -->
                <div id="pptab-dokumen" class="pptab-panel hidden space-y-3">
                    <div class="bg-sky2/10 border border-sky2/20 rounded-2xl px-4 py-3 text-xs text-sky2 font-semibold">Periksa tiap berkas, lalu tandai <span class="text-emerald2">✓ Valid</span> atau <span class="text-red-600">✗ Tidak Valid / Buram</span>.</div>
                    <div id="ppdbDocList" class="space-y-3"></div>
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <label class="text-[11px] font-bold text-slate-400 uppercase">Catatan Tambahan (jika ada berkas tidak valid)</label>
                        <textarea id="ppdbCatatan" rows="3" placeholder="Contoh: Foto KK buram, harap upload ulang." class="mt-2 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 resize-none"></textarea>
                    </div>
                </div>

                <!-- TAB 3: KEPUTUSAN -->
                <div id="pptab-keputusan" class="pptab-panel hidden space-y-4">
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <h4 class="font-heading font-bold text-slate-800 text-sm">Keputusan Verifikasi</h4>
                        <div class="mt-4 space-y-3">
                            <label class="flex items-center gap-3 bg-emerald2/5 border border-emerald2/20 rounded-xl px-4 py-3 cursor-pointer">
                                <input type="radio" name="ppdbKeputusan" value="diterima" class="accent-emerald-600 w-4 h-4">
                                <span class="text-sm font-bold text-emerald2">✅ Diterima / Lolos</span>
                            </label>
                            <label class="flex items-center gap-3 bg-amber2/5 border border-amber2/20 rounded-xl px-4 py-3 cursor-pointer">
                                <input type="radio" name="ppdbKeputusan" value="perbaikan" class="accent-amber-500 w-4 h-4">
                                <span class="text-sm font-bold text-amber2">🔄 Minta Perbaikan Berkas</span>
                            </label>
                            <label class="flex items-center gap-3 bg-red-50 border border-red-200 rounded-xl px-4 py-3 cursor-pointer">
                                <input type="radio" name="ppdbKeputusan" value="ditolak" class="accent-red-500 w-4 h-4">
                                <span class="text-sm font-bold text-red-600">✗ Ditolak</span>
                            </label>
                        </div>
                        <label class="mt-4 flex items-center gap-2 text-sm text-slate-600">
                            <input id="ppdbWaNotif" type="checkbox" class="matrix" checked> Kirim notifikasi keputusan via WhatsApp ke orang tua otomatis
                        </label>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <h4 class="font-heading font-bold text-slate-800 text-sm">Ringkasan Cepat</h4>
                        <p class="mt-2 text-xs text-slate-400">Jika memilih <span class="font-semibold text-amber2">Perbaikan</span>, sistem otomatis mengirim link unggah ulang berkas. Jika <span class="font-semibold text-emerald2">Diterima</span>, calon siswa dinyatakan lulus seleksi administrasi dan dapat lanjut ke tahap berikutnya.</p>
                    </div>
                </div>
            </div>

            <!-- Drawer footer -->
            <div class="bg-white border-t border-slate-200 px-5 py-4 flex items-center justify-between gap-2 flex-shrink-0">
                <button onclick="closePpdbDrawer()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="savePpdbDecision()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan Keputusan</button>
            </div>
        </div>
    </div>

    <!-- ============ DRAWER: DETAIL TRANSAKSI & VERIFIKASI PPDB (PEMBELIAN FORMULIR) ============ -->
    <div id="pfDrawer" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-black/50" onclick="closePfDrawer()"></div>
        <div id="pfDrawerPanel" class="absolute top-0 right-0 h-full w-full max-w-2xl bg-slate-50 shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">
            <!-- Drawer header -->
            <div class="bg-white border-b border-slate-200 px-5 py-4 flex items-start gap-3 flex-shrink-0">
                <span id="pfDrawerAvatar" class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center font-heading font-extrabold text-sm">--</span>
                <div class="flex-1 min-w-0">
                    <h3 id="pfDrawerTitle" class="font-heading font-extrabold text-slate-800 truncate">TRX-PPDB-000</h3>
                    <p id="pfDrawerSub" class="text-xs text-slate-400">PIN: FORM-000000 · 00 Okt 2026</p>
                </div>
                <button onclick="closePfDrawer()" class="w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Tabs -->
            <div class="bg-white border-b border-slate-200 px-4 flex gap-1 flex-shrink-0 overflow-x-auto no-scrollbar">
                <button class="pf-tab-btn active text-sm font-bold px-4 py-3 rounded-none whitespace-nowrap" data-tab="transaksi" onclick="pfTab('transaksi')">1. Bukti Pembayaran &amp; Transaksi</button>
                <button class="pf-tab-btn text-sm font-bold px-4 py-3 rounded-none whitespace-nowrap" data-tab="pin" onclick="pfTab('pin')">2. Akses &amp; Kode PIN</button>
                <button class="pf-tab-btn text-sm font-bold px-4 py-3 rounded-none whitespace-nowrap" data-tab="formulir" onclick="pfTab('formulir')">3. Isian Formulir &amp; Dokumen</button>
            </div>

            <!-- Drawer body -->
            <div class="flex-1 overflow-y-auto p-5">
                <!-- TAB 1: TRANSAKSI -->
                <div id="pf-tab-transaksi" class="pf-tab-panel space-y-3">
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <h4 class="font-heading font-bold text-slate-800 text-sm">Rincian Transaksi</h4>
                        <dl class="mt-4 grid sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Waktu Transaksi</dt><dd id="pfTime" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Metode Bayar</dt><dd id="pfMetode" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Kanal / Instansi</dt><dd id="pfKanal" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Nominal</dt><dd id="pfNominal" class="font-semibold text-slate-700">-</dd></div>
                            <div class="sm:col-span-2"><dt class="text-[11px] font-bold text-slate-400 uppercase">Kode Referensi Bank / Auto-Reconciliation</dt><dd id="pfRef" class="font-semibold text-slate-700 font-mono">-</dd></div>
                            <div class="sm:col-span-2 flex items-center justify-between bg-slate-50 border border-slate-100 rounded-xl px-3 py-2.5">
                                <span class="text-xs font-semibold text-slate-500">Bukti Transfer / Konfirmasi</span>
                                <button onclick="showToast('info','Membuka pratinjau bukti transfer (simulasi)')" id="pfBukti" class="text-[11px] font-bold text-navy bg-navy/5 hover:bg-navy/10 px-2.5 py-1.5 rounded-lg">Lihat bukti</button>
                            </div>
                            <div class="sm:col-span-2 flex items-center gap-2"><dt class="text-[11px] font-bold text-slate-400 uppercase">Status Validasi</dt><dd id="pfPayStatus" class="text-[11px] font-bold px-2 py-0.5 rounded-full">-</dd></div>
                        </dl>
                    </div>
                    <div id="pfManualBox" class="hidden bg-amber2/10 border border-amber2/20 rounded-2xl p-4">
                        <p class="text-xs font-semibold text-amber2">Transaksi belum lunas. Untuk pembayaran tunai di kasir sekolah, tandai lunas untuk menerbitkan Kode PIN secara otomatis.</p>
                        <button onclick="pfMarkPaid()" class="mt-3 bg-amber2 hover:bg-amber-600 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">💵 Tandai Lunas &amp; Terbitkan PIN</button>
                    </div>
                </div>

                <!-- TAB 2: PIN -->
                <div id="pf-tab-pin" class="pf-tab-panel hidden space-y-3">
                    <div class="bg-white rounded-2xl border border-slate-100 p-5 text-center">
                        <p class="text-[11px] font-bold text-slate-400 uppercase">Kode Formulir / PIN</p>
                        <p id="pfPin" class="mt-2 font-heading font-extrabold text-3xl text-navy tracking-widest font-mono">FORM-000000</p>
                        <div class="mt-3 flex items-center justify-center gap-2">
                            <span class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2.5 py-1 rounded-full">🔐 PIN Aktif</span>
                            <button onclick="pfCopyPin()" class="text-[11px] font-bold text-navy bg-navy/5 hover:bg-navy/10 px-2.5 py-1 rounded-full">📋 Salin</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <dl class="grid sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Status Akses PIN</dt><dd id="pfAkses" class="font-semibold text-emerald2">Aktif</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Masa Berlaku</dt><dd id="pfMasa" class="font-semibold text-slate-700">-</dd></div>
                            <div class="sm:col-span-2"><dt class="text-[11px] font-bold text-slate-400 uppercase">Riwayat Login Calon Siswa</dt><dd id="pfLogin" class="font-semibold text-slate-700">-</dd></div>
                        </dl>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <button onclick="pfResetPin()" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-navy text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">🔄 Reset Kode PIN</button>
                            <button onclick="pfResendPin(pfCurrent ? pfCurrent.trx : '')" class="inline-flex items-center gap-2 bg-emerald2 hover:bg-emerald-600 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">📲 Kirim Ulang PIN via WA</button>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: FORMULIR -->
                <div id="pf-tab-formulir" class="pf-tab-panel hidden space-y-3">
                    <div id="pfFormNote" class="hidden bg-amber2/10 border border-amber2/20 rounded-2xl px-4 py-3 text-xs font-semibold text-amber2">Pendaftar belum membuka / melengkapi formulir. Biodata di bawah masih kosong.</div>
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <h4 class="font-heading font-bold text-slate-800 text-sm">Biodata &amp; Berkas Siswa</h4>
                        <dl class="mt-4 grid sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Nama Calon Siswa</dt><dd id="pfBioNama" class="font-semibold text-slate-700">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">NISN</dt><dd id="pfBioNisn" class="font-semibold text-slate-700 font-mono">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">NIK</dt><dd id="pfBioNik" class="font-semibold text-slate-700 font-mono">-</dd></div>
                            <div><dt class="text-[11px] font-bold text-slate-400 uppercase">Asal Sekolah</dt><dd id="pfBioSekolah" class="font-semibold text-slate-700">-</dd></div>
                            <div class="sm:col-span-2"><dt class="text-[11px] font-bold text-slate-400 uppercase">Alamat Domisili</dt><dd id="pfBioAlamat" class="font-semibold text-slate-700">-</dd></div>
                        </dl>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <h4 class="font-heading font-bold text-slate-800 text-sm">Pengecekan Dokumen (Checklist)</h4>
                        <div id="pfDocList" class="mt-3 space-y-2"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 p-5">
                        <h4 class="font-heading font-bold text-slate-800 text-sm">Keputusan Seleksi</h4>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <label class="inline-flex items-center gap-2 text-xs font-bold text-emerald2 bg-emerald2/10 border border-emerald2/20 px-3 py-2.5 rounded-xl cursor-pointer"><input type="radio" name="pfKeputusan" value="lolos" class="accent-emerald-600"> ✅ Lolos / Diterima</label>
                            <label class="inline-flex items-center gap-2 text-xs font-bold text-amber2 bg-amber2/10 border border-amber2/20 px-3 py-2.5 rounded-xl cursor-pointer"><input type="radio" name="pfKeputusan" value="perbaikan" class="accent-amber-500"> 🔄 Minta Perbaikan</label>
                            <label class="inline-flex items-center gap-2 text-xs font-bold text-red-600 bg-red-50 border border-red-200 px-3 py-2.5 rounded-xl cursor-pointer"><input type="radio" name="pfKeputusan" value="ditolak" class="accent-red-500"> ✗ Ditolak</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Drawer footer -->
            <div class="bg-white border-t border-slate-200 px-5 py-4 flex items-center justify-between gap-2 flex-shrink-0">
                <button onclick="closePfDrawer()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="savePfDecision()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan Keputusan Seleksi</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: INPUT MUTASI MASUK ============ -->
    <div id="mkMasukModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeMkMasuk()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[92vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-emerald2/10 text-emerald2 grid place-items-center text-xl">📥</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Input Siswa Pindahan Masuk</h3><p class="text-xs text-slate-400">Lengkapi data mutasi masuk &amp; penempatan kelas baru.</p></div>
                <button onclick="closeMkMasuk()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-6 py-5 overflow-y-auto space-y-4">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Data Surat Rekomendasi</p>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div><label class="text-xs font-bold text-slate-500">Nomor Surat Mutasi / Rekomendasi Dinas</label><input id="mkMasukSurat" type="text" placeholder="Contoh: 421.3/112/2026" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                    <div><label class="text-xs font-bold text-slate-500">Tanggal Masuk</label><input id="mkMasukTgl" type="date" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                    <div><label class="text-xs font-bold text-slate-500">Tahun Ajaran</label><select id="mkMasukTa" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>2026/2027</option><option>2025/2026</option></select></div>
                    <div><label class="text-xs font-bold text-slate-500">Tingkat Kelas Terakhir</label><select id="mkMasukTingkat" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Kelas 9 (SMP)</option><option>Kelas 10</option><option>Kelas 11</option></select></div>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider pt-1">Data Sekolah Asal</p>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div><label class="text-xs font-bold text-slate-500">Nama Sekolah Asal (NPSN)</label><input id="mkMasukSekolah" type="text" placeholder="SMPN 5 Blitar (NPSN 20512345)" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                    <div><label class="text-xs font-bold text-slate-500">Nomor Induk Sekolah Asal</label><input id="mkMasukNis" type="text" placeholder="NIS asal" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                    <div class="sm:col-span-2"><label class="text-xs font-bold text-slate-500">Alamat Sekolah Asal</label><input id="mkMasukAlamat" type="text" placeholder="Jl. ... Kota/Kabupaten" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider pt-1">Penempatan Kelas Baru</p>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div><label class="text-xs font-bold text-slate-500">Nama Calon Siswa</label><input id="mkMasukNama" type="text" placeholder="Nama lengkap siswa" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                    <div><label class="text-xs font-bold text-slate-500">Pilih Kelas / Rombel Tujuan</label><select id="mkMasukKelas" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>11-B</option><option>10-A</option><option>10-B</option><option>11-A</option></select></div>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider pt-1">Dokumen Pendukung</p>
                <div class="grid sm:grid-cols-3 gap-3">
                    <label class="flex flex-col items-center gap-1 bg-slate-50 border border-dashed border-slate-300 hover:border-emerald2 rounded-xl px-3 py-4 text-xs font-semibold text-slate-500 cursor-pointer text-center"><span class="text-xl">📄</span> Surat Pindah Sekolah<input type="file" class="hidden"></label>
                    <label class="flex flex-col items-center gap-1 bg-slate-50 border border-dashed border-slate-300 hover:border-emerald2 rounded-xl px-3 py-4 text-xs font-semibold text-slate-500 cursor-pointer text-center"><span class="text-xl">📘</span> Rapor Sekolah Asal<input type="file" class="hidden"></label>
                    <label class="flex flex-col items-center gap-1 bg-slate-50 border border-dashed border-slate-300 hover:border-emerald2 rounded-xl px-3 py-4 text-xs font-semibold text-slate-500 cursor-pointer text-center"><span class="text-xl">🪪</span> Fotokopi KK / Akte<input type="file" class="hidden"></label>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2 flex-shrink-0">
                <button onclick="closeMkMasuk()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="submitMutasiMasuk()" class="bg-emerald2 hover:bg-emerald-600 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan Data Mutasi Masuk</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: CATAT MUTASI KELUAR ============ -->
    <div id="mkKeluarModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeMkKeluar()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[92vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-amber2/15 text-amber2 grid place-items-center text-xl">📤</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Catat Siswa Pindah Keluar</h3><p class="text-xs text-slate-400">Pindahkan siswa keluar &amp; terbitkan Surat Keterangan Pindah.</p></div>
                <button onclick="closeMkKeluar()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-6 py-5 overflow-y-auto space-y-4">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Pilih Siswa</p>
                <div>
                    <label class="text-xs font-bold text-slate-500">Cari NISN / Nama Siswa Aktif</label>
                    <input id="mkKeluarSiswa" list="mkSiswaList" type="text" placeholder="Ketik nama atau NISN..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                    <datalist id="mkSiswaList"></datalist>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider pt-1">Detail Alasan Mutasi</p>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div><label class="text-xs font-bold text-slate-500">Alasan Mutasi</label><select id="mkKeluarAlasan" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Pindah Ikut Orang Tua</option><option>Dikeluarkan / Tindak Pelanggaran</option><option>Mundur Sendiri</option><option>Lainnya</option></select></div>
                    <div><label class="text-xs font-bold text-slate-500">Kelas Saat Ini</label><input id="mkKeluarKelas" type="text" value="11-A" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider pt-1">Sekolah Tujuan</p>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div><label class="text-xs font-bold text-slate-500">Nama Sekolah Tujuan</label><input id="mkKeluarTujuan" type="text" placeholder="SMAN 3 Malang" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                    <div><label class="text-xs font-bold text-slate-500">Alamat / Kota Sekolah Tujuan</label><input id="mkKeluarKota" type="text" placeholder="Kota Malang" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                </div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider pt-1">Dokumen Keluar</p>
                <div><label class="text-xs font-bold text-slate-500">Nomor Surat Keterangan Pindah</label><input id="mkKeluarSurat" type="text" placeholder="Auto-generate bila dikosongkan (SKP-2026-XXX)" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div class="bg-amber2/10 border border-amber2/20 rounded-2xl px-4 py-3 text-xs font-semibold text-amber2">⚠️ Dampak Sistem: status siswa berubah dari <span class="font-bold">Aktif</span> menjadi <span class="font-bold">Mutasi Keluar</span>. Data arsip tersimpan, akun login siswa &amp; orang tua otomatis dinonaktifkan.</div>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center gap-2 justify-between flex-shrink-0">
                <label class="flex items-center gap-2 text-sm text-slate-600"><input id="mkKeluarCetak" type="checkbox" class="matrix" checked> Cetak surat otomatis setelah simpan</label>
                <div class="flex gap-2 justify-end">
                    <button onclick="closeMkKeluar()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                    <button onclick="submitMutasiKeluar()" class="bg-amber2 hover:bg-amber-600 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">🖨️ Terbitkan &amp; Cetak Surat (PDF)</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: PENERBITAN SURAT KELULUSAN ============ -->
    <div id="klCetakModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeKlCetak()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-xl">🖨️</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Penerbitan Surat &amp; Dokumen</h3><p class="text-xs text-slate-400">Generate dokumen kelulusan untuk siswa terpilih.</p></div>
            </div>
            <div class="px-6 py-5 space-y-3">
                <label class="flex items-start gap-3 bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 cursor-pointer">
                    <input id="klOptSkl" type="checkbox" class="matrix mt-0.5" checked>
                    <span><span class="block text-sm font-bold text-slate-700">Cetak Surat Keterangan Lulus (SKL) Massal</span><span class="block text-xs text-slate-400">Format SKL otomatis ber-QR Code &amp; tanda tangan digital Kepala Sekolah.</span></span>
                </label>
                <label class="flex items-start gap-3 bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 cursor-pointer">
                    <input id="klOptTranskrip" type="checkbox" class="matrix mt-0.5">
                    <span><span class="block text-sm font-bold text-slate-700">Cetak Transkrip Nilai Sementara</span><span class="block text-xs text-slate-400">Rekapitulasi nilai akhir semester 1–6 per siswa.</span></span>
                </label>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2">
                <button onclick="closeKlCetak()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="prosesCetak()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Proses Cetak</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: UPDATE TRACER STUDY ============ -->
    <div id="klTracerModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeKlTracer()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100">
                <span class="w-11 h-11 rounded-2xl bg-amber2/15 text-amber2 grid place-items-center text-xl">✏️</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Update Data Tracer Study</h3><p id="klTracerNama" class="text-xs text-slate-400">-</p></div>
            </div>
            <div class="px-6 py-5 space-y-3">
                <div>
                    <label class="text-xs font-bold text-slate-500">Status Pasca-Lulus</label>
                    <select id="klTracerStatus" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                        <option>Melanjutkan Studi / Kuliah</option><option>Bekerja</option><option>Wirausaha</option><option>Belum Terdata</option>
                    </select>
                </div>
                <div><label class="text-xs font-bold text-slate-500">Nama Perguruan Tinggi / Tempat Kerja / Bidang Usaha</label><input id="klTracerInstansi" type="text" placeholder="Contoh: Universitas Brawijaya" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Jurusan / Status Pekerjaan</label><input id="klTracerJurusan" type="text" placeholder="Contoh: Kedokteran / Staf Operasional" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2">
                <button onclick="closeKlTracer()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="submitTracer()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan Tracer</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: PROFIL ALUMNI ============ -->
    <div id="klProfilModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeKlProfil()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg max-h-[90vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span id="klProfilAvatar" class="w-12 h-12 rounded-2xl bg-navy/10 text-navy grid place-items-center font-heading font-extrabold text-sm">--</span>
                <div class="flex-1 min-w-0"><h3 id="klProfilNama" class="font-heading font-extrabold text-lg text-slate-800 truncate">Nama Alumni</h3><p id="klProfilSub" class="text-xs text-slate-400">-</p></div>
                <button onclick="closeKlProfil()" class="w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-6 py-5 overflow-y-auto">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Histori Singkat</p>
                <ol class="mt-3 space-y-3 border-l-2 border-slate-100 pl-4">
                    <li class="relative"><span class="absolute -left-[22px] w-3 h-3 rounded-full bg-emerald2"></span><p class="text-sm font-semibold text-slate-700">Dinyatakan Lulus</p><p id="klProfilLulus" class="text-xs text-slate-400">-</p></li>
                    <li class="relative"><span class="absolute -left-[22px] w-3 h-3 rounded-full bg-navy"></span><p class="text-sm font-semibold text-slate-700">Diterima di kelas tingkat akhir</p><p class="text-xs text-slate-400">Rombel Kelas 12 · tahun ajaran 2025/2026</p></li>
                    <li class="relative"><span class="absolute -left-[22px] w-3 h-3 rounded-full bg-sky2"></span><p class="text-sm font-semibold text-slate-700">Bebas pustaka &amp; administrasi</p><p class="text-xs text-slate-400">Verifikasi perpustakaan &amp; keuangan</p></li>
                </ol>
                <p class="mt-5 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Tracer Study Saat Ini</p>
                <p id="klProfilTracer" class="mt-1 text-sm font-semibold text-slate-700">-</p>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end flex-shrink-0">
                <button onclick="closeKlProfil()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: DETAIL LOG PRESENSI ============ -->
    <div id="khLogModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeKhLog()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md max-h-[90vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-xl">🗓️</span>
                <div class="flex-1 min-w-0"><h3 id="khLogNama" class="font-heading font-extrabold text-lg text-slate-800 truncate">Nama Siswa</h3><p id="khLogSub" class="text-xs text-slate-400">-</p></div>
                <button onclick="closeKhLog()" class="w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div id="khLogList" class="px-6 py-5 overflow-y-auto space-y-2"></div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end flex-shrink-0">
                <button onclick="closeKhLog()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: INPUT CATATAN PELANGGARAN/PRESTASI ============ -->
    <div id="ttInputModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeTtInput()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-xl max-h-[92vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-xl">📝</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Input Catatan Baru</h3><p class="text-xs text-slate-400">Catat pelanggaran atau prestasi siswa.</p></div>
                <button onclick="closeTtInput()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-6 py-5 overflow-y-auto space-y-3">
                <div>
                    <label class="text-xs font-bold text-slate-500">Nama / NISN Siswa</label>
                    <input id="ttInputSiswa" list="ttSiswaList" type="text" placeholder="Ketik nama siswa..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700">
                    <datalist id="ttSiswaList"></datalist>
                </div>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div>
                        <label class="text-xs font-bold text-slate-500">Tipe Catatan</label>
                        <select id="ttInputTipe" onchange="ttFillKode()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option value="Pelanggaran">Pelanggaran</option><option value="Prestasi">Prestasi / Apresiasi</option></select>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-500">Bobot Poin</label>
                        <input id="ttInputPoin" type="text" readonly class="mt-1 w-full bg-slate-50 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-500 font-bold">
                    </div>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-500">Kategori / Deskripsi</label>
                    <select id="ttInputKode" onchange="ttSyncPoin()" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></select>
                </div>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div><label class="text-xs font-bold text-slate-500">Tanggal &amp; Waktu</label><input id="ttInputWaktu" type="datetime-local" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                    <div><label class="text-xs font-bold text-slate-500">Guru / Staf Pelapor</label><input id="ttInputPelapor" type="text" value="Operator Kesiswaan" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                </div>
                <div><label class="text-xs font-bold text-slate-500">Catatan Detail Kejadian</label><textarea id="ttInputCatatan" rows="2" placeholder="Kronologi singkat kejadian..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 resize-none"></textarea></div>
                <div>
                    <label class="text-xs font-bold text-slate-500">Tindak Lanjut</label>
                    <select id="ttInputStatus" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Selesai</option><option>Dalam Pembinaan BK</option><option>Perlu Pemanggilan Ortu</option><option>Diproses BK</option><option>Surat Terbit</option></select>
                </div>
                <label class="flex items-center gap-2 bg-slate-50 border border-dashed border-slate-300 rounded-xl px-3 py-3 text-xs font-semibold text-slate-500 cursor-pointer"><span>📎</span> Lampirkan Bukti Foto / Dokumen<input type="file" class="hidden"></label>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2 flex-shrink-0">
                <button onclick="closeTtInput()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="submitTtInput()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan Catatan</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: DETAIL KEJADIAN ============ -->
    <div id="ttDetailModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeTtDetail()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100">
                <span id="ttDetailIcon" class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-xl">👁️</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Detail Kejadian</h3><p id="ttDetailSub" class="text-xs text-slate-400">-</p></div>
                <button onclick="closeTtDetail()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div id="ttDetailBody" class="px-6 py-5 space-y-3 text-sm"></div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end">
                <button onclick="closeTtDetail()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
            </div>
        </div>
    </div>

    <!-- ============ DRAWER: PROFIL PEGAWAI ============ -->
    <div id="pgDrawer" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-black/50" onclick="closePgDrawer()"></div>
        <div class="absolute right-0 top-0 h-full w-full max-w-lg bg-white shadow-2xl flex flex-col">
            <div class="px-5 py-4 border-b border-slate-100 flex items-center gap-3 flex-shrink-0">
                <span id="pgDrawerAvatar" class="w-12 h-12 rounded-2xl bg-navy/10 text-navy grid place-items-center font-heading font-extrabold text-sm flex-shrink-0">AF</span>
                <div class="min-w-0">
                    <h3 id="pgDrawerNama" class="font-heading font-extrabold text-lg text-slate-800 truncate">Profil Pegawai</h3>
                    <p id="pgDrawerSub" class="text-xs text-slate-400 truncate">-</p>
                </div>
                <button onclick="closePgDrawer()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-5 pt-3 flex gap-1 border-b border-slate-100 overflow-x-auto no-scrollbar flex-shrink-0">
                <button data-tab="biodata" onclick="pgTab('biodata')" class="pg-tab-btn active text-xs font-bold px-3 py-2.5 rounded-t-lg whitespace-nowrap">Biodata Pribadi</button>
                <button data-tab="pendidikan" onclick="pgTab('pendidikan')" class="pg-tab-btn text-xs font-bold px-3 py-2.5 rounded-t-lg whitespace-nowrap">Riwayat Pendidikan &amp; Sertifikasi</button>
                <button data-tab="dokumen" onclick="pgTab('dokumen')" class="pg-tab-btn text-xs font-bold px-3 py-2.5 rounded-t-lg whitespace-nowrap">Dokumen &amp; Berkas</button>
                <button data-tab="penugasan" onclick="pgTab('penugasan')" class="pg-tab-btn text-xs font-bold px-3 py-2.5 rounded-t-lg whitespace-nowrap">Penugasan &amp; Beban Kerja</button>
            </div>
            <div id="pgDrawerBody" class="px-5 py-5 overflow-y-auto flex-1"></div>
        </div>
    </div>

    <!-- ============ MODAL: TAMBAH PEGAWAI BARU ============ -->
    <div id="pgTambahModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closePgTambah()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[92vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-xl">🧑‍🏫</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Tambah Pegawai Baru</h3><p class="text-xs text-slate-400">Akun login portal akan dibuat otomatis saat data disimpan.</p></div>
                <button onclick="closePgTambah()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-6 py-5 overflow-y-auto grid sm:grid-cols-2 gap-3">
                <div><label class="text-xs font-bold text-slate-500">Nama Lengkap</label><input id="pgInNama" type="text" placeholder="cth. Ahmad Fauzi" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Gelar Akademik</label><input id="pgInGelar" type="text" placeholder="cth. S.Pd., M.M." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">NUPTK</label><input id="pgInNuptk" type="text" placeholder="16 digit" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">NIP / NIK</label><input id="pgInNip" type="text" placeholder="NIP/NIK" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Jenis Kelamin</label><select id="pgInJk" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option value="L">Laki-laki</option><option value="P">Perempuan</option></select></div>
                <div><label class="text-xs font-bold text-slate-500">Status Kepegawaian</label><select id="pgInStatus" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>GTY</option><option>GTT</option><option>PNS</option><option>PPPK</option><option>PTT</option></select></div>
                <div><label class="text-xs font-bold text-slate-500">Jabatan Utama</label><input id="pgInJabatan" type="text" placeholder="cth. Guru Matematika" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Tugas Tambahan</label><input id="pgInTugas" type="text" placeholder="cth. Wali Kelas 10-A" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Golongan / Pangkat</label><input id="pgInGolongan" type="text" placeholder="cth. III/c" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">No. WhatsApp Aktif</label><input id="pgInWa" type="text" placeholder="628xxxxxxxxxx" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">TMT Masuk Kerja</label><input id="pgInTmt" type="text" placeholder="cth. 01 Jan 2015" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Unit / Kategori</label><select id="pgInUnit" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Guru Pengajar</option><option>Wali Kelas</option><option>Tenaga Administrasi/TU</option><option>Pustakawan</option><option>Laboran</option></select></div>
                <label class="sm:col-span-2 flex items-center gap-2 bg-slate-50 border border-dashed border-slate-300 rounded-xl px-3 py-3 text-xs font-semibold text-slate-500 cursor-pointer"><span>🔐</span> Auto-generate akun login portal guru/pegawai<input type="checkbox" id="pgInAkun" checked class="ml-auto accent-navy"></label>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2 flex-shrink-0">
                <button onclick="closePgTambah()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="submitPgTambah()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan &amp; Buat Akun</button>
            </div>
        </div>
    </div>

    <!-- ============ DRAWER: REVIEW & VALIDASI PERANGKAT ============ -->
    <div id="pdDrawer" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-black/50" onclick="closePdDrawer()"></div>
        <div class="absolute right-0 top-0 h-full w-full max-w-2xl bg-white shadow-2xl flex flex-col">
            <div class="px-5 py-4 border-b border-slate-100 flex items-center gap-3 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-lg">📑</span>
                <div class="min-w-0">
                    <h3 id="pdDrawerNama" class="font-heading font-extrabold text-base text-slate-800 truncate">Review Perangkat</h3>
                    <p id="pdDrawerSub" class="text-xs text-slate-400 truncate">-</p>
                </div>
                <button onclick="closePdDrawer()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-5 py-5 overflow-y-auto flex-1 space-y-4">
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase mb-2">Tampilan Dokumen (PDF Viewer)</p>
                    <div class="rounded-2xl border border-slate-200 overflow-hidden bg-slate-100">
                        <div class="flex items-center gap-2 px-3 py-2 bg-slate-800 text-white text-[11px] font-semibold">
                            <span>📄</span><span id="pdViewerFile" class="truncate">modul-ajar.pdf</span>
                            <span class="ml-auto flex gap-2"><span>−</span><span class="opacity-60">100%</span><span>+</span></span>
                        </div>
                        <img loading="lazy" src="https://picsum.photos/seed/perangkat-doc/800/1000" alt="Pratinjau Dokumen" class="w-full h-64 object-cover object-top">
                    </div>
                </div>
                <div class="rounded-2xl border border-slate-100 p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase mb-2">Form Catatan Evaluasi</p>
                    <div class="grid grid-cols-3 gap-2">
                        <label class="cursor-pointer"><input type="radio" name="pdStatus" value="Disetujui" checked class="peer hidden"><span class="block text-center text-xs font-bold py-2.5 rounded-xl border border-slate-200 text-slate-500 peer-checked:bg-emerald2 peer-checked:text-white peer-checked:border-emerald2">✓ Disetujui</span></label>
                        <label class="cursor-pointer"><input type="radio" name="pdStatus" value="Revisi" class="peer hidden"><span class="block text-center text-xs font-bold py-2.5 rounded-xl border border-slate-200 text-slate-500 peer-checked:bg-amber2 peer-checked:text-white peer-checked:border-amber2">⚠ Minta Revisi</span></label>
                        <label class="cursor-pointer"><input type="radio" name="pdStatus" value="Ditolak" class="peer hidden"><span class="block text-center text-xs font-bold py-2.5 rounded-xl border border-slate-200 text-slate-500 peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500">✗ Ditolak</span></label>
                    </div>
                    <textarea id="pdCatatan" rows="3" placeholder="Catatan / feedback, cth: Tujuan Pembelajaran pada Bab 2 perlu disesuaikan dengan asesmen HOTS..." class="mt-3 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 resize-none"></textarea>
                </div>
            </div>
            <div class="px-5 py-4 border-t border-slate-100 flex justify-end gap-2 flex-shrink-0">
                <button onclick="closePdDrawer()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
                <button onclick="pdSimpanValidasi()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Salin &amp; Terbitkan Tanda Tangan Digital</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: UNGGAH PERANGKAT BARU ============ -->
    <div id="pdUploadModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closePdUpload()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-xl max-h-[92vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-xl">📤</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Unggah Perangkat Baru</h3><p class="text-xs text-slate-400">Dokumen akan masuk ke antrean validasi Waka Kurikulum.</p></div>
                <button onclick="closePdUpload()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-6 py-5 overflow-y-auto grid sm:grid-cols-2 gap-3">
                <div><label class="text-xs font-bold text-slate-500">Mata Pelajaran</label><input id="pdInMapel" type="text" placeholder="cth. Matematika" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Guru Pengampu</label><input id="pdInGuru" type="text" placeholder="cth. Ahmad Fauzi" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Tingkat / Kelas</label><select id="pdInTingkat" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Kelas 10</option><option>Kelas 11</option><option>Kelas 12</option></select></div>
                <div><label class="text-xs font-bold text-slate-500">Rombel</label><input id="pdInRombel" type="text" placeholder="cth. 10-A / 10-B" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Jenis Dokumen</label><select id="pdInJenis" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>CP</option><option>TP</option><option>ATP</option><option>Modul Ajar</option><option>Prota</option><option>Promes</option><option>BTA</option></select></div>
                <div><label class="text-xs font-bold text-slate-500">Versi</label><input id="pdInVersi" type="text" value="v1.0" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div class="sm:col-span-2"><label class="text-xs font-bold text-slate-500">Nama Dokumen</label><input id="pdInNama" type="text" placeholder="cth. Modul Ajar Bab 3 - Perbandingan" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <label class="sm:col-span-2 flex items-center gap-2 bg-slate-50 border border-dashed border-slate-300 rounded-xl px-3 py-4 text-xs font-semibold text-slate-500 cursor-pointer"><span>📎</span> Pilih berkas PDF/DOCX (maks 20MB)<input type="file" class="hidden"></label>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2 flex-shrink-0">
                <button onclick="closePdUpload()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="submitPdUpload()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Unggah &amp; Kirim Validasi</button>
            </div>
        </div>
    </div>

    <!-- ============ DRAWER: EDITOR PENGUMUMAN ============ -->
    <div id="hmDrawer" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-black/50" onclick="closeHmEditor()"></div>
        <div class="absolute right-0 top-0 h-full w-full max-w-2xl bg-white shadow-2xl flex flex-col">
            <div class="px-5 py-4 border-b border-slate-100 flex items-center gap-3 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-lg">📝</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Buat Pengumuman Baru</h3><p class="text-xs text-slate-400">Terbitkan ke feed portal &amp; broadcast WhatsApp.</p></div>
                <button onclick="closeHmEditor()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-5 py-5 overflow-y-auto flex-1 space-y-3">
                <div><label class="text-xs font-bold text-slate-500">Judul Pengumuman</label><input id="hmInJudul" type="text" placeholder="cth. Jadwal Ujian Tengah Semester Ganjil" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div><label class="text-xs font-bold text-slate-500">Kategori</label><select id="hmInKategori" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Akademik</option><option>Libur/Kegiatan</option><option>Keuangan</option><option>Kebijakan/Internal</option></select></div>
                    <div><label class="text-xs font-bold text-slate-500">Nomor Surat / Memo Resmi</label><input id="hmInNomor" type="text" placeholder="cth. MEMO/014/X/2026" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-500">Target Penerima (multi-select)</label>
                    <div class="mt-1 bg-slate-100 rounded-xl p-3 grid grid-cols-2 gap-2 text-xs font-semibold text-slate-600">
                        <label class="flex items-center gap-2"><input type="checkbox" checked class="accent-navy"> 👨‍👩‍👧 Orang Tua Murid → SMA → Kelas 10-A</label>
                        <label class="flex items-center gap-2"><input type="checkbox" class="accent-navy"> 👨‍👩‍👧 Orang Tua Murid → SMA → Kelas 10-B</label>
                        <label class="flex items-center gap-2"><input type="checkbox" class="accent-navy"> 👩‍🏫 Guru &amp; Staf</label>
                        <label class="flex items-center gap-2"><input type="checkbox" class="accent-navy"> 🎓 Seluruh Siswa</label>
                    </div>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-500">Isi Pengumuman</label>
                    <div class="mt-1 rounded-xl border border-slate-200 overflow-hidden">
                        <div class="flex items-center gap-1 px-2 py-1.5 bg-slate-50 border-b border-slate-200 text-slate-500 text-xs">
                            <button onmousedown="event.preventDefault();document.execCommand('bold')" class="w-7 h-7 rounded hover:bg-slate-200 font-extrabold">B</button>
                            <button onmousedown="event.preventDefault();document.execCommand('italic')" class="w-7 h-7 rounded hover:bg-slate-200 italic">I</button>
                            <button onmousedown="event.preventDefault();document.execCommand('insertUnorderedList')" class="w-7 h-7 rounded hover:bg-slate-200">•</button>
                            <span class="flex-1"></span>
                            <span class="text-[10px]">📎 Lampirkan PDF/Gambar</span>
                        </div>
                        <div id="hmInBody" contenteditable="true" class="min-h-[120px] px-3 py-2.5 text-sm text-slate-700 outline-none" data-placeholder="Tulis isi pengumuman di sini..."></div>
                    </div>
                </div>
                <div class="rounded-2xl border border-slate-100 p-4 space-y-2">
                    <p class="text-[11px] font-bold text-slate-400 uppercase">Opsi Distribusi</p>
                    <label class="flex items-center gap-2 text-xs font-semibold text-slate-600"><input type="checkbox" id="hmInFeed" checked class="accent-navy"> Tampilkan di Feed Banner Portal Orang Tua / Siswa</label>
                    <label class="flex items-center gap-2 text-xs font-semibold text-slate-600"><input type="checkbox" id="hmInWa" checked class="accent-navy"> Blast Pesan Ringkas + Link PDF ke WhatsApp Penerima</label>
                </div>
            </div>
            <div class="px-5 py-4 border-t border-slate-100 flex flex-wrap justify-end gap-2 flex-shrink-0">
                <button onclick="hmSimpan('Draf')" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50 border border-slate-200">Simpan Draf</button>
                <button onclick="hmSimpan('Terjadwal')" class="text-sm font-bold text-navy px-4 py-2.5 rounded-xl hover:bg-navy/5 border border-navy/20">Jadwalkan Terbit</button>
                <button onclick="hmSimpan('Aktif')" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Terbitkan &amp; Broadcast Sekarang</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: PREVIEW & READ LOG ============ -->
    <div id="hmReadModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeHmRead()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg max-h-[92vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-lg">📄</span>
                <div class="min-w-0"><h3 id="hmReadJudul" class="font-heading font-extrabold text-base text-slate-800 truncate">Preview Pengumuman</h3><p id="hmReadSub" class="text-xs text-slate-400 truncate">-</p></div>
                <button onclick="closeHmRead()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-6 py-5 overflow-y-auto flex-1 space-y-4">
                <div class="rounded-2xl border border-slate-100 p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase mb-2">Pratinjau Isi</p>
                    <div id="hmReadBody" class="text-sm text-slate-600 space-y-1"></div>
                </div>
                <div class="rounded-2xl border border-slate-100 p-4">
                    <p class="text-[11px] font-bold text-slate-400 uppercase mb-1">Read Analytics</p>
                    <div id="hmReadBar" class="h-2 rounded-full bg-slate-100 overflow-hidden"></div>
                    <p id="hmReadStat" class="mt-2 text-xs font-semibold text-slate-600">-</p>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase mb-2">Belum Dibaca</p>
                    <div id="hmReadList" class="space-y-1.5"></div>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2 flex-shrink-0">
                <button onclick="hmBlastUlang()" class="text-sm font-bold text-emerald2 px-4 py-2.5 rounded-xl hover:bg-emerald2/10 border border-emerald2/20">📲 Blast WA Ulang (Resend)</button>
                <button onclick="showToast('success','Format Surat Edaran PDF dikirim ke printer')" class="text-sm font-bold text-navy px-4 py-2.5 rounded-xl hover:bg-navy/5 border border-navy/20">🖨️ Cetak PDF</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: PREVIEW & KELOLA EVIDEN ============ -->
    <div id="akEvidenModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeAkEviden()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg max-h-[92vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-lg">📁</span>
                <div class="min-w-0"><h3 id="akEvidenJudul" class="font-heading font-extrabold text-base text-slate-800 truncate">Kelola Eviden</h3><p id="akEvidenSub" class="text-xs text-slate-400 truncate">-</p></div>
                <button onclick="closeAkEviden()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-6 py-5 overflow-y-auto flex-1 space-y-4">
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase mb-2">Dokumen Eviden</p>
                    <div id="akEvidenFiles" class="space-y-2"></div>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase mb-2">Catatan Reviewer</p>
                    <div id="akEvidenNotes" class="rounded-2xl border border-slate-100 p-3 text-xs text-slate-600 bg-slate-50"></div>
                </div>
                <label class="flex items-center gap-2 bg-slate-50 border border-dashed border-slate-300 rounded-xl px-3 py-4 text-xs font-semibold text-slate-500 cursor-pointer"><span>📤</span> Unggah file eviden baru (PDF)<input type="file" class="hidden"></label>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2 flex-shrink-0">
                <button onclick="closeAkEviden()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Tutup</button>
                <button onclick="akAjukanReview()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan &amp; Ajukan Review</button>
            </div>
        </div>
    </div>

    <!-- ============ MODAL: DETAIL JURNAL SETORAN ============ -->
    <div id="thJurnalModal" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-black/50" onclick="closeThJurnal()"></div>
        <div class="absolute right-0 top-0 h-full w-full max-w-md bg-white shadow-2xl flex flex-col">
            <div class="px-5 py-4 border-b border-slate-100 flex items-center gap-3 flex-shrink-0">
                <span id="thJurnalAvatar" class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center font-heading font-extrabold text-xs flex-shrink-0">KF</span>
                <div class="min-w-0"><h3 id="thJurnalNama" class="font-heading font-extrabold text-base text-slate-800 truncate">Jurnal Setoran</h3><p id="thJurnalSub" class="text-xs text-slate-400 truncate">-</p></div>
                <button onclick="closeThJurnal()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400 flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div id="thJurnalBody" class="px-5 py-5 overflow-y-auto flex-1"></div>
        </div>
    </div>

    <!-- ============ MODAL: INPUT SETORAN BARU ============ -->
    <div id="thInputModal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50" onclick="closeThInput()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-xl max-h-[92vh] flex flex-col">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center text-xl">📖</span>
                <div><h3 class="font-heading font-extrabold text-lg text-slate-800">Input Setoran Baru</h3><p class="text-xs text-slate-400">Catat setoran hafalan/tahsin siswa.</p></div>
                <button onclick="closeThInput()" class="ml-auto w-9 h-9 rounded-xl hover:bg-slate-100 grid place-items-center text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="px-6 py-5 overflow-y-auto grid sm:grid-cols-2 gap-3">
                <div class="sm:col-span-2"><label class="text-xs font-bold text-slate-500">Nama / NISN Siswa</label><input id="thInSiswa" list="thSiswaList" type="text" placeholder="Ketik nama siswa..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><datalist id="thSiswaList"></datalist></div>
                <div><label class="text-xs font-bold text-slate-500">Halaqah</label><select id="thInHalaqah" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Halaqah 1 - Ust. Ahmad</option><option>Halaqah 2 - Ustzh. B</option><option>Halaqah 3 - Ust. Fauzan</option></select></div>
                <div><label class="text-xs font-bold text-slate-500">Program</label><select id="thInProgram" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option>Tahsin</option><option>Tahfidz Reguler</option><option>Tahfidz Takhassus</option></select></div>
                <div><label class="text-xs font-bold text-slate-500">Jilid / Juz</label><input id="thInJuz" type="text" placeholder="cth. Juz 29 / Jilid 4" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Surah &amp; Ayat</label><input id="thInSurah" type="text" placeholder="cth. Al-Kahf: 1–20" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div><label class="text-xs font-bold text-slate-500">Kualitas Bacaan</label><select id="thInNilai" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"><option value="A">A - Mumtaz</option><option value="B">B - Jayyid Jiddan</option><option value="C">C - Jayyid</option></select></div>
                <div><label class="text-xs font-bold text-slate-500">Tanggal</label><input id="thInTgl" type="date" class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700"></div>
                <div class="sm:col-span-2"><label class="text-xs font-bold text-slate-500">Catatan Musyrif</label><textarea id="thInCatatan" rows="2" placeholder="Catatan perbaikan bacaan / makhraj..." class="mt-1 w-full bg-slate-100 rounded-xl px-3 py-2.5 text-sm outline-none text-slate-700 resize-none"></textarea></div>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-2 flex-shrink-0">
                <button onclick="closeThInput()" class="text-sm font-bold text-slate-500 px-4 py-2.5 rounded-xl hover:bg-slate-50">Batal</button>
                <button onclick="submitThInput()" class="bg-navy hover:bg-sky2 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-colors">Simpan Setoran</button>
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
            const hidden = sb.classList.contains('-translate-x-full');
            sb.classList.toggle('-translate-x-full');
            ov.classList.toggle('hidden');
        }

        // ---------- Accordion groups ----------
        document.querySelectorAll('.sidebar-group-btn').forEach(btn => {
            btn.addEventListener('click', () => btn.closest('.sidebar-group').classList.toggle('open'));
        });

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

            if (name === 'siswa') loadSiswa();
            if (name === 'ppdb') loadPpdb();
            if (name === 'ppdb-formulir') loadPpdbFormulir();
            if (name === 'mutasi') loadMutasi();
            if (name === 'kelulusan') loadKelulusan();
            if (name === 'kehadiran') loadKehadiran();
            if (name === 'tatib') loadTatib();
            if (name === 'pegawai') loadPegawai();
            if (name === 'perangkat') loadPerangkat();
            if (name === 'pengumuman') loadPengumuman();
            if (name === 'akreditasi') loadAkreditasi();
            if (name === 'ringkasan-keuangan') loadRingkasanKeuangan();
            if (name === 'tahfidz') loadTahfidz();
            if (tableData[name]) loadTable(name);
            if (window.innerWidth < 1024 && !document.getElementById('sidebar').classList.contains('-translate-x-full')) {
                toggleSidebar();
            }
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', () => {
                if (item.hasAttribute('data-reset')) { openResetModal(); return; }
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

        // ---------- Data Siswa (skeleton + filter + empty state + bulk) ----------
        const siswaData = [
            { nama: 'Keira Faza Aishanaya', nisn: '0071234501', jk: 'P', kelas: 'VIII-A', wali: 'Rina, M.Pd.', presensi: 'Hadir', status: 'Aktif' },
            { nama: 'Bagas Pratama', nisn: '0071234502', jk: 'L', kelas: 'VIII-A', wali: 'Rina, M.Pd.', presensi: 'Terlambat', status: 'Aktif' },
            { nama: 'Citra Ayu Lestari', nisn: '0071234503', jk: 'P', kelas: 'VIII-B', wali: 'Dwi, S.Pd.', presensi: 'Hadir', status: 'Aktif' },
            { nama: 'Dimas Anggara', nisn: '0061234504', jk: 'L', kelas: 'IX-A', wali: 'Sari, S.Kom.', presensi: 'Izin', status: 'Aktif' },
            { nama: 'Eka Nurhaliza', nisn: '0071234505', jk: 'P', kelas: 'VIII-B', wali: 'Dwi, S.Pd.', presensi: 'Hadir', status: 'Mutasi' },
            { nama: 'Fajar Ramadhan', nisn: '0051234506', jk: 'L', kelas: 'IX-A', wali: 'Sari, S.Kom.', presensi: 'Hadir', status: 'Alumni' }
        ];

        const presensiBadge = { 'Hadir': 'bg-emerald2/10 text-emerald2', 'Terlambat': 'bg-amber2/15 text-amber2', 'Izin': 'bg-sky2/10 text-sky2', 'Alpa': 'bg-red-100 text-red-600' };
        const statusBadge = { 'Aktif': 'bg-emerald2/10 text-emerald2', 'Mutasi': 'bg-amber2/15 text-amber2', 'Alumni': 'bg-slate-200 text-slate-600' };

        function rowHtml(s) {
            const initial = s.nama.split(' ').map(w => w[0]).slice(0, 2).join('');
            return `<tr class="hover:bg-slate-50/70 siswa-row" data-nama="${s.nama.toLowerCase()}" data-nisn="${s.nisn}" data-kelas="${s.kelas}" data-status="${s.status}">
                <td class="px-4 py-3"><input type="checkbox" class="matrix row-check"></td>
                <td class="px-4 py-3"><div class="flex items-center gap-3"><span class="w-9 h-9 rounded-full bg-navy/10 text-navy grid place-items-center font-heading font-bold text-xs">${initial}</span><span class="font-semibold text-slate-700">${s.nama}</span></div></td>
                <td class="px-4 py-3 text-slate-500">${s.nisn}</td>
                <td class="px-4 py-3 text-slate-500">${s.jk}</td>
                <td class="px-4 py-3 font-semibold text-slate-600">${s.kelas}</td>
                <td class="px-4 py-3 text-slate-500">${s.wali}</td>
                <td class="px-4 py-3"><span class="text-[11px] font-bold ${presensiBadge[s.presensi]} px-2 py-0.5 rounded-full">${s.presensi}</span></td>
                <td class="px-4 py-3"><span class="text-[11px] font-bold ${statusBadge[s.status]} px-2 py-0.5 rounded-full">${s.status}</span></td>
                <td class="px-4 py-3"><div class="flex justify-end gap-1">
                    <button title="Detail" class="w-8 h-8 rounded-lg hover:bg-slate-100 grid place-items-center text-slate-400">👁️</button>
                    <button title="Edit" class="w-8 h-8 rounded-lg hover:bg-slate-100 grid place-items-center text-slate-400">✏️</button>
                    <button title="Cetak" class="w-8 h-8 rounded-lg hover:bg-slate-100 grid place-items-center text-slate-400">🖨️</button>
                    <button title="Hapus" class="w-8 h-8 rounded-lg hover:bg-red-50 grid place-items-center text-red-400">🗑️</button>
                </div></td>
            </tr>`;
        }

        let siswaLoaded = false;
        function loadSiswa() {
            if (siswaLoaded) return;
            const body = document.getElementById('siswaBody');
            setTimeout(() => {
                body.innerHTML = siswaData.map(rowHtml).join('');
                siswaLoaded = true;
                bindRowEvents();
                applyFilter();
                showToast('success', 'Data siswa berhasil dimuat');
            }, 700);
        }

        function applyFilter() {
            const q = document.getElementById('filterSearch').value.toLowerCase();
            const kelas = document.getElementById('filterKelas').value;
            const status = document.getElementById('filterStatus').value;
            let visible = 0;
            document.querySelectorAll('.siswa-row').forEach(r => {
                const ok = (!q || r.dataset.nama.includes(q) || r.dataset.nisn.includes(q))
                    && (!kelas || r.dataset.kelas === kelas)
                    && (!status || r.dataset.status === status);
                r.style.display = ok ? '' : 'none';
                if (ok) visible++;
            });
            document.getElementById('siswaEmpty').classList.toggle('hidden', visible > 0);
            document.getElementById('siswaCount').textContent = 'Menampilkan ' + visible + ' dari ' + siswaData.length + ' siswa';
        }

        ['filterSearch', 'filterKelas', 'filterStatus'].forEach(id => {
            document.getElementById(id).addEventListener('input', applyFilter);
            document.getElementById(id).addEventListener('change', applyFilter);
        });

        function bindRowEvents() {
            document.querySelectorAll('.row-check').forEach(c => c.addEventListener('change', updateBulk));
            document.getElementById('selectAll').onchange = (e) => {
                document.querySelectorAll('.siswa-row').forEach(r => {
                    if (r.style.display !== 'none') { r.querySelector('.row-check').checked = e.target.checked; }
                });
                updateBulk();
            };
        }

        function updateBulk() {
            const checked = document.querySelectorAll('.row-check:checked').length;
            document.getElementById('bulkCount').textContent = checked;
            document.getElementById('bulkBar').classList.toggle('hidden', checked === 0);
        }

        // ---------- Reset modal ----------
        function openResetModal() { const m = document.getElementById('resetModal'); m.classList.remove('hidden'); m.classList.add('flex'); }
        function closeResetModal() { const m = document.getElementById('resetModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function confirmReset() {
            const kelas = document.getElementById('resetKelas').value;
            closeResetModal();
            showToast('success', 'Reset password berhasil untuk ' + (kelas === 'Semua' ? 'semua kelas' : 'kelas ' + kelas));
        }

        // ---------- PPDB / SPMB — Metode Tanpa Pembelian Formulir ----------
        const ppdbStatusBadge = {
            'Menunggu Verifikasi': 'bg-amber2/15 text-amber2',
            'Berkas Lengkap': 'bg-sky2/10 text-sky2',
            'Berkas Tidak Sesuai': 'bg-red-100 text-red-600',
            'Diterima': 'bg-emerald2/10 text-emerald2',
            'Ditolak': 'bg-red-100 text-red-600'
        };
        const ppdbDocs = ['Akte Kelahiran', 'Kartu Keluarga (KK)', 'Ijazah / SKL', 'Pas Foto 3×4'];
        const ppdbDocKeys = ['akte', 'kk', 'ijazah', 'foto'];
        let ppdbData = [
            { reg: 'REG-2026-001', tgl: '18 Okt 2026', nama: 'Keira Faza Aishanaya', nisn: '0071234501', nik: '3573010204490001', jk: 'P', ttl: 'Malang, 2 April 2013', agama: 'Islam', sekolah: 'SDN Arjowinangun 1 Malang', jurusan: 'Reguler (VII)', jalur: 'Gelombang 1', wa: '6281227700781', ayah: 'Hendra Faza', kerjaAyah: 'Karyawan Swasta', ibu: 'Nur Aini', kerjaIbu: 'Ibu Rumah Tangga', gaji: 'Rp 4–6 jt', alamat: 'Jl. Arjowinangun No. 21, Kedungkandang, Kota Malang', geo: '-7.9812, 112.6341', berkas: { akte: true, kk: true, ijazah: true, foto: true }, status: 'Berkas Lengkap' },
            { reg: 'REG-2026-002', tgl: '18 Okt 2026', nama: 'Bagas Pratama', nisn: '0071234502', nik: '3573010204490002', jk: 'L', ttl: 'Malang, 14 Juni 2013', agama: 'Islam', sekolah: 'SDN Lowokwaru 3 Malang', jurusan: 'Reguler (VII)', jalur: 'Gelombang 1', wa: '6281234567891', ayah: 'Slamet Riyadi', kerjaAyah: 'Pedagang', ibu: 'Sri Wahyuni', kerjaIbu: 'Ibu Rumah Tangga', gaji: 'Rp 2–4 jt', alamat: 'Jl. Joyo Agung No. 8, Lowokwaru, Kota Malang', geo: '-7.9438, 112.6145', berkas: { akte: true, kk: true, ijazah: true, foto: false }, status: 'Menunggu Verifikasi' },
            { reg: 'REG-2026-003', tgl: '17 Okt 2026', nama: 'Citra Ayu Lestari', nisn: '0071234503', nik: '3573010204490003', jk: 'P', ttl: 'Surabaya, 30 Januari 2013', agama: 'Islam', sekolah: 'SDN Rampal 2 Malang', jurusan: 'Unggulan (VII)', jalur: 'Jalur Prestasi', wa: '6281234567892', ayah: 'Agus Setiawan', kerjaAyah: 'PNS', ibu: 'Dewi Kartika', kerjaIbu: 'Guru', gaji: 'Rp 6–8 jt', alamat: 'Jl. Rampal No. 45, Sukun, Kota Malang', geo: '-7.9931, 112.6227', berkas: { akte: true, kk: true, ijazah: true, foto: true }, status: 'Diterima' },
            { reg: 'REG-2026-004', tgl: '17 Okt 2026', nama: 'Dimas Anggara', nisn: '0061234504', nik: '3573010204490004', jk: 'L', ttl: 'Malang, 7 September 2012', agama: 'Islam', sekolah: 'SDN Buring 1 Malang', jurusan: 'Reguler (VII)', jalur: 'Jalur Zonasi', wa: '6281234567893', ayah: 'Bambang S', kerjaAyah: 'Buruh', ibu: 'Siti Aminah', kerjaIbu: 'Ibu Rumah Tangga', gaji: 'Rp 1–2 jt', alamat: 'Jl. Buring No. 12, Kedungkandang, Kota Malang', geo: '-7.9776, 112.6489', berkas: { akte: true, kk: false, ijazah: true, foto: false }, status: 'Berkas Tidak Sesuai' },
            { reg: 'REG-2026-005', tgl: '16 Okt 2026', nama: 'Eka Nurhaliza', nisn: '0071234505', nik: '3573010204490005', jk: 'P', ttl: 'Malang, 19 Maret 2013', agama: 'Islam', sekolah: 'SDN Tlogomas 1 Malang', jurusan: 'Reguler (VII)', jalur: 'Jalur Zonasi', wa: '6281234567894', ayah: 'Fauzi Rahman', kerjaAyah: 'Sopir', ibu: 'Lailatul B', kerjaIbu: 'Ibu Rumah Tangga', gaji: 'Rp 2–4 jt', alamat: 'Jl. Tlogomas No. 33, Lowokwaru, Kota Malang', geo: '-7.9308, 112.6029', berkas: { akte: true, kk: true, ijazah: false, foto: true }, status: 'Menunggu Verifikasi' },
            { reg: 'REG-2026-006', tgl: '16 Okt 2026', nama: 'Fajar Ramadhan', nisn: '0051234506', nik: '3573010204490006', jk: 'L', ttl: 'Malang, 1 Juli 2012', agama: 'Islam', sekolah: 'SDN Sawojajar 4 Malang', jurusan: 'Tahfidz (VII)', jalur: 'Gelombang 1', wa: '6281234567895', ayah: 'Imam Syafii', kerjaAyah: 'Wiraswasta', ibu: 'Halimah', kerjaIbu: 'Ibu Rumah Tangga', gaji: 'Rp 4–6 jt', alamat: 'Jl. Sawojajar No. 9, Kedungkandang, Kota Malang', geo: '-7.9762, 112.6584', berkas: { akte: true, kk: true, ijazah: true, foto: true }, status: 'Diterima' },
            { reg: 'REG-2026-007', tgl: '15 Okt 2026', nama: 'Gita Puspita Sari', nisn: '0071234507', nik: '3573010204490007', jk: 'P', ttl: 'Blitar, 25 Desember 2012', agama: 'Islam', sekolah: 'SDN Mojolangu 2 Malang', jurusan: 'Tahfidz (VII)', jalur: 'Jalur Prestasi', wa: '6281234567896', ayah: 'Hadi Purnomo', kerjaAyah: 'Karyawan BUMN', ibu: 'Ratna Sari', kerjaIbu: 'Bidan', gaji: 'Rp 6–8 jt', alamat: 'Jl. Mojolangu No. 17, Lowokwaru, Kota Malang', geo: '-7.9290, 112.6258', berkas: { akte: true, kk: true, ijazah: true, foto: true }, status: 'Berkas Lengkap' },
            { reg: 'REG-2026-008', tgl: '15 Okt 2026', nama: 'Hadi Santoso', nisn: '0061234508', nik: '3573010204490008', jk: 'L', ttl: 'Malang, 11 November 2012', agama: 'Islam', sekolah: 'SDN Gadang 1 Malang', jurusan: 'Reguler (VII)', jalur: 'Gelombang 1', wa: '6281234567897', ayah: 'Tono Wibowo', kerjaAyah: 'Petani', ibu: 'Sumiyati', kerjaIbu: 'Ibu Rumah Tangga', gaji: 'Rp 1–2 jt', alamat: 'Jl. Gadang No. 54, Sukun, Kota Malang', geo: '-8.0021, 112.6298', berkas: { akte: false, kk: true, ijazah: false, foto: true }, status: 'Berkas Tidak Sesuai' }
        ];
        let ppdbLoaded = false;
        let ppdbCurrent = null;

        function initials(nama) { return nama.split(' ').map(w => w[0]).slice(0, 2).join('').toUpperCase(); }
        function ppdbBerkasCount(p) { return ppdbDocKeys.filter(k => p.berkas[k]).length; }

        function ppdbRowHtml(p) {
            const total = ppdbDocKeys.length;
            const cnt = ppdbBerkasCount(p);
            const berkasColor = cnt === total ? 'bg-emerald2/10 text-emerald2' : cnt >= 2 ? 'bg-amber2/15 text-amber2' : 'bg-red-100 text-red-600';
            return `<tr class="hover:bg-slate-50/70 ppdb-row" data-nama="${p.nama.toLowerCase()}" data-reg="${p.reg.toLowerCase()}" data-nik="${p.nik}" data-sekolah="${p.sekolah.toLowerCase()}" data-jalur="${p.jalur}" data-status="${p.status}">
                <td class="px-4 py-3"><p class="font-mono text-xs font-bold text-navy">${p.reg}</p><p class="text-[11px] text-slate-400">${p.tgl}</p></td>
                <td class="px-4 py-3"><div class="flex items-center gap-3">
                    <span class="w-9 h-9 rounded-full bg-navy/10 text-navy grid place-items-center font-heading font-bold text-xs flex-shrink-0">${initials(p.nama)}</span>
                    <div><p class="font-semibold text-slate-700">${p.nama}</p><p class="text-[11px] text-slate-400">NISN ${p.nisn} · ${p.jk === 'L' ? 'Laki-laki' : 'Perempuan'}</p><p class="text-[11px] text-slate-400 font-mono">NIK ${p.nik}</p></div>
                </div></td>
                <td class="px-4 py-3 text-slate-500">${p.sekolah}</td>
                <td class="px-4 py-3"><span class="text-[11px] font-bold bg-slate2 border border-slate-200 text-slate-600 px-2 py-0.5 rounded-full">${p.jurusan}</span></td>
                <td class="px-4 py-3">
                    <p class="text-xs text-slate-500">${p.ayah} / ${p.ibu}</p>
                    <button onclick="ppdbChatWa('${p.wa}','${p.nama}')" class="mt-1 inline-flex items-center gap-1 text-[11px] font-bold text-emerald2 bg-emerald2/10 hover:bg-emerald2/20 px-2 py-1 rounded-lg">💬 Chat WA</button>
                </td>
                <td class="px-4 py-3"><span class="text-[11px] font-bold ${berkasColor} px-2 py-0.5 rounded-full">${cnt}/${total} Berkas</span></td>
                <td class="px-4 py-3"><span class="text-[11px] font-bold ${ppdbStatusBadge[p.status]} px-2 py-0.5 rounded-full">${p.status}</span></td>
                <td class="px-4 py-3"><div class="flex justify-end gap-1">
                    <button title="Detail & Verifikasi" onclick="openPpdbDrawer('${p.reg}')" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                    <button title="Edit Data" onclick="showToast('info','Membuka form edit ${p.reg}...')" class="w-8 h-8 rounded-lg hover:bg-slate-100 grid place-items-center text-slate-400">✏️</button>
                    <button title="Cetak Kartu Pendaftaran" onclick="printPpdbCard('${p.reg}')" class="w-8 h-8 rounded-lg hover:bg-slate-100 grid place-items-center text-slate-400">🖨️</button>
                </div></td>
            </tr>`;
        }

        function loadPpdb() {
            if (ppdbLoaded) return;
            const body = document.getElementById('ppdbBody');
            setTimeout(() => {
                body.innerHTML = ppdbData.map(ppdbRowHtml).join('');
                ppdbLoaded = true;
                bindPpdbEvents();
                applyPpdbFilter();
                showToast('success', 'Data pendaftar PPDB berhasil dimuat');
            }, 700);
        }

        function bindPpdbEvents() {
            ['ppdbSearch', 'ppdbJalur', 'ppdbStatusFilter'].forEach(id => {
                const el = document.getElementById(id);
                if (el) { el.addEventListener('input', applyPpdbFilter); el.addEventListener('change', applyPpdbFilter); }
            });
        }

        function applyPpdbFilter() {
            const q = (document.getElementById('ppdbSearch').value || '').toLowerCase();
            const jalur = document.getElementById('ppdbJalur').value;
            const status = document.getElementById('ppdbStatusFilter').value;
            let visible = 0;
            document.querySelectorAll('.ppdb-row').forEach(r => {
                const ok = (!q || r.dataset.nama.includes(q) || r.dataset.reg.includes(q) || r.dataset.nik.includes(q) || r.dataset.sekolah.includes(q))
                    && (!jalur || r.dataset.jalur === jalur)
                    && (!status || r.dataset.status === status);
                r.style.display = ok ? '' : 'none';
                if (ok) visible++;
            });
            document.getElementById('ppdbEmpty').classList.toggle('hidden', visible > 0);
            document.getElementById('ppdbCount').textContent = 'Menampilkan ' + visible + ' dari ' + ppdbData.length + ' contoh pendaftar';
        }

        function renderPpdbTable() {
            document.getElementById('ppdbBody').innerHTML = ppdbData.map(ppdbRowHtml).join('');
            applyPpdbFilter();
        }

        function openPpdbDrawer(reg) {
            const p = ppdbData.find(x => x.reg === reg);
            if (!p) return;
            ppdbCurrent = p;
            document.getElementById('ppdbDrawerAvatar').textContent = initials(p.nama);
            document.getElementById('ppdbDrawerName').textContent = p.nama;
            document.getElementById('ppdbDrawerReg').textContent = p.reg + ' · ' + p.tgl + ' · ' + p.jalur;
            document.getElementById('ppdbBioNama').textContent = p.nama;
            document.getElementById('ppdbBioNisn').textContent = p.nisn;
            document.getElementById('ppdbBioNik').textContent = p.nik;
            document.getElementById('ppdbBioTtl').textContent = p.ttl;
            document.getElementById('ppdbBioJk').textContent = p.jk === 'L' ? 'Laki-laki' : 'Perempuan';
            document.getElementById('ppdbBioAgama').textContent = p.agama;
            document.getElementById('ppdbBioSekolah').textContent = p.sekolah;
            document.getElementById('ppdbBioJurusan').textContent = p.jurusan;
            document.getElementById('ppdbBioAlamat').textContent = p.alamat;
            document.getElementById('ppdbBioGeo').textContent = p.geo;
            document.getElementById('ppdbBioAyah').textContent = p.ayah;
            document.getElementById('ppdbBioKerjaAyah').textContent = p.kerjaAyah;
            document.getElementById('ppdbBioIbu').textContent = p.ibu;
            document.getElementById('ppdbBioKerjaIbu').textContent = p.kerjaIbu;
            document.getElementById('ppdbBioGaji').textContent = p.gaji;
            document.getElementById('ppdbBioWa').textContent = '+' + p.wa;
            renderPpdbDocs(p);
            document.getElementById('ppdbCatatan').value = p.status === 'Berkas Tidak Sesuai' ? 'Berkas tidak terbaca/buram, harap upload ulang.' : '';
            document.querySelectorAll('input[name="ppdbKeputusan"]').forEach(r => r.checked = false);
            document.getElementById('ppdbWaNotif').checked = true;
            ppdbTab('biodata');
            const d = document.getElementById('ppdbDrawer');
            d.classList.remove('hidden');
            requestAnimationFrame(() => document.getElementById('ppdbDrawerPanel').classList.remove('translate-x-full'));
        }

        function closePpdbDrawer() {
            document.getElementById('ppdbDrawerPanel').classList.add('translate-x-full');
            setTimeout(() => document.getElementById('ppdbDrawer').classList.add('hidden'), 250);
        }

        function renderPpdbDocs(p) {
            document.getElementById('ppdbDocList').innerHTML = ppdbDocs.map((d, i) => {
                const key = ppdbDocKeys[i];
                const ok = p.berkas[key];
                const fname = key + '_' + p.nisn + (key === 'foto' ? '.jpg' : '.pdf');
                return `<div class="bg-white rounded-2xl border border-slate-100 p-4">
                    <div class="flex items-start gap-3">
                        <span class="w-10 h-10 rounded-xl ${ok ? 'bg-emerald2/10 text-emerald2' : 'bg-red-100 text-red-600'} grid place-items-center text-lg flex-shrink-0">${ok ? '📄' : '⚠️'}</span>
                        <div class="flex-1 min-w-0"><p class="font-semibold text-sm text-slate-700">${d}</p><p class="text-[11px] text-slate-400 font-mono truncate">${fname}</p></div>
                        <button onclick="showToast('info','Membuka pratinjau dokumen (simulasi)')" class="text-[11px] font-bold text-navy bg-navy/5 hover:bg-navy/10 px-2 py-1 rounded-lg flex-shrink-0">Lihat</button>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <label class="inline-flex items-center gap-2 text-xs font-semibold text-emerald2 bg-emerald2/10 px-3 py-2 rounded-xl cursor-pointer"><input type="radio" name="doc_${key}" value="valid" ${ok ? 'checked' : ''} class="accent-emerald-600"> ✓ Valid</label>
                        <label class="inline-flex items-center gap-2 text-xs font-semibold text-red-600 bg-red-50 px-3 py-2 rounded-xl cursor-pointer"><input type="radio" name="doc_${key}" value="tidak" ${ok ? '' : 'checked'} class="accent-red-500"> ✗ Tidak Valid / Buram</label>
                    </div>
                </div>`;
            }).join('');
        }

        function ppdbTab(name) {
            document.querySelectorAll('.pptab-panel').forEach(pane => pane.classList.toggle('hidden', pane.id !== 'pptab-' + name));
            document.querySelectorAll('.pptab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
        }

        function savePpdbDecision() {
            if (!ppdbCurrent) return;
            const dec = document.querySelector('input[name="ppdbKeputusan"]:checked');
            if (!dec) { showToast('warning', 'Pilih keputusan verifikasi terlebih dahulu'); ppdbTab('keputusan'); return; }
            const map = { diterima: 'Diterima', perbaikan: 'Berkas Tidak Sesuai', ditolak: 'Ditolak' };
            ppdbCurrent.status = map[dec.value] || ppdbCurrent.status;
            const wa = document.getElementById('ppdbWaNotif').checked;
            const msg = dec.value === 'diterima' ? 'Diterima / Lolos' : dec.value === 'perbaikan' ? 'Minta Perbaikan Berkas' : 'Ditolak';
            closePpdbDrawer();
            renderPpdbTable();
            showToast('success', 'Keputusan tersimpan: ' + ppdbCurrent.nama + ' → ' + msg + (wa ? ' · notifikasi WhatsApp terkirim' : ''));
        }

        function ppdbChatWa(wa, nama) {
            const text = encodeURIComponent('Halo ' + nama + ', terima kasih telah mendaftar di SIAKAD PLUS. Ada yang bisa kami bantu terkait berkas pendaftaran?');
            window.open('https://wa.me/' + wa + '?text=' + text, '_blank');
        }

        function printPpdbCard(reg) { showToast('success', 'Kartu pendaftaran ' + reg + ' dikirim ke printer'); }
        function exportPpdb() { showToast('success', 'Rekap pendaftar diekspor (148 baris → Excel/CSV)'); }

        // ---------- PPDB / SPMB — Metode Dengan Pembelian Formulir ----------
        const pfPayBadge = {
            'Lunas': 'bg-emerald2/10 text-emerald2',
            'Menunggu Pembayaran': 'bg-amber2/15 text-amber2',
            'Kadaluarsa': 'bg-red-100 text-red-600'
        };
        const pfIsiBadge = {
            'Formulir Selesai': 'bg-emerald2/10 text-emerald2',
            'Pengisian Sebagian': 'bg-amber2/15 text-amber2',
            'Belum Mengisi Form': 'bg-slate-200 text-slate-500'
        };
        const pfDocNames = [['kk', 'Kartu Keluarga (KK)'], ['akte', 'Akte Kelahiran'], ['ijazah', 'Ijazah / SKL']];
        let pfData = [
            { trx: 'TRX-PPDB-089', pin: 'FORM-882910', tgl: '18 Okt 2026 09:12', ortu: 'Hendra Faza', wa: '6281227700781', siswa: 'Keira Faza Aishanaya', nisn: '0071234501', nik: '3573010204490001', sekolah: 'SDN Arjowinangun 1 Malang', alamat: 'Jl. Arjowinangun No. 21, Kedungkandang, Kota Malang', kanal: 'VA BCA', metode: 'Virtual Account', nominal: 'Rp 250.000', pay: 'Lunas', isi: 'Formulir Selesai', ref: 'BCA-20261018-882910', bukti: 'transfer_bca_089.jpg', masa: 's/d 31 Okt 2026 · 20:00', lastLogin: '17 Okt 2026 20:41', loginCount: 3, berkas: { kk: true, akte: true, ijazah: true } },
            { trx: 'TRX-PPDB-090', pin: 'FORM-882911', tgl: '18 Okt 2026 08:40', ortu: 'Slamet Riyadi', wa: '6281234567891', siswa: 'Bagas Pratama', nisn: '0071234502', nik: '3573010204490002', sekolah: 'SDN Lowokwaru 3 Malang', alamat: 'Jl. Joyo Agung No. 8, Lowokwaru, Kota Malang', kanal: 'QRIS', metode: 'QRIS', nominal: 'Rp 250.000', pay: 'Lunas', isi: 'Pengisian Sebagian', ref: 'QRIS-20261018-882911', bukti: '-', masa: 's/d 31 Okt 2026 · 20:00', lastLogin: '18 Okt 2026 07:12', loginCount: 1, berkas: { kk: true, akte: false, ijazah: false } },
            { trx: 'TRX-PPDB-091', pin: 'FORM-882912', tgl: '17 Okt 2026 14:05', ortu: 'Agus Setiawan', wa: '6281234567892', siswa: 'Citra Ayu Lestari', nisn: '0071234503', nik: '3573010204490003', sekolah: 'SDN Rampal 2 Malang', alamat: 'Jl. Rampal No. 45, Sukun, Kota Malang', kanal: 'VA Mandiri', metode: 'Virtual Account', nominal: 'Rp 275.000', pay: 'Lunas', isi: 'Formulir Selesai', ref: 'MDR-20261017-882912', bukti: 'transfer_mandiri_091.jpg', masa: 's/d 31 Okt 2026 · 20:00', lastLogin: '17 Okt 2026 15:30', loginCount: 4, berkas: { kk: true, akte: true, ijazah: true } },
            { trx: 'TRX-PPDB-092', pin: 'FORM-882913', tgl: '17 Okt 2026 11:22', ortu: 'Bambang S', wa: '6281234567893', siswa: '-', nisn: '-', nik: '-', sekolah: '-', alamat: '-', kanal: 'E-Wallet (GoPay)', metode: 'E-Wallet', nominal: 'Rp 250.000', pay: 'Lunas', isi: 'Belum Mengisi Form', ref: 'GOPAY-20261017-882913', bukti: '-', masa: 's/d 31 Okt 2026 · 20:00', lastLogin: '-', loginCount: 0, berkas: { kk: false, akte: false, ijazah: false } },
            { trx: 'TRX-PPDB-093', pin: 'FORM-882914', tgl: '17 Okt 2026 10:10', ortu: 'Fauzi Rahman', wa: '6281234567894', siswa: '-', nisn: '-', nik: '-', sekolah: '-', alamat: '-', kanal: 'Cash Kasir', metode: 'Tunai / Kasir', nominal: 'Rp 250.000', pay: 'Menunggu Pembayaran', isi: 'Belum Mengisi Form', ref: '-', bukti: '-', masa: '-', lastLogin: '-', loginCount: 0, berkas: { kk: false, akte: false, ijazah: false } },
            { trx: 'TRX-PPDB-094', pin: 'FORM-882915', tgl: '16 Okt 2026 16:48', ortu: 'Imam Syafii', wa: '6281234567895', siswa: 'Fajar Ramadhan', nisn: '0051234506', nik: '3573010204490006', sekolah: 'SDN Sawojajar 4 Malang', alamat: 'Jl. Sawojajar No. 9, Kedungkandang, Kota Malang', kanal: 'VA BRI', metode: 'Virtual Account', nominal: 'Rp 250.000', pay: 'Lunas', isi: 'Formulir Selesai', ref: 'BRI-20261016-882915', bukti: 'transfer_bri_094.jpg', masa: 's/d 31 Okt 2026 · 20:00', lastLogin: '16 Okt 2026 18:05', loginCount: 2, berkas: { kk: true, akte: true, ijazah: true } },
            { trx: 'TRX-PPDB-095', pin: 'FORM-882916', tgl: '15 Okt 2026 09:00', ortu: 'Hadi Purnomo', wa: '6281234567896', siswa: '-', nisn: '-', nik: '-', sekolah: '-', alamat: '-', kanal: 'QRIS', metode: 'QRIS', nominal: 'Rp 250.000', pay: 'Kadaluarsa', isi: 'Belum Mengisi Form', ref: 'QRIS-20261015-882916', bukti: '-', masa: 'Kadaluarsa 16 Okt 2026', lastLogin: '-', loginCount: 0, berkas: { kk: false, akte: false, ijazah: false } },
            { trx: 'TRX-PPDB-096', pin: 'FORM-882917', tgl: '15 Okt 2026 08:15', ortu: 'Tono Wibowo', wa: '6281234567897', siswa: 'Hadi Santoso', nisn: '0061234508', nik: '3573010204490008', sekolah: 'SDN Gadang 1 Malang', alamat: 'Jl. Gadang No. 54, Sukun, Kota Malang', kanal: 'VA BCA', metode: 'Virtual Account', nominal: 'Rp 250.000', pay: 'Lunas', isi: 'Pengisian Sebagian', ref: 'BCA-20261015-882917', bukti: 'transfer_bca_096.jpg', masa: 's/d 31 Okt 2026 · 20:00', lastLogin: '15 Okt 2026 09:40', loginCount: 2, berkas: { kk: true, akte: false, ijazah: false } },
            { trx: 'TRX-PPDB-097', pin: 'FORM-882918', tgl: '14 Okt 2026 13:30', ortu: 'Sri Wahyuni', wa: '6281234567898', siswa: '-', nisn: '-', nik: '-', sekolah: '-', alamat: '-', kanal: 'Cash Kasir', metode: 'Tunai / Kasir', nominal: 'Rp 250.000', pay: 'Menunggu Pembayaran', isi: 'Belum Mengisi Form', ref: '-', bukti: '-', masa: '-', lastLogin: '-', loginCount: 0, berkas: { kk: false, akte: false, ijazah: false } }
        ];
        let pfLoaded = false;
        let pfCurrent = null;

        function pfRowHtml(p) {
            const bc = [p.berkas.kk, p.berkas.akte, p.berkas.ijazah].filter(Boolean).length;
            const berkasOk = bc === 3;
            return `<tr class="hover:bg-slate-50/70 pf-row" data-trx="${p.trx.toLowerCase()}" data-pin="${p.pin.toLowerCase()}" data-ortu="${p.ortu.toLowerCase()}" data-nik="${p.nik}" data-wa="${p.wa}" data-pay="${p.pay}" data-isi="${p.isi}">
                <td class="px-4 py-3"><p class="font-mono text-xs font-bold text-navy">${p.trx}</p><p class="text-[11px] text-slate-400">PIN: <span class="font-mono">${p.pin}</span></p><p class="text-[11px] text-slate-400">${p.tgl}</p></td>
                <td class="px-4 py-3"><p class="font-semibold text-slate-700">${p.ortu}</p><p class="text-[11px] text-slate-400 font-mono">+${p.wa}</p>
                    <button onclick="ppdbChatWa('${p.wa}','${p.ortu}')" class="mt-1 inline-flex items-center gap-1 text-[11px] font-bold text-emerald2 bg-emerald2/10 hover:bg-emerald2/20 px-2 py-1 rounded-lg">💬 Chat WA</button>
                </td>
                <td class="px-4 py-3">${p.siswa === '-' ? '<span class="text-xs text-slate-400 italic">Belum diisi</span>' : '<p class="font-semibold text-slate-700">' + p.siswa + '</p><p class="text-[11px] text-slate-400">' + p.sekolah + '</p>'}</td>
                <td class="px-4 py-3"><span class="text-[11px] font-bold bg-slate2 border border-slate-200 text-slate-600 px-2 py-0.5 rounded-full">${p.kanal}</span><p class="mt-1 font-semibold text-slate-700">${p.nominal}</p></td>
                <td class="px-4 py-3"><span class="text-[11px] font-bold ${pfPayBadge[p.pay]} px-2 py-0.5 rounded-full">${p.pay}</span></td>
                <td class="px-4 py-3"><span class="text-[11px] font-bold ${pfIsiBadge[p.isi]} px-2 py-0.5 rounded-full">${p.isi}</span>${p.isi !== 'Belum Mengisi Form' ? '<p class="mt-1 text-[11px] font-semibold ' + (berkasOk ? 'text-emerald2' : 'text-amber2') + '">Berkas ' + bc + '/3</p>' : ''}</td>
                <td class="px-4 py-3"><div class="flex justify-end gap-1">
                    <button title="Detail Transaksi & Berkas" onclick="openPfDrawer('${p.trx}')" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                    <button title="Kirim Ulang PIN via WA" onclick="pfResendPin('${p.trx}')" class="w-8 h-8 rounded-lg hover:bg-emerald2/10 grid place-items-center text-emerald2">📲</button>
                    <button title="Cetak Bukti / Kwitansi" onclick="pfPrintReceipt('${p.trx}')" class="w-8 h-8 rounded-lg hover:bg-slate-100 grid place-items-center text-slate-400">🖨️</button>
                </div></td>
            </tr>`;
        }

        function loadPpdbFormulir() {
            if (pfLoaded) return;
            const body = document.getElementById('pfBody');
            setTimeout(() => {
                body.innerHTML = pfData.map(pfRowHtml).join('');
                pfLoaded = true;
                bindPfEvents();
                applyPfFilter();
                showToast('success', 'Data transaksi formulir berhasil dimuat');
            }, 700);
        }

        function bindPfEvents() {
            ['pfSearch', 'pfPayFilter', 'pfIsiFilter'].forEach(id => {
                const el = document.getElementById(id);
                if (el) { el.addEventListener('input', applyPfFilter); el.addEventListener('change', applyPfFilter); }
            });
        }

        function applyPfFilter() {
            const q = (document.getElementById('pfSearch').value || '').toLowerCase();
            const pay = document.getElementById('pfPayFilter').value;
            const isi = document.getElementById('pfIsiFilter').value;
            let visible = 0;
            document.querySelectorAll('.pf-row').forEach(r => {
                const ok = (!q || r.dataset.trx.includes(q) || r.dataset.pin.includes(q) || r.dataset.ortu.includes(q) || r.dataset.nik.includes(q) || r.dataset.wa.includes(q))
                    && (!pay || r.dataset.pay === pay)
                    && (!isi || r.dataset.isi === isi);
                r.style.display = ok ? '' : 'none';
                if (ok) visible++;
            });
            document.getElementById('pfEmpty').classList.toggle('hidden', visible > 0);
            document.getElementById('pfCount').textContent = 'Menampilkan ' + visible + ' dari ' + pfData.length + ' contoh transaksi';
        }

        function renderPfTable() {
            document.getElementById('pfBody').innerHTML = pfData.map(pfRowHtml).join('');
            applyPfFilter();
        }

        function openPfDrawer(trx) {
            const p = pfData.find(x => x.trx === trx);
            if (!p) return;
            pfCurrent = p;
            document.getElementById('pfDrawerAvatar').textContent = p.ortu.split(' ').map(w => w[0]).slice(0, 2).join('').toUpperCase();
            document.getElementById('pfDrawerTitle').textContent = p.trx;
            document.getElementById('pfDrawerSub').textContent = 'PIN: ' + p.pin + ' · ' + p.tgl;
            document.getElementById('pfTime').textContent = p.tgl;
            document.getElementById('pfMetode').textContent = p.metode;
            document.getElementById('pfKanal').textContent = p.kanal;
            document.getElementById('pfNominal').textContent = p.nominal;
            document.getElementById('pfRef').textContent = p.ref;
            document.getElementById('pfBukti').textContent = p.bukti === '-' ? 'Tidak ada bukti' : ('Lihat: ' + p.bukti);
            const st = document.getElementById('pfPayStatus');
            st.textContent = p.pay;
            st.className = 'text-[11px] font-bold px-2 py-0.5 rounded-full ' + pfPayBadge[p.pay];
            document.getElementById('pfManualBox').classList.toggle('hidden', p.pay === 'Lunas');
            document.getElementById('pfPin').textContent = p.pin;
            document.getElementById('pfAkses').textContent = p.pay === 'Lunas' ? 'Aktif' : (p.pay === 'Kadaluarsa' ? 'Kadaluarsa' : 'Belum Aktif');
            document.getElementById('pfMasa').textContent = p.masa || '-';
            document.getElementById('pfLogin').textContent = p.loginCount ? (p.loginCount + '× login · terakhir ' + p.lastLogin) : 'Belum pernah login';
            document.getElementById('pfFormNote').classList.toggle('hidden', p.isi !== 'Belum Mengisi Form');
            document.getElementById('pfBioNama').textContent = p.siswa;
            document.getElementById('pfBioNisn').textContent = p.nisn;
            document.getElementById('pfBioNik').textContent = p.nik;
            document.getElementById('pfBioSekolah').textContent = p.sekolah;
            document.getElementById('pfBioAlamat').textContent = p.alamat;
            document.getElementById('pfDocList').innerHTML = pfDocNames.map(([k, n]) => {
                const ok = p.berkas[k];
                return '<div class="flex items-center justify-between bg-slate-50 border border-slate-100 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-600">' + n + '</span><span class="text-[11px] font-bold ' + (ok ? 'bg-emerald2/10 text-emerald2' : 'bg-red-100 text-red-600') + ' px-2 py-0.5 rounded-full">' + (ok ? '✓ Terunggah' : '✗ Belum / Tidak Valid') + '</span></div>';
            }).join('');
            document.querySelectorAll('input[name="pfKeputusan"]').forEach(r => r.checked = false);
            pfTab('transaksi');
            const d = document.getElementById('pfDrawer');
            d.classList.remove('hidden');
            requestAnimationFrame(() => document.getElementById('pfDrawerPanel').classList.remove('translate-x-full'));
        }

        function closePfDrawer() {
            document.getElementById('pfDrawerPanel').classList.add('translate-x-full');
            setTimeout(() => document.getElementById('pfDrawer').classList.add('hidden'), 250);
        }

        function pfTab(name) {
            document.querySelectorAll('.pf-tab-panel').forEach(pane => pane.classList.toggle('hidden', pane.id !== 'pf-tab-' + name));
            document.querySelectorAll('.pf-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
        }

        function pfMarkPaid() {
            if (!pfCurrent) return;
            pfCurrent.pay = 'Lunas';
            if (pfCurrent.metode && pfCurrent.metode.indexOf('Tunai') >= 0) { pfCurrent.ref = 'KASIR-' + pfCurrent.pin.replace('FORM-', ''); }
            if (!pfCurrent.masa || pfCurrent.masa === '-') { pfCurrent.masa = 's/d 31 Okt 2026 · 20:00'; }
            renderPfTable();
            openPfDrawer(pfCurrent.trx);
            showToast('success', 'Transaksi ditandai LUNAS · PIN ' + pfCurrent.pin + ' diterbitkan & dikirim via WA');
        }

        function pfResetPin() {
            if (!pfCurrent) return;
            const newPin = 'FORM-' + Math.floor(100000 + Math.random() * 900000);
            pfCurrent.pin = newPin;
            document.getElementById('pfPin').textContent = newPin;
            renderPfTable();
            showToast('success', 'Kode PIN baru diterbitkan: ' + newPin);
        }

        function pfCopyPin() {
            if (!pfCurrent) return;
            showToast('info', 'Kode PIN ' + pfCurrent.pin + ' disalin ke clipboard');
        }

        function pfResendPin(trx) {
            const p = pfData.find(x => x.trx === trx);
            if (!p) return;
            const text = encodeURIComponent('Halo ' + p.ortu + ', berikut Kode Formulir/PIN pendaftaran SPMB: ' + p.pin + '. Silakan login untuk melengkapi formulir.');
            window.open('https://wa.me/' + p.wa + '?text=' + text, '_blank');
            showToast('success', 'Kode PIN dikirim ulang ke WA ' + p.ortu);
        }

        function pfPrintReceipt(trx) { showToast('success', 'Kwitansi sah ' + trx + ' dikirim ke printer'); }
        function exportFormulir() { showToast('success', 'Data transaksi & pendaftar diekspor (74 baris → Excel/CSV)'); }

        function savePfDecision() {
            if (!pfCurrent) return;
            const dec = document.querySelector('input[name="pfKeputusan"]:checked');
            if (!dec) { showToast('warning', 'Pilih keputusan seleksi terlebih dahulu'); pfTab('formulir'); return; }
            const map = { lolos: '✅ Lolos / Diterima', perbaikan: '🔄 Minta Perbaikan Berkas', ditolak: '✗ Ditolak' };
            const nama = pfCurrent.siswa === '-' ? pfCurrent.ortu : pfCurrent.siswa;
            showToast('success', 'Keputusan tersimpan: ' + nama + ' → ' + map[dec.value]);
        }

        // ---------- KESISWAAN — Mutasi & Kenaikan Kelas ----------
        const mkJenisBadge = {
            'Pindah Masuk': 'bg-sky2/10 text-sky2',
            'Pindah Keluar': 'bg-amber2/15 text-amber2',
            'Naik Kelas': 'bg-emerald2/10 text-emerald2',
            'Tinggal Kelas': 'bg-red-100 text-red-600'
        };
        const mkKenaikanData = [
            { inisial: 'KF', nisn: '0071234501', nama: 'Keira Faza Aishanaya', nilai: '86,4', hadir: 97 },
            { inisial: 'BP', nisn: '0071234502', nama: 'Bagas Pratama', nilai: '79,1', hadir: 92 },
            { inisial: 'CA', nisn: '0071234503', nama: 'Citra Ayu Lestari', nilai: '88,7', hadir: 99 },
            { inisial: 'DA', nisn: '0061234504', nama: 'Dimas Anggara', nilai: '74,3', hadir: 85 },
            { inisial: 'EN', nisn: '0071234505', nama: 'Eka Nurhaliza', nilai: '81,9', hadir: 94 },
            { inisial: 'FR', nisn: '0051234506', nama: 'Fajar Ramadhan', nilai: '84,2', hadir: 96 },
            { inisial: 'GP', nisn: '0071234507', nama: 'Gita Puspita Sari', nilai: '90,1', hadir: 98 },
            { inisial: 'HS', nisn: '0061234508', nama: 'Hadi Santoso', nilai: '71,5', hadir: 78 }
        ];
        const mkSiswaAktif = [
            { nisn: '0071234501', nama: 'Keira Faza Aishanaya', kelas: '11-A' },
            { nisn: '0071234502', nama: 'Bagas Pratama', kelas: '11-A' },
            { nisn: '0071234503', nama: 'Citra Ayu Lestari', kelas: '11-B' },
            { nisn: '0061234504', nama: 'Dimas Anggara', kelas: '11-B' },
            { nisn: '0071234505', nama: 'Eka Nurhaliza', kelas: '11-A' },
            { nisn: '0051234506', nama: 'Fajar Ramadhan', kelas: '11-C' },
            { nisn: '0071234507', nama: 'Gita Puspita Sari', kelas: '11-B' },
            { nisn: '0061234508', nama: 'Hadi Santoso', kelas: '11-A' }
        ];
        let mkMasukData = [
            { nama: 'Rendra Kusuma', nisn: '0091234590', sekolahAsal: 'SMPN 5 Blitar', kelas: '10-B', surat: 'SKM-2026-112', tgl: '18 Okt 2026' },
            { nama: 'Salma Nabila', nisn: '0091234591', sekolahAsal: 'SMP Islam Sabilillah', kelas: '10-A', surat: 'SKM-2026-111', tgl: '15 Okt 2026' },
            { nama: 'Yoga Pratama', nisn: '0091234592', sekolahAsal: 'SMPN 2 Surabaya', kelas: '10-C', surat: 'SKM-2026-109', tgl: '12 Okt 2026' }
        ];
        let mkKeluarData = [
            { nama: 'Rafi Ahmad', nisn: '0061234510', sekolahTujuan: 'SMAN 3 Malang', alasan: 'Dikeluarkan / Tindak Pelanggaran', surat: 'SKP-2026-045', tgl: '17 Okt 2026' },
            { nama: 'Nadia Safira', nisn: '0071234511', sekolahTujuan: 'SMAN 1 Surabaya', alasan: 'Pindah Ikut Orang Tua', surat: 'SKP-2026-044', tgl: '14 Okt 2026' },
            { nama: 'Bayu Setiadi', nisn: '0061234512', sekolahTujuan: 'SMK Negeri 1 Malang', alasan: 'Mundur Sendiri', surat: 'SKP-2026-043', tgl: '10 Okt 2026' }
        ];
        let mkAuditData = [
            { tgl: '18 Okt 2026', nama: 'Rendra Kusuma', nisn: '0091234590', jenis: 'Pindah Masuk', kelas: '10-B (dari SMPN 5 Blitar)', surat: 'SKM-2026-112', op: 'Operator Sekolah' },
            { tgl: '17 Okt 2026', nama: 'Rafi Ahmad', nisn: '0061234510', jenis: 'Pindah Keluar', kelas: '11-A → SMAN 3 Malang', surat: 'SKP-2026-045', op: 'Operator Sekolah' },
            { tgl: '15 Okt 2026', nama: 'Salma Nabila', nisn: '0091234591', jenis: 'Pindah Masuk', kelas: '10-A (dari SMP Islam Sabilillah)', surat: 'SKM-2026-111', op: 'Operator Sekolah' },
            { tgl: '14 Okt 2026', nama: 'Nadia Safira', nisn: '0071234511', jenis: 'Pindah Keluar', kelas: '10-C → SMAN 1 Surabaya', surat: 'SKP-2026-044', op: 'Operator Sekolah' },
            { tgl: '12 Okt 2026', nama: 'Yoga Pratama', nisn: '0091234592', jenis: 'Pindah Masuk', kelas: '10-C (dari SMPN 2 Surabaya)', surat: 'SKM-2026-109', op: 'Operator Sekolah' },
            { tgl: '30 Jun 2026', nama: 'Hadi Santoso', nisn: '0061234508', jenis: 'Tinggal Kelas', kelas: '10-B → 10-B', surat: 'SK-TK-2026-002', op: 'Admin Kurikulum' },
            { tgl: '30 Jun 2026', nama: 'Keira Faza Aishanaya', nisn: '0071234501', jenis: 'Naik Kelas', kelas: '10-A → 11-A', surat: 'SK-TK-2026-001', op: 'Admin Kurikulum' }
        ];
        let mkLoaded = false;

        function mkTab(name) {
            document.querySelectorAll('.mk-tab-panel').forEach(pane => pane.classList.toggle('hidden', pane.id !== 'mk-tab-' + name));
            document.querySelectorAll('.mk-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
        }

        function loadMutasi() {
            if (mkLoaded) return;
            setTimeout(() => {
                renderKenaikan();
                renderMutasiTables();
                mkLoaded = true;
                showToast('success', 'Modul Mutasi & Kenaikan Kelas dimuat');
            }, 600);
        }

        function renderKenaikan() {
            const body = document.getElementById('mkKenaikanBody');
            body.innerHTML = mkKenaikanData.map(r => {
                const barColor = r.hadir >= 90 ? 'bg-emerald2' : r.hadir >= 80 ? 'bg-amber2' : 'bg-red-500';
                return `<tr class="hover:bg-slate-50/70 mk-row">
                    <td class="px-4 py-3"><input type="checkbox" class="matrix mk-check"></td>
                    <td class="px-4 py-3"><span class="w-9 h-9 rounded-full bg-navy/10 text-navy grid place-items-center font-heading font-bold text-xs">${r.inisial}</span></td>
                    <td class="px-4 py-3 font-mono text-xs text-slate-500">${r.nisn}</td>
                    <td class="px-4 py-3 font-semibold text-slate-700">${r.nama}</td>
                    <td class="px-4 py-3 font-semibold text-slate-600">${r.nilai}</td>
                    <td class="px-4 py-3"><div class="flex items-center gap-2"><div class="w-20 h-2 rounded-full bg-slate-100 overflow-hidden"><div class="h-full ${barColor}" style="width:${r.hadir}%"></div></div><span class="text-xs font-semibold text-slate-500">${r.hadir}%</span></div></td>
                    <td class="px-4 py-3"><div class="flex flex-wrap gap-2">
                        <label class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald2 bg-emerald2/10 px-2.5 py-1.5 rounded-lg cursor-pointer"><input type="radio" name="mk_${r.nisn}" value="naik" class="accent-emerald-600" checked> ✓ Naik Kelas</label>
                        <label class="inline-flex items-center gap-1.5 text-xs font-semibold text-red-600 bg-red-50 px-2.5 py-1.5 rounded-lg cursor-pointer"><input type="radio" name="mk_${r.nisn}" value="tinggal" class="accent-red-500"> ✗ Tinggal Kelas</label>
                    </div></td>
                </tr>`;
            }).join('');
            bindKenaikanEvents();
        }

        function bindKenaikanEvents() {
            document.querySelectorAll('.mk-check').forEach(c => c.addEventListener('change', mkUpdateCount));
            const all = document.getElementById('mkSelectAll');
            all.onchange = (e) => {
                document.querySelectorAll('.mk-check').forEach(c => { c.checked = e.target.checked; });
                mkUpdateCount();
            };
            mkUpdateCount();
        }

        function mkUpdateCount() {
            const n = document.querySelectorAll('.mk-check:checked').length;
            document.getElementById('mkJumlah').textContent = n + ' siswa dipilih';
        }

        function prosesKenaikan() {
            const n = document.querySelectorAll('.mk-check:checked').length;
            if (n === 0) { showToast('warning', 'Pilih minimal satu siswa untuk diproses'); return; }
            const asal = document.getElementById('mkKelasAsal').value;
            const tujuan = document.getElementById('mkKelasTujuan').value;
            const taAsal = document.getElementById('mkTaAsal').value;
            const taTujuan = document.getElementById('mkTaTujuan').value;
            const kunci = document.getElementById('mkKunci').checked;
            showToast('success', n + ' siswa diproses: ' + asal + ' (' + taAsal + ') → ' + tujuan + ' (' + taTujuan + ')' + (kunci ? ' · Rombel dikunci & disinkronkan' : ''));
        }

        function renderMutasiTables() {
            document.getElementById('mkMasukBody').innerHTML = mkMasukData.map(m =>
                `<tr class="hover:bg-slate-50/70"><td class="px-4 py-3 font-semibold text-slate-700">${m.nama}</td><td class="px-4 py-3 font-mono text-xs text-slate-500">${m.nisn}</td><td class="px-4 py-3 text-slate-500">${m.sekolahAsal}</td><td class="px-4 py-3"><span class="text-[11px] font-bold bg-emerald2/10 text-emerald2 px-2 py-0.5 rounded-full">${m.kelas}</span></td><td class="px-4 py-3 font-mono text-xs text-slate-500">${m.surat}</td><td class="px-4 py-3 text-slate-400 text-xs">${m.tgl}</td></tr>`
            ).join('');
            document.getElementById('mkKeluarBody').innerHTML = mkKeluarData.map(m =>
                `<tr class="hover:bg-slate-50/70"><td class="px-4 py-3 font-semibold text-slate-700">${m.nama}</td><td class="px-4 py-3 font-mono text-xs text-slate-500">${m.nisn}</td><td class="px-4 py-3 text-slate-500">${m.sekolahTujuan}</td><td class="px-4 py-3 text-xs text-slate-500">${m.alasan}</td><td class="px-4 py-3 font-mono text-xs text-slate-500">${m.surat}</td><td class="px-4 py-3 text-slate-400 text-xs">${m.tgl}</td></tr>`
            ).join('');
            renderAudit();
        }

        function renderAudit() {
            document.getElementById('mkAuditBody').innerHTML = mkAuditData.map(a =>
                `<tr class="hover:bg-slate-50/70"><td class="px-4 py-3 text-xs text-slate-400">${a.tgl}</td><td class="px-4 py-3 font-semibold text-slate-700">${a.nama}</td><td class="px-4 py-3 font-mono text-xs text-slate-500">${a.nisn}</td><td class="px-4 py-3"><span class="text-[11px] font-bold ${mkJenisBadge[a.jenis]} px-2 py-0.5 rounded-full">${a.jenis}</span></td><td class="px-4 py-3 text-xs text-slate-500">${a.kelas}</td><td class="px-4 py-3 font-mono text-xs text-slate-500">${a.surat}</td><td class="px-4 py-3 text-xs text-slate-500">${a.op}</td><td class="px-4 py-3"><div class="flex justify-end"><button onclick="cetakSurat('${a.surat}')" class="text-[11px] font-bold text-navy bg-navy/5 hover:bg-navy/10 px-2.5 py-1.5 rounded-lg">🖨️ Cetak</button></div></td></tr>`
            ).join('');
        }

        function openMkMasuk() {
            const m = document.getElementById('mkMasukModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeMkMasuk() { const m = document.getElementById('mkMasukModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function submitMutasiMasuk() {
            const nama = document.getElementById('mkMasukNama').value.trim();
            const kelas = document.getElementById('mkMasukKelas').value;
            const sekolah = document.getElementById('mkMasukSekolah').value.trim() || 'Sekolah Asal';
            const surat = document.getElementById('mkMasukSurat').value.trim() || 'SKM-2026-XXX';
            if (!nama) { showToast('warning', 'Nama calon siswa wajib diisi'); return; }
            mkMasukData.unshift({ nama: nama, nisn: '00900000' + (Math.floor(Math.random() * 90) + 10), sekolahAsal: sekolah, kelas: kelas, surat: surat, tgl: '18 Okt 2026' });
            mkAuditData.unshift({ tgl: '18 Okt 2026', nama: nama, nisn: mkMasukData[0].nisn, jenis: 'Pindah Masuk', kelas: kelas + ' (dari ' + sekolah + ')', surat: surat, op: 'Operator Sekolah' });
            closeMkMasuk();
            renderMutasiTables();
            document.getElementById('mkMasukNama').value = '';
            document.getElementById('mkMasukSekolah').value = '';
            document.getElementById('mkMasukSurat').value = '';
            showToast('success', 'Mutasi masuk ' + nama + ' tersimpan · ditempatkan di ' + kelas);
        }

        function openMkKeluar() {
            document.getElementById('mkSiswaList').innerHTML = mkSiswaAktif.map(s => '<option value="' + s.nama + ' (' + s.nisn + ')">Kelas ' + s.kelas + '</option>').join('');
            const m = document.getElementById('mkKeluarModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeMkKeluar() { const m = document.getElementById('mkKeluarModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function submitMutasiKeluar() {
            const siswa = document.getElementById('mkKeluarSiswa').value.trim();
            const tujuan = document.getElementById('mkKeluarTujuan').value.trim() || 'Sekolah Tujuan';
            const alasan = document.getElementById('mkKeluarAlasan').value;
            const kelas = document.getElementById('mkKeluarKelas').value;
            const cetak = document.getElementById('mkKeluarCetak').checked;
            if (!siswa) { showToast('warning', 'Pilih siswa aktif terlebih dahulu'); return; }
            let surat = document.getElementById('mkKeluarSurat').value.trim();
            if (!surat) { surat = 'SKP-2026-' + (Math.floor(Math.random() * 900) + 100); }
            const nama = siswa.replace(/\s*\(.*\)\s*$/, '');
            mkKeluarData.unshift({ nama: nama, nisn: '0060000000', sekolahTujuan: tujuan, alasan: alasan, surat: surat, tgl: '18 Okt 2026' });
            mkAuditData.unshift({ tgl: '18 Okt 2026', nama: nama, nisn: '0060000000', jenis: 'Pindah Keluar', kelas: kelas + ' → ' + tujuan, surat: surat, op: 'Operator Sekolah' });
            closeMkKeluar();
            renderMutasiTables();
            document.getElementById('mkKeluarSiswa').value = '';
            document.getElementById('mkKeluarTujuan').value = '';
            document.getElementById('mkKeluarSurat').value = '';
            showToast('success', 'Status ' + nama + ' → Mutasi Keluar · akun dinonaktifkan' + (cetak ? ' · surat ' + surat + ' dicetak (PDF)' : ''));
        }

        function cetakSurat(no) { showToast('success', 'Dokumen ' + no + ' dikirim ke printer (PDF)'); }

        // ---------- KESISWAAN — Proses Kelulusan & Alumni ----------
        const klTracerBadge = {
            'Melanjutkan Studi / Kuliah': 'bg-emerald2/10 text-emerald2',
            'Bekerja': 'bg-sky2/10 text-sky2',
            'Wirausaha': 'bg-amber2/15 text-amber2',
            'Belum Terdata': 'bg-slate-200 text-slate-500'
        };
        const klKelulusanData = [
            { inisial: 'KF', nisn: '0071234501', nama: 'Keira Faza Aishanaya', kelas: '12-IPA-1', nilai: '88,4', tunggakan: 'Lunas', bebas: true },
            { inisial: 'BP', nisn: '0071234502', nama: 'Bagas Pratama', kelas: '12-IPA-1', nilai: '79,1', tunggakan: 'Lunas', bebas: true },
            { inisial: 'CA', nisn: '0071234503', nama: 'Citra Ayu Lestari', kelas: '12-IPA-1', nilai: '90,2', tunggakan: 'Lunas', bebas: true },
            { inisial: 'DA', nisn: '0061234504', nama: 'Dimas Anggara', kelas: '12-IPS-1', nilai: '74,3', tunggakan: 'Belum', bebas: true },
            { inisial: 'EN', nisn: '0071234505', nama: 'Eka Nurhaliza', kelas: '12-IPS-1', nilai: '81,9', tunggakan: 'Lunas', bebas: true },
            { inisial: 'FR', nisn: '0051234506', nama: 'Fajar Ramadhan', kelas: '12-IPA-1', nilai: '84,2', tunggakan: 'Lunas', bebas: false },
            { inisial: 'GP', nisn: '0071234507', nama: 'Gita Puspita Sari', kelas: '12-IPS-1', nilai: '86,7', tunggakan: 'Lunas', bebas: true },
            { inisial: 'HS', nisn: '0061234508', nama: 'Hadi Santoso', kelas: '12-IPS-1', nilai: '71,5', tunggakan: 'Belum', bebas: false }
        ];
        let klAlumniData = [
            { nisn: '0061234508', nama: 'Hadi Santoso', jk: 'L', angkatan: '2026', wa: '6281234567801', email: 'hadi.santoso@mail.com', alamat: 'Sukun, Kota Malang', tracer: 'Bekerja', instansi: 'PT Sumber Makmur', jurusan: 'Teknisi' },
            { nisn: '0071234501', nama: 'Keira Faza Aishanaya', jk: 'P', angkatan: '2026', wa: '6281227700781', email: 'keira.faza@mail.com', alamat: 'Kedungkandang, Kota Malang', tracer: 'Melanjutkan Studi / Kuliah', instansi: 'Universitas Brawijaya', jurusan: 'Kedokteran' },
            { nisn: '0071234502', nama: 'Bagas Pratama', jk: 'L', angkatan: '2025', wa: '6281234567891', email: 'bagas.pratama@mail.com', alamat: 'Lowokwaru, Kota Malang', tracer: 'Melanjutkan Studi / Kuliah', instansi: 'Politeknik Negeri Malang', jurusan: 'Teknik Informatika' },
            { nisn: '0071234503', nama: 'Citra Ayu Lestari', jk: 'P', angkatan: '2025', wa: '6281234567892', email: 'citra.ayu@mail.com', alamat: 'Sukun, Kota Malang', tracer: 'Wirausaha', instansi: 'Citra Cake & Bakery', jurusan: 'Owner' },
            { nisn: '0061234504', nama: 'Dimas Anggara', jk: 'L', angkatan: '2024', wa: '6281234567893', email: 'dimas.anggara@mail.com', alamat: 'Kedungkandang, Kota Malang', tracer: 'Bekerja', instansi: 'PT Kereta Api Indonesia', jurusan: 'Staf Operasional' },
            { nisn: '0051234506', nama: 'Fajar Ramadhan', jk: 'L', angkatan: '2024', wa: '6281234567895', email: 'fajar.ramadhan@mail.com', alamat: 'Sawojajar, Kota Malang', tracer: 'Belum Terdata', instansi: '-', jurusan: '-' },
            { nisn: '0071234507', nama: 'Gita Puspita Sari', jk: 'P', angkatan: '2026', wa: '6281234567896', email: 'gita.puspita@mail.com', alamat: 'Mojolangu, Kota Malang', tracer: 'Melanjutkan Studi / Kuliah', instansi: 'Universitas Negeri Malang', jurusan: 'Pendidikan Bahasa Inggris' },
            { nisn: '0061234510', nama: 'Rafi Ahmad', jk: 'L', angkatan: '2025', wa: '6281234567810', email: 'rafi.ahmad@mail.com', alamat: 'Blimbing, Kota Malang', tracer: 'Bekerja', instansi: 'CV Digital Kreatif', jurusan: 'Desainer Grafis' },
            { nisn: '0071234511', nama: 'Nadia Safira', jk: 'P', angkatan: '2024', wa: '6281234567811', email: 'nadia.safira@mail.com', alamat: 'Surabaya', tracer: 'Melanjutkan Studi / Kuliah', instansi: 'Universitas Airlangga', jurusan: 'Akuntansi' }
        ];
        let klLoaded = false;
        let klTracerCurrent = null;

        function klTab(name) {
            document.querySelectorAll('.kl-tab-panel').forEach(pane => pane.classList.toggle('hidden', pane.id !== 'kl-tab-' + name));
            document.querySelectorAll('.kl-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
        }

        function loadKelulusan() {
            if (klLoaded) return;
            setTimeout(() => {
                renderKelulusan();
                renderAlumni();
                klLoaded = true;
                showToast('success', 'Modul Kelulusan & Alumni dimuat');
            }, 600);
        }

        function renderKelulusan() {
            document.getElementById('klKelulusanBody').innerHTML = klKelulusanData.map(r => {
                const cukup = parseFloat(r.nilai.replace(',', '.')) >= 70 && r.tunggakan === 'Lunas' && r.bebas;
                return `<tr class="hover:bg-slate-50/70 kl-row">
                    <td class="px-4 py-3"><input type="checkbox" class="matrix kl-check"></td>
                    <td class="px-4 py-3"><span class="w-9 h-9 rounded-full bg-navy/10 text-navy grid place-items-center font-heading font-bold text-xs">${r.inisial}</span></td>
                    <td class="px-4 py-3 font-mono text-xs text-slate-500">${r.nisn}</td>
                    <td class="px-4 py-3 font-semibold text-slate-700">${r.nama}</td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold bg-slate2 border border-slate-200 text-slate-600 px-2 py-0.5 rounded-full">${r.kelas}</span></td>
                    <td class="px-4 py-3 font-semibold text-slate-600">${r.nilai}</td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${r.tunggakan === 'Lunas' ? 'bg-emerald2/10 text-emerald2' : 'bg-red-100 text-red-600'} px-2 py-0.5 rounded-full">${r.tunggakan}</span></td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${r.bebas ? 'bg-emerald2/10 text-emerald2' : 'bg-red-100 text-red-600'} px-2 py-0.5 rounded-full">${r.bebas ? '✓ Bebas' : '✗ Ada Tunggakan'}</span></td>
                    <td class="px-4 py-3"><div class="flex flex-wrap gap-2">
                        <label class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald2 bg-emerald2/10 px-2.5 py-1.5 rounded-lg cursor-pointer"><input type="radio" name="kl_${r.nisn}" value="lulus" class="accent-emerald-600" ${cukup ? 'checked' : ''}> ✓ Lulus</label>
                        <label class="inline-flex items-center gap-1.5 text-xs font-semibold text-red-600 bg-red-50 px-2.5 py-1.5 rounded-lg cursor-pointer"><input type="radio" name="kl_${r.nisn}" value="tunda" class="accent-red-500" ${cukup ? '' : 'checked'}> ✗ Ditunda / Tidak Lulus</label>
                    </div></td>
                </tr>`;
            }).join('');
            bindKelulusanEvents();
        }

        function bindKelulusanEvents() {
            document.querySelectorAll('.kl-check').forEach(c => c.addEventListener('change', klUpdateCount));
            const all = document.getElementById('klSelectAll');
            all.onchange = (e) => { document.querySelectorAll('.kl-check').forEach(c => { c.checked = e.target.checked; }); klUpdateCount(); };
            klUpdateCount();
        }

        function klUpdateCount() {
            const n = document.querySelectorAll('.kl-check:checked').length;
            document.getElementById('klJumlah').textContent = n + ' siswa dipilih';
        }

        function prosesKelulusan() {
            const n = document.querySelectorAll('.kl-check:checked').length;
            if (n === 0) { showToast('warning', 'Pilih minimal satu siswa untuk diproses'); return; }
            const ta = document.getElementById('klTa').value;
            const sync = document.getElementById('klAlumniSync').checked;
            showToast('success', n + ' keputusan kelulusan dikunci · TA ' + ta + ' · SKL digenerate' + (sync ? ' · status → Alumni & WA notifikasi terkirim' : ''));
        }

        function openKlCetak() { const m = document.getElementById('klCetakModal'); m.classList.remove('hidden'); m.classList.add('flex'); }
        function closeKlCetak() { const m = document.getElementById('klCetakModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function prosesCetak() {
            const skl = document.getElementById('klOptSkl').checked;
            const tr = document.getElementById('klOptTranskrip').checked;
            closeKlCetak();
            showToast('success', 'Dokumen diproses: ' + (skl ? 'SKL Massal' : '') + (skl && tr ? ' + ' : '') + (tr ? 'Transkrip Nilai' : ''));
        }

        function renderAlumni() {
            const q = (document.getElementById('klSearch').value || '').toLowerCase();
            const ang = document.getElementById('klAngkatan').value;
            const tr = document.getElementById('klTracerFilter').value;
            const rows = klAlumniData.filter(a =>
                (!q || a.nama.toLowerCase().includes(q) || a.nisn.includes(q) || a.wa.includes(q) || a.email.toLowerCase().includes(q))
                && (!ang || a.angkatan === ang) && (!tr || a.tracer === tr));
            document.getElementById('klAlumniEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('klAlumniCount').textContent = 'Menampilkan ' + rows.length + ' dari ' + klAlumniData.length + ' alumni';
            document.getElementById('klAlumniBody').innerHTML = rows.map(a => {
                const init = a.nama.split(' ').map(w => w[0]).slice(0, 2).join('').toUpperCase();
                return `<tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3 font-mono text-xs text-slate-500">${a.nisn}</td>
                    <td class="px-4 py-3"><div class="flex items-center gap-2"><span class="w-8 h-8 rounded-full bg-navy/10 text-navy grid place-items-center font-bold text-[10px] flex-shrink-0">${init}</span><span class="font-semibold text-slate-700">${a.nama}</span></div></td>
                    <td class="px-4 py-3 text-slate-500">${a.jk}</td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">${a.angkatan}</span></td>
                    <td class="px-4 py-3"><p class="text-xs text-slate-500 font-mono">+${a.wa}</p><p class="text-[11px] text-slate-400">${a.email}</p><p class="text-[11px] text-slate-400">${a.alamat}</p></td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${klTracerBadge[a.tracer]} px-2 py-0.5 rounded-full">${a.tracer}</span><p class="mt-1 text-xs font-semibold text-slate-600">${a.instansi}</p><p class="text-[11px] text-slate-400">${a.jurusan}</p></td>
                    <td class="px-4 py-3"><div class="flex flex-wrap gap-1">
                        <button onclick="klVault('Ijazah','${a.nama}')" class="text-[10px] font-bold text-navy bg-navy/5 hover:bg-navy/10 px-2 py-1 rounded-lg">🎓 Ijazah</button>
                        <button onclick="klVault('Transkrip','${a.nama}')" class="text-[10px] font-bold text-sky2 bg-sky2/10 hover:bg-sky2/20 px-2 py-1 rounded-lg">📄 Transkrip</button>
                        <button onclick="klVault('SKL','${a.nama}')" class="text-[10px] font-bold text-emerald2 bg-emerald2/10 hover:bg-emerald2/20 px-2 py-1 rounded-lg">📜 SKL</button>
                    </div></td>
                    <td class="px-4 py-3"><div class="flex justify-end gap-1">
                        <button title="Detail Profil" onclick="openKlProfil('${a.nisn}')" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                        <button title="Update Tracer" onclick="openKlTracer('${a.nisn}')" class="w-8 h-8 rounded-lg hover:bg-amber2/10 grid place-items-center text-amber2">✏️</button>
                        <button title="Broadcast" onclick="klBroadcast('${a.nama}')" class="w-8 h-8 rounded-lg hover:bg-emerald2/10 grid place-items-center text-emerald2">📲</button>
                        <button title="Cetak Legger" onclick="klLegger('${a.nama}')" class="w-8 h-8 rounded-lg hover:bg-slate-100 grid place-items-center text-slate-400">🖨️</button>
                    </div></td>
                </tr>`;
            }).join('');
        }

        ['klSearch', 'klAngkatan', 'klTracerFilter'].forEach(id => {
            const el = document.getElementById(id);
            if (el) { el.addEventListener('input', renderAlumni); el.addEventListener('change', renderAlumni); }
        });

        function openKlTracer(nisn) {
            const a = klAlumniData.find(x => x.nisn === nisn);
            if (!a) return;
            klTracerCurrent = a;
            document.getElementById('klTracerNama').textContent = a.nama + ' · NISN ' + a.nisn;
            document.getElementById('klTracerStatus').value = a.tracer;
            document.getElementById('klTracerInstansi').value = a.instansi === '-' ? '' : a.instansi;
            document.getElementById('klTracerJurusan').value = a.jurusan === '-' ? '' : a.jurusan;
            const m = document.getElementById('klTracerModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeKlTracer() { const m = document.getElementById('klTracerModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function submitTracer() {
            if (!klTracerCurrent) return;
            klTracerCurrent.tracer = document.getElementById('klTracerStatus').value;
            klTracerCurrent.instansi = document.getElementById('klTracerInstansi').value.trim() || '-';
            klTracerCurrent.jurusan = document.getElementById('klTracerJurusan').value.trim() || '-';
            closeKlTracer();
            renderAlumni();
            showToast('success', 'Data tracer study ' + klTracerCurrent.nama + ' diperbarui');
        }

        function openKlProfil(nisn) {
            const a = klAlumniData.find(x => x.nisn === nisn);
            if (!a) return;
            document.getElementById('klProfilAvatar').textContent = a.nama.split(' ').map(w => w[0]).slice(0, 2).join('').toUpperCase();
            document.getElementById('klProfilNama').textContent = a.nama;
            document.getElementById('klProfilSub').textContent = 'NISN ' + a.nisn + ' · Lulusan ' + a.angkatan;
            document.getElementById('klProfilLulus').textContent = 'Lulusan tahun ' + a.angkatan + ' · SKL & ijazah diterbitkan';
            document.getElementById('klProfilTracer').textContent = a.tracer + (a.instansi !== '-' ? ' · ' + a.instansi : '');
            const m = document.getElementById('klProfilModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeKlProfil() { const m = document.getElementById('klProfilModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function klVault(doc, nama) { showToast('info', 'Membuka arsip digital ' + doc + ' milik ' + nama + ' (simulasi)'); }
        function klBroadcast(nama) { showToast('success', 'Pesan & kuesioner tracer dikirim ke ' + nama + ' via WA/Email'); }
        function klLegger(nama) { showToast('success', 'Legger nilai ' + nama + ' dikirim ke printer'); }

        // ---------- KESISWAAN — Laporan Kehadiran Siswa ----------
        const khRekapData = [
            { inisial: 'KF', nisn: '0071234501', nama: 'Keira Faza Aishanaya', kelas: '10-A', wali: 'Rina, M.Pd.', h: 18, s: 1, i: 1, a: 0, t: 0 },
            { inisial: 'BP', nisn: '0071234502', nama: 'Bagas Pratama', kelas: '10-A', wali: 'Rina, M.Pd.', h: 16, s: 1, i: 1, a: 2, t: 1 },
            { inisial: 'CA', nisn: '0071234503', nama: 'Citra Ayu Lestari', kelas: '10-A', wali: 'Rina, M.Pd.', h: 19, s: 0, i: 1, a: 0, t: 0 },
            { inisial: 'DA', nisn: '0061234504', nama: 'Dimas Anggara', kelas: '10-B', wali: 'Dwi, S.Pd.', h: 14, s: 1, i: 1, a: 4, t: 2 },
            { inisial: 'EN', nisn: '0071234505', nama: 'Eka Nurhaliza', kelas: '10-B', wali: 'Dwi, S.Pd.', h: 17, s: 2, i: 0, a: 1, t: 0 },
            { inisial: 'FR', nisn: '0051234506', nama: 'Fajar Ramadhan', kelas: '10-B', wali: 'Dwi, S.Pd.', h: 16, s: 0, i: 1, a: 3, t: 0 },
            { inisial: 'GP', nisn: '0071234507', nama: 'Gita Puspita Sari', kelas: '10-C', wali: 'Sari, S.Kom.', h: 19, s: 0, i: 0, a: 0, t: 1 },
            { inisial: 'HS', nisn: '0061234508', nama: 'Hadi Santoso', kelas: '10-C', wali: 'Sari, S.Kom.', h: 15, s: 1, i: 0, a: 5, t: 1 }
        ];
        const khTrend = [94, 96, 93, 95, 97, 92, 90, 94, 96, 95, 93, 91, 89, 92, 95, 96, 94, 97, 95, 93];
        const khCodeSet = ['H', 'H', 'H', 'H', 'H', 'H', 'H', 'H', 'H', 'H', 'H', 'S', 'I', 'T', 'A'];
        const khCellColor = { H: 'bg-emerald2/15 text-emerald2', S: 'bg-sky2/15 text-sky2', I: 'bg-amber2/20 text-amber-700', A: 'bg-red-100 text-red-600', T: 'bg-orange-100 text-orange-600' };
        const khBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        let khLoaded = false;

        function khCodeFor(si, day) { return khCodeSet[(si * 5 + day * 3) % khCodeSet.length]; }
        function khPersen(r) { return Math.round((r.h / (r.h + r.s + r.i + r.a)) * 1000) / 10; }
        function khStatus(r) {
            if (r.a <= 0) return ['Aman', 'bg-emerald2/10 text-emerald2'];
            if (r.a <= 2) return ['Peringatan I', 'bg-amber2/15 text-amber2'];
            if (r.a <= 3) return ['Peringatan II', 'bg-orange-100 text-orange-600'];
            return ['Kritis', 'bg-red-100 text-red-600'];
        }

        function loadKehadiran() {
            if (khLoaded) return;
            setTimeout(() => {
                renderKhStats();
                renderKhLineChart();
                renderKhDonut();
                renderKhRekap();
                renderKhMatrix();
                khLoaded = true;
                showToast('success', 'Laporan kehadiran dimuat');
            }, 600);
        }

        function renderKhStats() {
            const sum = (k) => khRekapData.reduce((a, r) => a + r[k], 0);
            const avg = Math.round(khRekapData.reduce((a, r) => a + khPersen(r), 0) / khRekapData.length * 10) / 10;
            const kritis = khRekapData.filter(r => r.a > 3).length;
            document.getElementById('khStatPersen').textContent = String(avg).replace('.', ',') + '%';
            document.getElementById('khStatSI').textContent = (sum('s') + sum('i'));
            document.getElementById('khStatAlpa').textContent = sum('a');
            document.getElementById('khStatKritis').textContent = kritis;
        }

        function renderKhLineChart() {
            const W = 600, Hh = 200, padL = 30, padR = 12, padT = 14, padB = 24, max = 100, min = 80;
            const iw = W - padL - padR, ih = Hh - padT - padB;
            const step = iw / (khTrend.length - 1);
            const pts = khTrend.map((v, i) => [padL + i * step, padT + ih - ((v - min) / (max - min)) * ih]);
            const poly = pts.map(p => p[0].toFixed(1) + ',' + p[1].toFixed(1)).join(' ');
            const yBottom = padT + ih;
            const area = 'M' + pts[0][0].toFixed(1) + ',' + yBottom + ' L' + pts.map(p => p[0].toFixed(1) + ',' + p[1].toFixed(1)).join(' L') + ' L' + pts[pts.length - 1][0].toFixed(1) + ',' + yBottom + ' Z';
            let grid = '';
            [80, 85, 90, 95, 100].forEach(g => {
                const y = padT + ih - ((g - min) / (max - min)) * ih;
                grid += `<line x1="${padL}" y1="${y.toFixed(1)}" x2="${W - padR}" y2="${y.toFixed(1)}" stroke="#E2E8F0" stroke-width="1"/><text x="4" y="${(y + 3).toFixed(1)}" font-size="9" fill="#94A3B8">${g}</text>`;
            });
            const dots = pts.map(p => `<circle cx="${p[0].toFixed(1)}" cy="${p[1].toFixed(1)}" r="2.6" fill="#fff" stroke="#1E40AF" stroke-width="2"/>`).join('');
            document.getElementById('khLineChart').innerHTML =
                `<svg viewBox="0 0 ${W} ${Hh}" class="w-full h-56" preserveAspectRatio="none">
                    <defs><linearGradient id="khGrad" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#1E40AF" stop-opacity="0.25"/><stop offset="100%" stop-color="#1E40AF" stop-opacity="0"/></linearGradient></defs>
                    ${grid}
                    <path d="${area}" fill="url(#khGrad)"/>
                    <polyline points="${poly}" fill="none" stroke="#1E40AF" stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round"/>
                    ${dots}
                </svg>`;
        }

        function renderKhDonut() {
            const sum = (k) => khRekapData.reduce((a, r) => a + r[k], 0);
            const seg = [['Hadir', sum('h'), '#10B981'], ['Sakit', sum('s'), '#0284C7'], ['Izin', sum('i'), '#F59E0B'], ['Alpa', sum('a'), '#EF4444'], ['Terlambat', sum('t'), '#F97316']];
            const total = seg.reduce((a, s) => a + s[1], 0);
            let acc = 0;
            const parts = seg.map(s => { const from = acc / total * 100; acc += s[1]; const to = acc / total * 100; return `${s[2]} ${from.toFixed(2)}% ${to.toFixed(2)}%`; });
            document.getElementById('khDonut').style.background = 'conic-gradient(' + parts.join(', ') + ')';
            document.getElementById('khDonutCenter').textContent = Math.round(sum('h') / total * 100) + '%';
            document.getElementById('khDonutLegend').innerHTML = seg.map(s => `<div class="flex items-center justify-between"><span class="flex items-center gap-2 text-slate-500 font-semibold"><span class="w-2.5 h-2.5 rounded-full" style="background:${s[2]}"></span>${s[0]}</span><span class="font-bold text-slate-700">${s[1]}</span></div>`).join('');
        }

        function renderKhRekap() {
            const rombel = document.getElementById('khRombel').value;
            const rows = khRekapData.filter(r => !rombel || r.kelas === rombel || r.kelas.startsWith(rombel + '-'));
            document.getElementById('khRekapEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('khRekapBody').innerHTML = rows.map(r => {
                const [label, cls] = khStatus(r);
                const pct = khPersen(r);
                const barColor = pct >= 90 ? 'bg-emerald2' : pct >= 80 ? 'bg-amber2' : 'bg-red-500';
                return `<tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3"><div class="flex items-center gap-3"><span class="w-9 h-9 rounded-full bg-navy/10 text-navy grid place-items-center font-heading font-bold text-xs flex-shrink-0">${r.inisial}</span><div><p class="font-semibold text-slate-700">${r.nama}</p><p class="text-[11px] text-slate-400 font-mono">${r.nisn} · ${r.kelas} · ${r.wali}</p></div></div></td>
                    <td class="px-3 py-3 text-center font-bold text-emerald2">${r.h}</td>
                    <td class="px-3 py-3 text-center font-bold text-sky2">${r.s}</td>
                    <td class="px-3 py-3 text-center font-bold text-amber2">${r.i}</td>
                    <td class="px-3 py-3 text-center font-bold text-red-500">${r.a}</td>
                    <td class="px-3 py-3 text-center font-bold text-orange-500">${r.t}</td>
                    <td class="px-4 py-3"><div class="flex items-center gap-2"><div class="w-20 h-2 rounded-full bg-slate-100 overflow-hidden"><div class="h-full ${barColor}" style="width:${pct}%"></div></div><span class="text-xs font-bold text-slate-600">${String(pct).replace('.', ',')}%</span></div></td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${cls} px-2 py-0.5 rounded-full">${label}</span></td>
                    <td class="px-4 py-3"><div class="flex justify-end gap-1">
                        <button title="Detail Log Presensi" onclick="openKhLog('${r.nisn}')" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                        <button title="Rujuk ke BK" onclick="khRujukBk('${r.nama}')" class="w-8 h-8 rounded-lg hover:bg-sky2/10 grid place-items-center text-sky2">💬</button>
                        <button title="Kirim Peringatan WA" onclick="khWaPeringatan('${r.nama}')" class="w-8 h-8 rounded-lg hover:bg-emerald2/10 grid place-items-center text-emerald2">📲</button>
                    </div></td>
                </tr>`;
            }).join('');
        }

        function renderKhMatrix() {
            let head = '<tr><th class="px-3 py-2 text-left sticky left-0 bg-slate-50 z-10">Nama Siswa</th>';
            for (let d = 1; d <= 31; d++) { head += '<th class="px-1 py-2 text-center">' + d + '</th>'; }
            head += '</tr>';
            document.getElementById('khMatrixHead').innerHTML = head;
            document.getElementById('khMatrixBody').innerHTML = khRekapData.map((r, si) => {
                let tds = `<td class="px-3 py-2 sticky left-0 bg-white z-10 whitespace-nowrap"><p class="font-semibold text-slate-700 text-xs">${r.nama}</p><p class="text-[10px] text-slate-400">${r.kelas}</p></td>`;
                for (let d = 1; d <= 31; d++) {
                    const c = khCodeFor(si, d);
                    tds += `<td class="px-0.5 py-2 text-center"><span class="inline-grid place-items-center w-6 h-6 rounded-md text-[10px] font-bold ${khCellColor[c]}">${c}</span></td>`;
                }
                return `<tr class="hover:bg-slate-50/50">${tds}</tr>`;
            }).join('');
        }

        function khSetMode(mode) {
            document.querySelectorAll('.kh-mode-btn').forEach(b => b.classList.toggle('active', b.dataset.mode === mode));
            document.getElementById('khRekapView').classList.toggle('hidden', mode !== 'siswa');
            document.getElementById('khMatrixView').classList.toggle('hidden', mode !== 'matriks');
        }

        function openKhLog(nisn) {
            const si = khRekapData.findIndex(r => r.nisn === nisn);
            if (si < 0) return;
            const r = khRekapData[si];
            const items = [];
            for (let d = 1; d <= 31; d++) { const c = khCodeFor(si, d); if (c !== 'H') items.push({ d: d, c: c }); }
            document.getElementById('khLogNama').textContent = r.nama;
            document.getElementById('khLogSub').textContent = 'NISN ' + r.nisn + ' · ' + r.kelas + ' · ' + items.length + ' hari tidak hadir';
            const nm = { S: 'Sakit', I: 'Izin', A: 'Alpa', T: 'Terlambat' };
            document.getElementById('khLogList').innerHTML = items.length ? items.map(it =>
                `<div class="flex items-center justify-between bg-slate-50 border border-slate-100 rounded-xl px-3 py-2.5"><span class="text-sm font-semibold text-slate-600">${it.d} Oktober 2026</span><span class="text-[11px] font-bold ${khCellColor[it.c]} px-2 py-0.5 rounded-full">${it.c} · ${nm[it.c]}</span></div>`
            ).join('') : '<p class="text-sm text-slate-400 text-center py-6">Tidak ada catatan ketidakhadiran pada periode ini.</p>';
            const m = document.getElementById('khLogModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeKhLog() { const m = document.getElementById('khLogModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function khRujukBk(nama) { showToast('success', 'Rekomendasi pembinaan ' + nama + ' dikirim ke Portal E-BK'); }
        function khWaPeringatan(nama) { showToast('success', 'Rekap ketidakhadiran dikirim ke WA orang tua ' + nama); }
        function generateLaporan() {
            const p = document.getElementById('khPeriode').value;
            const rb = document.getElementById('khRombel').value || 'Semua Kelas';
            renderKhRekap();
            showToast('info', 'Laporan ' + p + ' · ' + rb + ' berhasil digenerate');
        }
        function exportLaporan(fmt) { showToast('success', 'Laporan kehadiran diekspor (' + fmt + ')'); }

        // ---------- KESISWAAN — Tata Tertib Digital ----------
        const ttPelanggaranMaster = [
            { kat: 'Kehadiran & Keterlambatan', kode: 'PLG-001', desc: 'Terlambat masuk sekolah > 15 menit', poin: 5, sanksi: 'Teguran & catat piket' },
            { kat: 'Kehadiran & Keterlambatan', kode: 'PLG-002', desc: 'Tidak masuk tanpa keterangan (alpa)', poin: 10, sanksi: 'Panggilan wali kelas' },
            { kat: 'Pakaian & Kerapian', kode: 'PLG-003', desc: 'Atribut seragam tidak lengkap', poin: 5, sanksi: 'Teguran lisan' },
            { kat: 'Pakaian & Kerapian', kode: 'PLG-004', desc: 'Rambut panjang / tidak rapi', poin: 5, sanksi: 'Teguran lisan & potong rapi' },
            { kat: 'Sikap & Perilaku', kode: 'PLG-005', desc: 'Menggunakan HP saat KBM', poin: 10, sanksi: 'Penyitaan sementara & catat' },
            { kat: 'Sikap & Perilaku', kode: 'PLG-006', desc: 'Membully / mengganggu teman', poin: 25, sanksi: 'SP + rujuk BK' },
            { kat: 'Pelanggaran Berat / Kriminal', kode: 'PLG-007', desc: 'Merokok di lingkungan sekolah', poin: 50, sanksi: 'SP 2 + skorsing sementara' },
            { kat: 'Pelanggaran Berat / Kriminal', kode: 'PLG-008', desc: 'Berkelahi / tawuran', poin: 100, sanksi: 'SP 3 / pengembalian ke orang tua' }
        ];
        const ttPrestasiMaster = [
            { kat: 'Akademik', kode: 'PRS-001', desc: 'Juara 1 Olimpiade Sains Tingkat Kabupaten', poin: 20, sanksi: 'Sertifikat & beasiswa' },
            { kat: 'Akademik', kode: 'PRS-002', desc: 'Nilai tertinggi UTS tingkat kelas', poin: 10, sanksi: 'Piagam penghargaan' },
            { kat: 'Non-Akademik / Olahraga / Seni', kode: 'PRS-003', desc: 'Juara 2 Futsal Tingkat Kabupaten', poin: 15, sanksi: 'Medali & piagam' },
            { kat: 'Non-Akademik / Olahraga / Seni', kode: 'PRS-004', desc: 'Juara 1 Lomba Tari Tingkat Provinsi', poin: 20, sanksi: 'Piala & piagam' },
            { kat: 'Keagamaan / Tahfidz', kode: 'PRS-005', desc: 'Lulus Juz 30 (Tahfidz)', poin: 15, sanksi: 'Sertifikat tahfidz' },
            { kat: 'Keagamaan / Tahfidz', kode: 'PRS-006', desc: 'Juara MTQ Tingkat Kecamatan', poin: 15, sanksi: 'Piagam penghargaan' },
            { kat: 'Organisasi / OSIS', kode: 'PRS-007', desc: 'Ketua OSIS periode aktif', poin: 10, sanksi: 'SK kepengurusan' },
            { kat: 'Organisasi / OSIS', kode: 'PRS-008', desc: 'Kontribusi kepanitiaan besar', poin: 5, sanksi: 'Piagam kontribusi' }
        ];
        const ttThresholds = [
            { poin: 25, aksi: 'Teguran Lisan / Peringatan Wali Kelas', warna: 'emerald' },
            { poin: 50, aksi: 'Surat Peringatan I (SP 1) + Pemanggilan Orang Tua I', warna: 'sky' },
            { poin: 75, aksi: 'Surat Peringatan II (SP 2) + Skorsing Sementara + Rujukan E-BK', warna: 'amber' },
            { poin: 100, aksi: 'Surat Peringatan III (SP 3) / Pengembalian ke Orang Tua (Drop Out)', warna: 'red' }
        ];
        let ttLogData = [
            { id: 1, tgl: '18 Okt 2026', waktu: '07:22', inisial: 'BP', nama: 'Bagas Pratama', nisn: '0071234502', kelas: '10-A', tipe: 'Pelanggaran', kode: 'PLG-001', desc: 'Terlambat masuk sekolah > 15 menit', poin: 5, pelapor: 'Ibu Rina, M.Pd.', status: 'Selesai', lampiran: false },
            { id: 2, tgl: '18 Okt 2026', waktu: '09:45', inisial: 'DA', nama: 'Dimas Anggara', nisn: '0061234504', kelas: '10-B', tipe: 'Pelanggaran', kode: 'PLG-006', desc: 'Membully / mengganggu teman', poin: 25, pelapor: 'Pak Andi (BK)', status: 'Perlu Pemanggilan Ortu', lampiran: true },
            { id: 3, tgl: '17 Okt 2026', waktu: '10:10', inisial: 'KF', nama: 'Keira Faza Aishanaya', nisn: '0071234501', kelas: '10-A', tipe: 'Prestasi', kode: 'PRS-001', desc: 'Juara 1 Olimpiade Sains Tingkat Kabupaten', poin: -20, pelapor: 'Ibu Sari, S.Kom.', status: 'Selesai', lampiran: false },
            { id: 4, tgl: '17 Okt 2026', waktu: '13:05', inisial: 'FR', nama: 'Fajar Ramadhan', nisn: '0051234506', kelas: '10-B', tipe: 'Pelanggaran', kode: 'PLG-005', desc: 'Menggunakan HP saat KBM', poin: 10, pelapor: 'Pak Budi', status: 'Dalam Pembinaan BK', lampiran: false },
            { id: 5, tgl: '16 Okt 2026', waktu: '08:30', inisial: 'CA', nama: 'Citra Ayu Lestari', nisn: '0071234503', kelas: '10-A', tipe: 'Prestasi', kode: 'PRS-004', desc: 'Juara 1 Lomba Tari Tingkat Provinsi', poin: -20, pelapor: 'Ibu Sari, S.Kom.', status: 'Selesai', lampiran: false },
            { id: 6, tgl: '16 Okt 2026', waktu: '11:15', inisial: 'HS', nama: 'Hadi Santoso', nisn: '0061234508', kelas: '10-C', tipe: 'Pelanggaran', kode: 'PLG-007', desc: 'Merokok di lingkungan sekolah', poin: 50, pelapor: 'Pak Andi (BK)', status: 'Surat Terbit', lampiran: true },
            { id: 7, tgl: '15 Okt 2026', waktu: '07:10', inisial: 'EN', nama: 'Eka Nurhaliza', nisn: '0071234505', kelas: '10-B', tipe: 'Pelanggaran', kode: 'PLG-003', desc: 'Atribut seragam tidak lengkap', poin: 5, pelapor: 'Ibu Dwi, S.Pd.', status: 'Selesai', lampiran: false },
            { id: 8, tgl: '15 Okt 2026', waktu: '14:20', inisial: 'GP', nama: 'Gita Puspita Sari', nisn: '0071234507', kelas: '10-C', tipe: 'Prestasi', kode: 'PRS-005', desc: 'Lulus Juz 30 (Tahfidz)', poin: -15, pelapor: 'Ust. Fauzan', status: 'Selesai', lampiran: false },
            { id: 9, tgl: '14 Okt 2026', waktu: '09:00', inisial: 'YP', nama: 'Yoga Pratama', nisn: '0091234592', kelas: '10-C', tipe: 'Pelanggaran', kode: 'PLG-008', desc: 'Berkelahi / tawuran', poin: 100, pelapor: 'Pak Andi (BK)', status: 'Diproses BK', lampiran: true }
        ];
        const ttLeaderPrestasi = [
            { nama: 'Keira Faza Aishanaya', kelas: '10-A', poin: 45 },
            { nama: 'Citra Ayu Lestari', kelas: '10-A', poin: 35 },
            { nama: 'Gita Puspita Sari', kelas: '10-C', poin: 30 },
            { nama: 'Salma Nabila', kelas: '10-B', poin: 20 },
            { nama: 'Eka Nurhaliza', kelas: '10-B', poin: 15 }
        ];
        const ttLeaderPelanggaran = [
            { nama: 'Hadi Santoso', kelas: '10-C', poin: 75 },
            { nama: 'Dimas Anggara', kelas: '10-B', poin: 55 },
            { nama: 'Yoga Pratama', kelas: '10-C', poin: 30 },
            { nama: 'Fajar Ramadhan', kelas: '10-B', poin: 25 },
            { nama: 'Bagas Pratama', kelas: '10-A', poin: 15 }
        ];
        const ttStatusBadge = {
            'Selesai': 'bg-emerald2/10 text-emerald2',
            'Dalam Pembinaan BK': 'bg-amber2/15 text-amber2',
            'Perlu Pemanggilan Ortu': 'bg-red-100 text-red-600',
            'Diproses BK': 'bg-sky2/10 text-sky2',
            'Surat Terbit': 'bg-navy/10 text-navy'
        };
        const ttThColor = { emerald: 'border-emerald2/30 bg-emerald2/5 text-emerald2', sky: 'border-sky2/30 bg-sky2/5 text-sky2', amber: 'border-amber2/30 bg-amber2/5 text-amber2', red: 'border-red-200 bg-red-50 text-red-600' };
        let ttLoaded = false;
        let ttNextId = 100;

        function ttTab(name) {
            document.querySelectorAll('.tt-tab-panel').forEach(pane => pane.classList.toggle('hidden', pane.id !== 'tt-tab-' + name));
            document.querySelectorAll('.tt-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
        }

        function loadTatib() {
            if (ttLoaded) return;
            renderTtMaster();
            renderTtThresholds();
            setTimeout(() => { renderTtLog(); renderTtAnalitik(); ttLoaded = true; showToast('success', 'Modul Tata Tertib dimuat'); }, 500);
        }

        function ttGroupRender(master, tbodyId, color, label) {
            const cats = [...new Set(master.map(m => m.kat))];
            document.getElementById(tbodyId).innerHTML = cats.map(cat => {
                const head = `<tr class="bg-slate-50/80"><td colspan="4" class="px-4 py-2 text-[11px] font-bold text-slate-500 uppercase tracking-wider">${cat}</td></tr>`;
                const rows = master.filter(m => m.kat === cat).map(m =>
                    `<tr class="hover:bg-slate-50/60"><td class="px-4 py-3 font-mono text-xs font-bold text-navy">${m.kode}</td><td class="px-4 py-3 text-slate-600">${m.desc}</td><td class="px-4 py-3"><span class="text-xs font-bold ${color}">+${m.poin} ${label}</span></td><td class="px-4 py-3 text-xs text-slate-500">${m.sanksi}</td></tr>`
                ).join('');
                return head + rows;
            }).join('');
        }

        function renderTtMaster() {
            ttGroupRender(ttPelanggaranMaster, 'ttPelanggaranBody', 'text-red-500', 'Poin Pelanggaran');
            ttGroupRender(ttPrestasiMaster, 'ttPrestasiBody', 'text-emerald2', 'Poin Prestasi');
        }

        function renderTtThresholds() {
            document.getElementById('ttThresholdGrid').innerHTML = ttThresholds.map(t =>
                `<div class="rounded-2xl border ${ttThColor[t.warna]} p-4">
                    <p class="font-heading font-extrabold text-2xl">${t.poin} Poin</p>
                    <p class="mt-1 text-xs font-semibold leading-relaxed text-slate-600">${t.aksi}</p>
                </div>`
            ).join('');
        }

        function renderTtLog() {
            const q = (document.getElementById('ttSearch').value || '').toLowerCase();
            const tipe = document.getElementById('ttFilterTipe').value;
            const status = document.getElementById('ttFilterStatus').value;
            const rows = ttLogData.filter(p =>
                (!q || p.nama.toLowerCase().includes(q) || p.nisn.includes(q) || p.kelas.toLowerCase().includes(q))
                && (!tipe || p.tipe === tipe) && (!status || p.status === status));
            document.getElementById('ttLogEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('ttLogBody').innerHTML = rows.map(p => {
                const neg = p.poin < 0;
                return `<tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3"><p class="text-xs font-semibold text-slate-600">${p.tgl}</p><p class="text-[11px] text-slate-400">${p.waktu}</p></td>
                    <td class="px-4 py-3"><div class="flex items-center gap-3"><span class="w-9 h-9 rounded-full bg-navy/10 text-navy grid place-items-center font-heading font-bold text-xs flex-shrink-0">${p.inisial}</span><div><p class="font-semibold text-slate-700">${p.nama}</p><p class="text-[11px] text-slate-400 font-mono">${p.nisn} · ${p.kelas}</p></div></div></td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${p.tipe === 'Pelanggaran' ? 'text-red-600 bg-red-50' : 'text-emerald2 bg-emerald2/10'} px-2 py-0.5 rounded-full">${p.tipe}</span><p class="mt-1 text-xs text-slate-500">${p.desc}</p><p class="text-[11px] text-slate-400 font-mono">${p.kode}</p></td>
                    <td class="px-4 py-3"><span class="text-sm font-extrabold ${neg ? 'text-emerald2' : 'text-red-500'}">${neg ? '' : '+'}${p.poin}</span><p class="text-[10px] text-slate-400">${neg ? 'Apresiasi' : 'Pelanggaran'}</p></td>
                    <td class="px-4 py-3 text-xs text-slate-500">${p.pelapor}</td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${ttStatusBadge[p.status]} px-2 py-0.5 rounded-full">${p.status}</span></td>
                    <td class="px-4 py-3"><div class="flex justify-end gap-1">
                        <button title="Detail Kejadian" onclick="openTtDetail(${p.id})" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                        <button title="Rujuk ke E-BK" onclick="ttRujukBk('${p.nama}')" class="w-8 h-8 rounded-lg hover:bg-sky2/10 grid place-items-center text-sky2">💬</button>
                        <button title="Send WA Alert" onclick="ttWaAlert('${p.nama}')" class="w-8 h-8 rounded-lg hover:bg-emerald2/10 grid place-items-center text-emerald2">📲</button>
                    </div></td>
                </tr>`;
            }).join('');
        }

        ['ttSearch', 'ttFilterTipe', 'ttFilterStatus'].forEach(id => {
            const el = document.getElementById(id);
            if (el) { el.addEventListener('input', renderTtLog); el.addEventListener('change', renderTtLog); }
        });

        function renderTtAnalitik() {
            const pel = ttLogData.filter(p => p.tipe === 'Pelanggaran').length;
            const sp = ttLeaderPelanggaran.filter(l => l.poin >= 25).length;
            const pre = ttLogData.filter(p => p.tipe === 'Prestasi').reduce((a, p) => a + Math.abs(p.poin), 0);
            document.getElementById('ttStatPelanggaran').textContent = pel;
            document.getElementById('ttStatSP').textContent = sp;
            document.getElementById('ttStatPrestasi').textContent = pre;
            const render = (arr, id, color) => {
                document.getElementById(id).innerHTML = arr.map((a, i) =>
                    `<li class="flex items-center gap-3"><span class="w-7 h-7 rounded-lg ${i < 3 ? 'bg-navy text-white' : 'bg-slate-100 text-slate-500'} grid place-items-center font-bold text-xs flex-shrink-0">${i + 1}</span><div class="flex-1"><p class="text-sm font-semibold text-slate-700">${a.nama}</p><p class="text-[11px] text-slate-400">${a.kelas}</p></div><span class="text-sm font-bold ${color}">${a.poin}</span></li>`
                ).join('');
            };
            render(ttLeaderPrestasi, 'ttLeaderPrestasi', 'text-emerald2');
            render(ttLeaderPelanggaran, 'ttLeaderPelanggaran', 'text-red-500');
        }

        function openTtInput() {
            document.getElementById('ttSiswaList').innerHTML = ttLeaderPelanggaran.concat(ttLeaderPrestasi).map(s => '<option value="' + s.nama + '">' + s.kelas + '</option>').join('');
            document.getElementById('ttInputTipe').value = 'Pelanggaran';
            ttFillKode();
            document.getElementById('ttInputSiswa').value = '';
            document.getElementById('ttInputCatatan').value = '';
            const m = document.getElementById('ttInputModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeTtInput() { const m = document.getElementById('ttInputModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function ttFillKode() {
            const tipe = document.getElementById('ttInputTipe').value;
            const master = tipe === 'Pelanggaran' ? ttPelanggaranMaster : ttPrestasiMaster;
            document.getElementById('ttInputKode').innerHTML = master.map(m => `<option value="${m.kode}">${m.kode} · ${m.desc} (+${m.poin} poin)</option>`).join('');
            ttSyncPoin();
        }
        function ttSyncPoin() {
            const tipe = document.getElementById('ttInputTipe').value;
            const kode = document.getElementById('ttInputKode').value;
            const master = tipe === 'Pelanggaran' ? ttPelanggaranMaster : ttPrestasiMaster;
            const item = master.find(m => m.kode === kode);
            document.getElementById('ttInputPoin').value = item ? ((tipe === 'Pelanggaran' ? '+' : '-') + item.poin + ' Poin') : '-';
        }

        function submitTtInput() {
            const nama = document.getElementById('ttInputSiswa').value.trim();
            if (!nama) { showToast('warning', 'Nama siswa wajib dipilih'); return; }
            const tipe = document.getElementById('ttInputTipe').value;
            const kode = document.getElementById('ttInputKode').value;
            const master = tipe === 'Pelanggaran' ? ttPelanggaranMaster : ttPrestasiMaster;
            const item = master.find(m => m.kode === kode) || { desc: 'Catatan', poin: 0 };
            const poin = tipe === 'Pelanggaran' ? item.poin : -item.poin;
            const pelapor = document.getElementById('ttInputPelapor').value.trim() || 'Operator Kesiswaan';
            const status = document.getElementById('ttInputStatus').value;
            const waktuRaw = document.getElementById('ttInputWaktu').value;
            const inisial = nama.split(' ').map(w => w[0]).slice(0, 2).join('').toUpperCase();
            ttLogData.unshift({ id: ttNextId++, tgl: '18 Okt 2026', waktu: waktuRaw ? waktuRaw.slice(11, 16) : '10:00', inisial: inisial, nama: nama, nisn: '0000000000', kelas: '10-A', tipe: tipe, kode: kode, desc: item.desc, poin: poin, pelapor: pelapor, status: status, lampiran: false });
            closeTtInput();
            renderTtLog();
            renderTtAnalitik();
            showToast('success', 'Catatan ' + tipe + ' ' + nama + ' tersimpan (' + (poin > 0 ? '+' : '') + poin + ' poin)' + (poin >= 25 ? ' · E-BK & WA terkirim' : ''));
        }

        function openTtDetail(id) {
            const p = ttLogData.find(x => x.id === id);
            if (!p) return;
            const neg = p.poin < 0;
            document.getElementById('ttDetailIcon').textContent = neg ? '🏅' : '⚠️';
            document.getElementById('ttDetailSub').textContent = p.kode + ' · ' + p.tgl + ' ' + p.waktu;
            document.getElementById('ttDetailBody').innerHTML =
                `<div><p class="text-[11px] font-bold text-slate-400 uppercase">Siswa</p><p class="font-semibold text-slate-700">${p.nama} · ${p.kelas} · ${p.nisn}</p></div>
                 <div><p class="text-[11px] font-bold text-slate-400 uppercase">Deskripsi Kejadian</p><p class="text-slate-600">${p.desc}</p></div>
                 <div class="grid grid-cols-2 gap-3"><div><p class="text-[11px] font-bold text-slate-400 uppercase">Bobot Poin</p><p class="font-bold ${neg ? 'text-emerald2' : 'text-red-500'}">${neg ? '' : '+'}${p.poin} Poin</p></div><div><p class="text-[11px] font-bold text-slate-400 uppercase">Guru Pelapor</p><p class="text-slate-600">${p.pelapor}</p></div></div>
                 <div><p class="text-[11px] font-bold text-slate-400 uppercase">Tindak Lanjut</p><span class="text-[11px] font-bold ${ttStatusBadge[p.status]} px-2 py-0.5 rounded-full">${p.status}</span></div>
                 <div><p class="text-[11px] font-bold text-slate-400 uppercase">Bukti / Lampiran</p><p class="text-sm ${p.lampiran ? 'text-navy font-semibold' : 'text-slate-400'}">${p.lampiran ? '📎 foto_bukti_' + p.kode + '.jpg' : 'Tidak ada lampiran'}</p></div>`;
            const m = document.getElementById('ttDetailModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeTtDetail() { const m = document.getElementById('ttDetailModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function ttRujukBk(nama) { showToast('success', 'Catatan ' + nama + ' dirujuk ke Portal E-BK'); }
        function ttWaAlert(nama) { showToast('success', 'Notifikasi poin kedisiplinan dikirim ke WA orang tua ' + nama); }
        function cetakLaporanKelas() { showToast('success', 'Laporan kedisiplinan per kelas dikirim ke printer'); }
        function cetakKartuKarakter() { showToast('success', 'Kartu Karakter Siswa (PDF) dikirim ke printer'); }

        // ---------- KEPEGAWAIAN — Data Pegawai Aktif ----------
        const pgData = [
            { id: 1, nama: 'Ahmad Fauzi', gelar: 'S.Pd., M.M.', nuptk: '1234567890123456', nip: '19850412 201001 1 003', jk: 'L', jabatan: 'Guru Matematika', tugas: 'Wali Kelas 10-A / Pembina OSN', status: 'PNS', golongan: 'Pembina / IV-a', wa: '6281234500001', tmt: '01 Jan 2010', akun: 'Aktif', unit: 'Wali Kelas', nik: '3573011204850003', ttl: 'Malang, 12 Apr 1985', agama: 'Islam', alamat: 'Jl. Soekarno Hatta, Lowokwaru, Kota Malang', nikah: 'Menikah', anak: 2, rekening: 'BCA 1234567890', pendidikan: 'S1 Pendidikan Matematika, Universitas Negeri Malang', serdik: 'SERDIK-2012-004521', diklat: 'Diklat Kurikulum Merdeka (2023); Pelatihan Pembina OSN (2024)', dok: [1,1,1,1,1,1], jpm: 24, mapel: 'Matematika (X, XI, XII)', penugasan: 'Wali Kelas 10-A; Pembina OSN Matematika', serdikOn: true },
            { id: 2, nama: 'Siti Aminah', gelar: 'S.Pd.', nuptk: '2234567890123457', nip: 'GTT-2015-0021', jk: 'P', jabatan: 'Guru Bahasa Indonesia', tugas: 'Pembina Majalah Sekolah', status: 'GTT', golongan: '-', wa: '6281234500002', tmt: '15 Jul 2015', akun: 'Aktif', unit: 'Guru Pengajar', nik: '3573015507900004', ttl: 'Malang, 15 Jul 1990', agama: 'Islam', alamat: 'Jl. Ijen, Klojen, Kota Malang', nikah: 'Menikah', anak: 1, rekening: 'BRI 3320011223344', pendidikan: 'S1 Pendidikan Bahasa Indonesia, Universitas Negeri Malang', serdik: 'SERDIK-2018-007733', diklat: 'Pelatihan Literasi Digital (2024)', dok: [1,1,1,1,1,0], jpm: 20, mapel: 'B. Indonesia (X, XI)', penugasan: 'Pembina Majalah Sekolah', serdikOn: true },
            { id: 3, nama: 'Budi Santoso', gelar: 'S.Kom.', nuptk: '3234567890123458', nip: 'GTY-2017-0034', jk: 'L', jabatan: 'Guru Informatika', tugas: 'Kepala Laboratorium Komputer', status: 'GTY', golongan: '-', wa: '6281234500003', tmt: '10 Agu 2017', akun: 'Aktif', unit: 'Laboran', nik: '3573012303880005', ttl: 'Blitar, 23 Mar 1988', agama: 'Islam', alamat: 'Jl. Veteran, Lowokwaru, Kota Malang', nikah: 'Menikah', anak: 0, rekening: 'BNI 0998877665', pendidikan: 'S1 Teknik Informatika, Universitas Brawijaya', serdik: '-', diklat: 'Sertifikasi Google for Education (2023)', dok: [1,1,1,1,1,0], jpm: 22, mapel: 'Informatika, Koding & AI (X, XI, XII)', penugasan: 'Kepala Laboratorium Komputer', serdikOn: false },
            { id: 4, nama: 'Dewi Kartika', gelar: 'S.Pd.', nuptk: '4234567890123459', nip: '19870218 201203 2 011', jk: 'P', jabatan: 'Guru Biologi', tugas: 'Wali Kelas 11-B', status: 'PNS', golongan: 'Penata / III-c', wa: '6281234500004', tmt: '01 Mar 2012', akun: 'Aktif', unit: 'Wali Kelas', nik: '3573015802870012', ttl: 'Kediri, 18 Feb 1987', agama: 'Islam', alamat: 'Jl. Sulfat, Blimbing, Kota Malang', nikah: 'Menikah', anak: 3, rekening: 'Mandiri 1420012345678', pendidikan: 'S1 Pendidikan Biologi, Universitas Negeri Malang', serdik: 'SERDIK-2014-005988', diklat: 'Diklat Penilaian Berbasis AKM (2023)', dok: [1,1,1,1,1,1], jpm: 26, mapel: 'Biologi (X, XI)', penugasan: 'Wali Kelas 11-B; Pembina KIR', serdikOn: true },
            { id: 5, nama: 'Rina Marlina', gelar: 'S.Pd.', nuptk: '5234567890123460', nip: 'GTY-2016-0028', jk: 'P', jabatan: 'Guru Bahasa Inggris', tugas: 'Wali Kelas 10-B', status: 'GTY', golongan: '-', wa: '6281234500005', tmt: '20 Jun 2016', akun: 'Belum Dibuat', unit: 'Wali Kelas', nik: '3573014409930007', ttl: 'Surabaya, 04 Sep 1993', agama: 'Islam', alamat: 'Jl. Sigura-gura, Lowokwaru, Kota Malang', nikah: 'Belum Menikah', anak: 0, rekening: 'BCA 8877665544', pendidikan: 'S1 Pendidikan Bahasa Inggris, Universitas Negeri Malang', serdik: 'SERDIK-2019-008812', diklat: 'Pelatihan TOEFL Preparation (2024)', dok: [1,1,1,0,1,0], jpm: 24, mapel: 'B. Inggris (X, XI)', penugasan: 'Wali Kelas 10-B', serdikOn: true },
            { id: 6, nama: 'Hendra Wijaya', gelar: 'S.Pd.', nuptk: '6234567890123461', nip: 'PPPK-2022-0091', jk: 'L', jabatan: 'Guru Penjasorkes', tugas: 'Pembina Futsal & Basket', status: 'PPPK', golongan: 'Ahli Pertama / IX', wa: '6281234500006', tmt: '05 Jan 2022', akun: 'Aktif', unit: 'Guru Pengajar', nik: '3573011101950008', ttl: 'Malang, 11 Jan 1995', agama: 'Kristen', alamat: 'Jl. Borobudur, Klojen, Kota Malang', nikah: 'Belum Menikah', anak: 0, rekening: 'BRI 3398877665544', pendidikan: 'S1 Pendidikan Jasmani, Universitas Negeri Malang', serdik: 'SERDIK-2022-011223', diklat: 'Pelatihan Kepelatihan Dasar (2023)', dok: [1,1,1,1,1,1], jpm: 25, mapel: 'Penjaskes (X, XI, XII)', penugasan: 'Pembina Futsal & Basket', serdikOn: true },
            { id: 7, nama: 'Sri Wahyuni', gelar: 'S.E.', nuptk: '-', nip: 'GTY-2013-0012', jk: 'P', jabatan: 'Tenaga Administrasi / TU', tugas: 'Bendahara Sekolah', status: 'GTY', golongan: '-', wa: '6281234500007', tmt: '02 Feb 2013', akun: 'Aktif', unit: 'Tenaga Administrasi/TU', nik: '3573016604870009', ttl: 'Malang, 26 Apr 1987', agama: 'Islam', alamat: 'Jl. Gatot Subroto, Sukun, Kota Malang', nikah: 'Menikah', anak: 2, rekening: 'BCA 7766554433', pendidikan: 'S1 Manajemen, Universitas Brawijaya', serdik: '-', diklat: 'Pelatihan Administrasi Keuangan Sekolah (2022)', dok: [1,1,1,1,1,1], jpm: 0, mapel: '-', penugasan: 'Bendahara Sekolah; Staf Keuangan', serdikOn: false },
            { id: 8, nama: 'Agus Salim', gelar: 'SMA', nuptk: '-', nip: 'PTT-2019-0055', jk: 'L', jabatan: 'Teknisi & Umum', tugas: 'Kebersihan & Keamanan', status: 'PTT', golongan: '-', wa: '6281234500008', tmt: '01 Sep 2019', akun: 'Belum Dibuat', unit: 'Tenaga Administrasi/TU', nik: '3573011206850010', ttl: 'Malang, 12 Jun 1985', agama: 'Islam', alamat: 'Jl. Muharto, Kedungkandang, Kota Malang', nikah: 'Menikah', anak: 3, rekening: 'BRI 5577889900', pendidikan: 'SMA', serdik: '-', diklat: 'Pelatihan K3 & Keselamatan Kerja (2021)', dok: [1,0,1,1,1,0], jpm: 0, mapel: '-', penugasan: 'Teknisi, Kebersihan & Keamanan', serdikOn: false },
            { id: 9, nama: 'Nur Hidayah', gelar: 'S.IP.', nuptk: '-', nip: 'GTY-2018-0041', jk: 'P', jabatan: 'Pustakawan', tugas: 'Kepala Perpustakaan', status: 'GTY', golongan: '-', wa: '6281234500009', tmt: '16 Apr 2018', akun: 'Aktif', unit: 'Pustakawan', nik: '3573015904910011', ttl: 'Madiun, 19 Apr 1991', agama: 'Islam', alamat: 'Jl. Danau Toba, Lowokwaru, Kota Malang', nikah: 'Belum Menikah', anak: 0, rekening: 'BNI 8877665544', pendidikan: 'S1 Ilmu Perpustakaan, Universitas Brawijaya', serdik: '-', diklat: 'Pelatihan Manajemen Perpustakaan Digital (2023)', dok: [1,1,1,1,1,0], jpm: 0, mapel: '-', penugasan: 'Kepala Perpustakaan; Literasi Sekolah', serdikOn: false },
            { id: 10, nama: 'Fajar Nugroho', gelar: 'S.Si.', nuptk: '-', nip: 'Honor-2020-0067', jk: 'L', jabatan: 'Guru Fisika', tugas: 'Pembina KIR', status: 'PTT', golongan: '-', wa: '6281234500010', tmt: '03 Agu 2020', akun: 'Aktif', unit: 'Laboran', nik: '3573010906960013', ttl: 'Malang, 09 Jun 1996', agama: 'Islam', alamat: 'Jl. Kawi, Klojen, Kota Malang', nikah: 'Belum Menikah', anak: 0, rekening: 'BCA 2233445566', pendidikan: 'S1 Fisika, Universitas Negeri Malang', serdik: '-', diklat: 'Pelatihan Asisten Laboratorium (2022)', dok: [1,1,0,1,1,0], jpm: 18, mapel: 'Fisika (X, XI)', penugasan: 'Pembina Karya Ilmiah Remaja (KIR)', serdikOn: false }
        ];
        const pgStatusBadge = {
            'GTY': 'bg-emerald2/10 text-emerald2',
            'GTT': 'bg-sky2/10 text-sky2',
            'PNS': 'bg-navy/10 text-navy',
            'PPPK': 'bg-sky2/10 text-sky2',
            'PTT': 'bg-amber2/15 text-amber2'
        };
        let pgLoaded = false;
        let pgNextId = 500;

        const pgInisial = n => n.split(' ').map(w => w[0]).slice(0, 2).join('').toUpperCase();

        function loadPegawai() {
            if (pgLoaded) return;
            setTimeout(() => { renderPg(); pgLoaded = true; }, 500);
        }

        function renderPg() {
            const q = (document.getElementById('pgSearch').value || '').toLowerCase();
            const st = document.getElementById('pgFilterStatus').value;
            const unit = document.getElementById('pgFilterJabatan').value;
            const rows = pgData.filter(p =>
                (!q || p.nama.toLowerCase().includes(q) || p.nuptk.includes(q) || p.nip.toLowerCase().includes(q) || p.nik.includes(q))
                && (!st || p.status === st) && (!unit || p.unit === unit));
            document.getElementById('pgEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('pgCount').textContent = 'Menampilkan ' + rows.length + ' dari ' + pgData.length + ' pegawai';
            document.getElementById('pgBody').innerHTML = rows.map(p => {
                const akunAktif = p.akun === 'Aktif';
                return `<tr class="hover:bg-slate-50/70 align-top">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="w-11 h-11 rounded-2xl bg-navy/10 text-navy grid place-items-center font-heading font-extrabold text-xs flex-shrink-0">${pgInisial(p.nama)}</span>
                            <div class="min-w-0">
                                <p class="font-semibold text-slate-700 truncate">${p.nama}, ${p.gelar}</p>
                                <p class="text-[11px] text-slate-400 font-mono">NUPTK ${p.nuptk}</p>
                                <p class="text-[11px] text-slate-400 font-mono">NIP ${p.nip}</p>
                                <span class="text-[10px] font-bold ${p.jk === 'L' ? 'text-sky2' : 'text-pink-500'}">${p.jk === 'L' ? 'Laki-laki' : 'Perempuan'}</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <p class="font-semibold text-slate-700 text-xs">${p.jabatan}</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">${p.tugas}</p>
                    </td>
                    <td class="px-4 py-3">
                        <span class="text-[11px] font-bold ${pgStatusBadge[p.status]} px-2 py-0.5 rounded-full">${p.status}</span>
                        <p class="text-[11px] text-slate-400 mt-1">${p.golongan}</p>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-1.5">
                            <span class="text-xs text-slate-600 font-mono">+${p.wa}</span>
                            <button title="Chat WA" onclick="pgChatWa('${p.nama}','${p.wa}')" class="text-[11px] font-bold text-emerald2 bg-emerald2/10 px-1.5 py-0.5 rounded">Chat WA</button>
                        </div>
                        <p class="text-[11px] text-slate-400 mt-1">TMT: ${p.tmt}</p>
                    </td>
                    <td class="px-4 py-3">
                        <span class="inline-flex items-center gap-1 text-[11px] font-bold ${akunAktif ? 'text-emerald2 bg-emerald2/10' : 'text-amber2 bg-amber2/15'} px-2 py-0.5 rounded-full whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full ${akunAktif ? 'bg-emerald2' : 'bg-amber2'}"></span>${akunAktif ? 'Akun Aktif' : 'Belum Dibuatkan Akun'}</span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex justify-end gap-1">
                            <button title="Profil Detail" onclick="openPgDrawer(${p.id})" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                            <button title="Edit Data" onclick="pgEdit('${p.nama}')" class="w-8 h-8 rounded-lg hover:bg-sky2/10 grid place-items-center text-sky2">✏️</button>
                            <button title="Reset Password" onclick="pgResetPass('${p.nama}')" class="w-8 h-8 rounded-lg hover:bg-amber2/10 grid place-items-center">🔑</button>
                            <button title="Mutasi / Non-Aktifkan" onclick="pgMutasi('${p.nama}')" class="w-8 h-8 rounded-lg hover:bg-red-100 grid place-items-center">🔄</button>
                        </div>
                    </td>
                </tr>`;
            }).join('');
        }

        ['pgSearch', 'pgFilterStatus', 'pgFilterJabatan'].forEach(id => {
            const el = document.getElementById(id);
            if (el) { el.addEventListener('input', renderPg); el.addEventListener('change', renderPg); }
        });

        function pgChatWa(nama, wa) { showToast('success', 'Membuka percakapan WhatsApp dengan ' + nama); }

        function openPgDrawer(id) {
            const p = pgData.find(x => x.id === id);
            if (!p) return;
            document.getElementById('pgDrawerAvatar').textContent = pgInisial(p.nama);
            document.getElementById('pgDrawerNama').textContent = p.nama + ', ' + p.gelar;
            document.getElementById('pgDrawerSub').textContent = p.jabatan + ' · ' + p.status + ' · ' + p.tugas;
            pgDrawerData = p;
            pgTab('biodata');
            document.getElementById('pgDrawer').classList.remove('hidden');
        }
        function closePgDrawer() { document.getElementById('pgDrawer').classList.add('hidden'); }

        let pgDrawerData = null;
        function pgTab(name) {
            document.querySelectorAll('#pgDrawer .pg-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
            const p = pgDrawerData;
            if (!p) return;
            const body = document.getElementById('pgDrawerBody');
            if (name === 'biodata') {
                const item = (l, v) => `<div class="flex justify-between gap-3 py-2 border-b border-slate-50"><span class="text-xs text-slate-400 flex-shrink-0">${l}</span><span class="text-xs font-semibold text-slate-700 text-right">${v}</span></div>`;
                body.innerHTML = `<div class="space-y-0">${item('NIK', p.nik)}${item('Tempat, Tanggal Lahir', p.ttl)}${item('Jenis Kelamin', p.jk === 'L' ? 'Laki-laki' : 'Perempuan')}${item('Agama', p.agama)}${item('Alamat Domisili', p.alamat)}${item('Status Pernikahan', p.nikah)}${item('Jumlah Anak', p.anak)}${item('No. Rekening Bank (Payroll)', p.rekening)}</div>`;
            } else if (name === 'pendidikan') {
                body.innerHTML = `<div class="space-y-3">
                    <div class="rounded-2xl border border-slate-100 p-4"><p class="text-[11px] font-bold text-slate-400 uppercase">Pendidikan Terakhir</p><p class="mt-1 text-sm font-semibold text-slate-700">${p.pendidikan}</p></div>
                    <div class="rounded-2xl border border-slate-100 p-4"><p class="text-[11px] font-bold text-slate-400 uppercase">Nomor Sertifikat Pendidik (Serdik)</p><p class="mt-1 text-sm font-semibold ${p.serdikOn ? 'text-navy' : 'text-slate-400'}">${p.serdik}</p>${p.serdikOn ? '<span class="inline-block mt-2 text-[11px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">Sudah Sertifikasi</span>' : '<span class="inline-block mt-2 text-[11px] font-bold text-amber2 bg-amber2/15 px-2 py-0.5 rounded-full">Belum Sertifikasi</span>'}</div>
                    <div class="rounded-2xl border border-slate-100 p-4"><p class="text-[11px] font-bold text-slate-400 uppercase">Riwayat Pelatihan / Diklat</p><ul class="mt-2 space-y-1.5">${p.diklat.split(';').map(d => '<li class="flex items-start gap-2 text-xs text-slate-600"><span class="text-navy">•</span>' + d.trim() + '</li>').join('')}</ul></div>
                </div>`;
            } else if (name === 'dokumen') {
                const docs = [['KTP', 0], ['Kartu Keluarga (KK)', 1], ['SK Pengangkatan Pertama', 2], ['SK Terakhir', 3], ['Ijazah', 4], ['NPWP', 5]];
                body.innerHTML = `<div class="space-y-2">${docs.map(([label, i]) => {
                    const ada = p.dok[i];
                    return `<div class="flex items-center gap-3 rounded-2xl border ${ada ? 'border-slate-100' : 'border-dashed border-amber2/40 bg-amber2/5'} p-3">
                        <span class="w-9 h-9 rounded-xl ${ada ? 'bg-navy/10 text-navy' : 'bg-amber2/15 text-amber2'} grid place-items-center text-sm">${ada ? '📄' : '⚠️'}</span>
                        <div class="flex-1"><p class="text-xs font-semibold text-slate-700">${label}</p><p class="text-[11px] ${ada ? 'text-slate-400' : 'text-amber2 font-semibold'}">${ada ? 'Tersimpan di arsip digital' : 'Belum diunggah'}</p></div>
                        <button onclick="pgDoc('${label}')" class="text-[11px] font-bold ${ada ? 'text-navy bg-navy/10' : 'text-white bg-amber2'} px-2.5 py-1.5 rounded-lg whitespace-nowrap">${ada ? 'Lihat' : 'Upload'}</button>
                    </div>`;
                }).join('')}</div>`;
            } else {
                body.innerHTML = `<div class="space-y-3">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="rounded-2xl bg-navy/5 border border-navy/10 p-4"><p class="text-[11px] font-bold text-slate-400 uppercase">JPM / Minggu</p><p class="font-heading font-extrabold text-2xl text-navy">${p.jpm}</p><p class="text-[11px] text-slate-400">Jam Pelajaran Mengajar</p></div>
                        <div class="rounded-2xl bg-emerald2/5 border border-emerald2/10 p-4"><p class="text-[11px] font-bold text-slate-400 uppercase">Beban</p><p class="font-heading font-extrabold text-2xl text-emerald2">${p.jpm >= 24 ? 'Penuh' : (p.jpm > 0 ? 'Terpenuhi' : '-')}</p><p class="text-[11px] text-slate-400">Status beban kerja</p></div>
                    </div>
                    <div class="rounded-2xl border border-slate-100 p-4"><p class="text-[11px] font-bold text-slate-400 uppercase">Mata Pelajaran Diampu</p><p class="mt-1 text-sm font-semibold text-slate-700">${p.mapel}</p></div>
                    <div class="rounded-2xl border border-slate-100 p-4"><p class="text-[11px] font-bold text-slate-400 uppercase">Wali Kelas / Ekstrakurikuler</p><p class="mt-1 text-sm font-semibold text-slate-700">${p.penugasan}</p></div>
                </div>`;
            }
        }

        function pgDoc(label) { showToast('info', 'Membuka berkas: ' + label); }
        function pgEdit(nama) { showToast('info', 'Form edit data: ' + nama); }
        function pgResetPass(nama) { showToast('success', 'Link reset password dikirim ke WA ' + nama); }
        function pgMutasi(nama) { showToast('warning', 'Pegawai ' + nama + ' ditandai Mutasi / Non-Aktif'); }

        function openPgTambah() {
            ['pgInNama','pgInGelar','pgInNuptk','pgInNip','pgInJabatan','pgInTugas','pgInGolongan','pgInWa','pgInTmt'].forEach(id => document.getElementById(id).value = '');
            const m = document.getElementById('pgTambahModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closePgTambah() { const m = document.getElementById('pgTambahModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function submitPgTambah() {
            const nama = document.getElementById('pgInNama').value.trim();
            if (!nama) { showToast('warning', 'Nama pegawai wajib diisi'); return; }
            const gelar = document.getElementById('pgInGelar').value.trim() || '-';
            const nuptk = document.getElementById('pgInNuptk').value.trim() || '-';
            const nip = document.getElementById('pgInNip').value.trim() || '-';
            const jk = document.getElementById('pgInJk').value;
            const status = document.getElementById('pgInStatus').value;
            const jabatan = document.getElementById('pgInJabatan').value.trim() || 'Pegawai';
            const tugas = document.getElementById('pgInTugas').value.trim() || '-';
            const golongan = document.getElementById('pgInGolongan').value.trim() || '-';
            const wa = document.getElementById('pgInWa').value.trim() || '-';
            const tmt = document.getElementById('pgInTmt').value.trim() || '18 Okt 2026';
            const unit = document.getElementById('pgInUnit').value;
            const buatAkun = document.getElementById('pgInAkun').checked;
            pgData.unshift({ id: pgNextId++, nama: nama, gelar: gelar, nuptk: nuptk, nip: nip, jk: jk, jabatan: jabatan, tugas: tugas, status: status, golongan: golongan, wa: wa, tmt: tmt, akun: buatAkun ? 'Aktif' : 'Belum Dibuat', unit: unit, nik: '-', ttl: '-', agama: '-', alamat: '-', nikah: '-', anak: 0, rekening: '-', pendidikan: '-', serdik: '-', diklat: 'Belum ada riwayat diklat', dok: [0,0,0,0,0,0], jpm: 0, mapel: '-', penugasan: tugas, serdikOn: false });
            closePgTambah();
            renderPg();
            showToast('success', 'Pegawai ' + nama + ' disimpan' + (buatAkun ? ' · akun login auto-generated' : ''));
        }

        function exportPegawai() { showToast('success', 'Rekapitulasi data pegawai diekspor untuk yayasan/dinas'); }

        // ---------- KURIKULUM — Perangkat Pembelajaran ----------
        const pdJenisBadge = { 'CP': 'bg-navy/10 text-navy', 'TP': 'bg-sky2/10 text-sky2', 'ATP': 'bg-sky2/10 text-sky2', 'Modul Ajar': 'bg-emerald2/10 text-emerald2', 'Prota': 'bg-amber2/15 text-amber2', 'Promes': 'bg-amber2/15 text-amber2', 'BTA': 'bg-slate-200 text-slate-600' };
        let pdDocs = [
            { id: 1, mapel: 'Matematika', tingkat: 'Kelas 10', rombel: '10-A / 10-B', guru: 'Ahmad Fauzi', jenis: 'Modul Ajar', nama: 'Modul Ajar Bab 1 - Fungsi Kuadrat', versi: 'v1.2', tgl: '12 Agu 2026', done: 7, total: 7 },
            { id: 2, mapel: 'Matematika', tingkat: 'Kelas 11', rombel: '11-A', guru: 'Ahmad Fauzi', jenis: 'Modul Ajar', nama: 'Modul Ajar Bab 2 - Barisan & Deret', versi: 'v1.0', tgl: '10 Okt 2026', done: 5, total: 7 },
            { id: 3, mapel: 'Bahasa Indonesia', tingkat: 'Kelas 10', rombel: '10-A', guru: 'Siti Aminah', jenis: 'Modul Ajar', nama: 'Modul Ajar Teks Eksposisi', versi: 'v2.0', tgl: '08 Sep 2026', done: 7, total: 7 },
            { id: 4, mapel: 'Informatika', tingkat: 'Kelas 10', rombel: '10-C', guru: 'Budi Santoso', jenis: 'ATP', nama: 'CP & ATP Informatika Fase E', versi: 'v1.1', tgl: '05 Agu 2026', done: 6, total: 7 },
            { id: 5, mapel: 'Biologi', tingkat: 'Kelas 11', rombel: '11-B', guru: 'Dewi Kartika', jenis: 'Modul Ajar', nama: 'Modul Ajar Sistem Organ', versi: 'v1.3', tgl: '15 Okt 2026', done: 7, total: 7 },
            { id: 6, mapel: 'Bahasa Inggris', tingkat: 'Kelas 10', rombel: '10-B', guru: 'Rina Marlina', jenis: 'Modul Ajar', nama: 'Modul Ajar Descriptive Text', versi: 'v1.0', tgl: '03 Okt 2026', done: 4, total: 7 },
            { id: 7, mapel: 'Pendidikan Jasmani', tingkat: 'Kelas 10', rombel: '10-A', guru: 'Hendra Wijaya', jenis: 'Prota', nama: 'Prota & Promes Penjaskes 2026/2027', versi: 'v1.0', tgl: '20 Agu 2026', done: 3, total: 7 },
            { id: 8, mapel: 'Fisika', tingkat: 'Kelas 10', rombel: '10-C', guru: 'Fajar Nugroho', jenis: 'Modul Ajar', nama: 'Modul Ajar Hukum Newton', versi: 'v1.0', tgl: '18 Okt 2026', done: 5, total: 7 }
        ];
        let pdMonData = [
            { id: 1, nama: 'Ahmad Fauzi', nuptk: '1234567890123456', mapel: 'Matematika', kelas: '10-A / 10-B', cp: 'ok', tp: 'ok', atp: 'ok', prota: 'ok', promes: 'ok', modul: 'pending', approval: 'Menunggu Verifikasi' },
            { id: 2, nama: 'Siti Aminah', nuptk: '2234567890123457', mapel: 'Bahasa Indonesia', kelas: '10-A', cp: 'ok', tp: 'ok', atp: 'ok', prota: 'ok', promes: 'ok', modul: 'ok', approval: 'Disetujui Kepsek' },
            { id: 3, nama: 'Budi Santoso', nuptk: '3234567890123458', mapel: 'Informatika', kelas: '10-C', cp: 'ok', tp: 'pending', atp: 'ok', prota: 'ok', promes: 'none', modul: 'pending', approval: 'Menunggu Verifikasi' },
            { id: 4, nama: 'Dewi Kartika', nuptk: '4234567890123459', mapel: 'Biologi', kelas: '11-B', cp: 'ok', tp: 'revisi', atp: 'ok', prota: 'ok', promes: 'ok', modul: 'pending', approval: 'Revisi' },
            { id: 5, nama: 'Rina Marlina', nuptk: '5234567890123460', mapel: 'Bahasa Inggris', kelas: '10-B', cp: 'ok', tp: 'ok', atp: 'none', prota: 'none', promes: 'none', modul: 'pending', approval: 'Menunggu Verifikasi' },
            { id: 6, nama: 'Hendra Wijaya', nuptk: '6234567890123461', mapel: 'Pendidikan Jasmani', kelas: '10-A', cp: 'pending', tp: 'none', atp: 'none', prota: 'none', promes: 'none', modul: 'pending', approval: 'Menunggu Verifikasi' },
            { id: 7, nama: 'Fajar Nugroho', nuptk: '-', mapel: 'Fisika', kelas: '10-C', cp: 'ok', tp: 'ok', atp: 'ok', prota: 'ok', promes: 'ok', modul: 'ok', approval: 'Disetujui Waka Kurikulum' }
        ];
        const pdApprBadge = { 'Disetujui Waka Kurikulum': 'bg-sky2/10 text-sky2', 'Disetujui Kepsek': 'bg-emerald2/10 text-emerald2', 'Revisi': 'bg-amber2/15 text-amber2', 'Menunggu Verifikasi': 'bg-slate-200 text-slate-600' };
        let pdLoaded = false;
        let pdNextId = 300;

        function pdTab(name) {
            document.querySelectorAll('.pd-tab-panel').forEach(p => p.classList.toggle('hidden', p.id !== 'pd-tab-' + name));
            document.querySelectorAll('.pd-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
        }

        function loadPerangkat() {
            if (pdLoaded) return;
            setTimeout(() => { renderPd(); renderPdMon(); pdLoaded = true; }, 500);
        }

        function renderPd() {
            const q = (document.getElementById('pdSearch').value || '').toLowerCase();
            const tingkat = document.getElementById('pdFilterTingkat').value;
            const jenis = document.getElementById('pdFilterJenis').value;
            const rows = pdDocs.filter(d =>
                (!q || d.guru.toLowerCase().includes(q) || d.mapel.toLowerCase().includes(q) || d.nama.toLowerCase().includes(q))
                && (!tingkat || d.tingkat === tingkat) && (!jenis || d.jenis === jenis));
            document.getElementById('pdEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('pdCount').textContent = rows.length + ' dokumen';
            document.getElementById('pdBody').innerHTML = rows.map(d => {
                const lengkap = d.done >= d.total;
                return `<tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3"><p class="font-semibold text-slate-700">${d.mapel}</p><p class="text-[11px] text-slate-400">${d.tingkat} · ${d.rombel}</p></td>
                    <td class="px-4 py-3"><div class="flex items-center gap-2"><span class="w-8 h-8 rounded-full bg-navy/10 text-navy grid place-items-center font-heading font-bold text-[10px] flex-shrink-0">${d.guru.split(' ').map(w => w[0]).slice(0, 2).join('')}</span><span class="text-xs font-semibold text-slate-600">${d.guru}</span></div></td>
                    <td class="px-4 py-3"><span class="text-[10px] font-bold ${pdJenisBadge[d.jenis] || 'bg-slate-200 text-slate-600'} px-2 py-0.5 rounded-full">${d.jenis}</span><p class="mt-1 text-xs text-slate-600">${d.nama}</p></td>
                    <td class="px-4 py-3"><p class="text-xs font-bold text-slate-700">${d.versi}</p><p class="text-[11px] text-slate-400">${d.tgl}</p></td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${lengkap ? 'text-emerald2 bg-emerald2/10' : 'text-amber2 bg-amber2/15'} px-2 py-0.5 rounded-full">${lengkap ? 'Lengkap' : d.done + ' dari ' + d.total + ' Dokumen'} · ${lengkap ? '' : 'Belum Lengkap'}</span></td>
                    <td class="px-4 py-3"><div class="flex justify-end gap-1">
                        <button title="Preview Dokumen" onclick="pdPreview(${d.id})" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                        <button title="Download File" onclick="pdDownload('${d.nama}')" class="w-8 h-8 rounded-lg hover:bg-sky2/10 grid place-items-center text-sky2">📥</button>
                        <button title="Edit Metadata" onclick="pdEdit('${d.nama}')" class="w-8 h-8 rounded-lg hover:bg-amber2/10 grid place-items-center">✏️</button>
                    </div></td>
                </tr>`;
            }).join('');
        }

        ['pdSearch', 'pdFilterTingkat', 'pdFilterJenis'].forEach(id => { const el = document.getElementById(id); if (el) { el.addEventListener('input', renderPd); el.addEventListener('change', renderPd); } });

        function pdDot(st) {
            const map = { ok: ['bg-emerald2', '✓'], pending: ['bg-amber2', '◔'], revisi: ['bg-red-500', '✕'], none: ['bg-slate-300', '–'] };
            const [c, s] = map[st] || map.none;
            return `<span class="w-7 h-7 rounded-lg ${c} text-white grid place-items-center text-xs mx-auto">${s}</span>`;
        }

        function renderPdMon() {
            document.getElementById('pdMonBody').innerHTML = pdMonData.map(m => `
                <tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3"><p class="font-semibold text-slate-700">${m.nama}</p><p class="text-[11px] text-slate-400 font-mono">NUPTK ${m.nuptk}</p></td>
                    <td class="px-4 py-3"><p class="text-xs font-semibold text-slate-600">${m.mapel}</p><p class="text-[11px] text-slate-400">${m.kelas}</p></td>
                    <td class="px-2 py-3 text-center">${pdDot(m.cp)}</td>
                    <td class="px-2 py-3 text-center">${pdDot(m.tp)}</td>
                    <td class="px-2 py-3 text-center">${pdDot(m.atp)}</td>
                    <td class="px-2 py-3 text-center">${pdDot(m.prota)}</td>
                    <td class="px-2 py-3 text-center">${pdDot(m.promes)}</td>
                    <td class="px-2 py-3 text-center">${pdDot(m.modul)}</td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${pdApprBadge[m.approval]} px-2 py-0.5 rounded-full">${m.approval}</span></td>
                    <td class="px-4 py-3"><div class="flex justify-end gap-1">
                        <button title="Review & Validasi" onclick="openPdDrawer(${m.id})" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">🔍</button>
                        <button title="Kirim Pengingat WA" onclick="pdRemind('${m.nama}')" class="w-8 h-8 rounded-lg hover:bg-emerald2/10 grid place-items-center text-emerald2">📲</button>
                    </div></td>
                </tr>`
            ).join('');
        }

        let pdDrawerMon = null;
        function openPdDrawer(id) {
            const m = pdMonData.find(x => x.id === id);
            if (!m) return;
            pdDrawerMon = m;
            document.getElementById('pdDrawerNama').textContent = 'Review Perangkat — ' + m.mapel;
            document.getElementById('pdDrawerSub').textContent = m.nama + ' · ' + m.mapel + ' ' + m.kelas;
            document.getElementById('pdViewerFile').textContent = 'perangkat-' + m.mapel.toLowerCase().replace(/\s+/g, '-') + '.pdf';
            document.getElementById('pdCatatan').value = '';
            document.getElementById('pdDrawer').classList.remove('hidden');
        }
        function closePdDrawer() { document.getElementById('pdDrawer').classList.add('hidden'); }

        function pdSimpanValidasi() {
            const st = (document.querySelector('input[name="pdStatus"]:checked') || {}).value || 'Disetujui';
            const cat = document.getElementById('pdCatatan').value.trim();
            const nama = pdDrawerMon ? pdDrawerMon.nama : '';
            if (st === 'Revisi') {
                showToast('warning', 'Catatan revisi untuk ' + nama + ' terkirim' + (cat ? ' (WA notifikasi dikirim)' : ''));
            } else if (st === 'Ditolak') {
                showToast('warning', 'Perangkat ' + nama + ' ditolak & dikembalikan');
            } else {
                showToast('success', 'Perangkat ' + nama + " disetujui · tanda tangan digital Waka Kurikulum diterbitkan");
            }
            closePdDrawer();
        }

        function pdPreview(id) { const d = pdDocs.find(x => x.id === id); if (d) { pdDrawerMon = { nama: d.guru }; document.getElementById('pdDrawerNama').textContent = 'Preview Dokumen'; document.getElementById('pdDrawerSub').textContent = d.nama + ' · ' + d.mapel + ' ' + d.tingkat; document.getElementById('pdViewerFile').textContent = 'perangkat-' + d.mapel.toLowerCase().replace(/\s+/g, '-') + '.pdf'; document.getElementById('pdDrawer').classList.remove('hidden'); } }
        function pdDownload(nama) { showToast('success', 'Mengunduh: ' + nama); }
        function pdEdit(nama) { showToast('info', 'Form edit metadata: ' + nama); }
        function pdRemind(nama) { showToast('success', 'Pengingat WA terkirim ke ' + nama + ' untuk melengkapi perangkat'); }

        function openPdUpload() { const m = document.getElementById('pdUploadModal'); m.classList.remove('hidden'); m.classList.add('flex'); }
        function closePdUpload() { const m = document.getElementById('pdUploadModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function submitPdUpload() {
            const mapel = document.getElementById('pdInMapel').value.trim();
            const nama = document.getElementById('pdInNama').value.trim();
            if (!mapel || !nama) { showToast('warning', 'Mata pelajaran & nama dokumen wajib diisi'); return; }
            pdDocs.unshift({ id: pdNextId++, mapel: mapel, tingkat: document.getElementById('pdInTingkat').value, rombel: document.getElementById('pdInRombel').value.trim() || '-', guru: document.getElementById('pdInGuru').value.trim() || 'Guru Pengampu', jenis: document.getElementById('pdInJenis').value, nama: nama, versi: document.getElementById('pdInVersi').value.trim() || 'v1.0', tgl: '18 Okt 2026', done: 1, total: 7 });
            closePdUpload();
            renderPd();
            showToast('success', 'Perangkat unggah & masuk antrean validasi Kurikulum');
        }

        // ---------- HUMAS — Pengumuman & Memo ----------
        const hmKatBadge = { 'Akademik': 'bg-navy/10 text-navy', 'Libur/Kegiatan': 'bg-amber2/15 text-amber2', 'Keuangan': 'bg-emerald2/10 text-emerald2', 'Kebijakan/Internal': 'bg-sky2/10 text-sky2' };
        const hmStatusBadge = { 'Aktif': 'bg-emerald2/10 text-emerald2', 'Draf': 'bg-slate-200 text-slate-600', 'Terjadwal': 'bg-amber2/15 text-amber2', 'Diarsipkan': 'bg-slate-200 text-slate-500' };
        let hmData = [
            { id: 1, nomor: 'MEMO/012/X/2026', tgl: '15 Okt 2026', judul: 'Jadwal Ujian Tengah Semester Ganjil 2026/2027', kategori: 'Akademik', target: 'Wali Murid Kelas 10 & 11', targetTag: 'ortu', kanal: ['portal','wa','email'], dibaca: 245, total: 300, status: 'Aktif', isi: 'Diberitahukan bahwa Ujian Tengah Semester (UTS) Ganjil akan dilaksanakan pada 27–31 Oktober 2026. Peserta didik wajib hadir 15 menit sebelum ujian dimulai.' },
            { id: 2, nomor: 'SE/045/X/2026', tgl: '12 Okt 2026', judul: 'Pemberitahuan Libur Maulid Nabi Muhammad SAW', kategori: 'Libur/Kegiatan', target: 'Seluruh Siswa, Guru & Wali Murid', targetTag: 'siswa', kanal: ['portal','wa'], dibaca: 812, total: 900, status: 'Aktif', isi: 'Sehubungan dengan peringatan Maulid Nabi Muhammad SAW, kegiatan belajar mengajar diliburkan pada tanggal yang ditetapkan. Kegiatan piket tetap berjalan.' },
            { id: 3, nomor: 'MEMO/011/X/2026', tgl: '10 Okt 2026', judul: 'Batas Akhir Pembayaran SPP Bulan Oktober', kategori: 'Keuangan', target: 'Wali Murid Kelas 10, 11 & 12', targetTag: 'ortu', kanal: ['portal','wa','email'], dibaca: 178, total: 300, status: 'Aktif', isi: 'Pembayaran SPP bulan Oktober paling lambat tanggal 20. Pembayaran dapat dilakukan melalui virtual account atau kantor TU.' },
            { id: 4, nomor: 'SE/044/X/2026', tgl: '05 Okt 2026', judul: 'Sosialisasi Program Literasi Digital & AI', kategori: 'Kebijakan/Internal', target: 'Khusus Guru & Staf', targetTag: 'guru', kanal: ['portal','email'], dibaca: 0, total: 62, status: 'Terjadwal', isi: 'Seluruh guru dan staf diundang mengikuti sosialisasi program Literasi Digital & AI pada 22 Oktober 2026 pukul 13.00 di Aula.' },
            { id: 5, nomor: 'MEMO/010/IX/2026', tgl: '28 Sep 2026', judul: 'Rapat Koordinasi Wali Kelas Triwulan III', kategori: 'Kebijakan/Internal', target: 'Khusus Guru & Staf', targetTag: 'guru', kanal: ['portal','wa'], dibaca: 58, total: 62, status: 'Diarsipkan', isi: 'Rapat koordinasi wali kelas membahas evaluasi kedisiplinan dan rekap kehadiran siswa.' },
            { id: 6, nomor: 'MEMO/013/X/2026', tgl: '17 Okt 2026', judul: 'Undangan Parenting: Mendampingi Anak di Era Digital', kategori: 'Akademik', target: 'Wali Murid Kelas 10', targetTag: 'kelas', kanal: ['portal','wa','email'], dibaca: 0, total: 120, status: 'Draf', isi: 'Sekolah mengundang bapak/ibu wali murid kelas 10 dalam seminar parenting bertema pendampingan anak di era digital.' },
            { id: 7, nomor: 'SE/046/X/2026', tgl: '16 Okt 2026', judul: 'Perubahan Jadwal Ekstrakurikuler Semester Ganjil', kategori: 'Libur/Kegiatan', target: 'Seluruh Siswa', targetTag: 'siswa', kanal: ['portal','wa'], dibaca: 410, total: 620, status: 'Aktif', isi: 'Terjadi penyesuaian jadwal kegiatan ekstrakurikuler. Jadwal terbaru dapat dilihat pada papan informasi dan portal siswa.' }
        ];
        let hmWaLog = [
            { id: 1, waktu: '17 Okt 2026 09:15', nama: 'Bpk. Suryanto (Wali Keira)', wa: '628123456701', judul: 'Jadwal Ujian Tengah Semester Ganjil 2026/2027', status: 'Sukses' },
            { id: 2, waktu: '17 Okt 2026 09:15', nama: 'Ibu Wulandari (Wali Dimas)', wa: '628123456702', judul: 'Jadwal Ujian Tengah Semester Ganjil 2026/2027', status: 'Sukses' },
            { id: 3, waktu: '17 Okt 2026 09:16', nama: 'Bpk. Hendra (Wali Fajar)', wa: '628123456703', judul: 'Jadwal Ujian Tengah Semester Ganjil 2026/2027', status: 'Gagal' },
            { id: 4, waktu: '16 Okt 2026 14:02', nama: 'Marlina Sari (Guru)', wa: '628123456704', judul: 'Perubahan Jadwal Ekstrakurikuler Semester Ganjil', status: 'Sukses' },
            { id: 5, waktu: '16 Okt 2026 14:02', nama: 'Andi Pratama (Guru BK)', wa: '628123456705', judul: 'Perubahan Jadwal Ekstrakurikuler Semester Ganjil', status: 'Pending' },
            { id: 6, waktu: '15 Okt 2026 08:30', nama: 'Ibu Ratna (Wali Citra)', wa: '628123456706', judul: 'Pemberitahuan Libur Maulid Nabi Muhammad SAW', status: 'Sukses' },
            { id: 7, waktu: '15 Okt 2026 08:30', nama: 'Bpk. Joko (Wali Eka)', wa: '628123456707', judul: 'Pemberitahuan Libur Maulid Nabi Muhammad SAW', status: 'Sukses' },
            { id: 8, waktu: '14 Okt 2026 10:45', nama: 'Bpk. Slamet (Wali Hadi)', wa: '628123456708', judul: 'Batas Akhir Pembayaran SPP Bulan Oktober', status: 'Gagal' }
        ];
        const hmDeliveryBadge = { 'Sukses': 'bg-emerald2/10 text-emerald2', 'Pending': 'bg-amber2/15 text-amber2', 'Gagal': 'bg-red-100 text-red-500' };
        let hmLoaded = false;
        let hmNextId = 400;
        let hmReadCurrent = null;

        function hmTab(name) {
            document.querySelectorAll('.hm-tab-panel').forEach(p => p.classList.toggle('hidden', p.id !== 'hm-tab-' + name));
            document.querySelectorAll('.hm-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
        }

        function loadPengumuman() {
            if (hmLoaded) return;
            setTimeout(() => { renderHm(); renderHmWa(); hmLoaded = true; }, 500);
        }

        function renderHm() {
            const q = (document.getElementById('hmSearch').value || '').toLowerCase();
            const target = document.getElementById('hmFilterTarget').value;
            const status = document.getElementById('hmFilterStatus').value;
            const rows = hmData.filter(h =>
                (!q || h.judul.toLowerCase().includes(q) || h.nomor.toLowerCase().includes(q))
                && (!target || h.targetTag === target) && (!status || h.status === status));
            document.getElementById('hmEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('hmBody').innerHTML = rows.map(h => {
                const pct = h.total ? Math.round(h.dibaca / h.total * 100) : 0;
                const kanal = [['portal','Portal/App'],['wa','Broadcast WA'],['email','Email']].map(([k, label]) => h.kanal.includes(k) ? `<span class="inline-flex items-center gap-1 text-[10px] font-bold text-slate-500 bg-slate-100 px-1.5 py-0.5 rounded" title="${label}">${k === 'portal' ? '📱' : k === 'wa' ? '💬' : '✉️'} ${label}</span>` : '').join(' ');
                return `<tr class="hover:bg-slate-50/70 align-top">
                    <td class="px-4 py-3"><p class="text-xs font-bold text-navy font-mono">${h.nomor}</p><p class="text-[11px] text-slate-400">${h.tgl}</p></td>
                    <td class="px-4 py-3 max-w-xs"><p class="font-semibold text-slate-700 text-xs">${h.judul}</p><span class="inline-block mt-1 text-[10px] font-bold ${hmKatBadge[h.kategori]} px-2 py-0.5 rounded-full">${h.kategori}</span></td>
                    <td class="px-4 py-3"><p class="text-xs text-slate-600">${h.target}</p><span class="inline-block mt-1 text-[10px] font-bold ${hmStatusBadge[h.status]} px-2 py-0.5 rounded-full">${h.status}</span></td>
                    <td class="px-4 py-3"><div class="flex flex-wrap gap-1">${kanal}</div></td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2"><div class="flex-1 h-1.5 rounded-full bg-slate-100 overflow-hidden max-w-[90px]"><div class="h-full rounded-full ${pct >= 70 ? 'bg-emerald2' : pct > 0 ? 'bg-amber2' : 'bg-slate-300'}" style="width:${pct}%"></div></div><span class="text-xs font-bold text-slate-700">${pct}%</span></div>
                        <p class="text-[11px] text-slate-400 mt-1">${h.dibaca}/${h.total} Dibaca</p>
                    </td>
                    <td class="px-4 py-3"><div class="flex justify-end gap-1">
                        <button title="Preview & Detail Read Log" onclick="openHmRead(${h.id})" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                        <button title="Edit / Jadwalkan Ulang" onclick="hmEdit('${h.judul.replace(/'/g, '')}')" class="w-8 h-8 rounded-lg hover:bg-sky2/10 grid place-items-center text-sky2">✏️</button>
                        <button title="Blast WA Ulang (Resend)" onclick="hmResendOne('${h.judul.replace(/'/g, '')}')" class="w-8 h-8 rounded-lg hover:bg-emerald2/10 grid place-items-center text-emerald2">📲</button>
                        <button title="Cetak Surat Edaran PDF" onclick="showToast('success','Cetak surat edaran: ${h.nomor}')" class="w-8 h-8 rounded-lg hover:bg-amber2/10 grid place-items-center">🖨️</button>
                    </div></td>
                </tr>`;
            }).join('');
        }

        ['hmSearch', 'hmFilterTarget', 'hmFilterStatus'].forEach(id => { const el = document.getElementById(id); if (el) { el.addEventListener('input', renderHm); el.addEventListener('change', renderHm); } });

        function renderHmWa() {
            document.getElementById('hmWaCount').textContent = hmWaLog.length + ' log';
            document.getElementById('hmWaBody').innerHTML = hmWaLog.map(l => `
                <tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3 text-xs text-slate-600 whitespace-nowrap">${l.waktu}</td>
                    <td class="px-4 py-3"><p class="text-xs font-semibold text-slate-700">${l.nama}</p><p class="text-[11px] text-slate-400 font-mono">+${l.wa}</p></td>
                    <td class="px-4 py-3 text-xs text-slate-600 max-w-xs">${l.judul}</td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${hmDeliveryBadge[l.status]} px-2 py-0.5 rounded-full">${l.status === 'Sukses' ? 'Sukses' : l.status === 'Pending' ? 'Pending' : 'Gagal'}</span></td>
                    <td class="px-4 py-3 text-right">${l.status === 'Gagal' ? `<button onclick="hmResendLog(${l.id})" class="text-[11px] font-bold text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded-lg">Kirim Ulang</button>` : '<span class="text-[11px] text-slate-300">—</span>'}</td>
                </tr>`
            ).join('');
        }

        function hmResendLog(id) {
            const l = hmWaLog.find(x => x.id === id);
            if (!l) return;
            l.status = 'Sukses';
            renderHmWa();
            showToast('success', 'Pesan berhasil dikirim ulang ke ' + l.nama);
        }

        function openHmRead(id) {
            const h = hmData.find(x => x.id === id);
            if (!h) return;
            hmReadCurrent = h;
            document.getElementById('hmReadJudul').textContent = h.judul;
            document.getElementById('hmReadSub').textContent = h.nomor + ' · ' + h.tgl + ' · ' + h.target;
            document.getElementById('hmReadBody').innerHTML = '<p>' + h.isi + '</p>';
            const pct = h.total ? Math.round(h.dibaca / h.total * 100) : 0;
            document.getElementById('hmReadBar').innerHTML = `<div class="h-full rounded-full ${pct >= 70 ? 'bg-emerald2' : pct > 0 ? 'bg-amber2' : 'bg-slate-300'}" style="width:${pct}%"></div>`;
            document.getElementById('hmReadStat').textContent = h.dibaca + ' dari ' + h.total + ' penerima telah membaca (' + pct + '%) · ' + (h.total - h.dibaca) + ' belum dibaca';
            const belum = Math.min(5, h.total - h.dibaca);
            document.getElementById('hmReadList').innerHTML = belum > 0 ? Array.from({ length: belum }, (_, i) => `<div class="flex items-center gap-2 text-xs text-slate-600 bg-slate-50 rounded-lg px-3 py-2"><span>🕓</span> Penerima #${i + 1} · belum membaca</div>`).join('') : '<p class="text-xs text-emerald2 font-semibold">Semua penerima telah membaca 🎉</p>';
            const m = document.getElementById('hmReadModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeHmRead() { const m = document.getElementById('hmReadModal'); m.classList.add('hidden'); m.classList.remove('flex'); }
        function hmBlastUlang() { showToast('success', 'Pengingat WA dikirim ke penerima yang belum membaca'); closeHmRead(); }

        function hmEdit(judul) { showToast('info', 'Form edit: ' + judul); }
        function hmResendOne(judul) { showToast('success', 'Broadcast WA dikirim ulang: ' + judul); }

        function openHmEditor() {
            document.getElementById('hmInJudul').value = '';
            document.getElementById('hmInNomor').value = '';
            document.getElementById('hmInBody').innerHTML = '';
            const m = document.getElementById('hmDrawer'); m.classList.remove('hidden');
        }
        function closeHmEditor() { document.getElementById('hmDrawer').classList.add('hidden'); }

        function hmSimpan(status) {
            const judul = document.getElementById('hmInJudul').value.trim();
            if (!judul) { showToast('warning', 'Judul pengumuman wajib diisi'); return; }
            const body = document.getElementById('hmInBody').innerText.trim() || 'Isi pengumuman belum ditulis.';
            const kategori = document.getElementById('hmInKategori').value;
            const feed = document.getElementById('hmInFeed').checked;
            const wa = document.getElementById('hmInWa').checked;
            hmData.unshift({ id: hmNextId++, nomor: document.getElementById('hmInNomor').value.trim() || 'MEMO/' + String(hmNextId).padStart(3, '0') + '/X/2026', tgl: '18 Okt 2026', judul: judul, kategori: kategori, target: 'Kustom (multi-select)', targetTag: 'kelas', kanal: [feed ? 'portal' : '', wa ? 'wa' : ''].filter(Boolean), dibaca: 0, total: 120, status: status, isi: body });
            closeHmEditor();
            renderHm();
            const label = status === 'Draf' ? 'disimpan sebagai draf' : status === 'Terjadwal' ? 'dijadwalkan terbit' : 'diterbitkan & di-broadcast';
            showToast('success', 'Pengumuman "' + judul + '" ' + label);
        }

        // ---------- AKREDITASI & LAPORAN — Akreditasi Digital ----------
        const akStatusBadge = { 'Valid': 'bg-emerald2/10 text-emerald2', 'Pending': 'bg-amber2/15 text-amber2', 'Menunggu Review': 'bg-amber2/15 text-amber2', 'Perlu Perbaikan': 'bg-red-100 text-red-500', 'Kurang': 'bg-red-100 text-red-500', 'Belum Ada Eviden': 'bg-slate-200 text-slate-500' };
        let akButir = [
            { id: 1, no: 'Butir 01', kode: 'AK-01', indikator: 'Kedisiplinan Siswa', komponen: 'Mutu Lulusan', eviden: ['Tata Tertib', 'Rekap Absensi 3 Tahun', 'Jurnal BK'], terupload: 3, total: 3, skor: 4, status: 'Valid' },
            { id: 2, no: 'Butir 02', kode: 'AK-02', indikator: 'Prestasi Akademik & Non-Akademik', komponen: 'Mutu Lulusan', eviden: ['Sertifikat Lomba', 'Rekap Prestasi', 'Dokumentasi Kegiatan'], terupload: 2, total: 3, skor: 3, status: 'Pending' },
            { id: 3, no: 'Butir 05', kode: 'AK-05', indikator: 'Kualitas Proses Pembelajaran', komponen: 'Proses Pembelajaran', eviden: ['Modul Ajar', 'Jurnal Mengajar', 'Instrumen Supervisi'], terupload: 3, total: 3, skor: 4, status: 'Valid' },
            { id: 4, no: 'Butir 06', kode: 'AK-06', indikator: 'Asesmen & Penilaian', komponen: 'Proses Pembelajaran', eviden: ['Instrumen Asesmen', 'Analisis Nilai', 'Bank Soal'], terupload: 2, total: 3, skor: 3, status: 'Perlu Perbaikan' },
            { id: 5, no: 'Butir 09', kode: 'AK-09', indikator: 'Kompetensi & Kualifikasi Guru', komponen: 'Mutu Guru', eviden: ['Ijazah', 'Sertifikat Pendidik', 'SK Mengajar'], terupload: 3, total: 3, skor: 4, status: 'Valid' },
            { id: 6, no: 'Butir 10', kode: 'AK-10', indikator: 'Pengembangan Keprofesian Guru', komponen: 'Mutu Guru', eviden: ['Sertifikat Diklat', 'Jurnal PKB'], terupload: 1, total: 2, skor: 2, status: 'Menunggu Review' },
            { id: 7, no: 'Butir 13', kode: 'AK-13', indikator: 'Manajemen & Administrasi Sekolah', komponen: 'Manajemen Sekolah', eviden: ['RKAS', 'Laporan Keuangan', 'Struktur Organisasi'], terupload: 3, total: 3, skor: 4, status: 'Valid' },
            { id: 8, no: 'Butir 14', kode: 'AK-14', indikator: 'Kemitraan & Partisipasi Masyarakat', komponen: 'Manajemen Sekolah', eviden: ['MoU Kemitraan', 'Notulen Rapat Komite'], terupload: 0, total: 2, skor: 1, status: 'Belum Ada Eviden' }
        ];
        let akKomponen = [
            { nama: 'Mutu Lulusan', butir: 4, skor: 3.9, bobot: 25 },
            { nama: 'Proses Pembelajaran', butir: 5, skor: 3.7, bobot: 30 },
            { nama: 'Mutu Guru', butir: 3, skor: 3.8, bobot: 20 },
            { nama: 'Manajemen Sekolah', butir: 4, skor: 3.8, bobot: 25 }
        ];
        const akHistory = [
            { waktu: '18 Okt 2026 09:12', anggota: 'Hendro S. (Operator)', aksi: 'Mengunggah 3 file eviden', butir: 'Butir 01 — Kedisiplinan Siswa' },
            { waktu: '18 Okt 2026 08:40', anggota: 'Waka Kurikulum', aksi: 'Verifikasi: Valid', butir: 'Butir 05 — Proses Pembelajaran' },
            { waktu: '17 Okt 2026 15:20', anggota: 'Tim Akreditasi', aksi: 'Mengubah skor mandiri (3→4)', butir: 'Butir 09 — Kompetensi Guru' },
            { waktu: '17 Okt 2026 10:05', anggota: 'Kepala Sekolah', aksi: 'Memberi catatan revisi', butir: 'Butir 10 — Pengembangan Keprofesian' },
            { waktu: '16 Okt 2026 14:30', anggota: 'Hendro S. (Operator)', aksi: 'Mengunggah 2 file eviden', butir: 'Butir 06 — Asesmen & Penilaian' }
        ];
        let akLoaded = false;
        let akCurrent = null;

        function akTab(name) {
            document.querySelectorAll('.ak-tab-panel').forEach(p => p.classList.toggle('hidden', p.id !== 'ak-tab-' + name));
            document.querySelectorAll('.ak-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
        }

        function loadAkreditasi() {
            if (akLoaded) return;
            setTimeout(() => { renderAk(); renderAkSkor(); renderAkEkspor(); akLoaded = true; }, 500);
        }

        function akSkorDots(n) {
            let d = '';
            for (let i = 1; i <= 4; i++) d += `<span class="w-2.5 h-2.5 rounded-full ${i <= n ? 'bg-navy' : 'bg-slate-200'}"></span>`;
            return `<div class="flex items-center gap-1">${d}<span class="ml-1 text-xs font-bold text-slate-700">${n}</span></div>`;
        }

        function renderAk() {
            const q = (document.getElementById('akSearch').value || '').toLowerCase();
            const komp = document.getElementById('akFilterKomponen').value;
            const st = document.getElementById('akFilterStatus').value;
            const rows = akButir.filter(b =>
                (!q || b.indikator.toLowerCase().includes(q) || b.no.toLowerCase().includes(q) || b.kode.toLowerCase().includes(q) || b.eviden.join(' ').toLowerCase().includes(q))
                && (!komp || b.komponen === komp)
                && (!st || b.status === st || (st === 'Belum Ada Eviden' && b.terupload === 0)));
            document.getElementById('akEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('akBody').innerHTML = rows.map(b => {
                const lengkap = b.terupload >= b.total;
                const evid = b.eviden.map((e, i) => `<li class="flex items-center gap-1.5"><span class="${i < b.terupload ? 'text-emerald2' : 'text-slate-300'}">${i < b.terupload ? '✓' : '○'}</span>${e}</li>`).join('');
                return `<tr class="hover:bg-slate-50/70 align-top">
                    <td class="px-4 py-3"><p class="text-xs font-bold text-navy font-mono">${b.no}</p><p class="text-[11px] text-slate-400">${b.kode} · ${b.komponen}</p></td>
                    <td class="px-4 py-3 max-w-[220px]"><p class="text-xs text-slate-600">${b.indikator}</p></td>
                    <td class="px-4 py-3"><ul class="space-y-1 text-[11px] text-slate-500">${evid}</ul></td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${lengkap ? 'text-emerald2 bg-emerald2/10' : 'text-amber2 bg-amber2/15'} px-2 py-0.5 rounded-full">${b.terupload}/${b.total} File</span></td>
                    <td class="px-4 py-3">${akSkorDots(b.skor)}</td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${akStatusBadge[b.status]} px-2 py-0.5 rounded-full">${b.status}</span></td>
                    <td class="px-4 py-3"><div class="flex justify-end gap-1">
                        <button title="Preview & Kelola Eviden" onclick="openAkEviden(${b.id})" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                        <button title="Unggah File Eviden Baru" onclick="openAkEviden(${b.id})" class="w-8 h-8 rounded-lg hover:bg-sky2/10 grid place-items-center text-sky2">📤</button>
                    </div></td>
                </tr>`;
            }).join('');
        }

        ['akSearch', 'akFilterKomponen', 'akFilterStatus'].forEach(id => { const el = document.getElementById(id); if (el) { el.addEventListener('input', renderAk); el.addEventListener('change', renderAk); } });

        function renderAkSkor() {
            const totalBobot = akKomponen.reduce((a, k) => a + k.bobot, 0);
            let nilai = 0;
            document.getElementById('akKomponenBody').innerHTML = akKomponen.map(k => {
                const subtotal = k.skor / 4 * k.bobot;
                nilai += subtotal;
                return `<tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3 font-semibold text-slate-700 text-xs">${k.nama}</td>
                    <td class="px-4 py-3 text-xs text-slate-600">${k.butir} butir</td>
                    <td class="px-4 py-3"><span class="text-sm font-bold text-navy">${k.skor.toFixed(2)}</span><span class="text-[11px] text-slate-400"> / 4</span></td>
                    <td class="px-4 py-3 text-xs text-slate-600">${k.bobot}%</td>
                    <td class="px-4 py-3 text-sm font-bold text-slate-800">${subtotal.toFixed(2)}</td>
                    <td class="px-4 py-3 text-right"><button onclick="akGap('${k.nama}')" class="text-[11px] font-bold text-navy bg-navy/10 px-3 py-1.5 rounded-lg whitespace-nowrap">Detail Analisis Kesenjangan</button></td>
                </tr>`;
            }).join('');
            nilai = Math.round(nilai * 10) / 10;
            document.getElementById('akNilai').textContent = nilai.toFixed(1) + ' / 100';
            let pred = 'D (Tidak Terakreditasi)', cls = 'text-red-500';
            if (nilai >= 91) { pred = 'A (Unggul)'; cls = 'text-emerald2'; }
            else if (nilai >= 81) { pred = 'B (Baik)'; cls = 'text-sky2'; }
            else if (nilai >= 71) { pred = 'C (Cukup)'; cls = 'text-amber2'; }
            const el = document.getElementById('akPredikat'); el.textContent = pred; el.className = 'font-heading font-extrabold text-2xl ' + cls;
            document.getElementById('akPredikatSub').textContent = 'Terakreditasi ' + pred.split(' ')[0] + ' · proyeksi instrumen 2024';
            const tot = akButir.reduce((a, b) => a + b.total, 0);
            const up = akButir.reduce((a, b) => a + Math.min(b.terupload, b.total), 0);
            document.getElementById('akEviden').textContent = Math.round(up / tot * 100) + '%';
            document.getElementById('akBelum').textContent = akButir.filter(b => b.terupload === 0).length;
        }

        function akGap(nama) { showToast('info', 'Analisis kesenjangan komponen: ' + nama); }

        function renderAkEkspor() {
            document.getElementById('akZipList').innerHTML = akKomponen.map((k, i) => `
                <div class="flex items-center gap-3 rounded-2xl border border-slate-100 p-3">
                    <span class="w-9 h-9 rounded-xl bg-navy/10 text-navy grid place-items-center text-sm">🗜️</span>
                    <div class="flex-1 min-w-0"><p class="text-xs font-semibold text-slate-700 truncate">Komponen_${i + 1}_${k.nama.replace(/\s+/g, '_')}.zip</p><p class="text-[11px] text-slate-400">${k.butir} butir · ${k.bobot}% bobot</p></div>
                    <button onclick="akGenerateZip('${k.nama}')" class="text-[11px] font-bold text-white bg-navy hover:bg-sky2 px-3 py-1.5 rounded-lg whitespace-nowrap">Generate</button>
                </div>`
            ).join('');
            document.getElementById('akHistoryBody').innerHTML = akHistory.map(h => `
                <tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3 text-xs text-slate-500 whitespace-nowrap">${h.waktu}</td>
                    <td class="px-4 py-3 text-xs font-semibold text-slate-700">${h.anggota}</td>
                    <td class="px-4 py-3 text-xs text-slate-600">${h.aksi}</td>
                    <td class="px-4 py-3 text-xs text-slate-500">${h.butir}</td>
                </tr>`
            ).join('');
        }

        function akGenerateZip(nama) { showToast('success', 'Paket zip folder "' + nama + '" berhasil dibuat'); }

        function openAkEviden(id) {
            const b = akButir.find(x => x.id === id);
            if (!b) return;
            akCurrent = b;
            document.getElementById('akEvidenJudul').textContent = b.no + ' — ' + b.indikator;
            document.getElementById('akEvidenSub').textContent = b.kode + ' · ' + b.komponen + ' · Skor Mandiri ' + b.skor + '/4';
            document.getElementById('akEvidenFiles').innerHTML = b.eviden.map((e, i) => {
                const ada = i < b.terupload;
                return `<div class="flex items-center gap-3 rounded-2xl border ${ada ? 'border-slate-100' : 'border-dashed border-amber2/40 bg-amber2/5'} p-3">
                    <span class="w-9 h-9 rounded-xl ${ada ? 'bg-navy/10 text-navy' : 'bg-amber2/15 text-amber2'} grid place-items-center text-sm">${ada ? '📄' : '⚠️'}</span>
                    <div class="flex-1 min-w-0"><p class="text-xs font-semibold text-slate-700 truncate">${e}</p><p class="text-[11px] ${ada ? 'text-slate-400' : 'text-amber2 font-semibold'}">${ada ? 'Tersimpan di arsip digital' : 'Belum diunggah'}</p></div>
                    <button onclick="showToast('info','${ada ? 'Membuka' : 'Unggah'}: ${e}')" class="text-[11px] font-bold ${ada ? 'text-navy bg-navy/10' : 'text-white bg-amber2'} px-2.5 py-1.5 rounded-lg whitespace-nowrap">${ada ? 'Lihat' : 'Upload'}</button>
                </div>`;
            }).join('');
            document.getElementById('akEvidenNotes').innerHTML = b.status === 'Perlu Perbaikan'
                ? '<span class="text-red-500 font-semibold">⚠ Perlu Perbaikan:</span> Bank soal belum memuat kisi-kisi HOTS. Mohon lengkapi dan susun ulang per tingkat kesukaran.'
                : b.status === 'Valid'
                    ? '<span class="text-emerald2 font-semibold">✓ Valid:</span> Dokumen lengkap, relevan, dan sesuai indikator. Disetujui reviewer internal.'
                    : '<span class="text-amber2 font-semibold">⏳ Menunggu Review:</span> Dokumen telah diunggah, menunggu verifikasi reviewer internal/Kepsek.';
            const m = document.getElementById('akEvidenModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeAkEviden() { const m = document.getElementById('akEvidenModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function akAjukanReview() {
            const nama = akCurrent ? akCurrent.kode : '';
            closeAkEviden();
            showToast('success', 'Eviden ' + nama + ' disimpan & diajukan untuk review internal');
        }

        // ---------- KEUANGAN — Ringkasan Keuangan ----------
        const rkCashflow = [
            { m: 'Jan', inc: 420, exp: 330 }, { m: 'Feb', inc: 445, exp: 350 }, { m: 'Mar', inc: 510, exp: 360 },
            { m: 'Apr', inc: 480, exp: 410 }, { m: 'Mei', inc: 520, exp: 390 }, { m: 'Jun', inc: 900, exp: 520 },
            { m: 'Jul', inc: 880, exp: 600 }, { m: 'Agu', inc: 610, exp: 430 }, { m: 'Sep', inc: 640, exp: 450 },
            { m: 'Okt', inc: 690, exp: 470 }, { m: 'Nov', inc: 660, exp: 460 }, { m: 'Des', inc: 700, exp: 480 }
        ];
        const rkDonutData = [
            { label: 'SPP Bulanan', v: 70, c: '#1E40AF' },
            { label: 'Uang Pangkal / Gedung', v: 15, c: '#0EA5E9' },
            { label: 'Dana BOS', v: 10, c: '#10B981' },
            { label: 'Unit Usaha / Kantin', v: 5, c: '#F59E0B' }
        ];
        const rkKelasData = [
            { k: '10-A', v: 95 }, { k: '10-B', v: 92 }, { k: '10-C', v: 88 }, { k: '11-A', v: 90 },
            { k: '11-B', v: 85 }, { k: '11-C', v: 80 }, { k: '12-A', v: 84 }, { k: '12-B', v: 76 }, { k: '12-C', v: 70 }
        ];
        const rkFeed = [
            { jam: '10:42', tgl: '18 Okt', nama: 'Keira Faza Aishanaya', kelas: '10-A', jenis: 'SPP Oktober', channel: 'VA BCA', nominal: 'Rp 750.000', status: 'Success' },
            { jam: '10:18', tgl: '18 Okt', nama: 'Bagas Pratama', kelas: '10-A', jenis: 'SPP Oktober', channel: 'QRIS', nominal: 'Rp 750.000', status: 'Success' },
            { jam: '09:55', tgl: '18 Okt', nama: 'Citra Ayu Lestari', kelas: '10-A', jenis: 'Uang Kegiatan', channel: 'Indomaret', nominal: 'Rp 250.000', status: 'Success' },
            { jam: '09:30', tgl: '18 Okt', nama: 'Dimas Anggara', kelas: '10-B', jenis: 'SPP Oktober', channel: 'VA Mandiri', nominal: 'Rp 800.000', status: 'Success' },
            { jam: '08:47', tgl: '18 Okt', nama: 'Eka Nurhaliza', kelas: '10-B', jenis: 'SPP Oktober', channel: 'Cash', nominal: 'Rp 750.000', status: 'Success' },
            { jam: '08:12', tgl: '18 Okt', nama: 'Gita Puspita Sari', kelas: '10-C', jenis: 'Uang Gedung (Cicilan)', channel: 'VA BCA', nominal: 'Rp 1.500.000', status: 'Success' },
            { jam: '07:58', tgl: '18 Okt', nama: 'Hadi Santoso', kelas: '10-C', jenis: 'SPP Oktober', channel: 'QRIS', nominal: 'Rp 750.000', status: 'Success' },
            { jam: '07:35', tgl: '18 Okt', nama: 'Fajar Ramadhan', kelas: '10-B', jenis: 'SPP Oktober', channel: 'VA BSI', nominal: 'Rp 750.000', status: 'Success' }
        ];
        const rkTunggakan = [
            { nama: 'Nadia Safira', kelas: '12-C', jenis: 'SPP Sep–Okt', nominal: 'Rp 1.500.000', due: 'Jatuh tempo 10 Okt' },
            { nama: 'Rafi Ahmad', kelas: '12-B', jenis: 'SPP Oktober', nominal: 'Rp 750.000', due: 'Jatuh tempo 10 Okt' },
            { nama: 'Bayu Setiadi', kelas: '11-C', jenis: 'Uang Kegiatan', nominal: 'Rp 250.000', due: 'Jatuh tempo 12 Okt' }
        ];
        let rkLoaded = false;

        function loadRingkasanKeuangan() {
            if (rkLoaded) return;
            setTimeout(() => { rkRenderAll(); rkLoaded = true; }, 500);
        }

        function rkRenderAll() {
            rkDrawCashflow();
            rkDrawDonut();
            rkDrawKelas();
            rkDrawFeed();
            rkDrawTunggakan();
        }

        function rkDrawCashflow() {
            const data = rkCashflow, W = 720, H = 240, padL = 42, padR = 12, padT = 16, padB = 28;
            const cw = W - padL - padR, ch = H - padT - padB;
            const max = Math.max(...data.map(d => Math.max(d.inc, d.exp))) * 1.1;
            const n = data.length, slot = cw / n, bw = slot * 0.28;
            let grid = '';
            for (let g = 0; g <= 4; g++) { const y = padT + ch * g / 4; grid += `<line x1="${padL}" y1="${y}" x2="${W - padR}" y2="${y}" stroke="#E2E8F0" stroke-width="1"/><text x="${padL - 6}" y="${y + 3}" text-anchor="end" font-size="8" fill="#94A3B8">${Math.round((max - max * g / 4))}</text>`; }
            let bars = '', labels = '', pts = [];
            data.forEach((d, i) => {
                const cx = padL + slot * i + slot / 2;
                const incH = d.inc / max * ch, expH = d.exp / max * ch;
                bars += `<rect x="${cx - bw - 1}" y="${padT + ch - incH}" width="${bw}" height="${incH}" rx="2" fill="#1E40AF"/>`;
                bars += `<rect x="${cx + 1}" y="${padT + ch - expH}" width="${bw}" height="${expH}" rx="2" fill="#F59E0B"/>`;
                const net = Math.max(0, d.inc - d.exp);
                pts.push([cx, padT + ch - (net / max * ch)]);
                labels += `<text x="${cx}" y="${H - 8}" text-anchor="middle" font-size="9" fill="#94A3B8">${d.m}</text>`;
            });
            const line = `<polyline fill="none" stroke="#10B981" stroke-width="2" points="${pts.map(p => p.join(',')).join(' ')}"/>` + pts.map(p => `<circle cx="${p[0]}" cy="${p[1]}" r="2.5" fill="#10B981"/>`).join('');
            document.getElementById('rkCashChart').innerHTML = `<svg viewBox="0 0 ${W} ${H}" class="w-full" style="height:240px">${grid}${bars}${line}${labels}</svg>`;
        }

        function rkDrawDonut() {
            let acc = 0;
            const segs = rkDonutData.map(d => { const s = acc; acc += d.v; return `${d.c} ${s}% ${acc}%`; }).join(', ');
            document.getElementById('rkDonut').style.background = `conic-gradient(${segs})`;
            document.getElementById('rkDonutLegend').innerHTML = rkDonutData.map(d =>
                `<li class="flex items-center gap-2"><span class="w-3 h-3 rounded" style="background:${d.c}"></span><span class="flex-1 text-slate-600">${d.label}</span><span class="font-bold text-slate-800">${d.v}%</span></li>`
            ).join('');
        }

        function rkDrawKelas() {
            document.getElementById('rkKelasChart').innerHTML = rkKelasData.map(d => {
                const warna = d.v >= 90 ? 'bg-emerald2' : d.v >= 80 ? 'bg-sky2' : 'bg-amber2';
                return `<div class="flex items-center gap-3"><span class="w-12 text-xs font-semibold text-slate-600">${d.k}</span><div class="flex-1 h-3 rounded-full bg-slate-100 overflow-hidden"><div class="h-full ${warna}" style="width:${d.v}%"></div></div><span class="w-10 text-right text-xs font-bold text-slate-700">${d.v}%</span></div>`;
            }).join('');
        }

        function rkDrawFeed() {
            document.getElementById('rkFeedCount').textContent = rkFeed.length + ' transaksi terbaru';
            document.getElementById('rkFeedBody').innerHTML = rkFeed.map(f => {
                const chIcon = f.channel.includes('VA') ? '🏦' : f.channel === 'QRIS' ? '📱' : f.channel === 'Cash' ? '💵' : '🏪';
                return `<tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3 text-xs"><p class="font-semibold text-slate-700">${f.jam}</p><p class="text-[11px] text-slate-400">${f.tgl}</p></td>
                    <td class="px-4 py-3"><p class="text-xs font-semibold text-slate-700">${f.nama}</p><p class="text-[11px] text-slate-400">Kelas ${f.kelas}</p></td>
                    <td class="px-4 py-3 text-xs text-slate-600">${f.jenis}</td>
                    <td class="px-4 py-3"><span class="text-[11px] font-semibold text-slate-600">${chIcon} ${f.channel}</span></td>
                    <td class="px-4 py-3 text-right text-xs font-bold text-slate-800 whitespace-nowrap">${f.nominal}</td>
                    <td class="px-4 py-3 text-center"><span class="text-[10px] font-bold text-emerald2 bg-emerald2/10 px-2 py-0.5 rounded-full">${f.status}</span></td>
                </tr>`;
            }).join('');
        }

        function rkDrawTunggakan() {
            document.getElementById('rkTunggakan').innerHTML = rkTunggakan.map(t =>
                `<div class="rounded-xl border border-red-100 bg-red-50/50 p-3">
                    <div class="flex items-center justify-between"><p class="text-xs font-semibold text-slate-700">${t.nama} <span class="text-slate-400">· ${t.kelas}</span></p><p class="text-xs font-bold text-red-500 whitespace-nowrap">${t.nominal}</p></div>
                    <p class="text-[11px] text-slate-500 mt-0.5">${t.jenis} · <span class="text-red-500 font-semibold">${t.due}</span></p>
                </div>`
            ).join('');
        }

        function rkExport() { showToast('success', 'Laporan Eksekutif (PDF/Excel) siap diunduh untuk Yayasan/Kepsek'); }
        function rkRefresh() {
            document.getElementById('rkLastSync').innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald2"></span> Sinkron terakhir: 18 Okt 2026 10:42';
            showToast('success', 'Data tersinkron real-time dengan bank & payment gateway');
        }
        function rkWaBlast() { showToast('success', 'Blast WA tagihan massal terkirim ke penanggung jawab tunggakan'); }

        // ---------- MODUL KHUSUS — Sentra Tahfidz & Tahsin ----------
        const thNilaiBadge = { 'A': 'bg-emerald2/10 text-emerald2', 'B': 'bg-sky2/10 text-sky2', 'C': 'bg-amber2/15 text-amber2' };
        const thNilaiLabel = { 'A': 'A - Mumtaz', 'B': 'B - Jayyid Jiddan', 'C': 'C - Jayyid' };
        let thSiswa = [
            { id: 1, inisial: 'KF', nama: 'Keira Faza Aishanaya', nisn: '0071234501', kelas: '10-A', halaqah: 'Halaqah 1 - Ust. Ahmad', program: 'Tahfidz Reguler', juz: 'Juz 29', terakhir: 'Al-Kahf: 1–20', tgl: '18 Okt 2026', nilai: 'A', capai: 92, target: 'Target 3 Juz' },
            { id: 2, inisial: 'BP', nama: 'Bagas Pratama', nisn: '0071234502', kelas: '10-A', halaqah: 'Halaqah 1 - Ust. Ahmad', program: 'Tahfidz Reguler', juz: 'Juz 28', terakhir: 'An-Naba: 1–40', tgl: '18 Okt 2026', nilai: 'B', capai: 75, target: 'Target 3 Juz' },
            { id: 3, inisial: 'CA', nama: 'Citra Ayu Lestari', nisn: '0071234503', kelas: '10-A', halaqah: 'Halaqah 1 - Ust. Ahmad', program: 'Tahsin', juz: 'Jilid 4', terakhir: 'Al-Baqarah: 255', tgl: '18 Okt 2026', nilai: 'A', capai: 88, target: 'Target Jilid 4' },
            { id: 4, inisial: 'DA', nama: 'Dimas Anggara', nisn: '0061234504', kelas: '10-B', halaqah: 'Halaqah 2 - Ustzh. B', program: 'Tahfidz Takhassus', juz: 'Juz 15', terakhir: 'Al-Isra: 1–30', tgl: '17 Okt 2026', nilai: 'B', capai: 60, target: 'Target 5 Juz' },
            { id: 5, inisial: 'EN', nama: 'Eka Nurhaliza', nisn: '0071234505', kelas: '10-B', halaqah: 'Halaqah 2 - Ustzh. B', program: 'Tahfidz Reguler', juz: 'Juz 30', terakhir: 'Al-Fajr: 1–30', tgl: '17 Okt 2026', nilai: 'C', capai: 45, target: 'Target 3 Juz' },
            { id: 6, inisial: 'FR', nama: 'Fajar Ramadhan', nisn: '0051234506', kelas: '10-B', halaqah: 'Halaqah 2 - Ustzh. B', program: 'Tahsin', juz: 'Jilid 3', terakhir: 'Al-Fatihah: 1–7', tgl: '16 Okt 2026', nilai: 'B', capai: 70, target: 'Target Jilid 3' },
            { id: 7, inisial: 'GP', nama: 'Gita Puspita Sari', nisn: '0071234507', kelas: '10-C', halaqah: 'Halaqah 3 - Ust. Fauzan', program: 'Tahfidz Reguler', juz: 'Juz 30', terakhir: 'An-Nas: 1–6', tgl: '18 Okt 2026', nilai: 'A', capai: 100, target: 'Target 3 Juz' },
            { id: 8, inisial: 'HS', nama: 'Hadi Santoso', nisn: '0061234508', kelas: '10-C', halaqah: 'Halaqah 3 - Ust. Fauzan', program: 'Tahfidz Reguler', juz: 'Juz 27', terakhir: 'Al-Qamar: 1–55', tgl: '15 Okt 2026', nilai: 'B', capai: 55, target: 'Target 3 Juz' }
        ];
        let thUjian = [
            { id: 1, nama: 'Keira Faza Aishanaya', kelas: '10-A', juz: 'Juz 29', tgl: '20 Okt 2026', penguji: 'Ust. Ahmad Fauzi (Internal)', tajwid: 95, fashahath: 92, adab: 96, status: 'Lulus / Mumtaz' },
            { id: 2, nama: 'Bagas Pratama', kelas: '10-A', juz: 'Juz 28', tgl: '20 Okt 2026', penguji: 'Ust. Ahmad Fauzi (Internal)', tajwid: 84, fashahath: 80, adab: 88, status: 'Lulus / Jayyid' },
            { id: 3, nama: 'Gita Puspita Sari', kelas: '10-C', juz: 'Juz 30 (Sekali Duduk)', tgl: '19 Okt 2026', penguji: 'KH. Abdullah (Eksternal)', tajwid: 97, fashahath: 95, adab: 98, status: 'Lulus / Mumtaz' },
            { id: 4, nama: 'Hadi Santoso', kelas: '10-C', juz: 'Juz 27', tgl: '19 Okt 2026', penguji: 'KH. Abdullah (Eksternal)', tajwid: 72, fashahath: 68, adab: 80, status: "Mengulang / Muroja'ah" },
            { id: 5, nama: 'Citra Ayu Lestari', kelas: '10-A', juz: 'Jilid 4 (Tahsin)', tgl: '18 Okt 2026', penguji: 'Ustzh. Maryam (Internal)', tajwid: 90, fashahath: 88, adab: 92, status: 'Lulus / Mumtaz' },
            { id: 6, nama: 'Dimas Anggara', kelas: '10-B', juz: 'Juz 15', tgl: '22 Okt 2026', penguji: 'Ust. Fauzan (Internal)', tajwid: 86, fashahath: 82, adab: 90, status: 'Lulus / Jayyid' }
        ];
        const thMasterTarget = [
            { tingkat: 'Kelas 7', target: 'Lulus Tahsin Jilid 1–4 & Hafal Juz 30' },
            { tingkat: 'Kelas 8', target: 'Hafal Juz 29 & 28 (Muroja\'ah Juz 30)' },
            { tingkat: 'Kelas 9', target: 'Hafal Juz 27 & 26 + Munaqasyah Juz 30' },
            { tingkat: 'Kelas 10', target: 'Hafal Juz 25–21 (Tahfidz Reguler)' },
            { tingkat: 'Kelas 11', target: 'Hafal Juz 20–16 (Tahfidz Takhassus)' },
            { tingkat: 'Kelas 12', target: "Khotmil Qur'an 30 Juz + Syahadah" }
        ];
        const thHalaqah = [
            { nama: 'Halaqah 1 - Ust. Ahmad', musyrif: 'Ust. Ahmad Fauzi, S.Pd.', jumlah: 12, program: 'Tahfidz Reguler' },
            { nama: 'Halaqah 2 - Ustzh. B', musyrif: 'Ustzh. Badi\'ah, S.Ag.', jumlah: 10, program: 'Tahfidz Takhassus' },
            { nama: 'Halaqah 3 - Ust. Fauzan', musyrif: 'Ust. Fauzan Hakim', jumlah: 11, program: 'Tahsin' }
        ];
        const thRubrik = [
            { aspek: 'Tajwid & Makhraj', isi: 'Ketepatan makhraj huruf, sifat huruf, hukum nun/tanwin, mad.' },
            { aspek: 'Kelancaran (Fashahath)', isi: 'Kefasihan, tidak tersendat, tempo bacaan tartil.' },
            { aspek: 'Adab & Tilaawah', isi: 'Adab membaca, tartil, kesungguhan, kebersihan huruf.' },
            { aspek: 'Ghorib & Musykilat', isi: 'Penguasaan bacaan ghorib (asing) dan musykilat.' },
            { aspek: 'Hafalan (Tahfidz)', isi: 'Ketepatan hafalan, sambung ayat, muroja\'ah mandiri.' },
            { aspek: 'Waqaf & Ibtida', isi: 'Ketepatan berhenti dan memulai bacaan.' }
        ];
        let thLoaded = false;
        let thNextId = 600;

        function thTab(name) {
            document.querySelectorAll('.th-tab-panel').forEach(p => p.classList.toggle('hidden', p.id !== 'th-tab-' + name));
            document.querySelectorAll('.th-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === name));
        }

        function thCapaianCat(v) { return v >= 100 ? 'Melampaui' : v >= 70 ? 'On Track' : 'Perlu Bimbingan'; }

        function loadTahfidz() {
            if (thLoaded) return;
            setTimeout(() => { renderThSiswa(); renderThUjian(); renderThMaster(); thLoaded = true; }, 500);
        }

        function renderThSiswa() {
            const q = (document.getElementById('thSearch').value || '').toLowerCase();
            const kel = document.getElementById('thFilterKelompok').value;
            const prog = document.getElementById('thFilterProgram').value;
            const cap = document.getElementById('thFilterCapaian').value;
            const rows = thSiswa.filter(s =>
                (!q || s.nama.toLowerCase().includes(q) || s.nisn.includes(q) || s.halaqah.toLowerCase().includes(q))
                && (!kel || s.halaqah === kel) && (!prog || s.program === prog) && (!cap || thCapaianCat(s.capai) === cap));
            document.getElementById('thEmpty').classList.toggle('hidden', rows.length > 0);
            document.getElementById('thBody').innerHTML = rows.map(s => {
                const barWarna = s.capai >= 100 ? 'bg-emerald2' : s.capai >= 70 ? 'bg-sky2' : 'bg-amber2';
                return `<tr class="hover:bg-slate-50/70 align-top">
                    <td class="px-4 py-3"><div class="flex items-center gap-3"><span class="w-10 h-10 rounded-full bg-navy/10 text-navy grid place-items-center font-heading font-bold text-xs flex-shrink-0">${s.inisial}</span><div><p class="font-semibold text-slate-700 text-xs">${s.nama}</p><p class="text-[11px] text-slate-400 font-mono">${s.nisn} · ${s.kelas}</p><p class="text-[11px] text-slate-400">${s.halaqah}</p></div></div></td>
                    <td class="px-4 py-3"><p class="text-xs font-semibold text-slate-600">${s.program}</p><span class="inline-block mt-1 text-[10px] font-bold bg-navy/10 text-navy px-2 py-0.5 rounded-full">${s.juz}</span></td>
                    <td class="px-4 py-3"><p class="text-xs text-slate-600">${s.terakhir}</p><p class="text-[11px] text-slate-400">${s.tgl}</p></td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${thNilaiBadge[s.nilai]} px-2 py-0.5 rounded-full">${thNilaiLabel[s.nilai]}</span></td>
                    <td class="px-4 py-3 min-w-[150px]"><div class="flex items-center gap-2"><div class="flex-1 h-2 rounded-full bg-slate-100 overflow-hidden"><div class="h-full ${barWarna}" style="width:${Math.min(100, s.capai)}%"></div></div><span class="text-xs font-bold text-slate-700">${s.capai}%</span></div><p class="text-[11px] text-slate-400 mt-1">${s.target}</p></td>
                    <td class="px-4 py-3"><div class="flex justify-end gap-1">
                        <button title="Detail Jurnal Setoran" onclick="openThJurnal(${s.id})" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">👁️</button>
                        <button title="Input Setoran Baru" onclick="openThInput('${s.nama}')" class="w-8 h-8 rounded-lg hover:bg-sky2/10 grid place-items-center text-sky2">✏️</button>
                        <button title="Kirim Laporan WA" onclick="thWaReport('${s.nama}')" class="w-8 h-8 rounded-lg hover:bg-emerald2/10 grid place-items-center text-emerald2">📲</button>
                    </div></td>
                </tr>`;
            }).join('');
        }

        ['thSearch', 'thFilterKelompok', 'thFilterProgram', 'thFilterCapaian'].forEach(id => { const el = document.getElementById(id); if (el) { el.addEventListener('input', renderThSiswa); el.addEventListener('change', renderThSiswa); } });

        function renderThUjian() {
            const badge = { 'Lulus / Mumtaz': 'bg-emerald2/10 text-emerald2', 'Lulus / Jayyid': 'bg-sky2/10 text-sky2', "Mengulang / Muroja'ah": 'bg-red-100 text-red-500' };
            const skor = v => `<span class="text-sm font-bold ${v >= 90 ? 'text-emerald2' : v >= 75 ? 'text-sky2' : 'text-amber2'}">${v}</span>`;
            document.getElementById('thUjianBody').innerHTML = thUjian.map(u => `
                <tr class="hover:bg-slate-50/70">
                    <td class="px-4 py-3"><p class="text-xs font-semibold text-slate-700">${u.nama}</p><p class="text-[11px] text-slate-400">${u.kelas} · ${u.juz}</p></td>
                    <td class="px-4 py-3"><p class="text-xs text-slate-600">${u.tgl}</p><p class="text-[11px] text-slate-400">${u.penguji}</p></td>
                    <td class="px-3 py-3 text-center">${skor(u.tajwid)}</td>
                    <td class="px-3 py-3 text-center">${skor(u.fashahath)}</td>
                    <td class="px-3 py-3 text-center">${skor(u.adab)}</td>
                    <td class="px-4 py-3"><span class="text-[11px] font-bold ${badge[u.status]} px-2 py-0.5 rounded-full">${u.status}</span></td>
                    <td class="px-4 py-3"><div class="flex justify-end gap-1">
                        <button title="Input Nilai Munaqasyah" onclick="showToast('info','Form input nilai munaqasyah: ${u.nama.replace(/'/g, '')}')" class="w-8 h-8 rounded-lg hover:bg-navy/10 grid place-items-center text-navy">📝</button>
                        <button title="Terbitkan Syahadah / Sertifikat PDF" onclick="thSyahadah('${u.nama}')" class="w-8 h-8 rounded-lg hover:bg-emerald2/10 grid place-items-center text-emerald2">🎓</button>
                    </div></td>
                </tr>`
            ).join('');
        }

        function renderThMaster() {
            document.getElementById('thMasterBody').innerHTML = thMasterTarget.map(t => `<tr class="hover:bg-slate-50/70"><td class="px-3 py-2 text-xs font-bold text-slate-700">${t.tingkat}</td><td class="px-3 py-2 text-xs text-slate-600">${t.target}</td></tr>`).join('');
            document.getElementById('thHalaqahList').innerHTML = thHalaqah.map(h => `
                <div class="flex items-center gap-3 rounded-2xl border border-slate-100 p-3">
                    <span class="w-9 h-9 rounded-xl bg-navy/10 text-navy grid place-items-center text-sm">🕌</span>
                    <div class="flex-1 min-w-0"><p class="text-xs font-semibold text-slate-700 truncate">${h.nama}</p><p class="text-[11px] text-slate-400">${h.musyrif} · ${h.program}</p></div>
                    <span class="text-[11px] font-bold text-navy bg-navy/10 px-2 py-0.5 rounded-full whitespace-nowrap">${h.jumlah} siswa</span>
                </div>`
            ).join('');
            document.getElementById('thRubrikList').innerHTML = thRubrik.map(r => `
                <div class="rounded-2xl border border-slate-100 p-3">
                    <p class="text-xs font-bold text-slate-700">${r.aspek}</p>
                    <p class="mt-1 text-[11px] text-slate-500 leading-relaxed">${r.isi}</p>
                </div>`
            ).join('');
        }

        function openThJurnal(id) {
            const s = thSiswa.find(x => x.id === id);
            if (!s) return;
            document.getElementById('thJurnalAvatar').textContent = s.inisial;
            document.getElementById('thJurnalNama').textContent = s.nama;
            document.getElementById('thJurnalSub').textContent = s.kelas + ' · ' + s.halaqah + ' · ' + s.program;
            const log = [
                { tgl: s.tgl, surah: s.terakhir, nilai: s.nilai, cat: 'Setoran lancar, perhatikan mad thabi\'i.' },
                { tgl: '15 Okt 2026', surah: 'Al-Mulk: 1–30', nilai: 'B', cat: 'Perlu perbaikan makhraj huruf tebal.' },
                { tgl: '13 Okt 2026', surah: 'At-Tahrim: 1–12', nilai: 'B', cat: 'Muroja\'ah lancar.' },
                { tgl: '11 Okt 2026', surah: 'At-Talaq: 1–12', nilai: 'A', cat: 'Sangat baik, pertahankan.' }
            ];
            document.getElementById('thJurnalBody').innerHTML = '<div class="space-y-3">' + log.map(l => `
                <div class="flex gap-3">
                    <div class="flex flex-col items-center"><span class="w-9 h-9 rounded-full ${thNilaiBadge[l.nilai]} grid place-items-center font-bold text-xs flex-shrink-0">${l.nilai}</span><span class="flex-1 w-px bg-slate-200 my-1"></span></div>
                    <div class="flex-1 pb-2"><div class="flex items-center justify-between gap-2"><p class="text-sm font-semibold text-slate-700">${l.surah}</p><span class="text-[11px] text-slate-400 whitespace-nowrap">${l.tgl}</span></div><p class="text-[11px] text-slate-500 mt-0.5">${l.cat}</p></div>
                </div>`
            ).join('') + '</div>';
            const m = document.getElementById('thJurnalModal'); m.classList.remove('hidden');
        }
        function closeThJurnal() { document.getElementById('thJurnalModal').classList.add('hidden'); }

        function openThInput(nama) {
            document.getElementById('thSiswaList').innerHTML = thSiswa.map(s => '<option value="' + s.nama + '">' + s.kelas + '</option>').join('');
            document.getElementById('thInSiswa').value = nama || '';
            const m = document.getElementById('thInputModal'); m.classList.remove('hidden'); m.classList.add('flex');
        }
        function closeThInput() { const m = document.getElementById('thInputModal'); m.classList.add('hidden'); m.classList.remove('flex'); }

        function submitThInput() {
            const nama = document.getElementById('thInSiswa').value.trim();
            if (!nama) { showToast('warning', 'Nama siswa wajib diisi'); return; }
            const nilai = document.getElementById('thInNilai').value;
            const surah = document.getElementById('thInSurah').value.trim() || '-';
            const juz = document.getElementById('thInJuz').value.trim() || '-';
            const inisial = nama.split(' ').map(w => w[0]).slice(0, 2).join('').toUpperCase();
            const found = thSiswa.find(s => s.nama === nama);
            if (found) { found.nilai = nilai; found.terakhir = surah; found.juz = juz; found.tgl = '18 Okt 2026'; found.capai = Math.min(100, found.capai + 5); }
            else { thSiswa.unshift({ id: thNextId++, inisial: inisial, nama: nama, nisn: '0000000000', kelas: '10-A', halaqah: document.getElementById('thInHalaqah').value, program: document.getElementById('thInProgram').value, juz: juz, terakhir: surah, tgl: '18 Okt 2026', nilai: nilai, capai: 20, target: 'Target 3 Juz' }); }
            closeThInput();
            renderThSiswa();
            showToast('success', 'Setoran ' + nama + ' tersimpan & progress auto-sync' + ' · resume WA terkirim ke ortu');
        }

        function thWaReport(nama) { showToast('success', 'Resume setoran ' + nama + ' dikirim ke WhatsApp orang tua'); }
        function thSyahadah(nama) { showToast('success', 'Syahadah PDF ' + nama + ' terbit (ber-QR Code & TTD)'); }
        function thExport() { showToast('success', 'Progress Tahfidz diekspor (.xlsx)'); }

        // ---------- Generic in-page data tables ----------
        const statusPillMap = {
            'Terverifikasi': 'bg-emerald2/10 text-emerald2', 'Lunas': 'bg-emerald2/10 text-emerald2',
            'Selesai': 'bg-emerald2/10 text-emerald2', 'Aktif': 'bg-emerald2/10 text-emerald2',
            'OK': 'bg-emerald2/10 text-emerald2', 'Menunggu': 'bg-amber2/15 text-amber2',
            'Perlu Review': 'bg-amber2/15 text-amber2', 'Draft': 'bg-slate-200 text-slate-600',
            'Diblokir': 'bg-red-100 text-red-600', 'Ditolak': 'bg-red-100 text-red-600',
            'Tunggakan': 'bg-red-100 text-red-600'
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
            'administratif-pegawai': [
                ['Ibu Ratna Wulandari', '1987041203', 'SK Mengajar 2026/2027', 'PDF · 1.2 MB', '~Terverifikasi'],
                ['Bpk. Andi Saputra', '1990032205', 'Sertifikat Pendidik', 'PDF · 0.8 MB', '~Terverifikasi'],
                ['Ibu Siti Aminah', '1988110510', 'Kontrak GTT', 'PDF · 0.5 MB', '~Menunggu'],
                ['Bpk. Yusuf Hakim', '1992053011', 'SK Pembina Ekskul', 'PDF · 0.6 MB', '~Terverifikasi'],
                ['Ibu Dewi Lestari', '1994091807', 'Ijazah & Transkrip', 'ZIP · 3.4 MB', '~Draft']
            ],
            'pensiun': [
                ['Bpk. Slamet Riyadi', '1965021019', 'Pensiun (BUP)', '01 Nov 2026', '~Menunggu'],
                ['Ibu Endang S.', '1967062215', 'Pensiun (BUP)', '01 Des 2026', '~Perlu Review'],
                ['Bpk. Agus Salim', '1980031112', 'Pengunduran Diri', '15 Okt 2026', '~Selesai'],
                ['Ibu Nurul Hidayah', '1979090230', 'Pensiun (APS)', '01 Jan 2027', '~Menunggu']
            ],
            'kehadiran-pegawai': [
                ['Ibu Ratna Wulandari', 'Guru Matematika', '26', '1', '0', '0'],
                ['Bpk. Andi Saputra', 'Guru Fisika', '25', '2', '1', '0'],
                ['Ibu Siti Aminah', 'Guru B. Indonesia', '24', '1', '1', '1'],
                ['Bpk. Yusuf Hakim', 'Guru Biologi', '27', '0', '0', '0'],
                ['Ibu Dewi Lestari', 'Guru Kimia', '26', '1', '0', '0']
            ],
            'bank-soal': [
                ['Bank Soal PAS Ganjil', 'Matematika', 'X-A', 'Soal', 'Ibu Ratna', '~Terverifikasi'],
                ['Modul Ajar Fisika Bab 3', 'Fisika', 'XI-C', 'Modul', 'Bpk. Andi', '~Terverifikasi'],
                ['Media Interaktif Sel', 'Biologi', 'X-B', 'Media', 'Bpk. Yusuf', '~Menunggu'],
                ['Tugas Esai Argumentasi', 'B. Indonesia', 'XII-D', 'Tugas', 'Ibu Siti', '~Draft'],
                ['Video Stoikiometri', 'Kimia', 'XI-A', 'Media', 'Ibu Dewi', '~Terverifikasi']
            ],
            'cbt': [
                ['PTS Ganjil', 'Matematika', 'X-A', '20 Okt 2026', '32', '~Selesai'],
                ['PTS Ganjil', 'Fisika', 'XI-C', '21 Okt 2026', '28', '~Selesai'],
                ['PAS Ganjil', 'B. Indonesia', 'XII-D', '01 Des 2026', '26', '~Menunggu'],
                ['Try Out UTBK', 'Kimia', 'XII', '15 Nov 2026', '54', '~Draft']
            ],
            'jadwal': [
                ['Senin', '07:15 - 08:45', 'X-A', 'Matematika', 'Ibu Ratna', 'R-101'],
                ['Senin', '07:15 - 08:45', 'XI-C', 'Fisika', 'Bpk. Andi', 'R-204'],
                ['Senin', '08:45 - 10:15', 'XII-D', 'B. Indonesia', 'Ibu Siti', 'R-305'],
                ['Selasa', '07:15 - 08:45', 'X-B', 'Biologi', 'Bpk. Yusuf', 'Lab-Bio'],
                ['Selasa', '10:15 - 11:45', 'XI-A', 'Kimia', 'Ibu Dewi', 'Lab-Kim']
            ],
            'kpi-guru': [
                ['Ibu Ratna Wulandari', 'Matematika', '98%', '85,2', '92', 'A'],
                ['Bpk. Andi Saputra', 'Fisika', '95%', '82,1', '88', 'A'],
                ['Ibu Siti Aminah', 'B. Indonesia', '90%', '80,4', '85', 'B'],
                ['Bpk. Yusuf Hakim', 'Biologi', '99%', '84,0', '90', 'A'],
                ['Ibu Dewi Lestari', 'Kimia', '96%', '83,1', '89', 'A']
            ],
            'erapor': [
                ['X-A', 'Rina, M.Pd.', '32', '100%', '47', '~Selesai'],
                ['X-B', 'Dwi, S.Pd.', '30', '86%', '30', '~Menunggu'],
                ['XI-C', 'Sari, S.Kom.', '28', '72%', '18', '~Menunggu'],
                ['XII-D', 'Hadi, M.Si.', '26', '64%', '0', '~Perlu Review']
            ],
            'majalah': [
                ['Vol 12 · Okt 2026', 'Nusantara Cerdas', 'Majalah Sekolah', '18 Okt 2026', '~Terverifikasi'],
                ['Vol 11 · Sep 2026', 'Inovasi Digital', 'Majalah Sekolah', '18 Sep 2026', '~Terverifikasi'],
                ['Edisi Khusus', 'Pekan Sains 2026', 'Edutainment', '10 Sep 2026', '~Selesai'],
                ['Vol 10 · Agu 2026', 'Prestasi Siswa', 'Edutainment', '18 Agu 2026', '~Draft']
            ],
            'buku-tamu': [
                ['09:12', 'Bpk. Hermawan', 'Dinas Pendidikan', 'Monitoring sekolah', '~Selesai'],
                ['09:40', 'Ibu Kartika', 'PT EduTech', 'Demo produk', '~Selesai'],
                ['10:05', 'Bpk. Sudirman', 'Orang Tua Siswa', 'Konsultasi', '~Selesai'],
                ['13:20', 'Ibu Larasati', 'Universitas Merdeka', 'Sosialisasi kampus', '~Menunggu']
            ],
            'ringkasan-siswa': [
                ['VIII-A', '17', '15', '32', '32', 'Rina, M.Pd.'],
                ['VIII-B', '16', '14', '30', '30', 'Dwi, S.Pd.'],
                ['IX-A', '15', '13', '28', '28', 'Sari, S.Kom.'],
                ['IX-B', '14', '12', '26', '25', 'Hadi, M.Si.'],
                ['VII-A', '18', '16', '34', '34', 'Nur, S.Pd.']
            ],
            'keuangan-metode1': [
                ['09:44', 'Keira Faza', 'SPP Okt', 'Rp 350.000', 'VA BCA', '~Lunas'],
                ['09:38', 'Bagas Pratama', 'SPP Okt', 'Rp 350.000', 'QRIS', '~Lunas'],
                ['09:31', 'Citra Ayu', 'Kas Keluar', 'Rp 2.400.000', 'Transfer', '~Selesai'],
                ['09:20', 'Dimas Anggara', 'SPP Okt', 'Rp 350.000', 'VA Mandiri', '~Lunas'],
                ['09:02', 'Fajar Ramadhan', 'SPP Okt', 'Rp 350.000', 'Indomaret', '~Lunas']
            ],
            'keuangan-metode2': [
                ['18 Okt', '1-1100', 'Kas', 'Rp 12.400.000', '-', 'Rp 1.284.500.000'],
                ['18 Okt', '4-2100', 'Pendapatan SPP', '-', 'Rp 8.400.000', 'Rp 1.284.500.000'],
                ['18 Okt', '5-3100', 'Beban Gaji', 'Rp 6.800.000', '-', 'Rp 1.284.500.000'],
                ['17 Okt', '1-1200', 'Bank', 'Rp 4.200.000', '-', 'Rp 1.284.500.000']
            ],
            'daftar-tagihan': [
                ['Keira Faza', 'SPP', 'Okt 2026', 'Rp 350.000', '10 Okt 2026', '~Lunas'],
                ['Bagas Pratama', 'SPP', 'Okt 2026', 'Rp 350.000', '10 Okt 2026', '~Lunas'],
                ['Citra Ayu', 'Uang Kegiatan', 'Okt 2026', 'Rp 150.000', '15 Okt 2026', '~Menunggu'],
                ['Dimas Anggara', 'SPP', 'Sep-Okt', 'Rp 700.000', '10 Okt 2026', '~Tunggakan'],
                ['Fajar Ramadhan', 'Seragam', 'Ganjil 2026', 'Rp 450.000', '20 Okt 2026', '~Menunggu']
            ],
            'grup-tagihan': [
                ['SPP Kelas X', 'SPP', '92 siswa', 'Rp 350.000', 'Okt 2026', '~Terverifikasi'],
                ['SPP Kelas XI', 'SPP', '84 siswa', 'Rp 375.000', 'Okt 2026', '~Terverifikasi'],
                ['Uang Kegiatan Ganjil', 'Insidental', '248 siswa', 'Rp 150.000', 'Ganjil 2026', '~Menunggu'],
                ['Seragam Olahraga', 'Insidental', '120 siswa', 'Rp 180.000', 'Ganjil 2026', '~Draft']
            ],
            'monitoring-tagihan': [
                ['X-A', 'Rp 11.200.000', 'Rp 10.640.000', 'Rp 560.000', '95%'],
                ['X-B', 'Rp 10.500.000', 'Rp 9.240.000', 'Rp 1.260.000', '88%'],
                ['XI-C', 'Rp 9.800.000', 'Rp 7.056.000', 'Rp 2.744.000', '72%'],
                ['XII-D', 'Rp 9.100.000', 'Rp 5.824.000', 'Rp 3.276.000', '64%']
            ],
            'rekap-spp': [
                ['Agustus 2026', 'Rp 420.000.000', 'Rp 403.200.000', 'Rp 16.800.000', '96%'],
                ['September 2026', 'Rp 420.000.000', 'Rp 386.400.000', 'Rp 33.600.000', '92%'],
                ['Oktober 2026', 'Rp 420.000.000', 'Rp 365.400.000', 'Rp 54.600.000', '87%'],
                ['November 2026', 'Rp 420.000.000', 'Rp 0', 'Rp 420.000.000', '0%']
            ],
            'emoney-siswa': [
                ['Keira Faza', 'VIII-A', 'Rp 85.000', 'Rp 20.000', '~Aktif'],
                ['Bagas Pratama', 'VIII-A', 'Rp 42.500', 'Rp 15.000', '~Aktif'],
                ['Citra Ayu', 'VIII-B', 'Rp 120.000', 'Rp 25.000', '~Aktif'],
                ['Dimas Anggara', 'IX-A', 'Rp 0', 'Rp 10.000', '~Diblokir']
            ],
            'emoney-pegawai': [
                ['Ibu Ratna Wulandari', '1987041203', 'Rp 250.000', '12 Okt 2026', '~Aktif'],
                ['Bpk. Andi Saputra', '1990032205', 'Rp 175.000', '10 Okt 2026', '~Aktif'],
                ['Ibu Siti Aminah', '1988110510', 'Rp 90.000', '05 Okt 2026', '~Aktif'],
                ['Bpk. Yusuf Hakim', '1992053011', 'Rp 310.000', '17 Okt 2026', '~Aktif']
            ],
            'tabungan-siswa': [
                ['Keira Faza', 'VIII-A', 'Rp 1.250.000', 'Rp 100.000', '~Aktif'],
                ['Bagas Pratama', 'VIII-A', 'Rp 850.000', 'Rp 50.000', '~Aktif'],
                ['Citra Ayu', 'VIII-B', 'Rp 2.100.000', 'Rp 200.000', '~Aktif'],
                ['Dimas Anggara', 'IX-A', 'Rp 400.000', 'Rp 0', '~Menunggu']
            ],
            'infaq': [
                ['18 Okt', 'Hamba Allah', 'Pembangunan Masjid', 'Rp 1.000.000', 'Transfer'],
                ['18 Okt', 'Keluarga Bpk. Hadi', 'Beasiswa Yatim', 'Rp 500.000', 'QRIS'],
                ['17 Okt', 'Ibu Ratna', 'Infaq Harian', 'Rp 50.000', 'E-Money'],
                ['17 Okt', 'Alumni 2022', 'Beasiswa Yatim', 'Rp 2.500.000', 'Transfer']
            ],
            'laporan-kantin': [
                ['Kantin Bu Yati', 'Rp 28.450.000', '1.842', 'Rp 2.845.000', '~Selesai'],
                ['Koperasi Siswa', 'Rp 15.200.000', '980', 'Rp 1.520.000', '~Selesai'],
                ['Minuman Segar', 'Rp 9.750.000', '645', 'Rp 975.000', '~Menunggu'],
                ['Jajanan Tradisional', 'Rp 6.300.000', '412', 'Rp 630.000', '~Menunggu']
            ],
            'slip-gaji': [
                ['Ibu Ratna Wulandari', '1987041203', 'Oktober 2026', 'Rp 5.450.000', '~Selesai'],
                ['Bpk. Andi Saputra', '1990032205', 'Oktober 2026', 'Rp 5.100.000', '~Selesai'],
                ['Ibu Siti Aminah', '1988110510', 'Oktober 2026', 'Rp 4.850.000', '~Menunggu'],
                ['Bpk. Yusuf Hakim', '1992053011', 'Oktober 2026', 'Rp 5.200.000', '~Selesai']
            ],
            'metode-pembayaran': [
                ['Virtual Account BCA', 'Bank', 'Rp 2.500', 'T+1', '~Aktif'],
                ['QRIS', 'E-Wallet', 'Rp 1.500', 'H+0', '~Aktif'],
                ['DANA', 'E-Wallet', 'Rp 1.500', 'H+0', '~Aktif'],
                ['Indomaret', 'Gerai Retail', 'Rp 5.000', 'T+2', '~Aktif'],
                ['Tunai (Kasir)', 'Tunai', 'Rp 0', 'H+0', '~Aktif']
            ],
            'smartcard': [
                ['Ibu Ratna Wulandari', '06:58', 'KRT-0041', 'Gerbang Utama', '12 m', '~OK'],
                ['Bpk. Andi Saputra', '07:02', 'KRT-0055', 'Gerbang Utama', '8 m', '~OK'],
                ['Ibu Siti Aminah', '07:15', 'KRT-0062', 'Gerbang Utama', '45 m', '~Perlu Review'],
                ['Bpk. Yusuf Hakim', '06:55', 'KRT-0070', 'Gerbang Belakang', '30 m', '~OK']
            ],
            'kartu-karakter': [
                ['VIII-A', '32', '32', '32', '~Selesai'],
                ['VIII-B', '30', '30', '28', '~Menunggu'],
                ['IX-A', '28', '28', '28', '~Selesai'],
                ['IX-B', '26', '20', '0', '~Draft']
            ],
            'sentra-kehadiran': [
                ['19 Okt', 'VIII-A', '30', '1', '1', '0'],
                ['19 Okt', 'VIII-B', '28', '0', '2', '0'],
                ['19 Okt', 'IX-A', '26', '1', '0', '1'],
                ['19 Okt', 'IX-B', '24', '0', '1', '1']
            ],
            'seminar': [
                ['Workshop Kurikulum Merdeka', '22 Okt 2026', 'Kepala Sekolah', '64', 'Zoom', '~Menunggu'],
                ['Rapat Evaluasi Ganjil', '19 Okt 2026', 'Waka Kurikulum', '42', 'Google Meet', '~Selesai'],
                ['Seminar Literasi Digital', '05 Nov 2026', 'Dinas Pendidikan', '120', 'Zoom', '~Menunggu'],
                ['MGMP Matematika', '28 Okt 2026', 'Ibu Ratna', '18', 'Zoom', '~Draft']
            ],
            'pusat-dokumen': [
                ['SK Pembagian Tugas', 'Kepegawaian', '1.1 MB', 'Tata Usaha', '12 Okt 2026'],
                ['Kalender Akademik 2026/2027', 'Akademik', '0.8 MB', 'Waka Kurikulum', '01 Agu 2026'],
                ['Laporan Akreditasi', 'Akreditasi', '4.2 MB', 'Tim Akreditasi', '20 Sep 2026'],
                ['Nota Kesepahaman Yayasan', 'Legal', '0.5 MB', 'Kepala Sekolah', '15 Jul 2026']
            ],
            'audit-admin': [
                ['09:45', 'admin.operator', 'Administrasi', 'Menambah data siswa', '10.0.0.5', '~OK'],
                ['09:38', 'bendahara', 'Keuangan', 'Terbitkan tagihan SPP', '10.0.0.14', '~OK'],
                ['09:15', 'operator.tidak.dikenal', '-', 'Percobaan login gagal (3x)', '103.28.x.x', '~Ditolak'],
                ['08:50', 'wali.kelas.8a', 'Guru', 'Input nilai harian', '10.0.0.33', '~OK'],
                ['08:12', 'kepsek', 'Kepala Sekolah', 'Lihat laporan keuangan', '10.0.0.2', '~OK']
            ],
            'backup': [
                ['19 Okt 02:00', 'Otomatis', '412 MB', 'Cloud Storage', '~Selesai'],
                ['18 Okt 02:00', 'Otomatis', '410 MB', 'Cloud Storage', '~Selesai'],
                ['17 Okt 14:20', 'Manual', '409 MB', 'Local Server', '~Selesai'],
                ['16 Okt 02:00', 'Otomatis', '405 MB', 'Cloud Storage', '~Selesai']
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
            const colors = {
                success: 'bg-emerald2', error: 'bg-red-500', info: 'bg-navy', warning: 'bg-amber2'
            };
            const icons = { success: '✓', error: '✕', info: 'ℹ', warning: '!' };
            const wrap = document.getElementById('toastWrap');
            const t = document.createElement('div');
            t.className = colors[type] + ' text-white text-sm font-semibold px-4 py-3 rounded-xl shadow-lg flex items-center gap-2 max-w-xs transform translate-x-full transition-transform duration-300';
            t.innerHTML = '<span class="w-6 h-6 rounded-full bg-white/20 grid place-items-center text-xs">' + icons[type] + '</span>' + msg;
            wrap.appendChild(t);
            requestAnimationFrame(() => t.classList.remove('translate-x-full'));
            setTimeout(() => { t.classList.add('translate-x-full'); setTimeout(() => t.remove(), 300); }, 3200);
        }
    </script>
</body>

</html>
