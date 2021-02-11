<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable =
        [

            'user_id',
            'title',
            'file',
            'description'
        ];

    public function author()
    {
        return $this->belongsToMany(Author::class,'author_book','book_id','author_id');

    }

//'authors_stores','authors_id','books_id'
}
