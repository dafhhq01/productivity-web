<x-layout title="Edit Budget">
    <section class="container mx-auto max-w-2xl px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Budget</h1>

        <x-card>
            <form action="{{ route('budgets.update', $budget->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('budgets._form')
            </form>
        </x-card>
    </section>
</x-layout>
