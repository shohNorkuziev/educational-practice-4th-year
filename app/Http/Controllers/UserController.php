<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return response()->json([
            "message" => "Пользователь аунтефицировался",
            "auth"=>true
        ],200);
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json([
            "message"=>"Пользователь создан",
            "user"=> $user
        ],200);
    }

    public function show(User $user)
    {
        $data = User::find($user);
        return response()->json([
            "data" => [
                "data_user" => $data,
                "message" => "Пользователь найден"
            ]
        ],200);

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
            "message"=>"Пользователь удален"
        ];
    }
}
