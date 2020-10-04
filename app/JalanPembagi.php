<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JalanPembagi extends Model
{
    protected $table = "jalan_pembagi";
    protected $fillable = [ 'user_id', 'pemohon_id', 'kategori', 'panjang', 'lebar', 'luas', 'keterangan', 'tersedia'];

}
