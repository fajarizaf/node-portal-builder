<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

Route::get('/checkout/{product_id}', [OrderController::class, 'checkout']);
Route::post('/checkout/{product_id}', [OrderController::class, 'checkout']);
Route::post('/switch', [OrderController::class, 'switch']);

Route::get('/build', function () {
    return view('pages.frond.building');
});

Route::get('/manage', function () {
    return view('pages.manage.subscriptions');
});


Route::get('/manage/product',[ProductController::class, 'list']);
Route::post('/manage/product/add',[ProductController::class, 'add']);

Route::get('/', function () {
    return view('index');
});
