<div class="flex justify-between items-center">
    <Menubar class="rounded-none border-b border-none px-2 lg:pe-4 gap-x-0.5">
        <MenubarMenu>
            <MenubarTrigger class="relative py-1 px-1.5">
                @if($logo = settings()->group('cms')->get('logo'))
                    <img src="{{ asset('storage/'.$logo) }}" alt="Logo" class="h-5 w-auto dark:hidden block">
                    <img src="{{ asset('storage/'.$logo) }}" alt="Logo" class="h-5 w-auto hidden dark:block">
                @else 
                    <img src="{{ asset('assets/images/epanel.png') }}" alt="Logo" class="h-5 w-auto dark:hidden block">
                    <img src="{{ asset('assets/images/epanel-white.webp') }}" alt="Logo" class="h-5 w-auto hidden dark:block">
                @endif
            </MenubarTrigger>
            <MenubarContent>
                <MenubarItem @click="() => { $splade.modal('{{ route('cms::about') }}') }">
                    About {{ env('APP_NAME') }}
                </MenubarItem>
                <MenubarSeparator />
                <MenubarItem>
                    Hide Sidebar
                </MenubarItem>
                <MenubarItem @click="() => { $splade.visit('{{ route('cms::systems.cache.index') }}') }">
                    Clear Cache
                </MenubarItem>
            </MenubarContent>
        </MenubarMenu>

        <MenubarMenu>
            @php($route = 'cms::index') 
            <MenubarTrigger class="hidden md:flex items-center gap-1 py-1 px-2 text-accent-foreground {{ request()->routeIs($route) ? 'bg-stone-100 dark:bg-stone-900' : 'bg-white dark:bg-stone-950' }}" @click="() => { $splade.visit('{{ route($route) }}') }">
                <Icon icon="mingcute:home-4-line" class="w-5 h-5 opacity-70" />
                {{ __('novay/cms::menu.dashboard') }}
            </MenubarTrigger>
        </MenubarMenu>

        <MenubarMenu v-if="{{ count($mNotifications) }}">
            <MenubarTrigger class="hidden md:flex items-center gap-1 py-1 px-2 text-accent-foreground">
                <Icon icon="mingcute:notification-newdot-line" class="w-4 h-4 opacity-70" />
                {{ __('Notifikasi') }}
            </MenubarTrigger>
            <MenubarContent>
                <x-cms::menu.item :menu="$mNotifications" />
            </MenubarContent>
        </MenubarMenu>

        @if(isset($mContent) && count($mContent))
            <MenubarMenu>
                @php($route = 'cms::content') 
                <MenubarTrigger class="hidden md:flex items-center gap-1 py-1 px-2 text-accent-foreground {{ request()->routeIs("{$route}.*") ? 'bg-stone-100 dark:bg-stone-900' : 'bg-white dark:bg-stone-950' }}" @click="() => { $splade.visit('{{ route("{$route}.index") }}') }">
                    <Icon icon="mingcute:news-2-line" class="w-5 h-5 opacity-70" />
                    {{ __('Content') }}
                </MenubarTrigger>
            </MenubarMenu>
        @endif

        @if(isset($mMedia) && count($mMedia))
            <MenubarMenu>
                <MenubarTrigger class="hidden md:flex items-center gap-1 py-1 px-2 text-accent-foreground {{ request()->routeIs("$route.*") ? 'bg-stone-100 dark:bg-stone-900' : 'bg-white dark:bg-stone-950' }}" @click="() => { $splade.visit('{{ route("$route.index") }}') }">
                    <Icon icon="mingcute:photo-album-2-line" class="w-5 h-5 opacity-70" />
                    {{ __('Media') }}
                </MenubarTrigger>
                <MenubarContent>
                    <x-cms::menu.item :menu="$mMedia" />
                </MenubarContent>
            </MenubarMenu>
        @endif

        @if(isset($mPlugins) && count($mPlugins))
            <MenubarMenu>
                <MenubarTrigger class="hidden md:flex items-center gap-1 py-1 px-2 text-accent-foreground {{ request()->routeIs('cms::plugins.*') ? 'bg-stone-100 dark:bg-stone-900' : 'bg-white dark:bg-stone-950' }}">
                    <Icon icon="mingcute:plugin-line" class="w-5 h-5 opacity-70" />
                    {{ __('Plugins') }}
                </MenubarTrigger>
                <MenubarContent>
                    <x-cms::menu.item :menu="$mPlugins" />
                </MenubarContent>
            </MenubarMenu>
        @endif

        @if(isset($mSettings) && count($mSettings))
            <MenubarMenu>
                @php($route = 'cms::settings') 
                <MenubarTrigger class="hidden md:flex items-center gap-1 py-1 px-2 text-accent-foreground {{ request()->routeIs("{$route}.*") ? 'bg-stone-100 dark:bg-stone-900' : 'bg-white dark:bg-stone-950' }}" @click="() => { $splade.visit('{{ route("{$route}.index") }}') }">
                    <Icon icon="mingcute:settings-3-line" class="w-5 h-5 opacity-70" />
                    {{ __('novay/cms::menu.settings') }}
                </MenubarTrigger>
            </MenubarMenu>
        @endif
    </Menubar>
    <div class="flex items-center gap-0 pe-1.5">
        <Mode />
        <Menubar class="rounded-none border-b border-none gap-x-0.5">
            <MenubarMenu>
                <MenubarTrigger class="relative py-1 px-1.5 flex items-center gap-1.5 text-foreground">
                    <img src="{{ me()->photo_url }}" alt="{{ me()->name }}" class="w-4 h-4 rounded-full">
                    {{ me()->name }}
                </MenubarTrigger>
                <MenubarContent class="border-accent">
                    <MenubarItem @click="() => { $splade.modal('{{ route('cms::systems.profile.index') }}') }" class="font-medium">
                        My Profile
                    </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem @click="() => { $splade.visit('{{ route('logout') }}') }" class="font-medium text-red-600">
                        Sign out
                    </MenubarItem>
                </MenubarContent>
            </MenubarMenu>
        </Menubar>
        <Clock />
    </div>
</div>