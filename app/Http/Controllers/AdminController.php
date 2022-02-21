<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        $fname = "Ratchanon";
        $lname = "Pheungta"; 
        return view('admin') 
        ->with('fname',$fname)
        ->with('lname',$lname);
    }
}
