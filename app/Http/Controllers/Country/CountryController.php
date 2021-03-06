<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryModel;

class CountryController extends Controller
{
    public function country(){

      return response()-> json(CountryModel::get(),200);
    }

    public function countryById($id){
       return response()->json(CountryModel::find($id),200);
    }


    public function countryByName($name){
    return response()->json(CountryModel::find($name),200);
    }

    public function createcountry(Request $request){
      $country=CountryModel::create($request -> all());
      return response()->json($country,201);
    }
    public function countryupdate(Request $request,CountryModel $country){
    $country->update($request->all());
    return response()->json($country, 200);
    }
}
