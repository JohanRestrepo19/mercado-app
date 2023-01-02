<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $userAuthInfo = [
            'id' => Auth::id(),
        ];

        return view('cart.index', compact('userAuthInfo'));
        /* return view('cart.index', compact('userId')); */
    }

    public function getCartItemImage(Product $item)
    {
        return response()->json([
            'image' => [
                'name' => $item->image,
                'has_image' => $item->has_image
            ]
        ]);
    }
}
