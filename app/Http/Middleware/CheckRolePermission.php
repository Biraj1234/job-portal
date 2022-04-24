<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckRolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {



        $role = Role::find(auth()->user()->role_id);

        //If user is Super admin, he can access overal the system
        if ($role->key == 1) {
            return $next($request);
        }

        $currentRoute = Route::current()->getName();
        $access = false;

        foreach ($role->permissions as $permission) {
            // dd($permission);
            if ($currentRoute == $permission->route) {

                return $next($request);
            }
        }

        if ($access === false) {
            dd('Permission denied');
        }

        return $next($request);
    }
}
