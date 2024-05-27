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

    public function getProductsByCategory($id){

        try {
            $products = Product::where('categoryId', $id)
                                ->select( 'id','name')
                                ->get();
            return $products;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
