<?php

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminCountryController;
use App\Http\Controllers\admin\AdminEventController;
use App\Http\Controllers\admin\AdminRegionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Future protected admin routes
Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('category', AdminCategoryController::class)->except(['show']);

    Route::resource('country', AdminCountryController::class)->except('show');

    Route::resource('region', AdminRegionController::class)->except('show');

    Route::get('/event', [AdminEventController::class, 'index'])->name('event.index');
});
