<?php

use Illuminate\Support\Facades\Route;



// use Illuminate\Support\Facades\DB;

// Route::get('/test-database-connection', function () {
//     try {
//         DB::connection()->getPdo();
//         return "Database connection established successfully!";
//     } catch (\Exception $e) {
//         return "Unable to connect to the database. Error: " . $e->getMessage();
//     }
// });

Route::get('/',[App\Http\Controllers\FormController::class,'index']);
Route::post('store', [App\Http\Controllers\FormController::class, 'store']);
Route::get('show', [App\Http\Controllers\FormController::class, 'show']);
Route::get('edit/{id}', [App\Http\Controllers\FormController::class, 'edit']);
Route::post('update/{id}', [App\Http\Controllers\FormController::class, 'update']);
Route::get('delete/{id}', [App\Http\Controllers\FormController::class, 'destroy']);
