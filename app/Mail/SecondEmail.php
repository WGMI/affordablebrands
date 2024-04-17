<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MLTEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $recipientName;

    public function __construct($recipientName)
    {
        $this->recipientName = $recipientName;
    }

    public function build()
    {
        return $this->subject('GET READY TO WIN KES 500,000 IN THE GREAT MILLET QUEST CONTEST')
                    ->view('emails.second_millet_quest_email');
    }
}
