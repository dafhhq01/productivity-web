<x-layout title="Daftar Tugas">
    <section class="container mx-auto max-w-6xl px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Daftar Tugas</h1>
            <x-button :href="route('tasks.create')" variant="solid">+ Tambah Tugas</x-button>
        </div>

        @if($tasks->isEmpty())
            <x-card>
                <p class="text-neutral-600 text-center py-4">Belum ada tugas. Buat tugas pertama Anda!</p>
            </x-card>
        @else
            <div class="space-y-4">
                @foreach($tasks as $task)
                    <x-card>
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold mb-2">{{ $task->title }}</h2>
                                
                                @if($task->description)
                                    <p class="text-neutral-600 text-sm mb-3">{{ $task->description }}</p>
                                @endif

                                <div class="flex items-center gap-4 mb-3">
                                    {{-- Kuadran berdasarkan urgent dan important --}}
                                    <span class="text-sm px-2 py-1 rounded 
                                        @if($task->urgent && $task->important) bg-red-100 text-red-800
                                        @elseif($task->important) bg-yellow-100 text-yellow-800
                                        @elseif($task->urgent) bg-orange-100 text-orange-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        @if($task->urgent && $task->important)
                                            Penting & Mendesak
                                        @elseif($task->important)
                                            Penting & Tidak Mendesak
                                        @elseif($task->urgent)
                                            Mendesak & Tidak Penting
                                        @else
                                            Tidak Penting & Tidak Mendesak
                                        @endif
                                    </span>

                                    @if($task->deadline)
                                        <span class="text-sm text-neutral-600">
                                            📅 {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Progress bar --}}
                                <div class="mb-2">
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-neutral-600">Progress</span>
                                        <span class="font-semibold">{{ $task->progress }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $task->progress }}%"></div>
                                    </div>
                                </div>

                                @if($task->harada_goal)
                                    <p class="text-sm text-neutral-500">🎯 {{ $task->harada_goal }}</p>
                                @endif
                            </div>

                            <div class="flex gap-2 ml-4">
                                <x-button :href="route('tasks.edit', $task->id)" variant="outline">Edit</x-button>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin hapus tugas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <x-button type="submit" variant="outline">Hapus</x-button>
                                </form>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </section>
</x-layout>
