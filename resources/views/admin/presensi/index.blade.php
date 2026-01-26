@extends('layouts.admin')

@section('title', 'Presensi Tentor')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Data Presensi Tentor</h1>
        <p class="text-slate-400">Monitoring laporan kegiatan belajar mengajar (KBM) tentor.</p>
    </div>

    <!-- Filters -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('presensi.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <input type="hidden" name="filter" value="1">
            <!-- Search Text -->
            <div class="flex flex-col gap-1 col-span-1 md:col-span-1">
                <label for="search" class="text-sm font-medium text-slate-400">Cari Tentor/Siswa</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" id="search" placeholder="Nama..." value="{{ $search }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-sm text-white focus:ring-2 focus:ring-blue-500 transition-all">
                </div>
            </div>

            <!-- Start Date -->
            <div class="flex flex-col gap-1">
                <label for="start_date" class="text-sm font-medium text-slate-400">Tanggal Awal</label>
                <input type="date" name="start_date" id="start_date" value="{{ $startDate }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:ring-2 focus:ring-blue-500 transition-all">
            </div>

            <!-- End Date -->
            <div class="flex flex-col gap-1">
                <label for="end_date" class="text-sm font-medium text-slate-400">Tanggal Akhir</label>
                <input type="date" name="end_date" id="end_date" value="{{ $endDate }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:ring-2 focus:ring-blue-500 transition-all">
            </div>

            <!-- Submit & Reset -->
            <div class="flex items-center gap-2">
                <button type="submit"
                    class="flex-1 px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg transition-all shadow-lg shadow-blue-500/20 text-sm">
                    Filter
                </button>
                <a href="{{ route('presensi.index') }}"
                    class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white font-semibold rounded-lg transition-all text-sm">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Bulk Action Header -->
    <form id="bulk-delete-form" action="{{ route('presensi.bulk-delete') }}" method="POST"
        onsubmit="return confirm('Hapus semua data yang dipilih?')">
        @csrf
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center gap-4">
                <label class="flex items-center cursor-pointer group">
                    <input type="checkbox" id="select-all"
                        class="w-4 h-4 rounded border-slate-700 bg-slate-900 text-blue-500 focus:ring-offset-slate-900 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-slate-400 group-hover:text-slate-200 transition-colors">Pilih
                        Semua</span>
                </label>
                <button type="submit" id="bulk-delete-btn" disabled
                    class="px-4 py-1.5 bg-red-500/10 text-red-500 border border-red-500/20 rounded-lg text-xs font-bold uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all disabled:opacity-30 disabled:cursor-not-allowed">
                    Hapus Terpilih
                </button>
            </div>
            <div class="text-xs text-slate-500">
                Total: <span class="text-blue-400 font-bold">{{ count($presensis) }}</span> data ditemukan
            </div>
        </div>

        <!-- Table -->
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/50 border-b border-slate-700">
                            <th class="p-4 w-10"></th>
                            @php
                                $headers = [
                                    'id' => 'No',
                                    'waktu_input' => 'Waktu Input',
                                    'tentor' => 'Tentor',
                                    'siswa' => 'Siswa',
                                    'tgl_kbm' => 'Tgl Pertemuan',
                                ];
                            @endphp
                            @foreach($headers as $key => $label)
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                <a href="{{ request()->fullUrlWithQuery(['sort' => $key, 'direction' => ($sort == $key && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center hover:text-white transition-colors">
                                    {{ $label }}
                                    @if($sort == $key)
                                        @if($direction == 'asc')
                                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                        @else
                                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        @endif
                                    @endif
                                </a>
                            </th>
                            @endforeach
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Screenshot</th>
                            <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @forelse($presensis as $item)
                            <tr class="hover:bg-slate-700/20 transition-colors group">
                                <td class="p-4">
                                    <input type="checkbox" name="ids[]" value="{{ $item->id }}"
                                        class="row-checkbox w-4 h-4 rounded border-slate-700 bg-slate-900 text-blue-500 focus:ring-offset-slate-900 focus:ring-blue-500">
                                </td>
                                <td class="p-4 text-sm text-slate-500 font-mono">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-4">
                                    <div class="text-sm text-white">{{ date('d/m/Y', (int) $item->tgl_input) }}</div>
                                    <div class="text-xs text-slate-500">{{ date('H:i', (int) $item->tgl_input) }} WIB</div>
                                </td>
                                <td class="p-4">
                                    <div class="text-sm font-semibold text-blue-400">{{ $item->tentor->nama ?? 'N/A' }}</div>
                                    <div class="text-xs text-slate-500">{{ $item->tentor->nickname ?? '-' }}</div>
                                </td>
                                <td class="p-4 text-sm text-slate-300">
                                    {{ ($item->siswa->firstname ?? '') . ' ' . ($item->siswa->lastname ?? '') }}
                                    <div class="text-xs text-slate-500">{{ $item->siswa->username ?? 'Unknown' }}</div>
                                </td>
                                <td class="p-4 text-sm text-emerald-400 font-medium">
                                    {{ date('d F Y', (int) $item->tgl_kbm) }}
                                </td>
                                <td class="p-4">
                                    @if($item->foto)
                                        <a href="{{ $item->foto }}" target="_blank"
                                            class="block w-12 h-12 rounded border border-slate-700 overflow-hidden hover:scale-110 transition-transform">
                                            <img src="{{ $item->foto }}" alt="Presensi" class="w-full h-full object-cover">
                                        </a>
                                    @else
                                        <span class="text-xs text-slate-600 italic text-center block w-12">-</span>
                                    @endif
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button type="button"
                                            onclick="confirmDelete('{{ route('presensi.destroy', $item->id) }}')"
                                            class="p-2 text-slate-500 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition-all"
                                            title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-12 text-center text-slate-500 uppercase tracking-widest text-sm">
                                    Tidak ada data presensi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <!-- Hidden standard delete form -->
    <form id="delete-form" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function confirmDelete(url) {
            if (confirm('Apakah Anda yakin ingin menghapus data presensi ini?')) {
                const form = document.getElementById('delete-form');
                form.action = url;
                form.submit();
            }
        }

        // Bulk Selection Logic
        const selectAll = document.getElementById('select-all');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        const bulkDeleteBtn = document.getElementById('bulk-delete-btn');

        function updateBulkButton() {
            const checkedCount = document.querySelectorAll('.row-checkbox:checked').length;
            bulkDeleteBtn.disabled = checkedCount === 0;
            bulkDeleteBtn.textContent = checkedCount > 0 ? `Hapus Terpilih (${checkedCount})` : 'Hapus Terpilih';
        }

        selectAll.addEventListener('change', () => {
            rowCheckboxes.forEach(cb => cb.checked = selectAll.checked);
            updateBulkButton();
        });

        rowCheckboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                const allChecked = Array.from(rowCheckboxes).every(c => c.checked);
                selectAll.checked = allChecked;
                updateBulkButton();
            });
        });
    </script>
@endsection