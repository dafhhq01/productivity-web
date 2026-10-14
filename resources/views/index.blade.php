<x-layout>
    <section class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-2xl font-bold">Productivity Tracker</h1>
        <p class="text-neutral-600 mt-2">Manage your tasks, goals, and habits</p>
        <div class="flex flex-col mt-6">
            <x-card class="mt-3 m-1">
                <div class="flex flex-row justify-between items-center">
                    <span class="mx-3">To login page</span>
                    <a href="{{ route('login') }}">
                        <x-button>Login</x-button>
                    </a>
                </div>
            </x-card>
            <x-card class="m-1">
                <div class="flex flex-row justify-between items-center">
                    <span class="mx-3">To register page</span>
                    <a href="{{ route('register') }}">
                        <x-button>Register</x-button>
                    </a>
                </div>
            </x-card>
        </div>
    </section>
</x-layout>
