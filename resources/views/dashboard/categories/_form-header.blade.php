<!-- change form header according to the rendered page (edit or create) -->

<header class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
    <div>
        <div class="flex items-center gap-2 mb-2 text-primary">
            <span class="material-symbols-outlined text-[18px]">{{ $isEdit ? 'update' : 'add_circle' }}</span>
            <span class="font-label-sm text-label-sm uppercase tracking-widest">{{ $isEdit ? 'Existing Entry' : 'New Entry' }}</span>
        </div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface">{{ $isEdit ? 'Update Category' : 'Create New Category' }}</h1>
        @if (!$isEdit)
        <p class="text-on-surface-variant mt-2 max-w-lg">Define a new conceptual space for your creative projects. Categories help organize content and assets within the Aether ecosystem.</p>
        @endif
    </div>
    <a href="{{ route('dashboard.categories.index') }}" class="group flex items-center gap-2 text-on-surface-variant hover:text-on-surface transition-colors font-label-sm text-label-sm" type="button">
        <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">arrow_back</span>
        Discard Draft
    </a>
</header>