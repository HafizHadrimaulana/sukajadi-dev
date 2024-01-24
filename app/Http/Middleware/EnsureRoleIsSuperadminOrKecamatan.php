<?php

// File: app/Http/Middleware/EnsureRoleIsSuperadminOrKecamatan.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureRoleIsSuperadminOrKecamatan
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->hasAnyRole(['superadmin', 'kecamatan'])) {
            // Jika pengguna tidak memiliki peran yang dibutuhkan, lempar error 403
            abort(403);
        }

        return $next($request);
    }
}

