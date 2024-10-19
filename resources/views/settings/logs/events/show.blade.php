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
                        <label>Level</label>
                        <h4 class="text-2xl">{{ $data['level'] }}</h4>
                    </div>
                    <div class="col-span-8 flex flex-col">
                        <label>Date & Time</label>
                        <h4 class="text-2xl">
                            {{ $data['created_at']->toDayDateTimeString() }}
                        </h4>
                    </div>
                </div>
                <Separator />
                <div class="bg-stone-50 space-y-3">
                    <div class="px-3 pt-3">
                        <p><strong>File:</strong> {{ $data['details']['file'] }}</p>
                        <p><strong>Line:</strong> {{ $data['details']['line'] }}</p>
                    </div>
                    <div class="px-3 pb-3 overflow-x-scroll">
                        <h3 class="mb-1"><strong>Stack trace:</strong></h3>
                        <pre class="leading-6 text-sm">{{ $data['details']['trace'] }}</pre>
                    </div>
                </div>
            </x-splade-modal>
        </ScrollArea>
    </div>
@endsection