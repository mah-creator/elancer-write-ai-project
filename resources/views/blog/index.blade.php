<x-layouts.main title="Home" mainWrapper="pt-20" bodyWrapper="font-body-md text-body-md overflow-x-hidden">
    <x-slot:style>
        <style>
            body {
                background-color: #0b1326;
                color: #dae2fd;
                -webkit-font-smoothing: antialiased;
            }

            .glass-card {
                background: rgba(30, 41, 59, 0.5);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.08);
            }

            .glass-card:hover {
                border-color: rgba(255, 255, 255, 0.2);
                transform: translateY(-4px);
            }

            .cinematic-gradient {
                background: radial-gradient(circle at top right, rgba(76, 215, 246, 0.15), transparent 40%),
                    radial-gradient(circle at bottom left, rgba(0, 90, 194, 0.1), transparent 40%),
                    #0b1326;
            }

            .rim-light {
                box-shadow: inset 0 1px 0 0 rgba(255, 255, 255, 0.1);
            }

            .accent-glow {
                box-shadow: 0 0 20px rgba(76, 215, 246, 0.3);
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
        </style>
    </x-slot:style>

    <!-- Hero Section -->
    <section class="cinematic-gradient relative min-h-[600px] flex items-center px-margin-desktop overflow-hidden">
        <div
            class="max-w-container-max mx-auto w-full grid grid-cols-1 md:grid-cols-12 gap-gutter items-center z-10">
            <div class="md:col-span-6 space-y-6">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary/10 border border-secondary/20 text-secondary">
                    <span class="material-symbols-outlined text-[14px]"
                        style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
                    <span class="font-label-sm text-label-sm uppercase tracking-widest">Featured Story</span>
                </div>
                <h1 class="font-display-lg text-display-lg text-on-surface max-w-xl">
                    The Future of <span class="text-secondary">Generative</span> Motion.
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">
                    Explore how neural architectures are redefining the boundaries of cinematic storytelling and
                    interactive visual experiences.
                </p>
                <div class="flex items-center gap-6 pt-4">
                    <button
                        class="bg-primary text-on-primary px-8 py-3 rounded-full font-label-sm text-label-sm font-bold rim-light hover:accent-glow transition-all">
                        Read Article
                    </button>
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
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNMNO4DcmbIp2R_T7emO-Pk0TGOZRXmrmd2ie0oo93ggbv5ppgho6kEXNpK0Ic_PQn52VfsDsKOKV0f_tDUnK4XgNVgV07xWWsA6QHEEFHTsX7Jci8F-c5cOuXSzOU7NP8W-5wAhpPYtiZJ4NkB7wjO-vC4RL8DSr11tSg98w4J1-NQRX4RBSTFc7zTPGmMW7VbTeWLzwAU_kejvy1ietOB-UmZsWrWM3jiOY6qlmWqQbbw5uwqMJAUF6XFQAQTLUTtEeBC0-zEXE" />
                    <div
                        class="absolute inset-0 bg-linear-to-t from-surface-dim/80 to-transparent pointer-events-none">
                    </div>
                </div>
                <!-- Decorative element -->
                <div class="absolute -top-12 -right-12 w-64 h-64 bg-secondary/10 blur-[100px] rounded-full"></div>
            </div>
        </div>
    </section>
    <!-- Discovery Grid -->
    <section class="py-24 px-margin-desktop max-w-container-max mx-auto">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Weekly Discoveries</h2>
                <p class="text-on-surface-variant font-body-md mt-2">Curated insights from the leading edge of
                    technology and design.</p>
            </div>
            <div class="flex gap-4">
                <button
                    class="w-12 h-12 flex items-center justify-center rounded-full border border-white/10 hover:bg-white/5 transition-all">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <button
                    class="w-12 h-12 flex items-center justify-center rounded-full border border-white/10 hover:bg-white/5 transition-all">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            @foreach ($posts as $post)
            <a href="{{ route('posts.show', [$post['id'], $post['slug']]) }}">
                <article class="glass-card rounded-xl overflow-hidden transition-all flex flex-col">
                    <div class="relative aspect-video">
                        <img class="w-full h-full object-cover"
                            alt="A minimalist digital macro shot of high-tech circuitry emitting a soft cyan neon glow against a dark matte background. The aesthetic is clean and industrial, using a palette of deep slate and vibrant electric blue. The depth of field is shallow, creating a professional bokeh effect that highlights the technical precision of the components. The mood is sophisticated and futuristic."
                            src="{{ $post['image'] }}" />
                        <div class="absolute top-4 left-4">
                            <span
                                class="bg-surface-dim/80 backdrop-blur-md text-secondary px-3 py-1 rounded-full font-label-sm text-label-sm border border-white/10">{{ $post['categories'][0] }}</span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col grow">
                        <div class="flex items-center gap-2 mb-3 text-on-surface-variant">
                            <span class="font-label-sm text-label-sm">{{ Illuminate\Support\Carbon::createFromTimeString($post['publish_date'])->format('M d, Y') }}</span>
                            <span class="w-1 h-1 rounded-full bg-white/20"></span>
                            <span class="font-label-sm text-label-sm">{{ $post['read_time'] }} min read</span>
                        </div>
                        <h3 class="font-headline-lg text-headline-lg text-[24px] leading-tight text-on-surface mb-4">
                            {{ $post['title'] }}
                        </h3>
                        <p class="text-on-surface-variant font-body-md line-clamp-3 mb-6">
                            {{ $post['excerpt'] }}
                        </p>
                        <div class="mt-auto pt-6 border-t border-white/5 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-[12px] font-bold text-on-primary-container">
                                    EH</div>
                                <span class="font-label-sm text-label-sm text-on-surface">Elias Thorne</span>
                            </div>
                            <button
                                class="material-symbols-outlined text-on-surface-variant hover:text-secondary transition-colors">bookmark</button>
                        </div>
                    </div>
                </article>
            </a>
            @endforeach
        </div>
    </section>
    <!-- Newsletter / Bento Section -->
    <section class="py-24 px-margin-desktop max-w-container-max mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">

            <x-widgets.news-letter>
                <x-slot:helper>
                    <p class="text-on-surface-variant font-body-sm text-body-sm mt-4">
                        We respect your privacy. Unsubscribe at any time.
                    </p>
                </x-slot:helper>
            </x-widgets.news-letter>

            <div class="md:col-span-4 grid grid-rows-2 gap-gutter">
                <div
                    class="glass-card rounded-2xl p-8 border-secondary/20 bg-secondary/5 flex flex-col justify-between">
                    <span class="material-symbols-outlined text-secondary text-4xl">rocket_launch</span>
                    <div>
                        <h4 class="font-headline-lg text-[20px] text-on-surface">Pro Membership</h4>
                        <p class="text-on-surface-variant font-label-sm text-label-sm mt-1">Unlock exclusive
                            insights.
                        </p>
                    </div>
                </div>
                <div class="glass-card rounded-2xl p-8 border-white/5 flex flex-col justify-between">
                    <span class="material-symbols-outlined text-primary text-4xl">communities</span>
                    <div>
                        <h4 class="font-headline-lg text-[20px] text-on-surface">Join the Discord</h4>
                        <p class="text-on-surface-variant font-label-sm text-label-sm mt-1">Chat with the community.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>