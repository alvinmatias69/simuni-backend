<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateBidanModel extends Model
{

    protected $table = 'Bidan';
    public $timestamp=false;

    protected $fillable = [
    	'nama_bidan','id_bidan','username','password'
    ];
}
