<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function frontend(){
        return view('frontend.main');
    }
}
