<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminLessonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
        Route::get('login', [AdminLoginController::class, 'getLogin'])->name('getLogin');
        Route::post('login', [AdminLoginController::class, 'postLogin'])->name('postLogin');
        Route::get('logout', [AdminLoginController::class, 'getLogout'])->name('getLogout');
});
Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('users', AdminUserController::class);
        Route::resource('courses', AdminCourseController::class);
        Route::post('courses/{courseId}/chapters', [AdminCourseController::class, 'addChapter'])->name('chapters.store');
        Route::put('courses/{courseId}/chapters/{chapterId}', [AdminCourseController::class, 'editChapter'])->name('chapters.update');
        Route::delete('courses/{courseId}/chapters/{chapterId}', [AdminCourseController::class, 'deleteChapter'])->name('chapters.destroy');
        Route::get('courses/{courseId}/chapters/{chapterId}/lessons/create', [AdminLessonController::class, 'create'])->name('lessons.create');
        Route::post('courses/{courseId}/chapters/{chapterId}/lessons', [AdminLessonController::class, 'store'])->name('lessons.store');
        Route::get('courses/{courseId}/chapters/{chapterId}/lessons/{lessonId}/edit', [AdminLessonController::class, 'edit'])->name('lessons.edit');
        Route::put('courses/{courseId}/chapters/{chapterId}/lessons/{lessonId}', [AdminLessonController::class, 'update'])->name('lessons.update');
        Route::delete('courses/{courseId}/chapters/{chapterId}/lessons/{lessonId}', [AdminLessonController::class, 'destroy'])->name('lessons.destroy');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('tags', AdminTagController::class);
});