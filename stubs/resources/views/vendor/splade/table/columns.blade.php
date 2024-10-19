<x-splade-component is="button-with-dropdown" dusk="columns-dropdown">
    <x-slot:button>
        <Icon icon="mingcute:eye-2-line"  class="h-5 w-5" :class="{
            'text-stone-400': !table.columnsAreToggled,
            'text-{{ config('boilerplate.color.label') }}-400': table.columnsAreToggled,
        }" /> 
        <span class="hidden sm:inline">{{ __('Show/Hide') }}</span>
    </x-slot:button>

    <div class="px-2 w-min-32">
        <ul class="divide-y divide-stone-100">
            @foreach($table->columns() as $column)
                @if(!$column->canBeHidden)
                    @continue
                @endif

                <li class="py-1 flex items-center justify-between">
                    <div class="w-full py-1 pl-1 pr-3 rounded-md hover:bg-stone-100 dark:hover:bg-stone-700">
                        <div class="flex items-center gap-2 w-auto">
                            <input
                                type="checkbox"
                                id="toggle-column-{{ $column->key }}"
                                class="border-stone-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-stone-800 dark:border-stone-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-stone-800"
                                :class="{
                                    'bg-{{ config('boilerplate.color.label') }}-500': table.columnIsVisible(@js($column->key)),
                                    'bg-stone-200': !table.columnIsVisible(@js($column->key)),
                                }"
                                :aria-checked="table.columnIsVisible(@js($column->key))"
                                aria-labelledby="toggle-column-{{ $column->key }}"
                                aria-describedby="toggle-column-{{ $column->key }}"
                                @click.prevent="table.toggleColumn(@js($column->key))"
                                dusk="toggle-column-{{ $column->key }}"
                            />
                            <label for="toggle-column-{{ $column->key }}">
                                <span class="block text-sm font-medium text-stone-800 dark:text-stone-300">
                                    {{ $column->label }}
                                </span>
                            </label>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-splade-component>