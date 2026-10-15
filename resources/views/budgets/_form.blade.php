<x-form-error />

<div class="mb-4">
    <label for="category" class="block text-sm font-medium mb-1">Kategori</label>
    <select name="category" id="category" class="border rounded-md px-3 py-2 w-full border-neutral-300" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="makan" {{ old('category', $budget->category ?? '') == 'makan' ? 'selected' : '' }}>Makan</option>
        <option value="transport" {{ old('category', $budget->category ?? '') == 'transport' ? 'selected' : '' }}>Transport</option>
        <option value="belanja" {{ old('category', $budget->category ?? '') == 'belanja' ? 'selected' : '' }}>Belanja</option>
        <option value="tagihan" {{ old('category', $budget->category ?? '') == 'tagihan' ? 'selected' : '' }}>Tagihan</option>
        <option value="hiburan" {{ old('category', $budget->category ?? '') == 'hiburan' ? 'selected' : '' }}>Hiburan</option>
        <option value="pendidikan" {{ old('category', $budget->category ?? '') == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
        <option value="lainnya" {{ old('category', $budget->category ?? '') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
    </select>
</div>

<div class="mb-4">
    <label for="amount" class="block text-sm font-medium mb-1">Jumlah Budget</label>
    <input type="number" name="amount" id="amount" step="0.01" min="0.01" value="{{ old('amount', $budget->amount ?? '') }}" class="border rounded-md px-3 py-2 w-full border-neutral-300" required>
</div>

<div class="mb-4">
    <label for="month" class="block text-sm font-medium mb-1">Bulan</label>
    <input type="number" name="month" id="month" min="1" max="12" value="{{ old('month', $budget->month ?? now()->month) }}" class="border rounded-md px-3 py-2 w-full border-neutral-300" required>
</div>

<div class="mb-4">
    <label for="year" class="block text-sm font-medium mb-1">Tahun</label>
    <input type="number" name="year" id="year" min="2000" max="2100" value="{{ old('year', $budget->year ?? now()->year) }}" class="border rounded-md px-3 py-2 w-full border-neutral-300" required>
</div>

<div class="flex gap-3">
    <x-button type="submit" variant="solid">Simpan</x-button>
    <x-button :href="route('budgets.index')" variant="outline">Batal</x-button>
</div>
