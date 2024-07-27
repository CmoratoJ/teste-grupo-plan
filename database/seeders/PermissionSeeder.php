<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $permission = new Permission();
        $permissionUser = new PermissionUser();

        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = 'admin';
        $user->save();

        $permission->name = 'admin';
        $permission->save();

        $permissionUser->user_id = $user->id;
        $permissionUser->permission_id = $permission->id;
        $permissionUser->save();
    }
}
