@extends('cms::settings.index', ['breadcrumb' => [
    __('Settings') => 'javascript:;', 
    $title => 'javascript:;'
]])

@section('content')
    <ResizablePanelGroup id="content-group-1" direction="horizontal">
        <ResizablePanel id="content-panel-1" :default-size="60" class="overflow-hidden">
            <x-splade-form class="flex flex-col h-[calc(100vh_-_75px)]">
                <ScrollArea class="flex-1">
                    <div class="px-4 bg-yellow-500 text-white text-sm p-3" role="alert" tabindex="-1">
                        Maintenance mode will display the maintenance page to visitors who are not signed in to the back-end area.
                    </div>
                    <div class="p-4 space-y-6">
                        <x-splade-checkbox name="maintenance" value="1">
                            <p class="font-semibold">Enable maintenance mode</p>
                        </x-splade-checkbox>
                        <div v-if="form.maintenance == '1'">
                            <x-splade-textarea name="maintenance_note" :label="__('Maintenance Note')" data-required :placeholder="__('Contoh: Website kami sedang dalam masa perawatan.')" rows="3" autosize />
                        </div>
                    </div>
                </ScrollArea>
                <div class="p-4 flex items-center gap-3">
                    <Button type="submit">Save</Button>
                    <Button variant="ghost">Save & Close</Button>
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