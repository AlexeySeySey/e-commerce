<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Models\Sale;

class StartController extends Controller
{

    public function show()
    {

        $sales = Sale::with('good')
            ->orderBy('percentages', 'DESC')
            ->take(6)
            ->get();

        return view('main_layouts.start', [
            'goods'         => $sales,
        ]);
    }
}
