<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewStaffMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $fullName;
    public string $email;
    public string $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullName, $email, $password)
    {
        //
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('v1.email.new-staff')

            ->with(['fullName'=>$this->fullName,'email'=>$this->password, "password"=>$this->password]);
    }
}
