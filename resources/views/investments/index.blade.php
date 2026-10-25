<x-layout title="Daftar Investasi">
    <div class="h-full flex flex-col overflow-hidden">
        <div class="flex-1 overflow-y-auto no-scrollbar px-5 pt-3 pb-4">
            <div class="flex items-center justify-between mt-1 mb-4">
                <h1 class="text-2xl font-extrabold tracking-tight text-brand-ink font-outfit">Investasi</h1>
                <a href="{{ route('investments.create') }}" class="w-10 h-10 rounded-full bg-brand-indigo text-white border-flat shadow-flat flex items-center justify-center hover:bg-opacity-90 active:translate-y-0.5 active:shadow-none transition-all">
                    <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                </a>
            </div>

            @if($investments->isEmpty())
                <div class="bg-white border-flat rounded-3xl p-6 shadow-flat-sm text-center">
                    <svg class="w-16 h-16 mx-auto mb-3 text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                    <p class="text-sm text-neutral-500 font-medium">Belum ada investasi</p>
                    <p class="text-xs text-neutral-400 mt-1">Mulai investasi Anda sekarang!</p>
                </div>
            @else
                @php
                    $totalInvested = $investments->sum('amount_invested');
                    $totalCurrent = $investments->sum('current_value');
                    $totalProfit = $totalCurrent - $totalInvested;
                @endphp

                <div class="grid grid-cols-3 gap-3 mb-5">
                    <div class="bg-white border-flat rounded-3xl p-3.5 shadow-flat-sm">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-brand-indigo" fill="currentColor" viewBox="0 0 20 20"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" /><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" /></svg>
                            <h3 class="text-[10px] font-bold text-neutral-600 uppercase tracking-wide">Modal</h3>
                        </div>
                        <div class="text-sm font-extrabold text-brand-ink font-outfit min-w-0 break-words">
                            <x-rupiah :nominal="$totalInvested" />
                        </div>
                    </div>

                    <div class="bg-white border-flat rounded-3xl p-3.5 shadow-flat-sm">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-brand-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                            <h3 class="text-[10px] font-bold text-neutral-600 uppercase tracking-wide">Sekarang</h3>
                        </div>
                        <div class="text-sm font-extrabold text-brand-ink font-outfit min-w-0 break-words">
                            <x-rupiah :nominal="$totalCurrent" />
                        </div>
                    </div>

                    <div class="bg-white border-flat rounded-3xl p-3.5 shadow-flat-sm">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 {{ $totalProfit >= 0 ? 'text-brand-lime' : 'text-brand-coral' }}" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" /></svg>
                            <h3 class="text-[10px] font-bold text-neutral-600 uppercase tracking-wide">Untung</h3>
                        </div>
                        <div class="text-sm font-extrabold font-outfit min-w-0 break-words {{ $totalProfit >= 0 ? 'text-brand-lime' : 'text-brand-coral' }}">
                            <x-rupiah :nominal="$totalProfit" />
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pb-6">
                    @foreach($investments as $inv)
                        @php
                            $profit = $inv->current_value - $inv->amount_invested;
                            $profitPercent = $inv->amount_invested > 0 ? round(($profit / $inv->amount_invested) * 100, 2) : 0;
                        @endphp
                        <div class="bg-white border-flat rounded-3xl p-4 shadow-flat-sm">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-base font-extrabold text-brand-ink font-outfit mb-1 break-words">{{ $inv->name }}</h3>
                                    <p class="text-xs text-neutral-500 font-medium">
                                        Mulai: {{ \Carbon\Carbon::parse($inv->start_date)->format('d M Y') }}
                                    </p>
                                </div>
                                <span class="text-xs font-bold px-3 py-1 rounded-full border-2 {{ $profit >= 0 ? 'border-brand-lime bg-brand-lime bg-opacity-20 text-brand-lime' : 'border-brand-coral bg-brand-coral bg-opacity-20 text-brand-coral' }}">
                                    {{ $profitPercent >= 0 ? '+' : '' }}{{ $profitPercent }}%
                                </span>
                            </div>

                            <div class="grid grid-cols-2 gap-3 mb-3">
                                <div>
                                    <p class="text-[10px] font-bold text-neutral-500 uppercase tracking-wide mb-1">Modal</p>
                                    <p class="text-sm font-bold text-brand-ink min-w-0 break-words"><x-rupiah :nominal="$inv->amount_invested" /></p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-neutral-500 uppercase tracking-wide mb-1">Bunga/Tahun</p>
                                    <p class="text-sm font-bold text-brand-ink">{{ number_format($inv->annual_rate, 2) }}%</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-neutral-500 uppercase tracking-wide mb-1">Nilai Sekarang</p>
                                    <p class="text-sm font-bold text-brand-indigo min-w-0 break-words"><x-rupiah :nominal="$inv->current_value" /></p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-neutral-500 uppercase tracking-wide mb-1">Keuntungan</p>
                                    <p class="text-sm font-bold min-w-0 break-words {{ $profit >= 0 ? 'text-brand-lime' : 'text-brand-coral' }}"><x-rupiah :nominal="$profit" /></p>
                                </div>
                            </div>

                            <div class="flex gap-2 pt-3 border-t-2 border-dashed border-neutral-100">
                                <a href="{{ route('investments.edit', $inv->id) }}" class="flex-1 h-9 rounded-full bg-white text-brand-ink font-bold border-flat text-sm hover:bg-neutral-50 active:translate-y-0.5 transition-all flex items-center justify-center">Edit</a>
                                <form action="{{ route('investments.destroy', $inv->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus investasi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full h-9 rounded-full bg-white text-brand-coral font-bold border-flat text-sm hover:bg-red-50 active:translate-y-0.5 transition-all">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layout>
