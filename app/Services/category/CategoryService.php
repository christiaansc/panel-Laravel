<?php

namespace App\Services\category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    public function getAllCategories()
    {
        try {
            return Category::get();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function insertCategory($category)
    {
        try {
            $category = [
                'name' => $category['name'],
                'description' => $category['description'],
                'user_created' => Auth::user()->id,

            ];
            Category::create($category);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function deleteCategory($category)
    {

        try {
            $categoryDeleted = $category->delete();
            if ($categoryDeleted) {
                $category->update([
                    'user_deleted' => Auth::user()->id,
                    'status' => 0
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
