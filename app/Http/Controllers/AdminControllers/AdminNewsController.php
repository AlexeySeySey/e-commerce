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

        return view('Admin.adminChild',[
            'section'=>'News',
            'news'=>$news,
            'searchErr'=>0
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

    if(($request->followersNoty) and (count($request->followersNoty)>0)){
    $emails = (User::select('email')->whereIn('id',$request->followersNoty)->get())->toArray()[0];
    Mail::to(User::find($request->followersNoty))->send(new EventShipped($event));
    }

    $event->save();

    return redirect()->to('/admin/admin-news');
    }

    public function editEvent(Request $request)
    {
        // EDIT and resend messages to followers
    }
}
