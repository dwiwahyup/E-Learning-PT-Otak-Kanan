<?php

use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ChapterUserController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavigasiController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ContentGalleryController;
use App\Http\Controllers\ContentParagraphController;
use App\Http\Controllers\ContentUserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserProfileController;
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


//route for home/landing page
Route::get('/', [HomeController::class, 'index']);
Route::get('/allcourse', [HomeController::class, 'allcourse']);
Route::get('/program', [HomeController::class, 'program']);

//route for contentuser
Route::get('/contentuser', [ContentUserController::class, 'index']);

//route for chapteruser
Route::get('/chapteruser', [ChapterUserController::class, 'index']);


Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {

    Route::middleware(['admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index']);

        // route for mentors
        Route::resource('mentors', MentorsController::class);
        // route for course
        Route::resource('coursecategory', CourseCategoryController::class);
        Route::get('/student/{slug}', [CourseCategoryController::class, 'students']);
        // route for chapter
        Route::resource('coursecategory.chapter', ChapterController::class);
        // route for content
        Route::resource('coursecategory.chapter.content', ContentController::class);
        Route::get('/content/preview/{slug}', [ContentController::class, 'preview']);

        // route for logbook
        Route::resource('logbooks', LogbookController::class);
        Route::get('logbook/students/{slug}', [LogbookController::class, 'students_logbooks']);
        // Route::get('/logbook/{id}', [LogbookController::class, 'index']);
        // Route::get('/logbook/create/{id}', [LogbookController::class, 'create']);
        // Route::post('/logbook/store', [LogbookController::class, 'store']);
        // Route::get('/logbook/edit/{id}', [LogbookController::class, 'edit']);
        // Route::post('/logbook/update', [LogbookController::class, 'update']);
        // Route::get('/logbook/delete/{id}', [LogbookController::class, 'delete']);

        // route for user
        Route::resource('user', UserController::class);
        // Route::get('/user', [UserController::class, 'index']);
        // Route::get('/user/create', [UserController::class, 'create']);
        // Route::get('/user/edit/{id}', [UserController::class, 'edit']);
        // Route::post('/user/update', [UserController::class, 'update']);
        // Route::get('/user/delete/{id}', [UserController::class, 'delete']);
        // Route::post('/user/store', [UserController::class, 'store']);

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

        //route for program
        route::get('/program', [ProgramController::class, 'index']);
    });
});

require __DIR__ . '/auth.php';

Route::get('/about', [NavigasiController::class, 'about']);

Route::get('/profile', [UserProfileController::class, 'profile']);
Route::get('/profile/update', [UserProfileController::class, 'update']);

Route::get('/testimonial', [TestimonialsController::class, 'index']);
