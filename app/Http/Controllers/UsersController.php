<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Response;

class UsersController extends Controller
{

    public function show()
    {


        return Response::json($users);
    }
}
