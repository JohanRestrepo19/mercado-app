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
}
