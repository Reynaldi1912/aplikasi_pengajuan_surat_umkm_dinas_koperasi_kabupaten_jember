<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class konsultasiDitolak extends Mailable
{
    use Queueable, SerializesModels;
    public $tolak;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tolak)
    {
        $this->tolak = $tolak;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notifikasi.konsultasi-tolak');
    }
}
