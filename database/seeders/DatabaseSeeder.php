<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Elliot Alderson',
            'email' => 'frontend@kuiraweb.com',
<<<<<<< HEAD
            'password' => bcrypt('Password'),
=======
            'password' => bcrypt('password'),
>>>>>>> 84254cf7c75f8aab1a4ac073e5024dce07e0651a
        ]);
    }
}
