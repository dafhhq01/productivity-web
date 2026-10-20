<x-layout title="Budgeting">
    <div class="flex-1 overflow-y-auto no-scrollbar px-5 pt-3">
        <div class="flex items-center justify-between mt-1 mb-4">
            <h1 class="text-2xl font-extrabold tracking-tight text-brand-ink font-outfit">Budget</h1>
            <a href="{{ route('budgets.create') }}" class="w-10 h-10 rounded-full bg-brand-indigo text-white border-flat shadow-flat flex items-center justify-center hover:bg-opacity-90 active:translate-y-0.5 active:shadow-none transition-all">
                <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
            </a>
        </div>

        <div class="bg-white border-flat rounded-3xl p-4 shadow-flat-sm mb-5">
            <form method="GET" action="{{ route('budgets.index') }}" class="flex gap-3">
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

        @if(count($summary) > 0)
            <div class="bg-white border-flat rounded-3xl p-4 shadow-flat-sm mb-5">
                <h2 class="text-sm font-extrabold text-brand-ink mb-4 font-outfit">Budget vs Pengeluaran</h2>
                <div class="space-y-3">
                    @foreach($summary as $row)
                        @php
                            $percent = $row->budget > 0 ? min(100, round(($row->spent / $row->budget) * 100)) : 0;
                            $isOver = $row->remaining < 0;
                        @endphp
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-xs font-bold text-brand-ink uppercase tracking-wide">{{ ucfirst($row->category) }}</span>
                                <span class="text-xs font-bold {{ $isOver ? 'text-brand-coral' : 'text-neutral-600' }}">
                                    {{ $percent }}%
                                </span>
                            </div>
                            <div class="flex gap-2 text-[10px] font-medium text-neutral-500 mb-1.5">
                                <span><x-rupiah :nominal="$row->spent" /> / <x-rupiah :nominal="$row->budget" /></span>
                                <span class="ml-auto {{ $isOver ? 'text-brand-coral font-bold' : 'text-brand-lime font-bold' }}">
                                    Sisa: <x-rupiah :nominal="$row->remaining" />
                                </span>
                            </div>
                            <div class="h-3 bg-neutral-100 rounded-full overflow-hidden border-2 border-brand-ink">
                                <div class="h-full {{ $isOver ? 'bg-brand-coral' : 'bg-brand-lime' }} transition-all" style="width: {{ $percent }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($budgets->isEmpty())
            <div class="bg-white border-flat rounded-3xl p-6 shadow-flat-sm text-center">
                <svg class="w-16 h-16 mx-auto mb-3 text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                <p class="text-sm text-neutral-500 font-medium">Belum ada budget di bulan ini</p>
            </div>
        @else
            <div class="space-y-3 pb-6">
                @foreach($budgets as $budget)
                    <div class="bg-white border-flat rounded-3xl p-4 shadow-flat-sm">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="text-base font-extrabold text-brand-ink font-outfit mb-1">{{ ucfirst($budget->category) }}</h3>
                                <p class="text-sm font-bold text-neutral-600">
                                    <x-rupiah :nominal="$budget->amount" />
                                </p>
                                <p class="text-xs text-neutral-500 font-medium mt-1">{{ $budget->month }}/{{ $budget->year }}</p>
                            </div>
                        </div>

                        <div class="flex gap-2 pt-3 border-t-2 border-dashed border-neutral-100">
                            <a href="{{ route('budgets.edit', $budget->id) }}" class="flex-1 h-9 rounded-full bg-white text-brand-ink font-bold border-flat text-sm hover:bg-neutral-50 active:translate-y-0.5 transition-all flex items-center justify-center">Edit</a>
                            <form action="{{ route('budgets.destroy', $budget->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus budget ini?');">
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
</x-layout>
