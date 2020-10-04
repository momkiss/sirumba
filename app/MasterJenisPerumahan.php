<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterJenisPerumahan extends Model
{
    protected $table    = 'master_jenis_perumahan';
    protected $fillable = ['nama'];
    public $timestamps  = false;
}