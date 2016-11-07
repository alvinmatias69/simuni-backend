<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bayi_model extends Model
{
    protected $table = 'bayi';
    public $timestamps = false;
    protected $fillable = [
    	'nama_bayi', 'id_bayi', 'username', 'password', 'tgl_lahir', 'nama_ayah',
    	'nama_ibu', 'berat', 'panjang','tgl_imunisasi_terakhir'
    ];

}
