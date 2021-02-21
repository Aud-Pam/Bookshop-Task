<?php

namespace App\Http\Controllers\Shop;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BookSearch extends BaseController
{
    //


    public function show(Request $request)
    {
//        dd($request->search);
        $search=$request->search;
      //  dd($search);
        $items=Book::active()->with('author')->where(function ($query) use ($search){
            $query->where('title','LIKE','%'.$search.'%');

            $query->orWhereHas('author',function ($query) use ($search){
               $query->where('name','LIKE','%'.$search.'%') ;
            });


        })->simplePaginate();

       Cookie::queue('search', $search,15);
       $value = Cookie::get('search');
   return view('search',compact('items','value'));

    }
}
