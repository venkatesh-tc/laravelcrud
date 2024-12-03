<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; 


class PageController extends Controller
{
    public function contact()
    {
        $contact = Contact::all();
        return view('contact')->with('contact',$contact); // this will return the contact.blade.php view
    }
}
