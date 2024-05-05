<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha',
            'lastName' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'image' => $request->file('image')?->store('profile_images', 'public'),
        ]);

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|alpha',
            'lastName' => 'sometimes|alpha',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->update($request->only('name', 'lastName', 'email'));

        if ($request->hasFile('image')) {
            $user->update([
                'image' => $request->file('image')->store('profile_images', 'public'),
            ]);
        }

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Utilisateur supprimé'], 200);
    }
    public function head(Request $request, User $user)
    {
        $response = response()->noContent();
        $response->header('Content-Type', 'application/json');
        $response->header('Content-Length', '0');
        return $response;
    }


    public function options(Request $request, User $user)
    {
        $methods = 'GET, POST, PUT, DELETE, PATCH, HEAD, OPTIONS';

        return response()
            ->header('Allow', $methods)
            ->setStatusCode(204);
    }

}


