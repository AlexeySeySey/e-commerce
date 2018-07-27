<?php namespace App\Http\ViewComposers;

use App\Models\Categories;
use Auth;
use Illuminate\Contracts\View\View;

class GlobalComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {

        $categories = Categories::all();

        $view->with('categories', $categories);
    }

}