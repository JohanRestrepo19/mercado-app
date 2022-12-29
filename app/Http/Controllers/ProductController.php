<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $this->uploadImage($request, $product);
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
        $allRequestInputs = $request->all();
        $this->uploadImage($request, $product);
        $allRequestInputs['image'] = $product->image;
        $product->update($allRequestInputs);
        return response()->json(['product' => $product->refresh()]);
    }

    public function show(Product $product)
    {
        $product->load('category');
        $userAuthInfo = [
            'authenticated' => Auth::check(),
            'userId' => Auth::id()
        ];
        return view('products.show', compact('product', 'userAuthInfo'));
    }

    private function uploadImage($request, &$product)
    {
        if (!isset($request->image)) return;
        if ($request->image === "null") return;
        $randomString = Str::random(20);
        $imageName = "{$randomString}.{$request->image->clientExtension()}";
        $request->image->move(storage_path('app/public/images'), $imageName);
        $product->image = $imageName;
    }
}
