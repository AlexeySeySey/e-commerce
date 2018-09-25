<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\Categories;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Characteristic;

class AdminGoodsController extends Controller
{
    public function show()
    {

        $goods = Good::with(['categorie','sale','like','characteristic'])->paginate(20);
        
        $categories = Categories::all();
        $sales = Sale::all();

        return view('Admin.adminChild', [
            'section' => 'Goods',
            'goods' => $goods,
            'categories'=>$categories,
            'sales'=> $sales,
            'searchErr'=>0
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
            
            if(file_exists($request->old_image_name)){
                @unlink('public/images/products_img/.'.$request->old_image_name);
            }

            $good->image = '/images/products_img/'.$image_store_name;
        } 

        $good->name = $request->name;
        $good->weight = $request->weight;
        $good->price = $request->price;
        $good->rating = $request->rating;
        $good->weight_type = $request->w_type;
        $good->save();

        $charcterstc = (Characteristic::select('id')->where('goods_id',$request->good)->get())[0]['id'];
        $characteristic = Characteristic::find($charcterstc);
        $characteristic->stock = $request->stock;
        $characteristic->save();

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $good = Good::find($request->good);

        $good->categorie()->sync([]);
        $good->sale()->sync([]);

        Characteristic::where('goods_id',$request->good)->delete();

        if(file_exists($request->old_image_name)){
            @unlink('public/images/products_img/.'.$request->old_image_name);
        }

        $good->delete();

        return redirect()->back();
    }

    public function createProduct()
    {
        $categories = Categories::all();
        $sales = Sale::all();

        return view('Admin.adminChild', [
            'section' => 'ProductNew',
            'categories' => $categories,
            'sales' => $sales
        ]);
    }

    public function saveProduct(Request $request)
    {

        $good = new Good;

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
                return redirect()->back()->with('Err', 'Oops! Invalid file');
            }
            $good->image = '/images/products_img/'.$image_store_name;
        } 

        $good->name = $request->name;
        $good->weight = $request->weight;
        $good->price = $request->price;
        $good->weight_type = $request->w_type;

        $good->save();

        $characteristic = new Characteristic;

        $characteristic->goods_id   = $good->id;
        $characteristic->producer   = $request->producer;
        $characteristic->address    = $request->address;
        $characteristic->phone      = $request->phone;
        $characteristic->mail       = $request->email;
        $characteristic->produced   = $request->produced;
        $characteristic->expiration = $request->expiration;

        $characteristic->save();

        return redirect()->route('goods');
    }
}
