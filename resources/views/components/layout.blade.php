<!DOCTYPE html>
<html lang="id" class="h-full overflow-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>{{ $title ?? 'TrackApp' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @supports (height: 100dvh) {
            .h-dvh-fallback { height: 100dvh; }
        }
        @supports not (height: 100dvh) {
            .h-dvh-fallback { height: 100vh; }
        }
    </style>
</head>
<body class="h-full overflow-hidden bg-brand-surface font-sans antialiased">
    <div class="h-dvh-fallback flex overflow-hidden">
        @auth
            <x-sidebar />
        @endauth
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <div class="h-full flex justify-center overflow-hidden @guest bg-brand-surface @else bg-brand-surface @endguest">
                <div class="w-full @guest max-w-[480px] @else max-w-[480px] sm:max-w-3xl lg:max-w-5xl @endguest h-full flex flex-col overflow-hidden">
                    <main class="flex-1 min-h-0 overflow-y-auto overscroll-contain @guest pb-0 @else pb-24 lg:pb-6 @endguest">
                        <x-alert />
                        <x-form-error />
                        {{ $slot }}
                    </main>
                    
                    @auth
                    <x-popup-dev />
                    {{-- Bottom navigation untuk mobile --}}
                    <div class="lg:hidden fixed bottom-5 left-1/2 -translate-x-1/2 w-full max-w-[440px] px-5 z-40" style="padding-bottom: env(safe-area-inset-bottom);">
                        <nav class="bg-white border-flat rounded-full h-16 px-6 flex items-center justify-between shadow-flat">
                            <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center gap-1 {{ request()->routeIs('dashboard') ? 'text-brand-indigo' : 'text-gray-400' }} hover:text-brand-indigo transition-colors min-w-[44px] min-h-[44px]">
                                <svg class="w-6 h-6 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('dashboard') ? 'bg-brand-indigo' : 'bg-transparent' }}"></span>
                            </a>
                            
                            <a href="{{ route('tasks.index') }}" class="flex flex-col items-center justify-center gap-1 {{ request()->routeIs('tasks.*') ? 'text-brand-indigo' : 'text-gray-400' }} hover:text-brand-indigo transition-colors min-w-[44px] min-h-[44px]">
                                <svg class="w-6 h-6 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('tasks.*') ? 'bg-brand-indigo' : 'bg-transparent' }}"></span>
                            </a>
                            
                            <button type="button" data-dev-feature="Tambah Item Baru" class="w-12 h-12 rounded-full bg-brand-indigo text-white flex items-center justify-center border-flat -mt-6 hover:scale-105 active:scale-95 transition-transform shadow-flat">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                            </button>
                            
                            <button onclick="toggleFinanceMenu()" class="flex flex-col items-center justify-center gap-1 {{ request()->routeIs('transactions.*') || request()->routeIs('budgets.*') ? 'text-brand-indigo' : 'text-gray-400' }} hover:text-brand-indigo transition-colors min-w-[44px] min-h-[44px]">
                                <svg class="w-6 h-6 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                                <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('transactions.*') || request()->routeIs('budgets.*') ? 'bg-brand-indigo' : 'bg-transparent' }}"></span>
                            </button>
                            
                            <a href="{{ route('investments.index') }}" class="flex flex-col items-center justify-center gap-1 {{ request()->routeIs('investments.*') ? 'text-brand-indigo' : 'text-gray-400' }} hover:text-brand-indigo transition-colors min-w-[44px] min-h-[44px]">
                                <svg class="w-6 h-6 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('investments.*') ? 'bg-brand-indigo' : 'bg-transparent' }}"></span>
                            </a>
                        </nav>

                        <div id="financeMenu" class="hidden absolute bottom-[70px] left-1/2 -translate-x-1/2 bg-white border-flat rounded-2xl shadow-flat p-3 w-[200px] z-50">
                            <a href="{{ route('transactions.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-neutral-50 transition-colors min-h-[44px]">
                                <svg class="w-5 h-5 text-brand-indigo" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                                <span class="text-sm font-bold text-brand-ink">Transaksi</span>
                            </a>
                            <a href="{{ route('budgets.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-neutral-50 transition-colors min-h-[44px]">
                                <svg class="w-5 h-5 text-brand-indigo" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                <span class="text-sm font-bold text-brand-ink">Budget</span>
                            </a>
                        </div>
                    </div>
                    @else
                    <x-popup-dev />
                    @endauth
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function navigate(url) {
        window.location.href = url;
    }

    function toggleFinanceMenu() {
        const menu = document.getElementById('financeMenu');
        menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function(e) {
        const menu = document.getElementById('financeMenu');
        const financeBtn = e.target.closest('button[onclick="toggleFinanceMenu()"]');
        if (!financeBtn && menu && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>
</html>
