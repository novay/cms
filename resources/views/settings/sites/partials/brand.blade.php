<x-splade-form action="{{ route($prefix.'.store') }}" class="flex flex-col h-[calc(100vh_-_120px)] pb-2" :default="[
    'purpose' => 'brand'
]">
    <ScrollArea class="flex-1 py-6 px-4">
        <div class="space-y-6">
            <div class="grid grid-cols-2 gap-3">
                <div class="flex flex-col text-start">
                    @if(!is_null($logo))
                        <div class="flex mb-6">
                            <div class="rounded border p-2">
                                <img src="{{ $logo }}" alt="" class="h-20 rounded w-fit">
                            </div>
                        </div>
                    @endif
                    <x-splade-file name="logo" :label="__('Logo')" help="Upload a custom logo to use in the back-end." :filepond="[
                        'labelIdle' => 'Pilih file ...'
                    ]" credits="false" />
                </div>
                <div class="flex flex-col text-start">
                    @if(!is_null($favicon))
                        <div class="flex mb-6">
                            <div class="rounded border p-2">
                                <img src="{{ $favicon }}" alt="" class="h-20 rounded w-fit">
                            </div>
                        </div>
                    @endif
                    <x-splade-file name="favicon" :label="__('Favicon')" help="Upload a custom favicon to use in the back-end" :filepond="[
                        'labelIdle' => 'Pilih file ...'
                    ]" credits="false" />
                </div>
            </div>
        </div>
    </ScrollArea>

    <div class="p-4 flex items-center gap-3">
        <Button>Save</Button>
        <Button type="reset" variant="ghost">Reset</Button>
        <span class="text-stone-500">or</span>
        <x-cms::link href="{{ route('cms::settings.index') }}" class="text-base font-medium mt-0.5">
            Cancel
        </x-cms::link>
    </div>
</x-splade-form>