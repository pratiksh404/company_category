<?php

namespace App\Repositories;

use App\Models\Admin\Category;
use Illuminate\Support\Facades\Cache;
use App\Contracts\CategoryRepositoryInterface;
use App\Http\Requests\CategoryRequest;

class CategoryRepository implements CategoryRepositoryInterface
{
    // Category Index
    public function indexCategory()
    {
        $categories = config('adminetic.caching', true)
            ? (Cache::has('categories') ? Cache::get('categories') : Cache::rememberForever('categories', function () {
                return Category::latest()->get();
            }))
            : Category::latest()->get();
        return compact('categories');
    }

    // Category Create
    public function createCategory()
    {
        //
    }

    // Category Store
    public function storeCategory(CategoryRequest $request)
    {
        Category::create($request->validated());
    }

    // Category Show
    public function showCategory(Category $category)
    {
        $companies = $category->companies;
        return compact('category');
    }

    // Category Edit
    public function editCategory(Category $category)
    {
        return compact('category');
    }

    // Category Update
    public function updateCategory(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
    }

    // Category Destroy
    public function destroyCategory(Category $category)
    {
        $category->delete();
    }
}
