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

//API
Route::get('api/v1/books',([\App\Http\Controllers\Api\BookController::class, 'index']))->name('api.v1.books');
Route::get('api/v1/books/{book}',[\App\Http\Controllers\Api\BookController::class,'show']);

Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
    $methods = ['edit', 'store', 'update', 'create', 'destroy', 'reportBook'];
    $methods_user = ['index', 'update', 'updatePass'];
    Route::get('/book/notifications', ([\App\Http\Controllers\Shop\BookShopController::class, 'showNotifications']))->name('book.notifications')->middleware('auth');
    Route::put('/book/report/{id}', ([\App\Http\Controllers\Shop\BookShopController::class, 'reportBook']))->name('book.report')->middleware('auth');
    Route::get('/dashboard', ([\App\Http\Controllers\Shop\BookShopController::class, 'index']))->name('dashboard')->middleware('auth');
    Route::put('/user/settings', ([\App\Http\Controllers\Shop\UserSettings::class, 'updatePass']))->name('password.update')->middleware('auth');
    Route::put('/book/review/store/{id}', ([\App\Http\Controllers\Shop\BookShopController::class, 'storeReview']))->name('store.review')->middleware('auth');

    Route::resource('books', \App\Http\Controllers\Shop\BookShopController::class)->only($methods)->middleware('auth');
    Route::resource('/user/settings', \App\Http\Controllers\Shop\UserSettings::class)->only($methods_user)->middleware('auth');
});


route::get('admin/dashboard', ([\App\Http\Controllers\Admin\AdminController::class, 'index']))
    ->name('admin.dashboard')->middleware('isAdmin');
route::put('admin/dashboard/activate/{id}', ([\App\Http\Controllers\Admin\AdminController::class, 'activate']))
    ->name('admin.dashboard.activate')->middleware('isAdmin');
route::get('admin/dashboard/book/edit/{id}', ([\App\Http\Controllers\Admin\AdminController::class, 'edit']))
    ->name('admin.dashboard.book.edit')->middleware('isAdmin');
route::put('admin/dashboard/book/update/{id}', ([\App\Http\Controllers\Admin\AdminController::class, 'update']))
    ->name('admin.dashboard.book.update')->middleware('isAdmin');


//$route_group=[
//    'namespace'=>'Shop\Admin',
//    'prefix'=>'blog/admin'
//];
require __DIR__ . '/auth.php';
