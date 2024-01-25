namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MilletQuestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $recipientName;

    public function __construct($recipientName)
    {
        $this->recipientName = $recipientName;
    }

    public function build()
    {
        return $this->subject('The 500K Prize Could Be Yours To Win')
                    ->view('emails.millet_quest_email');
    }
}
