<CommandItem value="{{ $item['title'] }}" class="flex flex-col justify-start px-2.5 pt-1.5 pb-2.5 text-sm font-medium tracking-tight text-foreground hover:bg-stone-100 dark:hover:bg-secondary cursor-pointer rounded-md mb-0.5
    {{ !empty($item['route']) && $item['route'] == request()->route()->getName() ? 'bg-secondary' : '' }}
" 
    @click="() => { $splade.visit('{{ !empty($item['route']) ? route($item['route']) : '' }}') }"
>
    <div class="w-full flex justify-between gap-2 font-medium">
        <span>{{ $item['title'] }}</span>
        {{-- <span>0</span> --}}
    </div>
    <span class="w-full flex justify-start text-xs text-stone-500 leading-4 line-clamp-2">
        {{ $item['description'] }}
    </span>
</CommandItem>