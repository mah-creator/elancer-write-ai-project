@props(['src', 'alt' => '', 'caption' => null])
<div class="relative group">
    <div class="aspect-video w-full rounded-xl overflow-hidden glass-card">
        <img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500" alt="{{ $alt }}" src="{{ $src }}" />
    </div>
    <div class="absolute inset-0 border border-white/5 rounded-xl pointer-events-none"></div>
    @isset($caption)
    <p class="font-label-sm text-label-sm text-on-surface-variant mt-3 italic text-center">Fig 1.1: The digital sanctuary of the modern creator.</p>
    @endisset
</div>