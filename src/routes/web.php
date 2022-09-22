<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', view:'dashboard')
    ->name('dashboard');
/*
Route::view('/{any}', view:'dashboard')
    ->name('dashboard')
    ->where('any', '.*');*/

//Route::get('/api/plate', [\App\Http\Controllers\Api\PlateController::class, 'index']);
