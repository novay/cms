@props(['href' => '#', 'label' => '', 'active' => false])

<x-splade-link href="{{ $href }}" 
   {{ $attributes->merge(['class' => 'bg-transparent border-none m-0 p-0 cursor-pointer relative inline-block group']) }}
>
    <span class="inline-block dark:text-white">
        {!! $slot->isEmpty() ? $label : $slot !!}
    </span>
    <div class="border-t-2 border-black dark:border-white
        {{ $attributes->has('class') && strpos($attributes->get('class'), 'active') !== false ? 'scale-x-100' : 'scale-x-0' }} 
        origin-left transition-transform duration-150 ease-[cubic-bezier(0.4,0,0.68,0.06)] w-full 
        {{ $attributes->has('class') && strpos($attributes->get('class'), 'active') === false ? 'group-hover:scale-x-100 group-hover:duration-200 group-hover:ease-[cubic-bezier(0.32,0.94,0.6,1)]' : '' }}">
    </div>
</x-splade-link>