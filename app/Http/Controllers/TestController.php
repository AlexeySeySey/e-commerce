<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TestController extends Controller
{

    public function show()
    {

        return view('test');
    }

    public function search(Request $request)
    {
        $name = trim($request->name);

        /*if($goods->indices()->exists($indexParams)) {
            $goods = Good::addAllToIndex();
        }

        $test = Good::complexSearch([
            'body' => [
                'query' => [
                    'match' => [
                        'name' => $name
                    ]
                ]
            ]
        ]);

        dd($test->toArray());*/
    }

}
