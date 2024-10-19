<header class="mb-8 space-y-1">
    <h4 class="menu-title dark:text-stone-100 font-square tracking-tight">
        {{ __('Photo Profile') }}
    </h4>
    <p class="text-base text-gray-600 dark:text-gray-400 tracking-tight">
        {{ __('Update your account photo.') }}
    </p>
</header>
<x-splade-form :action="route('cms::systems.photo.store')" class="mt-4 space-y-6" preserve-scroll autocomplete="off">
    <div class="space-y-6">
        @if(!is_null($user->original))
            <img v-lazy="{ src: '{{ $user->original }}' }" class="p-2 w-40 h-40 rounded border" />
        @endif
        <x-splade-file name="photo" :label="__('Photo')" :filepond="['allowDrop' => false, 'labelIdle' => 'Pilih File']" credits="false" help="Hanya menerima format gambar. Maksimal 2MB." accept="image/png, image/jpeg, image/jpg" max-size="2MB" />
    </div>

    <div class="flex items-center gap-4">
        <x-splade-submit :label="__('Simpan Perubahan')" />
    </div>
</x-splade-form>