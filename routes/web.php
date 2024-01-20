<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class,'redirect' ]);
Route::get('UserPage',[HomeController::class,'index']);

Route::get('UserPage',[AdminController::class,'view_category' ])->name('Category');
Route::post('addCategory',[AdminController::class,'addCategory' ])->name('addCategory');
Route::get('delete/{id}',[AdminController::class,'deleteCategory' ])->name('deleteCategory');
Route::get('/product',[ProductController::class,'product' ])->name('product');
Route::post('AddProduct',[ProductController::class,'AddProduct' ])->name('AddProduct');
Route::get('showProduct',[ProductController::class,'ShowProduct' ])->name('ShowProduct');
Route::get('deleteProduct/{id}',[ProductController::class,'deleteProduct' ])->name('deleteProduct');
Route::get('EditProduct/{id}',[ProductController::class,'EditProduct' ])->name('EditProduct');
Route::post('updateProduct/{id}',[ProductController::class,'updateProduct' ])->name('updateProduct');
Route::get('ProductDetails/{id}',[ProductController::class,'ProductDetails' ])->name('ProductDetails');
Route::post('AddCart/{id}',[ProductController::class,'AddCart' ])->name('AddCart');
Route::get('ShowCart',[ProductController::class,'ShowCart' ])->name('ShowCart');
Route::get('removeCart/{id}',[ProductController::class,'removeCart' ])->name('removeCart');
Route::get('CashOrder',[ProductController::class,'CashOrder' ])->name('CashOrder');
Route::get('stripe/{totalPrice}',[ProductController::class,'stripe' ])->name('stripe');
Route::post('stripe/{totalPrice}', [HomeController::class, 'stripePost'])->name('stripe.post');
