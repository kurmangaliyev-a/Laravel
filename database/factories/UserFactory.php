<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'patronymic' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'number' => $this->faker->randomDigit,
            'password' =>md5($this->faker->password()) , // password
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTimeBetween('-30 days', '-1 days'),
            'updated_at' => $this->faker->dateTimeBetween('-30 days', '-1 days'),
        ];
    }
}
