<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JalanUtama extends Model
{
    protected $table    = "jalan_utama";
    protected $fillable = ['user_id', 'jenis_konstruksi', 'pemohon_id', 'kategori', 'panjang', 'lebar', 'luas', 'median', 'ukuran', 'keterangan', 'tersedia'];

    public function konstruksi()
    {
        return $this->belongsTo('App\MasterJenisKonstruksi','jenis_konstruksi_id','id');
    }
}
