<x-splade-component is="button-with-dropdown" dusk="filters-dropdown">
    <x-slot:button>
        <Icon icon="mingcute:filter-2-line"  class="h-5 w-5" :class="{
            'text-stone-400': !@js($table->hasFiltersEnabled()),
            'text-{{ config('boilerplate.color.label') }}-400': @js($table->hasFiltersEnabled()),
        }" /> 
        
        <span class="hidden sm:inline">{{ __('Filters') }}</span>
    </x-slot:button>

    <div
      role="menu"
      aria-orientation="horizontal"
      aria-labelledby="filter-menu"
    >
        @foreach($table->filters() as $filter)
            <div>
                <h3 class="text-xs uppercase tracking-wide bg-stone-100 p-3">
                    {{ $filter->label }}
                </h3>

                <div class="p-2">
                    @if($filter->type === 'select')
                        <select
                            name="filter-{{ $filter->key }}"
                            class="block focus:ring-{{ config('boilerplate.color.label') }}-500 focus:border-{{ config('boilerplate.color.label') }}-500 w-full shadow-sm text-sm border-stone-300 rounded-md"
                            @change="table.updateQuery('filter[{{ $filter->key }}]', $event.target.value)"
                        >
                            @foreach($filter->options() as $optionKey => $option)
                                <option @selected($filter->hasValue() && $filter->value == $optionKey) value="{{ $optionKey }}">
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-splade-component>