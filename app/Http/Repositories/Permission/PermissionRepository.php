<?php

namespace App\Http\Repositories\Permission;

use App\Http\Repositories\Permission\Interface\IPermissionRepository;
use App\Models\Permission;

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
}
