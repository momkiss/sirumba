<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listrik extends Model
{
    protected $table = "listrik";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'jenis_bangunan', 'jenis_konstruksi', 'ukuran', 'jumlah', 'tersedia'];
}
