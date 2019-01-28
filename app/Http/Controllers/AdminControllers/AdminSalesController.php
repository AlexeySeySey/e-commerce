<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;

class AdminSalesController extends Controller
{
    public function show()
    {
        $sales = Sale::with('good')->get();
        return view('Admin.adminChild',[
            'section'=>'Sales',
            'sales'=>$sales
        ]);
    }

    public function drop(Request $request){
          Sale::destroy($request->saleID);
          return redirect()->back();
    }
}
