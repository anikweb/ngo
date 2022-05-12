<?php

namespace App\Http\Controllers;

use App\Models\OffcialTeam;
use App\Models\OfficialTeamSocial;
use App\Models\SocialPlatform;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class OffcialTeamController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('team management'))
        {
            return view('backend.pages.team.official.index',[
                'official_teams' => OffcialTeam::orderBy('priority','asc')->paginate(5),
                'officialTeam_priority' => OffcialTeam::orderBy('priority','asc')->get(),
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
        if(auth()->user()->can('team management'))
        {
            return view('backend.pages.team.official.create',[
                'socialPlatforms' => SocialPlatform::orderBy('name','asc')->get(),
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->can('team management'))
        {
            $request->validate([
                'name' => 'required|string',
            ]);
            $offcialTeam = new OffcialTeam();
            $offcialTeam->name = $request->name;
            $offcialTeam->designation = $request->designation;
            $offcialTeam->email = $request->email;
            // highest vallue of priority
            $exists_priority = OffcialTeam::all()->max('priority');
            $offcialTeam->priority = $exists_priority+1;
            $offcialTeam->save();
            if($request->hasFile('image')){
                $image = $request->file('image');
                $newName = Str::slug($offcialTeam->name).'-image-'.Str::random(5).'.'.$image->getClientOriginalExtension();
                $destination = public_path('images/official_team/'.$newName);
                Image::make($image)->save($destination);
                $offcialTeam->image = $newName;
                $offcialTeam->save();
            }
            if($request->username[0] != null){
                foreach ($request->socialPlatform as $key => $socialPlatform) {
                    if($request->username[$key]){
                        $advisorSocial = new OfficialTeamSocial;
                        $advisorSocial->official_team_id = $offcialTeam->id;
                        $advisorSocial->platform_id = $socialPlatform;
                        $advisorSocial->username = $request->username[$key];
                        $advisorSocial->save();
                    }
                }
            }
            return redirect()->route('official-team.index');
        }else{
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OffcialTeam  $offcialTeam
     * @return \Illuminate\Http\Response
     */
    public function show(OffcialTeam $offcialTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OffcialTeam  $offcialTeam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->can('team management'))
        {
            $officalTeam = OffcialTeam::findOrFail($id);
            return view('backend.pages.team.official.edit',[
                'officialTeam' => OffcialTeam::findOrFail($id),
                'socialPlatforms' => SocialPlatform::orderBy('name','asc')->get(),
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OffcialTeam  $offcialTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(auth()->user()->can('team management'))
        {
            $request->validate([
                'name' => "required|string",
            ]);
            $offcialTeam = OffcialTeam::findOrFail($request->official_team_id);
            $offcialTeam->name = $request->name;
            $offcialTeam->designation = $request->designation;
            $offcialTeam->email = $request->email;
            $offcialTeam->save();
            // return 'saved';
            if($request->hasFile('image')){
                if($offcialTeam->image){
                    $oldImage = public_path('images/official_team/'.$offcialTeam->image);
                    if(file_exists($oldImage)){
                        unlink($oldImage);
                    }
                }
                $image = $request->file('image');
                // return $image;
                $newName = Str::slug($offcialTeam->name).'-image-'.Str::random(5).'.'.$image->getClientOriginalExtension();
                $destination = public_path('images/official_team/'.$newName);
                // return 'hello';
                Image::make($image)->save($destination);
                $offcialTeam->image = $newName;
                $offcialTeam->save();
            }
            if($request->username[0] != null){
                foreach ($request->official_team_social as $key => $official_team_social) {
                    if($official_team_social != ''){
                        // return $advisor_id;
                        $OfficialSocial = OfficialTeamSocial::find($official_team_social);
                        $OfficialSocial->official_team_id = $offcialTeam->id;
                        $OfficialSocial->platform_id = $request->socialPlatform[$key];
                        $OfficialSocial->username = $request->username[$key];
                        $OfficialSocial->save();
                    }else{
                        if($request->username[$key] != ''){
                            $OfficialSocial = new OfficialTeamSocial;
                            $OfficialSocial->official_team_id = $offcialTeam->id;
                            $OfficialSocial->platform_id = $request->socialPlatform[$key];
                            $OfficialSocial->username = $request->username[$key];
                            $OfficialSocial->save();
                        }
                    }
                }
            }

            return redirect()->route('official-team.index')->with('success','Official Team Updated!');
        }else{
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OffcialTeam  $offcialTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('team management'))
        {
            $offcialTeam = OffcialTeam::findOrFail($id);
            if($offcialTeam->image){
                $oldImage = public_path('images/official_team/'.$offcialTeam->image);
                if(file_exists($oldImage)){
                    // return 'ase';
                    unlink($oldImage);
                }
            }
            $offcialTeam->delete();
            return back()->with('success','Advisor deleted!');
        }else{
            return abort(404);
        }

    }
    public function deleteOfficialTeam($id){
        if(auth()->user()->can('team management'))
        {
            $officalTeamSocial = OfficialTeamSocial::find($id)->delete();
            if($officalTeamSocial){
                $result = true;
            }else{
                $result = false;
            }
            return response()->json($result);
        }else{
            return abort(404);
        }
    }
    public function changePriority(Request $request){
        if(auth()->user()->can('team management'))
        {
            $officalTeam = OffcialTeam::find($request->official_team_id);
            if($officalTeam->priority == 1){
                $exists_officalTeam = OffcialTeam::where('priority','<=',$request->priority)->get();
                foreach ($exists_officalTeam as $key => $value) {
                    $exists_data = OffcialTeam::find($value->id);
                    $exists_data->priority =  $exists_data->priority-1;
                    $exists_data->save();
                }
            }else{
                $exists_officalTeam = OffcialTeam::where('priority','>=',$request->priority)->get();
                foreach ($exists_officalTeam as $key => $value) {
                    $exists_data = OffcialTeam::find($value->id);
                    $exists_data->priority =  $exists_data->priority+1;
                    $exists_data->save();
                }
            }
            $officalTeam->priority = $request->priority;
            $officalTeam->save();
            return back()->with('success','Official team priority changed!');

        }else{
            return abort(404);
        }
    }
}
