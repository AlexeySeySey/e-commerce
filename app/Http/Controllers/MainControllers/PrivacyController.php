<?php

namespace App\Http\Controllers\MainControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacyController extends Controller
{

    public function show()
    {

        return view('info_layouts.privacy');
    }
}
