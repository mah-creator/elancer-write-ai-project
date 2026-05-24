@props(['symbol' => 'label', 'text' => 'Label Text'])

<div class="flex items-center gap-1.5 bg-surface-container px-3 py-1 rounded-full">
    <span class="material-symbols-outlined text-[16px]">{{ $symbol }}</span>
    <span>{{ $text }}</span>
</div>