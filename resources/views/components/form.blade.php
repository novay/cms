@extends($extends, ['breadcrumb' => $breadcrumb])
@section('content')
    <x-splade-modal max-width="md" class="!rounded-none !p-2">
        @isset($create)
            <x-splade-form :action="$create" autocomplete="off" class="m-1">
                @isset($form) @include($form) @endisset
                {{ $slot }}
            </x-splade-form>
        @endisset

        @isset($edit)
            <x-splade-form :action="$edit" :default="$default ?? NULL" method="PUT" autocomplete="off" class="m-1">
                @isset($form) @include($form) @endisset
                {{ $slot }}
            </x-splade-form>
        @endisset
    </x-splade-modal>
@endsection