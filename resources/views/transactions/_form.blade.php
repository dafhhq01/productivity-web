{{-- Penjelasan old() dan ?? operator --}}
{{-- old('field', default) mengambil nilai input dari session jika validasi gagal, fallback ke default
     ?? adalah operator null coalescing PHP: nilai_kiri ?? nilai_kanan (jika nilai_kiri null, pakai nilai_kanan)
     Contoh di form: old('category', $model->category ?? '') → ambil dari session, atau dari model, atau string kosong
--}}

@props(['model' => null, 'action' => 'store'])

<form action="{{ $model ? route("transactions.$action", $model) : route('transactions.store') }}" method="POST">
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
        value="{{ old('note', $model->note ?? '') }}"
    />

    <div class="flex gap-2">
        <x-button type="submit" variant="solid">{{ $model ? 'Simpan Perubahan' : 'Tambah Transaksi' }}</x-button>
        <x-button :href="route('transactions.index')">Batal</x-button>
    </div>
</form>
