@extends('layouts.admin')

@section('title', 'Next Level Exam')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Next Level Exam</h1>
            <p class="text-slate-400">Daftar siswa yang mengikuti kuis dengan nama mengandung "Next" dan nilai &ge; 90.</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead class="bg-slate-900/50 border-b border-slate-700/50 text-slate-400">
                    <tr>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'timestart', 'direction' => ($sort === 'timestart' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                TANGGAL KUIS
                                @if($sort === 'timestart') <span class="text-xs">{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'username', 'direction' => ($sort === 'username' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                USERNAME
                                @if($sort === 'username') <span class="text-xs">{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'firstname', 'direction' => ($sort === 'firstname' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                NAMA SISWA
                                @if($sort === 'firstname') <span class="text-xs">{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'course_name', 'direction' => ($sort === 'course_name' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                NAMA KURSUS
                                @if($sort === 'course_name') <span class="text-xs">{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'quiz_name', 'direction' => ($sort === 'quiz_name' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                NAMA KUIS
                                @if($sort === 'quiz_name') <span class="text-xs">{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                        <th class="p-4 font-semibold text-center hidden md:table-cell">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'grade', 'direction' => ($sort === 'grade' && $direction === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center gap-1 hover:text-white transition-colors">
                                NILAI
                                @if($sort === 'grade') <span class="text-xs">{{ $direction === 'asc' ? '↑' : '↓' }}</span> @endif
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50 text-slate-300">
                    @forelse($attempts as $attempt)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4 text-xs font-mono text-slate-400">
                                {{ $attempt->quiz_date ? date('d M Y, H:i', $attempt->quiz_date) : '-' }}
                            </td>
                            <td class="p-4 font-mono text-xs text-slate-400">{{ $attempt->username }}</td>
                            <td class="p-4">
                                <div class="font-medium text-white">{{ $attempt->firstname }} {{ $attempt->lastname }}</div>
                            </td>
                            <td class="p-4 text-blue-400 font-medium truncate max-w-xs" title="{{ $attempt->course_name }}">
                                {{ $attempt->course_name }}
                            </td>
                            <td class="p-4 text-amber-400">{{ $attempt->quiz_name }}</td>
                            <td class="p-4 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold text-green-400 bg-green-400/10 border border-green-400/20">
                                    {{ round($attempt->grade, 2) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-slate-500">
                                <div class="flex flex-col items-center justify-center gap-3">
                                    <svg class="w-12 h-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span class="text-sm">Tidak ada data siswa yang memenuhi kriteria ujian Next Level.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
