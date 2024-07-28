<?php

namespace App\Http\Repositories\PermissionUser\Interface;

interface IPermissionUserRepository
{
    public function getUserPermissions(): object;
}