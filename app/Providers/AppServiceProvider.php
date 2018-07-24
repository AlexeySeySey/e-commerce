<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Event;
use App\Categories;

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

        View::share('checkoutCount',null);
        View::share('checkoutPrice',null);

        $categories = Categories::all();
        View::share('categories',$categories);
        View::share('letter',[]);



        View::share('goods',[]);
        View::share('follow',[]);
        View::share('id',null);

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
