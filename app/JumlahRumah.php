<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JumlahRumah extends Model
{
    protected $table = "jumlah_rumah";
    protected $fillable = [ 'user_id', 'pemohon_id', 'tipe', 'kategori','luas', 'jumlah'];

}
