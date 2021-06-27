<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Profile\HomeController;
use \App\Http\Controllers\HomeController as HomeControllerIndex;
use \App\Http\Controllers\Profile\CarController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeControllerIndex::class, 'index'])->name('home');
Route::get('/car/{carId}', [HomeControllerIndex::class, 'view'])->name('carView');

Auth::routes();
Route::group(['middleware' => 'auth'], function (){
    Route::get('home', HomeController::class)->name('profile');
    Route::resource('cars', CarController::class)->except(['show']);

    Route::group(['prefix' => '{carId}'], function (){

        Route::resource('modification', \App\Http\Controllers\Profile\CarModificationController::class)->except(['show']);

    });
});

