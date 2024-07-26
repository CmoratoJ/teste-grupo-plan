<?php

namespace App\Http\Middleware;

use App\Models\User;
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
        $user = User::with('permissions')->where('id', auth()->user()->id)->get();
        
        $permission = $user->map(fn ($user) => $user->permissions->map(
            fn ($permission) => $permission->name === 'admin' ?? false)
        )->first();

        if (!$permission->first()) {
            return response()->json(['status' => 'Permission Denied'], 403);
        }
        
        return $next($request);
    }
}
