@props(['as' => 'Link'])

<{{ $as }} {{ $attributes->class('block px-4 py-2 text-sm leading-5 text-stone-700 dark:text-stone-300 hover:bg-stone-100 dark:hover:bg-stone-800 focus:outline-none focus:bg-stone-100 dark:focus:bg-stone-800 transition duration-150 ease-in-out') }}>{{ $slot }}</{{ $as }}>
