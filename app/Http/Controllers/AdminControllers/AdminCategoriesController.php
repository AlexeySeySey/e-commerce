<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{

    public function show()
    {

        $categories = Categories::with('good')->get();

        $trashed_categories = Categories::onlyTrashed()->get();

        return view('Admin.adminChild', [
            'section'             => 'Categories',
            'categories'          => $categories,
            'trashed_categories'  => $trashed_categories
        ]);
    }

    public function restore(Request $request)
    {
        $categorie_id = intval($request->categorie_id);

        if(($categorie_id==null) or ($categorie_id==0)){
            abort(400,'Bad request');
        }

        Categories::withTrashed()->where('id',$categorie_id)->restore();

        return;
    }
}
