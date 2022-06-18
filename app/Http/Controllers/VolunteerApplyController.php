<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VolunteerApplyController extends Controller
{
    public function create(){
        return view('frontend.volunteers.create');
    }
}
