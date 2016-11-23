<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Vaccine;
class ControllerSchedule extends Controller
{

	public function getSchedule()
    {
        $scheduleList = Schedule::all();

        $vaccineList = Vaccine::all();
        $scheduleResult = [];
        foreach ($scheduleList as $schedule) {
            $idvaccine=json_decode($schedule->arr_idVaccine);
            $dataVaccine = [];
            for ($i=0; $i< count($idvaccine) ; $i++) { 
                for ($j=0; $j < count($vaccineList); $j++) { 
                    if($idvaccine[$i]==$vaccineList[$j]->id){
                        array_push($dataVaccine, $vaccineList[$j]);
                            // $i = count($idvaccine);
                            // $j = strlen($vaccineList);
                    }
                }
            }
            $schedule->vaccines = $dataVaccine;
        }
        return response()->json(['code'=>'SUCCESS_GET','message'=>'OK', 'conten'=>$scheduleList]);

        











         // return response()->json(['code' => 'SUCCESS_GET', 'message' => 'OK', 'content' => $vaccineList]);


    }
}
