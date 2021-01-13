<?php

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

Route::group(['namespace' => 'Admin\\Auth'], function () {
    // Authentication Routes...
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    // Route::get('register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    // Route::post('register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register'])->name('register');
    Route::get('register/activate/{token}', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'confirm'])->name('email_confirm');
    Route::get('register/email/verify/{id}', [App\Http\Controllers\Admin\Auth\VerificationController::class, 'verify'])->name('verification.verify');

    // Password Reset Routes...
    Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

});

Route::group([
    'middleware' => ['auth:admin'],
], function () {
    Route::get('/', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'index'])->name('dashboard');
});