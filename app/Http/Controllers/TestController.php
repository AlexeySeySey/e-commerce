<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;

class TestController extends Controller
{

    public function show()
    {

        return view('test');
    }

    public function search(Request $request)
    {

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

    }

}
