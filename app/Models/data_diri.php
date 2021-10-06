<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_diri extends Model
{
    use HasFactory;
    protected $table="data_diri";
    protected $fillable = [
        'id_data_diri',
        'nama_pengaju',
        'tanggal_pengajuan',
        'kelurahan_desa',
        'dusun_jalan',
        'kecamatan',
        'no_telp',
    ];
    public function pengajuan(){
        return $this->hasMany(pengajuan::class);
    }
}
