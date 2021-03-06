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
        $role = array_rand(User::ROLES);
        $city = rand(0, 1) ? $this->faker->city : null;
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => $role,
            'rating' => rand(0, 100),
            'city' => $city,
            'address' => $city ? $this->faker->address : null,
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ];
    }
}
