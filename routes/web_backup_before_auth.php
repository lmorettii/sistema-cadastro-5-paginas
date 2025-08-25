<?php

use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-user', [Usercontroller::class, 'create'] ) ->name('users.create');
Route::post('/store-user', [Usercontroller::class, 'store'] ) ->name('users.store');


use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('vehicles.index');
});

Route::resource('vehicles', VehicleController::class);
Route::resource('rentals', RentalController::class)->only(['index','create','store','show']);
Route::patch('rentals/{rental}/finish', [RentalController::class, 'finish'])->name('rentals.finish');
