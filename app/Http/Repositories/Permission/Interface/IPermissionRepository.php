<?php

namespace App\Http\Repositories\Permission\Interface;

use App\Models\Permission;

interface IPermissionRepository
{
    public function persist(Permission $permission): Permission;
    public function findById(int $id);
    public function findAll():object;
    public function delete(Permission $permission);
}
