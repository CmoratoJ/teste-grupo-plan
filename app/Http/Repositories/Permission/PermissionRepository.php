<?php

namespace App\Http\Repositories\Permission;

use App\Http\Repositories\Permission\Interface\IPermissionRepository;
use App\Models\Permission;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;

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
    
    public function insertUserPermission(User $user, Permission $permission) {
        DB::table('permission_user')->insert([
            'permission_id' => $permission->id,
            'user_id' => $user->id,
            'created_at' => new DateTime(),
            'updated_at'=> new DateTime()
        ]);

        return User::with('permissions')->where('id', $user->id)->get();
    }
}
