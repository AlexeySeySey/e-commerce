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

        $name = (((Categories::select('ENname')->where('id',$current_category_id)->get())->toArray())[0])['ENname'];

        if ($request->hasFile('new_categories_image')) {
            if ($request->new_categories_image->isValid()) {

                $filename = $request->file('new_categories_image')->getClientOriginalName();
                $image_store_name = $name.$current_category_id.'_name.jpg';

                Storage::disk('public')->put($image_store_name, file_get_contents($request->file('new_categories_image')));

                $img = Image::make(public_path().'/images/upload_cat/'.$image_store_name);
                $img->resize(1100, 240);
                $img->save(public_path().'/images/upload_cat/'.$image_store_name);
            }
        } else {
            abort(500, 'Oops! something wrong with your file!');
        }

        $categorie = Categories::find($current_category_id);
        $categorie->image = $image_store_name;
        $categorie->save();


        if(file_exists($request->old_category_image_name)){
            @unlink('public/images/upload_cat/.'.$request->old_category_image_name);
        }

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
