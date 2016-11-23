<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schedule;
use App\Http\Requests;
// contoh menggunakan table user

class ResourceControllerExample extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::simplePaginate(100);
        //index = untuk menampilkan  data semuanya
        $users = User::all();
        return response()->json(['code'=>'SUCCESS_GET', 'message'=>'Ok', 'content'=>$users]);
    }

    /**
     * Store a newly created resource in sto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = new User($request->all()); -> nama variabel sama dg database dan tdk ada perubahan
        //store : menyimpan data

        $user = new User(); // nama atribut ada yg tidak sama/ harrus di encode duluu'
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->phone_number = $request->input('phone_number');
        $user->type = $request->input('type');
        $user->save();
        return response()->json(['code'=>'SUCCESS_POST', 'message'=>'Ok', 'content'=>null]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan salah satu 
        $user = User::find($id); // hanya bisa berlaku di PK yg namanya id
        return response()->json(['code'=>'SUCCESS_GET', 'message'=>'Ok', 'content'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->save();
        return response()->json(['code'=>'SUCCESS_PUT', 'message'=>'Ok', 'content'=>null]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        
        return response()->json(['code'=>'SUCCESS_DELETE', 'message'=>'Ok', 'content'=>null]);
    }

    // '[1, 2]'
    // arrVaccines
    public function cariArr(Request $request)
    {
        $scheduleList = Schedule::all();
        $arrVaccines = ($request->input('arrVaccines'));
        $scheduleResult = [];
        foreach ($scheduleList as $schedule)
            $tmpVaccine = json_decode($schedule->arr_idVaccine);
            $i = 0;
            while ($i < count($tmpVaccine)) {
                $j = 1;
                while ($j < strlen($arrVaccines)) {
                    if ($tmpVaccine[$i] ==  $arrVaccines[$j]) {
                        array_push($scheduleResult, $schedule);
                        $i = count($tmpVaccine);
                        $j = strlen($arrVaccines);
                    }
                    $j = $j + 2;
                }
                $i++;
            }
        }
        return response()->json(['code'=>'SUCCESS_GET', 'message'=>'Ok', 'content'=>$scheduleResult]);
    }
}
