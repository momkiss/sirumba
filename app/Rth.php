<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rth extends Model
{
    protected $table = "rth";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori','jenis_konstruksi','luas_lahan','keterangan'];

   
}
