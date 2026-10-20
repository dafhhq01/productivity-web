<x-layout title="Tambah Transaksi">
    <div class="flex-1 overflow-y-auto no-scrollbar px-5 pt-3 pb-6">
        <div class="flex items-center justify-between mb-5">
            <a href="{{ route('transactions.index') }}" class="w-10 h-10 rounded-full bg-white border-flat flex items-center justify-center text-brand-ink hover:bg-neutral-100 active:scale-95 transition-all">
                <svg class="w-5 h-5 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
            </a>
            <h1 class="text-xl font-extrabold tracking-tight text-brand-ink font-outfit">Tambah Transaksi</h1>
            <div class="w-10 h-10"></div>
        </div>

        @include('transactions._form')
    </div>
</x-layout>
