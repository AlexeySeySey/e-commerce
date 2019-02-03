<?php

namespace App\Http\Controllers;

use App\Http\Traits\Requester;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;
use App\Models\Good;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Requester;

    private $MailKey = 'JQ1ZvLdjlM5IB0OoszCOAQ';
    private $baseURI = 'https://mandrillapp.com/api/1.0/';

    private $imagePostfix = '_name.jpg';
    private $imagesFolder = '/images/';
    private $imagesPreFolder = 'public';

    protected function sendEmail($url, $options)
    {
        return $this->postJSON($this->initClient($this->baseURI), sprintf("%v.json", $url), $options);
    }

    protected function addNewImage($obj, $request, $disk, $path, $Fname, $width = 50, $height = 50)
    {
        if ($request->hasFile($Fname)) {
            if ($request->$Fname->isValid()) {

                $name = pathinfo($request->new_img_name, PATHINFO_FILENAME);

                $filename = $request->file($Fname)->getClientOriginalName();
                $image_store_name = $name . $this->imagePostfix;

                Storage::disk($disk)->put($image_store_name, file_get_contents($request->file($Fname)));

                $img = Image::make(public_path() . $this->imagesFolder . $path . '/' . $image_store_name);
                $img->resize($width, $height);
                $img->save(public_path() . $this->imagesFolder . $path . '/' . $image_store_name);
            } else {
                return redirect()->back()->with('Err', 'Oops! Invalid file');
            }
            $obj->image = $this->imagesFolder . $path . '/' . $image_store_name;
        }
    }

    protected function changeOldImage($obj, $request, $file, $current_id = 0, $disk, $folder, $width = 50, $height = 50)
    {
        if ($request->hasFile($file)) {
            if ($request->$file->isValid()) {

                $filename = $request->file($file)->getClientOriginalName();

                $image_store_name = $current_id . $this->imagePostfix;

                Storage::disk($disk)->put($image_store_name, file_get_contents($request->file($file)));

                $img = Image::make(public_path() . $this->imagesFolder . $folder . '/' . $image_store_name);
                $img->resize($width, $height);
                $img->save(public_path() . $this->imagesFolder . $folder . '/' . $image_store_name);

                $obj->image = $this->imagesFolder . $folder . '/' . $image_store_name;
            }
        }
        if ($request->old_image_name) {
            if (file_exists($request->old_image_name)) {
                @unlink($this->imagesPreFolder . $this->imagesFolder . $folder . '/' . $request->old_image_name);
            }
        }
    }

    protected function chageStock($goodID, $value, $operation)
    {
        $good = Good::find(intval($goodID));
        if ($operation) {
            $good->stock += $value;
        } elseif (!$operation)  {
            $good->stock -= $value;
        }
        $good->save();
    }

    protected function sendMail($recievers, $obj)
    {
        try {
            Mail::to($recievers)->send($obj);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
