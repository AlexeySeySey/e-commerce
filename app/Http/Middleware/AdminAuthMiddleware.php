<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App;
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
            $locale = App::getLocale();
            view()->share('locale',$locale);
            return $next($request);
        } else {
            return abort(403,'Sorry, you don\'t have permission');
        }
    }
}
