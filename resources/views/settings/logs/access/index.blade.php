@extends('cms::settings.logs.theme')
@section('inner-content')
    <div class="flex flex-col h-[calc(100vh_-_125px)]">
        <ScrollArea class="flex-1">
            <div class="m-2 mb-1">
                <div class="py-2 px-2.5 text-stone-100 bg-stone-700 text-sm rounded">
                    This log displays a list of successful sign in attempts by administrators. Records are kept for a total of 60 days.
                </div>
            </div>
            <x-splade-lazy>
                <x-slot:placeholder>
                    <div class="px-2">
                        <x-cms::skeleton.table />
                    </div>
                </x-slot:placeholder>
                <div class="px-2">
                    <x-splade-table :for="$table" search-debounce="500" striped></x-splade-table>
                </div>
            </x-splade-lazy>
        </ScrollArea>
    </div>
@endsection