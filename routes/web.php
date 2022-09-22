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


Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/content', [ContentController::class, 'index']);
    Route::get('/content/create', [ContentController::class, 'create']);
    Route::post('/content/store', [ContentController::class, 'store']);
    Route::get('/content/edit/{id}', [ContentController::class, 'edit']);
    Route::post('/content/update', [ContentController::class, 'update']);
    Route::get('/content/delete/{id}', [ContentController::class, 'delete']);
    Route::get('/logbook', [LogbookController::class, 'index']);
    Route::get('/logbook/create', [LogbookController::class, 'create']);
    Route::post('/logbook/store', [LogbookController::class, 'store']);
    Route::get('/logbook/edit/{id}', [LogbookController::class, 'edit']);
    Route::post('/logbook/update', [LogbookController::class, 'update']);
    Route::get('/logbook/delete/{id}', [LogbookController::class, 'delete']);
});
