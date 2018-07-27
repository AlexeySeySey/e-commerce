<?php

namespace App\Http\Controllers\SecondaryControllers;

use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\Like;
use Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function add(Request $request)
    {
        $user_id = Auth::id();

        $good_id      = intval($request->some);
        $Good         = Good::find($good_id);
        $Good->rating += 1;
        $Good->save();

        $like          = new Like;
        $like->user_id = $user_id;
        $like->good_id = $good_id;
        $like->save();

        return '+1';
    }
}
