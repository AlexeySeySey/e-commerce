<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;

class AdminAuthMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (($user->hasRole('admin')) or ($user->hasRole('admin_support'))) {
            return $next($request);
        } else {
            return abort(500,'Sorry, you don\'t have permission');
        }
    }
}
