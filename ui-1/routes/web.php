<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController ;

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

Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', CategoryController::class);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', 'App\Http\Controllers\HomeController@index');
// Route::get('/home', function () {
//     return view('home');
//});