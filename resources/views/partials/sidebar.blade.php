<DefineTemplate>
    @isset($submenu)
        <div class="flex flex-col">
            @foreach($submenu as $i => $menu)
                @if($menu['type'] == 'separator')
                    <p class="px-3 text-xs pt-3 pb-1 text-gray-500">{!! $menu['label'] !!}</p>
                @endif
                @if($menu['type'] == 'menu')
                    <Link href="{{ route($menu['prefix'].'.index') }}" class="flex items-center justify-between gap-1 px-3 py-2 hover:bg-stone-100 dark:hover:bg-stone-900 border-r-2"
                        :class="@js(request()->routeIs($menu['prefix'].'.*') ? 'bg-stone-100 dark:bg-stone-900 border-stone-500 dark:text-white' : 'cursor-pointer border-transparent')"
                    >
                        <span class="text-sm text-stone-700 dark:text-stone-300">{!! $menu['label'] !!}</span>
                        <Icon icon="mingcute:right-line" class="h-4 w-4 mt-0.5 text-stone-500" />
                    </Link>
                @endif
            @endforeach
        </div>
    @endisset
</DefineTemplate>

{{-- Mobile --}}
<div class="flex lg:hidden">
    <Accordion type="single" class="w-full" collapsible>
        <AccordionItem value="single">
            <AccordionTrigger class="absolute right-2 -top-1 focus:no-underline">
                <span class="text-sm text-foreground bg-accent py-0.5 px-1.5 rounded-sm">
                    {{ $section_title }}
                </span>
            </AccordionTrigger>
            <AccordionContent>
                <ReuseTemplate />
            </AccordionContent>
        </AccordionItem>
    </Accordion>
</div>

<ResizablePanelGroup id="list-group-1" direction="horizontal">
    {{-- Desktop --}}
    <ResizablePanel id="list-panel-1" :default-size="15" class="hidden lg:flex flex-col h-screen dark:bg-popover">
        <div class="py-3 px-4 border-b border-[#fbf7fe] dark:border-stone-800">
            <h1 class="text-lg font-bold dark:text-white">
                {{ $section_title }}
            </h1>
        </div>
        <div @preserveScroll('sidebar') class="flex flex-col">
            <ReuseTemplate />
        </div>
    </ResizablePanel>
    <ResizableHandle id="list-handle-1" />
    <ResizablePanel id="list-panel-2" :default-size="85">
        <div class="h-screen overflow-x-hidden overflow-y-scroll">
            <x-breadcrumb>
                <x-breadcrumb-item href="javascript:;">{{ $section_title }}</x-breadcrumb-item>
                @isset($subtitle)
                    <x-breadcrumb-item :href="route($prefix.'.index')">{{ $title }}</x-breadcrumb-item>
                    <x-breadcrumb-item>{{ __($subtitle) }}</x-breadcrumb-item>
                @else 
                    <x-breadcrumb-item>{{ __($title) }}</x-breadcrumb-item>
                @endisset
            </x-breadcrumb>
            @yield('content')
        </div>
    </ResizablePanel>
</ResizablePanelGroup>