<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function delete(Product $product)
    {
        $result = $product->delete();
        return response()->json(['result' => $result]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $product = new Product($request->all());
        $product->save();
        return response()->json(['product' => $product]);
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Product $product, CreateProductRequest $request)
    {
        $product->update($request->all());
        return response()->json(['product' => $product->refresh()]);
    }

    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }
}
