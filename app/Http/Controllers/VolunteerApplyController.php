<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteerApplyRequest;
use App\Models\Countries;
use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
use App\Models\Volunteers;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Mail;
use PDF;
use App\Mail\VolunteerApplicationMail;

class VolunteerApplyController extends Controller
{
    public function create(){
        return view('frontend.volunteers.create',[
            'divisions' =>Division::orderBy('name','asc')->get(),
            'countries' =>Countries::orderBy('name','asc')->get(),
        ]);
    }
    public function store(VolunteerApplyRequest $request){

        if($request->presentsame=='no'){
            $request->validate([
                'pmDivison' => 'required',
                'pmDistrict' => 'required',
                'pmThana' => 'required',
                'pmVillage' => 'required',
            ],[
                'pmDivison.required' => 'Permanent Division required',
                'pmDistrict.required' => 'Permanent District required',
                'pmThana.required' => 'Permanent Thana required',
                'pmVillage.required' => 'Permanent Village/Area required',
            ]);
        }
        if(!$request->nid&&!$request->bcn){
            $request->validate([
                'nid' => 'required',
                'bcn' => 'required',
            ],[
                'nid.required' => 'NID or Birth registration required, please enter any one or both',
                'bcn.required' => 'NID or Birth registration required, please enter any one or both',
            ]);
        }
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
        $volunteer->bcn = $request->bcn;
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
        if($request->presentsame=='yes'){
            $volunteer->pmDivison = $request->prDivison;
            $volunteer->pmDistrict = $request->prDistrict;
            $volunteer->pmThana = $request->prThana;
            $volunteer->pmPostOffice = $request->prPostOffice;
            $volunteer->pmZIP = $request->prZIP;
            $volunteer->pmVillage = $request->prVillage;
        }
        if($request->presentsame=='no'){
            $volunteer->pmDivison = $request->pmDivison;
            $volunteer->pmDistrict = $request->pmDistrict;
            $volunteer->pmThana = $request->pmThana;
            $volunteer->pmPostOffice = $request->pmPostOffice;
            $volunteer->pmZIP = $request->pmZIP;
            $volunteer->pmVillage = $request->pmVillage;
        }
        $volunteer->status = 1;
        $volunteer->save();
        $volunteer->applicant_id = Str::upper(Str::random(8)).$volunteer->id;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $newName = $volunteer-> name_en.' - '.$volunteer->volunteer_id.'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/volunteers/'.$newName);
            Image::make($image)->save($destination,60);
            $volunteer->image = $newName;
            $volunteer->save();
        }
        Mail::to($volunteer->email)->send(new VolunteerApplicationMail($volunteer));
        // $pdf = PDF::loadView('frontend.volunteers.pdf', compact('volunteer'))->setPaper('a4', 'portrait');
        // $pdf->download($volunteer->applicant_id.'.pdf');
        return view('frontend.volunteers.success',compact('volunteer'));
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
    public function reloadCaptcha(){
        return response()->json(captcha_img());
    }
}
