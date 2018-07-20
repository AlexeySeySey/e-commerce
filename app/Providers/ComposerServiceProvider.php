<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\AdminCategorie;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
       // View::composer('*','App\Http\ViewComposers\CategoriesComposer');


        //$admin_sections = (AdminCategorie::all())->toArray();


        /*View::composer(
            ['*'],
            'App\Http\ViewComposers\AdminViewComposer'
        );*/
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}