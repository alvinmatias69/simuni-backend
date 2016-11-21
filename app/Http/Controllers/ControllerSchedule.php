<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Vaccine;
class ControllerSchedule extends Controller
{

	public function getSchedule(Request $request)
    {
        $scheduleList = Schedule::all();
        $vaccineList = Vaccine::all();
        foreach ($scheduleList as $schedule) {
            $idvaccine=json_decode($schedule->arr_idVaccine);
            $i =0;
            while ($i < count($idvaccine)){
                $j=1;
                while($j<strlen($vaccineList)){
                    if($idvaccine[$i]==$vaccineList[$j]){
                        $name=
                        echo ;
                    }
                }
            }
        }











        //return response()->json(['code' => 'SUCCESS_GET', 'message' => 'OK', 'content' => $schedule]);
         //return response()->json(['code' => 'SUCCESS_GET', 'message' => 'OK', 'content' => $vaccineList]);


    }
}
