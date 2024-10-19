<div class="flex gap-1 py-2">
    @stack('button')

    @if($table->hasExports() || $table->hasBulkActions())
        <div v-if="table.hasSelectedItems || @js($table->hasExports())">
            <div class="inline-flex rounded-md shadow-sm">
                @include('splade::table.bulk-actions-exports')
            </div>
        </div>
    @endif
    
    @if($table->searchInputs('global'))
        <div class="flex-auto">
            @include('splade::table.global-search')
        </div>
    @endif

    @if($table->hasToggleableColumns() || $table->hasToggleableSearchInputs() || $table->hasFilters() || $table->hasToggleableColumns())
        <div class="inline-flex rounded-md shadow-sm gap-1">
            @if($table->hasToggleableColumns() && $canResetTable())
                <button
                    v-show="@js($canResetTable()) || table.columnsAreToggled || table.hasForcedVisibleSearchInputs"
                    type="button"
                    class="py-1.5 px-3 inline-flex justify-center items-center gap-1.5 rounded border font-medium bg-white text-stone-700 align-middle hover:bg-stone-50 focus:z-10 focus:bg-stone-50 transition-all text-sm dark:bg-stone-800 dark:hover:bg-stone-800 dark:border-stone-700 dark:text-stone-400"
                    @click.prevent="table.reset"
                    dusk="reset-table"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-stone-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="hidden sm:inline">{{ __('Reset') }}</span>
                </button>
            @endif
            @if($table->hasToggleableSearchInputs())
                @include('splade::table.add-search-row')
            @endif
            @if($table->hasFilters())
                @include('splade::table.filters')
            @endif
            @if($table->hasToggleableColumns())
                @include('splade::table.columns')
            @endif
        </div>
    @endif
</div>