<?php

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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//


    Route::group(['prefix'=>'shop', 'as'=>'shop.'],function(){
        $methods=['edit','store','update','create','destroy'];
        $methods_user=['index','update','updatePass'];
        Route::get('/dashboard',([\App\Http\Controllers\Shop\BookShopController::class,'index']))->name('dashboard')->middleware('auth');
        Route::put('/user/settings',([\App\Http\Controllers\Shop\UserSettings::class,'updatePass']))->name('password.update')->middleware('auth');
        Route::resource('books',\App\Http\Controllers\Shop\BookShopController::class)->only($methods)->middleware('auth');
        Route::resource('/user/settings',\App\Http\Controllers\Shop\UserSettings::class)->only($methods_user)->middleware('auth');
});


//$route_group=[
//    'namespace'=>'Shop\Admin',
//    'prefix'=>'blog/admin'
//];
require __DIR__.'/auth.php';
