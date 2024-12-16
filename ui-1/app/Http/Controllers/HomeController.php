<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Students;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        return view ('welcome');
    }
    
    public function upload(Request $request)
    {
       $student = new Student;
       
       $student->name=$request->name;

       $student->email=$request->email;

       $student->save();

       return redirect()->back();


    }




}

