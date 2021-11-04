<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;
    public $pengajuan_ditolak;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pengajuan_ditolak)
    {
        $this->pengajuan_ditolak = $pengajuan_ditolak;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notifikasi.notifikasi');
    }
}
