<?php

namespace App\Http\Services;

use App\Http\Repositories\Permission\Interface\IPermissionRepository;
use App\Http\Requests\CreateOrUpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;

class PermissionService
{
    private $permissionRepository;
    private $permission;

    public function __construct(IPermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->permission = new Permission();
    }

    public function create(CreateOrUpdatePermissionRequest $request)
    {
        $this->permission->name = $request->get('name');
        $this->permissionRepository->persist($this->permission);
        return new PermissionResource($this->permission);
    }

    public function findAll()
    {
        $permissions = $this->permissionRepository->findAll();
        return PermissionResource::collection($permissions);
    }

    public function findById(int $id)
    {
        $permission = $this->permissionRepository->findById($id);
        return new PermissionResource($permission);
    }

    public function update(CreateOrUpdatePermissionRequest $request, int $id)
    {
        $permission = $this->permissionRepository->findById($id);

        $permission->name = $request->get('name');
        $permission->email = $request->get('email');
        $permission->password = bcrypt($request->get('password'));

        $this->permissionRepository->persist($permission);
        return new PermissionResource($permission); 
    }

    public function delete(int $id)
    {
        $permission = $this->permissionRepository->findById($id);
        $this->permissionRepository->delete($permission);
    }
}
