@props(['selectedCategoryId' => null])
<div class="space-y-2 group" x-data="{
        open: false,
        selected: '{{ $selectedCategory['name'] }}',
        selectedId: '{{ $selectedCategory['id'] }}'
    }"
    x-init="$dispatch('category-changed', { id: selectedId, name: selected })">

    <label class="font-label-sm text-label-sm text-on-surface-variant block">Category</label>
    <div class="relative">
        <button type="button" @click="open = !open" class="w-full flex items-center justify-between gap-2 bg-surface-container-low border border-white/5 rounded-lg px-3 py-2.5 text-sm text-on-surface hover:bg-surface-container-high transition-all duration-300 group-hover:border-secondary/20">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary text-[18px]">category</span>
                <span class="font-medium" x-text="selected">Technical Design</span>
            </div>
            <span class="material-symbols-outlined text-on-surface-variant group-hover:text-on-surface transition-colors" :class="{ 'rotate-180': open }">expand_more</span>
        </button>

        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="absolute top-full left-0 right-0 mt-2 z-50 backdrop-blur-xl bg-surface-container-low/80 rounded-xl border border-white/10 shadow-2xl overflow-hidden" style="display: none;">
            <div class="p-1">
                @foreach ($categories as $category)
                <button type="button"
                    @click="selected = '{{ $category->name }}'; selectedId = '{{ $category->id }}'; open = false; $dispatch('category-changed', { id: '{{ $category->id }}', name: '{{ $category->name }}' })"
                    class="w-full text-left px-3 py-2 rounded-lg text-sm text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-colors">
                    {{ $category->name }}
                </button>
                @endforeach
            </div>
        </div>
    </div>

    <input type="hidden" name="category_id" x-model="selectedId">
</div>