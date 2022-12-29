<?php

namespace App\Http\Controllers;

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
        $categories = Category::with('products')
            ->get()
            ->map(function ($category) {
                $randomProducts = $category->products->random(4);
                return [...$category->toArray(), 'products' => $randomProducts];
            });
        return $categories;
    }

    public function showCategoryWithProducts(Category $category)
    {
        $category->load('products');
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
}
