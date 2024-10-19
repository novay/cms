@seoTitle('Dashboard')
<x-cms-layout>
    <div class="py-6 px-8 bg-accent h-screen">
        <div class="flex-1 space-y-4">
            <div class="flex items-center justify-between space-y-2">
                <h2 class="text-3xl font-bold tracking-tight"> Dashboard </h2>
                
                <div class="flex items-center space-x-2">
                    <div class="grid gap-2">
                        <button class="inline-flex items-center whitespace-nowrap rounded-md text-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2 w-[300px] justify-start text-left font-normal" id="date" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="" data-state="closed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-icon mr-2 h-4 w-4">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>Jan 20, 2023 - Feb 9, 2023 
                        </button>
                    </div>
                    <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground shadow hover:bg-primary/90 h-9 px-4 py-2">Download</button>
                </div>
            </div>
            <div dir="ltr" data-orientation="horizontal" class="space-y-4">
                <div role="tablist" aria-orientation="horizontal" tabindex="0" data-orientation="horizontal" dir="ltr" class="inline-flex items-center justify-center rounded-lg bg-muted p-1 text-muted-foreground" style="outline: none;">
                    <button id="radix-vue-tabs-v-263-trigger-overview" role="tab" type="button" aria-selected="true" aria-controls="radix-vue-tabs-v-263-content-overview" data-state="active" data-orientation="horizontal" tabindex="-1" data-active="true" class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow" data-radix-vue-collection-item="">
                        <span class="truncate"> Overview </span>
                    </button>
                    <button id="radix-vue-tabs-v-263-trigger-analytics" role="tab" type="button" aria-selected="false" aria-controls="radix-vue-tabs-v-263-content-analytics" data-state="inactive" disabled="" data-disabled="" data-orientation="horizontal" tabindex="-1" data-active="false" class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow" data-radix-vue-collection-item="">
                        <span class="truncate"> Analytics </span>
                    </button>
                    <button id="radix-vue-tabs-v-263-trigger-notifications" role="tab" type="button" aria-selected="false" aria-controls="radix-vue-tabs-v-263-content-notifications" data-state="inactive" disabled="" data-disabled="" data-orientation="horizontal" tabindex="-1" data-active="false" class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow" data-radix-vue-collection-item="">
                        <span class="truncate"> Notifications </span>
                    </button>
                </div>
                <div id="radix-vue-tabs-v-263-content-overview" role="tabpanel" data-state="active" data-orientation="horizontal" aria-labelledby="radix-vue-tabs-v-263-trigger-overview" tabindex="0" class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 space-y-4" style="">
                    <div class="grid grid-cols-12 gap-3">
                        <div class="col-span-7 space-y-3">
                            <Card>
                                <CardHeader class="p-4">
                                    <CardTitle class="text-base">
                                        Welcome
                                    </CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div class="flex gap-3">
                                        <div class="bg-stone-50 p-6">
                                            @if($logo = settings()->group('cms')->get('logo'))
                                                <img src="{{ asset('storage/'.$logo) }}" alt="Logo" class="h-12 w-auto rounded-md dark:hidden block">
                                                <img src="{{ asset('storage/'.$logo) }}" alt="Logo" class="h-12 w-auto rounded-md hidden dark:block">
                                            @else 
                                                <img src="{{ asset('assets/images/epanel.png') }}" alt="Logo" class="h-12 w-auto rounded-md dark:hidden block">
                                                <img src="{{ asset('assets/images/epanel-white.webp') }}" alt="Logo" class="h-12 w-auto rounded-md hidden dark:block">
                                            @endif
                                        </div>
                                        <div class="flex flex-col">
                                            <p class="text-foreground font-semibold mb-1">Welcome to CMS, {{ me()->name }}.</p>
                                            <p class="text-foreground/50">This is the first time you have signed in.</p>
                                            <p class="text-foreground/50">Have a great day!</p>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                            <Card>
                                <CardHeader class="p-4">
                                    <CardTitle class="text-base">
                                        System Status
                                    </CardTitle>
                                </CardHeader>
                                <CardContent class="p-0">
                                    <div class="py-1.5 px-3 flex justify-between items-center">
                                        <div class="flex items-center gap-1 text-lime-600">
                                            <Icon icon="mingcute:check-circle-fill" class="w-5 h-5" />
                                            <span>Software is Up to Date</span>
                                        </div>
                                        {{-- <div>
                                            Update
                                        </div> --}}
                                    </div>
                                    <Separator />

                                    <div class="py-1.5 px-3 flex justify-between items-center">
                                        <div class="flex items-center gap-1 text-yellow-600">
                                            <Icon icon="mingcute:safe-alert-fill" class="w-5 h-5" />
                                            <span>Some Issues Need Attention</span>
                                        </div>
                                        <Link href="" class="text-sm border rounded-full py-0.5 px-2.5 border-yellow-600 text-yellow-600 hover:bg-yellow-600 hover:text-white transition">
                                            View
                                        </Link>
                                    </div>
                                    <Separator />

                                    <div class="py-1.5 px-3 flex justify-between items-center">
                                        <div class="flex items-center gap-1 text-stone-500">
                                            <Icon icon="mingcute:information-fill" class="w-5 h-5" />
                                            <span>System Build</span>
                                        </div>
                                        <Link href="" class="text-sm border rounded-full py-0.5 px-2.5 border-stone-300 text-stone-500 hover:bg-stone-500 hover:text-white transition">
                                            v1.0.0
                                        </Link>
                                    </div>
                                    <Separator />

                                    <div class="py-1.5 px-3 flex justify-between items-center">
                                        <div class="flex items-center gap-1 text-stone-500">
                                            <Icon icon="mingcute:alert-line" class="w-5 h-5" />
                                            <span>Event Log</span>
                                        </div>
                                        <Link href="" class="text-sm border rounded-full py-0.5 px-2.5 border-stone-300 text-stone-500 hover:bg-stone-500 hover:text-white transition">
                                            0
                                        </Link>
                                    </div>
                                    <Separator />

                                    <div class="py-1.5 px-3 flex justify-between items-center">
                                        <div class="flex items-center gap-1 text-stone-500">
                                            <Icon icon="mingcute:file-line" class="w-5 h-5" />
                                            <span>Request Log</span>
                                        </div>
                                        <Link href="" class="text-sm border rounded-full py-0.5 px-2.5 border-stone-300 text-stone-500 hover:bg-stone-500 hover:text-white transition">
                                            0
                                        </Link>
                                    </div>
                                    <Separator />

                                    <div class="py-1.5 px-3 flex justify-between items-center">
                                        <div class="flex items-center gap-1 text-stone-500">
                                            <Icon icon="mingcute:calendar-2-line" class="w-5 h-5" />
                                            <span>Online Since</span>
                                        </div>
                                        <div class="text-sm py-0.5 px-2.5 text-stone-500">
                                            Oktober 1, 2024
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        </div>
                        <div class="col-span-5">
                            <Card>
                                <CardHeader class="py-5">
                                    <CardTitle class="text-base">
                                        Website
                                    </CardTitle>
                                </CardHeader>
                                <CardContent>
                                    @if(empty(shell_exec('composer show nue-template/*-theme')))
                                        <div class="border border-dashed rounded-lg py-10 px-6 text-center">
                                            <Icon icon="line-md:download-off-loop" class="w-28 h-28 mx-auto text-stone-500/20" />
                                            <h1 class="text-lg font-bold mb-1">
                                                Template tidak ditemukan
                                            </h1>
                                            <p class="text-stone-500 mb-6">
                                                Sepertinya belum ada template frontend yang terinstall. 
                                                Silakan install salah satu template dari package <strong>nue-template/*-theme</strong>, contohnya:
                                            </p>
                                            <pre class="font-bold tracking-tight">composer require nue-template/default-theme</pre>
                                        </div>
                                    @endif
                                    {{-- <img src="https://octobercms.test/themes/demo/assets/images/theme-preview.png" alt=""> --}}
                                </CardContent>
                                <CardFooter class="pt-0 pb-4">
                                    @if(empty(shell_exec('composer show nue-template/*-theme')))
                                        <div class="inline-flex items-center">
                                            <span class="size-2 inline-block bg-red-500 rounded-full me-2 dark:bg-neutral-500"></span>
                                            <span class="text-red-600 dark:text-neutral-400">Not installed</span>
                                        </div>
                                    @endif
                                    
                                    {{-- Manage Theme --}}
                                </CardFooter>
                            </Card>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</x-cms-layout>