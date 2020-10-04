<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    protected $fillable = ['user_id','nama','alamat','kepala','kontak','email','logo'];

    public  $timestamps = false;
}
