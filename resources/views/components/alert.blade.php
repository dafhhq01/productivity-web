@if (session('success'))
    <div class="mx-5 mt-5 mb-4 bg-brand-lime border-flat text-brand-ink p-4 rounded-2xl shadow-flat-sm" role="alert">
        <div class="flex items-start space-x-3">
            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <p class="text-sm font-semibold">{{ session('success') }}</p>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="mx-5 mt-5 mb-4 bg-brand-pink border-flat text-brand-ink p-4 rounded-2xl shadow-flat-sm" role="alert">
        <div class="flex items-start space-x-3">
            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <p class="text-sm font-semibold">{{ session('error') }}</p>
        </div>
    </div>
@endif
