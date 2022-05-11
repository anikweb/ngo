<?php

namespace App\Http\Controllers;

use App\Models\advisor;
use App\Models\AdvisorSocial;
use App\Models\SocialPlatform;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.team.advisors.index',[
            'advisors' => advisor::orderBy('priority','asc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.team.advisors.create',[
            'socialPlatforms' => SocialPlatform::orderBy('name','asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $advisor = new advisor;
        $advisor->name = $request->name;
        $advisor->designation = $request->designation;
        $advisor->email = $request->email;
        // highest vallue of priority
        $exists_priority = advisor::all()->max('priority');
        $advisor->priority = $exists_priority+1;

        $advisor->save();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $newName = Str::slug($advisor->name).'-image-'.Str::random(5).'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/advisors/'.$newName);
            Image::make($image)->save($destination);
            $advisor->image = $newName;
            $advisor->save();
        }

        if($request->username[0] != null){
            foreach ($request->socialPlatform as $key => $socialPlatform) {
                if($request->username[$key]){
                    $advisorSocial = new AdvisorSocial;
                    $advisorSocial->advisor_id = $advisor->id;
                    $advisorSocial->platform_id = $socialPlatform;
                    $advisorSocial->username = $request->username[$key];
                    $advisorSocial->save();
                }
            }
        }
        return redirect()->route('advisors-settings.index')->with('success','Advisor added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function show(advisor $advisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('backend.pages.team.advisors.edit',[
            'advisor' => advisor::findOrFail($id),
            'socialPlatforms' => SocialPlatform::orderBy('name','asc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' => "required|string",
        ]);
        $advisor = advisor::findOrFail($request->advisor_id);
        $advisor->name = $request->name;
        $advisor->designation = $request->designation;
        $advisor->email = $request->email;
        $advisor->save();
        if($request->hasFile('image')){
            if($advisor->image){
                $oldImage = public_path('images/advisors/'.$advisor->image);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
            }
            $image = $request->file('image');
            // return $image;
            $newName = Str::slug($advisor->name).'-image-'.Str::random(5).'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/advisors/'.$newName);
            // return 'hello';
            Image::make($image)->save($destination);
            $advisor->image = $newName;
            $advisor->save();
        }
        if($request->username[0] != null){
            foreach ($request->advisor_social_id as $key => $advisor_social_id) {
                if($advisor_social_id != ''){
                    // return $advisor_id;
                    $advisorSocial = AdvisorSocial::find($advisor_social_id);
                    $advisorSocial->advisor_id = $advisor->id;
                    $advisorSocial->platform_id = $request->socialPlatform[$key];
                    $advisorSocial->username = $request->username[$key];
                    $advisorSocial->save();
                }else{
                    if($request->username[$key] != ''){
                        $advisorSocial = new AdvisorSocial;
                        $advisorSocial->advisor_id = $advisor->id;
                        $advisorSocial->platform_id = $request->socialPlatform[$key];
                        $advisorSocial->username = $request->username[$key];
                        $advisorSocial->save();
                    }
                }
            }
        }
        return redirect()->route('advisors-settings.index')->with('success','Advisor Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advisor = advisor::findOrFail($id);
        if($advisor->image){
            $oldImage = public_path('images/advisors/'.$advisor->image);
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
        }
        $advisor->delete();
        return back()->with('success','Advisor deleted!');
    }
    public function deleteAdvisorSocial($advisor_id){
        $advisor = AdvisorSocial::find($advisor_id)->delete();
        if($advisor){
            $result = true;
        }else{
            $result = false;
        }
        return response()->json($result);
    }
    public function changePriority(Request $request){
        $exists_advisor = advisor::where('priority','>=',$request->priority)->get();
        foreach ($exists_advisor as $key => $value) {
            $exists_data = advisor::find($value->id);
            $exists_data->priority =  $exists_data->priority+1;
            $exists_data->save();
        }
        $advisor = advisor::find($request->advisor_id);
        $advisor->priority = $request->priority;
        $advisor->save();
        return back()->with('success','Advisor priority changed!');
    }
}
