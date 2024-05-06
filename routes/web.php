<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/event', [HomeController::class, 'show']);



    Route::resource('category', categoryController::class);
    Route::get('category/export/{category}', [categoryController::class, 'export'])->name('category.export');

    Route::resource('product', ProductController::class);



    Route::group([
        'middleware' => ['role:Admin']
    ], function () {
        Route::resource('user', UserController::class);
    });
});
