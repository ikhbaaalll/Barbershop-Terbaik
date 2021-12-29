<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $owner = User::factory()->create([
            'email' => 'admin@admin.com',
            'role' => User::ROLE_OWNER
        ]);

        User::factory()->create([
            'email' => 'user@user.com',
        ]);

        Barber::factory()->for($owner)->create();

        $this->call(BarberSeeder::class);
    }
}
