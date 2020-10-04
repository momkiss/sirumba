<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeneranganJalan extends Model
{
    protected $table = "penerangan_jalan";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'jenis_bangunan', 'jenis_konstruksi', 'ukuran', 'jumlah', 'tersedia'];
}
