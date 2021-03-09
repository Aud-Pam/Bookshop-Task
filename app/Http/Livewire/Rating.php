<?php

namespace App\Http\Livewire;

use App\Http\Requests\RatingRequest;
use App\Models\Book;
use Livewire\Component;

class Rating extends Component
{
    public $book;
    public $rating;
    public $description;
    public $success = false;

    protected $rules = [
        'description' => 'required|max:255',
        'rating' => 'required'
    ];

    public function render()
    {
        $reviews = $this->book->reviews()->with('user')->get();
        return view('livewire.rating', compact('reviews'));
    }

    public function createRate($book_id)
    {
        $this->validate();

        auth()->user()->reviews()->create([
            'book_id' => $book_id,
            'description' => $this->description,
            'rating' => $this->rating
        ]);

        $this->success = true;
        $this->emit('ratingUpdated', $book_id);
    }
}
