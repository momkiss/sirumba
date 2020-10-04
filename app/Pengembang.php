<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembang extends Model
{
    protected $table    = 'pengembang';
    protected $fillable = ['user_id','nama_perusahaan', 'direktur', 'no_ktp', 'alamat_kecamatan', 'alamat_kelurahan', 'alamat_jalan', 'alamat_rt', 'telp', 'kode_pos', 'alamat_kecamatan_luar', 'alamat_kelurahan_luar'];
    public $timestamps  = false;

    public function kecamatan()
    {
        return $this->belongsTo('App\MasterKecamatan','alamat_kecamatan','id');
    }

    public function kelurahan()
    {
        return $this->belongsTo('App\MasterKelurahan','alamat_kelurahan','id');
    }
}
