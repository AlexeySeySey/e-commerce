<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\Categories;
use App\Models\Sale;
use Illuminate\Http\Request;
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

        parent::changeOldImage($good, $request, 'good_image_up', 0, 'public_good', 'products_img', 140, 140);         

        $good->categorie()->sync($request->input('categories_checked'));
        $good->sale()->sync($request->input('sales_checked'));

        $good->name = $request->name;
        $good->weight = $request->weight;
        $good->price = $request->price;
        $good->rating = $request->rating;
        $good->weight_type = $request->w_type;
        $good->save();

        $charcterstc = (Characteristic::where('goods_id',$request->good)->get())[0]['id'];
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

        parent::addNewImage($good, $request, 'public_good', 'products_img', 'good_image_up', 140, 140);

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
