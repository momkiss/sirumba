<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    protected $table = "gas";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'jenis_bangunan', 'jenis_konstruksi', 'ukuran', 'jumlah', 'tersedia'];

}
