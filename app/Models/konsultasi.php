<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konsultasi extends Model
{
    use HasFactory;
    protected $table="konsultasi";
    protected $primaryKey="id_konsultasi";
    protected $fillable = [
        'id_konsultasi',
        'users_id',
        'nama_pengaju',
        'tanggal_pengajuan',
        'sesi_konsultasi',
        'keterangan',
        'status_konsultasi',
    ];

    public function User(){
        return $this->belongsTo(User::class,'users_id','id');
    }
    public function konsultasi_ditolak(){
        return $this->hasOne(konsultasi_ditolak::class);
    }
}
