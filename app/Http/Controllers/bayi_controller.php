<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baby;
use App\User;
use App\Vaccine;
use App\Baby_Immunisation;

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
        $baby = User::with('baby')->where('type','baby')->get();
        //$baby = Baby::find($id)->User;
        // $baby = Baby::all();
        return response()->json(['code'=> 'SUCCESS_GET','message' => 'OK','content' => $baby]);
    }
    public function getBaby($idUser){
        $baby = Baby::where($idUser)->first();
        return response()->json(['code' => 'SUCCESS_GET','message' => 'OK','content' =>$baby]);
    }
    public function showBaby($id){
        $baby = Baby::with('user')->where('idUser',$id)->first();
        return response()->json(['code'=> 'SUCCESS_GET','message'=>'OK','content'=>$baby]);
    }
    public function insertBaby(Request $request){
        $user = new User();
        $baby = new Baby();
        $user->name = $request-> input('name');
        $user->username = $request-> input('username');
        $user->password = bcrypt($request-> input('password'));
        $user->phone_number = $request-> input('phone_number');
        $user->type = 'baby';
        $user->save();

        $baby->idUser = $user->id;
        $baby->birth_date = $request->input('birth_date');
        // $baby->father_name = $request->input('father_name');
        // $baby->mother_name = $request->input('mother_name');
        $baby->weight = $request->input('weight');
        $baby->height = $request->input('height');
        $baby->save();

        $vaccines = Vaccine::all();

        foreach ($vaccines as $vaccine) {
            $baby_immunisation = new Baby_Immunisation();
            $baby_immunisation->idBaby = $user->id;
            $baby_immunisation->idVaccine = $vaccine->id;
            $baby_immunisation->save();
            print_r('hmm');
        }
        die();

        return response()->json(['code'=>'SUCCESS_POST','message'=>'OK','content' => null]);
    }

    public function DeleteBaby($id){
        User::destroy($id);
        // $baby = Baby::where('idUser', $id)->first();
        // $baby->deleted_at = time();
        // $baby->save();
        return response()->json(['code'=> 'SUCCESS_DELETE','message'=> 'OK','content' => []]);
    }

    public function update(Request $request, $id){
        // return response()->json(['code'=>'SUCCESS_PUT','message'=>'OK','content'=>$request->all()]);
        $user=User::find($id);
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->phone_number = $request->input('phone_number');
        $user->save();

        // DB::table('users')
        //     ->where('id', 1)
        //     ->update(['votes' => 1]);

        if ($request->input('father_name') == '') {
            Baby::where('idUser', $id)->update([
                'birth_date' => $request->input('birth_date'),
                'height' => $request->input('height'),
                'weight' => $request->input('weight'),
            ]);    
        }else{
            Baby::where('idUser', $id)->update([
                'birth_date' => $request->input('birth_date'),
                'father_name' => $request->input('father_name'),
                'mother_name' => $request->input('mother_name'),
                'height' => $request->input('height'),
                'weight' => $request->input('weight'),
            ]);
        }
        // $baby = Baby::where('idUser', $id)->first();
        // $baby->birth_date =     $request->input('birth_date');
        // $baby->father_name =    $request->input('father_name');
        // $baby->mother_name =    $request->input('mother_name');
        // $baby->height =         $request->input('height');
        // $baby->weight =         $request->input('weight');
        // $baby->save();
        
        return response()->json(['code'=>'SUCCESS_PUT','message'=>'OK','content'=>null]);
    }
}
