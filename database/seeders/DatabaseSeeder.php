<?php

namespace Database\Seeders;

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
        User::factory()->create([
            'email' => 'admin@admin.com',
            'role' => User::ROLE_OWNER
        ]);

        User::factory()->create([
            'email' => 'user@user.com',
        ]);
    }
}
