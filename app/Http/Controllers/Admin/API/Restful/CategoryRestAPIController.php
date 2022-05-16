<?php

namespace App\Http\Controllers\Admin\API\Restful;

use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\CategoryRequest;
use App\Contracts\CategoryRepositoryInterface;
use App\Http\Resources\Admin\Category\CategoryCollection;
use App\Http\Resources\Admin\Category\CategoryResource;

class CategoryRestAPIController extends Controller
{

    protected $categoryRepositoryInterface;

    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
        $this->authorizeResource(Category::class, 'category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->keyword) {
            $categories = Category::where('title', 'LIKE', '%' . request()->keyword . '%')->latest()->paginate(10);
        } else {
            $categories = Category::with('companies')->latest()->paginate(10);
        }
        return new CategoryCollection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryRepositoryInterface->storeCategory($request);
        return response()->json($category, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryRepositoryInterface->updateCategory($request, $category);
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleted_item = $category;
        $category->delete();
        return response()->json($deleted_item, 200);
    }
}
