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
        $open1  = '07:59:00';
        $open2  = '10:00:00';
        $close1 = '20:29:00';
        $close2 = '22:00:00';
        
        return [
            'user_id' => User::factory()->create(['role' => User::ROLE_OWNER]),
            'name' => $this->faker->company(),
            'photo' => asset('images/PageBG/LPBG' . rand(0, 6) . '.jpg'),
            'address' => $this->faker->address(),

            // 'open' => $this->faker->time(),
            // 'close' => $this->faker->time(),

            'open' => $this->faker->dateTimeBetween($open1, $open2),
            'close' => $this->faker->dateTimeBetween($close1, $close2),

            'price' => abs(round((rand(10_000, 50_000) + 500), -3))
        ];
    }
}
