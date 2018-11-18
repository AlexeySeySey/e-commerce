<?php

namespace App\Http\Controllers\MainControllers;

use App;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Good;

class CategoryController extends Controller
{

    public function show($id)
    {
        $all = Categories::find($id);
        
        if(!$all){
            abort(404, "Not Found");
        }

        $image = (((Categories::select('image')->where('id', $id)->get())->toArray())[0])["image"];

        $goods = Good::with('characteristic', 'categorie', 'sale', 'like')
            ->where('categorie_id', $id)
            ->orderBy('updated_at', 'desc')
            ->paginate(6);

        switch (App::getLocale()){
            case 'ru':
                $name = (((Categories::select('RUname')->where('id', $id)->get())->toArray())[0])['RUname'];
                break;
            case 'uk':
                $name = (((Categories::select('UKname')->where('id', $id)->get())->toArray())[0])['UKname'];
                break;
            case 'en':
                $name = (((Categories::select('ENname')->where('id', $id)->get())->toArray())[0])['ENname'];
                break;
            default:
                $name = (((Categories::select('ENname')->where('id', $id)->get())->toArray())[0])['ENname'];
        }

        return view('main_layouts.category', [
            'name'          => $name,
            'goods'         => $goods,
            'image'         => $image,
            'good'          => null
        ]);
    }

}
