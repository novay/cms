<header class="mb-8 space-y-1">
    <h4 class="menu-title dark:text-stone-100 font-square tracking-tight">
        {{ __('Profile Information') }}
    </h4>
    <p class="text-base text-gray-600 dark:text-gray-400 tracking-tight">
        {{ __("Update your account's profile information and email address.") }}
    </p>
</header>
<x-splade-form :action="route($prefix . '.store')" :default="$user" class="mt-3 space-y-6" preserve-scroll stay>
    <div class="space-y-6">
        <x-splade-input name="name" type="text" :label="___('Nama')" required autocomplete="name" />
        <div class="grid grid-cols-2 gap-3">
            <x-splade-input name="email" :label="___('Username (Email)')" required autocomplete="email" />
            <x-splade-input name="phone" type="number" :label="___('Nomor Telepon/WA')" placeholder="8115555573" prepend="+62"></x-splade-input>
        </div>
        <x-splade-textarea name="address" :label="___('Alamat')" :placeholder="___('eg. Perumahan Citra Gading Residence Ruko A20, Sambutan, Samarinda')" rows="3" autosize></x-splade-textarea>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <Link method="post" href="{{ route('verification.send') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </Link>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
    </div>
    <div class="flex items-center gap-4">
        <x-splade-submit :label="__('Simpan Perubahan')" />
    </div>
</x-splade-form>