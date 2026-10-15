<x-layout title="Dashboard">
    <section class="container mx-auto max-w-6xl px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <x-card>
                <h2 class="font-semibold text-lg mb-2">Tugas</h2>
                <p class="text-sm text-neutral-600 mb-3">Kelola tugas dan subtask Anda</p>
                <x-button :href="route('tasks.index')">Lihat Tugas</x-button>
            </x-card>
            
            <x-card>
                <h2 class="font-semibold text-lg mb-2">Coming Soon</h2>
                <p class="text-sm text-neutral-600">Fitur keuangan, budgeting, dan investasi akan segera hadir.</p>
            </x-card>
        </div>
    </section>
</x-layout>
