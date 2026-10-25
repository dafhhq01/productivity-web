<x-layout title="Daftar Tugas">
    <div class="h-full flex flex-col overflow-hidden">
        <div class="flex-1 overflow-y-auto no-scrollbar px-5 pt-3 pb-4">
            <div class="flex items-center justify-between mt-1 mb-4">
                <h1 class="text-2xl font-extrabold tracking-tight text-brand-ink font-outfit">Tugas Saya</h1>
                <a href="{{ route('tasks.create') }}" class="w-10 h-10 rounded-full bg-brand-indigo border-flat flex items-center justify-center hover:bg-opacity-90 shadow-flat active:translate-y-0.5 active:shadow-none transition-all">
                    <svg class="w-5 h-5 text-white stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="12" x2="12" y1="5" y2="19"></line><line x1="5" x2="19" y1="12" y2="12"></line></svg>
                </a>
            </div>

            <div class="flex items-center space-x-2 overflow-x-auto no-scrollbar py-1 mb-4">
                <button type="button" class="shrink-0 px-4 py-1.5 rounded-full bg-brand-ink border-flat text-white text-xs font-bold">Semua ({{ $tasks->count() }})</button>
                <button type="button" data-dev-feature="Filter Tugas" class="shrink-0 px-3.5 py-1.5 rounded-full bg-white border-flat text-brand-ink text-xs font-bold">Penting & Mendesak</button>
                <button type="button" data-dev-feature="Filter Tugas" class="shrink-0 px-3.5 py-1.5 rounded-full bg-white border-flat text-brand-ink text-xs font-bold">Mendesak</button>
                <button type="button" data-dev-feature="Filter Tugas" class="shrink-0 px-3.5 py-1.5 rounded-full bg-white border-flat text-brand-ink text-xs font-bold">Selesai</button>
            </div>

            @if($tasks->isNotEmpty())
            <div class="bg-white border-flat rounded-2xl p-3 mb-4 flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-brand-indigo"></span>
                    <span class="text-xs font-bold text-brand-ink tracking-tight">{{ $tasks->count() }} total • {{ $tasks->where('progress', 100)->count() }} selesai</span>
                </div>
                <div class="flex items-center space-x-2">
                    @php
                        $avgProgress = $tasks->count() > 0 ? round($tasks->avg('progress')) : 0;
                    @endphp
                    <div class="w-16 h-2 rounded-full bg-slate-200 overflow-hidden border border-slate-400">
                        <div class="h-full bg-brand-indigo rounded-full" style="width: {{ $avgProgress }}%;"></div>
                    </div>
                    <span class="text-xs font-extrabold text-brand-ink">{{ $avgProgress }}%</span>
                </div>
            </div>
            @endif

            @if($tasks->isEmpty())
                <x-card>
                    <p class="text-neutral-600 text-center py-4">Belum ada tugas. Buat tugas pertama Anda!</p>
                </x-card>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3.5">
                    @foreach($tasks as $task)
                    <article class="bg-white border-flat rounded-3xl p-4 shadow-sm flex flex-col justify-between">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <span class="px-2.5 py-1 rounded-full border border-brand-ink font-black text-xs uppercase font-outfit
                                    @if($task->urgent && $task->important) bg-brand-pink text-brand-ink
                                    @elseif($task->important) bg-brand-yellow text-brand-ink
                                    @elseif($task->urgent) bg-brand-coral text-white
                                    @else bg-slate-100 text-slate-700
                                    @endif">
                                    @if($task->urgent && $task->important)
                                        Penting & Mendesak
                                    @elseif($task->important)
                                        Penting
                                    @elseif($task->urgent)
                                        Mendesak
                                    @else
                                        Lainnya
                                    @endif
                                </span>
                            </div>
                            <button type="button" class="w-6 h-6 rounded-full border-2 border-brand-ink hover:bg-slate-100 {{ $task->progress == 100 ? 'bg-brand-lime' : '' }}">
                                @if($task->progress == 100)
                                <svg class="w-3.5 h-3.5 text-brand-ink stroke-[3] mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                @endif
                            </button>
                        </div>
                        <h2 class="font-outfit font-bold text-base text-brand-ink leading-snug break-words {{ $task->progress == 100 ? 'line-through opacity-60' : '' }}">{{ $task->title }}</h2>
                        @if($task->description)
                            <p class="text-xs font-semibold text-slate-500 mt-0.5 mb-3">{{ Str::limit($task->description, 60) }}</p>
                        @endif
                        <div class="w-full mb-3">
                            <div class="flex justify-between items-center text-xs font-bold text-slate-600 mb-1">
                                <span>Subtask {{ $task->subtasks->where('is_done', true)->count() }}/{{ $task->subtasks->count() }}</span>
                                <span class="text-brand-indigo font-extrabold">{{ $task->progress }}%</span>
                            </div>
                            <div class="w-full h-2 rounded-full bg-slate-100 border border-slate-300 p-[1px]">
                                <div class="h-full bg-brand-indigo rounded-full" style="width: {{ $task->progress }}%;"></div>
                            </div>
                        </div>
                        <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-xs font-bold">
                            @if($task->deadline)
                                <div class="flex items-center space-x-1.5 text-neutral-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    <span>Tenggat {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}</span>
                                </div>
                            @else
                                <span class="text-neutral-400">Tanpa deadline</span>
                            @endif
                            <div class="flex gap-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-brand-indigo hover:underline">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus tugas ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-brand-coral hover:underline">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layout>
