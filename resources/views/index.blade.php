<x-layout title="TrackApp - Lacak apa saja, capai segalanya">
    <div class="flex-1 flex flex-col bg-brand-indigo text-white px-6 pt-20 pb-7">
        <div class="mt-4 text-center px-1">
            <h1 class="font-outfit text-3xl font-extrabold text-white leading-tight tracking-tight">
                Lacak apa saja,<br>capai segalanya
            </h1>
        </div>
        
        <div class="flex-1 flex items-center justify-center my-1 relative">
            <div class="w-72 h-72 rounded-3xl overflow-hidden flex items-center justify-center">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBXBlgau5jNNRthIFGIEFyyyDw3tBeJ5Yq9EQqdMJx1yIlOWhlvFFIA2pZOxCxB4H7-QHCGo4rBu3dFN0a6yuOgAfhLRy0cIyElOnKrEW_ujQPoIe0DAQcTzKTaLINGrODNrE5hIGg2LqecUE1ogEOEIbccnIhkZJRCFpevMi_7de3jwHsbjuE9gtuwPHqzjQwhqMXDNbvvTa41TftibwMI-4fAUV7PYXpJ3o_4TGbjBZHz2iaFmrMQQ" alt="Ilustrasi produktivitas" class="w-full h-full object-cover">
            </div>
        </div>
        
        <div class="w-full flex flex-col items-center gap-4 z-10">
            <a href="{{ route('register') }}" class="w-full h-14 bg-white text-brand-ink font-bold text-base rounded-full flex items-center justify-center active:scale-95 transition-all shadow-flat border-flat">
                Mulai Sekarang
            </a>
            <a href="{{ route('login') }}" class="text-white text-sm font-semibold underline underline-offset-4 hover:opacity-90">
                Saya sudah punya akun
            </a>
            <p class="text-white/80 text-xs leading-relaxed text-center px-4 mt-1 font-medium">
                Dengan memulai atau masuk, kamu menyetujui <a href="#" data-dev-feature="Syarat Penggunaan" class="underline text-white font-semibold">Syarat Penggunaan</a> kami
            </p>
        </div>
    </div>
</x-layout>
