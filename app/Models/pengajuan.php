<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    use HasFactory;
    protected $table="pengajuan";
    protected $primaryKey="id_pengajuan";
    protected $fillable = [
        'id_pengajuan',
        'users_id',
        'data_diri_id',
        'usaha_id',
        'berkas_id',
        'status',
    ];

    public function User(){
        return $this->belongsTo(User::class,'users_id','id');
    }
    public function data_diri(){
        return $this->belongsTo(data_diri::class,'data_diri_id','id_data_diri');
    }
    public function usaha(){
        return $this->belongsTo(usaha::class,'usaha_id','id_usaha');
    }
    public function berkas(){
        return $this->belongsTo(berkas::class,'berkas_id','id_berkas');
    }
    public function pengajuan_ditolak(){
        return $this->hasMany(pengajuan_ditolak::class);
    }
}
