@extends('cms::settings.index', ['breadcrumb' => [
    __('Settings') => 'javascript:;', 
    $title => 'javascript:;'
]])

@section('content')
    <ResizablePanelGroup id="content-group-1" direction="horizontal">
        <ResizablePanel id="content-panel-1" :default-size="70" class="overflow-hidden">
            <Tabs default-value="general">
                <div class="p-2">
                    <TabsList>
                        <TabsTrigger value="general">Backend Settings</TabsTrigger>
                        <TabsTrigger value="brand">Brand</TabsTrigger>
                        <TabsTrigger value="login">Login Page</TabsTrigger>
                    </TabsList>
                </div>
                <TabsContent value="general" class="mt-0">
                    @include('cms::settings.sites.partials.general')
                </TabsContent>
                <TabsContent value="brand" class="mt-0">
                    @include('cms::settings.sites.partials.brand')
                </TabsContent>
                <TabsContent value="login" class="mt-0">
                    @include('cms::settings.sites.partials.login')
                </TabsContent>
            </Tabs>
        </ResizablePanel>
        <ResizableHandle id="content-handle-1" />
        <ResizablePanel id="content-panel-2" :default-size="20" class="bg-accent"></ResizablePanel>
    </ResizablePanelGroup>
@endsection