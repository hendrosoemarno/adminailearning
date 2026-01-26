@extends('layouts.admin')

@section('title', 'Quiz Attempts Dashboard')

@section('styles')
    <style>
        /* No custom styles needed as Tailwind CSS is used */
    </style>
@endsection

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Quiz Attempts Dashboard</h1>
        <p class="text-slate-400">Overview of user quiz participation</p>
    </div>

    <!-- Filters -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="w-full md:w-auto flex flex-col gap-1">
                <label for="start_date" class="text-sm font-medium text-slate-400">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ $startDate }}"
                    class="w-full md:w-40 bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
            </div>

            <div class="w-full md:w-auto flex flex-col gap-1">
                <label for="end_date" class="text-sm font-medium text-slate-400">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ $endDate }}"
                    class="w-full md:w-40 bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
            </div>

            <div class="w-full md:flex-1 flex flex-col gap-1">
                <label for="search" class="text-sm font-medium text-slate-400">Search</label>
                <input type="text" name="search" id="search" placeholder="User, Quiz, or Course..." value="{{ $search }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
            </div>

            <div class="w-full md:w-auto flex items-center gap-3 mt-4 md:mt-0">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2.5 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-semibold rounded-lg shadow-lg hover:shadow-blue-500/25 transition-all duration-200 transform hover:-translate-y-0.5">
                    Filter Results
                </button>

                @if(($startDate != date('Y-m-d') || $endDate != date('Y-m-d')) || $search)
                    <a href="{{ route('dashboard') }}"
                        class="text-slate-400 hover:text-white text-sm whitespace-nowrap transition-colors py-2">
                        Clear Filters
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Results Table -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700">
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Attempt ID</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">User</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Course</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Quiz Name</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Nilai</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Start Time</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Finish Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($results as $row)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4 text-sm text-slate-300 font-mono">#{{ $row->quizattid }}</td>
                            <td class="p-4">
                                <div class="font-medium text-white">{{ $row->firstname }} {{ $row->lastname }}</div>
                                <div class="text-xs text-slate-500 mt-0.5">{{ $row->username }}</div>
                            </td>
                            <td class="p-4 text-sm text-slate-300">{{ $row->course }}</td>
                            <td class="p-4 text-sm text-slate-300">{{ $row->quizname }}</td>
                            <td class="p-4">
                                @php
                                    $score = $row->jmlsoal > 0 ? round(($row->jmlbenar / $row->jmlsoal) * 100) : 0;
                                    $scoreColor = $score >= 70 ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : ($score >= 50 ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : 'bg-red-500/10 text-red-400 border-red-500/20');
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold border {{ $scoreColor }}">
                                    {{ $score }}
                                </span>
                            </td>
                            <td class="p-4 text-sm text-slate-400 whitespace-nowrap">{{ $row->timestart }}</td>
                            <td class="p-4 text-sm text-slate-400 whitespace-nowrap">{{ $row->timefinish }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-12 text-center text-slate-500">
                                <p class="text-lg">No quiz attempts found for this date.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection