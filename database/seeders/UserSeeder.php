<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create some sample users
        User::create([
            'name' => 'Christiano Ronaldo',
            'email' => 'ronaldo@example.com',
            'password' => '1234567890',
        ]);

        User::create([
            'name' => 'Lionel Messi',
            'email' => 'messi@example.com',
            'password' => '0987654321',
        ]);

        // You can add more users here...
    }
}
