<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\Capster;
use App\Models\Facility;
use App\Models\Order;
use App\Models\Service;
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
            Capster::factory()->count(rand(3, 6))->for($barber)->create()
                ->each(function ($capster) use ($barber) {
                    Order::factory()->for($barber)->for($capster)->count(rand(1, 3))->create();
                });
            Service::factory()->count(rand(3, 5))->for($barber)->create();
            Facility::factory()->count(rand(3, 5))->for($barber)->create();
        });
    }
}
