<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Traits\Requester;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Requester;

    private $MailKey = 'JQ1ZvLdjlM5IB0OoszCOAQ';
    private $baseURI = 'https://mandrillapp.com/api/1.0/';

    private $imagePostfix = '_name.jpg';
    private $imagesFolder = '/images/';
    private $imagesPreFolder = 'public';

    protected function sendEmail($url, $options){
        return $this->postJSON($this->initClient($this->baseURI), $url.".json", $options);
    }

    protected function addNewImage($obj, $request, $disk, $path, $Fname, $width = 50, $height = 50)
    {
        if ($request->hasFile($Fname)) {
            if ($request->$Fname->isValid()) {
                
                $name = pathinfo($request->new_img_name, PATHINFO_FILENAME);
    
                $filename = $request->file($Fname)->getClientOriginalName();
                $image_store_name = $name.$this->imagePostfix;
    
                Storage::disk($disk)->put($image_store_name, file_get_contents($request->file($Fname)));
    
                $img = Image::make(public_path().$this->imagesFolder.$path.'/'.$image_store_name);
                $img->resize($width, $height);
                $img->save(public_path().$this->imagesFolder.$path.'/'.$image_store_name);
            } else {
                return redirect()->back()->with('Err', 'Oops! Invalid file');
            }
            $obj->image = $this->imagesFolder.$path.'/'.$image_store_name;
        } 
    } 

    protected function changeOldImage($obj, $request, $file, $current_id = 0, $disk, $folder, $width = 50, $height = 50)
    {
        if ($request->hasFile($file)) {
            if ($request->$file->isValid()) {

                $filename = $request->file($file)->getClientOriginalName(); 

                $image_store_name = $current_id.$this->imagePostfix;

                Storage::disk($disk)->put($image_store_name, file_get_contents($request->file($file)));

                $img = Image::make(public_path().$this->imagesFolder.$folder.'/'.$image_store_name);
                $img->resize($width, $height);
                $img->save(public_path().$this->imagesFolder.$folder.'/'.$image_store_name);

                $obj->image = $this->imagesFolder.$folder.'/'.$image_store_name;
            }
        }
        if($request->old_image_name){ 
        if(file_exists($request->old_image_name)){
            @unlink($this->imagesPreFolder.$this->imagesFolder.$folder.'/'.$request->old_image_name);
        }
      }
    }
}
