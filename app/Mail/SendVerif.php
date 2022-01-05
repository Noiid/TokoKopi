<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class SendVerif extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $details;
    private $keterangan;
    private $url;
    private $subjected;
    private $receiver;
    public function __construct($details,$keterangan,$url,$subject,$receiver)
    {
        $this->details = $details;
        $this->keterangan = $keterangan;
        $this->url = $url;
        $this->subjected = $subject;
        $this->receiver = $receiver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::where('email',$this->receiver->email)->first();
        return $this->subject($this->subjected)->view('email.akun_verif', ['details' => $this->details, 
        'keterangan' => $this->keterangan, 'url' => $this->url, 'receiver' => $user->nama_depan]);
    }
}
