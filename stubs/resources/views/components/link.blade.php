@props(['route' => null, 'label' => null, 'modal' => null, 'slideover' => null])

<Link href="{{ $route }}" {{ !is_null($modal) ? 'modal' : '' }} {{ !is_null($slideover) ? 'slideover' : '' }} 
    class="py-1.5 px-3 inline-flex justify-center items-center gap-1 rounded border font-medium bg-white text-stone-700 align-middle hover:bg-stone-50 transition-all text-sm dark:bg-stone-800 dark:hover:bg-stone-700 dark:border-stone-800 dark:text-stone-300 shadow-sm">
    {!! $label !!}
    {{ $slot }}
</Link>