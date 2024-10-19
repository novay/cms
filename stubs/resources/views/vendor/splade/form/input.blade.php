@php $flatpickrOptions = $flatpickrOptions() @endphp

<SpladeInput
    {{ $attributes->only(['v-if', 'v-show', 'v-for', 'class'])->class(['hidden' => $isHidden()]) }}
    :flatpickr="@js($flatpickrOptions)"
    :js-flatpickr-options="{!! $jsFlatpickrOptions !!}"
    v-model="{{ $vueModel() }}"
    #default="inputScope"
>
    <div class="group">
        <label class="block">
            @includeWhen($label, 'splade::form.label', ['label' => $label])

            <div class="w-full cursor-text">
                <div class="relative mb-1">
                    <div class="absolute inset-x-0 bottom-0 h-0.5 mt-0.5 bg-black dark:bg-stone-400 transform scale-x-0 transition-transform duration-300 ease-in-out origin-left group-focus-within:scale-x-100"></div>
                    <div class="flex items-center {{ $prepend || $append ? 'py-1.5' : 'py-2' }}">
                        @if($prepend)
                            <div class="me-1">
                                <span :class="{ 'opacity-50': inputScope.disabled && @json(!$alwaysEnablePrepend) }" class="text-black dark:text-stone-200 max-w-max mr-1 w-full leading-4 cursor-text">
                                    {!! $prepend !!}
                                </span>
                            </div>
                        @endif

                        <input {{ $attributes->except(['v-if', 'v-show', 'v-for', 'class'])->class([
                            'bg-transparent border-none text-black dark:text-white placeholder:text-stone-400 dark:placeholder:text-stone-600 text-base px-0 focus:outline-none focus:ring-0 flex-1 leading-5 caret-black dark:caret-white focus:outline-none focus:ring-0 disabled:cursor-not-allowed', 
                            'rounded-none' => !$append && !$prepend,
                            'min-w-0 flex-1 rounded-none' => $append || $prepend,
                            'rounded-l-none' => $append && !$prepend,
                            'rounded-r-none' => !$append && $prepend,
                        ])->merge([
                            'name' => $name,
                            'type' => $type,
                            'data-validation-key' => $validationKey(),
                        ])->when(!$flatpickrOptions, fn($attributes) => $attributes->merge([
                            'v-model' => $vueModel(),
                        ])) }}
                        />

                        @if($append)
                            <div class="ml-1">
                                <span :class="{ 'opacity-50': inputScope.disabled && @json(!$alwaysEnableAppend) }" class="text-black dark:text-stone-200 font-normal text-base leading-4 m-0">
                                    {!! $append !!}
                                </span>
                            </div>
                        @endif
                    </div>
                    <Separator class="dark:bg-stone-600" />
                </div>
            </div>
        </label>

        @include('splade::form.help', ['help' => $help])
        @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
    </div>
</SpladeInput>