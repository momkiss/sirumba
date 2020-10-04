<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilitas extends Model
{
    protected $table = "utilitas";

    protected $fillable = ['user_id', 'pemohon_id', 'penerangan_jalan', 'jaringan_air_bersih', 'pemadam_kebakaran', 'jaringan_listrik', 'jaringan_telepon', 'jaringan_gas', 'jaringan_transportasi', 'sarana_penerangan_jasa_umum'];
}
