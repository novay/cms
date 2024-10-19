<span class="block text-xs uppercase font-medium text-stone-500 group-focus-within:text-stone-800 dark:group-focus-within:text-stone-100 dark:text-stone-400 font-sans">
    {!! $label !!}
    @if($attributes->has('required') || $attributes->has('data-required'))
        <span aria-hidden="true" class="text-red-600" title="{{ __('This field is required') }}">*</span>
    @endif
</span>