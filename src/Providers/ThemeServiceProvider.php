<?php

namespace Novay\CMS\Providers;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $activeTheme = app('theme');

        $this->loadViewsFrom(resource_path("views/{$activeTheme}"), 'theme');
    }

    public function register()
    {
        $activeTheme = config('cms.theme');
        $this->app->singleton('theme', function () use ($activeTheme) {
            return $activeTheme;
        });
    }
}
