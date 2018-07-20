<?php

namespace App\Http\ViewComposers;

use App\AdminCategorie;
use Illuminate\View\View;

class AdminViewComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {

        $admin_categoires = AdminCategorie::all();

        $view->with('admin_categoires', $admin_categoires);
    }
}