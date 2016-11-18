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

	public function show($id)
    //Menampilkan Data Vaksin berdasarkan ID
    {
	$vaksin = Vaccine::find($id);
        return response()->json(['code'=>'SUCCESS_GET', 'message'=>'OK', 'content'=>$vaksin]);
    }

    public function update(
    	Request $request, $id)
    //Update Data
   {
        $vaksin = Vaccine::find($id);
        $vaksin->name = $request->input('name');
        $vaksin->save();
        return response()->json(['code'=>'SUCCESS_PUT', 'message'=>'Update Succes', 'content'=>null]);
    }

    public function destroy($id)
    //Menghapus data
    {
        Vaccine::destroy($id);
        return response()->json(['code'=>'SUCCESS_DELETE', 'message'=>'Delete Success', 'content'=>null]);
    }

    public function store(Request $request)
    //Menyimpan Data
    {
        $vaksin = new Vaccine();
        $vaksin->name = $request->input('name');
        $vaksin->save();
        return response()->json(['code'=>'SUCCESS_POST', 'message'=>'Save Success', 'content'=>null]);
    }

    public function detail($id)
    //Detail
    {
        $vaksin = Vaccine::find($id);
        return response()->json(['code'=>'SUCCESS_GET','message'=>'Detail Success', 'content'=>null]);
    }

    /**public function new($id)
    //New
    {
        $vaksin = new Vaaccine ()
    }*/
}

    