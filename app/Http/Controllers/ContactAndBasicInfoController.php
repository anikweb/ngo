<?php

namespace App\Http\Controllers;

use App\Models\ContactAndBasicInfo;
use App\Models\SocialPlatform;
use Illuminate\Http\Request;

class ContactAndBasicInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('contact and basic info')){
            return view('backend.pages.contact_and_basic_info.index',[
                'socialPlatforms' => SocialPlatform::orderBy('name','asc')->get(),
                'contact_and_basic_info' => ContactAndBasicInfo::latest()->paginate(5),
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->can('contact and basic info')){
            $request->validate([
                'platform' => "required",
                'username' => 'required',
            ]);
            $contactAndBasicInfo = new ContactAndBasicInfo();
            $contactAndBasicInfo->platform_id =  $request->platform;
            $contactAndBasicInfo->username =  $request->username;
            $contactAndBasicInfo->save();
            return back()->with('success','New Contact Added!');
        }else{
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactAndBasicInfo  $contactAndBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ContactAndBasicInfo $contactAndBasicInfo)
    {
        // return 'he';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactAndBasicInfo  $contactAndBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactAndBasicInfo $contactAndBasicInfo)
    {
        return view('backend.pages.contact_and_basic_info.edit',[
            'contactInfo' =>$contactAndBasicInfo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactAndBasicInfo  $contactAndBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactAndBasicInfo $contactAndBasicInfo)
    {
        // return $contactAndBasicInfo;
        $request->validate([
            'username' => 'required'
        ]);
        $contactAndBasicInfo->username = $request->username;
        $contactAndBasicInfo->save();
        return back()->with('success','Social link updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactAndBasicInfo  $contactAndBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactAndBasicInfo $contactAndBasicInfo)
    {
        $contactAndBasicInfo->delete();
        return redirect()->route('contact_and_basic_info.index')->with('success','Social link delete successfull!');
    }
    public function getSocialUrl($platform_id)
    {
        $social = SocialPlatform::find($platform_id)->url;
        if($social){
            $socialURl = "https://".$social."/";
        }else{
            $socialURl ="";
        }
        return response()->json($socialURl);
    }

}
