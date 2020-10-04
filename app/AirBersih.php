<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirBersih extends Model
{
    protected $table = "air_bersih";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'jenis_bangunan', 'jenis_konstruksi', 'ukuran', 'jumlah', 'tersedia'];

}
