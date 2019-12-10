<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Rbac
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $roles = $user->role;
        if($roles->isEmpty()){
            return redirect('403');
        }
        $permissions = $user->getPermissions();
        $currentRoute = Route::current();
        $route = $currentRoute->methods()[0] .':' . $currentRoute->uri;
        if(!in_array($route,$permissions->toArray()) && !$user->isSuperUser()){
            return redirect('403');
        }

        return $next($request);
    }
}
