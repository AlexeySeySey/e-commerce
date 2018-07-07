<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BestController extends Controller
{
    public function show()
    {
        return view('products',[
            'image' => null
        ]);
    }
}
