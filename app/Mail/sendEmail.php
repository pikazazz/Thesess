<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($params)
    {

        $this->data = $params;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
            ->from('no-reply@accounts.google.com')
            ->subject("การแก้ไขจากผู้ดูแลระบบ")
            ->view('mail')
            ->with(['data' => $this->data]);
    }
}
