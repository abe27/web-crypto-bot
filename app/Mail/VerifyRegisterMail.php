<?php

namespace App\Mail;

use App\Models\Administrator;
use App\Models\AntiSpamCode;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyRegisterMail extends Mailable
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
        $admin = Administrator::first();
        $ant = AntiSpamCode::where('user_id', $admin->user_id)->first();
        return $this->subject('แจ้งแตือนพบข้อมูลลงทะเบียนผู้ใช้งานใหม่')
            ->view('emails.register')
            ->with([
                'userName' => $this->user->email,
                'antispam' => $ant->anti_spam_code,
            ]);
    }
}
