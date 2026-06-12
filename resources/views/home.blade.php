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

            .sidebar-link-active {
                color: #4cd7f6;
                background: rgba(76, 215, 246, 0.1);
                border-radius: 0.5rem;
            }
        </style>
    </x-slot:style>

    <!-- Hero Section (Preserved) -->
    <section
        class="cinematic-gradient relative min-h-[500px] flex items-center px-margin-desktop overflow-hidden border-b border-white/5">
        <x-contents.featured-story :featured-post="$featuredPost" />
    </section>
    <!-- Main Feed Layout -->
    <div class="max-w-container-max mx-auto px-margin-desktop py-12">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter items-start">
            <!-- Left Sidebar: Discover & Tags -->
            <aside class="hidden md:block md:col-span-2 space-y-10 sticky top-32">
                <div class="space-y-4">
                    <h3
                        class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant/60 font-bold px-2">
                        Discover</h3>
                    <nav class="space-y-1">
                        <a class="flex items-center gap-3 px-3 py-2 font-label-sm text-label-sm font-bold {{ request('tab') == null ? 'sidebar-link-active' : 'text-on-surface-variant hover:text-on-surface transition-colors' }}"
                            href="{{ route('home') }}">
                            <span class="material-symbols-outlined text-[20px]"
                                style="font-variation-settings: 'FILL' 1;">explore</span> Explore
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 font-label-sm text-label-sm font-bold {{ request('tab') == 'popular' ? 'sidebar-link-active' : 'text-on-surface-variant hover:text-on-surface transition-colors' }}"
                            href="{{ route('home', ['tab' => 'popular']) }}">
                            <span class="material-symbols-outlined text-[20px]">trending_up</span> Popular
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 font-label-sm text-label-sm font-bold {{ request('tab') == 'recent' ? 'sidebar-link-active' : 'text-on-surface-variant hover:text-on-surface transition-colors' }}"
                            href="{{ route('home', ['tab' => 'recent']) }}">
                            <span class="material-symbols-outlined text-[20px]">history</span> Recent
                        </a>
                    </nav>
                </div>
                <div class="space-y-4">
                    <h3
                        class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant/60 font-bold px-2">
                        Your Tags</h3>
                    <div class="flex flex-wrap gap-2 px-2">
                        @foreach (App\Models\Tag::all() as $tag)
                            <a class="px-2.5 py-1 rounded-md font-label-sm text-[11px] bg-surface-variant/30 border border-white/5 text-on-surface-variant transition-all
                                                         {{ request('slug') == $tag->slug ? 'border-secondary/30 text-secondary' : 'hover:border-secondary/30 hover:text-secondary' }}"
                                href="{{ route('home', ['slug' => $tag->slug]) }}">#{{ $tag->name }}</a>

                        @endforeach
                    </div>
                </div>
            </aside>
            <!-- Center Feed Content -->
            <section class="col-span-1 md:col-span-7 space-y-12">
                <div class="flex justify-between items-center px-2">
                    <h2 class="font-headline-lg text-[28px] text-on-surface">For You</h2>
                    <div class="flex gap-2">
                        <button
                            class="px-3 py-1 bg-surface-variant/20 rounded-full text-secondary font-label-sm text-[12px] border border-secondary/20">All</button>
                        <button
                            class="px-3 py-1 hover:bg-surface-variant/20 rounded-full text-on-surface-variant font-label-sm text-[12px] transition-colors">Trending</button>
                    </div>
                </div>
                <div class="space-y-8">
                    <!-- Feed Card 1 -->
                    @foreach ($posts as $post)
                        <x-contents.post-card :post="$post" />

                    @endforeach
                </div>
                <div class="pt-8 flex justify-center">
                    <button
                        class="px-10 py-3 border border-secondary/30 text-secondary rounded-full font-label-sm text-label-sm hover:bg-secondary/10 transition-all font-bold">
                        Load More Stories
                    </button>
                </div>
            </section>
            <!-- Right Sidebar: Trending & Recommendations -->
            <aside class="hidden lg:block lg:col-span-3 space-y-10 sticky top-32">
                <!-- Trending Module -->
                <x-widgets.trending />
                <!-- Recommended Authors -->
                <div class="space-y-6">
                    <h3
                        class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant/60 font-bold px-2">
                        Recommended</h3>
                    <x-widgets.recommended-authors />
                    <a class="inline-block px-2 font-label-sm text-label-sm text-secondary hover:underline font-bold transition-all"
                        href="#">View all creators</a>
                </div>
                <!-- Prominent Newsletter CTA (Replacement for The Creative Pulse positioning) -->
                <div
                    class="glass-card rounded-2xl p-8 border-secondary/20 bg-secondary/5 relative overflow-hidden group">
                    <div
                        class="absolute -top-12 -right-12 w-32 h-32 bg-secondary/10 blur-3xl group-hover:scale-150 transition-transform">
                    </div>
                    <h3 class="font-headline-lg text-[22px] text-on-surface mb-3">The Creative Pulse</h3>
                    <p class="text-on-surface-variant/80 font-label-sm text-label-sm mb-6 leading-relaxed">
                        Join 24,000+ creators receiving our weekly digest on cinema, tech, and minimalism.
                    </p>
                    <form class="space-y-4">
                        <input
                            class="w-full bg-surface-container-low/50 border border-white/10 rounded-xl px-4 py-3 text-on-surface font-label-sm text-label-sm focus:border-secondary/50 focus:ring-0 outline-none transition-all"
                            placeholder="your@email.com" type="email" />
                        <button
                            class="w-full bg-on-surface text-surface py-3 rounded-xl font-bold hover:bg-secondary hover:text-on-secondary transition-all active:scale-[0.98]">
                            Subscribe Now
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </div>

</x-layouts.main>