<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ControllerGetAllJadwal extends Controller
{
    public function getJadwal()
    {
    	$jadwal = Schedule::all();
    	return response()->json(['code'=> 'SUCCES_GET', 'message' => 'OK' , 'content' => $jadwal]);

    }
}
