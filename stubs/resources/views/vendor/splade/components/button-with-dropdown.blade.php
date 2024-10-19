<x-splade-component is="dropdown" {{ $attributes->class('py-1.5 px-3 inline-flex justify-center items-center gap-1.5 rounded border font-medium bg-white text-stone-700 align-middle hover:bg-stone-50 focus:z-10 focus:bg-stone-50 transition-all text-sm dark:bg-stone-800 dark:hover:bg-stone-700 dark:border-stone-800 dark:text-stone-400') }}>
    <x-slot:trigger>
        {{ $button }}
    </x-slot:trigger>

    <div class="mt-1 min-w-max rounded shadow bg-white dark:bg-stone-800 ring-1 ring-black ring-opacity-5">
        {{ $slot }}
    </div>
</x-splade-component>
