<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas'; 
    protected $fillable = ['user_id', 'pemohon_id', 'jenis_berkas_id', 'nama', 'path', 'tersedia', 'status_verifikasi', 'verifikator', 'keterangan'];
    
    public function jenisBerkas()
    {
        return $this->belongsTo('App\JenisBerkas');
    }

    public function pemohon()
    {
        return $this->belongsTo('App\Pemohon');
    }


}
