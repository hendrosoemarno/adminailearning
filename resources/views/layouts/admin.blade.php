<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        slate: {
                            850: '#151f32',
                            900: '#0f172a',
                            950: '#020617',
                        },
                        primary: {
                            DEFAULT: '#3b82f6',
                            glow: 'rgba(59, 130, 246, 0.5)',
                        },
                        accent: {
                            DEFAULT: '#06b6d4',
                            glow: 'rgba(6, 182, 212, 0.5)',
                        }
                    },
                    backgroundImage: {
                        'futuristic-gradient': 'radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.15) 0px, transparent 50%), radial-gradient(at 100% 100%, rgba(6, 182, 212, 0.15) 0px, transparent 50%)',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar for Webkit */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0f172a;
        }

        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }

        /* Date picker color scheme fix */
        input[type="date"] {
            color-scheme: dark;
        }
    </style>
    @yield('styles')
</head>

<body
    class="bg-slate-900 text-slate-50 font-sans antialiased min-h-screen flex flex-col md:flex-row bg-futuristic-gradient overflow-x-hidden selection:bg-cyan-500 selection:text-white">

    <!-- Mobile Header -->
    <div
        class="md:hidden flex items-center justify-between p-4 bg-slate-900/80 backdrop-blur-md border-b border-slate-700 sticky top-0 z-50">
        <div class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-cyan-400">
            AdminPanel
        </div>
        <button id="mobile-menu-btn" class="text-slate-300 hover:text-white focus:outline-none p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>

    <!-- Sidebar Overlay -->
    <div id="sidebar-overlay"
        class="fixed inset-0 bg-black/50 z-40 hidden md:hidden glass transition-opacity duration-300"
        onclick="toggleMobileSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900/90 backdrop-blur-xl border-r border-slate-700/50 transform -translate-x-full md:translate-x-0 transition-all duration-300 ease-in-out md:relative md:flex md:flex-col justify-between shadow-2xl overflow-hidden group">

        <!-- Toggle Button for Desktop -->
        <button id="sidebar-toggle-btn"
            class="hidden md:flex absolute -right-3 top-1/2 -translate-y-1/2 w-6 h-12 bg-slate-800 border border-slate-700 rounded-full items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 transition-all z-50 shadow-lg">
            <svg id="toggle-icon" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <div>
            <!-- Logo Desktop -->
            <div
                class="hidden md:flex items-center justify-between h-16 px-6 border-b border-slate-700/50 overflow-hidden">
                <span id="logo-text"
                    class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-cyan-400 tracking-wide whitespace-nowrap transition-all duration-300">
                    AdminPanel
                </span>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-2">
                @if(Auth::guard('tentor')->check() && request()->is('portal*'))
                    <!-- TENTOR MENU -->
                    <a href="{{ route('tentor.dashboard') }}"
                        class="flex items-center px-4 py-3 rounded-lg group transition-all duration-200 {{ request()->routeIs('tentor.dashboard') ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}"
                        title="Dashboard Tentor">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 {{ request()->routeIs('tentor.dashboard') ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                        <span class="font-medium ml-3 sidebar-label transition-all duration-300 whitespace-nowrap">Dashboard
                            Tentor</span>
                    </a>
                    <a href="{{ route('tentor.profile.edit') }}"
                        class="flex items-center px-4 py-3 rounded-lg group transition-all duration-200 {{ request()->routeIs('tentor.profile.edit') ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}"
                        title="Ubah Profil">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 {{ request()->routeIs('tentor.profile.edit') ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="font-medium ml-3 sidebar-label transition-all duration-300 whitespace-nowrap">Ubah
                            Profil</span>
                    </a>
                    <a href="{{ route('tentor.schedule.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg group transition-all duration-200 {{ request()->routeIs('tentor.schedule.*') ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}"
                        title="Jadwal Saya">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 {{ request()->routeIs('tentor.schedule.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <span class="font-medium ml-3 sidebar-label transition-all duration-300 whitespace-nowrap">Jadwal
                            Saya</span>
                    </a>
                    <a href="{{ route('tentor.presensi.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg group transition-all duration-200 {{ request()->routeIs('tentor.presensi.*') ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}"
                        title="Presensi Mengajar">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 {{ request()->routeIs('tentor.presensi.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </div>
                        <span class="font-medium ml-3 sidebar-label transition-all duration-300 whitespace-nowrap">Presensi
                            Mengajar</span>
                    </a>
                @else
                    <!-- DASHBOARD -->
                    <div class="px-4 pt-4 pb-2">
                        <span
                            class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] sidebar-label">Dashboard</span>
                    </div>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-4 py-3 rounded-lg group transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}"
                        title="Dashboard Admin">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="font-medium ml-3 sidebar-label transition-all duration-300 whitespace-nowrap">Dashboard</span>
                    </a>

                    <!-- SISWA -->
                    <div class="space-y-1">
                        <button type="button" onclick="toggleSubmenu('siswa-menu')"
                            class="w-full flex items-center justify-between px-4 py-3 rounded-lg group transition-all duration-200 text-slate-400 hover:bg-slate-800 hover:text-slate-100">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-slate-500 group-hover:text-slate-300" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                </div>
                                <span
                                    class="font-medium ml-3 sidebar-label transition-all duration-300 whitespace-nowrap">Siswa</span>
                            </div>
                            <svg id="siswa-menu-arrow" class="w-4 h-4 transition-transform duration-200 sidebar-label"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div id="siswa-menu" class="hidden pl-4 space-y-1 overflow-hidden">
                            <a href="{{ route('quiz-attempts') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('quiz-attempts') ? 'text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Quiz Attempts</span>
                            </a>
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('dashboard') && !request()->routeIs('quiz-attempts') ? 'text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Data User</span>
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2 rounded-lg text-sm text-slate-400 hover:bg-slate-800 hover:text-slate-100">
                                <span class="sidebar-label">Siswa-Tarif</span>
                            </a>
                        </div>
                    </div>

                    <!-- TENTOR -->
                    <div class="space-y-1">
                        <button type="button" onclick="toggleSubmenu('tentor-menu')"
                            class="w-full flex items-center justify-between px-4 py-3 rounded-lg group transition-all duration-200 text-slate-400 hover:bg-slate-800 hover:text-slate-100">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-slate-500 group-hover:text-slate-300" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                        </path>
                                    </svg>
                                </div>
                                <span
                                    class="font-medium ml-3 sidebar-label transition-all duration-300 whitespace-nowrap">Tentor</span>
                            </div>
                            <svg id="tentor-menu-arrow" class="w-4 h-4 transition-transform duration-200 sidebar-label"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div id="tentor-menu" class="hidden pl-4 space-y-1 overflow-hidden">
                            <a href="{{ route('tentor-siswa.active') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('tentor-siswa.active') ? 'text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Tentor Aktif</span>
                            </a>
                            <a href="{{ route('tentor-siswa.all-schedules') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('tentor-siswa.all-schedules') ? 'text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Master Jadwal</span>
                            </a>
                            <a href="{{ route('tentor-siswa.available', ['mapel' => 'mat']) }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request('mapel') == 'mat' ? 'text-emerald-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Jadwal Bisa Mat</span>
                            </a>
                            <a href="{{ route('tentor-siswa.available', ['mapel' => 'bing']) }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request('mapel') == 'bing' ? 'text-emerald-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Jadwal Bisa Bing</span>
                            </a>
                            <a href="{{ route('monitoring.index') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('monitoring.*') ? 'text-amber-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Monitoring Jadwal</span>
                            </a>
                            <a href="{{ route('presensi-monitoring.create') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('presensi-monitoring.create') ? 'text-emerald-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Telah Monitoring</span>
                            </a>
                            <a href="{{ route('presensi-monitoring.index') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ (request()->routeIs('presensi-monitoring.*') && !request()->routeIs('presensi-monitoring.create')) ? 'text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Data Log Monitoring</span>
                            </a>
                            <a href="{{ route('presensi.index') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('presensi.index') ? 'text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Data Presensi</span>
                            </a>
                            <a href="{{ route('tentors.index') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('tentors.*') ? 'text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Data Tentor</span>
                            </a>
                        </div>
                    </div>

                    <!-- ADMIN -->
                    <div class="space-y-1">
                        <button type="button" onclick="toggleSubmenu('admin-menu')"
                            class="w-full flex items-center justify-between px-4 py-3 rounded-lg group transition-all duration-200 text-slate-400 hover:bg-slate-800 hover:text-slate-100">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-slate-500 group-hover:text-slate-300" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </div>
                                <span
                                    class="font-medium ml-3 sidebar-label transition-all duration-300 whitespace-nowrap">Admin</span>
                            </div>
                            <svg id="admin-menu-arrow" class="w-4 h-4 transition-transform duration-200 sidebar-label"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div id="admin-menu" class="hidden pl-4 space-y-1 overflow-hidden">
                            <a href="{{ route('useradmins.index') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('useradmins.*') ? 'text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Kelola Admin</span>
                            </a>
                            <div class="space-y-1">
                                <button type="button" onclick="toggleSubmenu('biaya-menu')"
                                    class="w-full flex items-center justify-between px-4 py-3 rounded-lg group transition-all duration-200 {{ request()->routeIs('biaya.*') ? 'bg-blue-500/10 text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="w-5 h-5 {{ request()->routeIs('biaya.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300' }}"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span
                                            class="font-medium ml-3 sidebar-label transition-all duration-300 whitespace-nowrap">Biaya</span>
                                    </div>
                                    <svg id="biaya-menu-arrow"
                                        class="w-4 h-4 transition-transform duration-200 sidebar-label {{ request()->routeIs('biaya.*') ? 'rotate-180' : '' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="biaya-menu"
                                    class="{{ request()->routeIs('biaya.*') ? '' : 'hidden' }} pl-4 space-y-1 overflow-hidden">
                                    <a href="{{ route('biaya.index') }}"
                                        class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('biaya.index') || request()->routeIs('biaya.show') ? 'text-blue-400 font-bold' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                        <span class="sidebar-label">Tabel Per Tentor</span>
                                    </a>
                                    <a href="{{ route('biaya.summary') }}"
                                        class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('biaya.summary') ? 'text-blue-400 font-bold' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                        <span class="sidebar-label">Tabel Keseluruhan</span>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ route('tarifs.index') }}"
                                class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->routeIs('tarifs.*') ? 'text-blue-400' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                                <span class="sidebar-label">Kelola Tarif</span>
                            </a>
                        </div>
                    </div>
                @endif
            </nav>
        </div>

        <!-- User Panel -->
        <div class="p-4 border-t border-slate-700/50 bg-slate-900/50 overflow-hidden">
            <div class="flex items-center justify-between">
                <div class="flex flex-col sidebar-label transition-all duration-300 overflow-hidden">
                    @if(Auth::guard('tentor')->check() && request()->is('portal*'))
                        <span
                            class="text-sm font-semibold text-slate-200 whitespace-nowrap">{{ Auth::guard('tentor')->user()->nama }}</span>
                        <span class="text-xs text-slate-500 whitespace-nowrap">Tentor Portal</span>
                    @elseif(Auth::guard('web')->check())
                        <span class="text-sm font-semibold text-slate-200 whitespace-nowrap">{{ Auth::user()->nama }}</span>
                        <span class="text-xs text-slate-500 whitespace-nowrap">Administrator</span>
                    @endif
                </div>

                @php
                    $logoutAction = route('logout');
                    if (Auth::guard('tentor')->check() && request()->is('portal*')) {
                        $logoutAction = route('tentor.logout');
                    }
                @endphp

                <form method="POST" action="{{ $logoutAction }}" class="flex-shrink-0">
                    @csrf
                    <button type="submit"
                        class="p-2 text-slate-400 hover:text-red-400 transition-colors rounded hover:bg-slate-800"
                        title="Keluar">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main id="main-content" class="flex-1 p-4 md:p-8 overflow-y-auto transition-all duration-300">
        <!-- Flash Messages -->
        @if(session('success'))
            <div
                class="mb-6 p-4 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center shadow-lg">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium text-sm">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div
                class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 shadow-lg font-medium text-sm">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Oops! Terjadi kesalahan:
                </div>
                <ul class="list-disc list-inside opacity-80 decoration-none">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const desktopToggleBtn = document.getElementById('sidebar-toggle-btn');
        const toggleIcon = document.getElementById('toggle-icon');
        const logoText = document.getElementById('logo-text');
        const sidebarLabels = document.querySelectorAll('.sidebar-label');

        // State Management
        let isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

        function applyInitialState() {
            if (isCollapsed && window.innerWidth >= 768) {
                collapseSidebar(true);
            }
        }

        function toggleMobileSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function toggleDesktopSidebar() {
            isCollapsed = !isCollapsed;
            localStorage.setItem('sidebarCollapsed', isCollapsed);

            if (isCollapsed) {
                collapseSidebar();
            } else {
                expandSidebar();
            }
        }

        function collapseSidebar(immediate = false) {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-20');
            logoText.classList.add('opacity-0', 'scale-0');
            toggleIcon.classList.add('rotate-180');
            sidebarLabels.forEach(label => label.classList.add('opacity-0', 'pointer-events-none', 'hidden'));
        }

        function expandSidebar() {
            sidebar.classList.remove('w-20');
            sidebar.classList.add('w-64');
            logoText.classList.remove('opacity-0', 'scale-0');
            toggleIcon.classList.remove('rotate-180');
            sidebarLabels.forEach(label => label.classList.remove('opacity-0', 'pointer-events-none', 'hidden'));
        }

        mobileBtn.addEventListener('click', toggleMobileSidebar);
        desktopToggleBtn.addEventListener('click', toggleDesktopSidebar);

        // Responsive handling
        window.addEventListener('resize', () => {
            if (window.innerWidth < 768) {
                expandSidebar(); // Reset for mobile view
            } else if (isCollapsed) {
                collapseSidebar(true);
            }
        });

        function toggleSubmenu(id) {
            const menu = document.getElementById(id);
            const arrow = document.getElementById(id + '-arrow');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                arrow.classList.add('rotate-180');
            } else {
                menu.classList.add('hidden');
                arrow.classList.remove('rotate-180');
            }
        }

        // Auto-expand active menus
        document.addEventListener('DOMContentLoaded', () => {
            const activeLinks = document.querySelectorAll('#sidebar a.text-blue-400, #sidebar a.text-emerald-400, #sidebar a.text-amber-400');
            activeLinks.forEach(link => {
                const parentMenu = link.closest('[id$="-menu"]');
                if (parentMenu) {
                    parentMenu.classList.remove('hidden');
                    const arrow = document.getElementById(parentMenu.id + '-arrow');
                    if (arrow) arrow.classList.add('rotate-180');
                }
            });
            applyInitialState();
        });
    </script>
</body>

</html>