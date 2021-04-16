<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/shop/{product}',[ShopController::class,'show'])->name('shop.show');
Route::get('/cart',[CartController::class,'index']);
Route::post('/cart',[CartController::class,'store'])->name('cart.post');
Route::post('/cartsingle',[CartController::class,'store']);
Route::delete('/cart/{product}',[CartController::class,'destroy'])->name('cart.destroy');
Route::post('/cartupdate/{product}',[CartController::class,'update']);
Route::get('/checkout',[CheckoutController::class,'index'])->middleware('auth');
Route::post('/checkout',[CheckoutController::class,'store']);
Route::get('/guestcheckout',[CheckoutController::class,'index']);

Route::get('empty',function(){
	Cart::destroy();
});

Route::get('showcart',function(){
	dd(Cart::content());
});

Route::get('forcelogout',function(Request $request){
	Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
});

Route::get('test',[TestController::class,'index']);
Route::get('test/{id}',[TestController::class,'index']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('search',[ShopController::class,'search'])->name('search');;
