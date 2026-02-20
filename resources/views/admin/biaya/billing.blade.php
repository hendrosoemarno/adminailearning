@extends('layouts.admin')

@section('title', 'Draft Tagihan WA')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Draft Tagihan WA</h1>
            <p class="text-slate-400">Salin draf tagihan bulanan untuk dikirimkan secara manual ke WhatsApp Orang Tua.</p>
        </div>
        <div class="flex items-center gap-3">
            <form method="GET" action="{{ route('biaya.billing') }}" class="flex items-center gap-2">
                <input type="month" name="month" value="{{ $month }}" onchange="this.form.submit()"
                    class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
            </form>
            <a href="{{ route('biaya.index') }}"
                class="px-4 py-2 bg-slate-800 text-slate-300 hover:text-white rounded-lg border border-slate-700 transition-all font-semibold">
                Kembali
            </a>
        </div>
    </div>

    <!-- Search Section -->
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 p-6 rounded-xl shadow-lg mb-8">
        <form method="GET" action="{{ route('biaya.billing') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <input type="hidden" name="month" value="{{ $month }}">
            <div class="w-full flex-1 flex flex-col gap-1">
                <label for="search" class="text-sm font-medium text-slate-400">Cari Siswa</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search" placeholder="Nama siswa..." value="{{ $search }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
                </div>
            </div>
            <button type="submit"
                class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg transition-all shadow-lg shadow-blue-500/20">
                Cari
            </button>
        </form>
    </div>

    <!-- Message Configuration -->
    <div
        class="bg-slate-800/30 border border-slate-700/50 p-6 rounded-xl mb-8 flex flex-col md:flex-row items-center gap-6">
        <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                </path>
            </svg>
            <span class="text-sm font-bold text-slate-300 uppercase tracking-wider">Pengaturan Pesan:</span>
        </div>
        <div class="flex flex-wrap items-center gap-4">
            <div class="flex items-center gap-2">
                <label class="text-xs text-slate-500 uppercase font-bold">Bulan:</label>
                <select id="msg-bulan-select" onchange="updateMessageDefaults()"
                    class="bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-sm text-white focus:ring-2 focus:ring-blue-500 outline-none">
                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $m)
                        <option value="{{ $m }}" {{ (isset($bulan) && $bulan == $m) ? 'selected' : '' }}>{{ $m }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-2">
                <label class="text-xs text-slate-500 uppercase font-bold">Tahun:</label>
                <select id="msg-tahun-select" onchange="updateMessageDefaults()"
                    class="bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-sm text-white focus:ring-2 focus:ring-blue-500 outline-none">
                    @for($y = date('Y') - 1; $y <= date('Y') + 1; $y++)
                        <option value="{{ $y }}" {{ (isset($tahun) && $tahun == $y) ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
            </div>
            <div class="text-[10px] text-slate-500 italic ml-2">
                *Mengubah ini akan mengupdate tulisan "bulan" dan "tahun" di semua draf pesan di bawah.
            </div>
        </div>
    </div>

    <div class="space-y-6 pb-12">
        @forelse($billingData as $data)
            @php
                $monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                $parts = explode('-', $month);
                $bulan = $monthNames[(int) $parts[1] - 1];
                $tahun = $parts[0];

                $mathText = $data->subjects['mat'] > 0 ? 'Rp' . number_format($data->subjects['mat'], 0, ',', '.') : '-';
                $englishText = $data->subjects['bing'] > 0 ? 'Rp' . number_format($data->subjects['bing'], 0, ',', '.') : '-';
                $codingText = $data->subjects['coding'] > 0 ? 'Rp' . number_format($data->subjects['coding'], 0, ',', '.') : '-';
                $totalText = 'Rp' . number_format($data->total, 0, ',', '.');
            @endphp

            <div
                class="bg-slate-800/40 border border-slate-700 rounded-2xl overflow-hidden shadow-sm hover:border-slate-600 transition-all">
                <div
                    class="p-6 border-b border-slate-700 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-slate-900/40">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-full bg-emerald-500/10 flex items-center justify-center text-emerald-500 text-xl font-bold">
                            {{ substr($data->nama_siswa, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-lg leading-tight">{{ $data->nama_siswa }}</h3>
                            <div class="flex items-center gap-4 mt-1">
                                <span class="text-xs text-slate-400">Ortu: <span
                                        class="text-slate-200">{{ $data->nama_ortu }}</span></span>
                                <span class="text-xs text-slate-400">WA: <span
                                        class="text-emerald-400 font-mono">{{ $data->wa_ortu }}</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button onclick="copyToClipboard('msg-{{ $data->id }}')"
                            class="flex items-center gap-2 px-6 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-500/20 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            Salin Draf Pesan
                        </button>
                    </div>
                </div>
                <div class="p-6 bg-slate-950/20">
                    <div class="text-[10px] text-slate-500 uppercase font-bold tracking-widest mb-3">Tampilan Pesan WA:</div>
                    <div id="msg-{{ $data->id }}"
                        class="whitespace-pre-wrap font-sans text-sm text-slate-300 bg-slate-950/80 p-8 rounded-2xl border border-slate-700/50 leading-relaxed shadow-inner select-all">
                        بِســـمِ اللّٰـــهِ الرَّحْــــمٰنِ الرَّحِــــيمِ
                        السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللّٰهِ وَبَرَكَاتُهُ

                        Ayah dan Bunda yang kami hormati, Berikut kami sampaikan tagihan untuk ananda *{{ $data->nama_siswa }}*
                        bulan <span class="msg-bulan-label">{{ $bulan }}</span> tahun <span
                            class="msg-tahun-label">{{ $tahun }}</span> :

                        *Math:* {{ $mathText }}
                        *English:* {{ $englishText }}
                        *Junior Coder:* {{ $codingText }}
                        ---------------------------------------------
                        *Total: {{ $totalText }}*

                        Pembayaran dapat dilakukan melalui:
                        ✅ BSI – No. Rek. 7306156987 a.n. Hendro Soemarno
                        ✅ BNI – No. Rek. 0261716072 a.n. Hendro Soemarno

                        Catatan Penting:
                        • Mohon konfirmasi setelah melakukan pembayaran.
                        • *Pembayaran paling lambat dilakukan tanggal 5 setiap bulannya.*
                        • Apabila tidak melanjutkan belajar di AI Learning, mohon konfirmasi maksimal tanggal 1 setiap bulannya.

                        Terima kasih atas perhatian dan kerja sama Ayah Bunda.
                        Jazaakumullaahu khayran.</div>
                </div>
            </div>
        @empty
            <div class="bg-slate-800/50 p-20 rounded-3xl border border-slate-700 border-dashed text-center">
                <svg class="w-16 h-16 text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-slate-500 text-lg">Tidak ada data tagihan yang sesuai dengan filter atau pencarian Anda.</p>
            </div>
        @endforelse
    </div>

    <script>
        function updateMessageDefaults() {
            const bulan = document.getElementById('msg-bulan-select').value;
            const tahun = document.getElementById('msg-tahun-select').value;

            document.querySelectorAll('.msg-bulan-label').forEach(el => el.innerText = bulan);
            document.querySelectorAll('.msg-tahun-label').forEach(el => el.innerText = tahun);
        }

        function copyToClipboard(elementId) {
            const el = document.getElementById(elementId);
            const text = el.innerText;

            navigator.clipboard.writeText(text).then(() => {
                // Show a nice toast or feedback
                const btn = event.currentTarget;
                const originalText = btn.innerHTML;
                btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Berhasil Disalin!';
                btn.classList.remove('bg-emerald-600');
                btn.classList.add('bg-blue-600');

                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.classList.remove('bg-blue-600');
                    btn.classList.add('bg-emerald-600');
                }, 2000);
            }).catch(err => {
                alert('Gagal menyalin text. Silakan salin secara manual.');
            });
        }
    </script>
@endsection