<?php

namespace App\Http\Services;

use App\Http\Requests\LoginRequest;

class AuthService
{
    public function login(LoginRequest $request):object
    { 
        $input = $request->validated();

        $credentials = [
            'email' => $input['email'], 
            'password' => $input['password']
        ];

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }
}
