<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    about,
    advisor,
    Events,
    ImageGallery,
    OffcialTeam,
    Slider,
    Project,
    Publications,
};
use PDO;

class FrontendController extends Controller
{
    function commingSoon(){
        return view('frontend.comming_soon.index');
    }
    function frontend(){
        return view('frontend.main',[
            'sliders' => Slider::orderBy('priority','asc')->get(),
            'about' => about::first(),
            'events' => Events::latest()->limit(6)->get(),
            'image_galleries' => ImageGallery::latest()->limit(12)->get(),
        ]);
    }
    public function aboutIndex(){
        return view('frontend.about.index',[
            'about' => about::first(),
            'image_galleries' => ImageGallery::latest()->limit(28)->get(),
        ]);
    }
    public function advisorTeamIndex(){
        return view('frontend.team.adviser.index',[
            'advisors' => advisor::orderBy('priority','asc')->paginate(15),
        ]);
    }
    public function officialTeamIndex(){
        return view('frontend.team.official.index',[
            'officialTeam' => OffcialTeam::orderBy('priority','asc')->paginate(20),
        ]);
    }
    public function projectIndex($slug){
        return view('frontend.projects.index',[
            'project' => Project::where('slug',$slug)->first(),
            'projects' => Project::all(),
        ]);
    }
    public function eventsIndex(){
        // return 'aschi';
        return view('frontend.projects.events.events',[
            'events' => Events::latest()->paginate(10),
        ]);
    }
    public function eventsShow($slug){
        // return $slug;
        return view('frontend.projects.events.event',[
            'event' => Events::where('slug',$slug)->first(),
        ]);
    }
    public function imagegalleryIndex(){
        // return $slug;
        return view('frontend.media.image_gallery.index',[
            'about' => about::first(),
            'image_galleries' => ImageGallery::latest()->paginate(40),
        ]);
    }
    public function publicationsIndex(){
        return view('frontend.media.publications.index',[
            'projects' => Project::orderBy('id','asc')->get(),
        ]);

    }

}
