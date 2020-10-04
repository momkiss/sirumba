<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    protected $table = "transportasi";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'jenis_bangunan', 'jenis_konstruksi', 'ukuran', 'jumlah', 'tersedia'];
}
