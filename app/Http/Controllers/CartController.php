<?php

namespace App\Http\Controllers;

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
}