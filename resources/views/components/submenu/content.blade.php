<ol v-if="{{ isset($breadcrumb) }}" class="flex items-center whitespace-nowrap px-2.5 py-1.5" aria-label="Breadcrumb" data-aria-hidden="true" aria-hidden="true">
    @foreach($breadcrumb as $label => $route)
        <li v-if="@js(!$loop->last)">
            <Link href="{{ $route }}" class="flex items-center text-sm text-stone-500 hover:text-blue-600 dark:text-stone-100"> 
                <span v-text="@js($label)"></span>
                <svg class="flex-shrink-0 mx-1 overflow-visible h-2 w-2 text-stone-400 dark:text-stone-300" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                </svg>
            </Link>
        </li>
        <li v-else v-text="@js($label)" class="text-sm font-medium text-stone-800 truncate dark:text-stone-100" aria-current="page"></li>
    @endforeach
</ol>
<Separator/>

<ResizablePanelGroup id="handle-content-group-1" direction="horizontal" class="rounded-none bg-background">
    <ResizablePanel id="handle-content-panel-1" :default-size="20" class="hidden lg:inline">
        <ScrollArea class="relative overflow-y-scroll h-[calc(100vh_-_75px)]">
            <Command>
                <div class="px-1.5">
                    <div class="relative w-full max-w-sm items-center cursor-pointer">
                        <CommandInput placeholder="Type to search..." />
                        <span class="absolute end-0 inset-y-0 flex items-center justify-center px-2 gap-0.5">
                            <Badge class="rounded px-1.5 text-stone-500/50 bg-stone-100 dark:bg-transparent hover:bg-stone-100">
                                ⌘ K
                            </Badge>
                        </span>
                    </div>
                </div>
                <Separator />
                <CommandList class="max-h-full p-0.5">
                    <CommandEmpty>No results found.</CommandEmpty>
                    @foreach($menu as $item)
                        @if($item['type'] == 'separator')
                            <Separator />
                        @endif
                        @if($item['type'] == 'menu')
                            @if(isset($item['submenu']) && is_array($item['submenu']) && count($item['submenu']) > 0)
                                <CommandGroup heading="{{ strtoupper($item['title']) }}">
                                    @foreach($item['submenu'] as $submenuItem)
                                        @include('cms::components.submenu.link', ['item' => $submenuItem ?? []])
                                    @endforeach
                                </CommandGroup>
                            @else 
                                <CommandGroup>
                                    @include('cms::components.submenu.link')
                                </CommandGroup>
                            @endif
                        @endif
                    @endforeach
                </CommandList>
            </Command>
        </ScrollArea>
    </ResizablePanel>
    <ResizableHandle id="handle-content-handle-1" />
    <ResizablePanel id="handle-content-panel-2" :default-size="80">
        <ScrollArea class="overflow-y-scroll">
            @yield('content')
        </ScrollArea>
    </ResizablePanel>
</ResizablePanelGroup>