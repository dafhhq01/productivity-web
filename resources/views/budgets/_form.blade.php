<x-form-error />

<x-select label="Kategori" name="category">
    <option value="">-- Pilih Kategori --</option>
    <option value="makan" {{ old('category', $budget->category ?? '') == 'makan' ? 'selected' : '' }}>Makan</option>
    <option value="transport" {{ old('category', $budget->category ?? '') == 'transport' ? 'selected' : '' }}>Transport</option>
    <option value="belanja" {{ old('category', $budget->category ?? '') == 'belanja' ? 'selected' : '' }}>Belanja</option>
    <option value="tagihan" {{ old('category', $budget->category ?? '') == 'tagihan' ? 'selected' : '' }}>Tagihan</option>
    <option value="hiburan" {{ old('category', $budget->category ?? '') == 'hiburan' ? 'selected' : '' }}>Hiburan</option>
    <option value="pendidikan" {{ old('category', $budget->category ?? '') == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
    <option value="lainnya" {{ old('category', $budget->category ?? '') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
</x-select>

<x-input 
    label="Jumlah Budget" 
    name="amount" 
    type="number" 
    step="0.01" 
    placeholder="Masukkan jumlah"
    value="{{ old('amount', $budget->amount ?? '') }}"
/>

<x-input 
    label="Bulan" 
    name="month" 
    type="number" 
    placeholder="1-12"
    value="{{ old('month', $budget->month ?? now()->month) }}"
/>

<x-input 
    label="Tahun" 
    name="year" 
    type="number" 
    placeholder="2024"
    value="{{ old('year', $budget->year ?? now()->year) }}"
/>

<div class="flex gap-3 pt-4">
    <button type="submit" class="flex-1 h-12 rounded-full bg-brand-indigo text-white font-bold border-flat shadow-flat hover:bg-opacity-90 active:translate-y-0.5 active:shadow-none transition-all">Simpan</button>
    <a href="{{ route('budgets.index') }}" class="flex-1 h-12 rounded-full bg-white text-brand-ink font-bold border-flat hover:bg-neutral-50 active:translate-y-0.5 transition-all flex items-center justify-center">Batal</a>
</div>
