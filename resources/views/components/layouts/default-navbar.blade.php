<nav class="fixed top-0 w-full z-50 bg-surface/50 backdrop-blur-xl border-b border-white/10 shadow-sm">
    <div class="flex justify-between items-center h-20 px-margin-desktop max-w-container-max mx-auto">
        <!-- Brand -->
        <x-brand />
        <!-- Navigation Links -->
        <div class="hidden md:flex items-center gap-gutter">
            <a class="text-on-surface-variant hover:text-on-surface transition-colors font-label-sm text-label-sm"
                href="#">Discover</a>
            <a class="text-secondary font-bold border-b-2 border-secondary pb-1 font-label-sm text-label-sm"
                href="#">Feed</a>
            <a class="text-on-surface-variant hover:text-on-surface transition-colors font-label-sm text-label-sm"
                href="#">Creators</a>
            <a class="text-on-surface-variant hover:text-on-surface transition-colors font-label-sm text-label-sm"
                href="#">Analytics</a>
        </div>
        <!-- Actions -->
        <div class="flex items-center gap-6">
            <a href="{{ route('dashboard.posts.create') }}"
                class="bg-primary text-on-primary px-6 py-2.5 rounded-full font-label-sm text-label-sm font-bold rim-light hover:accent-glow transition-all active:scale-95 duration-200">
                Create
            </a>
            <div class="flex items-center gap-4 text-on-surface-variant">
                <button
                    class="material-symbols-outlined hover:text-on-surface transition-colors">notifications</button>
                <button
                    class="material-symbols-outlined hover:text-on-surface transition-colors">account_circle</button>
            </div>
        </div>
    </div>
</nav>