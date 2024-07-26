<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $permission = new Permission();

        $user->name = 'Admin';
        $user->email = '';
        $user->password = 'admin';
        $user->save();

        $permission->name = 'admin';
        $permission->save();

        DB::table('permission_user')->insert([
            'permission_id' => $permission->id,
            'user_id' => $user->id
        ]);
    }
}
