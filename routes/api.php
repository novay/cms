<?php 

use Illuminate\Support\Facades\Route;
use Novay\CMS\Http\Controllers\Api as Api;

Route::get('system-status', [Api\SystemController::class, 'index'])->name('cms::api.system-status');