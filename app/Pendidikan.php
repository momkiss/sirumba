<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = "sarana_pendidikan";
    protected $fillable = ['user_id', 'pemohon_id', 'jenis', 'ukuran', 'kategori', 'jenis_konstruksi', 'luas_lahan', 'keterangan'];

}
