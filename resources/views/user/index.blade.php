@extends('layouts.admin')

@section('title', 'Daftar User')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Daftar Moodle User</h1>
        <p class="text-slate-400">List of registered users</p>
    </div>

    <!-- Search -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('users.index') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="w-full flex-1 flex flex-col gap-1">
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
            <div class="w-full md:w-auto flex items-center gap-3 mt-4 md:mt-0">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-semibold rounded-lg shadow-lg hover:shadow-blue-500/25 transition-all duration-200">
                    Search
                </button>
                @if(request('search'))
                    <a href="{{ route('users.index') }}"
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
                                'id' => 'User ID',
                                'username' => 'Username',
                                'firstname' => 'Nama User',
                                'firstaccess' => 'First Access'
                            ];
                        @endphp
                        @foreach($headers as $key => $label)
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider {{ $key == 'id' ? 'w-24' : '' }}">
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
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4 text-sm text-slate-400 font-mono">{{ $user->id }}</td>
                            <td class="p-4 text-sm text-blue-400 font-semibold font-mono">{{ $user->username }}</td>
                            <td class="p-4 text-sm text-white font-medium">{{ $user->firstname }} {{ $user->lastname }}</td>
                            <td class="p-4 text-sm text-slate-400">
                                {{ $user->firstaccess ? date('Y-m-d H:i', $user->firstaccess) : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-12 text-center text-slate-500">
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