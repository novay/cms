@php 
    $items = [
        [
            'label' => __('Beranda'),
            'route' => 'cms::index',
            'prefix' => 'cms::index',
            'icon' => 'mingcute:home-4',
            'arrow' => false
        ],
        [
            'label' => __('Konsultasi'),
            'route' => 'cms::feedbacks.index',
            'prefix' => 'cms::feedbacks.*',
            'icon' => 'mingcute:flag-4',
            'arrow' => false, 
            'count' => Novay\CMS\Models\Feedback::whereNull('read_at')->count()
        ],
        [
            'label' => __('Publikasi'),
            'route' => 'cms::content.index',
            'prefix' => 'cms::content.*',
            'icon' => 'mingcute:news-2',
            'arrow' => true
        ],
        [
            'label' => __('Media'),
            'route' => 'cms::media.index',
            'prefix' => 'cms::media.*',
            'icon' => 'mingcute:photo-album-2',
            'arrow' => true
        ],
        [
            'label' => __('Plugins'),
            'route' => 'cms::plugins.index',
            'prefix' => 'cms::plugins.*',
            'icon' => 'mingcute:plugin',
            'arrow' => true
        ],
        [
            'label' => __('Settings'),
            'route' => 'cms::settings.index',
            'prefix' => 'cms::settings.*',
            'icon' => 'mingcute:settings-3',
            'arrow' => true
        ],
    ];
@endphp

