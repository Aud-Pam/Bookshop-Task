<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genres;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    public function update(){

        dd(__METHOD__);

    }


}
