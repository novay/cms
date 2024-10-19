@seoTitle(__('Lupa Sandi'))
<x-blank-layout>
    <div class="overflow-hidden h-screen bg-background shadow">
        <div class="relative">
            <div class="container relative h-screen flex-col items-center justify-center md:grid lg:max-w-none lg:grid-cols-2 lg:px-0">
                <div class="relative hidden h-full flex-col bg-muted p-10 text-white lg:flex">
                    <div class="absolute inset-0 bg-zinc-900"></div>
                    <div class="relative z-20 flex items-center text-lg font-medium">
                        <img src="{{ asset('assets/images/epanel.png') }}" alt="" class="h-10 w-auto grayscale-0">
                    </div>
                    <div class="relative z-20 mt-auto">
                        <blockquote class="space-y-2">
                            <p class="text-3xl font-semibold tracking-tight">
                                "Work is the greatest thing in the world, so we should always save some of it for tomorrow."
                            </p>
                            <footer class="text-base">- Don Herold</footer>
                        </blockquote>
                    </div>
                </div>
                <div class="py-8 lg:p-8">
                    <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                        <div class="flex flex-col space-y-2">
                            <h1 class="text-xl lg:text-3xl font-semibold tracking-tighter dark:text-stone-100">
                                {{ ___('Lupa sandi?') }}
                            </h1>
                            <p class="text-sm text-muted-foreground">
                                {{ ___('Masukkan email yang kamu gunakan saat pendaftaran dan kami akan mengirim email berisi tautan untuk melakukan pembaruan sandi.') }}
                            </p>
                        </div>
                        <div class="grid gap-4">
                            <x-auth-session-status class="mb-4" />
                            <x-splade-form action="{{ route('password.email') }}" autocomplete="off">
                                <div class="grid gap-2">
                                    <x-splade-input type="email" name="email" :label="___('Surel')" autofocus placeholder="eg. novay@btekno.id" />
                                    <x-turnstile />
                                    <x-splade-submit class="w-full inline-flex items-center justify-center whitespace-nowrap !rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-stone-800 text-primary-foreground border-0 shadow hover:bg-primary/90 dark:text-accent-foreground dark:hover:bg-accent px-4 py-2.5" :label="___('Email Password Reset Link')" />
                                </div>
                            </x-splade-form>
                            <Link href="{{ route('login') }}" class="inline-flex items-center justify-center whitespace-nowrap rounded text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground dark:text-accent-foreground h-9 px-4 py-2">
                                <Icon icon="mingcute:left-line" class="mr-2 h-4 w-4" />
                                Kembali ke Login
                            </Link>
                            <div class="w-full sm:max-w-md flex items-center justify-between mt-2">
                                <div class="text-center text-sm text-muted-foreground">
                                    Copyright &copy; {{ date('Y') }}
                                </div>
                                <div class="flex items-center gap-2">
                                    <div v-if="@js(config('boilerplate.settings.darkmode'))" class="hs-dropdown text-sm font-medium text-stone-600 dark:text-stone-100">
                                        <button type="button" class="dark:flex hidden" @click.prevent="data.dark = !data.dark; $splade.refresh()">
                                            <Icon icon="tabler:moon-stars" class="flex-shrink-0 w-5 h-5 text-stone-600 dark:text-stone-400 dark:hover:text-stone-500 me-1" /> 
                                        </button>
                                        <button type="button" class="dark:hidden flex" @click.prevent="data.dark = !data.dark; $splade.refresh()">
                                            <Icon icon="tabler:sun" class="flex-shrink-0 w-5 h-5 text-stone-600 dark:text-stone-400 dark:hover:text-stone-500 me-1" /> 
                                        </button>
                                    </div>
                                    <div v-if="@js(config('boilerplate.settings.language'))" class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button type="button" class="flex items-center gap-1 text-sm font-medium hover:bg-stone-50 dark:hover:bg-stone-800 px-2 py-1 rounded text-stone-600 dark:text-stone-100">
                                            <div v-if="@js(app()->getLocale() == 'id')" class="flex items-center gap-1">
                                                <Icon icon="emojione:flag-for-indonesia" class="w-auto h-4" />
                                                Indonesian (ID)
                                            </div>
                                            <div v-if="@js(app()->getLocale() == 'en')" class="flex items-center gap-1">
                                                <Icon icon="emojione:flag-for-us-outlying-islands" class="w-auto h-4" />
                                                English (US)
                                            </div>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-auto hidden z-10 !mt-[-6px] min-w-[10rem] bg-white shadow rounded-b p-1 dark:bg-stone-900 dark:border dark:border-stone-700 dark:divide-stone-700" aria-labelledby="hs-dropdown-pengaturan">
                                            @foreach(config('boilerplate.lang.available') as $key => $value)
                                                <Link href="{{ route('lang') }}?lang={{ $key }}" method="POST" class="flex items-center gap-x-1.5 py-1 px-2 rounded text-sm font-medium text-stone-600 hover:bg-stone-100 focus:ring-2 focus:ring-blue-500 dark:text-stone-400 dark:hover:bg-stone-800 dark:hover:text-stone-300">
                                                    <Icon v-if="@js($key == 'id')" icon="emojione:flag-for-indonesia" class="w-auto h-4" />
                                                    <Icon v-if="@js($key == 'en')" icon="emojione:flag-for-us-outlying-islands" class="w-auto h-4" />
                                                    {{ $value }}
                                                </Link>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-guest-layout>
