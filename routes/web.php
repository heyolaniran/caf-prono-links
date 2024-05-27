<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\{SocialController, TransactionController, GoogleLoginController}; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


Route::get('/home', function() {
    return view('welcome'); 
}); 

Route::get('/tables', function () {
    return view('tables');
})->name('tables')->middleware('auth');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

Route::get('/RTL', function () {
    return view('RTL');
})->name('RTL')->middleware('auth');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('users')->middleware('auth');

Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

Route::post('/sign-up', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');



Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'otp_mail'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/otp/{uid}', [ForgotPasswordController::class , 'otp_view'])
    ->where(['uid' => '[a-zA-Z0-9]+'])
    ->middleware('guest')
    ->name('web.otp'); 

Route::post('/otp', [ForgotPasswordController::class , 'otp_verify'])
    ->middleware('guest')
    ->name('otp.verify'); 


Route::get('/reset-password/{uid}', [ResetPasswordController::class, 'create'])
    ->where(['uid' => '[a-zA-Z0-9]+'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('reset.store');

Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/login/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);


Route::get('/otp', function () {
    return view('auth.otp'); 
}); 


Route::get('/account', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::put('/account/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/users-management', [UserController::class, 'index'])->name('users-management')->middleware(['auth']);

Route::put('/users-nominate/{user}', [UserController::class, 'nominate'])->name('user.nominate')->middleware(['auth', 'admin']); 
Route::put('/users-denominate/{user}', [UserController::class, 'denominate'])->name('user.denominate')->middleware(['auth', 'admin']); 

Route::prefix('socials')->group(function () {
    Route::get('/', [SocialController::class, 'index'])->name('socials'); 
})->middleware('auth'); 

Route::middleware(['auth'])->prefix('transactions')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/create', [TransactionController::class, 'create'])->name('transactions.create'); 
    Route::post('/store', [TransactionController::class, 'store'])->name('transactions.store'); 

    Route::get('/{token}', [TransactionController::class, 'show'])->where([
        'token' =>'[a-zA-Z0-9]+'
    ])->name('transaction.show'); 

    Route::post('/search', [TransactionController::class, 'search'])->name('transactions.search'); 

    Route::put('/update/{transaction}', [TransactionController::class, 'update'])->name('transaction.update'); 
    Route::delete('/unconfirm/{transaction}', [TransactionController::class, 'destroy'])->name('transaction.delete'); 
}); 

Route::get('/deposit', [TransactionController::class, 'deposit'])->middleware('auth')->name('deposit'); 

Route::middleware(['auth', 'admin'])->prefix('providers')->group(function() {

    Route::get('/', [ProviderController::class , 'index'])->name('providers'); 
}); 