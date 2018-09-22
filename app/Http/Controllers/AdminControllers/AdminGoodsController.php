<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\Categories;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AdminGoodsController extends Controller
{
    public function show()
    {

        $goods = Good::with(['categorie','sale','like'])->paginate(20);
        
        $categories = Categories::all();
        $sales = Sale::all();

        return view('Admin.adminChild', [
            'section' => 'Goods',
            'goods' => $goods,
            'categories'=>$categories,
            'sales'=> $sales
        ]);
    }

    public function edit(Request $request)
    {
        $good = Good::find($request->good);

        $good->categorie()->sync($request->input('categories_checked'));
        $good->sale()->sync($request->input('sales_checked'));

        if ($request->hasFile('good_image_up')) {
            if ($request->good_image_up->isValid()) {
                
                $name = pathinfo($request->new_img_name_good, PATHINFO_FILENAME);

                $filename = $request->file('good_image_up')->getClientOriginalName();
                $image_store_name = $name.$request->good.'_name.jpg';

                Storage::disk('public_good')->put($image_store_name, file_get_contents($request->file('good_image_up')));

                $img = Image::make(public_path().'/images/products_img/'.$image_store_name);
                $img->resize(140,140);
                $img->save(public_path().'/images/products_img/'.$image_store_name);
            } else {
                return redirect()->back()->with('error_file_change', 'Oops! Invalid file');
            }
            
            if(file_exists($request->old_category_image_name)){
                @unlink('public/images/products_img/.'.$request->old_category_image_name);
            }

            $good->image = '/images/products_img/'.$image_store_name;
        } 

        $good->name = $request->name;
        $good->weight = $request->weight;
        $good->price = $request->price;
        $good->rating = $request->rating;
        $good->weight_type = $request->w_type;

        $good->save();


        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Good::destroy(intval($request->good));
        return redirect()->back();
    }
}
