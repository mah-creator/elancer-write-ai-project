<x-layouts.main title="{{ $title ?? 'Create Category' }}" bodyWrapper="font-body-md text-on-surface bg-background min-h-screen flex flex-col selection:bg-primary/30" mainWrapper="relative z-10 flex-grow pt-32 pb-24 px-margin-mobile md:px-margin-desktop">
    <x-slot:style>
        <style>
            :root {
                --glass-bg: rgba(11, 19, 38, 0.6);
                --glass-border: rgba(255, 255, 255, 0.08);
                --glass-blur: 24px;
            }

            body {
                background-color: #0b1326;
                color: #dae2fd;
                overflow-x: hidden;
            }

            .glass-card {
                background: var(--glass-bg);
                backdrop-filter: blur(var(--glass-blur));
                border: 1px solid var(--glass-border);
                box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            }

            .inner-glow {
                box-shadow: inset 0 0 12px rgba(173, 198, 255, 0.1);
            }

            .accent-glow:hover {
                box-shadow: 0 0 20px rgba(173, 198, 255, 0.3);
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .custom-scrollbar::-webkit-scrollbar {
                width: 4px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: rgba(255, 255, 255, 0.05);
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: rgba(173, 198, 255, 0.2);
                border-radius: 10px;
            }

            .shimmer {
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.05), transparent);
                background-size: 200% 100%;
                animation: shimmer 3s infinite;
            }

            @keyframes shimmer {
                0% {
                    background-position: -200% 0;
                }

                100% {
                    background-position: 200% 0;
                }
            }
        </style>
    </x-slot:style>

    <div class="max-w-[840px] mx-auto">
        <!-- Focus Header -->
        @include('dashboard.categories._form-header', [
        'isEdit' => isset($category) && $category->id,
        ])
        <!-- Create/Edit Form -->
        <form action="{{ $action ?? route('dashboard.categories.store') }}" method="post" class="space-y-8">
            @csrf
            @method($method ?? 'POST')
            <!-- Section: Identity -->
            <div class="glass-card rounded-xl p-8 inner-glow relative overflow-hidden group">
                <div class="absolute inset-0 shimmer opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div class="flex flex-col gap-2">
                            <label class="font-label-sm text-label-sm text-on-surface-variant" for="cat_name">Category Name</label>
                            <input name="name" value="{{ $category->name }}" class="bg-surface-container-low border border-white/10 rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary outline-none text-on-surface transition-all placeholder:text-on-surface-variant/30" id="cat_name" oninput="updateSlug(this.value)" placeholder="e.g. Cinematic Architecture" type="text" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="font-label-sm text-label-sm text-on-surface-variant" for="cat_slug">URL Slug</label>
                            <div class="relative flex items-center">
                                <span class="absolute left-4 text-on-surface-variant/50 font-label-sm">aether.io/cat/</span>
                                <input name="slug" value="{{ $category->slug }}" class="w-full bg-surface-container-lowest/50 border border-white/5 rounded-lg pl-[90px] pr-4 py-3 text-on-surface-variant/80 font-label-sm cursor-not-allowed" id="cat_slug" readonly="" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant">Visual Essence</label>
                        <div class="relative group/cover aspect-video rounded-lg overflow-hidden bg-surface-container border border-dashed border-white/20 hover:border-primary/50 transition-all cursor-pointer flex flex-col items-center justify-center gap-3">
                            <img class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500" data-alt="A professional creative studio moodboard showcasing minimalist industrial architecture, soft blue and charcoal lighting, and high-quality textures of brushed aluminum and frosted glass. The image has a cinematic wide angle shot and feels highly sophisticated and technical." id="cover_preview" />
                            <div class="flex flex-col items-center gap-2 z-10" id="upload_ui">
                                <span class="material-symbols-outlined text-4xl text-on-surface-variant">cloud_upload</span>
                                <span class="font-label-sm text-on-surface-variant">Upload Cover Image</span>
                            </div>
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/cover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="text-white font-label-sm">Change Image</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section: Details -->
            <div class="glass-card rounded-xl p-8 inner-glow">
                <div class="space-y-6">
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-center">
                            <label class="font-label-sm text-label-sm text-on-surface-variant" for="cat_desc">Description &amp; Editorial Focus</label>
                            <span class="text-[10px] text-on-surface-variant/40 font-mono">Markdown Supported</span>
                        </div>
                        <textarea name="description" value="{{ $category->description }}" class="bg-surface-container-low border border-white/10 rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary outline-none text-on-surface transition-all placeholder:text-on-surface-variant/30 custom-scrollbar" id="cat_desc" placeholder="Describe the aesthetic and goals of this category..." rows="4"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="flex flex-col gap-4">
                            <label class="font-label-sm text-label-sm text-on-surface-variant">Atmospheric Color</label>
                            <div class="flex flex-wrap gap-3">
                                <button class="w-10 h-10 rounded-full border-2 border-white/20 bg-primary ring-offset-4 ring-offset-background transition-all hover:scale-110 active:scale-95 selected ring-2 ring-primary" onclick="selectColor(this)" type="button"></button>
                                <button class="w-10 h-10 rounded-full border-2 border-white/20 bg-secondary ring-offset-4 ring-offset-background transition-all hover:scale-110 active:scale-95" onclick="selectColor(this)" type="button"></button>
                                <button class="w-10 h-10 rounded-full border-2 border-white/20 bg-tertiary ring-offset-4 ring-offset-background transition-all hover:scale-110 active:scale-95" onclick="selectColor(this)" type="button"></button>
                                <button class="w-10 h-10 rounded-full border-2 border-white/20 bg-error ring-offset-4 ring-offset-background transition-all hover:scale-110 active:scale-95" onclick="selectColor(this)" type="button"></button>
                                <button class="w-10 h-10 rounded-full border-2 border-white/20 bg-surface-variant ring-offset-4 ring-offset-background transition-all hover:scale-110 active:scale-95" onclick="selectColor(this)" type="button"></button>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <label class="font-label-sm text-label-sm text-on-surface-variant">Category Icon</label>
                            <div class="flex flex-wrap gap-3">
                                <button class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 hover:border-white/30 transition-all active:scale-95" type="button">
                                    <span class="material-symbols-outlined text-primary">auto_awesome</span>
                                </button>
                                <button class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 hover:border-white/30 transition-all active:scale-95" type="button">
                                    <span class="material-symbols-outlined text-on-surface-variant">photo_camera</span>
                                </button>
                                <button class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 hover:border-white/30 transition-all active:scale-95" type="button">
                                    <span class="material-symbols-outlined text-on-surface-variant">palette</span>
                                </button>
                                <button class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 hover:border-white/30 transition-all active:scale-95" type="button">
                                    <span class="material-symbols-outlined text-on-surface-variant">movie</span>
                                </button>
                                <button class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 hover:border-white/30 transition-all active:scale-95" type="button">
                                    <span class="material-symbols-outlined text-on-surface-variant">more_horiz</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Actions -->
            <div class="flex flex-col-reverse md:flex-row items-center justify-end gap-4 pt-4">
                <a href="{{ route('dashboard.categories.index') }}" class="w-full md:w-auto px-8 py-3 rounded-full font-label-sm text-label-sm text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all" type="button">
                    Cancel
                </a>
                <button class="w-full md:w-auto px-10 py-3 rounded-full bg-primary-container text-on-primary-container font-headline-lg text-[16px] font-bold tracking-tight hover:brightness-110 active:scale-95 transition-all accent-glow" type="submit">
                    {{$buttonText ?? 'Create Category'}}
                </button>
            </div>
        </form>
    </div>

    <!-- Main Content Canvas -->
    <script>
        function updateSlug(val) {
            const slug = val.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            document.getElementById('cat_slug').value = slug;
        }

        function selectColor(btn) {
            // Remove selection from all
            const buttons = btn.parentElement.querySelectorAll('button');
            buttons.forEach(b => {
                b.classList.remove('ring-2', 'ring-primary', 'selected');
            });
            // Add to current
            btn.classList.add('ring-2', 'ring-primary', 'selected');
        }

        // Fake image upload trigger
        document.querySelector('.group\\/cover').addEventListener('click', () => {
            const img = document.getElementById('cover_preview');
            const ui = document.getElementById('upload_ui');

            // Simulating image load
            img.src = "https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1200";
            img.classList.remove('opacity-0');
            img.classList.add('opacity-100');
            ui.classList.add('hidden');
        });

        // Prevention of form refresh for demo
        // document.querySelector('form').addEventListener('submit', (e) => {
        //     e.preventDefault();
        //     alert('Category Created Successfully');
        // });
    </script>
</x-layouts.main>