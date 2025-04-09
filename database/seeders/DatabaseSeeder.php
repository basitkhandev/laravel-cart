<?php

namespace Database\Seeders;

use App\Models\Product;
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
            'name' => 'First User',
            'email' => 'test1@example.com',
        ]);

        User::factory()->create([
            'name' => 'Second User',
            'email' => 'test2@example.com',
        ]);

        Product::factory()->create([
            'name' => 'Burger',
            'price' => 50,
        ]);

        Product::factory()->create([
            'name' => 'Pizza',
            'price' => 100,
        ]);
        Product::factory()->create([
            'name' => 'Sandwhich',
            'price' => 70,
        ]);
    }
}
