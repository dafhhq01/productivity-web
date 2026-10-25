<x-layout title="Daftar Transaksi">
    <div class="h-full flex flex-col overflow-hidden">
        <div class="flex-1 overflow-y-auto no-scrollbar px-5 pt-3 pb-4">
            <div class="flex items-center justify-between mt-1 mb-4">
                <h1 class="text-2xl font-extrabold tracking-tight text-brand-ink font-outfit">Transaksi</h1>
                <a href="{{ route('transactions.create') }}" class="w-10 h-10 rounded-full bg-brand-indigo text-white border-flat shadow-flat flex items-center justify-center hover:bg-opacity-90 active:translate-y-0.5 active:shadow-none transition-all">
                    <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                </a>
            </div>

            <div class="grid grid-cols-3 gap-3 mb-5">
                <div class="bg-white border-flat rounded-3xl p-3.5 shadow-flat-sm">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4 text-brand-lime" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" /></svg>
                        <h3 class="text-[10px] font-bold text-neutral-600 uppercase tracking-wide">Masuk</h3>
                    </div>
                    <div class="text-sm font-extrabold text-brand-ink font-outfit min-w-0 break-words">
                        <x-rupiah :nominal="$totalIncome" />
                    </div>
                </div>

                <div class="bg-white border-flat rounded-3xl p-3.5 shadow-flat-sm">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4 text-brand-coral" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" /></svg>
                        <h3 class="text-[10px] font-bold text-neutral-600 uppercase tracking-wide">Keluar</h3>
                    </div>
                    <div class="text-sm font-extrabold text-brand-ink font-outfit min-w-0 break-words">
                        <x-rupiah :nominal="$totalExpense" />
                    </div>
                </div>

                <div class="bg-white border-flat rounded-3xl p-3.5 shadow-flat-sm">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4 text-brand-indigo" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                        <h3 class="text-[10px] font-bold text-neutral-600 uppercase tracking-wide">Saldo</h3>
                    </div>
                    <div class="text-sm font-extrabold font-outfit min-w-0 break-words {{ $selisih >= 0 ? 'text-brand-lime' : 'text-brand-coral' }}">
                        <x-rupiah :nominal="$selisih" />
                    </div>
                </div>
            </div>

            <div class="bg-white border-flat rounded-3xl p-4 shadow-flat-sm mb-5">
                <form method="GET" action="{{ route('transactions.index') }}" class="flex gap-3">
                    <div class="flex-1">
                        <label class="block text-xs font-bold text-brand-ink mb-1.5 ml-1 font-outfit">Bulan</label>
                        <input type="number" name="bulan" min="1" max="12" value="{{ $bulan }}" class="w-full h-11 bg-white border-flat rounded-[24px] px-4 text-sm font-medium focus:border-brand-indigo focus:outline-none">
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs font-bold text-brand-ink mb-1.5 ml-1 font-outfit">Tahun</label>
                        <input type="number" name="tahun" min="2020" value="{{ $tahun }}" class="w-full h-11 bg-white border-flat rounded-[24px] px-4 text-sm font-medium focus:border-brand-indigo focus:outline-none">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="h-11 px-5 rounded-full bg-brand-indigo text-white font-bold border-flat shadow-flat hover:bg-opacity-90 active:translate-y-0.5 active:shadow-none transition-all text-sm">Filter</button>
                    </div>
                </form>
            </div>

            @if($transactions->isEmpty())
                @if($nearestMonth)
                    <div class="bg-brand-yellow bg-opacity-20 border-2 border-brand-yellow rounded-3xl p-4 mb-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-brand-yellow flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-brand-ink mb-2">Tidak ada transaksi di bulan ini</p>
                                <p class="text-xs text-neutral-600 mb-3">Kamu punya {{ $nearestMonth['count'] }} transaksi di bulan {{ $nearestMonth['month'] }}/{{ $nearestMonth['year'] }}</p>
                                <a href="{{ route('transactions.index', ['bulan' => $nearestMonth['month'], 'tahun' => $nearestMonth['year']]) }}" class="inline-block px-4 py-2 rounded-full bg-brand-indigo text-white text-xs font-bold border-flat shadow-flat hover:bg-opacity-90 active:translate-y-0.5 active:shadow-none transition-all">
                                    Lihat Transaksi
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="bg-white border-flat rounded-3xl p-6 shadow-flat-sm text-center">
                    <svg class="w-16 h-16 mx-auto mb-3 text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                    <p class="text-sm text-neutral-500 font-medium">Belum ada transaksi di bulan ini</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pb-6">
                    @foreach($transactions as $tr)
                        <div class="bg-white border-flat rounded-3xl p-4 shadow-flat-sm">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex items-center gap-2.5">
                                    <span class="text-xs font-bold px-3 py-1 rounded-full border-2 
                                        @if($tr->type === 'income') border-brand-lime bg-brand-lime bg-opacity-20 text-brand-lime
                                        @else border-brand-coral bg-brand-coral bg-opacity-20 text-brand-coral
                                        @endif">
                                        {{ $tr->type === 'income' ? 'Masuk' : 'Keluar' }}
                                    </span>
                                    <span class="text-xs font-bold text-neutral-500 uppercase tracking-wide">{{ $tr->category }}</span>
                                </div>
                            </div>

                            <p class="text-xl font-extrabold text-brand-ink mb-1 font-outfit min-w-0 break-words">
                                <x-rupiah :nominal="$tr->amount" />
                            </p>
                            <p class="text-xs text-neutral-500 font-medium mb-3">{{ \Carbon\Carbon::parse($tr->transaction_date)->format('d M Y') }}</p>

                            @if($tr->note)
                                <p class="text-sm text-neutral-600 mb-3 leading-relaxed break-words">{{ $tr->note }}</p>
                            @endif

                            <div class="flex gap-2 pt-2 border-t-2 border-dashed border-neutral-100">
                                <a href="{{ route('transactions.edit', $tr->id) }}" class="flex-1 h-9 rounded-full bg-white text-brand-ink font-bold border-flat text-sm hover:bg-neutral-50 active:translate-y-0.5 transition-all flex items-center justify-center">Edit</a>
                                <form action="{{ route('transactions.destroy', $tr->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus transaksi ini?');">
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
