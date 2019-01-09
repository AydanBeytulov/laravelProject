<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserRoles
{
    /**
     * Handle an incoming request.
     * Check for roles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array  $roles
     * @return mixed
     */

    public function handle($request, Closure $next, ... $roles)
    {

        $user = Auth::user();

        foreach($roles as $role){
            if($role == $user->type){
                return $next($request);
            }
        }

        return redirect("home");

    }
}
