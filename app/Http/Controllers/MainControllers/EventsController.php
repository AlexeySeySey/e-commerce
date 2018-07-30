<?php

namespace App\Http\Controllers\MainControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{

    public function show()
    {

        return view('info_layouts\events');
    }
}
