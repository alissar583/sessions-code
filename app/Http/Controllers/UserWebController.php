<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserWebController extends Controller
{
    public function index()
    {
        // return 3;
        $users = User::query()->get();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {


        // return $validated;
        // return $request->all();
        $user = User::query()
            ->create($request->all());

        // return view('users.index');
        return redirect()->route('users.index');
        // $users = User::query()->get();
        // return view('users.index', compact('users'));
        // return response()->json([
        //     'message' => "success",
        //     'data' => $user
        // ]);
        // return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        // $users = User::all();
        // return view('users.index',compact('users'));
        return redirect()->route('users.index');

        // return $user;
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');

    }


    public function show(User $user)
    {
        return $user;
    }

    public function edit(User $user)
    {
        // return 4;
        return view('users.edit', compact('user'));
    }
}
