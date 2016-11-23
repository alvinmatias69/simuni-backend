<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baby;
use App\User;

class bayi_controller extends Controller
{
    public function lihat_Riwayat_Imunisasi($tgl_imunisasi_terakhir)
    {
    	/**
    	- show jadwal imunisasi yang telah dilakukan oleh bayi
    	*/
    	return view('jadwal_imunisasi_bayi',['jadwal_imunisasi' => jadwal_imunisasi::findOrFail($tgl_imunisasi_terakhir)]);
    }

    public function getAllBaby(){
        $baby = Baby::with('user')->get();
        //$baby = Baby::find($id)->User;
        $baby = Baby::all();
        return response()->json(['code'=> 'SUCCESS_GET','message' => 'OK','content' => $baby]);
    }
    public function getBaby($idUser){
        $baby = Baby::where($idUser)->first();
        return response()->json(['code' => 'SUCCESS_GET','message' => 'OK','content' =>$baby]);
    }
    public function showBaby($id){
        $baby = Baby::with('baby')->get();
        return response()->json(['code'=> 'SUCCESS_GET','message'=>'OK','content'=>$baby]);
    }
    public function InsertBaby(){
        $user = new User();
        $baby = new Baby();
        $user->name = $request-> input('name');
        $user->username = $request-> input('username');
        $user->password = $request-> input('password');
        $user->phone_number = $request-> input('phone_number');
        $user->type = $request-> input('type');
        $user->save();
        $baby->idUser = $user->id;
        $baby->birth_date = $request->input('birth_date');
        $baby->father_name = $request->input('father_name');
        $baby->mother_name = $request->input('mother_name');
        $baby->weight = $request->input('weight');
        $baby->height = $request->input('height');
        $baby->save();
        return response()->json(['code'=>'FAILURE_POST','message'=>'OK','content' => []]);
    }

    public function DeleteBaby($id){
        $baby = Baby::where($idUser)->first();
        $baby->delete();
        return response()->json(['code'=> 'SUCCESS_GET','message'=> 'OK','content' => []]);
    }

    public function update(Request $request, $id){
        $user=User::find($id);
        $user->birth_date =$request->input('birth_date');
        $user->father_name =$request->input('father_name');
        $user->mother_name =$request->input('mother_name');
        $user->weight =$request->input('weight');
        $user->height =$request->input('height');
        $user->save();
        return response()->json(['code'=>'SUCCESS_PUT','message'=>'OK','content'=>null]);
    }
}
