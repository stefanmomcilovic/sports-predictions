<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function aboutUs(){
        return view('about-us');
    }

    public function contantUs(){
        return view('contant-us');
    }
}
