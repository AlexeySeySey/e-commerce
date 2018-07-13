<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Sale;
use Auth;
use App\Follower;

class StartController extends Controller
{

    public function show()
    {
        $categories = Categories::with('good')->get();

        $sales = Sale::with('good')
            ->orderBy('percentages', 'DESC')
            ->take(6)
            ->get();

        $id = Auth::id();

        $letter = Follower::where('users_id', $id)->get();

        return view('start', [
            'categories' => $categories,
            'letter'     => $letter,
            'goods'      => $sales,
            'id'         => $id
        ]);
    }
}
