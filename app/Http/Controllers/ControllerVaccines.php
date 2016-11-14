<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerVaccines extends Controller
{
	public function index(){
		$accessory = Accessory::all();
			return response()->json(['code' => 'FAILURE_GET', 'message' => 'No data found', 'content' => []]);	
		}
		return response()->json(['code' => 'SUCCESS_GET', 'message' => 'OK', 'content' => $accessory]);
	}

    public function show($id){
    	$accessory = Accessory::find($id);
    	return response()->json(['code' => 'SUCCESS_GET', 'message' => 'OK', 'content' => $accessory]);
    }

    public function attendEvent(Request $ request){
    	$attendEvent = new attendEvent();
    	try{
    		$attendEvent->idNamaBayi = $ request->input('idNamaBayi');
    		$attendEvent->UmurBayi = $ request->input('UmurBayi');
    		$attendEvent->BeratBayi = $ request->input('BeratBayi');
    		$attendEvent->JenisVaksin = $ request->input('JenisVaksin');
    		$attendedEvent->idEvent = $request->input('idEvent');
	    	$attendedEvent->save();
	    	return response()->json(['code' => 'SUCCESS_POST', 'message' => 'OK', 'content' => []]);
	    }catch(QueryException $e){
	    	return response()->json(['code' => 'FAILURE_POST', 'message' => 'Could not find event or user', 'content' => []]);
	    }

	 }
	    
    	
}
