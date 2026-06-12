<x-layouts.main title="Content Workspace"
    mainWrapper="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto"
    bodyWrapper="bg-background text-on-surface font-body-md overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container">
    <x-slot:style>

        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            }

            .glass-card {
                background: rgba(30, 41, 59, 0.5);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.08);
                transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
            }

            .glass-card:hover {
                border-color: rgba(173, 198, 255, 0.3);
                box-shadow: 0 0 20px rgba(77, 142, 255, 0.1);
            }

            .accent-glow:hover {
                box-shadow: 0 0 15px rgba(172, 215, 246, 0.3);
            }

            .pro-tip-gradient {
                background: linear-gradient(135deg, #171f33 0%, #060e20 100%);
            }

            .checkbox-custom {
                @apply rounded border-white/20 bg-white/5 text-primary focus:ring-offset-background focus:ring-primary;
            }
        </style>
    </x-slot:style>


    <!-- Header Area -->
    <div class="flex justify-between items-end mb-12">
        <header>
            <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Content Management</h1>
            <p class="text-on-surface-variant max-w-2xl font-body-md opacity-80">Manage your intellectual output, track
                performance, and schedule your upcoming editorial pieces.</p>
        </header>
        <a {{ route('dashboard.posts.create') }}
            class="bg-primary-container text-on-primary-container font-label-sm px-8 py-3 rounded-xl hover:shadow-[0_0_20px_rgba(77,142,255,0.4)] transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-[20px]">edit_square</span>
            Create Post
        </a>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        <!-- Sidebar: Author Stats -->
        <aside class="lg:col-span-3 space-y-gutter">
            <!-- Total Reach -->
            <div class="glass-card p-6 rounded-2xl">
                <p class="text-[10px] uppercase tracking-widest font-bold text-outline mb-4">Total Reach</p>
                <div class="flex items-baseline gap-2 mb-4">
                    <span class="text-[32px] font-headline-lg text-on-surface">124.8k</span>
                    <span class="text-secondary text-[14px] font-bold">+12%</span>
                </div>
                <div class="w-full bg-white/5 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-secondary h-full w-[70%]"></div>
                </div>
            </div>
            <!-- Active Readers -->
            <div class="glass-card p-6 rounded-2xl">
                <p class="text-[10px] uppercase tracking-widest font-bold text-outline mb-4">Active Readers</p>
                <div class="flex items-center gap-2 mb-6">
                    <span class="text-[32px] font-headline-lg text-on-surface">3,402</span>
                    <span
                        class="flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary/10 text-secondary text-[10px] font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
                        Live
                    </span>
                </div>
                <div class="flex -space-x-2">
                    <img alt="Reader" class="w-8 h-8 rounded-full border-2 border-background object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYUFc6SxtycergHr7WGR2eXQfSsV8bPBUc-cSipsO9izcFFIy8wosjXVNGGx-R4M9hRN5D_PAn_pFtFxMUge_xP4X7nDuFs74MZPgUYuYYqGXTlSDpOAu-bytC2lKgI7LzjeDK8hcmUymXjlVj6f7QXChCE_wy-PsGxu6UVV_JjUe1gmesDm4drUFbGPL5AB679oWwv6hTUDyE8tWhV8fnizx3CH0KUjS0B2ipjPevakysJxNAh1_SGvMyhnW76WTMIkY_pnAqjtg">
                    <img alt="Reader" class="w-8 h-8 rounded-full border-2 border-background object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCPIi7Oy3quzkcu5ZMsrkf2RAu-f3YSiuxIdwiXNp3g_2Qw6QuI9BhB6TLqbipyKOT_5JPxbID9BqNh-M7V5lUAeANxQHg7G10aI6u9chEIk2wqgsgmeukS4qiHPxHp1053X6PP9Ia9qo-9s83L7wQ1OTSkDVKQa9juTavRl8nlN-HvGJkUrOmLnIReQaewjTa13FGyLwp2TUB-PgHUpt_g5zBiuA1ZYm-EXNxj8IBbPgDwTi_fIG0cHjro6mhwtP82CeniibDSNko">
                    <div
                        class="w-8 h-8 rounded-full border-2 border-background bg-surface-container-high flex items-center justify-center text-[10px] font-bold text-outline">
                        +42</div>
                </div>
            </div>
            <!-- Pro Tip Card -->
            <div class="pro-tip-gradient p-6 rounded-2xl border border-white/5 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <span class="material-symbols-outlined text-[64px]">lightbulb</span>
                </div>
                <h4 class="font-headline-lg text-[20px] text-on-surface mb-3">Pro Tip</h4>
                <p class="text-on-surface-variant text-[13px] leading-relaxed">
                    Articles published on Tuesdays at 9:00 AM receive 40% more engagement in the 'Aether' ecosystem.
                </p>
            </div>
        </aside>
        <!-- Main Content: List View -->
        <div class="lg:col-span-9">
            <!-- Tabs -->
            <div class="flex items-center justify-between border-b border-white/10 mb-8">
                <div class="flex gap-8">
                    @foreach ($status_options as $status_option)
                        <a href="{{ route('dashboard.posts.index', ['status' => $status_option['value']]) }}"
                            class="{{ $status_option['value'] == $current_status ? 'text-secondary border-b-2 border-secondary' : 'text-outline hover:text-on-surface hover:cursor-pointer transition-colors' }} pb-4 font-label-sm">{{ $status_option['name'] }}
                            {{ $status_option['count'] }}</a>
                    @endforeach
                    <!-- <a class="pb-4 text-outline hover:text-on-surface font-label-sm text-outline hover:text-on-surface transition-colors">Drafts (12)</a> -->
                    <!-- <a class="pb-4 text-outline hover:text-on-surface font-label-sm transition-colors">Scheduled (3)</button> -->
                    <!-- <a class="pb-4 text-outline hover:text-on-surface font-label-sm transition-colors">Archived</a> -->
                </div>
                <div class="flex gap-4 pb-3">
                    <button
                        class="material-symbols-outlined text-outline hover:text-on-surface transition-colors">filter_list</button>
                    <button
                        class="material-symbols-outlined text-outline hover:text-on-surface transition-colors">sort</button>
                </div>
            </div>
            <!-- Bulk Actions Bar -->
            <div class="glass-card p-4 rounded-xl mb-6 flex items-center justify-between bg-white/5">
                <div class="flex items-center gap-4">
                    <input class="rounded border-white/20 bg-white/5 text-primary focus:ring-0 h-4 w-4" type="checkbox">
                    <span class="text-label-sm text-outline">2 posts selected</span>
                </div>
                <div class="flex gap-6">
                    <button
                        class="text-label-sm text-outline hover:text-on-surface transition-colors">Unpublish</button>
                    <button class="text-label-sm text-error/80 hover:text-error transition-colors">Delete</button>
                </div>
            </div>
            <!-- List Content -->
            <div class="space-y-4">
                <!-- List Item 1 -->
                @foreach ($posts as $post)
                    <div class="glass-card p-6 rounded-xl flex items-center gap-6 group hover:bg-white/[0.03]">
                        <input class="rounded border-white/20 bg-white/5 text-primary h-4 w-4 focus:ring-0" type="checkbox">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span
                                    class="text-secondary text-[10px] font-bold uppercase tracking-widest">Editorial</span>
                                <span class="text-outline text-[10px]">•</span>
                                <span class="text-outline text-[10px] uppercase tracking-widest">8 min read</span>
                            </div>
                            <h3
                                class="text-[18px] font-headline-lg text-on-surface group-hover:text-primary transition-colors">
                                {{ $post->title }}
                            </h3>
                            <p class="text-outline text-label-sm mt-1">{{ $post->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="flex items-center gap-8">
                            <div class="text-right">
                                <p class="text-[10px] uppercase tracking-widest text-outline mb-1">Engagement</p>
                                <div class="flex items-center gap-4 justify-end">
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px] text-outline">visibility</span>
                                        <span class="text-label-sm">{{ $post->views }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px] text-outline">chat_bubble</span>
                                        <span class="text-label-sm">84</span>
                                    </div>
                                </div>
                            </div>
                            <div @php $status = $post->status @endphp
                                class="bg-{{ $status->color() }}/10 px-3 py-1.5 rounded-full border border-{{$status->color()}}/20 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-{{ $status->color() }}"></span>
                                <span
                                    class="text-[10px] font-bold text-{{ $status->color() }} uppercase">{{ ucfirst($status->value) }}</span>

                            </div>
                        </div>
                        <div class="flex items-center gap-2 ml-4 ">
                            @if ($status == App\Enums\PostStatus::deleted)
                                <form id="restoreForm-{{ $post->id }}"
                                    action="{{ route('dashboard.posts.restore', $post->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                </form>
                                <button
                                    onclick="confirm('Are you sure you want to restore this post?')? document.getElementById('restoreForm-{{ $post->id }}').submit() : ''"
                                    class="p-2 rounded-lg hover:bg-white/10 text-outline hover:text-on-surface transition-all flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">restore</span>
                                </button>
                                <form id="forceDeleteForm-{{ $post->id }}"
                                    action="{{ route('dashboard.posts.force-delete', $post->id) }}" method="post">
                                    @csrf
                                    @method('Delete')
                                </form>
                                <button
                                    onclick="confirm('Are you sure you want to permanently delete this post?')? document.getElementById('forceDeleteForm-{{ $post->id }}').submit() : ''"
                                    class="p-2 rounded-lg hover:bg-white/10 text-outline hover:text-on-surface transition-all flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            @else
                                <a href="{{ route('dashboard.posts.edit', $post->id) }}"
                                    class="p-2 rounded-lg hover:bg-white/10 text-outline hover:text-on-surface transition-all flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </a>
                                @if ($status == App\Enums\PostStatus::draft)
                                    <form id="publishForm-{{ $post->id }}"
                                        action="{{ route('dashboard.posts.publish', $post->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                    </form>
                                    <button
                                        onclick="confirm('Are you sure you want to publish this post?')? document.getElementById('publishForm-{{ $post->id }}').submit() : ''"
                                        class="p-2 rounded-lg hover:bg-white/10 text-outline hover:text-on-surface transition-all flex items-center justify-center">
                                        <span class="material-symbols-outlined text-[20px]">publish</span>
                                    </button>
                                @endif
                                @if($status == App\Enums\PostStatus::archived)
                                    <form id="unarchiveForm-{{ $post->id }}"
                                        action="{{ route('dashboard.posts.unarchive', $post->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                    </form>
                                    <button
                                        onclick="confirm('Are you sure you want to restore this post?')? document.getElementById('unarchiveForm-{{ $post->id }}').submit() : ''"
                                        class="p-2 rounded-lg hover:bg-white/10 text-outline hover:text-on-surface transition-all flex items-center justify-center">
                                        <span class="material-symbols-outlined text-[20px]">unarchive</span>
                                    </button>
                                @else
                                    <form id="archiveForm-{{ $post->id }}"
                                        action="{{ route('dashboard.posts.archive', $post->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                    </form>
                                    <button
                                        onclick="confirm('Are you sure you want to archive this post?')? document.getElementById('archiveForm-{{ $post->id }}').submit() : ''"
                                        class="p-2 rounded-lg hover:bg-white/10 text-outline hover:text-on-surface transition-all flex items-center justify-center">
                                        <span class="material-symbols-outlined text-[20px]">archive</span>
                                    </button>
                                @endif
                                <form id="deleteForm-{{ $post->id }}" action="{{ route('dashboard.posts.destroy', $post->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button confirm="Are you sure you want to delete this post?"
                                    onclick="confirm('Are you sure you want to delete this post?')? document.getElementById('deleteForm-{{ $post->id }}').submit() : ''"
                                    class="p-2 rounded-lg hover:bg-white/10 text-outline hover:text-on-surface transition-all flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{ $posts->withQueryString()->links() }}
            <!-- <div class="mt-12 flex flex-col md:flex-row justify-between items-center gap-gutter">
                <p class="text-label-sm text-outline">Showing 1 to 10 of 42 posts</p>
                <div class="flex gap-2">
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 hover:border-white/20 text-outline">
                        <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary-container text-on-primary-container font-bold text-label-sm">1</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 hover:border-white/20 text-outline text-label-sm">2</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 hover:border-white/20 text-outline text-label-sm">3</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 hover:border-white/20 text-outline">
                        <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                    </button>
                </div>
            </div> -->
        </div>
    </div>

    <!-- FAB: Global action -->
    <button
        class="fixed bottom-10 right-10 h-16 w-16 bg-primary-container text-on-primary-container rounded-full shadow-[0_0_20px_rgba(77,142,255,0.4)] flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50">
        <span class="material-symbols-outlined font-bold text-[32px]">add</span>
    </button>
</x-layouts.main>
