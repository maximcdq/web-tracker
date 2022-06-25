<?php

use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Auth;
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

// Middleware auth
Auth::routes();

// Routes
Route::middleware('auth')->group(function () {
    Route::resource('/', ResourceController::class);
    Route::resource('/resources', ResourceController::class);
});
