<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\User;
use App\Role;
use App\Cart;
use App\Good;
use App\Follower;
use App\AdminCategorie;
use Illuminate\Http\Request;

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

            $locale = App::getLocale();

            foreach ($localizations as $key) {
                if ($key != $locale) {
                    $other_localizations[] = ucwords($key);
                }
            }

            return view('Admin.adminChild', [
                'section'             => $section,
                'locale'              => $locale,
                'other_localizations' => $other_localizations,
                'admin_categoires'    => $admin_categoires
            ]);
        }

        if($section == 'Users'){
            /*
             * Список зареганных юзеров + Добавить юзера в ЧС + Статистика покупок (какие товары куплены, когда, на какую сумму,
             * именно куплены, а не оплачены)
             * Черный список юзеров + убрать юзера в ЧС
             *
             * */
            //Если это админ или помощник, то его нельзя забанить.

            $admin_role = ((Role::with('user')->where('name','administrator')->get())->toArray())[0];
            $admin_support_role = ((Role::with('user')->where('name','admin_support')->get())->toArray())[0];

            $admin_id = intval((($admin_role['user'])[0])['id']);
            $admin_support_id = intval((($admin_support_role['user'])[0])['id']);


            $users = User::with(['cart','user_like','follow','ban'])->where([
                ['id','!=',$admin_id],
                ['id','!=',$admin_support_id]
            ])->get();


            return view('Admin.adminChild', [
                'users'               => $users,
                'section'             => $section,
                'admin_categoires'    => $admin_categoires
            ]);
        }

        //basic (empty) case
        return view('Admin.adminChild', [
            'section'             => $section,
            'admin_categoires'    => $admin_categoires
        ]);

    }
}
