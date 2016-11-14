<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    private string id_jadwal;
    private date tanggal;
    private Bidan bidan;
    private string daftar_imunisasi;

    protected$fillable = ['id_jadwal','tanggal','bidan','daftar_imunisasi'];
}
