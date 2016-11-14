<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Baby extends Model
{
	//ini harus dicopas dulu method dibawah2 dari user ?? gak keluar dia langsung
    protected $table = 'babys';
	protected $primaryKey = null;
	public $incrementing = false;
     /*protected $table = 'babies'; ; kalo nama tabel beda dg model
    protected $primaryKey = 'id_baby'; kalo nama pk selain id
    public $incrementing = false;* kalo increment tidak aktif
    public $timestamps = false;
    */
    protected $fillable = // kolom2 yg diisi manual datanya, public, constractor
    [
        'birth_date', 'father_name', 'mother_name', 'weight', 'height'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
