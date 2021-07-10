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

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/allProducts', [App\Http\Controllers\ProductController::class, 'index'])->name('allProducts');
Route::get('/newProduct', [App\Http\Controllers\ProductController::class, 'create'])->name('newProduct');
Route::post('/submitProduct', [App\Http\Controllers\ProductController::class, 'store'])->name('submitProduct');
Route::get('/viewProduct/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('viewProduct');
