<div class="max-w-container-max mx-auto w-full grid grid-cols-1 md:grid-cols-12 gap-gutter items-center z-10">
    <div class="md:col-span-6 space-y-6">
        <div
            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary/10 border border-secondary/20 text-secondary">
            <span class="material-symbols-outlined text-[14px]"
                style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
            <span class="font-label-sm text-label-sm uppercase tracking-widest">Featured Story</span>
        </div>
        <h1 class="font-display-lg text-display-lg text-on-surface max-w-xl">
            {{ $featuredPost['title'] }}
            <!-- The Future of <span class="text-secondary">Generative</span> Motion. -->
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">
            {{ $featuredPost['excerpt'] }}
        </p>
        <div class="flex items-center gap-6 pt-4">
            <a href="{{ route('posts.show', $featuredPost['slug']) }}"
                class="bg-primary text-on-primary px-8 py-3 rounded-full font-label-sm text-label-sm font-bold rim-light hover:accent-glow transition-all">
                Read Article
            </a>
            <button
                class="text-on-surface border border-white/20 px-8 py-3 rounded-full font-label-sm text-label-sm font-bold hover:bg-white/5 transition-all">
                Save to Feed
            </button>
        </div>
    </div>
    <div class="md:col-span-6 flex justify-center relative">
        <div class="relative w-full aspect-square max-w-md rounded-2xl overflow-hidden glass-card p-2">
            <img class="w-full h-full object-cover rounded-xl"
                alt="A high-end cinematic 3D render of abstract fluid waves in shades of electric blue and deep obsidian. The lighting is moody and atmospheric, with soft glowing edges that suggest a futuristic, technical aesthetic. The composition is minimalist, focusing on the intricate textures and the interplay between light and shadow in a dark void. The style is premium and clean."
                src="{{ $featuredPost->thumbnailUrl }}" />
            <div class="absolute inset-0 bg-linear-to-t from-surface-dim/80 to-transparent pointer-events-none">
            </div>
        </div>
        <!-- Decorative element -->
        <div class="absolute -top-12 -right-12 w-64 h-64 bg-secondary/10 blur-[100px] rounded-full"></div>
    </div>
</div>
