<x-layout title="Daftar Investasi">
    <section class="container mx-auto max-w-6xl px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Daftar Investasi</h1>
            <x-button :href="route('investments.create')" variant="solid">+ Tambah Investasi</x-button>
        </div>

        @if($investments->isEmpty())
            <x-card>
                <p class="text-neutral-600 text-center py-4">Belum ada investasi. Mulai investasi Anda sekarang!</p>
            </x-card>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-neutral-100 border-b border-neutral-300">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold">Nama</th>
                            <th class="text-right px-4 py-3 font-semibold">Modal</th>
                            <th class="text-right px-4 py-3 font-semibold">Bunga/Tahun</th>
                            <th class="text-left px-4 py-3 font-semibold">Tanggal Mulai</th>
                            <th class="text-right px-4 py-3 font-semibold">Nilai Sekarang</th>
                            <th class="text-right px-4 py-3 font-semibold">Keuntungan</th>
                            <th class="text-center px-4 py-3 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalInvested = $investments->sum('amount_invested');
                            $totalCurrent = $investments->sum('current_value');
                        @endphp
                        @foreach($investments as $inv)
                            @php
                                $profit = $inv->current_value - $inv->amount_invested;
                            @endphp
                            <tr class="border-b border-neutral-200 hover:bg-neutral-50">
                                <td class="px-4 py-3">{{ $inv->name }}</td>
                                <td class="text-right px-4 py-3">
                                    <x-rupiah :nominal="$inv->amount_invested" />
                                </td>
                                <td class="text-right px-4 py-3">{{ number_format($inv->annual_rate, 2) }}%</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($inv->start_date)->format('d M Y') }}</td>
                                <td class="text-right px-4 py-3">
                                    <x-rupiah :nominal="$inv->current_value" />
                                </td>
                                <td class="text-right px-4 py-3 {{ $profit >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                    <x-rupiah :nominal="$profit" />
                                </td>
                                <td class="text-center px-4 py-3">
                                    <div class="flex gap-2 justify-center">
                                        <x-button :href="route('investments.edit', $inv->id)" variant="outline" class="text-xs">Edit</x-button>
                                        <form action="{{ route('investments.destroy', $inv->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus investasi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block text-xs py-1.5 px-3 rounded-md border border-neutral-300 text-neutral-800 hover:bg-red-50">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="bg-neutral-100 font-semibold border-t-2 border-neutral-300">
                            <td class="px-4 py-3">TOTAL</td>
                            <td class="text-right px-4 py-3">
                                <x-rupiah :nominal="$totalInvested" />
                            </td>
                            <td class="text-right px-4 py-3">-</td>
                            <td class="px-4 py-3">-</td>
                            <td class="text-right px-4 py-3">
                                <x-rupiah :nominal="$totalCurrent" />
                            </td>
                            <td class="text-right px-4 py-3 {{ $totalCurrent - $totalInvested >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                <x-rupiah :nominal="$totalCurrent - $totalInvested" />
                            </td>
                            <td class="text-center px-4 py-3">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</x-layout>
