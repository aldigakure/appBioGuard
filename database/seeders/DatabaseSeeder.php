<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        // Create a default admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@bioguard.com',
            'password_hash' => bcrypt('password'),
            'role_id' => 1, // admin
        ]);

        // Create a default regular user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@bioguard.com',
            'password_hash' => bcrypt('password'),
            'role_id' => 2, // user
        ]);
    }
}
