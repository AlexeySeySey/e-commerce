<?php

namespace App\Http\Middleware;

use Session;
use Illuminate\Support\Facades\Auth;
use App;
use App\Models\User;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Authentific;


class LanguageMiddleware
{

    protected $auth;

    public function __construct(Authentific $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::user()) {
            $current      = Auth::id();
            $user         = User::find($current);
            $localization = $user->locale;
            App::setLocale($localization);
        }else{
            return abort(500,'Auth Error');
        }
        return $next($request);
    }
}
