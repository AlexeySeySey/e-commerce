<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminConfigurationsController extends Controller
{
    public function show()
    {

        return view('Admin.adminChild',[
            'section'=>'Configurations'
        ]);
    }
}
