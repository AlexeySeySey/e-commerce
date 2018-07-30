<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;


class TestController extends Controller
{

    public function show()
    {

        return view('test');
    }

    public function search(Request $request)
    {

        /*
        $goods = Good::addAllToIndex();
        $test = Good::complexSearch([
            'body' => [
                'query' => [
                    'match' => [
                        'name' => $name
                    ]
                ]
            ]
        ]);
        */

    }

}
