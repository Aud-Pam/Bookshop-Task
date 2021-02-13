<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Author::factory(10)->create();
         \App\Models\Book::factory(30)->create();
         \App\Models\Reviews::factory(30)->create();


  //book_author table
    foreach(Book::all() as $books){
        $author_id=Author::inRandomOrder()->take(rand(1,10))->pluck('id');
        $books->author()->attach($author_id);

    }

    //fill genres table
        $genres_array=[];
        $genre_name='Genre #';
        for($i=1;$i<=10;$i++){
           $genres_array[]=
               [
            'name'=>$genre_name.$i
                ];
        }
        DB::table('genres')->insert($genres_array);
        //fill genre_book table
        foreach(Book::all() as $books){
            $genre_id=Author::inRandomOrder()->take(rand(1,10))->pluck('id');
            $books->genre()->attach($genre_id);

        }
    }


}
