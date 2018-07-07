<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class StartController extends Controller
{

    public function show()
    {
        $categories = Categories::with('good')->get();

        return view('start', [
            'categories' => $categories
        ]);
    }
}
