<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phone_Verification;
use App\User;

class VerifyController extends Controller
{
    public function getVerify(){
        return view('pages.verification');
    }

    public function postVerify(Request $request){
        if($user=User::where('code',$request->code)->first()){
            $user->active=1;
            $user->code=null;
            $user->save();
            return redirect()->route('login')->withMessage('your account is active');
        }
        else{
            return back()->withMessage('Verify code is not correct. please try again');
        }
    }
}
