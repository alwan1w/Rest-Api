<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create(['name' => 'John Doe', 'email' => 'john@example.com', 'photo' => 'https://example.com/photo1.jpg', 'description' => 'A sample user', 'address' => '123 Street']);
        User::create(['name' => 'Jane Smith', 'email' => 'jane@example.com', 'photo' => 'https://example.com/photo2.jpg', 'description' => 'Another user', 'address' => '456 Avenue']);
    }
}
