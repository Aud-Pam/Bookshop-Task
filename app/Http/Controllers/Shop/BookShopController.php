<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\EditBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genres;
use App\Models\Reviews;
use App\Models\User;
use App\Notifications\ReportBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class BookShopController extends BaseController
{
    public function index()
    {
        $items = Auth::user()->books()->latest()->get();

        return view('shop.products.dashboard', compact('items'));
    }

    public function showBooks()
    {
        $items = Book::where('active', '1')->with('author')->latest()->simplePaginate(25);

        return view('home', compact('items'));
    }

    public function show($id)
    {
        $book = Book::findOrfail($id);

        return view('view_book', compact('book'));
    }

    public function create()
    {
        $user = Auth::user();
        $items = Author::all();
        $genres = Genres::all();

        return view('shop.products.create', compact('genres', 'items', 'user'));
    }

    public function store(StoreBookRequest $request)
    {
        $user_id = auth()->id(); //get user id
        $inputs = $request->except(['author']); // get inputs without authors
        $file = $request->file('file');
        $destinationPath = public_path('/storage/images');
        $file_name = $user_id . '_' . time() . '_' . $file->getClientOriginalName();
        $file->move($destinationPath, $file_name);
        $book = Book::create(['user_id' => $user_id, 'file' => $file_name] + $inputs);
        $input_authors = Str::of($request->input('author'))->explode(','); // explode comma on authors inputs

        foreach ($input_authors as $author) {
            $author_id = Author::updateOrCreate(['name' => $author]); //check
            $book->author()->attach($author_id->id); //attach author_id and book_id on author_book table
        }

        $book->genre()->sync($request->genres); //only the IDs in the given array will exist in the intermediate table:

        if ($book) {
            return redirect()->route('shop.dashboard')
                ->with(['success' => 'Please wait while Administrator confirm the new Book']);
        } else {
            return redirect()->route('shop.book.create', $book->id)->withErrors(['msd' => 'Error on save date'])->withInput();
        }
    }

    public function edit($id)
    {
        $genres = Genres::all();
        $book = Book::findOrFail($id);

        return view('shop.products.edit', compact('book', 'genres'));
    }

    public function update(EditBookRequest $request, $id)
    {
        $user_id = Auth()->id();
        $book = Book::findOrFail($id);
        $inputs = $request->except(['author', 'genres']);

        if ($request->file('file') !== null) {
            $file = $request->file('file');
            $destinationPath = public_path('/storage/images');
            $file_name = $user_id . '_' . time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $file_name);
        } else {
            $file_name = $book->file;
        }

        $result = $book->update(['file' => $file_name] + $inputs);
        //DELETE FILE NOT WORK
        $input_authors = Str::of($request->input('author'))->trim()->explode(',');
        $book->author()->detach();
        foreach ($input_authors as $author) {
            $author_id = Author::updateOrCreate(['name' => $author]); //check
            $book->author()->attach($author_id->id); //attach author_id and book_id on author_book table
        }

        $book->genre()->sync($request->genres);

        if ($result) {
            return back()
                ->with(['success' => 'Book Updated !!!']);
        } else {
            return back()->withErrors(['msd' => 'Error on save date'])->withInput();
        }
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        if ($book) {
            return redirect()->route('shop.dashboard')
                ->with(['success' => 'DELETED ']);
        } else {
            return redirect()->route('shop.dashboard')->withErrors(['msd' => 'Error on save date'])->withInput();
        }
    }

    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|min:10|max:250',
            'rating' => 'required|numeric|min:1|max:5',
        ]);
        $user = Auth()->id();
        $review = Reviews::create(['user_id' => $user, 'book_id' => $id] + $request->input());

        if ($review) {
            return back()
                ->with(['success' => 'You add comment for this book']);
        } else {
            return back()->withErrors(['msd' => 'Error on save date'])->withInput();
        }
    }

    public function reportBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $request->validate(['text' => 'required|max:255']);
        $report = Auth::user()->notify(new ReportBook($book->title, $request->text));

        if (!$report) {
            return redirect()->route('book.view', $id)
                ->with(['success' => 'Report Send Successfuly']);
        } else {
            return redirect()->route('book.view', $id)->withErrors(['msd' => 'Error on save date'])->withInput();
        }
    }

    public function showNotifications()
    {
        return view('shop.products.notifications', [
            'notifications' => auth()->user()->unreadnotifications,
        ]);
    }
}

//file upload with #1
//        $image = $request->file('file');
//        $file_name  = time() . '.' . $image->getClientOriginalExtension();
//        $path = public_path('/storage/images' . $file_name);
//        Image::make($image->getRealPath())->resize(200, 200)->save($path);
//End
//file upload without crop #2

//$resizedImage = Image::make(public_path('uploads/covers/'.$filename))
//    ->fit(180, 280)->save();
//} else {
//    $filename = 'default.jpg';
