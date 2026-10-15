<nav class="bg-white text-black shadow-sm p-4 mb-8">
    <div class="container mx-auto max-w-6xl flex justify-between items-center">
        <a href="/" class="font-semibold text-lg">Productivity Tracker</a>
        <div class="flex space-x-6 items-center justify-center">
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('tasks.index') }}">Tugas</a>
                <form action="/logout" method="POST">
                    @csrf
                    <x-button type="submit" variant="solid">Logout</x-button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</nav>
