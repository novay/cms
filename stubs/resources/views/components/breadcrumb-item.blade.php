@props(['href' => null])

@if(!is_null($href))
    <li>
        <Link href="{{ $href }}" class="flex items-center text-sm text-stone-500 hover:text-blue-600 dark:text-stone-100">
            {{ $slot }}
            <svg class="flex-shrink-0 mx-1 overflow-visible h-2 w-2 text-stone-400 dark:text-stone-300" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </Link>
    </li>
@else
    <li class="text-sm font-medium text-stone-800 truncate dark:text-stone-100" aria-current="page">
        {{ $slot }}
    </li>
@endif