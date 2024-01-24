<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoleById
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        if (!$user->roles()->whereIn('id', $roles)->exists()) {
            // Jika user tidak memiliki salah satu role dengan ID yang diberikan, redirect atau tampilkan error.
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

