<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DropCategorieController extends Controller
{

    public function hide(Request $request)
    {

        $categorie_id = intval($request->categorie_id);

        if(($categorie_id==null) or ($categorie_id==0)){
            abort(400,'Bad request');
        }

        $categorie = Categories::find($categorie_id);
        $categorie->delete();

        return;
    }

    public function drop(Request $request)
    {
        $categorie_id = intval($request->categorie_id);

        if(($categorie_id==null) or ($categorie_id==0)){
            abort(400,'Bad request');
        }

        $categorie = Categories::withTrashed()->find($categorie_id);
        $categorie->forceDelete();

        return;
    }
}
