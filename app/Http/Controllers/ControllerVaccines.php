<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vaccine;

class ControllerVaccines extends Controller
{
	public function index(){
		$vaksin = Vaccine::all();
		return response()->json(['code' => 'SUCCESS_GET', 'message' => 'OK', 'content' => $vaksin]);
	}

	public function show($id){
	$vaksin = Vaccine::find($id);
        return response()->json(['code'=>'SUCCESS_GET', 'message'=>'Ok', 'content'=>$vaksin]);
    }

    public function update(
    	Request $request, $id)
   {
        $vaksin = Vaccine::find($id);
        $vaksin->name = $request->input('name');
        $vaksin->save();
        return response()->json(['code'=>'SUCCESS_PUT', 'message'=>'Ok', 'content'=>null]);
    }

    public function destroy($id)
    {
        Vaccine::destroy($id);
        return response()->json(['code'=>'SUCCESS_DELETE', 'message'=>'Ok', 'content'=>null]);
    }

    public function store(Request $request)
    {
        $vaksin = new Vaccine();
        $vaksin->name = $request->input('name');
        $vaksin->save();
        return response()->json(['code'=>'SUCCESS_POST', 'message'=>'Ok', 'content'=>null]);
    }
}

