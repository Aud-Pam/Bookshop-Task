<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genres;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{

//    public function __construct()
//    {
//    $this->middleware('isAdmin');
//    }

    public function index()
    {
        $items=Book::orderBy('created_at', 'desc')->with('author')->simplePaginate(25);
        return view('admin/dashboard',compact('items'));
    }

    public function activate($id)
    {
        $book=Book::findOrFail($id);
        if($book->active !== 0){
            $result=$book->update(['active'=>0]);

        }else{
            $result=$book->update(['active'=>1]);
            if($book->active_at == null){
                $result=$book->update(['active_at'=>Carbon::now()]);
            }
        }

        if($result){
            return redirect()->route('admin.dashboard')
                ->with(['success'=>'Successfuly Updated']);
        }else{
            return redirect()->route('admin.dashboard')->withErrors(['msd'=>'Error on save date'])->withInput();
        }



    }


    public function edit($id)
    {
        $genres=Genres::all();
        $book=Book::findOrFail($id);

        return view('admin/edit', compact('book','genres'));
    }



    public function update (EditBookRequest $request, $id)
    {
        //dd($request);
        $book=Book::find($id);

        if(empty($book)){
            return back()->withInput();
        }

        $inputs=$request->except(['author','genres']);



        if($request->file('file')!==null){
            $file= $request->file('file');
            $destinationPath = public_path('/storage/images');
            $file_name=$book->user_id .'_'.time().'_'.$file->getClientOriginalName();
            $file->move($destinationPath,$file_name);
        }else{
            $file_name= $book->file;
        }

        $result=$book->update(['file'=>$file_name]+$inputs);


        //DELETE FILE NOT WORK


        $input_authors=Str::of($request->input('author'))->trim()->explode(',');
        $book->author()->detach();
        foreach ($input_authors as $author){
            $author_id=Author::updateOrCreate(['name'=>$author]);//check
            $book->author()->attach($author_id->id); //attach author_id and book_id on author_book table

        }


        $book->genre()->sync($request->genres);

        if($result){
            return back()
                ->with(['success'=>'Book Updated !!!']);
        }else{
            return back()->withErrors(['msd'=>'Error on save date'])->withInput();
        }


    }
}
