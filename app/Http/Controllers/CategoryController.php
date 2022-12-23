<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
                $shiftedProducts = $category->products->shift(4);
                return [...$category->toArray(), 'products' => $shiftedProducts];
            });
        return $categories;
    }

    public function categoryWithProducts(Category $category)
    {
        return $category->load('products');
    }
}
