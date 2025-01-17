<?php

require __DIR__.'/admin-auth.php';

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;


use App\Models\Category;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', CategoryController::class);
Route::get('/dashboard', function () {
    $categories = Category::paginate(10);
    return view('dashboard', compact('categories'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::post('/login', [LoginController::class, 'login'])->name('custom.login');



Route::get("users", [CategoryController::class, 'index']);
Route::delete("users/{id}", [CategoryController::class, 'destroy'])->name("users.destroy");

require __DIR__.'/auth.php';
