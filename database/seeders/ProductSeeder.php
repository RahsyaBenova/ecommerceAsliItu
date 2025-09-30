<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < 20; $i++) { // 20 produk per kategori
                Product::create([
                    'name'        => $faker->words(3, true),
                    'description' => $faker->sentence(12),
                    'price'       => $faker->numberBetween(5000, 20000),
                    'category_id' => $category->id,
                    // 'image'       => 'https://picsum.photos/300?random=' . $faker->unique()->numberBetween(1, 1000),
                ]);
            }
        }
    }
}
