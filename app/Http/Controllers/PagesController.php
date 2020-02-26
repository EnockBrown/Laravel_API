<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $tittle="Monarch Home Service Application";
     //   return view ('pages.index', compact('tittle'));
        return view ('pages.index')->with('tittle' , $tittle);
    }

    public function about(){
        $tittle="About Us";
        return view('pages.about')->with('tittle',$tittle);
    }

    public function services(){
        $data=array(
            'tittle' =>'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view ('pages.services')->with($data);
    }

    public function dashboard(){
        return view('pages.dashboard');
    }
}
