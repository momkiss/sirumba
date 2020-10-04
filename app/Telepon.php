<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $table = "telepon";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'jenis_bangunan', 'jenis_konstruksi', 'ukuran', 'jumlah', 'tersedia'];
}
