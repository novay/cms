<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    @if($favicon = settings()->group('cms')->get('favicon'))
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/'.$favicon) }}">
    @endif

    <link href="https://fonts.cdnfonts.com/css/sf-ui-display" rel="stylesheet">
    @vite(['resources/js/app.js'])
    @spladeHead
    @turnstileScripts()
</head>
<body class="font-sans antialiased dark:bg-background h-screen overflow-hidden">
    @splade
</body>
</html>