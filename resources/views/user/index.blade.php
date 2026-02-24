@extends('layouts.admin')

@section('title', 'Daftar Siswa')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Daftar Siswa</h1>
            <p class="text-slate-400">Kelola data pendaftaran siswa AI Learning</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" onclick="submitExport()"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-900/20 transition-all transform hover:-translate-y-0.5 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Export Terpilih (CSV)
            </button>
        </div>
    </div>

    @if (session('success'))
        <div
            class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl flex items-center gap-3 text-emerald-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl flex items-center gap-3 text-red-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Search & Filter -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="flex-1 grid grid-cols-1 md:grid-cols-5 gap-4">
                <div class="md:col-span-3 flex flex-col gap-1">
                    <label for="search" class="text-sm font-medium text-slate-400">Cari Siswa</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" id="search" placeholder="Nama, Username, atau No. WA..."
                            value="{{ request('search') }}"
                            class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder-slate-600">
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="status" class="text-sm font-medium text-slate-400">Status</label>
                    <select name="status" id="status" onchange="this.form.submit()"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        <option value="active" {{ $status == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="all" {{ $status == 'all' ? 'selected' : '' }}>Semua</option>
                        <option value="suspended" {{ $status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="per_page" class="text-sm font-medium text-slate-400">Tampilkan</label>
                    <select name="per_page" id="per_page" onchange="this.form.submit()"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        <option value="20" {{ $perPage == '20' ? 'selected' : '' }}>20</option>
                        <option value="50" {{ $perPage == '50' ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $perPage == '100' ? 'selected' : '' }}>100</option>
                        <option value="all" {{ $perPage == 'all' ? 'selected' : '' }}>Semua</option>
                    </select>
                </div>
            </div>
            <div class="w-full md:w-auto flex items-center gap-3">
                <button type="submit"
                    class="px-6 py-2 bg-slate-700 hover:bg-slate-600 text-white font-semibold rounded-lg transition-all">
                    Filter
                </button>
                @if (request()->hasAny(['search', 'status', 'per_page']))
                    <a href="{{ route('dashboard') }}"
                        class="text-slate-400 hover:text-white text-sm transition-colors">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table -->
    <form id="export-form" action="{{ route('user.export') }}" method="POST">
        @csrf
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/50 border-b border-slate-700">
                            <th class="p-4 w-10">
                                <input type="checkbox" id="select-all"
                                    class="w-4 h-4 rounded border-slate-700 bg-slate-900 text-blue-500 focus:ring-blue-500 focus:ring-offset-slate-900">
                            </th>
                            @php
                                $headers = [
                                    'id' => 'ID',
                                    'tgl_daftar' => 'Tgl Daftar',
                                    'firstname' => 'Nama Siswa',
                                    'nickname' => 'Nickname',
                                    'kursus' => 'Kursus',
                                    'kelas' => 'Kelas',
                                    'nama_ortu' => 'Nama Ortu',
                                    'wa_ortu' => 'WA Ortu',
                                ];
                            @endphp
                            @foreach ($headers as $key => $label)
                                <th class="p-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => $key, 'direction' => $sort == $key && $direction == 'asc' ? 'desc' : 'asc']) }}"
                                        class="flex items-center gap-1 hover:text-white transition-colors">
                                        {{ $label }}
                                        @if ($sort == $key)
                                            <svg class="w-3 h-3 {{ $direction == 'desc' ? 'rotate-180' : '' }}" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @endif
                                    </a>
                                </th>
                            @endforeach
                            <th class="p-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider text-right">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @forelse($users as $user)
                            <tr class="hover:bg-slate-700/20 transition-colors">
                                <td class="p-4">
                                    <input type="checkbox" name="ids[]" value="{{ $user->id }}"
                                        class="user-checkbox w-4 h-4 rounded border-slate-700 bg-slate-900 text-blue-500 focus:ring-blue-500 focus:ring-offset-slate-900">
                                </td>
                                <td class="p-4 text-xs text-slate-500 font-mono">{{ $user->id }}</td>
                                <td class="p-4 text-xs text-slate-300">
                                    {{ $user->tgl_daftar ? date('d/m/Y', $user->tgl_daftar) : '-' }}
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm text-white font-semibold">{{ $user->firstname }}
                                            {{ $user->lastname }}</span>
                                        <span class="text-[10px] text-slate-500 font-mono">{{ $user->username }}</span>
                                    </div>
                                </td>
                                <td class="p-4 text-sm text-blue-400 font-medium">
                                    {{ $user->nickname ?? '-' }}
                                </td>
                                <td class="p-4">
                                    @if ($user->kursus)
                                        <span
                                            class="px-2 py-0.5 rounded-full bg-blue-500/10 text-blue-400 text-[10px] font-bold border border-blue-500/20">
                                            {{ $user->kursus }}
                                        </span>
                                    @else
                                        <span class="text-slate-600 text-xs">-</span>
                                    @endif
                                </td>
                                <td class="p-4 text-sm text-slate-300">{{ $user->kelas ?? '-' }}</td>
                                <td class="p-4 text-xs text-slate-400">{{ $user->nama_ortu ?? '-' }}</td>
                                <td class="p-4">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $user->wa_ortu) }}" target="_blank"
                                        class="text-xs text-emerald-400 hover:text-emerald-300 font-mono">
                                        {{ $user->wa_ortu ?? '-' }}
                                    </a>
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" onclick="showDetail({{ json_encode($user) }})"
                                            class="p-1.5 bg-slate-700/50 text-slate-300 hover:bg-slate-600 hover:text-white rounded-lg transition-all"
                                            title="Lihat Detail">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </button>
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="p-1.5 bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white rounded-lg transition-all border border-blue-500/20"
                                            title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="p-12 text-center text-slate-500">
                                    Belum ada data siswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($users->hasPages())
                <div class="p-4 border-t border-slate-700/50">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </form>

    <!-- Detail Modal -->
    <div id="detail-modal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm" onclick="closeModal()"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl px-4">
            <div
                class="bg-slate-900 border border-slate-700 rounded-2xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
                <div class="p-6 border-b border-slate-800 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-white">Detail Lengkap Siswa</h2>
                    <button onclick="closeModal()" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 max-h-[70vh] overflow-y-auto custom-scrollbar">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8" id="modal-content">
                        <!-- Content via JS -->
                    </div>
                </div>
                <div class="p-6 border-t border-slate-800 bg-slate-900/50 flex justify-end">
                    <button onclick="closeModal()"
                        class="px-6 py-2 bg-slate-700 hover:bg-slate-600 text-white font-semibold rounded-lg transition-all">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Select All Checkboxes
        const selectAll = document.getElementById('select-all');
        const checkboxes = document.querySelectorAll('.user-checkbox');

        if (selectAll) {
            selectAll.addEventListener('change', function () {
                checkboxes.forEach(cb => cb.checked = this.checked);
            });
        }

        function submitExport() {
            const checked = document.querySelectorAll('.user-checkbox:checked');
            if (checked.length === 0) {
                alert('Pilih minimal satu data untuk diekspor.');
                return;
            }
            document.getElementById('export-form').submit();
        }

        // Modal Logic
        function showDetail(user) {
            const modal = document.getElementById('detail-modal');
            const content = document.getElementById('modal-content');

            const formatDate = (ts) => {
                if (!ts) return '-';
                const d = new Date(ts * 1000);
                return d.toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
            };

            const sections = [
                { label: 'ID', value: user.id },
                { label: 'Username', value: user.username },
                { label: 'Nama Lengkap', value: user.nama || (user.firstname + ' ' + user.lastname) },
                { label: 'Nickname', value: user.nickname },
                { label: 'Tanggal Daftar', value: formatDate(user.tgl_daftar) },
                { label: 'Kelas', value: user.kelas },
                { label: 'Pilihan Kursus', value: user.kursus },
                { label: 'Tempat Lahir', value: user.tempat_lahir },
                { label: 'Tanggal Lahir', value: formatDate(user.tgl_lahir) },
                { label: 'Gender', value: user.gender },
                { label: 'Agama', value: user.agama ? user.agama.toUpperCase() : '-' },
                { label: 'Nama Sekolah', value: user.nama_sekolah },
                { label: 'Nama Orang Tua', value: user.nama_ortu },
                { label: 'WhatsApp Ortu', value: user.wa_ortu },
                { label: 'Alamat', value: user.alamat, full: true },
                { label: 'Info AI Learning Dari', value: user.nama_perekom, full: true }
            ];

            let html = '';
            sections.forEach(s => {
                html += `
                                <div class="${s.full ? 'md:col-span-2' : ''}">
                                    <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block mb-1">${s.label}</label>
                                    <p class="text-sm text-slate-200 border-b border-slate-800 pb-2">${s.value || '-'}</p>
                                </div>
                            `;
            });

            content.innerHTML = html;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('detail-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close on ESC
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });
    </script>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }
    </style>
@endsection