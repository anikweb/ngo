<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
use App\Models\Volunteers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class VolunteerApplyController extends Controller
{
    public function create(){
        return view('frontend.volunteers.create',[
            'divisions' =>Division::orderBy('name','asc')->get(),
            'countries' =>Countries::orderBy('name','asc')->get(),
        ]);
    }
    public function store(Request $request){

        $volunteer = new Volunteers;
        $volunteer-> name_en = $request->name_en;
        $volunteer->name_bn = $request->name_bn;
        $volunteer->email = $request->email;
        $volunteer->mobile = $request->mobile;
        $volunteer->father_name = $request->father_name;
        $volunteer->mother_name = $request->mother_name;
        $volunteer->blood_group = $request->blood_group;
        $volunteer->sex = $request->sex;
        $volunteer->date_of_birth = $request->date_of_birth;
        $volunteer->nid = $request->nid;
        $volunteer->bcn = $request->nid;
        $volunteer->nationality = 'bangladeshi';
        $volunteer->occupation = $request->occupation;
        $volunteer->institute = $request->institute;
        $volunteer->facebook_url = $request->facebook_url;
        $volunteer->giverFromInspiration = $request->giverFromInspiration;
        $volunteer->prDivison = $request->prDivison;
        $volunteer->prDistrict = $request->prDistrict;
        $volunteer->prThana = $request->prThana;
        $volunteer->prPostOffice = $request->prPostOffice;
        $volunteer->prZIP = $request->prZIP;
        $volunteer->prVillage = $request->prVillage;
        $volunteer->pmDivison = $request->pmDivison;
        $volunteer->pmDistrict = $request->pmDistrict;
        $volunteer->pmThana = $request->pmThana;
        $volunteer->pmPostOffice = $request->pmPostOffice;
        $volunteer->pmZIP = $request->pmZIP;
        $volunteer->pmVillage = $request->pmVillage;
        $volunteer->save();
        $volunteer->volunteer_id = "MBF-".$volunteer->id;
        $volunteer->save();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $newName = $volunteer-> name_en.' - '.$volunteer->volunteer_id.'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/volunteers/'.$newName);
            Image::make($image)->save($destination);
            $volunteer->image = $newName;
            $volunteer->save();
        }

    }
    public function getDistrict($id){
        $district = District::where('division_id',$id)->orderBy('name','asc')->get();
        return response()->json($district);
    }
    public function getThana($id){
        $thana = Thana::where('district_id',$id)->orderBy('name','asc')->get();
        return response()->json($thana);
    }
    public function getPmDistrict($id){
        $district = District::where('division_id',$id)->orderBy('name','asc')->get();
        return response()->json($district);
    }
    public function getPmThana($id){
        $thana = Thana::where('district_id',$id)->orderBy('name','asc')->get();
        return response()->json($thana);
    }
}
