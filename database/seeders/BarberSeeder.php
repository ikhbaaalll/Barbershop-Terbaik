<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\Capster;
use Illuminate\Database\Seeder;

class BarberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barber::factory()->count(6)->create()->each(function ($barber) {
            Capster::factory()->count(rand(3, 6))->for($barber)->create();
        });
    }
}
