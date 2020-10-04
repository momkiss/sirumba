<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perniagaan extends Model
{
    protected $table    = "sarana_perniagaan";
    protected $fillable = ['user_id', 'pemohon_id', 'jenis', 'ukuran', 'kategori', 'jenis_konstruksi', 'luas_lahan', 'keterangan'];

}
