<x-splade-form action="{{ route($prefix.'.store') }}" class="flex flex-col h-[calc(100vh_-_120px)] pb-2" :default="[
    'purpose' => 'login', 
    'login_message' => settings()->group('cms')->get('login_message'), 
    'login_type' => settings()->group('cms')->get('login_type'), 
    'login_color' => settings()->group('cms')->get('login_color') ?? '#000000'
]" stay>
    <ScrollArea class="flex-1 py-6 px-4">
        <div class="space-y-6">
            <x-splade-textarea name="login_message" :label="__('Welcome Message')" data-required help="This message is shown on the sign in screen for the back-end." placeholder="Work is the greatest thing in the world, so we should always save some of it for tomorrow." />
            <div class="grid grid-cols-3 gap-6">
                <x-splade-group name="login_type" label="Background Type" data-required inline>
                    <div class="border rounded py-1 px-2 bg-background">
                        <x-splade-radio name="login_type" value="Color" label="Flat Color" />
                    </div>
                    <div class="border rounded py-1 px-2 bg-background">
                        <x-splade-radio name="login_type" value="Wallpaper" label="Wallpaper" />
                    </div>
                 </x-splade-group>
                 <div class="col-span-2">
                    {{-- Flat --}}
                    <div v-if="form.login_type == 'Color'">
                        <x-splade-input name="login_color" type="color" :label="__('Login Color')" data-required help="This color is shown on the sign in screen." />
                    </div>

                    {{-- Wallpaper --}}
                    <div v-if="form.login_type == 'Wallpaper'">
                        @if(!is_null($login_image))
                            <div class="flex mb-6">
                                <div class="rounded border p-1">
                                    <img src="{{ $login_image }}" alt="" class="h-52 rounded w-fit">
                                </div>
                            </div>
                        @endif
                        <x-splade-file name="login_image" :label="__('Login Image')" data-required help="This image is shown on the sign in screen." :filepond="[
                            'labelIdle' => 'Pilih file ...'
                        ]" credits="false" />
                    </div>
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