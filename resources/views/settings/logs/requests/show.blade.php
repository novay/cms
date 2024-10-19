@extends('cms::settings.logs.theme')
@section('inner-content')
    <div class="flex flex-col h-[calc(100vh_-_125px)]">
        <ScrollArea class="flex-1">
            <div class="p-2">
                <x-link label="{{ __('Kembali') }}" route="{{ route($prefix.'.index') }}"></x-link>
            </div>
            <Separator />
            <x-splade-modal max-width="5xl" class="h-[calc(100vh_-_100px)] overflow-y-scroll">
                <div class="grid grid-cols-10 gap-3 bg-yellow-50 p-4">
                    <div class="flex flex-col">
                        <label>Event ID</label>
                        <h4 class="text-2xl">#{{ $data['id'] }}</h4>
                    </div>
                    <div class="flex flex-col">
                        <label>Status</label>
                        <h4 class="text-2xl">{{ $data['status_code'] }}</h4>
                    </div>
                    <div class="flex flex-col">
                        <label>Counter</label>
                        <h4 class="text-2xl">{{ $data['count'] }}</h4>
                    </div>
                    <div class="flex flex-col">
                        <label>Referers</label>
                        <h4 class="text-2xl">{{ count($data['referer']) }}</h4>
                    </div>
                </div>
                <Separator />
                <div class="p-4">
                    <x-splade-form :default="[
                        'url' => $data['url'], 
                        'referer' => count($data['referer']) > 0 ? $data['referer'] : 'There were no detected referrers to this URL.',
                    ]" class="space-y-6">
                        <x-splade-input name="url" :label="__('URL')" disabled />
        
                        @if(count($data['referer']) > 0)
                            <x-splade-input name="referer" :label="__('Referers')" :options="$data['referer'][0]" disabled />
                        @else 
                            <x-splade-input name="referer" :label="__('Referers')" disabled />
                        @endif
                    </x-splade-form>
                </div>
            </x-splade-modal>
        </ScrollArea>
    </div>
@endsection