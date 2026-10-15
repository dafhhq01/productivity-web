<x-layout title="Tambah Investasi">
    <section class="container mx-auto max-w-2xl px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Tambah Investasi Baru</h1>
        
        <x-card>
            <form action="{{ route('investments.store') }}" method="POST">
                @csrf
                @include('investments._form')
            </form>
        </x-card>
    </section>
</x-layout>
