<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baby_Immutation extends Model
{
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
        'immutation_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
