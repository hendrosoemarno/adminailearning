@extends('layouts.admin')

@section('title', 'Daftar User')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Daftar Moodle User</h1>
        <p class="text-slate-400">List of registered users</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl flex items-center gap-3 text-emerald-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Search -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="flex-1 grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-3 flex flex-col gap-1">
                    <label for="search" class="text-sm font-medium text-slate-400">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" id="search" placeholder="Search by name or username..."
                            value="{{ request('search') }}"
                            class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="status" class="text-sm font-medium text-slate-400">Status</label>
                    <select name="status" id="status" onchange="this.form.submit()"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        <option value="active" {{ $status == 'active' ? 'selected' : '' }}>Aktif Sahaja</option>
                        <option value="all" {{ $status == 'all' ? 'selected' : '' }}>Semua User</option>
                        <option value="suspended" {{ $status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                    </select>
                </div>
            </div>
            <div class="w-full md:w-auto flex items-center gap-3 mt-4 md:mt-0">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-semibold rounded-lg shadow-lg hover:shadow-blue-500/25 transition-all duration-200">
                    Filter
                </button>
                @if(request('search') || $status != 'active')
                    <a href="{{ route('dashboard') }}"
                        class="text-slate-400 hover:text-white text-sm whitespace-nowrap transition-colors py-2">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700">
                        @php
                            $headers = [
                                'id' => 'ID',
                                'username' => 'Username',
                                'firstname' => 'Nama Siswa',
                                'kelas' => 'Kelas',
                                'wa_ortu' => 'WA Ortu',
                                'firstaccess' => 'Akses Terakhir'
                            ];
                        @endphp
                        @foreach($headers as $key => $label)
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider {{ $key == 'id' ? 'w-16' : '' }}">
                                <a href="{{ request()->fullUrlWithQuery(['sort' => $key, 'direction' => ($sort == $key && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                    {{ $label }}
                                    @if($sort == $key)
                                        @if($direction == 'asc')
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                        @else
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        @endif
                                    @endif
                                </a>
                            </th>
                        @endforeach
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4 text-sm text-slate-400 font-mono">{{ $user->id }}</td>
                            <td class="p-4 text-sm text-blue-400 font-semibold font-mono">{{ $user->username }}</td>
                            <td class="p-4">
                                <span class="text-sm text-white font-medium block">{{ $user->firstname }} {{ $user->lastname }}</span>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-[10px] text-slate-500 uppercase font-bold">{{ $user->nama_ortu ?? '-' }}</span>
                                    @if($user->suspended)
                                        <span class="px-1.5 py-0.5 rounded bg-red-500/10 text-red-500 text-[8px] font-bold uppercase border border-red-500/20">Suspended</span>
                                    @elseif($status == 'all')
                                        <span class="px-1.5 py-0.5 rounded bg-emerald-500/10 text-emerald-500 text-[8px] font-bold uppercase border border-emerald-500/20">Aktif</span>
                                    @endif
                                </div>
                            </td>
                            <td class="p-4 text-sm text-slate-300">
                                {{ $user->kelas ?? '-' }}
                            </td>
                            <td class="p-4">
                                <span class="text-sm text-emerald-400 font-mono">{{ $user->wa_ortu ?? '-' }}</span>
                            </td>
                            <td class="p-4 text-sm text-slate-400">
                                {{ $user->firstaccess ? date('d/m/Y H:i', $user->firstaccess) : '-' }}
                            </td>
                            <td class="p-4 text-right">
                                <a href="{{ route('user.edit', $user->id) }}" 
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white rounded-lg transition-all text-xs font-bold border border-blue-500/20">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-12 text-center text-slate-500">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($users->hasPages())
            <div class="p-4 border-t border-slate-700/50">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection