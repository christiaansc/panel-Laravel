<?php

namespace Database\Seeders;

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

        $product = [
            'name'          => 'Product test',
            'description'  => 'Product test Description',
            'stock'         => '2',
            'price'    => '13500.232',
            'categoryId'    => '1',
            'user_created'  => '1',
        ];

        Product::create($product);
    }
}
