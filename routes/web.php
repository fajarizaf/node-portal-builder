<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CredentialController;

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

Route::get('oauth/google', [OauthController::class, 'redirectToProvider'])->name('oauth.google');  
Route::get('oauth/google/callback', [OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');

Route::get('/login', [CredentialController::class, 'login'])->name('login');
Route::get('/register', [CredentialController::class, 'register'])->name('register');

Route::post('/auth/login', [CredentialController::class, 'auth_login'])->name('auth_login');
Route::get('/auth/logout', [CredentialController::class, 'auth_logout'])->name('auth_logout');

// order
Route::get('/order/{product_id}', [OrderController::class, 'order']);
Route::get('/order/payment/{invoices_id}', [OrderController::class, 'payment_select']);
Route::post('/order/payment', [OrderController::class, 'payment_proccess']);
Route::post('/order-proccess', [OrderController::class, 'order_proccess']);
Route::post('/order/switch', [OrderController::class, 'order_switch_product']);

// tes pg
Route::get('/duitku/get_payment_method', [OrderController::class, 'duitku_payment_method']);
Route::get('/duitku/create_invoices', [OrderController::class, 'duitku_create_invoices']);

// callback payment gateway
Route::post('callback/payment', [CallbackController::class, 'paymentCallback']);



Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [CredentialController::class, 'index'])->name('index');

    // checkout
    Route::get('/checkout/{product_id}', [CheckoutController::class, 'checkout']);
    Route::post('/checkout/{product_id}', [CheckoutController::class, 'checkout']);
    Route::post('/checkout-proccess', [CheckoutController::class, 'checkout_proccess']);
    Route::post('/switch', [CheckoutController::class, 'checkout_switch_product']);

    // route builder website
    Route::get('/site/build/{order_number}', [SiteController::class, 'build_website'])->name('build_website');
    Route::post('/site/create_subdomain', [SiteController::class, 'create_subdomain'])->name('create_subdomain');
    Route::post('/site/create_database', [SiteController::class, 'create_database'])->name('create_database');
    Route::post('/site/create_ssl', [SiteController::class, 'create_ssl'])->name('create_ssl');
    Route::post('/site/create_cms', [SiteController::class, 'create_cms'])->name('create_cms');
    Route::post('/site/setup_cms', [SiteController::class, 'setup_cms'])->name('setup_cms');

    
    // subscription management
    Route::get('/manage/subscription', function () {
        return view('pages.manage.subscriptions');
    });

    // site management
    Route::get('/manage', [HomeController::class, 'index']);
    Route::get('/manage/site', [SiteController::class, 'index']);

    // store
    Route::get('/store', [StoreController::class, 'index']);
    Route::get('/store/settings/{site}', [StoreController::class, 'settings']);
    Route::get('/store/order/{site}', [StoreController::class, 'order']);
    Route::get('/store/payment/{site}', [StoreController::class, 'payment']);
    Route::post('/store/payment', [StoreController::class, 'payment']);

    Route::post('/store/uploadlogo', [StoreController::class, 'persona_logo'])->name('uploadlogo');
    Route::post('/store/setcolor', [StoreController::class, 'persona_color'])->name('set_color');
    Route::post('/store/setdisplay', [StoreController::class, 'persona_display'])->name('set_display');

    // product management
    Route::get('/manage/product',[ProductController::class, 'index']);
    Route::get('/manage/product/detail/{product_id}',[ProductController::class, 'detail']);
    Route::post('/manage/product/add',[ProductController::class, 'add']);
    Route::post('/manage/product/update',[ProductController::class, 'update']);

    //order
    Route::get('/manage/order',[OrderController::class, 'list']);

    // my billing
    Route::get('/manage/tagihan',[BillingController::class, 'tagihan']);
    Route::get('/manage/penarikan',[BillingController::class, 'penarikan']);
    Route::post('/manage/penarikan/add_rekening',[BillingController::class, 'add_rekening']);
    Route::post('/manage/penarikan/update_rekening',[BillingController::class, 'update_rekening']);
    Route::post('/manage/penarikan/add',[BillingController::class, 'request_penarikan']);

    //settings
    Route::get('/manage/profile',[SettingsController::class, 'profile']);
    Route::post('/manage/profile',[SettingsController::class, 'profile']);
    Route::get('/manage/profile/verifikasi',[SettingsController::class, 'verifikasi']);
    Route::post('/manage/profile/verifikasi/submit',[SettingsController::class, 'verifikasi']);

});

Route::get('/manage/site/snapshoot', [SiteController::class, 'run_snapshoot'])->name('run_snapshoot');
Route::get('/store/mobile/snapshoot', [StoreController::class, 'run_store_mobile_snapshoot'])->name('run_store_mobile_snapshoot');
Route::get('/store/laptop/snapshoot', [StoreController::class, 'run_store_laptop_snapshoot'])->name('run_store_laptop_snapshoot');
