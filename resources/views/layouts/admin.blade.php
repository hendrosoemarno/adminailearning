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
<body class="bg-slate-900 text-slate-50 font-sans antialiased min-h-screen flex flex-col md:flex-row bg-futuristic-gradient overflow-x-hidden selection:bg-cyan-500 selection:text-white">

    <!-- Mobile Header -->
    <div class="md:hidden flex items-center justify-between p-4 bg-slate-900/80 backdrop-blur-md border-b border-slate-700 sticky top-0 z-50">
        <div class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-cyan-400">
            AdminPanel
        </div>
        <button id="mobile-menu-btn" class="text-slate-300 hover:text-white focus:outline-none p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden glass transition-opacity duration-300" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900/90 backdrop-blur-xl border-r border-slate-700/50 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:relative md:flex md:flex-col justify-between shadow-2xl">
        <div>
            <!-- Logo Desktop -->
            <div class="hidden md:flex items-center justify-between h-16 px-6 border-b border-slate-700/50">
                <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-cyan-400 tracking-wide">
                    AdminPanel
                </span>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg group transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('tentors.index') }}" class="flex items-center px-4 py-3 rounded-lg group transition-all duration-200 {{ request()->routeIs('tentors.index') ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('tentors.index') ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span class="font-medium">Data Tentor</span>
                </a>

                <a href="{{ route('users.index') }}" class="flex items-center px-4 py-3 rounded-lg group transition-all duration-200 {{ request()->routeIs('users.index') ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800 hover:text-slate-100' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('users.index') ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span class="font-medium">Data User</span>
                </a>
            </nav>
        </div>

        <!-- User Panel -->
        <div class="p-4 border-t border-slate-700/50 bg-slate-900/50">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-sm font-semibold text-slate-200">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                    <span class="text-xs text-slate-500">Administrator</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2 text-slate-400 hover:text-red-400 transition-colors rounded hover:bg-slate-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4 md:p-8 overflow-y-auto">
        @yield('content')
    </main>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        btn.addEventListener('click', toggleSidebar);
    </script>
</body>
</html>