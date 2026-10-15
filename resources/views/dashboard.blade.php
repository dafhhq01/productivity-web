<x-layout title="Dashboard">
    <section class="container mx-auto max-w-6xl px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
        
        {{-- Statistik Ringkasan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <x-card>
                <h3 class="text-sm text-neutral-600 mb-2">Tugas Belum Selesai</h3>
                <div class="text-3xl font-bold text-blue-600">{{ $tasksBelumSelesai }}</div>
            </x-card>
            
            <x-card>
                <h3 class="text-sm text-neutral-600 mb-2">Pemasukan Bulan Ini</h3>
                <div class="text-2xl font-bold text-green-600">
                    <x-rupiah :nominal="$totalIncome" />
                </div>
            </x-card>
            
            <x-card>
                <h3 class="text-sm text-neutral-600 mb-2">Pengeluaran Bulan Ini</h3>
                <div class="text-2xl font-bold text-red-600">
                    <x-rupiah :nominal="$totalExpense" />
                </div>
            </x-card>
            
            <x-card>
                <h3 class="text-sm text-neutral-600 mb-2">Total Modal Investasi</h3>
                <div class="text-2xl font-bold text-purple-600">
                    <x-rupiah :nominal="$totalInvestasi" />
                </div>
            </x-card>
        </div>
        
        {{-- Menu Modul --}}
        <h2 class="text-xl font-semibold mb-4">Menu</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <x-card>
                <h2 class="font-semibold text-lg mb-2">Tugas</h2>
                <p class="text-sm text-neutral-600 mb-3">Kelola tugas dan subtask Anda</p>
                <x-button :href="route('tasks.index')">Lihat Tugas</x-button>
            </x-card>
            
            <x-card>
                <h2 class="font-semibold text-lg mb-2">Keuangan</h2>
                <p class="text-sm text-neutral-600 mb-3">Catat pemasukan dan pengeluaran</p>
                <x-button :href="route('transactions.index')">Lihat Keuangan</x-button>
            </x-card>
            
            <x-card>
                <h2 class="font-semibold text-lg mb-2">Budgeting</h2>
                <p class="text-sm text-neutral-600 mb-3">Kelola anggaran bulanan Anda</p>
                <x-button :href="route('budgets.index')">Lihat Budgeting</x-button>
            </x-card>
            
            <x-card>
                <h2 class="font-semibold text-lg mb-2">Investasi</h2>
                <p class="text-sm text-neutral-600 mb-3">Pantau investasi dan keuntungan Anda</p>
                <x-button :href="route('investments.index')">Lihat Investasi</x-button>
            </x-card>
        </div>
    </section>
</x-layout>
