<?php

namespace App\Http\Controllers\MainControllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Mail\OrderShipped; 

class PayController extends Controller
{

    public function do(Request $req)
    {
        $goods = json_decode($req->goods);

        $ids = [];
        foreach($goods as $good){
            $ids[] = $good->good[0]->id;
        }

        Cart::where('user_id',Auth::id())->whereIn('good_id',$ids)->delete();
        parent::sendMail(Auth::user(), new OrderShipped($goods));

        return redirect()->to('/');
    }

}
