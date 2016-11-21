<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Vaccine;
class ControllerSchedule extends Controller
{

	public function getSchedule(Request $request)
    {
        $schedule = Schedule::all();
        $vaccine = Vaccine::all();
        










        // return response()->json(['code' => 'SUCCESS_GET', 'message' => 'OK', 'content' => $schedule]);
        // return response()->json(['code' => 'SUCCESS_GET', 'message' => 'OK', 'content' => $vaccine]);


    }
}
