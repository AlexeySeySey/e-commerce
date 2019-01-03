<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;

class ServicesController extends Controller
{


    public function show()
    {

        return view('info_layouts.services');
    }

}
