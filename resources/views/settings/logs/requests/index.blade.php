@extends('cms::settings.logs.theme')
@section('inner-content')
    <div class="flex flex-col h-[calc(100vh_-_125px)]">
        <ScrollArea class="flex-1">
            <div class="m-2 mb-1">
                <div class="py-2 px-2.5 text-stone-100 bg-stone-700 text-sm rounded">
                    This log displays a list of browser requests that may require attention. For example, if a visitor opens a CMS page that cannot be found, a record is created with the status code 404.
                </div>
            </div>
            <x-splade-lazy>
                <x-slot:placeholder>
                    <div class="px-2">
                        <x-cms::skeleton.table />
                    </div>
                </x-slot:placeholder>
                <div class="px-2">
                    <x-splade-table :for="$table" search-debounce="500" striped>
                        @push('button')
                            <x-link label="{{ __('Refresh') }}" route="{{ route($prefix.'.index') }}"></x-link>
                        @endpush
                    </x-splade-table>
                </div>
            </x-splade-lazy>
        </ScrollArea>
    </div>
@endsection