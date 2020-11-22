<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    protected $table = "pemohon";
    protected $fillable = ['user_id', 'pengembang_id', 'tahun', 'nama_lengkap_pengembang', 'alamat_kecamatan_pengembang', 'alamat_kelurahan_pengembang', 'alamat_rt_pengembang', 'alamat_jalan_pengembang', 'alamat_kodepos_pengembang', 'nomor_ktp', 'nomor_surat_permohonan', 'tanggal_surat_permohonan', 'pekerjaan', 'jabatan', 'telp', 'nama_perumahan', 'alamat_kecamatan_perumahan', 'alamat_kelurahan_perumahan', 'alamat_rt_perumahan', 'alamat_jalan_perumahan', 'alamat_kodepos_perumahan', 'luas_lahan', 'luas_prasarana','luas_kavling' ,'luas_sarana', 'luas_rth', 'verifikator', 'jenis_perumahan', 'status', 'nomor_surat_pengesahan','tanggal_pengesahan' ,'keterangan'];

    protected $dates = [
        'tanggal_surat_permohonan',
    ];

    public function setLuasLahanAttribute($value)
    {
        if($value != "") {   
            $luas1 = str_replace(".", "", $value);
            $luas2 = str_replace(",", ".", $luas1);
        }else{
            $luas2 = NULL;
        }
        $this->attributes['luas_lahan'] = $luas2;
    }

    public function setLuasKavlingAttribute($value)
    {
        if($value != "") {
            $luas1 = str_replace(".", "", $value);
            $luas2 = str_replace(",", ".", $luas1);
        }else{
            $luas2 = NULL;
        }
        $this->attributes['luas_kavling'] = $luas2;
    }

    public function setLuasPrasaranaAttribute($value)
    {
        if($value != "") {  
            $luas1 = str_replace(".", "", $value);
            $luas2 = str_replace(",", ".", $luas1);
        }else{
           $luas2 = NULL; 
        }
        $this->attributes['luas_prasarana'] = $luas2;
    }

    public function setLuasSaranaAttribute($value)
    {
        if($value != "") {   
            $luas1 = str_replace(".", "", $value);
            $luas2 = str_replace(",", ".", $luas1);

            
        }else{
            $luas2 = NULL;
        }
        $this->attributes['luas_sarana'] = $luas2;
    }

    public function setLuasRthAttribute($value)
    {
        if($value != "") {  
            $luas1 = str_replace(".", "", $value);
            $luas2 = str_replace(",", ".", $luas1);
        }else{
            $luas2 = NULL;  
        }

        $this->attributes['luas_rth'] = $luas2;
    }

    public function formatAngka($value)
    {
        if($value != "") {
            $luas2 = number_format($value, 2, ',', '.' );
        }else{
            $luas2 = NULL;
        }
        return $luas2;
    }

    // public function getLuasLahanAttribute($value)
    // {
    //     return $this->formatAngka($value);
    // }

    // public function getLuasKavlingAttribute($value)
    // {
    //     return $this->formatAngka($value);
    // }

    // public function getLuasPrasaranaAttribute($value)
    // {
    //     return $this->formatAngka($value);
    // }

    // public function getLuasSaranaAttribute($value)
    // {
    //     return $this->formatAngka($value);
    // }

    // public function getLuasRthAttribute($value)
    // {
    //     return $this->formatAngka($value);
    // }

    // public function setTanggalAttribute($value)
    // {
    //     $this->attributes['tanggal'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    // }

    public function pengembang()
    {
        return $this->belongsTo('App\Pengembang');
    }

    public function kecamatan_perumahan()
    {
        return $this->belongsTo('App\MasterKecamatan','alamat_kecamatan_perumahan','id');
    }

    public function kecamatan_pengembang()
    {
        return $this->belongsTo('App\MasterKecamatan','alamat_kecamatan_pengembang','id');
    }

    public function kelurahan_perumahan()
    {
        return $this->belongsTo('App\MasterKelurahan','alamat_kelurahan_perumahan','id');
    }

    public function kelurahan_pengembang()
    {
        return $this->belongsTo('App\MasterKelurahan','alamat_kelurahan_pengembang','id');
    }

    public function berkas()
    {
        return $this->hasMany('App\Berkas');
    }

    public function jalanmasuk()
    {
        return $this->hasMany('App\JalanMasuk');
    }

    public function jalanpembagi()
    {
        return $this->hasMany('App\JalanPembagi');
    }

    public function jalanpembantu()
    {
        return $this->hasMany('App\JalanPembantu');
    }

    public function jalanutama()
    {
        return $this->hasMany('App\JalanUtama');
    }

    public function culdesac()
    {
        return $this->hasMany('App\Culdesac');
    }

    public function limbah()
    {
        return $this->hasMany('App\Limbah');
    }

    public function sampah()
    {
        return $this->hasMany('App\Sampah');
    }

    public function peribadatan()
    {
        return $this->hasOne('App\Peribadatan');
    }

    public function rth()
    {
        return $this->hasOne('App\Rth');
    }

    public function rekreasi()
    {
        return $this->hasOne('App\Rekreasi');
    }

    public function pendidikan()
    {
        return $this->hasOne('App\Pendidikan');
    }

    public function kesehatan()
    {
        return $this->hasOne('App\Kesehatan');
    }

    public function perniagaan()
    {
        return $this->hasOne('App\Perniagaan');
    }

    public function pelayananumum()
    {
        return $this->hasOne('App\PelayananUmum');
    }

    public function parkir()
    {
        return $this->hasOne('App\Parkir');
    }

    public function peneranganjalan()
    {
        return $this->hasOne('App\PeneranganJalan');
    }

    public function airbersih()
    {
        return $this->hasOne('App\AirBersih');
    }

    public function pemadamkebakaran()
    {
        return $this->hasOne('App\PemadamKebakaran');
    }

    public function listrik()
    {
        return $this->hasOne('App\Listrik');
    }

    public function telepon()
    {
        return $this->hasOne('App\Telepon');
    }

    public function gas()
    {
        return $this->hasOne('App\Gas');
    }

    public function transportasi()
    {
        return $this->hasOne('App\Transportasi');
    }

    public function gorong()
    {
        return $this->hasOne('App\GorongGorong');
    }

    public function drainase()
    {
        return $this->hasOne('App\Drainase');
    }

    public function jumlah()
    {
        return $this->hasMany('App\JumlahRumah');
    }
}
