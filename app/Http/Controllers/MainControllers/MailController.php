<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mail;

class MailController extends Controller
{

    public function show()
    {
        return view('info_layouts.mail');
    }

    public function send(Request $request)
    {
         $mail = new Mail;
         $mail->user_id = intval($request->sender);
         $mail->subject = $request->Subject;
         $mail->message = $request->Message;
         $mail->save();

         return redirect()->back();
    }
}
