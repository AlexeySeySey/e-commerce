<?php

namespace App\Http\Controllers;

use App;
use App\AdminCategorie;
use App\User;

class AdminController extends Controller
{

    public function show()
    {

        $localizations       = ['en', 'ru', 'uk'];
        $other_localizations = [];

        $locale = App::getLocale();

        foreach ($localizations as $key) {
            if ($key != $locale) {
                $other_localizations[] = ucwords($key);
            }
        }

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

        $admin_categoires = AdminCategorie::orderByRaw('CHAR_LENGTH(name)')->get();

        return view('Admin.adminMain', [
            'other_localizations' => $other_localizations,
            'locale'              => ucwords($locale),
            'onlie_count'         => $onlie_count,
            'offline_count'       => $offline_count,
            'admin_categoires'    => $admin_categoires
        ]);
    }
}
