<x-layout title="Daftar">
    <div class="flex-1 flex flex-col px-6 pt-16 pb-6 overflow-y-auto no-scrollbar">
        <div class="flex items-center justify-between mb-4">
            <a href="/" class="w-10 h-10 rounded-full bg-white border-flat flex items-center justify-center text-brand-ink hover:bg-neutral-100 active:scale-95 transition-all">
                <svg class="w-5 h-5 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
            </a>
            <div class="px-3.5 py-1.5 rounded-full bg-brand-lime border-flat flex items-center space-x-1.5">
                <span class="w-2 h-2 rounded-full bg-brand-ink"></span>
                <span class="text-xs font-extrabold text-brand-ink tracking-wider uppercase font-outfit">TrackApp</span>
            </div>
            <div class="w-10 h-10"></div>
        </div>

        <div class="flex flex-col items-center mb-5">
            <h1 class="text-3xl leading-tight font-extrabold text-brand-ink font-outfit text-center tracking-tight">Buat Akun Baru</h1>
            <p class="text-sm font-medium text-neutral-600 text-center mt-1 px-2">Mulai kelola tugas dan keuanganmu dengan mudah.</p>
        </div>

        <form action="/register" method="POST" class="space-y-3.5">
            @csrf
            <x-input label="Nama Lengkap" name="name" type="text" placeholder="Nama kamu">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </x-slot:icon>
            </x-input>
            
            <x-input label="Email Kamu" name="email" type="email" placeholder="email@example.com">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </x-slot:icon>
            </x-input>
            
            <x-input label="Password" name="password" type="password" placeholder="••••••••">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </x-slot:icon>
            </x-input>

            <div class="pt-1.5">
                <button type="submit" class="w-full h-14 rounded-full bg-brand-indigo hover:bg-opacity-90 border-flat flex items-center justify-center text-white text-base font-bold transition-all active:scale-95 shadow-flat">
                    <span>Daftar Sekarang</span>
                </button>
            </div>
        </form>

        <div class="pt-6 text-center mt-auto">
            <p class="text-sm text-neutral-600 font-medium">Sudah punya akun? <a href="{{ route('login') }}" class="font-extrabold text-brand-indigo hover:underline font-outfit ml-1">Masuk di sini</a></p>
        </div>
    </div>
</x-layout>
