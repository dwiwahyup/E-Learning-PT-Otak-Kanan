<?php

use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ContentGalleryController;
use App\Http\Controllers\ContentParagraphController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
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
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {

    Route::middleware(['admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index']);

        // route for contents
        Route::get('/content/{id}', [ContentController::class, 'index']);
        Route::get('/content/create/{id}', [ContentController::class, 'create']);
        Route::post('/content/store', [ContentController::class, 'store']);
        Route::get('/content/edit/{id}', [ContentController::class, 'edit']);
        Route::post('/content/update/{id}', [ContentController::class, 'update']);
        Route::get('/content/delete/{id}', [ContentController::class, 'delete']);
        Route::get('/content/preview/{id}', [ContentController::class, 'preview']);

        // route for logbook
        Route::get('/logbook/{id}', [LogbookController::class, 'index']);
        Route::get('/logbook/create/{id}', [LogbookController::class, 'create']);
        Route::post('/logbook/store', [LogbookController::class, 'store']);
        Route::get('/logbook/edit/{id}', [LogbookController::class, 'edit']);
        Route::post('/logbook/update', [LogbookController::class, 'update']);
        Route::get('/logbook/delete/{id}', [LogbookController::class, 'delete']);

        // route for user
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/create', [UserController::class, 'create']);
        Route::get('/user/edit/{id}', [UserController::class, 'edit']);
        Route::post('/user/update', [UserController::class, 'update']);
        Route::get('/user/delete/{id}', [UserController::class, 'delete']);
        Route::post('/user/store', [UserController::class, 'store']);

        // route for chapter
        Route::get('/chapter/{id}', [ChapterController::class, 'index']);
        Route::get('/chapter/create/{id}', [ChapterController::class, 'create']);
        Route::post('/chapter/store', [ChapterController::class, 'store']);
        Route::get('/chapter/edit/{id}', [ChapterController::class, 'edit']);
        Route::post('/chapter/update', [ChapterController::class, 'update']);
        Route::get('/chapter/delete/{id}', [ChapterController::class, 'delete']);

        // route for course catagory
        Route::get('/coursecategory', [CourseCategoryController::class, 'index']);
        Route::get('/coursecategory/create', [CourseCategoryController::class, 'create']);
        Route::post('/coursecategory/store', [CourseCategoryController::class, 'store']);
        Route::get('/coursecategory/edit/{id}', [CourseCategoryController::class, 'edit']);
        Route::post('/coursecategory/update', [CourseCategoryController::class, 'update']);
        Route::get('/coursecategory/delete/{id}', [CourseCategoryController::class, 'delete']);
        Route::get('/coursecategory/student/{id}', [CourseCategoryController::class, 'preview']);

        //route for quiz
        Route::get('/quiz/{id}', [QuizController::class, 'index']);
        Route::get('/quiz/create/{id}', [QuizController::class, 'create']);
        Route::post('/quiz/store', [QuizController::class, 'store']);
        Route::get('/quiz/edit/{id}', [QuizController::class, 'edit']);
        Route::post('/quiz/update/{id}', [QuizController::class, 'update']);
        Route::get('/quiz/delete/{id}', [QuizController::class, 'delete']);

        //route for profile
        route::get('/profile', [ProfileController::class, 'index']);
        // route for content pictures
        Route::post('/contentGallery/store', [ContentGalleryController::class, 'store']);

        // route for paragraph content
        Route::get('/paragraph/{id}', [ContentParagraphController::class, 'index']);
        Route::get('/paragraph/create/{id}', [ContentParagraphController::class, 'create']);
        Route::post('/paragraph/store', [ContentParagraphController::class, 'store']);
        Route::get('/paragraph/edit/{id}', [ContentParagraphController::class, 'edit']);
        Route::post('/paragraph/update/{id}', [ContentParagraphController::class, 'update']);
        Route::get('/paragraph/delete/{id}', [ContentParagraphController::class, 'delete']);
    });
});

require __DIR__ . '/auth.php';
