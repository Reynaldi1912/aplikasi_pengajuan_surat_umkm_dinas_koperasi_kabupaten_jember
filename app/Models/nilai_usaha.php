<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_usaha extends Model
{
    use HasFactory;

    protected $table="nilai_usaha";
    protected $fillable = [
        'id_nilai_usaha',
        'modal_usaha',
        'asset',
        'omset',
        'keuntungan',
        'jumlah_tenaga_kerja',
    ];

    public function usaha(){
        return $this->hasOne(usaha::class);
    }
}
