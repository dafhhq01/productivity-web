<x-layout title="Edit Tugas">
    <div class="h-full flex flex-col overflow-hidden">
        <div class="flex-1 overflow-y-auto no-scrollbar px-5 pt-3 pb-6">
            <div class="flex items-center justify-between mb-5">
                <a href="{{ route('tasks.index') }}" class="w-10 h-10 rounded-full bg-white border-flat flex items-center justify-center text-brand-ink hover:bg-neutral-100 active:scale-95 transition-all">
                    <svg class="w-5 h-5 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                </a>
                <h1 class="text-xl font-extrabold tracking-tight text-brand-ink font-outfit">Edit Tugas</h1>
                <div class="w-10 h-10"></div>
            </div>

            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4 max-w-2xl mx-auto">
                @csrf
                @method('PUT')

                <x-input label="Judul Tugas" name="title" :value="old('title', $task->title)" placeholder="Nama tugas" />

                <div class="mb-4">
                    <label for="description" class="block text-xs font-bold text-brand-ink mb-1.5 ml-1 font-outfit">Deskripsi</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="3"
                        placeholder="Deskripsi tugas (opsional)"
                        class="w-full bg-white border-flat rounded-3xl px-4 py-3 text-sm font-medium placeholder-neutral-400 focus:border-brand-indigo focus:outline-none {{ $errors->has('description') ? 'border-red-400' : '' }}"
                    >{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <p class="text-xs text-red-500 mt-1.5 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <x-input label="Deadline" name="deadline" type="date" :value="old('deadline', $task->deadline)" />

                <div class="mb-4 flex gap-4">
                    <label class="flex items-center space-x-2.5 cursor-pointer bg-white border-flat rounded-full px-4 py-2.5 flex-1">
                        <input type="hidden" name="urgent" value="0">
                        <input 
                            type="checkbox" 
                            name="urgent" 
                            id="urgent" 
                            value="1"
                            {{ old('urgent', $task->urgent) ? 'checked' : '' }}
                            class="w-5 h-5 rounded-lg border-2 border-brand-ink text-brand-coral focus:ring-0 accent-brand-coral"
                        >
                        <span class="text-sm font-bold text-brand-ink">Mendesak</span>
                    </label>

                    <label class="flex items-center space-x-2.5 cursor-pointer bg-white border-flat rounded-full px-4 py-2.5 flex-1">
                        <input type="hidden" name="important" value="0">
                        <input 
                            type="checkbox" 
                            name="important" 
                            id="important" 
                            value="1"
                            {{ old('important', $task->important) ? 'checked' : '' }}
                            class="w-5 h-5 rounded-lg border-2 border-brand-ink text-brand-yellow focus:ring-0 accent-brand-yellow"
                        >
                        <span class="text-sm font-bold text-brand-ink">Penting</span>
                    </label>
                </div>

                <x-input label="Harada Goal (opsional)" name="harada_goal" :value="old('harada_goal', $task->harada_goal)" placeholder="Tujuan Harada" />

                <div class="border-t-2 border-dashed border-neutral-200 my-6"></div>

                <div class="mb-4">
                    <label class="text-sm font-bold text-brand-ink font-outfit mb-3 block">Subtask yang Sudah Ada</label>
                    
                    @if($task->subtasks->isEmpty())
                        <p class="text-sm text-neutral-500 mb-3 text-center py-2">Belum ada subtask</p>
                    @else
                        <div class="mb-3 space-y-2">
                            @foreach($task->subtasks as $subtask)
                                <label class="flex items-center gap-3 bg-white border-flat rounded-3xl px-4 py-3 cursor-pointer hover:bg-neutral-50">
                                    <input 
                                        type="checkbox" 
                                        name="done[]" 
                                        value="{{ $subtask->id }}"
                                        {{ $subtask->is_done ? 'checked' : '' }}
                                        class="w-5 h-5 rounded-lg border-2 border-brand-ink text-brand-lime focus:ring-0 accent-brand-lime"
                                    >
                                    <span class="text-sm font-medium {{ $subtask->is_done ? 'line-through text-neutral-400' : 'text-brand-ink' }}">
                                        {{ $subtask->title }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="border-t-2 border-dashed border-neutral-200 my-6"></div>

                <div class="mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <label class="text-sm font-bold text-brand-ink font-outfit">Tambah Subtask Baru</label>
                        <button type="button" id="btnAddSubtask" class="text-xs font-bold text-brand-indigo hover:underline">+ Tambah Subtask</button>
                    </div>

                    <div id="subtasksContainer" class="space-y-2">
                        <input 
                            type="text" 
                            name="subtasks[0][title]" 
                            placeholder="Nama subtask baru"
                            value="{{ old('subtasks.0.title') }}"
                            class="w-full h-12 bg-white border-flat rounded-3xl px-4 text-sm font-medium placeholder-neutral-400 focus:border-brand-indigo focus:outline-none"
                        >
                    </div>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" class="flex-1 h-12 rounded-full bg-brand-indigo text-white font-bold border-flat shadow-flat hover:bg-opacity-90 active:translate-y-0.5 active:shadow-none transition-all">Simpan Perubahan</button>
                    <a href="{{ route('tasks.index') }}" class="flex-1 h-12 rounded-full bg-white text-brand-ink font-bold border-flat hover:bg-neutral-50 active:translate-y-0.5 transition-all flex items-center justify-center">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        let subtaskIndex = 1;
        const btnAdd = document.getElementById('btnAddSubtask');
        const container = document.getElementById('subtasksContainer');

        btnAdd.addEventListener('click', function(e) {
            e.preventDefault();
            
            const htmlRow = `
                <input 
                    type="text" 
                    name="subtasks[${subtaskIndex}][title]" 
                    placeholder="Nama subtask baru"
                    class="w-full h-12 bg-white border-flat rounded-3xl px-4 text-sm font-medium placeholder-neutral-400 focus:border-brand-indigo focus:outline-none"
                >
            `;

            container.insertAdjacentHTML('beforeend', htmlRow);
            subtaskIndex++;
        });
    </script>
</x-layout>
