<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showAllCategoriesWithProducts()
    {
        $categories = Category::with('products')->get();
        return view('home', compact('categories'));
    }
}
