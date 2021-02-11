<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

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

    foreach(Book::all() as $books){
        $author_id=Author::inRandomOrder()->take(rand(1,10))->pluck('id');
        $books->author()->attach($author_id);

    }
    }

}
