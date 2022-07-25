<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends BaseController
{
    //
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->sendResponse($success, 'User signed in');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
}
