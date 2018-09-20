<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Role;

class SearchController extends Controller
{
    
    public function searchUser(Request $request)
    {
        if((!$request->search) || (!$request)){
           return redirect()->back();
        }

        $admin_role       = ((Role::with('user')->where('name', 'admin')->get())->toArray())[0];
        $admin_id         = intval((($admin_role['user'])[0])['id']);

        $users = User::with(['cart', 'user_like'])
                     ->userSearch($admin_id,\Auth::id(),$request->search)
                     ->get();
                     
        if(count($users)==0){
            $searchErr = 1;
        }else{
            $searchErr = 0;
        }             

        return view('Admin.adminChild',[
            'users'=>$users,
            'section'=>'Users',
            'searchErr'=>$searchErr
        ]);
    }
}
