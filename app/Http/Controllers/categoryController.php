<?php

namespace App\Http\Controllers;

use App\dataTransferObjects\CategoryDto;
use App\Models\Category;

use App\Services\category\CategoryService;
use App\Http\Requests\category\CategoryRequest;
use Maatwebsite\Excel\Excel;

class categoryController extends Controller
{

    private CategoryService $categoryServices;

    public function __construct(CategoryService $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryServices->getAllCategories();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if ($request->method() === 'POST') {
            $this->categoryServices->insertCategory(CategoryDto::validatedRequest($request));
            return redirect()->route('category.index')->with('toast_success', 'Category Created Successfully!');;
        } else {
            return redirect()->route('category.create')->with('Error al crear la Categoría');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $products = $this->categoryServices->showProductCategory($category);
        return view('admin.category.show',  compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {

        if ($request->method() ==='PATCH') {
            $this->categoryServices->updateCategory(CategoryDto::validatedRequest($request), $category);
            return redirect()->route('category.index')->with('toast_success', 'La categoría fue editada exitosamente!');
        } else {
            return redirect()->route('category.edit')->with('Error al Editar la Categoría');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleted = $this->categoryServices->deleteCategory($category);
        if ($deleted) {
            return redirect()->route('category.index')->with('toast_success' ,' Category Eliminated Successfully!');
        } else {
            return redirect()->route('category.index')->with('toast_error' ,' Error al Eliminar la Categoría!');
        }
    }

    public function export(Category $category){
        return $this->categoryServices->exportData($category);

    }
}
