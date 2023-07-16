<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [UserController::class, 'login'])->name('login');


Route::controller(UserController::class)->group(function () {
    Route::post('add/user', 'store');
    Route::get('users', 'index');
    Route::get('edit/user/{id}', 'edit');
    Route::post('update/user/{id}', 'update');
    Route::get('delete/user/{id}', 'destroy');
});

Route::controller(CategoryController::class)->group(function () {
    Route::post('add/category', 'store');
    Route::get('category', 'index');
    Route::get('edit/category/{id}', 'edit');
    Route::post('update/category/{id}', 'update');
    Route::get('delete/category/{id}', 'destroy');
});

Route::controller(ProductController::class)->group(function () {
    Route::post('add/product', 'store');
    Route::get('product', 'index');
    Route::get('edit/product/{id}', 'edit');
    Route::post('update/product/{id}', 'update');
    Route::get('delete/product/{id}', 'destroy');
});

Route::controller(SettingsController::class)->group(function () {
    Route::post('add/setting', 'store');
    Route::get('settings', 'index');
    Route::get('edit/setting/{id}', 'edit');
    Route::post('update/setting/{id}', 'update');
    Route::get('delete/setting/{id}', 'destroy');
});