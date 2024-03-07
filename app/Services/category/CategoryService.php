<?php

namespace App\Services\category;

use App\dataTransferObjects\CategoryDto;
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
            throw new Exception($e);
        }
    }

    public function deleteCategory($category)
    {
        try {
            return $categoryDeleted = $category->delete();
            if ($categoryDeleted) {
                $category->update([
                    'user_deleted' => Auth::user()->id,
                    'status' => 0
                ]);
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function updateCategory($data, $category)
    {
        try {
            $category->update($data);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
