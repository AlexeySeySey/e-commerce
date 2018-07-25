<?php

namespace App\Http\Controllers\MainControllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
