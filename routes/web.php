<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\NavigasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\ChapterUserController;
use App\Http\Controllers\ContentUserController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TestimonialUserController;
use App\Http\Controllers\UserLogbookController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\CourseCategoryController;


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
Route::resource('user_testimonial', TestimonialUserController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['user'])->group(function () {
        //route for contentuser
        Route::get('/contentuser/{slug}', [ContentUserController::class, 'index']);

        //route for chapteruser
        Route::get('/chapteruser/{slug}', [ChapterUserController::class, 'index']);

        // route for logbooks user
        Route::resource('my_logbooks', UserLogbookController::class)->only([
            'index', 'create', 'store'
        ]);

        // route for profile user
        route::get('/my_logbooks/view', [UserLogbookController::class, 'show_logbook']);

        Route::resource('MyProfile', UserProfileController::class);
    });
});




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
        Route::get('logbook/students/show/{slug}', [LogbookController::class, 'list_logbooks_students']);
        // Route::post('logbook/students/aprroved/{id}', [LogbookController::class, 'approved_logbooks']);
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
        route::resource('profile', ProfileController::class);
        route::post('/profile/update/profile_image', [ProfileController::class, 'update_image']);
        route::post('/profile/update/password', [ProfileController::class, 'update_password']);
        route::post('/profile/update/email', [ProfileController::class, 'update_email']);

        //route for program
        // route::get('/program', [ProgramController::class, 'index']);
        Route::resource('program', ProgramController::class);
        route::get('/program/preview/{slug}', [ProgramController::class, 'preview']);

        //route for kompetensi
        Route::resource('program.kompetensi', KompetensiController::class);

        //route for testimonial
        Route::resource('testimonial', TestimonialController::class);
    });
});

require __DIR__ . '/auth.php';

Route::get('/logbook', [LogbookController::class, 'logbook']);
Route::get('/logbook/view', [LogbookController::class, 'show_logbook']);
Route::get('/logbook/create', [LogbookController::class, 'add_logbook']);

Route::get('/about', [NavigasiController::class, 'about']);
