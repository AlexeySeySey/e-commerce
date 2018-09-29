<?php

namespace App\Http\Controllers\AdminControllers;

use App\Mail\EventShipped;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AdminNewsController extends Controller
{

    public function show()
    {

       $news = News::paginate(20);
       $followers = User::where('isFollow',1)->get();

        return view('Admin.adminChild',[
            'section'=>'News',
            'news'=>$news,
            'searchErr'=>0,
            'followers'=>$followers
        ]);
    }

    public function createEvent()
    {

        $followers = User::where('isFollow',1)->get();
        
        return view('Admin.adminChild',[
            'section'=>'EventNew',
            'followers'=>$followers
        ]);
        

    }

    public function saveEvent(Request $request)
    {

    $event = new News;

    parent::addNewImage($event, $request, 'public_event', 'events_img', 'good_image_up', 250, 250);

    $event->name = $request->name;
    $event->action = $request->datetime;
    $event->info = $request->info;

    $ids = (User::select('id')->whereIn('isFollow',1)->get())->toArray()[0];

    Mail::to(User::find($ids))->send(new EventShipped($event));
    
    $event->save();

    return redirect()->to('/admin/admin-news');
    }

    public function editEvent(Request $request)
    {
       /*
  "new_img_name" => "черный.jpg"
  "image_up" => UploadedFile {1059 ▶}
       */
      $event = News::find($request->event);

      parent::changeOldImage($event, $request, 'new_img_name', 0, 'public_event', 'events_img', 250, 250);

      // не срабатывает изменение изображения

      $event->name = $request->name;
      $event->action = $request->datetime;
      $event->info = $request->info;
      $event->save();

      return redirect()->back();
    }

    public function deleteEvent(Request $request)
    {
        // ....Delete
    }
}
