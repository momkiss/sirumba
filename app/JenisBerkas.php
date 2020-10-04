<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBerkas extends Model
{
    protected $table    = 'jenis_berkas';
    protected $fillable = ['user_id','kode','nama'];
    public $timestamps  = false;

    public function berkas()
    {
        return $this->hasMany('App\Berkas');
    }
    
}
