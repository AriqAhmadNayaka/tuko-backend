<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/tuko', function () use ($users) {
//     return $users;
// });

// Route::post('/tuko', function () {
//     return request()->all();
// });
