<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Permission\Interface\IPermissionRepository;
use App\Http\Requests\CreateOrUpdatePermissionRequest;
use App\Http\Services\PermissionService;

class PermissionController extends Controller
{
    private PermissionService $permissionService;

    public function __construct()
    {
        $this->permissionService = new PermissionService(new IPermissionRepository);
    }

    public function index()
    {
        $permissions = $this->permissionService->findAll();
        return response()->json(['status' => true, $permissions => $permissions], 200);
    }

    public function store(CreateOrUpdatePermissionRequest $request)
    {
        $permission = $this->permissionService->create($request);
        return response()->json(['status' => true, 'permission' => $permission], 200);
    }

    public function show(int $id)
    {
        $permission = $this->permissionService->findById($id);
        return response()->json(['status' => true, 'permission' => $permission], 200);
    }

    public function update(CreateOrUpdatePermissionRequest $request, int $id)
    {
        $permission = $this->permissionService->update($request, $id);
        return response()->json(['status' => true, 'permission' => $permission], 200);
    }

    public function destroy(int $id)
    {
        $this->permissionService->delete($id);
        return response()->json(['status' => true], 200);
    }
}
