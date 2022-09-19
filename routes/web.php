<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index']);
=======
Route::get('/dashboard', [DashboardController::class, 'index']);
>>>>>>> 91377bc3c505fab6dc64f074ff272aaaf70facd3
