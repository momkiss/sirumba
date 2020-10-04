<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterKecamatan extends Model
{
    protected $table    = 'master_kecamatan';
    protected $fillable = ['user_id','kode','nama'];
    public $timestamps  = false;

    public function masterKelurahan()
    {
        return $this->hasMany('App\MasterKelurahan');
    }
}
