@extends('layouts.admin')

@section('title', 'Telah Monitoring')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Telah Monitoring</h1>
        <p class="text-slate-400">Klik pada jadwal yang telah Anda pantau untuk mencatatnya.</p>
    </div>

    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-xl mb-12 overflow-hidden">
        <div class="overflow-auto rounded-xl max-h-[calc(100vh-250px)]">
            <table class="w-full text-left border-collapse table-fixed">
                <thead class="sticky top-0 z-30 shadow-lg">
                    <tr class="bg-slate-900 border-b border-slate-700">
                        <th
                            class="p-2 w-16 text-[9px] font-bold text-slate-400 uppercase tracking-wider border-r border-slate-700/50 bg-slate-900 text-center whitespace-nowrap">
                            Waktu</th>
                        @foreach($hariLabels as $index => $label)
                            <th
                                class="p-2 text-[9px] font-bold text-slate-400 uppercase tracking-wider bg-slate-900 text-center whitespace-nowrap">
                                {{ $label }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @foreach($waktus as $waktu)
                        <tr class="hover:bg-slate-700/10 transition-colors border-b border-slate-700/30">
                            <td
                                class="p-2 text-[10px] font-bold text-slate-500 bg-slate-900/30 border-r border-slate-700/50 font-mono text-center">
                                {{ $waktu->waktu }}
                            </td>
                            @for($hari = 1; $hari <= 7; $hari++)
                                <td class="p-1 align-top border-r border-slate-700/30">
                                    @php $items = $mappedSchedule[$hari][$waktu->id] ?? []; @endphp
                                    @if(count($items) > 0)
                                        <div class="flex flex-col gap-1">
                                            @foreach($items as $item)
                                                <button type="button"
                                                    onclick="openMonitoringModal('{{ $item->id_tentor }}', '{{ $item->id_siswa }}', '{{ $item->tentor->nickname ?? '?' }}', '{{ $item->siswa->firstname ?? '?' }}')"
                                                    class="bg-blue-500/10 border border-blue-500/20 px-1.5 py-1 rounded text-[9px] group text-left hover:bg-emerald-500/20 hover:border-emerald-500/30 transition-all">
                                                    <div class="flex items-center justify-between gap-1 overflow-hidden">
                                                        <span
                                                            class="text-blue-400 group-hover:text-emerald-400 font-bold leading-tight truncate uppercase tracking-wider">
                                                            {{ $item->tentor->nickname ?? '?' }}-{{ $item->siswa->firstname ?? '?' }}
                                                        </span>
                                                        <svg class="w-2.5 h-2.5 text-slate-500 group-hover:text-emerald-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </div>
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Monitoring Modal -->
    <div id="monitoring-modal" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm" onclick="closeMonitoringModal()"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-md p-6">
            <div
                class="bg-slate-800 border border-slate-700 rounded-2xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-200">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2">Konfirmasi Monitoring</h3>
                    <p class="text-slate-400 text-sm mb-6">Anda akan mencatat monitoring untuk <span id="modal-names"
                            class="text-blue-400 font-bold"></span>.</p>

                    <form id="monitoring-form" action="{{ route('presensi-monitoring.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_tentor" id="form-id-tentor">
                        <input type="hidden" name="id_siswa" id="form-id-siswa">

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-slate-300 mb-2">Tanggal Monitoring</label>
                            <input type="date" name="tgl_monitoring" required value="{{ date('Y-m-d') }}"
                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                        </div>

                        <div class="flex gap-3">
                            <button type="button" onclick="closeMonitoringModal()"
                                class="flex-1 px-6 py-3 bg-slate-700 text-slate-300 font-bold rounded-xl hover:bg-slate-600 transition-colors">
                                Batal
                            </button>
                            <button type="submit"
                                class="flex-1 px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/20 transition-all">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openMonitoringModal(idTentor, idSiswa, tentorName, siswaName) {
            document.getElementById('form-id-tentor').value = idTentor;
            document.getElementById('form-id-siswa').value = idSiswa;
            document.getElementById('modal-names').textContent = tentorName + ' - ' + siswaName;
            document.getElementById('monitoring-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeMonitoringModal() {
            document.getElementById('monitoring-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    </script>
@endsection