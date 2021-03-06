<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::active()->with('author','genre')->Paginate(25);
        return BookResource::collection($books);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

//    public function  store(request  $request){
//    $book=Book::create($request->all());
//    return new BookResource($book);
//    }
}
