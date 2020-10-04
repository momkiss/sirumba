<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JalanMasuk extends Model
{
    protected $table = "jalan_masuk";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'panjang', 'lebar', 'luas', 'keterangan', 'tersedia'];

}
