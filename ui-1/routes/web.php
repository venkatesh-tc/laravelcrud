<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
    


// Route::get('/home','App\Http\Controllers\homeController@show');
Route::get('/', [HomeController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/upload', [HomeController::class, 'upload']);
// Route::get('/home', 'App\Http\Controllers\HomeController@index');

// Route::get('/home', function () {
//     return view('home');
// });