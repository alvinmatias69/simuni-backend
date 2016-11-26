<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Baby_Immunisation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $table = 'baby_immunisations';
    /*protected $table = 'babies'; ; kalo nama tabel beda dg model
    protected $primaryKey = 'id_baby'; kalo nama pk selain id
    public $incrementing = false;* kalo increment tidak aktif
    public $timestamps = false;
    */
    protected $fillable = // kolom2 yg diisi manual datanya, public, constractor
    [
        'idBaby','idVaccine','immunisation_date', 'idSchedule'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'idBaby');
    }
    public function vaccine()
    {
        return $this->belongsTo('App\Vaccine', 'idVaccine');
    }
}
