<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
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

    public function store(CreateUserRequest $request)
    {

        $user = new User($request->all());
        $user->save();
        return response()->json(['user' => $user]);
    }
}
