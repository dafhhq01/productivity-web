<x-layout title="Edit Investasi">
    <section class="container mx-auto max-w-2xl px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Investasi</h1>
        
        <x-card>
            <form action="{{ route('investments.update', $investment->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('investments._form')
            </form>
        </x-card>
    </section>
</x-layout>
