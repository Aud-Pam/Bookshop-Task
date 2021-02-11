<?php

namespace App\Http\Controllers\Shop;

//use App\Http\Controllers\Shop;
//use Illuminate\Http\Request;

use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;

class BookShopController extends BaseController
{

    public function index()
    {

        $items=Book::with('author')->simplePaginate(25);


      //dd($items);
        return view('shop.products.home',compact('items'));
    }


}
