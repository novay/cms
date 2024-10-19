<?php

namespace Novay\CMS\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Novay\CMS\Models\Logs\Events;
use Throwable;

class SettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerSettings();
        $this->registerException();
    }

    public function register()
    {
        // 
    }

    protected function registerSettings()
    {
        $locale = settings()->group('cms')->get('locale', config('app.locale'));
        $timezone = settings()->group('cms')->get('timezone', config('app.timezone'));

        \Illuminate\Support\Facades\App::setLocale($locale);

        config(['app.timezone' => $timezone]);
        date_default_timezone_set($timezone);

        \Carbon\Carbon::setLocale($locale);
    }

    protected function registerException()
    {
        $this->app->singleton(ExceptionHandler::class, function ($app) {
            return new class($app) extends ExceptionHandler {
                public function report(Throwable $exception)
                {
                    Events::add($exception->getMessage(), 'error', [
                        'file' => $exception->getFile(), 
                        'line' => $exception->getLine(), 
                        'trace' => $exception->getTraceAsString() 
                    ]);

                    return parent::report($exception);
                }

                public function render($request, Throwable $exception)
                {
                    return parent::render($request, $exception);
                }
            };
        });
    }
}
