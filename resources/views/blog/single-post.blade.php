<x-layouts.main title="{{ $post['title'] }}" mainWrapper="pt-20" bodyWrapper="bg-background text-on-surface font-body-md selection:bg-secondary/30">
    <x-slot:style>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .glass-card {
                background: rgba(30, 41, 59, 0.5);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.08);
            }

            .hero-glow {
                background: radial-gradient(circle at 50% 50%, rgba(76, 215, 246, 0.15) 0%, rgba(11, 19, 38, 0) 70%);
            }
        </style>
    </x-slot:style>


    <header
        class="pb-8 pt-24 relative w-full min-h-[70vh] flex flex-col items-center justify-center text-center px-margin-mobile overflow-hidden hero-glow">
        <div class="absolute inset-0 z-0 opacity-20">
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-secondary/20 rounded-full blur-[120px]">
            </div>
        </div>
        <div class="relative z-10 max-w-4xl mx-auto space-y-6">
            <div
                class="flex items-center justify-center gap-4 text-secondary font-label-sm text-label-sm tracking-widest uppercase">
                <span>{{ $post['categories'][0] }}</span>
                <span class="w-1 h-1 bg-secondary rounded-full"></span>
                <span>{{ $post['read_time'] }} Min Read</span>
            </div>
            <h1 class="font-display-lg text-display-lg md:text-[80px] text-on-surface leading-tight">{{ $post['title'] }}</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">{{ $post['excerpt'] }}</p>
            <div class="flex items-center justify-center gap-4 pt-8">
                <div class="flex -space-x-3">
                    <img class="w-12 h-12 rounded-full border-2 border-surface shadow-xl"
                        data-alt="Close up professional portrait of a tech visionary female creator, soft studio lighting, cinematic bokeh background, charcoal and slate color palette."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvKqu5cgMvMa1NaZqLsD-rblmfwrO4OoI8CKIHPK_LfhmL5C6ojJgl3xrLQXX8bMpObcI2HMXoDhqa0iuq5o3Vo-Aov6w8vEaY829nNTmyVJ5_6AYibEO7u_yDpthwVz5UdD7XCV2TDu49-hF6ISdAFiqDu_u0RWq9K8kAmy3YGKzgqkQBrsAC0rxXA3JbCVlulFPqS291QHUft1pCTHLFnRwKwdJpGst-rYdXqMP691KvsARl9dpDKWSUFCnrT5o2aThcf99XdvE" />
                    <div
                        class="w-12 h-12 rounded-full border-2 border-surface bg-secondary-container flex items-center justify-center text-xs font-bold text-on-secondary-container shadow-xl">
                        +4</div>
                </div>
                <div class="text-left">
                    <p class="font-label-sm text-label-sm font-bold text-on-surface">By Elena Vance</p>
                    <p class="text-[10px] text-on-surface-variant">Published Oct 24, 2024</p>
                </div>
            </div>
        </div>
    </header>
    <div class="pt-8 max-w-container-max mx-auto px-margin-desktop grid grid-cols-12 gap-gutter relative">
        <!-- Sidebar Actions -->
        <aside class="hidden lg:block col-span-1">
            <div class="sticky top-32 glass-card rounded-full py-8 flex flex-col items-center gap-8 w-16 mx-auto">
                <button class="group flex flex-col items-center gap-1">
                    <span
                        class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors"
                        style="font-variation-settings: 'FILL' 1;">favorite</span>
                    <span class="text-[10px] font-bold text-on-surface-variant">2.4k</span>
                </button>
                <button class="group flex flex-col items-center gap-1">
                    <span
                        class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors">comment</span>
                    <span class="text-[10px] font-bold text-on-surface-variant">128</span>
                </button>
                <button class="group flex flex-col items-center gap-1">
                    <span
                        class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors">bookmark</span>
                    <span class="text-[10px] font-bold text-on-surface-variant">Save</span>
                </button>
                <div class="w-8 h-px bg-white/10"></div>
                <button class="group flex flex-col items-center gap-1">
                    <span
                        class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary transition-colors">share</span>
                </button>
            </div>
        </aside>
        <!-- Main Content Area -->
        <article class="col-span-12 lg:col-span-8 lg:col-start-3 max-w-[720px] mx-auto pb-24">
            <div class="space-y-12 font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                <p class="first-letter:text-7xl first-letter:font-bold first-letter:text-primary first-letter:mr-3 first-letter:float-left">
                    {{ $post['content'] }}
                </p>
                <p>True technical elegance isn't about removing features; it's about the precision of their arrival.
                    When a button only appears when the intent is sensed, or a menu recedes into a glassmorphic
                    blur, the user enters a state of deep focus. This is where inspiration thrives.</p>
                <figure class="my-16">
                    <div class="rounded-xl overflow-hidden glass-card p-2">
                        <img class="w-full h-[400px] object-cover rounded-lg"
                            data-alt="A high-end creative workspace at dusk. A sleek workstation with a glowing minimalist monitor displays abstract geometric code. The lighting is moody with soft cyan and deep navy tones, featuring a clean glass desk and high-performance peripherals. Professional, cinematic atmosphere."
                            src="{{ $post['image'] }}" />
                    </div>
                    <figcaption
                        class="mt-4 text-center font-label-sm text-label-sm text-on-surface-variant/60 italic">Fig
                        1: The intersection of physical ergonomics and digital fluidity.</figcaption>
                </figure>
                <h2 class="font-headline-lg text-headline-lg text-on-surface pt-8">The Pillars of Invisible UI</h2>
                <p>There are three core principles that define the Aether aesthetic. First is <strong>Refractive
                        Glassmorphism</strong>. By using backdrop blurs instead of opaque backgrounds, we maintain a
                    sense of context. The user always feels where they are in the application's spatial hierarchy.
                </p>
                <p>Second is <strong>Electric Accents</strong>. In a charcoal and slate world, color is a precious
                    resource. We use high-vibrancy cyan and primary blue sparingly to denote action and success,
                    creating a mental map for the user without overwhelming their visual field.</p>
                <div class="glass-card p-8 rounded-xl my-12 border-l-4 border-l-secondary">
                    <p class="text-on-surface font-headline-lg italic text-2xl leading-snug">"The designer's job is
                        not to build a cage for information, but to provide a stage where it can perform."</p>
                    <p class="mt-4 font-label-sm text-label-sm text-secondary font-bold">— Marcus Thorne, Lead UX at
                        Aether</p>
                </div>
                <p>Finally, there is <strong>Motion as Narrative</strong>. We treat every transition as a frame in a
                    film. Elements don't just 'appear'; they ease in with a weight that suggests physical mass. This
                    tactile quality in a digital space builds trust and familiarity.</p>
            </div>
            <!-- Tags Section -->
            <div class="flex flex-wrap gap-2 pt-12 border-t border-white/5">
                @for ($i=0; $i < count($post['categories']); $i++)
                    @if ($i===0)
                    <span class="px-4 py-1.5 glass-card rounded-full text-secondary font-label-sm text-label-sm">
                    {{ $post['categories'][$i] }}
                    </span>
                    @else
                    <span class="px-4 py-1.5 glass-card rounded-full text-on-surface-variant font-label-sm text-label-sm hover:text-secondary transition-colors cursor-pointer">
                        {{ $post['categories'][$i] }}
                    </span>
                    @endif
                    @endfor
            </div>
            <!-- Author Card -->
            <div class="mt-20 glass-card p-8 rounded-2xl flex flex-col md:flex-row gap-gutter items-center">
                <img class="w-24 h-24 rounded-full object-cover"
                    data-alt="Close up professional portrait of Elena Vance, a tech visionary with sharp focus. Soft studio lighting with a slight cyan rim light. Professional, minimalist background with a slight glassmorphic blur. Highly detailed, 8k resolution."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2cEqdfMmDbOaeawPq9Zfm57PBLR0ybXQMcXrhUXPnKzrgrj0YOCkU-lU3_Gp0nxj3cziBrIvJ5OVFymbPN4ASLy8EYciMfSk6WW9bGs9gNfmz3G_zYT61K5D-5aeyMgxBOCxYlPnkKyvIpAnpuhKaPS7sHS0nV8MyCSWVREIWB-BVPflkDpH19Hi6UwwBY1PQZhbsh70xDIU6hgN-xauiSNXS0F2TwK0GlWMyxjCaz7jfu0W_BP0Om4dIpQRhoDzUF-k9mD7WSs4" />
                <div class="text-center md:text-left">
                    <h4 class="font-headline-lg text-2xl text-on-surface">Elena Vance</h4>
                    <p class="text-on-surface-variant font-body-md mt-2">Principal Design Theorist at Aether. Elena
                        spends her time dismantling traditional UI paradigms to make room for the future of ambient
                        computing.</p>
                    <div class="flex justify-center md:justify-start gap-4 mt-4">
                        <button
                            class="text-primary font-label-sm text-label-sm font-bold flex items-center gap-1">Follow
                            <span class="material-symbols-outlined text-sm">add</span></button>
                        <button class="text-on-surface-variant font-label-sm text-label-sm">Portfolio</button>
                    </div>
                </div>
            </div>
            <!-- Comments Section -->
            <section class="mt-24">
                <div class="flex justify-between items-center mb-10">
                    <h3 class="font-headline-lg text-2xl text-on-surface">Discussions (128)</h3>
                    <div class="flex gap-2">
                        <button
                            class="px-4 py-2 rounded-lg bg-surface-container-highest text-on-surface text-xs font-bold">Newest</button>
                        <button class="px-4 py-2 rounded-lg text-on-surface-variant text-xs">Top</button>
                    </div>
                </div>
                <div class="space-y-8">
                    <!-- Comment Input -->
                    <div class="glass-card p-6 rounded-xl">
                        <div class="flex gap-4">
                            <span
                                class="material-symbols-outlined text-4xl text-on-surface-variant">account_circle</span>
                            <div class="flex-1">
                                <textarea
                                    class="w-full bg-surface-container-low border border-white/5 rounded-lg p-4 text-on-surface focus:ring-1 focus:ring-secondary focus:border-secondary transition-all min-h-[100px]"
                                    placeholder="Share your perspective..."></textarea>
                                <div class="flex justify-end mt-4">
                                    <button
                                        class="bg-primary text-on-primary px-8 py-2 rounded-full font-label-sm text-label-sm font-bold">Post
                                        Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Individual Comment -->
                    <div class="space-y-8">
                        <div class="flex gap-4">
                            <img class="w-10 h-10 rounded-full"
                                data-alt="Portrait of a male digital artist in a dark, tech-focused environment. Subtle cool-toned lighting, sharp features, intense focus. Cinematic atmosphere with soft background light."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBna_BO7FM1bfoqomINWlPRMgigLydYdPM2lzoBs-C05ENE1GgTIX3ihwZHreOWAk2oUnEBMedeR4n-p_Q0BBp0xXleRbzYAVClOzFA8gGlhjFxDFIihBxrigIIK10cA_SW4u_ufnRKZFe0LwZwcRLQJuhYMb4pyLswVHVbgXWMTLNrbIfxQMSwCO3TVHuw5QkI9Rx3Nnf7JBvdBttqoOSo_eHJ31E2EFOVE2aVqUWMJ3FfVNaLt0uZImBFvgIm4bDAg0tOmsDdxg4" />
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-on-surface text-sm">Julian Arch</span>
                                    <span class="text-on-surface-variant text-[10px]">2 hours ago</span>
                                </div>
                                <p class="text-on-surface-variant text-sm mt-2 leading-relaxed">The point about
                                    "Electric Accents" really resonates. Most modern SaaS products are too loud with
                                    color. Aether’s restraint is what makes it feel like a pro tool rather than a
                                    toy.</p>
                                <div class="flex items-center gap-6 mt-4">
                                    <button
                                        class="flex items-center gap-1 text-[10px] text-on-surface-variant hover:text-secondary">
                                        <span class="material-symbols-outlined text-sm">thumb_up</span> 42
                                    </button>
                                    <button
                                        class="text-[10px] text-on-surface-variant hover:text-secondary font-bold">Reply</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-4 ml-14">
                            <img class="w-10 h-10 rounded-full"
                                data-alt="Portrait of a creative designer, soft focus, cinematic lighting with warm and cool balance. Minimalist urban studio setting."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYuUV0WLC2U9A6XCSktHdDLUKRlPvkFvFzmh6Cjh7R0mOPrRA_SYAMnuhef_H9gxkrVC6yQXAhlTEYL6T44ev_mJDefyCSn1zYUuwQo_OC6kJfKZBQSh9RY828MEr8q7_jEGIjj1AMkWCS4ZnclahF7hz_WJIXfz8OsoycYEZldRBmTodL5jMYIsGIL4J4hIo43tVdvTX-qg0t3NmCo4Yq9WKj0nc4knfnQGgsxS0MCRdsX79RiPV21angkFs_ZSjWzZmyNg-U_78" />
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-on-surface text-sm">Sarah Chen</span>
                                    <span class="text-on-surface-variant text-[10px]">1 hour ago</span>
                                </div>
                                <p class="text-on-surface-variant text-sm mt-2 leading-relaxed">Exactly. It's about
                                    cognitive load. When color only means "action," you don't have to scan the whole
                                    page to find what's important.</p>
                                <div class="flex items-center gap-6 mt-4">
                                    <button
                                        class="flex items-center gap-1 text-[10px] text-on-surface-variant hover:text-secondary">
                                        <span class="material-symbols-outlined text-sm">thumb_up</span> 12
                                    </button>
                                    <button
                                        class="text-[10px] text-on-surface-variant hover:text-secondary font-bold">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full mt-12 py-4 rounded-xl border border-white/10 text-on-surface-variant font-label-sm text-label-sm hover:bg-white/5 transition-all">Load
                    more discussions</button>
            </section>
        </article>
    </div>
</x-layouts.main>