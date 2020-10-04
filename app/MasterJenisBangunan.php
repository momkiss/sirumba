<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterJenisBangunan extends Model
{
     protected $table    = 'master_jenis_bangunan';
    protected $fillable = ['nama'];
    public $timestamps  = false;
}
