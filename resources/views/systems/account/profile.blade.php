@seoTitle($title)
<x-cms-layout>
    <div class="grow" dusk="update-password">
        <x-splade-modal max-width="4xl" class="!p-0 !rounded-none" :close-button="false">
            <Tabs default-value="account" class="grid grid-cols-12"orientation="vertical">
                <div class="col-span-4 bg-stone-100 dark:bg-stone-800 py-8 px-4">
                    <div class="px-2.5">
                        <x-cms::link @click="modal.setIsOpen(false)" class="fixed uppercase font-medium text-sm font-square">
                            Close
                        </x-cms::link>
                    </div>
                    <h4 class="pt-6 pb-3 px-2 menu-title font-square tracking-tight dark:text-stone-100">
                        Account settings
                    </h4>
                    <TabsList class="grid w-full grid-cols-1 space-y-1 dark:bg-transparent">
                        <TabsTrigger value="photo" class="bg-transparent border-none text-base font-semibold cursor-pointer relative inline-block group text-start">
                            Photo Profile
                        </TabsTrigger>
                        <TabsTrigger value="account" class="bg-transparent border-none text-base font-semibold cursor-pointer relative inline-block group text-start">
                            Account
                        </TabsTrigger>
                        <TabsTrigger value="password" class="bg-transparent border-none text-base font-semibold cursor-pointer relative inline-block group text-start">
                            Password
                        </TabsTrigger>
                    </TabsList>
                </div>
                <div class="col-span-8 p-8 h-[calc(100vh_-_100px)] overflow-y-scroll">
                    <TabsContent value="photo">
                        @include('cms::systems.account.partials.photo')
                    </TabsContent>
                    <TabsContent value="account">
                        @include('cms::systems.account.partials.account')
                    </TabsContent>
                    <TabsContent value="password">
                        @include('cms::systems.account.partials.security')
                    </TabsContent>
                </div>
            </Tabs>
        </x-splade-modal>
    </div>
</x-cms-layout>