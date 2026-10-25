{{-- Sidebar untuk tablet (768+) dan desktop (1024+) --}}
<aside class="hidden lg:flex lg:w-64 sm:w-20 bg-white border-r-[3px] border-brand-ink flex-col justify-between py-6 px-4 lg:px-6">
    {{-- Logo & Brand --}}
    <div class="flex flex-col items-center sm:items-start lg:items-start mb-8">
        <div class="w-12 h-12 rounded-2xl bg-brand-indigo border-flat flex items-center justify-center mb-3">
            <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke="#121212" stroke-width="2" stroke-linejoin="round"/>
            </svg>
        </div>
        <h1 class="hidden lg:block font-outfit text-xl font-extrabold text-brand-ink">TrackApp</h1>
    </div>
    
    {{-- Navigation Links --}}
    <nav class="flex-1 flex flex-col space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center sm:justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-brand-indigo text-white' : 'text-brand-ink hover:bg-neutral-100' }}">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="hidden lg:block font-bold text-sm">Dashboard</span>
        </a>
        
        <a href="{{ route('tasks.index') }}" class="flex items-center sm:justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('tasks.*') ? 'bg-brand-indigo text-white' : 'text-brand-ink hover:bg-neutral-100' }}">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
            </svg>
            <span class="hidden lg:block font-bold text-sm">Tugas</span>
        </a>
        
        <a href="{{ route('transactions.index') }}" class="flex items-center sm:justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('transactions.*') ? 'bg-brand-indigo text-white' : 'text-brand-ink hover:bg-neutral-100' }}">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                <line x1="2" y1="10" x2="22" y2="10"></line>
            </svg>
            <span class="hidden lg:block font-bold text-sm">Transaksi</span>
        </a>
        
        <a href="{{ route('budgets.index') }}" class="flex items-center sm:justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('budgets.*') ? 'bg-brand-indigo text-white' : 'text-brand-ink hover:bg-neutral-100' }}">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            <span class="hidden lg:block font-bold text-sm">Budget</span>
        </a>
        
        <a href="{{ route('investments.index') }}" class="flex items-center sm:justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('investments.*') ? 'bg-brand-indigo text-white' : 'text-brand-ink hover:bg-neutral-100' }}">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="hidden lg:block font-bold text-sm">Investasi</span>
        </a>
    </nav>
    
    {{-- Logout Button --}}
    <div class="pt-4 border-t border-neutral-200">
        <form action="/logout" method="POST" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center sm:justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl text-brand-coral hover:bg-red-50 transition-colors">
                <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="hidden lg:block font-bold text-sm">Keluar</span>
            </button>
        </form>
    </div>
</aside>
