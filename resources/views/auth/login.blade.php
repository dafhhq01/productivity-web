<x-layout title="Login">
    <section class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-2xl font-bold">Login</h1>
        <x-card class="w-80 mt-3">
            <form action="/login" method="POST">
                @csrf
                <x-input label="Email" name="email" type="email" />
                <x-input label="Password" name="password" type="password" />
                <x-button type="submit" class="w-full" variant="solid" >Login</x-button>
                <div class="flex justify-between mt-3 text-sm">
                    <span class="text-neutral-500">Don't have an account?</span>
                    <a href="{{ route('register') }}"><span>Register</span></a>
                </div>
            </form>
        </x-card>
    </section>
</x-layout>
