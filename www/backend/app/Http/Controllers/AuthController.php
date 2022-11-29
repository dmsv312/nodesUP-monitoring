<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): Response
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        /** @var User $user */
        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response(
                [
                    'message' => 'Wrong credentials'
                ],
                401
            );
        }

        $token = $user->createToken('token')->plainTextToken;
        return response(
            [
                'user' => $user,
                'token' => $token
            ],
            201
        );
    }
    public function logout(Request $request): Response
    {
        $request->user()->currentAccessToken()->delete();

        $response = [
            'user' => $request->user(),
            'message' => 'Logout'
        ];

        return response($response, 201);
    }
}
