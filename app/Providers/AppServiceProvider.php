<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Categories;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Facades\Event;
use App\Cart;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $id = Auth::id();
        $categories = Categories::all();
        $checkoutCount = Cart::count('*');
        $checkoutPrice = Cart::where('id', $id)->sum('price');

        View::share('categories',$categories);
        View::share('checkoutPrice',$checkoutPrice);
        View::share('checkoutCount',$checkoutCount);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
