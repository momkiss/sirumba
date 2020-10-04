<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterKelurahan extends Model
{
    protected $table    = 'master_kelurahan';
    protected $fillable = ['user_id','master_kecamatan_id','kode','nama'];
    public $timestamps  = false;


    public function masterKecamatan()
    {
        return $this->belongsTo('App\MasterKecamatan');
    }

}
