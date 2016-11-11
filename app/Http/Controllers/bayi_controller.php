<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bayi_controller extends Controller
{
    public function lihat_Riwayat_Imunisasi($tgl_imunisasi_terakhir)
    {
    	/**
    	- show jadwal imunisasi yang telah dilakukan oleh bayi
    	*/
    	return view('jadwal_imunisasi_bayi',['jadwal_imunisasi' => jadwal_imunisasi::findOrFail($tgl_imunisasi_terakhir)]);
    }

    public void edit_Profile(){

    }
    public void login($username, $password){

    }

}
