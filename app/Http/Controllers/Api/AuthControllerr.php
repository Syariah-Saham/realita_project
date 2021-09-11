<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthControllerr extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('syariahsaham')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return $response;
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // check email
        $user = User::where('email' , $request->email)->first();

        // check pass
        if(!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Email or password invalid',
            ] , 401);
        }

        $token = $user->createToken('syariahsaham')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return $response;
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out.'
        ];
    }
}
