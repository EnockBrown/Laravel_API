<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;

class UsersViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $users=Customers::orderBy('created_at','desc')->paginate(2);
       return view('pages.Users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $new_user= Customers::find($id);
       // return $new_user;
        return view('pages.customers_edit')->with('new_user',$new_user);
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
        $user=Customers::find($id);
           $user_id = $user->user_id;
           $first_name =$user->first_name;
           $middle_name =$user->middle_name;
           $last_name =$user->last_name;
           $user_phone =$user->user_phone;
           $user_email =$user->user_email;
           $unique_id =$user->unique_id;
           $country =$user->country;
           $verified ="ACCOUNT VERIFIED";
           $cover_image =$user->cover_image;
           $created_at =$user->created_at;
           $updated_at =$user->updated_at;

           //UPDATE
           $UpdateUser= Customers::find($id);
           $UpdateUser -> user_id =$user_id;
           $UpdateUser -> first_name =$first_name;
           $UpdateUser -> middle_name =$middle_name;
           $UpdateUser -> last_name =$last_name;
           $UpdateUser -> user_phone =$user_phone;
           $UpdateUser -> user_email =$user_email;
           $UpdateUser -> unique_id =$unique_id;
           $UpdateUser -> country =$country;
           $UpdateUser -> verified =$verified;
           $UpdateUser -> cover_image =$cover_image;
           $UpdateUser -> created_at =$created_at;
           $UpdateUser -> updated_at =$updated_at;
           $UpdateUser->save();
           return redirect('/users')->with('success','User Vuerified');
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
