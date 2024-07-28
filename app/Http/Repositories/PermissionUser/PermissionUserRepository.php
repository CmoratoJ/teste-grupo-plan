<?php

namespace App\Http\Repositories\PermissionUser;

use App\Http\Repositories\PermissionUser\Interface\IPermissionUserRepository;
use App\Models\PermissionUser;

class PermissionUserRepository implements IPermissionUserRepository
{
    public function getUserPermissions(): object
    {
        return PermissionUser::where('user_id', auth()->user()->id)->get('permission_id');
    }
}
