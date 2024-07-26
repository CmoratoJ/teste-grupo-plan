<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService;
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request);
    }
}
