<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;
USE Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewslaterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductshowController;

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

// Route::get('/', function () {
//     return view('forntend.index');
// })->name('frontend');



Route::post('store/newslaters', [NewslaterController::class, 'store'])->name('news.store');

Auth::routes();
Route::resource('/', ProductshowController::class);
Route::resource('index', ProductshowController::class);
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('cart', [ProductshowController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductshowController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductshowController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductshowController::class, 'remove'])->name('remove.from.cart');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::post('/categories/search', [CategoryController::class, 'search'])->name('category.search');
    // Route::get('delete/categories/{id}', [CategoryController::class, 'destroy']);

    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('newslaters', NewslaterController::class);
    Route::resource('products', ProductController::class);
    Route::get('products/delete/{product}', [ProductController::class, 'delete']);
    Route::get('get/subcategory/{category_id}', function ($category_id) {
        $cat = DB::table('subcategories')->where('category_id', $category_id)->get();
        return json_encode($cat);
    });

    Route::get('inactive/product/{id}', [ProductController::class, 'inactive'])->name('products.inactive');
    Route::get('active/product/{id}', [ProductController::class, 'active'])->name('products.active');

});

