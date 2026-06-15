<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->get();
        return $this->successResponse("success users", $users);
        return $users;
    }

    public function create(){
        
    }

    public function store(StoreUserRequest $request)
    {

        // return $validated;
        // return $request->all();
        $user = User::query()
            ->create($request->all());
        return response()->json([
            'message' => "success",
            'data' => $user
        ]);
        return $user;
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
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

    public function storeCategory(StoreCategoryRequest $request){
        $validated = $request->validated();


       $category = Category::query()->create([
            'name' => $validated['name'],
            'content' => $request->content
        ]);

        return $category;

    }
}
