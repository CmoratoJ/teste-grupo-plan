<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionUser;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $permissionUser = new PermissionUser();

        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = 'admin';
        $user->save();

        $permissions = ['admin', 'others'];

        foreach ($permissions as $permission) {
            Permission::insert([
                'name' => $permission,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }

        $permissionUser->user_id = 1;
        $permissionUser->permission_id = 1;
        $permissionUser->save();
    }
}
