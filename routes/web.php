<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-product', [ProductController::class, 'create'])->name("create-product");
Route::post('/create-product', [ProductController::class, 'store'])->name("store-product");
Route::get('/list-product', [ProductController::class, 'list'])->name("list-product");
Route::delete('/delete-product/{product}', [ProductController::class, 'delete'])->name("delete-product");
