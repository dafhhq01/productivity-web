<x-layout title="Daftar Transaksi">
    <section class="container mx-auto max-w-6xl px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Daftar Transaksi</h1>
            <x-button :href="route('transactions.create')" variant="solid">+ Tambah Transaksi</x-button>
        </div>

        {{-- Ringkasan --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <x-card>
                <h3 class="text-sm text-neutral-600 mb-2">Total Pemasukan</h3>
                <div class="text-2xl font-bold">
                    <x-rupiah :nominal="$totalIncome" />
                </div>
            </x-card>
            <x-card>
                <h3 class="text-sm text-neutral-600 mb-2">Total Pengeluaran</h3>
                <div class="text-2xl font-bold">
                    <x-rupiah :nominal="$totalExpense" />
                </div>
            </x-card>
            <x-card>
                <h3 class="text-sm text-neutral-600 mb-2">Selisih</h3>
                <div class="text-2xl font-bold {{ $selisih >= 0 ? 'text-green-600' : 'text-red-600' }}">
                    <x-rupiah :nominal="$selisih" />
                </div>
            </x-card>
        </div>

        {{-- Filter Bulan dan Tahun --}}
        <x-card class="mb-6">
            <form method="GET" action="{{ route('transactions.index') }}" class="flex gap-3">
                <div class="flex-1">
                    <label class="block text-sm mb-1">Bulan</label>
                    <input type="number" name="bulan" min="1" max="12" value="{{ $bulan }}" class="border rounded-md px-2 py-2.5 w-full text-sm border-neutral-300">
                </div>
                <div class="flex-1">
                    <label class="block text-sm mb-1">Tahun</label>
                    <input type="number" name="tahun" min="2020" value="{{ $tahun }}" class="border rounded-md px-2 py-2.5 w-full text-sm border-neutral-300">
                </div>
                <div class="flex items-end">
                    <x-button type="submit" variant="solid">Filter</x-button>
                </div>
            </form>
        </x-card>

        {{-- Daftar Transaksi --}}
        @if($transactions->isEmpty())
            <x-card>
                <p class="text-neutral-600 text-center py-4">Belum ada transaksi di bulan ini.</p>
            </x-card>
        @else
            <div class="space-y-3">
                @foreach($transactions as $tr)
                    <x-card>
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="text-sm px-2 py-1 rounded 
                                        @if($tr->type === 'income') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ $tr->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                    </span>
                                    <span class="text-sm text-neutral-600">{{ $tr->category }}</span>
                                </div>
                                <p class="text-lg font-semibold mb-1">
                                    <x-rupiah :nominal="$tr->amount" />
                                </p>
                                <p class="text-sm text-neutral-600 mb-1">{{ \Carbon\Carbon::parse($tr->transaction_date)->format('d M Y') }}</p>
                                @if($tr->note)
                                    <p class="text-sm text-neutral-500">{{ $tr->note }}</p>
                                @endif
                            </div>
                            <div class="flex gap-2">
                                <x-button :href="route('transactions.edit', $tr->id)" variant="outline">Edit</x-button>
                                <form action="{{ route('transactions.destroy', $tr->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus transaksi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block text-sm text-center py-1.5 px-3 rounded-md border border-neutral-300 text-neutral-800 hover:bg-red-50">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </section>
</x-layout>
