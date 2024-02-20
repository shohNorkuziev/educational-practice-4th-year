<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\UserAuthRequest;
use App\Http\Requests\user\UserRequest;
use App\Http\Resources\user\UserAuthResource;
use App\Http\Resources\user\UserCreateResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(UserAuthRequest $request)
    {
            if (Auth::attempt($request->only(['email', 'password'])))
            {
                Auth::user()->tokens()->delete();
                return response()->json([
                    'token' => Auth::user()->createToken('api')->plainTextToken
                ]);
            }
            else{
                return response()->json([
                    'message' => 'not auth'
                ]);
            }
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        return (new UserCreateResource($user))->response()->setStatusCode(201);
    }

    public function show(User $user)
    {
        $data = User::find($user);
        return response()->json([
            "data" => [
                "data_user" => $data,
                "message" => "Пользователь найден"
            ]
        ], 200);
    }





    public function update(User $user, Request $request)
    {
        $user->update($request->all());
        return $user;
    }



    public function index()
    {
        return User::all();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return [
            "message" => "Пользователь удален"
        ];
    }
}
