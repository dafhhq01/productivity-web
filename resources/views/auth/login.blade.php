<x-layout title="Login">
    <div class="flex-1 flex flex-col px-6 pt-16 pb-6 overflow-y-auto no-scrollbar">
        <div class="flex items-center justify-between mb-5">
            <a href="/" class="w-10 h-10 rounded-full bg-white border-flat flex items-center justify-center text-brand-ink hover:bg-neutral-100 active:scale-95 transition-all">
                <svg class="w-5 h-5 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
            </a>
            <div class="px-3.5 py-1.5 rounded-full bg-brand-lime border-flat flex items-center space-x-1.5">
                <span class="w-2 h-2 rounded-full bg-brand-ink"></span>
                <span class="text-xs font-extrabold text-brand-ink tracking-wider uppercase font-outfit">TrackApp</span>
            </div>
            <div class="w-10 h-10"></div>
        </div>

        <div class="flex flex-col items-center mb-6">
            <div class="relative w-20 h-20 rounded-3xl bg-brand-indigo border-flat flex items-center justify-center mb-4 transform -rotate-3 hover:rotate-0 transition-transform">
                <div class="w-12 h-12 rounded-2xl bg-brand-yellow border-flat flex items-center justify-center rotate-6">
                    <svg class="w-7 h-7 text-brand-ink" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke="#121212" stroke-width="2" stroke-linejoin="round"/></svg>
                </div>
                <div class="absolute -top-2 -right-2 w-7 h-7 rounded-full bg-brand-pink border-flat flex items-center justify-center text-xs font-black text-brand-ink font-outfit">✦</div>
            </div>
            <h1 class="text-3xl leading-tight font-extrabold text-brand-ink font-outfit text-center tracking-tight">Selamat Datang!</h1>
            <p class="text-sm font-medium text-neutral-600 text-center mt-1 px-4">Masuk untuk pantau aktivitas, anggaran, & portofoliomu.</p>
        </div>

        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <x-input label="Email Kamu" name="email" type="email">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </x-slot:icon>
            </x-input>
            
            <div>
                <div class="flex items-center justify-between mb-1.5 ml-1 mr-1">
                    <label class="block text-xs font-bold text-brand-ink font-outfit">Password</label>
                    <button type="button" data-dev-feature="Lupa Password" class="text-xs font-bold text-brand-indigo hover:underline font-outfit">Lupa password?</button>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-neutral-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input type="password" name="password" id="password" class="w-full h-14 pl-12 pr-4 bg-white border-flat rounded-3xl text-sm font-medium placeholder-neutral-400 focus:border-brand-indigo focus:outline-none {{ $errors->has('password') ? 'border-red-400' : '' }}" />
                </div>
                @error('password')
                    <p class="text-xs text-red-500 mt-1.5 ml-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-between pt-1">
                <label class="flex items-center space-x-2.5 cursor-pointer">
                    <input type="checkbox" class="w-5 h-5 rounded-lg border-2 border-brand-ink text-brand-indigo focus:ring-0 accent-brand-indigo">
                    <span class="text-xs font-semibold text-neutral-700">Ingat akun saya</span>
                </label>
                <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-brand-yellow border-flat text-brand-ink font-outfit">Aman & Terenkripsi</span>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full h-14 rounded-full bg-brand-indigo hover:bg-opacity-90 border-flat flex items-center justify-center text-white text-base font-bold transition-all active:scale-95 shadow-flat">
                    <span>Masuk</span>
                    <svg class="w-5 h-5 ml-2 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>
        </form>

        <div class="pt-6 text-center mt-auto">
            <p class="text-sm text-neutral-600 font-medium">Belum punya akun? <a href="{{ route('register') }}" class="font-extrabold text-brand-indigo hover:underline font-outfit ml-1">Daftar sekarang</a></p>
        </div>
    </div>
</x-layout>
