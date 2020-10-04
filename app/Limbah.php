<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limbah extends Model
{
    protected $table = "limbah";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'panjang', 'lebar', 'luas', 'jenis_konstruksi', 'keterangan', 'tersedia'];

     public function konstruksi()
    {
        return $this->belongsTo('App\MasterJenisKonstruksi','jenis_konstruksi_id','id');
    }
}
