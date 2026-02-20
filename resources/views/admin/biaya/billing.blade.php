@extends('layouts.admin')

@section('title', 'Tagihan WA Siswa')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Tagihan WA Siswa</h1>
            <p class="text-slate-400">Kirim rincian tagihan bulanan kepada orang tua siswa melalui WhatsApp.</p>
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

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700">
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Nama Siswa</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Nama Orang Tua</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">WA Ortu</th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Total Tagihan
                        </th>
                        <th class="p-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($billingData as $data)
                        <tr class="hover:bg-slate-700/20 transition-colors">
                            <td class="p-4">
                                <div class="font-medium text-white">{{ $data->nama_siswa }}</div>
                                <div class="text-[10px] text-slate-500 font-mono">ID: #{{ $data->id }}</div>
                            </td>
                            <td class="p-4">
                                <span class="text-sm text-slate-300">{{ $data->nama_ortu }}</span>
                            </td>
                            <td class="p-4 text-center">
                                <span class="text-xs font-mono text-emerald-400">{{ $data->wa_ortu }}</span>
                            </td>
                            <td class="p-4 text-center">
                                <span class="text-sm font-bold text-white">Rp
                                    {{ number_format($data->total, 0, ',', '.') }}</span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center">
                                    @php
                                        // Formatting values for WA
                                        $monthText = Carbon\Carbon::parse($month)->isoFormat('MMMM');
                                        $yearText = Carbon\Carbon::parse($month)->isoFormat('YYYY');

                                        $mathText = $data->subjects['mat'] > 0 ? 'Rp' . number_format($data->subjects['mat'], 0, ',', '.') : '-';
                                        $englishText = $data->subjects['bing'] > 0 ? 'Rp' . number_format($data->subjects['bing'], 0, ',', '.') : '-';
                                        $codingText = $data->subjects['coding'] > 0 ? 'Rp' . number_format($data->subjects['coding'], 0, ',', '.') : '-';
                                        $totalText = 'Rp' . number_format($data->total, 0, ',', '.');

                                        $message = "بِســـمِ اللّٰـــهِ  الرَّحْــــمٰنِ الرَّحِــــيمِ\nالسَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللّٰهِ وَبَرَكَاتُهُ\n\nAyah dan Bunda yang kami hormati, Berikut kami sampaikan tagihan untuk ananda *{$data->nama_siswa}* bulan {$monthText} tahun {$yearText}    :\n\n*Math:* {$mathText}\n*English:* {$englishText}\n*Junior Coder:* {$codingText}\n---------------------------------------------\n*Total: {$totalText}*\n\nPembayaran dapat dilakukan melalui:\n✅ BSI – No. Rek. 7306156987 a.n. Hendro Soemarno\n✅ BNI – No. Rek. 0261716072 a.n. Hendro Soemarno\n\nCatatan Penting:\n• Mohon konfirmasi setelah melakukan pembayaran.\n• *Pembayaran paling lambat dilakukan tanggal 5 setiap bulannya.*\n• Apabila tidak melanjutkan belajar di AI Learning, mohon konfirmasi maksimal tanggal 1 setiap bulannya.\n\nTerima kasih atas perhatian dan kerja sama Ayah Bunda.\nJazaakumullaahu khayran.";

                                        // Clean WA number
                                        $waNumber = preg_replace('/[^0-9]/', '', $data->wa_ortu);
                                        // If starts with 0, change to 62
                                        if (strpos($waNumber, '0') === 0) {
                                            $waNumber = '62' . substr($waNumber, 1);
                                        }
                                    @endphp
                                    <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($message) }}" target="_blank"
                                        class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold rounded-lg transition-all transform hover:scale-105 shadow-lg shadow-emerald-500/20">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.937 3.659 1.431 5.63 1.432h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                        </svg>
                                        Kirim Tagihan
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center text-slate-500">
                                <svg class="w-16 h-16 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Tidak ada data tagihan untuk bulan ini.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection