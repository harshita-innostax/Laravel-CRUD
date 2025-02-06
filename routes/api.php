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
    $data = include(app_path('Data/data.php'));

    return json_encode($data);
});

Route::delete('/posts/{id}',function($id){
    $posts = include(app_path('Data/data.php'));
    $filteredPosts = array_values(array_filter($posts,function($post) use ($id){
        return $post['id'] != $id;
    }));
    return json_encode([
        'message'=> 'Post deleted successfully',
        'posts' => $filteredPosts
    ]);

    
});

Route::put('/posts/{id}',function( Request $request,$id){
    $posts = include(app_path('Data/data.php'));

    foreach($posts as &$post){
        if($post['id']==$id){
            $post['title']=$request->input('title',$post['title']);
            $post['body']=$request->input('body',$post['body']);
        }
    }
    return json_encode([
        'message'=> 'Post updated successfully',
        'posts' => $posts
    ]);
});

    