<div class="p-3">
    <div class="border rounded border-dashed p-20">
        <div class="text-center space-y-2">
            <Icon icon="line-md:compass-off" class="w-32 h-32 text-gray-300 mx-auto" />
            @isset($subtitle)
                <div class="flex flex-col space-y-1">
                    <h3 class="text-xl font-semibold text-gray-500">
                        {!! $title !!}
                    </h3>
                    <p class="text-gray-400">
                        {!! $subtitle !!}
                    </p>
                </div>
            @else
                <p class="text-gray-400">
                    {!! $title !!}
                </p>
            @endisset
            {{ $slot }}
        </div>
    </div>
</div>