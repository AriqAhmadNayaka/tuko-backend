<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/users', [UsersController::class, 'index']);
Route::post('/users', [UsersController::class, 'store']);

// Route::post('/tuko', function () {
//     return request()->all();
// });
