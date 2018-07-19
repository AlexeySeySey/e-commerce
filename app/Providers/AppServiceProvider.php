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

        $categories = Categories::all();


        View::share('checkoutCount',null);
        View::share('checkoutPrice',null);

        View::share('categories',$categories);
        View::share('letter',[]);
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
