@if (session('success'))
    <div class="bg-green-100 border border-green-500 text-black p-4 m-2 rounded-md" role="alert">
        <p class="text-sm">{{ session('success') }}</p>
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 border border-red-500 text-black p-4 m-2 rounded-md" role="alert">
        <p class="text-sm">{{ session('error') }}</p>
    </div>
@endif
