<?php

use App\Http\Controllers\ProductController;
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

Route::middleware(['auth'])->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name("product");
        Route::post('/product', 'insert')->name("product.insert");
        Route::get('/product/add', 'add')->name("product.add");
        Route::get('/product/{id}', 'edit')->where(['id' => '[A-Za-z0-9]+'])->name("product.edit");
        Route::post('/product/{id}', 'update')->where(['id' => '[A-Za-z0-9]+'])->name("product.update");
        Route::delete('/product/{id}', 'delete')->where(['id' => '[A-Za-z0-9]+'])->name('product.delete');
    });
});
