<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerJadwal_Imunisasi_Bayi extends Controller
{
    public function show($id){
     return view('user.profile',['user'=> use::findOrFail($id)]);
    }

    public function show($lihat_jadwal_imunisasi){
     return view('user.profile',['user'=> use::findOrFail($jadwal)]);
    }
}
