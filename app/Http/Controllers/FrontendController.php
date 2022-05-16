<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\about;
use App\Models\advisor;
use App\Models\OffcialTeam;
use App\Models\Slider;
use PDO;

class FrontendController extends Controller
{
    function frontend(){
        return view('frontend.main',[
            'sliders' => Slider::orderBy('priority','asc')->get(),
            'about' => about::first(),
        ]);
    }
    public function aboutIndex(){
        return view('frontend.about.index',[
            'about' => about::first(),
        ]);
    }
    public function advisorTeamIndex(){
        return view('frontend.team.adviser.index',[
            'advisors' => advisor::orderBy('priority','asc')->paginate(15),
        ]);
    }
    public function officialTeamIndex(){
        return view('frontend.team.official.index',[
            'officialTeam' => OffcialTeam::orderBy('priority','asc')->paginate(15),
        ]);
    }
}
