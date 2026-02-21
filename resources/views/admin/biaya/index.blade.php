@extends('layouts.admin')

@section('title', 'Biaya Portal')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Manajemen Biaya Tentor</h1>
            <p class="text-slate-400">Pilih Tentor Aktif untuk melihat rincian biaya siswa mereka.</p>
        </div>
        <a href="{{ route('biaya.summary') }}" 
            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
            Lihat Biaya Keseluruhan
        </a>
    </div>

    <!-- Bulk Adjustment Section -->
    <div class="mb-8 bg-slate-800/40 border border-slate-700/50 p-6 rounded-xl shadow-lg">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex-1">
                <h2 class="text-sm font-bold text-slate-300 uppercase tracking-wider mb-1">Setel Keseluruhan Total Meet (Global)</h2>
                <p class="text-xs text-slate-500 italic">Ubah Total Meet seluruh siswa dari SEMUA tentor aktif berdasarkan prosentase dari paket mereka.</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative w-32">
                    <input type="number" id="bulk-percentage" placeholder="Contoh: 50" min="1" max="200"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-white text-sm outline-none focus:ring-2 focus:ring-blue-500 transition-all pr-8">
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 text-sm italic">%</span>
                </div>
                <button onclick="bulkProcessMeet()" id="bulk-process-btn"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded-lg transition-all shadow-lg shadow-blue-500/20 disabled:opacity-50 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Proses Global
                </button>
            </div>
        </div>
    </div>
    <!-- Search -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('biaya.index') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="w-full flex-1 flex flex-col gap-1">
                <label for="search" class="text-sm font-medium text-slate-400">Cari Tentor</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search" placeholder="Cari berdasarkan nama atau nickname..."
                        value="{{ request('search') }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-slate-600">
                </div>
            </div>
            <div class="w-full md:w-auto flex items-center gap-3 mt-4 md:mt-0">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg transition-all duration-200 shadow-lg shadow-blue-500/20">
                    Filter
                </button>
                @if(request('search'))
                    <a href="{{ route('biaya.index') }}"
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
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'nama', 'direction' => ($sort == 'nama' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Nama Tentor
                                @if($sort == 'nama')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'mapel', 'direction' => ($sort == 'mapel' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Mata Pelajaran
                                @if($sort == 'mapel')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($tentors as $tentor)
                        <tr class="hover:bg-slate-700/20 transition-colors group">
                            <td class="p-4">
                                <div class="font-medium text-white">{{ $tentor->nama }}</div>
                                <div class="text-xs text-slate-500">{{ $tentor->nickname }}</div>
                            </td>
                            <td class="p-4">
                                <span class="bg-blue-500/10 text-blue-400 border border-blue-500/20 px-2 py-0.5 rounded text-xs uppercase font-semibold">
                                    @if($tentor->mapel == 'bing') B. Inggris
                                    @elseif($tentor->mapel == 'mat') Matematika
                                    @elseif($tentor->mapel == 'coding') Coding
                                    @else {{ $tentor->mapel }} @endif
                                </span>
                            </td>
                            <td class="p-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('biaya.salary', $tentor) }}"
                                        class="inline-flex items-center px-4 py-2 bg-slate-700 hover:bg-amber-600 text-white text-sm font-semibold rounded-lg transition-all">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        Gaji
                                    </a>
                                    <a href="{{ route('biaya.show', $tentor) }}"
                                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white text-sm font-bold rounded-lg shadow-lg hover:shadow-emerald-500/25 transition-all duration-200 transform hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        Biaya Siswa
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="p-12 text-center text-slate-500 uppercase tracking-widest text-sm">
                                Tidak ada tentor aktif ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function bulkProcessMeet() {
            const percentage = document.getElementById('bulk-percentage').value;
            if (!percentage || percentage <= 0) {
                alert('Silakan masukkan prosentase yang valid (contoh: 50)');
                return;
            }

            if (!confirm(`Apakah Anda yakin ingin mengatur Total Meet SELURUH SISWA (Global) menjadi ${percentage}% dari paket mereka? Tindakan ini akan mempengaruhi semua tentor aktif.`)) {
                return;
            }

            const btn = document.getElementById('bulk-process-btn');
            btn.disabled = true;
            btn.innerHTML = '<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Memproses Global...';

            fetch('{{ route("biaya.bulk-update-meet") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    percentage: percentage
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert('Gagal memproses global bulk update.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan sistem.');
            })
            .finally(() => {
                btn.disabled = false;
                btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> Proses Global';
            });
        }
    </script>
@endsection