<Command class="fixed inset-y-0 left-0 w-56 max-lg:hidden rounded-none bg-transparent">
    <nav class="flex h-full min-h-0 flex-col">
        <div class="flex flex-col py-2 ps-2 pe-1 [&amp;>[data-slot=section]+[data-slot=section]]:mt-2.5">
            <div class="py-1 px-2 flex justify-between gap-1.5 items-center tracking-tighter font-semibold text-stone-600">
                <img src="{{ asset('assets/images/epanel.png') }}" alt="Logo" class="h-8 w-auto">
                <Mode />
            </div>
        </div>
        <Separator />
        <div class="px-1.5 bg-stone-200/50 dark:bg-stone-800/50">
            <div class="relative w-full max-w-sm items-center cursor-pointer rounded-md">
                <CommandInput placeholder="Type to search..." />
                <span class="absolute end-0 inset-y-0 flex items-center justify-center px-2 gap-0.5">
                    <Badge class="rounded px-1.5 text-stone-500/50 bg-stone-100 dark:bg-transparent">
                        ⌘ K
                    </Badge>
                </span>
            </div>
        </div>
        <Separator />
        <div class="flex flex-1 flex-col overflow-y-auto">
            <div data-slot="section" class="flex flex-col gap-0.5 p-1">
                <CommandList class="flex flex-col gap-0.5">
                    <CommandGroup class="relative space-y-0.5">
                        <x-cms::menu label="Home" :item="[
                            'class' => request()->routeIs('cms::index') ? 'shadow-sm text-white bg-stone-800 hover:bg-stone-800 dark:bg-stone-900' : 'bg-transparent text-stone-800 hover:text-stone-700 dark:text-stone-300', 
                            'route' => 'cms::index', 
                            'icon' => 'mingcute:home-4',
                            'icon-variant' => request()->routeIs('cms::index') ? 'fill' : 'line'
                        ]" />


                        <Separator />
                        @foreach($items as $item)
                            @php
                                $isActive = request()->routeIs($item['prefix']);
                                $iconVariant = $isActive ? 'fill' : 'line';
                                $bgClass = $isActive ? 'shadow-sm text-white bg-stone-800 hover:bg-stone-800 dark:bg-stone-900' : 'bg-transparent text-stone-800 hover:text-stone-700 dark:text-stone-300';
                            @endphp
                            <ContextMenu>
                                <ContextMenuTrigger>
                                    <CommandItem value="{{ $item['label'] }}" class="flex justify-between gap-2 px-2 py-1.5 text-base font-square font-medium tracking-tight text-stone-950 hover:bg-stone-200 dark:hover:bg-stone-900 cursor-pointer rounded-md {{ $bgClass }} mb-0.5" 
                                        @click="() => { $splade.visit('{{ route($item['route']) }}') }"
                                    >
                                        <div class="flex items-center gap-1.5">
                                            <Icon icon="{{ $item['icon'] }}-{{ $iconVariant }}" class="w-5 h-5" /> 
                                            <div class="line-clamp-1">{{ $item['label'] }}</div>
                                        </div>
                                        <Icon v-if="@js($item['arrow'])" icon="mingcute:right-fill" class="text-stone-300 dark:text-stone-700" />
                                        @if(isset($item['count']) && $item['count'] > 0)
                                            <span v-if="@js($item['count'] > 0)" class="text-sm">
                                                {{ $item['count'] }}
                                            </span>
                                        @endif
                                    </CommandItem>
                                </ContextMenuTrigger>
                                <ContextMenuContent class="w-52">
                                    <ContextMenuCheckboxItem checked>
                                        Pin Menu
                                    </ContextMenuCheckboxItem>
                                    <ContextMenuSeparator />
                                    <ContextMenuItem inset>
                                        Sunting
                                    </ContextMenuItem>
                                    <ContextMenuItem inset>
                                        Hapus
                                    </ContextMenuItem>
                                </ContextMenuContent>
                            </ContextMenu>
                        @endforeach
                    </CommandGroup>
                </CommandList>
            </div>
            <div aria-hidden="true" class="mt-5 flex-1"></div>
            <div data-slot="section" class="flex flex-col gap-0.5 mx-1">
                <CommandList class="flex flex-col gap-0.5">
                    <CommandGroup class="relative space-y-0.5">
                        <CommandItem value="Support" class="flex justify-between gap-2 px-2 py-1.5 text-base font-square font-medium tracking-tight text-stone-950 hover:bg-stone-200 dark:hover:bg-stone-900 cursor-pointer rounded-md {{ request()->routeIs('cms::support.*') ? 'shadow-sm text-white bg-stone-800 hover:bg-stone-800 dark:bg-stone-900' : 'bg-transparent text-stone-800 hover:text-stone-700 dark:text-stone-300' }}" 
                            @click="() => { $splade.visit('{{ route('cms::support.index') }}') }"
                        >
                            <div class="flex items-center gap-1.5">
                                <Icon icon="mingcute:question-line" class="w-5 h-5" /> 
                                <div class="line-clamp-1">Support</div>
                            </div>
                        </CommandItem>
                        <CommandItem value="Changelog" class="flex justify-between gap-2 px-2 py-1.5 text-base font-square font-medium tracking-tight text-stone-950 hover:bg-stone-200 dark:hover:bg-stone-900 cursor-pointer rounded-md {{ request()->routeIs('cms::changelog.*') ? 'shadow-sm text-white bg-stone-800 hover:bg-stone-800 dark:bg-stone-900' : 'bg-transparent text-stone-800 hover:text-stone-700 dark:text-stone-300' }}" 
                            @click="() => { $splade.visit('{{ route('cms::changelog.index') }}') }"
                        >
                            <div class="flex items-center gap-1.5">
                                <Icon icon="mingcute:git-pull-request-close-line" class="w-5 h-5" /> 
                                <div class="line-clamp-1">Changelog</div>
                            </div>
                        </CommandItem>
                    </CommandGroup>
                </CommandList>
            </div>
        </div>
        <div class="max-lg:hidden flex flex-col pt-0.5 pb-2 px-2">
            <DropdownMenu>
                <DropdownMenuTrigger as-child>
                    <Button variant="outline" class="flex items-center justify-between w-full px-2.5 h-14 hover:bg-stone-50 bg-background">
                        <div class="flex items-center justify-start gap-1.5 py-3">
                            <img src="{{ me()->photo_url }}" class="text-stone-600 h-9 w-auto rounded-full object-cover object-top">
                            <div class="flex flex-col justify-start text-start">
                                <div class="font-medium line-clamp-1 truncate">
                                    {{ me()->name }}
                                </div>
                                <div class="font-normal line-clamp-1 truncate">
                                    {{ me()->email }}
                                </div>
                            </div>
                        </div>
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-50"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.93179 5.43179C4.75605 5.60753 4.75605 5.89245 4.93179 6.06819C5.10753 6.24392 5.39245 6.24392 5.56819 6.06819L7.49999 4.13638L9.43179 6.06819C9.60753 6.24392 9.89245 6.24392 10.0682 6.06819C10.2439 5.89245 10.2439 5.60753 10.0682 5.43179L7.81819 3.18179C7.73379 3.0974 7.61933 3.04999 7.49999 3.04999C7.38064 3.04999 7.26618 3.0974 7.18179 3.18179L4.93179 5.43179ZM10.0682 9.56819C10.2439 9.39245 10.2439 9.10753 10.0682 8.93179C9.89245 8.75606 9.60753 8.75606 9.43179 8.93179L7.49999 10.8636L5.56819 8.93179C5.39245 8.75606 5.10753 8.75606 4.93179 8.93179C4.75605 9.10753 4.75605 9.39245 4.93179 9.56819L7.18179 11.8182C7.35753 11.9939 7.64245 11.9939 7.81819 11.8182L10.0682 9.56819Z" fill="currentColor"></path></svg>
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent class="w-52 shadow-sm dark:border-stone-800">
                    <DropdownMenuGroup>
                        <DropdownMenuItem @click="() => { $splade.modal('{{ route('cms::profile.index') }}') }">
                            <div class="flex items-center gap-1.5">
                                <Icon icon="mingcute:user-4-line" class="text-stone-600 h-5 w-5" />
                                <span class="text-base">Data Diri</span>
                            </div>
                        </DropdownMenuItem>
                        <DropdownMenuItem @click="() => { $splade.modal('{{ route('cms::password.index') }}') }">
                            <div class="flex items-center gap-1.5">
                                <Icon icon="mingcute:safe-lock-line" class="text-stone-600 h-5 w-5" />
                                <span class="text-base">Ubah Sandi</span>
                            </div>
                        </DropdownMenuItem>
                        <DropdownMenuItem>
                            <x-splade-link href="{{ route('logout') }}" method="POST" class="flex items-center gap-1.5">
                                <Icon icon="akar-icons:sign-out" class="text-red-600 h-5 w-5" />
                                <span class="text-base text-red-700">Logout</span>
                            </x-splade-link>
                        </DropdownMenuItem>
                    </DropdownMenuGroup>
                </DropdownMenuContent>
            </DropdownMenu>
            {{-- <span class="relative">
                <button type="button" aria-haspopup="menu" aria-expanded="false" class="cursor-default flex w-full items-center gap-3 rounded-lg px-2 py-2.5 text-left text-base/6 font-medium text-stone-950 sm:py-2 sm:text-sm/5 data-[slot=icon]:*:size-6 data-[slot=icon]:*:shrink-0 data-[slot=icon]:*:fill-stone-500 sm:data-[slot=icon]:*:size-5 data-[slot=icon]:last:*:ml-auto data-[slot=icon]:last:*:size-5 sm:data-[slot=icon]:last:*:size-4 data-[slot=avatar]:*:-m-0.5 data-[slot=avatar]:*:size-7 data-[slot=avatar]:*:[--ring-opacity:10%] sm:data-[slot=avatar]:*:size-6 data-[hover]:bg-stone-950/5 data-[slot=icon]:*:data-[hover]:fill-stone-950 data-[active]:bg-stone-950/5 data-[slot=icon]:*:data-[active]:fill-stone-950 data-[slot=icon]:*:data-[current]:fill-stone-950 dark:text-white dark:data-[slot=icon]:*:fill-stone-400 dark:data-[hover]:bg-white/5 dark:data-[slot=icon]:*:data-[hover]:fill-white dark:data-[active]:bg-white/5 dark:data-[slot=icon]:*:data-[active]:fill-white dark:data-[slot=icon]:*:data-[current]:fill-white">
                    <span class="absolute left-1/2 top-1/2 size-[max(100%,2.75rem)] -translate-x-1/2 -translate-y-1/2 [@media(pointer:fine)]:hidden" aria-hidden="true"></span>
                    <span class="flex min-w-0 items-center gap-2.5">
                        <span data-slot="avatar" class="size-9 inline-grid shrink-0 align-middle [--avatar-radius:50%] [--ring-opacity:20%] *:col-start-1 *:row-start-1 outline outline-1 -outline-offset-1 outline-black/[--ring-opacity] dark:outline-white/[--ring-opacity] rounded-[--avatar-radius] *:rounded-[--avatar-radius]">
                            <img class="size-full" src="{{ me()->photo_url }}" alt="">
                        </span>
                        <span class="min-w-0">
                            <span class="block truncate text-sm font-medium text-stone-950 dark:text-white">
                                {{ me()->name }}
                            </span>
                            <span class="block truncate text-sm font-normal text-stone-500 dark:text-stone-400">
                                {{ me()->email }}
                            </span>
                        </span>
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </span> --}}
        </div>
    </nav>
</Command>