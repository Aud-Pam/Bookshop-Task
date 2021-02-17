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
            'description',
            'price',
            'discount'
        ];


//    public function checkGenre($bookcollection,$genrecolection){
//    foreach ($bookcollection as $item){
//        if($genrecolection->contains($item->pivot->genre_id)){
//            // return 'checked';
//            echo 'yra';
//        }
//        //return '';
//
//    }
//
//}

    public function checkGenre($genre_id,$book_collection)
    {
        foreach ($book_collection as $item) {
            if ($item->pivot->genre_id == $genre_id) {
                return 'checked';
            }
        }
    }



    public function authorList($collection){
        foreach ($collection as $item){
            $newArray[]=$item['name'];
        }
        return implode(',',$newArray);
    }


    public function author()
    {
        return $this->belongsToMany(Author::class,'author_book','book_id','author_id')
            ->withTimestamps();

    }

    public function genre()
    {
        return $this->belongsToMany(Genres::class,'genre_book','book_id','genre_id')
            ->withTimestamps()->withPivot('genre_id');

    }

}
