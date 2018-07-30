<?php

namespace App\Http\Controllers\MainControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{

    public function show()
    {

        return view('main_layouts\payment');
    }

}
