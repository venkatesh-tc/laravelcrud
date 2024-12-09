<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great! note it test
|
*/
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthenController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/addcontact', [ContactController::class, 'add']);
Route::get('/delete/{id}', [ContactController::class, 'delete']);
Route::get('/edit/{id}', [ContactController::class, 'edit']);
Route::post('/edit/{id}', [ContactController::class, 'update']);
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::middleware('auth')->group(function () {
Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Route::get('/login', [LoginController::class, 'showLoginForm']);
});
Route::controller(AuthenController::class)->group(function () {

    Route::get('/registration', 'registration');
    Route::post('/registration-user', 'registerUser')->name('register-user');
    
    // Route::get('/login', 'login');
    Route::get('/login', 'login')->middleware('isLoggedIn');
    Route::post('/login-user', 'loginUser')->name('login-user');
    
    Route::get('/dashboard', 'dashboard')->middleware('isLoggedIn');
    Route::get('/logout', 'logout');
});