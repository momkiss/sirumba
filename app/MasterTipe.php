<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterTipe extends Model
{
    protected $table    = 'master_tipe';
    protected $fillable = ['nama'];
    public $timestamps  = false;
}
