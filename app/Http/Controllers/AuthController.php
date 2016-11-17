<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
            	return response()->json(['status'=>'FAILED_POST','message'=>'USER_NOT_FOUND','content'=>null]);
                // return $this->jsonResponse('FAILED_POST', 'USER_NOT_FOUND', ['error' => 'username atau password salah']);
            }
        } catch (JWTException $e) {
        	return response()->json(['status'=>'FAILED_POST','message'=>'SERVER_ERROR','content'=>['error' => $e]]);
            // return $this->jsonResponse('FAILED_POST', 'SERVER_ERROR', ['error' => $e]);
        }
        $tmp = User::where('username', $request->only('username'))->first();
        $type = $tmp->type;
        $id = $tmp->id;
        return response()->json(['status'=>'SUCCESS_POST','message'=>'Ok','content'=>['apiKey' => $token, 'type' => $type, 'id' => $id]]);
        // return $this->jsonResponse('SUCCESS_POST', 'OK', ['apiKey' => $token, 'type' => $type, 'id' => $id]);
    }
}
