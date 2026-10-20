<div id="popup-dev" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 px-4" role="dialog" aria-modal="true">
    <div class="bg-white border-flat rounded-3xl p-6 max-w-sm w-full shadow-flat">
        <div class="text-center">
            <div class="w-16 h-16 bg-brand-yellow border-flat rounded-2xl flex items-center justify-center mx-auto mb-4">
                <span class="text-3xl">🚧</span>
            </div>
            <h2 class="font-outfit font-extrabold text-xl text-brand-ink mb-2">Segera Hadir</h2>
            <p class="text-sm text-neutral-600 mb-4">Oops! Fitur ini masih dalam tahap pengembangan dan belum tersedia saat ini.</p>
            <p class="text-sm font-bold text-brand-indigo mb-6" id="popup-dev-feature"></p>
            <button type="button" id="popup-dev-close" class="w-full h-12 bg-brand-indigo text-white font-bold rounded-full border-flat shadow-flat hover:bg-opacity-90 active:scale-95 transition-all">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('popup-dev');
    const featureEl = document.getElementById('popup-dev-feature');
    const closeBtn = document.getElementById('popup-dev-close');
    
    document.addEventListener('click', function(e) {
        const target = e.target.closest('[data-dev-feature]');
        if (target) {
            e.preventDefault();
            e.stopPropagation();
            const featureName = target.getAttribute('data-dev-feature');
            featureEl.textContent = featureName;
            popup.classList.remove('hidden');
            closeBtn.focus();
        }
    });
    
    function closePopup() {
        popup.classList.add('hidden');
    }
    
    closeBtn.addEventListener('click', closePopup);
    
    popup.addEventListener('click', function(e) {
        if (e.target === popup) {
            closePopup();
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !popup.classList.contains('hidden')) {
            closePopup();
        }
    });
});
</script>
