@extends('cms::settings.logs.theme')
@section('inner-content')
    <ResizablePanelGroup id="content-group-1" direction="horizontal">
        <ResizablePanel id="content-panel-1" :default-size="60" class="overflow-hidden">
            <x-splade-form action="{{ route('cms::settings.logs.settings.store') }}" class="flex flex-col h-[calc(100vh_-_125px)]" stay :default="[
                'log_requests' => settings()->group('cms')->get('log_requests'), 
                'log_events' => settings()->group('cms')->get('log_events'), 
            ]">
                <ScrollArea class="flex-1">
                    <div class="m-2">
                        <div class="py-2 px-2.5 text-stone-100 bg-stone-700 text-sm rounded">
                            Specify which areas should use logging.
                        </div>
                    </div>
                    <div class="p-4 space-y-6">
                        <div class="flex flex-col space-y-1">
                            <x-splade-checkbox name="log_requests" value="1">
                                <p class="font-semibold">Log Bad Requests</p>
                            </x-splade-checkbox>
                            <p class="text-sm text-stone-500">
                                Browser requests that may require attention, such as 404 errors.
                            </p>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <x-splade-checkbox name="log_events" value="1">
                                <p class="font-semibold">Log System Events</p>
                            </x-splade-checkbox>
                            <p class="text-sm text-stone-500">
                                Store system events in the database in addition to the file-based log.
                            </p>
                        </div>
                    </div>
                </ScrollArea>
                <div class="p-4 flex items-center gap-3">
                    <Button type="submit">Save</Button>
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