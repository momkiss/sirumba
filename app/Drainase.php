<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drainase extends Model
{
    protected $table = "drainase";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'panjang', 'lebar', 'luas', 'jenis_konstruksi', 'keterangan', 'tersedia'];

     public function konstruksi()
    {
        return $this->belongsTo('App\MasterJenisKonstruksi','jenis_konstruksi_id','id');
    }

}
