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

use App\Http\Controllers\Auth\AuthController as AuthController;


Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

Route::get('/forgotpassword', function () {
    return view('auth.forgotpass');
})->name('forgotpass');

Route::get('/setPassword', [AuthController::class,'setPassword'])->name('setPassword');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/updatepassword', [AuthController::class, 'updatePassword'])->name('updatepassword');
Route::post('/forgotpassword', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');



Route::get('/home', function () {
    return view('home.index');
})->name('home')->middleware(['auth']);
Route::get('/', function () {
    return view('home.index');
})->name('home')->middleware(['auth']);
