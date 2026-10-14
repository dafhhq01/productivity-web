<x-layout title="Register">
    <section class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-2xl font-bold">Register</h1>
        <x-card class="w-80 mt-3">
            <form action="/register" method="POST">
                @csrf
                <x-input label="Name" name="name" type="text" />
                <x-input label="Email" name="email" type="email" />
                <x-input label="Password" name="password" type="password" />
                <x-button type="submit" class="w-full" variant="solid" >Register</x-button>
                <div class="flex justify-between mt-3 text-sm">
                    <span class="text-neutral-500">Already have an account?</span>
                    <a href="{{ route('login') }}"><span>Login</span></a>
                </div>
            </form>
        </x-card>
    </section>
</x-layout>
