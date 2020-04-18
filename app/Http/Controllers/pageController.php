<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;

class pageController extends Controller
{
    //HOME PAGE
    public function HomePage(Request $request){

        $list_mahasiswa = mahasiswa::all();
        if($request->ajax()){
            return datatables()->of($list_mahasiswa)->make(true);
        }

        return view('welcome',compact('judul'));
    }
    //ABOUT PAGE
    public function AboutPage(){
        return view('about');
    }
}
