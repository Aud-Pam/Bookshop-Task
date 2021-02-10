<?php

namespace Database\Factories;

use App\Models\Authors;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Authors::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
