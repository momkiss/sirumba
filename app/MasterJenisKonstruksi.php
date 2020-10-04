<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterJenisKonstruksi extends Model
{
    protected $table    = 'master_jenis_konstruksi';
    protected $fillable = ['nama'];
    public $timestamps  = false;
}
