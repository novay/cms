@extends('cms::settings.theme', ['breadcrumb' => [
    __('Settings') => 'javascript:;', 
    $title => 'javascript:;'
]])

@section('content')
    <div class="pt-3 border-b border-gray-200 dark:border-neutral-700">
        <nav class="flex ps-4" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
            <Link href="{{ route('cms::settings.logs.events.index') }}" class="{{ request()->routeIs('cms::settings.logs.events.*') ? 'bg-white border-b-transparent text-foreground dark:bg-neutral-800 dark:border-b-gray-800 dark:text-white active' : 'bg-gray-100 text-gray-400 focus:outline-none focus:text-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200' }} -mb-px py-2.5 px-4 inline-flex items-center gap-x-1 text-sm font-medium text-center border border-e-0">
                <Icon icon="mingcute:list-check-3-line" class="w-4 h-4" />
                <h4>Event Logs</h4>
            </Link>
            <Link href="{{ route('cms::settings.logs.requests.index') }}" class="{{ request()->routeIs('cms::settings.logs.requests.*') ? 'bg-white border-b-transparent text-foreground dark:bg-neutral-800 dark:border-b-gray-800 dark:text-white active' : 'bg-gray-100 text-gray-400 focus:outline-none focus:text-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200' }} -mb-px py-2.5 px-4 inline-flex items-center gap-x-1 text-sm font-medium text-center border border-e-0">
                <Icon icon="mingcute:file-line" class="w-4 h-4" />
                <h4>Request Logs</h4>
            </Link>
            <Link href="{{ route('cms::settings.logs.access.index') }}" class="{{ request()->routeIs('cms::settings.logs.access.*') ? 'bg-white border-b-transparent text-foreground dark:bg-neutral-800 dark:border-b-gray-800 dark:text-white active' : 'bg-gray-100 text-gray-400 focus:outline-none focus:text-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200' }} -mb-px py-2.5 px-4 inline-flex items-center gap-x-1 text-sm font-medium text-center border border-e-0">
                <Icon icon="mingcute:file-locked-line" class="w-4 h-4" />
                <h4>Access Logs</h4>
            </Link>
            <Link href="{{ route('cms::settings.logs.settings.index') }}" class="{{ request()->routeIs('cms::settings.logs.settings.*') ? 'bg-white border-b-transparent text-foreground dark:bg-neutral-800 dark:border-b-gray-800 dark:text-white active' : 'bg-gray-100 text-gray-400 focus:outline-none focus:text-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200' }} -mb-px py-2.5 px-4 inline-flex items-center gap-x-1 text-sm font-medium text-center border">
                <Icon icon="mingcute:calendar-time-add-line" class="w-4 h-4" />
                <h4>Log Settings</h4>
            </Link>
        </nav>
    </div>
    @yield('inner-content')
@endsection