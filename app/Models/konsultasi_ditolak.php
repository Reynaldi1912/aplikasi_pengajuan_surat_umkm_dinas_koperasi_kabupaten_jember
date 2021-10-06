<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konsultasi_ditolak extends Model
{
    use HasFactory;
    protected $table="konsultasi_ditolak";
    protected $fillable = [
        'id_konsultasi_ditolak',
        'konsultasi_id',
        'keterangan',
    ];
    public function konsultasi(){
        return $this->belongsTo(konsultasi::class,'konsultasi_id','id_konsultasi');
    }
}
