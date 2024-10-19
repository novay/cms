<?php 

use Illuminate\Support\Facades\Route;
use Novay\CMS\Http\Controllers;

Route::middleware(['splade', 'web'])->group(function() 
{
    Route::view('/', 'welcome')->middleware('theme')->name('demo::index');

    Route::middleware(['auth'])->prefix('cms')->as('cms::')->group(function() {
        Route::get('/', [Controllers\IndexController::class, 'index'])->name('index');
        Route::get('about', [Controllers\IndexController::class, 'about'])->name('about');
        
        Route::prefix('systems')->as('systems.')->group(function() {
            Route::resource('photo', Controllers\System\Account\PhotoController::class)->only(['store']);
            Route::resource('profile', Controllers\System\Account\ProfileController::class)->only(['index', 'store']);
            Route::resource('security', Controllers\System\Account\SecurityController::class)->only(['store']);
            
            Route::resource('cache', Controllers\System\CacheController::class)->only(['index', 'show']);
        });

        Route::prefix('content')->as('content.')->group(function() {
            Route::view('/', 'cms::content.index')->name('index');
        });

        Route::prefix('plugins')->as('plugins.')->group(function() {
            Route::view('/', 'cms::plugins.index')->name('index');
        });

        Route::prefix('settings')->as('settings.')->group(function() {
            Route::get('/', [Controllers\Setting\IndexController::class, 'index'])->name('index');
            Route::resource('sites', Controllers\Setting\SiteController::class)->only(['index', 'store']);
            Route::resource('maintenance', Controllers\Setting\MaintenanceController::class)->only(['index', 'store']);

            Route::prefix('logs')->as('logs.')->group(function() {
                Route::resource('events', Controllers\Setting\Logs\EventController::class)->only(['index', 'show']);
                Route::resource('requests', Controllers\Setting\Logs\RequestController::class)->only(['index', 'show']);
                Route::resource('access', Controllers\Setting\Logs\AccessController::class)->only(['index', 'show']);
                Route::resource('settings', Controllers\Setting\Logs\SettingController::class)->only(['index', 'store']);
            });

            Route::resource('updates', Controllers\Setting\UpdateController::class)->only(['index']);
        });
    });

    require __DIR__.'/auth.php';
});