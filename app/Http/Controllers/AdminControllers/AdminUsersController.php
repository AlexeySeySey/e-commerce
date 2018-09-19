<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Models\User;

class AdminUsersController extends Controller
{
    public function show()
    {

        $admin_role         = ((Role::with('user')->where('name', 'admin')->get())->toArray())[0];
        $admin_id         = intval((($admin_role['user'])[0])['id']);

        $users = User::with(['cart', 'user_like'])->where([
            ['id', '!=', $admin_id],
            ['id','!=',\Auth::id()]
        ])->get();

        return view('Admin.adminChild',[
            'users'=>$users,
            'section'=>'Users'
        ]);
    }
}
