<div class="animate-pulse">
    <div class="grid grid-cols-4 gap-6">
        @foreach(range(1, 8) as $i)
            <div class="flex flex-col space-y-1">
                <div class="h-40 rounded-lg bg-stone-200 dark:bg-stone-700"></div>
                <div class="py-1.5 flex flex-col space-y-1">
                    <div class="bg-stone-200 dark:bg-stone-700 h-4 rounded"></div>
                    <div class="bg-stone-200 dark:bg-stone-700 h-4 rounded w-2/3"></div>
                    <div class="pt-1">
                        <div class="bg-stone-200 dark:bg-stone-700 h-3 rounded"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>