<?php

namespace App\Http\Controllers\AdminControllers;

use App;
use App\Models\User;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function show()
    {

        $users = User::all();

        $onlie   = [];
        $offline = [];

        foreach ($users as $key) {

            if ($key->isOnline()) {

                $onlie[] = $key;
            } else {
                $offline[] = $key;
            }
        }

        $onlie_count   = count($onlie);
        $offline_count = count($offline);


        return view('Admin.adminMain', [
            'onlie_count'      => $onlie_count,
            'offline_count'    => $offline_count
        ]);
    }
}
