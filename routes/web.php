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

Route::get('/', function () {
    return view('welcome');
})->name('front');

Route::get('oauth/{driver}', [App\Http\Controllers\User\Auth\OAuthController::class, 'redirect']);
Route::get('oauth/{driver}/callback', [App\Http\Controllers\User\Auth\OAuthController::class, 'handleCallback'])->name('oauth.callback');
Route::group(['namespace' => 'User\\Auth'], function () {
    // Authentication Routes...
    Route::get('login', [App\Http\Controllers\User\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\User\Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\User\Auth\LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    Route::get('register', [App\Http\Controllers\User\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [App\Http\Controllers\User\Auth\RegisterController::class, 'register'])->name('register');
    Route::get('register/activate/{token}', [App\Http\Controllers\User\Auth\RegisterController::class, 'confirm'])->name('email_confirm');
    Route::get('register/email/verify/{id}/{hash}', [App\Http\Controllers\User\Auth\VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('register/email/resend', [App\Http\Controllers\User\Auth\VerificationController::class, 'resend'])->name('verification.resend');

    // Password Reset Routes...
    Route::get('password/reset', [App\Http\Controllers\User\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\User\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\User\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\User\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

});

Route::group([
    'middleware' => ['auth:web'],
], function () {
    Route::get('/home', [App\Http\Controllers\User\UserController::class, 'index'])->name('home');
});