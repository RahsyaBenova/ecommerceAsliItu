<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Electronics',
            'Fashion',
            'Books',
            'Home & Kitchen',
            'Toys',
            'Sports',
            'Health & Beauty',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
