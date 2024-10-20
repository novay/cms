<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['splade'])->group(function () 
{
    Route::spladeWithVueBridge();
    Route::spladePasswordConfirmation();
    Route::spladeTable();
    Route::spladeUploads();

    Route::post('lang', '\App\Http\Controllers\IndexController@lang')->name('lang');
});