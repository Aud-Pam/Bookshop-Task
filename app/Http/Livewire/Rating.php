<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class Rating extends Component
{
    public $book_item;
    public $rating;
    public $description;
    public $success = false;

    public function mount()
    {
        $this->book_item = Book::findOrfail(request('id'));
    }

    public function render()
    {
        $book = $this->book_item->review()->with('user')->get();
        return view('livewire.rating', compact('book'));
    }

    public function createRate($book_id)
    {
        $this->validate([
            'description'=>'required|max:255',
            'rating'=>'required'
        ]);

        Auth()->user()->review()->create([
            'book_id' => $book_id,
            'description' => $this->description,
            'rating' => $this->rating
        ]);

        $this->success = true;
        $this->emit('ratingUpdated', $book_id);
    }
}
