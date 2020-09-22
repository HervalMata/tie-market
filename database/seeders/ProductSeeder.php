<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = Color::all();
        Product::factory(100)
            ->create()
            ->each(function (Product $product) use ($colors) {
                for ($i = 1; $i < 4; $i++) {
                    $colorId = $colors->random()->id;
                    $product->colors()->attach($colorId);
                }
            });
    }
}
