<?php

namespace App\Http\Controllers\MainControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{

    public function show()
    {

        return view('main_layouts.checkout');
    }

}
