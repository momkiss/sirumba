<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "slider";
     protected $fillable = ['user_id', 'nama', 'deskripsi', 'link', 'urutan', 'aktif'];

}
