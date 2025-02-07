<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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
/*Route::get('/users', function () {
    User::create(["email" => "harshita@gmail.com", "name" => "harshita", "password" => "123"]);
    $users = User::all();
    return json_encode($users);
});*/

Route::get('/users', [UserController::class, 'getUsers']);

Route::post('/user', [UserController::class, 'addUser']);

Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

Route::put('/user/{id}', [UserController::class, 'updateUser']);
/*Route::delete('/user/{id}', function ($id) {
    $posts = include(app_path('Data/data.php'));
    $filteredPosts = array_values(array_filter($posts, function ($post) use ($id) {
        return $post['id'] != $id;
    }));
    return json_encode([
        'message' => 'Post deleted successfully',
        'posts' => $filteredPosts
    ]);


});

Route::put('/user/{id}', function (Request $request, $id) {
    $posts = include(app_path('Data/data.php'));

    foreach ($posts as &$post) {
        if ($post['id'] == $id) {
            $post['title'] = $request->input('title', $post['title']);
            $post['body'] = $request->input('body', $post['body']);
        }
    }
    return json_encode([
        'message' => 'Post updated successfully',
        'posts' => $posts
    ]);
});*/

