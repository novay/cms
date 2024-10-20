<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between px-4 sm:px-0 pb-3">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="relative inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium text-stone-500 bg-white border border-stone-300 cursor-default leading-5 rounded-md">
            {!! __('pagination.previous') !!}
        </span>
    @else
        <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->previousPageUrl()), true)" dusk="pagination-simple-previous" href="{{ $paginationUrl }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium text-stone-700 bg-white border border-stone-300 leading-5 rounded-md hover:text-stone-500 focus:outline-none focus:ring ring-stone-300 focus:border-blue-300 active:bg-stone-100 active:text-stone-700 transition ease-in-out duration-150">
            {!! __('pagination.previous') !!}
        </a>
    @endif

    @includeWhen($hasPerPageOptions ?? true, 'splade::table.per-page-selector')

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->nextPageUrl()), true)" dusk="pagination-simple-next" href="{{ $paginationUrl }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium text-stone-700 bg-white border border-stone-300 leading-5 rounded-md hover:text-stone-500 focus:outline-none focus:ring ring-stone-300 focus:border-blue-300 active:bg-stone-100 active:text-stone-700 transition ease-in-out duration-150">
            {!! __('pagination.next') !!}
        </a>
    @else
        <span class="relative inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium text-stone-500 bg-white border border-stone-300 cursor-default leading-5 rounded-md">
            {!! __('pagination.next') !!}
        </span>
    @endif
</nav>
