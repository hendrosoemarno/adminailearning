@extends('layouts.admin')

@section('title', 'Manajemen Admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Manajemen User Admin</h1>
            <p class="text-slate-400">Daftar pengguna yang memiliki akses ke panel administrator ini.</p>
        </div>
        <a href="{{ route('useradmins.create') }}"
            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Admin Baru
        </a>
    </div>

    <!-- Search Box -->
    <div class="mb-6">
        <form action="{{ route('useradmins.index') }}" method="GET" class="relative max-w-md">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama atau username..."
                class="w-full bg-slate-800/50 border border-slate-700 rounded-xl py-3 pl-12 pr-4 text-slate-100 focus:ring-2 focus:ring-blue-500/50 outline-none transition-all backdrop-blur-sm">
            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            @if($search)
                <a href="{{ route('useradmins.index') }}"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </a>
            @endif
        </form>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 border-b border-slate-700">
                        <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Nama Lengkap</th>
                        <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-widest">Username</th>
                        <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($admins as $admin)
                        <tr class="hover:bg-slate-700/20 transition-colors group">
                            <td class="p-5">
                                <div class="text-sm font-semibold text-slate-200">{{ $admin->nama }}</div>
                            </td>
                            <td class="p-5">
                                <div class="text-sm text-slate-400">{{ $admin->username }}</div>
                            </td>
                            <td class="p-5 text-right">
                                <div
                                    class="flex items-center justify-end gap-3 translate-x-2 group-hover:translate-x-0 transition-transform">
                                    <a href="{{ route('useradmins.edit', $admin->id) }}"
                                        class="p-2 text-slate-400 hover:text-blue-400 transition-colors rounded-lg hover:bg-blue-500/10"
                                        title="Edit Admin">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('useradmins.destroy', $admin->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus admin ini? Tindakan ini tidak dapat dibatalkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-slate-400 hover:text-red-400 transition-colors rounded-lg hover:bg-red-500/10"
                                            title="Hapus Admin">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-12 text-center text-slate-500">
                                <svg class="w-12 h-12 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                                Tidak ada admin ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection