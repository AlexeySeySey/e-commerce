<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;

class MailController extends Controller
{

    public function show()
    {
        return view('info_layouts\mail');
    }
}
