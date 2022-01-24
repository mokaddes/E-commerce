<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'create']);
Route::post('register', [LoginController::class, 'login']);
Route::get('users', function () {
    return User::all();
});

// Route::resource('categories', CategoryController::class);
// Route::get('categories', [CategoryController::class, 'index']);

Route::get('categories', function () {
    return Category::all();
});
Route::post('categories', function (array $data) {
    return Category::create([
        'name'=> $data['name'],
    ]);
});

