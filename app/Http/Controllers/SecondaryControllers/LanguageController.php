<?php

namespace App\Http\Controllers\SecondaryControllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use App;
use App\Http\Controllers\Controller;

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
