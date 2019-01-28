<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\App;

class CartInfoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $id = Auth::id();

        $follow = (((User::select('isFollow')->where('id', $id)->get())->toArray())[0])['isFollow'];

        

        $checkoutCount = Cart::where('user_id', $id)->count();
        $checkoutAllCount = null;
        $checkoutPrice = null;

        $locale = App::getLocale();

        view()->share('id',$id);
        view()->share('locale',$locale);
        view()->share('follow',$follow);
        view()->share('checkoutCount',$checkoutCount);
        view()->share('checkoutAllCount',$checkoutAllCount);
        view()->share('checkoutPrice',$checkoutPrice);


        return $next($request);
    }
}
