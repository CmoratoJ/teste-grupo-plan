<?php

namespace App\Http\Repositories\User;

use App\Http\Repositories\User\Interface\IUserRepository;
use App\Models\User;

class UserRepository implements IUserRepository
{
    public function persist(User $user): User
    {
        $user->save();
        return $user;
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function findAll(): object
    {
        return User::all();
    }

    public function delete(User $user)
    {
        $user->delete();   
    }

    public function findUsersWithCourses()
    {
        return User::with('courses')->get();
    }

    public function findUserWithPermissions()
    {
        return User::with('permissions')->get();
    }
}
