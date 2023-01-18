<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('users.index', compact('users'));
  }

  public function create()
  {
    $roles = Role::all();
    return view('users.create', compact('roles'));
  }

  public function delete(User $user)
  {
    $result = $user->delete();
    return response()->json(['result' => $result]);
  }

  public function store(CreateUserRequest $request)
  {
    try {
      DB::beginTransaction();
      $user = new User($request->all());
      $user->save();
      $user->assignRole($request->role);
      DB::commit();
    } catch (\Throwable $th) {
      DB::rollBack();
      throw $th;
    }
    return response()->json(['user' => $user]);
  }

  public function edit(User $user)
  {
    $user->load('roles');
    $roles = Role::all();
    return view('users.edit', compact('user', 'roles'));
  }

  public function update(User $user, UpdateUserRequest $request)
  {
    try {
      DB::beginTransaction();

      $fields = $request->all();
      if (isset($fields['password']))
        if (!$fields['password']) unset($allRequestInfo['password']);
      $user->update($fields);
      $user->syncRoles($request->role);

      DB::commit();
    } catch (\Throwable $th) {
      DB::rollBack();
      throw $th;
    }
    return response()->json(['user' => $user->fresh()]);
  }
}
