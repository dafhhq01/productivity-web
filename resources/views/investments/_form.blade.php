<x-form-error />

<x-input 
    label="Nama Investasi" 
    name="name" 
    placeholder="Nama investasi"
    value="{{ old('name', $investment->name ?? '') }}"
/>

<x-input 
    label="Modal Investasi" 
    name="amount_invested" 
    type="number" 
    step="0.01" 
    placeholder="Jumlah modal"
    value="{{ old('amount_invested', $investment->amount_invested ?? '') }}"
/>

<x-input 
    label="Bunga Per Tahun (%)" 
    name="annual_rate" 
    type="number" 
    step="0.01" 
    placeholder="Persentase bunga"
    value="{{ old('annual_rate', $investment->annual_rate ?? '') }}"
/>

<x-input 
    label="Tanggal Mulai" 
    name="start_date" 
    type="date"
    value="{{ old('start_date', isset($investment) ? \Carbon\Carbon::parse($investment->start_date)->format('Y-m-d') : now()->format('Y-m-d')) }}"
/>

<div class="flex gap-3 pt-4">
    <button type="submit" class="flex-1 h-12 rounded-full bg-brand-indigo text-white font-bold border-flat shadow-flat hover:bg-opacity-90 active:translate-y-0.5 active:shadow-none transition-all">
        {{ isset($investment) ? 'Simpan Perubahan' : 'Tambah Investasi' }}
    </button>
    <a href="{{ route('investments.index') }}" class="flex-1 h-12 rounded-full bg-white text-brand-ink font-bold border-flat hover:bg-neutral-50 active:translate-y-0.5 transition-all flex items-center justify-center">Batal</a>
</div>
