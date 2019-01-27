<?php

namespace App\Mail;

use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(News $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('sinyavskij00@gmail.com')
                ->view('mail.event')
                ->with('event',$this->event)
                ->to('sinyavskij_00@mail.ru');
    }
}
