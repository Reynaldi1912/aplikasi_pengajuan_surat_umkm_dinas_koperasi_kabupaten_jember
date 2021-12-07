<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class konsultasiPelanggaran extends Mailable
{
    use Queueable, SerializesModels;
    public $day , $date ,$day_next,$date_next,$konsultasi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($day,$date,$day_next,$date_next,$konsultasi)
    {
        $this->day = $day;
        $this->date = $date;
        $this->day_next = $day_next;
        $this->date_next = $date_next;
        $this->konsultasi = $konsultasi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notifikasi.konsultasi-pelanggaran');
    }
}
