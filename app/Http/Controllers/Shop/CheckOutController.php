<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function show(Request $request){
        $book=Book::findOrFail($request->id);
        $api_key = env('STRIPE_KEY');
       // dd($api_key);
//        $intent=createSetupIntent();
        return view('shop/products/checkout', compact('book','api_key'));
    }
    public function purchase(Request $request){
        dd($request);
    }
}
