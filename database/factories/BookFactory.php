<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title=$this->faker->sentence(rand(3,8),true);
        $description=$this->faker->realText(rand(300,1000));
        $active=rand(1,5)>1;
        $active_at=now();
        $data=[

            'user_id'=>(rand(1,5)==5)?1:2,
            'active'=>$active,
            'active_at'=>$active_at,
            'title'=>$title,
            'description'=>$description,
            'file'=>'test.jpg',
            'price'=>rand(3,50),
            'price_discount'=>rand(10,20),
        ];
        return $data;

    }
}
