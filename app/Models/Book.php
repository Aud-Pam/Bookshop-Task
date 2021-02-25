<?php

namespace App\Models;

//use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
            'price_discount'
        ];

    protected $casts = [
        'data' => 'array',
    ];

    public function checkGenre($genre_id, $book_collection)
    {
        foreach ($book_collection as $item) {
            if ($item->pivot->genre_id == $genre_id) {
                return 'checked';
            }
        }
    }

    public function authorList($collection)
    {
        foreach ($collection as $item) {
            $newArray[] = $item['name'];
        }
        return implode(',', $newArray);
    }

    public function genreList($collection)
    {
        foreach ($collection as $item) {
            $newArray[] = $item['name'];
        }
        return implode(',', $newArray);
    }

    public function author()
    {
        return $this->belongsToMany(Author::class)
            ->withTimestamps();
    }

    public function genre()
    {
        return $this->belongsToMany(Genres::class, 'genre_book', 'book_id', 'genre_id')
            ->withTimestamps()->withPivot('genre_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function review()
    {
        return $this->hasMany(Reviews::class, 'book_id','id')->latest();
    }

    public function getDiscountedPriceAttribute()
    {
        return $this->price * (1 - $this->price_discount / 100);
    }

    public function getDataDifferenceAttribute()
    {
        $date = Carbon::parse($this->active_at);
        if ($date->diffInDays() < 7) {
            return 'NEW';
        } else {
            return '';
        }
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }


}
