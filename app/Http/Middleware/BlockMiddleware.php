<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;

class BlockMiddleware
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

        $banned = User::select('id')->where('isBan', 1)->get();

        foreach ($banned as $key) {
            if ($key['id'] == Auth::id()) {
                abort(500, 'Sorry! You have been added to black list.');
            }
        }

        return $next($request);
    }
}
