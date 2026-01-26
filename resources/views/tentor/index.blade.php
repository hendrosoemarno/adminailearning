@extends('layouts.admin')

@section('title', 'Daftar Tentor')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Daftar Tentor</h1>
        <p class="text-slate-400">Manage and view tentor information</p>
    </div>

    <!-- Search -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('tentors.index') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="w-full flex-1 flex flex-col gap-1">
                <label for="search" class="text-sm font-medium text-slate-400">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search" placeholder="Search by name, nickname, or subject..."
                        value="{{ request('search') }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>
            </div>
            <div class="w-full md:w-auto flex items-center gap-3 mt-4 md:mt-0">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-semibold rounded-lg shadow-lg hover:shadow-blue-500/25 transition-all duration-200">
                    Search
                </button>
                @if(request('search'))
                    <a href="{{ route('tentors.index') }}"
                        class="text-slate-400 hover:text-white text-sm whitespace-nowrap transition-colors py-2">Clear</a>
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
                                'nama' => 'Nama',
                                'nickname' => 'Nickname',
                                'mapel' => 'Mata Pelajaran',
                                'email' => 'Email',
                                'wa' => 'WhatsApp',
                                'aktif' => 'Status'
                            ];
                        @endphp
                        @foreach($headers as $key => $label)
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
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
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($tentors as $tentor)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4 text-sm text-slate-300 font-mono">{{ $tentor->id }}</td>
                            <td class="p-4 text-sm font-medium text-white">{{ $tentor->nama }}</td>
                            <td class="p-4 text-sm text-slate-300">{{ $tentor->nickname }}</td>
                            <td class="p-4 text-sm text-slate-300">
                                <span
                                    class="bg-blue-500/10 text-blue-400 border border-blue-500/20 px-2 py-0.5 rounded text-xs uppercase font-semibold">
                                    {{ $tentor->mapel }}
                                </span>
                            </td>
                            <td class="p-4 text-sm text-slate-400">{{ $tentor->email }}</td>
                            <td class="p-4 text-sm text-slate-400">{{ $tentor->wa }}</td>
                            <td class="p-4">
                                <span
                                    class="px-2.5 py-1 rounded-full text-xs font-semibold border {{ $tentor->aktif ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-red-500/10 text-red-400 border-red-500/20' }}">
                                    {{ $tentor->aktif ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-12 text-center text-slate-500">
                                No tentors found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection