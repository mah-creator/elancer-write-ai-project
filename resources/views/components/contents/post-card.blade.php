<article class="glass-card rounded-2xl overflow-hidden group hover:-translate-y-1 transition-all duration-300 relative">

    <!-- 1. The main card link. It spreads implicitly over the relative parent -->
    <a href="{{ route('posts.show', $post->slug) }}" class="absolute inset-0 z-10 cursor-pointer"
        aria-label="Read post: {{ $post->title }}"></a>

    <!-- 2. The structural grid layout -->
    <div class="relative grid grid-cols-1 md:grid-cols-12">

        <!-- Thumbnail Section -->
        <div class="md:col-span-5 h-64 md:h-auto relative overflow-hidden">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                src="{{ $post->thumbnailUrl }}" alt="" />
            <div class="absolute top-4 left-4">
                <span
                    class="bg-surface-dim/80 backdrop-blur-md text-secondary px-3 py-1 rounded-full font-label-sm text-[11px] border border-white/10 uppercase tracking-widest">
                    {{ $post->category?->name }}
                </span>
            </div>
        </div>

        <!-- Text & Metadata Section -->
        <div class="md:col-span-7 p-8 flex flex-col justify-between">
            <div class="space-y-4">
                <div class="flex items-center gap-2 text-on-surface-variant/60 font-label-sm text-[12px]">
                    <span>{{ $post->publish_time->format('M d Y') }}</span>
                    <span>•</span>
                    <span>{{ $post->read_time }} min read</span>
                </div>
                <!-- Title gets a color change on group hover -->
                <h3
                    class="font-headline-lg text-[24px] leading-tight text-on-surface group-hover:text-secondary transition-colors">
                    {{ $post->title }}
                </h3>
                <p class="text-on-surface-variant font-body-md line-clamp-3">
                    {{ $post->excerpt }}
                </p>
            </div>

            <!-- 3. Excluded Action Bar: Elevated using relative z-20 -->
            <div class="relative z-20 flex items-center justify-between pt-6 mt-6 border-t border-white/5">

                <!-- Author Info Link Wrapper -->
                <a href="/author/{{ $post->user->id }}"
                    class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                    <div
                        class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-[12px] font-bold text-on-primary-container ring-1 ring-white/10">
                        @isset($post->user->avatarUrl)
                            <img class="w-full h-full object-cover rounded-full" alt="{{ $post->user->name }}"
                                src="{{ $post->user->avatarUrl }}" />
                        @else
                            {{ strtoupper(substr($post->user->name, 0, 1)) . strtoupper(substr(strrchr($post->user->name, ' '), 1, 1)) }}
                        @endisset
                    </div>
                    <span class="font-label-sm text-label-sm text-on-surface">{{ $post->user->name }}</span>
                </a>

                <!-- Interaction Buttons -->
                <div class="flex items-center gap-4">
                    <button onclick="alert('Bookmarked!')"
                        class="material-symbols-outlined text-on-surface-variant hover:text-secondary transition-colors cursor-pointer">bookmark</button>
                    <button onclick="alert('Shared!')"
                        class="material-symbols-outlined text-on-surface-variant hover:text-secondary transition-colors cursor-pointer">share</button>
                </div>

            </div>
        </div>
    </div>
</article>