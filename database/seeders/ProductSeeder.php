<?php

namespace Database\Seeders;

// database/seeders/ProductSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generate 10 random products with prices
        foreach (range(1, 10) as $index) {
            Product::create([
                'name' => $faker->word,
                'price' => $faker->randomFloat(2, 10, 100), // Generate random price between 10 and 100 with 2 decimal places
                // Add other product attributes here
            ]);
        }
    }
}
