<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perniagaan extends Model
{
    protected $table    = "sarana_perniagaan";
    protected $fillable = ['user_id', 'pemohon_id', 'jenis', 'ukuran', 'kategori', 'jenis_konstruksi', 'luas_lahan', 'keterangan'];

    public function jenisbangunan()
    {
        return $this->belongsTo('App\MasterJenisBangunan','master_jenis_bangunan_id','id');
    }

    public function jeniskonstruksi()
    {
        return $this->belongsTo('App\MasterJenisKonstruksi','master_jenis_konstruksi_id','id');
    }

}
