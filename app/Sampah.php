<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    protected $table = "sampah";
    protected $fillable = [ 'user_id', 'pemohon_id', 'kategori', 'panjang', 'lebar', 'tinggi', 'volume', 'jenis_tps','keterangan','jenis_konstruksi', 'terpilah', 'jarak_rumah_terdekat', 'tersedia'];

    public function jeniskonstruksi()
    {
        return $this->belongsTo('App\MasterJenisKonstruksi','master_jenis_konstruksi_id','id');
    }

}
