<?php

namespace Novay\CMS\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class CMSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerMiddleware();
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'cms');
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');

        $this->registerConfig();
        $this->configurePublishing();

        Blade::component('cms-layout', 'Novay\\CMS\\Views\\CmsLayout');
        Blade::componentNamespace('Novay\\CMS\\Views\\Components', 'cms');

        $this->registerAssets();
        $this->registerStubs();
        $this->registerLang();
    }

    public function register()
    {
        $this->app->singleton('menu', function () {
            return new \Novay\CMS\Services\MenuManager();
        });
    }

    protected function registerMiddleware()
    {
        $this->app['router']->aliasMiddleware('theme', \Novay\CMS\Http\Middleware\CheckThemeInstalled::class);
        $this->app['router']->pushMiddlewareToGroup('web', \Novay\CMS\Http\Middleware\LogRequest::class);
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/cms.php', 'cms');

        $this->publishes([__DIR__.'/../../config' => config_path()], 'cms-config');
    }

    protected function configurePublishing()
    {
        $this->publishes([
            __DIR__.'/../../database/migrations/2014_10_20_000000_create_logs_table.php' => database_path('migrations/2014_10_20_000000_create_logs_table.php')
        ], 'cms-migrations');
    }

    protected function registerAssets()
    {
        $this->publishes([
            __DIR__ . '/../../resources/assets' => public_path('assets'),
        ], 'cms-assets');
    }

    protected function registerStubs()
    {
        $this->publishes([
            __DIR__ . '/../../stubs/tailwind.config.js' => base_path('tailwind.config.js'),
            __DIR__ . '/../../stubs/package.json' => base_path('package.json'),
            __DIR__ . '/../../stubs/jsconfig.json' => base_path('jsconfig.json'),
            __DIR__ . '/../../stubs/resources/css' => resource_path('css'),
            __DIR__ . '/../../stubs/resources/js/app.js' => resource_path('js/app.js'),
            __DIR__ . '/../../stubs/resources/js/components' => resource_path('js/components'),
            __DIR__ . '/../../stubs/resources/js/lib' => resource_path('js/lib'),
            
            __DIR__ . '/../../stubs/resources/views/root.php' => resource_path('views/root.php'),
            __DIR__ . '/../../stubs/resources/views/components' => resource_path('views/components'),
            __DIR__ . '/../../stubs/resources/views/vendor' => resource_path('views/vendor'),

            __DIR__ . '/../../stubs/models/User.php' => base_path('app/Models/User.php'),
            __DIR__ . '/../../stubs/routes/web.php' => base_path('routes/web.php'),
        ], 'cms-package');
    }

    protected function registerLang()
    {
        $this->publishes([
            __DIR__ . '/../../lang' => resource_path('lang'),
        ], 'cms-lang');
        
        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'novay/cms');
    }
}
