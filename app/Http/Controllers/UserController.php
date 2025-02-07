<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class UserController extends Controller
{

    function addUser(Request $request)
    {
        $user = new user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('number');
        $user->save();
        print (json_encode($user));
        return json_encode($user);
    }

    function getUsers()
    {
        $users = user::all();
        return response()->json($users);

    }

    function deleteUser($id)
    {
        $user = user::find($id);
        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);

        }
        $user->delete();
        return response()->json(['message' => 'user deleted successfuly'], 200);
    }

    function updateUser(Request $request, $id)
    {
        $user = user::find($id);
        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }
        $user->update(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('number'),
            ]
        );
        return response()->json(['message' => 'user updated successfully', 'user' => $user]);
    }

}