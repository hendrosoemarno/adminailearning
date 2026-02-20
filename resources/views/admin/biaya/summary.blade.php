@extends('layouts.admin')

@section('title', 'Ringkasan Biaya Siswa Keseluruhan')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Biaya Siswa Keseluruhan</h1>
            <p class="text-slate-400">Ringkasan biaya seluruh siswa dikelompokkan berdasarkan mata pelajaran dan tentor.</p>
        </div>
        <div class="flex items-center gap-3">
            <form method="GET" action="{{ route('biaya.summary') }}" class="flex items-center gap-2">
                <input type="month" name="month" value="{{ $month }}" onchange="this.form.submit()"
                    class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white outline-none focus:ring-2 focus:ring-blue-500 transition-all">
            </form>
            <a href="{{ route('biaya.summary.export', ['month' => $month]) }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded-lg transition-all font-semibold flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export CSV
            </a>
            <a href="{{ route('biaya.index') }}" class="px-4 py-2 bg-slate-800 text-slate-300 hover:text-white rounded-lg border border-slate-700 transition-all font-semibold">
                Daftar Tentor
            </a>
        </div>
    </div>

    @php
        $grandTotalBiaya = 0;
        $grandTotalAiLearning = 0;
        $grandTotalGajiTentor = 0;
    @endphp

    @foreach($data as $label => $tentors)
        <div class="mb-12">
            <h2 class="text-xl font-bold text-blue-400 mb-6 flex items-center gap-2">
                <span class="w-2 h-8 bg-blue-500 rounded-full"></span>
                {{ $label }}
            </h2>

            @foreach($tentors as $item)
                @php
                    $tentor = $item['tentor'];
                    $siswas = $item['siswas'];
                    $totalBiaya = $siswas->sum('biaya');
                    $totalAiLearning = $siswas->sum('ai_learning');
                    $totalGajiTentor = $siswas->sum('gaji_tentor');
                    
                    $grandTotalBiaya += $totalBiaya;
                    $grandTotalAiLearning += $totalAiLearning;
                    $grandTotalGajiTentor += $totalGajiTentor;
                @endphp

                <div class="mb-8 bg-slate-800/30 border border-slate-700/50 rounded-2xl overflow-hidden shadow-sm">
                    <div class="px-6 py-4 bg-slate-900/40 border-b border-slate-700/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold">
                                {{ substr($tentor->nama, 0, 1) }}
                            </div>
                            <div>
                                <div class="text-white font-bold">{{ $tentor->nama }}</div>
                                <div class="text-xs text-slate-500">Tentor {{ $label }}</div>
                            </div>
                        </div>
                        <div class="flex gap-6 text-right">
                            <div class="flex flex-col">
                                <span class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Gaji Tentor</span>
                                <span class="text-sm font-bold text-amber-400">Rp {{ number_format($totalGajiTentor, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex flex-col border-l border-slate-700 pl-6">
                                <span class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">AI Learning</span>
                                <span class="text-sm font-bold text-emerald-400">Rp {{ number_format($totalAiLearning, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex flex-col border-l border-slate-700 pl-6">
                                <span class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Total Omzet</span>
                                <span class="text-sm font-bold text-white">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-900/20 border-b border-slate-700/50">
                                    <th class="p-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">User ID</th>
                                    <th class="p-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Nama Siswa</th>
                                    <th class="p-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Paket</th>
                                    <th class="p-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Tgl Masuk</th>
                                    <th class="p-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Biaya</th>
                                    <th class="p-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">AI Learning</th>
                                    <th class="p-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Gaji Tentor</th>
                                    <th class="p-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">Meet</th>
                                    <th class="p-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">Realisasi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700/30">
                                @foreach($siswas as $siswa)
                                    <tr class="hover:bg-slate-700/10 transition-colors">
                                        <td class="p-4 text-xs font-mono text-slate-500">#{{ $siswa->id }}</td>
                                        <td class="p-4">
                                            <div class="text-sm font-medium text-slate-300">{{ $siswa->firstname }} {{ $siswa->lastname }}</div>
                                        </td>
                                        <td class="p-4">
                                            <span class="text-xs font-bold text-blue-400 bg-blue-500/5 px-2 py-1 rounded border border-blue-500/10">
                                                {{ $siswa->paket_kode }}
                                            </span>
                                        </td>
                                        <td class="p-4 text-xs text-slate-400">
                                            {{ $siswa->tanggal_masuk ? date('d/m/Y', strtotime($siswa->tanggal_masuk)) : '-' }}
                                        </td>
                                        <td class="p-4 text-[13px] text-white font-semibold">Rp {{ number_format($siswa->biaya, 0, ',', '.') }}</td>
                                        <td class="p-4 text-[13px] text-emerald-500">Rp {{ number_format($siswa->ai_learning, 0, ',', '.') }}</td>
                                        <td class="p-4 text-[13px] text-amber-500">Rp {{ number_format($siswa->gaji_tentor, 0, ',', '.') }}</td>
                                        <td class="p-4 text-center">
                                            <span class="text-xs text-slate-400">{{ $siswa->total_meet }}x</span>
                                        </td>
                                        <td class="p-4 text-center">
                                            @php
                                                $statusClass = 'text-slate-400';
                                                if ($siswa->realisasi_kbm >= $siswa->total_meet && $siswa->total_meet > 0) {
                                                    $statusClass = 'text-emerald-400 font-bold';
                                                } elseif ($siswa->realisasi_kbm > 0) {
                                                    $statusClass = 'text-amber-400';
                                                }
                                            @endphp
                                            <span class="text-xs {{ $statusClass }}">{{ $siswa->realisasi_kbm }}x</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <!-- Grand Summary -->
    <div class="mt-16 bg-slate-900 border border-blue-500/30 rounded-3xl p-8 shadow-2xl shadow-blue-500/10 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/5 rounded-full -mr-32 -mt-32 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-cyan-500/5 rounded-full -ml-32 -mb-32 blur-3xl"></div>
        
        <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            Ringkasan Pendapatan Keseluruhan ({{ Carbon\Carbon::parse($month)->isoFormat('MMMM YYYY') }})
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700/50">
                <div class="text-slate-400 text-xs uppercase font-bold tracking-widest mb-2">Total Gaji Tentor</div>
                <div class="text-3xl font-bold text-amber-400">Rp {{ number_format($grandTotalGajiTentor, 0, ',', '.') }}</div>
            </div>
            <div class="bg-slate-800/50 p-6 rounded-2xl border border-slate-700/50">
                <div class="text-slate-400 text-xs uppercase font-bold tracking-widest mb-2">Total AI Learning</div>
                <div class="text-3xl font-bold text-emerald-400">Rp {{ number_format($grandTotalAiLearning, 0, ',', '.') }}</div>
            </div>
            <div class="bg-slate-800/50 p-6 rounded-2xl border border-blue-500/20">
                <div class="text-blue-400/80 text-xs uppercase font-bold tracking-widest mb-2">Grand Total Omzet</div>
                <div class="text-3xl font-bold text-white">Rp {{ number_format($grandTotalBiaya, 0, ',', '.') }}</div>
            </div>
        </div>
    </div>
@endsection
