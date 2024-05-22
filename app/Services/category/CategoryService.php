<?php

namespace App\Services\category;

use App\dataTransferObjects\CategoryDto;
use App\Exceptions\CategoryExceptions;
use App\Exports\ProductsExport;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Exporter;
use Maatwebsite\Excel\Facades\Excel;

class CategoryService
{

    public function __construct(Exporter $exporter)
    {
        $this->exporter = $exporter;
    }

    public function getAllCategories()
    {
        try {
            return Category::get();
        } catch (Exception $e) {
            throw new CategoryExceptions($e->getMessage());
        }
    }
    public function insertCategory(CategoryDto $dto)
    {
        try {
            $category = [
                'name' => $dto->name,
                'description' => $dto->description,
                'user_created' => Auth::user()->id,
                'status' => $dto->status
            ];
            Category::create($category);
        } catch (Exception $e) {
            throw new CategoryExceptions($e->getMessage());
        }
    }

    public function deleteCategory($category)
    {
        try {
            $cantProd = Product::where('categoryId' , $category->id)->count();
            if ($cantProd > 0) return false;
            $categoryDeleted = $category->delete();
            if ($categoryDeleted) {
                return  $category->update([
                    'user_deleted' => Auth::user()->id,
                    'status' => 0
                ]);
            }
        } catch (Exception $e) {
            throw new CategoryExceptions($e->getMessage());
        }
    }
    public function updateCategory(CategoryDto $dto, $category)
    {
        try {
            $category->update([
                'name' =>$dto->name,
                'description' =>$dto->description,
                'status' =>$dto->status,

            ]);
        } catch (Exception $e) {
            throw new CategoryExceptions($e->getMessage());
        }
    }

    public function showProductCategory(Category $category){
        try {
            return Product::where('categoryId' ,$category->id)->get();

        } catch (Exception $e) {
            throw new CategoryExceptions($e->getMessage());
        }
    }

    public function exportData(Category $category){
        try {
            // $products = Product::where('categoryId' ,$category->id)->get();

            return Excel::download(new ProductsExport, 'products.xlsx');


        } catch (Exception $e) {
            throw new CategoryExceptions($e->getMessage());
        }
    }
}
