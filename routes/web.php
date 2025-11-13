<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;

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


Route::group(["prefix"=>"auth"], function(){
    Route::get('register',[RegisterController::class,'showregistrationform'])->name('registerform');

    Route::Post('register',[RegisterController::class,'register'])->name('register');

    Route::get('login',[LoginController::class,'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

});




Route::get('/', [ProductController::class, 'index'])->name('products.index'); // Home page = user list
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

// Route::get('/search', 'ProductController@search')->name('products.search');




// Route::get('/', function () {
//     return view('welcome');
// });
