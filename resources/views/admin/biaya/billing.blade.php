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
    <div class="bg-slate-800/30 border border-slate-700/50 p-6 rounded-2xl mb-8 space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <span class="text-sm font-bold text-slate-300 uppercase tracking-wider">Pengaturan Pesan & Template</span>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="resetTemplate()" class="px-3 py-1.5 bg-slate-700 hover:bg-slate-600 text-slate-300 text-[10px] font-bold uppercase rounded-lg transition-all border border-slate-600">
                    Reset
                </button>
                <button id="save-settings-btn" onclick="saveSettings()" class="px-4 py-1.5 bg-blue-600 hover:bg-blue-500 text-white text-[10px] font-bold uppercase rounded-lg transition-all shadow-lg shadow-blue-500/20">
                    Simpan Perubahan
                </button>
                <div class="flex items-center gap-4 border-l border-slate-700 pl-4">
                    <div class="flex items-center gap-2">
                        <label class="text-xs text-slate-500 uppercase font-bold">Bulan:</label>
                        <select id="msg-bulan-select" onchange="renderAllMessages()" class="bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-sm text-white focus:ring-2 focus:ring-blue-500 outline-none">
                            @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $m)
                                @php
                                    $monthNames = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                                    $parts = explode('-', $month);
                                    $defaultBulan = $monthNames[(int)$parts[1] - 1];
                                    $selectedBulan = $msgBulan ?? $defaultBulan;
                                @endphp
                                <option value="{{ $m }}" {{ $selectedBulan == $m ? 'selected' : '' }}>{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-xs text-slate-500 uppercase font-bold">Tahun:</label>
                        <select id="msg-tahun-select" onchange="renderAllMessages()" class="bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-sm text-white focus:ring-2 focus:ring-blue-500 outline-none">
                            @php $selectedTahun = $msgTahun ?? $parts[0]; @endphp
                            @for($y = date('Y')-1; $y <= date('Y')+1; $y++)
                                <option value="{{ $y }}" {{ $selectedTahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <label for="template-editor" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Edit Template Pesan:</label>
                <textarea id="template-editor" rows="12" oninput="renderAllMessages()"
                    class="w-full bg-slate-900/80 border border-slate-700 rounded-xl p-4 text-sm text-slate-300 font-sans leading-relaxed focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">@if($template){{ $template }}@else بِســـمِ اللّٰـــهِ  الرَّحْــــmٰنِ الرَّحِــــيمِ
السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللّٰهِ وَبَرَكَATُهُ

Ayah dan Bunda yang kami hormati, Berikut kami sampaikan tagihan untuk ananda *{nama}* bulan {bulan} tahun {tahun}    :

*Math:* {math}
*English:* {english}
*Junior Coder:* {coding}
---------------------------------------------
*Total: {total}*

Pembayaran dapat dilakukan melalui:
✅ BSI – No. Rek. 7306156987 a.n. Hendro Soemarno
✅ BNI – No. Rek. 0261716072 a.n. Hendro Soemarno

Catatan Penting:
• Mohon konfirmasi setelah melakukan pembayaran.
• *Pembayaran paling lambat dilakukan tanggal 5 setiap bulannya.*
• Apabila tidak melanjutkan belajar di AI Learning, mohon konfirmasi maksimal tanggal 1 setiap bulannya.

Teria kasih atas perhatian dan kerja sama Ayah Bunda.
Jazaakumullaahu khayran. @endif</textarea>
            </div>
            <div class="bg-slate-900/50 rounded-xl p-4 border border-slate-700/50">
                <span class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Placeholders Tersedia:</span>
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-xs p-2 bg-slate-950 rounded border border-slate-800">
                        <code class="text-blue-400 font-bold">{nama}</code>
                        <span class="text-slate-500">Nama Siswa</span>
                    </div>
                    <div class="flex items-center justify-between text-xs p-2 bg-slate-950 rounded border border-slate-800">
                        <code class="text-blue-400 font-bold">{bulan}</code>
                        <span class="text-slate-500">Bulan Pilihan</span>
                    </div>
                    <div class="flex items-center justify-between text-xs p-2 bg-slate-950 rounded border border-slate-800">
                        <code class="text-blue-400 font-bold">{tahun}</code>
                        <span class="text-slate-500">Tahun Pilihan</span>
                    </div>
                    <div class="flex items-center justify-between text-xs p-2 bg-slate-950 rounded border border-slate-800">
                        <code class="text-blue-400 font-bold">{math}</code>
                        <span class="text-slate-500">Tagihan Math</span>
                    </div>
                    <div class="flex items-center justify-between text-xs p-2 bg-slate-950 rounded border border-slate-800">
                        <code class="text-blue-400 font-bold">{english}</code>
                        <span class="text-slate-500">Tagihan English</span>
                    </div>
                    <div class="flex items-center justify-between text-xs p-2 bg-slate-950 rounded border border-slate-800">
                        <code class="text-blue-400 font-bold">{coding}</code>
                        <span class="text-slate-500">Tagihan Coding</span>
                    </div>
                    <div class="flex items-center justify-between text-xs p-2 bg-slate-950 rounded border border-slate-800">
                        <code class="text-blue-400 font-bold">{total}</code>
                        <span class="text-slate-500">Total Tagihan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-6 pb-12">
        @forelse($billingData as $data)
            @php
                $mathText = $data->subjects['mat'] > 0 ? 'Rp' . number_format($data->subjects['mat'], 0, ',', '.') : '-';
                $englishText = $data->subjects['bing'] > 0 ? 'Rp' . number_format($data->subjects['bing'], 0, ',', '.') : '-';
                $codingText = $data->subjects['coding'] > 0 ? 'Rp' . number_format($data->subjects['coding'], 0, ',', '.') : '-';
                $totalText = 'Rp' . number_format($data->total, 0, ',', '.');
                $isSent = $data->is_sent ?? false;
            @endphp
            
            <div id="card-{{ $data->id }}" class="student-card {{ $isSent ? 'border-emerald-500/50 bg-emerald-500/5' : 'bg-slate-800/40 border-slate-700' }} border rounded-2xl overflow-hidden shadow-sm hover:border-slate-600 transition-all"
                data-id="{{ $data->id }}"
                data-nama="{{ $data->nama_siswa }}"
                data-math="{{ $mathText }}"
                data-english="{{ $englishText }}"
                data-coding="{{ $codingText }}"
                data-total="{{ $totalText }}"
                data-sent="{{ $isSent ? '1' : '0' }}">
                
                <div class="p-6 border-b border-slate-700 flex flex-col md:flex-row md:items-center justify-between gap-4 {{ $isSent ? 'bg-emerald-950/20' : 'bg-slate-900/40' }}">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <div class="w-12 h-12 rounded-full {{ $isSent ? 'bg-emerald-500 text-white' : 'bg-emerald-500/10 text-emerald-500' }} flex items-center justify-center text-xl font-bold transition-all">
                                @if($isSent)
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                @else
                                    {{ substr($data->nama_siswa, 0, 1) }}
                                @endif
                            </div>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-lg leading-tight">{{ $data->nama_siswa }}</h3>
                            <div class="flex items-center gap-4 mt-1">
                                <span class="text-xs text-slate-400">Ortu: <span class="text-slate-200">{{ $data->nama_ortu }}</span></span>
                                <span class="text-xs text-slate-400">WA: <span class="text-emerald-400 font-mono">{{ $data->wa_ortu }}</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button id="toggle-btn-{{ $data->id }}" onclick="toggleSentStatus({{ $data->id }})" 
                            class="flex items-center gap-2 px-4 py-2 {{ $isSent ? 'bg-emerald-600/20 text-emerald-400 border border-emerald-500/50' : 'bg-slate-700 text-slate-300 border border-slate-600 hover:bg-slate-600' }} text-xs font-bold rounded-xl transition-all active:scale-95">
                            <span class="status-icon-{{ $data->id }}">
                                @if($isSent)
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg>
                                @else
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @endif
                            </span>
                            <span class="status-text-{{ $data->id }}">{{ $isSent ? 'Sudah Terkirim' : 'Tandai Terkirim' }}</span>
                        </button>

                        <button onclick="copyToClipboardAndMark({{ $data->id }})" 
                            class="flex items-center gap-2 px-6 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-500/20 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            Salin Draf
                        </button>
                    </div>
                </div>
                <div class="p-6 bg-slate-950/20">
                    <div id="msg-{{ $data->id }}" class="msg-content whitespace-pre-wrap font-sans text-sm text-slate-300 bg-slate-950/80 p-8 rounded-2xl border border-slate-700/50 leading-relaxed shadow-inner select-all"></div>
                </div>
            </div>
        @empty
            <div class="bg-slate-800/50 p-20 rounded-3xl border border-slate-700 border-dashed text-center">
                <p class="text-slate-500 text-lg">Tidak ada data tagihan.</p>
            </div>
        @endforelse
    </div>

    <script>
        const DEFAULT_TEMPLATE = `بِســـmِ اللّٰـــهِ  الرَّحْــــmٰنِ الرَّحِــــيمِ
السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللّٰهِ وَبَرَكَATُهُ

Ayah dan Bunda yang kami hormati, Berikut kami sampaikan tagihan untuk ananda *{nama}* bulan {bulan} tahun {tahun}    :

*Math:* {math}
*English:* {english}
*Junior Coder:* {coding}
---------------------------------------------
*Total: {total}*

Pembayaran dapat dilakukan melalui:
✅ BSI – No. Rek. 7306156987 a.n. Hendro Soemarno
✅ BNI – No. Rek. 0261716072 a.n. Hendro Soemarno

Catatan Penting:
• Mohon konfirmasi setelah melakukan pembayaran.
• *Pembayaran paling lambat dilakukan tanggal 5 setiap bulannya.*
• Apabila tidak melanjutkan belajar di AI Learning, mohon konfirmasi maksimal tanggal 1 setiap bulannya.

Teria kasih atas perhatian dan kerja sama Ayah Bunda.
Jazaakumullaahu khayran.`;

        async function saveSettings() {
            const btn = document.getElementById('save-settings-btn');
            const originalHTML = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Menyimpan...';

            const template = document.getElementById('template-editor').value;
            const bulan = document.getElementById('msg-bulan-select').value;
            const tahun = document.getElementById('msg-tahun-select').value;

            try {
                await fetch('{{ route('biaya.save-option') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ key: 'wa_billing_template', value: template })
                });
                await fetch('{{ route('biaya.save-option') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ key: 'wa_billing_msg_bulan', value: bulan })
                });
                await fetch('{{ route('biaya.save-option') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ key: 'wa_billing_msg_tahun', value: tahun })
                });
                btn.innerHTML = 'Berhasil Disimpan!';
                btn.classList.replace('bg-blue-600', 'bg-emerald-600');
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.classList.replace('bg-emerald-600', 'bg-blue-600');
                    btn.disabled = false;
                }, 2000);
            } catch (error) {
                alert('Gagal menyimpan pengaturan.');
                btn.innerHTML = originalHTML;
                btn.disabled = false;
            }
        }

        function renderAllMessages() {
            const template = document.getElementById('template-editor').value;
            const bulan = document.getElementById('msg-bulan-select').value;
            const tahun = document.getElementById('msg-tahun-select').value;
            
            document.querySelectorAll('.student-card').forEach(card => {
                const id = card.getAttribute('data-id');
                const nama = card.getAttribute('data-nama');
                const math = card.getAttribute('data-math');
                const english = card.getAttribute('data-english');
                const coding = card.getAttribute('data-coding');
                const total = card.getAttribute('data-total');
                
                let message = template
                    .replace(/{nama}/g, nama)
                    .replace(/{bulan}/g, bulan)
                    .replace(/{tahun}/g, tahun)
                    .replace(/{math}/g, math)
                    .replace(/{english}/g, english)
                    .replace(/{coding}/g, coding)
                    .replace(/{total}/g, total);
                
                document.getElementById(`msg-${id}`).innerText = message;
            });
        }

        async function toggleSentStatus(studentId, forcedValue = null) {
            const card = document.getElementById(`card-${studentId}`);
            const btn = document.getElementById(`toggle-btn-${studentId}`);
            const currentStatus = card.getAttribute('data-sent') === '1';
            const newStatus = forcedValue !== null ? forcedValue : !currentStatus;

            if (newStatus === currentStatus) return;

            try {
                const response = await fetch('{{ route('biaya.toggle-wa-status') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({
                        student_id: studentId,
                        month: '{{ $month }}',
                        is_sent: newStatus
                    })
                });

                if (response.ok) {
                    card.setAttribute('data-sent', newStatus ? '1' : '0');
                    
                    // Update UI
                    if (newStatus) {
                        card.classList.replace('bg-slate-800/40', 'bg-emerald-500/5');
                        card.classList.replace('border-slate-700', 'border-emerald-500/50');
                        btn.innerHTML = '<span class="status-icon-' + studentId + '"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg></span> <span>Sudah Terkirim</span>';
                        btn.className = 'flex items-center gap-2 px-4 py-2 bg-emerald-600/20 text-emerald-400 border border-emerald-500/50 text-xs font-bold rounded-xl transition-all active:scale-95';
                        
                        // Update initial circle
                        const initialCircle = card.querySelector('.w-12.h-12');
                        initialCircle.innerHTML = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>';
                        initialCircle.className = 'w-12 h-12 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xl font-bold transition-all';
                    } else {
                        card.classList.replace('bg-emerald-500/5', 'bg-slate-800/40');
                        card.classList.replace('border-emerald-500/50', 'border-slate-700');
                        btn.innerHTML = '<span class="status-icon-' + studentId + '"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span> <span>Tandai Terkirim</span>';
                        btn.className = 'flex items-center gap-2 px-4 py-2 bg-slate-700 text-slate-300 border border-slate-600 hover:bg-slate-600 text-xs font-bold rounded-xl transition-all active:scale-95';
                        
                        // Update initial circle
                        const initialCircle = card.querySelector('.w-12.h-12');
                        initialCircle.innerText = card.getAttribute('data-nama').substring(0, 1);
                        initialCircle.className = 'w-12 h-12 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center text-xl font-bold transition-all';
                    }
                }
            } catch (error) {
                console.error('Gagal update status:', error);
            }
        }

        function copyToClipboardAndMark(studentId) {
            const el = document.getElementById(`msg-${studentId}`);
            const text = el.innerText;
            
            navigator.clipboard.writeText(text).then(() => {
                // Auto mark as sent
                toggleSentStatus(studentId, true);

                // Feedback on button
                const btn = event.currentTarget;
                const originalText = btn.innerHTML;
                btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tersalin!';
                setTimeout(() => btn.innerHTML = originalText, 2000);
            });
        }

        function resetTemplate() {
            if(confirm('Apakah Anda yakin ingin mengembalikan template ke pengaturan awal?')) {
                document.getElementById('template-editor').value = DEFAULT_TEMPLATE;
                renderAllMessages();
            }
        }

        document.addEventListener('DOMContentLoaded', () => renderAllMessages());
    </script>
@endsection