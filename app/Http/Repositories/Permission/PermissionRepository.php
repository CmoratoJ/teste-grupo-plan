<?php

namespace App\Http\Repositories\Permission;

use App\Http\Repositories\Permission\Interface\IPermissionRepository;
use App\Models\Permission;
use App\Models\PermissionUser;
use App\Models\User;

class PermissionRepository implements IPermissionRepository
{
    public function persist(Permission $permission): Permission
    {
        $permission->save();
        return $permission;
    }

    public function findById(int $id)
    {
        return Permission::find($id);
    }

    public function findAll(): object
    {
        return Permission::all();   
    }

    public function delete(Permission $permission)
    {
        $permission->delete();   
    }
    
    public function insertUserPermission(User $user, Permission $permission)
    {
        $permissionUser = new PermissionUser();
        $permissionUser->user_id = $user->id;
        $permissionUser->permission_id = $permission->id;
        $permissionUser->save();
        return $permissionUser;
    }
}
