<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    protected $table = 'opd';
    public $timestamps = false;
    protected $fillable = ['nama','alias'];
}
