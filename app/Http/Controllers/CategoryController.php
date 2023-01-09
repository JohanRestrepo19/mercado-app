<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function showAllCategoriesWithProducts()
    {
        $categories = $this->getAllCategoriesPreview();
        return view('home', compact('categories'));
    }

    public function getAllCategoriesPreview()
    {
        $categories = Category::with(['products' => fn ($query) => $query->where('stock', '>', '0')])
            ->has('products')
            ->get()
            ->map(function ($category) {
                if ($category->products->count() > 5) $newProducts = $category->products->random(4);
                else $newProducts = $category->products;
                return [...$category->toArray(), 'products' => $newProducts];
            });
        return $categories;
    }

    public function showCategoryWithProducts(Category $category)
    {
        $category->load(['products' => fn ($query) => $query->where('stock', '>', '0')]);
        return view('categories.category-page', compact('category'));
    }

    public function index()
    {
        return view('categories.index');
    }

    public function getCategoriesForDataTable()
    {
        $categories = Category::all();
        return DataTables::of($categories)
            ->addColumn('actions', function ($row) {
                return "<a
				href='#'
				onclick='event.preventDefault();'
				data-id='{$row->id}'
				role='edit'
				class='btn btn-warning btn-sm'>Editar</a>
				<a
				href='#'
				onclick='event.preventDefault();'
				data-id='{$row->id}'
				role='delete'
				class='btn btn-danger btn-sm'>Eliminar</a>";
            })
            ->rawColumns(['actions'])
            ->make();
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category($request->all());
        $category->save();
        return response()->json(['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->all());
        return response()->json(['category' => $category->refresh()]);
    }

    public function delete(Category $category)
    {
        $result = $category->delete();
        return response()->json(['result' => $result]);
    }

    /*
    |--------------------------------------------------------------------------
    | API Methods.
    |--------------------------------------------------------------------------
    | Here is where all logic for ProductController related to api
    | is going to be.
    |
    */

    public function categoriesPreview(Request $request)
    {
        $request['wants_random'] = true;
        return CategoryResource::collection(Category::all());
    }
}
