<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UserLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\UserStoreApiRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(UserStoreApiRequest $request)
    {
        $validated = $request->validated();
        $user = User::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        $token = $user->createToken("dev-token");
        return response(['user' => $user, 'token' => $token], 201);
    }
    public function signin(UserLoginRequest $request)
    {
        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password))
        {
            return response(
                ['message' => 'Bad Creadintails'],
                401
            );
        }
        $token = $user->createToken("dev-token")->plainTextToken;
        return response(['user' => $user, "token" => $token], 201);
    }
    public function signout(Request $request)
    {

        Auth::user()->tokens()->delete();
        return response(
            ['message' => 'logout']
        );
    }
}
