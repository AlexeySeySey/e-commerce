<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Categories;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddCategorieController extends Controller
{

    public function add(Request $request)
    {
        if(($request->ENname == null) and ($request->RUname == null) and ($request->UKname == null)){
            abort(403, 'You forget to input data!');
        }

        $ENname = $request->ENname;
        $RUname = $request->RUname;
        $UKname = $request->UKname;

        $categorie = new Categories;

        parent::addNewImage($categorie, $request, 'public', 'upload_cat', 'categories_image', 1100, 240);

        $categorie->ENname = $ENname;
        $categorie->RUname = $RUname;
        $categorie->UKname = $UKname;
        $categorie->save();

        return redirect()->back();
    }

    public function updateImg(Request $request)
    {

        if (!($request->hasFile('new_categories_image'))) {
            abort(403, 'You forget to input data!');
        }

        $current_category_id = intval($request->current_category_id);
        $categorie = Categories::find($current_category_id);

        parent::changeOldImage($categorie, $request, 'new_categories_image', $current_category_id, 'public_cat', 'upload_cat', 1100, 240);

        $categorie->save();

        return redirect()->back();

    }

    public function updateName(Request $request)
    {

        $current_category_id = intval($request->current_category_id);

        if(($request->ENname == null) and ($request->RUname == null) and ($request->UKname == null)){
            abort(403, 'You forget to input data!');
        }

        $ENname = $request->ENname;
        $RUname = $request->RUname;
        $UKname = $request->UKname;


        $categorie = Categories::find($current_category_id);
        $categorie->ENname = $ENname;
        $categorie->RUname = $RUname;
        $categorie->UKname = $UKname;
        $categorie->save();

        return redirect()->back();

    }

}
