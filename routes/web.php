<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminLessonController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\HomeController;

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

//User
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [LoginController::class, 'getLogin'])->name('getLogin');
Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [LoginController::class, 'getLogout'])->name('getLogout');
Route::get('register', [LoginController::class, 'getRegister'])->name('getRegister');
Route::post('register', [LoginController::class, 'postRegister'])->name('postRegister');
Route::get('huong-dan', [HomeController::class, 'huongDan'])->name('huong-dan');
Route::get('khoa-hoc', [HomeController::class, 'courseList'])->name('khoa-hoc');
Route::get('single/{id}', [HomeController::class, 'single'])->name('single');
Route::group(['middleware' => 'auth.user'], function() {
        Route::get('lesson/{id}', [LessonController::class, 'lesson'])->name('lesson');
        Route::post('lesson/{id}/comment', [LessonController::class, 'postComment'])->name('postComment');
        Route::get('my-info', [HomeController::class, 'info'])->name('info');
        Route::get('cart', [HomeController::class, 'cart'])->name('cart');
        Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
        Route::get('my-info', [HomeController::class, 'info'])->name('info');
        Route::post('lesson/{id}/history', [LessonController::class, 'postHistory'])->name('postHistory');
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
        Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('comments', [AdminCommentController::class, 'index'])->name('comments.index');
        Route::get('comments/{id}', [AdminCommentController::class, 'show'])->name('comments.show');
        Route::post('comments/{id}/reply', [AdminCommentController::class, 'reply'])->name('comments.reply');
});