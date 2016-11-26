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
        User::destroy($id);

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
    		return response () -> json(['code'=> 'SUCCESS_POST', 'message' => 'register success', 'content' =>  null]);
    		//post untuk mengirimkan data 
    		//put untuk mengupdate/edit data

    	} 
    	catch(QueryException $e)
    	{
    		return response() -> json(['code' => 'FAILURE_POST', 'message' => 'username already exist', 'content' => null]);
    	}
    }
    public function editUser(Request $request, $id)
    {
        $users = User::find($id);
        $users -> username = $request->input('username');
        $users -> password = bcrypt($request->input('password'));
        $users -> name = $request->input('name');
        $users -> phone_number = $request->input('phone_number');
        $users -> type = $request->input('type');

        $users -> save();
        return response () -> json(['code'=> 'SUCCESS_PUT', 'message' => 'edit success', 'content' =>null]);

    }

    public function detailUser($id)
    {
        $users = User::find($id);
        return response()->json([
            'code'=>'SUCCESS_GET','message'=>'detail success', 'content'=>$users]);
    }

    public function getAllBidan()
    {
        $bidan = User::where('type', 'bidan')->get();
        return response()->json([
            'code'=>'SUCCESS_GET','message'=>'detail success', 'content'=>$bidan]);
    }

    public function uploadAvatar(Request $request, $id)
    {
        $namaFile = $id . '.' . $request->file('image')->guessExtension();
        $request->file('image')->move(public_path('/avatar/'), $namaFile);
        $user = User::find($id);
        $user->urlFoto = $namaFile;
        $user->save();
        return response()->json(['code'=>'SUCCESS_POST', 'message'=>'OK', 'content'=>['urlFoto'=>$user->urlFoto]]);
    }

}