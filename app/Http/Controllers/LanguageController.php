<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;
use App;

class LanguageController extends Controller
{

    public function setLocalisation($locale)
    {
        $current      = Auth::id();
        $user         = User::find($current);
        $user->locale = $locale;
        $user->save();

        return redirect()->back();
    }
}
