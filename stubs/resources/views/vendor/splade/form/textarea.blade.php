<SpladeTextarea
    {{ $attributes->only(['v-if', 'v-show', 'class']) }}
    :autosize="@js($attributes->has('autosize') ? (bool) $attributes->get('autosize') : $defaultAutosizeValue)"
    v-model="{{ $vueModel() }}"
>
    <div class="group">
        <label class="block">
            @includeWhen($label, 'splade::form.label', ['label' => $label])

            <div>
                <div class="w-full cursor-text {{ $attributes->has('background') ? $attributes->get('background') : '' }}">
                    <div class="relative mb-1">
                        <div class="absolute inset-x-0 bottom-0 h-0.5 mt-0.5 bg-black dark:bg-stone-400 transform scale-x-0 transition-transform duration-300 ease-in-out origin-left group-focus-within:scale-x-100
                            @if(!$validationKey())
                                bg-red-600
                            @endif
                        "></div>
                        <div class="flex items-center py-2">
                            <textarea {{ $attributes->except(['v-if', 'v-show', 'class', 'autosize'])->class([
                                'bg-transparent border-none text-black dark:text-white placeholder:text-stone-400 dark:placeholder:text-stone-600 text-base focus:outline-none focus:ring-0 flex-1 leading-5 caret-black dark:caret-white focus:outline-none focus:ring-0 disabled:cursor-not-allowed'
                            ])->merge([
                                'name' => $name,
                                'v-model' => $vueModel(),
                                'data-validation-key' => $validationKey(),
                            ]) }}></textarea>
                        </div>
                        <Separator class="dark:bg-stone-600" />
                    </div>
                </div>
            </div>
        </label>

        @includeWhen($help, 'splade::form.help', ['help' => $help])
        @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
    </div>
</SpladeTextarea>
