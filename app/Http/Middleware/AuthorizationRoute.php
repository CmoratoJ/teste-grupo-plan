<?php

namespace App\Http\Middleware;

use App\Models\PermissionUser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizationRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $permissionsUser = PermissionUser::where('user_id', auth()->user()->id)->get('permission_id');

        $permission = $permissionsUser->map(function ($permissionUser) {
            return $permissionUser->permission_id === 1 ?? false;
        });

        if (!$permission->contains(true)) {
            return response()->json(['status' => 'Permission Denied'], 403);
        }
        
        return $next($request);
    }
}
