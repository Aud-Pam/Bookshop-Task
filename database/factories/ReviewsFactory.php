<?php

namespace Database\Factories;

use App\Models\Reviews;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reviews::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id'=>(rand(1,5)==5)?1:2,
            'books_id'=>rand(1,20),
            'rating'=>rand(1,5),
            'description'=>$this->faker->realText(rand(100,300)),


        ];
    }
}
