<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(['role' => User::ROLE_OWNER]),
            'name' => $this->faker->company(),
            'photo' => asset('images/PageBG/LPBG' . rand(0, 6) . '.jpg'),
            'address' => $this->faker->address()
        ];
    }
}
