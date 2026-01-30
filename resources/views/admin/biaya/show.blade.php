@extends('layouts.admin')

@section('title', 'Rincian Biaya Siswa')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Biaya Siswa: {{ $tentor->nama }}</h1>
            <p class="text-slate-400">Rincian paket dan biaya kursus untuk seluruh siswa yang diampu.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('biaya.salary', $tentor) }}" class="px-4 py-2 bg-amber-600/10 text-amber-500 hover:bg-amber-600 hover:text-white rounded-lg border border-amber-600/20 transition-all font-semibold">
                Lihat Gaji
            </a>
            <a href="{{ route('biaya.index') }}" class="px-4 py-2 bg-slate-800 text-slate-300 hover:text-white rounded-lg border border-slate-700 transition-all">
                Kembali
            </a>
        </div>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700">
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'id', 'direction' => ($sort == 'id' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                User ID
                                @if($sort == 'id')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'firstname', 'direction' => ($sort == 'firstname' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Nama Siswa
                                @if($sort == 'firstname')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>

                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'paket_kode', 'direction' => ($sort == 'paket_kode' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Paket
                                @if($sort == 'paket_kode')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'tanggal_masuk', 'direction' => ($sort == 'tanggal_masuk' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Tanggal Masuk
                                @if($sort == 'tanggal_masuk')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'biaya', 'direction' => ($sort == 'biaya' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Biaya
                                @if($sort == 'biaya')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'ai_learning', 'direction' => ($sort == 'ai_learning' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                AI Learning
                                @if($sort == 'ai_learning')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'gaji_tentor', 'direction' => ($sort == 'gaji_tentor' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Gaji Tentor
                                @if($sort == 'gaji_tentor')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'total_meet', 'direction' => ($sort == 'total_meet' && $direction == 'asc') ? 'desc' : 'asc']) }}" class="flex items-center gap-1 hover:text-white transition-colors">
                                Total Meet
                                @if($sort == 'total_meet')
                                    @if($direction == 'asc')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($siswas as $siswa)
                        <tr class="hover:bg-slate-700/20 transition-colors" data-siswa-id="{{ $siswa->id }}">
                            <td class="p-4 text-sm font-mono text-slate-400">#{{ $siswa->id }}</td>
                            <td class="p-4">
                                <div class="font-medium text-white">{{ $siswa->firstname }} {{ $siswa->lastname }}</div>
                                <div class="text-xs text-slate-500">{{ $siswa->username }}</div>
                            </td>
                            <td class="p-4">
                                <select onchange="updatePaket(this, {{ $siswa->id }})" 
                                    class="bg-slate-900 border border-slate-700 text-blue-400 text-xs font-bold rounded-lg px-2 py-1 outline-none focus:ring-1 focus:ring-blue-500 transition-all cursor-pointer">
                                    <option value="">Pilih Paket</option>
                                    @foreach($availablePackages as $package)
                                        <option value="{{ $package->id }}" {{ $siswa->id_tarif == $package->id ? 'selected' : '' }}>
                                            {{ $package->kode }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="p-4">
                                <input type="date" 
                                    value="{{ $siswa->tanggal_masuk }}"
                                    onchange="updateCustomData({{ $siswa->id }}, 'tanggal_masuk', this.value)"
                                    class="bg-slate-900 border border-slate-700 text-white text-xs rounded-lg px-2 py-1 outline-none focus:ring-1 focus:ring-blue-500 transition-all w-36">
                                @if($siswa->tanggal_masuk)
                                    <span class="ml-1 text-xs text-amber-400">🟡</span>
                                @endif
                            </td>
                            <td class="p-4 text-sm text-white font-semibold whitespace-nowrap" id="biaya-{{ $siswa->id }}">
                                Rp {{ number_format($siswa->biaya, 0, ',', '.') }}
                            </td>
                            <td class="p-4 text-sm text-emerald-400 font-medium whitespace-nowrap" id="ai-learning-{{ $siswa->id }}">
                                Rp {{ number_format($siswa->ai_learning, 0, ',', '.') }}
                            </td>
                            <td class="p-4 text-sm text-amber-400 font-medium whitespace-nowrap" id="gaji-tentor-{{ $siswa->id }}">
                                Rp {{ number_format($siswa->gaji_tentor, 0, ',', '.') }}
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <input type="number" 
                                        min="1" 
                                        max="99"
                                        value="{{ $siswa->total_meet }}"
                                        onchange="updateCustomData({{ $siswa->id }}, 'custom_total_meet', this.value)"
                                        class="w-16 text-center bg-slate-900 border border-slate-700 text-white text-xs rounded px-2 py-1 outline-none focus:ring-1 focus:ring-blue-500"
                                        id="meet-input-{{ $siswa->id }}">
                                    <span class="text-xs text-slate-500">/ {{ $siswa->default_total_meet }}</span>
                                    @if($siswa->is_custom)
                                        <span class="text-xs text-amber-400" title="Custom">🟡</span>
                                    @else
                                        <span class="text-xs text-green-400" title="Default">🟢</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-12 text-center text-slate-500">
                                Tidak ada siswa yang terhubung dengan tentor ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Summary Section -->
    @if(count($siswas) > 0)
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-slate-800/40 p-6 rounded-xl border border-slate-700/50">
            <div class="text-slate-400 text-sm mb-1">Total Pendapatan AI Learning</div>
            <div class="text-2xl font-bold text-emerald-400" id="summary-ai-learning">
                Rp {{ number_format($siswas->sum('ai_learning'), 0, ',', '.') }}
            </div>
        </div>
        <div class="bg-slate-800/40 p-6 rounded-xl border border-slate-700/50">
            <div class="text-slate-400 text-sm mb-1">Total Gaji Tentor</div>
            <div class="text-2xl font-bold text-amber-400" id="summary-gaji-tentor">
                Rp {{ number_format($siswas->sum('gaji_tentor'), 0, ',', '.') }}
            </div>
        </div>
        <div class="bg-slate-800/40 p-6 rounded-xl border border-slate-700/50">
            <div class="text-slate-400 text-sm mb-1">Total Omzet</div>
            <div class="text-2xl font-bold text-white" id="summary-biaya">
                Rp {{ number_format($siswas->sum('biaya'), 0, ',', '.') }}
            </div>
        </div>
    </div>
    @endif

    <script>
        function formatRupiah(number) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(number);
        }

        function updateSummary() {
            let totalAiLearning = 0;
            let totalGajiTentor = 0;
            let totalBiaya = 0;

            // Get all rows
            document.querySelectorAll('tr[data-siswa-id]').forEach(row => {
                const id = row.getAttribute('data-siswa-id');
                const aiVal = document.getElementById('ai-learning-' + id).textContent.replace(/[^\d]/g, '');
                const gajiVal = document.getElementById('gaji-tentor-' + id).textContent.replace(/[^\d]/g, '');
                const biayaVal = document.getElementById('biaya-' + id).textContent.replace(/[^\d]/g, '');

                totalAiLearning += parseInt(aiVal || 0);
                totalGajiTentor += parseInt(gajiVal || 0);
                totalBiaya += parseInt(biayaVal || 0);
            });

            document.getElementById('summary-ai-learning').textContent = formatRupiah(totalAiLearning);
            document.getElementById('summary-gaji-tentor').textContent = formatRupiah(totalGajiTentor);
            document.getElementById('summary-biaya').textContent = formatRupiah(totalBiaya);
        }

        function updatePaket(select, siswaId) {
            const tarifId = select.value;
            if (!tarifId) return;

            // Show loading state (optional)
            select.disabled = true;
            rowPulse(siswaId, true);

            fetch('{{ route("biaya.update-paket") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id_siswa: siswaId,
                    id_tarif: tarifId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update table cells
                    document.getElementById('biaya-' + siswaId).textContent = formatRupiah(data.data.biaya);
                    document.getElementById('ai-learning-' + siswaId).textContent = formatRupiah(data.data.ai_learning);
                    document.getElementById('gaji-tentor-' + siswaId).textContent = formatRupiah(data.data.gaji_tentor);
                    document.getElementById('total-meet-' + siswaId).textContent = data.data.total_meet;

                    // Update Summary
                    updateSummary();
                } else {
                    alert('Gagal memperbarui paket.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memperbarui paket.');
            })
            .finally(() => {
                select.disabled = false;
                rowPulse(siswaId, false);
            });
        }

        function rowPulse(id, active) {
            const row = document.querySelector(`tr[data-siswa-id="${id}"]`);
            if (active) {
                row.classList.add('animate-pulse', 'bg-blue-500/5');
            } else {
                row.classList.remove('animate-pulse', 'bg-blue-500/5');
            }
        }

        function updateCustomData(siswaId, field, value) {
            rowPulse(siswaId, true);

            fetch('{{ route("biaya.update-custom") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id_siswa: siswaId,
                    field: field,
                    value: value
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update all affected cells
                    document.getElementById('biaya-' + siswaId).textContent = formatRupiah(data.data.biaya);
                    document.getElementById('ai-learning-' + siswaId).textContent = formatRupiah(data.data.ai_learning);
                    document.getElementById('gaji-tentor-' + siswaId).textContent = formatRupiah(data.data.gaji_tentor);
                    
                    // Update meet input if it was tanggal_masuk that changed
                    if (field === 'tanggal_masuk') {
                        document.getElementById('meet-input-' + siswaId).value = data.data.total_meet;
                    }

                    // Update Summary
                    updateSummary();
                    
                    // Show success feedback (optional)
                    console.log('Data berhasil diperbarui');
                } else {
                    alert('Gagal memperbarui data custom.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memperbarui data.');
            })
            .finally(() => {
                rowPulse(siswaId, false);
            });
        }
    </script>
@endsection
