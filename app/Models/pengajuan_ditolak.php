<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_ditolak extends Model
{
    use HasFactory;
    protected $table="pengajuan_ditolak";
    protected $primaryKey="id_pengajuan_ditolak";
    protected $fillable = [
        'pengajuan_id',
        'keterangan',
    ];

    public function pengajuan(){
        return $this->belongsTo(pengajuan::class,'pengajuan_id','id_pengajuan');
    }
}
