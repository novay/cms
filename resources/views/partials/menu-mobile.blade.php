<Sheet v-if="@js(auth()->check())">
    <div class="w-full flex lg:hidden items-center gap-1 border-b border-accent fixed bg-white z-10">
        <SheetTrigger as-child>
            <Button variant="ghost" size="icon" class="shrink-0 md:hidden my-1 ms-2.5 me-1">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <span class="sr-only">Toggle navigation menu</span>
            </Button>
        </SheetTrigger>
        <div class="w-full flex items-center justify-start gap-1.5">
            <div class="flex gap-2 items-center my-2">
                <img src="{{ asset('assets/images/epanel.png') }}" alt="Logo" class="h-8 w-auto my-1">
            </div>
        </div>
    </div>
    <SheetContent side="left" class="p-0">
        @include('cms::partials.menu')
    </SheetContent>
</Sheet>