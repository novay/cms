@extends('cms::settings.theme', ['breadcrumb' => [
    __('Settings') => 'javascript:;', 
    $title => 'javascript:;'
]])

@section('content')

    <x-splade-lazy url="{{ route($prefix.'.index') }}?purpose=content">
        <x-slot:placeholder> The items are loading... </x-slot:placeholder>

        <div class="p-6">
            @if(isset($error_message))
                <div class="p-10 rounded-xl border border-dashed text-center">
                    <Icon icon="line-md:compass-off" class="w-40 h-40 mx-auto mb-3 text-stone-300" />
                    <div class="font-bold mb-3">
                        {{ $error_message }}
                    </div>
                    {{-- <div class="alert alert-danger alert-fill alert-border-left" role="alert">
                        Website Anda menjalankan aplikasi yang ilegal.
                    </div> --}}
                </div>
            @else
                <!-- Tampilkan data plugins -->
                <h1>List Plugins</h1>
                <h4>Check Update</h4>
                <p>Silahkan lakukan pembaruan fitur apabila tersedia.</p>
                @if(!empty($plugins))
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th width="1">No</th>
                            <th>Plugins</th>
                            <th>Description</th>
                            <th width="10%" class="text-center">Available</th>
                            <th width="10%" class="text-center">Current</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    @foreach($plugins['plugins'] as $i => $plugin)
                        <tr>
                            <td align="center">{{ ++$i }}</td>
                            <td><b>{{ $plugin['name'] }}</b></td>
                            <td class="text-muted">{{ $plugin['preview'] }}</td>
                            <td align="center">{{ $plugin['version'] }}</td>
                            <td align="center">
                                {{ config($plugin['slug'].'.version') }}
                            </td>
                            <td align="right">
                                @if($plugin['version'] > config($plugin['slug'].'.version'))
                                    <a href="{{ route('epanel.settings.update') }}?plugin={{ $plugin['slug'] }}" class="text-success">
                                        <i class="fa fa-download"></i>
                                        Update Now
                                    </a>
                                @else
                                    <strong class="text-success">
                                        <i class="fa fa-check"></i>
                                        Updated
                                    </strong>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>

                    <ul>
                        @foreach($plugins as $plugin)
                            <li>{{ $plugin['name'] }} - {{ $plugin['version'] }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No plugins available.</p>
                @endif
            @endif
        </div>
    </x-splade-lazy>

@endsection