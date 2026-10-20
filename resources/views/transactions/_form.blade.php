@props(['model' => null, 'action' => 'store'])

<form action="{{ $model ? route("transactions.$action", $model) : route('transactions.store') }}" method="POST" class="space-y-4">
    @csrf
    @if($model)
        @method('PUT')
    @endif

    <x-select label="Jenis" name="type">
        <option value="">-- Pilih --</option>
        <option value="income" {{ old('type', $model->type ?? '') === 'income' ? 'selected' : '' }}>Pemasukan</option>
        <option value="expense" {{ old('type', $model->type ?? '') === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
    </x-select>

    <x-select label="Kategori" name="category">
        <option value="">-- Pilih --</option>
        <option value="gaji" {{ old('category', $model->category ?? '') === 'gaji' ? 'selected' : '' }}>Gaji</option>
        <option value="makan" {{ old('category', $model->category ?? '') === 'makan' ? 'selected' : '' }}>Makan</option>
        <option value="transport" {{ old('category', $model->category ?? '') === 'transport' ? 'selected' : '' }}>Transport</option>
        <option value="belanja" {{ old('category', $model->category ?? '') === 'belanja' ? 'selected' : '' }}>Belanja</option>
        <option value="tagihan" {{ old('category', $model->category ?? '') === 'tagihan' ? 'selected' : '' }}>Tagihan</option>
        <option value="hiburan" {{ old('category', $model->category ?? '') === 'hiburan' ? 'selected' : '' }}>Hiburan</option>
        <option value="pendidikan" {{ old('category', $model->category ?? '') === 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
        <option value="lainnya" {{ old('category', $model->category ?? '') === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
    </x-select>

    <x-input 
        label="Nominal" 
        name="amount" 
        type="number" 
        step="0.01"
        placeholder="Masukkan nominal"
        value="{{ old('amount', $model->amount ?? '') }}"
    />

    <x-input 
        label="Tanggal" 
        name="transaction_date" 
        type="date"
        value="{{ old('transaction_date', $model->transaction_date ?? '') }}"
    />

    <x-input 
        label="Catatan (opsional)" 
        name="note"
        placeholder="Catatan tambahan"
        value="{{ old('note', $model->note ?? '') }}"
    />

    <div class="flex gap-3 pt-4">
        <button type="submit" class="flex-1 h-12 rounded-full bg-brand-indigo text-white font-bold border-flat shadow-flat hover:bg-opacity-90 active:translate-y-0.5 active:shadow-none transition-all">
            {{ $model ? 'Simpan Perubahan' : 'Tambah Transaksi' }}
        </button>
        <a href="{{ route('transactions.index') }}" class="flex-1 h-12 rounded-full bg-white text-brand-ink font-bold border-flat hover:bg-neutral-50 active:translate-y-0.5 transition-all flex items-center justify-center">Batal</a>
    </div>
</form>
