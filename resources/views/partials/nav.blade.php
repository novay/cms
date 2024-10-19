<ScrollArea>
    <div class="flex flex-col h-screen py-4">
        <div class="flex mb-4">
            @if(request()->routeIs('surat::*'))
                <Link href="{{ route('surat::index') }}">
                    <img class="w-full mx-auto h-auto px-3" src="{{ asset('images/logo.png') }}" alt="">
                </Link>
            @else
                <Link href="{{ route('website::index') }}">
                    <img class="w-full mx-auto h-auto px-3" src="{{ asset('images/logo.png') }}" alt="">
                </Link>
            @endif
        </div>
        <div class="flex-1 items-center px-2 space-y-1">
            <Tooltip>
                <TooltipTrigger class="p-2 rounded-xl" @click.prevent="data.sidebar = 'dashboard'" 
                    :class="data.sidebar == 'dashboard' ? 'bg-sky-100 dark:bg-stone-900 text-sky-800 dark:text-white' : 'hover:bg-stone-100 hover:dark:bg-stone-900 text-stone-500 dark:text-stone-500'">
                    <Link href="/">
                        <Icon icon="tabler:brand-google-home" class="h-8 w-8" />
                        <div class="text-xs">
                            <small><small>Beranda</small></small>
                        </div>
                    </Link>
                </TooltipTrigger>
                <TooltipContent side="right">
                    <p>Dashboard</p>
                </TooltipContent>
            </Tooltip>

            @auth
                <Tooltip>
                    <TooltipTrigger class="p-2 rounded-xl" @click.prevent="data.sidebar = 'settings'" :class="data.sidebar == 'settings' ? 'bg-sky-100 dark:bg-stone-900 text-sky-800 dark:text-white' : 'hover:bg-stone-100 hover:dark:bg-stone-900 text-stone-500 dark:text-stone-500'">
                        <Link href="javascript:;">
                            <Icon icon="mingcute:settings-3-line" class="h-8 w-8" />
                            <div class="text-xs -mt-0.5">
                                <small><small>Settings</small></small>
                            </div>
                        </Link>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        <p>{{ __('Settings') }}</p>
                    </TooltipContent>
                </Tooltip>
            @endauth
        </div>
        <div class="px-2.5 space-y-1.5">
            <Tooltip>
                <TooltipTrigger class="hover:bg-stone-100 hover:dark:bg-stone-900 p-1.5 rounded-lg">
                    <Link href="" class="text-stone-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" width="1em" height="1em" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M5.68 7.094A7.965 7.965 0 0 0 4 12c0 1.849.627 3.551 1.68 4.906l2.148-2.149A4.977 4.977 0 0 1 7 12c0-1.02.305-1.967.828-2.757L5.68 7.094ZM4.258 5.67A9.959 9.959 0 0 0 2 12a9.96 9.96 0 0 0 2.258 6.33 1 1 0 0 0 1.412 1.412A9.959 9.959 0 0 0 12 22a9.959 9.959 0 0 0 6.33-2.258 1 1 0 0 0 1.412-1.412A9.959 9.959 0 0 0 22 12a9.959 9.959 0 0 0-2.258-6.33 1 1 0 0 0-1.412-1.412A9.959 9.959 0 0 0 12 2a9.959 9.959 0 0 0-6.33 2.258A1 1 0 0 0 4.258 5.67Zm2.836.01 2.149 2.148A4.977 4.977 0 0 1 12 7c1.02 0 1.967.305 2.757.828l2.149-2.148A7.965 7.965 0 0 0 12 4a7.965 7.965 0 0 0-4.906 1.68ZM18.32 7.094l-2.148 2.149c.523.79.828 1.738.828 2.757 0 1.02-.305 1.967-.828 2.757l2.148 2.149A7.965 7.965 0 0 0 20 12a7.966 7.966 0 0 0-1.68-4.906ZM16.906 18.32l-2.149-2.148A4.977 4.977 0 0 1 12 17a4.977 4.977 0 0 1-2.757-.828L7.094 18.32A7.966 7.966 0 0 0 12 20a7.965 7.965 0 0 0 4.906-1.68ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" clip-rule="evenodd"></path></svg>
                        <div class="text-xs">
                            <small><small>Bantuan</small></small>
                        </div>
                    </Link>
                </TooltipTrigger>
                <TooltipContent side="right">
                    <p>Help</p>
                </TooltipContent>
            </Tooltip>

            @auth
                <div class="separator">
                    <Separator class="my-2 mb-3 border-stone-100" />
                </div>

                <DropdownMenu>
                    <DropdownMenuTrigger as-child class="flex">
                        <Avatar class="h-7 w-7 mx-auto cursor-pointer object-cover">
                            <AvatarImage src="{{ imagekit(me()->pegawai->getFirstMediaUrl('Simpeg'), 50) }}" alt="" />
                            <AvatarFallback>BT</AvatarFallback>
                        </Avatar>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent class="w-56">
                        <DropdownMenuLabel class="flex flex-col">
                            <span class="font-semibold">{{ me()->name }}</span>
                            <span class="font-light text-xs">{{ me()->email }}</span>
                        </DropdownMenuLabel>
                        <DropdownMenuSeparator />
                        <DropdownMenuGroup>
                            <DropdownMenuItem @click="() => { $splade.visit('{{ route('cms::profile.edit') }}') }">
                                <Icon icon="lucide:user" class="mr-2 h-4 w-4" />
                                <span>Profile</span>
                                <DropdownMenuShortcut>⇧⌘P</DropdownMenuShortcut>
                            </DropdownMenuItem>
                            <DropdownMenuItem>
                                <Icon icon="lucide:settings" class="mr-2 h-4 w-4" />
                                <span>Settings</span>
                                <DropdownMenuShortcut>⌘S</DropdownMenuShortcut>
                            </DropdownMenuItem>
                        </DropdownMenuGroup>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem>
                            <Icon icon="lucide:keyboard" class="mr-2 h-4 w-4" />
                            <span>Shortcuts</span>
                            <DropdownMenuShortcut>⌘K</DropdownMenuShortcut>
                        </DropdownMenuItem>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem @click="() => { $splade.modal('{{ route('logout') }}') }">
                            <Link href="">
                            <Icon icon="lucide:log-out" class="mr-2 h-4 w-4" />
                            <span>Log out</span>
                            <DropdownMenuShortcut>⇧⌘Q</DropdownMenuShortcut>
                            </Link>
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            @endauth
        </div>
    </div>
</ScrollArea>