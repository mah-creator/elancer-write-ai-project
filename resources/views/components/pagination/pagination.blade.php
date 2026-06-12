@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <div class="mt-12 flex flex-col md:flex-row justify-between items-center gap-gutter">

            {{-- Showing X to Y --}}
            <p class="text-label-sm text-outline">
                @if ($paginator->firstItem())
                    Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
                @else
                    Showing {{ $paginator->count() }} results
                @endif
            </p>

            <div class="flex gap-2">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <button disabled
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 text-outline opacity-40 cursor-not-allowed">
                        <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                    </button>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 hover:border-white/20 text-outline">
                        <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span
                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 text-outline text-label-sm cursor-default">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <button
                                    class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary-container text-on-primary-container font-bold text-label-sm">
                                    {{ $page }}
                                </button>
                            @else
                                <a href="{{ $url }}"
                                    class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 hover:border-white/20 text-outline text-label-sm">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 hover:border-white/20 text-outline">
                        <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                    </a>
                @else
                    <button disabled
                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/5 text-outline opacity-40 cursor-not-allowed">
                        <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                    </button>
                @endif
            </div>
        </div>
    </nav>
@endif