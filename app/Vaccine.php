<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
     /*protected $table = 'babies'; ; kalo nama tabel beda dg model
    protected $primaryKey = 'id_baby'; kalo nama pk selain id
    public $incrementing = false;* kalo increment tidak aktif
    public $timestamps = false;
    */
    protected $fillable = // kolom2 yg diisi manual datanya, public, constractor
    [
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function baby_imunisation()
    {
        return $this->hasMany('App\Baby_Immunisation','idVaccine');

    }

    

}
