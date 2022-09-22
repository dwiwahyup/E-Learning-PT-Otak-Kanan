<?php

use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\MahasiswaController;
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

    // route for contents
    Route::get('/content', [ContentController::class, 'index']);
    Route::get('/content/create', [ContentController::class, 'create']);
    Route::post('/content/store', [ContentController::class, 'store']);
    Route::get('/content/edit/{id}', [ContentController::class, 'edit']);
    Route::post('/content/update', [ContentController::class, 'update']);
    Route::get('/content/delete/{id}', [ContentController::class, 'delete']);

    // route for logbook
    Route::get('/logbook', [LogbookController::class, 'index']);
    Route::get('/logbook/create', [LogbookController::class, 'create']);
    Route::post('/logbook/store', [LogbookController::class, 'store']);
    Route::get('/logbook/edit/{id}', [LogbookController::class, 'edit']);
    Route::post('/logbook/update', [LogbookController::class, 'update']);
    Route::get('/logbook/delete/{id}', [LogbookController::class, 'delete']);

    Route::get('/class', [ClassController::class, 'index']);
    Route::get('/class/class1', [ClassController::class, 'class1']);
    Route::get('/class/class2', [ClassController::class, 'class2']);
    Route::get('/class/class3', [ClassController::class, 'class3']);
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);

    // route for chapter
    Route::get('/chapter/{id}', [ChapterController::class, 'index']);
    Route::get('/chapter/create/{id}', [ChapterController::class, 'create']);
    Route::post('/chapter/store', [ChapterController::class, 'store']);

    // route for course catagory
    Route::get('/coursecategory', [CourseCategoryController::class, 'index']);
    Route::get('/coursecategory/create', [CourseCategoryController::class, 'create']);
    Route::post('/coursecategory/store', [CourseCategoryController::class, 'store']);
    Route::get('/coursecategory/edit/{id}', [CourseCategoryController::class, 'edit']);
    Route::post('/coursecategory/update', [CourseCategoryController::class, 'update']);
    Route::get('/coursecategory/delete/{id}', [CourseCategoryController::class, 'delete']);
});
