<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GorongGorong extends Model
{
    protected $table    = "utilitas_gorong_gorong";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'jumlah', 'tersedia','keterangan'];

}
