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
            'discount',
            'active',
            'active_at',
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
    public function genreList($collection){
        foreach ($collection as $item){
            $newArray[]=$item['name'];
        }
        return implode(',',$newArray);
    }


    public function author()
    {
//        'author_book','book_id','author_id'
        return $this->belongsToMany(Author::class)
            ->withTimestamps();

    }

    public function genre()
    {
        return $this->belongsToMany(Genres::class,'genre_book','book_id','genre_id')
            ->withTimestamps()->withPivot('genre_id');

    }
    public function review()
    {
        return $this->hasMany(Reviews::class,'book_id','id');

    }



}
