<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\about;

class FrontendController extends Controller
{
    function frontend(){
        return view('frontend.main');
    }
    public function aboutIndex(){
        return view('frontend.about.index',[
            'about' => about::first(),
        ]);
    }
}
