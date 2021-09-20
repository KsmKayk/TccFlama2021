<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use App\Models\Administrator;
use Illuminate\Support\Facades\Auth;
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
    return view('dev/welcome');
})->name('home');
Route::get('/signin', [AuthController::class, 'showSignin']);
Route::post('/signin', [AuthController::class, 'signin']);

Route::get('/signup', [AuthController::class, 'showSignup']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/signout', function () {
    Auth::logout();
    return redirect()->route('home');
});

Route::get('/protected', function () {
    $user = auth()->user();
    return view('dev/protected', compact('user'));
})->name('home_protected')->middleware('auth');

Route::get('/admin', function () {

    return view('admin/home');
})->middleware(['auth', 'adminAuth']);
