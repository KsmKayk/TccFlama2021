<?php

use App\Http\Controllers\AdministratorsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CategoriesController;
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

//auth routes
Route::get('/signin', [AuthController::class, 'showSignin']);
Route::post('/signin', [AuthController::class, 'signin']);

Route::get('/signup', [AuthController::class, 'showSignup']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::post('/signout', function () {
    Auth::logout();
    return redirect()->route('home');
});
Route::get('/signout', function () {
    Auth::logout();
    return redirect()->route('home');
});

//tests

Route::get('/protected', function () {
    $user = auth()->user();
    return view('dev/protected', compact('user'));
})->name('home_protected')->middleware('auth');


//admin routes

Route::get('/admin', [AdministratorsController::class, 'showDashboard'])->middleware(['auth', 'adminAuth']);

Route::get('/admin/administrators', [AdministratorsController::class, 'index'])->middleware(['auth', 'adminAuth']);
Route::get('/admin/administrators/{id}/edit', [AdministratorsController::class, 'showEditAdm'])->middleware(['auth', 'adminAuth']);
Route::put('/admin/administrators/{id}/edit', [AdministratorsController::class, 'editAdm'])->middleware(['auth', 'adminAuth']);
Route::get('/admin/administrators/new', [AdministratorsController::class, 'showNewAdm'])->middleware(['auth', 'adminAuth']);
Route::post('/admin/administrators/new', [AdministratorsController::class, 'addNewAdm'])->middleware(['auth', 'adminAuth']);
Route::delete('/admin/administrators/{id}/delete', [AdministratorsController::class, 'delAdm'])->middleware(['auth', 'adminAuth']);

Route::get('/admin/categories', [CategoriesController::class, 'index'])->middleware(['auth', 'adminAuth']);
Route::get('/admin/categories/{id}/edit', [CategoriesController::class, 'showEditCategory'])->middleware(['auth', 'adminAuth']);
Route::put('/admin/categories/{id}/edit', [CategoriesController::class, 'editCategory'])->middleware(['auth', 'adminAuth']);
Route::get('/admin/categories/new', [CategoriesController::class, 'showNewCategory'])->middleware(['auth', 'adminAuth']);
Route::post('/admin/categories/new', [CategoriesController::class, 'addNewCategory'])->middleware(['auth', 'adminAuth']);
Route::delete('/admin/categories/{id}/delete', [CategoriesController::class, 'delCategory'])->middleware(['auth', 'adminAuth']);


Route::get('/admin/products', [ProductsController::class, 'index'])->middleware(['auth', 'adminAuth']);
Route::get('/admin/products/new', [ProductsController::class, 'showNewProduct'])->middleware(['auth', 'adminAuth']);
Route::post('/admin/products/new', [ProductsController::class, 'addNewProduct'])->middleware(['auth', 'adminAuth']);
Route::delete('/admin/products/{id}/delete', [ProductsController::class, 'removeProduct'])->middleware(['auth', 'adminAuth']);
Route::get('/admin/products/{id}/edit', [ProductsController::class, 'showEditProduct'])->middleware(['auth', 'adminAuth']);
Route::put('/admin/products/{id}/edit', [ProductsController::class, 'editProduct'])->middleware(['auth', 'adminAuth']);


Route::get('/admin/orders', [OrdersController::class, 'index'])->middleware(['auth', 'adminAuth']);
Route::get('/admin/orders/{id}/show', [OrdersController::class, 'showOrder'])->middleware(['auth', 'adminAuth']);
Route::get('/admin/orders/{id}/edit', [OrdersController::class, 'showEditOrder'])->middleware(['auth', 'adminAuth']);
Route::put('/admin/orders/{id}/edit', [OrdersController::class, 'editOrder'])->middleware(['auth', 'adminAuth']);
