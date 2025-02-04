<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/posts',function(){
    $data =  [
        [
            "userId" => 1,
            "id" => 101,
            "title" => "First Post",
            "body" => "This is the body of the first post."
        ],
        [
            "userId" => 2,
            "id" => 102,
            "title" => "Second Post",
            "body" => "This is the body of the second post."
        ],
        [
            "userId" => 3,
            "id" => 103,
            "title" => "Third Post",
            "body" => "This is the body of the third post."
        ]
    ];

    return json_encode($data);
});
    