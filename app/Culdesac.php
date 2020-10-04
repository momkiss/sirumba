<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Culdesac extends Model
{
    protected $table = "culdesac";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'panjang', 'lebar', 'luas', 'keterangan', 'tersedia'];

   
}
