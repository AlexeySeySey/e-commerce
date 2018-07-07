<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Good;
use App\Characteristic;

class CategoryController extends Controller
{

    public function show($id)
    {

        $name = ((((Categories::where('id', $id)->get())->toArray())[0])["name"]);

        $image = (((Categories::select('image')->where('id', $id)->get())->toArray())[0])["image"];

        $goods = Good::with('categorie', 'characteristic', 'sale')->where('categories_id',
            $id)->orderBy('updated_at','desc')->distinct()->paginate(8);


        return view('category', [
            'name'  => $name,
            'goods' => $goods,
            'image' => $image,
            'good'  => null
        ]);
    }
}
