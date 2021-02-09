<?php

namespace App\Http\Controllers\Shop;

//use App\Http\Controllers\Shop;
//use Illuminate\Http\Request;

class BookShopController extends BaseController
{

    public function index()
    {
        return view('shop.products.home');
    }


}
