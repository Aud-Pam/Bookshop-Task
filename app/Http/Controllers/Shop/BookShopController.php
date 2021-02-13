<?php

namespace App\Http\Controllers\Shop;

//use App\Http\Controllers\Shop;


use App\Http\Requests\StoreBookRequest;
use App\Models\Genres;
use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class BookShopController extends BaseController
{

    public function index()
    {

        $items=Book::with('author')->simplePaginate(25);


      //dd($items);
        return view('shop.products.home',compact('items'));
    }


    public function create()
    {
       // dd(__METHOD__);
        $user=Auth::user();
        $items=Author::all();
        $genres=Genres::all();

        return view('shop.products.create',compact('genres','items','user'));
    }

    public function store(StoreBookRequest $request)
    {
        $user_id=Auth::user()->id; //get user id
        $inputs=$request->except(['author']); // get inputs without authors
        $file= $request->file('file');
        $destinationPath = public_path('/storage/images');
        $file_name=$user_id .'_'.time().'_'.$file->getClientOriginalName();
        $file->move($destinationPath,$file_name);
        $book=new Book(['user_id'=>$user_id,'file'=>$file_name]+$inputs);
        $book->save();//save new book

        $input_authors=Str::of($request->input('author'))->explode(','); // explode comma on authors inputs

       foreach ($input_authors as $author){
               $author_id=Author::updateOrCreate(['name'=>$author]);//check
                $book->author()->attach($author_id->id); //attach author_id and book_id on author_book table

           }

        //only the IDs in the given array will exist in the intermediate table:
        $book->genre()->sync($request->genres);




        if($book){
            return redirect()->route('dashboard')
                ->with(['success'=>'Please wait while Administrator confirm the new Book']);
        }else{
            return redirect()->route('shop.book.create',$book->id)->withErrors(['msd'=>'Error on save date'])->withInput();
        }


    }


}
