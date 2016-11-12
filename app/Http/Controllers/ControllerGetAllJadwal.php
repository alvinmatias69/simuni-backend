<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ControllerGetAllJadwal extends Controller
{
    public function getJadwalbyDate(Request $request)
    {
    	$jadwal = Schedule::where('schedule_date',$request->input('date'))->get();
    	if ($jadwal==null){
    		return reponse()->json(['code'=>'FAILURE_GET', 'message' => 'no data found', 'content'=>[]]);
    	}
    	return response()->json(['code'=> 'SUCCES_GET', 'message' => 'OK' , 'content' => $jadwal]);
    }

    public function getJadwalbyUser(Request $request)
    {
    	$jadwal = Schedule::where('id',$request->input('jadwaluser'))->get();
    	if($jadwal==null){
    		return response()->json(['code'=>'FAILURE_GET', 'message'=>'no data found', 'content'=>[]]);
    	}
    	return response()->json(['code'=> 'SUCCES_GET', 'message' => 'OK', 'content' => $jadwal]);
    	
    }


}
