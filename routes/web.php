<?php

use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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



Route::get('/home', [HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/content', [ContentController::class, 'index']);
Route::get('/content/create', [ContentController::class, 'create']);
Route::post('/content/store', [ContentController::class, 'store']);
Route::get('/content/edit/{id}', [ContentController::class, 'edit']);
Route::post('/content/update', [ContentController::class, 'update']);
Route::get('/content/delete/{id}', [ContentController::class, 'delete']);

Route::get('/logbook', [LogbookController::class, 'index']);
Route::get('/logbook/create', [LogbookController::class, 'create']);
