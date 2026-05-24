<x-layouts.main title="{{ $title ?? 'Edit/Create' }}" mainWrapper="pt-32 pb-40 px-margin-mobile md:px-0" bodyWrapper="bg-surface text-on-surface font-body-md selection:bg-secondary/30">
    <script defer="" src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <x-slot:style>
        <style>
            .glass-card {
                background: rgba(30, 41, 59, 0.5);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.08);
            }

            .inner-glow-primary {
                box-shadow: inset 0 0 12px rgba(173, 198, 255, 0.2);
            }

            .accent-glow {
                box-shadow: 0 0 20px rgba(76, 215, 246, 0.15);
            }

            .writing-lane {
                max-width: 720px;
                margin: 0 auto;
            }

            ::-webkit-scrollbar {
                width: 4px;
            }

            ::-webkit-scrollbar-track {
                background: transparent;
            }

            ::-webkit-scrollbar-thumb {
                background: rgba(255, 255, 255, 0.1);
                border-radius: 10px;
            }
        </style>
    </x-slot:style>
    </head>
    <div class="writing-lane space-y-12">
        <div class="relative h-0">
            <a href="{{ back()->getTargetUrl() }}" class="absolute -top-4 w-10 h-10 flex items-center justify-center rounded-full text-on-surface-variant hover:text-error transition-all duration-300 group right-0 md:-right-12 bg-transparent hover:opacity-80" aria-label="Cancel Editing">
                <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">close</span>
            </a>
        </div>
        <!-- TopNavBar -->
        <form @category-changed.window="selectedCategoryId = $event.detail.id; selectedCategoryName = $event.detail.name"
            x-data="{
                selectedCategoryId: '{{ $post->category_id ?? '' }}',
                selectedCategoryName: '{{ $post->category->name ?? '' }}'
            }"
            id="postForm" action="{{ $action ?? route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($method ?? 'POST')

            <x-slot:navbar>
                <nav class="fixed top-0 w-full z-50 border-b border-white/10 backdrop-blur-md bg-surface/50 h-20 shadow-sm">
                    <div class="flex justify-between items-center h-full px-margin-desktop max-w-container-max mx-auto">
                        <!-- Brand -->
                        <x-brand />
                        <!-- Status & Actions -->
                        <div class="flex items-center gap-6">
                            <div class="hidden md:flex items-center gap-2 text-on-surface-variant font-label-sm text-label-sm">
                                <span class="material-symbols-outlined text-[14px]">cloud_done</span>
                                <span>Saved to cloud</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="button" class="px-5 py-2 rounded-lg border border-white/10 text-on-surface font-label-sm text-label-sm hover:bg-white/5 transition-all">
                                    Preview
                                </button>
                                <button type="button" onclick="document.getElementById('postForm').submit()" class="px-6 py-2 rounded-lg bg-primary-container text-on-primary-container font-label-sm text-label-sm font-bold inner-glow-primary hover:brightness-110 transition-all accent-glow">
                                    Publish
                                </button>
                                <div class="h-8 w-[1px] bg-white/10 mx-2"></div>
                                <button type="button" class="material-symbols-outlined text-on-surface-variant hover:text-on-surface transition-colors" data-icon="settings">settings</button>
                            </div>
                        </div>
                    </div>
                </nav>
            </x-slot:navbar>

            <div class="writing-lane space-y-12">
                <!-- cancel update -->

                <!-- Header Section -->
                <header class="space-y-6">
                    <input type="text" name="title" value="{{ $post->title }}" class="w-full bg-transparent border-none focus:ring-0 font-headline-lg text-headline-lg font-bold text-on-surface placeholder:text-on-surface-variant/30 px-0" placeholder="Title of your masterpiece..." />
                    <div class="flex items-center gap-4 text-on-surface-variant font-label-sm text-label-sm">
                        <div class="flex items-center gap-1.5 bg-surface-container px-3 py-1 rounded-full">
                            <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                            <span>{{ Illuminate\Support\Carbon::now()->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center gap-1.5 bg-surface-container px-3 py-1 rounded-full">
                            <span class="material-symbols-outlined text-[16px]">category</span>
                            <span x-text="selectedCategoryName"></span>
                        </div>
                    </div>
                </header>
                <!-- Content Area -->
                <article class="space-y-8 font-body-lg text-body-lg text-on-surface/90 leading-relaxed">
                    <div class=""></div>
                    <textarea type="text" name="content" class="w-full bg-transparent border-none focus:ring-0 px-0" placeholder="Start writing your story...">{{ $post->content }}</textarea>
                </article>
            </div>

            <!-- Floating Toolbar -->
            <!--
    <div class="fixed bottom-12 left-1/2 -translate-x-1/2 z-50">
        <div class="glass-card px-4 py-2 rounded-2xl flex items-center gap-2 shadow-2xl border border-white/10 accent-glow">
            <button type="button" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="format_bold">format_bold</span>
            </button>
            <button type="button" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="format_italic">format_italic</span>
            </button>
            <button type="button" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="link">link</span>
            </button>
            <div class="w-[1px] h-6 bg-white/10 mx-1"></div>
            <button type="button" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="format_h1">format_h1</span>
            </button>
            <button type="button" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="format_quote">format_quote</span>
            </button>
            <div class="w-[1px] h-6 bg-white/10 mx-1"></div>
            <button type="button" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="add_photo_alternate">add_photo_alternate</span>
            </button>
            <button type="button" class="p-2 rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="code">code</span>
            </button>
        </div>
    </div>
-->

            <!-- Sidebar - Settings -->
            <aside class="fixed right-0 top-20 bottom-0 w-80 glass-card border-l border-white/10 translate-x-full lg:translate-x-0 transition-transform duration-500 z-40 hidden lg:block overflow-y-auto top-0">
                <div class="p-8 space-y-8">
                    <h3 class="font-headline-lg text-[18px] font-bold text-on-surface border-b border-white/5 pb-4">Post Settings</h3>
                    <!-- Cover Image -->
                    <div class="space-y-3 p-1">
                        <label class="font-label-sm text-label-sm text-on-surface-variant block uppercase tracking-wider">Cover Image</label>
                        <div class="aspect-video w-full rounded-lg border-2 border-dashed border-white/10 flex flex-col items-center justify-center hover:border-secondary/30 transition-colors cursor-pointer group">
                            @if ($post->cover_image)
                            <div class="aspect-video w-full h-full rounded-lg bg-cover bg-center mb-4"
                                style="background-image: url('{{ asset("storage/" . $post->cover_image) }}')"></div>
                            @else
                            <span class="material-symbols-outlined text-on-surface-variant group-hover:text-secondary mb-2 transition-colors" data-icon="upload_file">upload_file</span>
                            <span class="font-label-sm text-label-sm text-on-surface-variant">Upload Thumbnail</span>
                            @endif
                        </div>
                    </div>
                    <div class="space-y-6">
                        <input class="w-full" type="file" name="cover" id="coverImageInput" accept="image/*">
                    </div>
                    <!-- Meta Information -->
                    <div class="space-y-6">
                        <x-categories-options selectedCategoryId="{{ $post->category_id }}" />
                        <div class="space-y-2">
                            <label class="font-label-sm text-label-sm text-on-surface-variant block">URL Slug</label>
                            <div class="flex items-center gap-2 bg-surface-container-low border border-white/5 rounded-lg px-3 py-2">
                                <span class="text-on-surface-variant text-xs">/posts/</span>
                                <input class="bg-transparent border-none p-0 focus:ring-0 text-sm text-secondary font-medium w-full" type="text" value="cinematic-writing">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-label-sm text-label-sm text-on-surface-variant block">Tags</label>
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-secondary/10 text-secondary px-2 py-1 rounded-md font-label-sm text-[10px] border border-secondary/20 uppercase">Design</span>
                                <span class="bg-surface-container-high text-on-surface-variant px-2 py-1 rounded-md font-label-sm text-[10px] border border-white/5 uppercase">Minimalism</span>
                                <button class="bg-white/5 hover:bg-white/10 text-on-surface px-2 py-1 rounded-md font-label-sm text-[10px] transition-colors">+</button>
                            </div>
                        </div>
                    </div>
                    <!-- SEO Preview -->
                    <div class="space-y-3 pt-6 border-t border-white/5">
                        <label class="font-label-sm text-label-sm text-on-surface-variant block uppercase tracking-wider">SEO Preview</label>
                        <div class="bg-surface-container-low p-4 rounded-lg space-y-1">
                            <div class="text-secondary text-sm font-semibold truncate">Aether | The Cinematic Writing Experience</div>
                            <div class="text-on-surface-variant text-xs leading-snug line-clamp-2">Exploring the intersections of high-end design, technology, and the future of creative focus...</div>
                        </div>
                    </div>
                </div>
            </aside>

        </form>



        <!-- Footer Indicators -->
        <x-slot:footer>
            <footer class="fixed bottom-0 left-0 w-full lg:w-[calc(100%-320px)] h-12 flex items-center justify-between px-8 bg-surface/80 backdrop-blur-sm border-t border-white/5 z-40">
                <div class="flex items-center gap-6 text-on-surface-variant font-label-sm text-label-sm">
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary accent-glow"></span>
                        <span>Live Mode</span>
                    </div>
                    <span>432 Words</span>
                    <span>3 Min Read</span>
                </div>
                <div class="flex items-center gap-4 text-on-surface-variant">
                    <button type="button" class="material-symbols-outlined text-[18px] hover:text-on-surface transition-colors" data-icon="help_outline">help_outline</button>
                    <button type="button" class="material-symbols-outlined text-[18px] hover:text-on-surface transition-colors" data-icon="open_in_full">open_in_full</button>
                </div>
            </footer>
        </x-slot:footer>
</x-layouts.main>