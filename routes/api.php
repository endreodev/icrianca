<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('region')->group(function () {
    Route::get('/countries', [App\Http\Controllers\Api\RegionController::class, 'countries'])->name('api.region.countries');
    Route::get('/states/{country_id?}', [App\Http\Controllers\Api\RegionController::class, 'states'])->name('api.region.states');
    Route::get('/cities/{state_id?}', [App\Http\Controllers\Api\RegionController::class, 'cities'])->name('api.region.cities');
    Route::get('/search/{city?}/{state?}/{contry?}', [App\Http\Controllers\Api\RegionController::class, 'search'])->name('api.region.search');
    
    
    Route::get('/metrics', [App\Http\Controllers\Api\MetricsController::class, 'index'])->name('api.dashboard--OLD');


    
    // Route::prefix('classes')->group(function () {
    //     Route::get('/units', [App\Http\Controllers\Api\ClassesController::class, 'units'])->name('api.classes.units');
    // });

});

