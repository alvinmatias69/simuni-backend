<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{

	//ini harus dicopas dulu method dibawah2 dari user ?? gak keluar dia langsung
    protected $table = 'babys';

    //ini harus dicopas dulu method dibawah2 dari user ?? gak keluar dia langsung
	protected $primaryKey = null;
	public $incrementing = false;
     /*protected $table = 'babies'; ; kalo nama tabel beda dg model
    protected $primaryKey = 'id_baby'; kalo nama pk selain id
    public $incrementing = false;* kalo increment tidak aktif
    public $timestamps = false;
    */
    protected $fillable = // kolom2 yg diisi manual datanya, public, constractor
    [
        'idUser','birth_date', 'father_name', 'mother_name', 'weight', 'height'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'idUser');
    }
}
