<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class users_controller extends Controller
{
    public function getAllUser()
    {
    	$users = User::all();
    	return response()->json(['code'=>'SUCCESS_GET', 'message' => 'OK', 'content' => $users]);
    }

    public function deleteUser($id)
    {
    	//$users = User::find($id);
    	//$users->delete(); cara panjang
        $users::destroy($id);

    	return response()->json(['code'=>'SUCCESS_DELETE','message'=>'delete success', 'content' => null]);
    }

    public function registerUser(Request $request) // request digunakan karna meminta data dari user
    {
    	try
    	{
    		$users = new User();
    		$users -> username = $request->input('username');
    		$users -> password = bcrypt($request->input('password'));
    		$users -> name = $request->input('name');
    		$users -> phone_number = $request->input('phone_number');
    		$users -> type = $request->input('type');

    		$users -> save();
    		return response () -> json(['code'=> 'SUCCESS_POST', 'message' => 'resgister success', 'content' =>  null]);
    		//post untuk mengirimkan data 
    		//put untuk mengupdate/edit data

    	} 
    	catch(QueryException $e)
    	{
    		return response() -> json(['code' => 'FAILURE_POST', 'message' => 'username already exist', 'content' => null]);
    	}
    }
}
