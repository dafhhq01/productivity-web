<x-layout title="Tambah Budget">
    <section class="container mx-auto max-w-2xl px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Tambah Budget</h1>

        <x-card>
            <form action="{{ route('budgets.store') }}" method="POST">
                @csrf
                @include('budgets._form')
            </form>
        </x-card>
    </section>
</x-layout>
