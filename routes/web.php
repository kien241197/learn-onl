<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;

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