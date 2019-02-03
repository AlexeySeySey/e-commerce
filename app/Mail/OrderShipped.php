<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Good;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $goods;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($goods)
    {
        $this->goods = $goods;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
                    return $this->from('example@example.com')
                    ->view('mail.order')
                    ->with('goods',$this->goods);
    }
}
