<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all()->pluck('name','id');
        return view('pages.users.create',compact('roles'));
    }

    public function store(StoreUserRequest $storeUserRequest)
    {
        $user = User::create($storeUserRequest->all());
        $user->roles()->sync($storeUserRequest->input('roles',[]));

        return redirect()->route('users.index')->with('success','The new user has been created successfully');
    }

    public function edit(User $user)
    {

        $roles = Role::all()->pluck('name','id');
        $user->load('roles');

        return view('pages.users.edit',compact('roles','user'));
    }

    public function update(User $user, UpdateUserRequest $updateUserRequest)
    {
        $user->update($updateUserRequest->all());
        $user->roles()->sync($updateUserRequest->input('roles',[]));

        return redirect()->route('users.index')->with('success','The user has been updated successfully');
    }
}
