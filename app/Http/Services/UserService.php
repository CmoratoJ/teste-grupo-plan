<?php

namespace App\Http\Services;

use App\Http\Repositories\User\Interface\IUserRepository;
use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserService
{
    private $userRepository;
    private $user;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->user = new User();
    }

    public function create(CreateOrUpdateUserRequest $request)
    {
        $this->user->name = $request->get('name');
        $this->user->email = $request->get('email');
        $this->user->password = bcrypt($request->get('password'));

        $this->userRepository->persist($this->user);
        return new UserResource($this->user);
    }

    public function findAll()
    {
        $users = $this->userRepository->findAll();
        return UserResource::collection($users);
    }

    public function findById(int $id)
    {
        $user = $this->userRepository->findById($id);
        return new UserResource($user);
    }

    public function update(CreateOrUpdateUserRequest $request, int $id)
    {
        $user = $this->userRepository->findById($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        $this->userRepository->persist($user);
        return new UserResource($user); 
    }

    public function delete(int $id)
    {
        $user = $this->userRepository->findById($id);
        $this->userRepository->delete($user);
    }
}
