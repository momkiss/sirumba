<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelayananUmum extends Model
{
    protected $table = "pelayanan_umum";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'master_jenis_bangunan_id','master_jenis_konstruksi_id' ,'jenis_bangunan', 'jenis_konstruksi', 'ukuran', 'tersedia'];

    public function jenisbangunan()
    {
        return $this->belongsTo('App\MasterJenisBangunan','master_jenis_bangunan_id','id');
    }

    public function jeniskonstruksi()
    {
        return $this->belongsTo('App\MasterJenisKonstruksi','master_jenis_konstruksi_id','id');
    }
}
