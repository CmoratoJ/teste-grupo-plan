<?php

namespace App\Http\Controllers;

use App\Http\Repositories\User\UserRepository;
use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Http\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService(new UserRepository);
    }
    
    public function index()
    {
        $users = $this->userService->findAll();
        return response()->json(['status' => true, 'users' => $users], 200);
    }

    public function store(CreateOrUpdateUserRequest $request)
    {
        $user = $this->userService->create($request);
        return response()->json(['status' => true, 'user' => $user], 201);
    }

    
    public function show(int $id)
    {
        $user = $this->userService->findById($id);
        return response()->json(['status' => true, 'user' => $user], 200);
    }

    public function update(CreateOrUpdateUserRequest $request, int $id)
    {
        $user = $this->userService->update($request, $id);
        return response()->json(['status' => true, 'user' => $user], 201);
    }

    public function destroy(int $id)
    {
        $this->userService->delete($id);
        return response()->json(['status' => true], 204);
    }
}
