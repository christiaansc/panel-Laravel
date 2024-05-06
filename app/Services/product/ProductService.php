<?php

namespace App\Services\product;

use App\Models\Product;

class ProductService {

    public function getAllProducts(){
        try {
             return Product::get();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
