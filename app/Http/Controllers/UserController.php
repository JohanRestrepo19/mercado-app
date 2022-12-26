<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
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
        $result = $user->delete();
        return response()->json([ 'result' => $result]);
    }

    public function store(CreateUserRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        return response()->json(['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $fields = $request->all();
        if (isset($fields['password']))
            if (!$fields['password']) unset($allRequestInfo['password']);
        $user->update($fields);
        return response()->json(['user' => $user->fresh()]);
    }
}
