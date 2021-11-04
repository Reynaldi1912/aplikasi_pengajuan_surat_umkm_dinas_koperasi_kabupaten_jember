<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usaha extends Model
{
    use HasFactory;

    protected $table="usaha";
    protected $fillable = [
        'id_usaha',
        'nilai_usaha_id',
        'nama_usaha',
        'jenis_usaha',
        'kegiatan_usaha',
        'tanggal_usaha_mulai',
        'pinjaman_dana',
        'ikut_pembinaan_usaha',
    ];

    public function pengajuan(){
        return $this->hasMany(pengajuan::class);
    }
    public function nilai_usaha(){
        return $this->belongsTo(nilai_usaha::class,'nilai_usaha_id','id_nilai_usaha');
    }
}
