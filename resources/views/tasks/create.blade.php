<x-layout title="Tambah Tugas">
    <section class="container mx-auto max-w-4xl px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Tambah Tugas Baru</h1>

        <x-card>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <x-input label="Judul Tugas" name="title" :value="old('title')" />

                <div class="mb-3">
                    <label for="description" class="block text-sm mb-1">Deskripsi</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="3"
                        class="border rounded-md px-2 py-1.5 w-full text-sm {{ $errors->has('description') ? 'border-red-400' : 'border-neutral-300' }}"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <x-input label="Deadline" name="deadline" type="date" :value="old('deadline')" />

                <div class="mb-3 flex gap-6">
                    <div class="flex items-center">
                        <input type="hidden" name="urgent" value="0">
                        <input 
                            type="checkbox" 
                            name="urgent" 
                            id="urgent" 
                            value="1"
                            {{ old('urgent') ? 'checked' : '' }}
                            class="mr-2"
                        >
                        <label for="urgent" class="text-sm">Mendesak</label>
                    </div>

                    <div class="flex items-center">
                        <input type="hidden" name="important" value="0">
                        <input 
                            type="checkbox" 
                            name="important" 
                            id="important" 
                            value="1"
                            {{ old('important') ? 'checked' : '' }}
                            class="mr-2"
                        >
                        <label for="important" class="text-sm">Penting</label>
                    </div>
                </div>

                <x-input label="Harada Goal (opsional)" name="harada_goal" :value="old('harada_goal')" />

                <hr class="my-6">

                <div class="mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <label class="text-sm font-semibold">Subtask</label>
                        <x-button type="button" id="btnAddSubtask" variant="outline">+ Tambah Subtask</x-button>
                    </div>

                    <div id="subtasksContainer">
                        <div class="mb-2">
                            <input 
                                type="text" 
                                name="subtasks[0][title]" 
                                placeholder="Nama subtask"
                                value="{{ old('subtasks.0.title') }}"
                                class="border border-neutral-300 rounded-md px-2 py-1.5 w-full text-sm"
                            >
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    <x-button type="submit" variant="solid">Simpan Tugas</x-button>
                    <x-button :href="route('tasks.index')" variant="outline">Batal</x-button>
                </div>
            </form>
        </x-card>
    </section>

    <script>
        let subtaskIndex = 1;
        const btnAdd = document.getElementById('btnAddSubtask');
        const container = document.getElementById('subtasksContainer');

        btnAdd.addEventListener('click', function(e) {
            e.preventDefault();
            
            const htmlRow = `
                <div class="mb-2">
                    <input 
                        type="text" 
                        name="subtasks[${subtaskIndex}][title]" 
                        placeholder="Nama subtask"
                        class="border border-neutral-300 rounded-md px-2 py-1.5 w-full text-sm"
                    >
                </div>
            `;

            container.insertAdjacentHTML('beforeend', htmlRow);
            subtaskIndex++;
        });
    </script>
</x-layout>
