<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class konsultasiDiterima extends Mailable
{
    use Queueable, SerializesModels;
    public $day , $date ,$konsultasi;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($day,$date,$konsultasi)
    {
        $this->day = $day;
        $this->date = $date;
        $this->konsultasi = $konsultasi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notifikasi.notifikasi-diterima');
    }
}
