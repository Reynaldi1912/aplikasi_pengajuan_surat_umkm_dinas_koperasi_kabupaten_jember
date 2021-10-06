<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berkas extends Model
{
    use HasFactory;
    protected $table="berkas";
    protected $primaryKey ="id_berkas";
    protected $fillable = [
        'id_berkas',
        'scan_ktp',
        'pas_foto_berwarna',
        'foto_produk',
        'surat_pernyataan',
        'sku_dari_desa',
        'sertifikat',
    ];
    public function pengajuan(){
        return $this->hasMany(pengajuan::class);
    }

}
