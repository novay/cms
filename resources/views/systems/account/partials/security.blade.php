<header class="mb-8 space-y-1">
    <h4 class="menu-title dark:text-stone-100 font-square tracking-tight">
        {{ __('Update Password') }}
    </h4>
    <p class="text-base text-gray-600 dark:text-gray-400 tracking-tight">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>
</header>
<x-splade-form :action="route('cms::systems.security.store')" class="mt-4 space-y-6" preserve-scroll autocomplete="off" stay>
    <x-splade-input id="current_password" name="current_password" type="password" :label="__('Current Password')" autocomplete="current-password" />
    <x-splade-input id="password" name="password" type="password" :label="__('New Password')" autocomplete="new-password" />
    <x-splade-input id="password_confirmation" name="password_confirmation" type="password" :label="__('Confirm Password')" autocomplete="new-password" />

    <div class="flex items-center gap-4">
        <x-splade-submit :label="__('Simpan Perubahan')" />
    </div>
</x-splade-form>