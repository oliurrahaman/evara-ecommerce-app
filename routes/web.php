<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EvaraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOfferController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\WishListController;
use  App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EvaraController::class,'index'])->name('home');
//Route::get('/product-category', [EvaraController::class,'category'])->name('product-category');
Route::get('/product-category/{id}', [EvaraController::class,'category'])->name('product-category');
//Route::get('/product-detail', [EvaraController::class,'product'])->name('product-detail');
Route::get('/product-detail/{id}', [EvaraController::class,'product'])->name('product-detail');

//Route::post('/cart', [CartController::class,'addToCart'])->name('cart');

Route::resources(['cart' => CartController::class]);
Route::get('/cart/delete-product/{rowId}',[CartController::class,'delete'])->name('cart.delete');
Route::post('/cart/update-product',[CartController::class,'updateProduct'])->name('cart.update-product');

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/new-order',[CheckoutController::class,'newOrder'])->name('new-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');

Route::get('/login-register',[CustomerAuthController::class,'login'])->name('login-register');
Route::post('/login-check',[CustomerAuthController::class,'loginCheck'])->name('login-check');
Route::post('/new-customer',[CustomerAuthController::class,'newCustomer'])->name('new-customer');
Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer-logout');


Route::get('/my-dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');

//Wishlist
Route::resource('wishlist',WishListController::class);
Route::get('/wishlist-add/{id}',[WishListController::class,'wishListAdd'])->name('wishlist.add');





Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {


    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    //Resource Route for Category Controller
    //    Route::resources(['categories' => CategoryController::class]);
    Route::resource('category', CategoryController::class);
    Route::resource('sub-category', SubCategoryController::class);
    //Resource Route for Brand Controller
    Route::resource('brand', BrandController::class);
    //Resource Route for unit Controller
    Route::resource('unit', UnitController::class);

    Route::resource('color', ColorController::class);
    Route::resource('size', SizeController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product_offer', ProductOfferController::class);
    Route::resource('order', OrderController::class);

    Route::get('/get-sub-category-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('get-sub-category-by-category');





});
