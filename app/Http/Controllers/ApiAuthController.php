<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
//use Validator;
class ApiAuthController extends Controller
{
    public $successStatus = 200;
     //$success['token'] =  $user->createToken('AppName')->accessToken;
    public function register(Request $request)
    {
        $request ->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
            'c_password' => 'required|same:password',
        ]);
        // if($request->fails())
        // {
            // return response()->json(['error'=>$request->errors()], 401);
            // $input = $request->all();
            $request['password'] = bcrypt($request['password']);
            $user = User::create($request->all());
            $success =  $user->createToken('AppName')->accessToken;
            return response()->json([
                'error'=>'false',
                'token'=>$success],
                $this->successStatus);
        // }
    }

        public function login()
        {
            if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
            {
                $authenticated_user = Auth::user();
                $user = User::find($authenticated_user->id);
               // $user->createToken('myApp')->accessToken;
                 $user = Auth::user();
                // $success['token'] =  $user->createToken('AppName')->accessToken;
                 $success =  $user->createToken('AppName')->accessToken;
                 return response()->json([
                     'error'=>'false',
                     'message' => 'Login success',
                     'success' => $success,
                     'user'=>$user],
                     $this-> successStatus);
                 // return response()->json(['success' => $success, 'user'=>$user], $this-> successStatus);
                 // return response()->json(['user' =>$user],$this->successStatus );

            }
            else
            {
                return response()->json(['error'=>'Unauthorised'], 401);
            }
        }

        public function getUser()
        {
            $user = Auth::user();
           $id = Auth::id();
           return response()->json(['id' => $id],$this->successStatus);
            return response()->json(['success' => $user], $this->successStatus);
        }
}

