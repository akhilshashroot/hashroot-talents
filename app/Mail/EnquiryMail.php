<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data ;
        $message_content = "<b>Name :</b> ".$data['name']."<br/><br/><b>
        Email :</b> ".$data['email']."<br/><br/><b>
        Phone :</b> ".$data['phone']."<br/><br/><b>
        Message : </b>".$data['message']."<br/><br/><b>";
        $subject  = $data['subject'];
        $to_address="akhil.s@hashroot.com";
        return $this->to($to_address)->from('site@stakefield.com', 'Talent Enquiry')
        ->subject($subject)
        ->html($message_content);
    }
}
