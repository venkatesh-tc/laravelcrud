<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('posts', PostController::class);
});

// Route::get('/home','App\Http\Controllers\homeController@show');

Route::get('/', [HomeController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/upload', [HomeController::class, 'upload']);

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/home', 'App\Http\Controllers\HomeController@index');
// Route::get('/home', function () {
//     return view('home');
//});