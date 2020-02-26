<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Phone_Verification;
use App\SendCode;
use Illuminate\Http\Request;

class PhoneVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return 123;
        $request->validate([
            'mobile_number' =>'required',
        ]);
        $code=new Phone_Verification();
        $code -> mobile_number =$request->input('mobile_number');
        return $code;
       // $user->code=SendCode::sendCode($user->phone);
       $user_code=SendCode::sendCode($code -> mobile_number);
      // return $user_code;

       $verify=Phone_Verification::create([
        'mobile_number'=>$request->input('mobile_number'),
        'verification_code'=>$user_code,
        'verified'=>0,
       ]);

       return response()->json(['success'=>$verify]);

    //    $product= Product::find($id);
    //     $product -> product_name =$request->input('product_name');
    //     $product -> product_price =$request->input('product_price');
    //     $product -> stock =$request->input('stock');
    //     $product -> product_link = $fileNameToStore;
    //     $product->save();

    //     $verify=Phone_Verification::create($request->all());
    //     return response()->json(['success'=>$verify]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mobile_number' =>'required',
        ]);
        $code=new Phone_Verification();
        $code -> mobile_number =$request->input('mobile_number');
      //  return $code;
       // $user->code=SendCode::sendCode($user->phone);
       $user_code=SendCode::sendCode($code -> mobile_number);
      // return $user_code;

       $verify=Phone_Verification::create([
        'mobile_number'=>$request->input('mobile_number'),
        'verification_code'=>$user_code,
        'verified'=>0,
       ]);

       return response()->json(['success'=>$verify]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'verification_code' =>'required',
        ]);


        $input_code=new Phone_Verification();
        $input_code -> verification_code =$request->input('verification_code');
       // return $input_code;

        $product= Phone_Verification::find($id);
        $mobile_number = $product->mobile_number;
        $verification_code = $product->verification_code;
        $verified = 1;

        //checking if verification code is valid
        if($input_code-> verification_code == $verification_code){

            $UpdatedVerification= Phone_Verification::find($id);
            $UpdatedVerification -> mobile_number =$mobile_number;
            $UpdatedVerification -> verification_code =$verification_code;
            $UpdatedVerification -> verified =$verified;
            $UpdatedVerification->save();
            return response()->json([
                'error'=>'false',
                'message' => 'Phone Number Verified',]);
        }
        else{
            return response()->json([
                'error'=>'true',
                'message' => 'Verification Code is invalid',]);
        }
        // return [
        //     $mobile_number,
        //     $verification_code,
        //     $verified,
        // ];
        // $product -> product_name =$request->input('product_name');
        // $product -> product_price =$request->input('product_price');
        // $product -> stock =$request->input('stock');
        // $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
