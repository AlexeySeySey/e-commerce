<?php

namespace App\Http\Controllers;

use App\Follower;
use Illuminate\Http\Request;

class LetterController extends Controller
{

    public function new(Request $request)
    {
        $user_id = $request->user_id;

        $follow           = new Follower();
        $follow->users_id = $request->user_id;
        $follow->save();


        return "<i class='fa fa-check'></i>";
    }
}
