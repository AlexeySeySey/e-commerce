<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlackList;

class BanController extends Controller
{

    public function ban(Request $request)
    {
        $user_id = intval($request->user_id);

      /* $black = new BlackList;
       $black->users_id = $user_id;
       $black->save();
*/

        return json_encode('Banned');
    }

    public function unban(Request $request)
    {
        $user_id = intval($request->user_id);

        $black = BlackList::find($user_id)->delete();

        return json_encode('Unbanned');
    }
}
