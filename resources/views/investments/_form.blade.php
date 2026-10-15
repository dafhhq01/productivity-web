<x-form-error />

<div class="mb-4">
    <label for="name" class="block text-sm font-medium mb-1">Nama Investasi</label>
    <input type="text" name="name" id="name" value="{{ old('name', $investment->name ?? '') }}" class="border rounded-md px-3 py-2 w-full border-neutral-300" required>
</div>

<div class="mb-4">
    <label for="amount_invested" class="block text-sm font-medium mb-1">Modal Investasi</label>
    <input type="number" name="amount_invested" id="amount_invested" step="0.01" min="0.01" value="{{ old('amount_invested', $investment->amount_invested ?? '') }}" class="border rounded-md px-3 py-2 w-full border-neutral-300" required>
</div>

<div class="mb-4">
    <label for="annual_rate" class="block text-sm font-medium mb-1">Bunga Per Tahun (%)</label>
    <input type="number" name="annual_rate" id="annual_rate" step="0.01" min="0" max="100" value="{{ old('annual_rate', $investment->annual_rate ?? '') }}" class="border rounded-md px-3 py-2 w-full border-neutral-300" required>
</div>

<div class="mb-4">
    <label for="start_date" class="block text-sm font-medium mb-1">Tanggal Mulai</label>
    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', isset($investment) ? \Carbon\Carbon::parse($investment->start_date)->format('Y-m-d') : now()->format('Y-m-d')) }}" class="border rounded-md px-3 py-2 w-full border-neutral-300" required>
</div>

<div class="flex gap-3">
    <x-button type="submit" variant="solid">{{ isset($investment) ? 'Simpan Perubahan' : 'Tambah Investasi' }}</x-button>
    <x-button :href="route('investments.index')" variant="outline">Batal</x-button>
</div>
