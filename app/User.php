<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /*protected $table = 'babies'; ; kalo nama tabel beda dg model
    protected $primaryKey = 'id_baby'; kalo nama pk selain id
    public $incrementing = false;* kalo increment tidak aktif
    public $timestamps = false;
    */
    protected $fillable = // kolom2 yg diisi manual datanya, public, constractor
    [
        'name', 'username', 'phone_number', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = //tidak bisa diakses secara sembarangan - atribut set private 
    [
        'password'
    ];

    public function baby()
    {
        return $this->hasOne('App\Baby', 'idUser');
    }
    public function baby_imunisation()
    {
        return $this->hasMany('App\Baby_Immunisation','idBaby');

    }

}
