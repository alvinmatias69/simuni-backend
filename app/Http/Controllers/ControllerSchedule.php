<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Vaccine;
use App\User;
use App\Baby_Immunisation;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class ControllerSchedule extends Controller
{

	public function getSchedule()
    {
        $scheduleList = Schedule::with('user')->get();

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
        return response()->json(['code'=>'SUCCESS_GET','message'=>'OK', 'content'=>$scheduleList]);
    }

    public function getScheduleByBidan($id)
    {
        $scheduleList = Schedule::with('user')->where('idBidan',$id)->get();

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
        return response()->json(['code'=>'SUCCESS_GET','message'=>'OK', 'content'=>$scheduleList]);
    }

    public function getScheduleNotDone($id)
    {
        $baby_immunisations = Baby_Immunisation::where('idBaby', $id)->get();
        $arrVaccines = [];
        foreach ($baby_immunisations as $baby_immunisation) {
            if ($baby_immunisation->immunisation_date == '0000-00-00') {
                array_push($arrVaccines, $baby_immunisation->idVaccine);
            }
        }

        $scheduleList = Schedule::with('user')->get();
        $scheduleResult = [];
        foreach ($scheduleList as $schedule){
            $tmpVaccine = json_decode($schedule->arr_idVaccine);
            $i = 0;
            while ($i < count($tmpVaccine)) {
                $j = 1;
                while ($j < count($arrVaccines)) {
                    if ($tmpVaccine[$i] ==  $arrVaccines[$j]) {
                        array_push($scheduleResult, $schedule);
                        $i = count($tmpVaccine);
                        $j = count($arrVaccines);
                    }
                    $j = $j + 2;
                }
                $i++;
            }
        }

        $vaccineList = Vaccine::all();
        foreach ($scheduleResult as $schedule) {
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
        return response()->json(['code'=>'SUCCESS_GET','message'=>'OK', 'content'=>$scheduleResult]);
    }

    public function getScheduleDone($id)
    {
        $baby_immunisations = Baby_Immunisation::where('idBaby', $id)->get();
        $arrDoneId = [];
        foreach ($baby_immunisations as $baby_immunisation) {
            if ($baby_immunisation->immunisation_date != '0000-00-00') {
                array_push($arrDoneId, $baby_immunisation->idSchedule);
            }
        }

        $scheduleList = Schedule::with('user')->whereIn('id', $arrDoneId)->get();
        // print_r($scheduleList);die();
        // $scheduleResult = [];
        // foreach ($scheduleList as $schedule){
        //     $tmpVaccine = json_decode($schedule->arr_idVaccine);
        //     $i = 0;
        //     while ($i < count($tmpVaccine)) {
        //         $j = 1;
        //         while ($j < count($arrVaccines)) {
        //             if ($tmpVaccine[$i] ==  $arrVaccines[$j]) {
        //                 array_push($scheduleResult, $schedule);
        //                 $i = count($tmpVaccine);
        //                 $j = count($arrVaccines);
        //             }
        //             $j = $j + 2;
        //         }
        //         $i++;
        //     }
        // }

        $vaccineList = Vaccine::all();
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
        return response()->json(['code'=>'SUCCESS_GET','message'=>'OK', 'content'=>$scheduleList]);
    }

    public function updateBabySchedule(Request $request)
    {
        // $babies = json_decode($request->input('babies'));
        $babies = $request->input('babies');
        foreach ($babies as $idBaby) {
            try{
                $baby_immunisation = Baby_Immunisation::where([
                    ['idBaby', '=', $idBaby],
                    ['idVaccine', '=', $request->input('vaccine')]
                ])->firstOrFail();
            }catch(ModelNotFoundException $e){
                $baby_immunisation = new Baby_Immunisation();
                $baby_immunisation->idBaby = $idBaby;
                $baby_immunisation->idVaccine = $request->input('vaccine');
                // $baby_immunisation->immunisation_date = $request->input('date');
                // ['idBaby'=>$idBaby, 'idVaccine'=>$request->input('idVaccine', 'immunisation_date'=>$request->date())]
            }
            $baby_immunisation->immunisation_date = $request->input('date');
            $baby_immunisation->idSchedule = $request->input('idSchedule');
            // return response()->json(['code'=>'SUCCESS_PUT','message'=>'OK', 'content'=>$request->input('date')]);   
            $baby_immunisation->save();
            return response()->json(['code'=>'SUCCESS_PUT', 'message'=>'Ok', 'content'=>null]);
        }
    }
}
