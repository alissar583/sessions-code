<?php

use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('products')->group(function () {
    Route::post('/{product}', function (Request $request) {
        // return $request;

        $products = DB::table('products')
            ->insert(
                $request->products
            );

        Product::query()->create([
            'name' => "adf"
        ]);

        return $products;
    });


    Route::get('/', function (Request $request) {
        return $request;

        $products = DB::table('products')->get();
        return $products;
    });
});

// Route::post('products', function (Request $request) {

//     // return "first";
//     // return 1;
//     $products = DB::table('products')->insert(
//         [
//             [
//                 'name' => "alissa",
//                 "test" => 55,
//                 "price" => "55",
//                 "description" => "sdfasd"
//             ]
//         ]
//     );

//     return $products;
// });

// Route::delete('prodcuts', function () {});

// Route::get('products', function () {

//     // return "second";
//     $products = DB::table('products')->get();
//     return $products;
// });

Route::get('products/{product}', function ($product) {
    return DB::table('products')->where('id', $product)->get();
});


// Route::post('slides',function(){
//     Sli
// });

Route::post('tests', function () {
    Test::query()->update([
        'name' => "alissar",
        'des' => "sdfs"
    ]);
});




Route::prefix('categories')->group(function () {
    Route::get('/', function () {
        $categories = Category::query()->get();
        return $categories;
    });

    // Route::post('/{category}',function(){
    //     return "with params";

    // });
    Route::post('/', function (Request $request) {
        // return "normal post";
        // return $reqeust->name;
        Category::query()->create([
            'name' => $request->name,
            'content' => [
                "gsgsgs"
            ]
        ]);
    });
    // Route::post('/{category}/update', function () {
    //     return "with params";
    // });

    // Route::post('/with-products', function () {
    //     return "with-products";
    // });

    Route::put('/{category}', function ($category) {

        Category::query()
            ->where('id', $category)
            ->update([
                'name' => "test"
            ]);
    });

    Route::delete('/{category}', function ($category) {
        Category::query()->where('id', $category)->delete();
    });
});

Route::prefix('users')->controller(UserController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{user}', 'show');
        Route::post('/', 'store');
        Route::put('/{user}', 'update');
        Route::delete('/{user}', 'destroy');
    });

Route::post('store-user-profile', function () {
    $user = User::query()->create([
        'name' => "alissa",
        'email' => "alissa@",
        'password' => "alissa"
    ]);

    $user->profile()->create([
        'age' => 5
    ]);

    // Profile::query()->create([
    //     'age' => 5,
    //     'user_id' => $user->id
    // ]);
});

Route::post(
    'add-comment-to-post',
    function (Post $post, Request $request) {
        $post->comments()->create([
            'content' => $request->content
        ]);
    }
);

Route::post('create-user-and-role-and-attach', function (Request $request) {
    $user = User::query()->create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password
    ]);

    $role = Role::query()->create([
        'name' => $request->role_name
    ]);

    $role = Role::query()->create([
        'name' => $request->role_name_second
    ]);
    // $user->roles()->attach([$role->id]);



    // $user = User::query()->create($request->all());
    // $user->roles()->sync($request->roles);
});

Route::post('attach-roles-to-user/{user}', function (Request $request, User $user) {
    // $user = User::query()->find($request->user_id);
    $user->roles()->attach($request->roles);
});
