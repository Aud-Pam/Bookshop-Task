<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = Carbon::create(2015, 5, 28, 0, 0, 0);


        return [
            'name' => $this->faker->name,
            'role_id'=>'2',
            'birth_day'=>$date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
