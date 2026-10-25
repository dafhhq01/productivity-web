<x-layout title="Dashboard">
    <div class="h-full flex flex-col overflow-hidden">
        <div class="flex-1 overflow-y-auto no-scrollbar px-5 pt-3 pb-4 space-y-5">
            <header class="flex items-center justify-between pt-3">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-brand-indigo border-flat flex items-center justify-center font-outfit font-extrabold text-white text-base">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-xs font-bold text-neutral-500 uppercase tracking-wider">Selamat datang kembali</p>
                        <h1 class="font-outfit text-xl font-extrabold text-brand-ink tracking-tight leading-tight">Halo, {{ explode(' ', auth()->user()->name)[0] }}</h1>
                    </div>
                </div>
                <button type="button" data-dev-feature="Notifikasi" class="w-10 h-10 rounded-full bg-white border-flat flex items-center justify-center hover:bg-neutral-100 relative active:scale-95 transition-all">
                    <svg class="w-5 h-5 text-brand-ink" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-2.5 right-2.5 w-2.5 h-2.5 bg-brand-pink rounded-full border-2 border-white"></span>
                </button>
            </header>

            <section>
                <div class="flex items-center justify-between mb-3">
                    <h2 class="font-outfit text-base font-extrabold text-brand-ink tracking-tight">Ringkasan</h2>
                    <span class="text-xs font-bold text-brand-indigo bg-indigo-50 px-2 py-0.5 rounded-full">Bulan ini</span>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                    <a href="{{ route('tasks.index') }}" class="bg-brand-yellow rounded-3xl border-flat p-4 flex flex-col justify-between h-28 shadow-flat hover:shadow-flat-sm active:translate-y-1 active:shadow-none transition-all">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-extrabold text-brand-ink uppercase tracking-wide">Tugas</span>
                            <div class="w-7 h-7 rounded-full bg-white border border-brand-ink flex items-center justify-center text-brand-ink">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </div>
                        </div>
                        <div>
                            <p class="font-outfit text-xl font-black text-brand-ink leading-none">{{ $tasksBelumSelesai }} tugas</p>
                            <p class="text-xs font-bold text-brand-ink mt-1 opacity-80">belum selesai</p>
                        </div>
                    </a>

                    <a href="{{ route('transactions.index') }}" class="bg-brand-lime rounded-3xl border-flat p-4 flex flex-col justify-between h-28 shadow-flat hover:shadow-flat-sm active:translate-y-1 active:shadow-none transition-all">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-extrabold text-brand-ink uppercase tracking-wide">Pemasukan</span>
                            <div class="w-7 h-7 rounded-full bg-white border border-brand-ink flex items-center justify-center text-brand-ink">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"></path></svg>
                            </div>
                        </div>
                        <div>
                            <p class="font-outfit text-xl font-black text-brand-ink leading-none min-w-0 break-words"><x-rupiah :nominal="$totalIncome" /></p>
                            <p class="text-xs font-bold text-brand-ink mt-1 opacity-80">bulan ini</p>
                        </div>
                    </a>

                    <a href="{{ route('transactions.index') }}" class="bg-brand-pink rounded-3xl border-flat p-4 flex flex-col justify-between h-28 shadow-flat hover:shadow-flat-sm active:translate-y-1 active:shadow-none transition-all">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-extrabold text-brand-ink uppercase tracking-wide">Pengeluaran</span>
                            <div class="w-7 h-7 rounded-full bg-white border border-brand-ink flex items-center justify-center text-brand-ink">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path></svg>
                            </div>
                        </div>
                        <div>
                            <p class="font-outfit text-xl font-black text-brand-ink leading-none min-w-0 break-words"><x-rupiah :nominal="$totalExpense" /></p>
                            <p class="text-xs font-bold text-brand-ink mt-1 opacity-80">bulan ini</p>
                        </div>
                    </a>

                    <a href="{{ route('investments.index') }}" class="bg-brand-blue rounded-3xl border-flat p-4 flex flex-col justify-between h-28 shadow-flat hover:shadow-flat-sm active:translate-y-1 active:shadow-none transition-all">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-extrabold text-brand-ink uppercase tracking-wide">Investasi</span>
                            <div class="w-7 h-7 rounded-full bg-white border border-brand-ink flex items-center justify-center text-brand-ink">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            </div>
                        </div>
                        <div>
                            <p class="font-outfit text-xl font-black text-brand-ink leading-none min-w-0 break-words"><x-rupiah :nominal="$totalInvestasi" /></p>
                            <p class="text-xs font-bold text-brand-ink mt-1 opacity-80">total modal</p>
                        </div>
                    </a>
                </div>
            </section>

            @if($urgentTasks->isNotEmpty())
            <section class="space-y-3 pt-1">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <h2 class="font-outfit text-base font-extrabold text-brand-ink tracking-tight">Tugas Mendesak</h2>
                        <span class="bg-brand-indigo text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $urgentTasks->count() }}</span>
                    </div>
                    <a href="{{ route('tasks.index') }}" class="text-xs font-bold text-brand-indigo hover:underline">Lihat semua</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach($urgentTasks as $task)
                    <div class="bg-white rounded-3xl p-4 space-y-3 border-flat shadow-sm">
                        <div class="flex items-start justify-between gap-2">
                            <div class="flex-1 min-w-0">
                                <span class="inline-block border border-brand-ink text-brand-ink text-xs font-extrabold uppercase px-2.5 py-1 rounded-full tracking-wider mb-1.5 
                                    @if($task->urgent && $task->important) bg-brand-pink
                                    @elseif($task->important) bg-brand-yellow
                                    @else bg-brand-coral
                                    @endif">
                                    @if($task->urgent && $task->important)
                                        Penting & Mendesak
                                    @elseif($task->important)
                                        Penting
                                    @else
                                        Mendesak
                                    @endif
                                </span>
                                <h3 class="font-outfit text-sm font-bold text-brand-ink leading-snug break-words">{{ $task->title }}</h3>
                                @if($task->deadline)
                                    <p class="text-xs font-bold text-neutral-500 mt-0.5">Tenggat: {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <div class="flex justify-between items-center text-xs font-bold">
                                <span class="text-neutral-500">Progres</span>
                                <span class="text-brand-ink">{{ $task->progress }}%</span>
                            </div>
                            <div class="w-full h-2.5 bg-neutral-100 rounded-full overflow-hidden p-0.5 border border-neutral-300">
                                <div class="h-full bg-brand-indigo rounded-full" style="width: {{ $task->progress }}%"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
        </div>
    </div>
</x-layout>
