<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ControllerGetAllJadwal extends Controller
{
    public function getJadwalbyDate(Request $request)
    {
    	$jadwal = Schedule::where('schedule_date',$request->input('date'))->get();
    	return response()->json(['code'=> 'SUCCES_GET', 'message' => 'OK' , 'content' => $jadwal]);
    }

    public function getJadwalbyUser(Request $request)
    {
    	$jadwaluser = Schedule::where('id',$request->input('jadwaluser'))->get();
    	return response()->json(['code'=> 'SUCCES_GET', 'message' => 'OK', 'content' => $jadwaluser]);
    }


}
