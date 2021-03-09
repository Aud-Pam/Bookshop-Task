<?php

namespace App\Http\Livewire;

use App\Models\Reviews;
use Livewire\Component;

class RatingAverage extends Component
{
    protected $listeners = ['ratingUpdated' => 'updateRating'];
    public $book_id;
    public $book_rating;

    public function mount()
    {
        $this->book_rating = Reviews::where('book_id', $this->book_id)->avg('rating');
    }

    public function render()
    {
        return view('livewire.rating-average');
    }

    public function updateRating($id)
    {
        $this->book_rating = Reviews::where('book_id', $id)->avg('rating');
    }

}
