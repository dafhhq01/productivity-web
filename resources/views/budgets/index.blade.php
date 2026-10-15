<x-layout title="Budgeting">
    <section class="container mx-auto max-w-6xl px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Budgeting</h1>
            <x-button :href="route('budgets.create')" variant="solid">+ Tambah Budget</x-button>
        </div>

        <x-alert />

        {{-- Filter Bulan dan Tahun --}}
        <x-card class="mb-6">
            <form method="GET" action="{{ route('budgets.index') }}" class="flex gap-3">
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

        {{-- Ringkasan dari Procedure --}}
        @if(count($summary) > 0)
            <x-card class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Ringkasan Budget vs Pengeluaran</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="border-b">
                            <tr class="text-left">
                                <th class="pb-2 px-2">Kategori</th>
                                <th class="pb-2 px-2">Budget</th>
                                <th class="pb-2 px-2">Terpakai</th>
                                <th class="pb-2 px-2">Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($summary as $row)
                                <tr class="border-b">
                                    <td class="py-2 px-2">{{ ucfirst($row->category) }}</td>
                                    <td class="py-2 px-2"><x-rupiah :nominal="$row->budget" /></td>
                                    <td class="py-2 px-2"><x-rupiah :nominal="$row->spent" /></td>
                                    <td class="py-2 px-2 {{ $row->remaining < 0 ? 'text-red-600 font-semibold' : '' }}">
                                        <x-rupiah :nominal="$row->remaining" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-card>
        @endif

        {{-- Daftar Budget --}}
        @if($budgets->isEmpty())
            <x-card>
                <p class="text-neutral-600 text-center py-4">Belum ada budget di bulan ini.</p>
            </x-card>
        @else
            <div class="space-y-3">
                @foreach($budgets as $budget)
                    <x-card>
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-semibold text-lg">{{ ucfirst($budget->category) }}</h3>
                                <p class="text-sm text-neutral-600">
                                    <x-rupiah :nominal="$budget->amount" /> - {{ $budget->month }}/{{ $budget->year }}
                                </p>
                            </div>
                            <div class="flex gap-2">
                                <x-button :href="route('budgets.edit', $budget->id)" variant="outline">Edit</x-button>
                                <form action="{{ route('budgets.destroy', $budget->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus budget ini?');">
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
