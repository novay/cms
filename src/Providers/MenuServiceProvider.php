<?php

namespace Novay\CMS\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerMenu();
    }

    public function register()
    {
        $this->app->singleton('menu', function () {
            return new \Novay\CMS\Services\MenuManager();
        });
    }

    protected function registerMenu()
    {
        view()->composer('*', function ($view) {    
            $view->with('mNotifications', []);
            $view->with('mContent', []);
            $view->with('mPlugins', []);

            $themes = count(themes()) ? true : false;
            $view->with('mSettings', [ 
                app('menu')->title(__('novay/cms::menu.navigation_menu'))->submenu(function($menu) use($themes) {
                    $menu->title(__('novay/cms::menu.general_settings'))
                        ->description(__('novay/cms::menu.general_settings_description'))
                        ->routeSubmenu('cms::settings.sites.index');
                    $menu->title(__('novay/cms::menu.theme_selector'))
                        ->enable($themes)
                        ->description(__('novay/cms::menu.theme_selector_description'))
                        ->routeSubmenu('cms::settings.themes.index');
                    $menu->title(__('novay/cms::menu.maintenance'))
                        ->enable($themes)
                        ->description(__('novay/cms::menu.maintenance_description'))
                        ->routeSubmenu('cms::settings.maintenance.index');
                }), 
                app('menu')->title(__('novay/cms::menu.system_settings'))->submenu(function($menu) {
                    $menu->title(__('novay/cms::menu.system_logs'))
                        ->description(__('novay/cms::menu.system_logs_description'))
                        ->routeSubmenu('cms::settings.logs.events.index');
                    $menu->title(__('novay/cms::menu.system_updates'))
                        ->description(__('novay/cms::menu.system_updates_description'))
                        ->routeSubmenu('cms::settings.updates.index');
                })
            ]);
        });
    }
}
