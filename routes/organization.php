<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organization\Auth\LoginController;
use App\Http\Controllers\Organization\Auth\RegisterController;
use App\Http\Controllers\Organization\Auth\VerificationController;
use App\Http\Controllers\Organization\Auth\ForgotPasswordController;
use App\Http\Controllers\Organization\Auth\ResetPasswordController;
use App\Http\Controllers\Organization\DashboardController;

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
// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('register/activate/{token}', [RegisterController::class, 'confirm'])->name('email_confirm');
Route::get('register/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('register/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::group([
    'middleware' => ['auth:organization'],
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});