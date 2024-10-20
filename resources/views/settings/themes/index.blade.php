@extends('cms::settings.index', ['breadcrumb' => [
    __('Settings') => 'javascript:;', 
    $title => 'javascript:;'
]])

@section('content')
    <ResizablePanelGroup id="content-group-1" direction="horizontal">
        <ResizablePanel id="content-panel-1" :default-size="60" class="overflow-hidden">
            <x-splade-form action="{{ route($prefix.'.store') }}" class="flex flex-col h-[calc(100vh_-_75px)]" :default="[
                'theme' => settings()->group('cms')->get('theme', config('cms.theme')), 
            ]">
                <ScrollArea class="flex-1">
                    <div class="px-4 bg-yellow-500 text-white text-sm p-3" role="alert" tabindex="-1">
                        Theme selector will display the theme selector to visitors who are not signed in to the back-end area.
                    </div>

                    <div class="p-6">
                        <x-splade-group name="theme" label="Theme Selector" inline>
                            @foreach(themes() as $i => $temp)
                                <div class="rounded border p-2">
                                    <x-splade-radio name="theme" value="{{ $i }}">
                                        {{ $temp['name'] }}
                                    </x-splade-radio>
                                </div>
                            @endforeach
                        </x-splade-group>
                    </div>
                </ScrollArea>
                <div class="p-4 flex items-center gap-3">
                    <Button type="submit">Simpan Perubahan</Button>
                    <span class="text-stone-500">or</span>
                    <x-cms::link href="{{ route('cms::settings.index') }}" class="text-base font-medium mt-0.5">
                        Cancel
                    </x-cms::link>
                </div>
            </x-splade-form>
        </ResizablePanel>
        <ResizableHandle id="content-handle-1" />
        <ResizablePanel id="content-panel-2" :default-size="40" class="bg-accent"></ResizablePanel>
    </ResizablePanelGroup>
@endsection