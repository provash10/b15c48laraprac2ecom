<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("welcome");
        // return "Hello";
    }

    public function contact(){
        // return "Contact Us";
        return view("contact");
    }
}
