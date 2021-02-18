<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Roles;
use App\Models\User;
use Carbon\Carbon;
use Database\Factories\UserAdminFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

            $data=([
                new Roles(['id'=>'1','name'=>'admin']),
                new Roles(['id'=>'2','name'=>'user']),
                ]);
            foreach ($data as $item){
                $item->save();
            }



            ///Create admin login
        $date = Carbon::create(2015, 5, 28, 0, 0, 0);
        $admin_data= [
            'name' => 'PonasMakaronas',
            'role_id'=>'1',
            'birth_day'=>$date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
        ];
        $admin=new User($admin_data);
        $admin->save();



        ///------------------



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
