<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaccine extends Model
{
     /*protected $table = 'babies'; ; kalo nama tabel beda dg model
    protected $primaryKey = 'id_baby'; kalo nama pk selain id
    public $incrementing = false;* kalo increment tidak aktif
    public $timestamps = false;
    */
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
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

    /* bla bla bla bla bla */


}
