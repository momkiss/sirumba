<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemadamKebakaran extends Model
{
    protected $table = "pemadam_kebakaran";
    protected $fillable = ['user_id', 'pemohon_id', 'kategori', 'jenis_bangunan', 'jenis_konstruksi', 'ukuran', 'jumlah', 'tersedia'];
}
