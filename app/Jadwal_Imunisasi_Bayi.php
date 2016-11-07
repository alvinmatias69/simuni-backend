<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_Imunisasi_Bayi extends Model
{
    protected $table = 'Jadwal_Imunisasi_Bayi';

    public $timestamps = false;

    protected $fillable = [
		'id','bayi','jadwal' 
    ];
}
