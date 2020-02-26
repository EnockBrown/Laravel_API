<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;

class FileController extends Controller
{
    public function CountryList()
    {
        return response()->download(public_path('adult-african-black-and-white-1029783.JPG'),'User Image');
    }

    public function countrySave(Request $request)
    {

        $FileName= $request->image->getClientOriginalName();
        $path= $request -> file('image') ->  move(public_path("/images"),$FileName);
        $photoUrl=url('/'.$FileName);
        return response()->json(['url' => $photoUrl], 200);
    }
}
