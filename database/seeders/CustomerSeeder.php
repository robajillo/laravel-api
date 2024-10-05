<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Create some sample customers
        Customer::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone_number' => '1234567890',
        ]);

        Customer::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone_number' => '0987654321',
        ]);

        // You can add more customers here...
    }
}
