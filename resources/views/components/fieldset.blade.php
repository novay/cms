<section class="grid gap-x-8 gap-y-4 sm:grid-cols-3">
    <div class="space-y-1 pt-3 pb-6">
        <h2 class="text-base font-semibold text-zinc-950 dark:text-white tracking-tight">
            {{ isset($label) ? $label : '' }}

            @if (isset($required) && $required)
                <span class="text-red-600">*</span>
            @endif
        </h2>

        @if (isset($sublabel))
            <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-5">
                {{ $sublabel }}
            </p>
        @endif
    </div>

    {{ $slot }}
</section>

@if (isset($separator) && $separator)
    <Separator class="bg-zinc-950/5 dark:bg-white/5" />
@endif