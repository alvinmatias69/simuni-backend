<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_Jadwal extends Controller
{
    public function buat_jadwal_baru(,$idjadwal, $tanggal, $bidan, $daftar_imunisasi){
    	$dataBerhasil = jadwal::all() - create();
    	$dataview = jadwal::all();
    	return view('showData',['data' =>$dataview]);
    }

    public function tampil_jadwal(){
    	$data = Jadwal::all();
    	return view('showData',['data'=>$data]);
    }

    public function update_jadwal_imunisasi($idjadwal){
    	$data = Jadwal::where('idjadwal',$idjadwal)->first();
    	$dataBerhasil = Jadwal::create(['idjadwal'=>$idjadwal->input('idjadwal'),'Tanggal'=>$data->input('tanggal'))]);
    }
    
    public function lihat_jadwal($idjadwal){
    	$data = jadwal::where('idjadwal',$idjadwal)->first();
    	return view('showData',['tampil_jadwal' => $data]);
    }
}
