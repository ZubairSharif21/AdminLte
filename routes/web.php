<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/web', function() {
        return view('admin.web');
    })->name('web');
    Route::get('/admin-profile', function() {
        return view('admin.profile');
    })->name('profile');

    Route::get('/all-user',[HomeController::class,'all_users'])->name('all_users');

    Route::get('/delete-user/{id}',[HomeController::class,'delete_user'])->name('delete-user');
    Route::get('/update-user/{id}',[HomeController::class,'update_user'])->name('update-user');
    Route::get('/view-user/{id}',[HomeController::class,'view_user'])->name('view-user');

    // View Users



});
