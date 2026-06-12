<div class="glass-card rounded-2xl p-6 border-white/5 bg-gradient-to-b from-white/5 to-transparent">
    <h3 class="font-headline-lg text-[20px] text-on-surface mb-6 flex items-center gap-2">
        <span class="material-symbols-outlined text-secondary">flash_on</span>
        Trending
    </h3>
    <div class="space-y-6">
        @foreach ($posts as $post)
            <a href="{{ route('posts.show', $post->slug) }}" class="flex gap-4 group cursor-pointer">
                <span class="font-display-lg text-secondary/20 text-[24px] leading-none">{{ $loop->index + 1 }}</span>
                <div class="space-y-1">
                    <h4
                        class="font-label-sm text-label-sm font-bold text-on-surface leading-tight group-hover:text-secondary transition-colors">
                        {{ $post->title }}
                    </h4>
                    <p class="font-label-sm text-[11px] text-on-surface-variant/60">{{ $post->category?->name }} •
                        {{ $post->read_time }} min read
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div>
