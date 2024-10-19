<x-splade-data remember="cms-menu" local-storage>
    <TooltipProvider :delay-duration="0">
        {{-- @include('cms::partials.menu-mobile') --}}
        @include('cms::partials.menu-window')
        <Separator />
        <div class="overflow-y-scroll">
            {{ $slot }}
        </div>
    </TooltipProvider>
</x-splade-data>