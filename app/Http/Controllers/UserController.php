<?php

namespace App\Http\Controllers;

use App\Models\User;
/* use Illuminate\Http\Request; */

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function delete(User $user)
    {
        $user->delete();
        return response()->json(['msg' => 'fuiste eliminado', 'user' => $user]);
    }
}
