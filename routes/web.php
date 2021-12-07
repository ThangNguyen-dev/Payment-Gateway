<?php

use App\Http\Controllers\Auth\AuthController as AuthController;
use App\Http\Controllers\ManageApiController;
use App\Http\Controllers\UserController;
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


Route::get('/auth',[\App\Http\Controllers\Auth\ClientController::class, "index"]);
Route::get('/redirect',function (){
    $url = (session()->get('redirect'));
    $url = str_replace("'", "", $url);
    return redirect()->away($url);
})->name('redirect');

Route::post('/auth/login',[\App\Http\Controllers\Auth\ClientController::class,'login'])->name('auth.login');

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

Route::resource('/user', UserController::class)->middleware(['auth']);

Route::get('/forgotpassword', function () {
    return view('auth.forgotpass');
})->name('forgotpass');

Route::get('/setPassword', [AuthController::class, 'setPassword'])->name('setPassword');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/updatepassword', [AuthController::class, 'updatePassword'])->name('updatepassword');
Route::post('/forgotpassword', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/transfer', function () {
    return view('transaction.transfer');
})->name('transfer')->middleware(['auth']);
Route::post('/transfermoney', [\App\Http\Controllers\TransactionController::class, 'transfermoney'])->name('transfermoney')->middleware(['auth']);
Route::post('/bank', [\App\Http\Controllers\TransactionController::class, 'transferMoneyFromBank'])->name('transfermoneyfrombank')->middleware(['auth']);

Route::post('/getuser', [\App\Http\Controllers\TransactionController::class, 'getuser'])->name('getter');
Route::get('transaction/bank', [\App\Http\Controllers\TransactionController::class, 'bank'])->middleware(['auth'])->name('bank');

Route::resource('/api',ManageApiController::class);
Route::resource('notification', \App\Http\Controllers\NotificationController::class)->middleware(['auth']);
Route::resource('transaction', \App\Http\Controllers\TransactionController::class)->middleware(['auth']);

Route::get('/home', function () {
    return view('home.index');
})->name('home');
Route::get('/', function () {
    return view('home.index');
})->name('home');
