<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JalanPembantu extends Model
{
    protected $table = "jalan_pembantu";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'panjang', 'lebar', 'luas', 'keterangan', 'tersedia'];

}
