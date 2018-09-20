<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Good;
use Illuminate\Http\Request;

class AdminGoodsController extends Controller
{
    public function show()
    {

        $goods = Good::with(['categorie','sale','like'])->paginate(20);

        return view('Admin.adminChild', [
            'section' => 'Goods',
            'goods' => $goods,
        ]);
    }

    public function edit(Request $request)
    {
        if($request->hasFile('good_image_up')){
            dump('file here');
        }else{
            dump('no files');
        }
        dd($request->toArray());
        // update data including files, like in categories
        $good = Good::find($request->good);
        // ... form stuff
        $good->save();

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Good::destroy(intval($request->good));
        return redirect()->back();
    }
}
