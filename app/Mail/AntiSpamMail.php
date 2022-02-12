<?php

namespace App\Mail;

use App\Models\AntiSpamCode;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Request;

class AntiSpamMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ant = AntiSpamCode::where('user_id', $this->user->id)->first();
        $spamcode = 'คุณยังไม่ได้เปิดใช้งาน Anti Spam Code';
        if ($ant != null) {
            $spamcode = $ant->anti_spam_code;
        }
        return $this->subject('แจ้งแตือนการเข้าใช้งาน')
            ->view('emails.antispam')
            ->with([
                'user' => $this->user,
                'ipAddress' => Request::ip(),
                'antispam' => $spamcode,
            ]);
    }
}
