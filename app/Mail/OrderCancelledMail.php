<?php

namespace App\Mail;

use App\Util\ExceptionUtil\ExceptionUtil;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCancelledMail extends Mailable
{
    use Queueable, SerializesModels;
    public string $fullName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('v1.email.order-cancelled-email')

        ->with([ 'fullName'=>$this->fullName]);
    }
}
