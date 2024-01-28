<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


// use Illuminate\Support\Facades\DB;

// Route::get('/test-database-connection', function () {
//     try {
//         DB::connection()->getPdo();
//         return "Database connection established successfully!";
//     } catch (\Exception $e) {
//         return "Unable to connect to the database. Error: " . $e->getMessage();
//     }
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin area
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');
    Route::get('admin/add_users', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.add_users');
    Route::post('admin/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/show', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.users');
    Route::get('admin/user/{id}', [App\Http\Controllers\AdminController::class, 'user'])->name('admin.user');
    Route::get('admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
    Route::post('admin/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
    Route::get('admin/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.delete');
});

//user area
Route::get('user/add_users', [App\Http\Controllers\UserController::class, 'index'])->name('add_users');
Route::post('store', [App\Http\Controllers\UserController::class, 'store']);
Route::get('user/show', [App\Http\Controllers\UserController::class, 'show'])->name('users');
Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'user'])->name('user');
Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::post('update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::get('delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete');
