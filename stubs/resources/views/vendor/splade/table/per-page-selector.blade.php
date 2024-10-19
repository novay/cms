<select name="per_page" class="block bg-stone-100 focus:ring-{{ config('boilerplate.color.label') }}-500 focus:border-{{ config('boilerplate.color.label') }}-500 min-w-max text-sm border-stone-200 dark:text-white dark:bg-stone-800 dark:border-stone-800 rounded py-1.5 pl-2 pr-7"
    @change="table.updateQuery('perPage', $event.target.value)"
>
    @foreach($table->allPerPageOptions() as $perPage)
        <option value="{{ $perPage }}" @selected($perPage === $table->perPage())>
            {{ $perPage }} {{ __('per page') }}
        </option>
    @endforeach
</select>