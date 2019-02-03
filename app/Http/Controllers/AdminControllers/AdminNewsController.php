<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Mail\EventShipped;

class AdminNewsController extends Controller
{

    protected function getFollowers()
    {
        return User::where([
            ['isFollow', 1],
            ['id', '!=', Auth::id()],
        ])->get();
    }

    public function show()
    {

        $news = News::paginate(20);

        return view('Admin.adminChild', [
            'section' => 'News',
            'news' => $news,
            'searchErr' => 0,
            'followers' => $this->getFollowers(),
        ]);
    }

    public function createEvent()
    {
        return view('Admin.adminChild', [
            'section' => 'EventNew',
            'followers' => $this->getFollowers(),
        ]);

    }

    public function saveEvent(Request $request)
    {

        $event = new News;

        parent::addNewImage($event, $request, 'public_event', 'events_img', 'good_image_up', 250, 250);

        $event->name = $request->name;
        $event->action = $request->datetime;
        $event->info = $request->info;
        $event->save();
        if ($request->followers) {
            parent::sendMail($request->followers, new EventShipped($event));
        }
        return redirect()->to('/admin/admin-news');
    }

    public function editEvent(Request $request)
    {
        $event = News::find($request->event);

        parent::changeOldImage($event, $request, 'new_img_name', 0, 'public_event', 'events_img', 250, 250);

        $event->name = $request->name;
        $event->action = $request->datetime;
        $event->info = $request->info;
        $event->save();

        return redirect()->back();
    }
}
