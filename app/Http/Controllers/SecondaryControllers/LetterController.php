<?php

namespace App\Http\Controllers\SecondaryControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LetterController extends Controller
{

    public function new(Request $request)
    {
        $user_id = $request->user_id;

        $user           = User::find($user_id);
        $user->isFollow = 1;
        $user->save();


        return "<i class='fa fa-check'></i>";
    }
}
