<x-layout title="Tambah Transaksi">
    <section class="container mx-auto max-w-2xl px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Tambah Transaksi Baru</h1>
        
        <x-card>
            @include('transactions._form')
        </x-card>
    </section>
</x-layout>
