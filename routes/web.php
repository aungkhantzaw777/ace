<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\CouponShopController;
use App\Http\Controllers\ShopController;
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

Route::resource('shops', ShopController::class);
Route::resource('coupons', CouponController::class);
Route::get('coupons/{coupon_id}/shops', [CouponShopController::class,'shops']);
Route::post('/coupons/{coupon_id}/shops', [CouponShopController::class, 'store']);
Route::get('/coupons/{coupon_id}/shops/{shop_id}', [CouponShopController::class, 'shopcoupon']);
Route::delete('/coupons/{coupon_id}/shops/{shop_id}', [CouponShopController::class, 'destory']);

