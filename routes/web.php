<?php

use Illuminate\Support\Facades\Auth;
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


//Route::get('/', function () {
//    return view('welcome');
//
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//
Route::get('/', ([\App\Http\Controllers\Shop\BookShopController::class, 'showBooks']))->name('index');
Route::get('/show/{id}', ([\App\Http\Controllers\Shop\BookShopController::class, 'show']))->name('book.view');
Route::get('/search', ([\App\Http\Controllers\Shop\BookSearch::class, 'show']))->name('search');
Route::get('show/checkout/{id}', ([\App\Http\Controllers\Shop\CheckOutController::class, 'show']))->name('checkout');
Route::post('show/checkout/{id}/purchase/',([\App\Http\Controllers\Shop\CheckOutController::class,'purchase']))->name('book.purchase');

//API
//Route::get('api/v1/books',([\App\Http\Controllers\Api\BookController::class, 'index']))->name('api.v1.books');
//Route::get('api/v1/books/{book}',[\App\Http\Controllers\Api\BookController::class,'show']);

//Route::apiResource('books',\App\Http\Controllers\Api\BookController::class)
//    ->only('index','show');

Route::group(['prefix' => 'shop', 'as' => 'shop.','middleware'=>'auth'], function () {
    Route::get('/book/notifications', ([\App\Http\Controllers\Shop\BookShopController::class, 'showNotifications']))->name('book.notifications');
    Route::put('/book/report/{id}', ([\App\Http\Controllers\Shop\BookShopController::class, 'reportBook']))->name('book.report');
    Route::get('/dashboard', ([\App\Http\Controllers\Shop\BookShopController::class, 'index']))->name('dashboard');
    Route::put('/user/settings', ([\App\Http\Controllers\Shop\UserSettings::class, 'updatePass']))->name('password.update');
    Route::put('/book/review/store/{id}', ([\App\Http\Controllers\Shop\BookShopController::class, 'storeReview']))->name('store.review');
    Route::resource('books', \App\Http\Controllers\Shop\BookShopController::class);
    Route::resource('/user/settings', \App\Http\Controllers\Shop\UserSettings::class);
});


Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'isAdmin'],function () {
    route::get('dashboard', ([\App\Http\Controllers\Admin\AdminController::class, 'index']))
    ->name('dashboard');
    route::put('dashboard/activate/{id}', ([\App\Http\Controllers\Admin\AdminController::class, 'activate']))
    ->name('dashboard.activate');
    route::get('dashboard/book/edit/{id}', ([\App\Http\Controllers\Admin\AdminController::class, 'edit']))
    ->name('dashboard.book.edit');
    route::put('dashboard/book/update/{id}', ([\App\Http\Controllers\Admin\AdminController::class, 'update']))
    ->name('dashboard.book.update');
});

require __DIR__ . '/auth.php';
