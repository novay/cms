<x-splade-form action="{{ route($prefix.'.store') }}" class="flex flex-col h-[calc(100vh_-_120px)] pb-2" :default="[
    'purpose' => 'general', 
    'name' => settings()->group('cms')->get('name'), 
    'tagline' => settings()->group('cms')->get('tagline'), 
    'locale' => settings()->group('cms')->get('locale'), 
    'timezone' => settings()->group('cms')->get('timezone')
]" stay>
    <ScrollArea class="flex-1 py-6 px-4">
        <div class="space-y-6">
            <div class="grid grid-cols-2 gap-3">
                <x-splade-input name="name" :label="__('App Name')" :placeholder="__('Contoh: bCMS')" data-required help="This name is shown in the title area of the back-end." />
                <x-splade-input name="tagline" :label="__('App Tagline')" :placeholder="__('Contoh: Administration Panel')" data-required help="This name is shown on the sign in screen for the back-end." />
            </div>

            <x-splade-group name="locale" :label="__('Locale')" data-required help="Current default value: <b>en</b>" inline>
                @foreach(config('cms.locales') as $i => $temp)
                    <div class="border rounded py-1 px-2 bg-background">
                        <x-splade-radio name="locale" value="{{ $i }}" label="{{ $temp }}" />
                    </div>
                @endforeach
            </x-splade-group>

            <x-splade-select name="timezone" :label="__('Timezone')" data-required help="Current default value: <b>UTC</b>" choices>
                <option value="">Pilih salah satu</option>
                @foreach(timezones() as $timezone => $label)
                    <option value="{{ $timezone }}">{{ $label }}</option>
                @endforeach
            </x-splade-select>
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