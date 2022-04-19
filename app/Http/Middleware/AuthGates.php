<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGates
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
        $user = Auth::user();
        if($user) {
            $roles = Role::with('permissions')->get();
            $permissionsArray = [];

            foreach($roles as $role) {
                foreach($role->permissions as $permission) {
                    $permissionsArray[$permission->name][] = $role->id;
                }
            }

            foreach ($permissionsArray as $name => $roles) {
                Gate::define($name, function(User $user) use ($roles) {
                    return count(array_intersect($user->roles()->pluck('id')->toArray(),$roles)) > 0;
                });
            }
        }
        return $next($request);
    }
}
