<?php

namespace App\Http\Controllers\AdminControllers;

use App;
use App\Models\AdminCategorie;
use App\Models\Categories;
use App\Role;
use App\Models\User;
use Auth;
use Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminChildController extends Controller
{

    public function show(Request $request)
    {
        $section_id = intval($request->id);

        $admin_categoires = AdminCategorie::all();

        $section = (((AdminCategorie::select('name')->where('id', $section_id)->get())->toArray())[0])['name'];

        //For Each Section = Specific case

        if ($section == 'Categories') {
            $localizations       = ['en', 'ru', 'uk'];
            $other_localizations = [];

            foreach ($localizations as $key) {
                if ($key != App::getLocale()) {
                    $other_localizations[] = ucwords($key);
                }
            }

            $categories = Categories::with('good')->get();

            $trashed_categories = Categories::onlyTrashed()->get();

            return view('Admin.adminChild', [
                'section'             => $section,
                'categories'          => $categories,
                'other_localizations' => $other_localizations,
                'admin_categoires'    => $admin_categoires,
                'trashed_categories'  => $trashed_categories
            ]);
        }

        if ($section == 'Users') {

            $admin_role         = ((Role::with('user')->where('name', 'administrator')->get())->toArray())[0];
            $admin_support_role = ((Role::with('user')->where('name', 'admin_support')->get())->toArray())[0];

            $admin_id         = intval((($admin_role['user'])[0])['id']);
            $admin_support_id = intval((($admin_support_role['user'])[0])['id']);


            $users = User::with(['cart', 'user_like', 'follow'])->where([
                ['id', '!=', $admin_id],
                ['id', '!=', $admin_support_id]
            ])->get();

            if (env('APP_DEBUG') || env('APP_ENV') === 'local') {
                Artisan::call('view:clear');
            }

            return view('Admin.adminChild', [
                'users'            => $users,
                'section'          => $section,
                'admin_categoires' => $admin_categoires
            ]);
        }

        if ($section == 'Categories') {

            // ...

            return view('Admin.adminChild', [
                'section'          => $section,
                'admin_categoires' => $admin_categoires
            ]);
        }

        //basic (empty) case
        return view('Admin.adminChild', [
            'section'          => $section,
            'admin_categoires' => $admin_categoires
        ]);

    }
}
