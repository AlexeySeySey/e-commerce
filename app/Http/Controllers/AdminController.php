<?php

namespace App\Http\Controllers;

use App;
use App\User;
use App\AdminCategorie;

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

        $admin_categoires = AdminCategorie::all();

        return view('Admin.adminMain', [
            'onlie_count'      => $onlie_count,
            'offline_count'    => $offline_count,
            'admin_categoires' => $admin_categoires
        ]);
    }
}
