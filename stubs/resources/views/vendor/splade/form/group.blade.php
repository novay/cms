@php
    [$gridClasses, $otherClasses] = collect(explode(' ', $attributes->get('class')))
        ->partition(fn ($class) => Str::startsWith($class, ['gap', 'grid']) || Str::contains($class, [':gap', ':grid']));
@endphp

<div class="space-y-1.5" {{ $attributes->only(['v-if', 'v-show'])->class($otherClasses->all())->merge([
    'data-validation-key' => $validationKey(),
]) }}>
    @includeWhen($label, 'splade::form.label', ['label' => $label])

    <div {{ $attributes->except(['v-if', 'v-show', 'class'])->class([
        'flex flex-wrap gap-1' => $inline && $gridClasses->isEmpty(),
        'space-y-1' => !$inline && $gridClasses->isEmpty(),
    ])->class($gridClasses->all()) }}
    >
      {{ $slot }}
    </div>

    @includeWhen($help, 'splade::form.help', ['help' => $help])
    @includeWhen($showErrors, 'splade::form.error', ['name' => $validationKey()])
</div>