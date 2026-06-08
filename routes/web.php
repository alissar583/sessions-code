<?php

use App\Http\Controllers\UserWebController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function(){
    $test = 5;
    return view('home',compact('test'));
});
Route::prefix('users')->controller(UserWebController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');



    Route::get('/create', 'create')->name('users.create');
    Route::post('/', 'store')->name('users.store');
    Route::get('/{user}', 'show');
    Route::get('/{user}/edit', 'edit');
    Route::put('/{user}', 'update');
    Route::delete('/{user}', 'destroy');
    
});
// Route::post('/', function () {
//     return view('welcome');
// });


Route::get('/welcome-message/{name}', function ($name) {
    // return "hello    " . $name;

    $products = DB::table('products')->get();
    return $products;
});

Route::get('/products', function () {

    $products = DB::table('products')->get();
    return $products;
});

// Route::post('products', function () {

//     // return 1;
//     $products = DB::table('products')->insert(
//         [
//             [
//                 'name' => "alissa",
//                 "test" => "oo",
//                 "price" => "55",
//                 "description" => "sdfasd"
//             ]
//         ]
//     );

//     return $products;
// });


// Route::get('users', function () {
//     User::query()->get();
// });

Route::get('test', function () {
    return 5;
});
