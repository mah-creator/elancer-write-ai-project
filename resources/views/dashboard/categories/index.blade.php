<x-layouts.main title="Category Management" bodyWrapper="font-body-md overflow-x-hidden" mainWrapper="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
    <x-slot:style>
        <style>
            body {
                background-color: #0b1326;
                background-image:
                    radial-gradient(circle at 10% 20%, rgba(76, 215, 246, 0.05) 0%, transparent 40%),
                    radial-gradient(circle at 90% 80%, rgba(173, 198, 255, 0.08) 0%, transparent 40%);
                min-height: 100vh;
                color: #dae2fd;
            }

            .glass-card {
                background: rgba(30, 41, 59, 0.4);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.08);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .glass-card:hover {
                border-color: rgba(76, 215, 246, 0.4);
                box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5), 0 0 15px rgba(76, 215, 246, 0.1);
            }

            .primary-glow {
                box-shadow: 0 0 20px rgba(76, 215, 246, 0.3);
            }

            .primary-glow:hover {
                box-shadow: 0 0 30px rgba(76, 215, 246, 0.5);
                transform: scale(1.02);
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .sparkline {
                height: 40px;
                width: 100px;
                background: linear-gradient(90deg, transparent, rgba(76, 215, 246, 0.2), transparent);
                mask-image: url("data:image/svg+xml,%3Csvg width='100' height='40' viewBox='0 0 100 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 30 Q 10 10 20 25 T 40 15 T 60 35 T 80 10 T 100 20' fill='none' stroke='black' stroke-width='2'/%3E%3C/svg%3E");
                -webkit-mask-image: url("data:image/svg+xml,%3Csvg width='100' height='40' viewBox='0 0 100 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 30 Q 10 10 20 25 T 40 15 T 60 35 T 80 10 T 100 20' fill='none' stroke='black' stroke-width='2'/%3E%3C/svg%3E");
            }
        </style>

    </x-slot:style>
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-16">
        <div class="max-w-2xl">
            <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Category Management</h1>
            <p class="font-body-md text-on-surface-variant">
                Organize your content structure, monitor performance metrics, and refine your editorial taxonomy.
            </p>
        </div>
        <a href="{{ route('dashboard.categories.create') }}" class="primary-glow bg-secondary text-on-secondary-fixed px-8 py-4 rounded-xl font-label-sm text-label-sm font-bold flex items-center gap-2 transition-all duration-300">
            <span class="material-symbols-outlined" data-icon="add">add</span>
            Create New Category
        </a>
    </div>
    <!-- Top Performing Cards Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-16">
        <!-- Major Analytics Card -->
        <div class="lg:col-span-2 glass-card p-8 rounded-2xl flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <span class="font-label-sm text-secondary uppercase tracking-widest mb-2 block">Top Performing</span>
                        <h2 class="font-headline-lg text-[32px] text-on-surface">Neural Interfaces</h2>
                    </div>
                    <div class="flex gap-2">
                        <button class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center hover:text-secondary transition-colors">
                            <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                        </button>
                        <button class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center hover:text-secondary transition-colors">
                            <span class="material-symbols-outlined text-[20px]" data-icon="archive">archive</span>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div>
                        <p class="font-label-sm text-outline mb-1">POSTS</p>
                        <p class="font-headline-lg text-[28px] text-on-surface">142</p>
                    </div>
                    <div>
                        <p class="font-label-sm text-outline mb-1">VIEWS</p>
                        <p class="font-headline-lg text-[28px] text-on-surface">89.4k</p>
                    </div>
                    <div>
                        <p class="font-label-sm text-outline mb-1">AVG. READ</p>
                        <p class="font-headline-lg text-[28px] text-on-surface">4:12</p>
                    </div>
                    <div>
                        <p class="font-label-sm text-outline mb-1">GROWTH</p>
                        <p class="font-headline-lg text-[28px] text-secondary">+12%</p>
                    </div>
                </div>
            </div>
            <div class="mt-12 flex items-center justify-between pt-6 border-t border-white/5">
                <p class="font-label-sm text-on-surface-variant">Active since Jan 2023</p>
                <div class="flex -space-x-2">
                    <img alt="Contributor" class="w-8 h-8 rounded-full border-2 border-surface" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCb5M-xD68ITbj2xnKH0mkHtNs36pfXpkDA6gPlDSp1tBfdy2jdnO0i29x-40mDwLap3Z9aWJm97D00eVrkoq42f2ocSXj45ZWaeb5Lb2RxzBQmfzh10W1kG8YsS-qSf8nbG0lFBRxWvKvGG0Um6gHQ3xiLOh3pVv87A6QIEpKKzzsRwEW8PbBZ7t5c1OSbVHy9uMWuylp9rSo_JIQFkoqXhJssA7ugEnk6J9CbfFV_6A2SFq2ODkbKRgF1OCywD4YI_M3eac3gGRU" />
                    <img alt="Contributor" class="w-8 h-8 rounded-full border-2 border-surface" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjwreBdIzaFMdBWxX3FXWu5l5VYaj1QZEMZpH3pbut_TRMqwxV3R0r43bDl76uud7c9qPConpT4IGv2fkQ_7iwXJYosdbWAu9lwdGyJ1pmlg3cCa9Yh8JS6xNLfVVbcGvU6rf3amEAGXZ2fMGQ3J41hodfKr0ZHLPWb_K54RHAOKiESEvSuk_w6OdaC1oseUF7MBOsgU_ztMLWgZhoZRFLv8K6jZIalJCfBv_Czznc6Y6qp8vGm3vJppjJC7sXqI-xdz-Gv2Z5LBA" />
                    <img alt="Contributor" class="w-8 h-8 rounded-full border-2 border-surface" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBmXtsdtPIGTMdV3Bi-K-csPxfuCwLCTpOCyRifza_ZCHqrNQxrnQGLmk6ompQ5xeSnt4ki0aC8RTWiGxCSgzX5r1uOoRAj2v5DyqU3xpzARTrEkzC8DlmFMFnLptalp-fA3iDLJLfgjBD7Oj5R0I6q6kJXrUMEbK9gg1wzMBWf7xp4ju_WlozlgJvJyNfQEQdgh1Q5isjv_75w35nY3P6wZTqJy5m3AGtW7-VKNQXIOXAqoLbXO1lWds45gbvrFcRUdiQRkRY8Mko" />
                    <div class="w-8 h-8 rounded-full border-2 border-surface bg-surface-container-highest flex items-center justify-center text-[10px] font-bold text-on-surface">+8</div>
                </div>
            </div>
        </div>
        <!-- Secondary High Fidelity Card -->
        <div class="glass-card p-8 rounded-2xl flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start mb-6">
                    <h3 class="font-headline-lg text-[24px] text-on-surface">Digital Serenity</h3>
                    <button class="text-on-surface-variant hover:text-on-surface transition-colors">
                        <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                    </button>
                </div>
                <p class="font-body-md text-on-surface-variant mb-8">
                    Visual culture, AI-driven mindfulness patterns, and organic typography systems.
                </p>
            </div>
            <div class="space-y-6">
                <div class="flex justify-between items-end">
                    <div>
                        <p class="font-label-sm text-outline mb-1">VIEWS</p>
                        <p class="font-headline-lg text-[24px] text-on-surface">42.1k</p>
                    </div>
                    <div>
                        <p class="font-label-sm text-outline mb-1 text-right">POSTS</p>
                        <p class="font-headline-lg text-[24px] text-on-surface text-right">86</p>
                    </div>
                </div>
                <div class="h-1 bg-white/5 rounded-full overflow-hidden">
                    <div class="h-full bg-secondary w-3/4 rounded-full"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tertiary Grid Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-20">
        <!-- Simple Card 1 -->
        <div class="glass-card p-8 rounded-2xl flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline-lg text-[20px] text-on-surface">Cinematography</h4>
                <button class="text-on-surface-variant hover:text-on-surface transition-colors">
                    <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                </button>
            </div>
            <p class="font-body-md text-on-surface-variant mb-6 flex-grow">
                The art of lighting, framing, and visual storytelling for digital creators.
            </p>
            <div class="flex gap-4 text-on-surface-variant">
                <div class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]" data-icon="article">article</span>
                    <span class="font-label-sm">24</span>
                </div>
                <div class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]" data-icon="visibility">visibility</span>
                    <span class="font-label-sm">12k</span>
                </div>
            </div>
        </div>
        <!-- Simple Card 2 -->
        <div class="glass-card p-8 rounded-2xl flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <h4 class="font-headline-lg text-[20px] text-on-surface">Creative Philosophy</h4>
                <button class="text-on-surface-variant hover:text-on-surface transition-colors">
                    <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                </button>
            </div>
            <p class="font-body-md text-on-surface-variant mb-6 flex-grow">
                Abstract thoughts on intentionality and the human side of artistic creation.
            </p>
            <div class="flex gap-4 text-on-surface-variant">
                <div class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]" data-icon="article">article</span>
                    <span class="font-label-sm">31</span>
                </div>
                <div class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]" data-icon="visibility">visibility</span>
                    <span class="font-label-sm">18.5k</span>
                </div>
            </div>
        </div>
        <!-- Suggestion Card -->
        <div class="border-2 border-dashed border-white/10 rounded-2xl flex flex-col items-center justify-center p-8 hover:border-secondary/40 transition-all cursor-pointer group">
            <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center mb-4 group-hover:bg-secondary/10 group-hover:border-secondary/40 transition-all">
                <span class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary" data-icon="add">add</span>
            </div>
            <p class="text-on-surface text-center font-label-sm mb-1">Add Category Idea</p>
            <p class="text-on-surface-variant text-center text-[12px]">Draft a new category skeleton</p>
        </div>
    </div>
    <!-- All Categories Table Section -->
    <section>
        <div class="flex items-center justify-between mb-8">
            <h2 class="font-headline-lg text-[28px] text-on-surface">All Categories</h2>
            <div class="flex gap-2">
                <button class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center border border-white/5 text-secondary">
                    <span class="material-symbols-outlined text-[20px]" data-icon="grid_view">grid_view</span>
                </button>
                <button class="w-10 h-10 rounded-lg bg-transparent flex items-center justify-center border border-white/5 text-on-surface-variant">
                    <span class="material-symbols-outlined text-[20px]" data-icon="list">list</span>
                </button>
            </div>
        </div>
        <div class="glass-card rounded-2xl overflow-hidden border border-white/5">
            <table class="w-full text-left border-collapse">
                <thead class="bg-surface-container-highest/50 border-b border-white/5">
                    <tr>
                        <th class="px-8 py-4 font-label-sm text-outline uppercase tracking-wider">Category Name</th>
                        <th class="px-8 py-4 font-label-sm text-outline uppercase tracking-wider">Status</th>
                        <th class="px-8 py-4 font-label-sm text-outline uppercase tracking-wider">Post Count</th>
                        <th class="px-8 py-4 font-label-sm text-outline uppercase tracking-wider">Total Views</th>
                        <th class="px-8 py-4 font-label-sm text-outline uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach ($categories as $category)
                    <!-- Table Row 1 -->
                    <tr class="hover:bg-white/5 transition-colors group">
                        <td class="px-8 py-6">
                            <p class="font-label-sm text-on-surface text-[15px] font-bold">{{ $category['name'] }}</p>
                            <p class="text-[12px] text-outline">/categories/neural-interfaces</p>
                        </td>
                        <td class="px-8 py-6">
                            <span class="bg-secondary/10 text-secondary px-2 py-1 rounded text-[11px] font-bold uppercase tracking-wider">Active</span>
                        </td>
                        <td class="px-8 py-6 font-body-md text-on-surface-variant">{{ $category['post_count'] }}</td>
                        <td class="px-8 py-6 font-body-md text-on-surface-variant">{{ Number::abbreviate($category['total_views']) }}</td>
                        <td class="px-8 py-6">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('dashboard.categories.edit', $category['id']) }}" class="text-on-surface-variant hover:text-secondary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                                </a>
                                <button class="text-on-surface-variant hover:text-error transition-colors">
                                    <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <script>
        // Micro-interaction: Subtle parallax on cards based on mouse position
        document.querySelectorAll('.glass-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 50;
                const rotateY = (centerX - x) / 50;

                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg)`;
            });
        });

        // Atmospheric floating particles background effect
        const createParticle = () => {
            const particle = document.createElement('div');
            particle.className = 'fixed rounded-full pointer-events-none z-0';
            const size = Math.random() * 2 + 1;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.background = 'rgba(76, 215, 246, 0.15)';
            particle.style.left = `${Math.random() * 100}vw`;
            particle.style.top = `${Math.random() * 100}vh`;
            particle.style.opacity = Math.random() * 0.3;

            document.body.appendChild(particle);

            particle.animate([{
                    transform: 'translateY(0) translateX(0)',
                    opacity: 0
                },
                {
                    transform: `translateY(-${Math.random() * 100 + 50}px) translateX(${Math.random() * 40 - 20}px)`,
                    opacity: 0.3
                },
                {
                    transform: `translateY(-${Math.random() * 200 + 100}px) translateX(${Math.random() * 80 - 40}px)`,
                    opacity: 0
                }
            ], {
                duration: Math.random() * 10000 + 5000,
                iterations: Infinity,
                easing: 'ease-in-out'
            });
        };

        for (let i = 0; i < 20; i++) {
            createParticle();
        }
    </script>
</x-layouts.main>