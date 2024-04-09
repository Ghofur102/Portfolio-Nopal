<?php

namespace Database\Seeders;

use App\Models\About;
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

        User::create([
            'name' => 'Nopal',
            'email' => 'Nopal@example.com',
            'password' => 'Nopal123',
            'email_verified_at' => now()
        ]);
        About::create([
            'full_name' => 'Nopal',
            'link_linkedin' => 'linkme',
            'link_github' => 'linkme',
            'about' => 'Lorem ipsum dolor sit.'
        ]);
    }
}
