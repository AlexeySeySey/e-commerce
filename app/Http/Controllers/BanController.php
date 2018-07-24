<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class BanController extends Controller
{

    public function ban(Request $request)
    {
        $user_id = intval($request->user_id);

       $user = User::find($user_id);
       $user->isBan = 1;
       $user->save();


        return json_encode('Banned');
    }


    public function unban(Request $request)
    {
        $user_id = intval($request->user_id);

        $user = User::find($user_id);
        $user->isBan = 0;
        $user->save();

        return json_encode('Unbanned');
    }
}
