<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->get();
        return $users;
    }

    public function store(StoreUserRequest $request)
    {
      
        // return $validated;
        return $request->all();
        $user = User::query()
            ->create($request->all());
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }


    public function destroy(User $user)
    {
        $user->delete();
    }


    public function show(User $user)
    {
        return $user;
    }
}
